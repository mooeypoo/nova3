<?php
/**
 * Compiles language files from pre-determined locations and recursively merges
 * them together to allow admins to override language files from the lang
 * directory.
 *
 * @package		Nova
 * @subpackage	Foundation
 * @category	Class
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */

namespace Nova\Foundation\Translation;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\LoaderInterface;

class CascadingFileLoader implements LoaderInterface {

	/**
	 * The filesystem instance.
	 *
	 * @var Illuminate\Filesystem
	 */
	protected $files;

	/**
	 * The default path for the loader.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * All of the namespace hints.
	 *
	 * @var array
	 */
	protected $hints = array();

	/**
	 * Create a new file loader instance.
	 *
	 * @param  Illuminate\Filesystem  $files
	 * @return void
	 */
	public function __construct(Filesystem $files, $path)
	{
		$this->path = $path;
		$this->files = $files;

		// We're going to set the paths to the different lang locations
		// in the core so that we have more control over it and that people
		// can't create problems by changing these paths.
		$this->path = array(
			'app'		=> APPPATH.'lang',
			'wiki'		=> SRCPATH.'Wiki/lang',
			'forum'		=> SRCPATH.'Forum/lang',
			'sentry'	=> SRCPATH.'Sentry/lang',
			'setup'		=> SRCPATH.'Setup/lang',
			'core'		=> SRCPATH.'Core/lang',
		);
	}

	/**
	 * Load the messages for the given locale.
	 *
	 * @param  string  $locale
	 * @return array
	 */
	public function load($locale, $group, $namespace = null)
	{
		if (is_null($namespace))
		{
			return $this->loadPath($this->path, $locale, $group);
		}
		else
		{
			return $this->loadNamespaced($locale, $group, $namespace);
		}
	}

	/**
	 * Load a namespaced translation group.
	 *
	 * @param  string  $locale
	 * @param  string  $group
	 * @param  string  $namespace
	 */
	protected function loadNamespaced($locale, $group, $namespace)
	{
		if (isset($this->hints[$namespace]))
		{
			return $this->loadPath($this->hints[$namespace], $locale, $group);
		}

		return array();
	}

	/**
	 * Load a locale from a given path.
	 *
	 * @param  string  $path
	 * @param  string  $locale
	 * @param  string  $group
	 * @return array
	 */
	protected function loadPath($path, $locale, $group)
	{
		// Loop through the paths and load the files
		foreach ($path as $location => $p)
		{
			$file = "{$p}/{$locale}/{$group}.php";

			if ($this->files->exists($file))
			{
				$items[$location] = array_dot($this->files->getRequire($file));
			}
		}

		// Flip the array of items and recursively merge them
		$items = call_user_func_array('array_replace_recursive', array_reverse($items));

		return $items;
	}

	/**
	 * Add a new namespace to the loader.
	 *
	 * @param  string  $namespace
	 * @param  string  $hint
	 * @return void
	 */
	public function addNamespace($namespace, $hint)
	{
		$this->hints[$namespace] = $hint;
	}

}