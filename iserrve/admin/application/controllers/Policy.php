<?php
date_default_timezone_set("Asia/Calcutta");
	class Policy extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('policy_model');
		$this->load->model('admin');
	}
	function add()
	{
		$form_field = $data = array(
				// 'name' => '',
				// 'page_url' => '',
			'insurer' => '',
			'corporate_id' => '',
			'policy_type' => '',
			'product_type' => '',
			'product_name' => '',
			'policy_no' => '',
			'policy_holder_name' => '',
			'policy_start_date' => '',
			'policy_end_date' => '',
			'tpa' => '',
			'tpa_person_name' => '',
			'tpa_person_mobile' => '',
			'tpa_person_email' => '',

			);
		if($this->input->post('action') == 'add_policy')
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


						if($data['product_type'] == 'GPA' || $data['product_type'] == 'GTL'){
							$data['tpa'] = '';
							$data['tpa_person_name'] = '';
							$data['tpa_person_mobile'] = '';
							$data['tpa_person_email'] = '';
						}
						
						$policy_id = $this->policy_model->add($data);



						$log_data = array(
							'username' => $this->session->userdata('username'),
							'login_user_id' => $this->session->userdata('adminId'),
							'module_name' => 'Create Policy',
							'corporate_name' => $data['corporate_id'],
							'policy_number' => $policy_id,
							'created_at' => date('Y-m-d h:i:sa')
						);

						$this->admin->log_data_manage($log_data);


						if($policy_id != ''){
							$product_type_id = $this->policy_model->get_product_type_id($data['product_type']);
							// echo $product_type_id;exit;
							$newdata = array('policy_id_session' => $policy_id,'product_type_session' => $product_type_id,'product_type_name_session' => $data['product_type']);

							$this->session->set_userdata($newdata);
						}

						$this->session->set_flashdata('L_strErrorMessage','Policy Added Successfully');
						redirect($this->config->item('base_url').'policy/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					}
		}
		$data['allcorporate']= $this->policy_model->allcorporate();
		$data['allproduct_type'] = $this->policy_model->allproduct_type_new();
		//  echo "<pre>";print_r($data['allcorporate']);echo "</pre>";exit;
		$this->load->view('add_policy',$data);
	}
    function edit($id)
	{

			if(is_numeric($id))
			{
				$result = $this->policy_model->get_policy($id);
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'insurer' => $result->insurer,
						'corporate_id' => $result->corporate_id,
						'policy_type' => $result->policy_type,
						'product_type' => $result->product_type,
						'product_name' => $result->product_name,
						'policy_no' => $result->policy_no,
						'policy_holder_name' => $result->policy_holder_name,
						'policy_start_date' => $result->policy_start_date,
						'policy_end_date' => $result->policy_end_date,
						'tpa' => $result->tpa,
						'tpa_person_name' => $result->tpa_person_name,
						'tpa_person_mobile' => $result->tpa_person_mobile,
						'tpa_person_email' => $result->tpa_person_email,
						);

				if($this->input->post('action') == 'edit_policy')
				{

					//echo $id; die;
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['policy_holder_name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['policy_holder_name']   = "policy holder name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE)
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					}
					else
					{
							$this->policy_model->edit($id, $form_field);

							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Edit Policy',
								'corporate_name' => $data['corporate_id'],
								'policy_number' => $id,
								'created_at' => date('Y-m-d h:i:sa')
							);

							$this->admin->log_data_manage($log_data);
							$this->session->set_flashdata('L_strErrorMessage','Policy Updated Successfully');
							redirect($this->config->item('base_url').'policy/lists');
					}
				}

				$data['allcorporate']= $this->policy_model->allcorporate();
				$data['allproduct_type'] = $this->policy_model->allproduct_type_new();
				// $data['allinsurer']= $this->policy_model->allinsurer();
				// $data['allpolicy_type']= $this->policy_model->allpolicy_type();
				// $data['allproduct_type']= $this->policy_model->allproduct_type();
				// $data['alltpa']= $this->policy_model->alltpa();
				$this->load->view('edit_policy',$data);
			}
			else
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Policy !!!!');
				redirect($this->config->item('base_url').'policy/lists');
			}
	}
	//first function calling after pressing coupan tab...
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'policy/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->policy_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_policy', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				$corporate_id = $this->policy_model->get_policy($selCheck);


				//echo "<pre>";print_r($corporate_id);echo "</pre>";exit;
				if($this->policy_model->deletes($selCheck)) {


					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Corporate',
						'corporate_name' => $corporate_id->corporate_id,
						'policy_number' => $selCheck,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);

					$this->session->set_flashdata('L_strErrorMessage','Policy Deleted Successfully');
				}
				else
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'policy/lists');
	}
	function userstatus($id,$value)	{
	$result=$this->policy_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->policy_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'policy/lists');
	}
	function updateorder($id,$val){
		$this->policy_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'policy/lists');
	}
}
?>
