<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ $title }}</title>
		
		<meta name="description" content="{{ $settings->meta_description }}">
		<meta name="keywords" content="{{ $settings->meta_keywords }}">
		<meta name="author" content="{{ $settings->meta_author }}">
		
		<!-- Bootstrap styles -->
		{{ HTML::style('nova/assets/css/bootstrap.min.css') }}

		<!-- Web font stylesheet -->
		{{ HTML::style('nova/assets/css/fonts.css') }}
		
		<!-- Nova's base styles and any user-defined styles -->
		@if (is_file(APPPATH.'views/'.$skin.'/design/style.admin.css'))
			{{ HTML::style('app/views/'.$skin.'/design/style.admin.css') }}
		@else
			{{ HTML::style('nova/views/design/style.css') }}
			{{ HTML::style('nova/views/design/style.admin.css') }}
			
			@if (is_file(APPPATH.'views/'.$skin.'/design/custom.admin.css'))
				{{ HTML::style('app/views/'.$skin.'/design/custom.admin.css') }}
			@endif
		@endif
	</head>
	<body>
		{{ $template }}
		
		<!-- Nova's core Javascript -->
		<?php include NOVAPATH.'views/components/js/core/admin_js.php';?>

		<!-- Nova's per-page Javascript -->
		{{ $javascript }}
	</body>
</html>