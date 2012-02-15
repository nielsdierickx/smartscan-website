<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends User_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index($profile_name)
	{ 
		$data['title'] =  $profile_name;
		$data['profile_name'] =  $profile_name;
		$data['username'] =  $this->user->username;

		$this->load->view('header_loggedin', $data);
		$this->load->view('user_view', $data);
		$this->load->view('footer', $data);
	
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */