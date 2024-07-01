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

    public function send()
    {
		if(!empty($_POST)) {
			/*
			if(isset($_POST['g-recaptcha-response'])){
				$response = check_recaptcha(trim($_POST['g-recaptcha-response']));
			}
			if(isset($response) && $response['success'] == true){ // ๏ฟฝ๏ฟฝวจ๏ฟฝอบ๏ฟฝ๏ฟฝ๏ฟฝ๏ฟฝ๏ฟฝ 
			*/
				(isset($_POST['agt_type'])) ? $agt_type = $_POST['agt_type'] : $agt_type = '';
				if(($agt_type=='A' || $agt_type=='B' || $agt_type=='J') && $_SERVER['REQUEST_METHOD'] == 'POST'){
					$upload_type = (isset($_POST['upload_type'])) ? $_POST['upload_type'] : "";
					if($upload_type=='pdf') {
						if($_FILES['attached']['size'] > 0) {
							$upload_data = $this->custom_upload->uploadFilePDF('attached',time());
							if( isset($upload_data['error']) and $upload_data['error'] ) {
								echo "<p>".$upload_data['error']."</p>";
							} else {
								//$f = $this->upload->data();
								$_POST['attached'] = (isset($upload_data['file_name']) and $upload_data['file_name']) ? $upload_data['file_name'] : NULL;
								$_POST['date_issue'] = (isset($_POST['date_issue'])) ? formatdate($_POST['date_issue']) : "1957-01-01";
								$_POST['date_expiry'] = (isset($_POST['date_expiry'])) ? formatdate($_POST['date_expiry']) : "1957-01-01";
								$_POST['date_birth'] = (isset($_POST['date_birth'])) ? formatdate($_POST['date_birth']) : "1957-01-01";
								$_POST['guarantor_datecard_issue'] = (isset($_POST['guarantor_datecard_issue'])) ? formatdate($_POST['guarantor_datecard_issue']) : "1957-01-01";
								$_POST['guarantor_datecard_expiry'] = (isset($_POST['guarantor_datecard_expiry'])) ? formatdate($_POST['guarantor_datecard_expiry']) : "1957-01-01";
								$_POST['sts'] = '1';
								unset($_POST['g-recaptcha-response'], $_POST['upload_type']);
								$this->Public_model->InsAgt($_POST);
								echo "successful";
							}
						} else {
							echo "<p>ไม่สามารถส่งใบสมัครได้</p>";
						}
					} else {
						$_POST['date_issue'] = (isset($_POST['date_issue'])) ? formatdate($_POST['date_issue']) : "1957-01-01";
						$_POST['date_expiry'] = (isset($_POST['date_expiry'])) ? formatdate($_POST['date_expiry']) : "1957-01-01";
						$_POST['date_birth'] = (isset($_POST['date_birth'])) ? formatdate($_POST['date_birth']) : "1957-01-01";
						$_POST['guarantor_datecard_issue'] = (isset($_POST['guarantor_datecard_issue'])) ? formatdate($_POST['guarantor_datecard_issue']) : "1957-01-01";
						$_POST['guarantor_datecard_expiry'] = (isset($_POST['guarantor_datecard_expiry'])) ? formatdate($_POST['guarantor_datecard_expiry']) : "1957-01-01";
						$_POST['sts'] = '1';
						unset($_POST['g-recaptcha-response'], $_POST['upload_type']);
						$this->Public_model->InsAgt($_POST);
						echo "successful";
					}
				} else {
					echo "<p>ไม่สามารถส่งใบสมัครได้</p>";
				}
				/*
			} else {
				echo "<p>ไม่สามารถส่งใบสมัครได้</p>";
			}
			*/
		} else {
			redirect('agent');
		}
    }


}