<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Pages : Install
* Author: 		Brennan Novak
* 		  		contact@social-igniter.com
*          
* Created: 		Brennan Novak
*
* Project:		http://social-igniter.com/
* Source: 		http://github.com/socialigniter/pages
*
* Description: 	Install values for Pages for Social Igniter 
*/
/* Content */
$config['pages_content'][] = array(
	'module'		=> 'pages', 
	'type'	 		=> 'page', 
	'source'		=> 'website', 
	'parent_id'		=> 0,
	'category_id'	=> 0,
	'order'			=> 1,
	'title'			=> 'Welcome',
	'title_url'		=> 'welcome',
	'content'		=> 'Welcome to the homepage of your website.',
	'details'		=> 'index',
	'canonical'		=> NULL,
	'access'		=> 'E',
	'comments_allow'=> 'Y',
	'geo_lat'		=> NULL,
	'geo_long'		=> NULL
);
		
$config['pages_content'][] = array(
	'module'		=> 'pages', 
	'type'	 		=> 'page', 
	'source'		=> 'website', 
	'parent_id'		=> 0,
	'category_id'	=> 0,
	'order'			=> 1,
	'title'			=> 'About',
	'title_url'		=> 'about',
	'content'		=> 'Here you can write all about your website or you can delete the page.',
	'details'		=> 'site',
	'canonical'		=> NULL,
	'access'		=> 'E',
	'comments_allow'=> 'Y',
	'geo_lat'		=> NULL,
	'geo_long'		=> NULL
);

/* Settings */
$config['pages_settings']['enabled'] 			= 'TRUE';
$config['pages_settings']['create_permission']	= '3';
$config['pages_settings']['publish_permission']	= '2';
$config['pages_settings']['manage_permission']	= '2';
$config['pages_settings']['ratings_allow'] 		= 'TRUE';
$config['pages_settings']['tags_display'] 		= 'TRUE';
$config['pages_settings']['comments_allow'] 	= 'TRUE';
$config['pages_settings']['comments_per_page'] 	= '10';