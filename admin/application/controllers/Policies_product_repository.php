<?php
    class Policies_product_repository extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('policies_product_repository_model'); 
	}


    function add()
    {
		$L_strErrorMessage='';
		$form_field = $data = array(

			'company_id' => '',						'cat_id' => '',
            'plan_name' => '',
            //'sum_insured_id' => '',
            // 'price' => '',
            /* 'image' => '',
            'pdf_file' => '',
            'csum_insure' => '',
            'brochure' => '',
            'other_description' => '',
            
            'coverage_detail' => '',
            'coverage_score' => '',
            'sub_limit_detail' => '',
            'sub_limit_score' => '',
            'flexibility_detail' => '',
            'flexibility_score' => '',
            'discount_detail' => '',
            'discount_score' => '',
            'premium_detail' => '',
            'premium_score' => '',
            'note' => '',
            'pro_desc' => '', */
        );
        

		if($this->input->post('action') == 'add_policies_product_repository') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);	
            }


            $this->load->library('validation');
			$rules['plan_name'] = "required";
			$this->validation->set_rules($rules);
			$fields['plan_name'] = "plan_name";
            $this->validation->set_fields($fields);

            if($_FILES['image']['name'] != ''){

                $fileName = time().".".$_FILES["image"]["name"]; 
                $fileName = str_replace(' ', '_', $fileName);
                $fileTmpLoc = $_FILES["image"]["tmp_name"];
                $pathAndName = $this->config->item('upload')."policies_image/score_detail/".$fileName; 
                $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                $tmp_path = $this->config->item('upload')."policies_image/score_detail/".$fileName;
                $image_thumb= $this->config->item('upload')."policies_image/score_detail/medium/".$fileName; 
                $height = 300;
                $width = 300;
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
            if($_FILES['pdf_file']['name'] != '')
            {
                $fileName1 = time().".".$_FILES["pdf_file"]["name"]; 
                $fileName1 = str_replace(' ', '_', $fileName1);
                $fileTmpLoc1 = $_FILES["pdf_file"]["tmp_name"];
                $pathAndName1 = $this->config->item('upload')."policy_worlding/".$fileName1; 
                $moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
                $data['pdf_file'] = $fileName1;
            }

            if($_FILES['brochure']['name'] != '')
            {
                $fileName1 = time().".".$_FILES["brochure"]["name"]; 
                $fileName1 = str_replace(' ', '_', $fileName1);
                $fileTmpLoc1 = $_FILES["brochure"]["tmp_name"];
                $pathAndName1 = $this->config->item('upload')."brochure/".$fileName1; 
                $moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
                $data['brochure'] = $fileName1;
            }
			
			$this->policies_product_repository_model->add($data);
			$this->session->set_flashdata('L_strErrorMessage','Policies Added Successfully');
			redirect($this->config->item('base_url').'policies_product_repository/lists');
    }

    $data['compare_name'] = $this->policies_product_repository_model->all_compare("compare_name");
    $data['all_title'] = $this->policies_product_repository_model->all_compare("title");
	$data['all_company_name'] = $this->policies_product_repository_model->alldata("company_name");		$data['policy_category'] = $this->policies_product_repository_model->alldata("policy_category");
    $data['all_sum_insured'] = $this->policies_product_repository_model->all_sum_insure("sum_insured");
    $this->load->view('add_policies_product_repository',$data);
}


    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->policies_product_repository_model->is_exist($id); 
                //print_r($result);exit(); 
				$form_field = $data = array(

						'L_strErrorMessage' => '',
						'id'	=> $result->id,												'cat_id'	=> $result->cat_id,
                        'company_id' =>  $result->company_id,
                        'plan_name' =>  $result->plan_name,
                        'sum_insured_id' =>  $result->sum_insured_id,
                        // 'price' => $result->price,
                        'image' =>  $result->image,
                        'pdf_file' =>  $result->pdf_file,
                        'csum_insure' =>  $result->csum_insure,
                        'brochure' =>  $result->brochure,

                        'other_description' => $result->other_description,

                        'coverage_detail' => $result->coverage_detail,
                        'coverage_score' => $result->coverage_score,
                        'sub_limit_detail' => $result->sub_limit_detail,
                        'sub_limit_score' => $result->sub_limit_score,
                        'flexibility_detail' => $result->flexibility_detail,
                        'flexibility_score' => $result->flexibility_score,
                        'discount_detail' => $result->discount_detail,
                        'discount_score' => $result->discount_score,
                        'premium_detail' => $result->premium_detail,
                        'premium_score' => $result->premium_score,
                        'note' => $result->note,
                        'pro_desc' => $result->pro_desc,
						);  


				if($this->input->post('action') == 'edit_policies_product_repository') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]=$this->input->post($key);	
                    }

                        if($_FILES['image']['name'] != ''){
                            $fileName = time().".".$_FILES["image"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["image"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."policies_image/score_detail/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."policies_image/score_detail/".$fileName;
                            $image_thumb= $this->config->item('upload')."policies_image/score_detail/medium/".$fileName; 
                            $height=300;
                            $width=300;
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

                        if($_FILES['pdf_file']['name'] != '')
                        {
                            $fileName1 = time().".".$_FILES["pdf_file"]["name"]; 
                            $fileName1 = str_replace(' ', '_', $fileName1);
                            $fileTmpLoc1 = $_FILES["pdf_file"]["tmp_name"];
                            $pathAndName1 = $this->config->item('upload')."policy_worlding/".$fileName1; 
                            $moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
                            $form_field['pdf_file'] = $fileName1;
                        }

                        if($_FILES['brochure']['name'] != '')
                        {
                            $fileName1 = time().".".$_FILES["brochure"]["name"]; 
                            $fileName1 = str_replace(' ', '_', $fileName1);
                            $fileTmpLoc1 = $_FILES["brochure"]["tmp_name"];
                            $pathAndName1 = $this->config->item('upload')."brochure/".$fileName1; 
                            $moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);
                            $form_field['brochure'] = $fileName1;
                        }

						$this->policies_product_repository_model->edit($id, $form_field);
						$this->session->set_flashdata('L_strErrorMessage','Policies Updated Successfully');
						redirect($this->config->item('base_url').'policies_product_repository/lists');
					}
				$data['addition_item'] = $this->policies_product_repository_model->addition_item($id);
                $data['exclusion_item'] = $this->policies_product_repository_model->exclusion_item($id);
                $data['top_feature_item'] = $this->policies_product_repository_model->top_feature_item($id);
                $data['sum_insuranc_data'] = $this->policies_product_repository_model->sum_insuranced_attr($id);
                $data['all_company_name'] = $this->policies_product_repository_model->alldata("company_name");								$data['policy_category'] = $this->policies_product_repository_model->alldata("policy_category");
                $data['all_sum_insured'] = $this->policies_product_repository_model->all_sum_insure("sum_insured");
                $data['compare_name'] = $this->policies_product_repository_model->all_compare("compare_name");
                $data['all_title'] = $this->policies_product_repository_model->all_compare("title");
                $data['addition_detail'] = $this->policies_product_repository_model->addition_detail($id);
				$this->load->view('edit_policies_product_repository',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Policies !');
				redirect($this->config->item('base_url').'policies_product_repository/lists');
			}
	}

	function updateorder($id,$val){
        $this->policies_product_repository_model->updateorder($id,$val);
        $this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
        redirect($this->config->item('base_url').'policies_product_repository/lists');
    }
    
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'policies_product_repository/lists/';
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
		$return = $this->policies_product_repository_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
	$this->load->view('list_policies_product_repository', $data);
	}


	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {
                if($this->policies_product_repository_model->deletes($selCheck)) 
                {
					$this->session->set_flashdata('L_strErrorMessage','Policies Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'policies_product_repository/lists');
	}

	function removeprice($coverage_id, $id) {
        if ($this->policies_product_repository_model->removeattriute($coverage_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Coverage Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'policies_product_repository/edit/' . $coverage_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function remove_topFeature($policies_id, $id) {
        if ($this->policies_product_repository_model->remove_topFeature($policies_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Top Feature Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'policies_product_repository/edit/' . $policies_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }


    function remove_sum_insuranc($policies_id, $id) {
        if ($this->policies_product_repository_model->remove_sum_insuranc($policies_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Sum Insured Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'policies_product_repository/edit/' . $policies_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function remove_exclusion($exclusion_id, $id) {
        if ($this->policies_product_repository_model->remove_exclusion($exclusion_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Exclusions Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'policies_product_repository/edit/' . $exclusion_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function remove_compare($compare_id, $id) {
        if ($this->policies_product_repository_model->remove_compare($compare_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Compare Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'policies_product_repository/edit/' . $compare_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function updateorder_status($id, $value) {
        $return = $this->policies_product_repository_model->updateorder_status($id, $value);
        $this->session->set_flashdata('L_strErrorMessage', 'Set as Home updated successfully');
        redirect($this->config->item('base_url') . 'policies_product_repository/lists');
    }


    function show_title(){

        $id =  $_POST['id'];

        $data = $this->policies_product_repository_model->show_title($id);

        $html = '<select id="title_id" name="title_id[]" class="form-control jobtext">';
        $html .= "<option value=''>Select Title</option>";
        if($data!=''){
        for($i=0;$i<count($data);$i++)
        {
            
            $html .= "<option value='".$data[$i]->id."' >".$data[$i]->name. "</option>";
        }
        }
        $html .="</select>";
        
        echo $html;

        //echo "<pre>";print_r($data);echo"</pre>";exit;
    }


    function show_title_edit(){

        $id =  $_POST['id'];

        $data = $this->policies_product_repository_model->show_title($id);

        $html = '<select id="title_id" name="title_id1[]" class="form-control jobtext">';
        $html .= "<option value=''>Select Title</option>";
        if($data!=''){
        for($i=0;$i<count($data);$i++)
        {
            
            $html .= "<option value='".$data[$i]->id."' >".$data[$i]->name. "</option>";
        }
        }
        $html .="</select>";
        
        echo $html;

        //echo "<pre>";print_r($data);echo"</pre>";exit;
    }

    function show_title_update(){

        $id =  $_POST['id'];

        $data = $this->policies_product_repository_model->show_title($id);

        $html = '<select id="title_id" name="title_idu[]" class="form-control jobtext">';
        $html .= "<option value=''>Select Title</option>";
        if($data!=''){
        for($i=0;$i<count($data);$i++)
        {
            
            $html .= "<option value='".$data[$i]->id."' >".$data[$i]->name. "</option>";
        }
        }
        $html .="</select>";
        
        echo $html;

        //echo "<pre>";print_r($data);echo"</pre>";exit;
    }
}
?>