<?php

namespace ImagineCraft\notifyMinecraft\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use phpbb\config\config;
use ImagineCraft\notifyMinecraft\event\rcon;

class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.ucp_register_user_row_after' => 'notify_minecraft',
		);
	}

	/* @var \phpbb\config\config */
	protected $config;

	public function __construct($config)
	{
		$this->config = $config;
	}

	public function notify_minecraft($event)
	{
		// Retrieve necessary data for message
		$username = $event['user_row']['username'];
		$regtime = gmdate("H:i:s T",
			$event['user_row']['user_regdate']);
		$boardurl = generate_board_url();
		$message = "phpBB: User $username registered at $regtime "
			. "requires activation here: $boardurl";

		$mc_server = $this->config['ic_nm_server_host'];
		$mc_port = $this->config['ic_nm_server_port'];
		$mc_pass = $this->config['ic_nm_server_pass'];
		$mc_timeout = $this->config['ic_nm_server_timeout'];
		// TODO
		// $mc_message = $this->config['ic_nm_server_message'];

		$rcon = new rcon($mc_server, $mc_port, $mc_pass, $mc_timeout);
		if( $rcon->connect() )
		{
			$rcon->send_command("say $message");
			$rcon->disconnect();
		}
	}
}

