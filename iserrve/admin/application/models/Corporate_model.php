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
		$data['password'] = password_hash($content['password'],PASSWORD_BCRYPT);
		$data['confirm_password'] = $content['confirm_password'];
		$data['sales_person_name'] = $content['sales_person_name'];
		$data['sales_person_mobile'] = $content['sales_person_mobile'];
		$data['sales_person_email'] = $content['sales_person_email'];
		$data['operations_person_name'] = $content['operations_person_name'];
		$data['operations_person_mobile'] = $content['operations_person_mobile'];
		$data['operations_person_email'] = $content['operations_person_email'];


		$this->_data = $data;
		if ($this->db->insert('corporate', $this->_data))
		{
			return $this->db->insert_id();
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
		$data['password'] = password_hash($content['password'],PASSWORD_BCRYPT);
		$data['confirm_password'] = $content['confirm_password'];
		$data['sales_person_name'] = $content['sales_person_name'];
		$data['sales_person_mobile'] = $content['sales_person_mobile'];
		$data['sales_person_email'] = $content['sales_person_email'];
		$data['operations_person_name'] = $content['operations_person_name'];
		$data['operations_person_mobile'] = $content['operations_person_mobile'];
		$data['operations_person_email'] = $content['operations_person_email'];


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

		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM corporate where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM corporate where id IN (".$corp_id.") ";
		}
		
		
		
		if($content['corporatename'] != '')
		{
			$sql .=	" AND  (name like '%".$content['corporatename']."%' ) ";
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		
		
		//$sql_count = "SELECT * FROM  corporate  WHERE id <> 0";
		
		if($this->session->userdata('role_id') == 1){
			$sql_count = "SELECT * FROM corporate where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql_count = "SELECT * FROM corporate where id IN (".$corp_id.") ";
		}

		if($content['corporatename'] !='')
		{
			$sql_count .= " AND `name` like '".$content['corporatename']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret;

	}
	
	function get_admin_data($id){
		
		$sql = "SELECT * FROM admin_user where id = '".$id."'  ";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->corp_id;
			return $result;
		}else{
			return false;
		}
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


	function check_hr_email($hr_email)
	{
		$this->db->select('corporate.hr_email');

		$this->db->where(array('hr_email'=>$hr_email));

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



	}
	function updatestatus($id,$is_active){
		$sql= " update corporate set active_deactive= '".$is_active."' where id='".$id."' ";
		if ($query = $this->db->query($sql))	{
			return true;
		} else {
			return false;
		}
	}
	function allstate(){
		$sql = "select * from state";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function allcity(){
		$sql = "select * from city";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function allcity_edit($id){
		$sql = "select * from city where state_id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function get_city_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('city');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }

	function get_state_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('state');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }

	function show_city($pro_id)
    {

        $this->db->where('state_id',$pro_id);

        $query = $this->db->get('city');

        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }


    function check_user_name($co_user_name)
	{
		$this->db->select('corporate.co_user_name');

		$this->db->where(array('co_user_name'=>$co_user_name));

		$query=$this->db->get('corporate');

		// echo $this->db->last_query($query);exit;
		if($query->num_rows() > 0){
			return $query->row();
		}
		else
		{
			return false;
		}
	}










}

?>
