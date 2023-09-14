<?php
	class Product_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}

	  function get_user($id){
		  $this->db->where('id = ',$id);
		  $query = $this->db->get('admin_user');	
		  if ($query->num_rows() > 0)	{	
		  $result = $query->result();	
		  return $result;	
		  } else {		
		  return false;	
		  }	

		  }

		  function edit_pass($content) {	

		  $data['password']  = $content['newpassword'];	 

		  $this->_data = $data;	

		  $this->db->where('id', $this->session->userdata('adminId'));	

		  if ($this->db->update('admin_user', $this->_data))

			  {			return true;	

		  } else {			return false;	

		  }	}

		  

	function add($content) 

	{
		//echo "<pre>";print_r($content);echo"</pre>";exit;
		$L_strErrorMessage='';
		$data['name'] = $content['name'];	
		$data['type_id'] = $content['type_id'];
		$data['zero_to_hundred'] = $content['zero_to_hundred'];
		$data['hund_to_five'] = $content['hund_to_five'];
		$data['above_five'] = $content['above_five'];
		//$data['coverage_id'] = $content['coverage_id'];
		$data['show_price'] = $content['show_price'];
		$data['assets_zero_to_hund'] = $content['assets_zero_to_hund'];
		$data['asset_hund_to_five'] = $content['asset_hund_to_five'];
		$data['asset_above_five'] = $content['asset_above_five'];
		// $data['emp_zero_to_hundred'] = $content['emp_zero_to_hundred'];
		// $data['emp_hund_to_five'] = $content['emp_hund_to_five'];
		// $data['emp_above_five'] = $content['emp_above_five'];

		$data['emp_zero_to_hundred_amount'] = $content['emp_zero_to_hundred_amount'];
		$data['emp_zero_to_hundred_percentage'] = $content['emp_zero_to_hundred_percentage'];

		$data['emp_hund_to_five_amount'] = $content['emp_hund_to_five_amount'];
		$data['emp_hund_to_five_percentage'] = $content['emp_hund_to_five_percentage'];

		$data['emp_above_five_amount'] = $content['emp_above_five_amount'];
		$data['emp_above_five_percentage'] = $content['emp_above_five_percentage'];


		$data['average'] = $content['average'];
		$data['sub_industry'] = $content['sub_industry'];
		$data['min_amount'] = $content['min_amount'];
		if($content['image'] !=''){
			$data['image'] = $content['image'];
		}

		if($content['coverage_id']!=''){
			$data['coverage_id'] = implode(',',$content['coverage_id']);
		}


		//echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->_data = $data;
		if ($this->db->insert('product', $this->_data))	
		{		
			return true; 
		} 
		else 
		{
			return false;
		}
	}

		

	function edit($id, $content) 
	{
		$data['name'] = $content['name'];
		$data['type_id'] = $content['type_id'];
		$data['show_price'] = $content['show_price'];
		//$data['coverage_id'] = $content['coverage_id'];
		$data['zero_to_hundred'] = $content['zero_to_hundred'];
		$data['hund_to_five'] = $content['hund_to_five'];
		$data['above_five'] = $content['above_five'];
		$data['assets_zero_to_hund'] = $content['assets_zero_to_hund'];
		$data['asset_hund_to_five'] = $content['asset_hund_to_five'];
		$data['asset_above_five'] = $content['asset_above_five'];
		// $data['emp_zero_to_hundred'] = $content['emp_zero_to_hundred'];
		// $data['emp_hund_to_five'] = $content['emp_hund_to_five'];
		// $data['emp_above_five'] = $content['emp_above_five'];

		$data['emp_zero_to_hundred_amount'] = $content['emp_zero_to_hundred_amount'];
		$data['emp_zero_to_hundred_percentage'] = $content['emp_zero_to_hundred_percentage'];

		$data['emp_hund_to_five_amount'] = $content['emp_hund_to_five_amount'];
		$data['emp_hund_to_five_percentage'] = $content['emp_hund_to_five_percentage'];

		$data['emp_above_five_amount'] = $content['emp_above_five_amount'];
		$data['emp_above_five_percentage'] = $content['emp_above_five_percentage'];

		
		$data['average'] = $content['average'];
		$data['sub_industry'] = $content['sub_industry'];
		$data['min_amount'] = $content['min_amount'];
		

		if($content['image'] !=''){
			$data['image'] = $content['image'];
		}
		
		if($content['coverage_id']!=''){
			$data['coverage_id'] = implode(',',$content['coverage_id']);
		}


		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('product', $this->_data))	{
			return true;
		} else {
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

		

		function featured_product($pid,$value)
	{
		$query = "update product set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM product where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  product  WHERE id <> 0";

		if($content['categoryname'] !='')
		{
			$sql_count .= " AND `name` like '".$content['categoryname']."%'";
		}
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}

	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
		if ($this->db->delete('product'))	{
			return true;
		} else {
			return false;
		}
	}


	function get_product($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('product');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	

	function updateorder($id,$val){
		$content['set_order'] = $val;
		$this->db->where('id',$id);
		return $this->db->update('product', $content);	
	}

	function getgourp_name($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('group1');
		if($query->num_rows() > 0)
		{
			return $query->row()->name;
		}
		else
		{
			return false;
		}
	}

	function get_type_name($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('type');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }

    function get_coverage_name($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('coverage');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }

    function get_coverage_name_new($id) {
        // $this->db->where('id = ', $id);
        // $query = $this->db->get('coverage');
        $sql = "select * from coverage where id in (".$id.")";
     	$query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }
	
	function get_sub_industry_name($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('sub_industry');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }

	

	// function all_group()

	// {

	// 	$query = $this->db->get('group1');

	// 	if($query->num_rows() > 0)

	// 	{

	// 		return $query->result();

	// 	}

	// 	else

	// 	{

	// 		return false;

	// 	}

	// }

	

	

function is_already_exist_add($user)

	{

		$this->db->where('email',$user['email']);

		$query = $this->db->get('user');

		if($query->num_rows() > 0)

		{

			return true;

		}

		else

		{

			return false;

		}

	}	

function is_already_exist_edit($user,$id)

	{

		$this->db->where('id !=',$id);

		$this->db->where('email',$user['email']);

		$query = $this->db->get('user');

		if($query->num_rows() > 0)

		{

			return true;

		}

		else

		{

			return false;

		}

		

	}
	function updatestatus($id,$is_active){	
		$sql= " update user set active_deactive= '".$is_active."' where id='".$id."' ";		
		if ($query = $this->db->query($sql))	{			
			return true;		
		} else {			
			return false;			
		}	
	}

	function get_product_data($id){
		$this->db->where('id = ',$id);
		$query = $this->db->get('product');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}



	

	

}

?>