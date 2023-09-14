<?php
	class ENdorsement_calculation_model extends CI_Model {
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

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
		$L_strErrorMessage='';
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_no'] = $content['policy_no'];
		$data['policy_start_date'] = $content['policy_start_date'];
		$data['policy_end_date'] = $content['policy_end_date'];
		$data['endorsement_type'] = $content['endorsement_type'];
		$data['total_additional_premium'] = $content['total_additional_premium'];
		$data['total_deletion_premium'] = $content['total_deletion_premium'];
		$data['net_premium'] = $content['net_premium'];
		$data['net_premium_with_gst'] = $content['net_premium_with_gst'];
		$data['endersoment_title'] = $content['endersoment_title'];
		$data['endersoment_number'] = $content['endersoment_number'];
		$data['transaction_statement'] = $content['transaction_statement'];
		
		$data['created_at'] = date("Y-m-d h:i:sa");

		

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$this->_data = $data;
		if ($this->db->insert('endorsement_calculation', $this->_data))	
		{	
			
			$id = $this->db->insert_id();


			if (count($_POST['age_name_addition']) > 0 && $_POST['age_name_addition'] != '') {
                for ($i = 0; $i < count($_POST['age_name_addition']); $i++) {

					if($_POST['age_name_addition'] != ''){
						$content['endorsement_calculation_id'] = $id;
						$content['age_name_addition'] = $_POST['age_name_addition'][$i];
						$content['suminsure_addition'] = $_POST['suminsure_addition'][$i];
						$content['annual_premium_addition'] = $_POST['annual_premium_addition'][$i];
						$content['premium_per_day_addition'] = $_POST['premium_per_day_addition'][$i];
						$content['count_addition'] = $_POST['count_addition'][$i];
						$content['addition_premium_addition'] = $_POST['addition_premium_addition'][$i];
						
						$this->insert_addition_attribute($content);
					}
                }
            }

			if (count($_POST['age_name_deletion']) > 0 && $_POST['age_name_deletion'] != '') {
                for ($i = 0; $i < count($_POST['age_name_deletion']); $i++) {

					if($_POST['age_name_deletion'] != ''){
						$content['endorsement_calculation_id'] = $id;
						$content['age_name_deletion'] = $_POST['age_name_deletion'][$i];
						$content['suminsure_deletion'] = $_POST['suminsure_deletion'][$i];
						$content['annual_premium_deletion'] = $_POST['annual_premium_deletion'][$i];
						$content['premium_per_day_deletion'] = $_POST['premium_per_day_deletion'][$i];
						$content['count_deletion'] = $_POST['count_deletion'][$i];
						$content['addition_premium_deletion'] = $_POST['addition_premium_deletion'][$i];
						
						$this->insert_deletion_attribute($content);
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

	function insert_addition_attribute($content) {
        $data['endorsement_calculation_id'] = $content['endorsement_calculation_id'];
        $data['age_name_addition'] = $content['age_name_addition'];
        $data['suminsure_addition'] = $content['suminsure_addition'];
		$data['annual_premium_addition'] = $content['annual_premium_addition'];
		$data['premium_per_day_addition'] = $content['premium_per_day_addition'];
		$data['count_addition'] = $content['count_addition'];
		$data['addition_premium_addition'] = $content['addition_premium_addition'];
		
        $this->_data = $data;
        if ($this->db->insert('endorsement_calculation_addition_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }

	function insert_deletion_attribute($content) {
        $data['endorsement_calculation_id'] = $content['endorsement_calculation_id'];
        $data['age_name_deletion'] = $content['age_name_deletion'];
        $data['suminsure_deletion'] = $content['suminsure_deletion'];
		$data['annual_premium_deletion'] = $content['annual_premium_deletion'];
		$data['premium_per_day_deletion'] = $content['premium_per_day_deletion'];
		$data['count_deletion'] = $content['count_deletion'];
		$data['addition_premium_deletion'] = $content['addition_premium_deletion'];
		
        $this->_data = $data;
        if ($this->db->insert('endorsement_calculation_deletion_attribute', $this->_data)) {
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
		if ($this->db->update('endorsement_calculation', $this->_data))	{
			
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
		$query = "update endorsement_calculation set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		/* if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM endorsement_calculation where id <> 0 ";
		if($content['product_name'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['product_name']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  endorsement_calculation  WHERE id <> 0";

		if($content['product_name'] !='')
		{
			$sql_count .= " AND `name` like '".$content['product_name']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret; */
		
		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM endorsement_calculation  ";
		}else{
			
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM endorsement_calculation where corporate_id IN (".$corp_id.") ";
		}
		

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

		if ($this->db->delete('endorsement_calculation'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_policy_features($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('endorsement_calculation');
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

	function get_rack_rates_id($data){

		$this->db->where('corporate_id =',$data['corporate']);
		$this->db->where('policy_no =',$data['policy_no']);
		$this->db->where('endorsement_type =',$data['type']);

        $query = $this->db->get('endorsement_rack_rates');
       
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

	function get_rack_rates_att($id){

		$this->db->where('endorsement_rack_rates_id =',$id);
		$query = $this->db->get('endorsement_rack_rates_attribute');
       
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

		return $this->db->update('endorsement_calculation', $content);	

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
		$sql = "select * from policy where corporate_id = '".$id."'";
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

	function add_addition_xls($content,$id)

	{
		// echo "test";exit;
		$L_strErrorMessage='';

		$data['ec_id'] = $id;

		$data['employe_id'] = $content['employe_id'];
		$data['employe_name'] = $content['employe_name'];
		$data['relationship'] = $content['relationship'];
		$data['date_of_joining_leaving'] = $content['date_of_joining_leaving'];
		$data['date_of_birth'] = date("Y-m-d",strtotime($content['date_of_birth']));
		$data['gender'] = $content['gender'];
		$data['age'] = $content['age'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['age_group'] = $content['age_group'];
		

		// echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->_data = $data;
		if ($this->db->insert('endorsement_calculation_addition_attribute_xlfile', $this->_data))
		{
			$id = $this->db->insert_id();

			return $id;
		}
		else
		{
			return false;
		}
	}

	function add_deletion_xls($content,$id)

	{
		// echo "test";exit;
		$L_strErrorMessage='';

		$data['ec_id'] = $id;

		$data['employe_id'] = $content['employe_id'];
		$data['employe_name'] = $content['employe_name'];
		$data['relationship'] = $content['relationship'];
		$data['date_of_joining_leaving'] = $content['date_of_joining_leaving'];
		$data['date_of_birth'] = date("Y-m-d",strtotime($content['date_of_birth']));
		$data['gender'] = $content['gender'];
		$data['age'] = $content['age'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['age_group'] = $content['age_group'];
		

		// echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->_data = $data;
		if ($this->db->insert('endorsement_calculation_deletion_attribute_xlfile', $this->_data))
		{
			$id = $this->db->insert_id();

			return $id;
		}
		else
		{
			return false;
		}
	}
	
	
	

	

}

?>