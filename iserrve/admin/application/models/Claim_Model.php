<?php

class Claim_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function add($data){
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

    public function get_claim_list(){
      try{
          $this->db->select('tbl_claim.*,policy.policy_no as policy_id,corporate.co_name');
          $this->db->from('tbl_claim');
          $this->db->join('corporate', 'corporate.id = tbl_claim.corporate','LEFT');
          $this->db->join('policy', 'policy.id = tbl_claim.policy_no','LEFT');


		  if($this->session->userdata('role_id') != 1){
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//$this->db->where('tbl_e_card.corporate_id IN',($corp_id));
			$this->db->where("tbl_claim.corporate IN(".$corp_id.")");

		}
		$this->db->order_by('created_at','DESC');
          $query =$this->db->get();
          return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
  }



  public function delete_e_card($id){
      $e_card_id = base64_decode($id);
      $this->db->set('is_deleted', 1);
      $this->db->where('id', $e_card_id);
      return $this->db->update('tbl_e_card');
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

  public function get_employee_data($corporate,$policy_no){
 		 try{
 				 $this->db->select('employee_enrollment_attributes.employee_id,policy.product_type,policy.policy_start_date,policy.policy_end_date,policy.tpa');
 				 $this->db->from('employee_enrollment');
 				 $this->db->join('employee_enrollment_attributes', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
 				 $this->db->join('policy', 'policy.id = employee_enrollment.policy_no','LEFT');
 				 $this->db->where('employee_enrollment.corporate_id',$corporate);
 				 $this->db->where('employee_enrollment.policy_no',$policy_no);
 				 $this->db->where('employee_enrollment_attributes.relationship','Employee');
 				 $query =$this->db->get();
 				 return $query->result_array();
 		 }catch(Exception $ex){
 				 error_log($ex->getTraceAsString());
 				 echo $ex->getTraceAsString();
 				 return FALSE;
 		 }
  }

  public function get_employee_relations($employee_no){
 		 try{
 				 $this->db->select('employee_enrollment_attributes.relationship');
 				 $this->db->from('employee_enrollment_attributes');
 				 $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
 				 $query =$this->db->get();
 				 $data['relations'] = $query->result_array();

 				 $this->db->select('name_of_the_employee,mobile_no,email');
 				 $this->db->from('employee_enrollment_attributes');
 				 $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
 			 	 $this->db->where('employee_enrollment_attributes.relationship','Employee');
 				 $qry =$this->db->get();
 				 $data['empdata'] = $qry->row_array();
 				 return $data;
 		 }catch(Exception $ex){
 				 error_log($ex->getTraceAsString());
 				 echo $ex->getTraceAsString();
 				 return FALSE;
 		 }
  }

  public function get_policy_data($pro_id) {
      try{
          $this->db->select('policy.id,policy.policy_no,policy.tpa,policy.tpa_person_email,corporate.hr_email,corporate.sales_person_email,corporate.operations_person_email');
          $this->db->from('policy');
          $this->db->join('corporate', 'corporate.id = policy.corporate_id','LEFT');
          $this->db->where('policy.corporate_id',$pro_id);
		  $this->db->where("policy.policy_end_date >= '".date('Y-m-d')."'");
          $query =$this->db->get();

          return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function upload_claim_data($data){
        try{
            $this->db->insert('upload_claims', $data);
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

    public function get_all_upload_claims(){
      try{
          $this->db->select('upload_claims.*,corporate.co_name,policy.policy_no,policy.id as policy_id');
          $this->db->from('upload_claims');
          $this->db->join('corporate', 'corporate.id = upload_claims.corporate','LEFT');
          $this->db->join('policy', 'policy.id = upload_claims.policy_no','LEFT');
          $this->db->order_by('created_at','DESC');

		  if($this->session->userdata('role_id') != 1){
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//$this->db->where('tbl_e_card.corporate_id IN',($corp_id));
			$this->db->where("upload_claims.corporate IN(".$corp_id.")");

		}
		$this->db->where('policy.policy_end_date >', date("Y-m-d"));

          $query =$this->db->get();
          return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
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

  public function check_claim_exist($tpa_claim_no,$insurance_claim_no){
      try{
          $this->db->select('id');
          $this->db->from('upload_claims');
          if(!empty($tpa_claim_no)){
            $this->db->where('tpa_claim_no',$tpa_claim_no);
          }else if(!empty($insurance_claim_no)){
            $this->db->where('insurance_claim_no',$insurance_claim_no);
          }

          $query=$this->db->get();
              if($this->db->affected_rows() > 0){
                  return $query->row()->id;
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function upload_claim_update_data($id,$data){
      try{
          $this->db->where('id',$id);
          if($this->db->update('upload_claims',$data)){
              return TRUE;
          }else{
              return FALSE;
          }
      }catch(Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_policy_no($id) {
      try{
          $this->db->where('id',$id);
          $query = $this->db->get('policy');
          if ($query->num_rows() > 0) {
              $result = $query->row()->policy_no;
              return $result;
          } else {
              return false;
          }

      }catch(Exception $ex) {
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


	function get_corporate_data($id){

		$sql = "SELECT * FROM corporate where id = '".$id."'  ";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->co_name;
			return $result;
		}else{
			return false;
		}
	}

}
