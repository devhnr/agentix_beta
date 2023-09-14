<?php
    class Form_field extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('form_field_model'); 
		$this->load->model('admin'); 
	}

    function add()
    {
		$L_strErrorMessage='';
		$form_field = $data = array(
			'product_type_id' => '',
			'label_name' => '',
			'type' => '',
			//'page_url' => '',
        );
        
		if($this->input->post('action') == 'add_form_field') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);	
            }
            $this->load->library('validation');

			$this->form_field_model->add($data);
			
			$log_data = array(
				'username' => $this->session->userdata('username'),
				'login_user_id' => $this->session->userdata('adminId'),
				'module_name' => 'Create Form Field',
				'corporate_name' => '',
				'policy_number' => '',
				'created_at' => date('Y-m-d h:i:sa')
			);

			$this->admin->log_data_manage($log_data);



			$this->session->set_flashdata('L_strErrorMessage','Form Field Added Successfully!!!!');
			redirect($this->config->item('base_url').'form_field/lists');
			
			if ($this->validation->run() == FALSE)
			{
			$data['L_strErrorMessage'] = $this->validation->error_string;
			} 
    }

	$data['product_type'] = $this->form_field_model->get_product_type();
	//echo "<pre>";print_r($data['product_type']);echo"</pre>";exit;
    $this->load->view('add_form_field',$data);
}

    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->form_field_model->get_state($id);  
			
				$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result[0]->id,
						'product_type_id' =>  $result[0]->product_type_id,
						'label_name' =>  $result[0]->label_name,
						'type' =>  $result[0]->type,
						//'page_url' =>  $result[0]->page_url,
						);  

				if($this->input->post('action') == 'edit_form_field') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]=$this->input->post($key);	
					}
												
								$ccid=$id;
								$this->form_field_model->edit($id, $form_field);
								
								$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit Form Field',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
			
								$this->session->set_flashdata('L_strErrorMessage','Form Field Updated Successfully!!!!');
								redirect($this->config->item('base_url').'form_field/lists');
					}

				$data['product_type'] = $this->form_field_model->get_product_type();
				$data['addition_item'] = $this->form_field_model->addition_item($id);
				$data['addition_item_radio'] = $this->form_field_model->addition_item_radio($id);
				//echo "<pre>";print_r($data['addition_item_radio']);echo"</pre>";exit;
				$this->load->view('edit_form_field',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such product type !!!!');
				redirect($this->config->item('base_url').'form_field/lists');
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
		$data['coupanname'] = $this->input->post('coupanname');
		$data['startdate'] = $this->input->post('startdate');
		$data['enddate'] = $this->input->post('enddate');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->form_field_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
       
	$this->load->view('list_form_field', $data);
	}

	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {
                if($this->form_field_model->deletes($selCheck)) 
                {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Form Field',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
					$this->session->set_flashdata('L_strErrorMessage','Form Field Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'form_field/lists');
	}

	function updateorder($id,$val){
		$this->form_field_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'form_field/lists');
	}

	function removeprice($form_field_id, $id) {
        if ($this->form_field_model->removeattriute($form_field_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Form Field Attribite Deleted Succcessfully!!!!');
            redirect($this->config->item('base_url') . 'form_field/edit/' . $form_field_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
            exit;
        }
    }

	function removeprice_new($form_field_id, $id) {
        if ($this->form_field_model->removeattriute_radio($form_field_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Form Field Attribite Deleted Succcessfully!!!!');
            redirect($this->config->item('base_url') . 'form_field/edit/' . $form_field_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
            exit;
        }
    }
	
}

?>