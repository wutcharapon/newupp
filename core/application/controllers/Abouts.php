<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abouts extends MY_Controller {

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index()
    {
        $data = array();
		$head = array();
        $this->render('abouts', $head, $data);
    }

    public function vision()
    {
        $data = array();
		$head = array();
        $this->render('vision', $head, $data);
    }

    public function financialinfo()
	{
        $data = array();
		$head = array();
        $this->render('financialinfo', $head, $data);
	}

    public function financialstatus()
	{
        $data = array();
		$head = array();
		//$data['fnc'] = $this->Public_model->getFNC();
		$data['fncgroup'] = $this->Public_model->getFNCGroup();
        $this->render('financialstatus', $head, $data);
	}

    public function report()
    {
        $data = array();
		$head = array();
        $this->render('report', $head, $data);
    }

}