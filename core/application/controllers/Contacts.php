<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('contacts', $head, $data);
    }

    public function send()
    {
		if(!empty($_POST)) {
			if(isset($_POST['g-recaptcha-response'])){
				$response = check_recaptcha(trim($_POST['g-recaptcha-response']));
			}
			if(isset($response) && $response['success'] == true){ // ตรวจสอบสำเร็จ 

				(isset($_POST['svcno'])) ? $svcno = $_POST['svcno'] : $svcno = '';
				(isset($_POST['fullname'])) ? $fullname = $_POST['fullname'] : $fullname = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['subject'])) ? $subject = $_POST['subject'] : $subject = '';
				(isset($_POST['message'])) ? $mess = $_POST['message'] : $mess = '';

				$subject .= ' (ติดต่อจาก Website)';
				$message = "ข้อความ<br>";
				$message .= $mess."<br>";
				$message .= "<br><br>";
				$message .= "รายละเอียดผู้ส่ง<br>";
				$message .= "**************************************************<br>";
				$message .= "ชื่อ : ".$fullname."<br>";
				$message .= "E-mail : ".$email."<br>";
				$message .= "เบอร์โทรติดต่อ : ".$phone."<br>";
				$message .= "**************************************************<br>";

				if($svcno == 'CMI'){
					$send_to = MAIL_CONTACTCMI;
				} else {
					$send_to = MAIL_CONTACT;
				}
				$send_mail = send_mail($send_to,$email,$fullname,$subject,$message); // ส่งไปที่,เมลuser,ชื่อuser,เรื่อง,ข้อความ

				if($send_mail){
					echo "successful";
				} else {
					echo "<p>ไม่สามารถส่งข้อความได้</p>";
				}
			} else {
				echo "<p>ไม่สามารถส่งข้อความได้</p>";
			}
		} else {
			redirect('contacts');
		}

	}
}