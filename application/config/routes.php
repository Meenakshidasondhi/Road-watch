<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Miskey_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['about']='Miskey_controller/about';
$route['discover']='Miskey_controller/discover';
$route['hdr']='Miskey_controller/hdr';
$route['footer']='Miskey_controller/footer';
$route['contact']='Miskey_controller/conact';
$route['whymiskey']='Miskey_controller/whymiskey';
$route['profile']='Miskey_controller/profile';
$route['insertdata']='Miskey_controller/insertdata';
$route['login']='Miskey_controller/login';
$route['logout']='Miskey_controller/logout';
$route['index']='Miskey_controller/index';
$route['readdata']='Miskey_controller/readdata';
$route['addata']='Miskey_controller/addata';
$route['login']='api/First_api/login';
$route['verfication']='api/First_api/verify';
$route['loginuser']='api/First_api/user_login';
//This route use for Roadwatch 
//this route is use for the login any type of users
$route['v1/user/login']='api/AuthController/userLogin';
$route['v1/user']='api/AuthController/signup';
//$route['user/userData']='api/UserController/userData';
$route['v1/user']='api/UserController/getUser';
/*$route['v1/invalidRequest']='api/UserController/afterVerify';
*/$route['v1/invalidRequest']='api/RequestFilter/afterVerfied';

//$route['v1/user']='api/UserController/deleteUser';
//$route['v1/user']='api/UserController/updateUser';



