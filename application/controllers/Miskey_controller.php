<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miskey_controller extends CI_Controller {



	public function __construct() {
parent::__construct();


$this->load->library('session');


}

	
	public function index()
	{
		$this->load->view('miskey');
	}

public function insertdata()
{  

	if($this->input->post())
		{
			
  		$config['upload_path'] = './upload_images/';
      $config['allowed_types'] = 'gif|jpg|png';
        
       $this->load->library('upload', $config);
       $username=$_POST['user'];
       $useremail=$_POST['email'];
     
      	
     
       $userphone=$_POST['phone'];
       $usercountry=$_POST['country'];
       $userpass=$_POST['passw'];
      
        $this->upload->do_upload('profileimg');

       $imageArray = $this->upload->data();
       
       $images =  $imageArray['file_name'];
           
         $data = array('user_name' => $username ,
         'email' => $useremail ,
         'phone' => $userphone ,
         'country' => $usercountry ,
         'password' => md5($userpass),
         'pimg'=> $images ); 
          $check=$this->Miskey_model->checkmail($useremail);
	        if ($check == true)
	        {      
	         $this->Miskey_model->insert_data('register',$data);
	      
	         redirect('index');
	        }
         else
		      {
		      	    $this->session->set_flashdata("signup_failure", "Email address alredy exist in our database");
		            redirect('index');

		      	
		     }
       }
      
	}


	
	public function hdr()
	{
		$this->load->view('hdr');
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function conact()
	{  
		$srchmail  = $this->session->userdata('loginmail');
		if ($this->session->userdata('loginmail')) {
			
        $check = $this->Miskey_model->readid($srchmail);
        $result['data'] = $this->Miskey_model->read_user_data($check['user_id']);
        		$this->load->view('conact',$result);}
        		else
        		{
        			redirect('index');
        		}
	}
	public function profile()
	{
      
      $srchmail  = $this->session->userdata('loginmail');
      if ($this->session->userdata('loginmail')) {
      $check['data'] = $this->Miskey_model->get_user_data($srchmail);

 
		$this->load->view('profile',$check);
	}
	else
	{

		redirect('index');
	}
	}
	public function whymiskey()
	{
		$this->load->view('whymiskey');
	}
	public function footer()
	{
		$this->load->view('footer');
	}
	public function discover()
	{
		$this->load->view('discover');
	}

	public function login()
	{
      $logemail= $_POST['loginemail'];
      $logpass= md5($_POST['loginpass']);
      $check= $this->Miskey_model->loginuser($logemail,$loginpass);
      if ($check == true)
      {
         $session_data = array(  
                          'loginmail'     =>    $logemail ,
                          'loginpassw'     =>      $logpass
                     );  
                     $this->session->set_userdata($session_data); 
                     redirect('profile');
      }
	}

  public function logout()
  {

  
        $this->session->sess_destroy();
        redirect('index');


  }
  public function readdata()
  {
    
  }
   public function addata()

   { 
   	$srchmail  = $this->session->userdata('loginmail');
   	$uid=$_POST['uid'];
     $uname=$_POST['contact_name'];
     $uphone=$_POST['contact_phone'];
     $uemail=$_POST['contact_email'];
     $d = array('user_id' => $uid,
     'usrname' => $uname,
     'phone_number' => $uphone,
     'email_add' => $uemail );
     $this->Miskey_model->insert_user_data('user_data',$d);
     
    redirect('contact');
    

   }


}
