<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accident extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
        $data = array();
		$head = array();
		$data['accident'] = $this->Public_model->getPostsAccident();
        $this->render('accident', $head, $data);
    }

}