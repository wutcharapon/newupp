<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends MY_Controller {

	private $num_rows = 5;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('downloads', $head, $data);
    }

}