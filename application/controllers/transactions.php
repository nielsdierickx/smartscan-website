<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (core/MY_Controller)
		// User wordt naar login page geredirect als hij niet is ingelogd
		// In __construct functie zodat het geldig is op elke functie van deze klasse
		parent::__construct();
	}

	public function index()
	{ 
		$data['content'] = $this->load->view('transactions/main', '', true);
		$data['title'] = "Aankopen";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */