<?php namespace Nova\Core\Controllers\Base;

/**
 * All ajax controllers extend from this base controller. This class is 
 * responsible for doing the necessary setup for all ajax requests.
 *
 * DO NOT EDIT THIS FILE!
 *
 * @package		Nova
 * @subpackage	Core
 * @category	Controller
 * @author		Anodyne Productions
 * @copyright	2013 Anodyne Productions
 */

use Request;
use Controller;

abstract class Ajax extends Controller {

	/**
	 * The request instance.
	 */
	protected $request;

	public function __construct()
	{
		// Get the request instance
		$this->request = Request::instance();
	}

}