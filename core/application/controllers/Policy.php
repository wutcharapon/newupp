<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Policy extends MY_Controller {

	// private $num_rows = 10;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		// $data['other'] = $this->Public_model->getPosts($this->num_rows, $page, 'other_insurance');
		// $rowscount = $this->Public_model->postsCount('other_insurance');
		// $data['links_pagination'] = pagination('other_insurance', $rowscount, $this->num_rows);
        $this->render('policy', $head, $data);
    }

    public function view($id)
    {
        // if (!is_numeric($id) || $id <= 0) {
        //     $this->render('error404', $head, $data);
        // }
        // $data = array();
		// $head = array();
        // $data['article'] = $this->Public_model->getOnePost('other_insurance',$id);
        // if ($data['article'] == null) {
		// 	$this->render('error404', $head, $data);
        // }
		// $this->render('other_insurance_view', $head, $data);
    }

    public function send()
    {
		$data = array();
		if(!empty($_POST)) {
			if(isset($_POST['polno']) && isset($_POST['idcard'])){ //  
				$polno = $_POST['polno'];
				$idcard = $_POST['idcard'];
				if (strpos($polno, '-') !== false) {
					if(strlen($idcard) == '6') {
					
					$res = $this->Public_model->search_polno($polno,$idcard);
					if($res){
						foreach($res as $row){
							$strdate = $row['strdate'];
							$enddate = $row['enddate'];
							$date_format = $row['date_format'];
							$polno_res = $row['polno'];
						}
						if($strdate != '' && $enddate != '' && $date_format != '' && $polno_res != ''){
						echo "<br>เลขกรมธรรม์ : <b>$polno_res</b><br><br> วันที่เริ่ม : <b style='color:green'>$strdate</b> &nbsp;  วันที่สิ้นสุด : <b style='color:green'>$enddate</b> <br><br>วันทำสัญญา : <b style='color:green'>$date_format</b>";
						}else{
							echo "รายละเอียดกรมธรรม์ ไม่สมบูรณ์";
						}
					}else{
						echo "<p>ไม่พบเลขกรมธรรม์ หรือ สิ้นสุดวันทำสัญญา</p>";
					}

				}else{
					echo "กรอกเลขบัตรประชาชน ไม่ครบ 6 หลัก";
				}
				
									
				} else {
					echo "<p>รูปแบบเลขกรมธรรม์ผิด</p>";
				}
			
			} else {
				echo "<p>กรุณากรอกข้อมูลให้ครบ</p>";
			}
		} else {
			redirect('policy');
		}

		

	}

}