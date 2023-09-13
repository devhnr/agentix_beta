<?php
    class Blog_model extends CI_Model 
    {
		private $_data = array();
	    function __construct() 
    {
		parent::__construct();
	}


    function get_coupan($id)
    {
		$this->db->where('id = ',$id);
		$query = $this->db->get('faq');
        if ($query->num_rows() > 0)	
        {
			$result = $query->result();
			return $result;
        } 
        else 
        {
			return false;
		}
	}


	function add($content)
 	{	
		$L_strErrorMessage='';
		$data['title'] 	 = $content['title'];
		$data['page_url'] 	 = $content['page_url'];
        $data['description'] = $content['description'];
        $data['short_desc'] = $content['short_desc'];
        $data['date'] = $content['date'];
        $data['name'] = $content['name'];
        $data['title2'] = $content['title2'];
        $data['alt'] = $content['alt'];
        if($content['image'] !='')
		{
			$data['image'] = $content['image'];	
		}
		if($content['detail_img'] !='')
		{
			$data['detail_img'] = $content['detail_img'];	
		}

		if($content['blog_cate_id'] !='')
		{
			$data['blog_cate_id'] = $content['blog_cate_id'];	
		}

		$data['metatitle'] = $content['metatitle'];
		$data['metakeywords'] = $content['metakeywords'];
		$data['metadescription'] = $content['metadescription'];

		$this->_data = $data;
		if ($this->db->insert('blogs', $this->_data))
			{
				return true;
		 	}else
			{
				return false;
			}
    }


	function edit($id, $content) 
	{
        $data['title'] 	 = $content['title'];
        $data['page_url'] 	 = $content['page_url'];
        $data['description'] = $content['description'];
        $data['short_desc'] = $content['short_desc'];
        $data['date'] = $content['date'];
        $data['name'] = $content['name'];
        $data['title2'] = $content['title2'];
        $data['alt'] = $content['alt'];
        if($content['image'] !='')
		{
			$data['image'] = $content['image'];	
		}

		if($content['detail_img'] !='')
		{
			$data['detail_img'] = $content['detail_img'];	
		}

		if($content['blog_cate_id'] !='')
		{
			$data['blog_cate_id'] = $content['blog_cate_id'];	
		}

		$data['metatitle'] = $content['metatitle'];
		$data['metakeywords'] = $content['metakeywords'];
		$data['metadescription'] = $content['metadescription'];

		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('blogs', $this->_data))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
	}


    function lists($num, $offset, $content) 
	{
		if($offset == '')
		{
			$offset = '0';
		}
		$sql = "SELECT * FROM blogs where id <> 0 ";
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
		$query = $this->db->query($sql);
		/*if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}*/
		$sql_count = "SELECT * FROM blogs WHERE id <> 0";
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}

	function updateorder_popular($id, $val) {
        $query = "update blogs set popular = '" . $val . "'  where id = '" . $id . "'";
        $result = $this->db->query($query);
        return $result;
    }

	function updateorder_status($id, $val) {
        $query = "update blogs set status = '" . $val . "'  where id = '" . $id . "'";
        $result = $this->db->query($query);
        return $result;
    }

	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('blogs'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }


	  /*function getsubcate_name($id)


	{


 		$this->db->where('id = ',$id);


		$query = $this->db->get('subcategory');


		if ($query->num_rows() > 0)


		{


			$result = $query->row()->subcategoryname;


			return $result;


		}


		else


		{


			return false;


		}


    }*/


	 /*function allcategory()


	{


		$this->db->order_by('id', 'desc');


		$query = $this->db->get('category');


		if ($query->num_rows() > 0)	{


			$result = $query->result();


			return $result;


		} else {


			return false;


		}


    }*/


	/*function allcategory_product($id='')


	{


		if($id!='')


		{


			$this->db->where('category_id = ',$id);


		}


 		$query = $this->db->get('product');


		if ($query->num_rows() > 0)	{


			$result = $query->result();


			return $result;


		} else {


			return false;


		}


    }*/


	/*function getcate_name($id)


	{


 		$this->db->where('id = ',$id);


		$query = $this->db->get('category');


		if ($query->num_rows() > 0)


		{


			$result = $query->row()->categoryname;


			return $result;


		}


		else


		{


			return false;


		}


    }*/


	function updatestatus($id,$is_active)
	{
	$sql= " update tbl_coupan set enabled= '".$is_active."' where id='".$id."' ";
        if ($query = $this->db->query($sql))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }

	 function is_add($name)
	{
		$this->db->where('code',$name);
		$query = $this->db->get('tbl_coupan');
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function is_exist($id)
	{
		$this->db->where('id = ',$id);
		$query = $this->db->get('blogs');
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function alldata($table_name) {
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function get_cate_name($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('blog_category');
        if ($query->num_rows() > 0) {
            $result = $query->row()->name;
            return $result;
        } else {
            return false;
        }
    }
}
?>