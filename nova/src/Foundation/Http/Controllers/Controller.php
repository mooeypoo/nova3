<?php namespace Nova\Foundation\Http\Controllers;

use stdClass;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public $data;
	public $user;
	public $views;
	public $pageTitle;
	public $structureData;
	public $templateData;
	public $isAjax = false;

	public function __construct()
	{
		// Make sure Nova is installed
		$this->middleware('nova.installed');

		// Handle setup of the controller data
		$this->setupController();

		// Set up shared variables on the controller instance
		$this->middleware(function ($request, $next) {
			// Set the current user on the controller
			$this->user = $request->user();

			// Share the current user with every view
			view()->share('_user', $request->user());
			view()->share('_settings', app('nova.settings'));

			return $next($request);
		});

		// Bind a reference to the current controller so that we can use that
		// data from within the template rendering middleware
		app()->instance('nova.controller', $this);

		// Process the controller and render it to the response
		$this->middleware('nova.render-controller');
	}

	protected function setupController()
	{
		// Setup how we'll store view data
		$this->data = new stdClass;

		// Setup how we'll store data for the structure
		$this->structureData = new stdClass;
		$this->structureData->pageTitle = &$this->pageTitle;

		// Setup how we'll store data for the template
		$this->templateData = new stdClass;

		// Build up the views collection
		$this->views = collect([
			'structure'	=> 'public',
			'template' => 'public',
		]);
	}
}
