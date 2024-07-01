<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
		//$this->load->library('email');
		//$this->load->library('upload');
        $this->path_agt_regis = $this->config->item('root_upload').'agt_regis/';
        $this->load->library('Custom_upload', array('upload_path' => $this->path_agt_regis));
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('agent', $head, $data);
    }

    public function test_up()
    {
        $data = array();
		$head = array();
        $this->render('test_up', $head, $data);
    }
    public function testsend()
    {
		if(!empty($_FILES)) {

				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					echo "<pre>";
					for($a=1; $a<=16; $a++) {
						$attached = "attached".$a;
						$attached_name = uniqid()."_".time();
						if (isset($_FILES[$attached]) and $_FILES[$attached]['error'] == 0) {

							$pdf = array('application/pdf', 'application/force-download', 'application/x-download', 'binary/octet-stream');
							$filename = $_FILES[$attached]['type'];
							if (in_array($filename, $pdf)) {
								echo "pdf";
								$upload_data = $this->custom_upload->uploadFilePDF($attached, $attached_name,'3000');
							} else {
								echo "image";
								$upload_data = $this->custom_upload->uploadImage($attached, false, $attached_name, true, 800, 600);
							}
							print_r($upload_data);
							//$upload_data = $this->custom_upload->uploadImage($attached, false, $attached_name, true, 800, 600);
							//$_POST[$attached] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : "";
						}
					}
					echo "successful";
				} else {
					echo "<p>ไม่สามารถส่งใบสมัครได้</p>";
				}
				/*
			} else {
				echo "<p>ไม่สามารถส่งใบสมัครได้</p>";
			}
			*/
		} else {
			echo "X";
			//redirect('test_up');
		}
    }

    public function send()
    {
		if(!empty($_POST)) {
			if(isset($_POST['g-recaptcha-response'])){
				$response = check_recaptcha(trim($_POST['g-recaptcha-response']));
			}
			if(isset($response) && $response['success'] == true){ // 
				(isset($_POST['agt_type'])) ? $agt_type = $_POST['agt_type'] : $agt_type = '';
				if(($agt_type=='A' || $agt_type=='B' || $agt_type=='J') && $_SERVER['REQUEST_METHOD'] == 'POST'){

					for($a=1; $a<=16; $a++) {
						$attached = "attached".$a;
						$attached_name = uniqid()."_".time();
						if (isset($_FILES[$attached]) and $_FILES[$attached]['error'] == 0) {
							$pdf = array('application/pdf', 'application/force-download', 'application/x-download', 'binary/octet-stream');
							$filename = $_FILES[$attached]['type'];
							if (in_array($filename, $pdf)) {
								$upload_data = $this->custom_upload->uploadFilePDF($attached, $attached_name,'3000');
							} else {
								$upload_data = $this->custom_upload->uploadImage($attached, false, $attached_name, true, 800, 600);
							}
							$_POST[$attached] = (isset($upload_data['orig_name']) and $upload_data['orig_name']) ? $upload_data['orig_name'] : "";
						}
					}

					$_POST['date_issue'] = (isset($_POST['date_issue']) and $_POST['date_issue'] != '') ? formatdate($_POST['date_issue']) : "1957-01-01";
					$_POST['date_expiry'] = (isset($_POST['date_expiry']) and $_POST['date_expiry'] != '') ? formatdate($_POST['date_expiry']) : "1957-01-01";
					$_POST['date_birth'] = (isset($_POST['date_birth']) and $_POST['date_birth'] != '') ? formatdate($_POST['date_birth']) : "1957-01-01";
					$_POST['guarantor_datecard_issue'] = (isset($_POST['guarantor_datecard_issue']) and $_POST['guarantor_datecard_issue'] != '') ? formatdate($_POST['guarantor_datecard_issue']) : "1957-01-01";
					$_POST['guarantor_datecard_expiry'] = (isset($_POST['guarantor_datecard_expiry']) and $_POST['guarantor_datecard_expiry'] != '') ? formatdate($_POST['guarantor_datecard_expiry']) : "1957-01-01";
					$_POST['sts'] = '1';
					unset($_POST['g-recaptcha-response']);
					$this->Public_model->InsAgt($_POST);
					echo "successful";

				} else {
					echo "<p>ไม่สามารถส่งใบสมัครได้</p>";
				}
			} else {
				echo "<p>ไม่สามารถส่งใบสมัครได้</p>";
			}
		} else {
			redirect('agent');
		}
    }


}