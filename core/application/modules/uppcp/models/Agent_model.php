<?php

class Agent_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

     public function insGarage($post, $id = 0)
    {
        if ($id > 0) {
			if($post['image']==null and $post['thumb']==null) {
				$this->db->where('id', $id)->update('garage', array(
					'name' => $post['name'],
					'address' => $post['address'],
					'province' => $post['province'],
					'tel' => $post['tel'],
					'linkgmap' => $post['linkgmap'],
                    'sts' => $post['sts']
                 ));
			} else {
				$this->db->where('id', $id)->update('garage', array(
					'name' => $post['name'],
					'address' => $post['address'],
					'province' => $post['province'],
					'tel' => $post['tel'],
					'linkgmap' => $post['linkgmap'],
					'image' => $post['image'],
					'thumb' => $post['thumb'],
                    'sts' => $post['sts']
                 ));
			}
			//echo "Edit";
		} else {
            if (!$this->db->insert('garage', array(
				'name' => $post['name'],
				'address' => $post['address'],
				'province' => $post['province'],
				'tel' => $post['tel'],
				'linkgmap' => $post['linkgmap'],
				'image' => $post['image'],
				'thumb' => $post['thumb'],
				'sts' => $post['sts'],
			)));
            $id = $this->db->insert_id();
			$this->db->where('id', $id);
		}
	}

     public function getAgent($id)
    {
		$this->db->select('*');
		$this->db->where('agt_type', $id);
        $query = $this->db->get('reg_agent');
		$this->db->order_by('id','desc');
        return $query->result_array();
	}

    public function getOneRegis($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('reg_agent');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function lastidGarage()
    {
		$this->db->select_max('id', 'max');
        $query = $this->db->get('garage');
        if ($query->num_rows() > 0) {
		   $max = $query->row()->max;
		   return $max == 0 ? 1 : $max + 1;
        } else {
            return false;
        }
    }

    public function deleteGarage($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('garage');
    }

}
