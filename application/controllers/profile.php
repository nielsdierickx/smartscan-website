<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (core/MY_Controller)
		// User wordt naar login page geredirect als hij niet is ingelogd
		// In __construct functie zodat het geldig is op elke functie van deze klasse
		parent::__construct();
	}

	public function index()
	{ 
		// Derde parameter zorgt ervoor dat de view niet in de browser wordt geladen, maar wordt doorgegeven als een string
		$data['content'] = $this->load->view('profile/main', '', true);
		$data['title'] =  "Profiel";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');	
	}

	public function edit()
	{
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
				'class' => 'button-accent button-accent-gradient round',
			);

		$data['content'] = $this->load->view('profile/edit', $data, true);
		$data['title'] =  "Profiel wijzigen";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');	
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */