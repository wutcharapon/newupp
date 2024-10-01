<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
		$value = $_POST['value'] ?? 'news';
        $data = array();
		$head = array();
		$data['slide'] = $this->Public_model->getSlide();
		$data['news'] = $this->Public_model->getPosts('8', '0', $value); 
        $this->render('home', $head, $data);
		//$this->load->view('templates/_parts/header');
		//$this->load->view('home');
		//$this->load->view('templates/_parts/footer');
    }


	
}