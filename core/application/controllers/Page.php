<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('page', $head, $data);
    }
}