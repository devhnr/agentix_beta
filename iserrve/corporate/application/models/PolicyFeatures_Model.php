<?php

class PolicyFeatures_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_policy_features($product_features_id,$policy_type){
      try{
        $this->db->select('form_field.label_name,policy_features_attribute.field_type,policy_features_attribute.field_id');
        $this->db->from('form_field');
        $this->db->join('policy_features_attribute', 'policy_features_attribute.field_id = form_field.id','LEFT');
        //$this->db->where('form_field.product_type_id',$policy_type);
        //$this->db->where(find_in_set($policy_type,'form_field.product_type_id'));
        
        $this->db->where("FIND_IN_SET('".$policy_type."', form_field.product_type_id)");
        
        $this->db->where('policy_features_attribute.policy_features_id',$product_features_id);
        $this->db->where('policy_features_attribute.radio_att_flag',0);
        $this->db->where('policy_features_attribute.field_type !=', '');
        $this->db->order_by('form_field.id','ASC');
        $this->db->group_by('policy_features_attribute.field_id');
        $query=$this->db->get();
        
        //echo $this->db->last_query();exit;
            if($query->num_rows() > 0){
                $data = $query->result_array();
                foreach ($data as $key => $value) {
                  if($value['field_type'] =='Yes'){
                    $this->db->select('label_name,form_field_id');
                    $this->db->from('form_field_attribute_radio');
                    $this->db->where('form_field_id',$value['field_id']);
                    $query1=$this->db->get();
                    $data1 = $query1->result_array();
                      $data[$key]['addition'] = $data1;
                  }
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

    public function get_sub_policy_features_attribute($policy_features_id,$field_id){
        try{
          $this->db->select('field_type');
          $this->db->from('policy_features_attribute');
          $this->db->where('policy_features_id',$policy_features_id);
          $this->db->where('field_id',$field_id);
          $this->db->where('radio_att_flag',1);
          $query=$this->db->get();
          // echo $this->db->last_query();exit;
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

    public function get_sum_insured($policy_id) {
        
        try{
            $corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('sum_insured.sum_insured,policy_features.id');
            $this->db->from('policy_features');
            $this->db->join('sum_insured', 'sum_insured.id = policy_features.sum_insured','LEFT');
            $this->db->where('policy_features.corporate_id',$corporate_id);
            $this->db->where('policy_features.policy_no ',$policy_id);
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

}
