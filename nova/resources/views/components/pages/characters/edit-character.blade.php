<h1>{{ _m('characters-update') }}</h1>

{!! Form::model($character, ['route' => ['characters.update', $character], 'method' => 'patch']) !!}
	<div class="row">
		<div class="md:col-6">
			<text-input label="{{ _m('name') }}" value="{{ $character->name }}"></text-input>

			{{-- <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
				<label>{{ _m('name') }}</label>
				{!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name') ? ' form-control-danger' : '')]) !!}
				{!! $errors->first('name', '<p class="form-control-feedback">:message</p>') !!}
			</div> --}}
		</div>
	</div>

	<div class="row">
		<div class="md:col-6">
			<div class="field-wrapper">
				<label class="field-label">{{ _m('users', [1]) }}</label>
				<div class="field-group">
					@if ($character->user)
						<user-picker :selected="{{ $character->user }}"></user-picker>
					@else
						<user-picker></user-picker>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="md:col-6 lg:col-4">
			<div class="field-wrapper">
				<label class="field-label">{{ _m('genre-ranks', [1]) }}</label>
				<div class="field-group">
					@if ($character->rank)
						<rank-picker :selected="{{ $character->rank }}"></rank-picker>
					@else
						<rank-picker></rank-picker>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="md:col-6 lg:col-5">
			<div class="field-wrapper">
				<label class="field-label">{{ _m('genre-positions', [2]) }}</label>
				<div class="field-group" v-for="(position, index) in positions" :key="position.id">
					<div class="d-flex align-items-center">
						<position-picker :selected="position">
							<a href="#" class="text-secondary mx-2" @click.prevent="addPosition">{!! icon('add-alt') !!}</a>
							<a href="#"
							class="text-danger"
							v-show="positions.length > 1"
							@click.prevent="removePosition(index)">{!! icon('minus') !!}</a>
						</position-picker>
					</div>
					{!! $errors->first('positions', '<p class="invalid-feedback">:message</p>') !!}
				</div>
			</div>
		</div>
	</div>

	<fieldset>
		<legend>{{ _m('image', [2]) }}</legend>

		<media-manager :item="{{ $character }}" type="character"></media-manager>
	</fieldset>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">{{ _m('characters-update') }}</button>
		<a href="{{ route('characters.index') }}" class="btn btn-link">{{ _m('cancel') }}</a>
	</div>
{!! Form::close() !!}
