  <div class="content-wrapper">
    <section class="content-header">
      <h1>Popup</h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/popup')?>"><i class="fa fa-dashboard"></i> Popup</a></li>
        <li class="active"><?=isset($popup['title']) ? "แก้ไข" : "เพิ่ม" ?></li>
      </ol>
    </section>

    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<h3 class="box-title"><?=isset($popup['title']) ? "<button type=\"button\" class=\"btn btn-warning\">แก้ไข</button>" : "<button type=\"button\" class=\"btn btn-success\">เพิ่ม</button>" ?></h3>
            </div>
            <!-- /.box-header -->
			<form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
				  <div class="col-lg-12 col-xs-12">
					<div class="form-group">
					  <label>ชื่อหัวข้อ</label>
					  <input name="title" class="form-control" placeholder="ชื่อหัวข้อ" value="<?=isset($popup['title']) ? $popup['title'] : "" ?>">
					</div>
				  </div>

				  <div class="col-lg-12 col-xs-12 margin-bottom">
					  <img class="img-responsive" src="<?=isset($popup['image']) ? base_url('uploads/popup/'.$popup['image'].'') : "" ?>">
				  </div>

				  <div class="col-lg-4 col-xs-12">
					<div class="form-group">
					  <label>วันที่เริ่มทำงานและสิ้นสุด</label>
						<div class="input-group date">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" class="form-control pull-right" name="daterange" value="<?=(isset($popup['date_start']) and isset($popup['date_end'])) ? $popup['date_start']." - ".$popup['date_end'] : date('Y-m-d').' 00:00:00 '.date('Y-m-d').' 23:59:50' ?>">
						</div>
					</div>
				  </div>

				  <div class="col-lg-4 col-xs-12">
					<div class="form-group">
					  <label>อัพโหลดรูป</label>
					  <input type="file" name="image" class="form-control">
					  <!--<p class="help-block">ถ้าไม่</p>-->
					</div>
				  </div>

				  <div class="col-lg-4 col-xs-12">
					<div class="form-group">
					  <label>สถานะ</label>
					  <select name='sts' class="form-control">
						<option value=''>-- เลือก --</option>
						<option value='0' <?=(isset($popup['status']) and $popup['status'] == '0') ? 'selected' : '' ?>>ปิดใช้งาน</option>
						<option value='1' <?=(isset($popup['status']) and $popup['status'] == '1') ? 'selected' : '' ?>>เปิดใช้งาน</option>
					  </select>
					</div>
				  </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
              </div>
            </form>

          </div>
          <!-- /.box -->
        </div>

      </div>
    </section>

  </div>

