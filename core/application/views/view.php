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
              <h3 class="button"><?=$article['title']?></h3>
			  <ul class="list-inline">
                <li class="list-inline-item"><i class="feather-clock"></i> <small><?= dateTHFormat(date('Y-m-d', $article['time'])) ?></small></li>
              </ul>
			  <hr>
            </div>

			<div class="col-12 mb-2">
				<?php if(isset($article['image'])) {  ?>
					
				<div class="col-md-8 offset-md-2 offset-sm-0 mb-3 mb-md-4">
					<div data-cover="<?=base_url('uploads/post/'.$article['image'])?>" data-xs-height="150px" data-sm-height="200px" data-md-height="175px" data-lg-height="225px" data-xl-height="400px"></div>
				</div>
				<?php } ?>
				<?=$article['description']?>

				<?php if($article['video'] != '') { ?>
					<div class="col-12 mb-2">
						<link href="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video-js.min.css" rel="stylesheet">
						<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/7.10.2/video.min.js"></script>
						<video
							id="my-player"
							class="video-js"
							controls
							preload="auto"
							width="750"
							height="400"
							poster="<?=base_url('uploads/post/video/'.$article['video'].'.png')?>"
							data-setup='{ "fluid": true }'>
						  <source src="<?=base_url('uploads/post/video/'.$article['video'].'.mp4')?>" type="video/mp4"></source>
						  <source src="<?=base_url('uploads/post/video/'.$article['video'].'.webm')?>" type="video/webm"></source>
						</video>
					</div>
				<?php } ?>

				<?php if($article['gallery'] != '') { ?>
					<div class="col-md-8 offset-md-2 mb-3 mb-md-0">
						<p class="text-center">ภาพบรรยากาศ</p>
						<div class="swiper-container" id="home-slider">
						  <div class="swiper-wrapper">
							<?php
							  $folder = $this->config->item('root_upload').$this->config->item('path_post').$article['gallery']."/";
							  $images = glob($folder."*.{jpg,png,gif}", GLOB_BRACE);
							  foreach($images as $i){
								$file_info = pathinfo($i);
								echo "<div class=\"swiper-slide\" data-cover=\"".base_url('uploads/post/'.$article['gallery'].'/'.$file_info['basename'])."\" data-xs-height=\"220px\" data-sm-height=\"350px\" data-md-height=\"400px\" data-lg-height=\"430px\" data-xl-height=\"560px\"></div>";
							  }
							?>
						  </div>
						  <div class="swiper-pagination"></div>
						  <div class="swiper-button-prev autohide"></div>
						  <div class="swiper-button-next autohide"></div>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>

		</div>
	</div>
</div>

</div>