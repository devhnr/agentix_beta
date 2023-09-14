<?php
	class Syatems_model extends CI_Model {
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


		if($id['id']!='')
		{			
		$data['id'] = $id['id'];
		}


		if($content['sub_banner_1']!='')
		{			
		$data['sub_banner_1'] = $content['sub_banner_1'];
		}
		
		if($content['sub_banner_2']!='')
		{
		$data['sub_banner_2'] = $content['sub_banner_2'];
		}

		if($content['sub_banner_3']!='')
		{
		$data['sub_banner_3'] = $content['sub_banner_3'];
		}



		if($content['sub_banner_4']!='')
		{
		$data['sub_banner_4'] = $content['sub_banner_4'];
		}

		if($content['sub_banner_5']!='')
		{
		$data['sub_banner_5'] = $content['sub_banner_5'];
		}

		if($content['home_image']!='')
		{
		$data['home_image'] = $content['home_image'];
		}
		if($content['career_banner']!='')
		{
		$data['career_banner'] = $content['career_banner'];
		}
		if($content['contact_banner']!='')
		{
		$data['contact_banner'] = $content['contact_banner'];
		}
		if($content['news_event_banner']!='')
		{
		$data['news_event_banner'] = $content['news_event_banner'];
		}
		if($content['regulatory_banner']!='')
		{
		$data['regulatory_banner'] = $content['regulatory_banner'];
		}

		$data['home_title'] = $content['home_title'];
		$data['home_subtitle'] = $content['home_subtitle'];
		$data['home_url'] = $content['home_url'];

		if($content['home_image1']!='')
		{
		$data['home_image1'] = $content['home_image1'];
		}

		$data['home_title1'] = $content['home_title1'];
		$data['home_subtitle1'] = $content['home_subtitle1'];
		$data['home_url1'] = $content['home_url1'];
		
		
		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('system', $this->_data))	
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
	

	function get_category($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('system');
		if($query->num_rows() > 0)
		{
			return $query->row();
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