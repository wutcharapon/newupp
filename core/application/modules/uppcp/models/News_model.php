<?php

class News_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

     public function setNews($post, $id = 0)
    {
        $this->db->trans_begin();
        $is_update = false;
        if ($id > 0) {
			$is_update = true;
			if($post['image']==null and $post['thumb']==null) {
				if (!$this->db->where('id', $id)->update('blog_posts', array(
                        'title' => $post['title'],
                        'categories' => 1,
						'url' => preg_replace("/[^a-zA-Zก-ฮเแ\-\d]/", '', str_replace('%','เปอร์เซ็นต์',$post['title'])). '_' . $id //str_replace(')','',str_replace('(','',(str_replace(" ","-",$post['title'])))) . '_' . $id
                 )));
			} else {
				if (!$this->db->where('id', $id)->update('blog_posts', array(
                        'title' => $post['title'],
                        'image' => $post['image'],
						'thumb' => $post['thumb'],
                        'categories' => 1,
						'url' => preg_replace("/[^a-zA-Zก-ฮเแ\-\d]/", '', str_replace('%','เปอร์เซ็นต์',$post['title'])). '_' . $id //str_replace(')','',str_replace('(','',(str_replace(" ","-",$post['title'])))) . '_' . $id
                 )));
			}
			//echo "Edit";
		} else {
            if (!$this->db->insert('blog_posts', array(
                        'title' => $post['title'],
                        'image' => $post['image'],
						'thumb' => $post['thumb'],
                        'categories' => 1,
                        'time' => time()
                    )));
            $id = $this->db->insert_id();
			$this->db->where('id', $id);
            if (!$this->db->update('blog_posts', array(
                        'url' => preg_replace("/[^a-zA-Zก-ฮเแ\-\d]/", '', str_replace('%','เปอร์เซ็นต์',$post['title'])). '_' . $id //str_replace(')','',str_replace('(','',(str_replace(" ","-",$post['title'])))) . '_' . $id
                )));
		}
        $this->setNewsTranslation($post, $id, $is_update);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
	}

    public function getOneNews($id)
    {
        $this->db->select('blog_posts.*, blog_description.subtitle, blog_description.description, blog_description.gallery');
        $this->db->where('blog_posts.id', $id);
        $this->db->join('blog_description', 'blog_description.for_id = blog_posts.id', 'left');
        $query = $this->db->get('blog_posts');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    private function setNewsTranslation($post, $id, $is_update)
    {
		$arr = array();
		$arr = array(
			'subtitle' => $post['subtitle'],
			'description' => $post['description'],
			'gallery' => $post['gallery'],
			'for_id' => $id
		);
		if ($is_update === true) {
			if (!$this->db->where('for_id', $id)->update('blog_description', $arr));
		} else {
			if (!$this->db->insert('blog_description', $arr));
		}
    }

    public function deleteNews($id)
    {
        $this->db->trans_begin();
        $this->db->where('for_id', $id);
        $this->db->delete('blog_description');
        $this->db->where('id', $id);
        $this->db->delete('blog_posts');
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

}
