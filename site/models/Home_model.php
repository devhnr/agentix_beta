<?php
class Home_Model extends CI_Model 
{
	function __construct() 
	{
		parent::__construct();
	}

	function get_blog_data_all()
	{	
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->order_by("id ","desc");	
		$query = $this->db->get();
		return $query->result();
   	}

   	function get_blog_detail($page_url)
	{
        $this->db->where('page_url=',$page_url);
        $query = $this->db->get('blogs');
        if ($query->num_rows() > 0)	{
            $result = $query->row();
            return $result;
        } else {
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

	function get_insurance_company()
	{
		$sql = "SELECT * from insurance_company ";
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

	function checkemail($email)
		{
			$this->db->select('agent_user.id,agent_user.email,agent_user.name,agent_user.password');
			$this->db->where(array('email' => $email));
			$query = $this->db->get('agent_user');
			if($query->num_rows() > 0)
			{
				return $query->row(); 
			}
			else
			{
				return false;
			}
	}

	function register($content)

    {



    	$L_strErrorMessage='';

        $data['name'] = $content['agent_name'];	

		$data['email'] = $content['agent_email'];

		$data['password'] = password_hash($content['agent_password'], PASSWORD_DEFAULT);
		$data['mobile']  = $content['mobile'];

		$data['licence_no']  = $content['agent_licence_no'];
		
		$data['pan_number']  = $content['agent_pan'];
		$data['insurance_company']  = implode(",", $content['name_of_company_insurance']);

		//echo"<pre>";print_r($data);echo"</pre>";exit;

		$this->_data = $data;

		

		if ($this->db->insert('agent_user', $this->_data)){	
			return $this->db->insert_id();
		}else {
			return false;
		}

	}

	function userdata($id)
	{
		$this->db->select('*');
		$this->db->where(array('id' => $id));
		$query = $this->db->get('agent_user');
		if($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;

		}else{
			return false;
		}
	}

	function get_compamy_name($id)
	{
		$this->db->select('*');
		$this->db->where_in('id', $id);

		$query = $this->db->get('insurance_company');
		if($query->num_rows() > 0)
		{
			$result = $query->result();
			return $result;

		}else{
			return false;
		}
	}


	public function checkLogin($data)
    	{
    	$email = $data['email'];
    	$query = $this->db->query('SELECT * FROM agent_user WHERE email = ?', array($email));
		$old_pass = $query->row()->password;

		if (password_verify($data['password'], $old_pass)) {
    		
    		$sql = "select * from agent_user where (email = '".$data['email']."')";
			$result = $this->db->query($sql);
			if($result->num_rows() > 0){
				return $result->result_array();
			} else {
				return "0";
			}

		} else {
		    return "0";
		}

	}

	function isUserExist($email)
		{

			$sql = "select * from agent_user where (email = '".$email."' ) ";
			
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

	function userlogin($arrContent)
		{

			$sql = "select * from agent_user where (email = '".$arrContent['email']."' ) ";
			
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


		function userbyemail($email)
	{


		$sql = "select * from agent_user where email = '".$email."'";
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

	function reset_password($data)
	{
		$content['password']  = password_hash($data['agent_password'], PASSWORD_DEFAULT);
		$user_id  = $data['user_id'];  
		
		$this->db->where('id', $user_id);	
		if ($this->db->update('agent_user', $content))
		{		
			return true;	
		}else{ 	
			return false;	 
		}			
	}

	function update_login_flag($id,$flag)
	{
		$content['is_login']  = $flag;
		
		$this->db->where('id', $id);	
		if ($this->db->update('agent_user', $content))
		{		
			return true;	
		}else{ 	
			return false;	 
		}			
	}
	

	

	
}