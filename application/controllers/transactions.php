<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (core/MY_Controller)
		// User wordt naar login page geredirect als hij niet is ingelogd
		// In __construct functie zodat het geldig is op elke functie van deze klasse
		parent::__construct();
		$this->load->model('transactions_model');
	}

	public function index()
	{ 
		$recent_transactions = $this->transactions_model->get_recent_transactions($this->user->id);	

		$recent_transactions_total = 0;

		foreach ($recent_transactions as $transaction)
		{
			$recent_transactions_total += $transaction->amount * $transaction->price;
		}

		$data['recent_transactions'] = $this->transactions_model->get_recent_transactions($this->user->id);
		$data['recent_transaction_totalprice'] = $recent_transactions_total;

		$data['transactions'] = $this->transactions_model->get_transactions($this->user->id);
		//$data['recent_transaction_totalprice'] = $recent_transactions_total;

		$data['content'] = $this->load->view('transactions/main', $data, true);
		$data['title'] = "Aankopen";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */