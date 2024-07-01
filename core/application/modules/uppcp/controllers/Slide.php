<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends ADMIN_Controller {

    private $num_rows = 10;

    function __construct(){
        parent::__construct();
		$this->load->model('Slide_model');
        $this->images_path_slide = $this->config->item('root_upload').$this->config->item('path_slide');
        $this->load->library('Custom_upload', array('upload_path' => $this->images_path_slide));
    }

	public function index()
	{
		$this->login_check();
        $data = array();
        $head = array();
		$data['slide'] = $this->Slide_model->getslide();
        $this->load->view('_parts/header', $head);
        $this->load->view('slide/_index', $data);
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
				$this->Slide_model->setslide($_POST, $id);
				redirect('uppcp/slide');
			} else {
			$data = array();
			$head = array();
			$this->load->view('_parts/header', $head);
			$this->load->view('slide/_form', $data);
			$this->load->view('_parts/footer');
		}
    }

    public function edit($id = 0) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
				$data = array();
				$data = $this->Slide_model->getOneslide($id);
				unlink($this->images_path_slide.'/'.$data['image']);
				list($name, $extension) = explode('.', $data['image']);
				unlink($this->images_path_slide.'/thumb/'.$name.'_thumb.'.$extension);
				$upload_data = $this->custom_upload->uploadImage('image', true, uniqid(), true, 157, 88);
				$_POST['thumb'] = (isset($upload_data['thumb_name']) and $upload_data['thumb_name']) ? $upload_data['thumb_name'] : NULL;
				$_POST['image'] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : NULL;
			}
			$date = $_POST['daterange'];
			$exp = explode(" ", $date);
			list($startdate, $timestart, $z, $enddate, $timeend) = $exp;
			$_POST['date_start'] = $startdate." ".$timestart;
			$_POST['date_end'] = $enddate." ".$timeend;
			$this->Slide_model->setslide($_POST, $id);
			redirect('uppcp/slide');
		} else {
			if ($id > 0 && $_POST == null) {
				$data = array();
				$head = array();
				$data['slide'] = $this->Slide_model->getOneslide($id);
				if(count($data['slide']) != 1 ){
					$this->load->view('_parts/header', $head);
					$this->load->view('slide/_form', $data);
					$this->load->view('_parts/footer');
				} else {
					redirect('uppcp/slide');
				}
			} else {
				redirect('uppcp/slide');
			}
		}
    }

    public function dele($id = 0) {
		$this->login_check();
			if ($id > 0) {
				$data = array();
				$data['slide'] = $this->Slide_model->getOneslide($id);
				if(count($data['slide']) != 1 ){
					$this->Slide_model->deleteslide($id);
					redirect('uppcp/slide');
				} else {
					redirect('uppcp/slide');
				}
			} else {
			redirect('uppcp/slide');
		}
	}
    

}
