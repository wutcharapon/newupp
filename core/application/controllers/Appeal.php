<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appeal extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->library('email');
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('appeal', $head, $data);
    }

    public function send()
    {
		if(!empty($_POST)) {
			if(isset($_POST['g-recaptcha-response'])){
				$response = check_recaptcha(trim($_POST['g-recaptcha-response']));
			}
			if(isset($response) && $response['success'] == true){ // ตรวจสอบสำเร็จ 

				(isset($_POST['subject'])) ? $subject = $_POST['subject'] : $subject = '';
				(isset($_POST['fullname'])) ? $fullname = $_POST['fullname'] : $fullname = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['message'])) ? $mess = $_POST['message'] : $mess = '';

				$this->email->from($email, $fullname);
				$this->email->to(MAIL_AP);

				$this->email->subject('แจ้งร้องเรียน : '.$subject.'');
				$message = "รายละเอียด<br>";
				$message .= "เรื่อง : ".$subject."<br>";
				$message .= "ข้อความ : ".$mess."<br>";
				$message .= "**************************************************<br>";
				$message .= "ชื่อ : ".$fullname."<br>";
				$message .= "E-mail : ".$email."<br>";
				$message .= "เบอร์โทรติดต่อ : ".$phone."<br>";
				$message .= "**************************************************<br>";
				$this->email->message($message);
				$this->email->set_mailtype("html");

				if($this->email->send()){
					echo "successful";
				} else {
					echo "<p>ไม่สามารถส่งข้อความได้</p>";
				}
			} else {
				echo "<p>ไม่สามารถส่งข้อความได้</p>";
			}
		} else {
			redirect('appeal');
		}
	}

}