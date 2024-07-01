<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motor_insurance extends MY_Controller {

	private $num_rows = 5;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		$data['motor'] = $this->Public_model->getPosts($this->num_rows, $page, 'motor_insurance');
		$rowscount = $this->Public_model->postsCount('motor_insurance');
		$data['links_pagination'] = pagination('motor_insurance', $rowscount, $this->num_rows);
        $this->render('motor_insurance', $head, $data);
    }

    public function search()
    {
        $data = array();
		$head = array();
        $this->render('motor_search', $head, $data);
    }

    public function chkcarp()
    {
		$sdata = (isset($_POST['sdata'])) ? trim($_POST['sdata']) : redirect(base_url());
		$cks = $this->Public_model->chkf('carpricelist',$sdata);
		if($cks){
			//$cargroup = (isset($_POST['insutype'])) ? trim((int)($_POST['insutype'])) : '';
			$year = (isset($_POST['year'])) ? trim($this->db->escape_str($_POST['year'])) : '';
			$maker = (isset($_POST['maker'])) ? trim($this->db->escape_str($_POST['maker'])) : '';
			$model = (isset($_POST['model'])) ? trim($this->db->escape_str($_POST['model'])) : '';
			$engdes = (isset($_POST['engdesc'])) ? trim($this->db->escape_str($_POST['engdesc'])) : '';
			$carcode = (isset($_POST['carcode'])) ? trim((int)($_POST['carcode'])) : '';
			$data = $this->Public_model->getCarprice($sdata, $cargroup, $maker, $year, $model, $engdes, $carcode);
			 echo "<option value=''>เลือก</option>";
			 if($model != '' ){
				 foreach($data as $row) {
					 echo "<option value='".$row['carcode']."'>".$row['data']." ( ทุน ".number_format($row['newprice'])." )</option>";
				 }
			 } else {
				 foreach($data as $row) {
					 echo "<option value='".$row['data']."'>".$row['data']."</option>";
				 }
			 }
		} else {
			echo "<option value=''>ไม่มีข้อมูล</option>";
		}
    }

    public function chkcars()
    {
		$sdata = (isset($_POST['sdata'])) ? trim($_POST['sdata']) : redirect(base_url());
		$cks = $this->Public_model->chkf('carsize',$sdata);
		if($cks){
			$carcode = (isset($_POST['carcode'])) ? trim((int)($_POST['carcode'])) : '';
			$data = $this->Public_model->getCarsize($sdata, $carcode);
			echo "<option value=''>เลือก</option>";
			foreach($data as $row) {
				echo "<option value='".$row['data']."'>".$row['CC']."</option>";
			}
		} else {
			echo "<option value=''>ไม่มีข้อมูล</option>";
		}
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
				(isset($_POST['idcard'])) ? $idcard = $_POST['idcard'] : $idcard = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['province'])) ? $province = $_POST['province'] : $province = '';

				(isset($_POST['maker'])) ? $maker = $_POST['maker'] : $maker = '';
				(isset($_POST['model'])) ? $model = $_POST['model'] : $model = '';
				(isset($_POST['year'])) ? $year = $_POST['year'] : $year = '';
				(isset($_POST['sizeno'])) ? $sizeno = $_POST['sizeno'] : $sizeno = '';
				$subject = '(Website) ประกันรถยนต์';
				$message = "รายละเอียด<br>";
				$message .= "ผลิตภัณฑ์ที่สนใจ<br>";
				$message .= $pdname."<br>";
				$message .= "**************************************************<br>";
				$message .= "ชื่อ : ".$fullname."<br>";
				$message .= "เลขที่บัตรประชาชน : ".$idcard."<br>";
				$message .= "E-mail : ".$email."<br>";
				$message .= "เบอร์โทรติดต่อ : ".$phone."<br>";
				$message .= "จังหวัด : ".$province."<br>";
				$message .= "**************************************************<br>";
				$message .= "รายละเอียดรถยนต์<br>";
				$message .= "ยี่ห่อรถ : ".$maker."<br>";
				$message .= "รุ่นรถ : ".$model."<br>";
				$message .= "ปีรถ : ".$year."<br>";
				$message .= "น้ำหนักบรรทุก : ".$sizeno."<br>";

				if($pdname == 'ประกันภัย พ.ร.บ') {
					$send_mail = send_mail(MAIL_CPL,$email,$fullname,$subject,$message);
				} else {
					$send_mail = send_mail(MAIL_VLN,$email,$fullname,$subject,$message);
				}

				if($send_mail){
					echo "successful";
				} else {
					echo "Error";
				}
			} else {
				echo "Error";
			}
		} else {
			redirect('motor_insurance');
		}

	}

}