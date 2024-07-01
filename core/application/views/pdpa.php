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
                <a href="<?=base_url('pdpa')?>">การคุ้มครองข้อมูลส่วนบุคคล</a>
              </li>
            </ol>
        </div>
      <div class="card">
        <div class="card-body">

			<div class="row">
				<div class="col-12 mb-2">
				  <h3 class="button"><i class="fa fa-file-text-o" aria-hidden="true"></i> การคุ้มครองข้อมูลส่วนบุคคล</h3>
				  <hr>
				</div>
			</div>

			<div id="accordion">

			  <div class="card">
				<div class="card-header" id="headpdpa1">
				  <h5 class="mb-0">
					<button class="btn btn-link" data-toggle="collapse" data-target="#collapse63" aria-expanded="true" aria-controls="pdpa1">การคุ้มครองข้อมูลส่วนบุคคล</button>
				  </h5>
				</div>

				<div id="pdpa1" class="collapse show" aria-labelledby="headpdpa1" data-parent="#accordion">
				  <div class="card-body">

					<div class="grid grid-gap-4 grid-col-1 grid-col-lg-4 mt-3">

						  <div class="card card-2col text-white zoom-hover">
							<img class="card-img" src="<?=base_url('assets/img/bg-1.png')?>" alt="Card image">
							<div class="card-img-overlay flex-center-top flex-column">
							  <h3 class="card-title">นโยบายความเป็นส่วนตัว</h3>
							  <a href="<?=base_url('dl/file/pdpa/Privacy_Policy.pdf')?>" target="_blank" class="btn btn-warning rounded-pill" data-addclass-on-xs="btn-sm">Download</a>
							</div>
						  </div>

						  <div class="card card-2col text-white zoom-hover">
							<img class="card-img" src="<?=base_url('assets/img/bg-1.png')?>" alt="Card image">
							<div class="card-img-overlay flex-center-top flex-column">
							  <h3 class="card-title">นโยบายบุคคลภายนอกฯ </h3>
							  <a href="<?=base_url('dl/file/pdpa/Third_Party.pdf')?>" target="_blank" class="btn btn-warning rounded-pill" data-addclass-on-xs="btn-sm">Download</a>
							</div>
						  </div>

						  <div class="card card-2col text-white zoom-hover">
							<img class="card-img" src="<?=base_url('assets/img/bg-1.png')?>" alt="Card image">
							<div class="card-img-overlay flex-center-top flex-column">
							  <h3 class="card-title">แบบคําร้องการใช้สิทธิของเจ้าของข้อมูลส่วนบุคคล</h3>
							  <a href="<?=base_url('dl/file/pdpa/Notice.pdf')?>" target="_blank" class="btn btn-warning rounded-pill" data-addclass-on-xs="btn-sm">Download</a>
							</div>
						  </div>

					</div>


				  </div>
				</div>
			  </div>

			</div>

        </div>
      </div>
    </div>
