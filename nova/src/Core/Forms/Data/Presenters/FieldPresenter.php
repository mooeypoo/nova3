<?php namespace Nova\Core\Forms\Data\Presenters;

use Form, Markdown;
use Laracasts\Presenter\Presenter;

class FieldPresenter extends Presenter {

	public function help()
	{
		return Markdown::parse($this->entity->help);
	}

	public function render($id = null)
	{
		$field = $this->entity;

		// Build the field name
		$fieldName = sprintf(config('nova.form.fieldNameFormat'), $field->id);

		// Grab the data if we need to
		$data = ($field->data) ? $field->data->where('data_id', $id) : null;
		$fieldValue = ($data->count() > 0) ? $data->first()->value : null;

		// Get the attributes
		$attributesArr = [];
		$field->attributes->each(function ($item) use (&$attributesArr) {
			$attributesArr[$item['name']] = $item['value'];
		});

		/*
		// Get the values
		$valuesArr = [];
		$field->values->each(function ($item) use (&$valuesArr) {
			$valuesArr[$item['value']] = $item['text'];
		});

		return app('nova.form.fields')
			->getFieldType($field->type)
			->render($state, $fieldName, $valuesArr, $fieldValue, $attributesArr);
		*/

		switch ($field->type)
		{
			case 'text':
				return Form::text($fieldName, $fieldValue, $attributesArr);
			break;

			case 'textarea':
				return Form::textarea($fieldName, $fieldValue, $attributesArr);
			break;

			case 'select':
				// Grab the values
				$valuesArr = [];
				$field->values->each(function ($item) use (&$valuesArr) {
					$valuesArr[$item['value']] = $item['text'];
				});

				return Form::select($fieldName, $valuesArr, $fieldValue, $attributesArr);
			break;

			case 'radio':
				// Grab the values
				$valuesArr = [];
				$field->values->each(function ($item) use (&$valuesArr) {
					$valuesArr[$item['value']] = $item['text'];
				});
			break;
		}
	}

}
