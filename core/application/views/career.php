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
                <a href="<?=base_url('career')?>">ร่วมงานกับเรา</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3 class="button"><i class="fa fa-handshake-o" aria-hidden="true"></i> ร่วมงานกับเรา</h3>
			  <p>บริษัท สหมงคลประกันภัย จำกัด (มหาชน) เปิดรับสมัครบุคลากรที่มีความสามารถ เข้าร่วมงานกับทางบริษัทฯ ในตำแหน่งดังนี้</p>
			  <hr>
            </div>
		<?php if (empty($career)) { ?>

            <div class="col-lg-12 col-md-12">
				<p>ไม่พอข้อมูล</p>
            </div>

		<?php } else { ?> 

            <div class="col-md-8 offset-sm-2 mb-3 mb-md-0 form-content">
              <h3 class="bold text-center mt-4 mb-5">แบบฟอร์มสมัครงาน</h3>
              <form class="form-style-1" id='career-form' method="post" action="<?=base_url('career/send')?>" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-sm-12 col-md-6">
                    <label>ตำแหน่งที่สนใจ</label>
					  <span class="input-icon">
						<i class="feather-slack"></i>
						<select class="form-control" name="pdname" data-validation="required">
							<option value="">เลือกตำแหน่งที่สนใจ</option>
							<?php foreach ($career as $select) {?>
							<option value="<?=$select['title']?>"><?=$select['title']?></option>
							<?php } ?>
						</select>
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>เงินเดือนที่คาดหวัง</label>
					  <span class="input-icon">
						<i class="feather-dollar-sign"></i>
						<input type="text" class="form-control" name="salary" placeholder="เงินเดือนที่คาดหวัง" data-validation="number">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>ชื่อ - นามสกุล</label>
					  <span class="input-icon">
						<i class="feather-user"></i>
						<input type="text" class="form-control" name="fullname" placeholder="ชื่อ - นามสกุล" data-validation="required">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>เพศ</label>
					  <span class="input-icon">
						<i class="feather-user-check"></i>
						<select class="form-control" name="sex" data-validation="required">
							<option value="">เลือกเพศ</option>
							<option value="ชาย">ชาย</option>
							<option value="หญิง">หญิง</option>
						</select>
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-4">
                    <label>อีเมล</label>
					  <span class="input-icon">
						<i class="feather-mail"></i>
						<input type="email" class="form-control" name="email" placeholder="E-mail" data-validation="email">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-4">
                    <label>เบอร์โทรติดต่อ</label>
					  <span class="input-icon">
						<i class="feather-phone-call"></i>
						<input type="text" class="form-control" name="phone" placeholder="เบอร์โทรติดต่อ" data-validation="number">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-4">
                    <label>ไอดี Line</label>
					  <span class="input-icon">
						<i class="feather-message-circle"></i>
						<input type="text" class="form-control" name="line" placeholder="ไอดี Line">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-12">
                    <label>ที่อยู่ปัจจุบัน</label>
					  <span class="input-icon">
						<i class="feather-align-justify"></i>
						<input type="text" class="form-control" name="address" placeholder="ที่อยู่ปัจจุบัน" data-validation="required">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-12">
                    <label>ข้อความแนะนำตัวเอง / ประสบการณ์ที่เกี่ยวข้องกับตำแหน่งงาน :</label>
					  <span class="input-icon">
						<i class="feather-message-square"></i>
						<textarea type="text" class="form-control" name="message"></textarea>
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-12">
                    <label>แนบไฟล์ Resume ชนิด PDF ขนาดไม่เกิน 2M:</label>
					  <span class="input-icon">
						<i class="feather-file-text"></i>
						<input type="file" class="form-control" name="resume" data-validation="required extension" data-validation-allowing="pdf" data-validation-max-size="2M">
					  </span>
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

            <div class="col-lg-12 col-md-12">
              <div class="accordion accordion-caret" id="accordion">
				<?php $n=1; foreach ($career as $post) { ?>

                <div class="card">
                  <div class="card-header" id="heading1-<?=$n?>">
                    <a class="h4" data-toggle="collapse" href="#collapse1-<?=$n?>" aria-expanded="false" aria-controls="collapse1-<?=$n?>">
                      <?=$post['title'].' ( '.$post['req'].' อัตรา )'?>
                    </a>
                  </div>
                  <div id="collapse1-<?=$n?>" class="collapse" aria-labelledby="heading1-<?=$n?>" data-parent="#accordion">
                    <div class="card-body">
                      <?=$post['descript']?>
                      <a href="#" class="bin-position" data-position='<?=$post['title']?>'><button class="btn btn-sm rounded-pill btn-outline-primary atc-demo">สมัครงานตำแหน่งนี้</button></a>
                    </div>
                  </div>
                </div>

			<?php $n++; } ?> 

              </div>
            </div>

			<?php } ?>

          </div>
        </div>

      </div>

		
	</div>
	<script>
	runScriptCareerPage();
	</script>