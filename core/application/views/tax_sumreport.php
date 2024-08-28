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
    // $pdf->AddPage('L');
    // $pdf->SetHeaderMargin(0);
    // $pdf->SetTopMargin(0);
  
   
    $separated_results = [];
    foreach ($getdetailpay_sumreport as $row) {
        $psnno = $row['psnno'];

         // ถ้าหมวดหมู่ยังไม่มีอยู่ในอาร์เรย์ผลลัพธ์ ให้สร้างอาร์เรย์ใหม่
    if (!isset($separated_results[$psnno])) {
        $separated_results[$psnno] = [];
    }

    // เพิ่มข้อมูลลงในอาร์เรย์ของหมวดหมู่ ตาม การ์ดเจ้าหนี้
    $separated_results[$psnno][] = [
        'paytaxno' => $row['paytaxno'],
        'paydate' => datethai($row['paydate']),
        'title' => $row['title'],
        'name' => $row['name'],
        'surname' => $row['surname'],
        'bankref' => $row['bankref'],
        'vat' => $row['vat'],
        'dabitall' => $row['dabitall'],
        'taxpay' => $row['taxpay'],
        'chqtotal' => $row['chqtotal'],
        'brnclmno' => $row['brnclmno'],
       
    ];

     
    }
    /// แยก สาขา (หากมีมากกว่า 1 สาขา) ตาม การ์ดเจ้าหนี้
    foreach ($separated_results as $psnno => $details ) {  
        $html = '<table border="1">
        <thead>
        <tr align="center">
        <th  width="50px;">ลำดับ</th>
        <th>วันที่</th>
        <th >เลขสำรวจ</th>
        <th>ภาษีซื้อ %</th>
        <th>จำนวนเงิน</th>
        <th>หัก ณ ที่จ่าย</th>
        <th>ยอดจ่าย</th>
        </tr>
        </thead>';
        $fullname = "";
        $num = 1;
        $sumvat = 0;
        $sumtaxpay = 0;
        $sumdabitall = 0;
        $sumchqtotal = 0;
        foreach($details as $row){
            $title = $row['title'];
            $name = $row['name'];
            $surname = $row['surname'];  
            $brnclmno = $row['brnclmno'];
            $vat = $row['vat'];
            $dabitall = $row['dabitall'];
            $taxpay = $row['taxpay'];
            $chqtotal = $row['chqtotal'];
            $paydate = $row['paydate'];
            $sumvat += $row['vat'];
            $sumdabitall += $row['dabitall'];
            $sumtaxpay += $row['taxpay'];
            $sumchqtotal += $row['chqtotal'];
            $bankref = $row['bankref'];
            
            $html .= '<tr  nobr="true" align="center">
            <td width="50px;">'.$num.'</td>
            <td>'.$paydate.'</td>
            <td>' .$brnclmno. '</td>
            <td>' . number_format($vat, 2) . '</td>
            <td>' . number_format($dabitall, 2) . '</td>
            <td>' . number_format($taxpay, 2) . '</td>
            <td>' . number_format($chqtotal, 2) . '</td>
            </tr>';

            $num++;
            
        }
        $html .= '<tr align="center">
        <td  width="50px;"></td>
        <td></td>
        <td><b>รวมทั้งสิ้น</b></td>
        <td><b>' . number_format($sumvat, 2) . '</b></td>
        <td><b>' . number_format($sumdabitall, 2) . '</b></td>
        <td><b>' . number_format($sumtaxpay, 2) . '</b></td>
        <td><b>' . number_format($sumchqtotal, 2) . '</b></td>
        </tr>';
      
        $pdf->AddPage('L');
    $datenow = date("d/m/Y H:i:s");
    $pdf->Cell(269, 5, "", 0, 1, 'L');
    $pdf->Cell(65, 5, "$datenow", 0, '', 'L');
    $pdf->SetFont('thsarabun', 'B', 14);
    $pdf->Cell(130, 5, "บริษัท สหมงคลประกันภัย จำกัด (มหาชน)", 0, '1', 'C');
    $pdf->Cell(65, 5, "", 0, '', 'L');
    $pdf->SetFont('thsarabun', 'B', 13);
    $pdf->Cell(130, 5, "รายละเอียดการเงินจ่าย", 0, '1', 'C');
    $pdf->SetFont('thsarabun', '', 12);

    $pdf->Cell(65, 6, "$bankref", 0, '0', 'L');
   
    $pdf->Cell(130, 6, "สั่งจ่าย $title $name $surname ณ วันที่ $date_start ถึง $date_end", 0, '1', 'C'); 
  
   
   
    $html .= '</table>';
    $pdf->WriteHTML($html);
   
   
    
    }

   
}  

