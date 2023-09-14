<?php
class Agent_admin_Model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}

	function get_all_policy_category(){
		$this->db->select('*');
		$this->db->from('policy_category');
		$this->db->order_by("set_order ","asc");	
		$query = $this->db->get();
		return $query->result();
	}

	function get_policy_category_data($page_url){

		$this->db->select('*');
		$this->db->from('policy_category');
		$this->db->where('page_url',$page_url);	
		$query = $this->db->get();
		return $query->row();
	}

	function get_policy_using_catrgory($catid,$content){
		$sql = "SELECT policies.*, sum_insuranced_attr.*,min(sum_insuranced_attr.price) as minprice_policies, policies.id as id FROM policies INNER JOIN sum_insuranced_attr ON policies.id =sum_insuranced_attr.sins_id WHERE policies.cat_id = '".$catid."'";

   		if($content['insurer'] !='')
		{
			$company_name1 = $content['insurer'];
			$sql .=" and policies.company_id =".$company_name1."";
		}
		if($content['sum_insurer'] != '')
		{
			$sum_insurer1 = $content['sum_insurer'];
			//$sql .=" and sum_insured_id =".$content['sum_insurer']."";
			$sql .=" and find_in_set( '".$content['sum_insurer']."', sum_insuranced_attr.sum_insured_id )";		
		}

	        $sql .= " group by sum_insuranced_attr.sins_id";
	        
	        $searchContent = $content['sort_by'] !="";
			switch ($searchContent) {
		        case $content['sort_by'] == 'latest':
		           $sql .=  " order by policies.set_order asc ";
		            break;
		        case $content['sort_by'] == 'lowtohigh':
		           $sql .=  " order by minprice_policies asc";
		            break;
		        case $content['sort_by'] == 'hightolow':
		            $sql .=  "  order by minprice_policies desc ";
		            break;
		        default:
					if($content['menu'] !='')
				    {
				     	$sql .=  " ORDER BY sum_insuranced_attr.price DESC,policies.set_order asc ";	
				    } else {
				       $sql .=  " order by sum_insuranced_attr.`price` asc ";	
				    } 						      
		        }
	    //echo $sql;
		// $this->db->order_by('id','desc');
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

	function get_company_logo($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('company_name');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return false;
        }
    }

    function get_top_feature($policies_id)
	{
		$sql = "select * from top_feature where p_id='".$policies_id."'";
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

	function get_sum_insured_using_min_price($policies_id,$min_price)
	{
		 $sql = "SELECT * FROM sum_insuranced_attr WHERE sins_id ='".$policies_id."' and price LIKE '%".$min_price."%' ";
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

	function get_sum_insuranced($sum_insured_id)
	{
		 $sql = "SELECT * FROM sum_insured WHERE id ='".$sum_insured_id."'";
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

	function all_company_name() {
        $query = $this->db->get('company_name');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function get_sum_insured_detail() {
        $query = $this->db->get('sum_insured');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }


	function get_covergae_detail($policies_id)
	{
		$sql = "select * from coverage_attr where c_id='".$policies_id."'";
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

	function get_exclusions_attr_detail($policies_id)
	{
		$sql = "select * from exclusions_attr where excl_id='".$policies_id."'";
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

	function get_catdata_usingid($id)
   {
      $sql = "SELECT * FROM policy_category where id ='".$id."'";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0)
      {
         $result = $query->row();
         return $result;
      }else
      {
         return false;
      }
   }

   function all_policy_repository($catid)
   {
	  $sql = "SELECT * FROM product_repository WHERE cat_id ='".$catid."' GROUP BY policy_id";
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

   function get_policy_usingid($id)
   {
      $sql = "SELECT * FROM policies where id ='".$id."'";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0)
      {
         $result = $query->row();
         return $result;
      }else
      {
         return false;
      }
   }

   function get_policy_usingid_new($id)
   {
      $sql = "SELECT * FROM policies_product_repository where id ='".$id."'";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0)
      {
         $result = $query->row();
         return $result;
      }else
      {
         return false;
      }
   }

   function policy_repository_data($id,$type)
   {
     //echo $id;exit;

      $sql = "SELECT * FROM product_repository where policy_id ='".$id."' and document_type ='".$type."'";
      $query = $this->db->query($sql);
      if ($query->num_rows() > 0)
      {
         $result = $query->row();
         return $result;
      }else
      {
         return false;
      }
   }

   

 	function add_compare_send_mail_data($content){
   

 		//echo "<pre>";print_r($this->session->userdata('userid'));echo"</pre>";
 		$data['agent_id'] = $this->session->userdata('userid');
   		$data['name'] = $content['name'];	
		$data['mobile'] = $content['mobile'];
		$data['email'] = $content['email'];
		$data['location'] = $content['location'];
		$data['url'] = $content['url'];
		$data['added_date'] = date('Y-m-d H:i:s');
		
		$this->_data = $data;
		if ($this->db->insert('compare_send_mail', $this->_data))	
		{		
			return true; 
		} 
		else 
		{
			return false;
		}

	}


	function product_repository_single_policy_mail($content){
   

 		//echo "<pre>";print_r($this->session->userdata('userid'));echo"</pre>";
 		$data['agent_id'] = $this->session->userdata('userid');
 		$data['policy_id'] = $content['policy_id'];
   		$data['name'] = $content['name'];	
		$data['mobile'] = $content['mobile'];
		$data['email'] = $content['email'];
		$data['location'] = $content['location'];
		$data['policy_cat_id'] = $content['policy_cat_id'];
		$data['added_date'] = date('Y-m-d H:i:s');
		
		$this->_data = $data;
		if ($this->db->insert('product_repository_send_mail', $this->_data))	
		{		
			return true; 
		} 
		else 
		{
			return false;
		}

	}
   

   
}