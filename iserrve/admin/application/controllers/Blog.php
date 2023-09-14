<?php
    class Blog extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('blog_model'); 
		$this->load->model('admin');
	}


    function add()
    {
    		$L_strErrorMessage=''; 
        $form_field = $data = array(

      		'title' => '',
      		'blog_cate_id' => '',
            'description' => '',
            'date' => '',
            'image' => '',
    		'name' => '',
            'title2' => '',
            'detail_img' => '',
			'page_url' =>'',
            'alt' =>'',
            'short_desc' =>'',
            'metatitle' =>'',
            'metakeywords' =>'',
            'metadescription' =>'',
        );


		if($this->input->post('action') == 'add_blog') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
            }


            $this->load->library('validation');
			$rules['title'] = "required";
			$this->validation->set_rules($rules);
			$fields['title'] = "title";
            $this->validation->set_fields($fields);
            if($_FILES['image']['name'] != ''){
                
                //echo "<pre>";print_r($_FILES);echo"</pre>";
                $fileName = time().".".$_FILES["image"]["name"]; 
                $fileName = str_replace(' ', '_', $fileName);
                $fileTmpLoc = $_FILES["image"]["tmp_name"];
                $pathAndName = $this->config->item('upload')."blogs/".$fileName; 
                $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                $tmp_path = $this->config->item('upload')."blogs/".$fileName;
                $image_thumb= $this->config->item('upload')."blogs/medium/".$fileName; 
                $height=310;
                $width=415;
                $this->load->library('image_lib');
                // echo $this->config->item('upload')."<br>";
                // echo $tmp_path."sd";
                // echo $pathAndName;exit;

               
                // CONFIGURE IMAGE LIBRARY
                $config['image_library']    = 'gd2';
                $config['source_image']     = $tmp_path;
                $config['new_image']        = $image_thumb;
                $config['maintain_ratio']   = true;
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

			if($_FILES['detail_img']['name'] != ''){

                $fileName = time().".".$_FILES["detail_img"]["name"]; 
                $fileName = str_replace(' ', '_', $fileName);
                $fileTmpLoc = $_FILES["detail_img"]["tmp_name"];
                $pathAndName = $this->config->item('upload')."blogs/detail_image/".$fileName; 
                $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                $tmp_path = $this->config->item('upload')."blogs/detail_image/".$fileName;
                $image_thumb= $this->config->item('upload')."blogs/detail_image/large/".$fileName; 
                $height=580;
                $width=1075;
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
                $data['detail_img'] = $fileName;
            }else
            {
                $data['detail_img'] ="";
            } 

			$this->blog_model->add($data);
			
			$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Create Blog',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
			$this->session->set_flashdata('L_strErrorMessage','Blog Added Successfully');
			redirect($this->config->item('base_url').'blog/lists');
                if ($this->validation->run() == FALSE)
                {
					$data['L_strErrorMessage'] = $this->validation->error_string;
			    } 
    }

	$data['all_blog_category'] = $this->blog_model->alldata("blog_category");
    $this->load->view('add_blog',$data);
}

    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->blog_model->is_exist($id); 
                //print_r($result);exit(); 
				$form_field = $data = array(

						'L_strErrorMessage' => '',
						'id'	=> $result->id,
                        'title' =>  $result->title,
                        'page_url' =>  $result->page_url,
                        'date' => $result->date,
                        'description' =>  $result->description,
                        'image' => $result->image,
						            'name' =>  $result->name,
                        'title2' =>  $result->title2,
						'detail_img' =>  $result->detail_img,
                        'blog_cate_id' =>  $result->blog_cate_id,
                        'alt' =>  $result->alt,
                        'short_desc' =>  $result->short_desc,
                        'metatitle' =>$result->metatitle,
                        'metakeywords' =>$result->metakeywords,
                        'metadescription' =>$result->metadescription,
						);  


				if($this->input->post('action') == 'edit_blog') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	
                    }
					// $this->load->library('validation');
					// $rules['title'] = "trim|required";
					// $this->validation->set_rules($rules);
					// $fields['title'] = "discount";
					// $this->validation->set_fields($fields);
					// if ($this->validation->run() == FALSE) 
					// {
					// 		$data = $form_field;
					// 		$data['L_strErrorMessage'] = $this->validation->error_string;
					// 		$data['id'] = $id;
					// } 
					// else 
					// {
                        if($_FILES['image']['name'] != ''){

                            
                            $fileName = time().".".$_FILES["image"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["image"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."blogs/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."blogs/".$fileName;
                            $image_thumb= $this->config->item('upload')."blogs/medium/".$fileName; 
                            $height=310;
                            $width=415;
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
						if($_FILES['detail_img']['name'] != ''){
                            $fileName = time().".".$_FILES["detail_img"]["name"]; 
                         $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["detail_img"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."blogs/detail_image".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."blogs/detail_image".$fileName;
                            $image_thumb= $this->config->item('upload')."blogs/detail_image/large/".$fileName; 
                            $height=580;
                            $width=1075;
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
                            $form_field['detail_img'] = $fileName;
                        }else
                        {
                            $form_field['detail_img'] ="";
                        } 

						$this->blog_model->edit($id, $form_field);
						
						$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit Blog',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
						$this->session->set_flashdata('L_strErrorMessage','Blog Updated Successfully');
						redirect($this->config->item('base_url').'blog/lists');
					}
                    $data['all_blog_category'] = $this->blog_model->alldata("blog_category");
				$this->load->view('edit_blog',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Blog !');
				redirect($this->config->item('base_url').'blog/lists');
			}
	}

	function updateorder_popular($id, $value) {
        $return = $this->blog_model->updateorder_popular($id, $value);
        $this->session->set_flashdata('L_strErrorMessage', 'Popular updated successfully');
        redirect($this->config->item('base_url') . 'blog/lists');
    }

	function updateorder_status($id, $value) {
        $return = $this->blog_model->updateorder_status($id, $value);
        $this->session->set_flashdata('L_strErrorMessage', 'Display Home updated successfully');
        redirect($this->config->item('base_url') . 'blog/lists');
    }


	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'coupan/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['coupanname'] = $this->admin->xss_clean_inputData($this->input->post('coupanname'));
		$data['startdate'] = $this->admin->xss_clean_inputData($this->input->post('startdate'));
		$data['enddate'] = $this->admin->xss_clean_inputData($this->input->post('enddate'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->blog_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
	    $this->load->view('list_blog', $data);
	}


	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {

               $selCheck = $this->admin->xss_clean_inputData($selCheck);
               
                if($this->blog_model->deletes($selCheck)) 
                {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Blog',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','Blog Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'blog/lists');
	}
}
?>