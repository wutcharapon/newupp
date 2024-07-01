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
                <a href="<?=base_url($article['name'])?>"><?=$article['catedes']?></a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3><?=$article['title']?></h3>
			  <ul class="list-inline">
                <li class="list-inline-item"><i class="feather-clock"></i> <small><?= dateTHFormat(date('Y-m-d', $article['time'])) ?></small></li>
              </ul>
			  <hr>
            </div>

			<div class="col-12 mb-2">
				<?=$article['description']?>
			</div>
			<hr>
            <div class="col-md-8 offset-sm-2 mb-3 mb-md-0">
              <h3 class="bold text-center mt-4 mb-5">สนใจซื้อผลิตภัณฑ์นี้ กรุณากรอกข้อมูล เพื่อเจ้าหน้าที่ติดต่อกลับ</h3>
              <form class="form-style-1" id='pro-form' method="post" action="<?=base_url('products/send')?>">
                <div class="form-row">
				<input type="hidden" name="packid" value="<?=$article['packid']?>">
                  <div class="form-group col-sm-12 col-md-6">
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
						<input type="email" class="form-control" name="email" placeholder="E-mail" data-validation="email">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>เบอร์โทรติดต่อ</label>
					  <span class="input-icon">
						<i class="feather-phone-call"></i>
						<input type="text" class="form-control" name="phone" placeholder="เบอร์โทรติดต่อ" data-validation="number">
					  </span>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>จังหวัด</label>
					  <span class="input-icon">
						<i class="feather-map"></i>
						<select class="form-control" name="province" data-validation="required">
							<option value="">- จังหวัด -</option>
							<option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
							<option value="กระบี่">กระบี่</option>
							<option value="กาญจนบุรี">กาญจนบุรี</option>
							<option value="กาฬสินธุ์">กาฬสินธุ์</option>
							<option value="กำแพงเพชร">กำแพงเพชร</option>
							<option value="ขอนแก่น">ขอนแก่น</option>
							<option value="เลย">เลย</option>
							<option value="จันทบุรี">จันทบุรี</option>
							<option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
							<option value="ชลบุรี">ชลบุรี</option>
							<option value="ชัยนาท">ชัยนาท</option>
							<option value="ชัยภูมิ">ชัยภูมิ</option>
							<option value="ชุมพร">ชุมพร</option>
							<option value="เชียงราย">เชียงราย</option>
							<option value="เชียงใหม่">เชียงใหม่</option>
							<option value="ตรัง">ตรัง</option>
							<option value="ตราด">ตราด</option>
							<option value="ตาก">ตาก</option>
							<option value="นครนายก">นครนายก</option>
							<option value="นครปฐม">นครปฐม</option>
							<option value="นครพนม">นครพนม</option>
							<option value="นครราชสีมา">นครราชสีมา</option>
							<option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
							<option value="นครสวรรค์">นครสวรรค์</option>
							<option value="นนทบุรี">นนทบุรี</option>
							<option value="นราธิวาส">นราธิวาส</option>
							<option value="น่าน">น่าน</option>
							<option value="บึงกาฬ">บึงกาฬ</option>
							<option value="บุรีรัมย์">บุรีรัมย์</option>
							<option value="ปทุมธานี">ปทุมธานี</option>
							<option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
							<option value="ปราจีนบุรี">ปราจีนบุรี</option>
							<option value="ปัตตานี">ปัตตานี</option>
							<option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
							<option value="พะเยา">พะเยา</option>
							<option value="พังงา">พังงา</option>
							<option value="พัทลุง">พัทลุง</option>
							<option value="พิจิตร">พิจิตร</option>
							<option value="พิษณุโลก">พิษณุโลก</option>
							<option value="เพชรบุรี">เพชรบุรี</option>
							<option value="เพชรบูรณ์">เพชรบูรณ์</option>
							<option value="แพร่">แพร่</option>
							<option value="ภูเก็ต">ภูเก็ต</option>
							<option value="มหาสารคาม">มหาสารคาม</option>
							<option value="มุกดาหาร">มุกดาหาร</option>
							<option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
							<option value="ยโสธร">ยโสธร</option>
							<option value="ยะลา">ยะลา</option>
							<option value="ร้อยเอ็ด">ร้อยเอ็ด</option>
							<option value="ระนอง">ระนอง</option>
							<option value="ระยอง">ระยอง</option>
							<option value="ราชบุรี">ราชบุรี</option>
							<option value="ลพบุรี">ลพบุรี</option>
							<option value="ลำปาง">ลำปาง</option>
							<option value="ลำพูน">ลำพูน</option>
							<option value="ศรีสะเกษ">ศรีสะเกษ</option>
							<option value="สกลนคร">สกลนคร</option>
							<option value="สงขลา">สงขลา</option>
							<option value="สตูล">สตูล</option>
							<option value="สมุทรปราการ">สมุทรปราการ</option>
							<option value="สมุทรสงคราม">สมุทรสงคราม</option>
							<option value="สมุทรสาคร">สมุทรสาคร</option>
							<option value="สระแก้ว">สระแก้ว</option>
							<option value="สระบุรี">สระบุรี</option>
							<option value="สิงห์บุรี">สิงห์บุรี</option>
							<option value="สุโขทัย">สุโขทัย</option>
							<option value="สุพรรณบุรี">สุพรรณบุรี</option>
							<option value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
							<option value="สุรินทร์">สุรินทร์</option>
							<option value="หนองคาย">หนองคาย</option>
							<option value="หนองบัวลำภู">หนองบัวลำภู</option>
							<option value="อ่างทอง">อ่างทอง</option>
							<option value="อุดรธานี">อุดรธานี</option>
							<option value="อุตรดิตถ์">อุตรดิตถ์</option>
							<option value="อุทัยธานี">อุทัยธานี</option>
							<option value="อุบลราชธานี">อุบลราชธานี</option>
							<option value="อำนาจเจริญ">อำนาจเจริญ</option>
						</select>
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