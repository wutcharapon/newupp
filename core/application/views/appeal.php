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
                <a href="<?=base_url('career')?>">รับเรื่องร้องเรียน</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3 class="button"><i class="fa fa-tag" aria-hidden="true"></i> รับเรื่องร้องเรียน</h3>
			  <p>บริษัท สหมงคลประกันภัย จำกัด (มหาชน) มีความยินรับเรื่องร้องเรียนของท่าน หรือโทรสายด่วนที่เบอร์ 02-68-77777</p>
			  <hr>
            </div>

            <div class="col-md-8 offset-sm-2 mb-3 mb-md-0">
              <h3 class="bold text-center mt-4 mb-5">รับเรื่องร้องเรียน</h3>
              <form class="form-style-1" id='appeal-form' method="post" action="<?=base_url('appeal/send')?>">
                <div class="form-row">

                  <div class="form-group col-sm-12 col-md-12">
                    <label>เรื่อง</label>
					  <span class="input-icon">
						<i class="feather-tag"></i>
						<input type="text" class="form-control" name="subject" placeholder="เรื่อง" data-validation="required">
					  </span>
                  </div>

                  <div class="form-group col-sm-12 col-md-12">
                    <label>ชื่อ - นามสกุล</label>
					  <span class="input-icon">
						<i class="feather-user"></i>
						<input type="text" class="form-control" name="fullname" placeholder="ชื่อ - นามสกุล" data-validation="required">
					  </span>
                  </div>

                  <div class="form-group col-sm-12 col-md-6">
                    <label>อีเมล</label>
					  <span class="input-icon">
						<i class="feather-mail"></i>
						<input type="email" class="form-control" name="email" placeholder="E-mail">
					  </span>
                  </div>

                  <div class="form-group col-sm-12 col-md-6">
                    <label>เบอร์โทรติดต่อ</label>
					  <span class="input-icon">
						<i class="feather-phone-call"></i>
						<input type="text" class="form-control" name="phone" placeholder="เบอร์โทรติดต่อ" data-validation="number">
					  </span>
                  </div>

                  <div class="form-group col-sm-12 col-md-12">
                    <label>ข้อความ :</label>
					  <span class="input-icon">
						<i class="feather-align-justify"></i>
						<textarea type="text" class="form-control" name="message"></textarea>
					  </span>
                  </div>

				  <div class="form-group form-check col-sm-12 col-md-12">
					<div class="mt-4">
						<input class="form-check-input" type="checkbox" value="" id="accept" data-validation="required">
						<label class="form-check-label" for="accept">
							ข้าพยินยอมให้บริษัทสหมงคลประกันภัย จำกัด (มหาชน) ใช้หมายเลขโทรศัพท์มือถือ และอีเมลที่ให้ไว้ข้างต้นสำหรับแจ้งข้อมูลข่าวสาร แนะนำผลิตภัณฑ์และบริการ กิจกรรมส่งเสริมการขายรวมถึงข้อมูลทางการตลาด ตลอดจนข้อมูลอื่นๆ ที่เกี่ยวกับบริษัทฯ
						</label>
					</div>
				  </div>

                  <div class="form-group col-sm-12 col-md-12">
					  <div class="g-recaptcha"></div>
                  </div>

				  <div class="form-group col-md-4 offset-md-4 my-3">
					<button type="submit" id="submit" class="btn btn-primary btn-block rounded-pill"><i data-feather="send"></i> ส่ง</button>
				  </div>
                </div>

              </form>
            </div>

          </div>
        </div>

      </div>

		
	</div>
