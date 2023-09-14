<?php
	class About_model extends CI_Model {
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
			  {			
			  	return true;	
		  } else {		
		  	return false;	
		  }	}

	function add($content) 
	{
		$L_strErrorMessage='';
		$data['name'] = $content['name'];		
		$this->_data = $data;
		if ($this->db->insert('category', $this->_data))	
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

		if($content['image']!='')
		{			
			$data['image'] = $content['image'];
		}
		$data['sub_title'] = $content['sub_title'];
		$data['description'] = $content['description'];
		$data['name'] = $content['name'];
		// $data['id'] = $id;
		$this->_data = $data;
		$this->db->where('id', $id);

		if ($this->db->update('about', $this->_data))	
		{
			return true;
		} else {
			return false;
		}
	}

    function lists($num, $offset, $content) 
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM category where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  category  WHERE id <> 0";
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
		if ($this->db->delete('category'))	{

			return true;

		} else {

			return false;
		}
	}


	function get_system($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('about');
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