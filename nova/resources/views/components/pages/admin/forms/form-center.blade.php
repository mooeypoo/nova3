@if ($forms->count() > 0)
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<p><a href="#fc-form" class="btn btn-success btn-block" data-toggle="tab">Fill Out Form</a></p>
					<a href="#fc-entries" class="btn btn-default btn-block" data-toggle="tab">My Entries</a>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">All Forms</h4>
				</div>
				<div class="list-group">
					@foreach ($forms as $f)
						<a href="{{ route('admin.forms.formcenter.dashboard', [$f->key]) }}" data-form-key="{{ $f->key }}" class="list-group-item" >{!! $f->present()->name !!}</a>
					@endforeach
				</div>
			</div>
		</div>

		<div class="col-md-9 form-center-container">
			<h2>{!! $form->present()->name !!}</h2>

			{!! $form->present()->message !!}

			<hr>

			<div class="tab-content">
				<div class="tab-pane{{ ($entries->count() > 0) ? ' active' : '' }}" id="fc-entries">
					@if ($entries->count() > 0)
						<h3>My Entries</h3>

						<div class="data-table data-table-striped data-table-bordered">
						@foreach ($entries as $entry)
							<div class="row">
								<div class="col-md-8">
									<p>{{ $entry->present()->createdAt }}</p>
								</div>
								<div class="col-md-4">
									<mobile>
										@if ($_user->canEditFormEntry($form))
											<p><a href="#" class="btn btn-default btn-lg btn-block" data-form-key="{{ $form->key }}" data-form-state="edit" data-id="{{ $entry->id }}">Edit</a></p>
										@endif

										@if ($_user->canRemoveFormEntry($form))
											<p><a href="#" class="btn btn-danger btn-lg btn-block">Remove</a></p>
										@endif
									</mobile>
									<desktop>
										<div class="btn-toolbar pull-right">
											@if ($_user->canEditFormEntry($form))
												<div class="btn-group">
													<a href="#" class="btn btn-default" data-form-key="{{ $form->key }}" data-form-state="edit" data-id="{{ $entry->id }}">Edit</a>
												</div>
											@endif

											@if ($_user->canRemoveFormEntry($form))
												<div class="btn-group">
													<a href="#" class="btn btn-danger">Remove</a>
												</div>
											@endif
										</div>
									</desktop>
								</div>
							</div>
						@endforeach
						</div>
					@else
						{!! alert('warning', "You don't have any entries for this form") !!}
					@endif
				</div>
				<div class="tab-pane{{ ($entries->count() == 0) ? ' active' : '' }}" id="fc-form">
					{!! $form->present()->renderNewForm() !!}
				</div>
			</div>
		</div>
	</div>
@else
	{!! alert('warning', "No Form Center forms found") !!}
@endif