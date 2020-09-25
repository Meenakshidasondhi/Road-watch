<?php


/**
 * 
 */
class MyHooks extends CI_Controller
{
	public function __construct() {
	parent::__construct();
	//$this->load->library('session');
		$this->CI = & get_instance();
		$this->CI->load->library('session');

}
	

	function afterVerfied()

	{
		

		echo "hiiii";
		 //return $this->response(array( "message" =>"fsdfgdsf"),REST_Controller::HTTP_BAD_REQUEST); 

		 /*$this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);*/
	}
}


?>