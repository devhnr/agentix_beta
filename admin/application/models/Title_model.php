<?php
	class Title_model extends CI_Model {
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

		$data['name'] = $content['name'];	

		$data['compare_id'] = $content['compare_id'];
		
		// $data['meta_title'] = $content['meta_title'];
		// $data['meta_keyword'] = $content['meta_keyword'];
		// $data['meta_desc'] = $content['meta_desc'];

		// $data['image'] = $content['image'];	
		// $data['home_image'] = $content['home_image'];

		

		$this->_data = $data;

		if ($this->db->insert('title', $this->_data))	

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
		$data['compare_id'] = $content['compare_id'];
		// $data['meta_title'] = $content['meta_title'];
		// $data['meta_keyword'] = $content['meta_keyword'];
		// $data['meta_desc'] = $content['meta_desc'];
		$this->_data = $data;

		$this->db->where('id', $id);

		if ($this->db->update('title', $this->_data))	{

			return true;

		} else {

			return false;

		}

	}

		

		function featured_product($pid,$value)
	{
		$query = "update title set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM title where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  title  WHERE id <> 0";

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

		if ($this->db->delete('title'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_title($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('title');
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

		return $this->db->update('title', $content);	

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

	function alldata($table_name) {
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function get_compare_name($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('compare_name');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
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