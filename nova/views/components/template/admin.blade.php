<noscript>
	<div class="alert system-warning"><div class="container">@lang('short.javascript')</div></div>
</noscript>

{{ $navmain }}

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1>{{ $header }}</h1>
			</div>

			{{ $flash }}

			<div>{{ $message }}</div>

			{{ $content }}
			{{ $ajax }}

			<footer>
				{{ $footer }}
			</footer>
		</div>
	</div>
</div>