<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once APPPATH . 'libraries/TCPDF/tcpdf.php';

$pdf = new TCPDF('P', PDF_UNIT, 'Letter', true, 'UTF-8', false);

$pdf->SetFont('thsarabun', '', 12);
$pdf->SetCreator("");
$pdf->SetAuthor("");
$pdf->SetTitle("หนังสือรับรองการหักภาษี ณ ที่จ่าย");
$pdf->SetSubject("หนังสือรับรองการหักภาษี ณ ที่จ่าย");
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin(0);
$pdf->SetTopMargin(0);
$pdf->SetFooterMargin(0);
$pdf->SetAutoPageBreak('on', 5);

// Add a page

if (!empty($paytaxno_report)) {
   
    // print_r($paytaxno_report);
    foreach ($paytaxno_report as $row) {
        $p_key = $row['p_key'];
        $gettitle = $row['gettitle'];
        $getname = $row['getname'];
        $getsurname = $row['getsurname'];
        $taxno = $row['taxno'];
        $gettaxno = $row['gettaxno'];
        $getaddr = $row['getaddr'];
        $paytitle = $row['paytitle'];
        $payname = $row['payname'];
        $paysurname = $row['paysurname'];
        $paytaxno = $row['paytaxno'];
        $payaddr = $row['payaddr'];
        $docdate = datethai($row['docdate']);
        $totalpay = decimalPart($row['totalpay']);
        $totaltax = decimalPart($row['totaltax']);
        $totalstr = $row['totalstr'];
        $servdate = datethai($row['servdate']);
        $servpay = decimalPart($row['servpay']);
        $servtax = decimalPart($row['servtax']);
        $rentdate = datethai($row['rentdate']);
        $rentpay = decimalPart($row['rentpay']);
        $renttax = decimalPart($row['renttax']);
        $etc1str = $row['etc1str'];
        $etc1date = datethai($row['etc1date']);
        $etc1pay = decimalPart($row['etc1pay']);
        $etc1tax = decimalPart($row['etc1tax']);
        $type3or53 = $row['type3or53'];
        // $text = settext($row['servpay'],$row['rentpay'],$row['etc1str']);

    }

    if($row['totaltax'] != '0.00' ){
        $pdf->AddPage('P', PDF_UNIT, 'Letter');
        $pdf->SetFillColor(255, 255, 255);

    $gettaxstrlen = strlen($gettaxno);
    $paytaxstrlen = strlen($paytaxno);

    $gettax = array(); // สร้าง array เพื่อเก็บตัวแปร

    for ($i = 0; $i < strlen($gettaxno); $i++) {
        $gettax[] = substr($gettaxno, $i, 1);
    }

    // กำหนดตัวแปร $a จาก array
    $a1 = array_shift($gettax);
    $b1 = array_shift($gettax);
    $c1 = array_shift($gettax);
    $d1 = array_shift($gettax);
    $e1 = array_shift($gettax);
    $f1 = array_shift($gettax);
    $g1 = array_shift($gettax);
    $h1 = array_shift($gettax);
    $i1 = array_shift($gettax);
    $j1 = array_shift($gettax);
    $k1 = array_shift($gettax);
    $l1 = array_shift($gettax);
    $m1 = array_shift($gettax);

    $paytax = array(); // สร้าง array เพื่อเก็บตัวแปร

    for ($i = 0; $i < strlen($paytaxno); $i++) {
        $paytax[] = substr($paytaxno, $i, 1);
    }

    // กำหนดตัวแปร $a จาก array
    $a2 = array_shift($paytax);
    $b2 = array_shift($paytax);
    $c2 = array_shift($paytax);
    $d2 = array_shift($paytax);
    $e2 = array_shift($paytax);
    $f2 = array_shift($paytax);
    $g2 = array_shift($paytax);
    $h2 = array_shift($paytax);
    $i2 = array_shift($paytax);
    $j2 = array_shift($paytax);
    $k2 = array_shift($paytax);
    $l2 = array_shift($paytax);
    $m2 = array_shift($paytax);

    $imageFile = 'assets/img/stamp_upp.png';
    $x = 169;
    $y = 240;
    $width = 30;
    $height = 0;

    $pdf->Image($imageFile, $x, $y, $width, $height, '', '', '', false, 300, '', false, false, 0, false, false, false);

    $imageFile = 'assets/img/L1.png';
    $x = 113;
    $y = 243;
    $width = 22;
    $height = 0;

    $pdf->Image($imageFile, $x, $y, $width, $height, '', '', '', false, 300, '', false, false, 0, false, false, false);

    $pdf->SetFillColor(232, 232, 232); // สีเทา (RGB 128, 128, 128)

    $x = 184; // พิกัด x
    $y = 255; // พิกัด y
    $radius = 8; // รัศมี

    // วาดวงกลม
    $pdf->Circle($x, $y, $radius, array('width' => 0.2, 'color' => array(0, 0, 0)));

    $pdf->Cell(190, 10, "ฉบับที่ 1 (สำหรับผู้ถูกหักภาษี ณ ที่จ่าย ใช้แนบพร้อมกับแบบแสดงรายการภาษี)", 0, 1, 'L');
    $pdf->Cell(30, 5, "เล่มที่ ", 0, '', 'L');
    $pdf->SetFont('thsarabun', 'B', 14);
    $pdf->Cell(130, 5, "หนังสือรับรองการหักภาษี ณ ที่จ่าย ตามมาตรา 50 ทวิ แห่งประมวลรัษฏากร", 0, '', 'C');
    $pdf->SetFont('thsarabun', '', 12);

    $pdf->Cell(30, 7, "เลขที่  $taxno", 0, 1, 'R');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(95, 7, "ผู้มีหน้าที่หักภาษี ณ ที่จ่าย :-", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(46, 7, "เลขประจำตัวผู้เสียภาษีอากร (13 หลัก)", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 15);
    if ($gettaxstrlen <= 10) {
        $pdf->Cell(48, 7, "$a1 - $b1 $c1 $d1 $e1 - $f1 $g1 $h1 $i1 $j1 $k1 $l1 $m1", 0, 1, 'L');
    } else {
        $pdf->Cell(48, 7, "$a1 - $b1 $c1 $d1 $e1 - $f1 $g1 $h1 $i1 $j1 - $k1 $l1 - $m1", 0, 1, 'L');
    }

    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(5, 5, "ชื่อ", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(50, 5, "$gettitle $getname $getsurname", 0, '', 'L');
    $pdf->Cell(135, 5, "เลขประจำตัวผู้เสียภาษีอากร", 0, 1, 'C');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(7, 5, "ที่อยู่", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(135, 5, "$getaddr", 0, 1, 'L');

    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(95, 7, "กระทำการแทนโดย", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(46, 7, "เลขประจำตัวผู้เสียภาษีอากร (13 หลัก)", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 15);
    $pdf->Cell(48, 7, "", 0, 1, 'L');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(5, 5, "ชื่อ", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(50, 5, "", 0, '', 'L');
    $pdf->Cell(135, 5, "เลขประจำตัวผู้เสียภาษีอากร", 0, 1, 'C');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(7, 5, "ที่อยู่", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(135, 5, "", 0, 1, 'L');

    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(95, 7, "ผู้ถูกหักภาษี ณ ที่จ่าย :-", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(46, 7, "เลขประจำตัวผู้เสียภาษีอากร (13 หลัก)", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 15);
    if ($paytaxstrlen <= 10) {
        $pdf->Cell(48, 7, "$a2 - $b2 $c2 $d2 $e2 - $f2 $g2 $h2 $i2 $j2  $k2 $l2 $m2", 0, 1, 'L');
    } else {
        $pdf->Cell(48, 7, "$a2 - $b2 $c2 $d2 $e2 - $f2 $g2 $h2 $i2 $j2 - $k2 $l2 - $m2", 0, 1, 'L');
    }
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(5, 5, "ชื่อ", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(50, 5, "$paytitle $payname $paysurname", 0, '', 'L');
    $pdf->Cell(135, 5, "เลขประจำตัวผู้เสียภาษีอากร", 0, 1, 'C');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(7, 5, "ที่อยู่", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(135, 5, "$payaddr", 0, 1, 'L');

    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(5, 6, "ลำดับที่", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(30, 6, "ใบแบบ", 0, '', 'R');
    $pdf->Cell(30, 6, "(    ) ภ.ง.ด 1 ก", 0, '', 'R');
    $pdf->Cell(35, 6, "(    ) ภ.ง.ด 1 ก (พิเศษ)", 0, '', 'R');
    $pdf->Cell(25, 6, "(    ) ภ.ง.ด 2 ", 0, '', 'R');
    $pdf->Cell(30, 6, "(    ) ภ.ง.ด 2 ก", 0, '1', 'R');

    $pdf->Cell(5, 6, "", 0, '', 'L');
    $pdf->Cell(28.5, 6, "", 0, '', 'R');
    $pdf->Cell(30, 6, "(    ) ภ.ง.ด 3 ", 0, '', 'R');
    $pdf->Cell(28, 6, "(    ) ภ.ง.ด 3 ก", 0, '', 'R');
    $pdf->Cell(35, 6, "(    ) ภ.ง.ด 53 ", 0, '1', 'R');

    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(110, 6, "ประเภทเงินได้พึงประเมินที่จ่าย", 0, '', 'C');
    $pdf->Cell(26, 6, "วัน เดือน", 0, '', 'C');
    $pdf->Cell(26, 6, "จำนวนเงินที่จ่าย", 0, '', 'C');
    $pdf->Cell(26, 6, "ภาษีที่หัก", 0, '1', 'C');
    $pdf->Cell(110, 4, "", 0, '', 'C');
    $pdf->Cell(26, 4, "หรือปีภาษี ที่จ่าย", 0, '', 'C');
    $pdf->Cell(26, 4, "", 0, '', 'C');
    $pdf->Cell(26, 4, "และนำส่งไว้", 0, '1', 'C');

    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(100, 5, "1. เงินเดือน ค่าจ้าง เบี้ยเลี้ยง โบนัส ฯลฯ ตามมาตรา 40(1) ", 0, '1', 'L');

    $pdf->Cell(110, 5, "2. ค่าธรรมเนียม ค่านายหน้า ฯลฯ ตามมาตรา 40 (2) ", 0, '1', 'L');

    $pdf->Cell(100, 5, "3. ค่าแห่งลิขสิทธิ ฯลฯ ตามมาตรา 40 (3) ", 0, '1', 'L');

    $pdf->Cell(100, 5, "4. (ก) ค่าดอกเบี้ย ฯลฯ ตามตรา 40 (4) ก ", 0, '1', 'L');

    $pdf->Cell(2, 5, " ", 0, '0', 'L');
    $pdf->Cell(98, 5, " (ข) เงินปันผล เงินส่วนแบ่งกำไร ฯลฯ ตามมาตรา 40 (4) (ข) ", 0, '1', 'L');

    $pdf->Cell(7, 5, " ", 0, '0', 'L');
    $pdf->Cell(93, 5, "(1)  กรณีผู้ได้รับเงินปันผลได้รับเครดิตภาษี โดยจ่ายจาก", 0, '1', 'L');

    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "กำไรสุทธิของกิจการที่ต้องเสียภาษีเงินได้นิติบุคคลในอัตราดังนี้", 0, '1', 'L');
    $pdf->SetFont('thsarabun', '', 11);
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(1.1) อัตราร้อยละ 30 ของกำไรสุทธิ", 0, '1', 'L');
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(1.2) อัตราร้อยละ 25 ของกำไรสุทธิ", 0, '1', 'L');
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(1.3) อัตราร้อยละ 20 ของกำไรสุทธิ", 0, '1', 'L');
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(1.4) อัตราอื่นๆ(ระบุ)........................................ของกำไรสุทธิ", 0, '1', 'L');
    $pdf->SetFont('thsarabun', '', 12);

    $pdf->Cell(7, 5, " ", 0, '0', 'L');
    $pdf->Cell(93, 5, "(2)  กรณีผู้ได้รับเงินปันผลไม่ได้รับเครดิตภาษี เนื่องจากจ่ายจาก", 0, '1', 'L');

    $pdf->SetFont('thsarabun', '', 11);
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(2.1) กำไรสุทธิของกิจการที่ได้รับยกเว้นภาษีเงินได้นิติบุคคล", 0, '1', 'L');
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(2.2) เงินปันผลหรือเงินส่วนแบ่งของกำไรที่ได้รับยกเว้นไม่ต้องนำมารวม", 0, '1', 'L');
    $pdf->Cell(18, 5, " ", 0, '0', 'L');
    $pdf->Cell(82, 5, "คำนวณเป็นรายได้เพื่อเสียภาษีเงินได้นิติบุคคล", 0, '1', 'L');
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(2.3) กำไรสุทธิส่วนที่ได้หักผลขาดทุนสุทธิยกมาไม่เกิน 5 ปี ก่อนรอบระยะเวลาบัญชีปีปัจจุบัน", 0, '1', 'L');
    $pdf->Cell(12, 5, " ", 0, '0', 'L');
    $pdf->Cell(88, 5, "(2.4) กำไรที่รับรู้ทางบัญชีโดยวิธีส่วนได้ส่วนเสีย (equity method)", 0, '1', 'L');
    $pdf->SetFont('thsarabun', '', 12);

    $pdf->Cell(100, 5, "5. การจ่ายเงินได้ที่ต้องหักภาษี ณ ที่จ่าย ตามคำสั่งกรมสรรพากร ที่ออกตาม", 0, '1', 'L');
    $pdf->Cell(2, 5, " ", 0, '0', 'L');
    $pdf->WriteHTMLCell(110, 5, '', '', '<table><tr align="Left"><td>มาตรา 3 เตรส (ระบุ)  <b>' . $etc1str . '</b></td></tr></table>', 0, 0);
    if ($row['servpay'] != 0 && $row['rentpay'] != 0 && $row['etc1pay'] != 0) {
        $pdf->Cell(26, 5, "$servdate", 0, '0', 'C');
        $pdf->Cell(18, 5, $servpay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $servpay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $servtax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $servtax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "(เช่น รางวัล ส่วนลดหรือประโยชน์ใดๆ เนื่องจากการส่งเสริมการขาย รางวัล", 0, '0', 'L');
        $pdf->Cell(26, 5, "$rentdate", 0, '0', 'C');
        $pdf->Cell(18, 5, $rentpay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $rentpay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $renttax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $renttax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "ในการประกวด การแข่งขัน การชิงโชค ค่าแสดงของนักแสดงสาธารณะ ค่าจ้างทำของ", 0, '0', 'L');
        $pdf->Cell(26, 5, "$etc1date", 0, '0', 'C');
        $pdf->Cell(18, 5, $etc1pay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1pay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $etc1tax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1tax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
    } else if ($row['servpay'] != 0 && $row['rentpay'] == 0 && $row['etc1pay'] != 0) {
        $pdf->Cell(26, 5, "$servdate", 0, '0', 'C');
        $pdf->Cell(18, 5, $servpay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $servpay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $servtax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $servtax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "(เช่น รางวัล ส่วนลดหรือประโยชน์ใดๆ เนื่องจากการส่งเสริมการขาย รางวัล", 0, '0', 'L');
        $pdf->Cell(26, 5, "$etc1date", 0, '0', 'C');
        $pdf->Cell(18, 5, $etc1pay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1pay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $etc1tax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1tax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "ในการประกวด การแข่งขัน การชิงโชค ค่าแสดงของนักแสดงสาธารณะ ค่าจ้างทำของ", 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');

    } else if ($row['rentpay'] != 0 && $row['servpay'] == 0 && $row['etc1pay'] != 0) {
        $pdf->Cell(26, 5, "$rentdate", 0, '0', 'C');
        $pdf->Cell(18, 5, $rentpay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $rentpay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $renttax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $renttax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "(เช่น รางวัล ส่วนลดหรือประโยชน์ใดๆ เนื่องจากการส่งเสริมการขาย รางวัล", 0, '0', 'L');
        $pdf->Cell(26, 5, "$etc1date", 0, '0', 'C');
        $pdf->Cell(18, 5, $etc1pay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1pay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $etc1tax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1tax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "ในการประกวด การแข่งขัน การชิงโชค ค่าแสดงของนักแสดงสาธารณะ ค่าจ้างทำของ", 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
    } else if ($row['rentpay'] == 0 && $row['servpay'] == 0 && $row['etc1pay'] == 0) {
        $pdf->Cell(26, 5, "$docdate", 0, '0', 'C');
        $pdf->Cell(18, 5, $totalpay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $totalpay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $totaltax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $totaltax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "(เช่น รางวัล ส่วนลดหรือประโยชน์ใดๆ เนื่องจากการส่งเสริมการขาย รางวัล", 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "ในการประกวด การแข่งขัน การชิงโชค ค่าแสดงของนักแสดงสาธารณะ ค่าจ้างทำของ", 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
    }else {
        $pdf->Cell(26, 5, "$etc1date", 0, '0', 'C');
        $pdf->Cell(18, 5, $etc1pay['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1pay['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $etc1tax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $etc1tax['DecimalPart'], 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "(เช่น รางวัล ส่วนลดหรือประโยชน์ใดๆ เนื่องจากการส่งเสริมการขาย รางวัล", 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
        $pdf->Cell(110, 5, "ในการประกวด การแข่งขัน การชิงโชค ค่าแสดงของนักแสดงสาธารณะ ค่าจ้างทำของ", 0, '1', 'L');
        $pdf->Cell(2, 5, "", 0, '0', 'L');
    }
    $pdf->Cell(100, 5, "ค่าโฆษณา ค่าเช่า ค่าขนส่ง ค่าบริการ ค่าเบี้ยประกันวินาศภัย ฯลฯ)", 0, '1', 'L');

    $pdf->Cell(100, 6, "", 0, '1', 'L');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(130, 6, "รวมเงินที่จ่ายและภาษีที่หักนำส่ง", 0, '0', 'R');
    $pdf->Cell(26.5, 6, $totalpay['integerPart'], 0, '0', 'R');
    $pdf->Cell(6, 6, $totalpay['DecimalPart'], 0, '0', 'L');
    $pdf->Cell(20.5, 6, $totaltax['integerPart'], 0, '0', 'R');
    $pdf->Cell(8, 6, $totaltax['DecimalPart'], 0, '1', 'L');
    $pdf->SetFont('thsarabun', 'B', 11);
    $pdf->Cell(50, 6, "รวมเงินภาษีที่หักนำส่ง (ตัวอักษร)", 0, '0', 'L');
    $pdf->SetFont('thsarabun', 'B', 14);
    $pdf->Cell(120, 6, "$totalstr", 0, '1', 'L', 1);
    

    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(70, 8, "เลขที่นายจ้าง", 0, '0', 'L');
    $pdf->Cell(60, 8, "เลขที่บัตรประกันสังคมของผู้ถูกหักภาษี ณ ที่จ่าย", 0, '0', 'L');
    $pdf->Cell(50, 8, "", 0, '0', 'C');
    $pdf->Cell(10, 8, "บาท", 0, '1', 'L');

    $pdf->Cell(70, 6, "เงินสมบทจ่ายเข้ากองทุนประกันสังคม", 0, '0', 'L');
    $pdf->Cell(60, 6, "จำนวนเงิน", 0, '0', 'C');
    $pdf->Cell(50, 6, "", 0, '0', 'C');
    $pdf->Cell(10, 6, "บาท", 0, '1', 'L');

    $pdf->Cell(70, 6, "เงินสะสมจ่ายเข้ากองทุนสำรองเลี้ยงชีพ ใบอนุญาตเลขที่", 0, '0', 'L');
    $pdf->Cell(60, 6, "จำนวนเงิน", 0, '0', 'C');
    $pdf->Cell(50, 6, "", 0, '0', 'C');
    $pdf->Cell(10, 6, "บาท", 0, '1', 'L');

    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(80, 6, "ผู้จ่ายเงิน", 0, '0', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(110, 6, "ขอรับรองว่า ข้อความและตัวเลขข้างต้นถูกต้องตรงกับความจริงทุกประการ", 0, '1', 'L');

    $pdf->Cell(10, 6, "", 0, '0', 'L');
    $pdf->Cell(30, 6, "(  ) หักภาษี ณ ที่จ่าย", 0, '0', 'L');
    $pdf->Cell(40, 6, "(  ) ออกภาษีให้ตลอดไป", 0, '0', 'L');
    $pdf->Cell(5, 6, "", 0, '0', 'L');
    $pdf->Cell(100, 6, "ลงชื่อ ..................................................... ผู้มีหน้าที่หักภาษี ณ ที่จ่าย", 0, '1', 'L');

    $pdf->Cell(10, 6, "", 0, '0', 'L');
    $pdf->Cell(30, 6, "(  ) ออกภาษีให้ครั้งเดียว", 0, '0', 'L');
    $pdf->Cell(40, 6, "(  ) อื่นๆ (ให้ระบุ) .................", 0, '0', 'L');
    // $pdf->Cell(5, 6, "", 0, '0', 'L');
    $pdf->Cell(60, 5, " ( นางสาว สุจิตรา สิงห์โต )", 0, '1', 'C');
    $pdf->Cell(145, 5, "$docdate  วันเดือนปี ที่ออกหนังสือรับรอง", 0, '1', 'R');

    $pdf->Cell(190, 1, "", 0, '1', 'L');
    $pdf->SetFont('thsarabun', '', 10);
    $pdf->Cell(190, 5, "หมายเหตุ ให้สามารถอ้างอิงหรือสอบยันกันได้ระหว่างแบบแสดงรายการนำส่วภาษีกับหนังสือรับรองการหัก ภาษี ณ ที่จ่าย", 0, '1', 'L');
    $pdf->Cell(190, 5, "คำเตือน  ผู้มีหน้าที่ออกหนังสือรับรองการหักภาษี ณ ที่จ่าย ฝ่าฝืนไม่ปฏิบัติตามมาตรา 50 ทวิ แห่งประมวณรัษฏากร ต้องรับโทษทางอาญามาตรา 35 แห่งประมวณรัษฏากร", 0, '1', 'L');
    $pdf->Cell(190, 4, "ฉบับที่ 1 สำหรับผู้ถูกหัก ณ ที่จ่ายแนบพร้อมแบบแสดงรายงานภาษี   ฉบับที่ 2 สำหรับผู้ถูกหักภาษี ณ ที่จ่าย เก็บไว้เป็นหลักฐาน", 0, '1', 'L');

    $x1 = 9;
    $y1 = 17;
    $x2 = 201;
    $y2 = 17;

// เส้น 1: จุดเริ่มต้น (x1, y1) ไปยัง จุดสิ้นสุด (x2, y2)
    $pdf->Line($x1, $y1, $x2, $y2);

    $x3 = 201;
    $y3 = 269;
    $pdf->Line($x2, $y2, $x3, $y3);

// เส้น 3: จุดเริ่มต้นเท่ากับจุดสิ้นสุดของเส้น 2 (x3, y3) ไปยัง จุดสิ้นสุดของเส้น 3 (x4, y4)
    $x4 = 9;
    $y4 = 269;
    $pdf->Line($x3, $y3, $x4, $y4);

// // เส้น 4: จุดเริ่มต้นเท่ากับจุดสิ้นสุดของเส้น 3 (x4, y4) ไปยัง จุดสิ้นสุดของเส้น 4 (x1, y1)
    $pdf->Line($x4, $y4, $x1, $y1);

// ////////////////////////////////////////////////////////////////////

/// ขีดแนวนอนทั้งกระดาษ

    $x1 = 9;
    $y1 = 35;
    $x2 = 201;
    $y2 = 35;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 9;
    $y1 = 53;
    $x2 = 201;
    $y2 = 53;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 9;
    $y1 = 70;
    $x2 = 201;
    $y2 = 70;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 9;
    $y1 = 82;
    $x2 = 201;
    $y2 = 82;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 9;
    $y1 = 93;
    $x2 = 201;
    $y2 = 93;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 9;
    $y1 = 213;
    $x2 = 201;
    $y2 = 213;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 146;
    $y1 = 219;
    $x2 = 201;
    $y2 = 219;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 9;
    $y1 = 226;
    $x2 = 201;
    $y2 = 226;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 9;
    $y1 = 245;
    $x2 = 201;
    $y2 = 245;

    $pdf->Line($x1, $y1, $x2, $y2);

///// ขีดตรงในกรอบ ประเภทเงินได้พึงประเมิน

    $x1 = 120;
    $y1 = 82;
    $x2 = 120;
    $y2 = 213;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 146;
    $y1 = 82;
    $x2 = 146;
    $y2 = 219;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 173;
    $y1 = 82;
    $x2 = 173;
    $y2 = 219;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 166.5;
    $y1 = 93;
    $x2 = 166.5;
    $y2 = 219;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 192.5;
    $y1 = 93;
    $x2 = 192.5;
    $y2 = 219;

    $pdf->Line($x1, $y1, $x2, $y2);

    $x1 = 88;
    $y1 = 245;
    $x2 = 88;
    $y2 = 269;

    $pdf->Line($x1, $y1, $x2, $y2);

    $size = 2; // กำหนดขนาดติ๊กถูกในช่อง

    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Line(21, 253, 21 + $size, 253 + $size);
    $pdf->Line(21 + $size, 253 + $size, 21 + $size * 2, 253 - $size);
    $pdf->SetDrawColor(false);

    if ($type3or53 == 'ภ.ง.ด 53') {
        //ภ.ง.ด 53
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line(119, 78, 119 + $size, 78 + $size);
        $pdf->Line(119 + $size, 78 + $size, 119 + $size * 2, 78 - $size);
        $pdf->SetDrawColor(false);
    } else if($type3or53 == 'ภ.ง.ด 3') {
        //ภ.ง.ด 3
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line(58, 78, 58 + $size, 78 + $size);
        $pdf->Line(58 + $size, 78 + $size, 58 + $size * 2, 78 - $size);
        $pdf->SetDrawColor(false);
    }else{

    }
}
}
if (!empty($getdetailpaytaxno_report)) {
    $pdf->SetTopMargin(5);
    // $pdf->deletePage(1);
    $pdf->AddPage('L');
    // $pdf->SetMargins(70, 20, 50);
    // $pdf->SetHeaderMargin(0);
    // $pdf->SetTopMargin(15);
    // $pdf->SetFooterMargin(15);
    $html = '<table border="1">
        <thead>
        <tr align="center">
        <th  width="50px;">ลำดับ</th>
        <th> วันที่</th>
        <th >เลขสำรวจ</th>
        <th>ภาษีซื้อ</th>
        <th>จำนวนเงิน</th>
        <th>หัก ณ ที่จ่าย</th>
        <th>ยอดจ่าย</th>
        </tr>
        </thead>';
    $num = 1;
    $sumvat = 0;
    $sumtaxpay = 0;
    $sumdabitall = 0;
    $sumchqtotal = 0;
    foreach ($getdetailpaytaxno_report as $row) {
        $paytaxno = $row['paytaxno'];
        $title = $row['title'];
        $name = $row['name'];
        $surname = $row['surname'];
        $bankreg = $row['bankref'];
        $paydate = datethai($row['paydate']);
        $sumvat += $row['vat'];
        $sumtaxpay += $row['taxpay'];
        $sumdabitall += $row['dabitall'];
        $sumchqtotal += $row['chqtotal'];

        $html .= '<tr nobr="true" align="center">
        <td width="50px;">' . $num . '</td>
        <td>'. $paydate .'</td>
        <td>' . $row['brnclmno'] . '</td>
        <td>' . number_format($row['vat'], 2) . '</td>
        <td>' . number_format($row['dabitall'], 2) . '</td>
        <td>' . number_format($row['taxpay'], 2) . '</td>
        <td>' . number_format($row['chqtotal'], 2) . '</td>
          </tr>';
        $num++;
    }

    $html .= '<tr nobr="true" align="center">
        <td  width="50px;"></td>
        <td></td>
        <td><b>รวมทั้งสิ้น</b></td>
        <td><b>' . number_format($sumvat, 2) . '</b></td>
        <td><b>' . number_format($sumdabitall, 2) . '</b></td>
        <td><b>' . number_format($sumtaxpay, 2) . '</b></td>
        <td><b>' . number_format($sumchqtotal, 2) . '</b></td>
        </tr>';

    // ปิดตารางหลังจากลูป
    $html .= '</table>';

    $datenow = date("d/m/Y H:i:s");
    $pdf->Cell(269, 5, "", 0, 1, 'L');
    $pdf->Cell(65, 5, "$datenow", 0, '', 'L');
    $pdf->SetFont('thsarabun', 'B', 14);
    $pdf->Cell(130, 5, "บริษัท สหมงคลประกันภัย จำกัด (มหาชน)", 0, '1', 'C');
    $pdf->Cell(65, 5, "", 0, '', 'L');
    $pdf->SetFont('thsarabun', 'B', 13);
    $pdf->Cell(130, 5, "รายละเอียดการจ่าย", 0, '1', 'C');
    $pdf->SetFont('thsarabun', '', 12);

    $pdf->Cell(65, 6, "$bankreg", 0, '0', 'L');
    $pdf->Cell(130, 6, "สั่งจ่าย $title $name $surname ณ วันที่ $paydate", 0, '1', 'C');

    // ใช้ WriteHTML แทน WriteHTMLCell
    $pdf->WriteHTML($html);
} else {
    // header("Location: " . base_url('tax'));
    // exit;
    echo "<script type='text/javascript'>alert('ไม่พบข้อมูลที่ต้องการพิมพ์'); window.close()</script>";
}

$pdf->Output($paytaxno . '.pdf', 'I');

function decimalPart($number)
{

    $integerPart = floor($number); // หาจำนวนเต็ม
    $integerPart = number_format($integerPart);
    $decimalPart = fmod($number, 1); // หาทศนิยม
    $formattedDecimalPart = number_format($decimalPart, 2, '.', ''); // แสดงเฉพาะสองตำแหน่งหลังจุดทศนิยม
    $DecimalPart = $formattedDecimalPart * 100;
    $formatted_number = str_pad($DecimalPart, 2, '0', STR_PAD_LEFT); // ใส่ 0 ข้างหน้าตัวเลขถ้าจำนวนหลักน้อยกว่า 2.
    return ['integerPart' => $integerPart, 'DecimalPart' => $formatted_number];

}

function datethai($date)
{
    $timestamp = strtotime($date);
    $thaiYear = date("Y", $timestamp) + 543;
    $thaiDate = date("d/m/{$thaiYear}", $timestamp);
    return $thaiDate;
}


