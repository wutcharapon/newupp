<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Home slider -->
    <div class="swiper-container" id="home-slider">
      <div class="swiper-wrapper">

		<?php if(isset($slide) and $slide) { foreach ($slide as $post) { ?> 
				<div class="swiper-slide" data-cover="<?=base_url("uploads/slide/".$post['image']."")?>" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="660px"></div>
		<?php } } ?>

        <div class="swiper-slide" data-cover="assets/img/slider/S-1.png" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="660px">
          <div class="swiper-overlay left">
            <div class="text-center">
              <p class="display-4 animated" data-animate="fadeDown">ประกันรถยนต์<br> SUPER 2</p>
              <a href="<?=base_url('motor_insurance')?>" class="btn btn-primary rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">รายละเอียด</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide" data-cover="assets/img/slider/S-2.png" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="660px">
          <div class="swiper-overlay right">
            <div class="text-center">
              <p class="display-3 animated" data-animate="fadeDown">โดนใจ !! <br>คุ้มเวอร์ 25+</p>
            </div>
          </div>
        </div>

		  <!--
        <div class="swiper-slide" data-cover="assets/img/slider/upp.png" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="650px">
          <div class="swiper-overlay right">

            <div class="text-center">
              <p class="display-4 animated" data-animate="fadeDown">Business Casual<br/>Outfit Ideas</p>
              <a href="shop-grid.html" class="btn btn-primary rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
            </div>

          </div>
        </div>
			-->
		  <!--
        <div class="swiper-slide" data-cover="assets/img/slider/upp1.png" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="650px">
          <div class="swiper-overlay right">

            <div class="text-center">
              <p class="display-4 animated" data-animate="fadeDown">Business Casual<br/>Outfit Ideas</p>
              <a href="shop-grid.html" class="btn btn-primary rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
            </div>

          </div>
        </div>

        <div class="swiper-slide" data-cover="assets/img/slider/upp2.png" data-xs-height="220px" data-sm-height="350px" data-md-height="400px" data-lg-height="430px" data-xl-height="460px">
          <div class="swiper-overlay left">

            <div class="text-center">
              <h1 class="bg-white text-dark d-inline-block p-1 animated" data-animate="fadeDown">TOP BRANDS</h1>
              <p class="display-4 animated" data-animate="fadeDown">30% - 70% OFF</p>
              <a href="shop-grid.html" class="btn btn-warning rounded-pill animated" data-animate="fadeUp" data-addclass-on-xs="btn-sm">SHOP NOW</a>
            </div>

          </div>
        </div>
			-->

      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev autohide"></div>
      <div class="swiper-button-next autohide"></div>
    </div>
    <!-- /Home slider -->

    <div class="container mt-3">

      <!-- Flash deals -->
      <div class="row mt-gutter">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title roboto-condensed bold"><i class="feather-shopping-bag" class="align-top"></i></i> ผลิตภัณฑ์ประกันภัย</h3>

              <div class="swiper-container" id="deals-slider">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">

                    <div class="card card-2col shadow-none">
                      <div class="d-flex flex-column-reverse flex-md-row">
                        <div class="card-2col-body">
                          <p class="h3 card-title">ประกันรถยนต์</p>
                          <p class="text-center">เที่ยวทั้งทีให้เราดูแล ไม่ต้องกังวลกับอุบัติเหตุ เจ็บป่วย กระเป๋าหาย ไฟลท์ดีเลย์ เราจัดการให้</p>
                          <a href="<?=base_url('motor_insurance')?>" ><button type="button" class="btn btn-primary rounded-pill atc-demo"> ดูผลิตภัณฑ์</button></a>
                        </div>
                        <div class="card-2col-img">
                          <div data-cover="assets/img/protectionz.svg" data-xs-height="150px" data-sm-height="200px" data-md-height="175px" data-lg-height="225px" data-xl-height="250px"></div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="swiper-slide">

                    <div class="card card-2col shadow-none">
                      <div class="d-flex flex-column-reverse flex-md-row">
                        <div class="card-2col-body">
                          <p class="h3 card-title">ประกันอัคคีภัย</p>
						  <p class="text-center">ให้บ้าน และครอบครัวที่คุณรักได้รับการปกป้องด้วยความใส่ใจ</p>
                          <a href="<?=base_url('fire_insurance')?>" ><button type="button" class="btn btn-primary rounded-pill atc-demo"> ดูผลิตภัณฑ์</button></a>
                        </div>
                        <div class="card-2col-img">
                          <div data-cover="assets/img/firez.svg" data-xs-height="150px" data-sm-height="200px" data-md-height="175px" data-lg-height="225px" data-xl-height="250px"></div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="swiper-slide">

                    <div class="card card-2col shadow-none">
                      <div class="d-flex flex-column-reverse flex-md-row">
                        <div class="card-2col-body">
                          <p class="h3 card-title">ประกันภัยเบ็ดเตล็ด</p>
						  <p class="text-center">คุ้มครองครอบคลุมทุกแง่มุมธุรกิจ</p>
                          <a href="<?=base_url('other_insurance')?>" ><button type="button" class="btn btn-primary rounded-pill atc-demo"> ดูผลิตภัณฑ์</button></a>
                        </div>
                        <div class="card-2col-img">
                          <div data-cover="assets/img/project-managementz.svg" data-xs-height="150px" data-sm-height="200px" data-md-height="175px" data-lg-height="225px" data-xl-height="250px"></div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="swiper-slide">

                    <div class="card card-2col shadow-none">
                      <div class="d-flex flex-column-reverse flex-md-row">
                        <div class="card-2col-body">
                          <p class="h3 card-title">ประกันภัยทางทะเลและขนส่ง</p>
						  <p class="text-center">คุ้มครองอย่างครอบคลุมตลอดเส้นทางการขนส่งสินค้าทั้งทางบกทางเรือ และเรือยอร์ช</p>
                          <a href="<?=base_url('marine_cargo_insurance')?>" ><button type="button" class="btn btn-primary rounded-pill atc-demo"> ดูผลิตภัณฑ์</button></a>
                        </div>
                        <div class="card-2col-img">
                          <div data-cover="assets/img/exportationz.svg" data-xs-height="150px" data-sm-height="200px" data-md-height="175px" data-lg-height="225px" data-xl-height="250px"></div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="swiper-button-prev left-0"></div>
                <div class="swiper-button-next right-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Flash deals -->

      <!-- Top Categories 1 -->
	  
      <div class="row gutters-3">

		<div class="col">

          <div class="card my-4">
            <div class="card-body d-flex justify-content-end align-items-center py-2">
              <h3 class="mr-auto bold"><i class="fa fa-newspaper-o" aria-hidden="true"></i> ข่าว / บทความ</h3>
              <div class="dropdown dropdown-hover">
				<a href="<?=base_url('news')?>"></i>ข่าวสหมงคลฯ ทั้งหมด</a>
              </div>
            </div>
          </div>

          <div class="grid grid-gap-3 grid-col-1 grid-col-sm-3 my-3">
			<?php foreach ($news as $post) {?>
            <div class="card card-blog">
              <a href="<?=base_url('news/'.$post['url'].'.html')?>" class="zoom-hover"><img src="<?=getPostImage($post['image'],'post')?>" alt="<?=$post['title']?>"></a>
              <div class="card-body">
                <a href="<?=base_url('news/'.$post['url'].'.html')?>" class="title h4"><?=$post['title']?></a>
				<span><?=$post['subtitle']?></span>
                <!--<span>ทางบริษัทฯ ได้จัดให้มีพนักงานเคลม คอยให้บริการ ในวันเสาร์-อาทิตย์ และวันหยุดนักขัตฤกษ์ โดยประจำอยู่ตามจุดต่างๆ ทั่วเขตพื้นที่เมืองเชียงใหม่ ท่านสามารถโทรติดต่อเพื่อนัดหมายได้ที่ Call center 02-687-7777 (24 ชั่วโมง) </span>-->
              </div>
              <div class="card-footer flex-center">
			  <div class="small text-muted counter">
				  <i class="feather-clock"></i> <?= dateTHFormat(date('Y-m-d', $post['time'])) ?>
                </div>
                <a href="<?=base_url('news/'.$post['url'].'.html')?>" class="bold">อ่านต่อ</a>
              </div>
            </div>
			<?php } ?>
