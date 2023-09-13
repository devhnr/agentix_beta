<?php
	class Product_repository extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('product_repository_model');
	}
	function add()
	{
		$form_field = $data = array(  
				'policy_id' => '',
				'document_type' => '',
				'document_file' => '',
				'cat_id' => '',
			);
		if($this->input->post('action') == 'add_product_repository') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);		
			}
			$this->load->library('validation');
			$rules['policy_id'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['policy_id'] = "Name";
			$this->validation->set_fields($fields);

			if($_FILES['document_file']['name'] != '')

            {

                $fileName1 = time().".".$_FILES["document_file"]["name"]; 

                $fileName1 = str_replace(' ', '_', $fileName1);

                $fileTmpLoc1 = $_FILES["document_file"]["tmp_name"];

                $pathAndName1 = $this->config->item('upload')."product_repository/".$fileName1; 

                $moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);

                $data['document_file'] = $fileName1;

            }

					
			$this->product_repository_model->add($data);
			$this->session->set_flashdata('L_strErrorMessage','Product Repository Added Successfully');
			redirect($this->config->item('base_url').'product_repository/lists');
				
			if ($this->validation->run() == FALSE){
				$data['L_strErrorMessage'] = $this->validation->error_string;
			} 
		}

		$data['all_policy'] = $this->product_repository_model->get_all_policy();

		//echo "<pre>";print_r($data);exit;
		
		$this->load->view('add_product_repository',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->product_repository_model->get_product_repository($id);  
				//print_r($result);die();
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'policy_id' => $result->policy_id,
						'document_type' => $result->document_type,
						'document_file' => $result->document_file,
						);
				if($this->input->post('action') == 'edit_product_repository') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
									
						if($_FILES['document_file']['name'] != '')

                        {

                            $fileName1 = time().".".$_FILES["document_file"]["name"]; 

                            $fileName1 = str_replace(' ', '_', $fileName1);

                            $fileTmpLoc1 = $_FILES["document_file"]["tmp_name"];

                            $pathAndName1 = $this->config->item('upload')."product_repository/".$fileName1; 

                            $moveResult1 = move_uploaded_file($fileTmpLoc1, $pathAndName1);

                            $form_field['document_file'] = $fileName1;

                        }

                        
						$this->product_repository_model->edit($id, $form_field);
						$this->session->set_flashdata('L_strErrorMessage','Product Repository Updated Successfully');
						redirect($this->config->item('base_url').'product_repository/lists');
					
				}

				$data['all_policy'] = $this->product_repository_model->get_all_policy();
				
				$this->load->view('edit_product_repository',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Product Repository !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'product_repository/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->product_repository_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_product_repository', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {
				if($this->product_repository_model->deletes($selCheck)) {
					$this->session->set_flashdata('L_strErrorMessage','Product Repository Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'product_repository/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->product_repository_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->product_repository_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'product_repository/lists');
	}	
	function updateorder($id,$val){
		$this->product_repository_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'product_repository/lists');
	}

	function check_data_exit(){

		$policy_id = $_POST['policy_id'];
		$document_type = $_POST['document_type'];

		$check_data = $this->product_repository_model->check_data_exit($policy_id,$document_type);

		if($check_data != ''){
			echo "1";
		}else{
			echo "0";
		}

		//echo "<pre>";print_r($check_data);echo"</pre>";exit;
	}
	
	function get_cat_data(){

		$policy_id = $_POST['policy_id'];
		
		$check_data = $this->product_repository_model->get_cat_data($policy_id);

		if($check_data != ''){
			echo $check_data->cat_id;
		}else{
			echo "0";
		}

		//echo "<pre>";print_r($check_data);echo"</pre>";exit;
	}
}
?>