<?php

class Utiliti_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_utilities_by_policy($policy_id){
        try{
          $this->db->select('utilities.document,document_type.name');
          $this->db->from('utilities');
          $this->db->join('document_type', 'document_type.id = utilities.document_type','LEFT');
          $this->db->where('utilities.policy_no',$policy_id);
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
