<?php

class Public_model extends CI_Model
{
	private $num_rows = 3;
    public function __construct()
    {
        parent::__construct();
    }

////////////////////////////////////////////////////////////////////////
    public function intro()
    {
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->where('date_start <=', date('Y-m-d H:i:s'));
		$this->db->where('date_end >=', date('Y-m-d H:i:s'));
        $query = $this->db->get('intro', 0,1);
		$this->db->limit(1);
		$this->db->order_by('intro_id','desc');
        return $query->row_array();
	}

    public function chkf($t,$s)
    {
		$query = $this->db->list_fields($t);
		if(array_search($s,$query,true)){
			return true;
		} else {
			return false;
		}
	}

    public function getCarprice($sdata, $cargroup='',$mak='',$year='',$model='',$engdesc='',$carcode='')
    {
		$this->db->distinct();
		if($model !== ''){
			$this->db->select($sdata." as data, carcode, newprice");
		} else {
			$this->db->select($sdata." as data");
		} 
		if($cargroup !== '') { $this->db->where('car_group', $cargroup); }
		if($mak !== '') { $this->db->where('maker', $mak); }
		if($year !== '') { $this->db->where('year_model', $year); }
		if($model !== '') { $this->db->where('model', $model); }
		if($engdesc !== '') { $this->db->where('engdesc', $engdesc); }
		if($carcode !== '') { $this->db->where('carcode', $carcode); }
		$this->db->order_by($sdata,'desc');
        $query = $this->db->get('carpricelist');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row ) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function getCarsize($sdata, $carcode='')
    {
		$this->db->distinct();
		$this->db->select($sdata." as data, CC");
		$this->db->where('carcode', $carcode);
		$this->db->order_by($sdata,'asc');
        $query = $this->db->get('carsize');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row ) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function chkCarsize($sizeno, $carcode='')
    {
		$this->db->select('CC');
		$this->db->where('sizeno', $sizeno);
		$this->db->where('carcode', $carcode);
        $query = $this->db->get('carsize');
        return $query->row_array();
    }

////////////////////////////////////////////////////////////////////////

    public function getPosts($limit, $page, $categories = 'news')
    {

        $this->db->join('blog_description', 'blog_description.for_id = blog_posts.id', 'left');
		$this->db->join('blog_categories', 'blog_categories.id = blog_posts.categories', 'left');
		$this->db->join('packet', 'packet.PACKETCODE = blog_posts.packid', 'left');

        $this->db->where('blog_categories.name', $categories);
		if($categories == "products") {
			$this->db->where('blog_posts.sts', 1);
		} else {
			//$this->db->where('blog_posts.time_exp >=', date('Y-m-d'));
			$this->db->where(array('blog_posts.time_exp >=' => date('Y-m-d'), 'blog_posts.sts' => 1));
		}
		
		$this->db->order_by('blog_posts.id', 'desc');
		$this->db->group_by('blog_posts.id');

		$this->db->select('blog_posts.*, blog_description.subtitle as subtitle, blog_description.description as descript, blog_description.blog_view, blog_categories.name, blog_categories.description as catedes');

		if($categories == 'products') {
			$this->db->join('carsize', 'carsize.SIZENO = packet.sizeno', 'left');
			$this->db->select('packet.*,carsize.CC');
		}
        $query = $this->db->get('blog_posts', $limit, $page);
        return $query->result_array();
    }


    public function postsCount($categories = 'news')
    {
        $this->db->join('blog_categories', 'blog_categories.id = blog_posts.categories', 'left');
        $this->db->where('blog_categories.name', $categories);
		//$this->db->where('blog_posts.time_exp >=', date('Y-m-d'));
		$this->db->where(array('blog_posts.time_exp >=' => date('Y-m-d'), 'blog_posts.sts' => 1));
		$this->db->where('blog_posts.sts', 1);
        return $this->db->count_all_results('blog_posts');
    }


    public function getOnePost($categories,$id)
    {
        $this->db->select('blog_posts.*, blog_description.description, blog_description.blog_view, blog_description.gallery, blog_categories.name, blog_categories.description as catedes');
        $this->db->join('blog_description', 'blog_description.for_id = blog_posts.id', 'left');
		$this->db->join('blog_categories', 'blog_categories.id = blog_posts.categories', 'left');
        $this->db->where('blog_categories.name', $categories);
		$this->db->where('blog_description.for_id', $id);
		//$this->db->where('blog_posts.time_exp >=', date('Y-m-d'));
		$this->db->where(array('blog_posts.time_exp >=' => date('Y-m-d'), 'blog_posts.sts' => 1));
        $query = $this->db->get('blog_posts');
        return $query->row_array();
    }

    public function getOnePostPK($categories,$id)
    {
        $this->db->select('blog_posts.*,packet.*, blog_description.description, blog_description.blog_view, blog_categories.name, blog_categories.description as catedes');
        $this->db->join('blog_description', 'blog_description.for_id = blog_posts.id', 'left');
		$this->db->join('blog_categories', 'blog_categories.id = blog_posts.categories', 'left');
		$this->db->join('packet', 'packet.PACKETCODE = blog_posts.packid', 'left');
        $this->db->where('blog_categories.name', $categories);
		$this->db->where('blog_description.for_id', $id);
		//$this->db->where('blog_posts.time_exp >=', date('Y-m-d'));
		$this->db->where(array('blog_posts.time_exp >=' => date('Y-m-d'), 'blog_posts.sts' => 1));
		$this->db->where('blog_posts.sts', 1);
        $query = $this->db->get('blog_posts');
        return $query->row_array();
    }

