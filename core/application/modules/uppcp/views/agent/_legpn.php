<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//ini_set('MAX_EXECUTION_TIME', '-1');
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
//ini_set('max_execution_time', '1000');
require_once(APPPATH.'libraries/mpdf/autoload.php');
//echo FCPATH.'uploads/tmp';

$mpdf = new \Mpdf\Mpdf(array(
'format' => 'A4',
'margin_top' => '5',
'margin_right' => '5',
'margin_left' => '5',
'margin_bottom' => '5',
'mode' => 'utf-8',
'default_font' => 'angsana',
'default_font_size' => '14',
'tempDir' => FCPATH.'uploads/tmp'
));
$mpdf->SetTitle('แบบฟอร์มขอเปิดรหัสนายหน้านิติบุคคล');

$pagecount = $mpdf->setSourceFile(APPPATH.'libraries/mpdf/template/legpn.pdf');

$fullname = (isset($regis['fullname'])) ? $regis['fullname'] : "";
$juristic_no = (isset($regis['juristic_no'])) ? $regis['juristic_no'] : "";
$agt_idcard = (isset($regis['agt_idcard'])) ? $regis['agt_idcard'] : "";
$date_birth = (isset($regis['date_birth']) and $regis['date_birth'] != '1957-01-01') ? formatdate($regis['date_birth']) : "";
$date_issue = (isset($regis['date_issue']) and $regis['date_issue'] != '1957-01-01') ? formatdate($regis['date_issue']) : "";
$date_expiry = (isset($regis['date_expiry']) and $regis['date_expiry'] != '1957-01-01') ? formatdate($regis['date_expiry']) : "";
$agtno = (isset($regis['agtno'])) ? $regis['agtno'] : "";
$marital_status = (isset($regis['marital_status'])) ? $regis['marital_status'] : "";

$marital_name = (isset($regis['marital_name'])) ? $regis['marital_name'] : "";
$marital_tel = (isset($regis['marital_tel'])) ? $regis['marital_tel'] : "";
$company_address = (isset($regis['company_address'])) ? $regis['company_address'] : "";
$company_zipcode = (isset($regis['company_zipcode'])) ? $regis['company_zipcode'] : "";
$company_tel = (isset($regis['company_tel'])) ? $regis['company_tel'] : "";
$mess_addr = (isset($regis['mess_addr'])) ? $regis['mess_addr'] : "";
$addressed = (isset($regis['addressed'])) ? $regis['addressed'] : "";
$zipcode = (isset($regis['zipcode'])) ? $regis['zipcode'] : "";
$tel = (isset($regis['tel'])) ? $regis['tel'] : "";
$contact_name = (isset($regis['contact_name'])) ? $regis['contact_name'] : "";
$email_address = (isset($regis['email_address'])) ? $regis['email_address'] : "";
$tel_contact = (isset($regis['tel_contact'])) ? $regis['tel_contact'] : "";
$id_line = (isset($regis['id_line'])) ? $regis['id_line'] : "";
$guarantor = (isset($regis['guarantor'])) ? $regis['guarantor'] : "";
$guarantor_address = (isset($regis['guarantor_address'])) ? $regis['guarantor_address'] : "";
$guarantor_zipcode = (isset($regis['guarantor_zipcode'])) ? $regis['guarantor_zipcode'] : "";
$guarantor_tel = (isset($regis['guarantor_tel'])) ? $regis['guarantor_tel'] : "";
$guarantor_workphoe = (isset($regis['guarantor_workphoe'])) ? $regis['guarantor_workphoe'] : "";
$guarantor_mobile = (isset($regis['guarantor_mobile'])) ? $regis['guarantor_mobile'] : "";
$guarantor_idcard = (isset($regis['guarantor_idcard'])) ? $regis['guarantor_idcard'] : "";
$issued_by = (isset($regis['issued_by'])) ? $regis['issued_by'] : "";
$ministry = (isset($regis['ministry'])) ? $regis['ministry'] : "";
$guarantor_datecard_issue = (isset($regis['guarantor_datecard_issue']) and $regis['guarantor_datecard_issue'] !='1957-01-01' ) ? formatdate($regis['guarantor_datecard_issue']) : "";
$guarantor_datecard_expiry = (isset($regis['guarantor_datecard_expiry']) and $regis['guarantor_datecard_expiry'] !='1957-01-01' ) ? formatdate($regis['guarantor_datecard_expiry']) : "";

