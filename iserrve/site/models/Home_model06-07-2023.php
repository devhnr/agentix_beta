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
			$data['platform'] = $content['platform'];

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
	  $current_date = date("Y-m-d");
      $data['added_date'] = $current_date;
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

   function add_bookConsultation($content)
   {
      $L_strErrorMessage='';
      $data['company'] = $content['company'];
      $data['location'] = $content['location'];
      $data['email'] = $content['email'];
      $data['phone'] = $content['phone'];
      $data['name'] = $content['name'];
	  $current_date = date("Y-m-d");
      $data['added_date'] = $current_date;
      // $data['product_id'] = $content['product_id'];
      $this->_data = $data;
      if ($this->db->insert('book_consultation', $this->_data))
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
      $data['location'] = $content['location'];
      $data['email'] = $content['email'];
      $data['phone_number'] = $content['phone_number'];
      $data['name'] = $content['name'];
      $data['product_id'] = $content['product_id'];
	  $current_date = date("Y-m-d");
      $data['added_date'] = $current_date;
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


   function all_blog()
   {
      $this->db->select('*');
      //$this->db->where(array('id' => $id));
      $query = $this->db->get('blogs');
      if($query->num_rows() > 0)
      {
         $result = $query->result();
         return $result;

      }else{
         return false;
      }
   }

   function blog_details($page_url)
   {
      $this->db->select('*');
      $this->db->where(array('page_url' => $page_url));
      $query = $this->db->get('blogs');
      if($query->num_rows() > 0)
      {
         $result = $query->row();
         return $result;

      }else{
         return false;
      }
   }

   function latest_blog($id)
	{
		$sql = "SELECT * from blogs where id != '".$id."' order by id desc LIMIT 2";
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

   function add_review($data)
	{
		$content['blog_id']  = $data['blog_id'];
		$content['name']  = $data['name'];
		$content['email']  = $data['email'];
		$content['message']  = $data['message'];
		$content['subject']  = $data['subject'];
		$content['added_date']  = date("Y-m-d");
		if ($this->db->insert('post_comment',$content))
		{
			return true;
		}else
		{
			return false;
		}
	}
   function add_contact($content)
   {
      $L_strErrorMessage='';

      //print_r("test");exit;

      if ($this->db->insert('home_get_quote', $content))
      {
         return $this->db->insert_id();
      }
      else
      {
         return false;
      }
   }

	 public function isCorporateExist($username){
      try{
          $this->db->select('id as corporate_id,co_name,co_user_name,password,active_deactive,group_code');
          $this->db->from('corporate');
          $this->db->where('co_user_name',$username);
          $query=$this->db->get();
          if($this->db->affected_rows() > 0){
              return $query->row_array();
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
