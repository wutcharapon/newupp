<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garage extends MY_Controller {

	private $num_rows = 10;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($province = 'all', $page = 0)
    {
        $data = array();
		$head = array();
		$data['gt'] = $province;
		$data['garage'] = $this->Public_model->getGarage($this->num_rows, $page, $province);
		$rowscount = $this->Public_model->garageCount($province);
		$data['links_pagination'] = pagination_g('garage/'.$province, $rowscount, $this->num_rows, $page);
        $this->render('garage', $head, $data);
    }

    public function search()
    {
		$garage = (isset($_POST['garage'])) ? trim($_POST['garage']) : '';
        $data = array();
		$head = array();
		$data['garage'] = $this->Public_model->getGarageName($garage);
       
        $this->render('garage_search', $head, $data);
    }

}