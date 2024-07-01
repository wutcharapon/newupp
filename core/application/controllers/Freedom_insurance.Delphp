<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freedom_insurance extends MY_Controller {

	private $num_rows = 5;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		$data['career'] = $this->Public_model->getPosts($this->num_rows, $page, 'career');
		$rowscount = $this->Public_model->postsCount('career');
		$data['links_pagination'] = pagination('career', $rowscount, $this->num_rows);
        $this->render('freedom_insurance', $head, $data);
    }

    public function view($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            $this->render('error404', $head, $data);
        }
        $data = array();
		$head = array();
        $data['article'] = $this->Public_model->getOnePost('career',$id);
        if ($data['article'] == null) {
			$this->render('error404', $head, $data);
        }
		$this->render('career_view', $head, $data);
    }

    public function send()
    {
		if(!empty($_POST)) {
			if(isset($_POST['g-recaptcha-response'])){
				$response = check_recaptcha(trim($_POST['g-recaptcha-response']));
			}
			if(isset($response) && $response['success'] == true){ // ตรวจสอบสำเร็จ 

				(isset($_POST['fullname'])) ? $fullname = $_POST['fullname'] : $fullname = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['province'])) ? $province = $_POST['province'] : $province = '';
				$subject = '(Website) สนใจการประกันภัยอิสรภาพ';
				$message = "รายละเอียด<br>";
				$message .= "**************************************************<br>";
				$message .= "ชื่อ : ".$fullname."<br>";
				$message .= "E-mail : ".$email."<br>";
				$message .= "เบอร์โทรติดต่อ : ".$phone."<br>";
				$message .= "จังหวัด : ".$province."<br>";
				$message .= "**************************************************<br>";

				$send_mail = send_mail(MAIL_FREEDOM,$email,$fullname,$subject,$message);

				if($send_mail){
					echo "successful";
				} else {
					echo "<p>ไม่สามารถส่งข้อความได้</p>";
				}
			} else {
				echo "<p>ไม่สามารถส่งข้อความได้</p>";
			}
		} else {
			redirect('freedom_insurance');
		}

	}

}