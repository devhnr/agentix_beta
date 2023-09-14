<?php
    class User_escalation_model extends CI_Model 
    {
	private $_data = array();
    function __construct() 
    {
		parent::__construct();
	}

	function get_state($id)
    {
		$this->db->where('id = ',$id);
		$query = $this->db->get('user_escalation');
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
		$data['phone'] 	 = $content['phone'];
		$data['email'] 	 = $content['email'];
		$data['alternate_email'] 	 = $content['alternate_email'];
		$data['address'] 	 = $content['address'];
		$data['type'] 	 = $content['type'];
        $data['date'] 	 = date('Y-m-d');
		$this->_data = $data;
		if ($this->db->insert('user_escalation', $this->_data))
			{
				return true;
		 	}else
			{
				return false;
			}
    }
    
	function edit($id, $content) 
	{
		$data['name'] 	 = $content['name'];
		$data['phone'] 	 = $content['phone'];
		$data['email'] 	 = $content['email'];
		$data['alternate_email'] 	 = $content['alternate_email'];
		$data['address'] 	 = $content['address'];
		$data['type'] 	 = $content['type'];

		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('user_escalation', $this->_data))	
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
		
		$sql = "SELECT * FROM user_escalation where id <> 0 ";
		
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
			
		$query = $this->db->query($sql);
		
		$sql_count = "SELECT * FROM user_escalation WHERE id <> 0";

		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}
	    
	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('user_escalation'))	
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
		return $this->db->update('user_escalation', $content);	
	}	
    
}
?>