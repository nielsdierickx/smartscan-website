<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (core/MY_Controller)
		// User wordt naar login page geredirect als hij niet is ingelogd
		// In __construct functie zodat het geldig is op elke functie van deze klasse
		parent::__construct();

		$this->load->model('lists_model');
		$this->load->model('products_model');
		$this->load->model('promotions_model');
	}

	public function index()
	{ 
		if($listid = $this->session->userdata('list-id'))
		{
			$data['list'] = $this->lists_model->get_list_by_id($listid);
			$data['productcount'] = $this->lists_model->get_product_count($listid);

			$products = $this->lists_model->get_products($listid);

			$total = 0;

			foreach ($products as $product)
			{
				if($product->discount)
		        {
		            $total += $product->amount * ($product->price - ($product->price * $product->discount));
		        }
		        else
		        {
		            $total += $product->amount * $product->price; 
		        }
			}
			
			$data['totalprice'] = $total;
		}

		$data['categories'] = $this->products_model->get_categories();

		$data['content'] = $this->load->view('products/categories', $data, true);
		$data['title'] = "Producten";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}

	public function category($id)
	{
		if($listid = $this->session->userdata('list-id'))
		{
			$data['list'] = $this->lists_model->get_list_by_id($listid);
			$data['productcount'] = $this->lists_model->get_product_count($listid);

			$products = $this->lists_model->get_products($listid);

			$total = 0;

			foreach ($products as $product)
			{
				if($product->discount)
		        {
		            $total += $product->amount * ($product->price - ($product->price * $product->discount));
		        }
		        else
		        {
		            $total += $product->amount * $product->price; 
		        }
			}

			$data['totalprice'] = $total;

			if($this->input->post('add-id'))
			{
				$product = array(
						'product_id' => $this->input->post('add-id'),
						'amount' => $this->input->post('add-amount'),
						'list_id' => $this->input->post('add-list-id'),
						'promotion_id' => $this->input->post('add-promotion-id')
				);
				
				$this->lists_model->add_product($product);
				redirect($this->uri->uri_string());
			}
		}

		$data['promotions'] = $this->promotions_model->get_promotions_by_category($id);
		$data['products'] = $this->products_model->get_products_by_category($id, $data['promotions']);
		$data['category'] = $this->products_model->get_category_by_id($id);

		$data['content'] = $this->load->view('products/products', $data, true);
		$data['title'] = "Nieuw lijstje toevoegen";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */