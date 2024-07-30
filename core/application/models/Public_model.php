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
        $query = $this->db->get('intro', 0, 1);
        $this->db->limit(1);
        $this->db->order_by('intro_id', 'desc');
        return $query->row_array();
    }

    public function chkf($t, $s)
    {
        $query = $this->db->list_fields($t);
        if (array_search($s, $query, true)) {
            return true;
        } else {
            return false;
        }
    }

    public function getCarprice($sdata, $cargroup = '', $mak = '', $year = '', $model = '', $carcode = '')
    {
        if ($carcode == '0' and $mak != '' and $year != '' and $model != '') {
            $this->db->select($sdata . ", ref_carcode.cartype, ref_carcode.usetype");
            $this->db->join('ref_carcode', 'carpricelist.carcode = ref_carcode.carcode');
        } else {
            //$this->db->distinct();
            $this->db->select($sdata . " as data");
        }
        if ($cargroup !== '') {$this->db->where('car_group', $cargroup);}
        if ($mak !== '') {$this->db->where('maker', $mak);}
        if ($year !== '') {$this->db->where('year_model', $year);}
        if ($model !== '') {$this->db->where('model', $model);}
        if ($carcode !== '' and $carcode !== '0') {$this->db->where('carcode', $carcode);}
        $this->db->group_by($sdata);
        $this->db->order_by($sdata, 'desc');
        $query = $this->db->get('carpricelist');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function getCarsize($sdata, $carcode = '')
    {
        $this->db->distinct();
        $this->db->select($sdata . " as data, CC");
        $this->db->where('carcode', $carcode);
        $this->db->order_by($sdata, 'asc');
        $query = $this->db->get('carsize');
        $arr = array();
        if ($query !== false) {
            foreach ($query->result_array() as $row) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    public function chkCarsize($sizeno, $carcode = '')
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
        if ($categories == "products") {
            $this->db->where('blog_posts.sts', 1);
        } else {
            //$this->db->where('blog_posts.time_exp >=', date('Y-m-d'));
            $this->db->where(array('blog_posts.time_exp >=' => date('Y-m-d'), 'blog_posts.sts' => 1));
        }

        $this->db->order_by('blog_posts.id', 'desc');
        $this->db->group_by('blog_posts.id');

        $this->db->select('blog_posts.*, blog_description.subtitle as subtitle, blog_description.description as descript, blog_description.blog_view, blog_categories.name, blog_categories.description as catedes');

        if ($categories == 'products') {
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

    public function getOnePost($categories, $id)
    {
        $this->db->select('blog_posts.*, blog_description.description, blog_description.blog_view, blog_description.gallery, blog_description.video, blog_categories.name, blog_categories.description as catedes');
        $this->db->join('blog_description', 'blog_description.for_id = blog_posts.id', 'left');
        $this->db->join('blog_categories', 'blog_categories.id = blog_posts.categories', 'left');
        $this->db->where('blog_categories.name', $categories);
        $this->db->where('blog_description.for_id', $id);
        //$this->db->where('blog_posts.time_exp >=', date('Y-m-d'));
        $this->db->where(array('blog_posts.time_exp >=' => date('Y-m-d'), 'blog_posts.sts' => 1));
        $query = $this->db->get('blog_posts');
        return $query->row_array();
    }

    public function getOnePostPK($categories, $id)
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

    public function getTitlePost($categories, $id)
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
    public function addUserMotor($data)
    {
        if ($this->db->insert('record_motor', $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }

    }

    public function getGarage($limit, $page, $province)
    {
        $this->db->select('garage.*,province.province_eng');
        $this->db->join('province', 'province.province_th = garage.province', 'left');
        if ($province != "all") {
            $this->db->where(array('garage.sts' => 1, 'province.province_eng' => $province));
        } else {
            $this->db->where(array('garage.sts' => 1));
        }
        $this->db->order_by('garage.province', 'desc');
        $query = $this->db->get('garage', $limit, $page);
        return $query->result_array();
    }

    public function getGarageName($gname)
    {
        $this->db->select('*');
        $this->db->like('name', $gname);
        $this->db->order_by('garage.province', 'desc');
        $this->db->where(array('sts' => 1));
        $query = $this->db->get('garage');
        return $query->result_array();
    }

    public function garageCount($province)
    {
        $this->db->join('province', 'province.province_th = garage.province', 'left');
        if ($province != "all") {
            $this->db->where(array('garage.sts' => 1, 'province.province_eng' => $province));
        } else {
            $this->db->where(array('garage.sts' => 1));
        }
        return $this->db->count_all_results('garage');
    }

    ////////////////////////////////////////////////////////////////////////

   

    public function getpaytaxno($paytaxno, $date_start, $date_end)
    {
        $db2 = $this->load->database("1202", true);
        $db2->join('taxpay', 'taxpay.vchno_run = vchmas.vchno_run', 'LEFT');
        $db2->select("vchmas.p_key as vchkey,
        taxpay.p_key as taxkey,
        vchmas.paytaxno,
        taxpay.paytitle,
        taxpay.payname,
        taxpay.paysurname,
        vchmas.bankref,
        vchmas.paydate,
        vchmas.title,vchmas.name,vchmas.surname,
        '' AS fullname 
        "); 
        $db2->like('vchmas.paytaxno', $paytaxno);
        // $db2->group_by("vchmas.paydate,vchmas.bankref");
        // $db2->group_by("taxpay.paysurname");
        $db2->order_by('vchmas.p_key', 'DESC');
        $db2->where("vchmas.paydate BETWEEN '$date_start' AND '$date_end' AND taxpay.p_key !=''");
        $query = $db2->get('vchmas');

        $result = $query->result_array();
        if(empty($result)){
            $db2 = $this->load->database("1202", true);
            $db2->join('taxpay', 'taxpay.vchno_run = vchmas.vchno_run', 'INNER');
            $db2->select("vchmas.p_key as vchkey,
            taxpay.p_key as taxkey,
            vchmas.paytaxno,
            taxpay.paytaxno as taxpay_paytaxno,
            taxpay.paytitle,
            taxpay.payname,
            taxpay.paysurname,
            vchmas.bankref,
            vchmas.paydate,
            vchmas.title,vchmas.name,vchmas.surname,
            '' AS fullname
            "); 
            $db2->like('taxpay.paytaxno', $paytaxno);
            $db2->order_by('vchmas.p_key', 'DESC');
            $db2->where("taxpay.docdate BETWEEN '$date_start' AND '$date_end' AND taxpay.p_key !=''");
            $query = $db2->get('vchmas');
        }
        print_r($db2);
        // exit();
        return $query->result_array();

      
    }

  

    public function gettaxreceive($paytaxno, $date_start, $date_end)
    {
        if(strtotime($date_start) <= strtotime('2024-02-29')){
            $date_start = '2024-03-01';
        }
        $db2 = $this->load->database("db_acc", true);
        $db2->select("TA_TAX_DT,TA_TAX_ID,TA_TAX_NM,TA_TAX_NO");
        $db2->like('TA_TAX_ID', $paytaxno);
        $db2->where("TA_TAX_DT BETWEEN '$date_start' AND '$date_end' AND TA_STAT != 'X' AND mid(TA_TAX_NO,1,2) = 'WT'");
        $db2->order_by('TA_TAX_DT', 'DESC');
        $query = $db2->get('db_acc.gl_tax_adv');
        
        // print_r($db2);
        return $query->result_array();
        
    }

    public function gettaxreceiveYear($paytaxno, $date_start, $date_end)
    {
        $db2 = $this->load->database("db_acc", true);
        $db2->select("TA_TAX_DT,TA_TAX_ID,TA_TAX_NM,TA_TAX_NO,DATE_FORMAT(TA_TAX_DT, '%Y') as dateformat");
        $db2->like('TA_TAX_ID', $paytaxno);
        $db2->where("TA_TAX_DT BETWEEN '$date_start' AND '$date_end' AND TA_STAT != 'X' AND mid(TA_TAX_NO,1,2) = 'WT' AND TA_TAX_TYPE = 'ภ.ง.ด.1'");
        $db2->order_by('TA_TAX_DT', 'DESC');
        $query = $db2->get('db_acc.gl_tax_adv');
        
        print_r($db2);
        return $query->result_array();
        
    }

    public function gettaxreceive_old($paytaxno, $date_start, $date_end)
    {

        $db2 = $this->load->database("1202", true);
        $db2->select("docno as TA_TAX_NO,
        ddate as TA_TAX_DT,
        taxid as TA_TAX_ID,
        fullname as TA_TAX_NM");
        if($date_start == 'errdate' && $date_end == 'errdate'){
            $db2->where(" `ddate` = '29/02/2567' AND taxid = '$paytaxno'");
        }else{
        $db2->where("str_to_date(ddate, '%d/%m/%Y') BETWEEN '$date_start' AND '$date_end' AND taxid = '$paytaxno'");
        }
        $db2->order_by('ddate', 'DESC');
        $query = $db2->get('payment.taxreceive');
        
        // print_r($db2);
        return $query->result_array();
        
    }

    public function gettaxreceive_report($taxid,$docno)
    {
        if (!empty($taxid)) {
            $db2 = $this->load->database("db_acc", true);
            $db2->select('TA_TAX_NO,
            TA_TAX_NM,
            TA_TAX_ADDR,
            TA_TAX_ID,
            TA_TAX_DESC,
            TA_TAX_VALUE,
            TA_TAX_DESC,
            TA_TAX_AMT,
            TA_TAX_TYPE
            ,DATE_FORMAT(TA_TAX_DT,"%d/%m/%Y") as dateformat');
            $db2->where(array('TA_TAX_ID' => $taxid,'TA_TAX_NO' => $docno));
            $query = $db2->get('gl_tax_adv');

            // print_r($query);
            return $query->result_array();
        }

    }

    public function gettaxreceive_report_year($taxid,$date_start,$date_end)
    {
        if (!empty($taxid)) {
            $db2 = $this->load->database("db_acc", true);
            $db2->select('TA_TAX_NO,
            TA_TAX_NM,
            TA_TAX_ADDR,
            TA_TAX_ID,
            TA_TAX_DESC,
            SUM(TA_TAX_VALUE) as TA_TAX_VALUE,
            TA_TAX_DESC,
            SUM(TA_TAX_AMT) as TA_TAX_AMT,
            TA_TAX_TYPE
            ,DATE_FORMAT(TA_TAX_DT, "%Y") as dateformat');
            $db2->where(array('TA_TAX_ID' => $taxid));
            $db2->where("TA_TAX_DT BETWEEN '$date_start' AND '$date_end' AND mid(TA_TAX_NO,1,2) = 'WT' AND TA_TAX_TYPE = 'ภ.ง.ด.1'");
            $query = $db2->get('gl_tax_adv');

            // print_r($db2);
            // exit();
            return $query->result_array();
        }

    }

    public function gettaxreceive_report_old($taxid,$docno)
    {
        if (!empty($taxid)) {
            $db2 = $this->load->database("1202", true);
            $db2->select('docno,fullname,address,taxid,ddate,des,rate,amt,tax,tax_type');
            $db2->where(array('taxid' => $taxid,'docno' => $docno));
            $query = $db2->get('taxreceive');

            // print_r($query);
            return $query->result_array();
        }

    }


    public function getpaytaxno_report($taxkey, $paytaxno,$docdate)
    {
        $db2 = $this->load->database("1202", true);
        if (!empty($paytaxno)) {
          
            $db2->select("IF(mid(taxpay.paytaxno,1,1) = 0,'ภ.ง.ด 53','ภ.ง.ด 3') as type3or53,
            p_key,gettitle,getname,
		getsurname,taxno,gettaxno,getaddr,
		paytitle,payname,paysurname,paytaxno,
		payaddr,docdate,totalpay,totaltax,
		totalstr,servdate,servpay,servtax,
		rentdate,rentpay,renttax,etc1str,
		etc1date,etc1pay,etc1tax");
            $db2->like('p_key', $taxkey);
            $db2->order_by('taxpay.p_key', 'desc');
            $db2->where(array('sts' => 1, 'paytaxno' => $paytaxno,'docdate' => $docdate));
            $query = $db2->get('taxpay');

          
           
        }else{
          
            $db2->select("IF(mid(taxpay.paytaxno,1,1) = 0,'ภ.ง.ด 53','ภ.ง.ด 3') as type3or53,
        p_key,gettitle,getname,
		getsurname,taxno,gettaxno,getaddr,
		paytitle,payname,paysurname,paytaxno,
		payaddr,docdate,totalpay,totaltax,
		totalstr,servdate,servpay,servtax,
		rentdate,rentpay,renttax,etc1str,
		etc1date,etc1pay,etc1tax");
            $db2->like('p_key', $taxkey);
            $db2->order_by('taxpay.p_key', 'desc');
            $query = $db2->get('taxpay');

          
          
        }

        // print_r($db2);
        // exit();

        return $query->result_array();

    }
    

    public function getdetailpaytaxno_report($vchkey,$paytitle_rep, $payname_rep, $paysurname_rep, $docdate_rep, $bankref_rep)
    {
        if (!empty($docdate_rep) || !empty($paytitle_rep) || !empty($payname_rep) || !empty($paysurname_rep)) {
            $fullname = $paytitle_rep.$payname_rep.$paysurname_rep;
            $db2 = $this->load->database("1202", true);
            $db2->select("vchmas.brnclmno,vchmas.title,vchmas.name,vchmas.surname,
		    vchmas.paytype,vchmas.paydate,vchmas.vat,vchmas.bankref,
		    vchmas.taxpay,vchmas.dabitall,vchmas.chqtotal,vchmas.pono,vchmas.paytaxno");
            $db2->where("paytype IN (1,2,4)");
            $db2->where(array('paydate' => $docdate_rep,'bankref' => $bankref_rep));
            $db2->where('CONCAT(title,name,surname)', $fullname);
            $query = $db2->get('vchmas');

            // print_r($db2);
            // exit();
            return $query->result_array();
        }

    }

    public function getdetailpay_sumreport($date_start,$date_end,$taxid)
    {
       
            // $fullname = $paytitle.$payname;
            if(!empty($taxid)){
            $db2 = $this->load->database("1202", true);
            $db2->select(" vchmas.brnclmno,vchmas.title,vchmas.name,vchmas.surname,
		    vchmas.paytype,vchmas.paydate,vchmas.vat,vchmas.bankref,
		    vchmas.taxpay,vchmas.dabitall,vchmas.chqtotal,vchmas.pono,vchmas.paytaxno,vchmas.psnno");
            $db2->where(" paydate BETWEEN '$date_start' AND '$date_end'");
            $db2->where("paytype IN (1,2,4)");
            $db2->where("paytaxno = '$taxid'");
            // $db2->like('CONCAT(title,name,surname)', $fullname);
            $query = $db2->get('vchmas');
            // print_r($db2);
            // exit();
            return $query->result_array();
            }
           
         

    }

    public function getdetailpay_sumreport_receive($taxid,$date_start,$date_end)
    {
        if (!empty($taxid) || !empty($date_start) || !empty($date_end)) {
            if(strtotime($date_start) <= strtotime('2024-02-29')){
                $date_start = '2024-03-01';
            }
            $db2 = $this->load->database("db_acc", true);
            $db2->select('TA_TAX_TYPE,TA_TAX_NO,TA_VOC_NO,TA_TAX_NM,TA_TAX_ID,TA_TAX_DESC,TA_TAX_RATE,TA_TAX_AMT,TA_TAX_VALUE,DATE_FORMAT(TA_TAX_DT,"%d/%m/%Y") as dateformat');
            $db2->order_by('TA_TAX_DT', 'desc');
            $db2->where("TA_TAX_DT BETWEEN '$date_start' AND '$date_end' AND mid(TA_TAX_NO,1,2) = 'WT'");
            $db2->where("TA_TAX_ID = '$taxid'");
            $query = $db2->get('gl_tax_adv');
            // print_r($db2);
            // exit();
            return $query->result_array();
         }

    }

    public function getdetailpay_sumreport_receive_old($taxid,$date_start,$date_end)
    {
        if (!empty($taxid) || !empty($date_start) || !empty($date_end)) {
            $db2 = $this->load->database("1202", true);
            $db2->select('docno,fullname,address,taxid,ddate,des,rate,amt,tax,tax_type');
            $db2->order_by('ddate', 'desc');
            if($date_start == 'errdate' && $date_end == 'errdate'){
                $db2->where(" `ddate` = '29/02/2567'");
            }else{
            $db2->where("str_to_date(ddate, '%d/%m/%Y') BETWEEN '$date_start' AND '$date_end'");
            }
            $db2->where("taxid = '$taxid'");
            $query = $db2->get('taxreceive');
            // print_r($db2);
            // exit();
            return $query->result_array();
         }

    }


    ////////////////////////////////////////////////////////////////////////
    public function getPacket($po_insutype = '', $po_carcode = '', $po_sn = '')
    {
        $central = $this->load->database('central', true);
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
        $central = $this->load->database('central', true);
        $central->select('*');
        $central->where(array('sts' => 1, 'PACKETCODE' => $c));
        $query = $central->get('packet');
        return $query->result_array();
    }

    public function getPackgetOn()
    {
        $this->db->select('packid');
        $this->db->where(array('sts' => 1, 'categories' => 3));
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
            array_push($data, array($value => $vdata));
        }
        return $data;
    }

    public function getYeardataFNC($y)
    {
        $datayear = array();
        $this->db->select('*');
        $this->db->where(array('year' => $y));
        $this->db->where('sts', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('financialstatus');
        $r = $query->result_array();
        foreach ($r as $value) {
            array_push($datayear, array('subject' => $value['subject'], 'linkfile' => $value['linkfile']));
        }
        return $datayear;
    }

    public function getFNCGroup()
    { //select year,GROUP_CONCAT(subject) as subject,GROUP_CONCAT(linkfile) as linkfile from financialstatus group by year order by year desc
        $this->db->select('year, GROUP_CONCAT(subject SEPARATOR "|") as subject, GROUP_CONCAT(linkfile SEPARATOR "|") as linkfile');
        $this->db->where('sts', 1);
        $this->db->group_by("year");
        $this->db->order_by('year', 'desc');
        $query = $this->db->get('financialstatus');
        return $query->result_array();
    }

    public function Insinterested($post)
    {
        $this->db->insert('interested', $post);
    }
    ////////////////////////////////////////////////////////////////////////

    public function InsAgt($post)
    {
        $this->db->insert('reg_agent', $post);
    }

    ////////////////////////////////////////////////////////////////////////
    public function getSlide()
    {
        $this->db->select('*');
        $this->db->where('status', 1);
        $this->db->where('date_start <=', date('Y-m-d H:i:s'));
        $this->db->where('date_end >=', date('Y-m-d H:i:s'));
        $this->db->order_by('slide_id', 'desc');
        $query = $this->db->get('slide');
        return $query->result_array();
    }
	////////////////////////////////////////////////////////////////////////
		public function getAgtSeminar($id)
		{
			$this->db->select('*');
			$this->db->where('key', $id);
			$query = $this->db->get('seminar');
			return $query->row_array();
		}

		public function SaveAgtSeminar($post){
			$data = array(
				'confirm' => $post['confirm'],
				'tel' => $post['tel'],
				'follow' => $post['follow'],
				'entdate '=> date('Y-m-d H:i:s')
			);
			$this->db->where('key', $post['key']);
			$result = $this->db->update('seminar', $data);
			if (!$result){
				return false;
			} else {
				return true;
			}
		}

        public function search_polno($polno,$idcard){

            $db2 = $this->load->database("1211", true);
            $db2->select("DATE_FORMAT(strdate, '%d-%m-%Y') as strdate,DATE_FORMAT(enddate, '%d-%m-%Y') as enddate ,
            CONCAT(DATE_FORMAT(cntdate, '%d-%m-%Y'), ' ', DATE_FORMAT(entdate, '%H:%i:%s')) AS date_format,polno");
            $db2->where("enddate >= CURDATE()
            AND polno = '$polno'
            AND MID(idcard, 8, 6) = '$idcard'
            AND sts = '1' AND void != 'Y'");
            $query = $db2->get('polmas_trans');
            // print_r($db2);
            return $query->result_array();
        }

}