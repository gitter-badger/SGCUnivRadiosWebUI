<?php  

if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
}

$route['default_controller'] = "login";
$route['listen/currentsong/(:any)'] = 'listen/currentsong/$1';
$route['listen/currentsong'] = 'listen/currentsong';
$route['listen/(:any)'] = 'listen/index/$1';
$route['listen'] = 'listen/index';
$route['404_override'] = '';

