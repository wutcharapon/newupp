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
                <a href="<?=base_url('taxreceive')?>">หนังสือรับรองการหักภาษี ณ
                    ที่จ่าย ( รับ )</a>
            </li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-12 mb-2">
                    <h3 class="button"><i class="fa fa-handshake-o" aria-hidden="true"></i> หนังสือรับรองการหักภาษี ณ
                        ที่จ่าย ( รับ )</h3>
                    <p>ผู้มีความประสงค์ออกหนังสือรับรองการหักภาษี ณ ที่จ่าย ของบริษัท สหมงคลประกันภัย จำกัด
                        สามารถกรอกแบบฟอร์มได้ตามหัวข้อด้านล่างนี้</p>
                    <hr>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="accordion accordion-caret" id="accordion">
                        <div class="card">
                            <form class="form-style-1" method="post" action="<?=base_url('taxreceive/search')?>"
                                enctype="multipart/form-data">
                                <div class="form-group col-md-4 offset-md-4 my-3">
                                    <label>เลขที่ผู้เสียภาษี</label>
                                    <input style="font-size: 14px;" type="text" class="form-control" name="paytaxno"
                                        value="<?php echo $paytaxno_search ?>" maxlength="13"
                                        placeholder="กรุณากรอก เลขผู้เสียภาษี " oninput="validateInput_number(this)">
                                    <br>
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
                                        placeholder="วันที่เริ่มค้นหา และ วันที่สิ้นสุดค้นหา" readonly>
                                    <!-- <input type="text" id="begin_date" name="begin_date" hidden>
                                        <input type="text" id="after_date" name="after_date" hidden> -->
                                </div>

                                <div class="form-group col-md-4 offset-md-4 my-3">
                                    <button type="submit" class="btn btn-primary btn-block rounded-pill"><i
                                            data-feather="search"></i> ค้นหาเลขที่ผู้เสียภาษี</button>
                                </div>
                            </form>

                            <?php if (!empty($paytaxno)) {?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">วันที่</th>
                                            <th scope="col">เลขที่ผู้เสียภาษี</th>
                                            <th scope="col">ชื่อผู้เสียภาษี</th>
                                            <th scope="col">พิมพ์</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paytaxno as $row => $item): ?>
                                        <tr>
                                            <td><?php echo $row + 1; ?></td>
                                            <td><?php echo $item['ddate']; ?></td>
                                            <td><?php echo $item['taxid']; ?></td>
                                            <td><?php echo $item["fullname"]; ?>
                                            </td>
                                            <td> <a href="#" class="check-button" data-taxid="<?=$item['taxid']?>"
                                                    data-docno="<?=$item['docno']?>">
                                                    <img src="<?=base_url('assets/img/pdf.svg')?>" width="30"></a>
                                            </td>

                                        </tr>
                                        <?php endforeach;?>
                                        <tr>
                                            <td></td>
                                            <td><b>รวมทั้งสิ้น</b></td>
                                            <td><?php echo $item['taxid']; ?></td>
                                            <td><?php echo $item["fullname"]; ?>
                                            <td> <a href="#" class="send-sumreport" 
                                                    data-fullname="<?=$item['fullname']?>"
                                                    data-date_start="<?=$date_start?>"
                                                    data-date_end="<?=$date_end?>">
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
document.querySelectorAll('.check-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var attributes = ['taxid', 'docno'];
        
        var form = document.createElement('form');
        form.method = 'post';
        form.target = '_blank';
        form.action = '<?=base_url('taxreceive/report')?>';

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
        var attributes = ['fullname', 'date_start','date_end'];
        
        var form = document.createElement('form');
        form.method = 'post';
        form.target = '_blank';
        form.action = '<?=base_url('taxreceive/sumreport')?>';

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
</script>