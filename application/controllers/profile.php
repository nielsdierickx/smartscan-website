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
		$data['profile_content'] = $this->load->view('profile/profile-main', '', true);

		$this->load->view('header_loggedin');
		$this->load->view('profile/profile-master', $data);
		$this->load->view('footer');	
	}

	public function edit()
	{
		$data['profile_content'] = $this->load->view('profile/profile-edit', '', true);

		$this->load->view('header_loggedin');
		$this->load->view('profile/profile-master', $data);
		$this->load->view('footer');
		
	}

	public function lists()
	{
		$data['profile_content'] = $this->load->view('profile/profile-lists', '', true);

		$this->load->view('header_loggedin');
		$this->load->view('profile/profile-master', $data);
		$this->load->view('footer');
	}

	public function newlist()
	{
		$data['profile_content'] = $this->load->view('profile/profile-newlist', '', true);

		$this->load->view('header_loggedin');
		$this->load->view('profile/profile-master', $data);
		$this->load->view('footer');
	}

	public function transactions()
	{
		$data['profile_content'] = $this->load->view('profile/profile-transactions', '', true);

		$this->load->view('header_loggedin');
		$this->load->view('profile/profile-master', $data);
		$this->load->view('footer');
	}

	

}

/* End of file profile.php */
/* Location: ./application/controllers/user.php */