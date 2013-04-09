<?php namespace Nova\Core\Controller\Base;

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

use Nav;
use Str;
use View;
use Event;
use Route;
use Config;
use Request;
use Session;
use Location;
use Markdown;
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
	 * Image information from the image indices.
	 */
	public $images;

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
	public $_view;
	
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
	public $_flash = array();

	/**
	 * The skin section catalog object
	 */
	public $_sectionInfo;
	
	/**
	 * Array of headers that can be used by the pages.
	 */
	public $_headers = array();
	
	/**
	 * Array of messages that can be used by the pages.
	 */
	public $_messages = array();
	
	/**
	 * Array of titles that can be used by the pages.
	 */
	public $_titles = array();

	/**
	 * Whether the header and message are editable.
	 */
	public $_editable = true;

	public function __construct()
	{
		// Get a copy of the controller
		$me = $this;

		/**
		 * Before closure that handles the setup of each request.
		 */
		$baseControllerStartup = function() use(&$me)
		{
			// Set the Request instance
			$me->request = Request::instance();

			// Set the genre
			$me->genre = Config::get('nova.genre');

			// Load all of the settings
			$me->settings = Settings::get()->toSimpleObject('key', 'value');

			// Set the language
			Config::set('app.locale', Session::get('language', 'en'));

			// Create a new Nav object
			$me->nav = new Nav;

			// Create empty objects for the data
			$me->_data = new stdClass;
			$me->_jsData = new stdClass;

			// Get the controller name from the Router and denamespace it
			$controllerName = Str::denamespace(Route::getController());

			// Grab the content for the current section
			$me->_headers	= SiteContent::getSectionContent('header', $controllerName);
			$me->_messages	= SiteContent::getSectionContent('message', $controllerName);
			$me->_titles	= SiteContent::getSectionContent('title', $controllerName);
		};

		/**
		 * Call the before filters.
		 */
		try
		{
			$this->beforeFilter('installed');
			$this->beforeFilter($baseControllerStartup());
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}

		/**
		 * Call the after filters.
		 */
		try
		{
			$this->afterFilter(function() use(&$me)
			{
				$me->after();
			});
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}

	/**
	 * Handles final rendering to the browser.
	 *
	 * @return	string
	 */
	final public function after()
	{
		// Set the content view (if it's been set)
		if ( ! empty($this->_view))
		{
			$this->template->layout->content = View::make(
				Location::file($this->_view, $this->skin, 'page'),
				$this->_data
			);
		}
		
		// Set the javascript view (if it's been set)
		if ( ! empty($this->_jsView))
		{
			$this->template->javascript = View::make(
				Location::file($this->_jsView, $this->skin, 'js'),
				$this->_jsData
			);
		}

		// Pull the action name from the Route
		$actionName = Route::getAction();

		// Set the final title content
		$this->template->title.= (property_exists($this->_data, 'title')) 
			? $this->_data->title 
			: ((array_key_exists($actionName, $this->_titles)) 
				? $this->_titles[$actionName] 
				: null
		);
		
		// Set the final header content
		$this->template->layout->header = (property_exists($this->_data, 'header')) 
			? $this->_data->header 
			: ((array_key_exists($actionName, $this->_headers)) 
				? $this->_headers[$actionName] 
				: null
		);
		
		// set the final message content
		$this->template->layout->message = (property_exists($this->_data, 'message')) 
			? Markdown::parse($this->_data->message)
			: ((array_key_exists($actionName, $this->_messages)) 
				? Markdown::parse($this->_messages[$actionName])
				: null
		);

		if ($this->_editable === true)
		{
			// Get the controller name from the Router and denamespace it
			$controllerName = Str::denamespace(Route::getController());

			// Set the final header content key
			$this->template->layout->headerKey = (array_key_exists($actionName, $this->_headers)) 
				? $controllerName.'_'.$actionName.'_header' 
				: false;

			// Set the final message content key
			$this->template->layout->messageKey = (array_key_exists($actionName, $this->_messages)) 
				? $controllerName.'_'.$actionName.'_message' 
				: false;
		}
		
		// Flash messages
		if (count($this->_flash) > 0)
		{
			foreach ($this->_flash as $flash)
			{
				$this->template->layout->flash = View::make(Location::file('flash', $this->skin, 'partial'))
					->with('status', $flash['status'])
					->with('message', $flash['message']);
			}
		}

		//sd($this->template->render());

		echo $this->template;
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

}