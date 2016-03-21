@if ($fields->count() > 0)
	@foreach ($fields as $field)
		<?php $restriction = $field->restrictionForType($action);?>
		
		@if ($restriction and $_user->hasRole($restriction))
			@if ($form->orientation == 'horizontal')
				<div class="form-group">
					@if (strlen($field->label) > 0)
						<label class="control-label {{ $field->label_container_class }}">{!! $field->present()->label !!}</label>
					@endif

					@if ($editable)
						<div class="{{ $field->field_container_class }}">
							{!! $field->present()->render !!}

							@if (strlen($field->help) > 0)
								<p class="help-block">{!! $field->present()->help !!}</p>
							@endif
						</div>
					@else
						<p class="form-control-static">Value</p>
					@endif
				</div>
			@else
				<div class="form-group">
					<div class="row">
						<div class="{{ $field->field_container_class }}">
							@if (strlen($field->label) > 0)
								<label class="control-label">{!! $field->present()->label !!}</label>
							@endif
							
							@if ($editable)
								<div>{!! $field->present()->render !!}</div>

								@if (strlen($field->help) > 0)
									<p class="help-block">{!! $field->present()->help !!}</p>
								@endif
							@else
								<p class="form-control-static">Value</p>
							@endif
						</div>
					</div>
				</div>
			@endif
		@endif
	@endforeach
@endif