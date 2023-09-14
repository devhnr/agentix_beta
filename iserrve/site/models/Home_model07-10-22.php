<?php
class Home_Model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}

	// function check_mobileno($phone)
 //   {
 //      $this->db->select('user.id,user.email,user.mobile_number');
 //      $this->db->where(array('mobile_number' => $phone));
 //      $query = $this->db->get('user');
 //      if($query->num_rows() > 0)
 //      {
 //         return $query->row(); 
 //      }
 //      else
 //      {
 //         return false;
 //      }
 //   }

   function add($content)
   {
      $L_strErrorMessage='';
      $data['company'] = $content['company'];
      $data['email'] = $content['email'];
      $data['no_emp'] = $content['no_emp'];
      $data['name'] = $content['name'];
      $data['age_emp'] = $content['age_emp'];
      $data['location'] = $content['location'];
      $data['mobile_number'] = $content['phone'];
      $data['product_id'] = $content['product_id'];
      $data['sum_insurance'] = $content['sum_insurance'];
      $data['radio_group'] = $content['radio_group'];
      $current_date = date("Y-m-d");
      $data['added_date'] = $current_date;   

      $data['customize_plan'] = $content['customize_plan'];

         
      $this->_data = $data;
      if ($this->db->insert('user', $this->_data)) 
      {     
         return $this->db->insert_id();
      } 
      else
      {
         return false;
      }
   }

   function add_chatBox($content)
   {
      $L_strErrorMessage='';
      $data['company'] = $content['company'];
      $data['email'] = $content['email'];
      $data['phone_number'] = $content['phone_number'];
      $data['name'] = $content['name'];     
      $data['product_id'] = $content['product_id'];     
      $this->_data = $data;
      if ($this->db->insert('need_help', $this->_data)) 
      {     
         return $this->db->insert_id();
      } 
      else
      {
         return false;
      }
   }

   function add_buyNow($content)
   {
      $L_strErrorMessage='';
      $data['company'] = $content['company'];
      $data['email'] = $content['email'];
      $data['phone_number'] = $content['phone_number'];
      $data['name'] = $content['name'];     
      $data['product_id'] = $content['product_id'];     
      $this->_data = $data;

      //echo "<pre>";print_r($data);echo "</pre>";exit;
      if ($this->db->insert('buy_now', $this->_data)) 
      {     
         return $this->db->insert_id();
      } 
      else
      {
         return false;
      }
   }

   function userdata($id)
   {
      $this->db->select('*');
      $this->db->where(array('id' => $id));
      $query = $this->db->get('user');
      if($query->num_rows() > 0)
      {
         $result = $query->row();
         return $result;

      }else{
         return false;
      }
   }

	
}