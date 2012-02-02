<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['username'] = 'Anoniem';

		if($this->ion_auth->logged_in())
		{
			$user = $this->ion_auth->user()->row();
			$data['username'] = $user->email;
			$this->load->view('header_loggedin', $data);	
		}
		else
		{
			$this->load->view('header');
		}
		
			
		$this->load->view('home/home_view', $data);
		$this->load->view('footer');	
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */