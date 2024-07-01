<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

	private $num_rows = 3;

    public function __construct()
    {
		parent::__construct();
		$this->load->library('email');
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		$data['products'] = $this->Public_model->getPosts($this->num_rows, $page, 'products');
		$data['packet'] = $this->Public_model->getPacket();
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
        $data['article'] = $this->Public_model->getOnePostPK('products',$id);
		$data['packdata'] = $this->Public_model->getPackdara($data['article']['packid']);
        if ($data['article'] == null or $data['article']['packid'] =="") {
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
			(isset($_POST['insutype'])) ? $insutype = $_POST['insutype'] : $insutype = ''; // ประเภท
			(isset($_POST['sizeno'])) ? $sizeno = $_POST['sizeno'] : $sizeno = ''; // น้ำหนักบรรทุก
			(isset($_POST['maker'])) ? $maker = $_POST['maker'] : $maker = '';
			(isset($_POST['model'])) ? $model = $_POST['model'] : $model = '';
			$cc = $this->Public_model->chkCarsize($sizeno,$carcode);
			$sessdata=array(
				'carcode' => dis_carcode($carcode),
				'year' => $year,
				'insutype' => dis_insutype($insutype),
				'sizeno' => $cc['CC'],
				'maker' => $maker,
				'model' => $model
			 );
			$this->session->set_userdata('search_pro', $sessdata);
			//$data['products'] = $this->Public_model->getPosts(null, null, 'products', $carcode, $year, $insutype, $sizeno);
			$data['products'] = $this->Public_model->getPosts(null, null, 'products');
			$data['packet'] = $this->Public_model->getPacket($insutype, $carcode, $sizeno);
			$data['carcode'] = $carcode;
			$data['year'] = $year;
			$data['insutype'] = $insutype;
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
			if($packid !=='' ){
				(isset($_POST['pdname'])) ? $pdname = $_POST['pdname'] : $pdname = '';
				(isset($_POST['fullname'])) ? $fullname = $_POST['fullname'] : $fullname = '';
				(isset($_POST['idcard'])) ? $idcard = $_POST['idcard'] : $idcard = '';
				(isset($_POST['email'])) ? $email = $_POST['email'] : $email = '';
				(isset($_POST['phone'])) ? $phone = $_POST['phone'] : $phone = '';
				(isset($_POST['province'])) ? $province = $_POST['province'] : $province = '';

				(isset($_POST['insutype'])) ? $insutype = $_POST['insutype'] : $insutype = '';
				(isset($_POST['year'])) ? $year = $_POST['year'] : $year = '';
				(isset($_POST['maker'])) ? $maker = $_POST['maker'] : $maker = '';
				(isset($_POST['model'])) ? $model = $_POST['model'] : $model = '';
				(isset($_POST['engdesc'])) ? $engdesc = $_POST['engdesc'] : $engdesc = '';
				(isset($_POST['sizeno'])) ? $sizeno = $_POST['sizeno'] : $sizeno = '';

                $insert = array(
                    'pdname' => $pdname,
                    'fullname' => $fullname,
                    'idcard' => $idcard,
                    'email' => $email,
                    'phone' => $phone,
                    'province' => $province,
					'packid' => $packid,
                    'insutype' => $insutype,
                    'year' => $year,
                    'maker' => $maker,
                    'model' => $model,
                    'carcode' => $engdesc,
                    'sizeno' => $sizeno,
					'time' => time()
                );
				$interested = ($pdname=='packet') ? $pid['title'] : $pdname ;
				$this->email->from($email, $fullname);
				$this->email->to(MAIL_MOTOR);
				$this->email->subject('คุณ '.$fullname.' สนใจ : '.$interested);
				$message = "รายละเอียดการติดต่อ<br>";
				$message .= "ชื่อ-นามสกุล : $fullname<br>";
				$message .= "เลขที่บัตรประชาชน : $idcard<br>";
				$message .= "อีเมล : $email<br>";
				$message .= "เบอร์โทรติดต่อ : $phone<br>";
				$message .= "จังหวัด : $province<br><br>";
				$message .= "****************** รายละเอียดรถยนต์ ******************<br><br>";
				$message .= "ประเภทที่สนใจ : ".dis_insutype($insutype)."<br>";
				$message .= "ยี่ห้อรถยนต์ : $maker<br>";
				$message .= "รุ่น : $model<br>";
				$message .= "ปีรถยนต์ : $year<br>";
				$message .= "ประเภทรถ : ".dis_carcode($engdesc)."( $engdesc )<br>";
				$message .= "น้ำหนักบรรทุก : $sizeno<br>";

				$datasee = $this->session->userdata('search_pro');
				if($datasee) {
					$message .= "****************** ข้อมูลที่ทำการค้นหาเบื้องต้น ******************<br><br>";
					$message .= "ประเภทที่สนใจ : ".$datasee['insutype']."<br>";
					$message .= "ปีรถ : ".$datasee['year']."<br>";
					$message .= "รถยนต์ : ".$datasee['maker']."<br>";
					$message .= "รุ่น : ".$datasee['model']."<br>";
					$message .= "น้ำหนักบรรทุก : ".$datasee['sizeno']."<br>";
				}
				$this->email->message($message);
				$this->email->set_mailtype("html");
					 
				if($this->email->send()){
					$this->Public_model->addUserMotor($insert);
					echo "successful";
				} else {
					echo "<p>ไม่สามารถส่งข้อความได้</p>";
				}
			} else {
				echo "<p>ไม่สามารถส่งข้อความได้</p>";
			}
		} else {
			if($packid == '0' ) {
				redirect('motor_insurance');
			} else {
				redirect('products');
			}
		}
	}

}