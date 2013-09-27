<?php namespace Nova\Core\Validators\Form;

use BaseValidator;

class Value extends BaseValidator {

	public static $rules = [
		'field_id'	=> 'required|numeric',
		'value'		=> 'required',
		'content'	=> 'required',
		'order'		=> 'numeric',
	];

}