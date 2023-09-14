<?php

class Cashless_Hospital_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_cashless_hospital_list($tpa=''){
        try{
            $this->db->select('*');
            $this->db->from('tbl_cashless_hospital');
            if(!empty($tpa)){
            $this->db->like('tpa',$tpa,'both');
            }
            $this->db->order_by("created_at", "DESC");
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function add($data){
        try{
            $this->db->insert('tbl_cashless_hospital', $data);
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

    public function check_exist_cashless_hospital($insurer,$tpa){
  			try{
  					$this->db->select('COUNT(id) as records');
  					$this->db->from('tbl_cashless_hospital');
  					$this->db->where('insurer',$insurer);
  					$this->db->where('tpa',$tpa);
  					$query=$this->db->get();
  							if($this->db->affected_rows() > 0){
  									return $query->row();
  							}else{
  									return false;
  							}
  			}catch(Exception $ex){
  					error_log($ex->getTraceAsString());
  					echo $ex->getTraceAsString();
  					return FALSE;
  			}
   }

   public function delete_exist_cashless_hospital($insurer,$tpa){
       try{
           $this->db->where('insurer',$insurer);
           $this->db->where('tpa',$tpa);
           if($this->db->delete('tbl_cashless_hospital')){
               return true;
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