$was_agt = (isset($regis['was_agt'])) ? $regis['was_agt'] : "";
$was_agtno = (isset($regis['was_agtno'])) ? $regis['was_agtno'] : "";

/*
.	<p style="top:'.((isset(mb_substr($agtno,0,1)) and mb_substr($agtno,0,1)=='0') ? "234" : "236").'px; left:246px;">'.((isset(mb_substr($agtno,0,1))) ? mb_substr($agtno,0,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,1,1)) and mb_substr($agtno,1,1)=='0') ? "234" : "236").'px; left:268px;">'.((isset(mb_substr($agtno,1,1))) ? mb_substr($agtno,1,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,2,1)) and mb_substr($agtno,2,1)=='0') ? "234" : "236").'px; left:289px;">'.((isset(mb_substr($agtno,2,1))) ? mb_substr($agtno,2,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,3,1)) and mb_substr($agtno,3,1)=='0') ? "234" : "236").'px; left:310px;">'.((isset(mb_substr($agtno,3,1))) ? mb_substr($agtno,3,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,4,1)) and mb_substr($agtno,4,1)=='0') ? "234" : "236").'px; left:331px;">'.((isset(mb_substr($agtno,4,1))) ? mb_substr($agtno,4,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,5,1)) and mb_substr($agtno,5,1)=='0') ? "234" : "236").'px; left:352px;">'.((isset(mb_substr($agtno,5,1))) ? mb_substr($agtno,5,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,6,1)) and mb_substr($agtno,6,1)=='0') ? "234" : "236").'px; left:373px;">'.((isset(mb_substr($agtno,6,1))) ? mb_substr($agtno,6,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,7,1)) and mb_substr($agtno,7,1)=='0') ? "234" : "236").'px; left:394px;">'.((isset(mb_substr($agtno,7,1))) ? mb_substr($agtno,7,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,8,1)) and mb_substr($agtno,8,1)=='0') ? "234" : "236").'px; left:416px;">'.((isset(mb_substr($agtno,8,1))) ? mb_substr($agtno,8,1) : "").'</p>
	<p style="top:'.((isset(mb_substr($agtno,9,1)) and mb_substr($agtno,9,1)=='0') ? "234" : "236").'px; left:438px;">'.((isset(mb_substr($agtno,9,1))) ? mb_substr($agtno,9,1) : "").'</p>
*/
$point = '
	<style>
	p,span,h1,h2,h3,h4 {
		position: absolute;
		overflow: visible;
		font-weight: bold;
		font-size:20px
	}
	</style>

	<!----------------->
	<p style="top:170px; left:150px; ">'.$fullname.'</p>

	<p style="top:204px; left:230px; ">'.$juristic_no.'</p>

	<p style="top:236px; left:250px; ">'.$agtno.'</p>

	<p style="top:269px; left:160px; width: 100%; ">'.$company_address.'</p>
	<p style="top:300px; left:355px; width: 100%; ">'.$company_zipcode.'</p>
	<p style="top:300px; left:480px; width: 100%; ">'.$company_tel.'</p>

	<p style="top:463px; left:245px; width: 100%; ">'.$contact_name.'</p>

	<p style="top:497px; left:153px; width: 100%; ">'.$email_address.'</p>
	<p style="top:497px; left:370px; width: 100%; ">'.$tel_contact.'</p>
	<p style="top:497px; left:535px; width: 100%; ">'.$id_line.'</p>

	<p style="top:530px; left:175px; width: 100%; ">'.$guarantor.'</p>

	<p style="top:562px; left:180px; width: 100%; ">'.$guarantor_address.'</p>

	<p style="top:595px; left:350px; width: 100%; ">'.$guarantor_zipcode.'</p>
	<p style="top:595px; left:498px; width: 100%; ">'.$guarantor_tel.'</p>

	<p style="top:628px; left:204px; width: 100%; ">'.$guarantor_workphoe.'</p>
	<p style="top:628px; left:498px; width: 100%; ">'.$guarantor_mobile.'</p>

	<p style="top:'.((isset($guarantor_idcard[0]) and $guarantor_idcard[0]=='0') ? "658" : "660").'px; left:344px; ">'.((isset($guarantor_idcard[0])) ? $guarantor_idcard[0] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[1]) and $guarantor_idcard[1]=='0') ? "658" : "660").'px; left:366px; ">'.((isset($guarantor_idcard[1])) ? $guarantor_idcard[1] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[2]) and $guarantor_idcard[2]=='0') ? "658" : "660").'px; left:388px; ">'.((isset($guarantor_idcard[2])) ? $guarantor_idcard[2] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[3]) and $guarantor_idcard[3]=='0') ? "658" : "660").'px; left:409px; ">'.((isset($guarantor_idcard[3])) ? $guarantor_idcard[3] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[4]) and $guarantor_idcard[4]=='0') ? "658" : "660").'px; left:429px; ">'.((isset($guarantor_idcard[4])) ? $guarantor_idcard[4] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[5]) and $guarantor_idcard[5]=='0') ? "658" : "660").'px; left:450px; ">'.((isset($guarantor_idcard[5])) ? $guarantor_idcard[5] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[6]) and $guarantor_idcard[6]=='0') ? "658" : "660").'px; left:471px; ">'.((isset($guarantor_idcard[6])) ? $guarantor_idcard[6] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[7]) and $guarantor_idcard[7]=='0') ? "658" : "660").'px; left:493px; ">'.((isset($guarantor_idcard[7])) ? $guarantor_idcard[7] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[8]) and $guarantor_idcard[8]=='0') ? "658" : "660").'px; left:514px; ">'.((isset($guarantor_idcard[8])) ? $guarantor_idcard[8] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[9]) and $guarantor_idcard[9]=='0') ? "658" : "660").'px; left:536px; ">'.((isset($guarantor_idcard[9])) ? $guarantor_idcard[9] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[10]) and $guarantor_idcard[10]=='0') ? "658" : "660").'px; left:556px; ">'.((isset($guarantor_idcard[10])) ? $guarantor_idcard[10] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[11]) and $guarantor_idcard[11]=='0') ? "658" : "660").'px; left:578px; ">'.((isset($guarantor_idcard[11])) ? $guarantor_idcard[11] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[12]) and $guarantor_idcard[12]=='0') ? "658" : "660").'px; left:599px; ">'.((isset($guarantor_idcard[12])) ? $guarantor_idcard[12] : "").'</p>

	<p style="top:692px; left:140px; ">'.$issued_by.'</p>
	<p style="top:692px; left:300px; ">'.$ministry.'</p>
	<p style="top:692px; left:465px; ">'.$guarantor_datecard_issue.'</p>
	<p style="top:692px; left:620px; ">'.$guarantor_datecard_expiry.'</p>
