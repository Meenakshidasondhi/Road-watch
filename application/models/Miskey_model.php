<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miskey_model extends CI_Model

{

	public function insert_data($a,$b)
	{
		$this->db->insert($a,$b);

	}
	public function checkmail($m)
	{

		$this->db->where('email', $m);
		$result = $this->db->get('register');

		if($result->num_rows() > 0){
		   
		    return false;
		}
		else
		{
		    return true;
		}
	}
	
	public function loginuser($m,$n)
	{
       $multipleWhere = ['email' => $m, 'password' => $n];
       $this->db->where($multipleWhere);
       $result = $this->db->get('register');

		if($result->num_rows() > 0){
		   
		    return false;
		}
		else
		{
		    return true;
		}
	}


	public function get_user_data($m)
	{
      
      $query=$this->db->query("select * from register where email='$m'");
        return $query->result_array();
            

	}
	public function readid($m)
	{
      
      $query=$this->db->query("select user_id from register where email='$m'");
        return $query->row_array();  
	}
	public function read_user_data($m)
	{
      
      $query=$this->db->query("select * from user_data where user_id='$m'");
        return $query->result();  
	}
	 public function insert_user_data($a,$b)
	 {
	 	$this->db->insert($a,$b);
	 }
	 public function getdata($m)
	 {
        $q=$this->db->query("select email_add from user_data where data_id='$m'");
         
         return $q->result();  

	 }
}


