<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

	private $num_rows = 5;

    public function __construct()
    {
		parent::__construct();
	}
	
    public function index($page = 0)
    {
        $data = array();
		$head = array();
		$data['news'] = $this->Public_model->getPosts($this->num_rows, $page, 'news');
		$rowscount = $this->Public_model->postsCount('news');
		$data['links_pagination'] = pagination('news', $rowscount, $this->num_rows);
        $this->render('news', $head, $data);
    }

    public function view($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            $this->render('error404', $head, $data);
        }
        $data = array();
		$head = array();
        $data['article'] = $this->Public_model->getOnePost('news',$id);
        if ($data['article'] == null) {
			$this->render('error404', $head, $data);
        }
		$this->render('view', $head, $data);
    }

}