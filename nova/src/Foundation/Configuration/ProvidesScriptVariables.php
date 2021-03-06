<?php namespace Nova\Foundation\Configuration;

use Nova\Settings\Settings;

trait ProvidesScriptVariables
{
	public function scriptVariables()
	{
		// Grab the user so we can manually build the user object
		$currentUser = (nova()->isInstalled()) ? auth()->user() : null;

		// Nova's system variables
		$system = ['system' => [
			'version' => $this->version,
			'baseUrl' => app('request')->root(),
			'token' => csrf_token(),
			'genre' => config('nova.genre'),
			'timezone' => config('app.timezone'),
		]];

		// Nova's settings
		$settings = ['settings' => [
			'rank' => (nova()->isInstalled()) ? Settings::item('rank')->first()->value : 'duty'
		]];

		if ($currentUser) {
			$user = ['user' => [
				'name' => $currentUser->present()->name,
				'nickname' => $currentUser->nickname,
				'realName' => $currentUser->name,
				'email' => $currentUser->email,
			]];
		} else {
			$user = ['user' => [
				'name' => null,
				'nickname' => null,
				'realName' => null,
				'email' => null,
			]];
		}

		// Nova's icons
		$icons = [
			'icons' => app('nova.theme')->iconMap()->toArray(),
			'iconTemplate' => app('nova.theme')->iconTemplate,
		];

		// Nova's API options
		// $api = ['api' => config('nova.api')];

		// Nova's translation values
		$lang = ['lang' => app('nova.translator.messages')];

		// Nova's controller data
		// $data = ['data' => (array) app('nova.controller')->data];

		return array_merge($system, $settings, $user, $icons, $lang);
	}

	protected function buildRoutesList()
	{
		$routes = [];

		foreach (app('router')->getRoutes() as $route) {
			$name = $route->getName();

			if ($name !== null) {
				$routes[$route->getName()] = $route->uri;
			}
		}

		return $routes;
	}
}
