<?php
	class Systems extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('syatems_model');
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
			
						 $this->syatems_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Category Added Successfully!!!!');
						redirect($this->config->item('base_url').'category/lists');
						
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
				
		}
	
		
		$this->load->view('add_category',$data);
	}
	
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->syatems_model->get_category($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'sub_banner_1' =>  $result->sub_banner_1,
						'sub_banner_2' =>  $result->sub_banner_2,
						'sub_banner_3' =>  $result->sub_banner_3,
						'sub_banner_4' =>  $result->sub_banner_4,
						'sub_banner_5' =>  $result->sub_banner_5,
						'career_banner' =>  $result->career_banner,
						'contact_banner' =>  $result->contact_banner,
						'news_event_banner' =>  $result->news_event_banner,
						'regulatory_banner' =>  $result->regulatory_banner,
						'home_image' =>  $result->home_image,
						'home_title' =>  $result->home_title,
						'home_subtitle' =>  $result->home_subtitle,
						'home_url' =>  $result->home_url,
						'home_image1' =>  $result->home_image1,
						'home_title1' =>  $result->home_title1,
						'home_subtitle1' =>  $result->home_subtitle1,
						'home_url1' =>  $result->home_url1,

						);
			
				
					
				if($this->input->post('action') == 'edit_systems') 
				{
					//echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					
					$this->load->library('validation');
					$rules['sub_banner_1'] = "trim|required";
					
  					$this->validation->set_rules($rules);
					$fields['sub_banner_1']   = "category name";
					
					if($_FILES['sub_banner_1']['name'] != ''){
								$fileName = time().".".$_FILES["sub_banner_1"]["name"]; 
								$fileName = str_replace(' ', '_', $fileName);
								$fileTmpLoc = $_FILES["sub_banner_1"]["tmp_name"];
								$pathAndName = $this->config->item('upload')."systems/".$fileName; 
								$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
								$form_field['sub_banner_1'] = $fileName;
								}




								
								if($_FILES['sub_banner_2']['name'] != '')
								{
								$fileName1 = time().".".$_FILES["sub_banner_2"]["name"]; 
								$fileName1 = str_replace(' ', '_', $fileName1);
								$fileTmpLoc1 = $_FILES["sub_banner_2"]["tmp_name"];
								$pathAndName1 = $this->config->item('upload')."systems/".$fileName1; 
								$moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
								$form_field['sub_banner_2'] = $fileName1;
								}


								if($_FILES['sub_banner_3']['name'] != '')
								{
								$fileName1 = time().".".$_FILES["sub_banner_3"]["name"]; 
								$fileName1 = str_replace(' ', '_', $fileName1);
								$fileTmpLoc1 = $_FILES["sub_banner_3"]["tmp_name"];
								$pathAndName1 = $this->config->item('upload')."systems/".$fileName1; 
								$moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
								$form_field['sub_banner_3'] = $fileName1;
								}


								if($_FILES['sub_banner_4']['name'] != '')
								{
								$fileName1 = time().".".$_FILES["sub_banner_4"]["name"]; 
								$fileName1 = str_replace(' ', '_', $fileName1);
								$fileTmpLoc1 = $_FILES["sub_banner_4"]["tmp_name"];
								$pathAndName1 = $this->config->item('upload')."systems/".$fileName1; 
								$moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
								$form_field['sub_banner_4'] = $fileName1;
								}

								if($_FILES['sub_banner_5']['name'] != '')
								{
								$fileName1 = time().".".$_FILES["sub_banner_5"]["name"]; 
								$fileName1 = str_replace(' ', '_', $fileName1);
								$fileTmpLoc1 = $_FILES["sub_banner_5"]["tmp_name"];
								$pathAndName1 = $this->config->item('upload')."systems/".$fileName1; 
								$moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
								$form_field['sub_banner_5'] = $fileName1;
								}

								if($_FILES['home_image']['name'] != '')
								{
								$fileName1 = time().".".$_FILES["home_image"]["name"]; 
								$fileName1 = str_replace(' ', '_', $fileName1);
								$fileTmpLoc1 = $_FILES["home_image"]["tmp_name"];
								$pathAndName1 = $this->config->item('upload')."systems/".$fileName1; 
								$moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);

								 $tmp_path = $this->config->item('upload')."systems/".$fileName;

				                $image_thumb= $this->config->item('upload')."systems/large/".$fileName;

				                $height=344;
				                $width=648;

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

				                $tmp_path = $this->config->item('upload')."systems/".$fileName;
				                $image_thumb= $this->config->item('upload')."systems/medium/".$fileName;

				                 $height=290;                
								 $width=546;
				               
				                $this->load->library('image_lib');

				                $config['image_library']    = 'gd2';
				                $config['source_image']     = $tmp_path;
				                $config['new_image']        = $image_thumb;
				                $config['maintain_ratio']   = false;
				                $config['height']           = $height;
				                $config['width']            = $width;

				                $this->image_lib->initialize($config);
				                $this->image_lib->resize();
				                $this->image_lib->clear();

								$form_field['home_image'] = $fileName1;
								}

								if($_FILES['home_image1']['name'] != '')
								{
								$fileName1 = time().".".$_FILES["home_image1"]["name"]; 
								$fileName1 = str_replace(' ', '_', $fileName1);
								$fileTmpLoc1 = $_FILES["home_image1"]["tmp_name"];
								$pathAndName1 = $this->config->item('upload')."systems/".$fileName1; 
								$moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);

								 $tmp_path = $this->config->item('upload')."systems/".$fileName;

				                $image_thumb= $this->config->item('upload')."systems/large/".$fileName;

				                $height=344;
				                $width=648;

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

				                $tmp_path = $this->config->item('upload')."systems/".$fileName;
				                $image_thumb= $this->config->item('upload')."systems/medium/".$fileName;

				                 $height=290;                
								 $width=546;
				               
				                $this->load->library('image_lib');

				                $config['image_library']    = 'gd2';
				                $config['source_image']     = $tmp_path;
				                $config['new_image']        = $image_thumb;
				                $config['maintain_ratio']   = false;
				                $config['height']           = $height;
				                $config['width']            = $width;

				                $this->image_lib->initialize($config);
				                $this->image_lib->resize();
				                $this->image_lib->clear();

								$form_field['home_image1'] = $fileName1;
								}

								// Career Banner
							if($_FILES['career_banner']['name'] != ''){
                            $fileName = time().".".$_FILES["career_banner"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["career_banner"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."systems/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."systems/".$fileName;
                            $image_thumb= $this->config->item('upload')."systems/medium/".$fileName; 
                            $height=344;
                            $width=648;
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
                            $form_field['career_banner'] = $fileName;
                        }

                        if($_FILES['contact_banner']['name'] != ''){
                            $fileName = time().".".$_FILES["contact_banner"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["contact_banner"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."systems/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."systems/".$fileName;
                            $image_thumb= $this->config->item('upload')."systems/large/".$fileName; 
                            $height=468;
                            $width=1024;
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
                            $form_field['contact_banner'] = $fileName;
                        }

                        if($_FILES['news_event_banner']['name'] != ''){
                            $fileName = time().".".$_FILES["news_event_banner"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["news_event_banner"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."systems/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."systems/".$fileName;
                            $image_thumb= $this->config->item('upload')."systems/large/".$fileName; 
                            $height=966;
                            $width=2500;
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
                            $form_field['news_event_banner'] = $fileName;
                        }

                         if($_FILES['regulatory_banner']['name'] != ''){
                            $fileName = time().".".$_FILES["regulatory_banner"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["regulatory_banner"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."systems/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."systems/".$fileName;
                            $image_thumb= $this->config->item('upload')."systems/large/".$fileName; 
                            $height=364;
                            $width=569;
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
                            $form_field['regulatory_banner'] = $fileName;
                        }


								
				 
					$this->validation->set_fields($fields);
					
						
						//echo $id; die;
						
					
					//print_r($form_field);die;
					
							$this->syatems_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','System Updated Successfully!!!!');
							redirect($this->config->item('base_url').'systems/edit/1');
					
					
				}
				
				$this->load->view('edit_systems',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Categoryy !!!!');
				redirect($this->config->item('base_url').'systems/edit/1');
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
		$return = $this->syatems_model->lists($config['per_page'],$this->uri->segment(3), $data);
		
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
				
				if($this->syatems_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Category Deleted Successfully!!!!');
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
	$result=$this->syatems_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
	redirect($this->config->item('base_url').'user/lists');
	}
 
}
?>