  <div class="content-wrapper">
    <section class="content-header">
      <h1>รายชื่ออู่ซ่อมรถ <?=isset($garage['name']) ? "> แก้ไข" : "> เพิ่ม" ?></h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/garage')?>"><i class="fa fa-dashboard"></i> รายชื่ออู่ซ่อมรถ</a></li>
        <li class="active"><?=isset($garage['name']) ? "แก้ไข" : "เพิ่ม" ?></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
	  <form role="form" method="post" enctype="multipart/form-data">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">รูปอู่รถ <?=isset($garage['id']) ? "ID : ".$garage['id'] : "" ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
				<div class="col-sm-12">
                     <img src="<?=(isset($garage['image']) and file_exists("uploads/garage/".$garage['image']."") and $garage['image'] != NULL) ? base_url('uploads/garage')."/".$garage['image'] : base_url('assets/img/no-pic.jpg') ?>" class="img-responsive">
				</div>

              </div>

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">รายละเอียด</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">ชื่ออู่ :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?=isset($garage['name']) ? $garage['name'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">ที่อยู่ :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" value="<?=isset($garage['address']) ? $garage['address'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">เบอร์โทร : </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tel" value="<?=isset($garage['tel']) ? $garage['tel'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
					<label class="col-sm-2 control-label">จังหวัด :</label>
					<div class="col-sm-10">
					  <select class="form-control" name="province">
						<option value='<?=(isset($garage['province'])) ? $garage['province'] : '' ?>' <?=(isset($garage['province'])) ? 'selected' : '' ?>><?=(isset($garage['province'])) ? $garage['province'] : '-- เลือก --' ?></option>
						<option value="กระบี่">กระบี่</option>
						<option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
						<option value="กาญจนบุรี">กาญจนบุรี</option>
						<option value="กาฬสินธุ์">กาฬสินธุ์</option>
						<option value="กำแพงเพชร">กำแพงเพชร</option>
						<option value="ขอนแก่น">ขอนแก่น</option>
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
						<option value="เลย">เลย</option>
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
						<option value="อำนาจเจริญ">อำนาจเจริญ</option>
						<option value="อุดรธานี">อุดรธานี</option>
						<option value="อุตรดิตถ์">อุตรดิตถ์</option>
						<option value="อุทัยธานี">อุทัยธานี</option>
						<option value="อุบลราชธานี">อุบลราชธานี</option>
					  </select>
					 </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Google Map :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="linkgmap" value="<?=isset($garage['linkgmap']) ? $garage['linkgmap'] : "" ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">รุปอู่</label>
				  <div class="col-sm-10">
					  <input type="file" name="image" class="form-control">
					  <p class="help-block">*** รองรับเฉพาะไฟล์นามสกุล jpg, jpeg, png, gif เท่านั้น</p>
				  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">สถานะ</label>
				  <div class="col-sm-10">
					<select name='sts' class="form-control">
						<option value=''>-- เลือก --</option>
						<option value='0' <?=(isset($garage['sts']) and $garage['sts'] == '0') ? 'selected' : '' ?>>ปิดใช้งาน</option>
						<option value='1' <?=(isset($garage['sts']) and $garage['sts'] == '1') ? 'selected' : '' ?>>เปิดใช้งาน</option>
					</select>
				  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right"><?=isset($garage['name']) ? "แก้ไข" : "เพิ่ม" ?></button>
              </div>
              <!-- /.box-footer -->
            </div>
          </div>
		  </form>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </section>

</div>

