<?php
/**
 * Awards Queue Model
 *
 * @package		Nova
 * @subpackage	Core
 * @category	Model
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */
 
namespace Nova\Core\Model\Award;

class Queue extends \Model {
	
	protected $table = 'award_queue';
	
	protected static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 11,
			'auto_increment' => true),
		'receive_character_id' => array(
			'type' => 'int',
			'constraint' => 11),
		'receive_user_id' => array(
			'type' => 'int',
			'constraint' => 11),
		'nominate_character_id' => array(
			'type' => 'int',
			'constraint' => 11),
		'award_id' => array(
			'type' => 'int',
			'constraint' => 11),
		'reason' => array(
			'type' => 'text',
			'null' => true),
		'status' => array(
			'type' => 'tinyint',
			'constraint' => 1,
			'default' => \Status::PENDING),
		'created_at' => array(
			'type' => 'datetime'),
	);
}
