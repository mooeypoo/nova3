<?php namespace Nova\Setup;

use Route;
use Illuminate\Support\ServiceProvider;

class SetupServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->registerSetup();
	}

	public function boot()
	{
		$this->bootSetupRoutes();
	}

	/**
	 * The Setup class provides methods for working with the base Nova setup
	 * and for checking the install status and the availability of updates.
	 */
	protected function registerSetup()
	{
		$this->app['nova.setup'] = $this->app->share(function($app)
		{
			return new Setup;
		});
	}

	/**
	 * Setup the routes used by the setup package.
	 */
	protected function bootSetupRoutes()
	{
		/**
		 * Setup Center
		 */
		Route::group(['prefix' => 'setup', 'before' => 'csrf'], function()
		{
			Route::get('/', 'Nova\Setup\Controllers\Setup@getIndex');
			Route::get('start', 'Nova\Setup\Controllers\Setup@getStart');
			Route::get('uninstall', 'Nova\Setup\Controllers\Setup@getUninstall');
			Route::get('uninstall/cleanup', 'Nova\Setup\Controllers\Setup@getUninstallCleanup');
			Route::get('genres', 'Nova\Setup\Controllers\Setup@getGenres');

			Route::post('uninstall', 'Nova\Setup\Controllers\Setup@postUninstall');
		});

		/**
		 * Building database config file
		 */
		Route::group(['prefix' => 'setup/config/db', 'before' => 'csrf'], function()
		{
			Route::get('/', 'Nova\Setup\Controllers\ConfigDb@getIndex');
			Route::get('info', 'Nova\Setup\Controllers\ConfigDb@getInfo');

			Route::post('check', 'Nova\Setup\Controllers\ConfigDb@postCheck');
			Route::post('write', 'Nova\Setup\Controllers\ConfigDb@postWrite');
			Route::post('verify', 'Nova\Setup\Controllers\ConfigDb@postVerify');
		});

		/**
		 * Building email config file
		 */
		Route::group(['prefix' => 'setup/config/email', 'before' => 'csrf'], function()
		{
			Route::get('/', 'Nova\Setup\Controllers\ConfigMail@getIndex');
			Route::get('info', 'Nova\Setup\Controllers\ConfigMail@getInfo');
			
			Route::post('write', 'Nova\Setup\Controllers\ConfigMail@postWrite');
			Route::post('verify', 'Nova\Setup\Controllers\ConfigMail@postVerify');
		});

		/**
		 * Fresh install
		 */
		Route::group(['prefix' => 'setup/install', 'before' => 'csrf'], function()
		{
			Route::get('/', 'Nova\Setup\Controllers\Install@getIndex');
			Route::get('settings', 'Nova\Setup\Controllers\Install@getSettings');
			Route::get('finalize', 'Nova\Setup\Controllers\Install@getFinalize');

			Route::post('/', 'Nova\Setup\Controllers\Install@postIndex');
			Route::post('settings', 'Nova\Setup\Controllers\Install@postSettings');
		});

		/**
		 * Migrate from Nova 2
		 */
		Route::group(['prefix' => 'setup/migrate', 'before' => 'csrf'], function()
		{
			Route::get('/', 'Nova\Setup\Controllers\Setup@getStart');
		});

		/**
		 * Update Nova 3
		 */
		Route::group(['prefix' => 'setup/update', 'before' => 'csrf'], function()
		{
			Route::get('/', 'Nova\Setup\Controllers\Update@getIndex');
			Route::get('finalize', 'Nova\Setup\Controllers\Update@getFinalize');
			Route::get('rollback', 'Nova\Setup\Controllers\Update@getRollback');
			Route::get('rollback/finalize', 'Nova\Setup\Controllers\Update@getRollbackFinalize');

			Route::post('/', 'Nova\Setup\Controllers\Update@postIndex');
			Route::post('rollback', 'Nova\Setup\Controllers\Update@postRollback');
		});

		/**
		 * Setup ajax calls
		 */
		Route::group(['prefix' => 'setup/ajax', 'before' => 'csrf'], function()
		{
			Route::post('ignore_version', 'Nova\Setup\Controllers\Ajax@postIgnoreVersion');
			Route::post('install_genre', 'Nova\Setup\Controllers\Ajax@postInstallGenre');
			Route::post('uninstall_genre', 'Nova\Setup\Controllers\Ajax@postUninstallGenre');
		});
	}

}