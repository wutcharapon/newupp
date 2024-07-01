<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends ADMIN_Controller {

    private $num_rows = 10;

    function __construct(){
        parent::__construct();
		$this->load->model('Career_model');
    }

	public function index()
	{
		$this->login_check();
        $data = array();
        $head = array();
		$data['career'] = $this->Career_model->getPostsCareer();
        $this->load->view('_parts/header', $head);
        $this->load->view('career/_index', $data);
        $this->load->view('_parts/footer');
	}

    public function insert($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$_POST['time_exp'] = formatdate($_POST['time_exp']);
				$this->Career_model->setCareer($_POST, $id);
				redirect('uppcp/career');
			} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('career/_form', $data);
			$this->load->view('_parts/footer');
		}
    }

    public function edit($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_POST['time_exp'] = formatdate($_POST['time_exp']);
			$this->Career_model->setCareer($_POST, $id);
			redirect('uppcp/career');
		} else {
			if ($id > 0 && $_POST == null) {
				$data = array();
				$head = array();
				$data['career'] = $this->Career_model->getOneCareer($id);
				if(count($data['career']) != 1 ){
					$this->load->view('_parts/header', $head);
					$this->load->view('career/_form', $data);
					$this->load->view('_parts/footer');
				} else {
					redirect('uppcp/career');
				}
			} else {
				redirect('uppcp/career');
			}
		}
    }

    public function dele($id = 0) {
		$this->login_check();
			if ($id > 0) {
				$data = array();
				$data['career'] = $this->Career_model->getOneCareer($id);
				if(count($data['career']) != 1 ){
					$this->Career_model->deleteCareer($id);
					redirect('uppcp/career');
				} else {
					redirect('uppcp/career');
				}
			} else {
			redirect('uppcp/career');
		}
	}
    

}
