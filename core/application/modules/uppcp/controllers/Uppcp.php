<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uppcp extends ADMIN_Controller {

    function __construct(){
        parent::__construct();
    }

	public function index()
	{
		$this->login_check();
        $data = array();
        $head = array();
        $this->load->view('_parts/header', $head);
        $this->load->view('home', $data);
        $this->load->view('_parts/footer');
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('uppcp');
    }

}
