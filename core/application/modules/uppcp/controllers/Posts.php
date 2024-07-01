<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends ADMIN_Controller {

    private $num_rows = 10;

    function __construct(){
        parent::__construct();
    }

	public function index($page = 0)
	{
		$this->login_check();
        $data = array();
        $head = array();
		$data['products'] = $this->Public_model->getPosts($this->num_rows, $page, 'products');
		$rowscount = $this->Public_model->postsCount('products');
		$data['links_pagination'] = pagination('products', $rowscount, $this->num_rows);
        $this->load->view('_parts/header', $head);
        $this->load->view('posts/_index', $data);
        $this->load->view('_parts/footer');
	}

    public function insert() {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo "Insert";
		} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('posts/_form', $data);
			$this->load->view('_parts/footer');
		}
    }

    public function edit($post_id = '') {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo "Edit";
		} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('posts/_form', $data);
			$this->load->view('_parts/footer');
		}
    }

}
