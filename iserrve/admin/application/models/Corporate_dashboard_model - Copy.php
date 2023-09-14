<?php
class Corporate_dashboard_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}
	
	function get_all_corporate()
	{
		
		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM corporate  ";
		}else{
			
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM corporate where id IN (".$corp_id.") ";
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
	
	

	function get_all_policy()
	{
		$sql = "SELECT * FROM policy  ";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}

	}

	function get_all_suminsured()
	{
		$sql = "SELECT * FROM sum_insured  ";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}

	}

	function get_city_name($id){
		$sql = "SELECT * FROM city where id = '".$id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->name;
			return $result;
		}else{
			return false;
		}
	}

	function get_state_name($id){
		$sql = "SELECT * FROM state where id = '".$id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->name;
			return $result;
		}else{
			return false;
		}
	}

	function get_policy_using_corporate($corp_id){

		$sql = "SELECT * FROM policy where corporate_id = '".$corp_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	function get_enrolement_details($corp_id,$policy_id){

		$sql = "SELECT * FROM employee_enrollment where corporate_id = '".$corp_id."' and policy_no = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	function get_policy_feature_details($corp_id,$policy_id){

		$sql = "SELECT * FROM policy_features where corporate_id = '".$corp_id."' and policy_no = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}else{
			return false;
		}
	}
	
	function get_policy_feature_attribute($id){

		$sql = "SELECT * FROM policy_features_attribute where policy_features_id = '".$id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
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
	
	
	function get_form_field_attribute_option_name($id){
		
		$sql = "select * from form_field_attribute where id = '".$id."'";
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
	
	function get_enrolement_att($id){
		/* $this->db->where('e_id = ', $id);
		$this->db->where('relationship != ', 'Employee');
		$this->db->where('status = ', 0);
		$query = $this->db->get('employee_enrollment_attributes');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        } */
		
		$sql = "SELECT * FROM employee_enrollment_attributes where e_id = '".$id."' and relationship = 'Employee' and status = 0";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	function get_policy_using_id($id){

		$sql = "SELECT * FROM policy where id = '".$id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}else{
			return false;
		}
	}

	function get_update_premium_data($corporate_id,$policy_id){

		$sql = "SELECT * FROM update_premium where corporate_id = '".$corporate_id."' and  policy_no = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}else{
			return false;
		}
	}

	function get_reported_claim_amount($corporate_id,$policy_id){

		$sql = "SELECT SUM(amount_claimed) as total FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id."";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->row()->total;
            return $result;
		}
		else
		{
			return false;
		}
	}

	function get_total_claim_paid($corporate_id,$policy_id){

		$sql = "SELECT SUM(sactioned_amount) as total FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id." and claim_status = 'paid'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->row()->total;
            return $result;
		}
		else
		{
			return false;
		}
	}

	function get_claim_under_process($corporate_id,$policy_id){

		$sql = "SELECT SUM(amount_claimed) as total FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id." and (claim_status='under process' OR claim_status='under process - deficiency' OR claim_status ='intimidated and file not recieved' OR claim_status ='AL issued' OR claim_status ='Intimated')";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->row()->total;
            return $result;
		}
		else
		{
			return false;
		}
	}

	function get_claim_close_reject_amount($corporate_id,$policy_id){

		$sql = "SELECT SUM(amount_claimed) as total FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id." and (claim_status='rejected' OR claim_status='repudiated')";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->row()->total;
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

	
	public function chech_employee_status($corporate_id,$policy_id,$suminsured_id){
        $this->db->where('corporate_id', $corporate_id);
        $this->db->where('policy_no', $policy_id);
        $this->db->where('sum_insured', $suminsured_id);
				$query = $this->db->get('employee_enrollment');
        if ($query->num_rows() > 0) {
            $id = $query->row()->id;
            return $id;
        }
        return 0;
    }
	
	public function check_attribute($product_id,$employee_id,$relationship){
        $this->db->where('e_id', $product_id);
        $this->db->where('employee_id', $employee_id);
		$this->db->where('relationship', $relationship);
        //$this->db->where('colour', $product_color);
        $query = $this->db->get('employee_enrollment_attributes');
        if ($query->num_rows() > 0) {
            $id = $query->row()->id;
            return $id;
        }
        return 0;
    }
	
	public function getPolicyData($policy_id){
	      try{
	          $this->db->select('policy.insurer,policy.product_name,policy.policy_no,policy.tpa,policy.policy_start_date,policy.policy_end_date,corporate.co_name');
	          $this->db->from('policy');
	          $this->db->join('corporate', 'corporate.id = policy.corporate_id','LEFT');
	          $this->db->where('policy.id',$policy_id);

	          $query=$this->db->get();
	              if($this->db->affected_rows() > 0){
	                  $data = $query->row_array();   //please check
	                  return $data;
	              }else{
	                  return false;
	              }
	      }catch(Exception $ex){
	          error_log($ex->getTraceAsString());
	          echo $ex->getTraceAsString();
	          return FALSE;
	      }
	  }
	  
	  function add_employee_active_verification_xls($content)

	{
		
		
		
		// echo "test";exit;
		$L_strErrorMessage='';
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_id'] = $content['policy_id'];
		$data['suminsure_id'] = $content['suminsure_id'];
		$data['employee_id'] = $content['Employee_id'];
		$data['name_of_the_employee'] = $content['name_of_the_employee'];
		$data['relationship'] = $content['relationship'];
		$data['date_of_joining'] = date("Y-m-d",strtotime($content['date_of_joining']));
		$data['d_o_b'] = date("Y-m-d",strtotime($content['d_o_b']));
		$data['gender'] = $content['gender'];
		$data['age'] = $content['age'];
		$data['email'] = $content['email'];
		$data['mobile_no'] = $content['mobile_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['hr_cc'] = $content['hr_cc'];
	    $data['created_at'] = date("Y-m-d h:i:sa");

		$this->_data = $data;
		if ($this->db->insert('employee_active_verification_xls', $this->_data))
		{
			$id = $this->db->insert_id();

			return $id;
		}
		else
		{
			return false;
		}
	}

	public function check_attribute_active_user($data){

        $this->db->where('corporate_id', $data['corporate_id']);
        $this->db->where('policy_id', $data['policy_id']);
		$this->db->where('suminsure_id', $data['suminsure_id']);
		$this->db->where('employee_id', $data['Employee_id']);
        //$this->db->where('colour', $product_color);
        $query = $this->db->get('employee_active_verification_xls');
        if ($query->num_rows() > 0) {
            $id = $query->row()->id;
            return $id;
        }
        return 0;
    }
	
	function get_e_card($employee_id){

		echo $sql = "SELECT * FROM tbl_e_card where employee_id = '".$employee_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}else{
			return 0;
		}
	}

    public function get_employee_mail_count($id){

        $this->db->where('id', $id);
        
        //$this->db->where('colour', $product_color);
        $query = $this->db->get('employee_active_verification_xls');
        if ($query->num_rows() > 0) {
            $id = $query->row()->mail_sent_count;
            return $id;
        }
        return 0;
    }
	

	function update_employee_active_verification_xls($id,$content)

	{
		
		
		
		// echo "test";exit;
		$L_strErrorMessage='';
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_id'] = $content['policy_id'];
		$data['suminsure_id'] = $content['suminsure_id'];
		$data['employee_id'] = $content['Employee_id'];
		$data['name_of_the_employee'] = $content['name_of_the_employee'];
		$data['relationship'] = $content['relationship'];
		$data['date_of_joining'] = date("Y-m-d",strtotime($content['date_of_joining']));
		$data['d_o_b'] = date("Y-m-d",strtotime($content['d_o_b']));
		$data['gender'] = $content['gender'];
		$data['age'] = $content['age'];
		$data['email'] = $content['email'];
		$data['mobile_no'] = $content['mobile_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['hr_cc'] = $content['hr_cc'];
	    $data['mail_sent_count'] = $content['mail_sent_count'];


	    $this->db->where('id', $id);
		
          if($this->db->update('employee_active_verification_xls',$data)){
              return true;
          }else{
              return false;
          }

		// $this->_data = $data;
		// if ($this->db->insert('employee_active_verification_xls', $this->_data))
		// {
		// 	$id = $this->db->insert_id();

		// 	return $id;
		// }
		// else
		// {
		// 	return false;
		// }
	}
	  
	  function get_group_code($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->group_code;
            return $result;
        } else {
            return false;
        }
    }
	  
	
	function get_active_verification_user_xls_data($corp_id,$pro_id)
    {   
		$this->db->where('corporate_id',$corp_id);
        $this->db->where('policy_id',$pro_id);

        $query = $this->db->get('employee_active_verification_xls');
       
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

	function get_employee_atrribute($employee_id)
    {   
		

		$sql = "SELECT * FROM employee_enrollment_attributes WHERE employee_id   = '".$employee_id."' and relationship  != 'Employee'";
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

    function check_employee_verification($employee_id)
    {   
		

		$sql = "SELECT * FROM tbl_employee WHERE emp_id   = '".$employee_id."' ";
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

	
	

	function get_emp_data_verified_active_excel($id)
    {   
		

		$sql = "SELECT * FROM employee_active_verification_xls WHERE id   = '".$id."' ";
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

	function single_policy_data($policy_id){
		// echo $policy_id;exit;

		$sql = "select * from policy where id = '".$policy_id."'";

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

	function update_policy_data($content)

	{

		// echo "test";exit;
		$L_strErrorMessage='';
		$id = $content['policy_id'];
		$data['policy_no'] = $content['policy_no'];
		$data['tpa'] = $content['tpa'];
		$data['policy_start_date'] = $content['policy_start_date'];
		$data['policy_end_date'] = $content['policy_end_date'];
		
	    $this->db->where('id', $id);
		
          if($this->db->update('policy',$data)){
              return true;
          }else{
              return false;
          }

		
	}
	


	function find_corporat_id_cd($corp_id){

		$sql = "select * from cd_statement_entry where corporate_id = '".$corp_id."'";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			
            return 1;
		}
		else
		{
			return 0;
		}

	}

	function find_corp_id_policy_id_cal($corp_id,$policy_id){

		$sql = "select * from endorsement_calculation where corporate_id = '".$corp_id."' and policy_no = '".$policy_id."'";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			
            return 1;
		}
		else
		{
			return 0;
		}

	}
	
	function live_claim_data($corp_id,$policy_id){

		$sql = "SELECT * FROM upload_claims where corporate = '".$corp_id."' and policy_no = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	function add_corporate_buffer($content)

	{

		// echo "test";exit;
		$L_strErrorMessage='';
		
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_id'] = $content['policy_id'];
		$data['total_corporate_sum_insured'] = $content['total_corporate_sum_insured'];
		$data['created_at'] = date("Y-m-d h:i:sa");
		
	   
        $this->_data = $data;
		if ($this->db->insert('corporate_buffer_sum_insured', $this->_data))
		{
			$id = $this->db->insert_id();

			return $id;
		}
		else
		{
			return false;
		}

		
	}
	
	
	function get_total_count_corporate_buffer_sum_insured($corp_id,$policy_id){

		$sql = "SELECT SUM(total_corporate_sum_insured) AS total FROM corporate_buffer_sum_insured WHERE corporate_id = '".$corp_id."' and policy_id = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->total;
			return $result;
		}else{
			return false;
		}
	}
	
	
	function get_employee_enrolement_att($e_id){
		
		$sql = "SELECT * FROM `employee_enrollment_attributes` WHERE e_id IN(".$e_id.")";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
		
	}
	
	
	function get_employee_enrolement_att_data($id){
		
		$sql = "SELECT * FROM `employee_enrollment_attributes` WHERE id = '".$id."' ";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}else{
			return false;
		}
		
	}
	
	
	function get_policy_name($id) {

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


	function get_document_type($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('document_type');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }
	
	
	function live_utilitie_tap_data($corp_id,$policy_id){

		$sql = "SELECT * FROM utilities where corporate_id = '".$corp_id."' and policy_no = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	function add_corporate_buffer_utilization($content){
		
		$L_strErrorMessage='';

		
		$data['corporate_id'] = $content['corporate_id'];
		$data['policy_id'] = $content['policy_id'];
		$data['employe_id'] = $content['employe_id'];
		$data['member_id'] = $content['member_id'];
		$data['contact_number'] = $content['contact_number'];
		$data['email_address'] = $content['email_address'];
		$data['claim_amount'] = $content['claim_amount'];
		$data['settled_amount'] = $content['settled_amount'];
		$data['employee_si_utilised'] = $content['employee_si_utilised'];
		$data['corporate_buffer_used'] = $content['corporate_buffer_used'];
		$data['ailment'] = $content['ailment'];
		
		if($content['document'] != ''){
			$data['document'] = $content['document'];
		}
		
		$data['created_at'] = date("Y-m-d h:i:sa");

		$this->_data = $data;
		if ($this->db->insert('corporate_buffer_utilization', $this->_data))	
		{	
			
			$id = $this->db->insert_id();


			return $id; 
		} 
		else 
		{
			return false;
		}
		
	}
	
	function get_corporate_buffer_utilization($corp_id,$policy_id){

		$sql = "SELECT * FROM corporate_buffer_utilization where corporate_id = '".$corp_id."' and policy_id = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}
	
	
	function get_member_data($id){

		$sql = "SELECT * FROM employee_enrollment_attributes where id = '".$id."' ";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}else{
			return false;
		}
	}
	
	
	function get_utilized_corporate_sum_insured_count($corp_id,$policy_id){

		$sql = "SELECT SUM(corporate_buffer_used) AS total FROM corporate_buffer_utilization WHERE corporate_id = '".$corp_id."' and policy_id = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->total;
			return $result;
		}else{
			return false;
		}
	}
	
	
	function live_Escalation_data($corp_id,$policy_id){

		$sql = "SELECT * FROM escalation_level where corporate_id = '".$corp_id."' and policy_no = '".$policy_id."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
			return false;
		}
	}


	function get_escalation_user_data($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('user_escalation');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return false;
        }
    }
	
	
	
	
	function get_total_claim_reported_cashless_data($corporate_id,$policy_id){

		$sql = "SELECT * FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id." and claim_type = 'CASHLESS'";
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
	
	function get_total_claim_reported_Reimbursement_data($corporate_id,$policy_id){

		$sql = "SELECT * FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id." and claim_type = 'REIMBURSEMENT'";
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
	
	function get_claim_status_report_cashless_outstandindg($corporate_id,$policy_id){

		$sql = "SELECT * FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id." and claim_type = 'CASHLESS' and (claim_status='under process' OR claim_status='under process - deficiency' OR claim_status ='intimidated and file not recieved' OR claim_status ='AL issued' OR claim_status ='Intimated')
		";
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
	
	function get_claim_status_report_cashless_paid($corporate_id,$policy_id){

		$sql = "SELECT * FROM upload_claims WHERE corporate   = ".$corporate_id." and policy_no  = ".$policy_id." and claim_type = 'CASHLESS' and (claim_status='under process' OR claim_status='under process - deficiency' OR claim_status ='intimidated and file not recieved' OR claim_status ='AL issued' OR claim_status ='Intimated')
		";
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
