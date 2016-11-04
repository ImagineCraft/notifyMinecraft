<?php

namespace ImagineCraft\notifyMinecraft\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

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

	public function __construct(\phpbb\config\config $config)
	{
		$this->config = $config;
	}

	public function notify_minecraft($event)
	{
		if( $this->config['require_activation'] == USER_ACTIVATION_ADMIN )
		{

		}


	}
}

