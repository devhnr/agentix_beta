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
	function add($id="")
	{


		if($id != ""){
			//echo $id;exit;
			$result = $this->product_model->get_product_data($id);

			$form_field = $data = array(  
				'name' => $result[0]->name,
				'type_id' => $result[0]->type_id,
				'coverage_id' => $result[0]->coverage_id,
				'zero_to_hundred' => $result[0]->zero_to_hundred,
				'hund_to_five' => $result[0]->hund_to_five,
				'above_five' => $result[0]->above_five,
				'image' => $result[0]->image,
				'show_price' => $result[0]->show_price,

				'assets_zero_to_hund' => $result[0]->assets_zero_to_hund,
				'asset_hund_to_five' => $result[0]->asset_hund_to_five,
				'asset_above_five' => $result[0]->asset_above_five,
				
				// 'emp_zero_to_hundred' => $result[0]->emp_zero_to_hundred,
				// 'emp_hund_to_five' => $result[0]->emp_hund_to_five,
				// 'emp_above_five' => $result[0]->emp_above_five,

				'emp_zero_to_hundred_amount' => $result[0]->emp_zero_to_hundred_amount,
				'emp_zero_to_hundred_percentage' => $result[0]->emp_zero_to_hundred_percentage,

				'emp_hund_to_five_amount' => $result[0]->emp_hund_to_five_amount,
				'emp_hund_to_five_percentage' => $result[0]->emp_hund_to_five_percentage,

				'emp_above_five_amount' => $result[0]->emp_above_five_amount,
				'emp_above_five_percentage' => $result[0]->emp_above_five_percentage,

				'average' => $result[0]->average,
				'sub_industry' => $result[0]->sub_industry,
				'min_amount' => $result[0]->min_amount,
				//'image' => $result[0]->image,
				
				
			);

			//echo "<pre>";print_r($data);echo"</pre>";exit;

		}else{


		$form_field = $data = array(  
				'name' => '',
				'type_id' => '',
				'coverage_id' => '',
				'zero_to_hundred' => '',
				'hund_to_five' => '',
				'above_five' => '',
				'image' => '',
				'show_price' => '',

				'assets_zero_to_hund' => '',
				'asset_hund_to_five' => '',
				'asset_above_five' => '',
				
				// 'emp_zero_to_hundred' => '',
				// 'emp_hund_to_five' => '',
				// 'emp_above_five' => '',

				'emp_zero_to_hundred_amount' => '',
				'emp_zero_to_hundred_percentage' => '',

				'emp_hund_to_five_amount' => '',
				'emp_hund_to_five_percentage' => '',

				'emp_above_five_amount' => '',
				'emp_above_five_percentage' => '',


				'average' => '',
				'sub_industry' => '',
				'min_amount' => '',
				
			);

		}


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
                $image_thumb= $this->config->item('upload')."products/small/".$fileName; 
                $height=76;
                $width=76;
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
            }
						
						 $this->product_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Product Added Successfully');
						redirect($this->config->item('base_url').'product/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		$data['all_type'] = $this->product_model->alldata("type");
		$data['all_coverage'] = $this->product_model->alldata("coverage");
		$data['all_sub_industry'] = $this->product_model->alldata("sub_industry");
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
						'type_id' =>  $result->type_id,
						'coverage_id' =>  $result->coverage_id,
						'image' =>  $result->image,
						'zero_to_hundred' =>  $result->zero_to_hundred,
						'hund_to_five' =>  $result->hund_to_five,
						'above_five' =>  $result->above_five,
						'show_price' =>  $result->show_price,
						'assets_zero_to_hund' => $result->assets_zero_to_hund,
						'asset_hund_to_five' => $result->asset_hund_to_five,
						'asset_above_five' => $result->asset_above_five,
						// 'emp_zero_to_hundred' => $result->emp_zero_to_hundred,
						// 'emp_hund_to_five' => $result->emp_hund_to_five,
						// 'emp_above_five' => $result->emp_above_five,

						'emp_zero_to_hundred_amount' => $result->emp_zero_to_hundred_amount,
						'emp_zero_to_hundred_percentage' => $result->emp_zero_to_hundred_percentage,

						'emp_hund_to_five_amount' => $result->emp_hund_to_five_amount,
						'emp_hund_to_five_percentage' => $result->emp_hund_to_five_percentage,

						'emp_above_five_amount' => $result->emp_above_five_amount,
						'emp_above_five_percentage' => $result->emp_above_five_percentage,
						
						'average' => $result->average,
						'sub_industry' => $result->sub_industry,
						'min_amount' => $result->min_amount,
						
						
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
                            $image_thumb= $this->config->item('upload')."products/small/".$fileName; 
                            $height=76;
                            $width=76;
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
					
							$this->product_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Product Updated Successfully');
							redirect($this->config->item('base_url').'product/lists');
					}
				}
				$data['all_type'] = $this->product_model->alldata("type");
				$data['all_coverage'] = $this->product_model->alldata("coverage");
				$data['all_sub_industry'] = $this->product_model->alldata("sub_industry");
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