<!--
            <div class="card card-blog">
              <a href="blog-single.html" class="zoom-hover"><img src="assets/img/b-upp-1.jpg" alt="Blog"></a>
              <div class="card-body">
                <a href="blog-single.html" class="title h4">สาขาเชียงใหม่ แจ้งเปลี่ยนแปลงระบบให้บริการสินไหม</a>
                <span>ทางบริษัทฯ ได้จัดให้มีพนักงานเคลม คอยให้บริการ ในวันเสาร์-อาทิตย์ และวันหยุดนักขัตฤกษ์ โดยประจำอยู่ตามจุดต่างๆ ทั่วเขตพื้นที่เมืองเชียงใหม่ ท่านสามารถโทรติดต่อเพื่อนัดหมายได้ที่ Call center 02-687-7777 (24 ชั่วโมง) </span>
              </div>
              <div class="card-footer flex-center">
                <a href="blog-single.html" class="bold">อ่านต่อ</a>
              </div>
            </div>

            <div class="card card-blog">
              <a href="blog-single.html" class="zoom-hover"><img src="assets/img/b-upp-1.jpg" alt="Blog"></a>
              <div class="card-body">
                <a href="blog-single.html" class="title h4">เรียนเชิญท่านตัวแทนทุกท่านเข้าร่วมอบรมเพื่อต่อบัตรตัวแทนครั้งที่ 1-3</a>
                <span>สหมงคลประกันภัย ร่วมกับสถาบันประกันภัยจัดอบรมตัวแทน เรียนเชิญท่านตัวแทนทุกท่านเข้าร่วมอบรมเพื่อต่อบัตรตัวแทนครั้งที่ 1-3 ระหว่างวันที่ 1-2 มิถุนายน 2561 เวลา 9.00 - 16.00 น. ณ.โรงแรมเมอร์เคียวเชียงใหม่</span>
              </div>
              <div class="card-footer flex-center">
                <a href="blog-single.html" class="bold">อ่านต่อ</a>
              </div>
            </div>

            <div class="card card-blog">
              <a href="blog-single.html" class="zoom-hover"><img src="assets/img/b-upp-1.jpg" alt="Blog"></a>
              <div class="card-body">
                <a href="blog-single.html" class="title h4">กำหนดการอบรมตัวแทนและนายหน้าปี 2561</a>
                <span>กำหนดการอบรมตัวแทนประกันวินาศภัย
				- ตารางการจัดอบรมตัวแทน/นายหน้า ครั้งที่ 1 -  3 พร้อมใบสมัคร ของปี 61
				- ตารางอบรมตัวแทน/นายหน้า ครั้งที่ 4 พร้อมใบสมัคร ของปี 61</span>
              </div>
              <div class="card-footer flex-center">
                <a href="blog-single.html" class="bold">อ่านต่อ</a>
              </div>
            </div>
-->
          </div>
          <!-- /Blog Grid -->

      </div>

      </div>

	</div>
