<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function pagination($url, $rowscount, $per_page, $segment = 2)
{
    $ci = & get_instance();

    $config = array();
    $config["base_url"] = base_url() . '/' . $url ;
    $config["total_rows"] = $rowscount;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $segment;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
	$config['next_link'] = 'ถัดไป';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = 'ย้อนกลับ';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}

function pagination_g($url, $rowscount, $per_page, $cur_page, $segment = 2)
{
    $ci = & get_instance();

    $config = array();
    $config["base_url"] = base_url() . '/' . $url ;
    $config["total_rows"] = $rowscount;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $segment;
	$config['cur_page'] = $cur_page + 1;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
	$config['next_link'] = 'ถัดไป';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = 'ย้อนกลับ';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}

function pagination_bakend($url, $rowscount, $per_page, $cur_page, $segment = 2)
{
    $ci = & get_instance();

    $config = array();
    $config["base_url"] = base_url($url);
    $config["total_rows"] = $rowscount;
    $config["per_page"] = $per_page;
    $config["uri_segment"] = $segment;
	$config['cur_page'] = $cur_page + 1;
    $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
    $config['full_tag_close'] = '</ul></div>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['next_link'] = 'ถัดไป';
    $config['prev_link'] = 'ย้อนกลับ';
	$config['first_link'] = 'เริ่มต้น';
	$config['last_link'] = 'สุดท้าย';
    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}
