<?php

class Endorsement_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_cd_numbers_by_corporate(){
        try{
          $corporate_id = $this->session->userdata('hr_login_id');
          $this->db->select('id,cd_number');
          $this->db->from('cd_statement_entry');
          $this->db->where('corporate_id',$corporate_id);
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

    public function get_deposite_entry($cd_no){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('product_type.name as product_type,policy.policy_no,cd_statement_entry.cd_number,endorsement_transaction.corporate_id,endorsement_transaction.particular,endorsement_transaction.bank_name,endorsement_transaction.cheque_utr_no,endorsement_transaction.amount,DATE_FORMAT(endorsement_transaction.date, "%d-%m-%Y") AS created_date, DATE_FORMAT(endorsement_transaction.date, "%d-%m-%Y") AS print_date,endorsement_transaction.upload_file');
            $this->db->from('endorsement_transaction');
            $this->db->join('cd_statement_entry', 'cd_statement_entry.id = endorsement_transaction.cd_number_id','LEFT');
            $this->db->join('policy', 'endorsement_transaction.policy_no = policy.id','LEFT');
            $this->db->join('product_type', 'endorsement_transaction.product_type = product_type.id','LEFT');
            $this->db->where('endorsement_transaction.corporate_id',$corporate_id);
            $this->db->where('endorsement_transaction.cd_number_id',$cd_no);
            $this->db->where('endorsement_transaction.policy_endorsement_entry',0);
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

    public function get_premium_entry($cd_no){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('product_type.name as product_type,policy.policy_no,endorsement_transaction.particular,endorsement_transaction.endorsement_no_policy,endorsement_transaction.employee_count_policy,endorsement_transaction.dependent_count_policy,endorsement_transaction.transaction_type,endorsement_transaction.gross_premium_policy,DATE_FORMAT(endorsement_transaction.date, "%d-%m-%Y") AS created_date,endorsement_transaction.upload_file');
            $this->db->from('endorsement_transaction');
            $this->db->join('policy', 'endorsement_transaction.policy_no = policy.id','LEFT');
            $this->db->join('product_type', 'endorsement_transaction.product_type = product_type.id','LEFT');
            $this->db->where('endorsement_transaction.corporate_id',$corporate_id);
            $this->db->where('endorsement_transaction.cd_number_id',$cd_no);
            $this->db->where('endorsement_transaction.policy_endorsement_entry',1);
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

    public function endersoment_net_premium_with_gst_total(){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('SUM(net_premium_with_gst) as total_provisional_balance');
            $this->db->from('endorsement_calculation');
            $this->db->where('corporate_id',$corporate_id);
            $query=$this->db->get();
            if($query->num_rows() > 0){
                return round($query->row()->total_provisional_balance);
            }else{
                return 0;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function corporate_endersoment_calculation(){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('id,endersoment_title,endersoment_number,transaction_statement,DATE_FORMAT(endorsement_calculation.created_at, "%d-%m-%Y") AS created_date');
            $this->db->from('endorsement_calculation');
            $this->db->where('corporate_id',$corporate_id);
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

    public function get_endorsement_calculation_table_data($ec_id){
        try{
          $corporate_id = $this->session->userdata('hr_login_id');
          $this->db->select('endorsement_calculation.endorsement_type,endorsement_calculation.policy_no,endorsement_calculation.policy_end_date');
          $this->db->from('endorsement_calculation');
          $this->db->where('endorsement_calculation.corporate_id',$corporate_id);
          $this->db->where('endorsement_calculation.id',$ec_id);
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

    public function export_operation_xl_file_data($ec_id,$operation,$endorsement_type){
        try{
            $this->db->select('employe_id,employe_name,relationship,age_group,gender,age,sum_insured,DATE_FORMAT(date_of_joining_leaving, "%d-%m-%Y") AS endo_date,DATE_FORMAT(date_of_birth, "%d-%m-%Y") AS dob');
            $this->db->from('endorsement_calculation_'.$operation.'_attribute_xlfile');
            $this->db->where('ec_id',$ec_id);
            if($endorsement_type == 'Family Wise'){
      			     $this->db->where('relationship','Employee');
      		  }
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

    public function get_rack_rate_id($policy_no,$endorsement_type){
      try{
          $corporate_id = $this->session->userdata('hr_login_id');
          $this->db->select('id');
          $this->db->from('endorsement_rack_rates');
          $this->db->where('corporate_id',$corporate_id);
          $this->db->where('policy_no',$policy_no);
          $this->db->where('endorsement_type',$endorsement_type);
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

    public function get_rack_rate_attribute($rack_rate_id,$age_array){
      try{
          $this->db->select('annual_premium');
          $this->db->from('endorsement_rack_rates_attribute');
          $this->db->where('endorsement_rack_rates_id',$rack_rate_id);
          $this->db->where('agefrom',$age_array[0]);
          $this->db->where('ageto',$age_array[1]);
          $query=$this->db->get();
          if($query->num_rows() > 0){
              return $query->row()->annual_premium;
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  	}

    public function get_calculation_table_data($calculation_id){
      try{
          $this->db->select('total_additional_premium,total_deletion_premium,net_premium,net_premium_with_gst,endersoment_title,endersoment_number,transaction_statement');
          $this->db->from('endorsement_calculation');
          $this->db->where('id',$calculation_id);
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

  public function get_endorsement_calculation_operation_attribute($calculation_id,$operation){
      try{
          if($operation == 'addition'){
              $this->db->select('id,suminsure_addition,annual_premium_addition,premium_per_day_addition,count_addition,addition_premium_addition');
          }else if($operation == 'deletion'){
              $this->db->select('id,suminsure_deletion,annual_premium_deletion,premium_per_day_deletion,count_deletion,addition_premium_deletion');
          }
          $this->db->from('endorsement_calculation_'.$operation.'_attribute');
          $this->db->where('endorsement_calculation_id',$calculation_id);
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
  
  public function get_active_logins_new(){
	   
		$group_code = $this->session->userdata('group_code');
		
  		$sql = "SELECT COUNT(id) as active_logins FROM tbl_employee where group_code ='".$group_code."' ";

		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)

		{

			$result = $query->row()->active_logins;

			return $result;

		}else

		{

			return false;

		}
   }
}
