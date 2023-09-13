<?php
	class Title extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('title_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'compare_id' => '',
			);
		if($this->input->post('action') == 'add_title') 
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
						
						 $this->title_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Title Added Successfully');
						redirect($this->config->item('base_url').'title/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		
		$data['all_compare_name'] = $this->title_model->alldata("compare_name");
		$this->load->view('add_title',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->title_model->get_title($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'name' =>  $result->name,
						'compare_id' =>  $result->compare_id,
						// 'meta_keyword' =>  $result->meta_keyword,
						// 'meta_desc' =>  $result->meta_desc,
						// 'page_url' =>  $result->page_url,
						//'group_id' =>  $result->group_id,
						// 'home_image' =>  $result->home_image,
						// 'image' =>  $result->image,
						);
				if($this->input->post('action') == 'edit_title') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					$this->load->library('validation');
					$rules['name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['name']   = "position name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['category_id'] = $id;
					} 
					else 
					{
					// 	if($_FILES['image']['name'] != ''){
					// 	$fileName = time().".".$_FILES["image"]["name"]; 
					// 	$fileName = str_replace(' ', '_', $fileName);
					// 	$fileTmpLoc = $_FILES["image"]["tmp_name"];
					// 	$pathAndName = $this->config->item('upload')."category_banner/".$fileName; 
					// 	$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
					// 	$tmp_path = $this->config->item('upload')."category_banner/".$fileName;
					// 	$image_thumb= $this->config->item('upload')."category_banner/large/".$fileName; 
					// 	$height=450;
					// 	$width=1350;
					// 	$this->load->library('image_lib');
					// 	// CONFIGURE IMAGE LIBRARY
					// 	$config['image_library']    = 'gd2';
					// 	$config['source_image']     = $tmp_path;
					// 	$config['new_image']        = $image_thumb;
					// 	$config['maintain_ratio']   = false;
					// 	$config['height']           = $height;
					// 	$config['width']            = $width;
					// 	$this->image_lib->initialize($config);
					// 	$this->image_lib->resize();
					// 	$this->image_lib->clear();
					// 	$form_field['image'] = $fileName;
					// 	}
					// if($_FILES['home_image']['name'] != ''){
					// 	$fileName = time().".".$_FILES["home_image"]["name"]; 
					// 	$fileName = str_replace(' ', '_', $fileName);
					// 	$fileTmpLoc = $_FILES["home_image"]["tmp_name"];
					// 	$pathAndName = $this->config->item('upload')."category_home/".$fileName; 
					// 	$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
					// 	$tmp_path = $this->config->item('upload')."category_home/".$fileName;
					// 	$image_thumb= $this->config->item('upload')."category_home/large/".$fileName; 
					// 	$height=705;
					// 	$width=475;
					// 	$this->load->library('image_lib');
					// 	// CONFIGURE IMAGE LIBRARY
					// 	$config['image_library']    = 'gd2';
					// 	$config['source_image']     = $tmp_path;
					// 	$config['new_image']        = $image_thumb;
					// 	$config['maintain_ratio']   = false;
					// 	$config['height']           = $height;
					// 	$config['width']            = $width;
					// 	$this->image_lib->initialize($config);
					// 	$this->image_lib->resize();
					// 	$this->image_lib->clear();
					// 	$form_field['home_image'] = $fileName;
					// 	}
							$this->title_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Title Updated Successfully');
							redirect($this->config->item('base_url').'title/lists');
					}
				}
				
				$data['all_compare_name'] = $this->title_model->alldata("compare_name");
				$this->load->view('edit_title',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Title !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'title/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->title_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		// echo "<pre>";print_r($data);exit;
		$this->pagination->initialize($config);
		$this->load->view('list_title', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				if($this->title_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Title Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'title/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->title_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->title_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'title/lists');
	}	
	function updateorder($id,$val){
		$this->title_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'title/lists');
	}
}
?>