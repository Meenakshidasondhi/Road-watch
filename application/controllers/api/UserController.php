<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH. 'libraries/REST_Controller.php';
/**
 * @Authore:Meenakshi
 *Its basic api which perform some basic tasks
 */
class UserController extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();
    //echo "test 01\n";
    $this->config->load('myConstant');
    $this->load->library('session');
    $this->load->library('Authorization_Token');
    $this->load->helper(array('form', 'url','Validation_helper'));
    $this->load->library('form_validation');
    $this->load->model('UserModel');
    $this->load->model('AuthModel');
    $this->load->database('');
    $this->load->service('user_service');
    $this->load->helper("security");
    /*
    //This varable($this->headers ) used for Get Header request*/
    /*$this->headers = $this->input->request_headers(); 
    //This varable($this->result ) used for verified Token
    if (isset($this->headers['Authorization']) && ($this->headers['Authorization'])!=null && !empty($this->headers['Authorization']))
     { 
      
      else{

        if (isset($this->result['id'])) {
         $this->userId = $this->result['id'];
        }
        
      }
    }
    else
    {
        
      return $this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST); 
    }
*/
  }


/*
@ use : This api used for Get data any user
@ method:POST
@ Request peram: email-: Type->string
                 Role-: Type->string
@Responce:User Details
*/ 
private function tokenVerification()
{
  $headers = $this->input->request_headers();
  if (isset($headers['Authorization']) && ($headers['Authorization'])!=null && !empty($headers['Authorization']))
  {
    $result = verifiedToken($headers);
    if ($result == MESSAGE_conf::ERROR)
    { 
      return $result = $this->response(array( "message" =>MESSAGE_conf::INVALID_TOKEN),REST_Controller::HTTP_UNAUTHORIZED);;
    }
    return  array("id"=>$result['id']); 
  }
  else
  {
   return $result =$this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);
 }
}


public function getUser_get()
{
  $result = $this->tokenVerification();
  if (isset($result['id']))
  {
    $query = $this->user_service->getUserById($result['id']);
    if ($query)

    { 
      $this->response($query,REST_Controller::HTTP_OK); 
    }
    else
    {
      $this->response(array( "message" =>MESSAGE_conf::DATA_UNAVAILABLE),REST_Controller::HTTP_FORBIDDEN);
    }

  }
  else {
    return $result;
  }

}



/*
@ use : This Api Used For Delete User
@ method:POST
@ Request peram: email-: Type->string
                 Role-: Type->string
@Responce:OK
*/ 
public function deleteUser_delete()
{
  if (isset($this->result))
  {
    $email = $this->result['email'];
    $role = $this->result['role'];
    $query = $this->user_service->deleteUser($email,$role);
    if($query)
    {
      $this->response(array( "message" =>MESSAGE_conf::USER_DELETED),REST_Controller::HTTP_OK);
    }
    else
    {
      $this->response(array( "message" =>MESSAGE_conf::DATA_UNAVAILABLE),REST_Controller::HTTP_NOT_FOUND);
    }
  }
  else
  {
    $this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);
  }
}
public function afterVerify()
{
  return $this->response(array( "message" =>MESSAGE_conf::INVALID_TOKEN),REST_Controller::HTTP_UNAUTHORIZED);

}
/*
@ use : This Api Used For Update User
@ method:POST
@ Request peram: email-: Type->string
                 Password:->Type->string
                 Role-: Type->string
@Responce:OK
*/ 

public function updateUser_put()
{
  $result = $this->tokenVerification();
  if(isset($result['id']))
  {
    $useremail = $result['email'];
    $userrole = $result['role'];
    $updatedUser = array('name' => $this->input->post('username'),
      'password' => md5($this->input->post('userpassword')),
      'role' => $this->input->post('userrole'));
    $UpdatedValue = $this->user_service->updateUser($useremail,$userrole,$updatedUser);
    if ($UpdatedValue)
    {
      $this->response(array( "message" =>MESSAGE_conf::UPDATED_USER_DATA),REST_Controller::HTTP_OK); 
    }
    else
    {
      $this->response(array( "message" =>MESSAGE_conf::DATA_UNAVAILABLE),REST_Controller::HTTP_NOT_FOUND);
    }
  }
  else
  {
    $this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);
  }

}
/*
@ use : This Api Used For Chnage User Password
@ method:POST
@ Request peram: email-: Type->string
                 Password:->Type->string
                 Role-: Type->string
@Responce:OK
*/
/*public function ChnagePa()
{

}*/
}
?>