    public function getTitlePost($categories,$id)
    {
        $this->db->select('blog_posts.title');
		$this->db->join('blog_categories', 'blog_categories.id = blog_posts.categories', 'left');
		$this->db->where('blog_categories.name', $categories);
		$this->db->where('blog_posts.id', $id);
		//$this->db->where('blog_posts.time_exp >=', date('Y-m-d'));
		$this->db->where(array('blog_posts.time_exp >=' => date('Y-m-d'), 'blog_posts.sts' => 1));
        $query = $this->db->get('blog_posts');
        return $query->row_array();
    }

////////////////////////////////////////////////////////////////////////
// Career
    public function getPostsCareer()
    {
        $this->db->join('career_description', 'career_description.for_id = career_posts.id', 'left');
		$this->db->where('career_posts.time_exp >=', date('Y-m-d'));
		$this->db->group_by('career_posts.id');
		$this->db->select('career_posts.*, career_description.description as descript, career_description.career_view');
        $query = $this->db->get('career_posts');
        return $query->result_array();
    }
////////////////////////////////////////////////////////////////////////
// Accident
    public function getPostsAccident()
    {
        $this->db->join('accident_description', 'accident_description.for_id = accident_posts.id', 'left');
		$this->db->group_by('accident_posts.id');
		$this->db->select('accident_posts.*, accident_description.description as descript, accident_description.accident_view');
        $query = $this->db->get('accident_posts');
        return $query->result_array();
    }
////////////////////////////////////////////////////////////////////////
    public function addUserMotor($data) {
        if ($this->db->insert('record_motor', $data)) {
            return $this->db->insert_id();
        } else
            return false;
    }

    public function getGarage($limit, $page, $province)
	{
		$this->db->select('garage.*,province.province_eng');
		$this->db->join('province', 'province.province_th = garage.province', 'left');
		if($province != "all") $this->db->where('province.province_eng', $province);
		$this->db->order_by('garage.province', 'desc');
        $query = $this->db->get('garage', $limit, $page);
        return $query->result_array();
	}

    public function getGarageName($gname)
	{
		$this->db->select('*');
		$this->db->like('name', $gname);
		$this->db->order_by('garage.province', 'desc');
        $query = $this->db->get('garage');
        return $query->result_array();
	}

    public function garageCount($province)
	{
		$this->db->join('province', 'province.province_th = garage.province', 'left');
		if($province != "all") $this->db->where('province.province_eng', $province);
        return $this->db->count_all_results('garage');
	}

////////////////////////////////////////////////////////////////////////
	public function getPacket($po_insutype = '', $po_carcode = '', $po_sn = '')
	{
		$central = $this->load->database('central', TRUE);
		$central->select('*');
		$central->where('sts', 1);
        if ($po_carcode !== '') {
            $po_carcode = $central->escape_like_str($po_carcode);
            //$central->where("(packet.CARCODE LIKE '$po_carcode%')");
			$central->where('CARCODE', $po_carcode);
        }
        if ($po_insutype !== '') {
            $po_insutype = $central->escape_like_str($po_insutype);
            //$central->where("(packet.INSUTYPE LIKE '%$po_insutype%')");
			$central->where('INSUTYPE', $po_insutype);
        }
        if ($po_sn !== '') {
            $po_sn = $central->escape_like_str($po_sn);
			$central->where('sizeno', $po_sn);
        }
		$central->order_by('CARCODE', 'asc');
		$query = $central->get('packet');
		return $query->result_array();
	}

	public function getPackdara($c)
	{
		$central = $this->load->database('central', TRUE);
		$central->select('*');
		$central->where(array('sts'=>1,'PACKETCODE'=>$c));
		$query = $central->get('packet');
		return $query->result_array();
	}

	public function getPackgetOn()
	{
		$this->db->select('packid');
		$this->db->where(array('sts'=>1,'categories'=>3));
        $query = $this->db->get('career_posts');
        return $query->result_array();
	}


////////////////////////////////////////////////////////////////////////
	public function getFNC()
	{
		$fncdata = array();
		$data = array();
		$this->db->select('year');
		$this->db->distinct();
		$this->db->order_by('year', 'DESC');
		$query = $this->db->get('financialstatus');
		foreach ($query->result() as $row) { 
			array_push($fncdata, $row->year); 
		}
		foreach ($fncdata as $value) { 
			$vdata = $this->Public_model->getYeardataFNC($value);
			array_push($data, array($value=>$vdata) );
		}
		return $data;
	}

	public function getYeardataFNC($y)
	{
		$datayear = array();
		$this->db->select('*');
		$this->db->where(array('year'=>$y));
		$this->db->where('sts', 1);
		$this->db->order_by('id','desc');
        $query = $this->db->get('financialstatus');
		$r = $query->result_array();
		foreach ($r as $value) { 
			array_push($datayear, array('subject' => $value['subject'], 'linkfile' => $value['linkfile']) ); 
		}
		return $datayear;
	}

	public function getFNCGroup()
	{  //select year,GROUP_CONCAT(subject) as subject,GROUP_CONCAT(linkfile) as linkfile from financialstatus group by year order by year desc
		$this->db->select('year, GROUP_CONCAT(subject SEPARATOR "|") as subject, GROUP_CONCAT(linkfile SEPARATOR "|") as linkfile'); 
		$this->db->where('sts', 1);
		$this->db->group_by("year");
		$this->db->order_by('year', 'desc');
        $query = $this->db->get('financialstatus');
        return $query->result_array();
	}
////////////////////////////////////////////////////////////////////////
}
