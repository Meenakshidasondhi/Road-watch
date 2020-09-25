<?php

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
    $this->config->load('my_constant');
    $this->load->library('session');
    $this->load->library('Authorization_Token');
    $this->load->helper(array('form', 'url','Validation_helper'));
    $this->load->library('form_validation');
    $this->load->model('User_model');
    $this->load->model('Auth_model');
    $this->load->database('');
    $this->load->service('user_service');
    /*
    //This varable($this->headers ) used for Get Header request*/
    $this->headers = $this->input->request_headers(); 
    //This varable($this->result ) used for verified Token
    if (isset($this->headers['Authorization']) && ($this->headers['Authorization'])!=null && !empty($this->headers['Authorization']))
     {
      $this->result = verified_token($this->headers);
      if($this->result ==MESSAGE_conf::ERROR){
        echo "string";
         $this->response(array( "message" =>MESSAGE_conf::INVALID_TOKEN),REST_Controller::HTTP_UNAUTHORIZED);
      }else{
        $this->userId = $this->result['id'];
      }
    }
    else
    {
     $this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST); 
    }

  }
/*
@ use : This api used for Get data any user
@ method:POST
@ Request peram: email-: Type->string
                 Role-: Type->string
@Responce:User Details
*/ 
public function getUser_get()
{
  if(isset($this->result))
  {
    $query = $this->user_service->getUserById($this->userId);
   
    if ($query)
    { print_r("1");
     $this->response($query,REST_Controller::HTTP_OK); 
    }
    else
    {
      print_r("2");
     $this->response(array( "message" =>MESSAGE_conf::DATA_UNAVAILABLE),REST_Controller::HTTP_NOT_FOUND); 
    }
    
  }
  else
  {
    $this->response(array( "message" =>MESSAGE_conf::TOKEN_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);
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
  if(isset($this->result))
  {
    $user_email = $this->result['email'];
    $user_role = $this->result['role'];
    $updated_user_data = array('name' => $this->input->post('username'),
    'password' => md5($this->input->post('userpassword')),
    'role' => $this->input->post('userrole'));
     $UpdatedValue = $this->user_service->updateUser($user_email,$user_role,$updated_user_data);
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
public function Chnage_passwrd()
{

}
}
?>