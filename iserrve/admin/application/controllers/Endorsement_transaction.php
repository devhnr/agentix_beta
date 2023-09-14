<?php
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Color;

    class Endorsement_transaction extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('endorsement_transaction_model');
        $this->load->model('admin');
        
        date_default_timezone_set('Asia/Kolkata');
	}


    function add()
    {
        $L_strErrorMessage=''; 
        $form_field = $data = array(

      		'corporate_id' => '',
            'cd_number_id' => '',
            'policy_endorsement_entry' => '',
            'policy_no_cheque' => '',
            'product_type_cheque' => '',
            'bank_name' => '',
            'cheque_utr_no' => '',
            'particular' => '',
            'date' => '',
            'upload_file' => '',
            'amount' => '',
            'particular_policy' => '',
            'product_type' => '',
            'policy_no' => '',
            'policy_start_date' => '',
            'policy_end_date' => '',
            'endorsement_no_policy' => '',
            'employee_count_policy' => '',
            'dependent_count_policy' => '',
            'transaction_type' => '',
            'date_policy' => '',
            'upload_policy' => '',
            'net_premium' => '',
            'gst' => '',
            'gross_premium_policy' => '',
        );




		if($this->input->post('action') == 'add_endorsement_transaction') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
            }


            $this->load->library('validation');
			$rules['cd_account_name'] = "required";
			$this->validation->set_rules($rules);
			$fields['cd_account_name'] = "cd_statement_entry";
            $this->validation->set_fields($fields);

            $this->load->library('upload');

            if($data['policy_endorsement_entry'] == 0){

                
                if($_FILES['upload_file']['name'] != ''){
                    // echo "<pre>";print_r($_FILES['upload_file']['name']);echo "</pre>";exit;
                    
                    $_FILES['file']['name']       =  time() .$_FILES['upload_file']['name'];
                    $_FILES['file']['type']       = $_FILES['upload_file']['type'];
                    $_FILES['file']['tmp_name']   = $_FILES['upload_file']['tmp_name'];
                    $_FILES['file']['error']      = $_FILES['upload_file']['error'];
                    $_FILES['file']['size']       = $_FILES['upload_file']['size'];

                    $uploadPath = $this->config->item('upload') . "endor_trans/";
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*'; 

                    //echo "<pre>";print_r($uploadPath);echo"</pre>";exit;

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    // echo "test";exit;
                    if($this->upload->do_upload('file')){
                        
                        // Uploaded file data
                        $imageData = $this->upload->data();
                        // echo "<pre>";print_r($imageData);echo "</pre>";exit;
                            $verify_document_1 = $imageData['file_name'];

                            echo $verify_document_1;

                    }
            
                    $data['upload_file'] = $verify_document_1;
                }
            }

            if($data['policy_endorsement_entry'] == 1){
                if($_FILES['upload_policy']['name'] != ''){
                    // echo "<pre>";print_r($_FILES['upload_file']['name']);echo "</pre>";exit;
                    
                    $_FILES['file']['name']       =  time() .$_FILES['upload_policy']['name'];
                    $_FILES['file']['type']       = $_FILES['upload_policy']['type'];
                    $_FILES['file']['tmp_name']   = $_FILES['upload_policy']['tmp_name'];
                    $_FILES['file']['error']      = $_FILES['upload_policy']['error'];
                    $_FILES['file']['size']       = $_FILES['upload_policy']['size'];

                    $uploadPath = $this->config->item('upload') . "endor_trans/";
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*'; 

                    //echo "<pre>";print_r($uploadPath);echo"</pre>";exit;

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    // echo "test";exit;
                    if($this->upload->do_upload('file')){
                        
                        // Uploaded file data
                        $imageData = $this->upload->data();
                        // echo "<pre>";print_r($imageData);echo "</pre>";exit;
                            $verify_document_1 = $imageData['file_name'];

                            echo $verify_document_1;

                    }
            
                    $data['upload_file'] = $verify_document_1;
                }
            }

			 // echo "<pre>";print_r($data);echo "</pre>";exit;
        
			$this->endorsement_transaction_model->add($data);
			
			if($data['policy_endorsement_entry'] == 0){
				$policy_no = $data['policy_no_cheque'];
			}else{
				$policy_no = $data['policy_no'];
			}
			
			$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Create Endorsement Transaction',
									'corporate_name' => $data['corporate_id'],
									'policy_number' => $policy_no,
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
			$this->session->set_flashdata('L_strErrorMessage','Endorsement Transaction Added Successfully');
			redirect($this->config->item('base_url').'endorsement_transaction/add');
                if ($this->validation->run() == FALSE)
                {
					$data['L_strErrorMessage'] = $this->validation->error_string;
			    } 
    }

	$data['allcorporate']= $this->endorsement_transaction_model->allcorporate();
    $data['all_cd_entry']= $this->endorsement_transaction_model->all_cd_entry();
    $data['allproduct_type'] = $this->endorsement_transaction_model->allproduct_type();
    $data['allproduct_name'] = $this->endorsement_transaction_model->allproduct_name();
    // echo "<pre>";print_r($data['allproduct_name']);echo "</pre>";exit;
    $this->load->view('add_endorsement_transaction',$data);
}

    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->endorsement_transaction_model->is_exist($id); 
                 
				$form_field = $data = array(

						'L_strErrorMessage' => '',
						'id'	=> $result->id,
                        'corporate_id' =>  $result->corporate_id,
                        'cd_number_id' =>  $result->cd_number_id,
                        'policy_endorsement_entry' => $result->policy_endorsement_entry,
                        'bank_name' =>  $result->bank_name,
                        'cheque_utr_no' =>  $result->cheque_utr_no,
                        'particular' => $result->particular,
                        'date' => $result->date,
                        'upload_file' => $result->upload_file,
                        'amount' => $result->amount,
                        'particular_policy' => $result->particular,
                        'product_type' => $result->product_type,
                        'policy_no' => $result->policy_no,
                        'policy_start_date' => $result->policy_start_date,
                        'policy_end_date' => $result->policy_end_date,
                        'endorsement_no_policy' => $result->endorsement_no_policy,
                        'employee_count_policy' => $result->employee_count_policy,
                        'dependent_count_policy' => $result->dependent_count_policy,
                        'transaction_type' => $result->transaction_type,
                        'date_policy' => $result->date,
                        'upload_policy' => $result->upload_file,
                        'net_premium' => $result->net_premium,
                        'gst' => $result->gst,
                        'gross_premium_policy' => $result->gross_premium_policy,
						
						);  
                        // echo "<pre>";print_r($result);echo "</pre>";exit();

				if($this->input->post('action') == 'edit_endorsement_transaction') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
                    }
					

            $this->load->library('upload');

            if($data['policy_endorsement_entry'] == 0){

                
                if($_FILES['upload_file']['name'] != ''){
                    // echo "<pre>";print_r($_FILES['upload_file']['name']);echo "</pre>";exit;
                    
                    $_FILES['file']['name']       =  time() .$_FILES['upload_file']['name'];
                    $_FILES['file']['type']       = $_FILES['upload_file']['type'];
                    $_FILES['file']['tmp_name']   = $_FILES['upload_file']['tmp_name'];
                    $_FILES['file']['error']      = $_FILES['upload_file']['error'];
                    $_FILES['file']['size']       = $_FILES['upload_file']['size'];

                    $uploadPath = $this->config->item('upload') . "endor_trans/";
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*'; 

                    //echo "<pre>";print_r($uploadPath);echo"</pre>";exit;

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    // echo "test";exit;
                    if($this->upload->do_upload('file')){     
                        // Uploaded file data
                        $imageData = $this->upload->data();
                        // echo "<pre>";print_r($imageData);echo "</pre>";exit;
                            $verify_document_1 = $imageData['file_name'];
                            echo $verify_document_1;
                    }
            
                    $data['upload_file'] = $verify_document_1;
                }
            }

            if($data['policy_endorsement_entry'] == 1){
                if($_FILES['upload_policy']['name'] != ''){
                    // echo "<pre>";print_r($_FILES['upload_file']['name']);echo "</pre>";exit;
                    
                    $_FILES['file']['name']       =  time() .$_FILES['upload_policy']['name'];
                    $_FILES['file']['type']       = $_FILES['upload_policy']['type'];
                    $_FILES['file']['tmp_name']   = $_FILES['upload_policy']['tmp_name'];
                    $_FILES['file']['error']      = $_FILES['upload_policy']['error'];
                    $_FILES['file']['size']       = $_FILES['upload_policy']['size'];

                    $uploadPath = $this->config->item('upload') . "endor_trans/";
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*'; 

                    //echo "<pre>";print_r($uploadPath);echo"</pre>";exit;

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    // echo "test";exit;
                    if($this->upload->do_upload('file')){       
                        // Uploaded file data
                        $imageData = $this->upload->data();
                        // echo "<pre>";print_r($imageData);echo "</pre>";exit;
                            $verify_document_1 = $imageData['file_name'];
                            echo $verify_document_1;
                    }
            
                    $data['upload_file'] = $verify_document_1;
                }
            }
                       
						
                    // echo "<pre>";print_r($form_field);echo "</pre>";exit;
                $this->endorsement_transaction_model->edit($id, $form_field);
				
				if($form_field['policy_endorsement_entry'] == 0){
					$policy_no = $form_field['policy_no_cheque'];
				}else{
					$policy_no = $form_field['policy_no'];
				}
				
				$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit Endorsement Transaction',
									'corporate_name' => $form_field['corporate_id'],
									'policy_number' => $policy_no,
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								
                $this->session->set_flashdata('L_strErrorMessage','Endorsement Transaction Updated Successfully');
                redirect($this->config->item('base_url').'endorsement_transaction/lists');
            }

             
            $data['allproduct_name_new'] = $this->endorsement_transaction_model->allproduct_name_new($result->corporate_id);
            $data['allcorporate']= $this->endorsement_transaction_model->allcorporate();
            $data['all_cd_entry']= $this->endorsement_transaction_model->all_cd_entry();
            $data['all_cd_entry_new']= $this->endorsement_transaction_model->all_cd_entry_new($result->cd_number_id);
            $data['allproduct_type'] = $this->endorsement_transaction_model->allproduct_type();
            $data['allproduct_name'] = $this->endorsement_transaction_model->allproduct_name();

            //  echo "<pre>";print_r($data['all_cd_entry_new']);echo "</pre>";exit;
        $this->load->view('edit_endorsement_transaction',$data);
    } 
    else 
    {
        $this->session->set_flashdata('L_strErrorMessage','No Such Endorsement Transaction!');
        redirect($this->config->item('base_url').'cd_statement_entry/lists');
    }
	}

    function edit_popup($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->endorsement_transaction_model->is_exist($id); 
                 
				$form_field = $data = array(

						'L_strErrorMessage' => '',
						'id'	=> $result->id,
                        
                        'upload_file' => $result->upload_file,
                       
                        'particular_policy' => $result->particular,
                        
						
						);  
                        // echo "<pre>";print_r($result);echo "</pre>";exit();

				if($this->input->post('action') == 'edit_endorsement_transaction') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
                    }
					

            $this->load->library('upload');

           

                
                if($_FILES['upload_file']['name'] != ''){
                    // echo "<pre>";print_r($_FILES['upload_file']['name']);echo "</pre>";exit;
                    
                    $_FILES['file']['name']       =  time() .$_FILES['upload_file']['name'];
                    $_FILES['file']['type']       = $_FILES['upload_file']['type'];
                    $_FILES['file']['tmp_name']   = $_FILES['upload_file']['tmp_name'];
                    $_FILES['file']['error']      = $_FILES['upload_file']['error'];
                    $_FILES['file']['size']       = $_FILES['upload_file']['size'];

                    $uploadPath = $this->config->item('upload') . "endor_trans/";
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*'; 

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if($this->upload->do_upload('file')){     
                        // Uploaded file data
                        $imageData = $this->upload->data();
                        // echo "<pre>";print_r($imageData);echo "</pre>";exit;
                            $verify_document_1 = $imageData['file_name'];
                           // echo $verify_document_1;
                    }
            
                    $form_field['upload_file'] = $verify_document_1;
                }
            

           
               // echo "<pre>";print_r($_POST);echo "</pre>";exit;
                $this->endorsement_transaction_model->edit_popup($id, $form_field);
                $this->session->set_flashdata('L_strErrorMessage','Endorsement Transaction Updated Successfully');
                redirect($this->config->item('base_url').'endorsement_transaction/view_detail/'.$result->corporate_id.'/'.$_POST['cd_no']);
            }

    } 
    
	}

	function updateorder_popular($id, $value) {
        $return = $this->cd_statement_entry_model->updateorder_popular($id, $value);
        $this->session->set_flashdata('L_strErrorMessage', 'Popular updated successfully');
        redirect($this->config->item('base_url') . 'cd_statement_entry/lists');
    }

	function updateorder_status($id, $value) {
        $return = $this->cd_statement_entry_model->updateorder_status($id, $value);
        $this->session->set_flashdata('L_strErrorMessage', 'Display Home updated successfully');
        redirect($this->config->item('base_url') . 'cd_statement_entry/lists');
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
		$return = $this->endorsement_transaction_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return;
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->pagination->initialize($config);
	    $this->load->view('list_endorsement_transaction_corporate', $data);
	}

    function view_detail($corporate_id,$cd_no){

        $this->session->set_userdata('cd_no',$cd_no);
		
		$return = $this->endorsement_transaction_model->lists_new($corporate_id,$cd_no);
		$data['result'] = $return;

        $data['corporate_id']= $corporate_id;
		
		
		if($this->session->userdata('cd_no') > 0 && $data['result'] != ''){

			$data['endersoment_net_premium_with_gst_total'] = $this->endorsement_transaction_model->endersoment_net_premium_with_gst_total($corporate_id);
			
		}else{
			$data['endersoment_net_premium_with_gst_total'] =  0;
		}

        $data['corporate_endersoment_calculation'] = $this->endorsement_transaction_model->corporate_endersoment_calculation($corporate_id);
		
		$data['cd_number'] = $this->endorsement_transaction_model->get_cd_number_using_corporate($corporate_id);
		
             
        //echo "<pre>";print_r($data['corporate_endersoment_calculation']);echo"</pre>";exit;
	    $this->load->view('list_endorsement_transaction', $data);
    }
	
	function view_calculation($calculation_id){
		
		$data['calculation_data'] = $this->endorsement_transaction_model->get_calculation_table_data($calculation_id);
		
		$data['calculation_addition_attribute'] = $this->endorsement_transaction_model->get_endorsement_calculation_addition_attribute($calculation_id);
		
		$data['calculation_deletion_attribute'] = $this->endorsement_transaction_model->get_endorsement_calculation_deletion_attribute($calculation_id);
		
		
		//echo "<pre>";print_r($data['calculation_data']);echo"</pre>";exit;
		
		$this->load->view('view_endersoment_calculation',$data);
	}
	
	function update_rack_rate_calculation(){
		
		
		if($this->input->post('action') == 'update_rack_cal') 
		{
			
			foreach($_POST as $key => $value) {  
				$form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	
			}
			
			//echo "<pre>";print_r($form_field);echo"</pre>";exit;
			$this->endorsement_transaction_model->update_rack_rate_calculation($form_field);
			$this->session->set_flashdata('L_strErrorMessage','Rack Rate Calculation Updated Successfully');
			redirect($this->config->item('base_url').'endorsement_transaction/view_calculation/'.$form_field['calc_id']);
			
		}
		
		//echo "<pre>";print_r($_POST);echo"</pre>";exit;
		
	}
	
	
	


	function deletes($id)
	{
        // if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        // {
        //     foreach($_POST['selected'] as $selCheck) 
        //     {
			// echo "test";exit;
				$id= $this->admin->xss_clean_inputData($id);
				
				$all_data = $this->endorsement_transaction_model->get_all_data($id);
				
				//echo "<pre>";print_r($id);echo"</pre>";exit;
				
				$log_data = array(
					'username' => $this->session->userdata('username'),
					'login_user_id' => $this->session->userdata('adminId'),
					'module_name' => 'Delete Endorsement Transaction',
					'corporate_name' => $all_data->corporate_id,
					'policy_number' => $all_data->policy_no,
					'created_at' => date('Y-m-d h:i:sa')
				);

				$this->admin->log_data_manage($log_data);
								
                if($this->endorsement_transaction_model->deletes($id)) 
                {
					$this->session->set_flashdata('L_strErrorMessage','Endorsement Transaction Deleted Successfully');
				}  
		// 		else 
		// 		{
		// 				$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!');
		// 				break;
		// 		}
		// 	// }
		// // }
		redirect($this->config->item('base_url').'endorsement_transaction/lists');
	}
	
	function delete_rack_rate_attribute_addition($rack_rate_attribute_id){
		
		$data['calculation_addition_attribute'] = $this->endorsement_transaction_model->get_endorsement_calculation_addition_attribute_using_id($rack_rate_attribute_id);
		
		$data['calculation_data'] = $this->endorsement_transaction_model->get_calculation_table_data($data['calculation_addition_attribute']->endorsement_calculation_id);
		
		$calculation_data_total_additional_premium = $data['calculation_data']->total_additional_premium;
		
		$calculation_data_total_deletion_premium = $data['calculation_data']->total_deletion_premium;
		
		$calculation_addition_attribute_total_additional_premium = $data['calculation_addition_attribute']->addition_premium_addition;
		
		
		$total_premium = $calculation_data_total_additional_premium - $calculation_addition_attribute_total_additional_premium;
		
		$net_premium = $total_premium - $calculation_data_total_deletion_premium;
		
		$net_premium_with_gst = $net_premium * 1.18;
		
		$content ['total_additional_premium'] = $total_premium;
		$content ['total_deletion_premium'] = $calculation_data_total_deletion_premium;
		$content ['net_premium'] = $net_premium;
		$content ['net_premium_with_gst'] = $net_premium_with_gst;
		
		$this->endorsement_transaction_model->update_calculation_table_data_using_addition_attribute($data['calculation_addition_attribute']->endorsement_calculation_id,$content);
		
		
		$this->endorsement_transaction_model->addition_attribute_delete($data['calculation_addition_attribute']->id);
		
		//echo "<pre>";print_r($content);echo"</pre>";exit;
		
		$this->session->set_flashdata('L_strErrorMessage','Addition Premium Attribute Deleted Successfully');
			redirect($this->config->item('base_url').'endorsement_transaction/view_calculation/'.$data['calculation_addition_attribute']->endorsement_calculation_id);
		
		//echo $calc_id;exit;
		
	}
	
	
	function delete_rack_rate_attribute_deletion($rack_rate_attribute_id){
		
		$data['calculation_deletion_attribute'] = $this->endorsement_transaction_model->get_endorsement_calculation_deletion_attribute_using_id($rack_rate_attribute_id);
		
		//echo "<pre>";print_r($data['calculation_deletion_attribute']);echo"</pre>";exit;
		
		$data['calculation_data'] = $this->endorsement_transaction_model->get_calculation_table_data($data['calculation_deletion_attribute']->endorsement_calculation_id);
		
		$calculation_data_total_additional_premium = $data['calculation_data']->total_additional_premium;
		
		$calculation_data_total_deletion_premium = $data['calculation_data']->total_deletion_premium;
		
		$calculation_deletion_attribute_total_deletion_premium = $data['calculation_deletion_attribute']->addition_premium_deletion;
		
		$total_premium = $calculation_data_total_additional_premium;
		
		$total_premium_deletion = $calculation_data_total_deletion_premium - $calculation_deletion_attribute_total_deletion_premium;
		
		$net_premium = $total_premium - $total_premium_deletion;
		
		$net_premium_with_gst = $net_premium *1.18;
		
		$content ['total_additional_premium'] = $total_premium;
		$content ['total_deletion_premium'] = $total_premium_deletion;
		$content ['net_premium'] = $net_premium;
		$content ['net_premium_with_gst'] = $net_premium_with_gst;
		
		$this->endorsement_transaction_model->update_calculation_table_data_using_addition_attribute($data['calculation_deletion_attribute']->endorsement_calculation_id,$content);
		
		
		$this->endorsement_transaction_model->deletion_attribute_delete($data['calculation_deletion_attribute']->id);
		
		//echo "<pre>";print_r($content);echo"</pre>";exit;
		
		$this->session->set_flashdata('L_strErrorMessage','Deletion Premium Attribute Deleted Successfully');
			redirect($this->config->item('base_url').'endorsement_transaction/view_calculation/'.$data['calculation_deletion_attribute']->endorsement_calculation_id);
		
		//echo $calc_id;exit;
		
	}





    function show_policy_using_corporate(){

    	// echo "<pre>";print_r($_POST);echo"</pre>";exit;
        $pro_id = $_POST['pro_id'];
        $radio_val = $_POST['radio_val'];

          // echo $radio_val;
        $data = $this->endorsement_transaction_model->show_policy_using_corporate($pro_id);
		// 
        // echo $data; exit;
        if($radio_val == 1){
        $html = '<select id="policy_no" name="policy_no" class="form-control" onChange="showUser(this.value)">';
    	}else{
    		$html = '<select id="policy_no_cheque" name="policy_no_cheque" class="form-control" onChange="showUser(this.value)">';
    	}
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


    function show_cd_Number_using_corporate(){
        $pro_id = $_POST['pro_id'];
        // $po_id = $_POST['po_id'];

        //  echo $pro_id;
        $data = $this->endorsement_transaction_model->show_cd_Number_using_corporate($pro_id);
		//  echo "<pre>";print_r($data);echo"</pre>";exit;
        // echo $data; exit;
        $html = '<select id="cd_number_id" name="cd_number_id" class="form-control">';
        $html .= '<option value="">Select CD Number</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->cd_number ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

    function get_policy_start_date(){
        $pro_id = $_POST['pro_id'];
        // $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_transaction_model->show_policy_number($pro_id);
        //   echo "<pre>";print_r($data);echo"</pre>";exit;
		$html = $data[0]->policy_start_date;
        

        echo $html;
    }

    function show_policy_end_date(){
        $pro_id = $_POST['pro_id'];
        // $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_transaction_model->show_policy_number($pro_id);
        //echo "<pre>";print_r($data);echo "</pre>";exit;

        $html = $data[0]->policy_end_date;

        echo $html;
    }

    function download_report_old(){
		
		
		//echo "sd";exit;
		// ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
		
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
		
		$writer = new Xlsx($spreadsheet);

		$filename = 'test';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		
		//$writer->save('php://output'); // download file 
		
		$data['cd_id'] = $_POST['cd_id'];
        
		$corporate_data = $this->endorsement_transaction_model->get_corp_data($data['corporate_id']);
		
		$cd_data = $this->endorsement_transaction_model->get_cd_data($data['cd_id']);
		
		//echo "<pre>";print_r($cd_data);echo "</pre>";exit;
		
		
		$output = '';
		$output .= ',Corporate :,'.$corporate_data->co_name.'';
		
		$output .="\n";
		$output .= ',CD account No : ,'.$cd_data->cd_number.'';
		$output .="\n\n\n\n";
		
		$output .= ',Premium Amount Received';
		
		$output .="\n";
		
		$output .= ',SL No,Date,Details,Bank Name,Cheque-UTR No,Amount ( INR )';
		
		$output .="\n";
		
		$return = $this->endorsement_transaction_model->lists_new($data['corporate_id'],$data['cd_id']);
		
		//echo "<pre>";print_r($return);echo "</pre>";exit;
		
		if($return != ''){
			$k= 1;
			$check_total = "0";
			foreach($return as $return_data) {
				
				if($return_data->policy_endorsement_entry == 0){
					
					
					$output .= '" ","'.$k.'","'.$return_data->date.'","test","'.$return_data->bank_name.'","'.$return_data->cheque_utr_no.'","'.$return_data->amount.'"';  
		$output .="\n";
				
					//$output .= ' '.$k.'","test","'.$return_data->bank_name.'","'.$return_data->cheque_utr_no.'","'.$return_data->amount.'"';  
					
					//$output .="\n";
					$k++;
					
					$check_total +=$return_data->amount;
				}
				
				
			}
		}
		
		$output .= ',Total,,,,,'.$check_total.'';
		
		$output .="\n\n";
		
		$output .= ',Premium Adjustment Statement';
		
		$output .="\n";
		
		$output .= ',,Entry Data,Particulars,Emp Count,Dep Count,Policy OR Endt Number,Debit ( Incl GST ),Credit ( Incl GST ),Policy Type';
		
		$output .="\n";
		
		if($return != ''){
			$k= 1;
			$premium_entry_debit_total = "0";
			$premium_entry_credit_total = "0";
			foreach($return as $return_data) {
				
				if($return_data->policy_endorsement_entry == 1){
					
					
					$policy_no = $this->endorsement_transaction_model->get_policy_number($return_data->policy_no);
					
					$policy_type = $this->endorsement_transaction_model->get_policy_type_name($return_data->product_type);
					
					
					if($return_data->transaction_type == "debit"){
						
						$debit_amount = $return_data->gross_premium_policy;
						$premium_entry_debit_total += $debit_amount;
					}else{
						$debit_amount = 0;
					}
					
					
					if($return_data->transaction_type == "credit"){
						
						$credit_amount = $return_data->gross_premium_policy;
						
						$premium_entry_credit_total += $credit_amount;
						
					}else{
						$credit_amount = 0;
					}
					
					
					$output .= '" "," ","'.$return_data->date.'","'.$return_data->particular.'","'.$return_data->employee_count_policy.'","'.$return_data->dependent_count_policy.'","'.$policy_no.'","'.$debit_amount.'","'.$credit_amount.'","'.$policy_type.'"';  
					$output .="\n";
				
					//$output .= ' '.$k.'","test","'.$return_data->bank_name.'","'.$return_data->cheque_utr_no.'","'.$return_data->amount.'"';  
					
					//$output .="\n";
					$k++;
					
				}
				
				
			}
		}
		
		
		$balance_amount = $check_total - $premium_entry_debit_total + $premium_entry_credit_total;
		
		$output .= ',Total,,,,,,'.$premium_entry_debit_total.','.$premium_entry_credit_total.',';
		$output .="\n";
		$output .= ',Float Balance as on date,,,,,,'.$balance_amount.',,';
		
		
		
		//$output .= '"'.$corporate_data->co_name.'","'.$cd_data->cd_number.'"';  
		//$output .="\n";
		
		
		$filename = "cd-statement.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);
		echo $output;
		exit;
		
    }


    public function download_report(){
        
        //echo "sd";exit;
        /* ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL); */

        $data['corporate_id'] = $_POST['corporate_id'];
		
		$data['cd_id'] = $_POST['cd_id'];

        $corporate_data = $this->endorsement_transaction_model->get_corp_data($data['corporate_id']);
		
		$cd_data = $this->endorsement_transaction_model->get_cd_data($data['cd_id']);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // $sheet->setCellValue('A1', 'Hello World !');
        $sheet->setCellValue('B1', 'Corporate :');
        $sheet->setCellValue('C1', $corporate_data->co_name);

        $sheet->setCellValue('B2', 'CD account No :');
        $sheet->setCellValue('C2', $cd_data->cd_number);


        $return = $this->endorsement_transaction_model->lists_new($data['corporate_id'],$data['cd_id']);

        // echo "<pre>";print_r($return);echo "</pre>";exit;

        $sheet->setCellValue('B6', 'Premium Amount Received');
        $sheet->setCellValue('B7', 'Sr No');

        $sheet->setCellValue('C7', 'Date');

        $sheet->setCellValue('D7', 'Details');

        $sheet->setCellValue('E7', 'Bank Name');

        $sheet->setCellValue('F7', 'Cheque-UTR No');

        $sheet->setCellValue('G7', 'Amount(INR)');


        if($return != ''){
			$k= 1;
            $rowNo = 8;
			$check_total = "0";
			foreach($return as $return_data) {


				
				if($return_data->policy_endorsement_entry == 0){
					
					$sheet->setCellValue('B'.$rowNo.'', $k);
                    $sheet->setCellValue('C'.$rowNo.'', $return_data->date);
                    $sheet->setCellValue('D'.$rowNo.'', $return_data->particular);
                    $sheet->setCellValue('E'.$rowNo.'', $return_data->bank_name);
                    $sheet->setCellValue('F'.$rowNo.'', $return_data->cheque_utr_no);
                    $sheet->setCellValue('G'.$rowNo.'', $return_data->amount);
		
					$k++;
                    $rowNo++;
					
					$check_total +=$return_data->amount;
				}
				
				
			}
		}

       // echo $rowNo;exit;

        $sheet->setCellValue('B'.$rowNo.'', 'Total');

        $sheet->setCellValue('G'.$rowNo.'', $check_total);


        $sheet->setCellValue('B14', 'Premium Adjustment Statement');
        $sheet->setCellValue('C15', 'Entry Data');
        $sheet->setCellValue('D15', 'Particulars');
        $sheet->setCellValue('E15', 'Emp Count');
        $sheet->setCellValue('F15', 'Dep Count');
        $sheet->setCellValue('G15', 'Policy OR Endt Number');
        $sheet->setCellValue('H15', 'Debit (Incl GST)');
        $sheet->setCellValue('I15', 'Credit (Incl GST)');
        $sheet->setCellValue('J15', 'Policy Type');


        if($return != ''){
			$k= 1;
            $rowNo_new = $rowNo + 6;
			$premium_entry_debit_total = "0";
			$premium_entry_credit_total = "0";
			foreach($return as $return_data) {
				
				if($return_data->policy_endorsement_entry == 1){
					
					
					$policy_no = $this->endorsement_transaction_model->get_policy_number($return_data->policy_no);
					
					$policy_type = $this->endorsement_transaction_model->get_policy_type_name($return_data->product_type);
					
					
					if($return_data->transaction_type == "debit"){
						
						$debit_amount = $return_data->gross_premium_policy;
						$premium_entry_debit_total += $debit_amount;
					}else{
						$debit_amount = 0;
					}
					
					
					if($return_data->transaction_type == "credit"){
						
						$credit_amount = $return_data->gross_premium_policy;
						
						$premium_entry_credit_total += $credit_amount;
						
					}else{
						$credit_amount = 0;
					}

                    $sheet->setCellValue('C'.$rowNo_new.'',$return_data->date);
                    $sheet->setCellValue('D'.$rowNo_new.'', $return_data->particular);
                    $sheet->setCellValue('E'.$rowNo_new.'', $return_data->employee_count_policy);
                    $sheet->setCellValue('F'.$rowNo_new.'', $return_data->dependent_count_policy );
                    $sheet->setCellValue('G'.$rowNo_new.'', $policy_no);
                    $sheet->setCellValue('H'.$rowNo_new.'', $debit_amount);
                    $sheet->setCellValue('I'.$rowNo_new.'', $credit_amount);
                    $sheet->setCellValue('J'.$rowNo_new.'', $policy_type);
					
					
					
				
					$k++;
                    $rowNo_new++;
					
				}
				
				
			}

            $balance_amount = $check_total - $premium_entry_debit_total + $premium_entry_credit_total;

            $sheet->setCellValue('B'.$rowNo_new.'', 'Total');

            $sheet->setCellValue('H'.$rowNo_new.'', $premium_entry_debit_total);

            $sheet->setCellValue('I'.$rowNo_new.'', $premium_entry_credit_total);

            $rowNo_new_final = $rowNo_new + 1;

            $sheet->setCellValue('B'.$rowNo_new_final.'', 'Float Balance as on date');

            $sheet->setCellValue('H'.$rowNo_new_final.'', $balance_amount);
		}



        //$spreadsheet->getActiveSheet()->getStyle('B1:C2')->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THICK)->setColor(new Color('FFFF0000'));
        // $spreadsheet->getActiveSheet()->getStyle("C1","B1")->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff');
        $spreadsheet->getActiveSheet()->getStyle('C1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff');
        $spreadsheet->getActiveSheet()->getStyle('B2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff');
        $spreadsheet->getActiveSheet()->getStyle('C2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff');

        $spreadsheet->getActiveSheet()->getStyle('B6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('B7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('C7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('D7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('E7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('F7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('G7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');


        $spreadsheet->getActiveSheet()->getStyle('B'.$rowNo.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('C'.$rowNo.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('D'.$rowNo.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('E'.$rowNo.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('F'.$rowNo.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('G'.$rowNo.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');


        $spreadsheet->getActiveSheet()->getStyle('B14')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('B15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('C15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('D15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('E15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('F15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('G15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('H15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('I15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');
        $spreadsheet->getActiveSheet()->getStyle('J15')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0050B8');


        $spreadsheet->getActiveSheet()->getStyle('B'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('C'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('D'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('E'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('F'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('G'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('H'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('I'.$rowNo_new.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');


        $spreadsheet->getActiveSheet()->getStyle('B'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('C'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('D'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('E'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('F'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('G'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('H'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        $spreadsheet->getActiveSheet()->getStyle('I'.$rowNo_new_final.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');
        
        $writer = new Xlsx($spreadsheet);

        $filename = 'Endorsement Transaction';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        //$writer->save('php://output'); // download file 
        
        ob_end_clean();
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit();
    }
	
	
	// function export_addition($e_id){
		
		
	// 	$get_endorsement_calculation_table_data = $this->endorsement_transaction_model->get_endorsement_calculation_table_data($e_id);
		
	// 	//echo "<pre>";print_r($get_endorsement_calculation_table_data);echo"</pre>";
		
		
	// 	$get_rack_rate = $this->endorsement_transaction_model->get_rack_rate_id($get_endorsement_calculation_table_data->corporate_id,$get_endorsement_calculation_table_data->policy_no,$get_endorsement_calculation_table_data->endorsement_type);
		
		
	// 	//echo "<pre>";print_r($get_rack_rate);echo"</pre>";

        
	// 	$export_addition_xl_file_data = $this->endorsement_transaction_model->export_addition_xl_file_data($e_id,$get_rack_rate->endorsement_type);
		
    //     //echo "<pre>";print_r($export_addition_xl_file_data);echo"</pre>";exit;

	// 	$spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //    	$sheet->setCellValue('A1', 'Employee ID');
    //     $sheet->setCellValue('B1', 'Employee Name');
    //     $sheet->setCellValue('C1', 'Relation');
    //     $sheet->setCellValue('D1', 'Date_of_joining_leaving');
	// 	$sheet->setCellValue('E1', 'Date of Birth (dd-mm-yyyy)');
	// 	$sheet->setCellValue('F1', 'Gender');
	// 	$sheet->setCellValue('G1', 'Age');
	// 	$sheet->setCellValue('H1', 'Sum Insured');
	// 	$sheet->setCellValue('I1', 'Age_Group');
	// 	$sheet->setCellValue('J1', 'Days');
	// 	$sheet->setCellValue('K1', 'Net Premium');
	// 	$sheet->setCellValue('L1', 'Gst');
	// 	$sheet->setCellValue('M1', 'Gross Premium');
		
	// 	$rows = 2;
	// 	$i=1;
		
	// 	$policy_end_date = date("d-m-Y", strtotime($get_endorsement_calculation_table_data->policy_end_date));
		
	// 	//
	// 	$total_net_premium = 0;
	// 	$total_gst_value = 0;
	// 	$total_gross_premium = 0;
		
    //     foreach ($export_addition_xl_file_data as $val){
			
			
	// 		$later = date("d-m-Y", strtotime($val->Date_of_joining_leaving));

	// 		$later = new DateTime($later);
	// 		$earlier = new DateTime($policy_end_date);
	// 		$day_diff = $later->diff($earlier)->format("%a");
	// 		$day_diff = $day_diff + 1;
			
			
			
	// 		$age_array = explode("-",$val->age_group);
	// 		$get_rack_rate_attribute = $this->endorsement_transaction_model->get_rack_rate_attribute($get_rack_rate->id,$age_array);
			
	// 		$premium_per_day = $get_rack_rate_attribute->annual_premium / 365 ;
			
	// 		$addition_premium =$premium_per_day * $day_diff  ;
			
	// 		$net_premium = $addition_premium;
			
	// 		$gross_premium = $addition_premium * 1.18;
			
	// 		$gst_value = $gross_premium - $net_premium;
			
	// 		//echo "<pre>";print_r($get_rack_rate_attribute);echo"</pre>";exit;
			
			
			
			
	// 		//echo "<pre>";print_r($day_diff);echo"</pre>";exit;
			
	// 		//
			
			
	// 		$sheet->setCellValue('A' . $rows, $val->employe_id);
    //         $sheet->setCellValue('B' . $rows, $val->employe_name);
    //         $sheet->setCellValue('C' . $rows, $val->relationship);
    //         $sheet->setCellValue('D' . $rows, $val->date_of_joining_leaving);
	//     	$sheet->setCellValue('E' . $rows, $val->date_of_birth);
	//     	$sheet->setCellValue('F' . $rows, $val->gender);
	// 		$sheet->setCellValue('G' . $rows, $val->age);
	// 		$sheet->setCellValue('H' . $rows, $val->sum_insured);
	// 		$sheet->setCellValue('I' . $rows, $val->age_group);
	// 		$sheet->setCellValue('J' . $rows, $day_diff);
	// 		$sheet->setCellValue('K' . $rows, $net_premium);
	// 		$sheet->setCellValue('L' . $rows, $gst_value);
	// 		$sheet->setCellValue('M' . $rows, $gross_premium);
			
	// 		//echo "<pre>";print_r($val->employe_name);echo"</pre>";
			
	// 		$total_net_premium += $net_premium;
	// 		$total_gst_value += $gst_value;
	// 		$total_gross_premium += $gross_premium;
			
	// 		$rows++;
	// 		$i++;
			
	// 	}
		
	// 	$sheet->setCellValue('J'.$rows.'', 'Total');

    //     $sheet->setCellValue('K'.$rows.'', $total_net_premium);
	// 	$sheet->setCellValue('L'.$rows.'', $total_gst_value);
	// 	$sheet->setCellValue('M'.$rows.'', $total_gross_premium);
		
		
		
	// 	$writer = new Xlsx($spreadsheet);
	// 	header('Content-Type: application/vnd.ms-excel');
	// 	header('Content-Disposition: attachment;filename="export-addition.xlsx"'); 
	// 	header('Cache-Control: max-age=0');
	// 	ob_end_clean();
	// 	$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
	// 	$writer->save('php://output');
	// 	exit();
		
	// 	//echo "<pre>";print_r($export_addition_xl_file_data);echo"</pre>";exit;
	// }

    function export_addition($e_id){
		
		
		$get_endorsement_calculation_table_data = $this->endorsement_transaction_model->get_endorsement_calculation_table_data($e_id);
		
		$export_addition_xl_file_data = $this->endorsement_transaction_model->export_addition_xl_file_data($e_id,$get_endorsement_calculation_table_data->endorsement_type);
		
       // echo "<pre>";print_r($export_addition_xl_file_data);echo"</pre>";

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Employee ID');
        $sheet->setCellValue('B1', 'Employee Name');
        $sheet->setCellValue('C1', 'Relation');
        $sheet->setCellValue('D1', 'Date_of_joining_leaving');
		$sheet->setCellValue('E1', 'Date of Birth (dd-mm-yyyy)');
		$sheet->setCellValue('F1', 'Gender');
		$sheet->setCellValue('G1', 'Age');
		$sheet->setCellValue('H1', 'Sum Insured');
		$sheet->setCellValue('I1', 'Age_Group');
		$sheet->setCellValue('J1', 'Days');
		$sheet->setCellValue('K1', 'Net Premium');
		$sheet->setCellValue('L1', 'Gst');
		$sheet->setCellValue('M1', 'Gross Premium');
		
		$rows = 2;
		$i=1;
		
		$policy_end_date = date("d-m-Y", strtotime($get_endorsement_calculation_table_data->policy_end_date));
		
		//
		$total_net_premium = 0;
		$total_gst_value = 0;
		$total_gross_premium = 0;
		
        foreach ($export_addition_xl_file_data as $val){


            $get_rack_rate = $this->endorsement_transaction_model->get_rack_rate_id_new($get_endorsement_calculation_table_data->corporate_id,$get_endorsement_calculation_table_data->policy_no,$get_endorsement_calculation_table_data->endorsement_type,$val->sum_insured);

            //echo "<pre>";print_r($val);echo"</pre>";
			
			
			// $later = date("d-m-Y", strtotime($val->Date_of_joining_leaving));

			// $later_export = new DateTime("05-01-2023");
			// $earlier_export = new DateTime("28-12-2023");
			// $day_diff = $later_export->diff($earlier_export)->format("%a");
			// $day_diff = $day_diff + 1;

			$later = date("d-m-Y", strtotime($val->date_of_joining_leaving));

			$later = new DateTime($later);
			$earlier = new DateTime($policy_end_date);
			$day_diff = $later->diff($earlier)->format("%a");
			$day_diff = $day_diff + 1;
			
			
			
			$age_array = explode("-",$val->age_group);
			$get_rack_rate_attribute = $this->endorsement_transaction_model->get_rack_rate_attribute($get_rack_rate->id,$age_array);
			
			$premium_per_day = $get_rack_rate_attribute->annual_premium / 365 ;
			
			$premium_per_day = number_format($premium_per_day,2,'.','');
			
			$addition_premium =$premium_per_day * $day_diff  ;
			
			$addition_premium = number_format($addition_premium,2,'.','');
			
			$net_premium = $addition_premium;
			
			$gross_premium = $addition_premium * 1.18;
			
			$gst_value = $gross_premium - $net_premium;
			
			//echo "<pre>";print_r($addition_premium);echo"</pre>";exit;
			
			
			
			
			//echo "<pre>";print_r($day_diff);echo"</pre>";exit;
			
			//
			
			
			$sheet->setCellValue('A' . $rows, $val->employe_id);
            $sheet->setCellValue('B' . $rows, $val->employe_name);
            $sheet->setCellValue('C' . $rows, $val->relationship);
            $sheet->setCellValue('D' . $rows, $val->date_of_joining_leaving);
	    	$sheet->setCellValue('E' . $rows, $val->date_of_birth);
	    	$sheet->setCellValue('F' . $rows, $val->gender);
			$sheet->setCellValue('G' . $rows, $val->age);
			$sheet->setCellValue('H' . $rows, $val->sum_insured);
			$sheet->setCellValue('I' . $rows, $val->age_group);
			$sheet->setCellValue('J' . $rows, $day_diff);
			$sheet->setCellValue('K' . $rows, $net_premium);
			$sheet->setCellValue('L' . $rows, $gst_value);
			$sheet->setCellValue('M' . $rows, $gross_premium);
			
			//echo "<pre>";print_r($val->employe_name);echo"</pre>";
			
			$total_net_premium += $net_premium;
			$total_gst_value += $gst_value;
			$total_gross_premium += $gross_premium;
			
			$rows++;
			$i++;
			
		}
		
		$sheet->setCellValue('J'.$rows.'', 'Total');

        $sheet->setCellValue('K'.$rows.'', $total_net_premium);
		$sheet->setCellValue('L'.$rows.'', $total_gst_value);
		$sheet->setCellValue('M'.$rows.'', $total_gross_premium);
		
		
		
		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="export-addition.xlsx"'); 
		header('Cache-Control: max-age=0');
		ob_end_clean();
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit();
		
		//echo "<pre>";print_r($export_addition_xl_file_data);echo"</pre>";exit;
	}
	
	function export_deletion($e_id){
		
		
		$get_endorsement_calculation_table_data = $this->endorsement_transaction_model->get_endorsement_calculation_table_data($e_id);
		
		$export_addition_xl_file_data = $this->endorsement_transaction_model->export_deletion_xl_file_data($e_id,$get_endorsement_calculation_table_data->endorsement_type);
		
       // echo "<pre>";print_r($export_addition_xl_file_data);echo"</pre>";

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Employee ID');
        $sheet->setCellValue('B1', 'Employee Name');
        $sheet->setCellValue('C1', 'Relation');
        $sheet->setCellValue('D1', 'Date_of_joining_leaving');
		$sheet->setCellValue('E1', 'Date of Birth (dd-mm-yyyy)');
		$sheet->setCellValue('F1', 'Gender');
		$sheet->setCellValue('G1', 'Age');
		$sheet->setCellValue('H1', 'Sum Insured');
		$sheet->setCellValue('I1', 'Age_Group');
		$sheet->setCellValue('J1', 'Days');
		$sheet->setCellValue('K1', 'Net Premium');
		$sheet->setCellValue('L1', 'Gst');
		$sheet->setCellValue('M1', 'Gross Premium');
		
		$rows = 2;
		$i=1;
		
		$policy_end_date = date("d-m-Y", strtotime($get_endorsement_calculation_table_data->policy_end_date));
		
		//
		$total_net_premium = 0;
		$total_gst_value = 0;
		$total_gross_premium = 0;
		
        foreach ($export_addition_xl_file_data as $val){


            $get_rack_rate = $this->endorsement_transaction_model->get_rack_rate_id_new($get_endorsement_calculation_table_data->corporate_id,$get_endorsement_calculation_table_data->policy_no,$get_endorsement_calculation_table_data->endorsement_type,$val->sum_insured);


			$later = date("d-m-Y", strtotime($val->date_of_joining_leaving));

			$later = new DateTime($later);
			$earlier = new DateTime($policy_end_date);
			$day_diff = $later->diff($earlier)->format("%a");
			$day_diff = $day_diff ;
			
			
			
			$age_array = explode("-",$val->age_group);
			$get_rack_rate_attribute = $this->endorsement_transaction_model->get_rack_rate_attribute($get_rack_rate->id,$age_array);
			
			$premium_per_day = $get_rack_rate_attribute->annual_premium / 365 ;
			
			$addition_premium =$premium_per_day * $day_diff  ;
			
			$net_premium = $addition_premium;
			
			$gross_premium = $addition_premium * 1.18;
			
			$gst_value = $gross_premium - $net_premium;
			
			
			$sheet->setCellValue('A' . $rows, $val->employe_id);
            $sheet->setCellValue('B' . $rows, $val->employe_name);
            $sheet->setCellValue('C' . $rows, $val->relationship);
            $sheet->setCellValue('D' . $rows, $val->date_of_joining_leaving);
	    	$sheet->setCellValue('E' . $rows, $val->date_of_birth);
	    	$sheet->setCellValue('F' . $rows, $val->gender);
			$sheet->setCellValue('G' . $rows, $val->age);
			$sheet->setCellValue('H' . $rows, $val->sum_insured);
			$sheet->setCellValue('I' . $rows, $val->age_group);
			$sheet->setCellValue('J' . $rows, $day_diff);
			$sheet->setCellValue('K' . $rows, $net_premium);
			$sheet->setCellValue('L' . $rows, $gst_value);
			$sheet->setCellValue('M' . $rows, $gross_premium);
			
			//echo "<pre>";print_r($val->employe_name);echo"</pre>";
			
			$total_net_premium += $net_premium;
			$total_gst_value += $gst_value;
			$total_gross_premium += $gross_premium;
			
			$rows++;
			$i++;
			
		}
		
		$sheet->setCellValue('J'.$rows.'', 'Total');

        $sheet->setCellValue('K'.$rows.'', $total_net_premium);
		$sheet->setCellValue('L'.$rows.'', $total_gst_value);
		$sheet->setCellValue('M'.$rows.'', $total_gross_premium);
		
		
		
		$writer = new Xlsx($spreadsheet);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="export-deletion.xlsx"'); 
		header('Cache-Control: max-age=0');
		ob_end_clean();
		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit();
		
		//echo "<pre>";print_r($export_addition_xl_file_data);echo"</pre>";exit;
	}

    function get_product_type(){
		
		
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];
        $policy_hidden_radio = $_POST['policy_hidden_radio'];

        // echo $radio_value;
        $data = $this->endorsement_transaction_model->get_product_type($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
		
		$get_type_id = $this->endorsement_transaction_model->get_type_id($data[0]->product_type);
        //echo $get_type_id; exit;
        if($policy_hidden_radio == 1){
        	$html = '<select id="product_type" name="product_type" class="form-control" >';
    	}else{
    		$html = '<select id="product_type_cheque" name="product_type_cheque" class="form-control" >';
    	}
        $html .= '<option value="">Select Product Type</option>';
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