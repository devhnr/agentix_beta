<?php
class Compare_policies_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function get_policies_new($policies_id,$price)
	{

		// $price = number_format($price,1,".","");

		$sql = "SELECT policies.*,policies.id as policies_id, sum_insuranced_attr.* FROM policies LEFT JOIN sum_insuranced_attr ON policies.id = sum_insuranced_attr.sins_id where policies.id ='".$policies_id."' and sum_insuranced_attr.price like'%".$price."%'";

		//$sql = "SELECT sp.*,s.id as sum_insuranced_attr_id FROM policies sp LEFT JOIN sum_insuranced_attr s ON s.sins_id=sp.id where sp.id='".$policies_id."' ";

		// $sql = "select * from policies where id IN ('".$id."')";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->row(); 
		}
		else
		{
			return false;
		}
	}
	
	function get_company_image($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('company_name');
        if ($query->num_rows() > 0) {
            $result = $query->row()->image;
            return $result;
        } else {
            return false;
        }
    }
	
	function get_compare_name()
	{	
		// $this->db->where('id=',$id);
		$this->db->order_by('set_order');
        $query = $this->db->get('compare_name');
        if ($query->num_rows() > 0)	{
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    
	}
	
	function get_compare_title_detail($compare_id)
   {
      $sql = "SELECT * FROM title where compare_id ='".$compare_id."'";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0)
      {
         $result = $query->result();
         return $result;
      }else
      {
         return false;
      }
   }
   
   function get_attribute($comare_id,$title_id,$policies_id)
	{	
		// $this->db->where('compare_id=',$comare_id);
		// $this->db->where('title_id=',$title_id);
		// $this->db->where('policies_id=',$policies_id);

		$sql = "SELECT * FROM compare_attribute where policies_id ='".$policies_id."' and compare_id = '".$comare_id."' and title_id = '".$title_id."' ";
      $query = $this->db->query($sql);

        //$query = $this->db->get('compare_attribute');

       // echo  $query;
        if ($query->num_rows() > 0)	{
            $result = $query->row();
            return $result;
        } else {
            return false;
        }
    
	}
}