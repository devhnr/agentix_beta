<?php

class Reg_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

  public function get_registered_emp_list(){
    try{
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->order_by("id", "DESC");
        $query =$this->db->get();
        return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function delete_emp($id){
      $empid = base64_decode($id);
      $this->db->where('id', $empid);
      return $this->db->delete('tbl_employee');
  }


}
