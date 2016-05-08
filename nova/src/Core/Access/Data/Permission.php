<?php namespace Nova\Core\Access\Data;

use Model,
	Role as RoleModel,
	PermissionPresenter;
use Laracasts\Presenter\PresentableTrait;

class Permission extends Model {

	use PresentableTrait;

	protected $table = 'permissions';

	protected $fillable = ['key', 'name', 'description'];

	protected $hidden = ['created_at', 'updated_at', 'pivot'];

	protected $casts = [
		'protected'	=> 'boolean',
	];

	protected $presenter = PermissionPresenter::class;

	//-------------------------------------------------------------------------
	// Relationships
	//-------------------------------------------------------------------------

	public function roles()
	{
		return $this->belongsToMany(RoleModel::class, 'roles_permissions');
	}

}
