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

if (!empty($getdetailpay_sumreport)) {
    $pdf->SetTopMargin(5);
    // $pdf->SetFooterMargin(10);
    // $pdf->deletePage(1);
    // $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage('L');
    // $pdf->SetHeaderMargin(0);
    // $pdf->SetTopMargin(0);
    
    $html = '<table border="1">
        <thead>
        <tr align="center">
        <th  width="50px;">ลำดับ</th>
        <th>เลขที่</th>
        <th>ประเภท</th>
        <th >วันที่</th>
        <th >ประเภทเงินได้</th>
        <th>อัตราภาษี</th>
        <th>จำนวนเงิน</th>
        <th>รวมเงินภาษี</th>
        </tr>
        </thead>';
    $num = 1;
    $sumamt = 0;
    $sumtax = 0;
    foreach ($getdetailpay_sumreport as $row) {
        $type = $row['TA_TAX_TYPE'];
        $docno = $row['TA_DOC_NO'];
        $fullname = $row['TA_TAX_NM'];
        $taxid = $row['TA_TAX_ID'];
        $ddate = $row['formatdate'];
        $des = $row['TA_TAX_DESC'];
        $rate = $row['TA_TAX_RATE'];
        $amt = $row['TA_TAX_AMT'];
        $tax = $row['TA_TAX_VALUE'];
        $sumamt += $row['TA_TAX_AMT'];
        $sumtax += $row['TA_TAX_VALUE'];
      
        if($type == 'ภ.ง.ด.1'){
        $html .= '<tr  nobr="true" align="center">
        <td width="50px;">' . $num . '</td>
        <td>'.$docno.'</td>
        <td>'.$type.'</td>
        <td>' . $ddate . '</td>
        <td>' . $des . '</td>
        <td>' . $rate . '</td>
        <td>' . number_format($row['TA_TAX_AMT'], 2) . '</td>
        <td>' . number_format($row['TA_TAX_VALUE'], 2) . '</td>
          </tr>';
        }
        $num++;
    }

    $html .= '<tr align="center">
        <td  width="50px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>รวมทั้งสิ้น</b></td>
        <td><b>' . number_format($sumamt, 2) . '</b></td>
        <td><b>' . number_format($sumtax, 2) . '</b></td>
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

    $pdf->Cell(65, 6, "", 0, '0', 'L');
    $pdf->Cell(130, 6, "สั่งจ่าย $fullname ณ วันที่ $date_start ถึง $date_end", 0, '1', 'C');

    // ใช้ WriteHTML แทน WriteHTMLCell
    $pdf->WriteHTML($html);
} else {
    // header("Location: " . base_url('tax'));
    // exit;
    echo "<script type='text/javascript'>alert('ไม่พบข้อมูลที่ต้องการพิมพ์'); window.close()</script>";
}

$pdf->Output('SUM_REPORT' . '.pdf', 'I');

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

// function settext($servpay, $rentpay, $etc1str){
//         $text = array();

//         if($servpay != 0){
//             $servtaxt = 'ค่าบริการ';
//             $text[] = $servtaxt;
//         }

//         if($rentpay != 0){
//             $renttaxt = 'ค่าเช่า';
//             $text[] = $renttaxt;
//         }

//         // if($etc1pay != 0){
//         //         $etc1taxt = 'ค่าขนส่ง';
//         //         $text[] = $etc1taxt;
//         // }
//         if($etc1str == 'ค่าแรง' || $etc1str == 'ค่าขนส่ง' || $etc1str == 'ค่าบริการ' ||
//         $etc1str == 'ค่าเช่า' || $etc1str == 'ค่าเบี้ยประกันภัย' || $etc1str == 'ค่ารักษาพยาบาล' || $etc1str == 'ค่าเบี้ยประกันภัย ฆย 119 กท'
//         || $etc1str == 'ค่าบริการการตรวจสอบ' || $etc1str == 'ค่าบริการ,ค่าขนส่ง'){
//         $text[] = $etc1str;
//         }

//         if(!empty($text)){
//              $unique_text = array_unique($text);
//             $result = implode(', ', $unique_text);
//             return $result;
//         }
//         else{
//             return '';
//         }
//     }