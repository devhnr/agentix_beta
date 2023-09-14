<?php
	class Corporate_model extends CI_Model {
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
		$data['co_name'] = $content['co_name'];
		$data['pincode'] = $content['pincode'];
		$data['city'] = $content['city'];
		$data['state'] = $content['state'];
		$data['co_address'] = $content['co_address'];
		$data['hr_name'] = $content['hr_name'];
		$data['hr_mobile'] = $content['hr_mobile'];
		$data['hr_email'] = $content['hr_email'];
		$data['group_code'] = $content['group_code'];
		$data['co_landline'] = $content['co_landline'];
		$data['industry_type'] = $content['industry_type'];	
		$data['no_of_employee'] = $content['no_of_employee'];
		$data['remark'] = $content['remark'];
		$data['co_user_name'] = $content['co_user_name'];
		$data['password'] = $content['password'];
		$data['confirm_password'] = $content['confirm_password'];

			
		$this->_data = $data;
		if ($this->db->insert('corporate', $this->_data))	
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
		
		$data['co_name'] = $content['co_name'];
		$data['pincode'] = $content['pincode'];
		$data['city'] = $content['city'];
		$data['state'] = $content['state'];
		$data['co_address'] = $content['co_address'];
		$data['hr_name'] = $content['hr_name'];
		$data['hr_mobile'] = $content['hr_mobile'];
		$data['hr_email'] = $content['hr_email'];
		$data['group_code'] = $content['group_code'];
		$data['co_landline'] = $content['co_landline'];
		$data['industry_type'] = $content['industry_type'];	
		$data['no_of_employee'] = $content['no_of_employee'];
		$data['remark'] = $content['remark'];
		$data['co_user_name'] = $content['co_user_name'];
		$data['password'] = $content['password'];
		$data['confirm_password'] = $content['confirm_password'];


		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('corporate', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}

		

		function featured_product($pid,$value)
	{
		$query = "update corporate set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM corporate where id <> 0 ";
		if($content['corporatename'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['corporatename']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  corporate  WHERE id <> 0";

		if($content['corporatename'] !='')
		{
			$sql_count .= " AND `name` like '".$content['corporatename']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret;

	}

	

 

	

	function deletes($id) 

	{

 		$this->db->where('id = ',$id);

		if ($this->db->delete('corporate'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_corporate($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('corporate');
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

		return $this->db->update('corporate', $content);	

	}

	function check_corporate_group_code($group_code)
	{
		$this->db->select('corporate.group_code');

		$this->db->where(array('group_code'=>$group_code));

		$query=$this->db->get('corporate');
		if($query->num_rows() > 0){
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