<?php
    class Cd_statement_entry_model extends CI_Model 
    {
		private $_data = array();
	    function __construct() 
    {
		parent::__construct();
	}


    function get_coupan($id)
    {
		$this->db->where('id = ',$id);
		$query = $this->db->get('faq');
        if ($query->num_rows() > 0)	
        {
			$result = $query->result();
			return $result;
        } 
        else 
        {
			return false;
		}
	}


	function add($content)
 	{	
		$L_strErrorMessage='';
		$data['corporate_id'] 	 = $content['corporate_id'];
		$data['cd_number'] 	 = $content['cd_number'];
        $data['particular'] = $content['particular'];
        $data['cd_account_name'] = $content['cd_account_name'];
        $data['date'] = $content['date'];
		$data['created_at'] = date('Y-m-d h:i:sa');
        
        // if($content['image'] !='')
		// {
		// 	$data['image'] = $content['image'];	
		// }
		// if($content['detail_img'] !='')
		// {
		// 	$data['detail_img'] = $content['detail_img'];	
		// }

		// if($content['blog_cate_id'] !='')
		// {
		// 	$data['blog_cate_id'] = $content['blog_cate_id'];	
		// }

		// $data['metatitle'] = $content['metatitle'];
		// $data['metakeywords'] = $content['metakeywords'];
		// $data['metadescription'] = $content['metadescription'];

		$this->_data = $data;
		if ($this->db->insert('cd_statement_entry', $this->_data))
			{
				return true;
		 	}else
			{
				return false;
			}
    }
	function get_all_data($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('cd_statement_entry');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}


	function edit($id, $content) 
	{
        $data['corporate_id'] 	 = $content['corporate_id'];
		$data['cd_number'] 	 = $content['cd_number'];
        $data['particular'] = $content['particular'];
        $data['cd_account_name'] = $content['cd_account_name'];
        $data['date'] = $content['date'];
        // if($content['image'] !='')
		// {
		// 	$data['image'] = $content['image'];	
		// }

		// if($content['detail_img'] !='')
		// {
		// 	$data['detail_img'] = $content['detail_img'];	
		// }

		// if($content['blog_cate_id'] !='')
		// {
		// 	$data['blog_cate_id'] = $content['blog_cate_id'];	
		// }

		// $data['metatitle'] = $content['metatitle'];
		// $data['metakeywords'] = $content['metakeywords'];
		// $data['metadescription'] = $content['metadescription'];

		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('cd_statement_entry', $this->_data))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
	}


    function lists() 
	{
		/* if($offset == '')
		{
			$offset = '0';
		}
		$sql = "SELECT * FROM cd_statement_entry where id <> 0 ";
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
		$query = $this->db->query($sql);
		
		$sql_count = "SELECT * FROM cd_statement_entry WHERE id <> 0";
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret; */
		
		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM cd_statement_entry  ";
		}else{
			
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM cd_statement_entry where corporate_id IN (".$corp_id.") ";
		}
		

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	
	function get_admin_data($id){
		
		$sql = "SELECT * FROM admin_user where id = '".$id."'  ";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->corp_id;
			return $result;
		}else{
			return false;
		}
	}

	function updateorder_popular($id, $val) {
        $query = "update cd_statement_entry set popular = '" . $val . "'  where id = '" . $id . "'";
        $result = $this->db->query($query);
        return $result;
    }

	function updateorder_status($id, $val) {
        $query = "update cd_statement_entry set status = '" . $val . "'  where id = '" . $id . "'";
        $result = $this->db->query($query);
        return $result;
    }

	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('cd_statement_entry'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }


	function allcorporate(){
		$sql = "select * from corporate where active_deactive = 0";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}


	  /*function getsubcate_name($id)


	{


 		$this->db->where('id = ',$id);


		$query = $this->db->get('subcategory');


		if ($query->num_rows() > 0)


		{


			$result = $query->row()->subcategoryname;


			return $result;


		}


		else


		{


			return false;


		}


    }*/


	 /*function allcategory()


	{


		$this->db->order_by('id', 'desc');


		$query = $this->db->get('category');


		if ($query->num_rows() > 0)	{


			$result = $query->result();


			return $result;


		} else {


			return false;


		}


    }*/


	/*function allcategory_product($id='')


	{


		if($id!='')


		{


			$this->db->where('category_id = ',$id);


		}


 		$query = $this->db->get('product');


		if ($query->num_rows() > 0)	{


			$result = $query->result();


			return $result;


		} else {


			return false;


		}


    }*/


	/*function getcate_name($id)


	{


 		$this->db->where('id = ',$id);


		$query = $this->db->get('category');


		if ($query->num_rows() > 0)


		{


			$result = $query->row()->categoryname;


			return $result;


		}


		else


		{


			return false;


		}


    }*/


	function updatestatus($id,$is_active)
	{
	$sql= " update tbl_coupan set enabled= '".$is_active."' where id='".$id."' ";
        if ($query = $this->db->query($sql))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }

	 function is_add($name)
	{
		$this->db->where('code',$name);
		$query = $this->db->get('tbl_coupan');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function is_exist($id)
	{
		$this->db->where('id = ',$id);
		$query = $this->db->get('cd_statement_entry');
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function alldata($table_name) {
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function get_corp_name($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->co_name;
            return $result;
        } else {
            return false;
        }
    }
}
?>