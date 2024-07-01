<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="container my-3">

    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li>
                <a href="<?=base_url()?>">หน้าหลัก</a>
            </li>
            <li>
                <a href="#">รายชื่ออู่ซ่อมรถ</a>
            </li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-12 mb-2">
                    <h3 class="button">รายชื่ออู่ซ่อมรถ</h3>
                    <p> บริษัท สหมงคลประกันภัย จำกัด คัดเลือกอู่ซ่อมรถยนต์ที่มีคุณภาพและมาตรฐานเข้าเป็นอู่ในเครือ
                        เพื่อรองรับการบริการครอบคลุมทุกพื้นที่ทั่วประเทศ</p>
                    <hr>
                </div>

                <div class="col-md-6 offset-sm-3 mb-3 mb-md-2">
                    <form class="form-style-1" action='<?=base_url('garage/search')?>' method="POST">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label>ค้นหาเฉพาะชื่ออู่</label>

                                <form class="form-inline form-search ml-auto mr-0 mr-sm-1 d-none d-sm-flex">
                                    <div class="input-group input-group-search">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light d-flex d-sm-none search-toggle"
                                                type="button"><i data-feather="chevron-left"></i></button>
                                        </div>
                                        <input type="text" class="form-control border-0 bg-light input-search"
                                            name="garage" placeholder="ชื่ออู่...">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="submit"><i
                                                    data-feather="search"></i></button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <a href="<?=base_url('dl/file/อู่ในเครือ_ตุลาคม_2565.pdf')?>" target="_blank">
                                    <p class="text-center"> ดาวน์โหลดรายชื่ออู่ในเครือ</p>
                                    </p>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- Map -->
                <?php foreach($garage as $post) { ?>
                <div class="col-md-6">
                    <div class="card-garage">
                        <div class="card-body"><img class="card-img-top"
                                src="<?=(isset($post['image']) and file_exists("uploads/garage/".$post['image']."") and $post['image'] != NULL) ? base_url('uploads/garage')."/".$post['image'] : base_url('assets/img/no-pic.jpg') ?>">
                        </div>
                        <h3 class="bold"><?=$post['name']?></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="media">
                                    <span><i class="fa fa-map-marker fa-fw text-info"></i></span>
                                    <div class="media-body ml-1">
                                        <p><?=($post['address']== NULL) ? "ไม่มีข้อมูล" : $post['address']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media mb-3 mb-md-0">
                                    <span><i class="fa fa-phone fa-fw text-info"></i></span>
                                    <div class="media-body ml-1">โทรศัพท์ <?=$post['tel']?></div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?=$post['linkgmap']?>" target="_blank" rel="noopener">
                                    <img src="<?=base_url("/assets/img/map.svg")?>" width="50px">
                                    <p><span><i class="fa fa-location-arrow fa-fw text-info textcenter"></i></span>
                                        แผนที่ Google</p>
                                </a>
                            </div>
                            <!--
                  <div class="col-md-12">
					  <div class="img-thumbnail">
						<div class="embed-responsive embed-map text-center">
						<?php if($post['embed'] == NULL) { ?>
						<img src="<?=base_url('assets/img/map_ho.png')?>" class="img-responsive">
						<?php } else { ?>
							<iframe src="https://www.google.com/maps/embed?pb=<?=$post['embed']?>" width="400" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						<?php } ?>
						</div>
					  </div>
                  </div>
				  -->
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>

            <?= (isset($links_pagination)) ? $links_pagination : null ?>
        </div>
    </div>

</div>
<!-- /Main Content -->