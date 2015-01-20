<?php namespace Nova\Setup;

use Illuminate\Support\Facades\Facade;

class SetupFacade extends Facade {

	/**
	* Get the registered name of the component.
	*
	* @return string
	*/
	protected static function getFacadeAccessor() { return 'nova.setup'; }

}