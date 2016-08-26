<?php namespace Nova\Foundation\Http\Controllers;

use Str;
use stdClass;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\{Bus\DispatchesJobs, Validation\ValidatesRequests};

abstract class BaseController extends Controller {

	use DispatchesJobs, ValidatesRequests;

	public $app;
	public $data;
	public $page;
	public $user;
	public $theme;
	public $views;
	public $content;
	public $settings;
	public $templateData;
	public $structureData;

	public $isAdmin = false;
	public $isAjax = false;

	public function __construct()
	{
		$this->app				= app();
		$this->data				= new stdClass;
		$this->templateData 	= new stdClass;
		$this->structureData	= new stdClass;

		// Setup the views collection
		$this->views = collect([
			'scripts'	=> [],
			'structure'	=> 'public',
			'styles'	=> [],
			'template'	=> 'public',
		]);

		// Get a copy of $this so we can use it in the binding closure
		$me = $this;

		// Bind a reference to the current controller so that we can use that
		// data from within the template rendering middleware
		$this->app->bind('nova.controller', function ($app) use ($me) {
			return $me;
		});

		// Set up the controller
		$this->setupController();

		// Make sure Nova is installed
		$this->middleware('nova.installed');

		// Process the controller and render it to the response
		$this->middleware('nova.render');
	}

	/**
	 * We don't use Laravel's AuthorizesRequest trait because we want to do a
	 * few special things to make sure unauthorized requests are logged in a
	 * few different places.
	 */
	protected function authorize($ability, $arguments = [], $message = null)
	{
		if (user()->cannot($ability, $arguments))
		{
			$this->errorUnauthorized($message);
		}
	}

	public function errorNotFound($message = null)
	{
		$logMessage = (user())
			? user()->name
			: "An unauthenticated user";

		$logMessage.= " attempted to access ".app('request')->fullUrl();

		app('log')->warning($logMessage);

		if (app('request')->ajax())
		{
			return response()->json([
				'status'	=> 404,
				'message'	=> $message,
			]);
		}

		abort(404, $message);
	}

	public function errorUnauthorized($message = null)
	{
		$logMessage = (user())
			? user()->name
			: "An unauthenticated user";

		$logMessage.= " attempted to access ".app('request')->fullUrl();

		app('log')->warning($logMessage);

		nova_event();

		if (app('request')->ajax())
		{
			return response()->json([
				'status'	=> 403,
				'message'	=> $message,
			]);
		}

		abort(403, $message);
	}

	public function errorUnauthenticated($message = null)
	{
		$request = app('request');

		$logMessage = "An unauthenticated user attempted to access {$request->fullUrl()} from {$request->getClientIp()}";

		app('log')->warning($logMessage);

		nova_event();

		if (app('request')->ajax())
		{
			return response()->json([
				'status'	=> 401,
				'message'	=> $message,
			]);
		}

		abort(401, $message);
	}

	final public function page()
	{
		$this->views->put('scripts', ['bootstrap-tabdrop', 'basic-page']);
		$this->views->put('styles', ['tabdrop']);

		if ($this->page->access and $this->page->access->count() > 0)
		{
			// Make sure the user is authenticated
			if ( ! user())
			{
				return $this->errorUnauthenticated("You must log in to continue");
			}

			// Set the method that we'll call on the user object to check access
			$method = (Str::contains($this->page->access_type, 'role')) ? 'hasRole' : 'can';

			// Are we matching for ALL items or ANY item?
			$isStrict = (bool) Str::contains($this->page->access_type, 'strict');

			// Make sure we have an array of access items
			//$accessItems = explode(',', $this->page->access);

			foreach ($this->page->access as $access)
			{
				if ($isStrict)
				{
					if ( ! user()->{$method}($access['key']))
					{
						return $this->errorUnauthorized("You do not have permission to view the {$this->page->name} page.");
					}
				}
				else
				{
					if (user()->{$method}($access['key'])) break;

					return $this->errorUnauthorized("You do not have permission to view the {$this->page->name} page.");
				}
			}
		}
	}

	protected function setupController()
	{
		if (nova()->isInstalled())
		{
			$currentPage = app('nova.pages')->filter(function ($page)
			{
				return $page->key == request()->route()->getName();
			});

			$this->page = ($currentPage->count() > 0) ? $currentPage->first() : null;
			$this->content = app('nova.pageContent');
			$this->settings = app('nova.settings');

			view()->share('_page', $this->page);
			view()->share('_user', user());
			view()->share('_icons', theme()->getIconMap());
			view()->share('_content', $this->content);
			view()->share('_settings', $this->settings);
		}
	}

}