';
if($mess_addr=="Y") {
	$point .= '
		<p style="top:402px; left:79px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>
		<p style="top:269px; left:160px; width: 100%;">'.$company_address.'</p>
		<p style="top:300px; left:355px; width: 100%;">'.$company_zipcode.'</p>
		<p style="top:300px; left:480px; width: 100%;">'.$company_tel.'</p>
		';
} else {
	$point .= '
		<p style="top:369px; left:79px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>
		<p style="top:400px; left:150px; width: 100%;">'.$addressed.'</p>
		<p style="top:432px; left:400px; width: 100%;">'.$zipcode.'</p>
		<p style="top:432px; left:530px; width: 100%;">'.$tel.'</p>
		';
}

if($was_agt == 'Y') {
	$point .= '
		<p style="top:762px; left:182px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>
		<p style="top:758px; left:265px;">'.$was_agtno.'</p>
	';
} else {
	$point .= '
		<p style="top:762px; left:86px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>
	';
}
//echo $point;
//$point = '';

$tplId = $mpdf->ImportPage($pagecount);
$mpdf->UseTemplate($tplId);
$mpdf->WriteHTML($point);


/*
$tplId = $mpdf->ImportPage($pagecount);
$mpdf->UseTemplate($tplId);
$mpdf->WriteHTML($point);
$mpdf->Output('TTTTT.pdf','I');
*/

