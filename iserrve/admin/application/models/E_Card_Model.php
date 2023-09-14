<?php

class E_Card_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function multiple_upload($data){
      try{
          $this->db->insert_batch('tbl_e_card', $data);
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

  public function get_policy($id){

        $query = $this->db->get_where('policy', array('corporate_id' => $id));
        return $query;
  }
  
  public function get_policy_new($corp_id){

        $sql = "SELECT * FROM policy where corporate_id = '".$corp_id."' and policy_end_date >= '".date('Y-m-d')."'";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}else{
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


  public function get_e_card_list(){
    try{
        $this->db->select('tbl_employee.name,corporate.co_name,policy.product_name,policy.policy_no,tbl_e_card.pdf_file,tbl_e_card.id,tbl_e_card.employee_id,tbl_e_card.created_at,tbl_e_card.corporate_id,tbl_e_card.policy_id,tbl_e_card.is_upload_from');
        $this->db->from('tbl_e_card');
        $this->db->join('tbl_employee', 'tbl_employee.emp_id = tbl_e_card.employee_id','LEFT');
        $this->db->join('corporate', 'corporate.id = tbl_e_card.corporate_id','LEFT');
        $this->db->join('policy', 'policy.id = tbl_e_card.policy_id','LEFT');
		
		if($this->session->userdata('role_id') != 1){
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//$this->db->where('tbl_e_card.corporate_id IN',($corp_id));
			$this->db->where("tbl_e_card.corporate_id IN(".$corp_id.")");
			
		}
		
		
        $this->db->where('is_deleted',0);
        $this->db->order_by("id", "DESC");
        $query =$this->db->get();
		
		//print_r($this->db->last_query()); 
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

  public function delete_e_card($id){
      $e_card_id = base64_decode($id);
      $this->db->set('is_deleted', 1);
      $this->db->where('id', $e_card_id);
      return $this->db->update('tbl_e_card');
  }

  public function zip_upload($data){
    try{
        $this->db->insert('tbl_e_card', $data);
        if($this->db->affected_rows() > 0){
            return $this->db->affected_rows();
        }else{
            return false;
        }
    }catch(Exception $ex) {
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
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



  function get_policy_data($id){
    $sql = "select * from policy where id = '".$id."'";
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


  public function get_all_employees($policy_id='',$corporate_id) {
    try{
        //$corporate_id = $this->session->userdata('hr_login_id');
        $this->db->select('employee_enrollment_attributes.employee_id,employee_enrollment_attributes.name_of_the_employee as emp_name,employee_enrollment_attributes.gender,employee_enrollment_attributes.relationship,DATE_FORMAT(employee_enrollment_attributes.d_o_b, "%d-%m-%Y") AS birth_date,employee_enrollment_attributes.age,employee_enrollment_attributes.mobile_no,employee_enrollment_attributes.email,DATE_FORMAT(employee_enrollment_attributes.created_at, "%d-%m-%Y") AS created_date');
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

 function check_e_card_exit($corporate_id,$policy_id,$employee_id){

    $sql = "select * from tbl_e_card where employee_id = '".$employee_id."' and corporate_id = '".$corporate_id."' and policy_id = '".$policy_id."'";
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

 public function get_policy_no($policy_id) {
    try{
        $this->db->select('policy_no');
        $this->db->where('policy.id', $policy_id);
        $this->db->where('policy.policy_end_date >', date("Y-m-d"));
        $query = $this->db->get('policy');
        if ($query->num_rows() > 0) {
            $result = $query->row()->policy_no;
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

function add_ecard_api($content){

        $data['corporate_id'] = $content['corporate_id'];
		$data['policy_id'] = $content['policy_id'];
		$data['employee_id'] = $content['employee_id'];
		$data['pdf_file'] = $content['pdf_file'];
		$data['is_upload_from'] = $content['is_upload_from'];
		$data['created_at'] = date("Y-m-d");

		$this->_data = $data;
		if ($this->db->insert('tbl_e_card', $this->_data))
		{
			$id = $this->db->insert_id();

			return $id;
		}
		else
		{
			return false;
		}
}

        function update_ecard_api($content)
            {
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                //echo "sd";exit;
                $data['corporate_id'] = $content['corporate_id'];
                $data['policy_id'] = $content['policy_id'];
                $data['employee_id'] = $content['employee_id'];
                $data['pdf_file'] = $content['pdf_file'];
                
                //$this->_data = $data;
                $this->db->where('corporate_id', $data['corporate_id']);
                $this->db->where('policy_id', $data['policy_id']);
                $this->db->where('employee_id', $data['employee_id']);

                if ($this->db->update('tbl_e_card', $data))	{
                    return true;
                } else {
                    return false;
                }
            }

}
