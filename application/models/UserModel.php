<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Authore:Meenakshi
 *This Model used for Road_watch api
 */
class UserModel extends CI_Model

{
	   /*
	   This function used for register the user
	   */
		public function createUser($data = array())
		{

		 return $this->db->insert("user", $data );
		
		}
		/*
	   This function used for check the useremail
	   */
		public function checkUser($data)
		{
  			$this->db->select('*');
	        $this->db->from('user');
	        $where = array('email' => $data);
	        $this->db->where($where);
	        $query=$this->db->get();
	        return $query->row_array();
		}
		/*
	   This function used for get the userdata
	   */
		public function getUserById($id)
		{
			$this->db->select('id,name,email,role,created_at');
	        $this->db->from('user');
            $where = array('id' => $id, 'is_deleted' => 0);
	        $this->db->where($where);
	        $query=$this->db->get();
	        return $query->row_array();

	        
	    }
	    /*
	   This function used for Delete the user
	   */
	    public function deleteUser($email,$role)
		{
			$where = array('email' => $email, 'role' => $role );
	        $this->db->where($where);
   		    return $this->db->delete("user");
	    }
	    /*
	   This function used for Update the userdata
	   */
	    public function updateUser($email,$role,$data)
	    {
	    	$where = array('email' =>$email,'role' =>$role);
			$this->db->where($where);
            return $this->db->update('user',$data);
        }
		
}