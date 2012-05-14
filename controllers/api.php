<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
	}

    /* Install App */
	function install_authd_get()
	{
		// Load
		$this->load->config('install');        
		$this->load->library('installer');

		// Settings
		$settings = $this->installer->install_settings('pages', config_item('pages_settings'));
		
		// Content
		$content = $this->installer->install_content(config_item('pages_content'), $this->oauth_user_id);		
	
		if ($settings == TRUE)
		{
            $message = array('status' => 'success', 'message' => 'Yay, the Pages App was installed');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang Pages App could not be uninstalled');
        }		
		
		$this->response($message, 200);
	}

}