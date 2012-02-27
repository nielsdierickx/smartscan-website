<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (MY_Controller)
		parent::__construct();

		$data['title'] =  $this->user->first_name . " " . $this->user->last_name;
		$data['username'] =  $this->user->username;
		$this->load->vars($data);
	}

	public function index()
	{ 
		// Check of naam in url overeenkomt met naam van ingelogde user (anders redirect)
		// if($profile_name == $this->user->username)
		// {
			

			$this->load->view('header_loggedin');
			$this->load->view('profile/profile-master');
			$this->load->view('footer');
			
		// }
		// else {
		// 	redirect('/', 'refresh');
		// }
	
	}

	public function lists()
	{
		$this->load->view('profile/profile-lists');
	}

	public function load_profile()
	{
		$this->load->view('profile/profile-main');
	}

	public function load_profile_edit()
	{
		$this->load->view('profile/profile-edit');
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/user.php */