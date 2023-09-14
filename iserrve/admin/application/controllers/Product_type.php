<?php
    class Product_type extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('product_type_model'); 
		$this->load->model('admin');
	}

    function add()
    {
		$L_strErrorMessage='';
		$form_field = $data = array(
			'name' => '',
			//'page_url' => '',
        );
        
		if($this->input->post('action') == 'add_product_type') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
            }
            $this->load->library('validation');

			$this->product_type_model->add($data);
			
			$log_data = array(
				'username' => $this->session->userdata('username'),
				'login_user_id' => $this->session->userdata('adminId'),
				'module_name' => 'Create Product Type',
				'corporate_name' => '',
				'policy_number' => '',
				'created_at' => date('Y-m-d h:i:sa')
			);

			$this->admin->log_data_manage($log_data);
			
			$this->session->set_flashdata('L_strErrorMessage','product type Added Successfully!!!!');
			redirect($this->config->item('base_url').'product_type/lists');
			
                if ($this->validation->run() == FALSE)
                {
				$data['L_strErrorMessage'] = $this->validation->error_string;
			    } 
    }
	
    $this->load->view('add_product_type',$data);
}

    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->product_type_model->get_state($id);  
			
				$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result[0]->id,
						'name' =>  $result[0]->name,
						//'page_url' =>  $result[0]->page_url,
						);  

				if($this->input->post('action') == 'edit_product_type') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	
					}
												
								$ccid=$id;
								$this->product_type_model->edit($id, $form_field);
								
								$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit Product Type',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
			
								$this->session->set_flashdata('L_strErrorMessage','product type Updated Successfully!!!!');
								redirect($this->config->item('base_url').'product_type/lists');
					}

				$this->load->view('edit_product_type',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such product type !!!!');
				redirect($this->config->item('base_url').'product_type/lists');
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
		$return = $this->product_type_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
       
	$this->load->view('list_product_type', $data);
	}

	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {
            	$selCheck = $this->admin->xss_clean_inputData($selCheck);
            	
                if($this->product_type_model->deletes($selCheck)) 
                {
								$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Product Type',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
					$this->session->set_flashdata('L_strErrorMessage','product type Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'product_type/lists');
	}

	function updateorder($id,$val){
		$this->product_type_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'product_type/lists');
	}
	
}

?>