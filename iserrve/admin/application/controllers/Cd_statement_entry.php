<?php


    class Cd_statement_entry extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('cd_statement_entry_model'); 
        $this->load->model('admin');

        date_default_timezone_set('Asia/Kolkata');
	}


    function add()
    {
        $L_strErrorMessage=''; 
        $form_field = $data = array(

      		'corporate_id' => '',
            'cd_number' => '',
            'date' => '',
            'particular' => '',
            'cd_account_name' => '',
      		
        );


		if($this->input->post('action') == 'add_cd_statement_entry') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
            }


            $this->load->library('validation');
			$rules['cd_account_name'] = "required";
			$this->validation->set_rules($rules);
			$fields['cd_account_name'] = "cd_statement_entry";
            $this->validation->set_fields($fields);
            // if($_FILES['image']['name'] != ''){
                
            //     //echo "<pre>";print_r($_FILES);echo"</pre>";
            //     $fileName = time().".".$_FILES["image"]["name"]; 
            //     $fileName = str_replace(' ', '_', $fileName);
            //     $fileTmpLoc = $_FILES["image"]["tmp_name"];
            //     $pathAndName = $this->config->item('upload')."blogs/".$fileName; 
            //     $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
            //     $tmp_path = $this->config->item('upload')."blogs/".$fileName;
            //     $image_thumb= $this->config->item('upload')."blogs/medium/".$fileName; 
            //     $height=310;
            //     $width=415;
            //     $this->load->library('image_lib');
            //     // echo $this->config->item('upload')."<br>";
            //     // echo $tmp_path."sd";
            //     // echo $pathAndName;exit;

               
            //     // CONFIGURE IMAGE LIBRARY
            //     $config['image_library']    = 'gd2';
            //     $config['source_image']     = $tmp_path;
            //     $config['new_image']        = $image_thumb;
            //     $config['maintain_ratio']   = true;
            //     $config['height']           = $height;
            //     $config['width']            = $width;
            //     $this->image_lib->initialize($config);
            //     $this->image_lib->resize();
            //     $this->image_lib->clear();
            //     $data['image'] = $fileName;
            // }else
            // {
            //     $data['image'] ="";
            // } 

			// echo "<pre>";print_r($data);echo "</pre>";exit;

			$this->cd_statement_entry_model->add($data);
			
			$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Create CD Statement Entry',
									'corporate_name' => $data['corporate_id'],
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
								
			$this->session->set_flashdata('L_strErrorMessage','CD statement Entry Added Successfully');
			redirect($this->config->item('base_url').'cd_statement_entry/lists');
                if ($this->validation->run() == FALSE)
                {
					$data['L_strErrorMessage'] = $this->validation->error_string;
			    } 
    }

	$data['allcorporate']= $this->cd_statement_entry_model->allcorporate();
    $this->load->view('add_cd_statement_entry',$data);
}

    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->cd_statement_entry_model->is_exist($id); 
                //print_r($result);exit(); 
				$form_field = $data = array(

						'L_strErrorMessage' => '',
						'id'	=> $result->id,
                        'corporate_id' =>  $result->corporate_id,
                        'cd_number' =>  $result->cd_number,
                        'date' => $result->date,
                        'particular' =>  $result->particular,
                        'cd_account_name' =>  $result->cd_account_name,
						
						);  

				if($this->input->post('action') == 'edit_cd_statement_entry') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
                    }
					// $this->load->library('validation');
					// $rules['title'] = "trim|required";
					// $this->validation->set_rules($rules);
					// $fields['title'] = "discount";
					// $this->validation->set_fields($fields);
					// if ($this->validation->run() == FALSE) 
					// {
					// 		$data = $form_field;
					// 		$data['L_strErrorMessage'] = $this->validation->error_string;
					// 		$data['id'] = $id;
					// } 
					// else 
					// {
                        // if($_FILES['image']['name'] != ''){

                            
                        //     $fileName = time().".".$_FILES["image"]["name"]; 
                        //     $fileName = str_replace(' ', '_', $fileName);
                        //     $fileTmpLoc = $_FILES["image"]["tmp_name"];
                        //     $pathAndName = $this->config->item('upload')."blogs/".$fileName; 
                        //     $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                        //     $tmp_path = $this->config->item('upload')."blogs/".$fileName;
                        //     $image_thumb= $this->config->item('upload')."blogs/medium/".$fileName; 
                        //     $height=310;
                        //     $width=415;
                        //     $this->load->library('image_lib');

                            
                        //     // CONFIGURE IMAGE LIBRARY
                        //     $config['image_library']    = 'gd2';
                        //     $config['source_image']     = $tmp_path;
                        //     $config['new_image']        = $image_thumb;
                        //     $config['maintain_ratio']   = false;
                        //     $config['height']           = $height;
                        //     $config['width']            = $width;
                        //     $this->image_lib->initialize($config);
                        //     $this->image_lib->resize();
                        //     $this->image_lib->clear();
                        //     $form_field['image'] = $fileName;
                        // }else
                        // {
                        //     $form_field['image'] ="";
                        // } 
						
                            // echo "<pre>";print_r($form_field);echo "</pre>";exit;
						$this->cd_statement_entry_model->edit($id, $form_field);
						
						$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit CD Statement Entry',
									'corporate_name' => $form_field['corporate_id'],
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
						$this->session->set_flashdata('L_strErrorMessage','CD Statement Entry Updated Successfully');
						redirect($this->config->item('base_url').'cd_statement_entry/lists');
					}
                    $data['allcorporate']= $this->cd_statement_entry_model->allcorporate();
				$this->load->view('edit_cd_statement_entry',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such CD Statement Entry!');
				redirect($this->config->item('base_url').'cd_statement_entry/lists');
			}
	}

	function updateorder_popular($id, $value) {
        $return = $this->cd_statement_entry_model->updateorder_popular($id, $value);
        $this->session->set_flashdata('L_strErrorMessage', 'Popular updated successfully');
        redirect($this->config->item('base_url') . 'cd_statement_entry/lists');
    }

	function updateorder_status($id, $value) {
        $return = $this->cd_statement_entry_model->updateorder_status($id, $value);
        $this->session->set_flashdata('L_strErrorMessage', 'Display Home updated successfully');
        redirect($this->config->item('base_url') . 'cd_statement_entry/lists');
    }


	function lists()
	{
		
		
		$data['result'] = $this->cd_statement_entry_model->lists();
		
		//echo "<pre>";print_r($data);echo"</pre>";exit;
	    $this->load->view('list_cd_statement_entry', $data);
	}


	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {
				$all_data = $this->cd_statement_entry_model->get_all_data($selCheck);

				$selCheck = $this->admin->xss_clean_inputData($selCheck);
				
				$log_data = array(
					'username' => $this->session->userdata('username'),
					'login_user_id' => $this->session->userdata('adminId'),
					'module_name' => 'Delete CD Statement Entry',
					'corporate_name' => $all_data->corporate_id,
					'policy_number' => '',
					'created_at' => date('Y-m-d h:i:sa')
				);

				$this->admin->log_data_manage($log_data);
								
								
                if($this->cd_statement_entry_model->deletes($selCheck)) 
                {
					$this->session->set_flashdata('L_strErrorMessage','CD Statement Entry Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'cd_statement_entry/lists');
	}
}
?>