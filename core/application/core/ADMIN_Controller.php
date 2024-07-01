<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ADMIN_Controller extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
    }

    protected function login_check()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('uppcp/login');
        }
        $this->username = $this->session->userdata('logged_in');
    }


}
