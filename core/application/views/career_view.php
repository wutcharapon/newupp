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
                <a href="<?=base_url($article['name'])?>"><?=$article['catedes']?></a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3><?=$article['title']?></h3>
			  <ul class="list-inline">
                <li class="list-inline-item"><i class="feather-clock"></i> <small><?= dateTHFormat(date('Y-m-d', $article['time'])) ?></small></li>
              </ul>
			  <hr>
            </div>

			<div class="col-12 mb-2">
				<?=$article['description']?>
			</div>
			<hr>

		</div>
	</div>
</div>

</div>