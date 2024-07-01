  <div class="content-wrapper">
    <section class="content-header">
      <h1>สมัครงาน</h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/career')?>"><i class="fa fa-dashboard"></i> สมัครงาน</a></li>
      </ol>
    </section>

    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="btn-group">
					<a href="<?=base_url('uppcp/career/insert')?>"><button type="button" class="btn btn-success">เพิ่ม</button></a>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">#</th>
                  <th>ตำแหน่งที่เปิดครับ</th>
                  <th>จำนวน</th>
				  <th>วันที่ปิดรับสมัคร</th>
				  <th>สถานะ</th>
                  <th style="width: 150px">	</th>
                </tr>

				<?php $n=1; foreach ($career as $post) { ?>
                <tr>
                  <td><?=$n?>.</td>
                  <td><?=$post['title']?></td>
                  <td><?=$post['req']?></td>
				  <td><?=$post['time_exp']?></td>
				  <td>
					<?php
					$time_exp = strtotime($post['time_exp']." 23:59:59");
					$time_today = strtotime(date('Y-m-d H:i:s'));
					echo ( $time_exp > $time_today ) ? "<p class='text-green'>เปิดรับสมัคร <i class='fa fa-1x fa-check'></i></p>" : "<p class='text-red'>ปิดรับสมัคร <i class='fa fa-1x fa-close'></i></p>";
					?>
				  </td>
                  <td>
					<a href="<?=base_url('uppcp/career/edit/'.$post['id'])?>"><button type="button" class="btn btn-default btn-flat">แก้ไข</button></a>
					<a href="<?=base_url('uppcp/career/dele/'.$post['id'])?>" onclick="return confirm('ยืนยันการลบตำแหน่ง <?=$post['title']?> ???');"><button type="button" class="btn btn-danger">ลบ</button></a>
                  </td>
                </tr>
				<?php $n++; } ?>

              </table>
            </div>
  
          </div>
          <!-- /.box -->

        </div>


      </div>

    </section>
    <!-- /.content -->
  </div>