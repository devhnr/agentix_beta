<?php
	class Agent_users_model extends CI_Model {
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

		$sql = "SELECT * FROM agent_user where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  agent_user  WHERE id <> 0";

		if($content['categoryname'] !='')
		{
			$sql_count .= " AND `name` like '".$content['categoryname']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret;

	}

	
	function get_agent_insurance_company_name($id)
	{
		$ids = explode(',', $id);

$this->db->where_in('id', $ids);
$query = $this->db->get('insurance_company');

if ($query->num_rows() > 0) {
    return $query->result(); // Return the result set as an array of objects
} else {
    return false;
}
	}
 

	

	function deletes($id) 

	{

 		$this->db->where('id = ',$id);

		if ($this->db->delete('agent_user'))	{

			return true;

		} else {

			return false;

		}

	}

	
}

?>