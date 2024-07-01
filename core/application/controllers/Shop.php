<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('shop', $head, $data);
    }

}