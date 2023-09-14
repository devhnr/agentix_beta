<?php
class Home_Model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}

	function allbanner()
   	{
		$this->db->order_by("id ","desc");
		$query = $this->db->get('banner');   		
   		if ($query->num_rows() > 0)	{
   			$result = $query->row();
   			return $result;
   		} else {
   			return false;
   		}
	}

	function all_product_home()
   	{
		$this->db->order_by("set_order");
		$query = $this->db->get('product_home');   		
   		if ($query->num_rows() > 0)	{
   			$result = $query->result();
   			return $result;
   		} else {
   			return false;
   		}
	}

	 function get_about_detail()
   	{
		$this->db->order_by("id ","desc");
		$query = $this->db->get('about');   		
   		if ($query->num_rows() > 0)	{
   			$result = $query->row();
   			return $result;
   		} else {
   			return false;
   		}
	}

	 function all_msme_edge()
   	{
		$this->db->order_by("set_order");
		$query = $this->db->get('msme_edge');   		
   		if ($query->num_rows() > 0)	{
   			$result = $query->result();
   			return $result;
   		} else {
   			return false;
   		}
	}


	function all_product_strength()
   	{
		$this->db->order_by("set_order");
		$query = $this->db->get('product_strength');   		
   		if ($query->num_rows() > 0)	{
   			$result = $query->result();
   			return $result;
   		} else {
   			return false;
   		}
	 }

	function all_whats_new()
   	{
		$this->db->order_by("set_order");
		$query = $this->db->get('whats_new');   		
   		if ($query->num_rows() > 0)	{
   			$result = $query->result();
   			return $result;
   		} else {
   			return false;
   		}
	}

   public function checkLogin($data)
  {
      $sql = "select * from agent where (agent_id = '".$data['agent_id']."') AND password = '".$data['password']."' ";
      $result = $this->db->query($sql);
      if($result->num_rows() > 0){
         return $result->result_array();
      } else {
         return "0";
      }
   }

   function userlogin($arrContent)
   {

      $sql = "select * from agent where (agent_id = '".$arrContent['agent_id']."' ) AND password = '".$arrContent['password']."' ";
      
      $query = $this->db->query($sql); 
      
      if($query->num_rows() > 0)
      {
         $result = $query->row();
         return $result;
      }
      else
      {
         return false;
      }
   }

   function userbyemail($agent_id)
   {
      $sql = "select * from agent where agent_id = '".$agent_id."'";
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

   function all_industry() {
        $this->db->order_by("id","desc");
      $query = $this->db->get('industry');        
         if ($query->num_rows() > 0)   {
            $result = $query->result();
            return $result;
         } else {
            return false;
         }
    }

    function all_sub_industry() {
        $this->db->order_by("id","desc");
      $query = $this->db->get('all_sub_industry');        
         if ($query->num_rows() > 0)   {
            $result = $query->result();
            return $result;
         } else {
            return false;
         }
    }

    function sub_industry($id) {
        $this->db->where('industry_id = ', $id);
        $query = $this->db->get('sub_industry');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function all_risk_assessment()
    {
    $this->db->order_by("set_order");
    $query = $this->db->get('risk_assessment');      
      if ($query->num_rows() > 0) {
        $result = $query->result();
        return $result;
      } else {
        return false;
      }
  }

  function add_detail_form($content)
  {   
    $L_strErrorMessage='';
    if ($this->db->insert('detail_form', $content))
    {   
      return $this->db->insert_id();
    } 
    else
    {
      return false;
    }
  }

  function sub_industry_profile() {
      $this->db->order_by("id","desc");
      $query = $this->db->get('sub_industry');        
         if ($query->num_rows() > 0)   {
            $result = $query->row();
            return $result;
         } else {
            return false;
         }
    }

    function all_coverage()
    {
      $this->db->order_by("set_order");
      $query = $this->db->get('coverage');      
        if ($query->num_rows() > 0) {
          $result = $query->result();
          return $result;
        } else {
          return false;
        }
    }

   function all_type()
   {
      $sql = "SELECT * FROM type ORDER BY set_order";
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

   function get_all_product($type_id,$coverage_id)
   {
      $sql = "SELECT * FROM product WHERE type_id = '".$type_id."' and coverage_id = '".$coverage_id."' ";
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

  function get_coverage_data($coverage_id)
  {
    $sql = "SELECT c.*,c.id as cid,p.id as pid,p.name as pname,p.image as pimage,t.id as type_id,
            t.name as tname,t.description as tdescription,t.image as timage,t.* FROM coverage c 
            LEFT JOIN product p ON p.coverage_id = c.id
            LEFT JOIN type t ON t.id = p.type_id
            WHERE c.id = '".$coverage_id."' group by type_id";
           
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0)
            {
              $result = $query->result();
              
              return $result;
            }else{
              return false;
            }
  }

  function product_covId($type_id,$coverage_id)
   {
      $sql = "SELECT * FROM product WHERE type_id = '".$type_id."' AND coverage_id = '".$coverage_id."' ";
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

   function get_product_id($coverage_id,$type_id)
   {
       $sql = "SELECT * FROM product WHERE coverage_id = '".$coverage_id."'  and type_id = '".$type_id."'";
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

   function get_sub_industry_grap($sub_industry_id)
   {
     $sql = "SELECT * FROM sub_industry WHERE id = '".$sub_industry_id."'";
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
}