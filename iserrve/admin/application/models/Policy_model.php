<?php
	class Policy_model extends CI_Model {
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

		$data['insurer'] = $content['insurer'];
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_type'] = $content['policy_type'];	
		$data['product_type'] = $content['product_type'];
		$data['product_name'] = $content['product_name'];
		$data['policy_no'] = $content['policy_no'];
		$data['policy_holder_name'] = $content['policy_holder_name'];
		$data['policy_start_date'] = date("Y-m-d",strtotime($content['policy_start_date']));
		$data['policy_end_date'] =  date("Y-m-d",strtotime($content['policy_end_date']));
		$data['tpa'] = $content['tpa'];
		$data['tpa_person_name'] = $content['tpa_person_name'];
		$data['tpa_person_mobile'] = $content['tpa_person_mobile'];
		$data['tpa_person_email'] = $content['tpa_person_email'];
		// $data['page_url'] = $content['page_url'];	
		$this->_data = $data;
		if ($this->db->insert('policy', $this->_data))	
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
		//$data['insurer'] = $content['insurer'];
		//$data['corporate_id'] = $content['corporate_id'];
		//$data['policy_type'] = $content['policy_type'];	
		//$data['product_type'] = $content['product_type'];
		$data['product_name'] = $content['product_name'];
		//$data['policy_no'] = $content['policy_no'];
		$data['policy_holder_name'] = $content['policy_holder_name'];
		// $data['policy_start_date'] = date("Y-m-d",strtotime($content['policy_start_date']));
		// $data['policy_end_date'] =  date("Y-m-d",strtotime($content['policy_end_date']));
		$data['tpa'] = $content['tpa'];

		$data['tpa_person_name'] = $content['tpa_person_name'];
		$data['tpa_person_mobile'] = $content['tpa_person_mobile'];
		$data['tpa_person_email'] = $content['tpa_person_email'];


		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('policy', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}

		

		function featured_product($pid,$value)
	{
		$query = "update policy set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		//$sql = "SELECT * FROM policy where id <> 0 ";
		
		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM policy where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM policy where corporate_id IN (".$corp_id.") ";
		}
		
		
		if($content['policyname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['policyname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		//$sql_count = "SELECT * FROM  policy  WHERE id <> 0";
		
		if($this->session->userdata('role_id') == 1){
			$sql_count = "SELECT * FROM policy where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql_count = "SELECT * FROM policy where corporate_id IN (".$corp_id.") ";
		}
		

		if($content['policyname'] !='')
		{
			$sql_count .= " AND `name` like '".$content['policyname']."%'";
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

		if ($this->db->delete('policy'))	{

			return true;

		} else {

			return false;

		}

	}
	
	function allproduct_type_new(){
		$sql = "select * from product_type";
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

	



	function get_policy($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('policy');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}


	function get_product_type_id($name)
	{
		$this->db->where('name',$name);
		$query = $this->db->get('product_type');
		if($query->num_rows() > 0)
		{
			return $query->row()->id;
		}
		else
		{
			return false;
		}
	}


	function get_corporate_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->co_name;
            return $result;
        } else {
            return false;
        }
    }

	function allcorporate(){
		$sql = "select * from corporate where active_deactive = 0";
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


	function allinsurer(){
		$sql = "select * from policy";
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


	function allpolicy_type(){
		$sql = "select * from policy";
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


	function allproduct_type(){
		$sql = "select * from policy";
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


	function alltpa(){
		$sql = "select * from policy";
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


	

	function updateorder($id,$val){

		$content['set_order'] = $val;

		$this->db->where('id',$id);

		return $this->db->update('policy', $content);	

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