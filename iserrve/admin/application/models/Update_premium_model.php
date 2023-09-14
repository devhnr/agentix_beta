<?php
	class Update_premium_model extends CI_Model {
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

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
		$L_strErrorMessage='';

		
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_no'] = $content['policy_no'];
		$data['policy_type'] = $content['policy_type'];
		$data['inception_premium_amount'] = $content['inception_premium_amount'];
		
		$data['addition_premium_amount'] = $content['addition_premium_amount'];
		$data['deletion_premium_amount'] = $content['deletion_premium_amount'];
		$data['total_premium_amount'] = $content['total_premium_amount'];
		$data['reported_claim_amount'] = $content['reported_claim_amount'];
		$data['total_claim_paid_amount'] = $content['total_claim_paid_amount'];
		$data['claim_under_process_amount'] = $content['claim_under_process_amount'];
		$data['claim_closed_reject'] = $content['claim_closed_reject'];
		
		$data['date'] = date("Y-m-d");

		

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		// $data['sum_insured_start_date'] = date("Y-m-d",strtotime($content['sum_insured_start_date']));
		// $data['sum_insured_end_date'] =  date("Y-m-d",strtotime($content['sum_insured_end_date']));
		// $data['tpa'] = $content['tpa'];
		// $data['page_url'] = $content['page_url'];	
		$this->_data = $data;
		if ($this->db->insert('update_premium', $this->_data))	
		{	
			
			$id = $this->db->insert_id();


			return $id; 
		} 
		else 
		{
			return false;
		}
	}

	

	function edit($id, $content) 
	{
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_no'] = $content['policy_no'];
		$data['policy_type'] = $content['policy_type'];
		$data['inception_premium_amount'] = $content['inception_premium_amount'];
		
		$data['addition_premium_amount'] = $content['addition_premium_amount'];
		$data['deletion_premium_amount'] = $content['deletion_premium_amount'];
		$data['total_premium_amount'] = $content['total_premium_amount'];
		$data['reported_claim_amount'] = $content['reported_claim_amount'];
		$data['total_claim_paid_amount'] = $content['total_claim_paid_amount'];
		$data['claim_under_process_amount'] = $content['claim_under_process_amount'];
		$data['claim_closed_reject'] = $content['claim_closed_reject'];

				

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('update_premium', $this->_data))	{

			
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

		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM update_premium where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM update_premium where corporate_id IN (".$corp_id.") ";
		}
		
		
		if($content['product_name'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['product_name']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		
		if($this->session->userdata('role_id') == 1){
			$sql_count = "SELECT * FROM update_premium where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql_count = "SELECT * FROM update_premium where corporate_id IN (".$corp_id.") ";
		}

		if($content['product_name'] !='')
		{
			$sql_count .= " AND `name` like '".$content['product_name']."%'";
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

		if ($this->db->delete('update_premium'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_policy_features($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('update_premium');
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


    function get_sum_insured_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('sum_insured');
        if ($query->num_rows() > 0) {
            $result = $query->row()->sum_insured;
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

	function get_policy_type($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('product_type');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
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


	function allsum_insured(){
		$sql = "select * from sum_insured";
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

	function allpolicy_using_id($id){
		$sql = "select * from sum_insured where policy_no = '".$id."'";
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

     function get_policy_suminsurance($pro_id)
    {   
    
        $this->db->where('policy_no',$pro_id);

        $query = $this->db->get('sum_insured');
       
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

		return $this->db->update('update_premium', $content);	

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
	
	
	function get_product_type($pro_id)
    {   
    
        $this->db->where('id',$pro_id);
		
		//$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

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

	function allpolicy_using_corporate($id){
		$sql = "select * from policy where corporate_id = '".$id."' and policy_end_date >= '".date('Y-m-d')."'";
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

	function get_form_field($id){

		$sql = "SELECT * FROM `form_field` WHERE find_in_set( '".$id."', product_type_id )";
		
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

	function form_field_attribute($id){
		
		$sql = "select * from form_field_attribute where form_field_id = '".$id."'";
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

	function radio_attribute($id){
		
		$sql = "select * from form_field_attribute_radio where form_field_id = '".$id."'";
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

}

?>