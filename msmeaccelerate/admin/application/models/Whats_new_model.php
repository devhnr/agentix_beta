<?php
    class Whats_new_model extends CI_Model 
    {
		private $_data = array();
	    function __construct() 
    {
		parent::__construct();
	}

	function add($content)
 	{	
		$L_strErrorMessage='';
		$data['title'] 	 = $content['title'];
		$data['url'] 	 = $content['url'];
        if($content['image'] !='')
		{
			$data['image'] = $content['image'];	
		}
		$this->_data = $data;
		if ($this->db->insert('whats_new', $this->_data))
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
		$data['url'] 	 = $content['url'];
        if($content['image'] !='')
		{
			$data['image'] = $content['image'];	
		}
		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('whats_new', $this->_data))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
	}


	function updateorder($id,$val){

		$content['set_order'] = $val;

		$this->db->where('id',$id);

		return $this->db->update('whats_new', $content);	
	}


    function lists($num, $offset, $content) 
	{
		if($offset == '')
		{
			$offset = '0';
		}
		$sql = "SELECT * FROM whats_new where id <> 0 ";
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
		$query = $this->db->query($sql);
		/*if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}*/
		$sql_count = "SELECT * FROM whats_new WHERE id <> 0";
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}

	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('whats_new'))	
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
		$query = $this->db->get('whats_new');
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
}
?>