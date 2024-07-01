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
                <a href="<?=base_url('news')?>">ข่าวและบทความ</a>
              </li>
            </ol>
        </div>

      <div class="card">
        <div class="card-body">
          <div class="row">

			<div class="col-12 mb-2">
              <h3>ข่าวและบทความ</h3>
			  <hr>
            </div>
		<?php if (empty($news)) { ?>

            <div class="col-lg-12 col-md-12">
				<p>ไม่พอข้อมูล</p>
            </div>

		<?php } else { foreach ($news as $post) { ?>

            <div class="col-lg-12 col-md-12">

              <div class="row gutters-3 mt-3">
                <div class="col-12">
                  <div class="card card-product card-product-list">
                    <a href="<?=base_url('news/'.$post['url'].'.html')?>"><img class="card-img-top" src="<?=getPostImage($post['thumb'],'post')?>" alt="img"></a>
                    <div class="card-body">
                      <a href="<?=base_url('news/'.$post['url'].'.html')?>" class="card-title"><?=$post['title']?></a>
                      <p class="d-none d-sm-block"><?=$post['subtitle']?> </p>
					  <p><?=dis_insutype(9)?></p>
                      <div class="btn-group">
                        <a href="<?=base_url('news/'.$post['url'].'.html')?>"><button class="btn btn-sm rounded-pill btn-outline-primary atc-demo">อ่านเพิ่มเติม</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>

			<?php 
				} 
			} 
			?>

          </div>
        </div>
		<?= (isset($links_pagination)) ? $links_pagination : null ?>
      </div>

		
	</div>