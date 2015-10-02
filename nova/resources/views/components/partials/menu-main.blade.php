<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="{{ route('home') }}" class="navbar-brand">{{ $_content->get('sim.name') }}</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			@foreach ($items as $item)
				<li>{!! $item->present()->anchorTag() !!}</li>
			@endforeach
			</ul>

			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li><a href="{{ route('logout') }}">Log Out</a></li>
				@else
					<li><a href="{{ route('login') }}">Log In</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>