<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (MY_Controller)
		parent::__construct();
	}

	public function index($profile_name)
	{ 
		// Check of naam in url overeenkomt met naam van ingelogde user (anders redirect)
		if($profile_name == $this->user->username)
		{
			$data['title'] =  $profile_name;
			$data['username'] =  $this->user->username;

			$this->load->view('header_loggedin', $data);
			$this->load->view('user_view', $data);
			$this->load->view('footer', $data);
		}
		else {
			redirect('/', 'refresh');
		}
	
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/user.php */