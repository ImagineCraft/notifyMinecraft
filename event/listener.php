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
			'core.posting_modify_submit_post_after' => 'notify_mc_app',
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

	public function notify_mc_app($event)
	{
		$mc_forumID = $this->config['ic_nm_forum_id'];
		$event_forumID = $event['forum_id'];
		$event_postMode = $event['mode'];

		if( $event_forumID == $mc_forumID &&
			$event_postMode == 'post')
		{
			$boardurl = generate_board_url();
			$redirecturl = htmlspecialchars_decode($event['redirect_url']);
			$boardurl = $boardurl . ltrim($redirecturl,'.');
			$message = "phpBB: A new server application has been posted here: $boardurl";

			$mc_server = $this->config['ic_nm_server_host'];
			$mc_port = $this->config['ic_nm_server_port'];
			$mc_pass = $this->config['ic_nm_server_pass'];
			$mc_timeout = $this->config['ic_nm_server_timeout'];

			$rcon = new rcon($mc_server, $mc_port, $mc_pass, $mc_timeout);
			if( $rcon->connect() )
			{
				$rcon->send_command("say $message");
				$rcon->disconnect();
			}
		}
	}

}

