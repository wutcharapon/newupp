<?php
defined('BASEPATH') or exit('No direct script access allowed');
$autoload['libraries'] = array('session');
// $this->load->library('session');

class Tax extends MY_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     //$this->load->library('email');
    //     //$this->load->library('upload');
    //     $this->path_agt_regis = $this->config->item('root_upload').'agt_regis/';
    //     $this->load->library('Custom_upload', array('upload_path' => $this->path_agt_regis));
    // }
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array();
        $head = array();
        unset($_SESSION['paytaxno']);
        $data['echoerr'] = "";
        $this->render('tax', $head, $data);

    }

    public function search()
    {

        (isset($_POST['paytaxno'])) ? $paytaxno = $_POST['paytaxno'] : $paytaxno = '';
        (isset($_POST['date_start'])) ? $date_start = $_POST['date_start'] : $date_start = '';
         

        if (!empty($date_start)) {
            list($date1, $date2) = explode('-', $date_start);
        } else {
            $date1 = '';
            $date2 = '';
        }

        $_SESSION['paytaxno'] = $paytaxno;
        $data = array();
        $head = array();
        $data['echoerr'] = "";
        if (empty($paytaxno)) {
            $data['echoerr'] = "กรุณากรอก เลขที่ผู้เสียภาษี";         
        } else {
            if (preg_match('/[a-zA-Z\_\.\-ก-๏เแโใไเ#$%^&*()_+!@",?|{}๐เแโใไะาึืุูี๊ฯํะ๕๑๔๒๖๓๘๐]/', $paytaxno)) {
                $data['echoerr'] = "กรุณากรอก เฉพาะตัวเลขเท่านั้น !";
            } else {
                if (strlen($paytaxno) == 13) {
                    if (empty($date1) || empty($date2)) {
                        $data['echoerr'] = "กรุณากรอก วันออกหนังสือรับรองการหักภาษี ณ ที่จ่าย";

                    } else {
                            if($paytaxno != '0107555000333')
                            {
                        $this->session->set_userdata("paytaxno", $paytaxno);

                        $date_start = $this->date($date1);
                        $date_end = $this->date($date2);   
                        $dateformat_start = date("Y-m-d", strtotime($date_start . " + 543 years"));
                        $dateformat_end = date("Y-m-d", strtotime($date_end . " + 543 years"));        
                        /////////////////////////////////////////////////////////////////////////////////////////////////////////            
                        $data['date_start'] = $date_start;
                        $data['date_end'] = $date_end;
                        $data['dateformat_start'] = $dateformat_start;
                        $data['dateformat_end'] = $dateformat_end;
                       
                        ////////////////////////////////////////
                        $startDate = new DateTime($date_start);
                        $endDate = new DateTime($date_end);

                        $result = $this->Public_model->gettaxreceiveYear($paytaxno, $date_start, $date_end);
                        $data['paytaxrecive_year'] = $result;
                        // if ($startDate->format('m-d') === '01-01' && $endDate->format('m-d') === '12-31' && $startDate->format('Y') === $endDate->format('Y')) {
                      
                        // $result = $this->Public_model->gettaxreceiveYear($paytaxno, $date_start, $date_end);
                        //     if($result){
                        //         $data['paytaxrecive_year'] = $result;
                        //     }else{
                        //         $data['paytaxrecive_year'] = null;
                        //     }
                        
                        // }else{
                        //     $data['paytaxrecive_year'] = null;
                        // }
                        ////////////////////////////////////////

                        $data['paytaxno'] = $this->Public_model->getpaytaxno($paytaxno, $date_start, $date_end);
                        $data['paytaxrecive'] = $this->Public_model->gettaxreceive($paytaxno, $date_start, $date_end);
                        $data['paytaxrecive_old'] = $this->Public_model->gettaxreceive_old($paytaxno, $dateformat_start, $dateformat_end);
                    
                        
                       
                       ////// ถ้าเกิดไม่มี หนังสือหัก ณ ที่จ่าย taxpay จะค้นหาจาก รายละเอียดการจ่าย vchmas
                        if (empty($data['paytaxno']) && !empty($data['paytaxrecive']) ) {
                            $data['echoerr'] = "ไม่พบข้อมูลผู้เสียภาษี";
                        }else if(empty($data['paytaxno']) && empty($data['paytaxrecive']) && empty($data['paytaxrecive_old'])){
                            $data['echoerr'] = "ไม่พบข้อมูลผู้เสียภาษี";
                        }
                         else {
                            $data['echoerr'] = "";
                        }
                    }else{

                        $data['echoerr'] = "ไม่พบข้อมูลผู้เสียภาษี";
                    }

                    }
                } else if (strlen($paytaxno) > 13) {
                    $data['echoerr'] = "เลขที่ผู้เสียภาษีเกิน 13 ตัว";
                } else {
                    $data['echoerr'] = "เลขที่ผู้เสียภาษีไม่ครบ 13 ตัว";
                }
            }

        }
        $this->render('tax', $head, $data);
    }

    public function report_tax()
    {
        $taxkey = $_POST['taxkey'] ?? '';
        $vchkey = $_POST['vchkey'] ?? '';
        $paytaxno = $_POST['paytaxno'] ?? '';
        $paytitle = $_POST['title'] ?? '';
        $payname = $_POST['name'] ?? '';
        $paysurname = $_POST['surname'] ?? '';
        $docdate = $_POST['paydate'] ?? '';
        $bankref = $_POST['bankref'] ?? '';
        
        $this->session->set_userdata([
            "taxkey" => $taxkey,
            "vchkey" => $vchkey,
            "paytaxno_rep" => $paytaxno,
            "paytitle_rep" => $paytitle,
            "payname_rep" => $payname,
            "paysurname_rep" => $paysurname,
            "docdate_rep" => $docdate,
            "bankref_ref" => $bankref
        ]);
        
        $data = [
            'paytaxno_report' => $this->Public_model->getpaytaxno_report($taxkey, $paytaxno,$docdate),
            'getdetailpaytaxno_report' => $this->Public_model->getdetailpaytaxno_report($paytaxno,$paytitle,$payname,$paysurname,$docdate,$bankref),
        ];
       
        $this->render('tax_report', [], $data);
    }

    public function report_receive()
    {
        $taxid = $_POST['taxid'] ?? '';
        $docno = $_POST['docno'] ?? '';
        
        $this->session->set_userdata([
            "taxid" => $taxid,
            "docno" => $docno
        ]);
        
        $data = [
            'taxreceive_report' => $this->Public_model->gettaxreceive_report($taxid, $docno),
            'taxreceive_report_old' => $this->Public_model->gettaxreceive_report_old($taxid, $docno)
        ];
        
        $this->render('taxreceive_report', [], $data);
    }

    public function sumreport()
    {
        $fullname = $_POST['fullname'] ? trim($_POST['fullname']) : '';
        $taxid = $_POST['paytaxno'] ?? '';
        $date_start = $_POST['date_start'] ?? '';
        $date_end = $_POST['date_end'] ?? '';
        // $date_start_in = $_POST['date_start_in'] ?? '';
        // $date_end_in = $_POST['date_end_in'] ?? '';

        
        $this->session->set_userdata([
            "fullname" => $fullname,
            "date_start_sumrep" => $date_start,
            "date_end_sumrep" => $date_end
        ]);


        $dateformat_start = date("Y-m-d", strtotime($date_start . " + 543 years"));
        $dateformat_end = date("Y-m-d", strtotime($date_end . " + 543 years"));     

        // if (strtotime($date_start) > strtotime('2024-02-29')) {
        //     $data = [
        //         'getdetailpay_sumreport' => $this->Public_model->getdetailpay_sumreport($date_start,$date_end,$taxid),
        //         'getdetailpay_sumreport_receive' => $this->Public_model->getdetailpay_sumreport_receive($taxid,$date_start,$date_end),
        //         'date_start' => $date_start,
        //         'date_end' => $date_end
        //     ];
        // }

        // if (strtotime($date_start) <= strtotime('2024-02-29')) {
        //     if(strtotime($date_start) == strtotime('2024-02-29') && strtotime($date_end) == strtotime('2024-02-29')){
        //         $dateformat_start = "errdate";
        //         $dateformat_end = "errdate";
        //     }
        //     $data = [
        //         'getdetailpay_sumreport' => $this->Public_model->getdetailpay_sumreport($date_start,$date_end,$taxid),
        //         'getdetailpay_sumreport_receive_old' => $this->Public_model->getdetailpay_sumreport_receive_old($taxid,$dateformat_start,$dateformat_end),
        //         'date_start' => $date_start,
        //         'date_end' => $date_end
        //     ];
        // }

        $data = [
            'getdetailpay_sumreport' => $this->Public_model->getdetailpay_sumreport($date_start,$date_end,$taxid,$fullname),
            'getdetailpay_sumreport_receive' => $this->Public_model->getdetailpay_sumreport_receive($taxid,$date_start,$date_end),
            'getdetailpay_sumreport_receive_old' => $this->Public_model->getdetailpay_sumreport_receive_old($taxid,$dateformat_start,$dateformat_end),
            'date_start' => $date_start,
            'date_end' => $date_end
        ];
     
      
         
        
        $this->render('tax_sumreport', [], $data);
    }

    public function sumreportYear()
    {
        // $date_start = $_POST['date_start'] ?? '';
        // $date_end = $_POST['date_end'] ?? '';
        // $taxid = $_POST['taxid'] ?? '';
        // $docno = $_POST['docno'] ?? '';
       
        // $fullname = $_POST['fullname'] ? trim($_POST['fullname']) : '';
        $taxid = $_POST['paytaxno'] ?? '';
        $date_start = $_POST['date_start'] ?? '';
        $date_end = $_POST['date_end'] ?? '';

        
        // $this->session->set_userdata([
        //     "fullname" => $fullname,
        //     "date_start_sumrep" => $date_start,
        //     "date_end_sumrep" => $date_end
        // ]);




        $data = [
            'gettaxreceive_report_year' => $this->Public_model->gettaxreceive_report_year($taxid,$date_start,$date_end),
            'date_start' => $date_start,
            'date_end' => $date_end
        ];
     
      
         
        
        $this->render('tax_receive_Year', [], $data);
    }

    private function date($date)
    {
        $gregorianDate = '';
        $dateParts = explode('/', $date);
        if (count($dateParts) == 3) {
            $day = $dateParts[0];
            $month = $dateParts[1];
            $yearBE = $dateParts[2]; // พ.ศ.

            // คำนวณปีค.ศ. โดยลบ 543 จาก พ.ศ.
            $yearCE = $yearBE;

            // สร้างวันที่ในรูปแบบ "ค.ศ."
            $gregorianDate = "$yearCE-$month-$day"; 
            $gregorianDate = str_replace(' ', '', $gregorianDate);
            // echo $gregorianDate;

        }
        return $gregorianDate;

    }

    // private function datereceive($date)
    // {
    //     $gregorianDate = '';
    //     $dateParts = explode('/', $date);
    //     if (count($dateParts) == 3) {
    //         $day = $dateParts[0];
    //         $month = $dateParts[1];
    //         $yearBE = $dateParts[2]; // พ.ศ.

    //         // คำนวณปีค.ศ. โดยลบ 543 จาก พ.ศ.
    //         $yearCE = intval($yearBE) + 543;
    //         // สร้างวันที่ในรูปแบบ "ค.ศ."
    //         $gregorianDate = "$yearCE-$month-$day"; 
    //         $gregorianDate = str_replace(' ', '', $gregorianDate);
    //         // echo $gregorianDate;

    //     }
    //     return $gregorianDate;

    // }

  

  

}