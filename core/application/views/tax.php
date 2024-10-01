<?php
defined('BASEPATH') or exit('No direct script access allowed');
$paytaxno_search = $this->session->userdata("paytaxno");
?>
<style>
.red-text {
    color: red;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    font-size: 16px;
}

.table th,
.table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f2f2f2;
}

.table-hover tbody tr:hover {
    background-color: #f5f5f5;
}
</style>

<div class="container my-3">

    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
            </li>
            <li>
                <a href="<?=base_url('tax')?>">หนังสือรับรองการหักภาษี ณ
                    ที่จ่าย</a>
            </li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-12 mb-2">
                    <h3 class="button"><i class="fa fa-handshake-o" aria-hidden="true"></i> หนังสือรับรองการหักภาษี ณ
                        ที่จ่าย</h3>
                    <p>ผู้มีความประสงค์ออกหนังสือรับรองการหักภาษี ณ ที่จ่าย ของบริษัท สหมงคลประกันภัย จำกัด
                        สามารถกรอกแบบฟอร์มได้ตามหัวข้อด้านล่างนี้</p>
                    <hr>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="accordion accordion-caret" id="accordion">
                        <div class="card">
                            <form class="form-style-1" method="post" action="<?=base_url('tax/search')?>"
                                enctype="multipart/form-data">
                                <div class="form-group col-md-4 offset-md-4 my-3">
                                    <label>เลขที่ผู้เสียภาษี</label>
                                    <input style="font-size: 14px;" type="text" class="form-control" name="paytaxno"
                                        value="<?php echo $paytaxno_search ?>" maxlength="13"
                                        placeholder="กรุณากรอก เลขผู้เสียภาษี " oninput="validateInput_number(this)">
                                    <br>
                                    <!-- <input style="font-size: 14px;" type="text" class="form-control" id="numberInput" name="paytaxno"  value="<?php echo $paytaxno_search ?>"  placeholder="กรุณากรอก เลขผู้เสียภาษี" oninput="formatInput(this.value)"  maxlength="25"> -->
                                    <p class="red-text" style="font-size: 16px;">กรุณากรอกเลขที่ผู้เสียภาษีรูปแบบ
                                        xxxxxxxxxxxxx</p>
                                </div>

                                <div class="form-group col-md-5 offset-md-4 my-3 ">
                                    <label style="font-size: 15px;">วันออกหนังสือรับรองการหักภาษี ณ ที่จ่าย
                                        (วันที่รับเงิน)</label>
                                </div>
                                <div class="form-group col-md-4 offset-md-4 my-3 row">
                                    <input style="font-size: 14px;" type="text" class="form-control col-md-12"
                                        id="date_start" name="date_start"
                                        placeholder="วันที่เริ่มค้นหา และ วันที่สิ้นสุดค้นหา">
                                    <!-- <input type="text" id="begin_date" name="begin_date" hidden>
                                        <input type="text" id="after_date" name="after_date" hidden> -->
                                </div>

                                <div class="form-group col-md-4 offset-md-4 my-3">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill"><i
                                            data-feather="search"></i> ค้นหาเลขที่ผู้เสียภาษี</button>
                                </div>
                            </form>

                            <?php if (!empty($paytaxno) || !empty($paytaxrecive) || !empty($paytaxrecive_old)) {?>
                            <div class="table-responsive">
                                <?php if($paytaxrecive_year) {?>
                                <div class="form-group col-md-5 offset-md-5 my-3">
                                    <label><b>สรุปรายละเอียด - รายปี <u>ภ.ง.ด.1ก</u></b></label>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ประจำปี</th>
                                            <th scope="col">ตั้งแต่วันที่</th>
                                            <th scope="col">เลขที่ผู้เสียภาษี</th>
                                            <th scope="col">ชื่อผู้เสียภาษี</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">พิมพ์</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach ($paytaxrecive_year as $row => $item):                                           
                                               $taxid = $item['TA_TAX_ID'];
                                                $name = $item["TA_TAX_NM"];
                                                $date = $item["dateformat"];?>
                                            <?php endforeach;?>
                                            <td><b><?=$date?></b></td>
                                            <td>
                                                <?= date('d/m/', strtotime($date_start)) . (date('Y', strtotime($date_start)) + 543) ?>
                                                ถึง
                                                <?= date('d/m/', strtotime($date_end)) . (date('Y', strtotime($date_end)) + 543) ?>
                                            </td>
                                            <td><?php echo $taxid; ?></td>
                                            <td><?php echo $name; ?>
                                            <td style="color: green;"><?php echo "การเงินรับ" ?></td>
                                            <td> <a href="#" class="send-sumreportYear zoom-hover"
                                                    data-date_start="<?=$date_start?>" data-date_end="<?=$date_end?>"
                                                    data-paytaxno="<?=$taxid?>">
                                                    <img src="<?=base_url('assets/img/sumyaerpdf.png')?>"
                                                        width="30"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group col-md-5 offset-md-5 my-3">
                                    <label><b>รายละเอียด - แยกย่อย </b></label>
                                </div>
                                <?php } ?>
                                <table class="table table-hover  ">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">วันที่</th>
                                            <th scope="col">เลขที่ผู้เสียภาษี</th>
                                            <th scope="col">ชื่อผู้เสียภาษี</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">พิมพ์</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $numrow = 1 ?>
                                        <?php if(!empty($paytaxno)) {?>
                                        <?php foreach ($paytaxno as $row => $item1): ?>
                                        <tr>
                                            <td><?php echo $numrow ++; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($item1['paydate'])); ?></td>
                                            <td><?php if($item1['paytaxno'] == ""){
                                                $paytax = $item1['taxpay_paytaxno'];
                                                echo $item1['taxpay_paytaxno'];
                                            }else if($item1['paytaxno'] == "0107555000333"){
                                                $paytax = $item1['taxpay_paytaxno'];
                                                 echo $item1['taxpay_paytaxno'];
                                            }else{
                                                $paytax = $item1['paytaxno'];
                                                echo $item1['paytaxno'];
                                            }  ?></td>
                                            <td><?php echo $item1["paytitle"] . " " . $item1["payname"] . " " . $item1["paysurname"]; ?>
                                            </td>
                                            <td style="color: red;"><?php echo "การเงินจ่าย" ?></td>
                                            <td> <a href="#" class="check-tax zoom-hover"
                                                    data-taxkey="<?=$item1['taxkey']?>"
                                                    data-vchkey="<?=$item1['vchkey']?>" data-paytaxno="<?=$paytax?>"
                                                    data-title="<?=$item1['title']?>" data-name="<?=$item1['name']?>"
                                                    data-surname="<?=$item1['surname']?>"
                                                    data-paydate="<?=$item1['paydate']?>"
                                                    data-bankref="<?=$item1['bankref']?>">
                                                    <img src="<?=base_url('assets/img/pdf.svg')?>" width="30"></a>
                                            </td>

                                        </tr>
                                        <?php endforeach;?>
                                        <?php } ?>
                                        <?php if(!empty($paytaxrecive_old)) {?>
                                        <?php foreach ($paytaxrecive_old as $row => $item): ?>
                                        <tr>
                                            <td><?php echo $numrow ++; ?></td>
                                            <td><?php echo $item['TA_TAX_DT']; ?></td>
                                            <td><?php echo $item['TA_TAX_ID']; ?></td>
                                            <td><?php echo $item["TA_TAX_NM"]; ?>
                                            </td>
                                            <td style="color: green;"><?php echo "การเงินรับ" ?></td>
                                            <td> <a href="#" class="check-tax-in zoom-hover"
                                                    data-taxid="<?=$item['TA_TAX_ID']?>"
                                                    data-docno="<?=$item['TA_TAX_NO']?>">
                                                    <img src="<?=base_url('assets/img/pdf.svg')?>" width="30"></a>
                                            </td>

                                        </tr>
                                        <?php endforeach;?>
                                        <?php } ?>
                                        <?php if(!empty($paytaxrecive)) {?>
                                        <?php foreach ($paytaxrecive as $row => $item): ?>
                                        <tr>

                                            <td><?php echo $numrow ++; ?></td>
                                                <td><?php $date = strtotime(str_replace('/', '-',  $item['TA_TAX_DT'])); echo date('d/m/', $date) . (date('Y', $date) + 543); ?></td>
                                            <td><?php echo $item['TA_TAX_ID']; ?></td>
                                            <td><?php echo $item["TA_TAX_NM"]; ?>
                                            </td>
                                            <td style="color: green;"><?php echo "การเงินรับ" ?></td>
                                            <td> <a href="#" class="check-tax-in zoom-hover"
                                                    data-taxid="<?=$item['TA_TAX_ID']?>"
                                                    data-docno="<?=$item['TA_TAX_NO']?>">
                                                    <img src="<?=base_url('assets/img/pdf.svg')?>" width="30"></a>
                                            </td>

                                        </tr>
                                        <?php endforeach;?>
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td><b>รวมทั้งสิ้น</b></td>
                                            <?php if(empty($paytaxno) && !empty($paytaxrecive)){
                                                $taxid = $item['TA_TAX_ID'];
                                                $name = $item["TA_TAX_NM"];
                                            }else if(!empty($paytaxno) && empty($paytaxrecive)){
                                                if($item1['paytaxno'] == "" || $item1['paytaxno'] == "0107555000333"){
                                                    $taxid =  $item1['taxpay_paytaxno'];
                                                }else{
                                                    $taxid =  $item1['paytaxno'];
                                                }
                                                $name = $item1["paytitle"] . " " . $item1["payname"] . " " . $item1["paysurname"];
                                            }else if(!empty($paytaxno) && !empty($paytaxrecive)){
                                                $taxid =  $item1['paytaxno'];
                                                $name = $item1["paytitle"] . " " . $item1["payname"] . " " . $item1["paysurname"];
                                            }else if(empty($paytaxno) && empty($paytaxrecive) && !empty($paytaxrecive_old)){
                                                $taxid = $item['TA_TAX_ID'];
                                                $name = $item["TA_TAX_NM"];
                                            } 
                                            else{
                                                $taxid = "";
                                                $name = "";
                                            }

                                            
                                            ?>
                                            <td><?php echo $taxid; ?></td>
                                            <td><?php echo $name; ?>
                                            <td style="color: blue;"><?php echo "รวมรายละเอียด" ?></td>
                                            <td> <a href="#" class="send-sumreport zoom-hover" <?php   if(!empty($item1['fullname']) && empty($item['fullname'])){
                                                            $fullname = $item1['fullname'];
                                                        }else if(empty($item1['fullname']) && !empty($item['fullname'])){
                                                            $fullname = $item['fullname'];
                                                        }else{
                                                            $fullname = "";
                                                        } ?> data-fullname="<?=$fullname ?>"
                                                    data-date_start="<?=$date_start?>" data-date_end="<?=$date_end?>"
                                                    data-paytaxno="<?=$taxid?>">
                                                    <img src="<?=base_url('assets/img/bluepdf.png')?>" width="30"></a>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>



                            </div>
                            <?php } else {?>

                            <div class="form-group col-md-12 offset-md-4 my-3 ">

                                <p class="red-text "><?php echo $echoerr ?></p>

                            </div>
                            <?php }?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>


