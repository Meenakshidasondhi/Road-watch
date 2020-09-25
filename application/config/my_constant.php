
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['my_config_item'] = 'my_config_value';
define('ABCD_MY_CONSTANT', 'my_config_item');

class MESSAGE_conf {
	const ERROR = "Error";

	const ALL_REQUIRED = "All Field Required";
	const UN_AUTHRIZED_USER = "Invalid Email/Password";
	const INVALID_EMAIL = "Invalid Email";
	const INVALID_PASSWORD_FORMAT = "Invalid Password Format";
	const AUTHRIZED_USER = "Login Successfully";
	const REGISTERD = "User Registerd";
	const UNREGISTERD = "User Not Registerd";
	const GET_USER_DATA = "Get User Data";
	const USER_DELETED = "User Successfully Deleted";
	const TOKEN_REQUIRED = "Token is Required";
	const INVALID_TOKEN= "Invalid Token";

	const ALREDY_USED = "This Email Is Already Used";
	const UPDATED_USER_DATA = "User Data Updated";
	const DATA_UNAVAILABLE = "User Not Exist";
    const SOME_VAR = "Email valid, but not exist";
    const SOME_VAR2 = "Email valid and exist";
  
}

// in a controller:
