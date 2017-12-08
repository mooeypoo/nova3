<h1>{{ _m('genre-positions', [2]) }}</h1>

@if ($positions->count() > 0)
	<div class="data-table bordered striped" id="sortable">
		<div class="row header">
			<div class="col">
				<mobile>
					<div v-show="mobileFilter || department == ''">
						{!! Form::departments(null, $departments, null, ['v-model' => 'department', 'placeholder' => _m('genre-depts-select'), '@change' => 'mobileFilter = false']) !!}
					</div>

					<div class="input-group" v-show="mobileSearch">
						<input type="text" class="form-control" placeholder="{{ _m('genre-positions-find') }}" v-model="search">
						<span class="input-group-btn">
							<a class="btn btn-secondary" href="#" @click.prevent="resetSearch">{!! icon('close') !!}</a>
						</span>
					</div>

					<a href="#"
					   class="btn btn-secondary"
					   @click.prevent="mobileFilter = true"
					   v-show="!mobileFilter && !mobileSearch && department != ''">{!! icon('filter') !!}</a>

					<a href="#"
					   class="btn btn-secondary"
					   @click.prevent="mobileSearch = true"
					   v-show="!mobileFilter && !mobileSearch && department != ''">{!! icon('search') !!}</a>
				</mobile>
				<desktop>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="{{ _m('genre-positions-find') }}" v-model="search">
						<span class="input-group-btn">
							<a class="btn btn-secondary" href="#" @click.prevent="search = ''">{!! icon('close') !!}</a>
						</span>
					</div>
				</desktop>
			</div>
			<div class="col d-none d-lg-block">
				{!! Form::departments(null, $departments, null, ['v-model' => 'department', 'placeholder' => _m('genre-depts-select')]) !!}
			</div>
			<div class="col col-auto" v-show="!mobileSearch">
				<mobile>
					<a href="#"
					   class="btn btn-secondary"
					   @click.prevent="mobileFilter = false"
					   v-show="mobileFilter && department != ''">{!! icon('close') !!}</a>
				</mobile>

				<div class="btn-toolbar" v-show="!mobileFilter">
					@can('create', $positionClass)
						<a href="{{ route('positions.create') }}" class="btn btn-success">{!! icon('add') !!}</a>
					@endcan

					@can('update', $positionClass)
						<a href="#"
						   class="btn btn-primary ml-2"
						   v-if="department != ''"
						   @click.prevent="updatePositions">{!! icon('check') !!}</a>
					@endcan
				</div>
			</div>
		</div>
		<div class="row" v-if="department == ''">
			<div class="col">
				<div class="alert alert-info mb-0">
					{{ _m('genre-positions-start') }}
				</div>
			</div>
		</div>
		<div class="row" v-if="department != '' && filteredPositions.length == 0">
			<div class="col">
				<div class="alert alert-warning mb-0">
					{{ _m('genre-positions-error-not-found-dept') }}
				</div>
			</div>
		</div>
		<div class="row align-items-start draggable-item"
			 :data-id="position.id"
			 v-if="department != '' && filteredPositions.length > 0"
			 v-for="position in filteredPositions">
			<desktop>
				<div class="col col-auto">
					<span class="sortable-handle text-subtle">{!! icon('reorder') !!}</span>
				</div>
			</desktop>
			<div class="col">
				<div class="row">
					<div class="col-md-6">
						<div :class="formGroupClasses('name', position.id)">
							<label>{{ _m('name') }}</label>
							<input type="text" class="form-control" v-model=position.name>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>{{ _m('genre-depts', [1]) }}</label>
							<div>
								{!! Form::departments(null, $departments, null, ['v-model' => 'position.department_id']) !!}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>{{ _m('description') }}</label>
							<textarea class="form-control" rows="5" v-model="position.description"></textarea>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>{{ _m('genre-positions-available') }}</label>
							<input type="number" class="form-control" min="0" v-model="position.available">
						</div>

						<div class="form-group">
							<label>{{ _m('displayed') }}</label>
							<div>
								<toggle-button class="toggle-switch"
											   :value="position.display == 1"
											   :data-position="position.id"
											   @change="toggleDisplay"></toggle-button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-auto">
				@can('delete', $positionClass)
					<a href="#"
					   class="btn btn-danger btn-action"
					   @click.prevent="deletePosition(position.id)">{!! icon('delete') !!}</a>
				@endcan

				<mobile>
					<div class="btn btn-block btn-secondary sortable-handle mt-3">{!! icon('reorder') !!}</div>
				</mobile>
			</div>
		</div>
	</div>
@else
	<div class="alert alert-warning">
		{{ _m('genre-positions-error-not-found') }} <a href="{{ route('positions.create') }}" class="alert-link">{{ _m('genre-positions-error-add') }}</a>
	</div>
@endif

<div class="alert alert-warning dirty" v-if="dirtyPositions">
	<span>{{ _m('genre-positions-unsaved') }}</span>
	<a href="#" class="alert-btn" @click.prevent="updatePositions">{{ _m('save-now') }}</a>
</div>