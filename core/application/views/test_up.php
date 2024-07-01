<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container my-3">

		<div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
              </li>
              <li>
                <a href="<?=base_url('agent')?>">แบบฟอร์มขอเปิดรหัสนายหน้า</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3 class="button"><i class="fa fa-handshake-o" aria-hidden="true"></i> แบบฟอร์มขอเปิดรหัสนายหน้า</h3>
			  <p>ผู้มีความประสงค์สมัครเป็นตัวแทน / นายหน้า / นายหน้านิติบุคคล / ของบริษัท สหมงคลประกันภัย จำกัด สามารถกรอกแบบฟอร์มและแนบเอกสารสมัครได้ตามหัวข้อด้ดานล่างนี้</p>
			  <hr>
            </div>

            <div class="col-lg-12 col-md-12">
              <div class="accordion accordion-caret" id="accordion">

                <div class="card">

						<div class="col-md-8 offset-sm-2 mb-3 mb-md-0">
						  <h3 class="bold text-center mt-4 mb-5">แบบฟอร์มขอเปิดรหัสตัวแทนประกันวินาศภัย</h3>
								  <form class="form-style-1" id='agt1-form' method="post" action="<?=base_url('agent/testsend')?>" enctype="multipart/form-data">
									<div class="form-row">

									  <div class="form-group col-sm-12 col-md-12">
										<label><code>1. รูปถ่ายขนาด ***</code></label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached1" data-validation="required extension mime size" break0="" data-validation-allowing="pdf" break="" data-validation-max-size="3M" >
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label><code>2. สำเนาบัตรประจำตัวประชาชน ***</code></label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached2" data-validation=" extension mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label><code>3. สำเนาใบอนุญาตตัวแทนประกันวินาศภัย ***</code></label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached3" data-validation=" extension mime size" break0="" data-validation-allowing="pdf" break="" data-validation-max-size="3M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>4. สำเนาทะเบียนบ้าน 4 ฉบับ (พร้อมรับรองสำเนา)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached4" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>5. รูปถ่ายสำนักงานตัวแทนประกันภัยวินาศภัย</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached5" data-validation="mime size" break0="" data-validation-allowing="pdf" break="" data-validation-max-size="3M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>6. ใบอนุญาตจัดตั้งสถานตรวจสภาพเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached6" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-md-4 offset-md-4 my-3">
										<button type="submit" id="submit" class="btn btn-primary btn-block rounded-pill"><i data-feather="send"></i> ส่งแบบฟอร์มสมัคร</button>
									  </div>
									</div>

								  </form>
						</div>

                </div>

              </div>
            </div>

          </div>
        </div>

      </div>

		
	</div>
