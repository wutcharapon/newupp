<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//ini_set('MAX_EXECUTION_TIME', '-1');
error_reporting(E_ALL);
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
$mpdf->SetTitle('แบบฟอร์มการสมัครตัวแทนประกันวินาศภัย ');

$pagecount = $mpdf->setSourceFile(APPPATH.'libraries/mpdf/template/brk.pdf');

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
	<p style="top:'.((isset($agtno[0]) and $agtno[0]=='0') ? "267" : "269").'px; left:197px;">'.((isset($agtno[0])) ? $agtno[0] : "").'</p>
	<p style="top:'.((isset($agtno[1]) and $agtno[1]=='0') ? "267" : "269").'px; left:219px;">'.((isset($agtno[1])) ? $agtno[1] : "").'</p>
	<p style="top:'.((isset($agtno[2]) and $agtno[2]=='0') ? "267" : "269").'px; left:240px;">'.((isset($agtno[2])) ? $agtno[2] : "").'</p>
	<p style="top:'.((isset($agtno[3]) and $agtno[3]=='0') ? "267" : "269").'px; left:261px;">'.((isset($agtno[3])) ? $agtno[3] : "").'</p>
	<p style="top:'.((isset($agtno[4]) and $agtno[4]=='0') ? "267" : "269").'px; left:282px;">'.((isset($agtno[4])) ? $agtno[4] : "").'</p>
	<p style="top:'.((isset($agtno[5]) and $agtno[5]=='0') ? "267" : "269").'px; left:303px;">'.((isset($agtno[5])) ? $agtno[5] : "").'</p>
	<p style="top:'.((isset($agtno[6]) and $agtno[6]=='0') ? "267" : "269").'px; left:324px;">'.((isset($agtno[6])) ? $agtno[6] : "").'</p>
	<p style="top:'.((isset($agtno[7]) and $agtno[7]=='0') ? "267" : "269").'px; left:345px;">'.((isset($agtno[7])) ? $agtno[7] : "").'</p>
	<p style="top:'.((isset($agtno[8]) and $agtno[8]=='0') ? "267" : "269").'px; left:366px;">'.((isset($agtno[8])) ? $agtno[8] : "").'</p>
	<p style="top:'.((isset($agtno[9]) and $agtno[9]=='0') ? "267" : "269").'px; left:388px;">'.((isset($agtno[9])) ? $agtno[9] : "").'</p>

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
	<p style="top:170px; left:250px; width: 100%;">'.$fullname.'</p>
	<p style="top:'.((isset($agt_idcard[0]) and $agt_idcard[0]=='0') ? "203" : "205").'px; left:204px;">'.((isset($agt_idcard[0])) ? $agt_idcard[0] : "").'</p>
	<p style="top:'.((isset($agt_idcard[1]) and $agt_idcard[1]=='0') ? "203" : "205").'px; left:226px;">'.((isset($agt_idcard[1])) ? $agt_idcard[1] : "").'</p>
	<p style="top:'.((isset($agt_idcard[2]) and $agt_idcard[2]=='0') ? "203" : "205").'px; left:247px;">'.((isset($agt_idcard[2])) ? $agt_idcard[2] : "").'</p>
	<p style="top:'.((isset($agt_idcard[3]) and $agt_idcard[3]=='0') ? "203" : "205").'px; left:269px;">'.((isset($agt_idcard[3])) ? $agt_idcard[3] : "").'</p>
	<p style="top:'.((isset($agt_idcard[4]) and $agt_idcard[4]=='0') ? "203" : "205").'px; left:290px;">'.((isset($agt_idcard[4])) ? $agt_idcard[4] : "").'</p>
	<p style="top:'.((isset($agt_idcard[5]) and $agt_idcard[5]=='0') ? "203" : "205").'px; left:311px;">'.((isset($agt_idcard[5])) ? $agt_idcard[5] : "").'</p>
	<p style="top:'.((isset($agt_idcard[6]) and $agt_idcard[6]=='0') ? "203" : "205").'px; left:332px;">'.((isset($agt_idcard[6])) ? $agt_idcard[6] : "").'</p>
	<p style="top:'.((isset($agt_idcard[7]) and $agt_idcard[7]=='0') ? "203" : "205").'px; left:352px;">'.((isset($agt_idcard[7])) ? $agt_idcard[7] : "").'</p>
	<p style="top:'.((isset($agt_idcard[8]) and $agt_idcard[8]=='0') ? "203" : "205").'px; left:374px;">'.((isset($agt_idcard[8])) ? $agt_idcard[8] : "").'</p>
	<p style="top:'.((isset($agt_idcard[9]) and $agt_idcard[9]=='0') ? "203" : "205").'px; left:396px;">'.((isset($agt_idcard[9])) ? $agt_idcard[9] : "").'</p>
	<p style="top:'.((isset($agt_idcard[10]) and $agt_idcard[10]=='0') ? "203" : "205").'px; left:416px;">'.((isset($agt_idcard[10])) ? $agt_idcard[10] : "").'</p>
	<p style="top:'.((isset($agt_idcard[11]) and $agt_idcard[11]=='0') ? "203" : "205").'px; left:438px;">'.((isset($agt_idcard[11])) ? $agt_idcard[11] : "").'</p>
	<p style="top:'.((isset($agt_idcard[12]) and $agt_idcard[12]=='0') ? "203" : "205").'px; left:459px;">'.((isset($agt_idcard[12])) ? $agt_idcard[12] : "").'</p>

	<p style="top:235px; left:175px;">'.$date_issue.'</p>
	<p style="top:235px; left:340px;">'.$date_birth.'</p>

	<p style="top:267; left:197px; width: 100%;">'.$agtno.'</p>

	<p style="top:333px; left:160px; width: 100%;">'.$marital_name.'</p>
	<p style="top:333px; left:480px; width: 100%;">'.$marital_tel.'</p>

	<p style="top:367px; left:204px; width: 100%;">'.$addressed.'</p>

	<p style="top:400px; left:350px; width: 100%;">'.$zipcode.'</p>
	<p style="top:400px; left:480px; width: 100%;">'.$tel.'</p>

	<p style="top:432px; left:153px; width: 100%;">'.$email_address.'</p>
	<p style="top:432px; left:495px; width: 100%;">'.$id_line.'</p>

	<p style="top:465px; left:175px; width: 100%;">'.$guarantor.'</p>

	<p style="top:499px; left:178px; width: 100%;">'.$guarantor_address.'</p>

	<p style="top:530px; left:350px; width: 100%;">'.$guarantor_zipcode.'</p>
	<p style="top:530px; left:498px; width: 100%;">'.$guarantor_tel.'</p>

	<p style="top:563px; left:204px; width: 100%;">'.$guarantor_workphoe.'</p>
	<p style="top:563px; left:498px; width: 100%;">'.$guarantor_mobile.'</p>

	<p style="top:'.((isset($guarantor_idcard[0]) and $guarantor_idcard[0]=='0') ? "594" : "596").'px; left:344px; ">'.((isset($guarantor_idcard[0])) ? $guarantor_idcard[0] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[1]) and $guarantor_idcard[1]=='0') ? "594" : "596").'px; left:366px; ">'.((isset($guarantor_idcard[1])) ? $guarantor_idcard[1] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[2]) and $guarantor_idcard[2]=='0') ? "594" : "596").'px; left:388px; ">'.((isset($guarantor_idcard[2])) ? $guarantor_idcard[2] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[3]) and $guarantor_idcard[3]=='0') ? "594" : "596").'px; left:409px; ">'.((isset($guarantor_idcard[3])) ? $guarantor_idcard[3] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[4]) and $guarantor_idcard[4]=='0') ? "594" : "596").'px; left:429px; ">'.((isset($guarantor_idcard[4])) ? $guarantor_idcard[4] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[5]) and $guarantor_idcard[5]=='0') ? "594" : "596").'px; left:450px; ">'.((isset($guarantor_idcard[5])) ? $guarantor_idcard[5] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[6]) and $guarantor_idcard[6]=='0') ? "594" : "596").'px; left:471px; ">'.((isset($guarantor_idcard[6])) ? $guarantor_idcard[6] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[7]) and $guarantor_idcard[7]=='0') ? "594" : "596").'px; left:493px; ">'.((isset($guarantor_idcard[7])) ? $guarantor_idcard[7] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[8]) and $guarantor_idcard[8]=='0') ? "594" : "596").'px; left:514px; ">'.((isset($guarantor_idcard[8])) ? $guarantor_idcard[8] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[9]) and $guarantor_idcard[9]=='0') ? "594" : "596").'px; left:536px; ">'.((isset($guarantor_idcard[9])) ? $guarantor_idcard[9] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[10]) and $guarantor_idcard[10]=='0') ? "594" : "596").'px; left:556px; ">'.((isset($guarantor_idcard[10])) ? $guarantor_idcard[10] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[11]) and $guarantor_idcard[11]=='0') ? "594" : "596").'px; left:578px; ">'.((isset($guarantor_idcard[11])) ? $guarantor_idcard[11] : "").'</p>
	<p style="top:'.((isset($guarantor_idcard[12]) and $guarantor_idcard[12]=='0') ? "594" : "596").'px; left:599px; ">'.((isset($guarantor_idcard[12])) ? $guarantor_idcard[12] : "").'</p>

	<p style="top:628px; left:140px; ">'.$issued_by.'</p>
	<p style="top:628px; left:400px; ">'.$ministry.'</p>

	<p style="top:660px; left:175px; ">'.$guarantor_datecard_issue.'</p>
	<p style="top:660px; left:330px; ">'.$guarantor_datecard_expiry.'</p>
