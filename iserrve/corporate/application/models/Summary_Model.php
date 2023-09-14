<?php

class Summary_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_top20_hospitals($policy_id){
      try{
            $bind = array('Paid','Approved');
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('hospital_name,city as hospital_city,COUNT(hospital_name) as claim_count,network_status');
            $this->db->from('upload_claims');
            $this->db->where_in('upload_claims.claim_status', $bind);
            $this->db->where('upload_claims.corporate', $corporate_id);
            $this->db->where('upload_claims.policy_no',$policy_id);
            $this->db->group_by('upload_claims.hospital_name');
            $this->db->order_by('claim_count','DESC');
            $this->db->limit('20');
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
    public function get_premium_by_policy($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('update_premium.inception_premium_amount as inception_premium');
            $this->db->from('update_premium');
            $this->db->where('update_premium.corporate_id', $corporate_id);
            $this->db->where('update_premium.policy_no',$policy_id);
            $this->db->order_by('update_premium.date','DESC');
            $this->db->limit('1');
            $query=$this->db->get();
            if($query->num_rows() > 0){
                $data = $query->row_array();
                $this->db->select('SUM(update_premium.addition_premium_amount) as addition_premium,SUM(update_premium.deletion_premium_amount) as deletion_premium,SUM(update_premium.total_premium_amount) as total_premium');
                $this->db->from('update_premium');
                $this->db->where('update_premium.corporate_id', $corporate_id);
                $this->db->where('update_premium.policy_no', $policy_id);
                $query1 = $this->db->get();
                if($query1->num_rows() > 0){
                  $data1 = $query1->row_array();
                  $arrayName = array('first' => $data, 'second' => $data1);
                  return $arrayName;
                }
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    
    public function get_enrollment_inception($policy_id){ //check for condition
        try{
            $corporate_id = $this->session->userdata('hr_login_id');

            $this->db->select('
            COUNT(IF(employee_enrollment_attributes.relationship="Employee" AND employee_enrollment_attributes.entry=0,1,NULL)) as Employee,
            COUNT(IF((employee_enrollment_attributes.relationship="WIFE" OR employee_enrollment_attributes.relationship="Spouse" OR employee_enrollment_attributes.relationship="HUSBAND") AND employee_enrollment_attributes.entry=0,1,NULL)) as Spouse,
            COUNT(IF((employee_enrollment_attributes.relationship="Child" OR employee_enrollment_attributes.relationship="DAUGHTER" OR employee_enrollment_attributes.relationship="SON") AND employee_enrollment_attributes.entry=0,1,NULL)) as Children,
            COUNT(IF((employee_enrollment_attributes.relationship="MOTHER" OR employee_enrollment_attributes.relationship="FATHER" OR employee_enrollment_attributes.relationship="mother-in-law" OR employee_enrollment_attributes.relationship="father-in-law") AND employee_enrollment_attributes.entry=0,1,NULL)) as Parents,
            COUNT(IF((employee_enrollment_attributes.relationship!="Employee"
            OR employee_enrollment_attributes.relationship!="WIFE"
            OR employee_enrollment_attributes.relationship!="Spouse"
            OR employee_enrollment_attributes.relationship!="HUSBAND"
            OR employee_enrollment_attributes.relationship!="Child"
            OR employee_enrollment_attributes.relationship!="DAUGHTER"
            OR employee_enrollment_attributes.relationship!="SON"
            OR employee_enrollment_attributes.relationship!="MOTHER"
            OR employee_enrollment_attributes.relationship!="FATHER"
            OR employee_enrollment_attributes.relationship!="mother-in-law"
            OR employee_enrollment_attributes.relationship!="father-in-law") AND employee_enrollment_attributes.entry=0
            ,1,NULL)) as Others');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment.policy_no',$policy_id);
            $query=$this->db->get();
              // echo $this->db->last_query();exit;
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

    public function get_enrollment_inception_old($policy_id){ //check for condition
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(employee_enrollment_attributes.relationship="Employee" AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=0,1,NULL)) as Employee,
            COUNT(IF((employee_enrollment_attributes.relationship="WIFE" OR employee_enrollment_attributes.relationship="Spouse" OR employee_enrollment_attributes.relationship="HUSBAND") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=0,1,NULL)) as Spouse,
            COUNT(IF((employee_enrollment_attributes.relationship="Child" OR employee_enrollment_attributes.relationship="DAUGHTER" OR employee_enrollment_attributes.relationship="SON") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=0,1,NULL)) as Children,
            COUNT(IF((employee_enrollment_attributes.relationship="MOTHER" OR employee_enrollment_attributes.relationship="FATHER" OR employee_enrollment_attributes.relationship="mother-in-law" OR employee_enrollment_attributes.relationship="father-in-law") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=0,1,NULL)) as Parents,
            COUNT(IF((employee_enrollment_attributes.relationship!="Employee"
            OR employee_enrollment_attributes.relationship!="WIFE"
            OR employee_enrollment_attributes.relationship!="Spouse"
            OR employee_enrollment_attributes.relationship!="HUSBAND"
            OR employee_enrollment_attributes.relationship!="Child"
            OR employee_enrollment_attributes.relationship!="DAUGHTER"
            OR employee_enrollment_attributes.relationship!="SON"
            OR employee_enrollment_attributes.relationship!="MOTHER"
            OR employee_enrollment_attributes.relationship!="FATHER"
            OR employee_enrollment_attributes.relationship!="mother-in-law"
            OR employee_enrollment_attributes.relationship!="father-in-law") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=0
            ,1,NULL)) as Others');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment.policy_no',$policy_id);
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

    public function get_enrollment_addition($policy_id){ //check for condition
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(employee_enrollment_attributes.relationship="Employee" AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=1,1,NULL)) as Employee,
            COUNT(IF((employee_enrollment_attributes.relationship="WIFE" OR employee_enrollment_attributes.relationship="Spouse" OR employee_enrollment_attributes.relationship="HUSBAND") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=1,1,NULL)) as Spouse,
            COUNT(IF((employee_enrollment_attributes.relationship="Child" OR employee_enrollment_attributes.relationship="DAUGHTER" OR employee_enrollment_attributes.relationship="SON") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=1,1,NULL)) as Children,
            COUNT(IF((employee_enrollment_attributes.relationship="MOTHER" OR employee_enrollment_attributes.relationship="FATHER" OR employee_enrollment_attributes.relationship="mother-in-law" OR employee_enrollment_attributes.relationship="father-in-law") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=1 ,1,NULL)) as Parents,
            COUNT(IF((employee_enrollment_attributes.relationship!="Employee"
            OR employee_enrollment_attributes.relationship!="WIFE"
            OR employee_enrollment_attributes.relationship!="Spouse"
            OR employee_enrollment_attributes.relationship!="HUSBAND"
            OR employee_enrollment_attributes.relationship!="Child"
            OR employee_enrollment_attributes.relationship!="DAUGHTER"
            OR employee_enrollment_attributes.relationship!="SON"
            OR employee_enrollment_attributes.relationship!="MOTHER"
            OR employee_enrollment_attributes.relationship!="FATHER"
            OR employee_enrollment_attributes.relationship!="mother-in-law"
            OR employee_enrollment_attributes.relationship!="father-in-law") AND employee_enrollment_attributes.status=0 AND employee_enrollment_attributes.entry=1
            ,1,NULL)) as Others');$this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');

            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment.policy_no',$policy_id);
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

    public function get_enrollment_deletion($policy_id){ //check for condition
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(employee_enrollment_attributes.relationship="Employee" AND employee_enrollment_attributes.status=1 AND employee_enrollment_attributes.type_of_addition="delete",1,NULL)) as Employee,
            COUNT(IF((employee_enrollment_attributes.relationship="WIFE" OR employee_enrollment_attributes.relationship="Spouse" OR employee_enrollment_attributes.relationship="HUSBAND") AND employee_enrollment_attributes.status=1 AND employee_enrollment_attributes.type_of_addition="delete",1,NULL)) as Spouse,
            COUNT(IF((employee_enrollment_attributes.relationship="Child" OR employee_enrollment_attributes.relationship="DAUGHTER" OR employee_enrollment_attributes.relationship="SON") AND employee_enrollment_attributes.status=1 AND employee_enrollment_attributes.type_of_addition="delete",1,NULL)) as Children,
            COUNT(IF((employee_enrollment_attributes.relationship="MOTHER" OR employee_enrollment_attributes.relationship="FATHER" OR employee_enrollment_attributes.relationship="mother-in-law" OR employee_enrollment_attributes.relationship="father-in-law") AND employee_enrollment_attributes.status=1 AND employee_enrollment_attributes.type_of_addition="delete",1,NULL)) as Parents,
            COUNT(IF((employee_enrollment_attributes.relationship!="Employee"
            OR employee_enrollment_attributes.relationship!="WIFE"
            OR employee_enrollment_attributes.relationship!="Spouse"
            OR employee_enrollment_attributes.relationship!="HUSBAND"
            OR employee_enrollment_attributes.relationship!="Child"
            OR employee_enrollment_attributes.relationship!="DAUGHTER"
            OR employee_enrollment_attributes.relationship!="SON"
            OR employee_enrollment_attributes.relationship!="MOTHER"
            OR employee_enrollment_attributes.relationship!="FATHER"
            OR employee_enrollment_attributes.relationship!="mother-in-law"
            OR employee_enrollment_attributes.relationship!="father-in-law") AND employee_enrollment_attributes.status=1 AND employee_enrollment_attributes.type_of_addition="delete"
            ,1,NULL)) as Others');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
            // $this->db->where('employee_enrollment_attributes.status', 1);
            $this->db->where('employee_enrollment.corporate_id', $corporate_id);
            $this->db->where('employee_enrollment.policy_no',$policy_id);
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

    public function get_claim_paid_by_policy($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            SUM(IF(upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved",upload_claims.sactioned_amount,0)) as claim_paid,
            SUM(IF(upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Under Process - Deficiency" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued",upload_claims.amount_claimed,0)) as claim_under_process,
            SUM(upload_claims.sactioned_amount) as sactioned_amount');
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

    public function get_claim_summary_by_policy($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.claim_status="Closed" AND upload_claims.claim_type="CASHLESS",1,NULL)) as closed_cashless,
            COUNT(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="CASHLESS",1,NULL)) as outstanding_cashless,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS",1,NULL)) as paid_cashless,
            COUNT(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="CASHLESS",1,NULL)) as rejected_cashless,
            SUM(IF(upload_claims.claim_status="Closed" AND upload_claims.claim_type="CASHLESS",upload_claims.amount_claimed,0)) as closed_cashless_claimed,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="CASHLESS",upload_claims.amount_claimed,0)) as outstanding_cashless_claimed,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS",upload_claims.amount_claimed,0)) as paid_cashless_claimed,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="CASHLESS",upload_claims.amount_claimed,0)) as rejected_cashless_claimed,
            SUM(IF(upload_claims.claim_status="Closed" AND upload_claims.claim_type="CASHLESS",upload_claims.sactioned_amount,0)) as closed_cashless_incurred,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="CASHLESS",upload_claims.sactioned_amount,0)) as outstanding_cashless_incurred,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS",upload_claims.sactioned_amount,0)) as paid_cashless_incurred,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="CASHLESS",upload_claims.sactioned_amount,0)) as rejected_cashless_incurred,
            COUNT(IF(upload_claims.claim_status="Closed" AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as closed_reimbursement,
            COUNT(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as outstanding_reimbursement,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as paid_reimbursement,
            COUNT(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as rejected_reimbursement,
            SUM(IF(upload_claims.claim_status="Closed" AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.amount_claimed,0)) as closed_reimbursement_claimed,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.amount_claimed,0)) as outstanding_reimbursement_claimed,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.amount_claimed,0)) as paid_reimbursement_claimed,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.amount_claimed,0)) as rejected_reimbursement_claimed,
            SUM(IF(upload_claims.claim_status="Closed" AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.sactioned_amount,0)) as closed_reimbursement_incurred,
            SUM(IF((upload_claims.claim_status="Under Process" OR upload_claims.claim_status="Authorised" OR upload_claims.claim_status="Intimated and File not received" OR upload_claims.claim_status="AL Issued") AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.sactioned_amount,0)) as outstanding_reimbursement_incurred,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.sactioned_amount,0)) as paid_reimbursement_incurred,
            SUM(IF((upload_claims.claim_status="Denied" OR upload_claims.claim_status="Rejected" OR upload_claims.claim_status="Denial" OR upload_claims.claim_status="Repudiated") AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.sactioned_amount,0)) as rejected_reimbursement_incurred,
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

    public function get_settled_acs_by_policy($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.claim_type="CASHLESS",1,NULL)) as claim_count,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS",1,NULL)) as paid_claim_count,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS",upload_claims.sactioned_amount,0)) as claim_paid_amount,
            COUNT(IF(upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as claim_reimbursement_count,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as paid_claim_reimbursement_count,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.sactioned_amount,0)) as claim_paid_reimbursement_amount,
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

    public function get_age_wise_claim_summary($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.age BETWEEN 0 AND 25,1,NULL)) as claim_count_0,
            COUNT(IF(upload_claims.age BETWEEN 26 AND 35,1,NULL)) as claim_count_1,
            COUNT(IF(upload_claims.age BETWEEN 36 AND 45,1,NULL)) as claim_count_2,
            COUNT(IF(upload_claims.age BETWEEN 46 AND 55,1,NULL)) as claim_count_3,
            COUNT(IF(upload_claims.age BETWEEN 56 AND 65,1,NULL)) as claim_count_4,
            COUNT(IF(upload_claims.age > 65,1,NULL)) as claim_count_5,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 0 AND 25),1,NULL)) as paid_claim_0,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 26 AND 35),1,NULL)) as paid_claim_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 36 AND 45),1,NULL)) as paid_claim_2,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 46 AND 55),1,NULL)) as paid_claim_3,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 56 AND 65),1,NULL)) as paid_claim_4,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age > 65),1,NULL)) as paid_claim_5,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 0 AND 25),upload_claims.sactioned_amount,0)) as settled_amt_0,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 26 AND 35),upload_claims.sactioned_amount,0)) as settled_amt_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 36 AND 45),upload_claims.sactioned_amount,0)) as settled_amt_2,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 46 AND 55),upload_claims.sactioned_amount,0)) as settled_amt_3,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 56 AND 65),upload_claims.sactioned_amount,0)) as settled_amt_4,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age > 65),upload_claims.sactioned_amount,0)) as settled_amt_5,
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

    public function get_tat_claim_summary($policy_id){
        try{
            $bind = array('Paid','Approved');
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(DATEDIFF(upload_claims.claim_settled_date, upload_claims.claim_filed_date) BETWEEN 7 AND 18,1,NULL))as tat_count_0,
            COUNT(IF(DATEDIFF(upload_claims.claim_settled_date, upload_claims.claim_filed_date) BETWEEN 17 AND 31,1,NULL))as tat_count_1,
            COUNT(IF(DATEDIFF(upload_claims.claim_settled_date, upload_claims.claim_filed_date) > 30,1,NULL))as tat_count_2,
            ');
            $this->db->from('upload_claims');
            $this->db->where_in('upload_claims.claim_status', $bind);
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

    public function get_outstanding_tat_claim_summary($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $dat = date('Y-m-d');
            $bind = array('Intimated and File not received','Processing','Under Process','Under Process - Deficiency','AL Issued');
            $this->db->select('
            COUNT(IF(DATEDIFF("'.$dat.'", upload_claims.claim_filed_date) BETWEEN 7 AND 18,1,NULL))as tat_count_0,
            COUNT(IF(DATEDIFF("'.$dat.'", upload_claims.claim_filed_date) BETWEEN 17 AND 31,1,NULL))as tat_count_1,
            COUNT(IF(DATEDIFF("'.$dat.'", upload_claims.claim_filed_date) > 30,1,NULL))as tat_count_2,
            ');
            $this->db->from('upload_claims');
            $this->db->where_in('upload_claims.claim_status', $bind);
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
    /*******check if add new relation so plz add this relation with conditon******/
    public function get_ralation_wise_claim_summary($policy_id){
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

            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="DAUGHTER" OR upload_claims.relation="Daughter"),1,NULL)) as paid_claim_0,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="Employee"),1,NULL)) as paid_claim_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="FATHER" OR upload_claims.relation="Father"),1,NULL)) as paid_claim_2,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="MOTHER" OR upload_claims.relation="Mother"),1,NULL)) as paid_claim_3,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="Sister"),1,NULL)) as paid_claim_4,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="SON" OR upload_claims.relation="Son"),1,NULL)) as paid_claim_5,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="HUSBAND" OR upload_claims.relation="Spouse" OR upload_claims.relation="WIFE"),1,NULL)) as paid_claim_6,

            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="DAUGHTER" OR upload_claims.relation="Daughter"),upload_claims.sactioned_amount,0)) as settled_amt_0,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="Employee"),upload_claims.sactioned_amount,0)) as settled_amt_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="FATHER" OR upload_claims.relation="Father"),upload_claims.sactioned_amount,0)) as settled_amt_2,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="MOTHER" OR upload_claims.relation="Mother"),upload_claims.sactioned_amount,0)) as settled_amt_3,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="Sister"),upload_claims.sactioned_amount,0)) as settled_amt_4,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="SON" OR upload_claims.relation="Son"),upload_claims.sactioned_amount,0)) as settled_amt_5,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.relation="HUSBAND" OR upload_claims.relation="WIFE" OR upload_claims.relation="Spouse"),upload_claims.sactioned_amount,0)) as settled_amt_6,
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

    public function get_network_claim_summary($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.network_status="Network" AND upload_claims.claim_type="CASHLESS",1,NULL)) as cashless_count,
            COUNT(IF(upload_claims.network_status="Network" AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as reimbursement_count,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS" AND upload_claims.network_status="Network",1,NULL)) as paid_cashless,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT" AND upload_claims.network_status="Network",1,NULL)) as paid_reimbursement,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS" AND upload_claims.network_status="Network",upload_claims.sactioned_amount,0)) as settled_cashless,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT" AND upload_claims.network_status="Network",upload_claims.sactioned_amount,0)) as settled_reimbursement,

            COUNT(IF((upload_claims.network_status="Non Network" OR upload_claims.network_status="Non-Network") AND upload_claims.claim_type="CASHLESS",1,NULL)) as cashless_count_1,
            COUNT(IF((upload_claims.network_status="Non Network" OR upload_claims.network_status="Non-Network") AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as reimbursement_count_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS" AND (upload_claims.network_status="Non Network" OR upload_claims.network_status="Non-Network"),1,NULL)) as paid_cashless_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT" AND (upload_claims.network_status="Non Network" OR upload_claims.network_status="Non-Network"),1,NULL)) as paid_reimbursement_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="CASHLESS" AND (upload_claims.network_status="Non Network" OR upload_claims.network_status="Non-Network"),upload_claims.sactioned_amount,0)) as settled_cashless_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.claim_type="REIMBURSEMENT" AND (upload_claims.network_status="Non Network" OR upload_claims.network_status="Non-Network"),upload_claims.sactioned_amount,0)) as settled_reimbursement_1,
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

    public function get_amount_band_claim_summary($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.claim_paid_amount BETWEEN 0 AND 25000,1,NULL)) as claim_count_0,
            COUNT(IF(upload_claims.claim_paid_amount BETWEEN 25000 AND 50000,1,NULL)) as claim_count_1,
            COUNT(IF(upload_claims.claim_paid_amount BETWEEN 50000 AND 100000,1,NULL)) as claim_count_2,
            COUNT(IF(upload_claims.claim_paid_amount BETWEEN 100000 AND 200000,1,NULL)) as claim_count_3,
            COUNT(IF(upload_claims.claim_paid_amount > 200000,1,NULL)) as claim_count_4,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.claim_paid_amount BETWEEN 0 AND 25000),1,NULL)) as paid_claim_0,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.claim_paid_amount BETWEEN 25000 AND 50000),1,NULL)) as paid_claim_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.claim_paid_amount BETWEEN 50000 AND 100000),1,NULL)) as paid_claim_2,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.claim_paid_amount BETWEEN 100000 AND 200000),1,NULL)) as paid_claim_3,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.claim_paid_amount > 200000),1,NULL)) as paid_claim_4,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 0 AND 25000),upload_claims.sactioned_amount,0)) as settled_amt_0,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 25000 AND 50000),upload_claims.sactioned_amount,0)) as settled_amt_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 50000 AND 100000),upload_claims.sactioned_amount,0)) as settled_amt_2,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age BETWEEN 100000 AND 200000),upload_claims.sactioned_amount,0)) as settled_amt_3,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.age > 200000),upload_claims.sactioned_amount,0)) as settled_amt_4,
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

    public function get_level_care_claim_summary($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.level_of_care="Primary" AND upload_claims.treatment_type="Conservative",1,NULL)) as medical_claim_count_0,
            COUNT(IF(upload_claims.level_of_care="Secondary" AND upload_claims.treatment_type="Conservative",1,NULL)) as medical_claim_count_1,
            COUNT(IF(upload_claims.level_of_care="Tertiary" AND upload_claims.treatment_type="Conservative",1,NULL)) as medical_claim_count_2,
            COUNT(IF(upload_claims.level_of_care="Intermediate" AND upload_claims.treatment_type="Conservative",1,NULL)) as medical_claim_count_3,
            COUNT(IF(upload_claims.level_of_care="Intensive" AND upload_claims.treatment_type="Conservative",1,NULL)) as medical_claim_count_4,
            COUNT(IF(upload_claims.level_of_care="General" AND upload_claims.treatment_type="Conservative",1,NULL)) as medical_claim_count_5,

            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Primary",1,NULL)) as medical_paid_claim_0,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Secondary",1,NULL)) as medical_paid_claim_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Tertiary",1,NULL)) as medical_paid_claim_2,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Intermediate",1,NULL)) as medical_paid_claim_3,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Intensive",1,NULL)) as medical_paid_claim_4,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="General",1,NULL)) as medical_paid_claim_5,

            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Primary",upload_claims.sactioned_amount,0)) as medical_settled_amt_0,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Secondary",upload_claims.sactioned_amount,0)) as medical_settled_amt_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Tertiary",upload_claims.sactioned_amount,0)) as medical_settled_amt_2,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Intermediate",upload_claims.sactioned_amount,0)) as medical_settled_amt_3,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="Intensive",upload_claims.sactioned_amount,0)) as medical_settled_amt_4,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Conservative" AND upload_claims.level_of_care="General",upload_claims.sactioned_amount,0)) as medical_settled_amt_5,

            COUNT(IF(upload_claims.level_of_care="Primary" AND upload_claims.treatment_type="Surgical",1,NULL)) as surgical_claim_count_0,
            COUNT(IF(upload_claims.level_of_care="Secondary" AND upload_claims.treatment_type="Surgical",1,NULL)) as surgical_claim_count_1,
            COUNT(IF(upload_claims.level_of_care="Tertiary" AND upload_claims.treatment_type="Surgical",1,NULL)) as surgical_claim_count_2,
            COUNT(IF(upload_claims.level_of_care="Intermediate" AND upload_claims.treatment_type="Surgical",1,NULL)) as surgical_claim_count_3,
            COUNT(IF(upload_claims.level_of_care="Intensive" AND upload_claims.treatment_type="Surgical",1,NULL)) as surgical_claim_count_4,
            COUNT(IF(upload_claims.level_of_care="General" AND upload_claims.treatment_type="Surgical",1,NULL)) as surgical_claim_count_5,

            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Primary",1,NULL)) as surgical_paid_claim_0,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Secondary",1,NULL)) as surgical_paid_claim_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Tertiary",1,NULL)) as surgical_paid_claim_2,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Intermediate",1,NULL)) as surgical_paid_claim_3,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Intensive",1,NULL)) as surgical_paid_claim_4,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="General",1,NULL)) as surgical_paid_claim_5,

            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Primary",upload_claims.sactioned_amount,0)) as surgical_settled_amt_0,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Secondary",upload_claims.sactioned_amount,0)) as surgical_settled_amt_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Tertiary",upload_claims.sactioned_amount,0)) as surgical_settled_amt_2,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Intermediate",upload_claims.sactioned_amount,0)) as surgical_settled_amt_3,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="Intensive",upload_claims.sactioned_amount,0)) as surgical_settled_amt_4,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND upload_claims.treatment_type="Surgical" AND upload_claims.level_of_care="General",upload_claims.sactioned_amount,0)) as surgical_settled_amt_5,
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

    public function get_disease_category_claim_summary($policy_id){
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain conditions originating in the perinatal period" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_0,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain infectious and parasitic diseases" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Covid - 19" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_2,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the digestive system" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_3,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the eye and adnexa" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_4,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the genitourinary system" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_5,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the nervous system" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_6,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the respiratory system" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_7,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Injury,poisoning and certain other consequences of external causes" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_8,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified" AND upload_claims.claim_type="CASHLESS"),1,NULL)) as cashless_claim_9,

            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain conditions originating in the perinatal period" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_0,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain infectious and parasitic diseases" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Covid - 19" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_2,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the digestive system" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_3,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the eye and adnexa" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_4,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the genitourinary system" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_5,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the nervous system" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_6,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the respiratory system" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_7,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Injury,poisoning and certain other consequences of external causes" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_8,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified" AND upload_claims.claim_type="CASHLESS"),upload_claims.sactioned_amount,0)) as cashless_settled_amt_9,

            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain conditions originating in the perinatal period" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_0,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain infectious and parasitic diseases" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_1,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Covid - 19" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_2,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the digestive system" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_3,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the eye and adnexa" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_4,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the genitourinary system" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_5,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the nervous system" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_6,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the respiratory system" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_7,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Injury,poisoning and certain other consequences of external causes" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_8,
            COUNT(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified" AND upload_claims.claim_type="REIMBURSEMENT"),1,NULL)) as reimbursement_claim_9,

            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain conditions originating in the perinatal period" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_0,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Certain infectious and parasitic diseases" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_1,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Covid - 19" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_2,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the digestive system" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_3,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the eye and adnexa" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_4,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the genitourinary system" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_5,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the nervous system" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_6,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Diseases of the respiratory system" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_7,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Injury,poisoning and certain other consequences of external causes" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_8,
            SUM(IF((upload_claims.claim_status="Paid" OR upload_claims.claim_status="Approved") AND (upload_claims.disease_category="Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified" AND upload_claims.claim_type="REIMBURSEMENT"),upload_claims.sactioned_amount,0)) as reimbursement_settled_amt_9,

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

    public function get_hospital_claim_summary($policy_id,$hospital_name){
        try{
            $bind = array('Paid','Approved');
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('
            COUNT(IF(upload_claims.hospital_name="'.$hospital_name.'" AND upload_claims.claim_type="CASHLESS",1,NULL)) as cashless_claim,
            SUM(IF(upload_claims.hospital_name="'.$hospital_name.'" AND upload_claims.claim_type="CASHLESS",upload_claims.sactioned_amount,0)) as cashless_settled_amt,
            COUNT(IF(upload_claims.hospital_name="'.$hospital_name.'" AND upload_claims.claim_type="REIMBURSEMENT",1,NULL)) as reimbursement_claim,
            SUM(IF(upload_claims.hospital_name="'.$hospital_name.'" AND upload_claims.claim_type="REIMBURSEMENT",upload_claims.sactioned_amount,0)) as reimbursement_settled_amt,
            ');
            $this->db->from('upload_claims');
            $this->db->where_in('upload_claims.claim_status', $bind);
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
}
