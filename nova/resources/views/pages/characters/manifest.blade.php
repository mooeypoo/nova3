@extends('layouts.app')

@section('title', 'Manifest')

@section('content')
	<div class="d-flex align-items-center justify-content-between">
		<h1 class="my-0">Manifest</h1>
		<div>
			<a class="btn btn-secondary js-webuiPopover"
			   id="manifest-filters-trigger"
			   tabindex="0"
			   data-animation="pop"
			   data-placement="bottom-left"
			   data-offset-top="3"
			   data-width="275"
			   data-title="Filter Manifest"
			   data-url="#manifest-filters-content">{!! icon('filter') !!}</a>

			@can('update', $settingsClass)
				<a class="btn btn-secondary js-webuiPopover ml-1"
				   id="manifest-options-trigger"
				   tabindex="0"
				   data-animation="pop"
				   data-placement="bottom-left"
				   data-offset-top="3"
				   data-title="Manifest Options"
				   data-url="#manifest-options-content">{!! icon('settings-alt') !!}</a>
			@endcan
		</div>
	</div>

	<div v-show="layout == 'list'">
		<div class="row my-4" v-for="dept in filteredDepartments">
			<div class="col-12 col-lg-3">
				<p class="lead my-0">@{{ dept.name }}</p>
			</div>

			<div class="col-12 col-lg-9">
				<div v-for="position in dept.positions">
					<div class="row d-flex align-items-center mb-4"
						 v-for="character in filterCharacters(position.characters)"
						 v-if="position.characters.length > 0">
						<div class="col col-auto">
							<rank :item="character.rank"></rank>
						</div>
						<div class="col">
							<avatar :item="character">
								@{{ position.name }}
							</avatar>
						</div>
						<div class="col col-auto">
							<a :href="bioLink(character.id)" class="btn btn-lg btn-link text-muted">{!! icon('user-alt') !!}</a>
						</div>
					</div>

					<div class="row d-flex align-items-center mb-4" v-if="position.available > 0 && showAvailable">
						<div class="col col-auto">
							<rank></rank>
						</div>
						<div class="col">
							<position-available :position="position" :show-image="false"></position-available>
						</div>
					</div>
				</div>
			</div>

			<div class="col" v-if="dept.sub_departments.length > 0">
				<div class="row my-5" v-for="subDept in dept.sub_departments">
					<div class="col-12 col-lg-3">
						<p class="lead my-0">@{{ subDept.name }}</p>
					</div>

					<div class="col-12 col-lg-9">
						<div v-for="position in subDept.positions">
							<div class="row d-flex align-items-center mb-4"
								 v-for="character in filterCharacters(position.characters)"
								 v-if="position.characters.length > 0">
								<div class="col col-auto">
									<rank :item="character.rank"></rank>
								</div>
								<div class="col">
									<avatar :item="character">
										@{{ position.name }}
									</avatar>
								</div>
								<div class="col col-auto">
									<a :href="bioLink(character.id)" class="btn btn-lg btn-link text-muted">{!! icon('user-alt') !!}</a>
								</div>
							</div>

							<div class="row d-flex align-items-center mb-4" v-if="position.available > 0 && showAvailable">
								<div class="col col-auto">
									<rank></rank>
								</div>
								<div class="col">
									<position-available :position="position" :show-image="false"></position-available>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div v-show="layout == 'cards'">
		<div class="row my-4" v-for="dept in filteredDepartments">
			<div class="col-12">
				<p class="lead">@{{ dept.name }}</p>
			</div>

			<div class="col-12">
				<div class="row mb-4">
					<div class="col-md-6 col-lg-4"
						 :data-position="position.id"
						 v-for="position in dept.positions"
						 v-if="shouldShow(position.id)">
						<div class="card"
							 v-for="character in filterCharacters(position.characters)"
							 v-if="position.characters.length > 0">
							<div class="card-body">
								<div class="d-flex justify-content-around">
									<avatar :item="character" layout="stacked">
										@{{ position.name }}
									</avatar>
								</div>
								<div class="d-flex justify-content-around mt-3">
									<div v-if="character.rank">
										<rank :item="character.rank"></rank>
									</div>
									<div v-else>
										<rank></rank>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<a :href="bioLink(character.id)" class="btn btn-lg btn-link text-muted">{!! icon('user-alt') !!}</a>
							</div>
						</div>

						<div class="card" v-if="position.available > 0 && showAvailable">
							<div class="card-body">
								<div class="d-flex justify-content-around">
									<position-available :position="position" layout="stacked"></position-available>
								</div>
								<div class="d-flex justify-content-around mt-3">
									<rank></rank>
								</div>
							</div>
							<div class="card-footer">
								<a href="#" class="btn btn-lg btn-link text-muted">{!! icon('arrow-right') !!}</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col" v-if="dept.sub_departments.length > 0">
				<div class="row my-5" v-for="subDept in dept.sub_departments">
					<div class="col-12">
						<p class="lead">@{{ subDept.name }}</p>
					</div>

					<div class="col-12">
						<div class="row mb-4">
							<div class="col-md-6 col-lg-4" v-for="position in subDept.positions">
								<span v-for="character in filterCharacters(position.characters)"
									  v-if="position.characters.length > 0">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-around">
												<avatar :item="character" layout="stacked">
													@{{ position.name }}
												</avatar>
											</div>
											<div class="d-flex justify-content-around mt-3">
												<div v-if="character.rank">
													<rank :item="character.rank"></rank>
												</div>
												<div v-else>
													<rank></rank>
												</div>
											</div>
										</div>
										<div class="card-footer">
											<a :href="bioLink(character.id)" class="btn btn-lg btn-link text-muted">{!! icon('user-alt') !!}</a>
										</div>
									</div>
								</span>

								<span v-if="position.available > 0 && showAvailable">
									<div class="card">
										<div class="card-body">
											<div class="d-flex justify-content-around">
												<position-available :position="position"
																	layout="stacked">
												</position-available>
											</div>
											<div class="d-flex justify-content-around mt-3">
												<rank></rank>
											</div>
										</div>
										<div class="card-footer">
											<a href="#" class="btn btn-lg btn-link text-muted">{!! icon('arrow-right') !!}</a>
										</div>
									</div>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="d-none">
		<div id="manifest-filters-content">
			<div class="form-group">
				<label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" v-model="showCharacters">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description">Characters</span>
				</label>
			</div>

			<div class="form-group">
				<label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" v-model="showNPCs">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description">NPCs</span>
				</label>
			</div>

			<div class="form-group">
				<label class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" v-model="showInactive">
					<span class="custom-control-indicator"></span>
					<span class="custom-control-description">Inactive characters</span>
				</label>
			</div>

			<label class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" v-model="showAvailable">
				<span class="custom-control-indicator"></span>
				<span class="custom-control-description">Available positions</span>
			</label>
		</div>

		@can('update', $settingsClass)
			<div id="manifest-options-content">
				<div class="form-group">
					<label class="custom-control custom-radio d-flex align-items-center">
						<input name="layout" type="radio" value="list" class="custom-control-input" v-model="layout">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description d-flex align-items-center">
							{!! icon('list', 'fa-lg fa-fw mr-2 text-muted') !!}
							<span>List</span>
						</span>
					</label>
				</div>

				<div class="form-group">
					<label class="custom-control custom-radio d-flex align-items-center">
						<input name="layout" type="radio" value="cards" class="custom-control-input" v-model="layout">
						<span class="custom-control-indicator"></span>
						<span class="custom-control-description d-flex align-items-center">
							{!! icon('cards', 'fa-lg fa-fw mr-2 text-muted') !!}
							<span>Cards</span>
						</span>
					</label>
				</div>

				<p class="text-info mb-0"><strong>Note:</strong> Manifest layout changes will apply to all visitors.</p>
			</div>
		@endcan
	</div>
