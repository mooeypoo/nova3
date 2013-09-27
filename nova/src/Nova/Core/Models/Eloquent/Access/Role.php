<?php namespace Nova\Core\Models\Eloquent\Access;

use Event;
use Model;
use Config;
use Cartalyst\Sentry\Groups\GroupInterface;

class Role extends Model implements GroupInterface {

	const INACTIVE		= 1;
	const USER			= 2;
	const ACTIVE		= 3;
	const POWERUSER		= 4;
	const ADMIN			= 5;
	const SYSADMIN		= 6;
	
	protected $table = 'roles';

	protected $fillable = [
		'name', 'desc', 'inherits',
	];

	protected $dates = [
		'created_at', 'updated_at',
	];
	
	protected static $properties = [
		'id', 'name', 'desc', 'inherits', 'created_at', 'updated_at',
	];

	/*
	|--------------------------------------------------------------------------
	| Relationships
	|--------------------------------------------------------------------------
	*/

	/**
	 * Has Many: Users
	 */
	public function users()
	{
		return $this->hasMany('UserModel', 'id');
	}

	/**
	 * Belongs To Many: Tasks
	 */
	public function tasks()
	{
		return $this->belongsToMany('AccessTaskModel', 'roles_tasks');
	}

	/*
	|--------------------------------------------------------------------------
	| Model Accessors
	|--------------------------------------------------------------------------
	*/

	public function getInheritsAttribute($value)
	{
		return explode(',', $value);
	}

	public function setInheritsAttribute($value)
	{
		$this->attributes['inherits'] = (is_array($value)) ? implode(',', $value) : $value;
	}

	/*
	|--------------------------------------------------------------------------
	| Model Methods
	|--------------------------------------------------------------------------
	*/

	/**
	 * Boot the model and define the event listeners.
	 *
	 * @return	void
	 */
	public static function boot()
	{
		parent::boot();

		// Get all the aliases
		$a = Config::get('app.aliases');

		// Setup the listeners
		static::setupEventListeners($a['AccessRoleModel'], $a['AccessRoleModelEventHandler']);
	}
	
	/**
	 * Get all the tasks.
	 *
	 * @param	bool	Get inherited tasks as well?
	 * @return	Collection
	 */
	public function getTasks($getInherited = true)
	{
		// Start the array for holding
		$groups = [];
		
		// Loop through this role's tasks
		foreach ($this->tasks as $task)
		{
			$groups[] = $task;
		}

		// If there are inherited roles, loop through those too
		if (count($this->inherits) > 0 and $getInherited)
		{
			$groups += $this->getInheritedTasks(true);
		}

		return $this->newCollection($groups);
	}

	/**
	 * Get all inherited tasks.
	 *
	 * @param	bool	Return an array (false) or a Collection (true)
	 * @return	Collection
	 */
	public function getInheritedTasks($returnArray = false)
	{
		// Make a temporary group holder
		$groups = [];

		if (count($this->inherits) > 0)
		{
			// Loop through the inherited roles
			foreach ($this->inherits as $i)
			{
				if ( ! empty($i))
				{
					// Start a new Query Builder
					$query = static::startQuery();

					// Put the tasks into the holding array
					$groups[] = $query->find($i)->getTasks(false);
				}
			}
		}

		if ($returnArray)
		{
			return $groups;
		}

		return $this->newCollection($groups);
	}

	/*
	|--------------------------------------------------------------------------
	| Sentry Group Interface Methods
	|--------------------------------------------------------------------------
	|
	| Sentry provides an interface of methods that need to be implemented by
	| the model. In Nova's case, some of these aren't applicable, and in those
	| situations, we simply throw exceptions. In others, we do things the way
	| we've chosen to setup our authorization system.
	|
	*/

	/**
	 * Returns the group's ID.
	 *
	 * @return	int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Returns the group's name.
	 *
	 * @return	string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns permissions for the group included inherited permissions.
	 *
	 * @return	array
	 */
	public function getPermissions()
	{
		return $this->getTasks();
	}

}