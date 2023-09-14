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
      $content['customize_plan']  = $data['customize_plan'];
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

   function add_qoutePopup($content)
   {
      $L_strErrorMessage='';
      $data['company'] = $content['company'];
      $data['email'] = $content['email'];
      $data['phone_number'] = $content['phone_number'];
      $data['name'] = $content['name'];     
      $data['product_id'] = $content['product_id'];     
      $this->_data = $data;

      //echo "<pre>";print_r($data);echo "</pre>";exit;
      if ($this->db->insert('qoute_popup_form', $this->_data)) 
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

   function all_category()
   {
      $this->db->order_by("id ","desc");
      $query = $this->db->get('category');        
         if ($query->num_rows() > 0)   {
            $result = $query->result();
            return $result;
         } else {
            return false;
         }
   }

   function get_product($cat_id)
   {
      $sql = "select * from product where category_id = '".$cat_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

   function get_product_details_page_url($page_url)
   {
      $sql = "select * from product where page_url = '".$page_url."'";
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

   function get_category_page_url($page_url)
   {
      $sql = "select * from category where page_url = '".$page_url."'";
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

   function get_product_indexPage()
   {
      $sql = "select * from product where page_url = 'group-health-insurance' ";
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

    function get_employee_benefit($product_id)
   {
      $sql = "select * from product_emp_benefits where p_id = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

   function get_importanceGroupIns($product_id)
   {
      $sql = "select * from group_health_ins where pid = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

   function get_advantaGroupIns($product_id)
   {
      $sql = "select * from advantage_group_ins where pro_id = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

    function get_featureGroupIns($product_id)
   {
      $sql = "select * from feature_group_ins where prod_id = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

   function get_whyBuyGroupIns($product_id)
   {
      $sql = "select * from why_buy_nowgroup where proid = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

   function get_whoShouldGroupIns($product_id)
   {
      $sql = "select * from whoshould_group_ins where produc_id = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

   function get_purchaseGroupIns($product_id)
   {
      $sql = "select * from purchase_group_ins where produ_id = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

   function get_faq($product_id)
   {
      $sql = "select * from faq_attribute where faq_pid = '".$product_id."'";
      $query = $this->db->query($sql);
      if($query->num_rows() > 0)
      {
         return $query->result(); 
      }
      else
      {
         return false;
      }
   }

	
}