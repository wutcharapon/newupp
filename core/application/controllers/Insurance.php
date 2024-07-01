<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insurance extends MY_Controller {

	private $num_rows = 5;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		$data['career'] = $this->Public_model->getPosts($this->num_rows, $page, 'career');
		$rowscount = $this->Public_model->postsCount('career');
		$data['links_pagination'] = pagination('career', $rowscount, $this->num_rows);
        $this->render('insurance', $head, $data);
    }

    public function view($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            $this->render('error404', $head, $data);
        }
        $data = array();
		$head = array();
        $data['article'] = $this->Public_model->getOnePost('career',$id);
        if ($data['article'] == null) {
			$this->render('error404', $head, $data);
        }
		$this->render('career_view', $head, $data);
    }

}