<?php
class Permission_model extends CI_Model
{
	private $_data = array();
	function __construct() {
		parent::__construct();
	}
	


	function list_permission($num, $offset, $content) 
	{
		if($offset == '')
		{
			$offset = '0';
		}

	
		$sql = "SELECT * FROM  usercategory  WHERE  id<>0";
		if($content['cname'] != '') 
		{
			$sql .=	" AND  (cname like '".$content['cname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			  $sql .=	" order by id desc limit ".$offset.",".$num."";  
		}
		else
		{
			echo $sql .=	" order by id desc";
		}
		//echo $sql; die();
		$query = $this->db->query($sql);


		$sql_couint = "Select * from `usercategory` where id <> 0";
		if($content['cname'] != '') 
		{
			$sql_couint .=	" AND  (cname like '".$content['cname']."%' ) "; 
		}
		
 		$query1 = $this->db->query($sql_couint);

		$ret['result'] = $query->result();
		$ret['count']  = $query1->num_rows;
	    return $ret;
	}
	
	function add($content)                  
	{
		//print_r($content);die();
	    $data['cname']  =  $content['cname'];
		
		
		$data['permission'] = implode(',',$content['permission']);
		
		if($content['editperm']!='')
		{
		$data['editperm'] = implode(',',$content['editperm']);
		}
 		
		$this->_data = $data;
		if ($this->db->insert('usercategory', $this->_data))
		{
			return true;
		} else 
		{
			return false;
		}
	}
	function allcountry()
	{
		$query = $this->db->get('country');
		if($query->num_rows()>0)
	    {
			$result = $query->result();
			return $result;
		} 
		else 
		{
			return false;
		}
	}
	

	function permision($id)
	{
		$sql ="select group_concat(pname) as cname from permission where id IN (".$id.")";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
	    {
			return $query->row()->cname;
		} 
		else 
		{
			return false;
		}
	}
	
	/*function editpermision($id)
	{
		$sql ="select group_concat(pname) as cname from permission where id IN (".$id.")";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
	    {
			return $query->row()->cname;
		} 
		else 
		{
			return false;
		}
	}*/
	
	
	function allstate()
	{
	$query=$this->db->get('state');
	if($query->num_rows()>0)
		{
			$result = $query->result();
			return $result;
		} 
		else 
		{
			return false;
		}
	}
	
	function allpermission()
	{
	$query=$this->db->get('permission');
	if($query->num_rows()>0)
		{
			$result = $query->result();
			return $result;
		} 
		else 
		{
			return false;
		}
	}
	 
	
	function selected_state($cid)
	{
 		$query = $this->db->where('cid = ',$cid);
		$query = $this->db->get('state');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}
	
	function selected_city($sid)
	{
 		$query = $this->db->where('sid = ',$sid);
		$query = $this->db->get('city');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}
	
	
	
	
	function deletes($id) {
 		$this->db->where('id = ',$id);
		if ($this->db->delete('usercategory'))	{
			return true;
		} else {
			return false;
		}
	}
	
	function deletesvalue($id) {
 		$this->db->where('id = ',$id);
		if ($this->db->delete('usercategory'))	{
			return true;
		} else {
			return false;
		}
	}
	/*function is_permission_already_exist($location,$id)
	{
		$sql = mysql_query("SELECT * FROM usercategory WHERE cname='".$location."' AND id != '".$id."'");
		$cc = mysql_num_rows($sql);
		if($cc > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	} */
	
	function is_permission_already_exist($location,$id)
	{
		$sql = "SELECT * FROM usercategory WHERE cname='".$location."' AND id != '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0)
	    {
			return true;
		} 
		else 
		{
			return false;
		}
		
	}
	
	function is_location_already_exist_add($location)
	{
		$this->db->where('cname',$location);
		$query = $this->db->get('usercategory');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function edit($id, $content) {
	    $data['cname']  =  $content['cname'];
		if($content['permission']!='')
		{
		$data['permission'] = implode(',',$content['permission']);
		}
		if($content['editperm']!='')
		{
		$data['editperm'] = implode(',',$content['editperm']);
		}	
		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('usercategory', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}
	
	
	function get($id)
	{ 
	//print_r($id);die();
 		$this->db->where('id',$id);
		$query = $this->db->get('usercategory');
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

	function permission_list()
    {
		$sql   = " select * from  usercategory ";
		//echo $sql;die();
		$query = $this->db->query($sql);
		return $query->result();
    }
	
}