<?php

class Home_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_all_employees($policy_id='') {
       try{
           $corporate_id = $this->session->userdata('hr_login_id');
           $this->db->select('employee_enrollment_attributes.employee_id,employee_enrollment_attributes.name_of_the_employee as emp_name,employee_enrollment_attributes.gender,employee_enrollment_attributes.relationship,employee_enrollment_attributes.d_o_b AS birth_date,employee_enrollment_attributes.age,employee_enrollment_attributes.mobile_no,employee_enrollment_attributes.email,DATE_FORMAT(employee_enrollment_attributes.created_at, "%d-%m-%Y") AS created_date');
           $this->db->from('employee_enrollment_attributes');
           $this->db->join('employee_enrollment', 'employee_enrollment.id = employee_enrollment_attributes.e_id','LEFT');
           if(!empty($policy_id)){
             $this->db->where('employee_enrollment.policy_no', $policy_id);
           }
           $this->db->where('employee_enrollment.corporate_id', $corporate_id);
           $this->db->where('employee_enrollment_attributes.status', 0);
           $this->db->where('employee_enrollment_attributes.relationship !=', '');
           $this->db->where('employee_enrollment_attributes.relationship', 'Employee');
           $query =$this->db->get();
           return $query->result_array();
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }

    public function get_all_employees_with_dependent($policy_id='') {
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('employee_enrollment_attributes.employee_id,employee_enrollment_attributes.name_of_the_employee as emp_name,employee_enrollment_attributes.gender,employee_enrollment_attributes.relationship,employee_enrollment_attributes.d_o_b AS birth_date,employee_enrollment_attributes.date_of_joining AS joining_date,employee_enrollment_attributes.age,employee_enrollment_attributes.mobile_no,employee_enrollment_attributes.email,DATE_FORMAT(employee_enrollment_attributes.created_at, "%d-%m-%Y") AS created_date');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment.id = employee_enrollment_attributes.e_id','LEFT');
            if(!empty($policy_id)){
              $this->db->where('employee_enrollment.policy_no', $policy_id);
            }
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment_attributes.status', 0);
            $this->db->where('employee_enrollment_attributes.relationship !=', '');
            // $this->db->where('employee_enrollment_attributes.relationship', 'Employee');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_no_of_employees($policy_id=''){ //check for condition
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(employee_enrollment_attributes.relationship="Employee" AND employee_enrollment_attributes.status=0,1,NULL)) as only_emp,
            COUNT(IF(employee_enrollment_attributes.relationship!="Employee" AND employee_enrollment_attributes.status=0
            ,1,NULL)) as without_emp,
            COUNT(IF(employee_enrollment_attributes.type_of_addition="delete" AND employee_enrollment_attributes.status=1
            ,1,NULL)) as delete_emp'
          );
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            if(!empty($policy_id)){
              $this->db->where('employee_enrollment.policy_no', $policy_id);
            }
            $query=$this->db->get();
            if($query->num_rows() > 0){
                $data = $query->row_array();
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

    public function get_policy_by_corporate($policy_id=''){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('id,product_type,product_name,policy_no,tpa,insurer,DATE_FORMAT(policy_start_date, "%d/%m/%Y") AS policy_start,DATE_FORMAT(policy_end_date, "%d/%m/%Y") AS policy_end,policy_start_date,policy_end_date');
            $this->db->from('policy');
            $this->db->where('corporate_id', $corporate_id);
            $this->db->where('policy_end_date >', date("Y-m-d"));
            if(!empty($policy_id)){
              $this->db->where('id', $policy_id);
            }
            $query =$this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_family_members($employee_id) {
       try{
           $corporate_id = $this->session->userdata('hr_login_id');
           $this->db->select('name_of_the_employee as emp_name,gender,relationship,d_o_b AS birth_date,age,mobile_no,email,DATE_FORMAT(created_at, "%d-%m-%Y") AS created_date');
           $this->db->from('employee_enrollment_attributes');
           $this->db->join('employee_enrollment', 'employee_enrollment.id = employee_enrollment_attributes.e_id','LEFT');
           $this->db->where('employee_enrollment.corporate_id', $corporate_id);
           $this->db->where('employee_enrollment_attributes.employee_id', $employee_id);
           $this->db->where('employee_enrollment_attributes.status', 0);
           $this->db->where('employee_enrollment_attributes.relationship !=', '');
           $this->db->where('employee_enrollment_attributes.relationship !=', 'Employee');
           $query =$this->db->get();
           if($query->num_rows() > 0){
               return $query->result_array();
           }else{
               return false;
           }
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }

    public function get_policy_tpa($policy_id){
        try{
            $this->db->select('policy_features.id,policy_features.product_type,policy.tpa,policy_features.inclusions');
            $this->db->from('policy');
            $this->db->join('policy_features', 'policy_features.policy_no = policy.id','LEFT');
            $this->db->where('policy.id',$policy_id);
            $this->db->where('policy.policy_end_date >', date("Y-m-d"));
            $query=$this->db->get();
                if($query->num_rows() > 0){
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

    public function get_e_card($policy_id,$employee_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('*');
            //$this->db->select('is_upload_from');
            $this->db->from('tbl_e_card');
            $this->db->where('corporate_id', $corporate_id);
            $this->db->where('policy_id', $policy_id);
            $this->db->where('is_deleted',0);
            $this->db->where('employee_id',$employee_id);
            $query =$this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return false;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    function get_e_card_new($employee_id){

        $sql = "SELECT * FROM tbl_e_card where employee_id = '".$employee_id."'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }else{
            return 0;
        }
    }

    public function get_policy_no($policy_id) {
        try{
            $this->db->select('policy_no,product_type');
            $this->db->where('policy.id', $policy_id);
            $this->db->where('policy.policy_end_date >', date("Y-m-d"));
            $query = $this->db->get('policy');
            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result;
            } else {
                return false;
            }
        }catch(Exception $ex){
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
        }
    }

    public function get_cd_balance(){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('id,cd_number');
            $this->db->from('cd_statement_entry');
            $this->db->where('cd_statement_entry.corporate_id',$corporate_id);
            $query=$this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_active_logins(){
  		 try{
           $group_code = $this->session->userdata('group_code');
  				 $this->db->select('COUNT(id) as active_logins');
  				 $this->db->from('tbl_employee');
  				 $this->db->where('group_code',$group_code);
  				 $query=$this->db->get();
  				 if($this->db->affected_rows() > 0){
  						 return $query->row()->active_logins;
  				 }else{
  						 return false;
  				 }
  		 }catch(Exception $ex){
  				 error_log($ex->getTraceAsString());
  				 echo $ex->getTraceAsString();
  				 return FALSE;
  		 }
   }
   
   
}
