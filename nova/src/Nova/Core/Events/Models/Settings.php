<?php namespace Nova\Core\Events\Models;

use Cache;
use SystemEvent;
use BaseModelEventHandler;

class Settings extends BaseModelEventHandler {

	public static $lang = 'rank_set catalog';
	public static $name = 'name';
	
	/**
	 * After create event
	 *
	 * @param	$model	The current model
	 * @return	void
	 */
	public function created($model)
	{
		/**
		 * System Event
		 */
		SystemEvent::addUserEvent('event.admin.position', lang('base.position'), $model->name, lang('action.created'));
	}

	/**
	 * After update event
	 *
	 * @param	$model	The current model
	 * @return	void
	 */
	public function updated($model)
	{
		/**
		 * System Event
		 */
		SystemEvent::addUserEvent('event.admin.position', lang('base.position'), $model->name, lang('action.updated'));
	}

	/**
	 * Before delete event
	 *
	 * @param	$model	The current model
	 * @return	void
	 */
	public function deleting($model)
	{
		/**
		 * System Event
		 */
		SystemEvent::addUserEvent('event.admin.position', lang('base.position'), $model->name, lang('action.deleted'));
	}

	/**
	 * After the model is saved, we need to blow away the old cache
	 * of settings and replace it with a fresh copy.
	 *
	 * @param	$model	The current model
	 * @return	void
	 */
	public function saved($model)
	{
		// Blow away the old cache
		Cache::forget('nova.settings');

		// Re-cache everything
		Cache::forever('nova.settings', \SettingsModel::getItems(false, false));
	}

}