<?php
	class About extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('adminId') == ''){

			redirect($this->config->item('base_url'));

        }
		$this->load->model('about_model');
	}

	function add()
	{
		//$L_strErrorMessage='';
		$form_field = $data = array(  

				'name' => '',

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

			 $this->about_model->add($data);
     		$this->session->set_flashdata('L_strErrorMessage','Category Added Successfully');
			redirect($this->config->item('base_url').'category/lists');

			if ($this->validation->run() == FALSE){

					$data['L_strErrorMessage'] = $this->validation->error_string;

					} 
		}
		$this->load->view('add_category',$data);
	}

    function edit($id)
	{	 
			
			if(is_numeric($id))
			{
				$result = $this->about_model->get_system($id);  

				// print_r($result);die();
					$form_field = $data = array(

						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'name'  => $result->name,
						'image' =>  $result->image,
						'sub_title' =>  $result->sub_title,
						'description' =>  $result->description,
						);
					// echo $_POST;exit;
					// echo "<pre>";print_r($about_banner);echo "</pre>";
				if($this->input->post('action') == 'edit_about') 
				{
					//echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					$this->load->library('validation');
					$rules['image'] = "trim|required";

  					$this->validation->set_rules($rules);
					$fields['image']   = "category name";
					$this->validation->set_fields($fields);
			//IMAGE_1 BANNER 

			if($_FILES['image']['name'] != ''){

						$fileName = time().".".$_FILES["image"]["name"]; 
						$fileName = str_replace(' ', '_', $fileName);
						$fileTmpLoc = $_FILES["image"]["tmp_name"];
						$pathAndName = $this->config->item('upload')."about_image/".$fileName; 
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
						$tmp_path = $this->config->item('upload')."about_image/".$fileName;
						$image_thumb= $this->config->item('upload')."about_image/large/".$fileName; 

						$height=580;
						$width=500;

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

							$this->about_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','About Updated Successfully');
							redirect($this->config->item('base_url').'about/edit/1');
				}

				$this->load->view('edit_about',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such About !');
				redirect($this->config->item('base_url').'about/edit/1');
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
		$return = $this->about_model->lists($config['per_page'],$this->uri->segment(3), $data);

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

				if($this->about_model->deletes($selCheck)) {

					$this->session->set_flashdata('L_strErrorMessage','Category Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!');
				}
			}
		}
		redirect($this->config->item('base_url').'category/lists');
	}



	// function userstatus($id,$value)	{	

	// $result=$this->systems_model->updatestatus($id,$value);
	// $this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
	// redirect($this->config->item('base_url').'user/lists');
	// }

}
?>