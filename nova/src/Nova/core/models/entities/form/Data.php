<?php namespace Nova\Core\Models\Entities\Form;

use Model;

class Data extends Model {
	
	protected $table = 'form_data';

	protected $fillable = array(
		'form_id', 'field_id', 'data_id', 'value'
	);

	protected $dates = array('created_at', 'updated_at');
	
	protected static $properties = array(
		'id', 'form_id', 'field_id', 'data_id', 'value', 'created_at', 
		'updated_at',
	);

	/**
	 * Get specific form data.
	 *
	 * @param	string	The form key
	 * @param	int		The ID of the item
	 * @return	Collection
	 */
	public static function getData($form, $id)
	{
		/*// Start a new query
		$query = static::startQuery();

		return $query->where('form_key', $type)->where('data_id', $id)->get();*/
	}
	
	/**
	 * Update data in the data table.
	 *
	 * @param	string	The form to update
	 * @param	int		The ID to udpate
	 * @param	array 	A data array of information to update
	 * @return	bool
	 */
	public static function updateData($type, $id, array $data)
	{
		$results = array();
		
		// Loop through the data array and make the changes
		foreach ($data as $key => $value)
		{
			// Start a new query
			$query = static::startQuery();

			// Get the record
			$record = $query->where('field_id', $key)->where('data_id', $id)->first();
			
			// Update the values
			$record->value = \e($value);
			$retval = $record->save();
			
			$results[] = ($retval !== false) ? true : $retval;
		}
		
		if (in_array(false, $results))
		{
			return false;
		}
		
		return true;
	}

}