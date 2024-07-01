<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends ADMIN_Controller {

    private $num_rows = 4;

    function __construct(){
        parent::__construct();
		$this->load->model('News_model');
        $this->images_path_post = $this->config->item('root_upload').$this->config->item('path_post');
        //$this->vdo_path = $this->config->item('root_upload').$this->config->item('path_vdo');
        $this->load->library('Custom_upload', array('upload_path' => $this->images_path_post));
    }

	public function index($page = 0)
	{
		$this->login_check();
        $data = array();
        $head = array();
		$data['news'] = $this->Public_model->getPosts($this->num_rows, $page, 'news');
		$data['total'] = $this->Public_model->postsCount('news');
		$data['page'] = $page;
		$data['links_pagination'] = pagination_bakend('uppcp/news', $data['total'], $this->num_rows, $page);
        $this->load->view('_parts/header', $head);
        $this->load->view('news/_index', $data);
        $this->load->view('_parts/footer');
	}

    public function insert($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
					$upload_data = $this->custom_upload->uploadImage('image', true, uniqid('UPP_'), true, 157, 88);
					$_POST['thumb'] = (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL;
					$_POST['image'] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL;
					//echo "<pre>"; print_r($upload_data); echo "</pre>"; exit; 
				}
				$this->News_model->setNews($_POST, $id);
				redirect('uppcp/news');
		} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('news/_form', $data);
			$this->load->view('_parts/footer');
		}
    }

    public function edit($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
				$upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 157, 88);
				$_POST['thumb'] = (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL;
				$_POST['image'] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL;
			}
			$this->News_model->setNews($_POST, $id);
			redirect('uppcp/news');
		} else {
			if ($id > 0 && $_POST == null) {
				$data = array();
				$head = array();
				$data['news'] = $this->News_model->getOneNews($id);
				if(count($data['news']) != 1 ){
					$this->load->view('_parts/header', $head);
					$this->load->view('news/_form', $data);
					$this->load->view('_parts/footer');
				} else {
					redirect('uppcp/news');
				}
			} else {
				redirect('uppcp/news');
			}
		}
    }

    public function dele($id = 0) {
		$this->login_check();
			if ($id > 0) {
				$data = array();
				$data = $this->News_model->getOneNews($id);
				if(count($data) != 1 ) {
					$this->News_model->deleteNews($id);
					redirect('uppcp/news');
				} else {
					redirect('uppcp/news');
				}
			} else {
			redirect('uppcp/news');
		}
	}
    
    public function upload() {
		$this->login_check();
		if (isset($_FILES['upload']) and $_FILES['upload']['error'] == 0) {
			$upload_data = $this->custom_upload->uploadImage('upload', true, uniqid('UPP_'), true, 157, 88);
			$image = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL;
			$function_number = $_GET['CKEditorFuncNum'];
			$url = base_url().$this->images_path_post.$image;
			$message = '';
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
		} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('news/_form', $data);
			$this->load->view('_parts/footer');
		}
		
	}
	
}
