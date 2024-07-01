<?php 
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
//echo date("Y-d-m H:i:s",$_SESSION['__ci_last_regenerate']);
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="og:description" content= "สหมงคลประกันภัย UPP (ยูพีพี) เราพร้อมดูเเล และบริการคุณดุจดังญาติสนิทของคุณเอง "/>
	<meta property="og:site_name" content= "THE UNION PROSPERS INSURANCE CO.,LTD"/>
	<meta property="og:type" content= "website"/>
	<link rel="icon" type="image/png" href="<?=base_url('assets/img/ico-upp-site.png')?>">
    <!-- FONTS  -->
	<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet"> 
    <!-- REQUIRED CSS: BOOTSTRAP, METISMENU, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="<?=base_url('assets/css/vendor.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?=base_url('assets/css/feather.css')?>">
 <link rel="stylesheet" href="<?=base_url('assets/js/jquery/jquery-ui.min.css')?>">
 <link rel="stylesheet" href="<?=base_url('assets/js/jquery/daterangepicker.css')?>">



    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="<?=base_url('assets/js/swiper/swiper.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/js/noty/noty.min.css')?>">
    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="<?=base_url('assets/css/style.min.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/js/cookieconsent/cookieconsent.css')?>">

    <title>บริษัท สหมงคลประกันภัย จำกัด (มหาชน)</title>
  </head>
  <body>
	<div class="myloader"></div>
    <!-- Top bar -->
    <div class="topbar">
      <div class="container d-flex">
	
        <!-- social media -->
		<!--
        <nav class="nav">
          <a class="nav-link pr-2 pl-0" href="https://www.facebook.com/UnionProspersInsurance/" target="_blank"><i data-feather="facebook"></i> Official FB</a>
        </nav>
		-->
        <!-- language -->
        <nav class="nav nav-lang ml-auto"> <!-- push it to the right -->
          <a class="nav-link" href="https://vlnonline.upp.co.th/" target="_blank"> สมัครใจ. Online </a>
		  <a class="nav-link" style="color:white">|</a>
		  <a class="nav-link" href="https://cplonline.upp.co.th/" target="_blank"> พ.ร.บ. Online </a>
          <!--<a class="nav-link active" href="javascript:void(0)">TH</a>-->
          <!--<a class="nav-link pipe">|</a>-->
          <!--<a class="nav-link" href="javascript:void(0)">EN</a>-->
        </nav>

      </div>
    </div>

    <header>
      <div class="container">

        <a class="nav-link nav-icon ml-ni nav-toggler mr-3 d-flex d-lg-none" href="#" data-toggle="modal" data-target="#menuModal"><i data-feather="menu"></i></a>

		<div class="clearfix">
			<div class="logo-img">
				<a href="<?=base_url()?>" rel="home" title="บริษัท สหมงคลประกันภัย จำกัด (มหาชน)" class="active"><img class="nav-logo" src="<?=base_url('assets/img/logo-upp-site.png')?>" alt="" id="logo"></a>
			</div>
		</div>

        <ul class="nav nav-main ml-auto d-none d-lg-flex">
          <li class="nav-item dropdown dropdown-hover">
            <a class="nav-link dropdown-toggle forwardable" data-toggle="dropdown" href="<?=base_url('abouts') ?>" role="button" aria-haspopup="true" aria-expanded="false">
              รู้จักเรา <i data-feather="chevron-down"></i>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?=base_url('abouts/vision')?>">วิสัยทัศน์และพันธกิจ</a>
              <a class="dropdown-item" href="<?=base_url('abouts/financialstatus')?>">ฐานะทางการเงิน</a>
			  <a class="dropdown-item" href="<?=base_url('abouts/financialinfo')?>">งบการเงิน</a>
			  <a class="dropdown-item" href="<?=base_url('abouts/report')?>">รายงานประจำปี</a>
			  <a class="dropdown-item" href="<?=base_url('abouts')?>">เกี่ยวกับเรา</a>
			  <a class="dropdown-item" href="<?=base_url('pdpa')?>">การคุ้มครองข้อมูลส่วนบุคคล</a>
            </div>
          </li>
          <li class="nav-item dropdown dropdown-hover dropdown-mega">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              บริการลูกค้า <i data-feather="chevron-down"></i>
            </a>
            <div class="dropdown-menu">
              <div class="row">
                <div class="col-lg-4">
                  <div class="list-group list-group-flush list-group-no-border list-group-sm">
                    <a href="#" class="list-group-item list-group-item-action"><strong>บริการด้านสินไหมรถยนต์</strong></a>
                    <a href="<?=base_url('dl/เอกสารประกอบการเบิกค่าสินไหมทดแทน.pdf')?>" class="list-group-item list-group-item-action">- เอกสารเบิกค่าสินไหมทดแทน</a>
                    <a href="<?=base_url('service/ขั้นตอนดำเนินการด้านสินไหม_58.html')?>" class="list-group-item list-group-item-action">- บริการด้านสินไหมรถยนต์</a>
					<a href="<?=base_url('service/บริการด้านสินไหมรถยนต์_59.html')?>" class="list-group-item list-group-item-action">- ขั้นตอนดำเนินการด้านสินไหม</a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="list-group list-group-flush list-group-no-border list-group-sm">
                    <a href="#" class="list-group-item list-group-item-action"><strong>บริการด้านสินไหม Non-motor</strong></a>
                    <a href="<?=base_url('dl/ขันตอนการแจ้งค่าสินไหม non-motor.pdf')?>" class="list-group-item list-group-item-action">- เอกสารเบิกค่าสินไหมทดแทน Non-motor </a>
                    <a href="<?=base_url('service/วิธีปฎิบัติเมื่อเกิดอุบัติเหตุหรือเกิดความเสียหาย_60.html')?>" class="list-group-item list-group-item-action">- วิธีปฎิบัติเมื่อเกิดอุบัติเหตุหรือเกิดความเสียหาย </a>
                    <a href="<?=base_url('service/ขั้นตอนดำเนินการด้านสินไหม_61.html')?>" class="list-group-item list-group-item-action">- ขั้นตอนดำเนินการด้านสินไหม </a>
                  </div>
                </div>
                <div class="col-lg-4 border-left">
                  <div class="list-group list-group-flush list-group-no-border list-group-sm">
                    <a href="<?=base_url('garage')?>" class="list-group-item list-group-item-action"><strong>รายชื่ออู่ซ่อมรถ</strong></a>
                    <a href="<?=base_url('accident')?>" class="list-group-item list-group-item-action"><strong>ศูนย์รับแจ้งอุบัติเหตุ</strong></a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown dropdown-hover dropdown-mega">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              ผลิตภัณฑ์ <i data-feather="chevron-down"></i>
            </a>
            <div class="dropdown-menu">
              <div class="row">
                <div class="col-lg-4">
                  <div class="list-group list-group-flush list-group-no-border list-group-sm">
                    <a href="#" class="list-group-item list-group-item-action"><strong>ประกันภัยรถยนต์</strong></a>
                    <a href="<?=base_url('motor_insurance?show=1') ?>" class="list-group-item list-group-item-action">ประกันภัยรถยนต์ ประเภท 1,3,5</a>
                    <a href="<?=base_url('motor_insurance?show=2') ?>" class="list-group-item list-group-item-action">ประกันภัยรถยนต์ (พ.ร.บ.)</a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="list-group list-group-flush list-group-no-border list-group-sm">
                    <a href="#" class="list-group-item list-group-item-action"><strong>ประกันภัยอื่นๆ</strong></a>
                    <a href="<?=base_url('fire_insurance') ?>" class="list-group-item list-group-item-action">การประกันอัคคีภัย</a>
                    <a href="<?=base_url('other_insurance') ?>" class="list-group-item list-group-item-action">การประกันภัยเบ็ดเตล็ด</a>
                    <a href="<?=base_url('marine_cargo_insurance') ?>" class="list-group-item list-group-item-action">การประกันภัยทางทะเลและขนส่ง</a>
                  </div>
                </div>
                <div class="col-lg-4 border-left">
                  <div class="list-group list-group-flush list-group-no-border list-group-sm">
				  <!--
                    <a href="<?=base_url('products') ?>" class="list-group-item list-group-item-action"><strong>โปรโมชั่น</strong></a>
					<a href="<?=base_url('motor_insurance/search') ?>" class="list-group-item list-group-item-action"><strong>ค้นหาประกันรถ</strong></a>
				-->
					<a href="<?=base_url('shop') ?>" class="list-group-item list-group-item-action"><strong>สินค้าจำหน่ายตัวแทน</strong></a>
					<a href="<?=base_url('downloads') ?>" class="list-group-item list-group-item-action"><strong>ดาวร์โหลด</strong></a>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown dropdown-hover">
            <a class="nav-link dropdown-toggle forwardable" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              ตัวแทน/นายหน้า <i data-feather="chevron-down"></i>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?=base_url('agent') ?>">การสมัครตัวแทน</a>
              <a class="dropdown-item" href="<?=base_url('service/การชำระเบี้ยประกัน_62.html') ?>">การชำระค่าเบี้ยประกัน</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('contacts')?>">ติดต่อเรา</a>
          </li>
        </ul>

      </div>
    </header>