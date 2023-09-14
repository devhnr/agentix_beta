<?php

class Buffer_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_all_corporate_buffer($policy_id){
        try{
          $corporate_id = $this->session->userdata('hr_login_id');
          $this->db->select('employee_enrollment_attributes.relationship,employee_enrollment_attributes.name_of_the_employee as emp_name,corporate_buffer_utilization.*');
          $this->db->from('corporate_buffer_utilization');
          $this->db->join('employee_enrollment_attributes', 'corporate_buffer_utilization.member_id = employee_enrollment_attributes.id','LEFT');
          $this->db->where('corporate_buffer_utilization.corporate_id', $corporate_id);
          $this->db->where('corporate_buffer_utilization.policy_id',$policy_id);
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

    public function get_total_corporate_sum_insured($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('SUM(total_corporate_sum_insured) AS total_corporate');
            $this->db->from('corporate_buffer_sum_insured');
            $this->db->where('corporate_id', $corporate_id);
            $this->db->where('policy_id', $policy_id);
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

    public function get_utilized_corporate($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('SUM(corporate_buffer_used) as utilized_corporate');
            $this->db->from('corporate_buffer_utilization');
            $this->db->where('corporate_id', $corporate_id);
            $this->db->where('policy_id', $policy_id);
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
}
