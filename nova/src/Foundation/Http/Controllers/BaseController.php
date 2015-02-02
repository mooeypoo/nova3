<?php namespace Nova\Foundation\Http\Controllers;

use Locate;
use stdClass;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesCommands,
	Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Foundation\Application;

abstract class BaseController extends Controller {

	use DispatchesCommands, ValidatesRequests;

	protected $app;
	protected $page = false;
	protected $theme = false;
	protected $settings = false;
	protected $currentUser = false;

	protected $data;
	protected $jsData;
	protected $view = false;
	protected $jsView = false;
	protected $templateView = 'main';
	protected $structureView = 'main';

	public function __construct(Application $app)
	{
		// Set the properties
		$this->app			= $app;
		$this->data			= new stdClass;
		$this->jsData		= new stdClass;
		$this->currentUser	= $app['nova.user'];

		// Check if Nova is installed
		$this->beforeFilter(function()
		{
			if ( ! app('nova.setup')->isInstalled())
			{
				return redirect()->route('setup.env');
			}
		});

		// Bind some data to all views
		$this->beforeFilter(function($route, $request)
		{
			if (app('nova.setup')->isInstalled())
			{
				view()->share('_page', 
					app('PageRepository')->getByRoute($request->route())
				);
				view()->share('_icons', false);
				view()->share('_currentUser', app('nova.user'));
			}
		});

		// Render the template after everything is done
		$this->afterFilter('@renderTemplate');
	}

	public function processController($route, $request, $response)
	{
		// Build the structure
		$this->buildThemeStructure();

		// Build the template
		$this->buildThemeTemplate();

		// Build the navigation
		$this->buildThemeNavigation();

		// Build the page
		$this->buildThemePage();

		// Build the Javascript
		$this->buildThemeJavascript();

		// Set the content to the full template
		$response->setContent($this->theme->render());
	}

	protected function buildThemeStructure()
	{
		$data = [];

		$this->theme = app('nova.theme')->structure($this->structureView, $data);
	}

	protected function buildThemeTemplate()
	{
		$data = [];

		$this->theme = $this->theme->template($this->templateView, $data);
	}

	protected function buildThemeNavigation()
	{
		$data = [];

		$this->theme = $this->theme->nav($data);
	}

	protected function buildThemePage()
	{
		$this->theme = $this->theme->page($this->view, (array) $this->data);
	}

	protected function buildThemeJavascript()
	{
		$this->theme = $this->theme->javascript($this->jsView, (array) $this->jsData);
	}

	public function renderTemplate($route, $request, $response)
	{
		if (app('nova.setup')->isInstalled())
		{
			$layout = view(Locate::structure($this->structureView));

			if ($this->jsView)
				$layout->javascript = view(Locate::js($this->jsView))->with((array) $this->jsData);

			$layout->template = view(Locate::template($this->templateView));
			$layout->template->content = view(Locate::page($this->view))->with((array) $this->data);

			// Set the content of the response to our full layout now
			$response->setContent($layout);
		}
	}

}