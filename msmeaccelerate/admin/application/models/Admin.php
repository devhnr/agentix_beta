<?php
class Admin extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}
	function check_login($data) {
		$where_array = array(
						'name' => $data['username'],
						'password' => $data['password'],
				);
		$query = $this->db->get_where('admin_user', $where_array);
		if ($query->num_rows() > 0)	{
			$row = $query->row();
			return $row;
		} else {
			return false;
		}
	}
	function getpswd($id)
	{
		$sql = "SELECT * FROM deal_admin_user where admin_id='".$id."' ";
		
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->admin_password;
			return $result;
		}
	
	}
	function adminget($id)
   	{
		$this->db->where('admin_id = ',$id);
    	$query = $this->db->get('deal_admin_user');
   		if ($query->num_rows() > 0)	{
   			$result = $query->row();
   			return $result;
   		} else {
   			return false;
   		}
   	}
	
	function password_edit($id, $content) {
		$data['admin_password']  = $content['password'];
		$this->_data = $data;
		$this->db->where('admin_id', $id);
		if ($this->db->update('deal_admin_user', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}
	function followupdate(){
		$sql = "select * from followup where `added_date` = '".date('Y-m-d')."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function todayenquiry(){
		$sql = "select * from enquiry where added_date = '".date('Y-m-d')."'";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	function list_customers()
	{
		$sql_count = "Select * from deal_customer";
		$query = $this->db->query($sql_count);
		$ret = $query->num_rows();
	    return $ret;	
	}		
	
	function currentuser()
	{		
	$sql = "select * from deal_customer order by customer_id desc limit 0,5";	
	$query = $this->db->query($sql);
	if ($query->num_rows() > 0)	{	
	$result = $query->result();
	return $result;		
	} else 
	{			
     return false;	
	}	
	}	
function list_merchant()	
{	
	$sql_count = "Select * from deal_merchant ";		
	$query = $this->db->query($sql_count);		
	$ret = $query->num_rows();	    return $ret;
	}	
	
	
	function list_admin()
	{	
	$sql_count = "Select * from deal_admin_user ";	
	$query = $this->db->query($sql_count);		
	$ret = $query->num_rows();	    return $ret;	
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
	if ($this->db->update('admin_user', $this->_data))	{	
	return true;	
	} else {	
	return false;	
	}
	}


function list_user(){
		$sql = "select * from user";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	function list_user1()
	{
		$sql = "select * from user order by id desc";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{	
			$result = $query->result_array();
			return $result;
		}else{
			return $result;
		}
	}
	
	function list_subscribe(){
		$sql = "select * from subscribe";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	function list_subscribe1(){
		$sql = "select * from subscribe order by id desc";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return $result;
		}else{
			return $result;
		}
	}
	
	function list_product(){
		$sql = "select * from product";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	
	function list_orders($orderstatus=''){
		$sql = "select * from ci_orders ";
		if($orderstatus !='')
		{
			$sql .= " where order_status='".$orderstatus."'";
		}
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function updateproduct($product_code){
		/* $data['added_date']  = $content['password'];*/
		$data['added_date']  = '2018-09-28 00:00:00';
		$this->_data = $data;
		$this->db->where('product_code', $product_code);
		if ($this->db->update('product', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}	
	
 	
}
?>