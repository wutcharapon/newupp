  <div class="content-wrapper">
    <section class="content-header">
      <h1>ข่าวและบทความ</h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('uppcp/news')?>"><i class="fa fa-dashboard"></i> ข่าวและบทความ</a></li>
      </ol>
    </section>

    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="btn-group">
					<a href="<?=base_url('uppcp/news/insert')?>"><button type="button" class="btn btn-success">เพิ่ม</button></a>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">#</th>
                  <th>หัวข้อ</th>
				  <th>ข้อความโดยย่อ</th>
                  <th style="width: 150px">รูปหน้าปก</th>
				  <th style="width: 150px">วันที่โพส</th>
                  <th style="width: 160px">	</th>
                </tr>

				<?php $n=1; foreach ($news as $post) { ?>
                <tr>
                  <td><?=$n?>.</td>
                  <td><?=$post['title']?></td>
				  <td><?=$post['subtitle']?></td>
                  <td><img src="<?=getPostImage($post['thumb'],'post')?>" style="width: 150px"></td>
				  <td><?= dateTHFormat(date('Y-m-d', $post['time'])) ?></td>
                  <td>
					<a href="<?=base_url('uppcp/news/edit/'.$post['id'])?>"><button type="button" class="btn btn-default btn-flat">แก้ไข</button></a>
					<a href="<?=base_url('uppcp/news/dele/'.$post['id'])?>" onclick="return confirm('ยืนยันการลบตำแหน่ง <?=$post['title']?> ???');"><button type="button" class="btn btn-danger">ลบ</button></a>
                  </td>
                </tr>
				<?php $n++; } ?>

              </table>
            </div>
  
            <div class="box-footer clearfix">
				<?= $links_pagination;?>
            </div>

          </div>
          <!-- /.box -->

        </div>


      </div>

    </section>
    <!-- /.content -->
  </div>