$topic = array(
	'1'=>'สำเนาใบอนุญาตนายหน้านิติบุคคล',
	'2'=>'หนังสือรับรองบริษัท',
	'3'=>'ใบทะเบียนภาษีมูลค่าเพิ่ม (ภ.พ.20)',
	'4'=>'รูปถ่ายขนาด',
	'5'=>'สำเนาบัตรประจำตัวประชาชน',
	'6'=>'สำเนาทะเบียนบ้าน',
	'7'=>'รูปถ่ายสำนักงานนายหน้านิติบุคคล',
	'8'=>'ใบอนุญาตจัดตั้งสถานตรวจสภาพเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)',
	'9'=>'สำเนาหน้าสมุดบัญชีธนาคาร',
	'10'=>'หนังสือบริคณห์สนธิ',
	'11'=>'ใบสำคัญแสดงการจดทะเบียนบริษัท',
	'12'=>'สำเนาบัตรประชาชน 1 ฉบับ (พร้อมรับรองสำเนา)',
	'13'=>'สำเนาทะเบียนบ้าน 1 ฉบับ (คุณสมบัติเป็นเจ้าบ้านพร้อมรับรองสำเนา)',
	'14'=>'หนังสือรังรองเงินเดือน (ตัวจริง) 1 ฉบับ (กรณีใช้บุคคลค้ำประกันเป็นพนักงานเอกชน/รัฐวิสาหกิจ)',
	'15'=>'หนังสือรับรองบริษัท อายุไม่เกิน 3 เดือน 1 ชุด (กรณีจดทะเบียนเป็นบริษัทพร้อมประทับตรารับรองสำเนา)',
	'16'=>'ใบอนุญาาตจัดตั้งสถานตรวจสภาพรถเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)'
	);

/*
for($a=1; $a<=16; $a++){
	$attached = 'attached'.$a;
	if($regis[$attached]=='') continue;
	$aa[] = array($a =>$regis[$attached]);

	if( strpos($regis[$attached], ".pdf" )) {
		$mpdf->AddPage();

		$inputPath =FCPATH.'uploads/agt_regis/'.$regis[$attached];
		$pagecount = $mpdf->SetSourceFile($inputPath);
		for ($i=1; $i<=$pagecount; $i++) {
			$import_page = $mpdf->ImportPage($i);
			$mpdf->UseTemplate($import_page);

			if ($i < $pagecount)
				$mpdf->AddPage();
		}

	} else {
		$mpdf->AddPage();
		$inputPath =FCPATH.'uploads/agt_regis/'.$regis[$attached];
		$point = '
		<style>
		table { border-collapse: collapse; margin-top: 0; text-align: center; }
		td { padding: 0.5em; }
		h1 { margin-bottom: 0; }
		</style>
		<table>
			<tr>
				<td>'.$topic[$a].'</td>
			</tr>
			<tr>
				<td><img style="vertical-align: top" src="'.$inputPath.'"/></td>
			</tr>
		</table>
		';
		$mpdf->WriteHTML($point);
	}
	//$mpdf->WriteHTML($point);
}
//echo FCPATH.'uploads/agt_regis';
*/


unset($point);
$mpdf->Output('rptlegpn.pdf','I');

ob_end_flush();
exit;

?>