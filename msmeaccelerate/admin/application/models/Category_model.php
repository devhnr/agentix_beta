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

            if (count($_POST['title']) > 0 && $_POST['title'] != '') {
                for ($i = 0; $i < count($_POST['title']); $i++) {

                    $content['p_id'] = $id;
                    //$content['size'] = $_POST['size'][$i];
                    //$content['colour'] = $_POST['colour'][$i];
                    $content['title'] = $_POST['title'][$i];
                    $content['description'] = $_POST['description'][$i];

                    if($_FILES['s_image_'.$i]['name'] != '') { 
                        
                        $tmp_name1 =  $_FILES['s_image_'.$i]['tmp_name'];  
                        $rootpath1 =  $this->config->item('upload')."industry_add_more/";
                        $remove_space1 = str_replace(' ', '',$_FILES['s_image_'.$i]['name']);
                        $logoname = time().$remove_space1;
                        move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                        $content['s_image']   = $logoname;                         
                	}

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
        $data['s_image'] = $content['s_image'];
        $data['title'] = $content['title'];
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
			if ($_POST['title1'] != '' && count($_POST['title1']) > 0) {


                for ($i = 0; $i < count($_POST['title1']); $i++) {

                    if ($_POST['title1'][$i] != '') {
                        $content2['p_id'] = $id;
                        $content2['description'] = $_POST['description1'][$i];
                         $content2['title'] = $_POST['title1'][$i];

                         if($_FILES['e_image1_'.$i]['name'] != '') { 
                            $tmp_name1 =  $_FILES['e_image1_'.$i]['tmp_name'];  
                            $rootpath1 =  $this->config->item('upload')."industry_add_more/";
                            $remove_space1 = str_replace(' ', '',$_FILES['e_image1_'.$i]['name']);
                            $logoname = time().$remove_space1;
                            move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                            $content2['s_image'] = $logoname;                         
                        }

                        $this->insert_attribute($content2);
                    }
                }
            }
			
			if (count($_POST['titleu']) > 0 && $_POST['titleu'] != '') {

				//echo "<pre>";print_r($_FILES);echo"</pre>";exit;
                for ($i = 0; $i < count($_POST['titleu']); $i++) {

                	//echo $i;
                	

                    $content1['p_id'] = $id;
                    // $content1['sizeu'] = $_POST['sizeu'][$i];

                    // $content1['colouru'] = $_POST['colouru'][$i];

                    $content1['descriptionu'] = $_POST['descriptionu'][$i];
                    $content1['titleu'] = $_POST['titleu'][$i];
                    //$content1['qtyu'] = $_POST['qtyu'][$i];
                    $content1['updateid1xxx'] = $_POST['updateid1xxx'][$i];

                    if($_FILES['s_imageu_'.$i]['name'] != '') { 
                        $tmp_name1 =  $_FILES['s_imageu_'.$i]['tmp_name'];  
                        $rootpath1 =  $this->config->item('upload')."industry_add_more/";
                        //echo $rootpath1 ;exit;
                        $remove_space1 = str_replace(' ', '',$_FILES['s_imageu_'.$i]['name']);
                        $logoname = time().$remove_space1;
                        move_uploaded_file( $tmp_name1 , $rootpath1.$logoname );
                        $content1['s_image'] = $logoname;   
                    }else
                        {
                            $content1['s_image'] ="";
                        } 

                   // echo "<pre>";print_r($_FILES);echo"</pre>";exit;

                    $this->update_attribute($content1);
                }
            }



            return true;
			
			
		} else {
			return false;
		}
	}
	
	function update_attribute($content) {

		//echo "<pre>";print_r($content);echo"</pre>";exit;

        $data1['p_id'] = $content['p_id'];

        $data1['title'] = $content['titleu'];

        //$data1['s_image'] = $content['s_image'];

        if($content['s_image'] !="")
        {
            $data1['s_image'] = $content['s_image'];
        }

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