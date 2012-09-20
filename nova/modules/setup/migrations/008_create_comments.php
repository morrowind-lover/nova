<?php

namespace Fuel\Migrations;

class Create_comments
{
	public function up()
	{
		\DBUtil::create_table('comments', array(
			'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true),
			'user_id' => array('type' => 'INT', 'constraint' => 11),
			'character_id' => array('type' => 'INT', 'constraint' => 11),
			'type' => array('type' => 'VARCHAR', 'constraint' => 100, 'null' => true),
			'item_id' => array('type' => 'INT', 'constraint' => 11),
			'content' => array('type' => 'TEXT', 'null' => true),
			'status' => array('type' => 'TINYINT', 'constraint' => 1, 'default' => \Status::ACTIVE),
			'created_at' => array('type' => 'DATETIME'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('comments');
	}
}