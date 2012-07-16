<?php
/**
 * Application Response Model
 *
 * @package		Nova
 * @subpackage	Fusion
 * @category	Model
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */
 
namespace Fusion;

class Model_Application_Response extends \Model {
	
	public static $_table_name = 'application_responses';
	
	public static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 11,
			'auto_increment' => true),
		'app_id' => array(
			'type' => 'int',
			'constraint' => 11),
		'user_id' => array(
			'type' => 'int',
			'constraint' => 11),
		'content' => array(
			'type' => 'text',
			'null' => true),
		'decision' => array(
			'type' => 'tinyint',
			'constraint' => 2),
		'created_at' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
	);

	/**
	 * Relationships
	 */
	public static $_belongs_to = array(
		'app' => array(
			'model_to' => '\\Model_Application',
			'key_to' => 'id',
			'key_from' => 'app_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	/**
	 * Observers
	 */
	protected static $_observers = array(
		'\\Orm\\Observer_CreatedAt' => array(
			'events' => array('before_insert')
		),
	);
}