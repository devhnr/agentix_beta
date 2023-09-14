<?php

class Escalation_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_escalation_matrix_by_policy($policy_id){
        try{
          $corporate_id = $this->session->userdata('hr_login_id');
          $this->db->select('policy.product_name,escalation_level.level,user_escalation.name,user_escalation.phone,user_escalation.email,user_escalation.address');
          $this->db->from('escalation_level');
          $this->db->join('user_escalation', 'escalation_level.user_id = user_escalation.id','LEFT');
          $this->db->join('policy', 'escalation_level.policy_no = policy.id','LEFT');
          $this->db->where('escalation_level.corporate_id',$corporate_id);
          $this->db->where('escalation_level.policy_no',$policy_id);
          $this->db->order_by('escalation_level.level','ASC');
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

}
