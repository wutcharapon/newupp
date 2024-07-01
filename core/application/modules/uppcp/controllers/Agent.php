<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/phpzip33/vendor/autoload.php';

class Agent extends ADMIN_Controller {

    private $num_rows = 4;

    function __construct(){
        parent::__construct();
		$this->load->model('Agent_model');
        $this->path_agt_regis = $this->config->item('root_upload').'agt_regis/';
        $this->load->library('Custom_upload', array('upload_path' => $this->path_agt_regis));
		$this->load->library('zip');
    }

	public function index()
	{
		$this->login_check();
		redirect('uppcp/agent/registered_agent');
	}

    public function get_data($id=null) {
		//$this->login_check();
        $data = array();
		switch ($id) {
			case "agent":
				$data['json'] = $this->Agent_model->getAgent('A');
				$this->load->view('agent/_json',$data);
			break;
			case "broker":
				$data['json'] = $this->Agent_model->getAgent('B');
				$this->load->view('agent/_json',$data);
			break;
			case "jrt":
				$data['json'] = $this->Agent_model->getAgent('J');
				$this->load->view('agent/_json',$data);
			break;
		  default:
				$data['json'] = array(array('Result'=>'Fail ไม่พบ Service'));
				$this->load->view('agent/_json',$data);
		} 
    }

    public function registered_agent() {
		$this->login_check();
		$data = array();
		$head = array();
		$data['agt_type']= "A";
		$data['agent'] = $this->Agent_model->getAgent('A');
		$this->load->view('_parts/header', $head);
		$this->load->view('agent/_index', $data);
		$this->load->view('_parts/footer');
    }

    public function registered_broker() {
		$this->login_check();
		$data = array();
		$head = array();
		$data['agt_type']= "B";
		$data['agent'] = $this->Agent_model->getAgent('B');
		$this->load->view('_parts/header', $head);
		$this->load->view('agent/_index', $data);
		$this->load->view('_parts/footer');
    }

    public function registered_juristic_persons() {
		$this->login_check();
		$data = array();
		$head = array();
		$data['agt_type']= "J";
		$data['agent'] = $this->Agent_model->getAgent('J');
		$this->load->view('_parts/header', $head);
		$this->load->view('agent/_index', $data);
		$this->load->view('_parts/footer');
    }

    public function pdf_test($id=null) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'GET' and (!is_null($id)) ) {
			$data = array();
			$data['regis'] = $this->Agent_model->getOneRegis($id);
			$this->load->view('agent/_test', $data);
		} else {
			redirect('uppcp/agent/registered_agent');
		}
    }

    public function pdf_agt($id=null) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'GET' and (!is_null($id)) ) {
			$data = array();
			$data['regis'] = $this->Agent_model->getOneRegis($id);
			$this->load->view('agent/_agt', $data);
		} else {
			redirect('uppcp/agent/registered_agent');
		}
    }

    public function pdf_brk($id=null) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'GET' and (!is_null($id)) ) {
			$data = array();
			$data['regis'] = $this->Agent_model->getOneRegis($id);
			$this->load->view('agent/_brk', $data);
		} else {
			redirect('uppcp/agent/registered_agent');
		}
    }

    public function pdf_legpn($id=null) {
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'GET' and (!is_null($id)) ) {
			$data = array();
			$data['regis'] = $this->Agent_model->getOneRegis($id);
			$this->load->view('agent/_legpn', $data);
		} else {
			redirect('uppcp/agent/registered_agent');
		}
    }

    public function zipfile($id=null) {
		$agt_type = array('A'=>'ขอเปิดรหัสตัวแทนประกันวินาศภัย','B'=>'ขอเปิดรหัสนายหน้าประกันวินาศภัย','J'=>'ขอเปิดรหัสนายหน้านิติบุคคล');
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'GET' and (!is_null($id)) ) {

			$data['regis'] = $this->Agent_model->getOneRegis($id);

			echo "<pre>";
			print_r($data);
			for($a=1; $a<=16; $a++){
				$attached = 'attached'.$a;
				if($data['regis'][$attached]=='') continue;
				$this->zip->read_file(FCPATH.'uploads/agt_regis/'.$data['regis'][$attached]);
			}
			$this->zip->download($data['regis']['fullname'].'.zip');

		} else {
			redirect('uppcp/agent/registered_agent');
		}

    }


    public function zipfile2($id=null) {
		$zipFile = new \PhpZip\ZipFile();
		$agt_type = array('A'=>'ขอเปิดรหัสตัวแทนประกันวินาศภัย','B'=>'ขอเปิดรหัสนายหน้าประกันวินาศภัย','J'=>'ขอเปิดรหัสนายหน้านิติบุคคล');
		$this->login_check();
		if ($_SERVER['REQUEST_METHOD'] == 'GET' and (!is_null($id)) ) {

			$data['regis'] = $this->Agent_model->getOneRegis($id);

			echo "<pre>";
			print_r($data);
			//$entries = [];
			for($a=1; $a<=16; $a++){
				$attached = 'attached'.$a;
				if($data['regis'][$attached]=='') continue;
				//$entries["'".FCPATH.'uploads/agt_regis/'.$data['regis'][$attached]."'"] = $data['regis'][$attached];
				//array_push($entries, );
				//$entries += array("z"=>"1");
				//$entries[] = "".CPATH.'uploads/agt_regis/'.$data['regis'][$attached]."" => "".$data['regis'][$attached]."";
				//$zipFile->addFile(FCPATH.'uploads/agt_regis/'.$data['regis'][$attached], $data['regis'][$attached], \PhpZip\Constants\ZipCompressionMethod::DEFLATED);
		
				//$zipFile->addFile(FCPATH.'uploads/agt_regis/'.$data['regis'][$attached]);
				echo FCPATH.'uploads/agt_regis/'.$data['regis'][$attached]."<br>";

			}

$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f2419e8_1651726834.pdf");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f2429d2_1651726834.pdf");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f24368b_1651726834.pdf");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f243c58_1651726834.JPG");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f25c019_1651726834.pdf");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f25c373_1651726834.png");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f271253_1651726834.jpg");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f287098_1651726834.pdf");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f288f54_1651726834.pdf");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f2895ec_1651726834.JPG");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/627359f2a5272_1651726834.pdf");
$zipFile->addFile("/var/www/html/newupp/uploads/agt_regis/เทส62733880316a1_1651718272.jpg");

			//print_r($entries);
			//$zipFile->addAll($entries);  
			$zipFile->outputAsAttachment('sss.zip');
			$zipFile->close();

		} else {
			redirect('uppcp/agent/registered_agent');
		}

    }

}
