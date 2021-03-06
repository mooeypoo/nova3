<?php namespace Nova\Users\Policies;

use Nova\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
	use HandlesAuthorization;

	public function view(User $user, User $actionUser)
	{
		return true;
	}

	public function create(User $user)
	{
		return $user->can('user.create');
	}

	public function manage(User $user, User $actionUser)
	{
		return ($this->create($user)
			or $this->update($user, $actionUser)
			or $this->delete($user, $actionUser));
	}

	public function media(User $user, User $actionUser)
	{
		return $this->manage($user, $actionUser)
			or (int) $user->id === (int) $actionUser->id;
	}

	public function update(User $user, User $actionUser)
	{
		return $user->can('user.update');
	}

	public function updateProfile(User $user, User $actionUser)
	{
		return (int) $user->id === (int) $actionUser->id;
	}

	public function delete(User $user, User $actionUser)
	{
		return $user->can('user.delete');
	}
}
