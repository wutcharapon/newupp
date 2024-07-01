  <div class="content-wrapper">
    <section class="content-header">
      <h1>Slide</h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/slide')?>"><i class="fa fa-dashboard"></i> Slide</a></li>
      </ol>
    </section>

    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="btn-group">
					<a href="<?=base_url('uppcp/slide/insert')?>"><button type="button" class="btn btn-success">เพิ่ม</button></a>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">#</th>
				  <th>หัวข้อ</th>
                  <th>รูป</th>
                  <th>วันที่แสดงผล</th>
				  <th>วันที่สิ้นสุด</th>
				  <th>สถานะ</th>
                  <th style="width: 150px">	</th>
                </tr>

				<?php $n=1; foreach ($slide as $post) {  ?>
                <tr>
                  <td><?=$n?>.</td>
                  <td><?=$post['title']?></td>
                  <td><img src="<?=getPostImage($post['thumb'],'slide')?>" style="width: 150px"></td>
				  <td><?=$post['date_start']?></td>
				  <td><?=$post['date_end']?></td>
				  <td><?=($post['status'] == '1') ? "<p class='text-green'><i class='fa fa-2x fa-check'></i></p>" : "<p class='text-red'><i class='fa fa-2x fa-close'></i></p>" ?></td>
                  <td>
					<a href="<?=base_url('uppcp/slide/edit/'.$post['slide_id'])?>"><button type="button" class="btn btn-default btn-flat">แก้ไข</button></a>
					<a href="<?=base_url('uppcp/slide/dele/'.$post['slide_id'])?>" onclick="return confirm('ยืนยันการลบตำแหน่ง <?=$post['title']?> ???');"><button type="button" class="btn btn-danger">ลบ</button></a>
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