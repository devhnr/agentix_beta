<?php
	class Sum_insured_model extends CI_Model {
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
		$data['product_name'] = $content['product_name'];
		$data['policy_no'] = $content['policy_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['date'] = date("Y-m-d");



		// $data['sum_insured_start_date'] = date("Y-m-d",strtotime($content['sum_insured_start_date']));
		// $data['sum_insured_end_date'] =  date("Y-m-d",strtotime($content['sum_insured_end_date']));
		// $data['tpa'] = $content['tpa'];
		// $data['page_url'] = $content['page_url'];	
		$this->_data = $data;
		if ($this->db->insert('sum_insured', $this->_data))	
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
		$data['insurer'] = $content['insurer'];
		$data['corporate_id'] = $content['corporate_id'];
		$data['product_name'] = $content['product_name'];
		$data['policy_no'] = $content['policy_no'];
		$data['sum_insured'] = $content['sum_insured'];


		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('sum_insured', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}

		

		function featured_product($pid,$value)
	{
		$query = "update sum_insured set set_home = '".$value."' where id = '".$pid."'";
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
			$sql = "SELECT * FROM sum_insured where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM sum_insured where corporate_id IN (".$corp_id.") ";
		}
		
		if($content['sum_insuredname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['sum_insuredname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		if($this->session->userdata('role_id') == 1){
			$sql_count = "SELECT * FROM sum_insured where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql_count = "SELECT * FROM sum_insured where corporate_id IN (".$corp_id.") ";
		}

		if($content['sum_insuredname'] !='')
		{
			$sql_count .= " AND `name` like '".$content['sum_insuredname']."%'";
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

		if ($this->db->delete('sum_insured'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_sum_insured($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('sum_insured');
		if($query->num_rows() > 0)
		{
			return $query->row();
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


    function get_product_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('policy');
        if ($query->num_rows() > 0) {
            $result = $query->row()->product_name;
            return $result;
        } else {
            return false;
        }
    }

    function get_policy_no($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('policy');
        if ($query->num_rows() > 0) {
            $result = $query->row()->policy_no;
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
	function allpolicy_using_corporate($id){
		$sql = "select * from policy where corporate_id = '".$id."' and policy_end_date >= '".date('Y-m-d')."' ";
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

	function allproduct_name(){
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


	 function show_policy_number($pro_id)
    {   
    
        $this->db->where('id',$pro_id);

        $query = $this->db->get('policy');
       
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

	function show_policy_using_corporate($pro_id)
    {   
    
        $this->db->where('corporate_id',$pro_id);
		
		$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

        $query = $this->db->get('policy');
       
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

		return $this->db->update('sum_insured', $content);	

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