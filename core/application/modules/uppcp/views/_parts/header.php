<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UPP Control</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/backend')?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/backend')?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/backend')?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/backend')?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/backend')?>/dist/css/skins/_all-skins.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets/backend')?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/backend')?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('uppcp')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U</b>PP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin-</b>UPP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets/backend')?>/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=ucfirst($this->session->logged_in) ?></span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('uppcp/logout') ?>"><i class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
		<?php if($this->session->class_login == '3' or $this->session->class_login == '9') {?>
        <li class="<?=(strpos(uri_string(),'slide')) ? 'active' : '' ?>">
          <a href="<?=base_url('uppcp/slide')?>"><i class="fa fa-object-group"></i> <span>สไลด์</span></a>
        </li>
        <li class="<?=(strpos(uri_string(),'popup')) ? 'active' : '' ?>">
          <a href="<?=base_url('uppcp/popup')?>"><i class="fa fa-object-group"></i> <span>ป๊อปอัพ</span></a>
        </li>
		<?php } ?>
		<?php if($this->session->class_login == '3' or $this->session->class_login == '9') {?>
        <li class="<?=(strpos(uri_string(),'garage')) ? 'active' : '' ?>">
          <a href="<?=base_url('uppcp/garage')?>"><i class="fa fa-tachometer"></i> <span>รายชื่ออู่</span></a>
        </li>
		<?php } ?>
		<?php if($this->session->class_login == '1' or $this->session->class_login == '9') {?>
        <li class="treeview <?=(strpos(uri_string(),'career')) ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>รับสมัครงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('uppcp/career')?>"><i class="fa fa-circle-o"></i> เปิดรับสมัคร</a></li>
          </ul>
        </li>
		<?php } ?>
		<?php if($this->session->class_login == '3' or $this->session->class_login == '9') {?>
        <li class="treeview <?=(strpos(uri_string(),'news')) ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>ข่าวและบทความ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('uppcp/news')?>"><i class="fa fa-circle-o"></i> ข่าวและบทความ</a></li>
          </ul>
        </li>
		<?php } ?>
		<?php if($this->session->class_login == '99') {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>ประกันรถยนต์</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('uppcp/motor')?>"><i class="fa fa-circle-o"></i> บุคคลที่สนใจ</a></li>
          </ul>
        </li>
		<?php } ?>
		<?php if($this->session->class_login == '99') {?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>ประกันรถยนต์ Non-motor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('uppcp/career')?>"><i class="fa fa-circle-o"></i> เปิดรับสมัคร</a></li>
          </ul>
        </li>
		<?php } ?>
		<?php if($this->session->class_login == '9' or $this->session->class_login == '2') {?>
        <li class="treeview <?=(strpos(uri_string(),'agent')) ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-table"></i> <span>รับสมัครตัวแทน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('uppcp/agent/registered_agent')?>"><i class="fa fa-circle-o"></i>  ตัวแทนประกันวินาศภัย</a></li>
            <li><a href="<?=base_url('uppcp/agent/registered_broker')?>"><i class="fa fa-circle-o"></i>  นายหน้าประกันวินาศภัย</a></li>
            <li><a href="<?=base_url('uppcp/agent/registered_juristic_persons')?>"><i class="fa fa-circle-o"></i>  นายหน้านิติบุคคล</a></li>
			<?php if($this->session->class_login == '9') {?>
			<li><a href="<?=base_url('uppcp/agent/registered_test')?>"><i class="fa fa-circle-o"></i>  เทส</a></li>
			<li><a href="<?=base_url('uppcp/agent/pdf_agt/3')?>"><i class="fa fa-circle-o"></i>  เทส PDF</a></li>
			<?php } ?>
          </ul>
        </li>
		<?php } ?>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
