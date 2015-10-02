<?php namespace Nova\Core\Forms\Data;

use Model, NovaFormSectionPresenter;
use Laracasts\Presenter\PresentableTrait;

class Section extends Model {

	use PresentableTrait;

	protected $table = 'forms_sections';

	protected $fillable = ['form_id', 'tab_id', 'name', 'order', 'status'];

	protected $dates = ['created_at', 'updated_at'];

	protected $presenter = NovaFormSectionPresenter::class;

	/*
	|---------------------------------------------------------------------------
	| Relationships
	|---------------------------------------------------------------------------
	*/

	public function fields()
	{
		return $this->hasMany('NovaFormField');
	}

	public function form()
	{
		return $this->belongsTo('NovaForm');
	}

	public function tab()
	{
		return $this->belongsTo('NovaFormTab');
	}
	
}