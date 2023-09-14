<?php

class Report_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_total_claim_reported($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            SUM(IF(upload_claims.claim_type="CASHLESS",upload_claims.amount_claimed,0)) as cashless_claimed,
            COUNT(IF(upload_claims.claim_type="CASHLESS",1,NULL)) as cashless_count,
            SUM(IF(upload_claims.claim_type="REIMBURSEMENT",upload_claims.amount_claimed,0)) as reimbursement_claimed,
            COUNT(IF(upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as reimbursement_count,
            ');
            $this->db->from('upload_claims');
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no', $policy_id);
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

    public function get_claim_status_reported($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('COUNT(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="CASHLESS",1,NULL)) as outstanding_cashless,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS",1,NULL)) as paid_cashless,
            COUNT(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="CASHLESS",1,NULL)) as rejected_cashless,
            COUNT(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as outstanding_reimbursement,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as paid_reimbursement,
            COUNT(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as rejected_reimbursement,
            ');
            $this->db->from('upload_claims');
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no', $policy_id);
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

    public function get_month_wise_claim_report($policy_id,$month_n){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('COUNT(IF(upload_claims.claim_type="CASHLESS",1,NULL)) as cashless,
            COUNT(IF(upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as reimbursement,
            ');
            $this->db->from('upload_claims');
            $this->db->where('MONTH(upload_claims.claim_filed_date)', $month_n);
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no', $policy_id);
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

    public function get_gender_wise_claim_report($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('COUNT(IF(upload_claims.gender="Male",1,NULL)) as male_claims,
            SUM(IF(upload_claims.gender="Male",upload_claims.sactioned_amount,0)) as male_claim_amt,
            COUNT(IF(upload_claims.gender="Female",1,NULL)) as female_claims,
            SUM(IF(upload_claims.gender="Female",upload_claims.sactioned_amount,0)) as female_claim_amt,
            ');
            $this->db->from('upload_claims');
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no', $policy_id);
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

    public function get_ralation_wise_claim_report($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.relation="DAUGHTER" OR upload_claims.relation="Daughter",1,NULL)) as claim_count_0,
            COUNT(IF(upload_claims.relation="Employee",1,NULL)) as claim_count_1,
            COUNT(IF(upload_claims.relation="FATHER" OR upload_claims.relation="Father",1,NULL)) as claim_count_2,
            COUNT(IF(upload_claims.relation="MOTHER" OR upload_claims.relation="Mother",1,NULL)) as claim_count_3,
            COUNT(IF(upload_claims.relation="Sister",1,NULL)) as claim_count_4,
            COUNT(IF(upload_claims.relation="SON" OR upload_claims.relation="Son",1,NULL)) as claim_count_5,
            COUNT(IF(upload_claims.relation="HUSBAND" OR upload_claims.relation="WIFE" OR upload_claims.relation="Spouse",1,NULL)) as claim_count_6,

            SUM(IF(upload_claims.relation="DAUGHTER" OR upload_claims.relation="Daughter",upload_claims.sactioned_amount,0)) as settled_amt_0,
            SUM(IF(upload_claims.relation="Employee" ,upload_claims.sactioned_amount,0)) as settled_amt_1,
            SUM(IF(upload_claims.relation="FATHER" OR upload_claims.relation="Father",upload_claims.sactioned_amount,0)) as settled_amt_2,
            SUM(IF(upload_claims.relation="MOTHER" OR upload_claims.relation="Mother",upload_claims.sactioned_amount,0)) as settled_amt_3,
            SUM(IF(upload_claims.relation="Sister",upload_claims.sactioned_amount,0)) as settled_amt_4,
            SUM(IF(upload_claims.relation="SON" OR upload_claims.relation="Son",upload_claims.sactioned_amount,0)) as settled_amt_5,
            SUM(IF(upload_claims.relation="HUSBAND" OR upload_claims.relation="WIFE" OR upload_claims.relation="Spouse",upload_claims.sactioned_amount,0)) as settled_amt_6,
            ');
            $this->db->from('upload_claims');
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no', $policy_id);
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

    public function get_age_wise_claim_report($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            SUM(IF(upload_claims.claim_status="Closed" AND (upload_claims.age BETWEEN 0 AND 25),upload_claims.sactioned_amount,0)) as under_26_0,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND (upload_claims.age BETWEEN 0 AND 25),upload_claims.sactioned_amount,0)) as under_26_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 0 AND 25),upload_claims.sactioned_amount,0)) as under_26_2,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND (upload_claims.age BETWEEN 0 AND 25),upload_claims.sactioned_amount,0)) as under_26_3,
            SUM(IF(upload_claims.claim_status="Closed" AND (upload_claims.age BETWEEN 26 AND 35),upload_claims.sactioned_amount,0)) as under_36_0,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND (upload_claims.age BETWEEN 26 AND 35),upload_claims.sactioned_amount,0)) as under_36_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 26 AND 35),upload_claims.sactioned_amount,0)) as under_36_2,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND (upload_claims.age BETWEEN 26 AND 35),upload_claims.sactioned_amount,0)) as under_36_3,
            SUM(IF(upload_claims.claim_status="Closed" AND (upload_claims.age BETWEEN 36 AND 45),upload_claims.sactioned_amount,0)) as under_46_0,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND (upload_claims.age BETWEEN 36 AND 45),upload_claims.sactioned_amount,0)) as under_46_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 36 AND 45),upload_claims.sactioned_amount,0)) as under_46_2,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND (upload_claims.age BETWEEN 36 AND 45),upload_claims.sactioned_amount,0)) as under_46_3,
            SUM(IF(upload_claims.claim_status="Closed" AND (upload_claims.age BETWEEN 46 AND 55),upload_claims.sactioned_amount,0)) as under_56_0,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND (upload_claims.age BETWEEN 46 AND 55),upload_claims.sactioned_amount,0)) as under_56_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 46 AND 55),upload_claims.sactioned_amount,0)) as under_56_2,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND (upload_claims.age BETWEEN 46 AND 55),upload_claims.sactioned_amount,0)) as under_56_3,
            SUM(IF(upload_claims.claim_status="Closed" AND (upload_claims.age BETWEEN 56 AND 65),upload_claims.sactioned_amount,0)) as under_66_0,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND (upload_claims.age BETWEEN 56 AND 65),upload_claims.sactioned_amount,0)) as under_66_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 56 AND 65),upload_claims.sactioned_amount,0)) as under_66_2,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND (upload_claims.age BETWEEN 56 AND 65),upload_claims.sactioned_amount,0)) as under_66_3,
            SUM(IF(upload_claims.claim_status="Closed" AND upload_claims.age > 65,upload_claims.sactioned_amount,0)) as greater_65_0,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.age > 65,upload_claims.sactioned_amount,0)) as greater_65_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.age > 65,upload_claims.sactioned_amount,0)) as greater_65_2,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.age > 65,upload_claims.sactioned_amount,0)) as greater_65_3,

            ');
            $this->db->from('upload_claims');
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no', $policy_id);
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

    public function get_top10_hospitals($policy_id){
      try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('SUM(upload_claims.amount_claimed) as sum_claim, COUNT(hospital_name) as claim_count, hospital_name');
            $this->db->from('upload_claims');
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no',$policy_id);
            $this->db->group_by('upload_claims.hospital_name');
            $this->db->order_by('sum_claim','DESC');
            $this->db->limit('10');
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

    public function get_top10_paid_hospitals($policy_id){
      try{
            $bind = array('Paid','Approved');
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('SUM(upload_claims.sactioned_amount) as sum_claim, COUNT(hospital_name) as claim_count, hospital_name');
            $this->db->from('upload_claims');
            $this->db->where_in('upload_claims.claim_status', $bind);
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no',$policy_id);
            $this->db->group_by('upload_claims.hospital_name');
            $this->db->order_by('sum_claim','DESC');
            $this->db->limit('10');
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

    public function get_sum_insured_by_policy($policy_id){
        try{
              $corporate_id = $this->session->userdata('hr_login_id');
              $this->db->select('sum_insured');
              $this->db->from('sum_insured');
              $this->db->where('sum_insured.corporate_id', $corporate_id);
              $this->db->where('sum_insured.policy_no',$policy_id);
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

    public function get_ralation_wise_count_report($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(employee_enrollment_attributes.relationship="DAUGHTER" OR employee_enrollment_attributes.relationship="Daughter" OR employee_enrollment_attributes.relationship="Daughter(1)" OR employee_enrollment_attributes.relationship="Daughter(2)",1,NULL)) as claim_count_0,
            COUNT(IF(employee_enrollment_attributes.relationship="Employee",1,NULL)) as claim_count_1,
            COUNT(IF(employee_enrollment_attributes.relationship="FATHER" OR employee_enrollment_attributes.relationship="Father",1,NULL)) as claim_count_2,
            COUNT(IF(employee_enrollment_attributes.relationship="MOTHER" OR employee_enrollment_attributes.relationship="Mother",1,NULL)) as claim_count_3,
            COUNT(IF(employee_enrollment_attributes.relationship="Sister",1,NULL)) as claim_count_4,
            COUNT(IF(employee_enrollment_attributes.relationship="SON" OR employee_enrollment_attributes.relationship="Son" OR employee_enrollment_attributes.relationship="Son(1)" OR employee_enrollment_attributes.relationship="Son(2)",1,NULL)) as claim_count_5,
            COUNT(IF(employee_enrollment_attributes.relationship="HUSBAND" OR employee_enrollment_attributes.relationship="WIFE" OR employee_enrollment_attributes.relationship="Spouse",1,NULL)) as claim_count_6,
            ');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment.id = employee_enrollment_attributes.e_id','LEFT');
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment.policy_no', $policy_id);
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

    public function get_month_wise_endorsement_report($policy_id,$month_no){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('SUM(IF(endorsement_transaction.transaction_type="debit",endorsement_transaction.employee_count_policy,0)) as employee_addition,
            SUM(IF(endorsement_transaction.transaction_type="debit",endorsement_transaction.dependent_count_policy,0)) as dependent_addition,
            SUM(IF(endorsement_transaction.transaction_type="nil",endorsement_transaction.employee_count_policy,0)) as employee_correction,
            SUM(IF(endorsement_transaction.transaction_type="nil",endorsement_transaction.dependent_count_policy,0)) as dependent_correction,
            SUM(IF(endorsement_transaction.transaction_type="credit",endorsement_transaction.employee_count_policy,0)) as employee_deletion,
            SUM(IF(endorsement_transaction.transaction_type="credit",endorsement_transaction.dependent_count_policy,0)) as dependent_deletion,
            ');
            $this->db->from('endorsement_transaction');
            $this->db->where('MONTH(endorsement_transaction.created_at)', $month_no);
            $this->db->where('endorsement_transaction.policy_endorsement_entry', 1);
            $this->db->where('endorsement_transaction.corporate_id', $corporate_id);
            $this->db->where('endorsement_transaction.policy_no', $policy_id);
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
