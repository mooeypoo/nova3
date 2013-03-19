<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Nova 3 &bull; {{ $title }}</title>
		
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Anodyne Productions">
		
		@if (isset($_redirect))
			{{ $_redirect }}
		@endif

		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<link rel="stylesheet" href="{{ SRCURL }}Assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ SRCURL }}Assets/css/icomoon.css">
		<link rel="stylesheet" href="{{ SRCURL }}Setup/views/design/style.css">

		<!-- High pixel density displays -->
		<link rel='stylesheet' href='{{ SRCURL }}Setup/views/design/retina.css' media='only screen and (-moz-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)'>
	</head>
	<body>
		{{ $layout }}

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="{{ SRCURL }}Assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				$('.tip-above').tooltip();
				$('.tip-below').tooltip({ placement: 'bottom' });
			});
		</script>
		{{ $javascript }}
	</body>
</html>