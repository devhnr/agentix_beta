<?php
	class Agent extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('agent_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'email' => '',				
				'agent_id' => '',				
				'password' => '',				
			);
		if($this->input->post('action') == 'add_agent') 
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

			if($_FILES['image']['name'] != ''){

                $fileName = time().".".$_FILES["image"]["name"]; 
                $fileName = str_replace(' ', '_', $fileName);
                $fileTmpLoc = $_FILES["image"]["tmp_name"];
                $pathAndName = $this->config->item('upload')."product_home/".$fileName; 
                $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                $tmp_path = $this->config->item('upload')."product_home/".$fileName;
                $image_thumb= $this->config->item('upload')."product_home/large/".$fileName; 
                $height=580;
                $width=800;
                $this->load->library('image_lib');
                // CONFIGURE IMAGE LIBRARY
                $config['image_library']    = 'gd2';
                $config['source_image']     = $tmp_path;
                $config['new_image']        = $image_thumb;
                $config['maintain_ratio']   = false;
                $config['height']           = $height;
                $config['width']            = $width;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();

                $tmp_path = $this->config->item('upload')."product_home/".$fileName;
                $image_thumb= $this->config->item('upload')."product_home/medium/".$fileName; 
                $height=260;
                $width=360;
                $this->load->library('image_lib');
                // CONFIGURE IMAGE LIBRARY
                $config['image_library']    = 'gd2';
                $config['source_image']     = $tmp_path;
                $config['new_image']        = $image_thumb;
                $config['maintain_ratio']   = false;
                $config['height']           = $height;
                $config['width']            = $width;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();
                $data['image'] = $fileName;
            }else
            {
                $data['image'] ="";
            } 
						
						$this->agent_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Agent Added Successfully!');
						redirect($this->config->item('base_url').'agent/lists');
						
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
				
		}		
		$this->load->view('add_agent',$data);
	}
	
    function edit($id)
	{	 
	
			if(is_numeric($id))
			{
				$result = $this->agent_model->get_category($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,					
						'name' =>  $result->name,
						'email' =>  $result->email,
						'agent_id' =>  $result->agent_id,
						'password' =>  $result->password,
						);
			
				
					
				if($this->input->post('action') == 'edit_agent') 
				{
				
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					
					$this->load->library('validation');
					$rules['name'] = "trim|required";
					
  					$this->validation->set_rules($rules);
					$fields['name']   = "category name";
					
				 
					$this->validation->set_fields($fields);
				/*	if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['category_id'] = $id;
					} 
					else 
					{ */	
						if($_FILES['image']['name'] != ''){
                            $fileName = time().".".$_FILES["image"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["image"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."product_home/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."product_home/".$fileName;
                            $image_thumb= $this->config->item('upload')."product_home/large/".$fileName; 
                            $height=580;
                            $width=800;
                            $this->load->library('image_lib');
                            // CONFIGURE IMAGE LIBRARY
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();

                            $tmp_path = $this->config->item('upload')."product_home/".$fileName;
                            $image_thumb= $this->config->item('upload')."product_home/medium/".$fileName; 
                            $height=260;
                			$width=360;
                            $this->load->library('image_lib');
                            // CONFIGURE IMAGE LIBRARY
                            $config['image_library']    = 'gd2';
                            $config['source_image']     = $tmp_path;
                            $config['new_image']        = $image_thumb;
                            $config['maintain_ratio']   = false;
                            $config['height']           = $height;
                            $config['width']            = $width;
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            $form_field['image'] = $fileName;
                        }else
                        {
                            $form_field['image'] ="";
                        } 
					
							$this->agent_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Agent Updated Successfully!');
							redirect($this->config->item('base_url').'agent/lists');
					
					/* } */
				}
				
				$this->load->view('edit_agent',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Agent !');
				redirect($this->config->item('base_url').'agent/lists');
			}
	}
	
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		
		$config['base_url'] = $url_to_paging.'agent/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->agent_model->lists($config['per_page'],$this->uri->segment(3), $data);
		
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_agent', $data);
	}
	
	
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
	
			foreach($_POST['selected'] as $selCheck) {
				
				if($this->agent_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Agent Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
						
				}
				 
				
			}
		}
		
		redirect($this->config->item('base_url').'agent/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->agent_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
	redirect($this->config->item('base_url').'user/lists');
	}
	function updateorder($id,$val){
		
		$this->agent_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'agent/lists');
	}
 
}
?>