<?php
class Billship_model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}

	function getOrderNumber()
   {
      $strQuery="SELECT MAX(order_id) AS lastOrderNumber FROM ci_orders";
      $result = $this->db->query($strQuery);
      if($result->num_rows()>0)
      {
         $arrRes=$result->result_array(); 
         return $arrRes[0]['lastOrderNumber']+1;
      }
   }

   function saveOrderInDatabase($arrData,$intOrderID)
   {
      $this->db->insert('ci_orders',$arrData);
      $intOrderID=$this->db->insert_id();
      return $intOrderID;
   }

   function product_data($p_id)
   {
      $sql = "SELECT * FROM product WHERE id = '".$p_id."'";
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

   function saveOrderFromCart($arrData)
   {
      if($this->db->insert('ci_order_item',$arrData))
      { 
         return true;
      }
      else
      {
         return false;
      }
   }
   

}