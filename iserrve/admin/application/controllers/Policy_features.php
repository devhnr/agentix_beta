<?php

	class Policy_features extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('policy_features_model');
		$this->load->model('admin');
	}
	function add()
	{
		$form_field = $data = array(  
				// 'name' => '',
				// 'page_url' => '',
			'insurer' => '',
			'corporate_id' => '',
			'product_name' => '',
			'policy_no' => '',
			'sum_insured' => '',
			'inclusions' => '',
			'exclusions' => '',
			'product_type' => '',

			);
		if($this->input->post('action') == 'add_policy_features') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));		
			}
			$this->load->library('validation');
			$rules['product_name'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['product_name'] = "Name";
			$this->validation->set_fields($fields);
						
						$policy_feature_id = $this->policy_features_model->add($data);

						$log_data = array(
							'username' => $this->session->userdata('username'),
							'login_user_id' => $this->session->userdata('adminId'),
							'module_name' => 'Create Policy Features',
							'corporate_name' => $data['corporate_id'],
							'policy_number' => $data['policy_no'],
							'created_at' => date('Y-m-d h:i:sa')
						);
	
						$this->admin->log_data_manage($log_data);
						
						if($policy_feature_id != ''){
							
							$newdata = array('policy_feature_id_session' => $policy_feature_id);

							$this->session->set_userdata($newdata);
						}
						
						$this->session->set_flashdata('L_strErrorMessage','Policy Features Added Successfully');
						redirect($this->config->item('base_url').'policy_features/lists');
						if ($this->validation->run() == FALSE){
					$data['L_strErrorMessage'] = $this->validation->error_string;
					} 
		}
		$data['allcorporate']= $this->policy_features_model->allcorporate();
		$data['allproduct_name'] = $this->policy_features_model->allproduct_name();
		$data['allsum_insured'] = $this->policy_features_model->allsum_insured();
		$data['allproduct_type'] = $this->policy_features_model->allproduct_type();
		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";
		
		$this->load->view('add_policy_features',$data);
	}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->policy_features_model->get_policy_features($id);  
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'insurer' => $result->insurer,
						'corporate_id' => $result->corporate_id,
						'product_name' => $result->product_name,
						'policy_no' => $result->policy_no,
						'sum_insured' => $result->sum_insured,
						'inclusions' => $result->inclusions,
						'exclusions' => $result->exclusions,
						'product_type' => $result->product_type,
						
						);

				if($this->input->post('action') == 'edit_policy_features') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['product_name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['product_name']   = "name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					} 
					else 
					{
							$this->policy_features_model->edit($id, $form_field);

							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Edit Policy Features',
								'corporate_name' => $form_field['corporate_id'],
								'policy_number' => $form_field['policy_no'],
								'created_at' => date('Y-m-d h:i:sa')
							);
		
							$this->admin->log_data_manage($log_data);
							$this->session->set_flashdata('L_strErrorMessage','Policy Features Updated Successfully');
							redirect($this->config->item('base_url').'policy_features/lists');
					}
				}

				$data['allcorporate'] = $this->policy_features_model->allcorporate();
				$data['allproduct_name'] = $this->policy_features_model->allproduct_name();
				$data['allpolicy_using_id'] = $this->policy_features_model->allpolicy_using_id($data['policy_no']);
				$data['allpolicy_using_corporate'] = $this->policy_features_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allsum_insured'] = $this->policy_features_model->allsum_insured();
				$data['allproduct_type'] = $this->policy_features_model->allproduct_type();
				$data['allproduct_type_new'] = $this->policy_features_model->allproduct_type_new($data['product_type']);
				//echo "<pre>";print_r($data['allpolicy_using_id']);echo "</pre>";
				
				$this->load->view('edit_policy_features',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Policy Features !!!!');
				redirect($this->config->item('base_url').'policy_features/lists');
			}
	}


	function copy_policy_fet($id)
	{	 
	// echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->policy_features_model->get_policy_features($id);  
				// echo "<pre>";print_r($result);echo "</pre>";exit;
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'insurer' => $result->insurer,
						'corporate_id' => $result->corporate_id,
						'product_name' => $result->product_name,
						'policy_no' => $result->policy_no,
						'sum_insured' => $result->sum_insured,
						'inclusions' => $result->inclusions,
						'exclusions' => $result->exclusions,
						'product_type' => $result->product_type,
						
						);



				if($this->input->post('action') == 'copy_policy_fet') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['product_name'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['product_name']   = "name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					} 
					else 
					{

						$policy_featured_data_copy = $this->policy_features_model->policy_featured_data_copy($form_field['policy_no'],$form_field['sum_insured']);

						// echo "<pre>";print_r($policy_featured_data_copy);echo "</pre>";exit;

						if($policy_featured_data_copy != 1){

							$this->policy_features_model->copy_policy_fet($form_field);

							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Copy Policy Features',
								'corporate_name' => $form_field['corporate_id'],
								'policy_number' => $form_field['policy_no'],
								'created_at' => date('Y-m-d h:i:sa')
							);
		
							$this->admin->log_data_manage($log_data);

							$this->session->set_flashdata('L_strErrorMessage','Policy Features Updated Successfully');
							redirect($this->config->item('base_url').'policy_features/lists');
							
						}else{
							$this->session->set_flashdata('flashError','Please Change Policy Number Or Sum Insured');
							redirect($this->config->item('base_url').'policy_features/copy_policy_fet/'.$result->id);
						}
							
					}
				}
		

				$data['allcorporate'] = $this->policy_features_model->allcorporate();
				$data['allproduct_name'] = $this->policy_features_model->allproduct_name();
				$data['allpolicy_using_id'] = $this->policy_features_model->allpolicy_using_id($data['policy_no']);
				$data['allpolicy_using_corporate'] = $this->policy_features_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allsum_insured'] = $this->policy_features_model->allsum_insured();
				$data['allproduct_type'] = $this->policy_features_model->allproduct_type();
				$data['allproduct_type_new'] = $this->policy_features_model->allproduct_type_new($data['product_type']);
				//echo "<pre>";print_r($data['allpolicy_using_id']);echo "</pre>";
				
				$this->load->view('copy_policy_features',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Policy Features !!!!');
				redirect($this->config->item('base_url').'policy_features/lists');
			}
	}
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'policy_features/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->policy_features_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_policy_features', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);
				
				$policy_features_data = $this->policy_features_model->get_policy_features($selCheck);
				//echo "<pre>";print_r($sum_insured_data);echo "</pre>";exit;
				if($this->policy_features_model->deletes($selCheck)) {

					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Policy Features',
						'corporate_name' => $policy_features_data->corporate_id,
						'policy_number' => $policy_features_data->policy_no,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);

					$this->session->set_flashdata('L_strErrorMessage','Policy Features Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'policy_features/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->policy_features_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->policy_features_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'policy_features/lists');
	}	
	function updateorder($id,$val){
		$this->policy_features_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'policy_features/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->policy_features_model->show_policy_number($pro_id);
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

    function get_policy_data(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->policy_features_model->show_policy_number($pro_id);

		$html = $data[0]->product_name;

        echo $html;
    }

	function get_policy_insurer(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->policy_features_model->show_policy_number($pro_id);

		$html = $data[0]->insurer;

        echo $html;
    }

    function get_policy_suminsurance(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->policy_features_model->get_policy_suminsurance($pro_id);
        // echo $data; exit;
        //echo "<pre>";print_r($data);echo"</pre>";exit;
        $html = '<select id="sum_insured" name="sum_insured" class="form-control multiple-select">';
        $html .= '<option value="">Select Sum Insured</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->id."' ".$selected . ">" . $data[$i]->sum_insured ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

	function show_policy_using_corporate(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->policy_features_model->show_policy_using_corporate($pro_id);
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

	function show_form_data(){

		$product_type_id = $_POST['product_type_id'];

		$get_form_field = $this->policy_features_model->get_form_field($product_type_id);
		//echo "<pre>";print_r($get_form_field);echo"</pre>";exit;

		$html = "";
		$i = 0;
		foreach($get_form_field as $get_form_field_data){

			if($get_form_field_data->type == 1){ //input type

				$html.='<div class="form-group">';
							$html .='<label for="inclusions" style="margin:15px 6px 5px 0px;">
							'.$get_form_field_data->label_name.'</label>';

							$html .='<input type="checkbox" name="checkbox[]" id="checkbox_'.$get_form_field_data->id.'" value="1" onclick="check_box_click('.$get_form_field_data->id.',this);" checked>';

							$html .='<input type="hidden" name="checkbox_hidden[]" id="checkbox_hidden_'.$get_form_field_data->id.'" value="1" >';

							$html .='<input type="hidden" name="field_id[]" id="field_id" value="'.$get_form_field_data->id.'" class="form-control" >';
							$html .='<input type="text" name="field_type[]" id="field_type" class="form-control"  placeholder="Enter '.$get_form_field_data->label_name.'">';
				$html .='</div>';


				
			}

			if($get_form_field_data->type == 2){ // textarea

				$html .='<div class="form-group">';
						$html .='<label for="inclusions" style="margin:15px 6px 5px 0px;">
								'.$get_form_field_data->label_name.'</label>';

								$html .='<input type="checkbox" name="checkbox[]" id="checkbox_'.$get_form_field_data->id.'" value="1" onclick="check_box_click('.$get_form_field_data->id.',this);" checked>';

								$html .='<input type="hidden" name="checkbox_hidden[]" id="checkbox_hidden_'.$get_form_field_data->id.'" value="1" >';


						$html .='<input type="hidden" name="field_id[]" id="field_id" value="'.$get_form_field_data->id.'" class="form-control" >';

						$html .='<textarea id="field_type" name="field_type[]" class="form-control"
						placeholder="Enter '.$get_form_field_data->label_name.'"></textarea>';


				$html .='</div>';
			}

			if($get_form_field_data->type == 3){ // select

				$form_field_attribute = $this->policy_features_model->form_field_attribute($get_form_field_data->id);
				///echo "<pre>";print_r($form_field_attribute);echo"</pre>";exit;
				$html .='<div class="form-group">';

				$html .='<label for="inclusions" style="margin:15px 6px 5px 0px;">
								'.$get_form_field_data->label_name.'</label>';
						
						$html .='<input type="hidden" name="field_id[]" id="field_id" value="'.$get_form_field_data->id.'" class="form-control" >';

						$html .='<input type="checkbox" name="checkbox[]" id="checkbox_'.$get_form_field_data->id.'" value="1" onclick="check_box_click('.$get_form_field_data->id.',this);" checked>';

							$html .='<input type="hidden" name="checkbox_hidden[]" id="checkbox_hidden_'.$get_form_field_data->id.'" value="1" >';


						$html .='<select id="field_type" name="field_type[]" class="form-control" >';

									$html .='<option value="">Select '.$get_form_field_data->label_name.'</option>';

									foreach($form_field_attribute as $form_field_attribute_data){

										$html .='<option value="'.$form_field_attribute_data->id.'">'.$form_field_attribute_data->option_name.'</option>';

									}

						$html .='</select>';

				$html .='</div>';
			}

			if($get_form_field_data->type == 4){ // Radio

				$form_field_attribute = $this->policy_features_model->form_field_attribute($get_form_field_data->id);

				$html .='<div class="form-group" style="width: 100%;display: inline-block;"><div class="col-md-3">';
							$html .='<label for="inclusions" style="margin:15px 6px 5px 0px; ">
									'.$get_form_field_data->label_name.'</label>';
							
							$html .='<input type="hidden" name="field_id_radio[]" id="field_id" value="'.$get_form_field_data->id.'" class="form-control" >';

							$html .='<input type="checkbox" name="checkbox_radio[]" id="checkbox_'.$get_form_field_data->id.'" onclick="check_box_radio_click('.$get_form_field_data->id.',this);" value="1" checked><br>';

							$html .='<input type="hidden" name="checkbox_radio_hidden[]" id="checkbox_radio_hidden_'.$get_form_field_data->id.'" value="1" >';
							
							foreach($form_field_attribute as $form_field_attribute_data){
						 		
								$html .='<input type="radio" id="html" name="radio_'.$form_field_attribute_data->form_field_id.'" value="'.$form_field_attribute_data->option_name.'" onclick="radio_hide_show_Attrdiv('.$get_form_field_data->id.',this.value);">';
								$html .='<label>'.$form_field_attribute_data->option_name.'</label>';

								
							}

				$html .='</div><div class="col-md-9"><div id="hide_radio_attr'.$get_form_field_data->id.'" style="display:none;">';
						
				$radio_attribute = $this->policy_features_model->radio_attribute($get_form_field_data->id);
				
				if($radio_attribute != ''){

					foreach($radio_attribute as $radio_attribute_data){

							if($radio_attribute_data->type == 1){

								$html.='<div class="form-group"  style="width: 40%; margin-left:15px">';
								$html .='<label for="inclusions" style="margin:15px 6px 5px 0px;">
								'.$radio_attribute_data->label_name.'</label>';

								$html .='<input type="checkbox" name="checkbox_radio_att[]" id="checkbox_'.$radio_attribute_data->id.'" onclick="check_box_radio_att_click('.$radio_attribute_data->id.',this);" value="1" checked><br>';

								$html .='<input type="hidden" name="checkbox_radio_att_hidden[]" id="checkbox_radio_att_hidden_'.$radio_attribute_data->id.'" value="1" >';

								$html .='<input type="hidden" name="field_id_radio_att[]" id="field_id_radio_att" value="'.$get_form_field_data->id.'" class="form-control" >';
								$html .='<input type="text" name="field_type_radio_att[]" id="field_type" class="form-control"  placeholder="Enter '.$radio_attribute_data->label_name.'">';
								
								$html .='</div>';

							}

							if($radio_attribute_data->type == 2){

								$html.='<div class="form-group"  style="width: 40%; margin-left:15px">';
								$html .='<label for="inclusions" style="margin:15px 6px 5px 0px;">
								'.$radio_attribute_data->label_name.'</label>';

								$html .='<input type="checkbox" name="checkbox_radio_att[]" id="checkbox_'.$radio_attribute_data->id.'" onclick="check_box_radio_att_click('.$radio_attribute_data->id.',this);" value="1" checked><br>';

								$html .='<input type="hidden" name="checkbox_radio_att_hidden[]" id="checkbox_radio_att_hidden_'.$radio_attribute_data->id.'" value="1" >';

								$html .='<input type="hidden" name="field_id_radio_att[]" id="field_id_radio_att" value="'.$get_form_field_data->id.'" class="form-control" >';

								

								$html .='<textarea id="field_type" name="field_type_radio_att[]" class="form-control"
						placeholder="Enter '.$radio_attribute_data->label_name.'"></textarea>';
								
								$html .='</div>';
							}
					}

				}
				//echo "<pre>";print_r($radio_attribute);echo"</pre>";

				$html .='</div></div></div>';

			}

			$i++;
		}

		echo $html;
		//echo "sd";exit;
	}
	
	function get_product_type(){
		
		
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->policy_features_model->get_product_type($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
		
		$get_type_id = $this->policy_features_model->get_type_id($data[0]->product_type);
        //echo $get_type_id; exit;
        $html = '<select id="product_type" name="product_type" class="form-control" onChange="show_form_data(this.value)">';
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
