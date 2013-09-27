<?php namespace Nova\Core\Models\Eloquent;

use Str;
use Cache;
use Event;
use Model;
use Config;

class SiteContent extends Model {

	public $timestamps = false;

	protected $table = 'site_contents';

	protected $fillable = [
		'key', 'label', 'content', 'type', 'section', 'page', 'mode', 'uri',
	];
	
	protected static $properties = [
		'id', 'key', 'label', 'content', 'type', 'section', 'page', 'protected', 
		'mode', 'uri',
	];

	/*
	|--------------------------------------------------------------------------
	| Model Scopes
	|--------------------------------------------------------------------------
	*/

	public function scopeUri($query, $uri)
	{
		$query->where('uri', $uri);
	}

	/*
	|--------------------------------------------------------------------------
	| Model Accessors
	|--------------------------------------------------------------------------
	*/

	public function setUriAttribute($value)
	{
		if ($this->type == 'header' or $this->type == 'title' or $this->type == 'message')
		{
			// Find the record that matches the URI
			$route = \SystemRouteModel::name($value)->get();

			// Get the final route to use
			$finalRoute = ($route->count() > 1)
				? $route->filter(function($r){ return (bool) $r->protected === false; })->first()
				: $route->first();

			// Parse the route URI
			$routeUri = Str::parseCallback($finalRoute->resource, false);

			// Set the section and page
			$this->attributes['section'] = strtolower(Str::denamespace($routeUri[0]));
			$this->attributes['page'] = (substr($routeUri[1], 0, 3) == 'get')
				? strtolower(substr_replace($routeUri[1], '', 0, 3))
				: strtolower($routeUri[1]);
		}
		
		// Set the URI
		$this->attributes['uri'] = $value;
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
		static::setupEventListeners($a['SiteContentModel'], $a['SiteContentModelEventHandler']);
	}
	
	/**
	 * Get a specific piece of content from the database.
	 *
	 * @param	string	The key of the content to get
	 * @param	bool	Whether to pull only the value or the full object
	 * @return	string|SiteContent
	 */
	public static function getContentItem($key, $valueOnly = true)
	{
		// Get the content
		$result = static::getItems('key', $key)->first();

		if ($valueOnly)
		{
			return $result->content;
		}
		
		return $result;
	}
	
	/**
	 * Get all of the content for a section from the database.
	 *
	 * @param	string	The type of message to pull
	 * @param	string	The section to pull for
	 * @param	bool	Ignore the cache
	 * @return	array
	 */
	public static function getSectionContent($type, $section, $clean = false)
	{
		// Try to get the cache first
		$cache = ( ! $clean) ? Cache::get("nova.content.{$type}.{$section}") : null;

		// If we have something in the cache, return it instead of querying
		if ($cache !== null)
		{
			return $cache;
		}

		// Start a new Query Builder
		$query = static::startQuery();

		// Query the database
		$result = $query->where('type', $type)->where('section', $section)->get();
			
		if (count($result) > 0)
		{
			foreach ($result as $row)
			{
				// Set the content as a variable so we can change it
				$content = $row->content;
				
				// Find the pattern {{table: key}} in the content
				preg_match_all('/{{([a-zA-Z]+): ([a-zA-Z_-]+)}}/', $content, $arr, PREG_PATTERN_ORDER);
				
				// Make sure there were matches
				if (count($arr[0]) > 0)
				{
					// Loop through the matches and make the changes
					foreach ($arr[2] as $k => $v)
					{
						// Get the item from the settings table
						$replace = \SettingsModel::getSettings($v);
						
						// Set the new content
						$content = str_replace($arr[0][$k], $replace, $content);
					}
				}

				// Set the page
				$page = $row->page;

				// Clean it up
				$page = str_replace('-', '', $page);
				$page = str_replace('_', '', $page);

				// Set the items with the content
				if ( ! empty($row->mode))
				{
					$values["{$page}.{$row->mode}"] = $content;
				}
				else
				{
					$values[$page] = $content;
				}
			}
			
			// Cache the information
			Cache::forever("nova.content.{$type}.{$section}", $values);

			return $values;
		}

		return [];
	}
	
	/**
	 * Update site content.
	 *
	 * You can also pass a larger array with multiple values to the method to
	 * update multiple settings at the same time. The data array just needs to
	 * stay in the (setting key) => (setting value) format.
	 *
	 * @param	array 	The data for updating the site content
	 * @return	void
	 */
	public static function updateSiteContent(array $data)
	{
		foreach ($data as $key => $value)
		{
			// Start a new query
			$query = static::startQuery();

			$record = $query->where('key', $key)->first();
			
			// Track what we need to clear and re-cache
			$clear[$record->section][] = $record->type;
			
			$record->content = $value;
			$record->save();
		}
		
		foreach ($clear as $section => $type)
		{
			foreach ($type as $t)
			{
				// Delete the cached item
				Cache::forget("nova.content.{$t}.{$section}");
				
				// Now grab that content again (which will automatically re-cache everything)
				static::getSectionContent($t, $section);
			}
		}
	}

}