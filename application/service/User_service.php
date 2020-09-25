<?php
/**
 * @Authore:Meenakshi
 *Its Provide some basic services
 */
class User_service extends MY_Service
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('ApiModel');
        $this->load->model('AuthModel');
        $this->load->model('UserModel');

    }
    //Get Data by Email and Role
    public function getUserById($id)
    {
      return $this->UserModel->getUserById($id);
    }
    //update user data
    public function updateUser($email,$role,$data)
    {
       return $this->UserModel->updateUser($email,$role,$data);
        
    }
    //Delete user data
    public function deleteUser($email,$role)
    {
       return $this->UserModel->deleteUser($email,$role);       
    }
    //For user login
    public function getLoginData($email,$password)
    {
    	return $this->AuthModel->getLoginData($email, md5($password));
    }
}