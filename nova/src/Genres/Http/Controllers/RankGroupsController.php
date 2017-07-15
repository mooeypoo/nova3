<?php namespace Nova\Genres\Http\Controllers;

use Controller;
use Nova\Genres\RankGroup;

class RankGroupsController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->middleware('auth');
	}

	public function index()
	{
		$rankGroupClass = new RankGroup;

		$this->authorize('manage', $rankGroupClass);

		$rankGroups = RankGroup::orderBy('order')->get();

		return view('pages.genres.ranks.all-groups', compact('rankGroups', 'rankGroupClass'));
	}

	public function create()
	{
		$this->authorize('create', new RankGroup);

		return view('pages.genres.ranks.create-group');
	}

	public function store()
	{
		$this->authorize('create', new RankGroup);

		$this->validate(request(), [
			'name' => 'required',
		], [
			'name.required' => _m('validation-required-name'),
		]);

		creator(RankGroup::class)->with(request()->all())->create();

		flash()
			->title(_m('genre-rank-groups-flash-added-title'))
			->message(_m('genre-rank-groups-flash-added-message'))
			->success();

		return redirect()->route('ranks.groups.index');
	}

	public function update()
	{
		# code...
	}

	public function destroy(RankGroup $rankGroup)
	{
		# code...
	}

	public function reorder()
	{
		$this->authorize('update', new RankGroup);

		collect(request('groups'))->each(function ($id, $index) {
			RankGroup::find($id)->reorder($index);
		});

		return response([200]);
	}
}
