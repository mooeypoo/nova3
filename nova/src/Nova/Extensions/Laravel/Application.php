<?php namespace Nova\Extensions\Laravel;

use Illuminate\Foundation\Application as LaravelApp;

class Application extends LaravelApp {

	/**
	 * Get the configuration loader instance.
	 *
	 * @return \Nova\Extensions\Laravel\Config\LoaderInterface
	 */
	public function getConfigLoader()
	{
		return $this->make('config.loader');
	}

}