<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Pages : Routes
* Author: 	Brennan Novak
* 		  	contact@social-igniter.com
*
* Project:	http://social-igniter.com/
* Source: 	http://github.com/socialigniter/pages
*
* Standard installed routes for Pages
*/
$route['pages/settings'] 				= 'settings/index';
$route['pages/settings/widgets']		= 'settings/widgets';
$route['pages/home/create'] 			= 'home/editor';
$route['pages/home/manage/(:num)'] 		= 'home/editor';
$route['pages/api/(:any)/(:any)/(:any)/(:any)'] = 'api/$1/$2/$3/$4';
$route['pages/api/(:any)/(:any)/(:any)'] = 'api/$1/$2/$3';
$route['pages/api/(:any)/(:any)']		= 'api/$1/$2';
$route['pages/api/(:any)']				= 'api/$1';
$route['pages/(:any)']					= 'pages/index';
