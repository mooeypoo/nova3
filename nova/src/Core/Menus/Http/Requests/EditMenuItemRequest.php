<?php namespace Nova\Core\Menus\Http\Requests;

use Nova\Foundation\Http\Requests\Request;

class EditMenuItemRequest extends Request
{
	protected $rules = [
		'title'				=> 'required_if:type,internal,external,route',
		'menu_id'			=> 'required|integer',
		'link'				=> 'required_if:type,external',
		'page_id'			=> 'required_if:type,page',
		'type'				=> 'required|in:page,external,internal,route',
	];

	protected $messages = [
		'title.required_if'			=> "Please enter a title for the menu item",
		'menu_id.required'			=> "Please enter a menu this items should be part of",
		'menu_id.integer'			=> "Please enter a valid menu",
		'link.required_if'			=> "Please provide a link for the menu item",
		'page_id.required_if'		=> "Please select a page",
		'type:required'				=> "Please specify the type of link",
		'type:in'					=> "Page types can only be 'page' or 'external'",
	];
}
