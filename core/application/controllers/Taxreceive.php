<?php
defined('BASEPATH') or exit('No direct script access allowed');
$autoload['libraries'] = array('session');
// $this->load->library('session');

class Taxreceive extends MY_Controller
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
        $this->render('taxreceive', $head, $data);

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

                        $this->session->set_userdata("paytaxno", $paytaxno);

                        $date_start = $this->date($date1);
                        $date_end = $this->date($date2);
                        $data['date_start'] = $date_start;
                        $data['date_end'] = $date_end;

                        $data['paytaxno'] = $this->Public_model->gettaxreceive($paytaxno, $date_start, $date_end);

                        if (empty($data['paytaxno'])) {
                      

                            $data['echoerr'] = "ไม่พบข้อมูลผู้เสียภาษี";


                        } else {
                            $data['echoerr'] = "";
                        }

                    }
                } else if (strlen($paytaxno) > 13) {
                    $data['echoerr'] = "เลขที่ผู้เสียภาษีเกิน 13 ตัว";
                } else {
                    $data['echoerr'] = "เลขที่ผู้เสียภาษีไม่ครบ 13 ตัว";
                }
            }

        }

        $this->render('taxreceive', $head, $data);
    }

    public function report()
    {
        $taxid = $_POST['taxid'] ?? '';
        $docno = $_POST['docno'] ?? '';
        
        $this->session->set_userdata([
            "taxid" => $taxid,
            "docno" => $docno
        ]);
        
        $data = [
            'taxreceive_report' => $this->Public_model->gettaxreceive_report($taxid, $docno),
        ];
        
        $this->render('taxreceive_report', [], $data);
    }

    public function sumreport()
    {
        $fullname = $_POST['fullname'] ?? '';
        $date_start = $_POST['date_start'] ?? '';
        $date_end = $_POST['date_end'] ?? '';
        
        $this->session->set_userdata([
            "fullname" => $fullname,
            "date_start_sumrep" => $date_start,
            "date_end_sumrep" => $date_end
        ]);
        
        $data = [
            'getdetailpay_sumreport' => $this->Public_model->getdetailpay_sumreport_receive($fullname,$date_start,$date_end),
            'date_start' => $date_start,
            'date_end' => $date_end
        ];
        
        $this->render('taxreceive_report', [], $data);
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
            $yearCE = intval($yearBE) + 543;
            // สร้างวันที่ในรูปแบบ "ค.ศ."
            $gregorianDate = "$yearCE-$month-$day"; 
            $gregorianDate = str_replace(' ', '', $gregorianDate);
            // echo $gregorianDate;

        }
        return $gregorianDate;

    }

}
