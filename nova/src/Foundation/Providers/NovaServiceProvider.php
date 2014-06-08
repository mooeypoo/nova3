<?php namespace Nova\Core\Providers;

use App,
	Event,
	Config,
	Parsedown;
use Nova\Core\Lib\Media,
	Nova\Core\Lib\Location,
	Nova\Core\Utilities\Nova,
	Nova\Core\Lib\DynamicForm,
	Nova\Core\Lib\SystemEvent,
	Nova\Core\Services\MarkdownService;
use Ikimea\Browser\Browser;
use Illuminate\Support\ServiceProvider;
use Nova\Extensions\Laravel\Config\Repository as ConfigRepository;

class NovaServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->setupBindings();
		
		$this->registerLocation();
		$this->registerMarkdown();
		$this->registerSystemEvent();
		$this->registerCommon();
		$this->registerMedia();
		$this->registerDynamicForm();
		$this->registerBrowser();
		$this->registerConfigRepository();
	}

	public function boot()
	{
		$this->bootEventListeners();
		$this->browserCheck();
	}

	/**
	 * The Location class provides a way to find files within the file system.
	 */
	protected function registerLocation()
	{
		$this->app['nova.location'] = $this->app->share(function($app)
		{
			return new Location;
		});
	}

	/**
	 * The Markdown class provides for parsing Markdown content to HTML.
	 */
	protected function registerMarkdown()
	{
		$this->app['markdown'] = $this->app->share(function($app)
		{
			return new MarkdownService(new Parsedown);
		});
	}

	/**
	 * The System Event classes provides system event logging to a database
	 * table so that admins can see what kinds of actions are being taken within
	 * Nova.
	 */
	protected function registerSystemEvent()
	{
		$this->app['nova.event'] = $this->app->share(function($app)
		{
			return new SystemEvent;
		});
	}

	/**
	 * Common classes are the methods that don't belong in other classes and are
	 * used throughout Nova.
	 */
	protected function registerCommon()
	{
		$this->app['nova.common'] = $this->app->share(function($app)
		{
			return new Nova;
		});
	}

	/**
	 * The Media class provides methods for uploading, deleting and retrieving
	 * information about media.
	 */
	protected function registerMedia()
	{
		$this->app['nova.media'] = $this->app->share(function($app)
		{
			return new Media;
		});
	}

	/**
	 * The Dynamic Form class provides a way to interact with Nova's dynamic
	 * forms including rendering the form and filling its data.
	 */
	protected function registerDynamicForm()
	{
		$this->app['nova.form'] = $this->app->share(function($app)
		{
			return new DynamicForm;
		});
	}

	/**
	 * The Browser class provides a way to get information about the current
	 * user's browser.
	 */
	protected function registerBrowser()
	{
		$this->app['nova.browser'] = $this->app->share(function($app)
		{
			return new Browser;
		});
	}

	protected function registerConfigRepository()
	{
		$this->app['config'] = $this->app->share(function($app)
		{
			return new ConfigRepository($app['config.loader'], $app->environment());
		});
	}

	/**
	 * During the nova.start event, check to make sure that a user is using one
	 * of the approved browsers.
	 */
	protected function browserCheck()
	{
		Event::listen('nova.start', function()
		{
			//sd($this->app['nova.browser']);
		});
	}

	/**
	 * Grab the events config file and loop through the items to create the
	 * event listeners for all of Nova's events.
	 */
	protected function bootEventListeners()
	{
		// Get all the aliases
		$aliases = Config::get('app.aliases');

		// Get the event config file
		$events = Config::get('events');

		foreach ($events as $event => $handlers)
		{
			// Make sure the handlers is an array
			$handlers = ( ! is_array($handlers)) ? array($handlers) : $handlers;

			foreach ($handlers as $key => $handler)
			{
				// Set the final class to use
				$finalHandler = (array_key_exists($handler, $aliases)) ? $aliases[$handler] : $handler;

				// Set the priority
				$priority = ((int) $key == 0) ? 100 : $key;

				// Listen for the event
				Event::listen($event, $finalHandler, $priority);
			}
		}
	}

	/**
	 * Setup the interface bindings to their repositories.
	 */
	protected function setupBindings()
	{
		// Get the aliases
		$a = Config::get('app.aliases');

		/**
		 * Repository interface bindings
		 */
		App::bind($a['AccessRoleRepositoryInterface'], $a['AccessRoleRepository']);
		App::bind($a['CatalogRepositoryInterface'], $a['CatalogRepository']);
		App::bind($a['FormRepositoryInterface'], $a['FormRepository']);
		App::bind($a['NavigationRepositoryInterface'], $a['NavigationRepository']);
		App::bind($a['SettingsRepositoryInterface'], $a['SettingsRepository']);
		App::bind($a['SiteContentRepositoryInterface'], $a['SiteContentRepository']);
		App::bind($a['SystemRouteRepositoryInterface'], $a['SystemRouteRepository']);
		App::bind($a['UserRepositoryInterface'], $a['UserRepository']);

		/**
		 * Other interface bindings
		 */
		App::bind($a['NovaAuthInterface'], $a['NovaAuth']);
	}

}