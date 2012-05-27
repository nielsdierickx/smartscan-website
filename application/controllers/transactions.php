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

		$transactions = $this->transactions_model->get_transactions($this->user->id);	

		$transactions_total = 0;

		foreach ($transactions as $transaction)
		{
			$transactions_total += $transaction->amount * $transaction->price;
		}

		$data['transactions'] = $this->transactions_model->get_transactions($this->user->id);
		$data['transaction_totalprice'] = $transactions_total;

		$data['content'] = $this->load->view('transactions/main', $data, true);
		$data['title'] = "Aankopen";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}

	public function detail($id)
	{ 
		$data['transaction'] = $this->transactions_model->get_transaction($id, $this->user->id);
		$data['transactions'] = $this->transactions_model->get_product_transactions($data['transaction']->tproduct_id, $this->user->id); 
		
		$transactions_total = 0;

		foreach ($data['transactions'] as $transaction)
		{
			$transactions_total += $transaction->total_price;
		}
	
		$data['transactions_total'] = $transactions_total;

		$data['content'] = $this->load->view('transactions/detail', $data, true);
		$data['title'] = "Detail aankoop";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */