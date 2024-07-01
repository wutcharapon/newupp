<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function dateTHFormat($date, $f = 'full') {
	$month_full = array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');
	$month_short = array('01' => 'ม.ค.', '02' => 'ก.พ.', '03' => 'มี.ค.', '04' => 'เม.ย.', '05' => 'พ.ค.', '06' => 'มิ.ย.', '07' => 'ก.ค.', '08' => 'ส.ค.', '09' => 'ก.ย.', '10' => 'ต.ค.', '11' => 'พ.ย.', '12' => 'ธ.ค.');
	list($y, $m, $d) = explode('-', $date);
	if($f == 'full') {
		return $d.' '.$month_full[$m].' '.($y + 543);
	} else {
		return $d.' '.$month_short[$m].' '.($y + 543);
	}
}

function formatdate($date){
	if($date[2]=='/' or $date[4]=='-'){
		if($date[2]=='/') {
			list($d, $m, $y) = explode('/', $date);
			return $y.'-'.$m.'-'.$d;
		} else {
			list($y, $m, $d) = explode('-', $date);
			return $d.'/'.$m.'/'.$y;
		}
	} else {
		return false;
	}
}

function chkmkt($date) {
	list($g1, $g2) = explode(' ', $date);
	list($y, $m, $d) = explode('-', $g1);
	list($h, $mi, $s) = explode(':', $g2);
	return mktime($h, $mi, $s, $m, $d, $y);
}

function dis_carcode($data)
{
	switch ($data) {
		case 110:
			return "ประเภทรถยนต์นั่ง ส่วนบุคคล"; break;
		case 210:
			return "ประกันรถยนต์โดยสาร ส่วนบุคคล"; break;
		case 320:
			return "ประกันรถยนต์บรรทุก การพาณิชย์"; break;
		default:
			return false;
	} 
}

function dis_insutype($data)
{
	switch ($data) {
		case 1:
			return "ประกันภัยรถยนต์ ชั้น 1"; break;
		case 2:
			return "ประกันภัยรถยนต์ ชั้น 2"; break;
		case 3:
			return "ประกันภัยรถยนต์ ชั้น 3"; break;
		case "พรบ.":
			return "การประกันภัยรถยนต์(ภาคบังคับ)"; break;
		default:
			return false;
	} 
}

	function getPostImage($file, $path = 'etc') {
		$ci =& get_instance();
		$path = $ci->config->item('root_upload').$ci->config->item('path_'.$path);
		$full_path = $path.$file;
		if (isset($file) and file_exists($full_path) and is_file($full_path))
			return base_url($full_path);
		else
			return base_url('assets/img/upp-mc.png');
	}


	function check_recaptcha($recaptcha_response){
		$recaptcha_secret = "6LdkfsIZAAAAAPbXzKefItfUL98pxKyHyTkls1Zw";
		$recaptcha_remote_ip = $_SERVER['REMOTE_ADDR'];
				 
		$recaptcha_api = "https://www.google.com/recaptcha/api/siteverify?".
			http_build_query(array(
				'secret'=>$recaptcha_secret,
				'response'=>$recaptcha_response,
				'remoteip'=>$recaptcha_remote_ip
			)
		);
		$response=json_decode(file_get_contents($recaptcha_api), true);       
		return $response;
	}

