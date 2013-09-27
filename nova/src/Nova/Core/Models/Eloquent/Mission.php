<?php namespace Nova\Core\Models\Eloquent;

use Model;

class Mission extends Model {

	protected $table = 'missions';

	protected $fillable = array(
		'title', 'images', 'order', 'group_id', 'status', 'start_date',
		'end_date', 'desc', 'summary',
	);

	protected $dates = array('created_at', 'updated_at', 'start_date', 'end_date');
	
	protected static $properties = array(
		'id', 'title', 'images', 'order', 'group_id', 'status', 'start_date', 
		'end_date', 'desc', 'summary', 'created_at', 'updated_at',
	);

	/**
	 * Belongs To: Mission Group
	 */
	public function group()
	{
		return $this->belongsTo('MissionGroupModel');
	}

	/**
	 * Has Many: Mission Notes
	 */
	public function notes()
	{
		return $this->hasMany('MissionNoteModel');
	}

	/**
	 * Has Many: Mission Posts
	 */
	public function posts()
	{
		return $this->hasMany('PostModel');
	}

	/**
	 * Polymorphic Relationship: Media
	 */
	public function images()
	{
		return $this->morphMany('Media', 'imageable');
	}

}