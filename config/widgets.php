<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Pages : Widgets
* Author: 		Brennan Novak
* 		  		contact@social-igniter.com
*         		@brennannovak
* 
* Project:		http://social-igniter.com/
* Source: 		http://github.com/socialigniter/pages
*
* Description: 	Pages Widgets in core install of Social Igniter
*/

$config['pages_widgets'][] = array(
	'regions'	=> array('navigation'),
	'widget'	=> array(
		'module'	=> 'pages',
		'name'		=> 'Dropdown Menu',
		'method'	=> 'run',
		'path'		=> 'widgets_dropdown_menu',
		'multiple'	=> 'FALSE',
		'order'		=> '1',
		'title'		=> 'Dropdown Menu',
		'content'	=> ''
	)
);

$config['pages_widgets'][] = array(
	'regions'	=> array('leftbar', 'middle', 'sidebar'),
	'widget'	=> array(
		'module'	=> 'pages',
		'name'		=> 'Verticle Menu',
		'method'	=> 'run',
		'path'		=> 'widgets_sidebar_menu',
		'multiple'	=> 'FALSE',
		'order'		=> '1',
		'title'		=> 'Verticle Menu',
		'content'	=> ''
	)
);
