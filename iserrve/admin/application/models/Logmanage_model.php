<?php

class Logmanage_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

  public function get_registered_emp_list($content){
    try{
      
        $this->db->select('*');
        $this->db->from('log_manage');
        $this->db->order_by("id", "DESC");

        if($content['user_name']!= ''){
          $this->db->where('login_user_id = ',$content['user_name']);
        }
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
      return $this->db->delete('log_manage');
  }
  
  
  function get_corporate_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->co_name;
            return $result;
        } else {
            return false;
        }
    }
	
	function single_policy_data($policy_id){
		// echo $policy_id;exit;

		$sql = "select * from policy where id = '".$policy_id."'";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->row()->policy_no;
            return $result;
		}
		else
		{
			return false;
		}
	
	}


  function get_user_name(){
    // echo $policy_id;exit;

    $sql = "select * from log_manage group by login_user_id";

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


}