@endsection

@section('js')
	<script>
		vue = {
			data: {
				departments: {!! $departments !!},
				layout: "{{ $_settings->manifest_layout }}",
				search: '',
				showAvailable: {{ $_settings->manifest_show_available }},
				showInactive: {{ $_settings->manifest_show_inactive }},
				showNPCs: {{ $_settings->manifest_show_npcs }},
				showCharacters: {{ $_settings->manifest_show_assigned }}
			},

			computed: {
				filteredDepartments () {
					return filter(this.departments, this.search)
				}
			},

			methods: {
				bioLink (id) {
					return route('characters.bio', {character:id});
				},

				filterCharacters (characters) {
					let self = this;

					let charactersToShow = characters.filter(function (c) {
						if (self.showInactive) {
							return c.status == {{ Status::ACTIVE }}
								|| c.status == {{ Status::INACTIVE }};
						}

						return c.status == {{ Status::ACTIVE }};
					});

					if (! this.showNPCs) {
						charactersToShow = charactersToShow.filter(function (c) {
							return c.user_id !== null;
						});
					}

					if (! this.showCharacters) {
						charactersToShow = charactersToShow.filter(function (c) {
							return c.user_id === null;
						});
					}

					return charactersToShow;
				},

				shouldShow (position) {
					console.log(document.querySelectorAll('[data-position="' + position + '"]'));
					return $('[data-position="' + position + '"]').html() != '';
				}
			},

			watch: {
				layout (newValue, oldValue) {
					let data = {
						'manifest_layout': newValue
					};

					axios.patch(route('settings.update'), data)
						 .then(function (response) {
						 	flash('Manifest layout option has been updated.', 'Settings updated');
						 })
						 .catch(function (error) {
						 	//
						 });
				},

				showCharacters (newValue, oldValue) {
					if (newValue == false) {
						this.showInactive = false;
					}
				}
			},

			mounted () {
				$('.js-webuiPopover').webuiPopover();
			}
		}

		function filter (data, term) {
			let matches = []
			let regex = new RegExp(term, 'i')

			if (! Array.isArray(data)) {
				return matches
			}

			data.forEach(function (d) {
				if (regex.test(d.name)) {
					matches.push(d)
				} else {
					let positionsResults = filter(d.positions, term)
					if (positionsResults.length > 0) {
						matches.push(Object.assign({}, d, { positions: positionsResults }))
					}

					let subDepartmentsResults = filter(d.sub_departments, term)
					if (subDepartmentsResults.length > 0) {
						matches.push(Object.assign({}, d, { sub_departments: subDepartmentsResults }))
					}

					let charactersResults = filter(d.characters, term)
					if (charactersResults.length > 0) {
						matches.push(Object.assign({}, d, { characters: charactersResults }))
					}
				}
			})

			return matches
		}
	</script>
@endsection