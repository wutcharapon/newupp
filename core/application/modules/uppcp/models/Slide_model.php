<?php

class Slide_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

     public function setSlide($post, $id = 0)
    {
        if ($id > 0) {
			if($post['image']==null and $post['thumb']==null) {
				$this->db->where('slide_id', $id)->update('slide', array(
                        'title' => $post['title'],
                        'status' => $post['sts'],
                        'date_start' => $post['date_start'],
                        'date_end' => $post['date_end']
                 ));
			} else {
				$this->db->where('slide_id', $id)->update('slide', array(
                        'title' => $post['title'],
                        'image' => $post['image'],
						'thumb' => $post['thumb'],
                        'status' => $post['sts'],
                        'date_start' => $post['date_start'],
                        'date_end' => $post['date_end']
                 ));
			}
			//echo "Edit";
		} else {
            if (!$this->db->insert('slide', array(
                        'title' => $post['title'],
                        'image' => $post['image'],
						'thumb' => $post['thumb'],
						'status' => $post['sts'],
                    )));
            $id = $this->db->insert_id();
			$this->db->where('slide_id', $id);
		}
	}

     public function getSlide()
    {
		$this->db->select('*');
        $query = $this->db->get('slide');
		$this->db->order_by('slide_id','desc');
        return $query->result_array();
	}

    public function getOneSlide($id)
    {
        $this->db->select('*');
        $this->db->where('slide_id', $id);
        $query = $this->db->get('slide');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function deleteSlide($id)
    {
        $this->db->where('slide_id', $id);
        $this->db->delete('slide');
    }

}
