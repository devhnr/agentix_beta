<?php
	class Product_repository_model extends CI_Model {
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
		$L_strErrorMessage='';
		//$data['group_id'] = $content['group_id'];	
		$data['policy_id'] = $content['policy_id'];	
		$data['document_type'] = $content['document_type'];
		$data['cat_id'] = $content['cat_id'];
		
		if($content['document_file'] !="")

        {

            $data['document_file'] = $content['document_file']; 

        }

		$this->_data = $data;
		if ($this->db->insert('product_repository', $this->_data))	
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
		//$data['policy_id'] = $content['policy_id'];	
		//$data['document_type'] = $content['document_type'];

		if($content['document_file'] !="")

        {

            $data['document_file'] = $content['document_file']; 

        }

		$this->_data = $data;

		$this->db->where('id', $id);

		if ($this->db->update('product_repository', $this->_data))	{

			return true;

		} else {

			return false;

		}

	}

		

		function featured_product($pid,$value)
	{
		$query = "update product_repository set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM product_repository where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  product_repository  WHERE id <> 0";

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

		if ($this->db->delete('product_repository'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_product_repository($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('product_repository');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function get_policy_name($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('policies_product_repository');
		if($query->num_rows() > 0)
		{
			return $query->row()->plan_name;
		}
		else
		{
			return false;
		}
	}

	

	function updateorder($id,$val){

		$content['set_order'] = $val;

		$this->db->where('id',$id);

		return $this->db->update('product_repository', $content);	

	}

	

	
	

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

	function get_all_policy(){

		$query = $this->db->get('policies_product_repository');

        if ($query->num_rows() > 0) {

            $result = $query->result();

            return $result;

        } else {

            return false;

        }
	}

	function check_data_exit($policy_id,$document_type)
	{
		$this->db->where('policy_id',$policy_id);
		$this->db->where('document_type',$document_type);
		$query = $this->db->get('product_repository');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	function get_cat_data($policy_id)
	{
		$this->db->where('id',$policy_id);
		$query = $this->db->get('policies_product_repository');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
}

?>