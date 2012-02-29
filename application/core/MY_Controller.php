<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends CI_Controller {

    protected $user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->logged_in()) {
            $data->user = $this->ion_auth->user()->row();
            $this->user = $data->user;

            // Data van user in alle views beschikbaar via $user->...
            $this->load->vars($data);
        }
        else {
            redirect('login', 'refresh');
        }
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */