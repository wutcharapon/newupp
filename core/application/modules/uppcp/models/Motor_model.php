<?php

class Motor_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getMotor($limit=0, $page=0)
    {
		$this->db->select('record_motor.*,packet.PACKETCODE');
        $this->db->join('packet', 'packet.id = record_motor.packid', 'left');
		$this->db->order_by('record_motor.id','desc');
        $query = $this->db->get('record_motor', $limit, $page);
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row ) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function motorCount()
    {
        return $this->db->count_all_results('record_motor');
    }

}
