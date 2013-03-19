<?php

Route::group(array('prefix' => 'setup/install'), function()
{
	Route::get('/', function()
	{
		return 'Install index';
	});

	Route::post('/', function()
	{
		// Make sure we don't time out
		set_time_limit(0);

		// Run the migrations
		Artisan::call('migrate', array('--path' => 'nova/src/Nova/Setup/database/migrations'));

		// Do the quick installs
		ModuleCatalog::install();
		RankCatalog::install();
		SkinCatalog::install();
		WidgetCatalog::install();

		// Seed the database with dev data if necessary
		if (Config::get('nova.use_dev_data'))
		{
			Artisan::call('db:seed');
		}
		
		// Clear the entire cache
		Cache::flush();

		// Cache the headers
		SiteContent::getSectionContent('header', 'main');
		SiteContent::getSectionContent('header', 'sim');
		SiteContent::getSectionContent('header', 'personnel');
		SiteContent::getSectionContent('header', 'search');
		SiteContent::getSectionContent('header', 'login');
		
		// Cache the titles
		SiteContent::getSectionContent('title', 'main');
		SiteContent::getSectionContent('title', 'sim');
		SiteContent::getSectionContent('title', 'personnel');
		SiteContent::getSectionContent('title', 'search');
		SiteContent::getSectionContent('title', 'login');
		
		// Cache the messages
		SiteContent::getSectionContent('message', 'main');
		SiteContent::getSectionContent('message', 'sim');
		SiteContent::getSectionContent('message', 'personnel');
		SiteContent::getSectionContent('message', 'search');
		SiteContent::getSectionContent('message', 'login');

		// Register
		# TODO: need to figure out how we want to do registration

		return Redirect::to('setup/install/settings');
	});

	Route::get('settings', function()
	{
		return 'Post-install setup';
	});

	Route::post('settings', function()
	{
		//

		return Redirect::to('setup/install/finalize');
	});

	Route::get('finalize', function()
	{
		return 'Post-install finalize';
	});
});