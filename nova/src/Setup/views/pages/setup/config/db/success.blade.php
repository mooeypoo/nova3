@extends('layouts.setup')

@section('title', 'Configure Database')

@section('header', 'Configure Database')

@section('content')
	<h1>Database Connection Configured</h1>

	<p>We've verified the connection to the database and created the necessary config file for you. If you need to change your database configuration, you can either edit the <nobr><code>config/database.php</code></nobr> file manually or delete the <nobr><code>config/database.php</code></nobr> file and run this step of the installer again.</p>
@stop

@section('controls')
	<div class="row">
		<div class="col-md-6 push-md-6 text-right">
			<p><a href="{{ route('setup.'.$_setupType.'.config.email') }}" class="btn btn-primary btn-lg">Next: Email Settings</a></p>
		</div>
		<div class="col-md-6 pull-md-6">
			<p><a href="{{ route('setup.'.$_setupType.'.config.db') }}" class="btn btn-link btn-lg">Back: Restart Database Connection</a></p>
		</div>
	</div>
@stop