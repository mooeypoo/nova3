<?php namespace Nova\Foundation\Bootstrap;

use Symfony\Component\Finder\Finder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Config\Repository as RepositoryContract;
use Illuminate\Foundation\Bootstrap\LoadConfiguration as IlluminateLoadConfig;

class LoadConfiguration extends IlluminateLoadConfig {

	protected function loadConfigurationFiles(Application $app, RepositoryContract $config)
	{
		foreach ($this->getConfigurationFiles($app) as $key => $value)
		{
			$config->set($key, $value);
		}
	}

	protected function getConfigurationFiles(Application $app)
	{
		$configCore = [];
		$configOverride = [];

		// Loop through the core config files
		foreach (Finder::create()->files()->name('*.php')->in($app->coreConfigPath()) as $file)
		{
			$key = basename($file->getRealPath(), '.php');

			$configCore[$key] = require $file->getRealPath();
		}

		// Loop through the "app" config files
		foreach (Finder::create()->files()->name('*.php')->in($app->configPath()) as $file)
		{
			$key = basename($file->getRealPath(), '.php');
			
			$configOverride[$key] = require $file->getRealPath();
		}

		return array_replace_recursive($configCore, $configOverride);
	}

}