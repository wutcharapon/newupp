<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container my-3">

    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
            </li>
            <li>
                <a href="<?=base_url('policy')?>">ตรวจสอบเลขกรมธรรม์</a>
            </li>
        </ol>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-2">
                    <h3 class="button"><i class="fa fa-cogs" aria-hidden="true"></i> ตรวจสอบเลขกรมธรรม์</h3>
                    <hr>
                     <div class="col-12">
                     <i class="feather-book-open"></i> 
                     <a target="_blank" href="./คู่มือตรวจสอบเลขกรมธรรม์.pdf">คู่มือ การตรวจสอบเลขกรมธรรม์</a>
                    </div>
                </div>
                <div class="col-md-8 offset-sm-2 mb-3 mb-md-0 ">
                    <h3 class="bold text-center mt-4 mb-5">การตรวจสอบเลขกรมธรรม์</h3>
                    <form class="form-style-1" id='formpolicy' method="post" action="<?=base_url('policy/send')?>">
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <label>กรอก เลขกรมธรรม์</label>
                                <span class="input-icon">
                                    <i class="feather-user"></i>
                                    <input type="text" class="form-control" name="polno"
                                        placeholder="กรุณา กรอกเลข กรมธรรม์" data-validation="required" maxlength="11">
                                </span>
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label>กรอก เลขบัตรประชาชน</label>
                                <span class="input-icon">
                                    <i class="feather-credit-card"></i>
                                    <input type="text" class="form-control" name="idcard"
                                        placeholder=" เลขบัตรประชาชน 6 ตัวหลัง" data-validation="required" maxlength="6" oninput="validateInput_number(this)">
                                </span>
                            </div>
                            <div class="form-group col-md-4 offset-md-4 my-3">
                                <button type="submit" id="submit" class="btn btn-primary btn-block rounded-pill"><i
                                        data-feather="send"></i> ตรวจสอบเลขกรมธรรม์</button>
                                       
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>


</div>
<script>
runScriptCareerPage();
//////////////////////////////////////////////////////
function validateInput_number(inputElement) {
    var containsNonNumericChars = /[^0-9]/.test(inputElement.value);

    if (containsNonNumericChars) {
        // alert("กรุณาป้อนตัวเลขเท่านั้น");
        // ลบตัวอักษรหรือข้อความที่ไม่ใช่ตัวเลขหรือจุด
        inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
    }
}
////////////////////////////////////////////////////

</script>