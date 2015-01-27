@extends('layouts.setup')

@section('title')
	Install {{ config('nova.app.name') }}
@stop

@section('header')
	Install {{ config('nova.app.name') }}
@stop

@section('content')
	<h1>Install {{ config('nova.app.name') }}</h1>
@stop

@section('controls')
	<div class="row">
		<div class="col-md-6">
			<p><a href="{{ route('setup.install.config.email') }}" class="btn btn-link">Back: Email Settings</a></p>
		</div>
		<div class="col-md-6 text-right">
			<p><a class="btn btn-link disabled">Next: Create User</a></p>
		</div>
	</div>
@stop

@section('scripts')
	<script>
		$(document).ready(function()
		{
			$.ajax({
				type: "POST",
				url: "{{ url('setup/install/nova') }}",
				data: {
					"_token": "{{ csrf_token() }}"
				},
				success: function(data)
				{
					window.location = "{{ url('setup/install/nova/success') }}"
				}
			});
		});
	</script>
@stop