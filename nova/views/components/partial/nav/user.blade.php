<ul class="nav navbar-nav navbar-right">
	@if ($loggedIn)
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				@if ($notifyTotal > 0)
					<span class="label{{ $notifyClass }}">{{ $notifyTotal }}</span>
				@endif
				{{ $name }} <b class="caret"></b>
			</a>

			<ul class="dropdown-menu">
			@foreach ($data as $key => $section)
				@if ($key != 0)
					<li class="divider"></li>
				@endif
				
				@foreach ($section as $item)
					<li>{{ HTML::link($item['url'], $item['name'].$item['additional'], $item['extra']) }}</li>
				@endforeach
			@endforeach
			</ul>
		</li>
	@else
		<li>{{ HTML::link('login', $loginText) }}</li>
	@endif
</ul>