</div>


<script>
function validateInput_number(inputElement) {
    var containsNonNumericChars = /[^0-9]/.test(inputElement.value);

    if (containsNonNumericChars) {
        alert("กรุณาป้อนตัวเลขเท่านั้น");
        // ลบตัวอักษรหรือข้อความที่ไม่ใช่ตัวเลขหรือจุด
        inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
    }
}
// รับคลิกลิงก์ "ตรวจสอบ" และส่งข้อมูลแบบ POST
document.querySelectorAll('.check-tax').forEach(function(button) {
    button.addEventListener('click', function() {
        var attributes = ['taxkey', 'vchkey', 'paytaxno', 'title', 'name', 'surname', 'paydate',
            'bankref'
        ];

        var form = document.createElement('form');
        form.method = 'post';
        form.target = '_blank';
        form.action = '<?=base_url('tax/report_tax')?>';

        attributes.forEach(function(attr) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = attr;
            input.value = button.getAttribute('data-' + attr);
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    });
});

document.querySelectorAll('.check-tax-in').forEach(function(button) {
    button.addEventListener('click', function() {
        var attributes = ['taxid', 'docno'];

        var form = document.createElement('form');
        form.method = 'post';
        form.target = '_blank';
        form.action = '<?=base_url('tax/report_receive')?>';

        attributes.forEach(function(attr) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = attr;
            input.value = button.getAttribute('data-' + attr);
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    });
});

document.querySelectorAll('.send-sumreport').forEach(function(button) {
    button.addEventListener('click', function() {
        var attributes = ['paytaxno', 'fullname', 'date_start', 'date_end'];

        var form = document.createElement('form');
        form.method = 'post';
        form.target = '_blank';
        form.action = '<?=base_url('tax/sumreport')?>';

        attributes.forEach(function(attr) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = attr;
            input.value = button.getAttribute('data-' + attr);
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    });
});

document.querySelectorAll('.send-sumreportYear').forEach(function(button) {
    button.addEventListener('click', function() {
        var attributes = ['paytaxno', 'date_start', 'date_end'];

        var form = document.createElement('form');
        form.method = 'post';
        form.target = '_blank';
        form.action = '<?=base_url('tax/sumreportYear')?>';

        attributes.forEach(function(attr) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = attr;
            input.value = button.getAttribute('data-' + attr);
            form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
    });
});

function formatInput(input) {
    var cleanedInput = input.replace(/\D/g, '');


    // เพิ่มเครื่องหมาย "-" หลังตัวแรก
    cleanedInput = cleanedInput.replace(/(\d)(\d*)/, '$1 - $2');

    // เพิ่มเครื่องหมาย "-" หลังตัวที่ 5
    cleanedInput = cleanedInput.replace(/(\d{4})(\d*)/, '$1 - $2');

    // เพิ่มเครื่องหมาย "-" ก่อนตัวที่ 11
    cleanedInput = cleanedInput.replace(/(\d{5})(\d{2})(\d*)/, '$1 - $2 - $3');


    // แสดงค่าที่จัดรูปแบบใน input field
    document.getElementById('numberInput').value = cleanedInput;

}
</script>