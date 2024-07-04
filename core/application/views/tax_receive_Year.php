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

if (!empty($gettaxreceive_report_year)) {
    $pdf->AddPage('P', PDF_UNIT, 'Letter');
    $pdf->SetFillColor(255, 255, 255);
    // print_r($paytaxno_report);
    
 
    foreach ($gettaxreceive_report_year as $row) {
        $docno = $row['TA_TAX_NO']; 
        $fullname = $row['TA_TAX_NM']; 
        $address = $row['TA_TAX_ADDR'];
        $taxid = $row['TA_TAX_ID'];
        $ddate = $row['dateformat'];
        $des = $row['TA_TAX_DESC'];
        $amt = decimalPart($row['TA_TAX_VALUE']);
        $tax = decimalPart($row['TA_TAX_AMT']);
        $thaiBath = thaiBath($row['TA_TAX_AMT']);
        $tax_type = $row['TA_TAX_TYPE'];
    }


    $taxidstrlen = strlen($taxid);

   

    $tax_receive = array(); // สร้าง array เพื่อเก็บตัวแปร

    for ($i = 0; $i < strlen($taxid); $i++) {
        $tax_receive[] = substr($taxid, $i, 1);
    }

    // กำหนดตัวแปร $a จาก array
    $a2 = array_shift($tax_receive);
    $b2 = array_shift($tax_receive);
    $c2 = array_shift($tax_receive);
    $d2 = array_shift($tax_receive);
    $e2 = array_shift($tax_receive);
    $f2 = array_shift($tax_receive);
    $g2 = array_shift($tax_receive);
    $h2 = array_shift($tax_receive);
    $i2 = array_shift($tax_receive);
    $j2 = array_shift($tax_receive);
    $k2 = array_shift($tax_receive);
    $l2 = array_shift($tax_receive);
    $m2 = array_shift($tax_receive);

    $imageFile = 'assets/img/stamp_upp.png';
    $x = 169;
    $y = 240;
    $width = 30;
    $height = 0;

    $pdf->Image($imageFile, $x, $y, $width, $height, '', '', '', false, 300, '', false, false, 0, false, false, false);

    $imageFile = 'assets/img/P_2.png';
    
    $x = 113;
    $y = 243;
    $width = 15;
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

    $pdf->Cell(30, 7, "เลขที่  $docno", 0, 1, 'R');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(95, 7, "ผู้มีหน้าที่หักภาษี ณ ที่จ่าย :-", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(46, 7, "เลขประจำตัวผู้เสียภาษีอากร (13 หลัก)", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 15);
    $pdf->Cell(48, 7, "0 - 1 0 7 5 - 5 5 0 0 0 - 3 3 - 3", 0, 1, 'L');
    // if ($gettaxstrlen <= 10) {
    //     $pdf->Cell(48, 7, "$a1 - $b1 $c1 $d1 $e1 - $f1 $g1 $h1 $i1 $j1 $k1 $l1 $m1", 0, 1, 'L');
    // } else {
    //     $pdf->Cell(48, 7, "$a1 - $b1 $c1 $d1 $e1 - $f1 $g1 $h1 $i1 $j1 - $k1 $l1 - $m1", 0, 1, 'L');
    // }

    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(5, 5, "ชื่อ", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(50, 5, "บริษัท สหมงคลประกันภัย จำกัด (มหาชน)", 0, '', 'L');
    $pdf->Cell(135, 5, "เลขประจำตัวผู้เสียภาษีอากร", 0, 1, 'C');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(7, 5, "ที่อยู่", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(135, 5, "7 ซอย 11 ถนนสาทร แขวงยานนาวา เขตสาทร กรุงเทพฯ 10120", 0, 1, 'L');

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
    if ($taxidstrlen <= 10) {
        $pdf->Cell(48, 7, "$a2 - $b2 $c2 $d2 $e2 - $f2 $g2 $h2 $i2 $j2  $k2 $l2 $m2", 0, 1, 'L');
    } else {
        $pdf->Cell(48, 7, "$a2 - $b2 $c2 $d2 $e2 - $f2 $g2 $h2 $i2 $j2 - $k2 $l2 - $m2", 0, 1, 'L');
    }
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(5, 5, "ชื่อ", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(50, 5, "$fullname", 0, '', 'L');
    $pdf->Cell(135, 5, "เลขประจำตัวผู้เสียภาษีอากร", 0, 1, 'C');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(7, 5, "ที่อยู่", 0, '', 'L');
    $pdf->SetFont('thsarabun', '', 12);
    $pdf->Cell(135, 5, "$address", 0, 1, 'L');

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

    if($des == 'ค่าส่งเสริมการขาย'){
        $pdf->Cell(110, 5, "2. ค่าธรรมเนียม ค่านายหน้า ฯลฯ ตามมาตรา 40 (2) ", 0, '1', 'L');
    }else{
        $pdf->WriteHTMLCell(110, 5, '', '', '<table><tr align="Left"><td>2. ค่าธรรมเนียม <u><b>' . $des . '</b></u> ฯลฯ ตามมาตรา 40 (2) </td></tr></table>', 0, '0');
        $pdf->Cell(26, 5, "$ddate", 0, '0', 'C');
        $pdf->Cell(20, 5, $amt['integerPart'], 0, '0', 'R');
        $pdf->Cell(8, 5, $amt['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(19, 5, $tax['integerPart'], 0, '0', 'R');
        $pdf->Cell(8, 5, $tax['DecimalPart'], 0, '1', 'L');
    }
   

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
    if($des == 'ค่าส่งเสริมการขาย'){
    
        $pdf->WriteHTMLCell(110, 5, '', '', '<table><tr align="Left"><td>มาตรา 3 เตรส (ระบุ)  <b>' . $des . '</b></td></tr></table>', 0, 0);
        $pdf->Cell(26, 5, "$ddate", 0, '0', 'C');
        $pdf->Cell(18, 5, $amt['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $amt['DecimalPart'], 0, '0', 'L');
        $pdf->Cell(16, 5, $tax['integerPart'], 0, '0', 'R');
        $pdf->Cell(11, 5, $tax['DecimalPart'], 0, '1', 'L');
    }else{
        $pdf->WriteHTMLCell(110, 5, '', '', '<table><tr align="Left"><td>มาตรา 3 เตรส (ระบุ) </td></tr></table>', 0, '1');
    }
   
    $pdf->Cell(110, 5, "(เช่น รางวัล ส่วนลดหรือประโยชน์ใดๆ เนื่องจากการส่งเสริมการขาย รางวัล", 0, '1', 'L');
    $pdf->Cell(2, 5, "", 0, '0', 'L');
    $pdf->Cell(110, 5, "ในการประกวด การแข่งขัน การชิงโชค ค่าแสดงของนักแสดงสาธารณะ ค่าจ้างทำของ", 0, '1', 'L');
    $pdf->Cell(2, 5, "", 0, '0', 'L');
  
    $pdf->Cell(100, 5, "ค่าโฆษณา ค่าเช่า ค่าขนส่ง ค่าบริการ ค่าเบี้ยประกันวินาศภัย ฯลฯ)", 0, '1', 'L');

    $pdf->Cell(100, 6, "", 0, '1', 'L');
    $pdf->SetFont('thsarabun', 'B', 12);
    $pdf->Cell(130, 6, "รวมเงินที่จ่ายและภาษีที่หักนำส่ง", 0, '0', 'R');
    $pdf->Cell(26, 6, $amt['integerPart'], 0, '0', 'R');
    $pdf->Cell(6, 6, $amt['DecimalPart'], 0, '0', 'R');
    $pdf->Cell(21, 6, $tax['integerPart'], 0, '0', 'R');
    $pdf->Cell(8, 6, $tax['DecimalPart'], 0, '1', 'L');
    $pdf->SetFont('thsarabun', 'B', 11);
    $pdf->Cell(50, 6, "รวมเงินภาษีที่หักนำส่ง (ตัวอักษร)", 0, '0', 'L');
    $pdf->SetFont('thsarabun', 'B', 14);
    $pdf->Cell(120, 6, "$thaiBath", 0, '1', 'L', 1);
    
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
    $pdf->Cell(10, 6, "", 0, '1', 'L');

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
    $pdf->Cell(5, 6, "", 0, '0', 'L');
    $pdf->Cell(60, 5, " ( นางสาว สุภาพร กันสุด )", 0, '1', 'C');
    $pdf->Cell(145, 1, "$ddate  วันเดือนปี ที่ออกหนังสือรับรอง", 0, '1', 'R');

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

    if ($tax_type == 'ภ.ง.ด.53' || $tax_type == 'pnd53') {
        //ภ.ง.ด 53
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line(119, 78, 119 + $size, 78 + $size);
        $pdf->Line(119 + $size, 78 + $size, 119 + $size * 2, 78 - $size);
        $pdf->SetDrawColor(false);
    } elseif($tax_type == 'ภ.ง.ด.3' || $tax_type == 'pnd3') {
        //ภ.ง.ด 3
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line(58, 78, 58 + $size, 78 + $size);
        $pdf->Line(58 + $size, 78 + $size, 58 + $size * 2, 78 - $size);
        $pdf->SetDrawColor(false);

    }elseif($tax_type == 'ภ.ง.ด.1'){
          //ภ.ง.ด 1
          $pdf->SetDrawColor(0, 0, 0);
          $pdf->Line(58, 72, 58 + $size, 72 + $size);
          $pdf->Line(58 + $size, 72 + $size, 58 + $size * 2, 72 - $size);
          $pdf->SetDrawColor(false);
  
    }
    $pdf->Output($taxid . '.pdf', 'I'); 
}else{
    echo "<script type='text/javascript'>alert('ไม่พบข้อมูลที่ต้องการพิมพ์'); window.close()</script>";
}





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


function thaiBath($number){

    $txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
    $txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
    $number = str_replace(",","",$number);
    $number = str_replace(" ","",$number);
    $number = str_replace("บาท","",$number);
    $number = explode(".",$number);
    if(sizeof($number)>2){
    return 'ทศนิยมหลายตัว';
    exit;
    }
    $strlen = strlen($number[0]);
    $convert = '';
    for($i=0;$i<$strlen;$i++){
        $n = substr($number[0], $i,1);
        if($n!=0){
            if($i==($strlen-1) AND $n==1){ $convert .= 'เอ็ด'; }
            elseif($i==($strlen-2) AND $n==2){  $convert .= 'ยี่'; }
            elseif($i==($strlen-2) AND $n==1){ $convert .= ''; }
            else{ $convert .= $txtnum1[$n]; }
            $convert .= $txtnum2[$strlen-$i-1];
        }
    }

    $convert .= 'บาท';
    if($number[1]=='0' OR $number[1]=='00' OR
    $number[1]==''){
    $convert .= 'ถ้วน';
    }else{

    $strlen = strlen($number[1]);
    for($i=0;$i<$strlen;$i++){
    $n = substr($number[1], $i,1);
        if($n!=0){
        if($i==($strlen-1) AND $n==1){$convert
        .= 'เอ็ด';}
        elseif($i==($strlen-2) AND
        $n==2){$convert .= 'ยี่';}
        elseif($i==($strlen-2) AND
        $n==1){$convert .= '';}
        else{ $convert .= $txtnum1[$n];}
        $convert .= $txtnum2[$strlen-$i-1];
        }
    }

    $convert .= 'สตางค์';

    }

    return $convert;
}