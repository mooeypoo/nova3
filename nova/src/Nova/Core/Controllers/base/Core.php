<?php namespace Nova\Core\Controllers\Base;

/**
 * All controllers in Nova (except the Ajax controller) extend from this core
 * controller. This class is responsible for setting up the controller and 
 * handling the post processing of a request.
 *
 * DO NOT EDIT THIS FILE!
 *
 * @package		Nova
 * @subpackage	Core
 * @category	Controller
 * @author		Anodyne Productions
 * @copyright	2013 Anodyne Productions
 */

use App;
use Nav;
use Str;
use File;
use View;
use Cache;
use Event;
use Route;
use Config;
use System;
use Request;
use Session;
use Location;
use Markdown;
use Redirect;
use Settings;
use stdClass;
use Exception;
use Controller;
use SiteContent;

abstract class Core extends Controller {

	/**
	 * A View object for storing the template.
	 */
	public $template;

	/**
	 * All of the setting values from the database.
	 */
	public $settings;
	
	/**
	 * Icon information from the icon indices.
	 */
	public $icons;

	/**
	 * The genre.
	 */
	public $genre;
	
	/**
	 * The current skin.
	 */
	public $skin;
	
	/**
	 * The current rank set.
	 */
	public $rank;
	
	/**
	 * The current timezone.
	 */
	public $timezone;

	/**
	 * The Nav object.
	 */
	public $nav;

	/**
	 * The Request instance.
	 */
	public $request;

	/**
	 * Name of the view file to use.
	 */
	public $_view = 'processing';
	
	/**
	 * Controller action data.
	 */
	public $_data;
	
	/**
	 * Name of the JavaScript view file to use.
	 */
	public $_jsView;
	
	/**
	 * Controller action data for the JavaScript view.
	 */
	public $_jsData;

	/**
	 * Array of flash messages
	 */
	public $_flash = [];

	/**
	 * Array of ajax views
	 */
	public $_ajax = [];

	/**
	 * The skin section catalog object
	 */
	public $_skinInfo;
	
	/**
	 * Array of headers that can be used by the pages.
	 */
	public $_headers = [];
	
	/**
	 * Array of messages that can be used by the pages.
	 */
	public $_messages = [];
	
	/**
	 * Array of titles that can be used by the pages.
	 */
	public $_titles = [];

	/**
	 * The current mode.
	 */
	public $_mode = false;

	/**
	 * Whether the header and message are editable.
	 */
	public $_editable = true;

	/**
	 * Stop execution (used specifically for filters)
	 */
	protected $_stopExecution = false;

	/**
	 * The controller used for the current request.
	 */
	public $_controller;

	/**
	 * The action method used for the current request.
	 */
	public $_action;

	/**
	 * The controller used for the current request with namespace.
	 */
	public $_fullController;

	/**
	 * The action method used for the current request with HTTP verb.
	 */
	public $_fullAction;

	public function __construct()
	{
		// Set the controller and action names
		$this->getControllerName();
		$this->getActionName();

		// Get a copy of the controller
		$me = $this;

		/**
		 * Before closure that checks the install status.
		 */
		$this->beforeFilter(function() use(&$me)
		{
			// Get the system install status cache file
			$status = Cache::get('nova.installed');

			if ($status === null)
			{
				try
				{
					// Grab the UID
					$uid = System::getUniqueId();

					// Only cache if we have a UID
					if ( ! empty($uid))
					{
						Cache::forever('nova.installed', (int) true);
					}
				}
				catch (Exception $e)
				{
					$me->_stopExecution = true;
					
					// Nothing here, so the system isn't installed
					return Redirect::to('setup');
				}
			}
		});

		/**
		 * Before closure that handles the setup of each request.
		 */
		$this->beforeFilter(function() use(&$me)
		{
			if ( ! $me->_stopExecution)
			{
				// Set the Request instance
				$me->request = Request::instance();

				// Set the genre
				$me->genre = Config::get('nova.genre');

				// Load all of the settings
				$me->settings = Settings::get()->toSimpleObject('key', 'value');

				// TODO: need to figure out how we're going to handle languages

				// Create a new Nav object
				$me->nav = new Nav;

				// Create empty objects for the data
				$me->_data = new stdClass;
				$me->_jsData = new stdClass;
				$me->_skinInfo = new stdClass;

				// Grab the content for the current section
				$me->_headers	= SiteContent::getSectionContent('header', $me->_controller);
				$me->_messages	= SiteContent::getSectionContent('message', $me->_controller);
				$me->_titles	= SiteContent::getSectionContent('title', $me->_controller);
			}
		});
	}

