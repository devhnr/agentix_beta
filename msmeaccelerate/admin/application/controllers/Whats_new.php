<?php
    class Whats_new extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('whats_new_model'); 
	}


    function add()
    {
		$L_strErrorMessage='';
		$form_field = $data = array(

			'title' => '',
            'image' => '',
            'url' => '',
            // 'description' => '',
        );


		if($this->input->post('action') == 'add_whats_new') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);	
            }


            $this->load->library('validation');
			$rules['title'] = "required";
			$this->validation->set_rules($rules);
			$fields['title'] = "title";
            $this->validation->set_fields($fields);

            if($_FILES['image']['name'] != ''){

                $fileName = time().".".$_FILES["image"]["name"]; 
                $fileName = str_replace(' ', '_', $fileName);
                $fileTmpLoc = $_FILES["image"]["tmp_name"];
                $pathAndName = $this->config->item('upload')."whats_new/".$fileName; 
                $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                $tmp_path = $this->config->item('upload')."whats_new/".$fileName;
                $image_thumb= $this->config->item('upload')."whats_new/large/".$fileName; 
                $height = 526;
                $width = 526;
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

                $tmp_path = $this->config->item('upload')."whats_new/".$fileName;
                $image_thumb= $this->config->item('upload')."whats_new/medium/".$fileName; 
                $height = 263;
                $width = 263;
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
			
			$this->whats_new_model->add($data);
			$this->session->set_flashdata('L_strErrorMessage','Whats New Added Successfully');
			redirect($this->config->item('base_url').'whats_new/lists');
    }

	//$data['allcategory']=$this->home_dynamic_model->allcategory();
	//$data['allproduct']=$this->home_dynamic_model->allproduct();
    $this->load->view('add_whats_new',$data);
}


    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->whats_new_model->is_exist($id); 
                //print_r($result);exit(); 
				$form_field = $data = array(

						'L_strErrorMessage' => '',
						'id'	=> $result->id,
                        'title' =>  $result->title,
                        'image' => $result->image,
                        'url' => $result->url,
                        // 'description' => $result->description,
						);  


				if($this->input->post('action') == 'edit_whats_new') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]=$this->input->post($key);	
                    }

                        if($_FILES['image']['name'] != ''){
                            $fileName = time().".".$_FILES["image"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["image"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."whats_new/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."whats_new/".$fileName;
                            $image_thumb= $this->config->item('upload')."whats_new/medium/".$fileName; 
                            $height=526;
                            $width=526;
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

                            $tmp_path = $this->config->item('upload')."whats_new/".$fileName;
                            $image_thumb= $this->config->item('upload')."whats_new/medium/".$fileName; 
                            $height=263;
                            $width=263;
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

						$this->whats_new_model->edit($id, $form_field);
						$this->session->set_flashdata('L_strErrorMessage','Whats New Updated Successfully');
						redirect($this->config->item('base_url').'whats_new/lists');
					}
				$this->load->view('edit_whats_new',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Whats New !');
				redirect($this->config->item('base_url').'whats_new/lists');
			}
	}

	function updateorder($id,$val){
        $this->whats_new_model->updateorder($id,$val);
        $this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
        redirect($this->config->item('base_url').'whats_new/lists');
    }
    
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'whats_new/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['coupanname'] = $this->input->post('coupanname');
		$data['startdate'] = $this->input->post('startdate');
		$data['enddate'] = $this->input->post('enddate');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->whats_new_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
	$this->load->view('list_whats_new', $data);
	}


	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {
                if($this->whats_new_model->deletes($selCheck)) 
                {
					$this->session->set_flashdata('L_strErrorMessage','Whats New Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'whats_new/lists');
	}
}
?>