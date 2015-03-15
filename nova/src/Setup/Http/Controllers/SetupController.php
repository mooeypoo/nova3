<?php namespace Nova\Setup\Http\Controllers;

use Flash, Artisan;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Cache\Repository as Cache;

class SetupController extends BaseController {

	public function index()
	{
		// Is Nova installed?
		$installed = app('nova.setup')->isInstalled();

		return view('pages.setup.index', compact('installed'));
	}

	public function environment()
	{
		// Check the environment
		$env = app('nova.setup')->checkEnvironment();

		// If we're good, go on to the setup center
		if ($env->get('passes'))
		{
			return redirect()->route('setup.home');
		}

		return view('pages.setup.environment', compact('env'));
	}

	public function uninstall(Cache $cache, Filesystem $files)
	{
		// Clear the cache
		$cache->forget('nova.installed');

		// Clear the routes in production
		if (app('env') == 'production')
		{
			Artisan::call('route:clear');
		}

		// Reset the database
		Artisan::call('migrate:reset', ['--force' => true]);

		// Remove the config files
		$files->delete(app('path.config').'/app.php');
		$files->delete(app('path.config').'/database.php');
		$files->delete(app('path.config').'/mail.php');
		$files->delete(app('path.config').'/session.php');

		// Remove the SQLite database if it's there
		if ($files->exists(config('database.connections.sqlite.database')))
		{
			$files->delete(config('database.connections.sqlite.database'));
		}

		// Set the flash message
		Flash::success("Nova has been successfully removed.");

		return redirect()->route('setup.home');
	}

}
