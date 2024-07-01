<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends ADMIN_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('Home_admin_model');
    }

    public function index()
    {
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Login';
        $head['description'] = '';
        $head['keywords'] = '';
        //$this->load->view('_parts/header', $head);
        if ($this->session->userdata('logged_in')) {
            redirect('uppcp');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run($this)) {
                $result = $this->Home_admin_model->loginCheck($_POST);
				print_r($_POST);
                if (!empty($result)) {
					$this->session->set_userdata('last_login', $result['last_login']);
                    $this->session->set_userdata('logged_in', $result['username']);
					$this->session->set_userdata('class_login', $result['class']);
                    //$this->saveHistory('User ' . $result['username'] . ' logged in');
					//echo "^ ^";
                    redirect('uppcp');
                } else {
                    //$this->saveHistory('Cant login with - User: ' . $_POST['username'] . ' and Pass: ' . $_POST['username']);
                    $this->session->set_flashdata('err_login', 'Wrong username or password!');
					//echo "Error";
                    redirect('uppcp/login');
                }
            }
            $this->load->view('login');
        }
        //$this->load->view('_parts/footer');
    }

}
