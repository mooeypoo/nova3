<?php namespace Nova\Characters\Http\Controllers;

use Controller;
use Nova\Users\User;
use Nova\Characters\Character;

class LinkCharactersController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->middleware('auth');
	}

	public function create()
	{
		$this->authorize('update', new Character);

		return view('pages.characters.link');
	}

	public function store()
	{
		$this->authorize('update', new Character);

		// Get the user
		$user = User::find(request('user'));

		// Get the character
		$character = Character::find(request('character'));

		// Assign the character to the user
		$character->assignToUser($user);

		return response($user->fresh()->characters, 200);
	}

	public function update()
	{
		$this->authorize('update', new Character);

		// Get the character
		$character = Character::findOrFail(request('character'));

		// Set the character as the primary character
		$character->setAsPrimaryCharacter();

		return response($character->user->fresh()->characters, 200);
	}

	public function destroy(Character $character)
	{
		$this->authorize('update', $character);

		// Detach the character from the user
		$character->unassignFromUser();

		return response(200);
	}
}
