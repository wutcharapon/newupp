<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends ADMIN_Controller {

    private $num_rows = 10;

    function __construct(){
        parent::__construct();
		$this->load->model('Popup_model');
        $this->images_path_popup = $this->config->item('root_upload').$this->config->item('path_popup');
        $this->load->library('Custom_upload', array('upload_path' => $this->images_path_popup));
    }

	public function index()
	{
		$this->login_check();
        $data = array();
        $head = array();
		$data['popup'] = $this->Popup_model->getPopup();
        $this->load->view('_parts/header', $head);
        $this->load->view('popup/_index', $data);
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
				$date = $_POST['daterange'];
				$exp = explode(" ", $date);
				list($startdate, $timestart, $z, $enddate, $timeend) = $exp;
				$_POST['date_start'] = $startdate." ".$timestart;
				$_POST['date_end'] = $enddate." ".$timeend;
				$this->Popup_model->setPopup($_POST, $id);
				redirect('uppcp/popup');
			} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('popup/_form', $data);
			$this->load->view('_parts/footer');
		}
    }

    public function edit($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
				$data = array();
				$data = $this->Popup_model->getOnePopup($id);
				unlink($this->images_path_popup.'/'.$data['image']);
				list($name, $extension) = explode('.', $data['image']);
				unlink($this->images_path_popup.'/thumb/'.$name.'_thumb.'.$extension);
				$upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 157, 88);
				$_POST['thumb'] = (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL;
				$_POST['image'] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL;
			}
			$date = $_POST['daterange'];
			$exp = explode(" ", $date);
			list($startdate, $timestart, $z, $enddate, $timeend) = $exp;
			$_POST['date_start'] = $startdate." ".$timestart;
			$_POST['date_end'] = $enddate." ".$timeend;
			$this->Popup_model->setPopup($_POST, $id);
			redirect('uppcp/popup');
		} else {
			if ($id > 0 && $_POST == null) {
				$data = array();
				$head = array();
				$data['popup'] = $this->Popup_model->getOnePopup($id);
				if(count($data['popup']) != 1 ){
					$this->load->view('_parts/header', $head);
					$this->load->view('popup/_form', $data);
					$this->load->view('_parts/footer');
				} else {
					redirect('uppcp/popup');
				}
			} else {
				redirect('uppcp/popup');
			}
		}
    }

    public function dele($id = 0) {
		$this->login_check();
			if ($id > 0) {
				$data = array();
				$data['popup'] = $this->Popup_model->getOnePopup($id);
				if(count($data['popup']) != 1 ){
					$this->Popup_model->deletePopup($id);
					redirect('uppcp/popup');
				} else {
					redirect('uppcp/popup');
				}
			} else {
			redirect('uppcp/popup');
		}
	}
    

}
