<?php
	class Coverage_model extends CI_Model {
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
		$data['name'] = $content['name'];	
		$data['description'] = $content['description'];	
		$this->_data = $data;
		if ($this->db->insert('coverage', $this->_data))	
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
		$data['description'] = $content['description'];
		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('coverage', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}

		

		function featured_product($pid,$value)
	{
		$query = "update coverage set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM coverage where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  coverage  WHERE id <> 0";

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
		if ($this->db->delete('coverage'))	{
			return true;
		} else {
			return false;
		}
	}


	function get_coverage($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('coverage');
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
		return $this->db->update('coverage', $content);	
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

		

	}function updatestatus($id,$is_active){	$sql= " update user set active_deactive= '".$is_active."' where id='".$id."' ";		if ($query = $this->db->query($sql))	{			return true;		} else {			return false;			}	}





	

	

}

?>