<?php
	class Blog_category extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('blog_category_model');
		$this->load->model('admin');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'page_url' => '',
			);
		if($this->input->post('action') == 'add_blog_category') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]= $this->admin->xss_clean_inputData($this->input->post($key));		
			}
			$this->load->library('validation');
			$rules['name'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['name'] = "Name";
			$this->validation->set_fields($fields);
						// if($_FILES['image']['name'] != ''){
						// $fileName = time().".".$_FILES["image"]["name"]; 
						// $fileName = str_replace(' ', '_', $fileName);
						// $fileTmpLoc = $_FILES["image"]["tmp_name"];
						// $pathAndName = $this->config->item('upload')."category_banner/".$fileName; 
						// $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						// $tmp_path = $this->config->item('upload')."category_banner/".$fileName;
						// $image_thumb= $this->config->item('upload')."category_banner/large/".$fileName; 
						// $height=450;
						// $width=1350;
						// $this->load->library('image_lib');
						// // CONFIGURE IMAGE LIBRARY
						// $config['image_library']    = 'gd2';
						// $config['source_image']     = $tmp_path;
						// $config['new_image']        = $image_thumb;
						// $config['maintain_ratio']   = false;
						// $config['height']           = $height;
						// $config['width']            = $width;
						// $this->image_lib->initialize($config);
						// $this->image_lib->resize();
						// $this->image_lib->clear();
						// $data['image'] = $fileName;
						// }else
						// {
						// 	$data['image'] ="";
						// } 
						// if($_FILES['home_image']['name'] != ''){
						// $fileName = time().".".$_FILES["home_image"]["name"]; 
						// $fileName = str_replace(' ', '_', $fileName);
						// $fileTmpLoc = $_FILES["home_image"]["tmp_name"];
						// $pathAndName = $this->config->item('upload')."category_home/".$fileName; 
						// $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						// $tmp_path = $this->config->item('upload')."category_home/".$fileName;
						// $image_thumb= $this->config->item('upload')."category_home/large/".$fileName;

						// $height=705;
						// $width=475;
						// $this->load->library('image_lib');
						// // CONFIGURE IMAGE LIBRARY
						// $config['image_library']    = 'gd2';
						// $config['source_image']     = $tmp_path;
						// $config['new_image']        = $image_thumb;
						// $config['maintain_ratio']   = false;
						// $config['height']           = $height;
						// $config['width']            = $width;
						// $this->image_lib->initialize($config);
						// $this->image_lib->resize();
						// $this->image_lib->clear();
						// $data['home_image'] = $fileName;
						// }else
						// {
						// 	$data['home_image'] ="";
						// } 
						 $this->blog_category_model->add($data);
						 
						 $log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Create Blog Category',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
						$this->session->set_flashdata('L_strErrorMessage','Blog Category Added Successfully');
						redirect($this->config->item('base_url').'blog_category/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		//$data['all_group'] = $this->blog_category_model->all_group();
		$this->load->view('add_blog_category',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->blog_category_model->get_blog_category($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'name' =>  $result->name,
						'page_url' =>  $result->page_url,
						// 'meta_title' =>  $result->meta_title,
						// 'meta_keyword' =>  $result->meta_keyword,
						// 'meta_desc' =>  $result->meta_desc,
						//'group_id' =>  $result->group_id,
						// 'home_image' =>  $result->home_image,
						// 'image' =>  $result->image,
						);
				if($this->input->post('action') == 'edit_blog_category') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['name']   = "category name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['blog_category_id'] = $id;
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
							$this->blog_category_model->edit($id, $form_field);
							
							$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit Blog Category',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
							$this->session->set_flashdata('L_strErrorMessage','Blog Category Updated Successfully');
							redirect($this->config->item('base_url').'blog_category/lists');
					}
				}
				//$data['all_group'] = $this->blog_category_model->all_group();
				$this->load->view('edit_blog_category',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Blog Category !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'blog_category/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->admin->xss_clean_inputData($this->input->post('categoryname'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->blog_category_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_blog_category', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				
				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				if($this->blog_category_model->deletes($selCheck)) {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Blog Category',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','Blog Category Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'blog_category/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->blog_category_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->blog_category_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'blog_category/lists');
	}	
	function updateorder($id,$val){
		$this->blog_category_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'blog_category/lists');
	}
}
?>