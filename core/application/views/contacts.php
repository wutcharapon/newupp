<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Main Content -->
    <div class="container my-3">

		<div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
              </li>
              <li>
                <a href="#">ติดต่อเรา</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3 class="button"><i class="fa fa-child" aria-hidden="true"></i> ติดต่อเรา</h3>
			  <hr>
            </div>

            <!-- Map -->
            <div class="col-md-6">
              <div class="img-thumbnail">
                <div class="embed-responsive text-center">
                  <img src="assets/img/UPP-HEAD-OFFICE.jpg" class="img-responsive">
                </div>
              </div>
            </div>

            <!-- Contact Us Form -->
            <div class="col-md-6 mt-3 mt-md-0">
              <h3 class="bold"><i class="fa fa-building-o" aria-hidden="true"></i> สำนักงานใหญ่</h3>
              <form class="mt-3 form-style-1" id='cbkk-form' method="post" action="<?=base_url('contacts/send')?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="media">
                      <span><i class="fa fa-map-marker fa-fw text-info"></i></span>
                      <div class="media-body ml-1">
                        <p>เลขที่ 7  ซอยสาทร 11  ถนนสาทร  แขวงยานนาวา  เขตสาทร  กรุงเทพ ฯ  10120</p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="media mb-3 mb-md-0">
                      <span><i class="fa fa-phone fa-fw text-info"></i></span>
                      <div class="media-body ml-1 mt-md-1">โทรศัพท์ 02-68-77777</div>
                    </div>
                    <div class="media mb-3 mb-md-0">
						<span><i class="fa fa-location-arrow fa-fw text-info textcenter"></i></span>
						<div class="media-body ml-1 mt-md-1"><a href="https://goo.gl/maps/1TgaPx9b9wNwqot67" target="_blank" rel="noopener">แผนที่ Google</a></div>
                    </div>
                    <div class="media mb-3 mb-md-0">
						<span><i class="fa fa-facebook-official fa-fw text-info"></i></span>
						<div class="media-body ml-1 mt-md-1"><a href="https://www.facebook.com/UnionProspersInsurance/" target="_blank" rel="noopener">UnionProspersInsurance</a></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="user"></i>
                    <input type="text" class="form-control" name="fullname" placeholder="ชื่อ" data-validation="required">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i class="feather-phone-call"></i>
                    <input type="phone" class="form-control" name="phone" placeholder="เบอร์โทรติดต่อ" data-validation="required">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="mail"></i>
                    <input type="email" class="form-control" name="email" placeholder="อีเมล">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i class="feather-slack"></i>
                    <input type="text" class="form-control" name="subject" placeholder="เรื่อง" data-validation="required">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="message-square"></i>
                    <textarea class="form-control" rows="3" name="message" placeholder="ข้อความ" data-validation="required"></textarea>
                  </span>
				  <input name="svcno" type="hidden" value="BKK">
                </div>
                <div class="form-group">
					<div class="g-recaptcha"></div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary">ส่ง</button>
              </form>
            </div>
            <!-- /Contact Us Form -->

          </div>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-body">
          <div class="row">

            <!-- Map -->
            <div class="col-md-6">
              <div class="img-thumbnail">
                <div class="embed-responsive text-center">
                  <img src="assets/img/map_upp_cm.png" class="img-responsive">
                </div>
              </div>
            </div>

            <!-- Contact Us Form -->
            <div class="col-md-6 mt-3 mt-md-0">
              <h3 class="bold"><i class="fa fa-building-o" aria-hidden="true"></i> สาขาเชียงใหม่</h3>
              <form class="mt-3 form-style-1" id='ccmi-form' method="post" action="<?=base_url('contacts/send')?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="media">
                      <span><i class="fa fa-map-marker fa-fw text-info"></i></span>
                      <div class="media-body ml-1">
						<p>550/5-7 ถนนซุปเปอร์ไฮเวย์เชียงใหม่-ลำปาง ต.ท่าศาลา อ.เมือง จ.เชียงใหม่ 50000</p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="media mb-3 mb-md-0">
                      <span><i class="fa fa-phone fa-fw text-info"></i></span>
                      <div class="media-body ml-1 mt-md-1">โทรศัพท์  053-308-670-1</div>
                    </div>
                    <div class="media mb-3 mb-md-0">
                      <span><i class="fa fa-envelope fa-fw text-info"></i></span>
                      <div class="media-body ml-1 mt-md-1">แฟกซ์  053-308-666</div>
                    </div>
                    <div class="media mb-3 mb-md-0">
						<span><i class="fa fa-location-arrow fa-fw text-info textcenter"></i></span>
						<div class="media-body ml-1 mt-md-1"><a href="https://goo.gl/maps/RNSQPAzBYwsjKjcS8" target="_blank" rel="noopener">แผนที่ Google</a></div>
                    </div>
                    <div class="media mb-3 mb-md-0">
						<span><i class="fa fa-facebook-official fa-fw text-info"></i></span>
						<div class="media-body ml-1 mt-md-1"><a href="https://www.facebook.com/UnionProspersInsurance/" target="_blank" rel="noopener">UnionProspersInsurance</a></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="user"></i>
                    <input type="text" class="form-control" name="fullname" placeholder="ชื่อ" data-validation="required">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i class="feather-phone-call"></i>
                    <input type="phone" class="form-control" name="phone" placeholder="เบอร์โทรติดต่อ" data-validation="required">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="mail"></i>
                    <input type="email" class="form-control" name="email" placeholder="อีเมล">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i class="feather-slack"></i>
                    <input type="text" class="form-control" name="subject" placeholder="เรื่อง" data-validation="required">
                  </span>
                </div>
                <div class="form-group">
                  <span class="input-icon">
                    <i data-feather="message-square"></i>
                    <textarea class="form-control" rows="3" name="message" placeholder="ข้อความ" data-validation="required"></textarea>
                  </span>
				  <input name="svcno" type="hidden" value="CMI">
                </div>
                <div class="form-group">
					<div class="g-recaptcha"></div>
                </div>
                <button type="submit" id="submit" class="btn btn-primary">ส่ง</button>
              </form>
            </div>
            <!-- /Contact Us Form -->

          </div>
        </div>
      </div>

    </div>
    <!-- /Main Content -->