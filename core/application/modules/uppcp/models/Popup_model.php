<?php

class Popup_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

     public function setPopup($post, $id = 0)
    {
        if ($id > 0) {
			if($post['image']==null and $post['thumb']==null) {
				$this->db->where('intro_id', $id)->update('intro', array(
                        'title' => $post['title'],
                        'status' => $post['sts'],
                        'date_start' => $post['date_start'],
                        'date_end' => $post['date_end']
                 ));
			} else {
				$this->db->where('intro_id', $id)->update('intro', array(
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
            if (!$this->db->insert('intro', array(
                        'title' => $post['title'],
                        'image' => $post['image'],
						'thumb' => $post['thumb'],
						'status' => $post['sts'],
                    )));
            $id = $this->db->insert_id();
			$this->db->where('intro_id', $id);
		}
	}

     public function getPopup()
    {
		$this->db->select('*');
        $query = $this->db->get('intro');
		$this->db->order_by('intro_id','desc');
        return $query->result_array();
	}

    public function getOnePopup($id)
    {
        $this->db->select('*');
        $this->db->where('intro_id', $id);
        $query = $this->db->get('intro');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function deletePopup($id)
    {
        $this->db->where('intro_id', $id);
        $this->db->delete('intro');
    }

}
