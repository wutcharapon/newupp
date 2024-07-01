<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->model('Public_model');
?>
    <div class="container my-3">

		<div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
              </li>
              <li>
                <a href="<?=base_url('products')?>">ผลิตภัณฑ์และโปรโมชั่น</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3 class="button"><i class="feather-package"></i> ผลิตภัณฑ์และโปรโมชั่น</h3>
			  <?php if(isset($carcode) or isset($year) or isset($insutype)) { echo "<p>ที่เหมาะสำหรับรถคุณ ".dis_insutype($insutype)." ".dis_carcode($carcode)."</p>"; }?>
			  <hr>
            </div>
		<?php if (empty($products)) { ?>

            <div class="col-lg-12 col-md-12 text-center form-row">
				<div class="form-group col-sm-12 col-md-12">
                    <label>ไม่พอข้อมูล</label>
                  </div>
				<div class="form-group col-md-4 offset-md-4 my-3">
					<a href="<?=base_url('/motor_insurance/search')?>"><button class="btn btn-primary btn-block rounded-pill"><i class="feather-search"></i> ค้นหาใหม่</button></a>
				  </div>
            </div>

		<?php } else { 
			foreach ($products as $post) { 
				foreach ($packet as $ppost) { 
					if($post['packid'] == $ppost['PACKETCODE']){
						?>
            <div class="col-lg-12 col-md-12">

              <div class="row gutters-3 mt-3">
                <div class="col-12">
                  <div class="card card-product card-product-list">
                    <a href="<?=base_url('products/'.$post['url'].'.html')?>"><img class="card-img-top" src="<?=base_url('assets/img/'.$post['image'])?>" alt="img"></a>
                    <div class="card-body">
                      <a href="<?=base_url('products/'.$post['url'].'.html')?>" class="card-title"><h3 class="note"><?=$post['title']?> ( <?=dis_carcode($ppost['CARCODE'])?> )</h3></a>

					  <div class="table-responsive">
						<table class="table table-hover" data-addclass-on-xs="table-sm">
						  <tbody>
							<tr>
								<th scope="row" colspan="2">Packet : <span style="color:red"><?=$post['packid']?></span> Insutype : <span style="color:red"><?=$ppost['INSUTYPE']?></span> Carcode : <span style="color:red"><?=$ppost['CARCODE']?></span></th>
							</tr>
							<tr>
								<th scope="row">ความบาดเจ็บต่อชีวิต ร่างกาน หรือ อนามัย</th>
								<td>ไม่เกิน <span style="color:red"><?=($ppost['TPBIPERSON']==0) ? "-" : number_format($ppost['TPBIPERSON'])?></span> บาท/คน</td>
							</tr>
							<tr>
								<th scope="row">ความเสียหายต่อทรัพย์สิน</th>
								<td>ไม่เกิน <span style="color:red"><?=($ppost['TPPDEVEN']==0) ? "-" : number_format($ppost['TPPDEVEN'])?></span> บาท/ครั้ง</td>
							</tr>
							<tr>
								<th scope="row">ความเสียหายจากการชนกับยานพาหนะทางบก</th>
								<td>ไม่เกิน <span style="color:red"><?=($ppost['ins5amt']==0) ? "-" : number_format($ppost['ins5amt'])?></span> บาท/ครั้ง</td>
							</tr>
							<tr>
								<th scope="row">ความเสียหายส่วนแรกกรณีเป็นฝ่ายผิด</th>
								<td>ไม่เกิน <span style="color:red"><?=($ppost['deduct5']==0) ? "-" : number_format($ppost['deduct5'])?></span> บาท/ครั้ง</td>
							</tr>
							<tr>
								<th scope="row">อุบัติเหตุส่วนบุคคล</th>
								<td>ไม่เกิน <span style="color:red"><?=($ppost['PAPASS']==0) ? "-" : number_format($ppost['PAPASS'])?></span> บาท/คน</td>
							</tr>
							<tr>
								<th scope="row">ค่ารักษาพยาบาล</th>
								<td>ไม่เกิน <span style="color:red"><?=($ppost['MEDICAL']==0) ? "-" : number_format($ppost['MEDICAL'])?></span> บาท/คน</td>
							</tr>
							<tr>
								<th scope="row">ประกันตัวผู้ขับขี่ในคดีอาญา</th>
								<td>ไม่เกิน <span style="color:red"><?=($ppost['BAILBOND']==0) ? "-" : number_format($ppost['BAILBOND'])?></span> บาท/ครั้ง</td>
							</tr>
						  </tbody>
						</table>
					  </div>
					  <p><?=dis_insutype(9)?></p>
                      <div class="btn-group">
                        <a href="<?=base_url('products/'.$post['url'].'.html')?>"><button class="btn rounded-pill btn-outline-primary atc-demo">รายละเอียด</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
						<?php
					}
				}
			}
		}
		?>

          </div>
        </div>
		<?= (isset($links_pagination)) ? $links_pagination : null ?>
      </div>

		
	</div>

