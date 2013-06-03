<?php namespace Nova\Core\Models\Validators;

use Input;
use Validator;

abstract class Base {

	/**
	 * Attributes to validate.
	 */
	protected $attributes;

	/**
	 * Any errors thrown during validation.
	 */
	protected $errors;

	/**
	 * Gather the attributes to use.
	 *
	 * @param	array	An array of attributes to validate.
	 * @return	void
	 */
	public function __construct($attributes = null)
	{
		$this->attributes = $attributes ?: Input::all();
	}

	/**
	 * Run the validation.
	 *
	 * @return	bool
	 */
	public function passes()
	{
		// Setup the rules
		$this->setupRules();

		// Setup the validator
		$validator = Validator::make($this->attributes, static::$rules);

		// Return true if validation passes
		if ($validator->passes()) return true;

		// Set the error messages if we fail
		$this->errors = $validator->messages();

		return false;
	}

	/**
	 * Get the errors.
	 *
	 * @return	array
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Cleanup the rules so that we don't try to validate fields
	 * that aren't actually included.
	 *
	 * @return	void
	 */
	protected function setupRules()
	{
		foreach (static::$rules as $key => $value)
		{
			if ( ! array_key_exists($key, $this->attributes))
			{
				unset(static::$rules[$key]);
			}
		}
	}

}