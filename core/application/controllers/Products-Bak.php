<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

	private $num_rows = 5;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		$data['products'] = $this->Public_model->getPosts($this->num_rows, $page, 'products');
		$rowscount = $this->Public_model->postsCount('products');
		$data['links_pagination'] = pagination('products', $rowscount, $this->num_rows);
        $this->render('products', $head, $data);
    }

    public function view($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            $this->render('error404', $head, $data);
        }
        $data = array();
		$head = array();
        $data['article'] = $this->Public_model->getOnePost('products',$id);
        if ($data['article'] == null) {
			$this->render('error404', $head, $data);
        }
		$this->render('packet_view', $head, $data);
    }

    public function search()
    {
		if(!empty($_POST)) {
			$data = array();
			$head = array();
			(isset($_POST['engdesc'])) ? $carcode = $_POST['engdesc'] : $carcode = ''; //
			(isset($_POST['year'])) ? $year = $_POST['year'] : $year = ''; // ปี
			(isset($_POST['typeis'])) ? $typeis = $_POST['typeis'] : $typeis = ''; // ประเภท
			(isset($_POST['sizeno'])) ? $sizeno = $_POST['sizeno'] : $sizeno = ''; // น้ำหนักบรรทุก
			(isset($_POST['maker'])) ? $maker = $_POST['maker'] : $maker = '';
			(isset($_POST['model'])) ? $model = $_POST['model'] : $model = '';
			$cc = $this->Public_model->chkCarsize($sizeno,$carcode);
			$sessdata=array(
				'carcode' => dis_carcode($carcode),
				'year' => $year,
				'typeis' => dis_insutype($typeis),
				'sizeno' => $cc['CC'],
				'maker' => $maker,
				'model' => $model
			 );
			$this->session->set_userdata('search_pro', $sessdata);
			$data['products'] = $this->Public_model->getPosts(null, null, 'products', $carcode, $year, $typeis, $sizeno);
			$data['carcode'] = $carcode;
			$data['year'] = $year;
			$data['typeis'] = $typeis;
			$data['sizeno'] = $sizeno;
			$this->render('products', $head, $data);
		} else {
			redirect('products');
		}
    }

    public function send()
    {
		if(!empty($_POST)) {
			(isset($_POST['packid'])) ? $packid = (int)$_POST['packid'] : $packid = '';
			$pid = $this->Public_model->getTitlePost('products',$packid);
			if($packid!==''){
				(isset($_POST['fullname'])) ? $fullname = $_POST['fullname'] : $fullname = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['province'])) ? $province = $_POST['province'] : $province = '';

				$to = "demo@localhost.com";
				 
				$to_user = $fullname;
				$subject = "คุณ $fullname สนใจ : ".$pid['title'];
				$from_user = "Website";
				 
				// ให้รองรับการแสดงภาษาไทยในโปรแกรม อ่านอีเมล 
				$to_user = "=?UTF-8?B?".base64_encode($to_user)."?=";
				$from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
				$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
				 
				$body="รายละเอียดการติดต่อ<br>";
				$body.="ชื่อ-นามสกุล : $fullname<br>";
				$body.="อีเมล : $email<br>";
				$body.="เบอร์โทรติดต่อ : $phone<br>";
				$body.="จังหวัด : $province<br><br>";
				$datasee = $this->session->userdata('search_pro');
				if($datasee) {
					$body.="****************** <br><br>";
					$body.="ข้อมูลที่ทำการค้นหาเบื้องต้น <br>";
					$body.="ประเภทที่สนใจ : ".$datasee['typeis']."<br>";
					$body.="ปีรถ : ".$datasee['year']."<br>";
					$body.="รถยนต์ : ".$datasee['maker']."<br>";
					$body.="รุ่น : ".$datasee['model']."<br>";
					$body.="น้ำหนักบรรทุก : ".$datasee['sizeno']."<br>";
				}
				$headers   = array();
				$headers[] = "MIME-Version: 1.0";
				$headers[] = "Content-type: text/html; charset=UTF-8";
				$headers[] = "To: $to_user <$to>";
				$headers[] = "From: $from_user <postmaster@localhost.com>";
				//$headers[] = "Cc: Name CC <postmaster@localhost.com>";
				//$headers[] = "Bcc: Name BCC <postmaster@localhost.com>";
				//$headers[] = "Reply-To: Postmaster <postmaster@localhost.com>";
				$headers[] = "Subject: $subject";
				$headers[] = "X-Mailer: PHP/".phpversion();
				 
				if(mail($to, $subject , $body, implode("\r\n", $headers))){
					//$items = array('carcode', 'year','typeis', 'sizeno','maker', 'model');
					$this->session->unset_userdata('search_pro');
					echo "successful";
				} else {
					echo("Error");
				}
			} else {
				echo("Error");
			}
		} else {
			redirect('products');
		}
	}

}