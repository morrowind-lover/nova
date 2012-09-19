<?php
/**
 * Character Model
 *
 * @package		Nova
 * @subpackage	Fusion
 * @category	Model
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */
 
namespace Fusion;

class Model_Character extends \Model
{
	public static $_table_name = 'characters';
	
	public static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 11,
			'auto_increment' => true),
		'user_id' => array(
			'type' => 'int',
			'constraint' => 11,
			'default' => 0),
		'status' => array(
			'type' => 'tinyint',
			'constraint' => 1,
			'default' => \Status::PENDING),
		'first_name' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'middle_name' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'last_name' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'suffix' => array(
			'type' => 'string',
			'constraint' => 50,
			'null' => true),
		'activated' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
		'deactivated' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
		'rank_id' => array(
			'type' => 'int',
			'constraint' => 11,
			'default' => 1),
		'last_post' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
		'created_at' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
		'updated_at' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
	);
	
	/**
	 * Relationships
	 */
	protected static $_belongs_to = array(
		'rank' => array(
			'model_to' => '\\Model_Rank',
			'key_to' => 'id',
			'key_from' => 'rank_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'user' => array(
			'model_to' => '\\Model_User',
			'key_to' => 'id',
			'key_from' => 'user_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	protected static $_has_one = array(
		'app' => array(
			'key_from' => 'id',
			'model_to' => '\\Model_Application',
			'key_to' => 'character_id',
			'cascade_save' => false,
			'cascade_delete' => false,
		)
	);
	
	protected static $_has_many = array(
		'logs' => array(
			'model_to' => '\\Model_PersonalLog',
			'key_to' => 'character_id',
			'key_from' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'announcements' => array(
			'model_to' => '\\Model_Announcement',
			'key_to' => 'character_id',
			'key_from' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
		'promotions' => array(
			'model_to' => '\\Model_Character_Promotion',
			'key_to' => 'character_id',
			'key_from' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);
	
	protected static $_many_many = array(
		'posts' => array(
			'key_from' => 'id',
			'key_through_from' => 'character_id',
			'table_through' => 'post_authors',
			'key_through_to' => 'post_id',
			'model_to' => '\\Model_Post',
			'key_to' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	/**
	 * Observers
	 */
	protected static $_observers = array(
		'\\Character' => array(
			'events' => array('after_insert')
		),
		'\\Orm\\Observer_CreatedAt' => array(
			'events' => array('before_insert')
		),
		'\\Orm\\Observer_UpdatedAt' => array(
			'events' => array('before_save')
		),
	);

	/**
	 * Get all characters from the database.
	 *
	 * @api
	 * @param	string	the status of characters to pull back
	 * @return	object
	 */
	public static function getCharacters($scope = \Status::ACTIVE)
	{
		switch ($scope)
		{
			case 'active':
			default:
				$result = static::find('all', array(
					'where' => array('status' => \Status::ACTIVE)
				));
			break;
			
			case 'inactive':
				$result = static::find('all', array(
					'where' => array('status' => \Status::INACTIVE)
				));
			break;
			
			case 'pending':
				$result = static::find('all', array(
					'where' => array('status' => \Status::PENDING)
				));
			break;
			
			case 'npc':
				# TODO: is this right?
				$result = static::find('all', array(
					'where' => array(
						array('user' => 0),
						array('status' => \Status::ACTIVE)
					),
				));
			break;
			
			case '':
				$result = static::find('all');

				$result = static::find('all', array(
					'where' => array(
						array(array('status', '!=', \Status::REMOVED))
					),
				));
			break;
		}
		
		return $result;
	}

	/**
	 * Get the name of the character.
	 *
	 * @api
	 * @param	bool	show the character rank?
	 * @param	bool	use the rank short name instead of the full name?
	 * @return	string
	 */
	public function getName($include_rank = true, $short_rank = false)
	{
		$pieces = array(
			($include_rank) 
				? ($short_rank) 
					? $this->rank->short_name 
					: $this->rank->name 
				: '',
			$this->first_name,
			$this->last_name
		);
		
		foreach ($pieces as $key => $p)
		{
			if (empty($p))
			{
				unset($pieces[$key]);
			}
		}
		
		return implode(' ', $pieces);
	}

	/**
	 * Get the positions for the character.
	 *
	 * @api
	 * @return	object
	 */
	public function getPositions()
	{
		return \Model_Character_Positions::getItems($this->id);
	}
	
	/**
	 * Update the position record.
	 *
	 * @api
	 * @param	int		the new ID to use
	 * @param	int		the old ID to use (for finding the record)
	 * @return	void
	 */
	public function updatePosition($new_id, $old_id = false)
	{
		// build the arguments
		$args['character_id'] = $this->id;

		if ($old_id)
		{
			$args['position_id'] = $old_id;
		}

		// get the position record
		$position = \Model_Character_Positions::getItems($args);

		// update to the new position
		$position->position_id = $new_id;
		$position->save();
	}
}