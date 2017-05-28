<?php

namespace ImagineCraft\notifyMinecraft\migrations;

use phpbb\db\migration\migration;

class version_102 extends migration 
{
	public function effectively_installed()
	{
		// TODO!
		return true;
	}
	
	static public function depends_on()
	{   
		return array('\ImagineCraft\notifyMinecraft\migrations\version_100');
	}

	public function update_data()
	{   
		return array(
			array('config.add', array('ic_nm_forum_id', 'forum id')),
		);

	}
}

