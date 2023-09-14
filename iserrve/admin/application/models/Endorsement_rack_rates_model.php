<?php
	class ENdorsement_rack_rates_model extends CI_Model {
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
		$data['sum_insured'] = $content['sum_insured'];
		$data['endorsement_type'] = $content['endorsement_type'];
		$data['suminsure_val'] = $content['suminsure_hidden'];
		
		$data['date'] = date("Y-m-d");

		

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$this->_data = $data;
		if ($this->db->insert('endorsement_rack_rates', $this->_data))	
		{	
			
			$id = $this->db->insert_id();


			if (count($_POST['agefrom']) > 0 && $_POST['agefrom'] != '') {
                for ($i = 0; $i < count($_POST['agefrom']); $i++) {

					if($_POST['agefrom'] != ''){
						$content['endorsement_rack_rates_id'] = $id;
						$content['agefrom'] = $_POST['agefrom'][$i];
						$content['ageto'] = $_POST['ageto'][$i];
						$content['rate_in_mili'] = $_POST['rate_in_mili'][$i];
						$content['annual_premium'] = $_POST['annual_premium'][$i];
						$this->insert_attribute($content);
					}
                }
            }


			return $id; 
		} 
		else 
		{
			return false;
		}
	}

	function addition_item($id) {
        $this->db->where('endorsement_rack_rates_id = ', $id);
        $query = $this->db->get('endorsement_rack_rates_attribute');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

	function removeattriute($product_id, $id) {
        $this->db->where('endorsement_rack_rates_id = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('endorsement_rack_rates_attribute')) {
            return true;
        } else {
            return false;
        }
    }

	function insert_attribute($content) {
        $data['endorsement_rack_rates_id'] = $content['endorsement_rack_rates_id'];
        $data['agefrom'] = $content['agefrom'];
        $data['ageto'] = $content['ageto'];
		$data['rate_in_mili'] = $content['rate_in_mili'];
		$data['annual_premium'] = $content['annual_premium'];

        $this->_data = $data;
        if ($this->db->insert('endorsement_rack_rates_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }

		

	function edit($id, $content) 
	{
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_no'] = $content['policy_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['endorsement_type'] = $content['endorsement_type'];
		$data['suminsure_val'] = $content['suminsure_hidden'];
		// 		ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('endorsement_rack_rates', $this->_data))	{
			
			$this->delete_old_policy_feature($id);

			if (count($_POST['agefrom']) > 0 && $_POST['agefrom'] != '') {
                for ($i = 0; $i < count($_POST['agefrom']); $i++) {

					if($_POST['agefrom'][$i] != ''){
						$content['endorsement_rack_rates_id'] = $id;
						$content['agefrom'] = $_POST['agefrom'][$i];
						$content['ageto'] = $_POST['ageto'][$i];
						$content['rate_in_mili'] = $_POST['rate_in_mili'][$i];
						$content['annual_premium'] = $_POST['annual_premium'][$i];
						$this->insert_attribute($content);
					}
                }
            }

			
			if (count($_POST['agefromu']) > 0 && $_POST['agefromu'] != '') {
                for ($i = 0; $i < count($_POST['agefromu']); $i++) {

					if($_POST['agefromu'][$i] != ''){
						$content['endorsement_rack_rates_id'] = $id;
						$content['agefrom'] = $_POST['agefromu'][$i];
						$content['ageto'] = $_POST['agetou'][$i];
						$content['rate_in_mili'] = $_POST['rate_in_miliu'][$i];
						$content['annual_premium'] = $_POST['annual_premiumu'][$i];
						$this->insert_attribute($content);
					}
                }
            }

			return true;
		} else {
			return false;
		}
	}

	function update_attribute($content) {

        $data1['policy_features_id'] = $content['policy_features_id'];

        $data1['field_id'] = $content['field_idu'];

        $data1['field_type'] = $content['field_type'];

		$data1['status'] = $content['status'];

		$data1['radio_att_flag'] = $content['radio_att_flag'];
		

        // $this->db->where('id =', $content['updateid1xxx']);

        // if ($this->db->update('policy_features_attribute', $data1)) {
        //     return true;
        // } else {
        //     return false;
        // }

		$this->_data = $data1;
        if ($this->db->insert('policy_features_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }

	function delete_old_policy_feature($id){

		//echo "sd".$id;exit;

		$this->db->where('endorsement_rack_rates_id = ',$id);

		

		if ($this->db->delete('endorsement_rack_rates_attribute'))	{

			return true;

		} else {

			return false;

		}
	}

		

		function featured_product($pid,$value)
	{
		$query = "update endorsement_rack_rates set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		/* if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM endorsement_rack_rates where id <> 0 ";
		if($content['product_name'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['product_name']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  endorsement_rack_rates  WHERE id <> 0";

		if($content['product_name'] !='')
		{
			$sql_count .= " AND `name` like '".$content['product_name']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret; */
		
		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM endorsement_rack_rates  ";
		}else{
			
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM endorsement_rack_rates where corporate_id IN (".$corp_id.") ";
		}
		//echo $sql;

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}

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

		if ($this->db->delete('endorsement_rack_rates'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_policy_features($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('endorsement_rack_rates');
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

	
	
	function get_sum_insure_val($pro_id)
    {   
    
        $this->db->where('id',$pro_id);

        $query = $this->db->get('sum_insured');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row();
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

		return $this->db->update('endorsement_rack_rates', $content);	

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
		$sql= " update user set active_deactive= '".$is_active."' where id='".$id."' ";		
		if ($query = $this->db->query($sql))	{			
			return true;		
		} else {			
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

	function get_answer_data($policy_features_id,$field_id){
		
		$sql = "select * from policy_features_attribute where policy_features_id = '".$policy_features_id."' and field_id = '".$field_id."' and radio_att_flag = 0";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->row();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function get_answer_data_radio_att($policy_features_id,$field_id){
		
		$sql = "select * from policy_features_attribute where policy_features_id = '".$policy_features_id."' and field_id = '".$field_id."' and radio_att_flag = 1";
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