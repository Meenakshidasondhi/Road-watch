<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiModel extends CI_Model

{


	public function get_data()
	{
	   
	  $this->db->select('*');
	  $this->db->from('user_data');
	  $query=$this->db->get();
	  return $query->result();

	}
		public function insert_data( $data = array())
		{

		return $this->db->insert("api_tab", $data );
		
		}
		public function delete_data( $data = array())
		{
             $this->db->where('id',$data);
		return $this->db->delete("api_tab");
		
		}
		public function update_data($id,$info)

		{
	         $this->db->where('id',$id);
	         return $this->db->update('api_tab',$info);

		}
		public function getser($email,$password)
		{
			$this->db->select('*');
	        $this->db->from('api_tab');
            $where = array('email' => $email, 'password' =>$password );
	        $this->db->where($where);
	        $query=$this->db->get();
	        return $query->result();
		}

     
     public function getjwtdata($email,$role)
     {
            $this->db->select('*');
	        $this->db->from('user_login');
            $where = array('user_email' => $email, 'role' => $role );
	        $this->db->where($where);
	        $query=$this->db->get();
	       return $query->row_array();
     }
}