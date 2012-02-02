<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
  {
  	parent::__construct();
  }
	
	function get_all() 
	{
		$q = $this->db->get('users');
		
		if($q->num_rows() > 0) 
		{
			foreach ($q->result() as $row) 
			{
			    $data[] = $row;
			}	
		return $data;
		}
	}

	function verify_user($email, $password) 
	{
	
		$q = $this
				->db
				->where('email', $email)
				->where('password', $password)
				->limit(1)
				->get('users');

		if ($q->num_rows > 0) 
		{
			return $q->row();
		}
		return false;
	}
		
}