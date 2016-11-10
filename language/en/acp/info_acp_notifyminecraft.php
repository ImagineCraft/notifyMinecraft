<?php
if (!defined('IN_PHPBB'))
{
    exit;
}
if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

$lang = array_merge($lang, array(

	// ACP Entries
	'ACP_NOTIFY_MINECRAFT_TITLE'	=>	'Notify Minecraft',
	'ACP_NOTIFY_MINECRAFT_CONTROL'	=>	'Notify Minecraft Settings',
	'ACP_NOTIFY_MINECRAFT_SAVED'	=>	'Notify Minecraft Settings Saved!',
	'ACP_NOTIFY_MINECRAFT_SETTINGS'	=>	'Settings',
	'ACP_NOTIFY_MINECRAFT_SERVER_HOST'	=>	'Minecraft Server FQDN or IP',
	'ACP_NOTIFY_MINECRAFT_SERVER_PORT'	=>	'Minecraft Server RCON Port',
	'ACP_NOTIFY_MINECRAFT_SERVER_PASS'	=>	
		'Minecraft Server RCON Password',
	'ACP_NOTIFY_MINECRAFT_SERVER_TIMEOUT'	=>	
		'Minecraft Server RCON Timeout (in seconds)',
	'ACP_NOTIFY_MINECRAFT_SERVER_MESSAGE'	=>	
		'Message to be sent on notification to Minecraft Server',
));