if(!empty($getdetailpay_sumreport_receive) || !empty($getdetailpay_sumreport_receive_old)){
    $pdf->SetTopMargin(5);
    // $pdf->SetFooterMargin(10);
    // $pdf->deletePage(1);
    // $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage('L');
    // $pdf->SetHeaderMargin(0);
    // $pdf->SetTopMargin(0);
    $html = getTableHeader();
    $html2 = getTableHeader();
    $html3 = getTableHeader();

    $fullname = "";
    $num = 1;
    $num2 = 1;
    $num3 = 1;
    $sumamt1 = 0;
    $sumtax1 = 0;
    $sumamt3 = 0;
    $sumtax3 = 0;
    $sumamt53 = 0;
    $sumtax53 = 0;
    if(!empty($getdetailpay_sumreport_receive)){
    foreach ($getdetailpay_sumreport_receive as $row) {
        $type = $row['TA_TAX_TYPE'];
        $docno = $row['TA_TAX_NO'];
        $vocno = $row['TA_VOC_NO'];
        $fullname = $row['TA_TAX_NM'];
        $taxid = $row['TA_TAX_ID'];
        $ddate = $row['dateformat'];
        $des = $row['TA_TAX_DESC'];
        $rate = $row['TA_TAX_RATE'];
        $amt = $row['TA_TAX_AMT'];
        $tax = $row['TA_TAX_VALUE'];
       
        switch($type){
            case 'ภ.ง.ด.3':
                $sumamt3 += $row['TA_TAX_VALUE'];      
                $sumtax3 += $row['TA_TAX_AMT'];        
                $html .= getTableRow($num, $vocno, $type, $docno, $ddate, $des, $rate, $row['TA_TAX_VALUE'], $row['TA_TAX_AMT']);        
                $num++;        
            break;

            case 'ภ.ง.ด.1':
                $sumamt1 += $row['TA_TAX_VALUE'];        
                $sumtax1 += $row['TA_TAX_AMT'];         
                $html2 .= getTableRow($num2, $vocno, $type, $docno, $ddate, $des, $rate, $row['TA_TAX_VALUE'], $row['TA_TAX_AMT']);       
                $num2++;         
            break;

            case 'ภ.ง.ด.53':
                $sumamt53 += $row['TA_TAX_VALUE'];         
                $sumtax53 += $row['TA_TAX_AMT'];       
                $html3 .= getTableRow($num3, $vocno, $type, $docno, $ddate, $des, $rate, $row['TA_TAX_VALUE'], $row['TA_TAX_AMT']);
                $num3++;         
            break;
        }
      
    }
}
if(!empty($getdetailpay_sumreport_receive_old)){
    foreach ($getdetailpay_sumreport_receive_old as $row) {
        $docno = $row['docno'];
        $fullname = $row['fullname'];
        $taxid = $row['taxid'];
        $ddate = $row['ddate'];
        $des = $row['des'];
        $rate = $row['rate'];
        $amt = $row['amt'];
        $tax = $row['tax'];
        $sumamt3 += $row['amt'];
        $sumtax3 += $row['tax'];
      

        $html .= '<tr  nobr="true" align="center">
        <td width="50px;">' . $num . '</td>
        <td></td>
          <td>ภ.ง.ด.3</td>
        <td>'.$docno.'</td>
        <td>' . $ddate . '</td>
        <td>' . $des . '</td>
        <td>' . $rate . '</td>
        <td>' . number_format($row['amt'], 2) . '</td>
        <td>' . number_format($row['tax'], 2) . '</td>
          </tr>';
        $num++;
    }
}


    // ปิดตารางหลังจากลูป
 
    $datenow = date("d/m/Y H:i:s");
    $pdf->Cell(269, 5, "", 0, 1, 'L');
    $pdf->Cell(65, 5, "$datenow", 0, '', 'L');
    $pdf->SetFont('thsarabun', 'B', 14);
    $pdf->Cell(130, 5, "บริษัท สหมงคลประกันภัย จำกัด (มหาชน)", 0, '1', 'C');
    $pdf->Cell(65, 5, "", 0, '', 'L');
    $pdf->SetFont('thsarabun', 'B', 13);
    $pdf->Cell(130, 5, "รายละเอียดการเงินรับ", 0, '1', 'C');
    $pdf->SetFont('thsarabun', '', 12);

    $pdf->Cell(65, 6, "", 0, '0', 'L');
    $pdf->Cell(130, 6, "สั่งจ่าย $fullname ณ วันที่ $date_start ถึง $date_end", 0, '1', 'C');

 
    genfooter($pdf,$html,$sumamt3,$sumtax3);
    genfooter($pdf,$html2,$sumamt1,$sumtax1);
    genfooter($pdf,$html3,$sumamt53,$sumtax53);

}


// else {
//     // header("Location: " . base_url('tax'));
//     // exit;
//     echo "<script type='text/javascript'>alert('ไม่พบข้อมูลที่ต้องการพิมพ์'); window.close()</script>";
// }

$pdf->Output("หนังสือรับรองหักณที่จ่าย" . '.pdf', 'I');

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

function getTableHeader() {

    return '<table border="1"> 
      <thead> 
        <tr align="center">
          <th width="50px;">ลำดับ</th>
          <th>เลขใบสำคัญ</th> 
          <th>ประเภท</th>
          <th>เลขที่</th>
          <th>วันที่</th>
          <th>ประเภทเงินได้</th>
          <th>อัตราภาษี %</th>
          <th>จำนวนเงิน</th>
          <th>รวมเงินภาษี</th> 
        </tr>
      </thead>';
  
  }

function genfooter($pdf,$html,$s1,$s2){
    if($s1 != '0.00' and $s2 != '0.00'){
        $html .= '<tr align="center">
        <td  width="50px;"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><b>รวมทั้งสิ้น</b></td>
        <td><b>' . number_format($s1, 2) . '</b></td>
        <td><b>' . number_format($s2, 2) . '</b></td>
        </tr>';
        $html .= '</table>';
    $pdf->WriteHTML($html);
    }
}

function getTableRow($num, $vocno, $type, $docno, $ddate, $des, $rate, $taxValue, $taxAmt) {

    return '<tr nobr="true" align="center">  
      <td width="50px;">' . $num . '</td>
      <td>' . $vocno . '</td> 
      <td>' . $type . '</td>
      <td>' . $docno . '</td>
      <td>' . $ddate . '</td>
      <td>' . $des . '</td>
      <td>' . $rate . '</td>  
      <td>' . number_format($taxValue, 2) . '</td>
      <td>' . number_format($taxAmt, 2) . '</td>
    </tr>';
  
  }