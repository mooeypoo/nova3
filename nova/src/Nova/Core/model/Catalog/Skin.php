<?php
/**
 * Skin Catalog Model
 *
 * @package		Nova
 * @subpackage	Core
 * @category	Model
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */
 
namespace Nova\Core\Model\Catalog;

class Skin extends \Model implements \QuickInstallInterface {

	protected $table = 'catalog_skins';
	
	protected static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 11,
			'auto_increment' => true),
		'name' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'location' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'credits' => array(
			'type' => 'text',
			'null' => true),
		'version' => array(
			'type' => 'string',
			'constraint' => 10,
			'null' => true),
	);
	
	public static $_has_many = array(
		'sections' => array(
			'model_to' => '\\Model_Catalog_SkinSec',
			'key_to' => 'skin',
			'key_from' => 'location',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
	
	/**
	 * Get all items from the catalog.
	 *
	 * @api
	 * @param	string	the status to pull
	 * @return	object
	 */
	public static function getItems($status = 'active')
	{
		$status_where = ( ! empty($status)) ? array('status', $status) : array();
		
		$result = static::find('all');
			
		return $result;
	}

	public static function install($location = null)
	{
		return true;
		/*
		if ($location === null)
		{
			// get the listing of the directory
			$dir = self::directory_list(APPPATH.'views/');
			
			// get all the skin catalogue items
			$skins = Model_CatalogueSkin::getItems();
			
			if (count($skins) > 0)
			{
				// start by removing anything that's already installed
				foreach ($skins as $skin)
				{
					// find the location in the directory listing
					$key = array_search($skin->location, $dir);
					
					if ($key !== false)
					{
						unset($dir[$key]);
					}
				}
				
				// create an array of items to remove
				$pop = array('template.php');
				
				// remove the items
				foreach ($pop as $p)
				{
					// find the location in the directory listing
					$key = array_search($p, $dir);
					
					if ($key !== false)
					{
						unset($dir[$key]);
					}
				}
				
				// now loop through the directories and install the skins
				foreach ($dir as $key => $value)
				{
					// assign our path to a variable
					$file = APPPATH.'views/'.$value.'/skin.json';
					
					// make sure the file exists first
					if (file_exists($file))
					{
						$content = file_get_contents($file);
						$data = json_decode($content);
						
						$data_skin = array(
							'name' => $data->name,
							'location' => $data->location,
							'credits' => $data->credits,
							'version' => $data->version
						);
						
						// create the skin
						Model_CatalogueSkin::createItem($data_skin);
						
						// go through and add the sections
						foreach ($data->sections as $v)
						{
							$data_section = array(
								'section' => $v->type,
								'skin' => $data->location,
								'preview' => $v->preview,
								'status' => 'active',
								'default' => 0
							);
							
							// create the section
							Model_CatalogueSkinSec::createItem($data_section);
						}
					}
				}
			}
		}
		else
		{
			// assign our path to a variable
			$file = APPPATH.'views/'.$location.'/skin.json';
			
			// make sure the file exists first
			if (file_exists($file))
			{
				// get the contents and decode the JSON
				$content = file_get_contents($file);
				$data = json_decode($content);
				
				$data_skin = array(
					'name' => $data->name,
					'location' => $data->location,
					'credits' => $data->credits,
					'version' => $data->version
				);
				
				// create the skin
				Model_CatalogueSkin::createItem($data_skin);
				
				// go through and add the sections
				foreach ($data->sections as $v)
				{
					$data_section = array(
						'section' => $v->type,
						'skin' => $data->location,
						'preview' => $v->preview,
						'status' => 'active',
						'default' => 0
					);
					
					// create the section
					Model_CatalogueSkinSec::createItem($data_section);
				}
			}
		}
		*/
	}

	public static function uninstall($location)
	{
		throw new \Exception('Uninstall method is not implemented.');
	}
}
