<?php

class Hospital_Model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function get_cashless_hospital_list($tpa){
        try{
            $this->db->select('hospital_name as HospitalName,hospital_address as AddressLine1 ,contact_no as PhoneNumber,landmark as Landmark1,city as CityName,state as StateName,pincode as Pincode');
            $this->db->from('tbl_cashless_hospital');
            $this->db->where('tpa', $tpa);
            $this->db->order_by("created_at", "DESC");
            $query =$this->db->get();
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

    public function get_cities($state){
          $this->db->select('city');
          $this->db->from('cities');
          $this->db->where('state',$state);
          $this->db->order_by('city', 'ASC');
          $query = $this->db->get();
          return $query;
    }

}
