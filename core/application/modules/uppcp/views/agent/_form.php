  <div class="content-wrapper">
    <section class="content-header">
      <h1>เทส</h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/agent')?>"><i class="fa fa-dashboard"></i> รายชื่ออู่ซ่อมรถ</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
	  <form role="form" method="post" enctype="multipart/form-data">

        <!-- right column -->
        <div class="col-md-12">
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
                  <label class="col-sm-2 control-label">รุปอู่</label>
				  <div class="col-sm-12">
					  <input type="file" name="image" class="form-control">
					  <p class="help-block">*** รองรับเฉพาะไฟล์นามสกุล jpg, jpeg, png, gif เท่านั้น</p>
				  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right">เพิ่ม</button>
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

