<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model
{
	public function getLoginData($email,$password)
    {

		$this->db->select('*');
		$this->db->from('user');
		$where = array('email' => $email, 'password' => $password );
		$this->db->where($where);
		$query=$this->db->get();
	    return $query->row_array();
	}
}