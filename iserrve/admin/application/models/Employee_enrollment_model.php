<?php
	class Employee_enrollment_model extends CI_Model {
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
		$L_strErrorMessage='';

		$data['insurer'] = $content['insurer'];
		$data['corporate_id'] = $content['corporate_id'];
		$data['product_name'] = $content['product_name'];
		$data['policy_no'] = $content['policy_no'];
		$data['sum_insured'] = $content['sum_insured'];
		$data['policy_start_date'] = $content['policy_start_date'];
		$data['policy_end_date'] = $content['policy_end_date'];
		$data['date'] = date("Y-m-d");



		// $data['sum_insured_start_date'] = date("Y-m-d",strtotime($content['sum_insured_start_date']));
		// $data['sum_insured_end_date'] =  date("Y-m-d",strtotime($content['sum_insured_end_date']));
		// $data['tpa'] = $content['tpa'];
		// $data['page_url'] = $content['page_url'];
		$this->_data = $data;
		if ($this->db->insert('employee_enrollment', $this->_data))
		{
			$id = $this->db->insert_id();

			return $id;
		}
		else
		{
			return false;
		}
	}


	function add_xls($content,$id)

	{


		// echo "test";exit;
		$L_strErrorMessage='';

		$data['e_id'] = $id;

		$data['employee_id'] = $this->admin->xss_clean_inputData($content['Employee_id']);
		$data['name_of_the_employee'] = $this->admin->xss_clean_inputData($content['name_of_the_employee']);
		$data['gender'] = $this->admin->xss_clean_inputData($content['gender']);
		$data['relationship'] = $this->admin->xss_clean_inputData($content['relationship']);
		$data['d_o_b'] = $this->admin->xss_clean_inputData($content['d_o_b']);
		$data['age'] = $this->admin->xss_clean_inputData($content['age']);
		$data['mobile_no'] = $this->admin->xss_clean_inputData($content['mobile_no']);
		$data['email'] = $this->admin->xss_clean_inputData($content['email']);
		$data['sum_insured'] = $this->admin->xss_clean_inputData($content['sum_insured']);
		$data['date_of_joining'] = $this->admin->xss_clean_inputData($content['date_of_joining']);
		$data['member_id'] = $this->admin->xss_clean_inputData($content['member_id']);
		/* $data['beneficiary_name'] = $content['beneficiary_name'];
		$data['relation'] = $content['relation'];
		$data['gender_'] = $content['gender_'];
		$data['date_of_birth'] = date("Y-m-d",strtotime($content['date_of_birth'])); */
		$data['endorsement_no'] = $this->admin->xss_clean_inputData($content['endorsement_no']);
		$data['endorsement_date'] = $this->admin->xss_clean_inputData($content['endorsement_date']);
		$data['type_of_addition'] = $this->admin->xss_clean_inputData($content['type_of_addition']);
		$data['date_of_leaving'] = $this->admin->xss_clean_inputData($content['date_of_leaving']);

		$data['created_at'] = date("Y-m-d h:i:sa");

		$data['status'] = $this->admin->xss_clean_inputData($content['status']);
		$data['entry'] = $this->admin->xss_clean_inputData($content['entry']);

		// echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->_data = $data;
		if ($this->db->insert('employee_enrollment_attributes', $this->_data))
		{
			$id = $this->db->insert_id();

			return $id;
		}
		else
		{
			return false;
		}
	}


	public function updateVariation($attribute_id,$employee_id, $content)
    {
        $data = array();
        $data['e_id'] = $employee_id;

		$data['employee_id'] = $this->admin->xss_clean_inputData($content['Employee_id']);
		$data['name_of_the_employee'] = $this->admin->xss_clean_inputData($content['name_of_the_employee']);
		$data['gender'] = $this->admin->xss_clean_inputData($content['gender']);
		$data['relationship'] = $this->admin->xss_clean_inputData($content['relationship']);
		$data['d_o_b'] = $this->admin->xss_clean_inputData($content['d_o_b']);
		$data['age'] = $this->admin->xss_clean_inputData($content['age']);
		$data['mobile_no'] = $this->admin->xss_clean_inputData($content['mobile_no']);
		$data['email'] = $this->admin->xss_clean_inputData($content['email']);
		$data['sum_insured'] = $this->admin->xss_clean_inputData($content['sum_insured']);
		$data['date_of_joining'] = $this->admin->xss_clean_inputData($content['date_of_joining']);
		$data['member_id'] = $this->admin->xss_clean_inputData($content['member_id']);
		/* $data['beneficiary_name'] = $content['beneficiary_name'];
		$data['relation'] = $content['relation'];
		$data['gender_'] = $content['gender_'];
		$data['date_of_birth'] = date("Y-m-d",strtotime($content['date_of_birth'])); */
		$data['endorsement_no'] = $this->admin->xss_clean_inputData($content['endorsement_no']);
		$data['status'] = $this->admin->xss_clean_inputData($content['status']);
		$data['endorsement_date'] = $this->admin->xss_clean_inputData($content['endorsement_date']);
		$data['type_of_addition'] = $this->admin->xss_clean_inputData($content['type_of_addition']);
		$data['date_of_leaving'] = $this->admin->xss_clean_inputData($content['date_of_leaving']);


        $this->db->where('id', $attribute_id);
        if ($this->db->update('employee_enrollment_attributes', $data)) {
            return true;
        }
        return false;
    }

	function check_user_delete_status($id){

		$this->db->where('id = ', $id);
		//$this->db->where('status = ', 0);
		$query = $this->db->get('employee_enrollment_attributes');
        if ($query->num_rows() > 0) {
            $result = $query->row()->status;
            return $result;
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
		$data['inclusions'] = $content['inclusions'];
		$data['exclusions'] = $content['exclusions'];


		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('employee_enrollment', $this->_data))	{
			return true;
		} else {
			return false;
		}
	}



		function featured_product($pid,$value)
	{
		$query = "update employee_enrollment set set_home = '".$value."' where id = '".$pid."'";
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
			$sql = "SELECT * FROM employee_enrollment where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql = "SELECT * FROM employee_enrollment where corporate_id IN (".$corp_id.") ";
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

		if($this->session->userdata('role_id') == 1){
			$sql_count = "SELECT * FROM employee_enrollment where id <> 0 ";
		}else{
			$corp_id = $this->get_admin_data($this->session->userdata('adminId'));
			//echo $corp_id;exit;
			$sql_count = "SELECT * FROM employee_enrollment where corporate_id IN (".$corp_id.") ";
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

	function list1($id){
		$this->db->where('e_id = ', $id);
		$this->db->where('status = ', 0);
		$query = $this->db->get('employee_enrollment_attributes');
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
	}







	function deletes($id)

	{

 		$this->db->where('id = ',$id);

		if ($this->db->delete('employee_enrollment'))	{

			return true;

		} else {

			return false;

		}

	}

	public function check_attribute($product_id,$employee_id,$relationship){
        $this->db->where('e_id', $product_id);
        $this->db->where('employee_id', $employee_id);
		$this->db->where('relationship', $relationship);
        //$this->db->where('colour', $product_color);
        $query = $this->db->get('employee_enrollment_attributes');
        if ($query->num_rows() > 0) {
            $id = $query->row()->id;
            return $id;
        }
        return 0;
    }

	function deletes_attributes($id)
	{

 		$this->db->where('e_id = ',$id);

		if ($this->db->delete('employee_enrollment_attributes'))	{

			return true;

		} else {

			return false;

		}

	}

	function get_employee_enrollment($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('employee_enrollment');
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

    function get_group_code($id) {

        $this->db->where('id = ', $id);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->group_code;
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

		return $this->db->update('employee_enrollment', $content);

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

		public function getPolicyData($policy_id){
	      try{
	          $this->db->select('policy.insurer,policy.product_name,policy.policy_no,policy.tpa,policy.policy_start_date,policy.policy_end_date,corporate.co_name');
	          $this->db->from('policy');
	          $this->db->join('corporate', 'corporate.id = policy.corporate_id','LEFT');
	          $this->db->where('policy.id',$policy_id);

	          $query=$this->db->get();
	              if($this->db->affected_rows() > 0){
	                  $data = $query->row_array();   //please check
	                  return $data;
	              }else{
	                  return false;
	              }
	      }catch(Exception $ex){
	          error_log($ex->getTraceAsString());
	          echo $ex->getTraceAsString();
	          return FALSE;
	      }
	  }


	  public function getcorporatexls($category_name){
        //$this->db->where('menu_id', $group_id);
        $this->db->where('co_name', $category_name);
        $query = $this->db->get('corporate');
        if ($query->num_rows() > 0) {
            $result = $query->row()->id;
            return $result;
        } else {
            return 0;
        }
    }

	public function getpolicyxls($category_name){
        //$this->db->where('menu_id', $group_id);
        $this->db->where('policy_no', $category_name);
        $query = $this->db->get('policy');
        if ($query->num_rows() > 0) {
            $result = $query->row()->id;
            return $result;
        } else {
            return 0;
        }
    }

	public function getsuminsuredxls($category_name){
        //$this->db->where('menu_id', $group_id);
        $this->db->where('sum_insured', $category_name);
        $query = $this->db->get('sum_insured');
        if ($query->num_rows() > 0) {
            $result = $query->row()->id;
            return $result;
        } else {
            return 0;
        }
    }


	public function chech_employee_status($corporate_id,$policy_id,$suminsured_id){
        $this->db->where('corporate_id', $corporate_id);
        $this->db->where('policy_no', $policy_id);
        $this->db->where('sum_insured', $suminsured_id);
				$query = $this->db->get('employee_enrollment');
        if ($query->num_rows() > 0) {
            $id = $query->row()->id;
            return $id;
        }
        return 0;
    }

	public function chech_employee_enrollment_attributes($get_employeenrolement_id,$employe_id){
        $this->db->where('e_id', $get_employeenrolement_id);
        $this->db->where('employee_id', $employe_id);
        //$this->db->where('sum_insured', $suminsured_id);
        $query = $this->db->get('employee_enrollment_attributes');
        if ($query->num_rows() > 0) {
            $id = $query->row()->id;
            return $id;
        }
        return 0;
    }

	public function get_employement_data($id){
        $this->db->where('id', $id);
        $query = $this->db->get('employee_enrollment');
        if ($query->num_rows() > 0) {
            $id = $query->row();
            return $id;
        }else{
						return 0;
				}
    }



	public function add_api_data($data){
	    try{
	        $this->db->insert('employee_enrollment', $data);
	        if($this->db->affected_rows() > 0){
	            $id = $this->db->insert_id();
							return $id;
	        }else{
	            return false;
	        }
	    }catch(Exception $ex) {
	        error_log($ex->getTraceAsString());
	        echo $ex->getTraceAsString();
	        return FALSE;
	    }
	}

	public function check_employee_enrollment($e_id,$employee_id,$relation){
			try{
					$this->db->select('id');
					$this->db->from('employee_enrollment_attributes');
					$this->db->where('e_id',$e_id);
					$this->db->where('employee_id',$employee_id);
					$this->db->where('relationship',$relation);
					$query=$this->db->get();
					if ($query->num_rows() > 0)	{
							return $query->row()->id;
					}else{
							return false;
					}
			}catch(Exception $ex){
					error_log($ex->getTraceAsString());
					echo $ex->getTraceAsString();
					return FALSE;
			}
	}

	public function add_employee_enrollment_attribute($data){
	    try{
	        $this->db->insert('employee_enrollment_attributes', $data);
	        if($this->db->affected_rows() > 0){
	            $id = $this->db->insert_id();
							return $id;
	        }else{
	            return false;
	        }
	    }catch(Exception $ex) {
	        error_log($ex->getTraceAsString());
	        echo $ex->getTraceAsString();
	        return FALSE;
	    }
	}

	public function update_employee_enrollment_attribute($employee_id,$relation,$data){
      try{
          $this->db->where('employee_id', $employee_id);
					$this->db->where('relationship', $relation);
          if($this->db->update('employee_enrollment_attributes',$data)){
              return true;
          }else{
              return false;
          }
      }catch(Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

}

?>
