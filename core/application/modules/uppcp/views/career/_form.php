  <div class="content-wrapper">
    <section class="content-header">
      <h1>สมัครงาน</h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/career')?>"><i class="fa fa-dashboard"></i> สมัครงาน</a></li>
        <li class="active"><?=isset($career['title']) ? "แก้ไข" : "เพิ่ม" ?></li>
      </ol>
    </section>

    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<h3 class="box-title"><?=isset($career['title']) ? "<button type=\"button\" class=\"btn btn-warning\">แก้ไข</button>" : "<button type=\"button\" class=\"btn btn-success\">เพิ่ม</button>" ?></h3>
            </div>
            <!-- /.box-header -->
			<form role="form" method="post">
              <div class="box-body">
				  <div class="col-lg-4 col-xs-12">
					<div class="form-group">
					  <label>ชื่อตำแหน่ง</label>
					  <input name="title" class="form-control" placeholder="ชื่อตำแหน่ง" value="<?=isset($career['title']) ? $career['title'] : "" ?>">
					</div>
				  </div>
				  <div class="col-lg-4 col-xs-12">
					<div class="form-group">
					  <label>จำนวนที่เปิดรับ</label>
					  <select name='req' class="form-control">
						<option value=''>ระบุจำนวนที่เปิดรับ</option>
						<option value='1'<?=(isset($career['req']) and $career['req'] =='1') ? "selected" : "" ?>>1 ตำแหน่ง</option>
						<option value='2'<?=(isset($career['req']) and $career['req'] =='2') ? "selected" : "" ?>>2 ตำแหน่ง</option>
						<option value='3'<?=(isset($career['req']) and $career['req'] =='3') ? "selected" : "" ?>>3 ตำแหน่ง</option>
						<option value='4'<?=(isset($career['req']) and $career['req'] =='4') ? "selected" : "" ?>>4 ตำแหน่ง</option>
						<option value='5'<?=(isset($career['req']) and $career['req'] =='5') ? "selected" : "" ?>>5 ตำแหน่ง</option>
					  </select>
					</div>
				  </div>
				  <div class="col-lg-4 col-xs-12">
					<div class="form-group">
					  <label>วันที่ปิดรับสมัคร ( วัน/เดือน/ปี เป็น คศ. Ex. <?=date('d/m/Y')?> )</label>
						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="text" class="form-control" name="time_exp" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?=isset($career['time_exp']) ? formatdate($career['time_exp']) : date('d/m/Y') ?>">
						</div>
					</div>
				  </div>
				  <div class="col-lg-12 col-xs-12">
					<div class="form-group">
					  <label>รายละเอียด</label>
						<textarea id="editor" name="description" rows="10" cols="80">
							<?=isset($career['description']) ? $career['description'] : "รายละเอียดคุณสมบัติ" ?>
						</textarea>
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

