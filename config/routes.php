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
$route['pages/home/manage/(:num)']			= 'home/pages_editor';
$route['pages/home/create']					= 'home/pages_editor';