<?php
	class Subcategory extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('subcategory_model');
	}

	function add()
	{
		$form_field = $data = array(  

				'industry_id' => '',
				'name' => '',
				'emp_insurance' => '',
				'pro_insurance' => '',
				'liability_insurance' => '',
				'crime_insurance' => '',
				'cyber_insurance' => '',
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

						if($_FILES['sub_banner']['name'] != ''){
						$fileName = time().".".$_FILES["sub_banner"]["name"]; 
						$fileName = str_replace(' ', '_', $fileName);
						$fileTmpLoc = $_FILES["sub_banner"]["tmp_name"];
						$pathAndName = $this->config->item('upload')."subcategory_banner/".$fileName; 
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);					

						$tmp_path = $this->config->item('upload')."subcategory_banner/".$fileName;
						$image_thumb= $this->config->item('upload')."subcategory_banner/large/".$fileName; 

						$height=350;
						$width=1366;
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

						$data['sub_banner'] = $fileName;
						}else
						{
							$data['sub_banner'] ="";
						}

						if($_FILES['image']['name'] != ''){
						$fileName = time().".".$_FILES["image"]["name"]; 
						$fileName = str_replace(' ', '_', $fileName);
						$fileTmpLoc = $_FILES["image"]["tmp_name"];
						$pathAndName = $this->config->item('upload')."subcategory_image/".$fileName; 
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);	
						$tmp_path = $this->config->item('upload')."subcategory_image/".$fileName;
						$image_thumb= $this->config->item('upload')."subcategory_image/large/".$fileName;

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
						$data['image'] = $fileName;
						}else
						{
							$data['image'] ="";
						}

						 $this->subcategory_model->add($data);
						$this->session->set_flashdata('L_strErrorMessage','Sub Industry Added Successfully!');

						redirect($this->config->item('base_url').'subcategory/lists');

						

						if ($this->validation->run() == FALSE){

					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		$data['all_group'] = $this->subcategory_model->all_group();
		$data["allcategory"]= $this->subcategory_model->allcategory();
		$this->load->view('add_subcategory',$data);
	}

	
    function edit($id)
	{
			if(is_numeric($id))
			{
					$result = $this->subcategory_model->get_category($id);  
					$form_field = $data = array(

								'L_strErrorMessage' => '',
								'id'	=> $result->id,
								'industry_id' => $result->industry_id,
								'name' => $result->name,
								'emp_insurance' => $result->emp_insurance,
								'pro_insurance' => $result->pro_insurance,
								'liability_insurance' => $result->liability_insurance,
								'crime_insurance' => $result->crime_insurance,
								'cyber_insurance' => $result->cyber_insurance,
						);
				if($this->input->post('action') == 'edit_category') 
				{
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
							$data['industry_id'] = $id;
					} 
					else 
					{
						if($_FILES['sub_banner']['name'] != ''){
						$fileName = time().".".$_FILES["sub_banner"]["name"]; 
						$fileName = str_replace(' ', '_', $fileName);
						$fileTmpLoc = $_FILES["sub_banner"]["tmp_name"];
						$pathAndName = $this->config->item('upload')."subcategory_banner/".$fileName; 
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);

						$tmp_path = $this->config->item('upload')."subcategory_banner/".$fileName;
						$image_thumb= $this->config->item('upload')."subcategory_banner/large/".$fileName; 

						$height=350;
						$width=1366;

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
						$form_field['sub_banner'] = $fileName;
						}


						if($_FILES['image']['name'] != ''){
						$fileName = time().".".$_FILES["image"]["name"]; 
						$fileName = str_replace(' ', '_', $fileName);
						$fileTmpLoc = $_FILES["image"]["tmp_name"];
						$pathAndName = $this->config->item('upload')."subcategory_image/".$fileName; 
						$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);	
						$tmp_path = $this->config->item('upload')."subcategory_image/".$fileName;
						$image_thumb= $this->config->item('upload')."subcategory_image/large/".$fileName;

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
						}
							//echo "<pre>";print_r($form_field);echo"</pre>";exit;
							$this->subcategory_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Sub Industry Updated Successfully!');

							redirect($this->config->item('base_url').'subcategory/lists');
					}
				}
				$data['all_group'] = $this->subcategory_model->all_group();
				//$data["allcategory"]= $this->subcategory_model->show_subcategory($result->group_id);
				$data["allcategory"]= $this->subcategory_model->allcategory();
				$this->load->view('edit_subcategory',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Industry !');
				redirect($this->config->item('base_url').'subcategory/lists');
			}
	}

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
		$return = $this->subcategory_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		$this->pagination->initialize($config);
		$this->load->view('list_subcategory', $data);
	}

	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {

			foreach($_POST['selected'] as $selCheck) {
				if($this->subcategory_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Sub Industry Deleted Successfully!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!');
				}
			}
		}
		redirect($this->config->item('base_url').'subcategory/lists');
	}

function featured_product($pid,$value)
	{
		$return = $this->subcategory_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'subcategory/lists');
	}	

	function updateorder($id,$val)
	{	
		$this->subcategory_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'subcategory/lists');
	}

	function userstatus($id,$value)	{	
	$result=$this->subcategory_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!');
	redirect($this->config->item('base_url').'user/lists');
	}

	function show_subcategory()
	{
		$cid = $_POST['cid'];
		$sid = $_POST['sid'];
		$data = $this->subcategory_model->show_subcategory($cid);
		$html = "<select id='category_id' name='category_id' class='form-control jobtext'>";
		$html .= "<option value=''> -- Select Category -- </option>";
		if($data != '' && count($data) >0)
		{
			for($i=0;$i<count($data);$i++)
			{
				if($data[$i]->id==$sid){ $selected="selected"; } else { echo $selected="" ; }
				$html .= "<option value='".$data[$i]->id ."' ".$selected.">".$data[$i]->name ."</option>";
			}
		}
		$html .="</select>";
		echo $html;
	}
}
?>