<?php
	class Utilities extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('utilities_model');
		$this->load->model('admin');
	}
	function add()
	{
// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
		$form_field = $data = array(  
				
			'corporate_id' => '',
			'policy_no' => '',
			'policy_type' => '',
			'document_type' => '',
			'note' => '',
			'document' => '',
		);

		if($this->input->post('action') == 'add_utilities') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]= $this->admin->xss_clean_inputData($this->input->post($key));		
			}
			
			// $this->load->library('validation');
			// $rules['note'] = "trim|required";
			// $this->validation->set_rules($rules);
			// $fields['note'] = "Name";
			// $this->validation->set_fields($fields);

			$this->load->library('upload');

			if($_FILES['document']['name'] != ''){
				
				$_FILES['file']['name']       =  time() .$_FILES['document']['name'];
				$_FILES['file']['type']       = $_FILES['document']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['document']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['document']['error'];
				$_FILES['file']['size']       = $_FILES['document']['size'];

				$uploadPath = $this->config->item('upload') . "utilities/";
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = '*'; 

				//echo "<pre>";print_r($uploadPath);echo"</pre>";exit;

				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server
				if($this->upload->do_upload('file')){
					// Uploaded file data
					$imageData = $this->upload->data();
						$verify_document_1 = $imageData['file_name'];

				}
		
				$data['document'] = $verify_document_1;
			}
			
			$this->utilities_model->add($data);
			$log_data = array(
				'username' => $this->session->userdata('username'),
				'login_user_id' => $this->session->userdata('adminId'),
				'module_name' => 'Create Utilities',
				'corporate_name' => $data['corporate_id'],
				'policy_number' => $data['policy_no'],
				'created_at' => date('Y-m-d h:i:sa')
			);

			$this->admin->log_data_manage($log_data);
			$this->session->set_flashdata('L_strErrorMessage','Utilities Added Successfully');
			redirect($this->config->item('base_url').'utilities/lists');
			
			// if ($this->validation->run() == FALSE){
			// 	$data['L_strErrorMessage'] = $this->validation->error_string;
			// } 
		}
		$data['allcorporate']= $this->utilities_model->allcorporate();
		$data['allproduct_name'] = $this->utilities_model->allproduct_name();
		$data['allsum_insured'] = $this->utilities_model->allsum_insured();
		$data['allproduct_type'] = $this->utilities_model->allproduct_type();
		$data['alldocument_type'] = $this->utilities_model->alldocument_type();
		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";
		
		$this->load->view('add_utilities',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->utilities_model->get_policy_features($id);  
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'corporate_id' => $result->corporate_id,
						'policy_no' => $result->policy_no,
						'policy_type' => $result->policy_type,
						'document_type' => $result->document_type,						
						'document' => $result->document,
						'note' => $result->note,
											
						);

				if($this->input->post('action') == 'edit_utilities') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  
						$form_field[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	
					}
					
					if($_FILES['document']['name'] != ''){
				
						$_FILES['file']['name']       =  time() .$_FILES['document']['name'];
						$_FILES['file']['type']       = $_FILES['document']['type'];
						$_FILES['file']['tmp_name']   = $_FILES['document']['tmp_name'];
						$_FILES['file']['error']      = $_FILES['document']['error'];
						$_FILES['file']['size']       = $_FILES['document']['size'];
		
						$uploadPath = $this->config->item('upload') . "utilities/";
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = '*'; 
		
						//echo "<pre>";print_r($uploadPath);echo"</pre>";exit;
		
						// Load and initialize upload library
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
		
						// Upload file to server
						if($this->upload->do_upload('file')){
							// Uploaded file data
							$imageData = $this->upload->data();
								$verify_document_1 = $imageData['file_name'];
		
						}
				
						$form_field['document'] = $verify_document_1;
					}

					$this->utilities_model->edit($id, $form_field);
					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Edit Utilities',
						'corporate_name' => $form_field['corporate_id'],
						'policy_number' => $form_field['policy_no'],
						'created_at' => date('Y-m-d h:i:sa')
					);
		
					$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','Utilities Updated Successfully');
					redirect($this->config->item('base_url').'utilities/lists');
					
				}

				$data['allcorporate'] = $this->utilities_model->allcorporate();
				$data['allproduct_name'] = $this->utilities_model->allproduct_name();
				$data['allpolicy_using_id'] = $this->utilities_model->allpolicy_using_id($data['policy_no']);
				$data['allpolicy_using_corporate'] = $this->utilities_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allsum_insured'] = $this->utilities_model->allsum_insured();
				$data['allproduct_type'] = $this->utilities_model->allproduct_type();
				$data['alldocument_type'] = $this->utilities_model->alldocument_type();
				$data['allproduct_type_new'] = $this->utilities_model->allproduct_type_new($data['policy_type']);
				//echo "<pre>";print_r($data);echo "</pre>";
				
				$this->load->view('edit_utilities',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Utilities !!!!');
				redirect($this->config->item('base_url').'utilities/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'utilities/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->utilities_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_utilities', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				$utilities_data = $this->utilities_model->get_policy_features($selCheck);
				
				if($this->utilities_model->deletes($selCheck)) {
					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Utilities',
						'corporate_name' => $utilities_data->corporate_id,
						'policy_number' => $utilities_data->policy_no,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','Utilities Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'utilities/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->utilities_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'utilities/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->utilities_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'utilities/lists');
	}	
	function updateorder($id,$val){
		$this->utilities_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'utilities/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->utilities_model->show_policy_number($pro_id);
        // echo $data; exit;
        $html = '<select id="policy_no" name="policy_no" class="form-control multiple-select">';
        $html .= '<option value="">Select Policy No</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->policy_no ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

	function show_policy_using_corporate(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->utilities_model->show_policy_using_corporate($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
        // echo $data; exit;
        $html = '<select id="policy_no" name="policy_no" class="form-control multiple-select" onChange="showproduct_name(this.value)">';
        $html .= '<option value="">Select Policy No</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->policy_no ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

	function get_product_type(){
		
		
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->utilities_model->get_product_type($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
		
		$get_type_id = $this->utilities_model->get_type_id($data[0]->product_type);
        //echo $get_type_id; exit;
        $html = '<select id="policy_type" name="policy_type" class="form-control" >';
        $html .= '<option value="">Select Policy Type</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$get_type_id."' ".$selected . ">" . $data[$i]->product_type ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }
    
}
?>