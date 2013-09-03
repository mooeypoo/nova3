<p>{{ lang('short.deleteConfirm', lang('field'), $name) }}</p>

{{ Form::open(['url' => 'admin/form/fields/'.$formKey]) }}
	{{ Form::token() }}
	{{ Form::hidden('id', $id) }}
	{{ Form::hidden('action', 'delete') }}
	{{ Form::button(lang('Action.delete'), ['type' => 'submit', 'class' => 'btn btn-danger']) }}
{{ Form::close() }}