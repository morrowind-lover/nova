<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_menu extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'menucat_id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'auto_increment' => TRUE),
			'menucat_order' => array(
				'type' => 'INT',
				'constraint' => 5,
				'default' => 1),
			'menucat_menu_cat' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => ''),
			'menucat_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'default' => ''),
			'menucat_type' => array(
				'type' => 'ENUM',
				'constraint' => "'sub','adminsub'",
				'default' => 'sub')
		));
		$this->dbforge->add_key('menucat_id', true);
		$this->dbforge->create_table('menu_categories');

		$menu_categories = array(
			array(
				'menucat_name' => 'Main',
				'menucat_order' => 0,
				'menucat_menu_cat' => 'main',
				'menucat_type' => 'sub'),
			array(
				'menucat_name' => 'Personnel',
				'menucat_order' => 1,
				'menucat_menu_cat' => 'personnel',
				'menucat_type' => 'sub'),
			array(
				'menucat_name' => 'The Sim',
				'menucat_order' => 2,
				'menucat_menu_cat' => 'sim',
				'menucat_type' => 'sub'),
			array(
				'menucat_name' => 'Admin Control Panel',
				'menucat_order' => 3,
				'menucat_menu_cat' => 'admin',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'Write',
				'menucat_order' => 4,
				'menucat_menu_cat' => 'write',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'Private Messages',
				'menucat_order' => 5,
				'menucat_menu_cat' => 'messages',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'Site Management',
				'menucat_order' => 6,
				'menucat_menu_cat' => 'site',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'Management',
				'menucat_order' => 7,
				'menucat_menu_cat' => 'manage',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'Characters',
				'menucat_order' => 8,
				'menucat_menu_cat' => 'characters',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'User',
				'menucat_order' => 9,
				'menucat_menu_cat' => 'user',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'Reports',
				'menucat_order' => 10,
				'menucat_menu_cat' => 'report',
				'menucat_type' => 'adminsub'),
			array(
				'menucat_name' => 'Wiki',
				'menucat_order' => 11,
				'menucat_menu_cat' => 'wiki',
				'menucat_type' => 'sub'),
		);

		foreach ($menu_categories as $d)
		{
			$this->db->insert('menu_categories', $d);
		}

		$this->dbforge->add_field(array(
			'menu_id' => array(
				'type' => 'INT',
				'constraint' => 8,
				'auto_increment' => TRUE),
			'menu_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'default' => ''),
			'menu_group' => array(
				'type' => 'INT',
				'constraint' => 4),
			'menu_order' => array(
				'type' => 'INT',
				'constraint' => 4),
			'menu_link' => array(
				'type' => 'TEXT'),
			'menu_link_type' => array(
				'type' => 'ENUM',
				'constraint' => "'onsite','offsite'",
				'default' => 'onsite'),
			'menu_need_login' => array(
				'type' => 'ENUM',
				'constraint' => "'y','n','none'",
				'default' => 'none'),
			'menu_use_access' => array(
				'type' => 'ENUM',
				'constraint' => "'y','n'",
				'default' => 'n'),
			'menu_access' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'default' => ''),
			'menu_access_level' => array(
				'type' => 'INT',
				'constraint' => 4,
				'default' => '0'),
			'menu_type' => array(
				'type' => 'ENUM',
				'constraint' => "'main','sub','adminsub'",
				'default' => 'main'),
			'menu_cat' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => ''),
			'menu_display' => array(
				'type' => 'ENUM',
				'constraint' => "'y','n'",
				'default' => 'y'),
			'menu_sim_type' => array(
				'type' => 'INT',
				'constraint' => 5)
		));
		$this->dbforge->add_key('menu_id', true);
		$this->dbforge->create_table('menu_items');

		$menu_items = array(
			array(
				'menu_name' => 'Main',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'main/index',
				'menu_sim_type' => 1,
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Personnel',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'personnel/index',
				'menu_sim_type' => 1,
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Sim',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'sim/index',
				'menu_sim_type' => 1,
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Wiki',
				'menu_group' => 0,
				'menu_order' => 3,
				'menu_link' => 'wiki/index',
				'menu_sim_type' => 1,
				'menu_cat' => 'main',
				'menu_display' => 'y'),
			array(
				'menu_name' => 'Search',
				'menu_group' => 0,
				'menu_order' => 4,
				'menu_link' => 'search/index',
				'menu_sim_type' => 1,
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Control Panel',
				'menu_group' => 0,
				'menu_order' => 5,
				'menu_link' => 'admin/index',
				'menu_sim_type' => 1,
				'menu_cat' => 'main',
				'menu_need_login' => 'y'),
			array(
				'menu_name' => 'Log In',
				'menu_group' => 0,
				'menu_order' => 6,
				'menu_link' => 'login/index',
				'menu_sim_type' => 1,
				'menu_cat' => 'main',
				'menu_need_login' => 'n'),
			array(
				'menu_name' => 'Log Out',
				'menu_group' => 0,
				'menu_order' => 7,
				'menu_link' => 'login/logout',
				'menu_sim_type' => 1,
				'menu_cat' => 'main',
				'menu_need_login' => 'y'),
				
			array(
				'menu_name' => 'Main',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'main/index',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'News',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'main/news',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Contact',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'main/contact',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Credits',
				'menu_group' => 0,
				'menu_order' => 3,
				'menu_link' => 'main/credits',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Join',
				'menu_group' => 0,
				'menu_order' => 4,
				'menu_link' => 'main/join',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Rules',
				'menu_group' => 0,
				'menu_order' => 5,
				'menu_link' => 'main/rules',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'main'),
			array(
				'menu_name' => 'Search',
				'menu_group' => 0,
				'menu_order' => 6,
				'menu_link' => 'search/index',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'main'),
				
			array(
				'menu_name' => 'Manifest',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'personnel/index',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'personnel'),
			array(
				'menu_name' => 'Chain of Command',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'personnel/coc',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'personnel'),
			array(
				'menu_name' => 'Crew Awards',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'sim/awards',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'personnel'),
			array(
				'menu_name' => 'Join',
				'menu_group' => 0,
				'menu_order' => 3,
				'menu_link' => 'main/join',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'personnel'),
			
			array(
				'menu_name' => 'The Sim',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'sim/index',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Missions',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'sim/missions',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Mission Groups',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'sim/missions/group',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Personal Logs',
				'menu_group' => 0,
				'menu_order' => 3,
				'menu_link' => 'sim/listlogs',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Stats',
				'menu_group' => 0,
				'menu_order' => 4,
				'menu_link' => 'sim/stats',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Crew Awards',
				'menu_group' => 0,
				'menu_order' => 5,
				'menu_link' => 'sim/awards',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Tour',
				'menu_group' => 1,
				'menu_order' => 0,
				'menu_link' => 'sim/tour',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Specifications',
				'menu_group' => 1,
				'menu_order' => 1,
				'menu_link' => 'sim/specs',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Deck Listing',
				'menu_group' => 1,
				'menu_order' => 2,
				'menu_link' => 'sim/decks',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Departments',
				'menu_group' => 1,
				'menu_order' => 3,
				'menu_link' => 'sim/departments',
				'menu_sim_type' => 1,
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Docked Items',
				'menu_group' => 2,
				'menu_order' => 0,
				'menu_link' => 'sim/docked',
				'menu_sim_type' => 3,
				'menu_display' => 'n',
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
			array(
				'menu_name' => 'Docking Request',
				'menu_group' => 2,
				'menu_order' => 1,
				'menu_link' => 'sim/dockingrequest',
				'menu_sim_type' => 3,
				'menu_display' => 'n',
				'menu_type' => 'sub',
				'menu_cat' => 'sim'),
				
			array(
				'menu_name' => 'Main Page',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'wiki/index',
				'menu_sim_type' => 1,
				'menu_display' => 'y',
				'menu_type' => 'sub',
				'menu_cat' => 'wiki'),
			array(
				'menu_name' => 'Recent Changes',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'wiki/recent',
				'menu_sim_type' => 1,
				'menu_display' => 'y',
				'menu_type' => 'sub',
				'menu_cat' => 'wiki'),
			array(
				'menu_name' => 'Categories',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'wiki/categories',
				'menu_sim_type' => 1,
				'menu_display' => 'y',
				'menu_type' => 'sub',
				'menu_cat' => 'wiki'),
			array(
				'menu_name' => 'Manage Pages',
				'menu_group' => 1,
				'menu_order' => 0,
				'menu_link' => 'wiki/managepages',
				'menu_sim_type' => 1,
				'menu_display' => 'y',
				'menu_type' => 'sub',
				'menu_use_access' => 'y',
				'menu_access' => 'wiki/page',
				'menu_need_login' => 'y',
				'menu_cat' => 'wiki'),
			array(
				'menu_name' => 'Manage Categories',
				'menu_group' => 1,
				'menu_order' => 1,
				'menu_link' => 'wiki/managecategories',
				'menu_sim_type' => 1,
				'menu_display' => 'y',
				'menu_type' => 'sub',
				'menu_use_access' => 'y',
				'menu_access' => 'wiki/categories',
				'menu_need_login' => 'y',
				'menu_cat' => 'wiki'),
			array(
				'menu_name' => 'Create New Page',
				'menu_group' => 2,
				'menu_order' => 0,
				'menu_link' => 'wiki/page',
				'menu_sim_type' => 1,
				'menu_display' => 'y',
				'menu_type' => 'sub',
				'menu_use_access' => 'y',
				'menu_access' => 'wiki/page',
				'menu_need_login' => 'y',
				'menu_cat' => 'wiki'),
				
			array(
				'menu_name' => 'Control Panel',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'admin/index',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'admin',
				'menu_use_access' => 'y',
				'menu_access' => 'admin/index'),
				
			array(
				'menu_name' => 'Writing Control Panel',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'write/index',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'write',
				'menu_use_access' => 'y',
				'menu_access' => 'write/index'),
			array(
				'menu_name' => 'Write Mission Post',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'write/missionpost',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'write',
				'menu_use_access' => 'y',
				'menu_access' => 'write/missionpost'),
			array(
				'menu_name' => 'Write Personal Log',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'write/personallog',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'write',
				'menu_use_access' => 'y',
				'menu_access' => 'write/personallog'),
			array(
				'menu_name' => 'Write News Item',
				'menu_group' => 0,
				'menu_order' => 3,
				'menu_link' => 'write/newsitem',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'write',
				'menu_use_access' => 'y',
				'menu_access' => 'write/newsitem'),
				
			array(
				'menu_name' => 'Inbox',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'messages/index',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'messages',
				'menu_use_access' => 'y',
				'menu_access' => 'messages/index'),
			array(
				'menu_name' => 'Sent Messages',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'messages/sent',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'messages',
				'menu_use_access' => 'y',
				'menu_access' => 'messages/index'),
			array(
				'menu_name' => 'Write New Message',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'messages/write',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'messages',
				'menu_use_access' => 'y',
				'menu_access' => 'messages/index'),
				
			array(
				'menu_name' => 'Settings',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'site/settings',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/settings'),
			array(
				'menu_name' => 'Messages &amp; Titles',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'site/messages',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/messages'),
			array(
				'menu_name' => 'Menu Items',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'site/menus',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/menus'),
			array(
				'menu_name' => 'Access Roles',
				'menu_group' => 0,
				'menu_order' => 3,
				'menu_link' => 'site/roles',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/roles'),
			array(
				'menu_name' => 'Ban Controls',
				'menu_group' => 0,
				'menu_order' => 4,
				'menu_link' => 'site/bans',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/bans'),
			array(
				'menu_name' => 'Site Manifests',
				'menu_group' => 0,
				'menu_order' => 5,
				'menu_link' => 'site/manifests',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/manifests'),
			array(
				'menu_name' => 'Bio Form',
				'menu_group' => 1,
				'menu_order' => 0,
				'menu_link' => 'site/bioform',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/bioform'),
			array(
				'menu_name' => 'Specs Form',
				'menu_group' => 1,
				'menu_order' => 1,
				'menu_link' => 'site/specsform',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/specsform'),
			array(
				'menu_name' => 'Tour Form',
				'menu_group' => 1,
				'menu_order' => 2,
				'menu_link' => 'site/tourform',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/tourform'),
			array(
				'menu_name' => 'Docking Form',
				'menu_group' => 1,
				'menu_order' => 3,
				'menu_link' => 'site/dockingform',
				'menu_sim_type' => 3,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/dockingform'),
			array(
				'menu_name' => 'Sim Types',
				'menu_group' => 2,
				'menu_order' => 0,
				'menu_link' => 'site/simtypes',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/simtypes'),
			array(
				'menu_name' => 'Rank Catalogue',
				'menu_group' => 2,
				'menu_order' => 1,
				'menu_link' => 'site/catalogueranks',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/catalogueranks'),
			array(
				'menu_name' => 'Skin Catalogue',
				'menu_group' => 2,
				'menu_order' => 2,
				'menu_link' => 'site/catalogueskins',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'site',
				'menu_use_access' => 'y',
				'menu_access' => 'site/catalogueskins'),
				
			array(
				'menu_name' => 'Awards',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'manage/awards',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/awards'),
			array(
				'menu_name' => 'Departments',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'manage/depts',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/depts'),
			array(
				'menu_name' => 'Positions',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'manage/positions',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/positions'),
			array(
				'menu_name' => 'Ranks',
				'menu_group' => 0,
				'menu_order' => 3,
				'menu_link' => 'manage/ranks',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/ranks'),
			array(
				'menu_name' => 'Missions',
				'menu_group' => 1,
				'menu_order' => 0,
				'menu_link' => 'manage/missions',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/missions'),
			array(
				'menu_name' => 'Mission Groups',
				'menu_group' => 1,
				'menu_order' => 1,
				'menu_link' => 'manage/missiongroups',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/missions'),
			array(
				'menu_name' => 'Mission Posts',
				'menu_group' => 1,
				'menu_order' => 2,
				'menu_link' => 'manage/posts',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/posts'),
			array(
				'menu_name' => 'Personal Logs',
				'menu_group' => 1,
				'menu_order' => 3,
				'menu_link' => 'manage/logs',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/logs'),
			array(
				'menu_name' => 'News Items',
				'menu_group' => 1,
				'menu_order' => 4,
				'menu_link' => 'manage/news',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/news'),
			array(
				'menu_name' => 'News Categories',
				'menu_group' => 1,
				'menu_order' => 5,
				'menu_link' => 'manage/newscats',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/newscats'),
			array(
				'menu_name' => 'Comments',
				'menu_group' => 1,
				'menu_order' => 6,
				'menu_link' => 'manage/comments',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/comments'),
			array(
				'menu_name' => 'Specs',
				'menu_group' => 2,
				'menu_order' => 0,
				'menu_link' => 'manage/specs',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/specs'),
			array(
				'menu_name' => 'Tour',
				'menu_group' => 2,
				'menu_order' => 1,
				'menu_link' => 'manage/tour',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/tour'),
			array(
				'menu_name' => 'Deck Listing',
				'menu_group' => 2,
				'menu_order' => 2,
				'menu_link' => 'manage/decks',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/decks'),
			array(
				'menu_name' => 'Docked Items',
				'menu_group' => 2,
				'menu_order' => 3,
				'menu_link' => 'manage/docked',
				'menu_sim_type' => 3,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'manage/docked'),
				
			array(
				'menu_name' => 'Upload Images',
				'menu_group' => 3,
				'menu_order' => 0,
				'menu_link' => 'upload/index',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'upload/index'),
			array(
				'menu_name' => 'Manage Uploads',
				'menu_group' => 3,
				'menu_order' => 1,
				'menu_link' => 'upload/manage',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'manage',
				'menu_use_access' => 'y',
				'menu_access' => 'upload/manage'),
				
			array(
				'menu_name' => 'All Characters',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'characters/index',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'characters',
				'menu_use_access' => 'y',
				'menu_access' => 'characters/index'),
			array(
				'menu_name' => 'All NPCs',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'characters/npcs',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'characters',
				'menu_use_access' => 'y',
				'menu_access' => 'characters/npcs'),
			array(
				'menu_name' => 'Create Character',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'characters/create',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'characters',
				'menu_use_access' => 'y',
				'menu_access' => 'characters/create'),
			array(
				'menu_name' => 'Chain of Command',
				'menu_group' => 1,
				'menu_order' => 0,
				'menu_link' => 'characters/coc',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'characters',
				'menu_use_access' => 'y',
				'menu_access' => 'characters/coc'),
			array(
				'menu_name' => 'Give/Remove Awards',
				'menu_group' => 1,
				'menu_order' => 1,
				'menu_link' => 'characters/awards',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'characters',
				'menu_use_access' => 'y',
				'menu_access' => 'characters/awards'),
				
			array(
				'menu_name' => 'My Account',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'user/account',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'user',
				'menu_use_access' => 'y',
				'menu_access' => 'user/account'),
			array(
				'menu_name' => 'My Bio',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'characters/bio',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'user',
				'menu_use_access' => 'y',
				'menu_access' => 'characters/bio'),
			array(
				'menu_name' => 'Site Options',
				'menu_group' => 1,
				'menu_order' => 0,
				'menu_link' => 'user/options',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'user',
				'menu_use_access' => 'y',
				'menu_access' => 'user/account'),
			array(
				'menu_name' => 'Request LOA',
				'menu_group' => 1,
				'menu_order' => 1,
				'menu_link' => 'user/status',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'user',
				'menu_use_access' => 'y',
				'menu_access' => 'user/account'),
			array(
				'menu_name' => 'Award Nominations',
				'menu_group' => 1,
				'menu_order' => 2,
				'menu_link' => 'user/nominate',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'user',
				'menu_use_access' => 'y',
				'menu_access' => 'user/nominate'),
			array(
				'menu_name' => 'All Users',
				'menu_group' => 1,
				'menu_order' => 3,
				'menu_link' => 'user/all',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'user',
				'menu_use_access' => 'y',
				'menu_access' => 'user/account',
				'menu_access_level' => 2),
			array(
				'menu_name' => 'Link Characters',
				'menu_group' => 1,
				'menu_order' => 4,
				'menu_link' => 'user/characterlink',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'user',
				'menu_use_access' => 'y',
				'menu_access' => 'user/account',
				'menu_access_level' => 2),
				
			array(
				'menu_name' => 'Crew Activity',
				'menu_group' => 0,
				'menu_order' => 0,
				'menu_link' => 'report/activity',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/activity'),
			array(
				'menu_name' => 'Posting Levels',
				'menu_group' => 0,
				'menu_order' => 1,
				'menu_link' => 'report/posting',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/posting'),
			array(
				'menu_name' => 'Sim Statistics',
				'menu_group' => 0,
				'menu_order' => 2,
				'menu_link' => 'report/stats',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/stats'),
			array(
				'menu_name' => 'Moderation',
				'menu_group' => 1,
				'menu_order' => 0,
				'menu_link' => 'report/moderation',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/moderation'),
			array(
				'menu_name' => 'Milestones',
				'menu_group' => 1,
				'menu_order' => 1,
				'menu_link' => 'report/milestones',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/milestones'),
			array(
				'menu_name' => 'LOA Records',
				'menu_group' => 1,
				'menu_order' => 2,
				'menu_link' => 'report/loa',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/loa'),
			array(
				'menu_name' => 'Award Nominations',
				'menu_group' => 1,
				'menu_order' => 3,
				'menu_link' => 'report/awardnominations',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/awardnominations'),
			array(
				'menu_name' => 'Applications',
				'menu_group' => 1,
				'menu_order' => 4,
				'menu_link' => 'report/applications',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/applications'),
			array(
				'menu_name' => 'System &amp; Versions',
				'menu_group' => 1,
				'menu_order' => 5,
				'menu_link' => 'report/versions',
				'menu_sim_type' => 1,
				'menu_type' => 'adminsub',
				'menu_cat' => 'report',
				'menu_use_access' => 'y',
				'menu_access' => 'report/versions'),
		);
		
		foreach ($menu_items as $d)
		{
			$this->db->insert('menu_items', $d);
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('menu_items');
		$this->dbforge->drop_table('menu_categories');
	}
}