';

switch ($marital_status) {
	case 1:
		$point .= '<p style="top:304px; left:157px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>';
	break;
	case 2:
		$point .= '<p style="top:304px; left:216px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>';
	break;
	case 3:
		$point .= '<p style="top:304px; left:285px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>';
	break;
	case 4:
		$point .= '<p style="top:304px; left:350px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>';
	break;
	default:
		$point .= '';
}

if($was_agt == 'Y') {
	$point .= '
		<p style="top:760px; left:79px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>
		<p style="top:755px; left:175px;">'.$was_agtno.'</p>
	';
} else {
	$point .= '
		<p style="top:730px; left:79px; font-size:16px"><img src="'.FCPATH.'assets/img/ok.png" style="width: 6mm; height: 6.5mm; margin: 0;"></p>
	';
}

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
	'1'=>'รูปถ่ายขนาด',
	'2'=>'สำเนาบัตรประจำตัวประชาชน',
	'3'=>'สำเนาใบอนุญาตตัวแทนประกันวินาศภัย',
	'4'=>'สำเนาทะเบียนบ้าน 4 ฉบับ (พร้อมรับรองสำเนา)',
	'5'=>'รูปถ่ายสำนักงานตัวแทนประกันภัยวินาศภัย',
	'6'=>'ใบอนุญาตจัดตั้งสถานตรวจสภาพเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)',
	'7'=>'สำเนาหน้าสมุดบัญชีธนาคาร (Bookbank) 3 ฉบับ',
	'8'=>'สำเนาบัตรประชาชน 1 ฉบับ (พร้อมรับรองสำเนา)',
	'9'=>'สำเนาทะเบียนบ้าน 1 ฉบับ (คุณสมบัติเป็นเจ้าบ้านพร้อมรับรองสำเนา)',
	'10'=>'หนังสือรังรองเงินเดือน (ตัวจริง) 1 ฉบับ (กรณีใช้บุคคลค้ำประกันเป็นพนักงานเอกชน/รัฐวิสาหกิจ)',
	'11'=>'หนังสือรับรองบริษัท อายุไม่เกิน 3 เดือน 1 ชุด (กรณีจดทะเบียนเป็นบริษัทพร้อมประทับตรารับรองสำเนา)',
	'12'=>'ใบอนุญาาตจัดตั้งสถานตรวจสภาพรถเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)'
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
}
//echo FCPATH.'uploads/agt_regis';
*/
unset($point);
$mpdf->Output('rptbrk.pdf','I');

ob_end_flush();
exit;
?>