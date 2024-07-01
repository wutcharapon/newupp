<?php

class Career_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPostsCareer()
    {
        $this->db->join('career_description', 'career_description.for_id = career_posts.id', 'left');
		$this->db->group_by('career_posts.id');
		$this->db->select('career_posts.*, career_description.description as descript, career_description.career_view');
        $query = $this->db->get('career_posts');
        return $query->result_array();
    }

     public function setCareer($post, $id = 0)
    {
        $this->db->trans_begin();
        $is_update = false;
        if ($id > 0) {
			$is_update = true;
            if (!$this->db->where('id', $id)->update('career_posts', array(
                        'title' => $post['title'],
                        'req' => $post['req'],
						'time_exp' => $post['time_exp'],
						'categories' => '4',
						'url' => str_replace(" ","-",$post['title']) . '_' . $id,
                        'time' => time()
                    )));
			//echo "Edit";
		} else {
            if (!$this->db->insert('career_posts', array(
                        'title' => $post['title'],
                        'req' => $post['req'],
						'time_exp' => $post['time_exp'],
						'categories' => '4',
                        'time' => time()
                    )));
            $id = $this->db->insert_id();
			$this->db->where('id', $id);
            if (!$this->db->update('career_posts', array(
                        'url' => str_replace(" ","-",$post['title']) . '_' . $id
                )));
		}
        $this->setCareerTranslation($post, $id, $is_update);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
	}

    public function getOneCareer($id)
    {
        $this->db->select('career_posts.*, career_description.description');
        $this->db->where('career_posts.id', $id);
        $this->db->join('career_description', 'career_description.for_id = career_posts.id', 'left');
        $query = $this->db->get('career_posts');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    private function setCareerTranslation($post, $id, $is_update)
    {
		$arr = array();
		$arr = array(
			'description' => $post['description'],
			'for_id' => $id
		);
		if ($is_update === true) {
			if (!$this->db->where('for_id', $id)->update('career_description', $arr));
		} else {
			if (!$this->db->insert('career_description', $arr));
		}
    }

    public function deleteCareer($id)
    {
        $this->db->trans_begin();
        $this->db->where('for_id', $id);
        $this->db->delete('career_description');
        $this->db->where('id', $id);
        $this->db->delete('career_posts');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

}
