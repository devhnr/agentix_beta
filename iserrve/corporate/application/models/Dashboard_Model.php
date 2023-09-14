<?php

class Dashboard_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_claim_amount_by_type($claim_type,$policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            if($claim_type == 'Reported'){
              $this->db->select('SUM(upload_claims.amount_claimed) as claim_amount');
            }
            if($claim_type == 'Outstanding'){
                $this->db->select('SUM(IF(upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Under Process - Deficiency" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued",upload_claims.amount_claimed,0)) as claim_amount');
            }
            if($claim_type == 'Rejected'){
                $this->db->select('SUM(IF(upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated",upload_claims.amount_claimed,0)) as claim_amount');
            }
            if($claim_type == 'Paid'){
                $this->db->select('SUM(IF(upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved",upload_claims.sactioned_amount,0)) as claim_amount');
            }
            if($claim_type == 'Cashless'){
                $this->db->select('SUM(IF(upload_claims.claim_type="CASHLESS",upload_claims.amount_claimed,0)) as claim_amount');
            }
            if($claim_type == 'Reimbursement'){
                $this->db->select('SUM(IF(upload_claims.claim_type="REIMBURSEMENT",upload_claims.amount_claimed,0)) as claim_amount');
            }
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

    public function get_claim_count($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('COUNT("upload_claims.id") as reported_count,
            COUNT(IF(upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Under Process - Deficiency" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued",1,NULL)) as outstanding_count,
            COUNT(IF(upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated",1,NULL)) as rejected_count,
            COUNT(IF(upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved",1,NULL)) as paid_count,
            COUNT(IF(upload_claims.claim_type="CASHLESS",1,NULL)) as cashless_count,
            COUNT(IF(upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as reimbursement_count,
            SUM(upload_claims.amount_claimed) as reported_amount');
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

    public function get_total_employee_by_policy($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('COUNT("employee_enrollment_attributes.employee_id") as total_employees');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment.id = employee_enrollment_attributes.e_id','LEFT');
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment.policy_no', $policy_id);
            $this->db->where('employee_enrollment_attributes.status', 0);
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

    public function get_register_employee_by_policy($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('COUNT("tbl_employee.emp_id") as register_employees');
            $this->db->from('tbl_employee');
            $this->db->join('employee_enrollment_attributes', 'employee_enrollment_attributes.employee_id = tbl_employee.emp_id','LEFT');
            $this->db->join('employee_enrollment', 'employee_enrollment.id = employee_enrollment_attributes.e_id','LEFT');
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment.policy_no', $policy_id);
            $this->db->where('employee_enrollment_attributes.status', 0);
            $this->db->where('employee_enrollment_attributes.relationship','Employee');
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
