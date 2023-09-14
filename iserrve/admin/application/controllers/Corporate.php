<?php
date_default_timezone_set("Asia/Calcutta");
	class Corporate extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('corporate_model');
		$this->load->model('admin');
	}
	function add()
	{
		
		$form_field = $data = array(  
				'co_name' => '',
				'pincode' => '',
				'city' => '',
				'state' => '',
				'co_address' => '',
				'hr_name' => '',
				'hr_mobile' => '',
				'hr_email' => '',
				'group_code' => '',
				'co_landline' => '',
				'industry_type' => '',
				'no_of_employee' => '',
				'remark' => '',
				'co_user_name' => '',
				'password' => '',
				'confirm_password' => '',
				'sales_person_name' => '',
				'sales_person_mobile' => '',
				'sales_person_email' => '',
				'operations_person_name' => '',
				'operations_person_mobile' => '',
				'operations_person_email' => '',
				
			);


		if($this->input->post('action') == 'add_corporate') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));		
			}
			$this->load->library('validation');
			$rules['name'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['name'] = "Name";
			$this->validation->set_fields($fields);
						
						$corp_id =  $this->corporate_model->add($data);
					
						$log_data = array(
							'username' => $this->session->userdata('username'),
							'login_user_id' => $this->session->userdata('adminId'),
							'module_name' => 'Create Corporate',
							'corporate_name' => $corp_id,
							'policy_number' => '',
							'created_at' => date('Y-m-d h:i:sa')
						);

						$this->admin->log_data_manage($log_data);
						
						if($corp_id != ''){
							
							$newdata = array('corp_id_session' => $corp_id);

							$this->session->set_userdata($newdata);
						}
						
						$this->session->set_flashdata('L_strErrorMessage','Corporate Added Successfully');
						redirect($this->config->item('base_url').'corporate/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		$data['allstate']= $this->corporate_model->allstate();
		$data['allcity']= $this->corporate_model->allcity();
		$this->load->view('add_corporate',$data);
	}



    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->corporate_model->get_corporate($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'co_name' => $result->co_name,
						'pincode' => $result->pincode,
						'city' => $result->city,
						'state' => $result->state,
						'co_address' => $result->co_address,
						'hr_name' => $result->hr_name,
						'hr_mobile' => $result->hr_mobile,
						'hr_email' => $result->hr_email,
						'group_code' =>$result->group_code,
						'co_landline' => $result->co_landline,
						'industry_type' => $result->industry_type,
						'no_of_employee' => $result->no_of_employee,
						'remark' => $result->remark,
						'co_user_name' =>$result->co_user_name,
						'password' => $result->password,
						'confirm_password' => $result->confirm_password,
						'sales_person_name' => $result->sales_person_name,
						'sales_person_mobile' => $result->sales_person_mobile,
						'sales_person_email' => $result->sales_person_email,
						'operations_person_name' => $result->operations_person_name,
						'operations_person_mobile' => $result->operations_person_mobile,
						'operations_person_email' => $result->operations_person_email,
						);


				if($this->input->post('action') == 'edit_corporate') 
				{
					// echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['co_name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['co_name']   = "corporate name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['corporate_id'] = $id;
					} 
					else 
					{
							$this->corporate_model->edit($id, $form_field);

							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Edit Corporate',
								'corporate_name' => $id,
								'policy_number' => '',
								'created_at' => date('Y-m-d h:i:sa')
							);
	
							$this->admin->log_data_manage($log_data);
							$this->session->set_flashdata('L_strErrorMessage','Corporate Updated Successfully');
							redirect($this->config->item('base_url').'corporate/lists');
					}
				}
				$data['allstate']= $this->corporate_model->allstate();
				$data['allcity']= $this->corporate_model->allcity();
				$data['allcity_edit']= $this->corporate_model->allcity_edit($data['state']);
				$this->load->view('edit_corporate',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such corporate !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'corporate/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['corporatename'] = $this->admin->xss_clean_inputData($this->input->post('corporatename'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->corporate_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_corporate', $data);
	}


	function check_corporate_group_code()
	{
		 //echo "test";exit;
		$group_code = $_POST['group_code'];
		$data = $this->corporate_model->check_corporate_group_code($group_code);
		if($data != ""){
			echo "0";
			die;
		}
		else{
			echo "1";
			die;
		}
	}


	function check_hr_email()
	{
		 //echo "test";exit;
		$hr_email = $_POST['hr_email'];
		$data = $this->corporate_model->check_hr_email($hr_email);
		if($data != ""){
			echo "0";
			die;
		}
		else{
			echo "1";
			die;
		}
	}


	function check_user_name()
	{
		  //echo "test";exit;
		$co_user_name = $_POST['co_user_name'];
		// echo $co_user_name;exit;
		$data = $this->corporate_model->check_user_name($co_user_name);
		if($data != ""){
			echo "0";
			die;
		}
		else{
			echo "1";
			die;
		}
	}



	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {

			
			foreach($_POST['selected'] as $selCheck) {
				//echo "<pre>";print_r($selCheck);exit;
				$selCheck = $this->admin->xss_clean_inputData($selCheck);
				
				if($this->corporate_model->deletes($selCheck)) {
					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Corporate',
						'corporate_name' => $selCheck,
						'policy_number' => '',
						'created_at' => date('Y-m-d h:i:sa')
					);
	
					$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','Corporate Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'corporate/lists');
	}
	function updatestatus($id,$value)	{	
	
	//echo $id."fdf".$value;exit;
	$result=$this->corporate_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'corporate/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->corporate_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'corporate/lists');
	}	
	function updateorder($id,$val){
		$this->corporate_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'corporate/lists');
	}

	
	function get_city(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->corporate_model->show_city($pro_id);
        // echo $data; exit;
        $html = '<select id="city" name="city" class="form-control multiple-select">';
        $html .= '<option value="">Select City</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->name ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

	
}
?>