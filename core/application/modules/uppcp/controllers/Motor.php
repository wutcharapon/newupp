<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Motor extends ADMIN_Controller {

    private $num_rows = 10;

    function __construct(){
        parent::__construct();
		$this->load->model('Motor_model');
    }

	public function index($page = 0)
	{
		$this->login_check();
        $data = array();
        $head = array();
		$data['motor'] = $this->Motor_model->getMotor($this->num_rows, $page);
		$data['total'] = $this->Motor_model->motorCount();
		$data['page'] = $page;
		$data['links_pagination'] = pagination_bakend('uppcp/motor', $data['total'], $this->num_rows, $page);
        $this->load->view('_parts/header', $head);
        $this->load->view('motor/_index', $data);
        $this->load->view('_parts/footer');
	}

    public function excel() {
		$this->login_check();
		$exf = $this->Motor_model->getMotor();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', '#');
		$sheet->setCellValue('B1', 'ประเภท');
		$sheet->setCellValue('C1', 'ชื่อ-นามสกุล');
		$sheet->setCellValue('D1', 'เลขที่บัตรประชาชน');
		$sheet->setCellValue('E1', 'อีเมล');
		$sheet->setCellValue('F1', 'เบอร์โทร');
		$sheet->setCellValue('G1', 'จังหวัด');
		$sheet->setCellValue('H1', 'packid');
		$sheet->setCellValue('I1', 'insutype');
		$sheet->setCellValue('J1', 'year');
		$sheet->setCellValue('K1', 'maker');
		$sheet->setCellValue('L1', 'model');
		$sheet->setCellValue('M1', 'carcode');
		$sheet->setCellValue('N1', 'sizeno');
		$sheet->setCellValue('O1', 'วันเวลา');
		$sheet->setCellValue('P1', 'PACKETCODE');


		foreach(range('A','P') as $column) {
			$sheet->getColumnDimension($column)->setAutoSize(true);
		}
		$n = 2;
		foreach($exf as $dataexc) {
			$sheet->setCellValue('A'.$n, $n-1);
			$sheet->setCellValue('B'.$n, $dataexc['pdname']);
			$sheet->setCellValue('C'.$n, $dataexc['fullname']);
			$sheet->setCellValue('D'.$n, $dataexc['idcard']);
			$sheet->setCellValue('E'.$n, $dataexc['email']);
			$sheet->setCellValue('F'.$n, $dataexc['phone']);
			$sheet->setCellValue('G'.$n, $dataexc['province']);
			$sheet->setCellValue('H'.$n, $dataexc['packid']);
			$sheet->setCellValue('I'.$n, $dataexc['insutype']);
			$sheet->setCellValue('J'.$n, $dataexc['year']);
			$sheet->setCellValue('K'.$n, $dataexc['maker']);
			$sheet->setCellValue('L'.$n, $dataexc['model']);
			$sheet->setCellValue('M'.$n, $dataexc['carcode']);
			$sheet->setCellValue('N'.$n, $dataexc['sizeno']);
			$sheet->setCellValue('O'.$n, date("d-m-Y H:i:s",$dataexc['time']));
			$sheet->setCellValue('P'.$n, $dataexc['PACKETCODE']);
			$n++;
		}

        $writer = new Xlsx($spreadsheet);
 
        $filename = 'Motor-'.date("d-m-Y-His",time());
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 

    }

}
