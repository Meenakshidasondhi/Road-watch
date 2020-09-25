<?php

require APPPATH. 'libraries/REST_Controller.php';
/**
 * @Authore:Meenakshi
 *Its basic api which perform some basic tasks
 */
class RequestFilter extends REST_Controller
{
 
  public function __construct()
  {
    parent::__construct();
    //echo "test 01\n";
    $this->config->load('myConstant');
    $this->load->library('session');
    $this->load->library('Authorization_Token');
    $this->load->helper(array('Validation_helper'));
       $this->load->model('UserModel');
    $this->load->model('AuthModel');
    $this->load->database('');
    $this->load->helper("security");
    /*
    //This varable($this->headers ) used for Get Header request*/
    $this->headers = $this->input->request_headers(); 
    //This varable($this->result ) used for verified Token
      
  }

public function afterVerfied()
{
  return $this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);
}
}
?>
/*