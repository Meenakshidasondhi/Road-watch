<?php

require APPPATH. 'libraries/REST_Controller.php';

/**
 * @Authore:Meenakshi
 *Its basic api which perform some basic tasks
 */
class AuthController extends REST_Controller
{
	public function __construct() 
  {
    parent::__construct();
    $this->config->load('myConstant');
    $this->load->library('session');
    $this->load->library('Authorization_Token');
    $this->load->helper(array('form', 'url','Validation_helper'));
    $this->load->library('form_validation');

    $this->load->model('UserModel');
    $this->load->model('AuthModel');
    $this->load->database('');
    $this->load->service('user_service');

  }
/*
@ use : This api used for login any user
@ method:POST
@ Request peram: email-: Type->string
				password-: Type->string

@Responce:login details

*/


public function userLogin_post()
{
  $email=$this->input->post("email");
  $password=$this->input->post("password");
  if ($email!= "" && $password!= "")
  {
    /*For verfiying email */
    $isVerified = verifyEmail($email);
    if($isVerified == 1)
    {
       $result = $this->user_service->getLoginData($email,$password);
     
      if (isset($result)){
        $userData['email']=$result['email'];
        $userData['id']=$result['id'];
        $userData['role']=$result['role'];
        $tokenData = $this->authorization_token->generateToken($userData);
        $sucessResponse['token'] = $tokenData;
        $sucessResponse['role']=$result['role'];
        $sucessResponse['message'] =MESSAGE_conf::AUTHRIZED_USER;
        $this->response($sucessResponse,REST_Controller::HTTP_OK);

      }
      else
      {
        $this->response(array("message" =>MESSAGE_conf::UN_AUTHRIZED_USER),REST_Controller::HTTP_UNAUTHORIZED);
      }
    }
    else
    {
      $this->response(array("message" =>MESSAGE_conf::UN_AUTHRIZED_USER),REST_Controller::HTTP_BAD_REQUEST);
    }
  }
  else
  {
    $this->response(array("message" =>MESSAGE_conf::ALL_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);
  }
}
  /*
@ use : This api used for Signup any user
@ method:POST
@ Request peram: email-: Type->string
                 password-: Type->string
                 Role-: Type->string  

@Responce:Successfully Created

*/
public function signup_post()
{
  $name = $this->input->post("name");
  $email = $this->input->post("email");
  $role = $this->input->post("role");
  $password = $this->input->post("password");
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  if (($name!=null && !empty($name)) && ($email!=null && !empty($email)) && ($password!=null && !empty($password)))
  {
    $isVerified = verifyEmail($email);
    if ($isVerified)
    {
      if($uppercase && $lowercase && $number && strlen($password) > 6) 
      {
        $data =array('name' => $name,
       'email' => $email, 
       'password' =>md5($password),
       'role' => $role,);
        $result1 = $this->UserModel->checkUser($email);
        if ($result1)
        {
          $this->response(array("message" =>MESSAGE_conf::ALREDY_USED),REST_Controller::HTTP_BAD_REQUEST);
        }
        else
        {
          $result2 = $this->UserModel->createUser($data);
          if(isset($result2))
          {
            $sucessResponse = $result2;
            $this->response(array( "message" =>MESSAGE_conf::REGISTERD),REST_Controller::HTTP_CREATED);
          }
          else
          {
            $this->response(array("message" =>MESSAGE_conf::UNREGISTERD),REST_Controller::HTTP_BAD_REQUEST);
          }
        }
      }
      else
      {
        $this->response(array("message" =>MESSAGE_conf::INVALID_PASSWORD_FORMAT),REST_Controller::HTTP_BAD_REQUEST);
      }
    }
    else
    {
      $this->response(array("message" =>MESSAGE_conf::INVALID_EMAIL),REST_Controller::HTTP_BAD_REQUEST);
    }
  }
  else
  {
    $this->response(array("message" =>MESSAGE_conf::ALL_REQUIRED),REST_Controller::HTTP_BAD_REQUEST);
  }
}  



}?>