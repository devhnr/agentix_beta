<?php
	class Career extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('career_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'title' => '',
				'description' => '',				
			);
		if($this->input->post('action') == 'add_career') 
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
						
						$this->career_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Career Added Successfully!!!!');
						redirect($this->config->item('base_url').'career/lists');
						
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
				
		}		
		$this->load->view('add_career',$data);
	}
	
    function edit($id)
	{	 
	
			if(is_numeric($id))
			{
				$result = $this->career_model->get_category($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,					
						'title' =>  $result->title,
						'description' =>  $result->description,
						);
			
				
					
				if($this->input->post('action') == 'edit_career') 
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
					
							$this->career_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Career Updated Successfully!!!!');
							redirect($this->config->item('base_url').'career/lists');
					
					/* } */
				}
				
				$this->load->view('edit_career',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Career !!!!');
				redirect($this->config->item('base_url').'career/lists');
			}
	}
	
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		
		$config['base_url'] = $url_to_paging.'career/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->career_model->lists($config['per_page'],$this->uri->segment(3), $data);
		
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_career', $data);
	}
	
	
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
	
			foreach($_POST['selected'] as $selCheck) {
				
				if($this->career_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Career Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
						
				}
				 
				
			}
		}
		
		redirect($this->config->item('base_url').'career/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->career_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
	redirect($this->config->item('base_url').'user/lists');
	}
	function updateorder($id,$val){
		
		$this->career_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'career/lists');
	}
 
}
?>