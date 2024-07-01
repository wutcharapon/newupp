
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>รายชื่ออู่ซ่อมรถ
        <div class="btn-group">
          <a href="<?=base_url('uppcp/garage/insert')?>"><button type="button" class="btn btn-success">เพิ่ม</button></a>
        </div>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listdata" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ลำดับ</th>
				  <th>รูป</th>
                  <th>ชื่ออู่</th>
                  <th>ที่อยู่</th>
                  <th>เบอร์โทร</th>
                  <th>จังหวัด</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>


			<?php $n=1; foreach ($garage as $post) {  ?>
                <tr>
                  <td><?=$post['id']?></td>
                  <td><img src="<?=(file_exists("uploads/garage/".$post['image']."") and $post['image'] != NULL) ? base_url('uploads/garage')."/".$post['thumb'] : base_url('assets/img/no-pic.jpg') ?>" style='width: 100px'></td>
                  <td><?=$post['name']?></td>
                  <td><?=$post['address']?></td>
                  <td><?=$post['tel']?></td>
                  <td><?=$post['province']?></td>
                  <td><a href="<?=base_url('uppcp/garage/edit/'.$post['id'])?>"><button type="button" class="btn btn-block btn-warning btn-sm">แก้ไข</button></a></td>
                </tr>
			<?php $n++; } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>ลำดับ</th>
				  <th>รูป</th>
                  <th>ชื่ออู่</th>
                  <th>ที่อยู่</th>
                  <th>เบอร์โทร</th>
                  <th>จังหวัด</th>
                  <th>#</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


