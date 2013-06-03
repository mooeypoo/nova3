<div class="btn-group">
	@if (Sentry::getUser()->hasAccess('form.create'))
		<a href="#" class="btn btn-success icn-size-16 js-form-action" data-key="0" data-action="create">{{ $_icons['add'] }}</a>
	@endif
</div>

@if ($forms->count() > 0)
	<div class="row">
	@foreach ($forms as $form)
		<div class="col col-lg-6">
			<div class="thumbnail">
				@if (Sentry::getUser()->hasAccess('form.update'))
					<div class="btn-group pull-right dropdown">
						<a class="btn btn-default btn-small icn-size-16 dropdown-toggle" data-toggle="dropdown" href="#">{{ $_icons['settings'] }}</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#" class="js-form-action" data-key="{{ $form->key }}" data-action="update">
									{{ lang('Short.edit', lang('form')) }}
								</a>
							</li>
							<li>
								<a href="{{ URL::to('admin/form/fields/'.$form->key) }}">
									{{ lang('Short.edit', lang('fields')) }}
								</a>
							</li>
							<li>
								<a href="{{ URL::to('admin/form/tabs/'.$form->key) }}">
									{{ lang('Short.edit', lang('tabs')) }}
								</a>
							</li>
							<li>
								<a href="{{ URL::to('admin/form/sections/'.$form->key) }}">
									{{ lang('Short.edit', lang('sections')) }}
								</a>
							</li>
						</ul>
					</div>
				@endif

				<h4>{{ $form->name }}</h4>
			</div>
		</div>
	@endforeach
	</div>
@endif