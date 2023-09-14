<?php
    class City_model extends CI_Model 
    {
	private $_data = array();
    function __construct() 
    {
		parent::__construct();
	}

	function get_city($id)
    {
		$this->db->where('id = ',$id);
		$query = $this->db->get('city');
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
		
		$data['state_id'] 	 = $content['state_id'];
		$data['name'] 	 = $content['name'];
		//$data['page_url'] 	 = $content['page_url'];
        
		$this->_data = $data;
		if ($this->db->insert('city', $this->_data))
			{
				return true;
		 	}else
			{
				return false;
			}
    }
    
	function edit($id, $content) 
	{
		$data['state_id'] = $content['state_id'];
		$data['name'] = $content['name'];
		///$data['page_url'] = $content['page_url'];

		$this->_data = $data;
		$this->db->where('id', $id);
        if ($this->db->update('city', $this->_data))	
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
		
		$sql = "SELECT * FROM city where id <> 0 ";
		
		if($num!='' || $offset!='')
			{
				$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
			}
			
		$query = $this->db->query($sql);
		
		$sql_count = "SELECT * FROM city WHERE id <> 0";

		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result_array();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}
	    
	function deletes($id) 
	{
 		$this->db->where('id = ',$id);
        if ($this->db->delete('city'))	
        {
			return true;
        } 
        else 
        {
			return false;
		}
    }

	function allstate()
	{
		$sql = "SELECT * FROM state order by set_order desc";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;
		}
	}

	function getState($id) {
        $this->db->where('id = ', $id);
        $query = $this->db->get('state');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        } else {
            return false;
        }
    }
	
	function updateorder($id,$val){
		$content['set_order'] = $val;
		$this->db->where('id',$id);
		return $this->db->update('city', $content);	
	}	

	public function check_name($name){
        $this->db->where('name', $name);
        $query = $this->db->get('city');
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }

	function get_state_id($name)
	{
		$sql = "SELECT * FROM `state` WHERE `name` LIKE '".$name."' ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->id;
			return $result;
		}
	}


	public function update_name($content)
   { 

   		$data['state_id'] = $content['state_id'];
   		$data['name'] = $content['name'];

        $this->_data = $data;
         $this->db->where('name', $data['name']);
       
       if ($this->db->update('city', $this->_data)) {
            return 1;
        }else{

        	return 0;
        }
        
}

public function addcity($content)
    {  
    	 

    	 $data['state_id'] = $content['state_id'];
    	 $data['name'] = $content['name'];
        $this->_data = $data;
        if ($this->db->insert('city', $this->_data)) {
            $goods = $this->db->insert_id();
            return $goods;
        }else{
        	return false;
	    }

}
    
}
?>