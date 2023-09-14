<?php
	class Coverage extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('coverage_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'description' => '',
			);
		if($this->input->post('action') == 'add_coverage') 
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
						
						 $this->coverage_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Coverage Added Successfully');
						redirect($this->config->item('base_url').'coverage/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		// $data['all_group'] = $this->coverage_model->all_group();
		$this->load->view('add_coverage',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->coverage_model->get_coverage($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'name' =>  $result->name,
						'description' =>  $result->description,
						);
				if($this->input->post('action') == 'edit_coverage') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					$this->load->library('validation');
					$rules['name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['name']   = "coverage name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['category_id'] = $id;
					} 
					else 
					{
					
							$this->coverage_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Coverage Updated Successfully');
							redirect($this->config->item('base_url').'coverage/lists');
					}
				}
				// $data['all_group'] = $this->coverage_model->all_group();
				$this->load->view('edit_coverage',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Coverage !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'coverage/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->coverage_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_coverage', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				if($this->coverage_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Coverage Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'coverage/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->coverage_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->coverage_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'coverage/lists');
	}	
	function updateorder($id,$val){
		$this->coverage_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'coverage/lists');
	}
}
?>