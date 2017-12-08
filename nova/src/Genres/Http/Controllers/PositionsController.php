<?php namespace Nova\Genres\Http\Controllers;

use Controller;
use Nova\Genres\Position;
use Nova\Genres\Department;

class PositionsController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->middleware('auth');

		$this->views('admin', 'structure|template');
	}

	public function index()
	{
		$positionClass = new Position;

		$this->authorize('manage', $positionClass);

		$this->views('genres.all-positions', 'page|script');

		$this->pageTitle = _m('genre-positions', [2]);

		$this->data->positionClass = $positionClass;
		$this->data->positions = Position::orderBy('order')->get();
		$this->data->departments = Department::with('subDepartments')
			->parents()
			->orderBy('order')
			->get();
	}

	public function create()
	{
		$this->authorize('create', new Position);

		$this->views('genres.create-position', 'page|script');

		$this->pageTitle = _m('genre-positions-add', [1]);

		$this->data->departments = Department::orderBy('order')
			->get()
			->pluck('name', 'id');
	}

	public function store()
	{
		$this->renderWithTheme = false;

		$this->authorize('create', new Position);

		$this->validate(request(), [
			'name' => 'required',
			'department_id' => 'required|exists:departments,id'
		], [
			'name.required' => _m('validation-name-required'),
			'department_id.required' => _m('genre-positions-validation-dept-required'),
			'department_id.exists' => _m('genre-positions-validation-dept-exists'),
		]);

		creator(Position::class)->with(request()->all())->create();

		flash()
			->title(_m('genre-positions-flash-added-title'))
			->message(_m('genre-positions-flash-added-message'))
			->success();

		return redirect()->route('positions.index');
	}

	public function update()
	{
		$this->renderWithTheme = false;

		$this->authorize('update', new Position);

		$this->validate(request(), [
			'positions.*.name' => 'required',
			'positions.*.department_id' => 'required|exists:departments,id'
		], [
			'positions.*.name.required' => _m('validation-name-required'),
			'positions.*.department_id.required' => _m('genre-positions-validation-dept-required'),
			'positions.*.department_id.exists' => _m('genre-positions-validation-dept-exists'),
		]);

		updater(Position::class)->with(request('positions'))->updateAll();

		return response(200);
	}

	public function destroy(Position $position)
	{
		$this->renderWithTheme = false;

		$this->authorize('delete', $position);

		deletor(Position::class)->delete($position);

		return response($position, 200);
	}

	public function reorder()
	{
		$this->renderWithTheme = false;

		$this->authorize('update', new Position);

		collect(request('positions'))->each(function ($id, $index) {
			Position::find($id)->reorder($index);
		});

		return response(200);
	}
}
