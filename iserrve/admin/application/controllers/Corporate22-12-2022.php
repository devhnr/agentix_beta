<?php
	class Corporate extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('corporate_model');
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
			);


		if($this->input->post('action') == 'add_corporate') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);		
			}
			$this->load->library('validation');
			$rules['name'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['name'] = "Name";
			$this->validation->set_fields($fields);
						
						 $this->corporate_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Corporate Added Successfully');
						redirect($this->config->item('base_url').'corporate/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
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
						);


				if($this->input->post('action') == 'edit_corporate') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
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
							$this->session->set_flashdata('L_strErrorMessage','Corporate Updated Successfully');
							redirect($this->config->item('base_url').'corporate/lists');
					}
				}
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
		$data['corporatename'] = $this->input->post('corporatename');
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



	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				if($this->corporate_model->deletes($selCheck)) {
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
	function userstatus($id,$value)	{	
	$result=$this->corporate_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
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

	
}
?>