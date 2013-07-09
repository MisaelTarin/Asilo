<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main";
$route['404_override'] = '';

//Custom routes
$route['project/(:num)'] = "project/index/$1";