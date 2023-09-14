<?php
    class User_escalation extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('user_escalation_model'); 
		$this->load->model('admin');
	}

    function add()
    {
		$L_strErrorMessage='';
		$form_field = $data = array(
			'name' => '',
			'phone' => '',
			'email' => '',
			'alternate_email' => '',
			'address' => '',
			'type' => '',
			
        );
        
		if($this->input->post('action') == 'add_user_escalation') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	
            }
            $this->load->library('validation');

			$this->user_escalation_model->add($data);
			
			$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Crete User Escalation',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
			$this->session->set_flashdata('L_strErrorMessage','User Escalation Added Successfully!!!!');
			redirect($this->config->item('base_url').'user_escalation/lists');
			
                if ($this->validation->run() == FALSE)
                {
				$data['L_strErrorMessage'] = $this->validation->error_string;
			    } 
    }
	
    $this->load->view('add_user_escalation',$data);
}

    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->user_escalation_model->get_state($id);  
			
				$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result[0]->id,
						'name' =>  $result[0]->name,
						'phone' =>  $result[0]->phone,
						'email' =>  $result[0]->email,
						'alternate_email' =>  $result[0]->alternate_email,
						'address' =>  $result[0]->address,
						'type' =>  $result[0]->type,
						);  

				if($this->input->post('action') == 'edit_user_escalation') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
					}
												
								$ccid=$id;
								$this->user_escalation_model->edit($id, $form_field);
								
								$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit User Escalation',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
								$this->session->set_flashdata('L_strErrorMessage','User Escalation Updated Successfully!!!!');
								redirect($this->config->item('base_url').'user_escalation/lists');
					}

				$this->load->view('edit_user_escalation',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such User Escalation !!!!');
				redirect($this->config->item('base_url').'user_escalation/lists');
			}
	}

	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'coupan/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['coupanname'] = $this->admin->xss_clean_inputData($this->input->post('coupanname'));
		$data['startdate'] = $this->admin->xss_clean_inputData($this->input->post('startdate'));
		$data['enddate'] = $this->admin->xss_clean_inputData($this->input->post('enddate'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->user_escalation_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
       
	$this->load->view('list_user_escalation', $data);
	}

	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {

            	$selCheck = $this->admin->xss_clean_inputData($selCheck);
                if($this->user_escalation_model->deletes($selCheck)) 
                {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete User Escalation',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
					$this->session->set_flashdata('L_strErrorMessage','User Escalation Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'user_escalation/lists');
	}

	function updateorder($id,$val){
		$this->user_escalation_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'user_escalation/lists');
	}
	
}

?>