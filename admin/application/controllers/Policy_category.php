<?php
	class Policy_category extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('policy_category_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'page_url' => '',
				// 'meta_title' => '',
				// 'meta_keyword' => '',
				// 'meta_desc' => '',
				// 'home_image' => '',
				'icon' => '',
				//'group_id' => '',
			);
		if($this->input->post('action') == 'add_policy_category') 
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
						if($_FILES['icon']['name'] != ''){
						$fileName = time().".".$_FILES["icon"]["name"]; 
						$fileName = str_replace(' ', '_', $fileName);
						$fileTmpLoc = $_FILES["icon"]["tmp_name"];
						$pathAndName = $this->config->item('upload')."policy_category/".$fileName; 
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						$tmp_path = $this->config->item('upload')."policy_category/".$fileName;
						$image_thumb= $this->config->item('upload')."policy_category/large/".$fileName; 
						$height=56;
						$width=56;
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
						$data['icon'] = $fileName;
						}else
						{
							$data['icon'] ="";
						} 
						
						 $this->policy_category_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Category Added Successfully');
						redirect($this->config->item('base_url').'policy_category/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		
		$this->load->view('add_policy_category',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->policy_category_model->get_policy_category($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'name' =>  $result->name,
						'meta_title' =>  $result->meta_title,
						'meta_keyword' =>  $result->meta_keyword,
						'meta_desc' =>  $result->meta_desc,
						'page_url' =>  $result->page_url,
						//'group_id' =>  $result->group_id,
						// 'home_image' =>  $result->home_image,
						'icon' =>  $result->icon,
						);
				if($this->input->post('action') == 'edit_policy_category') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					
						if($_FILES['icon']['name'] != ''){
						$fileName = time().".".$_FILES["icon"]["name"]; 
						$fileName = str_replace(' ', '_', $fileName);
						$fileTmpLoc = $_FILES["icon"]["tmp_name"];
						$pathAndName = $this->config->item('upload')."policy_category/".$fileName; 
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						$tmp_path = $this->config->item('upload')."policy_category/".$fileName;
						$image_thumb= $this->config->item('upload')."policy_category/large/".$fileName; 
						$height=56;
						$width=56;
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
						$form_field['icon'] = $fileName;
						}
						
					
							$this->policy_category_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Category Updated Successfully');
							redirect($this->config->item('base_url').'policy_category/lists');
					
				}
				
				$this->load->view('edit_policy_category',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Categoryy !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'policy_category/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->policy_category_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_policy_category', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				if($this->policy_category_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Category Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'policy_category/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->policy_category_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->policy_category_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'policy_category/lists');
	}	
	function updateorder($id,$val){
		$this->policy_category_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'policy_category/lists');
	}
}
?>