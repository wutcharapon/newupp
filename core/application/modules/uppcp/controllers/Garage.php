<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garage extends ADMIN_Controller {

    private $num_rows = 4;

    function __construct(){
        parent::__construct();
		$this->load->model('Garage_model');
        $this->images_path_garage = $this->config->item('root_upload').$this->config->item('path_garage');
        $this->load->library('Custom_upload', array('upload_path' => $this->images_path_garage));
    }

	public function index($page = 0)
	{
		$this->login_check();
        $data = array();
        $head = array();
		$data['garage'] = $this->Garage_model->getGarage();
        $this->load->view('_parts/header', $head);
        $this->load->view('garage/_index', $data);
        $this->load->view('_parts/footer');
	}

    public function insert($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
				$lastid = $this->Garage_model->lastidGarage();
				$upload_data = $this->custom_upload->uploadImage('image', true, $lastid, true, 157, 88);
				$_POST['thumb'] = (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL;
				$_POST['image'] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL;
			}
			$this->Garage_model->insGarage($_POST, $id);
			redirect('uppcp/garage/edit/'.$lastid);
		} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('garage/_form', $data);
			$this->load->view('_parts/footer');
		}
    }

    public function edit($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
				$data = array();
				$data = $this->Garage_model->getOneGarage($id);
				if ($data['image'] != NULL) {
					unlink($this->images_path_garage.$data['image']);
					list($name, $extension) = explode('.', $data['image']);
					unlink($this->images_path_garage.'thumb/'.$name.'_thumb.'.$extension);
				}
				$upload_data = $this->custom_upload->uploadImage('image', true, $id, true, 157, 88);
				$_POST['thumb'] = (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL;
				$_POST['image'] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL;
			}
			$this->Garage_model->insGarage($_POST, $id);
			redirect('uppcp/garage/edit/'.$id);
		} else {
			if ($id > 0 && $_POST == null) {
				$data = array();
				$head = array();
				$data['garage'] = $this->Garage_model->getOneGarage($id);
				if(count($data['garage']) != 1 ){
					$this->load->view('_parts/header', $head);
					$this->load->view('garage/_form', $data);
					$this->load->view('_parts/footer');
				} else {
					redirect('uppcp/garage');
				}
			} else {
				redirect('uppcp/garage');
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
					redirect('uppcp/garage');
				} else {
					redirect('uppcp/garage');
				}
			} else {
			redirect('uppcp/garage');
		}
	}
    

}
