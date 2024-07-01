<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class error404 extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('error404', $head, $data);
    }
}