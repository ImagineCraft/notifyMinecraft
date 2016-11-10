<?php

namespace ImagineCraft\notifyMinecraft\acp;

class notifyminecraft_info
{
	public function module()
	{
		return array(
			'filename'	=>	'\ImagineCraft\notifyMinecraft\acp\notifyminecraft_module',
			'title'		=>	'ACP_NOTIFY_MINECRAFT_TITLE',
			'modes'		=>	array(
				'settings'	=>	array(
					'title'	=>	'ACP_NOTIFY_MINECRAFT_TITLE',
					'auth'	=>	'ext_ImagineCraft/notifyMinecraft && acl_a_board',
					'cat'	=>	array('ACP_NOTIFY_MINECRAFT_TITLE'),
				),
			),
		);
	}
}

