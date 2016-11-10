<?php

namespace ImagineCraft\notifyMinecraft\migrations;

use phpbb\db\migration\migration;

class version_100 extends migration 
{
	public function effectively_installed()
	{
		// TODO!
		return true;
	}
	
	static public function depends_on()
	{   
		return array('\phpbb\db\migration\data\v31x\v319');
	}

	public function update_data()
	{   
		return array(
			array('config.add', array('ic_nm_server_host', 'hostname/ip')),
			array('config.add', array('ic_nm_server_port', 'port')),
			array('config.add', array('ic_nm_server_pass', 'rcon password')),
			array('config.add', array('ic_nm_server_timeout', 'timeout')),
			array('config.add', array('ic_nm_message', 'notification message')),
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_NOTIFY_MINECRAFT_TITLE',
			)),
			array('module.add', array(
				'acp',
				'ACP_NOTIFY_MINECRAFT_TITLE',
				array(
					'module_basename'	=>	'\ImagineCraft\notifyMinecraft\acp\notifyminecraft_module',
					'modes'				=>	array('settings'),
				),
			)),
		);

	}
}

