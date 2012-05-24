<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends User_Controller {

	function __construct()
	{
		// Check of user is ingelogd in class User_Controller (core/MY_Controller)
		// User wordt naar login page geredirect als hij niet is ingelogd
		// In __construct functie zodat het geldig is op elke functie van deze klasse
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('lists_model');
	}

	public function index()
	{
		try 
		{
			$this->load->model('lists_model');

			if($delete_list = $this->input->post('delete-id'))
			{
				$this->_removelist($delete_list);
			}

			if($search = $this->input->post('search-lists'))
			{
				if(!$lists = $this->lists_model->get_all_by_name($search, $this->user->id))
				{
					throw new Exception('Geen lijstjes gevonden voor "' . $this->input->post('search-lists') . '".' . '<br/>
					<a href="lists"><strong>Probeer een andere zoekterm.</strong></a>');
				}
			}
			else 
			{
				if(!$lists = $this->lists_model->get_lists_user($this->user->id))
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

		if($this->input->is_ajax_request())
		{
			echo $this->load->view('ajax/search-lists', $data, true);
		}
		else 
		{
			$data['content'] = $this->load->view('lists/overview', $data, true);
			$data['title'] = "Lijstjes";

			$this->load->view('includes/header-loggedin');
			$this->load->view('includes/master', $data);
			$this->load->view('includes/footer');
		}
	}

	public function listdetail($id)
	{
		if($action = $this->input->post('submit'))
		{
			switch($action)
			{
				case 'Verwijderen':
					$this->lists_model->delete_product($this->input->post('delete-id'));
			 		break;

				case '+':
			  		$this->lists_model->update_amount_plus($this->input->post('delete-id'));
					break;

				case '-':
			  		$this->lists_model->update_amount_minus($this->input->post('delete-id'));
					break;

				case 'Producten toevoegen':
			  		$listdata = array(
	                   'list-id'  => $this->input->post('list-id')
	               	);

					$this->session->set_userdata($listdata);
					redirect('/products', 'refresh');
					break;		
			}
		}

		$data['list'] = $this->lists_model->get_list_by_id($id);
		$data['products'] = $this->lists_model->get_products($id);

		$data['content'] = $this->load->view('lists/listdetail', $data, true);
		$data['title'] = "Detail lijstje";

		$this->load->view('includes/header-loggedin');
		$this->load->view('includes/master', $data);
		$this->load->view('includes/footer');
	}

	public function newlist()
	{
		$this->form_validation->set_rules('list_name', 'list_name', 'required');
		$this->form_validation->set_message('required', 'Oops, iets vergeten in te vullen');

		if ($this->form_validation->run() == true)
		{
			$this->load->model('lists_model');

			$list = array(
					'name' => $this->input->post('list_name'),
					'date_created' => date('Y-m-d h:m:s'),
					'user_id' => $this->user->id
			);

			$this->lists_model->insert($list);
			redirect('/lists/listdetail/' . $this->db->insert_id(), 'refresh');

		}
		else
		{
			$this->data['message'] = $this->session->flashdata('message');

			$data['list_name'] = array('name' => 'list_name',
					'id' => 'list_name',
					'type' => 'text',
					'placeholder' => 'Naam lijstje',
					'class' => 'round',
			);

			$data['submit'] = array('name' => 'submit',
					'value' => 'Lijstje bewaren',
					'class' => 'button-accent',
			);

			$data['content'] = $this->load->view('lists/new', $data, true);
			$data['title'] =  "Nieuw lijstje toevoegen";

			$this->load->view('includes/header-loggedin');
			$this->load->view('includes/master', $data);
			$this->load->view('includes/footer');
		}
	}

	private function _removelist($id)
	{
		$this->load->model('lists_model');
		$this->lists_model->delete_list($id);
	}
}

/* End of file lists.php */
/* Location: ./application/controllers/lists.php */