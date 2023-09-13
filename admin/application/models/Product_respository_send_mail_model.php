<?php
	class Product_respository_send_mail_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM product_repository_send_mail where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  product_repository_send_mail  WHERE id <> 0";

		if($content['categoryname'] !='')
		{
			$sql_count .= " AND `name` like '".$content['categoryname']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret;

	}

	
	function get_agent_name($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('agent_user');
		if($query->num_rows() > 0)
		{
			return $query->row()->name;
		}
		else
		{
			return false;
		}
	}
	
	function get_policy_name($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('policies');
		if($query->num_rows() > 0)
		{
			return $query->row()->plan_name;
		}
		else
		{
			return false;
		}
	}
 

	

	function deletes($id) 

	{

 		$this->db->where('id = ',$id);

		if ($this->db->delete('product_repository_send_mail'))	{

			return true;

		} else {

			return false;

		}

	}

	
}

?>