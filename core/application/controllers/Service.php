<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Controller {

	private $num_rows = 5;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
		redirect(base_url());
        $data = array();
		$head = array();
		$data['news'] = $this->Public_model->getPosts($this->num_rows, $page, 'service');
		$rowscount = $this->Public_model->postsCount('service');
		$data['links_pagination'] = pagination('service', $rowscount, $this->num_rows);
        $this->render('service', $head, $data);
    }

    public function view($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            $this->render('error404', $head, $data);
        }
        $data = array();
		$head = array();
        $data['article'] = $this->Public_model->getOnePost('service',$id);
        if ($data['article'] == null) {
			$this->render('error404', $head, $data);
        }
		$this->render('view', $head, $data);
    }

}