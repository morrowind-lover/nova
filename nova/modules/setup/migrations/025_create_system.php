<?php

namespace Fuel\Migrations;

class Create_system
{
	public function up()
	{
		\DBUtil::create_table('system_info', array(
			'id' => array('type' => 'INT', 'constraint' => 1, 'auto_increment' => true),
			'uid' => array('type' => 'VARCHAR', 'constraint' => 32, 'null' => true),
			'install_date' => array('type' => 'DATETIME'),
			'last_update' => array('type' => 'DATETIME', 'null' => true),
			'version_major' => array('type' => 'INT', 'constraint' => 1, 'default' => 3),
			'version_minor' => array('type' => 'INT', 'constraint' => 2),
			'version_update' => array('type' => 'INT', 'constraint' => 4),
			'version_ignore' => array('type' => 'VARCHAR', 'constraint' => 20, 'null' => true),
		), array('id'));

		$data = array(
			array(
				'uid' => \Str::random('alnum', 32),
				'install_date' => \Carbon::now('UTC')->toDateTimeString(),
				'version_major' => 3,
				'version_minor' => 0,
				'version_update' => 0)
		);

		foreach ($data as $value)
		{
			\DB::insert('system_info')->set($value)->execute();
		}

		\DBUtil::create_table('system_events', array(
			'id' => array('type' => 'BIGINT', 'constraint' => 20, 'auto_increment' => true),
			'email' => array('type' => 'VARCHAR', 'constraint' => 100, 'null' => true),
			'ip' => array('type' => 'VARCHAR', 'constraint' => 16),
			'user_id' => array('type' => 'INT', 'constraint' => 11, 'null' => true),
			'character_id' => array('type' => 'INT', 'constraint' => 11, 'null' => true),
			'content' => array('type' => 'TEXT'),
			'created_at' => array('type' => 'DATETIME'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('system_info');
		\DBUtil::drop_table('system_events');
	}
}