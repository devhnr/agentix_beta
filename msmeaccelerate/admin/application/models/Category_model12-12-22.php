<?php
	class Category_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}

	  function get_user($id){
		  $this->db->where('id = ',$id);
		  $query = $this->db->get('admin_user');	
		  if ($query->num_rows() > 0)	{	
		  $result = $query->result();	
		  return $result;	
		  } else {		
		  return false;	
		  }	

		  }

		  function edit_pass($content) {	

		  $data['password']  = $content['newpassword'];	 

		  $this->_data = $data;	

		  $this->db->where('id', $this->session->userdata('adminId'));	

		  if ($this->db->update('admin_user', $this->_data))

			  {			return true;	

		  } else {			return false;	

		  }	}

		  

	function add($content) 

	{
		$L_strErrorMessage='';
		$data['name'] = $content['name'];
		$data['mail_description'] = $content['mail_description'];	
		
		$this->_data = $data;
		if ($this->db->insert('industry', $this->_data))	
		{		
			$id = $this->db->insert_id();

            if (count($_POST['description']) > 0 && $_POST['description'] != '') {
                for ($i = 0; $i < count($_POST['description']); $i++) {

                    $content['p_id'] = $id;
                    //$content['size'] = $_POST['size'][$i];
                    //$content['colour'] = $_POST['colour'][$i];
                    $content['description'] = $_POST['description'][$i];
                    //$content['qty'] = $_POST['qty'][$i];
                    $this->insert_attribute($content);
                }
            }

            return $id;
		} 
		else 
		{
			return false;
		}
	}
	
	function insert_attribute($content) {
        $data['p_id'] = $content['p_id'];
        // $data['size'] = $content['size'];
        // $data['colour'] = $content['colour'];
        $data['description'] = $content['description'];
        //$data['qty'] = $content['qty'];
        $this->_data = $data;
        if ($this->db->insert('industry_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }
	
	
	function addition_item($id) {
        $this->db->where('p_id = ', $id);
        $query = $this->db->get('industry_attribute');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

		

	function edit($id, $content) 
	{
		$data['name'] = $content['name'];
		$data['mail_description'] = $content['mail_description'];
		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('industry', $this->_data))	{
			
			//echo"<pre>";print_r($_POST['description1']);echo"</pre>";exit;
			if ($_POST['description1'] != '' && count($_POST['description1']) > 0) {


                for ($i = 0; $i < count($_POST['description1']); $i++) {

                    if ($_POST['description1'][$i] != '') {
                        $content2['p_id'] = $id;
                        $content2['description'] = $_POST['description1'][$i];
                        $this->insert_attribute($content2);
                    }
                }
            }
			
			if (count($_POST['descriptionu']) > 0 && $_POST['descriptionu'] != '') {
                for ($i = 0; $i < count($_POST['priceu']); $i++) {

                    $content1['p_id'] = $id;
                    // $content1['sizeu'] = $_POST['sizeu'][$i];

                    // $content1['colouru'] = $_POST['colouru'][$i];

                    $content1['descriptionu'] = $_POST['descriptionu'][$i];
                    //$content1['qtyu'] = $_POST['qtyu'][$i];
                    $content1['updateid1xxx'] = $_POST['updateid1xxx'][$i];

                    $this->update_attribute($content1);
                }
            }



            return true;
			
			
		} else {
			return false;
		}
	}
	
	function update_attribute($content) {

        $data1['p_id'] = $content['p_id'];

        // $data1['size'] = $content['sizeu'];

        // $data1['colour'] = $content['colouru'];

        $data1['description'] = $content['descriptionu'];
        //$data1['qty'] = $content['qtyu'];

        $this->db->where('id =', $content['updateid1xxx']);

        if ($this->db->update('industry_attribute', $data1)) {
            return true;
        } else {
            return false;
        }
    }
	
	function removeattriute($product_id, $id) {
        $this->db->where('p_id = ', $product_id);
        $this->db->where('id = ', $id);
        if ($this->db->delete('industry_attribute')) {
            return true;
        } else {
            return false;
        }
    }
		

		function featured_product($pid,$value)
	{
		$query = "update industry set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		$sql = "SELECT * FROM industry where id <> 0 ";
		if($content['categoryname'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['categoryname']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM  industry  WHERE id <> 0";

		if($content['categoryname'] !='')
		{
			$sql_count .= " AND `name` like '".$content['categoryname']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret;

	}

	

 

	

	function deletes($id) 

	{

 		$this->db->where('id = ',$id);

		if ($this->db->delete('industry'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_category($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('industry');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	

	function updateorder($id,$val){

		$content['set_order'] = $val;

		$this->db->where('id',$id);

		return $this->db->update('industry', $content);	

	}

	

	function getgourp_name($id)

	{

		$this->db->where('id',$id);

		$query = $this->db->get('group1');

		if($query->num_rows() > 0)

		{

			return $query->row()->name;

		}

		else

		{

			return false;

		}

	}

	

	function all_group()

	{

		$query = $this->db->get('group1');

		if($query->num_rows() > 0)

		{

			return $query->result();

		}

		else

		{

			return false;

		}

	}

	

	

function is_already_exist_add($user)

	{

		$this->db->where('email',$user['email']);

		$query = $this->db->get('user');

		if($query->num_rows() > 0)

		{

			return true;

		}

		else

		{

			return false;

		}

	}	

function is_already_exist_edit($user,$id)

	{

		$this->db->where('id !=',$id);

		$this->db->where('email',$user['email']);

		$query = $this->db->get('user');

		if($query->num_rows() > 0)

		{

			return true;

		}

		else

		{

			return false;

		}

		

	}function updatestatus($id,$is_active){	$sql= " update user set active_deactive= '".$is_active."' where id='".$id."' ";		if ($query = $this->db->query($sql))	{			return true;		} else {			return false;			}	}





	

	

}

?>