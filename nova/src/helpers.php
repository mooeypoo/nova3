<?php

if (! function_exists('_m')) {
	function _m($key, $args = [])
	{
		$gender = (auth()->check()) ? auth()->user()->gender : 'neutral';

		return app('nova.translator')->msg($key, [
			'parsemag' => true,
			'variables' => array_merge([$gender], $args)
		]);
	}
}

if (! function_exists('alias')) {
	function alias($name)
	{
		return config("app.aliases.{$name}");
	}
}

if (! function_exists('avatar')) {
	function avatar($user)
	{
		return app('nova.avatar')->setUser($user);
	}
}

if (! function_exists('d')) {
	function d()
	{
		array_map(function ($debug) {
			(new Illuminate\Support\Debug\Dumper)->dump($debug);
		}, func_get_args());
	}
}

if (! function_exists('flash')) {
	function flash()
	{
		return app('nova.flash');
	}
}

if (! function_exists('icon')) {
	function icon($icon, $additional = false)
	{
		return app('nova.theme')->renderIcon($icon, $additional);
	}
}

if (! function_exists('creator')) {
	function creator($model)
	{
		return app(config('maps.creators')[$model]);
	}
}

if (! function_exists('deletor')) {
	function deletor($model)
	{
		return app(config('maps.deletors')[$model]);
	}
}

if (! function_exists('duplicator')) {
	function duplicator($model)
	{
		return app(config('maps.duplicators')[$model]);
	}
}

if (! function_exists('restorer')) {
	function restorer($model)
	{
		return app(config('maps.restorers')[$model]);
	}
}

if (! function_exists('setup_path')) {
	function setup_path($path = false)
	{
		return app()->path("Setup/{$path}");
	}
}

if (! function_exists('updater')) {
	function updater($model)
	{
		return app(config('maps.updaters')[$model]);
	}
}

if (! function_exists('nova')) {
	function nova()
	{
		return app('nova');
	}
}
