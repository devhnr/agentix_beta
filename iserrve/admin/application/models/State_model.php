<?php
    class State_model extends CI_Model 
    {
	private $_data = array();
    function __construct() 
    {
		parent::__construct();
	}

	function get_state($id)
    {
		$this->db->where('id = ',$id);
		$query = $this->db->get('state');
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
		
		$data['name'] 	 = $content['name'];
		//$data['page_url'] 	 = $content['page_url'];
        
		$this->_data = $data;
		if ($this->db->insert('state', $this->_data))
			{
				return true;
		 	}else
			{
				return false;
			}
    }
    
	function edit($id, $content) 
	{
		$data['name'] = $content['name'];
		//$data['page_url'] = $content['page_url'];

		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('state', $this->_data))	
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
		
		$sql = "SELECT * FROM state where id <> 0 ";
		
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
			
		$query = $this->db->query($sql);
		
		$sql_count = "SELECT * FROM state WHERE id <> 0";

		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}
	    
	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('state'))	
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
		return $this->db->update('state', $content);	
	}	
    
}
?>