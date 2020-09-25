<?php

require APPPATH. 'libraries/REST_Controller.php';

/**
 * @Authore:Meenakshi
 *Its basic api which perform some basic tasks
 */
class First_api extends REST_Controller
{
	public function __construct() {
parent::__construct();


$this->load->library('session');
$this->load->library('Authorization_Token');

$this->load->helper(array('form', 'url'));
  $this->load->library('form_validation');

$this->load->model('Api_model');
$this->load->database('');



}

/*
This function working for the insert data
*/
	public function index_post()
	{
       $name=$this->input->post("name");
       $email=$this->input->post("email");
       $mobile=$this->input->post("mobile");
       $pass=$this->input->post("password");
       $this->form_validation->set_rules("name","name is required","required");
       $this->form_validation->set_rules("email","email is required","required|valid_email");
       $this->form_validation->set_rules("mobile","mobile is required","required");
      $this->form_validation->set_rules("password","password is required","required");

       if ($this->form_validation->run() === FALSE)
        {
       	$this->response(array("message" =>"all are nedded"),REST_Controller::HTTP_NOT_FOUND);
       }
       else
       {
      /*echo "Its post method";*/
      /*$data= json_decode(file_get_contents("php://input"));

      $name = isset($data->name) ? $data ->name : "";
      $email = isset($data->email) ? $data ->email : "";
      $mobile = isset($data->mobile) ? $data ->mobile : "";*/

      if (!empty($name) && !empty($email) && !empty($mobile) && !empty($password))
      {
      $st =array('name' => $name,
      'email' => $email, 
      'mobile_no' => $mobile,
      'password' =>$pass );
      
		      if ($this->Api_model->insert_data($st))
		      {
		      	$this->response(array("message" =>"Data inserted"),REST_Controller::HTTP_OK);
		      }
		      else
		      {
		         $this->response(array("message" =>"Some error"),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

		      }
		  }

      else{

      		$this->response(array("message" =>"Plese insert data"),REST_Controller::HTTP_NOT_FOUND);
      }


    }

	}

  /*

This function working for retrive/ read the data
  */
	/*public function index_get()
	{ 

      $result = $this->Api_model->get_data();
      if ($result > 0) 
      {
      	
      	$this->response(array("data" =>$result),REST_Controller::HTTP_OK);
      }
      else
      {
      	$this->response(array("message" =>"Data not found"),REST_Controller::HTTP_NOT_FOUND);
      }

	}*//*

This function working for delete the data
  */
	public function index_delete()

   {
   	$data = json_decode(file_get_contents("php://input"));
   	$uid = isset($data->id) ? $data ->id : "";
   	
   	if ($this->Api_model->delete_data($uid))
		      {
		      	$this->response(array("message" =>"Data deleted"),REST_Controller::HTTP_OK);
		      }
		      else
		      {
		         $this->response(array("message" =>"Some error"),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

		      }
   }
   /*

        This function working for  update the data
  */
   public function index_put()
   {
	$data = json_decode(file_get_contents("php://input"));
	
	
	if (isset($data->id) && isset($data->name)&& isset($data->email) && isset($data->mobile) ) {
		$uid = $data->id;
		$info = array('name' => $data->name , 
	                  'email' => $data->email ,
                      'mobile_no' => $data->mobile );
		
	
		if ($this->Api_model->update_data($uid,$info))
		{
			$this->response(array("message" =>"Updated sucess"),REST_Controller::HTTP_OK);
		}
		
		else
		{
			$this->response(array("message" =>"errrorrr"),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}

	}
	else
	{
      $this->response(array("message" =>"Not updated"),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
	}

   }
        /*

        This function working for login with authentication with token
          */
    public function login_post()
    {
      $email=$this->input->post("email");
      $password=$this->input->post("password");
      
       $token_data['email'] = $email; 
       $token_data['password'] = $password;
         
   
        $result=$this->Api_model->getser($token_data['email'], $token_data['password']);
        
        if ($result)
        {
         $tokenData = $this->authorization_token->generateToken($token_data);
          
        $final = array();
                 $final['token'] = $tokenData;
                 $final['status'] = 'ok';
                  $this->response($final);
                  

/*         $this->response(array( "message" =>"login sucess"),REST_Controller::HTTP_OK);
*/         
        }
        else
        {
          $this->response(array("message" =>"Not login"),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    /*for verification the token & For getting the data through the JWT*/
  public function verify_post()
  {  
    $headers = $this->input->request_headers(); 

    $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
    $var=(array)$decodedToken['data'];
     
     $e = $var['email'];
     $r = $var['role'];
    
     $qry = $this->Api_model->getjwtdata($e,$r);
     $this->response(array( "message" =>"lwayer login sucess", "data"=>$qry),REST_Controller::HTTP_OK);
    print_r($var);
  }
  /*
  

  */
  public function getJwtData_get()
  {
    echo $var;
  }

  public function get_user_details_get()
  {
    echo "token verified";
  }


  public function user_login_post()
  {  
      $email=$this->input->post("email");
      $password=$this->input->post("password");
       $token_data['email'] = $email; 
       $token_data['password'] = $password;
      $result=$this->Api_model->get_login_data($token_data['email'], $token_data['password']);
     
     $token_data['role']=$result['role'];
     
    
      if ($result['role'] == 'lawyer')
        {
         $tokenData = $this->authorization_token->generateToken($token_data);
          
        $final = array();
                 $final['token'] = $tokenData;
                 $final['status'] = 'ok';
                  $this->response($final);
                  

        $this->response(array( "message" =>"lwayer login sucess"),REST_Controller::HTTP_OK);
        
            
        }
        elseif ($result['role'] == 'user')
         {
          $tokenData = $this->authorization_token->generateToken($token_data);
                    
                  $final = array();
                           $final['token'] = $tokenData;
                           $final['status'] = 'ok';
                            $this->response($final);
                            

                  $this->response(array( "message" =>"user login sucess"),REST_Controller::HTTP_OK);
                 echo $tokenData;
        }
        else
        {
          $this->response(array("message" =>"invalid login"),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
        

  }

}

?>