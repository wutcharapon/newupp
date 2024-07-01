<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other_insurance extends MY_Controller {

	private $num_rows = 10;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		$data['other'] = $this->Public_model->getPosts($this->num_rows, $page, 'other_insurance');
		$rowscount = $this->Public_model->postsCount('other_insurance');
		$data['links_pagination'] = pagination('other_insurance', $rowscount, $this->num_rows);
        $this->render('other_insurance', $head, $data);
    }

    public function view($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            $this->render('error404', $head, $data);
        }
        $data = array();
		$head = array();
        $data['article'] = $this->Public_model->getOnePost('other_insurance',$id);
        if ($data['article'] == null) {
			$this->render('error404', $head, $data);
        }
		$this->render('other_insurance_view', $head, $data);
    }

    public function send()
    {
		if(!empty($_POST)) {
			if(isset($_POST['g-recaptcha-response'])){
				$response = check_recaptcha(trim($_POST['g-recaptcha-response']));
			}
			if(isset($response) && $response['success'] == true){ // ตรวจสอบสำเร็จ 

				(isset($_POST['pdname'])) ? $pdname = $_POST['pdname'] : $pdname = '';
				(isset($_POST['fullname'])) ? $fullname = $_POST['fullname'] : $fullname = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['province'])) ? $province = $_POST['province'] : $province = '';
				$subject = '(Website) การประกันภัยเบ็ดเตล็ด';
				$message = "รายละเอียด<br>";
				$message .= "ผลิตภัณฑ์ที่สนใจ<br>";
				$message .= $pdname."<br>";
				$message .= "**************************************************<br>";
				$message .= "ชื่อ : ".$fullname."<br>";
				$message .= "E-mail : ".$email."<br>";
				$message .= "เบอร์โทรติดต่อ : ".$phone."<br>";
				$message .= "จังหวัด : ".$province."<br>";
				$message .= "**************************************************<br>";

				$send_mail = send_mail(MAIL_MISC,$email,$fullname,$subject,$message);

				if($send_mail){
					echo "successful";
				} else {
					echo "<p>ไม่สามารถส่งข้อความได้</p>";
				}
			} else {
				echo "<p>ไม่สามารถส่งข้อความได้</p>";
			}
		} else {
			redirect('other_insurance');
		}

	}

}