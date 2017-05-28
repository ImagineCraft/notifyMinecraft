<?php

namespace ImagineCraft\notifyMinecraft\acp;

class notifyminecraft_module
{
    public $u_action;

    public function main($id, $mode)
    {
        global $config, $request, $template, $user;

        $this->page_title = $user->lang('ACP_NOTIFY_MINECRAFT_TITLE');
        $this->tpl_name = 'acp_notify_minecraft_body';

        add_form_key('ImagineCraft/notifyMinecraft');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('ImagineCraft/notifyMinecraft'))
            {
                $user->add_lang('acp/common');
                trigger_error('FORM_INVALID');
            }

			$config->set('ic_nm_server_host', 
				$request->variable('ic_nm_server_host', 'hostname/ip'));
			$config->set('ic_nm_server_port', 
				$request->variable('ic_nm_server_port', 'port'));
			$config->set('ic_nm_server_pass', 
				$request->variable('ic_nm_server_pass', 'password'));
			$config->set('ic_nm_server_timeout', 
				$request->variable('ic_nm_server_timeout', 'timeout'));
			$config->set('ic_nm_server_message', 
				$request->variable('ic_nm_server_message', 'notification message'));
			$config->set('ic_nm_forum_id',
				$request->variable('ic_nm_forum_id', 'forum id'));

			trigger_error($user->lang('ACP_NOTIFY_MINECRAFT_SAVED') 
				. adm_back_link($this->u_action));
        }

        $template->assign_vars(array(
            'U_ACTION'			=> $this->u_action,
            'IC_NM_SERVER_HOST'	=> $config['ic_nm_server_host'],
            'IC_NM_SERVER_PORT'	=> $config['ic_nm_server_port'],
            'IC_NM_SERVER_PASS'	=> $config['ic_nm_server_pass'],
            'IC_NM_SERVER_TIMEOUT'	=> $config['ic_nm_server_timeout'],
			'IC_NM_SERVER_MESSAGE'	=> $config['ic_nm_server_message'],
			'IC_NM_FORUM_ID'		=> $config['ic_nm_forum_id'],
        ));
    }
}

