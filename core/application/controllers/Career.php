<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
		//$this->load->library('email');
		$this->load->library('upload');
	}
	
    public function index()
    {
        $data = array();
		$head = array();
		$data['career'] = $this->Public_model->getPostsCareer();
        $this->render('career', $head, $data);
    }

    public function send()
    {
		if(!empty($_POST)) {
			if(isset($_POST['g-recaptcha-response'])){
				$response = check_recaptcha(trim($_POST['g-recaptcha-response']));
			}
			if(isset($response) && $response['success'] == true){ // ตรวจสอบสำเร็จ 

				(isset($_POST['pdname'])) ? $positionId = $_POST['pdname'] : $positionId = '';
				(isset($_POST['salary'])) ? $salary = $_POST['salary'] : $salary = '';
				(isset($_POST['fullname'])) ? $fullname = $_POST['fullname'] : $fullname = '';
				(isset($_POST['sex'])) ? $sex = $_POST['sex'] : $sex = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['line'])) ? $line = $_POST['line'] : $line = '';
				(isset($_POST['address'])) ? $address = $_POST['address'] : $address = '';
				(isset($_POST['message'])) ? $mess = $_POST['message'] : $mess = '';

				$subject = 'สนใจสมัครงานตำแหน่ง '.$positionId.'';
				$message = "รายละเอียด<br>";
				$message .= "ตำแหน่งที่สนใจ : ".$positionId."<br>";
				$message .= "เงินเดือนที่คาดหวัง : ".$salary."<br>";
				$message .= "**************************************************<br>";
				$message .= "ชื่อ : ".$fullname."<br>";
				$message .= "เพศ : ".$sex."<br>";
				$message .= "E-mail : ".$email."<br>";
				$message .= "เบอร์โทรติดต่อ : ".$phone."<br>";
				$message .= "line : ".$line."<br>";
				$message .= "ที่อยู่ : ".$address."<br>";
				$message .= "**************************************************<br>";
				$message .= $mess."<br>";

				if($_FILES['resume']['size'] > 0) {
					$config['upload_path'] = './fcareer/';
					$config['allowed_types'] = 'pdf';
					$config['file_name'] = $fullname.'('.$positionId.')'.time();
					$config['max_size'] = '2048';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('resume');
					$img = $this->upload->data();
					$attach = 'fcareer/'.$img['file_name'];
				}
				$send_mail = send_mail(MAIL_HR,$email,$fullname,$subject,$message,$attach);

				if($send_mail){
					echo "successful";
				} else {
					echo "<p>ไม่สามารถส่งข้อความได้</p>";
				}
			} else {
				echo "<p>ไม่สามารถส่งข้อความได้</p>";
			}
		} else {
			redirect('career');
		}

	}


}