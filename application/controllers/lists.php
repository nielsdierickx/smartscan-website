<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (core/MY_Controller)
		// User wordt naar login page geredirect als hij niet is ingelogd
		// In __construct functie zodat het geldig is op elke functie van deze klasse
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('lists_model');

		if($this->input->is_ajax_request())
		{
			try 
			{
				$search = $this->input->post('search-lists');
				
				if(!$lists = $this->lists_model->get_all_by_name($search, $this->user->id))
				{
					throw new Exception('Geen lijstjes gevonden voor "' . $this->input->post('search-lists') . '".' . '<br/>
						<a href="lists"><strong>Probeer een andere zoekterm.</strong></a>');
				}

				foreach ($lists as $list) 
				{
					$products[] = $this->lists_model->get_product_count($list->id);
			 	}

				$data['products'] = $products;
				$data['lists'] = $lists;
			}
			catch (Exception $e)
			{
				$data['feedback'] = $e->getMessage();
			}

			echo $this->load->view('ajax/search-lists', $data, true);
		}
		else
		{
			try 
			{
				if($search = $this->input->post('search-lists'))
				{
					if(!$lists = $this->lists_model->get_all_by_name($search, $this->user->id))
					{
						throw new Exception('Geen lijstjes gevonden');
					}
				}
				else 
				{
					if(!$lists = $this->lists_model->get_all_by_id($this->user->id))
					{
						throw new Exception('Je hebt nog geen lijstjes');
					}
				}

				foreach ($lists as $list) 
				{
					$products[] = $this->lists_model->get_product_count($list->id);
			 	}		
				
				$data['products'] = $products;
				$data['lists'] = $lists;

			}
			catch (Exception $e)
			{
				$data['feedback'] = $e->getMessage();
			}

			$data['content'] = $this->load->view('lists/overview', $data, true);
			$data['title'] = "Overzicht lijstjes";

			$this->load->view('includes/header-loggedin');
			$this->load->view('includes/master', $data);
			$this->load->view('includes/footer');
		}
	}

	public function listDetail($listname)
	{
		$this->load->model('lists_model');

		$listname = strtoupper(str_replace("-", " ", $listname));

		$listid = $this->lists_model->get_list_id($listname, $this->user->id);

		$data['products'] = $this->lists_model->get_products($listid);
		$data['listname'] = $listname;
		$data['title'] = "Detail " . $listname;

		$data['content'] = $this->load->view('lists/listdetail', $data, true);

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}

	public function productDetail($listname, $product)
	{
		$data['content'] = $this->load->view('profile/productdetail', '', true);

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}

	public function newlist()
	{
		$this->load->model('lists_model');

		$data['categories'] = $this->lists_model->get_categories();

		$data['list_name'] = array('name' => 'list_name',
				'id' => 'list_name',
				'type' => 'text',
				'placeholder' => 'Naam van je lijstje'
		);

		$data['content'] = $this->load->view('lists/newlist', $data, true);
		$data['title'] = "Nieuw lijstje toevoegen";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}

	public function category($id)
	{
		$this->load->model('lists_model');

		$data['products'] = $this->lists_model->get_products_by_category($id);
		$data['category'] = $this->lists_model->get_category_by_id($id);

		$data['list_name'] = array('name' => 'list_name',
				'id' => 'list_name',
				'type' => 'text',
				'placeholder' => 'Naam van je lijstje'
		);

		$data['content'] = $this->load->view('lists/categorydetail', $data, true);
		$data['title'] = "Nieuw lijstje toevoegen";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}

	public function removelist($listname)
	{
		$this->load->model('lists_model');

		$listname = (str_replace("%20", " ", $listname));
		$listid = $this->lists_model->get_list_id($listname, $this->user->id);

		$this->lists_model->delete_list($listid);

		$this->index();
	}
}

/* End of file lists.php */
/* Location: ./application/controllers/lists.php */