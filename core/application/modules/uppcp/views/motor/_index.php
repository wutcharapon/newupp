  <div class="content-wrapper">
    <section class="content-header">
      <h1>รายชื่อสนใจประกันรถยนต์ทั้งหมด ( <?=$total?> คน )</h1>
    </section>


    <!-- Main content -->
    <section class="content">

	<div class="row">
		<div class="col-md-12">
          <!-- Application buttons -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="btn-group">
					<a href="<?=base_url('uppcp/motor/excel')?>"><button type="button" class="btn btn-success">Excel</button></a>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">

                <tr>
                  <th style="width: 10px">#</th>
                  <th>ประเภท</th>
                  <th>ชื่อ-นามสกุล</th>
				  <th>เบอร์โทร</th>
                  <th>Packet Code</th>
				  <th>รถ</th>
				  <th>Car Code</th>
				  <th>Size No</th>
				  <th>วัน เวลา</th>
                </tr>

				<?php $n=$page+1; foreach ($motor as $post) { ?>
                <tr>
                  <td><?=$n?>.</td>
                  <td><?=$post['pdname']?></td>
                  <td><?=$post['fullname']?></td>
                  <td><?=$post['phone']?></td>
                  <td><?=($post['packid']==0) ? $post['pdname'] : $post['PACKETCODE'] ?></td>
                  <td><?=$post['maker']." ".$post['model']." ปี ".$post['year']?></td>
                  <td><?=$post['carcode']?></td>
                  <td><?=$post['sizeno']?></td>
				  <td><?=dateTHFormat(date('Y-m-d', $post['time']),'y')?></td>
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