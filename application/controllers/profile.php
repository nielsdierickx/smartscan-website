<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (core/MY_Controller)
		// User wordt naar login page geredirect als hij niet is ingelogd
		// In __construct functie zodat het geldig is op elke functie van deze klasse
		parent::__construct();

		$data['title'] =  $this->user->first_name . " " . $this->user->last_name;
		$data['username'] =  $this->user->username;
		$data['email'] =  $this->user->email;
		$this->load->vars($data);
	}

	public function index()
	{ 
		// Derde parameter zorgt ervoor dat de view niet in de browser wordt geladen, maar wordt doorgegeven als een string
		$data['profile_content'] = $this->load->view('profile/profile-main', '', true);

		$this->load->view('header_loggedin');
		$this->load->view('profile/profile-master', $data);
		$this->load->view('footer');	
	}

	public function edit()
	{

		// $data['voornaam'] =  $this->user->first_name;

		$data['first_name'] = array('name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->user->first_name,
				'class' => 'round',
		);

		$data['last_name'] = array('name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->user->last_name,
				'class' => 'round',
		);

		$data['submit'] = array('name' => 'submit',
				'value' => 'Wijzigingen opslaan',
				'class' => 'button button-gradient round',
			);

		$data['profile_content'] = $this->load->view('profile/profile-edit', $data, true);

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
		$data['list_name'] = array('name' => 'list_name',
				'id' => 'list_name',
				'type' => 'text',
				'placeholder' => 'Typ hier de naam van je lijstje',
				'class' => 'round',
		);

		$data['profile_content'] = $this->load->view('profile/profile-newlist', $data, true);

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