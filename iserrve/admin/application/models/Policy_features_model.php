<?php
	class Policy_features_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
		$this->load->model('admin');
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

		// echo "<pre>";print_r($content);echo "</pre>";exit;

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
		$L_strErrorMessage='';

		$data['insurer'] = $content['insurer'];
		$data['corporate_id'] = $content['corporate_id'];
		$data['product_name'] = $content['product_name'];
		$data['policy_no'] = $content['policy_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['inclusions'] = str_ireplace(array("\r","\n",'\r','\n','\\r'),'', $content['inclusions']);
		$data['exclusions'] = $content['exclusions'];
		$data['product_type'] = $content['product_type'];
		
		$data['date'] = date("Y-m-d");

		

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		// $data['sum_insured_start_date'] = date("Y-m-d",strtotime($content['sum_insured_start_date']));
		// $data['sum_insured_end_date'] =  date("Y-m-d",strtotime($content['sum_insured_end_date']));
		// $data['tpa'] = $content['tpa'];
		// $data['page_url'] = $content['page_url'];	
		$this->_data = $data;
		if ($this->db->insert('policy_features', $this->_data))	
		{	
			
			$id = $this->db->insert_id();

			// echo $id;exit;


			//if($_POST['field_id'] != ''){

				foreach($_POST['field_id'] as $key => $value){
					
					//if($_POST['field_type'][$key] != ''){
						$data_1['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_1['field_id'] =  $this->admin->xss_clean_inputData($value);
						$data_1['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type'][$key]);
						$data_1['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_hidden'][$key]);
						$data_1['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->insert_attribute($data_1);
					//}
				}

			//}

			//if($_POST['field_id_radio'] != ''){
				foreach($_POST['field_id_radio'] as $key => $value){
					// echo $value;
					// echo $_POST['radio_'.$value.'']."<br>";
					//if($_POST['radio_'.$value.''] != ''){
						$data_2['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_2['field_id'] =  $this->admin->xss_clean_inputData($value);
						$data_2['field_type'] =  $this->admin->xss_clean_inputData($_POST['radio_'.$value.'']);
						$data_2['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_hidden'][$key]);
						$data_2['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->insert_attribute($data_2);
					//}

					
				}
				
			//}

			//if($_POST['radio_'.$value.''] == 'Yes' || $_POST['radio_'.$value.'']== 'yes'){
						
				foreach($_POST['field_id_radio_att'] as $key1 => $value1){

					if($_POST['field_type_radio_att'][$key1] != ''){
						$data_3['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_3['field_id'] =  $this->admin->xss_clean_inputData($value1);
						$data_3['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type_radio_att'][$key1]);
						$data_3['radio_att_flag'] =  $this->admin->xss_clean_inputData(1);
						$data_3['status'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->insert_attribute($data_3);
					}
				}
			//}

			return $id; 
		} 
		else 
		{
			return false;
		}
	}

	function insert_attribute($content) {
        $data['policy_features_id'] = $content['policy_features_id'];
        $data['field_id'] = $content['field_id'];
        $data['field_type'] = $content['field_type'];
		$data['radio_att_flag'] = $content['radio_att_flag'];
		$data['status'] = $content['status'];

        $this->_data = $data;
        if ($this->db->insert('policy_features_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }

		

	function edit($id, $content) 
	{
		$data['insurer'] = $content['insurer'];
		$data['corporate_id'] = $content['corporate_id'];
		$data['product_name'] = $content['product_name'];
		$data['policy_no'] = $content['policy_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['inclusions'] = str_ireplace(array("\r","\n",'\r','\n','\\r'),'', $content['inclusions']);
		$data['exclusions'] = $content['exclusions'];
		$data['product_type'] = $content['product_type'];

		// 		ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('policy_features', $this->_data))	{

			$this->delete_old_policy_feature($id);

			//echo "<pre>";print_r($_POST);echo"</pre>";exit;

			if($_POST['field_idu'] != ''){

				foreach($_POST['field_idu'] as $key => $value){

					$data_1['policy_features_id'] = $this->admin->xss_clean_inputData($id);
					$data_1['field_idu'] =  $this->admin->xss_clean_inputData($value);
					$data_1['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_typeu'][$key]);
					$data_1['updateid1xxx'] = $this->admin->xss_clean_inputData($_POST['updateid1xxx'][$key]);
					$data_1['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_hiddenu'][$key]);
					$data_1['radio_att_flag'] =  0;
					//echo $_POST['field_type'][$key]."<br>";
					$this->update_attribute($data_1);

				}

			}

			if($_POST['field_id_radiou'] != ''){

				foreach($_POST['field_id_radiou'] as $key => $value){

					if($_POST['radio_'.$value.''] != ''){
						$data_1['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_1['field_idu'] =  $this->admin->xss_clean_inputData($value);
						$data_1['field_type'] =  $this->admin->xss_clean_inputData($_POST['radio_'.$value.'']);
						$data_1['updateid1xxx'] = $this->admin->xss_clean_inputData($_POST['updateid1xxx_radio'][$key]);
						$data_1['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_hiddenu'][$key]);
						$data_1['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->update_attribute($data_1);
						// echo $_POST['radio_'.$value.''];
						// echo "<pre>";print_r($data_1);echo"</pre>";exit;
					}
					

				}

				//if($_POST['radio_'.$value.''] == 'Yes' || $_POST['radio_'.$value.''] == 'yes'){
						
					foreach($_POST['field_id_radio_attu'] as $key1 => $value1){

						if($_POST['field_type_radio_attu'][$key1] != ''){
							$data_3['policy_features_id'] = $this->admin->xss_clean_inputData($id);
							$data_3['field_idu'] =  $this->admin->xss_clean_inputData($value1);
							$data_3['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type_radio_attu'][$key1]);
							$data_3['radio_att_flag'] =  $this->admin->xss_clean_inputData(1);
							$data_3['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_att_hiddenu'][$key1]);
							//$data_3['updateid1xxx'] = $_POST['updateid1xxx_radio_att'][$key1];
							//echo $_POST['field_type'][$key]."<br>";
							$this->update_attribute($data_3);
						}
					}
				//}

			}

			if($_POST['field_id'] != ''){

				foreach($_POST['field_id'] as $key => $value){
					
					//if($_POST['field_type'][$key] != ''){
						$data_1['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_1['field_id'] =  $this->admin->xss_clean_inputData($value);
						$data_1['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type'][$key]);
						$data_1['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_hidden'][$key]);
						$data_1['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->insert_attribute($data_1);
					//}
				}

			}

			if($_POST['field_id_radio'] != ''){
				foreach($_POST['field_id_radio'] as $key => $value){
					// echo $value;
					// echo $_POST['radio_'.$value.'']."<br>";
					if($_POST['radio_'.$value.''] != ''){
						$data_2['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_2['field_id'] =  $this->admin->xss_clean_inputData($value);
						$data_2['field_type'] =  $this->admin->xss_clean_inputData($_POST['radio_'.$value.'']);
						$data_2['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_hidden'][$key]);
						$data_2['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->insert_attribute($data_2);
					}

					
				}

				//if($_POST['radio_'.$value.''] == 'Yes' || $_POST['radio_'.$value.'']== 'yes'){
						
					foreach($_POST['field_id_radio_att'] as $key1 => $value1){

						if($_POST['field_type_radio_att'][$key1] != ''){
							$data_3['policy_features_id'] = $this->admin->xss_clean_inputData($id);
							$data_3['field_id'] =  $this->admin->xss_clean_inputData($value1);
							$data_3['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type_radio_att'][$key1]);
							$data_3['radio_att_flag'] =  1;
							$data_3['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_att_hidden'][$key1]);
							//echo $_POST['field_type'][$key]."<br>";
							$this->insert_attribute($data_3);
						}
					}
				//}
			}



			return true;
		} else {
			return false;
		}
	}



	function copy_policy_fet($content) 
	{
		$data['insurer'] = $content['insurer'];
		$data['corporate_id'] = $content['corporate_id'];
		$data['product_name'] = $content['product_name'];
		$data['policy_no'] = $content['policy_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['inclusions'] = $content['inclusions'];
		$data['exclusions'] = $content['exclusions'];
		$data['product_type'] = $content['product_type'];

		// ini_set('display_errors', 1);
		// ini_set('display_startup_errors', 1);
		// error_reporting(E_ALL);
		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$this->_data = $data;
		// $this->db->where('id', $id);
		if ($this->db->insert('policy_features', $this->_data))	{

			// $this->delete_old_policy_feature($id);

			$id = $this->db->insert_id();

			//echo "<pre>";print_r($_POST);echo"</pre>";exit;

			if($_POST['field_idu'] != ''){



				foreach($_POST['field_idu'] as $key => $value){

					 // echo "<pre>";print_r($value);echo"</pre>";exit;

					$data_1['policy_features_id'] = $this->admin->xss_clean_inputData($id);
					$data_1['field_idu'] =  $this->admin->xss_clean_inputData($value);

					// echo "<pre>";print_r($data_1['field_idu']);echo"</pre>";exit;
					$data_1['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_typeu'][$key]);
					$data_1['updateid1xxx'] = $this->admin->xss_clean_inputData($_POST['updateid1xxx'][$key]);
					$data_1['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_hiddenu'][$key]);
					$data_1['radio_att_flag'] =  0;
					//echo $_POST['field_type'][$key]."<br>";
					$this->copy_insert_attribute($data_1);

				}

			}

			if($_POST['field_id_radiou'] != ''){

				foreach($_POST['field_id_radiou'] as $key => $value){



					if($_POST['radio_'.$value.''] != ''){
						$data_1['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_1['field_idu'] =  $this->admin->xss_clean_inputData($value);
						$data_1['field_type'] =  $this->admin->xss_clean_inputData($_POST['radio_'.$value.'']);
						$data_1['updateid1xxx'] = $this->admin->xss_clean_inputData($_POST['updateid1xxx_radio'][$key]);
						$data_1['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_hiddenu'][$key]);
						$data_1['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->copy_insert_attribute($data_1);
						// echo $_POST['radio_'.$value.''];
						// echo "<pre>";print_r($data_1);echo"</pre>";exit;
					}
					

				}

				//if($_POST['radio_'.$value.''] == 'Yes' || $_POST['radio_'.$value.''] == 'yes'){
						
					foreach($_POST['field_id_radio_attu'] as $key1 => $value1){

						if($_POST['field_type_radio_attu'][$key1] != ''){
							$data_3['policy_features_id'] = $this->admin->xss_clean_inputData($id);
							$data_3['field_idu'] =  $this->admin->xss_clean_inputData($value1);
							$data_3['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type_radio_attu'][$key1]);
							$data_3['radio_att_flag'] =  $this->admin->xss_clean_inputData(1);
							$data_3['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_att_hiddenu'][$key1]);
							//$data_3['updateid1xxx'] = $_POST['updateid1xxx_radio_att'][$key1];
							//echo $_POST['field_type'][$key]."<br>";
							$this->copy_insert_attribute($data_3);
						}
					}
				//}

			}

			if($_POST['field_id'] != ''){

				foreach($_POST['field_id'] as $key => $value){
					
					//if($_POST['field_type'][$key] != ''){
						$data_1['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_1['field_id'] =  $this->admin->xss_clean_inputData($value);
						$data_1['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type'][$key]);
						$data_1['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_hidden'][$key]);
						$data_1['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->insert_attribute($data_1);
					//}
				}

			}

			if($_POST['field_id_radio'] != ''){
				foreach($_POST['field_id_radio'] as $key => $value){
					// echo $value;
					// echo $_POST['radio_'.$value.'']."<br>";
					if($_POST['radio_'.$value.''] != ''){
						$data_2['policy_features_id'] = $this->admin->xss_clean_inputData($id);
						$data_2['field_id'] =  $this->admin->xss_clean_inputData($value);
						$data_2['field_type'] =  $this->admin->xss_clean_inputData($_POST['radio_'.$value.'']);
						$data_2['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_hidden'][$key]);
						$data_2['radio_att_flag'] =  0;
						//echo $_POST['field_type'][$key]."<br>";
						$this->insert_attribute($data_2);
					}

					
				}

				//if($_POST['radio_'.$value.''] == 'Yes' || $_POST['radio_'.$value.'']== 'yes'){
						
					foreach($_POST['field_id_radio_att'] as $key1 => $value1){

						if($_POST['field_type_radio_att'][$key1] != ''){
							$data_3['policy_features_id'] = $this->admin->xss_clean_inputData($id);
							$data_3['field_id'] =  $this->admin->xss_clean_inputData($value1);
							$data_3['field_type'] =  $this->admin->xss_clean_inputData($_POST['field_type_radio_att'][$key1]);
							$data_3['radio_att_flag'] =  1;
							$data_3['status'] =  $this->admin->xss_clean_inputData($_POST['checkbox_radio_att_hidden'][$key1]);
							//echo $_POST['field_type'][$key]."<br>";
							$this->insert_attribute($data_3);
						}
					}
				//}
			}



			return true;
		} else {
			return false;
		}
	}

	function update_attribute($content) {

        $data1['policy_features_id'] = $content['policy_features_id'];

        $data1['field_id'] = $content['field_idu'];

        $data1['field_type'] = $content['field_type'];

		$data1['status'] = $content['status'];

		$data1['radio_att_flag'] = $content['radio_att_flag'];
		

        // $this->db->where('id =', $content['updateid1xxx']);

        // if ($this->db->update('policy_features_attribute', $data1)) {
        //     return true;
        // } else {
        //     return false;
        // }

		$this->_data = $data1;
        if ($this->db->insert('policy_features_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }


    function copy_insert_attribute($content) {

        $data1['policy_features_id'] = $content['policy_features_id'];

        $data1['field_id'] = $content['field_idu'];

        $data1['field_type'] = $content['field_type'];

		$data1['status'] = $content['status'];

		$data1['radio_att_flag'] = $content['radio_att_flag'];
		

        // $this->db->where('id =', $content['updateid1xxx']);

        // if ($this->db->update('policy_features_attribute', $data1)) {
        //     return true;
        // } else {
        //     return false;
        // }

		$this->_data = $data1;
        if ($this->db->insert('policy_features_attribute', $this->_data)) {
            return true;
        } else {
            return false;
        }
    }

	function delete_old_policy_feature($id){

		$this->db->where('policy_features_id = ',$id);

		if ($this->db->delete('policy_features_attribute'))	{

			return true;

		} else {

			return false;

		}
	}

		

		function featured_product($pid,$value)
	{
		$query = "update policy_features set set_home = '".$value."' where id = '".$pid."'";
		$result = $this->db->query($query);
		return true;
	}


    function lists($num, $offset, $content)
	{
		if($offset == '')
		{
			$offset = '0';
		}

		if($this->session->userdata('role_id') == 1){
			$sql = "SELECT * FROM policy_features where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM policy_features where corporate_id IN (".$corp_id.") ";
		}
		
		
		if($content['product_name'] != '') 
		{
			$sql .=	" AND  (name like '%".$content['product_name']."%' ) "; 
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}

		$query = $this->db->query($sql);
		//$sql_count = "SELECT * FROM  policy_features  WHERE id <> 0";
		
		if($this->session->userdata('role_id') == 1){
			$sql_count = "SELECT * FROM policy_features where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql_count = "SELECT * FROM policy_features where corporate_id IN (".$corp_id.") ";
		}

		if($content['product_name'] !='')
		{
			$sql_count .= " AND `name` like '".$content['product_name']."%'";
		}

		$query1 = $this->db->query($sql_count);

		$ret['result'] = $query->result();

		$ret['count']  = $query1->num_rows();

	    return $ret;

	}

	function get_admin_data($id){
		
		$sql = "SELECT * FROM admin_user where id = '".$id."'  ";
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0)
		{
			$result = $query->row()->corp_id;
			return $result;
		}else{
			return false;
		}
	}

 

	

	function deletes($id) 

	{

 		$this->db->where('id = ',$id);

		if ($this->db->delete('policy_features'))	{

			return true;

		} else {

			return false;

		}

	}

	



	function get_policy_features($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('policy_features');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}


	function get_corporate_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->co_name;
            return $result;
        } else {
            return false;
        }
    }


    function get_sum_insured_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('sum_insured');
        if ($query->num_rows() > 0) {
            $result = $query->row()->sum_insured;
            return $result;
        } else {
            return false;
        }
    }


    function get_product_name($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('policy');
        if ($query->num_rows() > 0) {
            $result = $query->row()->product_name;
            return $result;
        } else {
            return false;
        }
    }

    function get_policy_no($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('policy');
        if ($query->num_rows() > 0) {
            $result = $query->row()->policy_no;
            return $result;
        } else {
            return false;
        }
    }

	function allcorporate(){
		$sql = "select * from corporate where active_deactive = 0";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}


	function allsum_insured(){
		$sql = "select * from sum_insured";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function allproduct_name(){
		$sql = "select * from policy";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function allpolicy_using_id($id){
		$sql = "select * from sum_insured where policy_no = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}


	 function show_policy_number($pro_id)
    {   
    
        $this->db->where('id',$pro_id);

        $query = $this->db->get('policy');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }

     function get_policy_suminsurance($pro_id)
    {   
    
        $this->db->where('policy_no',$pro_id);

        $query = $this->db->get('sum_insured');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }


	

	

	function updateorder($id,$val){

		$content['set_order'] = $val;

		$this->db->where('id',$id);

		return $this->db->update('policy_features', $content);	

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


	function policy_featured_data_copy($policy_id,$sum_insured)
	{
		$sql = "SELECT * FROM policy_features WHERE policy_no = '".$policy_id."' and sum_insured = '".$sum_insured."'";

		//echo "<pre>";print_r($sql);echo "</pre>";exit;
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;
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

		

	}
	function updatestatus($id,$is_active){	
		$sql= " update user set active_deactive= '".$is_active."' where id='".$id."' ";		
		if ($query = $this->db->query($sql))	{			
			return true;		
		} else {			
			return false;			
		}	
	}

	function show_policy_using_corporate($pro_id)
    {   
    
        $this->db->where('corporate_id',$pro_id);
		
		$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

        $query = $this->db->get('policy');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }

	function allpolicy_using_corporate($id){
		$sql = "select * from policy where corporate_id = '".$id."' and policy_end_date >= '".date('Y-m-d')."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function allproduct_type(){
		$sql = "select * from product_type";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}


	function get_product_type_id($name){
		$sql = "select * from product_type where name = '".$name."'";
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
	
	function allproduct_type_new($id){
		$sql = "select * from product_type where id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function get_form_field($id){

		$sql = "SELECT * FROM `form_field` WHERE find_in_set( '".$id."', product_type_id )";
		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function form_field_attribute($id){
		
		$sql = "select * from form_field_attribute where form_field_id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function radio_attribute($id){
		
		$sql = "select * from form_field_attribute_radio where form_field_id = '".$id."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}

	function get_answer_data($policy_features_id,$field_id){
		
		$sql = "select * from policy_features_attribute where policy_features_id = '".$policy_features_id."' and field_id = '".$field_id."' and radio_att_flag = 0";
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

	function get_answer_data_radio_att($policy_features_id,$field_id){
		
		$sql = "select * from policy_features_attribute where policy_features_id = '".$policy_features_id."' and field_id = '".$field_id."' and radio_att_flag = 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			$result = $query->result();
            return $result;
		}
		else
		{
			return false;
		}
	}
	

	function get_product_type($pro_id)
    {   
    
        $this->db->where('id',$pro_id);
		
		//$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

        $query = $this->db->get('policy');
       
        if($query->num_rows() > 0)
        {
            $result = $query->result();
            return $result;
        }
        else
        {
            return false;
        }
    }
	
	function get_type_id($name)
    {   
    
        $this->db->where('name',$name);
		
		//$this->db->where("policy_end_date >= '".date('Y-m-d')."'");

        $query = $this->db->get('product_type');
       
        if($query->num_rows() > 0)
        {
            $result = $query->row()->id;
            return $result;
        }
        else
        {
            return false;
        }
    }

	

}

?>