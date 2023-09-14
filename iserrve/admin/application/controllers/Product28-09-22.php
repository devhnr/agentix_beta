<?php
	class Product extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('product_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'name' => '',
				'page_url' => '',
				'category_id' => '',
				'get_quote' => '',
				'uniemp_desc' => '',
				'section_two_desc' => '',
				'title_1' => '',
				'title_2' => '',
				'advantage_desc' => '',
				'feature_description' => '',
				'for_employee' => '',
				'group_title' => '',
				'description' => '',
				'image' => '',
				'gimage' => '',
				'short_description' => '',
				'tags' => '',
				'metatitle' => '',
				'metakeywords' => '',
				'metadescription' => '',
				//Table Of Content's Input fields
				'section_1' => '',
				'section_2' => '',
				'section_3' => '',
				'section_4' => '',
				'section_5' => '',
				'section_6' => '',
				'section_7' => '',
				'section_8' => '',
				//Table Of Content's Select fields
				'display_1' => '',
				'display_2' => '',
				'display_3' => '',
				'display_4' => '',
				'display_5' => '',
				'display_6' => '',
				'display_7' => '',
				'display_8' => '',

				'main_title1' => '',
				'main_title2' => '',
				'main_title3' => '',
				'main_title4' => '',
				'main_title5' => '',
				'main_title6' => '',
				'main_title7' => '',
				'main_title8' => '',

			);
		if($this->input->post('action') == 'add_product') 
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

					if($_FILES['image']['name'] != ''){

			            $fileName = time().".".$_FILES["image"]["name"]; 
			            $fileName = str_replace(' ', '_', $fileName);
			            $fileTmpLoc = $_FILES["image"]["tmp_name"];
			            $pathAndName = $this->config->item('upload')."products/".$fileName; 
			            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
			            $tmp_path = $this->config->item('upload')."products/".$fileName;
			            $image_thumb= $this->config->item('upload')."products/large/".$fileName; 
			            $height=430;
			            $width=430;
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

			            $tmp_path = $this->config->item('upload')."products/".$fileName;
			            $image_thumb= $this->config->item('upload')."products/medium/".$fileName; 
			            $height=500;
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
			            $data['image'] = $fileName;
			        }else
			        {
			            $data['image'] ="";
			        }

			        if($_FILES['gimage']['name'] != ''){

			            $fileName = time().".".$_FILES["gimage"]["name"]; 
			            $fileName = str_replace(' ', '_', $fileName);
			            $fileTmpLoc = $_FILES["gimage"]["tmp_name"];
			            $pathAndName = $this->config->item('upload')."products/".$fileName; 
			            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
			            $tmp_path = $this->config->item('upload')."products/".$fileName;
			            $image_thumb= $this->config->item('upload')."products/large/".$fileName; 
			            $height=629;
			            $width=626;
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

			            $tmp_path = $this->config->item('upload')."products/".$fileName;
			            $image_thumb= $this->config->item('upload')."products/medium/".$fileName; 
			            $height=502;
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
			            $data['gimage'] = $fileName;
			        }else
			        {
			            $data['gimage'] ="";
			        } 
						
						 $this->product_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Product Added Successfully');
						redirect($this->config->item('base_url').'product/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		$data['all_category'] = $this->product_model->alldata("category");
		$this->load->view('add_product',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->product_model->get_product($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'name' =>  $result->name,
						'page_url' =>  $result->page_url,
						'get_quote' =>  $result->get_quote,
						'for_employee' =>  $result->for_employee,
						'uniemp_desc' =>  $result->uniemp_desc,
						'section_two_desc' =>  $result->section_two_desc,
						'title_1' =>  $result->title_1,
						'title_2' =>  $result->title_2,
						'advantage_desc' =>  $result->advantage_desc,
						// 'whybuygroup_desc' =>  $result->whybuygroup_desc,
						'feature_description' =>  $result->feature_description,
						'group_title' =>  $result->group_title,
						'description' =>  $result->description,
						'short_description' =>  $result->short_description,
						'category_id' =>  $result->category_id,
						'tags' =>  $result->tags,
						'image' =>  $result->image,
						'gimage' =>  $result->gimage,
						'metatitle' =>  $result->metatitle,
						'metakeywords' =>  $result->metakeywords,
						'metadescription' =>  $result->metadescription,

						//Table Of Content's Input Fields
						'section_1' =>  $result->section_1,
						'section_2' =>  $result->section_2,
						'section_3' =>  $result->section_3,
						'section_4' =>  $result->section_4,
						'section_5' =>  $result->section_5,
						'section_6' =>  $result->section_6,
						'section_7' =>  $result->section_7,
						'section_8' =>  $result->section_8,
						//Table Of Content's Select Fields
						'display_1' =>  $result->display_1,
						'display_2' =>  $result->display_2,
						'display_3' =>  $result->display_3,
						'display_4' =>  $result->display_4,
						'display_5' =>  $result->display_5,
						'display_6' =>  $result->display_6,
						'display_7' =>  $result->display_7,
						'display_8' =>  $result->display_8,

						'main_title1' =>  $result->main_title1,
						'main_title2' =>  $result->main_title2,
						'main_title3' =>  $result->main_title3,
						'main_title4' =>  $result->main_title4,
						'main_title5' =>  $result->main_title5,
						'main_title6' =>  $result->main_title6,
						'main_title7' =>  $result->main_title7,
						'main_title8' =>  $result->main_title8,

						);
				if($this->input->post('action') == 'edit_product') 
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
							if($_FILES['image']['name'] != ''){


                            $fileName = time().".".$_FILES["image"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["image"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."products/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."products/".$fileName;
                            $image_thumb= $this->config->item('upload')."products/large/".$fileName; 
                            $height=430;
                            $width=430;
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

                            $tmp_path = $this->config->item('upload')."products/".$fileName;
                            $image_thumb= $this->config->item('upload')."products/medium/".$fileName; 
                            //echo "<pre>";print_r($image_thumb);echo "</pre>";exit;
                            $height=500;
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

                        if($_FILES['gimage']['name'] != ''){
                            $fileName = time().".".$_FILES["gimage"]["name"]; 
                            $fileName = str_replace(' ', '_', $fileName);
                            $fileTmpLoc = $_FILES["gimage"]["tmp_name"];
                            $pathAndName = $this->config->item('upload')."products/".$fileName; 
                            $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
                            $tmp_path = $this->config->item('upload')."products/".$fileName;
                            $image_thumb= $this->config->item('upload')."products/large/".$fileName; 
                            $height=629;
                            $width=626;
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

                            $tmp_path = $this->config->item('upload')."products/".$fileName;
                            $image_thumb= $this->config->item('upload')."products/medium/".$fileName; 
                            $height=502;
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
                            $form_field['gimage'] = $fileName;
                        }else
                        {
                            $form_field['gimage'] ="";
                        } 
					
							$this->product_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Product Updated Successfully');
							redirect($this->config->item('base_url').'product/lists');
					}
				}
				$data['all_category'] = $this->product_model->alldata("category");
				$data['addition_item'] = $this->product_model->addition_item($id);
				$data['advantage_group_ins'] = $this->product_model->advantage_group_ins($id);
				$data['group_healthInsurance'] = $this->product_model->group_healthInsurance($id);
				$data['feature_groupInsurance'] = $this->product_model->feature_groupInsurance($id);
				$data['whyBuy_groupInsurance'] = $this->product_model->whyBuy_groupInsurance($id);
				$data['whoShould_groupInsurance'] = $this->product_model->whoShould_groupInsurance($id);
				$data['purchase_groupInsurance'] = $this->product_model->purchase_groupInsurance($id);
				$data['faq_additional_data'] = $this->product_model->faq_additional_data($id);
				$this->load->view('edit_product',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Product !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'product/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->product_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_product', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				if($this->product_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Product Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'product/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->product_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}

	function removeprice($product_id, $id) {
        if ($this->product_model->removeattriute($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Universe of Employee Benefits Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function removeprice_faq($product_id, $id) {
        if ($this->product_model->removeprice_faq($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'FAQ Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }


    function removeprice_purchase($product_id, $id) {
        if ($this->product_model->removeprice_purchase($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'purchasing Group Health Insurance Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function removeprice1($product_id, $id) {
        if ($this->product_model->removeattriute1($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Section 2 Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function removeprice2($product_id, $id) {
        if ($this->product_model->removeattriute2($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Section 3 Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function removeprice3($product_id, $id) {
        if ($this->product_model->removeattriute3($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Section 4 Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function removeprice4($product_id, $id) {
        if ($this->product_model->removeattriute4($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Section 5 Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }

    function removeprice5($product_id, $id) {
        if ($this->product_model->removeattriute5($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Who should buy Group Health Insurance Deleted Succcessfully !');
            redirect($this->config->item('base_url') . 'product/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!');
            exit;
        }
    }


    
	function featured_product($pid,$value)
	{
		$return = $this->product_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'product/lists');
	}	
	function updateorder($id,$val){
		$this->product_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'product/lists');
	}
}
?>