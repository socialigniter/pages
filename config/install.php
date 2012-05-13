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
$config['pages_content'][] = array('pages', 'page', 'website', NULL, 1, 'Welcome', 'welcome', NULL, 'index', 'E', 'Y', NULL, NULL, NULL, 'Y', 'A', 'P');
$config['pages_content'][] = array('pages', 'page', 'website', NULL, 2, 'About', 'about', NULL, 'module_page', 'E', 'Y', NULL, NULL, NULL, 'Y', 'A', 'P');
$config['pages_content'][] = array('pages', 'page', 'website', NULL, 3, 'Contact', 'contact', NULL, 'module_page', 'E', 'Y', NULL, NULL, NULL, 'Y', 'A', 'P');

/* Settings */
$config['pages_settings']['enabled'] 			= 'TRUE';
$config['pages_settings']['crud_permission'] 	= '2';
$config['pages_settings']['ratings_allow'] 		= 'TRUE';
$config['pages_settings']['tags_display'] 		= 'TRUE';
$config['pages_settings']['comments_allow'] 	= 'TRUE';
$config['pages_settings']['comments_per_page'] 	= '10';