	/**
	 * Finalize the layout.
	 *
	 * @return	void
	 */
	protected function finalizeLayout()
	{
		if ( ! is_object($this->layout)) return;

		// Set the content view (if it's been set)
		if ( ! empty($this->_view))
		{
			$this->layout->template->content = View::make(Location::page($this->_view))
				->with('_icons', $this->icons)
				->with('_settings', $this->settings)
				->with((array) $this->_data);
		}
		
		// Set the javascript view (if it's been set)
		if ( ! empty($this->_jsView))
		{
			$this->layout->javascript = View::make(Location::js($this->_jsView))
				->with('_icons', $this->icons)
				->with((array) $this->_jsData);
		}

		// Set the final title content
		$this->layout->title.= (is_object($this->_data) and property_exists($this->_data, 'title')) 
			? $this->_data->title 
			: ((array_key_exists($this->_action, $this->_titles)) 
				? $this->_titles[$this->_action] 
				: null
		);
		
		// Set the final header content
		/*$this->layout->template->header = (is_object($this->_data) and property_exists($this->_data, 'header')) 
			? $this->_data->header 
			: ((array_key_exists($this->_action, $this->_headers)) 
				? $this->_headers[$this->_action] 
				: null
		);*/
		$this->layout->template->header = $this->parseSiteContent('header', false);

		// set the final message content
		$this->layout->template->message = (is_object($this->_data) and property_exists($this->_data, 'message')) 
			? Markdown::parse($this->_data->message)
			: ((array_key_exists($this->_action, $this->_messages)) 
				? Markdown::parse($this->_messages[$this->_action])
				: null
		);

		if ($this->_editable)
		{
			// Set the final header content key
			$this->layout->template->headerKey = (array_key_exists($this->_action, $this->_headers)) 
				? $this->_controller.'_'.$this->_action.'_header' 
				: false;

			// Set the final message content key
			$this->layout->template->messageKey = (array_key_exists($this->_action, $this->_messages)) 
				? $this->_controller.'_'.$this->_action.'_message' 
				: false;
		}

		// If there's flash data in the session, grab it
		if (Session::has('flashStatus'))
		{
			$this->_flash[] = [
				'class'		=> 'alert-'.Session::get('flashStatus'),
				'content'	=> Session::get('flashMessage'),
			];
		}
		
		// Flash messages
		if (count($this->_flash) > 0)
		{
			foreach ($this->_flash as $flash)
			{
				$this->layout->template->flash.= partial('common/alert', $flash);
			}
		}

		// Ajax views
		if (count($this->_ajax) > 0)
		{
			foreach ($this->_ajax as $ajax)
			{
				$this->layout->template->ajax.= $ajax;
			}
		}
	}

	/**
	 * Process a controller action response.
	 *
	 * This overrides the Laravel default controller functionality so
	 * we can finalize the layout before its sent to the response.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @param  string  $method
	 * @param  mixed   $response
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	protected function processResponse($router, $method, $response)
	{
		$this->finalizeLayout();

		return parent::processResponse($router, $method, $response);
	}
	
	/**
	 * Every controller can pull information out of the wiki database
	 * by simply calling the page action and passing a link as the
	 * 3rd parameter. Like wiki pages, these are completely static
	 * and don't have access to any information out of the database.
	 *
	 * @param	mixed	A numeric page ID or page permalink
	 * @return	void
	 */
	public function getPage($link)
	{
		if (is_numeric($link))
		{
			/**
			 * Find the page based on the wiki page_id. If there isn't
			 * a page with that ID, return an error. If there is a page
			 * with that ID but it isn't classified as being in the
			 * current section, redirect them to that section. Otherwise,
			 * display the page.
			 */
		}
		else
		{
			/**
			 * Find the page based on the wiki page_permalink. If there isn't
			 * a page with that link, return an error. If there is a page
			 * with that link but it isn't classified as being in the
			 * current section, redirect them to that section. Otherwise,
			 * display the page.
			 */
		}
	}

	/**
	 * Make sure the action name is setup properly.
	 *
	 * @return	string
	 */
	protected function getActionName()
	{
		// Set the fully qualified action name
		$this->_fullAction = $actionName = Str::parseCallback(Route::currentRouteAction(), false)[1];

		// Remove the HTTP verb
		$actionName = (substr($actionName, 0, 3) == 'get') ? substr_replace($actionName, '', 0, 3) : $actionName;
		$actionName = (substr($actionName, 0, 3) == 'put') ? substr_replace($actionName, '', 0, 3) : $actionName;
		$actionName = (substr($actionName, 0, 4) == 'post') ? substr_replace($actionName, '', 0, 4) : $actionName;
		$actionName = (substr($actionName, 0, 6) == 'delete') ? substr_replace($actionName, '', 0, 6) : $actionName;

		// Set the short action name
		$this->_action = Str::lower($actionName);
	}

	protected function getControllerName()
	{
		// Set the namespaced controller name
		$this->_fullController = Str::parseCallback(Route::currentRouteAction(), false)[0];

		// Set the controller name
		$this->_controller = Str::denamespace($this->_fullController);
	}

	protected function parseSiteContent($type, $markdown = false)
	{
		// If the data coming from the controller action has a
		// title/header/message variable, use that instead of what we have
		if (is_object($this->_data) and property_exists($this->_data, $type))
		{
			if ($markdown)
			{
				return Markdown::parse($this->_data->{$type});
			}

			return $this->_data->{$type};
		}

		// Figure out the variables we should be using based on the type
		switch ($type)
		{
			case 'title':
				$typeVar = '_titles';
			break;

			case 'header':
				$typeVar = '_headers';
			break;

			case 'message':
				$typeVar = '_messages';
			break;
		}

		// Check if we have a mode
		if ($this->_mode !== false and array_key_exists("{$this->_action}.{$this->_mode}", $this->{$typeVar}))
		{
			if ($markdown)
			{
				return Markdown::parse($this->{$typeVar}["{$this->_action}.{$this->_mode}"]);
			}

			return $this->{$typeVar}["{$this->_action}.{$this->_mode}"];
		}

		// Check if we have something already
		if (array_key_exists($this->_action, $this->{$typeVar}))
		{
			if ($markdown)
			{
				return Markdown::parse($this->{$typeVar}[$this->_action]);
			}

			return $this->{$typeVar}[$this->_action];
		}

		return null;
	}

}