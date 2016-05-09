<div v-cloak>
	<mobile>
		<p><a href="{{ route('admin.access.roles') }}" class="btn btn-default btn-lg btn-block">{!! icon('arrow-back') !!}<span>Back to Roles</span></a></p>
	</mobile>
	<desktop>
		<div class="btn-toolbar">
			<div class="btn-group">
				<a href="{{ route('admin.access.roles') }}" class="btn btn-default">{!! icon('arrow-back') !!}<span>Back to Roles</span></a>
			</div>
		</div>
	</desktop>

	{!! Form::open(['route' => 'admin.access.roles.store', 'class' => 'form-horizontal']) !!}
		<div class="form-group{{ ($errors->has('name')) ? ' has-error' : '' }}">
			<label class="col-md-2 control-label">Name</label>
			<div class="col-md-5">
				{!! Form::text('name', null, ['class' => 'form-control input-lg', 'v-model' => 'name', '@change' => 'updateName']) !!}
				{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
			</div>
		</div>

		<div class="form-group{{ ($errors->has('key')) ? ' has-error' : '' }}">
			<label class="col-md-2 control-label">Key</label>
			<div class="col-md-3">
				{!! Form::text('key', null, ['class' => 'form-control input-lg', 'v-model' => 'key', '@change' => 'updateKey']) !!}
				{!! $errors->first('key', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-5 col-md-offset-2">
				<p class="help-block">Role keys are a unique name for the role mainly used for looking up role information quickly. This should not be confused with the name that is a human-readable form of the key.</p>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label">Description</label>
			<div class="col-md-6">
				{!! Form::textarea('description', null, ['class' => 'form-control input-lg', 'rows' => 4, 'v-model' => 'description']) !!}
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label">Permissions</label>
			<div class="col-md-10">
				@foreach ($permissions as $component => $permission)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">{{ $component }}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								@foreach ($permission as $p)
									<div class="col-md-4">
										<label class="checkbox-inline">
											{!! Form::checkbox('permissions[]', $p->id, false, ['v-model' => 'permissions']) !!}
											{!! $p->present()->name !!}
										</label>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-5 col-md-offset-2">
				<mobile>
					<p>{!! Form::button("Add Role", ['class' => 'btn btn-primary btn-lg btn-block', 'type' => 'submit']) !!}</p>
				</mobile>
				<desktop>
					<div class="btn-toolbar">
						<div class="btn-group">
							{!! Form::button("Add Role", ['class' => 'btn btn-primary btn-lg', 'type' => 'submit']) !!}
						</div>
					</div>
				</desktop>
			</div>
		</div>
	{!! Form::close() !!}
</div>