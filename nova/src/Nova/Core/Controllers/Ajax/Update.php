<?php namespace Nova\Core\Controllers\Ajax;

use Nova;
use View;
use Input;
use Request;
use Location;
use Markdown;
use AjaxBaseController;

class Update extends AjaxBaseController {

	/**
	 * Updates the site content table when an admin uses jEditable to edit
	 * some site content outside of the control panel.
	 *
	 * @return	string
	 */
	public function postSiteContent()
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('content.update'))
		{
			// Resolve the binding
			$contentRepo = Nova::resolveBinding('SiteContentRepositoryInterface');

			// Get the POST information
			$key = e(Input::get('key'));
			$value = e(Input::get('value'));

			// Break the key up into an array
			$pieces = explode('_', $key);

			// Flip the array around
			$pieces = array_reverse($pieces);

			// Make sure we don't have any tags in the headers
			$content = ($pieces[0] == 'header') ? strip_tags(Markdown::parse($value)) : $value;

			// Save the content
			$contentRepo->updateByKey([$key => $content]);

			// If it's a header, show the content, otherwise we need to parse the Markdown
			if ($pieces[0] == 'header')
			{
				echo $content;
			}
			else
			{
				echo Markdown::parse($content);
			}
		}
	}

	/**
	 * Updates the form field order when the sort function stops.
	 *
	 * @return	void
	 */
	public function postFormFieldOrder()
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('form.update'))
		{
			// Get the fields
			$fields = Input::get('field');

			// Loop through the values
			foreach ($fields as $key => $value)
			{
				// Get and update the value record
				$record = \FormFieldModel::find($value);
				$record->update(['order' => $key + 1]);
			}
		}
	}

	/**
	 * Updates the form section order when the sort function stops.
	 *
	 * @return	void
	 */
	public function postFormSectionOrder()
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('form.update'))
		{
			// Get the sections
			$sections = Input::get('section');

			// Loop through the sections
			foreach ($sections as $key => $value)
			{
				// Get and update the section record
				$record = \FormSectionModel::find($value);
				$record->update(['order' => $key + 1]);
			}
		}
	}

	/**
	 * Updates the form tab order when the sort function stops.
	 *
	 * @return	void
	 */
	public function postFormTabOrder()
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('form.update'))
		{
			// Get the tabs
			$tabs = Input::get('tab');

			// Loop through the tabs
			foreach ($tabs as $key => $value)
			{
				// Get and update the tab record
				$record = \FormTabModel::find($value);
				$record->update(['order' => $key + 1]);
			}
		}
	}

	/**
	 * Updates a form field value.
	 *
	 * @return	void
	 */
	public function postFormValue($type)
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('form.update'))
		{
			switch ($type)
			{
				case 'order':
					// Get the values
					$values = Input::get('value');

					// Loop through the values
					foreach ($values as $key => $value)
					{
						// Get and update the value record
						$record = \FormValueModel::find($value);
						$record->update(['order' => $key + 1]);
					}
				break;
				
				case 'value':
				default:
					// Get the POST values
					$id = e(Input::get('id'));
					$value = e(Input::get('value'));

					// Get and update the value
					$record = \FormValueModel::find($id);
					$record->update(['value' => $value]);
				break;
			}
		}
	}

	/**
	 * Runs the migrations for a module.
	 *
	 * @return	void
	 */
	public function action_module($module)
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('catalog.update'))
		{
			// move up to the latest migration
			\Migrate::latest($module, 'module');

			\SystemEvent::add('user', '[[event.admin.catalog.module_update|{{'.$module.'}}]]');

			echo '<p class="alert alert-success">'.lang('[[short.flash.success|module|action.updated]]').'</p>';
			echo '<div class="form-actions"><button class="btn modal-close">'.lang('action.close', 1).'</button></div>';
		}
	}

	/**
	 * Duplicate a rank group.
	 *
	 * @param	int		the ID of the rank group being duplicated
	 * @return	void
	 */
	public function action_rankgroup($id)
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('rank.update'))
		{
			$id = \Security::xss_clean($id);

			// get the rank group
			$group = \Model_Rank_Group::find($id);

			// set the data
			$data['id'] = $id;

			if ($group !== false)
			{
				$data['name'] = $group->name;
				$data['order'] = $group->order;
				$data['status'] = (int) $group->status;
			}

			echo \View::forge(\Location::ajax('update/rankgroup'), $data);
		}
	}

	/**
	 * Updates the rank group order when the sort function stops.
	 *
	 * @return	void
	 */
	public function action_rankgroup_order()
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('rank.update'))
		{
			// get and sanitize the input
			$sets = \Security::xss_clean(\Input::post('group'));

			foreach ($sets as $key => $value)
			{
				// get the group record
				$record = \Model_Rank_Group::find($value);

				// update the order
				$record->order = ($key + 1);

				// save the record
				$record->save();
			}
		}
	}

	/**
	 * Update a rank info record.
	 *
	 * @param	int		the ID of the rank info being edited
	 * @return	void
	 */
	public function action_rankinfo($id)
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('rank.update'))
		{
			$id = \Security::xss_clean($id);

			// get the rank group
			$info = \Model_Rank_Info::find($id);

			// set the data
			$data['id'] = $id;
			$data['action'] = 'update';

			if ($info !== false)
			{
				$data['name'] = $info->name;
				$data['short_name'] = $info->short_name;
				$data['order'] = $info->order;
				$data['group'] = $info->group;
				$data['status'] = (int) $info->status;
			}

			echo \View::forge(\Location::ajax('update/rankinfo'), $data);
		}
	}

	/**
	 * Updates the rank info order when the sort function stops.
	 *
	 * @return	void
	 */
	public function action_rankinfo_order()
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('rank.update'))
		{
			// get and sanitize the input
			$info = \Security::xss_clean(\Input::post('info'));

			foreach ($info as $key => $value)
			{
				// get the group record
				$record = \Model_Rank_Info::find($value);

				// update the order
				$record->order = ($key + 1);

				// save the record
				$record->save();
			}
		}
	}

	/**
	 * Confirm updating a skin.
	 *
	 * @param	string	The catalog ID
	 * @return	void
	 */
	public function getSkinVersionUpdate($id)
	{
		if ($this->auth->check() and $this->currentUser->hasAccess('catalog.update'))
		{
			// Get the catalog
			$catalog = \SkinCatalogModel::find($id);

			if ($catalog)
			{
				return View::make(Location::ajax('update/skin'))
					->with('skin', $catalog);
			}
		}
	}
	
}