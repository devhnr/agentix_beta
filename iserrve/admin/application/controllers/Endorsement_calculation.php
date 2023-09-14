<?php
require_once 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

	class Endorsement_calculation extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('endorsement_calculation_model');
		$this->load->model('admin');

		date_default_timezone_set('Asia/Kolkata');
	}
	function add()
	{

		


		$form_field = $data = array(  
				
			'corporate_id' => '',
			'policy_no' => '',
			'policy_start_date' => '',
			'policy_end_date' => '',
			'endorsement_type' => '',
			'total_additional_premium' => '',
			'total_deletion_premium' => '',
			'net_premium' => '',
			'net_premium_with_gst' => '',
			'endersoment_title' => '',
			'endersoment_number' => '',
			'transaction_statement' => '',
			
			);
		if($this->input->post('action') == 'add_endorsement_calculation') 
		{

			
			foreach($form_field as $key => $value)
			{	
				$data[$key]= $this->admin->xss_clean_inputData($this->input->post($key));		
			}

			

			$this->load->library('validation');
			$rules['endersoment_number'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['endersoment_number'] = "Name";
			$this->validation->set_fields($fields);
						
			$id = $this->endorsement_calculation_model->add($data);
			$log_data = array(
				'username' => $this->session->userdata('username'),
				'login_user_id' => $this->session->userdata('adminId'),
				'module_name' => 'Create Endorsement Calculation',
				'corporate_name' => $data['corporate_id'],
				'policy_number' => $data['policy_no'],
				'created_at' => date('Y-m-d h:i:sa')
			);

			$this->admin->log_data_manage($log_data);

			if($_FILES['add_user']['name'] != ''){


				
						
				$this->upload_addition_atribute_xl($id,$_FILES['add_user']);
			}

			if($_FILES['delete_user']['name'] != ''){
						
				$this->upload_deletion_atribute_xl($id,$_FILES['delete_user']);
			}

			$this->session->set_flashdata('L_strErrorMessage','Endorsement Calculation Added Successfully');
			redirect($this->config->item('base_url').'endorsement_calculation/lists');

			if ($this->validation->run() == FALSE){
				$data['L_strErrorMessage'] = $this->validation->error_string;
			} 
		}
		$data['allcorporate']= $this->endorsement_calculation_model->allcorporate();
		//$data['allproduct_name'] = $this->endorsement_calculation_model->allproduct_name();
		$data['allsum_insured'] = $this->endorsement_calculation_model->allsum_insured();
		//$data['allproduct_type'] = $this->endorsement_calculation_model->allproduct_type();
		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";
		
		$this->load->view('add_endorsement_calculation',$data);
	}

	function upload_addition_atribute_xl($id,$csv){
		
			$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


				if(isset($csv['name']) && in_array($csv['type'], $file_mimes)) {

					$arr_file = explode('.', $csv['name']);
					$extension = end($arr_file);
				
					if('csv' == $extension) {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
					} else {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					}
			
					$spreadsheet = $reader->load($csv['tmp_name']);


					$sheetData = $spreadsheet->getActiveSheet()->toArray();
         
					if (!empty($sheetData)) {
						for ($i=1; $i<count($sheetData); $i++) {

							$data_new['employe_id'] = $sheetData[$i][0];
                			$data_new['employe_name'] = $sheetData[$i][1];
							$data_new['relationship'] = $sheetData[$i][2];
							$data_new['date_of_joining_leaving'] = $sheetData[$i][3];
							$data_new['date_of_birth'] = $sheetData[$i][4];
							$data_new['gender'] = $sheetData[$i][5];
							$data_new['age'] = $sheetData[$i][6];
							$data_new['sum_insured'] = $sheetData[$i][7];
							$data_new['age_group'] = $sheetData[$i][8];
							
							
							
		
							$this->endorsement_calculation_model->add_addition_xls($data_new,$id);

							//echo "<pre>";print_r($data_new);echo"</pre>";exit;
							
						}

					}

				}

	}

			function upload_deletion_atribute_xl($id,$csv){

		
		
				$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


				if(isset($csv['name']) && in_array($csv['type'], $file_mimes)) {

					$arr_file = explode('.', $csv['name']);
					$extension = end($arr_file);
				
					if('csv' == $extension) {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
					} else {
						$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					}
			
					$spreadsheet = $reader->load($csv['tmp_name']);


					$sheetData = $spreadsheet->getActiveSheet()->toArray();
         
					if (!empty($sheetData)) {
						for ($i=1; $i<count($sheetData); $i++) {

							$data_new['employe_id'] = $sheetData[$i][0];
                			$data_new['employe_name'] = $sheetData[$i][1];
							$data_new['relationship'] = $sheetData[$i][2];
							$data_new['date_of_joining_leaving'] = $sheetData[$i][3];
							$data_new['date_of_birth'] = $sheetData[$i][4];
							$data_new['gender'] = $sheetData[$i][5];
							$data_new['age'] = $sheetData[$i][6];
							$data_new['sum_insured'] = $sheetData[$i][7];
							$data_new['age_group'] = $sheetData[$i][8];
							
							
							
		
							$this->endorsement_calculation_model->add_deletion_xls($data_new,$id);

							//echo "<pre>";print_r($data_new);echo"</pre>";exit;
							
						}

					}

				}
		
		
			}
    function edit($id)
	{	 
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->endorsement_calculation_model->get_policy_features($id);  
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'endorsement_type' => $result->endorsement_type,
						'corporate_id' => $result->corporate_id,
						'policy_no' => $result->policy_no,
						'sum_insured' => $result->sum_insured,
						'suminsure_hidden' => $result->suminsure_val,
						);

				if($this->input->post('action') == 'edit_endorsement_calculation') 
				{
				//	echo $id; die;
					foreach($data as $key => $value) {  $form_field[$key]=$this->admin->xss_clean_inputData($this->input->post($key));	}
					$this->load->library('validation');
					$rules['endorsement_type'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['endorsement_type']   = "name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['id'] = $id;
					} 
					else 
					{
						
							$this->endorsement_calculation_model->edit($id, $form_field);
							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Edit Endorsement Calculation',
								'corporate_name' => $form_field['corporate_id'],
								'policy_number' => $form_field['policy_no'],
								'created_at' => date('Y-m-d h:i:sa')
							);
				
							$this->admin->log_data_manage($log_data);
							$this->session->set_flashdata('L_strErrorMessage','Endorsement Calculation Updated Successfully');
							redirect($this->config->item('base_url').'endorsement_calculation/lists');
					}
				}
				//echo "<pre>";print_r($data);echo "</pre>";exit;
				$data['allcorporate'] = $this->endorsement_calculation_model->allcorporate();
				$data['allproduct_name'] = $this->endorsement_calculation_model->allproduct_name();
				$data['allpolicy_using_id'] = $this->endorsement_calculation_model->allpolicy_using_id($data['policy_no']);
				$data['allpolicy_using_corporate'] = $this->endorsement_calculation_model->allpolicy_using_corporate($data['corporate_id']);
				$data['allsum_insured'] = $this->endorsement_calculation_model->allsum_insured();
				$data['allproduct_type'] = $this->endorsement_calculation_model->allproduct_type();
				//echo "<pre>";print_r($data['allpolicy_using_id']);echo "</pre>";
				$data['addition_item'] = $this->endorsement_calculation_model->addition_item($id);
				$this->load->view('edit_endorsement_calculation',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Endorsement Calculation !!!!');
				redirect($this->config->item('base_url').'endorsement_calculation/lists');
			}
	}

	function removeprice($product_id, $id) {
        if ($this->endorsement_calculation_model->removeattriute($product_id, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Endorsement Calculation Attribite Deleted Succcessfully!!!!');
            redirect($this->config->item('base_url') . 'endorsement_calculation/edit/' . $product_id);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
            exit;
        }
    }
	//first function calling after pressing coupan tab... 
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'endorsement_calculation/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->endorsement_calculation_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return;
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_endorsement_calculation', $data);
	}
	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				$endorsement_calculation_data = $this->endorsement_calculation_model->get_policy_features($selCheck);

				if($this->endorsement_calculation_model->deletes($selCheck)) {

					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Delete Endorsement Calculation',
						'corporate_name' => $endorsement_calculation_data->corporate_id,
						'policy_number' => $endorsement_calculation_data->policy_no,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);

					$this->session->set_flashdata('L_strErrorMessage','Endorsement Calculation Deleted Successfully');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'endorsement_calculation/lists');
	}
	function userstatus($id,$value)	{	
	$result=$this->endorsement_calculation_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->endorsement_calculation_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'endorsement_calculation/lists');
	}	
	function updateorder($id,$val){
		$this->endorsement_calculation_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'endorsement_calculation/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_calculation_model->show_policy_number($pro_id);
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
        $data = $this->endorsement_calculation_model->show_policy_number($pro_id);

		$html = $data[0]->product_name;

        echo $html;
    }

	function get_policy_insurer(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_calculation_model->show_policy_number($pro_id);

		$html = $data[0]->insurer;

        echo $html;
    }

    function get_policy_suminsurance(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_calculation_model->get_policy_suminsurance($pro_id);
        // echo $data; exit;
        //echo "<pre>";print_r($data);echo"</pre>";exit;
        $html = '<select id="sum_insured" name="sum_insured" class="form-control multiple-select" onChange="get_sum_insure_val(this.value)">';
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
        $data = $this->endorsement_calculation_model->show_policy_using_corporate($pro_id);
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

	function show_policy_start_date(){
        $pro_id = $_POST['pro_id'];
        // $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_calculation_model->show_policy_number($pro_id);
        //echo "<pre>";print_r($data);echo "</pre>";exit;

        $html = $data[0]->policy_start_date;

        echo $html;
    }

	function show_policy_end_date(){
        $pro_id = $_POST['pro_id'];
        // $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->endorsement_calculation_model->show_policy_number($pro_id);
        //echo "<pre>";print_r($data);echo "</pre>";exit;

        $html = $data[0]->policy_end_date;

        echo $html;
    }

	function show_age_group(){

		$data['corporate'] = $_POST['corporate'];
		$data['policy_no'] = $_POST['policy_no'];
		$data['type'] = $_POST['val'];
		$policy_end_date = $_POST['policy_end_date'];
		//echo "<pre>";print_r($data);echo "</pre>";

		$get_rack_rates_id = $this->endorsement_calculation_model->get_rack_rates_id($data);
		
		$excel_array = json_decode($_POST['excel_array_new']);
		$age_count = array();

		
		foreach($excel_array as $excel_array_data){

			foreach($get_rack_rates_id as $get_rack_rates_data){

			$get_rack_rates_att = $this->endorsement_calculation_model->get_rack_rates_att($get_rack_rates_data->id);
			
			foreach($get_rack_rates_att as $get_rack_rates_att_data){

				$age_group_att = $get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto;

			
			$later = date("d-m-Y", strtotime($excel_array_data->Date_of_joining_leaving));

			$later = new DateTime($later);
			$earlier = new DateTime($policy_end_date);
			$day_diff = $later->diff($earlier)->format("%a");
			$day_diff = $day_diff + 1;

			if(!in_array($excel_array_data->Age_Group, $age_count)){

				if($data['type'] == 'Family Wise' && $excel_array_data->Relation == 'Employee'){


					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + 1;

						$days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + $day_diff;

					}

				}

				if($data['type'] == 'Per Life Wise' || $data['type'] == 'GPA' || $data['type'] == 'GTL' ){

					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + 1;
		
						$days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + $day_diff;

					}

				}

			}else{

				if($data['type'] == 'Family Wise' && $excel_array_data->Relation == 'Employee'){

					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] +  1;
						
						$days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $day_diff ;

					}

				}



				if($data['type'] == 'Per Life Wise' || $data['type'] == 'GPA' || $data['type'] == 'GTL'){

					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] +  1;
						$days_count[$excel_array_data->Age_Group] = $day_diff ;
					}
				}



			}

		

	}


		}

	}
	
		$html = "";

		$total_addition_premium = 0;

		foreach($get_rack_rates_id as $get_rack_rates_data){

		$get_rack_rates_att = $this->endorsement_calculation_model->get_rack_rates_att($get_rack_rates_data->id);
		foreach($get_rack_rates_att as $get_rack_rates_att_data){

			$annual_premium = $get_rack_rates_att_data->annual_premium;

			$premium_per_day = $annual_premium / 365 ;
			
			$premium_per_day = number_format($premium_per_day, 2, '.', '');

			$age_count_val = $age_count[$get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto][$get_rack_rates_data->suminsure_val];
			
			if($age_count_val != ''){
				
				$no_of_days =$days_count[$get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto][$get_rack_rates_data->suminsure_val] ;
				$addition_premium =$premium_per_day * $no_of_days  ;
			}else{
				
				$no_of_days =0;
				$addition_premium = "0";
			}
			
			
			$addition_premium = number_format($addition_premium, 2, '.', '');
			

			$html.="<tr>";
				$html.="<td>";
						$html.= $get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto;
						$html.= "<input type='hidden' name='age_name_addition[]' value='" .$get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto."'>";
				$html.="</td>";	

				$html.="<td><input type='number' name='suminsure_addition[]' value='" .$get_rack_rates_data->suminsure_val."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='annual_premium_addition[]' value='".$annual_premium."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='premium_per_day_addition[]' value='".$premium_per_day."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='count_addition[]' value='".$age_count_val."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='addition_premium_addition[]' value='".$addition_premium."' class='form-control' readonly></td>";

			$html.="</tr>";

			$total_addition_premium += $addition_premium;
		}

	}
		
		$total_addition_premium = number_format($total_addition_premium, 2, '.', '');
		
		$html.="<tr><input type='hidden' name='total_addition_premium_hidden' id='total_addition_premium_hidden' value='".$total_addition_premium."' class='form-control'></tr>";

		echo $html;
		// echo "<pre>";print_r($get_rack_rates_att);echo "</pre>";exit;

	}
	function show_age_group_deletion(){

		$data['corporate'] = $_POST['corporate'];
		$data['policy_no'] = $_POST['policy_no'];
		$data['type'] = $_POST['val'];
		$policy_end_date = $_POST['policy_end_date'];
		//echo "<pre>";print_r($data);echo "</pre>";

		$get_rack_rates_id = $this->endorsement_calculation_model->get_rack_rates_id($data);
		
		$excel_array = json_decode($_POST['excel_array_new']);
		$age_count = array();

		
		foreach($excel_array as $excel_array_data){

			foreach($get_rack_rates_id as $get_rack_rates_data){

			$get_rack_rates_att = $this->endorsement_calculation_model->get_rack_rates_att($get_rack_rates_data->id);
			
			foreach($get_rack_rates_att as $get_rack_rates_att_data){

				$age_group_att = $get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto;

			
			$later = date("d-m-Y", strtotime($excel_array_data->Date_of_joining_leaving));

			$later = new DateTime($later);
			$earlier = new DateTime($policy_end_date);
			$day_diff = $later->diff($earlier)->format("%a");
			$day_diff = $day_diff ;

			if(!in_array($excel_array_data->Age_Group, $age_count)){

				if($data['type'] == 'Family Wise' && $excel_array_data->Relation == 'Employee'){


					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + 1;

						$days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + $day_diff;

					}

				}

				if($data['type'] == 'Per Life Wise' || $data['type'] == 'GPA' || $data['type'] == 'GTL' ){

					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + 1;
		
						$days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] + $day_diff;

					}

				}

			}else{

				if($data['type'] == 'Family Wise' && $excel_array_data->Relation == 'Employee'){

					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] +  1;
						
						$days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $day_diff ;

					}

				}



				if($data['type'] == 'Per Life Wise' || $data['type'] == 'GPA' || $data['type'] == 'GTL'){

					if($get_rack_rates_data->suminsure_val == $excel_array_data->Sum_Insured && $age_group_att == $excel_array_data->Age_Group){

						$age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $age_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] +  1;
						$days_count[$excel_array_data->Age_Group][$excel_array_data->Sum_Insured] = $day_diff ;
					}
				}



			}

		

	}


		}

	}
	
		$html = "";

		$total_addition_premium = 0;

		foreach($get_rack_rates_id as $get_rack_rates_data){

		$get_rack_rates_att = $this->endorsement_calculation_model->get_rack_rates_att($get_rack_rates_data->id);
		foreach($get_rack_rates_att as $get_rack_rates_att_data){

			$annual_premium = $get_rack_rates_att_data->annual_premium;

			$premium_per_day = $annual_premium / 365 ;
			
			$premium_per_day = number_format($premium_per_day, 2, '.', '');

			$age_count_val = $age_count[$get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto][$get_rack_rates_data->suminsure_val];

			/* $no_of_days =$days_count[$get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto] ;
			$addition_premium =$premium_per_day * $no_of_days  ; */
			
			if($age_count_val != ''){
				
				$no_of_days =$days_count[$get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto][$get_rack_rates_data->suminsure_val] ;
				$addition_premium =$premium_per_day * $no_of_days  ;
			}else{
				
				$no_of_days =0;
				$addition_premium = "0";
			}
			
			$addition_premium = number_format($addition_premium, 2, '.', '');

			$html.="<tr>";
				$html.="<td>";
						$html.= $get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto;
						$html.= "<input type='hidden' name='age_name_deletion[]' value='" .$get_rack_rates_att_data->agefrom."-".$get_rack_rates_att_data->ageto."'>";
				$html.="</td>";	

				$html.="<td><input type='number' name='suminsure_deletion[]' value='" .$get_rack_rates_data->suminsure_val."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='annual_premium_deletion[]' value='".$annual_premium."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='premium_per_day_deletion[]' value='".$premium_per_day."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='count_deletion[]' value='".$age_count_val."' class='form-control' readonly></td>";

				$html.="<td><input type='number' name='addition_premium_deletion[]' value='".$addition_premium."' class='form-control' readonly></td>";

			$html.="</tr>";

			$total_addition_premium += $addition_premium;
		}

	}
		
		$total_addition_premium = number_format($total_addition_premium, 2, '.', '');
		
		$html.="<tr><input type='hidden' name='total_deletion_premium_hidden' id='total_deletion_premium_hidden' value='".$total_addition_premium."' class='form-control'></tr>";

		echo $html;

	}

	
}
?>