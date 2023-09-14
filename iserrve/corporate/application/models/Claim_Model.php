<?php

class Claim_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_no_of_claims($policy_id='') {
       try{
          $corporate_id = $this->session->userdata('hr_login_id');
          /********* Reported Claims**********/
          $this->db->select('COUNT("upload_claims.id") as reported_claims, SUM(amount_claimed) as amount');
          $this->db->from('upload_claims');
          $this->db->where('corporate', $corporate_id);
          if(!empty($policy_id)){
            $this->db->where('policy_no', $policy_id);
          }
          $query =$this->db->get();
          // echo '<pre>'; print_r($this->db->last_query());exit;
          $array['reported_claims'] = $query->row();
          /******Paid Claims ************/
          $this->db->select('COUNT("upload_claims.id") as paid_claims, SUM(amount_claimed) as amount');
          $this->db->from('upload_claims');
          if(!empty($policy_id)){
            $this->db->where('policy_no', $policy_id);
          }
          $this->db->where('corporate', $corporate_id);
          $this->db->where('claim_status', 'Paid');
          $query1 =$this->db->get();
          $array['paid_claims'] = $query1->row();
          /******Processing  Claims ************/
          $bind = array('Intimated and File not received','Processing','Under Process','Under Process - Deficiency','AL Issued');
          $this->db->select('COUNT("upload_claims.id") as processing_claims, SUM(amount_claimed) as amount');
          $this->db->from('upload_claims');
          if(!empty($policy_id)){
            $this->db->where('policy_no', $policy_id);
          }
          $this->db->where('corporate', $corporate_id);
          $this->db->where_in('claim_status', $bind);
          $query2 =$this->db->get();
          $array['processing_claims'] = $query2->row();
          /******Rejected  Claims ************/
          $binds = array('Repudiated','Rejected','Denied','Closed');
          $this->db->select('COUNT("upload_claims.id") as rejected_claims, SUM(amount_claimed) as amount');
          $this->db->from('upload_claims');
          if(!empty($policy_id)){
            $this->db->where('policy_no', $policy_id);
          }
          $this->db->where('corporate', $corporate_id);
          $this->db->where_in('claim_status', $binds);
          $query3 =$this->db->get();
          $array['rejected_claims'] = $query3->row();
          return $array;

       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }

    public function get_all_claims($policy_id='') {
       try{
           $corporate_id = $this->session->userdata('hr_login_id');
           $this->db->select('id,employee_id,employee_name,patient_name,relation,DATE_FORMAT(hospitlization_date, "%d-%m-%Y") AS hospitliz_date,hospital_name,amount_claimed,sactioned_amount,claim_type,claim_status,insurance_claim_no,DATE_FORMAT(created_at, "%d-%m-%Y") AS created_date');
           $this->db->from('upload_claims');
           $this->db->where('corporate', $corporate_id);
           if(!empty($policy_id)){
             $this->db->where('policy_no', $policy_id);
           }
           $query =$this->db->get();
           if($query->num_rows() > 0){
               $data['records'] = $query->result_array();
               if(!empty($policy_id)){
                   $this->db->select('tpa');
                   $this->db->from('policy');
                   $this->db->where('corporate_id', $corporate_id);
                   $this->db->where('id', $policy_id);
                   $query1 =$this->db->get();
                   $data['tpa'] = $query1->row_array();
               }
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

    public function get_claim_details_by_id($claim_id) {
        try{
            $this->db->select('*');
            $this->db->from('upload_claims');
            $this->db->where('id', base64_decode($claim_id));
            $query =$this->db->get();
            $array = array();
            if($query->num_rows() > 0){
                $array = $query->row();
            }
            return $array;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_claims_data($policy_id='') {
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('*');
            $this->db->from('upload_claims');
            $this->db->where('corporate', $corporate_id);
            if(!empty($policy_id)){
              $this->db->where('policy_no', $policy_id);
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

    public function get_all_state() {
        try{
            $this->db->select('state');
            $this->db->from('cities');
            $this->db->group_by('state');
            $this->db->order_by('state', 'ASC');
            $query =$this->db->get();

            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_emp_details($employee_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('employee_enrollment_attributes.e_id,employee_enrollment_attributes.employee_id,policy.policy_no,policy.id as policy_id');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
            $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
            $this->db->where('employee_enrollment_attributes.employee_id',$employee_id);
            $this->db->where('policy.corporate_id',$corporate_id);
            $this->db->where('employee_enrollment_attributes.relationship','Employee'); //if final to insert self to uncomment or_where condition
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

    public function get_relation_by_policy($policy_id,$employee_no){
          try{
              $this->db->select('employee_enrollment_attributes.relationship,policy.product_type,policy.policy_no,corporate.co_name,corporate.hr_email,corporate.sales_person_email,corporate.operations_person_email,policy.tpa_person_email,policy.tpa');
              $this->db->from('employee_enrollment_attributes');
              $this->db->join('tbl_employee', 'tbl_employee.emp_id = employee_enrollment_attributes.employee_id','LEFT');
              $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
              $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
              $this->db->join('corporate', 'employee_enrollment.corporate_id = corporate.id','LEFT');
              $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
              $this->db->where('employee_enrollment.policy_no',$policy_id); //if final to insert self to uncomment or_where condition
              // $this->db->or_where('employee_enrollment_attributes.relationship','Self');
              $query=$this->db->get();
                  if($query->num_rows() > 0){
                      return $query->result();
                  }else{
                      return false;
                  }
          }catch(Exception $ex){
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
          }
  	}

    public function insert_claim_data($data){
        try{
            $this->db->insert('tbl_claim', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_city($state='') {
        try{
            $this->db->select('city');
            $this->db->from('cities');
            if(!empty($state)){
              $this->db->where('state',$state);
            }
            $this->db->order_by('city', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_patient_details_by_member_id($policy_id,$employee_no,$relation){
          try{
              $this->db->select('employee_enrollment_attributes.relationship,employee_enrollment_attributes.name_of_the_employee as patient_name,employee_enrollment_attributes.email,employee_enrollment_attributes.mobile_no');
              $this->db->from('employee_enrollment_attributes');
              $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
              $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
              $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
              $this->db->where('employee_enrollment.policy_no',$policy_id);
              $this->db->where('employee_enrollment_attributes.relationship',$relation);
              $query=$this->db->get();
                  if($query->num_rows() > 0){
                      return $query->row_array();
                  }else{
                      return false;
                  }
          }catch(Exception $ex){
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
          }
  	}

    public function get_member_id($employee_id,$relation){
      try{
            $this->db->select('member_id');
            $this->db->from('employee_enrollment_attributes');
            $this->db->where('employee_id',$employee_id);
            $this->db->where('relationship',$relation);
            $query=$this->db->get();
            if($query->num_rows() > 0){
                return $query->row()->member_id;
            }
      }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
      }
    }
}
