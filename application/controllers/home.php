<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->ion_auth->logged_in())
		{
			$data['user'] = $this->ion_auth->user()->row();
			$this->load->view('includes/header-loggedin', $data);	
		}
		else
		{
			$this->load->view('includes/header');
		}
			
		$this->load->view('home/landing-page');
		$this->load->view('includes/footer');	
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */