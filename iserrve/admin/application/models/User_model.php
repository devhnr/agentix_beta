<?php
	class User_model extends CI_Model {
	private $_data = array();
	function __construct() {

		parent::__construct();
	}

	  function get_user($id){

		  $this->db->where('id = ',$id);
		  $query = $this->db->get('user');	
		  if ($query->num_rows() > 0)	
		  {	
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
			  {			
			  	return true;	
		  } else {			
		  	return false;	
		  }	}

 function lists($num, $offset, $content) 
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM user where id <> 0";
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  user  WHERE id <> 0";
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}

	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
		if ($this->db->delete('user'))	{
			return true;
		} else {

			return false;
		}
	}

	function get_category($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function get_productname($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('product');
		if($query->num_rows() > 0)
		{
			return $query->row()->name;
		}
		else
		{
			return false;
		}
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

	function is_already_exist_edit($id,$user)
	{
		$this->db->where('id !=',$id);
		$this->db->where('email_id',$user['email_id']);
		$query = $this->db->get('customer');
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

	$sql= " update brochure set is_active= '".$is_active."' where id='".$id."' ";
	if ($query = $this->db->query($sql)){	
	return true;		
	} else {	
	return false;	
	}
	}	

	function get_vendor_detail($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('customer');
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
		$data['fname'] = $content['fname'];
		$data['email'] = $content['email'];
		$data['mobile'] = $content['mobile'];
		if($content['added_date'] !=''){
			$data['added_date'] = date("Y-m-d G:i", strtotime($content['added_date']));
		}
		// $data['added_date'] = date("Y-m-d G:i", strtotime($content['added_date']));
		// $data['added_date'] = $content['added_date'];
		// $data['meta_keyword'] = $content['meta_keyword'];
		// $data['meta_desc'] = $content['meta_desc'];
		$this->_data = $data;

		$this->db->where('id', $id);

		if ($this->db->update('user', $this->_data))	{

			return true;

		} else {

			return false;

		}

	}

	function get_user_data($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	function all_user(){

		$sql="SELECT * FROM user where id <> 0";

		$query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            $result = $query->result();

            return $result;

        } else {

            return false;

        }
	}


	function get_user_data_list_new(){
    	$sql="SELECT * FROM user order by id DESC";

		$query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            $result = $query->result();

            return $result;

        } else {

            return false;

        }
    }
}
?>