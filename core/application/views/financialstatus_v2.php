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
                <a href="<?=base_url('abouts')?>">รู้จักเรา</a>
              </li>
              <li>
                <a href="<?=base_url('dl/file/')?>">ฐานะทางการเงิน</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">

			<div class="row">
				<div class="col-12 mb-2">
				  <h3 class="button"><i class="fa fa-usd" aria-hidden="true"></i> ฐานะทางการเงิน</h3>
				  <hr>
				</div>
			</div>

			<div id="accordion">
<!------------------------------------------------->
<?php
	$num = 1;
	foreach ($fnc as $key=>$value) { 
		foreach ($value as $year => $data) { 
?>
			  <div class="card">
				<div class="card-header" id="heading<?=$year?>">
				  <h5 class="mb-0">
					<button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$year?>" aria-expanded="true" aria-controls="collapse<?=$year?>">ปี <?=$year?></button>
				  </h5>
				</div>
				<div id="collapse<?=$year?>" class="collapse <?=($num==1) ? "show" : ""?>" aria-labelledby="heading<?=$year?>" data-parent="#accordion">
				  <div class="card-body">

					<div class="grid grid-gap-4 grid-col-1 grid-col-lg-4 mt-3">
<?php
			foreach ($data as $row) { 
?>
						  <div class="card card-2col text-white zoom-hover">
							<img class="card-img" src="<?=base_url('assets/img/bg-1.png')?>" alt="Card image">
							<div class="card-img-overlay flex-center-top flex-column">
							  <h4 class="card-title"><?=$row['subject']?></h4>
							  <a href="<?=base_url('dl/file/'.$year.'/'.$row['linkfile'].'')?>" target="_blank" class="btn btn-warning rounded-pill" data-addclass-on-xs="btn-sm">Download</a>
							</div>
						  </div>
<?php
			}
?>
					  </div>

				  </div>
				</div>
			  </div>
<?php
		}
		$num++;
	}
?>
<!---------------------------------------------------->
			</div>

        </div>
      </div>
    </div>
