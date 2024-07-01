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
								  <form class="form-style-1" id='agt1-form' method="post" action="<?=base_url('agent/send')?>" enctype="multipart/form-data">
									<div class="form-row">
										<input type="hidden" name="agt_type" value="A">
									  <div class="form-group col-sm-12 col-md-12">
										<label>ชื่อ - นามสกุล ตัวแทนประกันวินาศภัย</label>
										<input type="text" class="form-control" name="fullname" data-validation="required">
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>เลขที่บัตรตัวแทน</label>
										<input type="text" class="form-control" name="agtno" data-validation="number length required" data-validation-length="10" >
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>บัตรประชาชนเลขที่</label>
										<input type="text" class="form-control" name="agt_idcard" data-validation="idCradThai number length required" data-validation-length="13" >
									  </div>

									  <div class="form-group col-sm-12 col-md-4">
										<label>วันที่ออกบัตร (วัน/เดือน/ปี)</label>
											<input type="birth" class="form-control" name="date_issue"> 
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>วันหมดอายุ (วัน/เดือน/ปี)</label>
											<input type="birth" class="form-control" name="date_expiry"> 
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>วันเดือนปีเกิด (วัน/เดือน/ปี)</label>
											<input type="birth" class="form-control" name="date_birth"> 
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label class="mr-4">สถานภาพ</label>
										<input type="radio" name="marital_status" value="1" checked>
										<label class="mr-3">โสด</label>
										<input type="radio" name="marital_status" value="2">
										<label class="mr-3">สมรถ</label>
										<input type="radio" name="marital_status" value="3">
										<label class="mr-3">หย่า</label>
										<input type="radio" name="marital_status" value="4">
										<label class="mr-3">หม้าย</label>
									  </div>

									  <div class="form-group col-sm-12 col-md-6">
										<label>ชื่อคู่สมรถ</label>
											<input type="text" class="form-control" name="marital_name">
									  </div>
									  <div class="form-group col-sm-12 col-md-6">
										<label>เบอร์โทร</label>
											<input type="text" class="form-control" name="marital_tel">
									  </div>

									  <div class="form-group col-sm-12 col-md-8">
										<label>ที่อยู่ (จัดส่งเอกสาร)</label>
											<input type="text" class="form-control" name="addressed" data-validation="required">
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>รหัสไปรษณีย์</label>
											<input type="text" class="form-control" name="zipcode" data-validation="required">
									  </div>

									  <div class="form-group col-sm-12 col-md-4">
										<label>โทรศัพท์</label>
											<input type="text" class="form-control" name="tel" data-validation="required">
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>Email</label>
											<input type="text" class="form-control" name="email_address" data-validation="email">
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>ID Line</label>
											<input type="text" class="form-control" name="id_line">
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>ชื่อผู้ค้ำประกัน</label>
											<input type="text" class="form-control" name="guarantor">
									  </div>

									  <div class="form-group col-sm-12 col-md-8">
										<label>ที่อยู่ชื่อผู้ค้ำประกัน</label>
											<input type="text" class="form-control" name="guarantor_address">
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>รหัสไปรษณีย์</label>
											<input type="text" class="form-control" name="guarantor_zipcode">
									  </div>

									  <div class="form-group col-sm-12 col-md-4">
										<label>โทรศัพท์บ้าน</label>
											<input type="text" class="form-control" name="guarantor_tel">
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>โทรศัพท์ (ที่ทำงาน)</label>
											<input type="text" class="form-control" name="guarantor_workphoe">
									  </div>
									  <div class="form-group col-sm-12 col-md-4">
										<label>โทรศัพท์มือถือ</label>
											<input type="text" class="form-control" name="guarantor_mobile">
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>บัตรประชาชนเลขที่ / บัตรประจำข้าราชการ</label>
											<input type="text" class="form-control" name="guarantor_idcard">
									  </div>

									  <div class="form-group col-sm-12 col-md-6">
										<label>ออกโดย</label>
											<input type="text" class="form-control" name="issued_by">
									  </div>
									  <div class="form-group col-sm-12 col-md-6">
										<label>กระทรวง</label>
											<input type="text" class="form-control" name="ministry">
									  </div>

									  <div class="form-group col-sm-12 col-md-6">
										<label>วันที่ออกบัตร (วัน/เดือน/ปี)</label>
											<input type="text" class="form-control" name="guarantor_datecard_issue">
									  </div>
									  <div class="form-group col-sm-12 col-md-6">
										<label>วันหมดอายุ (วัน/เดือน/ปี)</label>
											<input type="text" class="form-control" name="guarantor_datecard_expiry">
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>ข้าพเจ้าเคยเป็นตัวแทน/นายหน้าประกันวินาศภัยของ บริษัทสหมงคลประกันภัย จำกัด (มหาชน)</label><br>
										<input type="radio" name="was_agt" value="N" checked>
										<label>ไม่เคย</label><br>
										<input type="radio" name="was_agt" value="Y">
										<label>เคย รหัส</label><input type="text" class="form-control" name="was_agtno">
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>หมายเหตุ : ตัวแทนเป็นผู้รับผิดชอบภาษีหัก ณ ที่จ่าย</label>
										<h4 class="bold text-center mt-4 mb-4"><u>เอกสารหลักฐานของผู้สมัครตัวแทนประกันวินาศภัย</u></h4>
										<p class="bold text-center"><code>อนุญาติเฉพาะไฟล์ชนิด jpg, png, gif, jpeg เท่านั้น ขนาดไม่เกิน 2M</code></p>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label><code>1. รูปถ่ายขนาด ***</code></label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached1" data-validation="required extension mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M" >
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label><code>2. สำเนาบัตรประจำตัวประชาชน ***</code></label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached2" data-validation="required extension mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label><code>3. สำเนาใบอนุญาตตัวแทนประกันวินาศภัย ***</code></label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached3" data-validation="required extension mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
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
											<input type="file" class="form-control" name="attached5" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>6. ใบอนุญาตจัดตั้งสถานตรวจสภาพเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached6" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>7. สำเนาหน้าสมุดบัญชีธนาคาร (Bookbank) 3 ฉบับ</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached7" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>
										<!--
									  <div class="form-group col-sm-12 col-md-12">
										<code>
										<ol>
										  <li>รูปถ่ายขนาด 1 นิ้ว/ 1½ นิ้ว จำนวน 2 รูป</li>
										  <li>สำเนาบัตรประจำตัวประชาชน 4 ฉบับ (พร้อมรับรองสำเนา)</li>
										  <li>สำเนาทะเบียนบ้าน 4 ฉบับ (พร้อมรับรองสำเนา)</li>
										  <li>สำเนาใบอนุญาตตัวแทนประกันวินาศภัย 1 ฉบับ</li>
										  <li>รูปถ่ายสำนักงานตัวแทนประกันภัยวินาศภัย</li>
										  <li>ใบอนุญาตจัดตั้งสถานตรวจสภาพเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)</li>
										  <li>สำเนาหน้าสมุดบัญชีธนาคาร (Bookbank) 3 ฉบับ</li>
										</ol>
										</code>
										-->
									  <div class="form-group col-sm-12 col-md-12">
										<h4 class="bold text-center mt-4 mb-4"><u>คุณสมบัติของบุคคลค้ำประกันการเปิดสัญญาตัวแทนประกันวินาศภัย</u></h4>
										<label>(เอกสารประกอบใช้อย่างใดอย่างหนึ่ง)</label>
										<ol>
										  <li>ใช้หนังสือรับรอง ( ค้ำประกัน ) ของทางธนาคาร ( LG ) วางไว้เป็นหลักประกัน ( อัตรา 1 : 2 )</li>
										  <li>ใช้บุคคลค้ำประกันมีอายุงานไม่ต่ำกว่า 2 ปี มีเงินเดือนไม่ต่ำกว่า 25,000 บาท (อนุมัติวงเงินไม่เกิน 5 เท่าของเงินเดือน)</li>
										  <li>ใช้บุคคลที่มีสถานะมีชื่อเป็นเจ้าบ้านในการค้ำประกัน</li>
										  <li>เจ้าของกิจการหรือเจ้าของสถานตรวจสภาพรถเอกชน (ตรอ.)</li>
										</ol>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<h4 class="bold text-center mt-4 mb-4"><u>เอกสารหลักฐานของผู้ค้ำประกัน</u></h4>
										<p class="bold text-center"><code>อนุญาติเฉพาะไฟล์ชนิด jpg, png, gif, jpeg เท่านั้น ขนาดไม่เกิน 2M</code></p>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>1. สำเนาบัตรประชาชน 1 ฉบับ (พร้อมรับรองสำเนา)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached8" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>2. สำเนาทะเบียนบ้าน 1 ฉบับ (คุณสมบัติเป็นเจ้าบ้านพร้อมรับรองสำเนา)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached9" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>3. หนังสือรังรองเงินเดือน (ตัวจริง) 1 ฉบับ (กรณีใช้บุคคลค้ำประกันเป็นพนักงานเอกชน/รัฐวิสาหกิจ)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached10" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>4. หนังสือรับรองบริษัท  อายุไม่เกิน 3 เดือน 1 ชุด (กรณีจดทะเบียนเป็นบริษัทพร้อมประทับตรารับรองสำเนา)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached11" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<label>5. ใบอนุญาาตจัดตั้งสถานตรวจสภาพรถเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)</label>
										  <span class="input-icon">
											<i class="feather-file-text"></i>
											<input type="file" class="form-control" name="attached12" data-validation="mime size" break0="" data-validation-allowing="jpg, png, gif" break="" data-validation-max-size="2M">
										  </span>
									  </div>

									  <div class="form-group col-sm-12 col-md-12">
										<!--
										<ol>
										  <li>สำเนาบัตรประชาชน 1 ฉบับ (พร้อมรับรองสำเนา)</li>
										  <li>สำเนาทะเบียนบ้าน 1 ฉบับ (คุณสมบัติเป็นเจ้าบ้านพร้อมรับรองสำเนา)</li>
										  <li>หนังสือรังรองเงินเดือน (ตัวจริง) 1 ฉบับ (กรณีใช้บุคคลค้ำประกันเป็นพนักงานเอกชน/รัฐวิสาหกิจ)</li>
										  <li>หนังสือรับรองบริษัท  อายุไม่เกิน 3 เดือน 1 ชุด (กรณีจดทะเบียนเป็นบริษัทพร้อมประทับตรารับรองสำเนา)</li>
										  <li>ใบอนุญาาตจัดตั้งสถานตรวจสภาพรถเอกชน (ตรอ.) 1 ฉบับ (พร้อมภาพถ่ายสำนักงาน)</li>
										</ol>
										-->
										<label>หมายเหตุ</br></br>
										: บุคคลที่ใช้ค้ำประกันต้องไม่ใช่บุคคลเดียวกับผู้เปิดสัญญาตัวแทนประกันวินาศภัย</br></br>
										: ผู้สมัครตัวแทนและผู้ค้ำประกันจะต้อง ลงชื่อ ต่อหน้าพนักงานเจ้าหน้าที่ ของบริษัท สหมงคลประกันภัย จำกัด (มหาชน) เท่านั้น</label>
									  </div>

									  <div class="form-group col-sm-12 col-md-12 ">
										  <div class="g-recaptchaXXX"></div>
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
