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
                                <label>เลือกแสดงเฉพาะจังหวัดที่ต้องการ</label>
                                <select class="form-control custom-select"
                                    onchange="if (this.value) window.location.href=this.value">
                                    <option value="<?=base_url("garage") ?>" <?=($gt == "all")? "selected" : ""?>>
                                        ทั้งหมด</option>
                                    <option value="<?=base_url("garage/krabi") ?>"
                                        <?=($gt == "krabi") ? "selected" : "" ?>>กระบี่ </option>
                                    <option value="<?=base_url("garage/bangkok") ?>"
                                        <?=($gt == "bangkok") ? "selected" : "" ?>>กรุงเทพมหานคร </option>
                                    <option value="<?=base_url("garage/kanchanaburi") ?>"
                                        <?=($gt == "kanchanaburi") ? "selected" : "" ?>>กาญจนบุรี </option>
                                    <option value="<?=base_url("garage/kalasin") ?>"
                                        <?=($gt == "kalasin") ? "selected" : "" ?>>กาฬสินธุ์ </option>
                                    <option value="<?=base_url("garage/kamphaengphet") ?>"
                                        <?=($gt == "kamphaengphet") ? "selected" : "" ?>>กำแพงเพชร </option>
                                    <option value="<?=base_url("garage/khonkaen") ?>"
                                        <?=($gt == "khonkaen") ? "selected" : "" ?>>ขอนแก่น </option>
                                    <option value="<?=base_url("garage/chanthaburi") ?>"
                                        <?=($gt == "chanthaburi") ? "selected" : "" ?>>จันทบุรี </option>
                                    <option value="<?=base_url("garage/chachoengsao") ?>"
                                        <?=($gt == "chachoengsao") ? "selected" : "" ?>>ฉะเชิงเทรา </option>
                                    <option value="<?=base_url("garage/chonburi") ?>"
                                        <?=($gt == "chonburi") ? "selected" : "" ?>>ชลบุรี </option>
                                    <option value="<?=base_url("garage/chainat") ?>"
                                        <?=($gt == "chainat") ? "selected" : "" ?>>ชัยนาท </option>
                                    <option value="<?=base_url("garage/chaiyaphum") ?>"
                                        <?=($gt == "chaiyaphum") ? "selected" : "" ?>>ชัยภูมิ </option>
                                    <option value="<?=base_url("garage/chumphon") ?>"
                                        <?=($gt == "chumphon") ? "selected" : "" ?>>ชุมพร </option>
                                    <option value="<?=base_url("garage/chiangrai") ?>"
                                        <?=($gt == "chiangrai") ? "selected" : "" ?>>เชียงราย </option>
                                    <option value="<?=base_url("garage/chiangmai") ?>"
                                        <?=($gt == "chiangmai") ? "selected" : "" ?>>เชียงใหม่ </option>
                                    <option value="<?=base_url("garage/trang") ?>"
                                        <?=($gt == "trang") ? "selected" : "" ?>>ตรัง </option>
                                    <option value="<?=base_url("garage/trat") ?>"
                                        <?=($gt == "trat") ? "selected" : "" ?>>ตราด </option>
                                    <option value="<?=base_url("garage/tak") ?>" <?=($gt == "tak") ? "selected" : "" ?>>
                                        ตาก </option>
                                    <option value="<?=base_url("garage/nakhonnayok") ?>"
                                        <?=($gt == "nakhonnayok") ? "selected" : "" ?>>นครนายก </option>
                                    <option value="<?=base_url("garage/nakhonpathom") ?>"
                                        <?=($gt == "nakhonpathom") ? "selected" : "" ?>>นครปฐม </option>
                                    <option value="<?=base_url("garage/nakhonphanom") ?>"
                                        <?=($gt == "nakhonphanom") ? "selected" : "" ?>>นครพนม </option>
                                    <option value="<?=base_url("garage/nakhonratchasima") ?>"
                                        <?=($gt == "nakhonratchasima") ? "selected" : "" ?>>นครราชสีมา </option>
                                    <option value="<?=base_url("garage/nakhonsithammarat") ?>"
                                        <?=($gt == "nakhonsithammarat") ? "selected" : "" ?>>นครศรีธรรมราช </option>
                                    <option value="<?=base_url("garage/nakhonsawan") ?>"
                                        <?=($gt == "nakhonsawan") ? "selected" : "" ?>>นครสวรรค์ </option>
                                    <option value="<?=base_url("garage/nonthaburi") ?>"
                                        <?=($gt == "nonthaburi") ? "selected" : "" ?>>นนทบุรี </option>
                                    <option value="<?=base_url("garage/narathiwat") ?>"
                                        <?=($gt == "narathiwat") ? "selected" : "" ?>>นราธิวาส </option>
                                    <option value="<?=base_url("garage/nan") ?>" <?=($gt == "nan") ? "selected" : "" ?>>
                                        น่าน </option>
                                    <option value="<?=base_url("garage/buengkan") ?>"
                                        <?=($gt == "buengkan") ? "selected" : "" ?>>บึงกาฬ </option>
                                    <option value="<?=base_url("garage/buriram") ?>"
                                        <?=($gt == "buriram") ? "selected" : "" ?>>บุรีรัมย์ </option>
                                    <option value="<?=base_url("garage/pathumthani") ?>"
                                        <?=($gt == "pathumthani") ? "selected" : "" ?>>ปทุมธานี </option>
                                    <option value="<?=base_url("garage/prachuapkhirikhan") ?>"
                                        <?=($gt == "prachuapkhirikhan") ? "selected" : "" ?>>ประจวบคีรีขันธ์ </option>
                                    <option value="<?=base_url("garage/prachinburi") ?>"
                                        <?=($gt == "prachinburi") ? "selected" : "" ?>>ปราจีนบุรี </option>
                                    <option value="<?=base_url("garage/pattani") ?>"
                                        <?=($gt == "pattani") ? "selected" : "" ?>>ปัตตานี </option>
                                    <option value="<?=base_url("garage/phranakhonsiayutthaya") ?>"
                                        <?=($gt == "phranakhonsiayutthaya") ? "selected" : "" ?>>พระนครศรีอยุธยา
                                    </option>
                                    <option value="<?=base_url("garage/phayao") ?>"
                                        <?=($gt == "phayao") ? "selected" : "" ?>>พะเยา </option>
                                    <option value="<?=base_url("garage/phangnga") ?>"
                                        <?=($gt == "phangnga") ? "selected" : "" ?>>พังงา </option>
                                    <option value="<?=base_url("garage/phatthalung") ?>"
                                        <?=($gt == "phatthalung") ? "selected" : "" ?>>พัทลุง </option>
                                    <option value="<?=base_url("garage/phichit") ?>"
                                        <?=($gt == "phichit") ? "selected" : "" ?>>พิจิตร </option>
                                    <option value="<?=base_url("garage/phitsanulok") ?>"
                                        <?=($gt == "phitsanulok") ? "selected" : "" ?>>พิษณุโลก </option>
                                    <option value="<?=base_url("garage/phetchaburi") ?>"
                                        <?=($gt == "phetchaburi") ? "selected" : "" ?>>เพชรบุรี </option>
                                    <option value="<?=base_url("garage/phetchabun") ?>"
                                        <?=($gt == "phetchabun") ? "selected" : "" ?>>เพชรบูรณ์ </option>
                                    <option value="<?=base_url("garage/phrae") ?>"
                                        <?=($gt == "phrae") ? "selected" : "" ?>>แพร่ </option>
                                    <option value="<?=base_url("garage/phuket") ?>"
                                        <?=($gt == "phuket") ? "selected" : "" ?>>ภูเก็ต </option>
                                    <option value="<?=base_url("garage/mahasarakham") ?>"
                                        <?=($gt == "mahasarakham") ? "selected" : "" ?>>มหาสารคาม </option>
                                    <option value="<?=base_url("garage/mukdahan") ?>"
                                        <?=($gt == "mukdahan") ? "selected" : "" ?>>มุกดาหาร </option>
                                    <option value="<?=base_url("garage/maehongson") ?>"
                                        <?=($gt == "maehongson") ? "selected" : "" ?>>แม่ฮ่องสอน </option>
                                    <option value="<?=base_url("garage/yasothon") ?>"
                                        <?=($gt == "yasothon") ? "selected" : "" ?>>ยโสธร </option>
                                    <option value="<?=base_url("garage/yala") ?>"
                                        <?=($gt == "yala") ? "selected" : "" ?>>ยะลา </option>
                                    <option value="<?=base_url("garage/roiet") ?>"
                                        <?=($gt == "roiet") ? "selected" : "" ?>>ร้อยเอ็ด </option>
                                    <option value="<?=base_url("garage/ranong") ?>"
                                        <?=($gt == "ranong") ? "selected" : "" ?>>ระนอง </option>
                                    <option value="<?=base_url("garage/rayong") ?>"
                                        <?=($gt == "rayong") ? "selected" : "" ?>>ระยอง </option>
                                    <option value="<?=base_url("garage/ratchaburi") ?>"
                                        <?=($gt == "ratchaburi") ? "selected" : "" ?>>ราชบุรี </option>
                                    <option value="<?=base_url("garage/lopburi") ?>"
                                        <?=($gt == "lopburi") ? "selected" : "" ?>>ลพบุรี </option>
                                    <option value="<?=base_url("garage/lampang") ?>"
                                        <?=($gt == "lampang") ? "selected" : "" ?>>ลำปาง </option>
                                    <option value="<?=base_url("garage/lamphun") ?>"
                                        <?=($gt == "lamphun") ? "selected" : "" ?>>ลำพูน </option>
                                    <option value="<?=base_url("garage/loei") ?>"
                                        <?=($gt == "loei") ? "selected" : "" ?>>เลย </option>
                                    <option value="<?=base_url("garage/sisaket") ?>"
                                        <?=($gt == "sisaket") ? "selected" : "" ?>>ศรีสะเกษ </option>
                                    <option value="<?=base_url("garage/sakonnakhon") ?>"
                                        <?=($gt == "sakonnakhon") ? "selected" : "" ?>>สกลนคร </option>
                                    <option value="<?=base_url("garage/songkhla") ?>"
                                        <?=($gt == "songkhla") ? "selected" : "" ?>>สงขลา </option>
                                    <option value="<?=base_url("garage/satun") ?>"
                                        <?=($gt == "satun") ? "selected" : "" ?>>สตูล </option>
                                    <option value="<?=base_url("garage/samutprakan") ?>"
                                        <?=($gt == "samutprakan") ? "selected" : "" ?>>สมุทรปราการ </option>
                                    <option value="<?=base_url("garage/samutsongkhram") ?>"
                                        <?=($gt == "samutsongkhram") ? "selected" : "" ?>>สมุทรสงคราม </option>
                                    <option value="<?=base_url("garage/samutsakhon") ?>"
                                        <?=($gt == "samutsakhon") ? "selected" : "" ?>>สมุทรสาคร </option>
                                    <option value="<?=base_url("garage/sakaeo") ?>"
                                        <?=($gt == "sakaeo") ? "selected" : "" ?>>สระแก้ว </option>
                                    <option value="<?=base_url("garage/saraburi") ?>"
                                        <?=($gt == "saraburi") ? "selected" : "" ?>>สระบุรี </option>
                                    <option value="<?=base_url("garage/singburi") ?>"
                                        <?=($gt == "singburi") ? "selected" : "" ?>>สิงห์บุรี </option>
                                    <option value="<?=base_url("garage/sukhothai") ?>"
                                        <?=($gt == "sukhothai") ? "selected" : "" ?>>สุโขทัย </option>
                                    <option value="<?=base_url("garage/suphanburi") ?>"
                                        <?=($gt == "suphanburi") ? "selected" : "" ?>>สุพรรณบุรี </option>
                                    <option value="<?=base_url("garage/suratthani") ?>"
                                        <?=($gt == "suratthani") ? "selected" : "" ?>>สุราษฎร์ธานี </option>
                                    <option value="<?=base_url("garage/surin") ?>"
                                        <?=($gt == "surin") ? "selected" : "" ?>>สุรินทร์ </option>
                                    <option value="<?=base_url("garage/nongkhai") ?>"
                                        <?=($gt == "nongkhai") ? "selected" : "" ?>>หนองคาย </option>
                                    <option value="<?=base_url("garage/nongbualamphu") ?>"
                                        <?=($gt == "nongbualamphu") ? "selected" : "" ?>>หนองบัวลำภู </option>
                                    <option value="<?=base_url("garage/angthong") ?>"
                                        <?=($gt == "angthong") ? "selected" : "" ?>>อ่างทอง </option>
                                    <option value="<?=base_url("garage/amnatcharoen") ?>"
                                        <?=($gt == "amnatcharoen") ? "selected" : "" ?>>อำนาจเจริญ </option>
                                    <option value="<?=base_url("garage/udonthani") ?>"
                                        <?=($gt == "udonthani") ? "selected" : "" ?>>อุดรธานี </option>
                                    <option value="<?=base_url("garage/uttaradit") ?>"
                                        <?=($gt == "uttaradit") ? "selected" : "" ?>>อุตรดิตถ์ </option>
                                    <option value="<?=base_url("garage/uthaithani") ?>"
                                        <?=($gt == "uthaithani") ? "selected" : "" ?>>อุทัยธานี </option>
                                    <option value="<?=base_url("garage/ubonratchathani") ?>"
                                        <?=($gt == "ubonratchathani") ? "selected" : "" ?>>อุบลราชธานี </option>
                                </select>
                                <h2 class="text-center mt-2"></h2>
                                <label>ค้นหาเฉพาะชื่ออู่</label>
                                <div class="input-group input-group-search">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-light d-flex d-sm-none search-toggle" type="button"><i
                                                data-feather="chevron-left"></i></button>
                                    </div>
                                    <input type="text" class="form-control border-0 bg-light input-search" name="garage"
                                        placeholder="ชื่ออู่...">
                                    <div class="input-group-append">
                                        <button class="btn btn-light" type="submit"><i
                                                data-feather="search"></i></button>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <a href="<?=base_url('dl/file/อู่ในเครือ_ตุลาคม_2565.pdf')?>" target="_blank">
                                    <p class="text-center"> ดาวน์โหลดรายชื่ออู่ในเครือ</p>
                                    </p>
                            </div>

                            <!--
                  <div class="form-group col-sm-12 col-md-6">
                    <label>ประเภท</label>
                    <select class="form-control custom-select" id="insutype" name="insutype">
                      <option value="">เลือก</option>
                      <option value="1">ประกันภัยรถยนต์ ชั้น 1</option>
                      <option value="2">ประกันภัยรถยนต์ ชั้น 2</option>
                      <option value="3">ประกันภัยรถยนต์ ชั้น 3</option>
                      <option value="5">ประกันภัยรถยนต์ ชั้น 5</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12 col-md-6">
                    <label>ปีรถยนต์</label>
                    <select class="form-control custom-select" id="year" name="year" disabled>
                      <option value="">เลือก</option>
                    </select>
                  </div>
				  <div class="form-group col-md-4 offset-md-4 my-3">
					<button type="submit" class="btn btn-primary btn-block rounded-pill">ค้นหา</button>
				  </div>
				  -->
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