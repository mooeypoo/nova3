@extends('layouts.app')

@section('title', _m('genre-depts'))

@section('content')
	<h1>{{ _m('genre-depts') }}</h1>

	@if ($departments->count() > 0)
		<div class="data-table bordered striped">
			<div class="row header">
				<div class="col-9 col-md-6">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="{{ _m('genre-dept-find') }}" v-model="searchDepartments">
						<span class="input-group-btn">
							<a class="btn btn-secondary" href="#" @click.prevent="searchDepartments = ''">{!! icon('close') !!}</a>
						</span>
					</div>
				</div>
				<div class="col hidden-sm-down"></div>
				<div class="col col-xs-auto">
					<div class="btn-toolbar pull-right">
						@can('create', $deptClass)
							<a href="{{ route('departments.create') }}" class="btn btn-success">{!! icon('add') !!}</a>
						@endcan

						@can('update', $deptClass)
							<div class="dropdown ml-2">
								<button type="button"
	  									class="btn btn-secondary btn-action"
	  									data-toggle="dropdown"
	  									aria-haspopup="true"
	  									aria-expanded="false">
									{!! icon('more') !!}
								</button>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="{{ route('departments.reorder') }}" class="dropdown-item">
										{!! icon('move') !!} {{ _m('genre-depts-reorder') }}
									</a>
								</div>
							</div>
						@endcan
					</div>
				</div>
			</div>
			<div class="row" v-for="dept in filteredDepartments">
				<div class="col">
					<div class="row align-items-center">
						<div class="col-9">
							@{{ dept.name }}
						</div>
						<div class="col col-xs-auto">
							<div class="dropdown pull-right">
								<button class="btn btn-secondary btn-action"
										type="button"
										id="dropdownMenuButton"
										data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false">
									{!! icon('more') !!}
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
									@can('update', $deptClass)
										<a :href="'/admin/departments/' + dept.id + '/edit'" class="dropdown-item">{!! icon('edit') !!} {{ _m('edit') }}</a>
									@endcan

									@can('delete', $deptClass)
										<a href="#" class="dropdown-item text-danger" :data-department="dept.id" @click.prevent="deleteDepartment">{!! icon('delete') !!} {{ _m('delete') }}</a>
									@endcan
								</div>
							</div>
						</div>
					</div>

					<div class="row align-items-center"
						 v-if="dept.sub_departments.length > 0"
						 v-for="subDept in dept.sub_departments">
						<div class="col-9">
							<span class="ml-4">
								@{{ subDept.name }}
							</span>
						</div>
						<div class="col col-xs-auto">
							<div class="dropdown pull-right">
								<button class="btn btn-secondary btn-action"
										type="button"
										id="dropdownMenuButton"
										data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false">
									{!! icon('more') !!}
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
									@can('update', $deptClass)
										<a :href="'/admin/departments/' + subDept.id + '/edit'" class="dropdown-item">{!! icon('edit') !!} {{ _m('edit') }}</a>
									@endcan

									@can('delete', $deptClass)
										<a href="#" class="dropdown-item text-danger" :data-department="subDept.id" @click.prevent="deleteDepartment">{!! icon('delete') !!} {{ _m('delete') }}</a>
									@endcan
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@else
		<div class="alert alert-warning">
			{{ _m('genre-dept-error-not-found') }} <a href="{{ route('departments.create') }}" class="alert-link">{{ _m('genre-dept-error-add') }}</a>
		</div>
	@endif
@endsection

@section('js')
	<script>
		vue = {
			data: {
				departments: {!! $departments !!},
				searchDepartments: ''
			},

			computed: {
				filteredDepartments () {
					let self = this

					return self.departments.filter(function (dept) {
						let searchRegex = new RegExp(self.searchDepartments, 'i')

						return searchRegex.test(dept.name)
					})
				}
			},

			methods: {
				deleteDepartment (event) {
					$.confirm({
						title: "{{ _m('genre-dept-delete-title') }}",
						content: "{{ _m('genre-dept-delete-message') }}",
						theme: "dark",
						buttons: {
							confirm: {
								text: "{{ _m('delete') }}",
								btnClass: "btn-danger",
								action () {
									let department = $(event.target).closest('a').data('department')

									axios.delete('/admin/departments/' + department)

									window.setTimeout(function () {
										window.location.replace('/admin/departments')
									}, 1000)
								}
							},
							cancel: {
								text: "{{ _m('cancel') }}"
							}
						}
					})
				}
			}
		}
	</script>
@endsection