<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container my-3">

		<div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
              </li>
              <li>
                <a href="<?=base_url('accident')?>">ศูนย์รับแจ้งอุบัติเหตุ</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3 class="button"><i class="fa fa-users" aria-hidden="true"></i> ศูนย์รับแจ้งอุบัติเหตุ</h3>
			  <p>ศูนย์รับแจ้งอุบัติเหตุตลอด 24 ชั่วโมง โทร 02-68-77777</p>
			  <hr>
            </div>
		<?php if (empty($accident)) { ?>

            <div class="col-lg-12 col-md-12">
				<p>ไม่พอข้อมูล</p>
            </div>

		<?php } else { ?> 

            <div class="col-lg-12 col-md-12">
              <div class="accordion accordion-caret" id="accordion">
				<?php $n=1; foreach ($accident as $post) { ?>

                <div class="card">
                  <div class="card-header" id="heading1-<?=$n?>">
                    <a class="h4" data-toggle="collapse" href="#collapse1-<?=$n?>" aria-expanded="false" aria-controls="collapse1-<?=$n?>">
                      <?=$post['title']?>
                    </a>
                  </div>
                  <div id="collapse1-<?=$n?>" class="collapse" aria-labelledby="heading1-<?=$n?>" data-parent="#accordion">
                    <div class="card-body">
                      <?=$post['descript']?>
                    </div>
                  </div>
                </div>

			<?php $n++; } ?> 

              </div>
            </div>

			<?php } ?>

          </div>
        </div>

      </div>

		
	</div>