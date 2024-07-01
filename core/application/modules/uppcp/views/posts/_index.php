  <div class="content-wrapper">
    <section class="content-header">
      <h1>โพส Packet<small>( xxx )</small></h1>
    </section>


    <!-- Main content -->
    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="btn-group">
					<a href="<?=base_url('uppcp/posts/insert')?>"><button type="button" class="btn btn-success">เพิ่ม</button></a>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">#</th>
                  <th>ชื่อ PK</th>
                  <th>ประเภทรถ</th>
                  <th style="width: 150px">	</th>
                </tr>

				<?php foreach ($products as $post) { ?>
                <tr>
                  <td>#.</td>
                  <td><?=$post['title']?></td>
                  <td><?=dis_carcode($post['CARCODE'])?></td>
                  <td>
					<button type="button" class="btn btn-default btn-flat">แก้ไข</button>
					<button type="button" class="btn btn-danger">ลบ</button>
                  </td>
                </tr>
				<?php } ?>

              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->

        </div>


      </div>

    </section>
    <!-- /.content -->
  </div>