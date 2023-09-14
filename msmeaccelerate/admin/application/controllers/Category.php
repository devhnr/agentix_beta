<?php
	class Category extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('category_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'mail_description' => '',
				// 'page_url' => '',
				// 'meta_title' => '',
				// 'meta_keyword' => '',
				// 'meta_desc' => '',
				// 'home_image' => '',
				// 'image' => '',
				//'group_id' => '',
			);
		if($this->input->post('action') == 'add_category') 
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
						 $this->category_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Industry Added Successfully');
						redirect($this->config->item('base_url').'category/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		$data['all_group'] = $this->category_model->all_group();
		$this->load->view('add_category',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->category_model->get_category($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'name' =>  $result->name,
						'meta_title' =>  $result->meta_title,
						'meta_keyword' =>  $result->meta_keyword,
						'meta_desc' =>  $result->meta_desc,
						'mail_description' =>  $result->mail_description,
						// 'page_url' =>  $result->page_url,
						//'group_id' =>  $result->group_id,
						// 'home_image' =>  $result->home_image,
						// 'image' =>  $result->image,
						);
				if($this->input->post('action') == 'edit_category') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					$this->load->library('validation');
					$rules['name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['name']   = "category name";
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
							$this->category_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Industry Updated Successfully');
							redirect($this->config->item('base_url').'category/lists');
					}
				}
				
				$data['addition_item'] = $this->category_model->addition_item($id);
				
				$data['all_group'] = $this->category_model->all_group();
				$this->load->view('edit_category',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Industry !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'category/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->category_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_category', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				if($this->category_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Industry Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'category/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->category_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->category_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'category/lists');
	}	
	function updateorder($id,$val){
		$this->category_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'category/lists');
	}
	
	function removeprice($product_id, $id) {
        if ($this->category_model->removeattriute($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Industry Attribite Deleted Succcessfully!!!!');
            redirect($this->config->item('base_url') . 'category/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
            exit;
        }
    }
}	
?>