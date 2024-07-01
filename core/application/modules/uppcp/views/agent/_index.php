
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>รายการสมัครตัวแทนประกันวินาศภัย
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listdataagt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ลำดับ</th>
				  <th>ชื่อ-นามสกุล</th>
                  <th>เลขที่บัตรตัวแทน</th>
                  <th>ที่อยู่</th>
                  <th>รหัสไปรษณีย์</th>
                  <th>เบอร์โทร</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>


			<?php 
				$n=1; 
				switch ($agt_type) {
					case "A":
						$pdf_agt = "pdf_agt";
					break;
					case "B":
						$pdf_agt = "pdf_brk";
					break;
					case "J":
						$pdf_agt = "pdf_legpn";
					break;
				  default:
						$pdf_agt = "";
				} 
				if($pdf_agt != "") {
					foreach ($agent as $post) {  ?>
					<tr>
					  <td><?=$n?>.</td>
					  <td><?=$post['fullname']?></td>
					  <td><?=$post['agtno']?></td>
					  <td><?=$post['addressed']?></td>
					  <td><?=$post['zipcode']?></td>
					  <td><?=$post['tel']?></td>
					  <td>
					  <a href="<?=base_url('uppcp/agent/'.$pdf_agt.'/'.$post['id'])?>" target="_blank"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o"></i> ใบสมัคร</button></a>
					  <a href="<?=base_url('uppcp/agent/zipfile/'.$post['id'])?>" target="_blank"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-fw fa-file-zip-o"></i> ไฟล์แนบ</button></a>
					  </td>
					</tr>
				<?php 
						$n++; 
					} 
				}
				?>

                </tbody>
                <tfoot>
                <tr>
                  <th>ลำดับ</th>
				  <th>ชื่อ-นามสกุล</th>
                  <th>เลขที่บัตรตัวแทน</th>
                  <th>ที่อยู่</th>
                  <th>รหัสไปรษณีย์</th>
                  <th>เบอร์โทร</th>
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


