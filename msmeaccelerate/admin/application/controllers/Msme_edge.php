<?php
	class Msme_edge extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('msme_edge_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'image' => '',				
				'url' => '',				
			);
		if($this->input->post('action') == 'add_msme_edge') 
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
                $pathAndName = $this->config->item('upload')."msme_edge_image/".$fileName; 
                $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                $tmp_path = $this->config->item('upload')."msme_edge_image/".$fileName;
                $image_thumb= $this->config->item('upload')."msme_edge_image/medium/".$fileName; 
                $height=150;
                $width=150;
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
						
						$this->msme_edge_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','MSME Accelerate Edge Added Successfully!');
						redirect($this->config->item('base_url').'msme_edge/lists');
						
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
				
		}		
		$this->load->view('add_msme_edge',$data);
	}
	
    function edit($id)
	{	 
	
			if(is_numeric($id))
			{
				$result = $this->msme_edge_model->get_category($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,					
						'name' =>  $result->name,
						'image' =>  $result->image,
						'url' =>  $result->url,
						);
			
				
					
				if($this->input->post('action') == 'edit_msme_edge') 
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
                            $pathAndName = $this->config->item('upload')."msme_edge_image/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."msme_edge_image/".$fileName;
                            $image_thumb= $this->config->item('upload')."msme_edge_image/medium/".$fileName; 
                            $height=150;
                            $width=150;
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
					
							$this->msme_edge_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','MSME Accelerate Edge Updated Successfully!');
							redirect($this->config->item('base_url').'msme_edge/lists');
					
					/* } */
				}
				
				$this->load->view('edit_msme_edge',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such MSME Accelerate Edge !');
				redirect($this->config->item('base_url').'msme_edge/lists');
			}
	}
	
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		
		$config['base_url'] = $url_to_paging.'msme_edge/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->msme_edge_model->lists($config['per_page'],$this->uri->segment(3), $data);
		
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_msme_edge', $data);
	}
	
	
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
	
			foreach($_POST['selected'] as $selCheck) {
				
				if($this->msme_edge_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','MSME Accelerate Edge Deleted Successfully!name');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
						
				}
				 
				
			}
		}
		
		redirect($this->config->item('base_url').'msme_edge/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->msme_edge_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
	redirect($this->config->item('base_url').'user/lists');
	}
	function updateorder($id,$val){
		
		$this->msme_edge_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'msme_edge/lists');
	}
 
}
?>