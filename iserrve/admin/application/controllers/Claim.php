<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claim extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Claim_Model','cm');
        $this->load->model('policy_features_model');
		$this->load->model('admin');
        date_default_timezone_set("Asia/Kolkata");
        if($this->session->userdata('adminId') == ''){
    		    redirect($this->config->item('base_url'));
        }
    }

    function add()
  	{
      $this->load->library("Need_lib");
      $explode = explode("_",$this->input->post('relation'));

  		$form_field = $data = array(
        	'corporate' => '',
			'policy_no' => '',
			'product_type' => '',
			'employee_id' => '',
			'employee_name' => '',
			'contact_no' => '',
			'employee_email' => '',
			'relation' => '',
			'diagnosis' => '',
          	'estimated_amount' => '',
			'date_of_admission' => '',
			'hospital_name' => '',
          	'hospital_address' => '',
			'city' => '',
			'state' => '',
          	'pincode' => ''
  			);


  		if($this->input->post('action') == 'add_intimate_claim')
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

			//   echo "<pre>";print_r($data);echo "</pre>";exit;

            $result = $this->cm->add($data);

			$log_data = array(
				'username' => $this->session->userdata('username'),
				'login_user_id' => $this->session->userdata('adminId'),
				'module_name' => 'Create Intimate Claim',
				'corporate_name' => $data['corporate'],
				'policy_number' => $data['policy_no'],
				'created_at' => date('Y-m-d h:i:sa')
			);

			$this->admin->log_data_manage($log_data);

        		if($result == true){
        			if($this->input->post('tpa') == 'Health India Insurance TPA Services Private Limited'){
                  $employee_id = $this->admin->xss_clean_inputData($this->input->post('employee_id'));
                  $relation = $this->admin->xss_clean_inputData($this->input->post('relation'));
        					$member_id = $this->cm->get_member_id($employee_id,$relation);
        					$policy_no = $this->admin->xss_clean_inputData($this->input->post('policy_original_number'));
        					$res = $this->need_lib->add_to_healthindia($data,$policy_no,$member_id);
        			}
					
					$corp_name =  $this->cm->get_corporate_data($this->input->post('corporate'));
					
					//echo $corp_name;exit;
        			/***email configuration***/
        			// $employee_no = $this->session->userdata("login_id");
        			// $result = $this->em->get_employee_details($employee_no);
        			// echo '<pre>';print_r($result);exit;
        			$to = $this->input->post('employee_email');
        			$subject = 'Claim Request';
        			$message = '<!DOCTYPE html>
        										<html>
        										    <head>
        										        <meta charset="utf-8" />
        										        <title>Registration Email</title>
        										        <style>
        										            .logo {
        										                text-align: center;
        										                width: 100%;
        										            }

        										            .wrapper {
        										                width: 100%;

        										                max-width: 500px;

        										                margin: auto;

        										                font-size: 14px;

        										                line-height: 24px;

        										                font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;

        										                color: #555;
        										            }

        										            .wrapper div {
        										                height: auto;

        										                float: left;

        										                margin-bottom: 15px;

        										                width: 100%;
        										            }

        										            .text-center {
        										                text-align: center;
        										            }

        										            .email-wrapper {
        										                padding: 5px;

        										                border: 1px solid #ccc;

        										                width: 100%;
        										            }

        										            .big {
        										                text-align: center;

        										                font-size: 26px;

        										                color: #e31e24;

        										                font-weight: bold;

        										                margin-bottom: 0 !important;

        										                text-transform: uppercase;

        										                line-height: 34px;
        										            }

        										            .welcome {
        										                font-size: 17px;

        										                font-weight: bold;
        										            }

        										            .footer {
        										                text-align: center;

        										                color: #999;

        										                font-size: 13px;
        										            }
        										        </style>
        										    </head>
        										    <body>
        										        <div class="wrapper">
        										            <div class="logo">
        										                <img src="https://www.raghnall.co.in/iserrve-beta/assets/employee_assets/img/logo-iserrve.png" style="width: 30%;" />
        										            </div>
        										            <div class="email-wrapper">
        										                <table style="border-collapse: collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">
        										                    <tr>
        										                        <td>
        										                            <table width="100%" border="0" cellspacing="0" cellpadding="5">
        										                                <tr>
        										                                    <td style="font-size: 18px;">Hello ,</td>
        										                                </tr>
        										                                <tr>
        										                                    <td style="line-height: 20px;">
        										                                        Please find the below Policy Claim details
        										                                    </td>
        										                                </tr>
        										                            </table>
        										                        </td>
        										                    </tr>
        										                    <tr>
        										                        <td>
        										                            <table style="border-top: 3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">
        										                                <tr>
        										                                    <td width="50%">
        										                                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
        										                                            <tr>
        										                                                <td width="100px">Employee No:</td>
        										                                                <td>'.$this->input->post('employee_id').'</td>
        										                                            </tr>
        										                                            <tr>
        										                                                <td width="100px">Name:</td>
        										                                                <td>'.$this->input->post('employee_name').'</td>
        										                                            </tr>
        										                                            <tr>
        										                                                <td width="100px">Contact No:</td>
        										                                                <td>'.$this->input->post('contact_no').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Email:</td>
        										                                                <td>'.$this->input->post('employee_email').'</td>
        										                                            </tr>
                                                                        <tr>
        																																		<td width="100px">Corporate:</td>
        																																		<td>'.$corp_name.'</td>
        																																</tr>
        																																<tr>
        																																		<td width="100px">Policy No.:</td>
        																																		<td>'.$this->input->post('policy_original_number').'</td>
        																																</tr>
        																																<tr>
        										                                                <td width="100px">Relation of the patient with employee:</td>
        										                                                <td>'.$this->input->post('relation').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Dignosis:</td>
        										                                                <td>'.$this->input->post('diagnosis').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Estimated Amount:</td>
        										                                                <td>'.$this->input->post('estimated_amount').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Date of Admission:</td>
        										                                                <td>'.date('d-m-Y', strtotime($this->input->post('date_of_admission'))).'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Hospital Name:</td>
        										                                                <td>'.$this->input->post('hospital_name').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Hospital Address:</td>
        										                                                <td>'.$this->input->post('hospital_address').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">City:</td>
        										                                                <td>'.$this->input->post('city').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">State:</td>
        										                                                <td>'.$this->input->post('state').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Pincode:</td>
        										                                                <td>'.$this->input->post('pincode').'</td>
        										                                            </tr>
        																																<tr>
        										                                                <td width="100px">Remarks:</td>
        										                                                <td>'.$this->input->post('remarks').'</td>
        										                                            </tr>
        										                                        </table>
        										                                    </td>
        										                                </tr>
        										                            </table>
        										                        </td>
        										                    </tr>
        										                </table>
        										            </div>
        										        </div>
        										    </body>
        										</html>';


        					$addcc = array();
        					$addcc[0] = 'iSerrve@raghnall.net';
        					$i= 1;
        					if(!empty($this->input->post('hr_email'))){
        						$addcc[$i] = $this->input->post('hr_email');
        						$i+1;
        					}
        					if(!empty($this->input->post('sales_person_email'))){
        						$i=$i+1;
        						$addcc[$i] = $this->input->post('sales_person_email');
        					}
        					if(!empty($this->input->post('operations_person_email'))){
        						$i=$i+1;
        						$addcc[$i] = $this->input->post('operations_person_email');
        					}
        					if(!empty($this->input->post('tpa_person_email'))){
        						$i=$i+1;
        						$addcc[$i] = $this->input->post('tpa_person_email');
        					}

        			if($this->sent_claim_mail($to,$subject,$message,$addcc)){
                  $this->session->set_flashdata('L_strErrorMessage','Intimate claim request submitted successfully');
      						redirect($this->config->item('base_url').'claim/list');
              }
        }
  				if ($this->validation->run() == FALSE){
  					$data['L_strErrorMessage'] = $this->validation->error_string;
  					}
  		}
  		$data['allcorporate']= $this->policy_features_model->allcorporate();
  		$data['allproduct_name'] = $this->policy_features_model->allproduct_name();
      $data['state'] = $this->cm->get_all_state();
  		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";

  		$this->load->view('add_intimate_claim',$data);
  	}

    public function list(){
        $data['claim']= $this->cm->get_claim_list();
        $this->load->view('list_claim_data',$data);
    }

    public function upload_claim(){
        $data['allcorporate']= $this->policy_features_model->allcorporate();
    		$data['allproduct_name'] = $this->policy_features_model->allproduct_name();
        $this->load->view('upload_claim',$data);
    }
    // public function delete(){
    //     if($this->input->post('checkbox_value')){
    //          $id = $this->input->post('checkbox_value');
    //          for($count = 0; $count < count($id); $count++)
    //          {
    //           $this->ec->delete_e_card($id[$count]);
    //          }
    //          $this->session->set_flashdata('L_strErrorMessage','E-Card Deleted Successfully');
    //
    //     }
    // }

    public function show_employee_data(){
        $corporate = $_POST['corporate'];
        $policy_no = $_POST['policy_no'];
        $data = $this->cm->get_employee_data($corporate,$policy_no);
        echo json_encode($data);
    }

    public function get_employee_relations(){
      $employee_no = $_POST['employee_no'];
      $data = $this->cm->get_employee_relations($employee_no);
      echo json_encode($data);
    }

    public function get_policy(){
        $corporate = $_POST['corporate'];
        $data = $this->cm->get_policy_data($corporate);
        echo json_encode($data);
    }

    public function sent_claim_mail($to,$subject,$message,$addcc){
  	    $this->load->library("Need_lib");
  			$AddAttachment = array();
  			if($this->need_lib->mail_sent($to,$subject,$message,$addcc,$AddAttachment)){
          return true;
        }
  	}

    public function add_file(){
  		  $form_field = $data = array(
    			'corporate_id' => '',
    			'policy_no' => '',
  			);

  		  if($this->input->post('action') == 'add_XLS'){
      			foreach($form_field as $key => $value)
      			{
      				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));
      			}
      			$this->load->library('validation');
      			$rules['product_name'] = "trim|required";
      			$this->validation->set_rules($rules);
      			$fields['product_name'] = "Name";
      			$this->validation->set_fields($fields);
    				$corporate_id = $data['corporate_id'];
    				$policy_id = $data['policy_no'];

    				if($_FILES['csv']['name'] != ''){
    					$this->upload_atribute_xl($_FILES['csv'],$policy_id);
    				}else{
    					$this->session->set_flashdata('flashError','Something went wrong');
    				  redirect($this->config->item('base_url').'claim/upload_claim_list');
    				}
    		}
  	}


    function upload_atribute_xl($csv,$policy_id){
        ini_set('memory_limit', -1);
        if ($this->input->post('action') == 'add_XLS') {


			$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


			if(isset($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $file_mimes)) {

				$arr_file = explode('.', $_FILES['csv']['name']);
				$extension = end($arr_file);

				if('csv' == $extension) {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				}

				$spreadsheet = $reader->load($_FILES['csv']['tmp_name']);

				$sheetData = $spreadsheet->getActiveSheet()->toArray();

					if (!empty($sheetData)) {
						for ($i=1; $i<count($sheetData); $i++) {

							$data['employee_id'] = $sheetData[$i][0];
							$data['employee_name'] = $sheetData[$i][1];
							$data['patient_name'] = $sheetData[$i][2];
							$data['relation'] = $sheetData[$i][3];
							$data['claim_type'] = $sheetData[$i][4];
							$data['tpa_claim_no'] = $sheetData[$i][5];
							$hospitlization_date = $sheetData[$i][6];

							$data['hospitlization_date'] = date("Y-m-d",strtotime($hospitlization_date));

							$discharge_date = $sheetData[$i][7];
							$data['discharge_date'] = date("Y-m-d",strtotime($discharge_date));


							$data['hospital_name'] = $sheetData[$i][8];
							$data['amount_claimed'] = $sheetData[$i][9];
							$data['sactioned_amount'] = $sheetData[$i][10];
							$data['claim_status'] = $sheetData[$i][11];
							$data['gender'] = $sheetData[$i][12];
							$data['hospital_state'] = $sheetData[$i][13];
							$data['network_status'] = $sheetData[$i][14];
							$data['treatment_type'] = $sheetData[$i][15];
							$data['level_of_care'] = $sheetData[$i][16];
							$data['disease'] = $sheetData[$i][17];
							$data['city'] = $sheetData[$i][18];
							$data['age'] = $sheetData[$i][19];

							$claim_filed_date = $sheetData[$i][20];
							$data['claim_filed_date'] = date("Y-m-d",strtotime($claim_filed_date));

							$claim_settled_date = $sheetData[$i][21];
							$data['claim_settled_date'] = date("Y-m-d",strtotime($claim_settled_date));

							$data['disease_category'] = $sheetData[$i][22];
							$claim_register_date = $sheetData[$i][23];
							$data['claim_register_date'] = date("Y-m-d",strtotime($claim_register_date));

							$data['intimation_method'] = $sheetData[$i][24];
							$data['sum_insured'] = $sheetData[$i][25];
							$data['tds_amount'] = $sheetData[$i][26];
							$data['deduction_amount'] = $sheetData[$i][27];
							$data['deduction_reason'] = $sheetData[$i][28];

							$deficiency_intimated_date = $sheetData[$i][29];
							$data['deficiency_intimated_date'] = date("Y-m-d",strtotime($deficiency_intimated_date));

							$deficiency_submission_date = $sheetData[$i][30];
							$data['deficiency_submission_date'] = date("Y-m-d",strtotime($deficiency_submission_date));

							$data['icd_code'] = $sheetData[$i][31];
							$data['claim_paid_amount'] = $sheetData[$i][32];
							$data['closure_reason'] = $sheetData[$i][33];
							$data['deficiency_reason'] = $sheetData[$i][34];
							$data['claim_sub_status'] = $sheetData[$i][35];
							$data['insurance_claim_no'] = $sheetData[$i][36];
							$data['created_at'] = date('Y-m-d H:i:s');
							$data['corporate'] = $this->input->post('corporate_id');
							$data['policy_no'] = $this->input->post('policy_no');


							// echo "<pre>";print_r($data);echo "</pre>";exit;
							$tpa_claim_no = $data['tpa_claim_no'];
							$insurance_claim_no = $data['insurance_claim_no'];

							if(!empty($tpa_claim_no) || !empty($insurance_claim_no)){
								$id = $this->cm->check_claim_exist($tpa_claim_no,$insurance_claim_no);
								if(!empty($id)){
									$this->cm->upload_claim_update_data($id,$data);
								}else{
									$this->cm->upload_claim_data($data);
								}

								$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Upload Claim Data',
									'corporate_name' => $data['corporate'],
									'policy_number' => $data['policy_no'],
									'created_at' => date('Y-m-d h:i:sa')
								);
			
								$this->admin->log_data_manage($log_data);
							}else{
								$this->session->set_flashdata('flashError','Plese Check XLS File');
										redirect($this->config->item('base_url').'claim/upload_claim_list');
						}

					}

					$this->session->set_flashdata('L_strErrorMessage', 'Upload Claims Successfully');
            redirect($this->config->item('base_url') . 'claim/upload_claim_list/');

				}

			}


        }




  	}

    public function upload_claim_list(){
        $data['upload_claim']= $this->cm->get_all_upload_claims();
        $this->load->view('list_upload_claims',$data);
    }

    public function add_claim_by_api(){
        $data['allcorporate']= $this->policy_features_model->allcorporate();
        $data['allproduct_name'] = $this->policy_features_model->allproduct_name();
        $this->load->view('upload_claim_api',$data);
    }

    public function insert_claim_by_api(){
        $this->load->library("Need_lib");
        $policy_id = $this->admin->xss_clean_inputData($this->input->post('policy_no'));
        $policy_no = $this->cm->get_policy_no($policy_id);
        $corporate = $this->admin->xss_clean_inputData($this->input->post('corporate_id'));
        $lib = $this->need_lib->insert_claim_by_api($policy_no);
        $claim_data= json_decode($lib->result, TRUE);

        for ($i=0; $i < count($claim_data); $i++) {
          switch ($claim_data[$i]['GENDER']) {
              case "F":
                  $gender = "Female";
              break;
              case "M":
                  $gender =  "Male";
              break;
              default:
                  $gender = "Other";
          }

          $arrayName = array(
              'corporate' => $corporate,
              'policy_no' => $policy_id,
              'employee_id' => $claim_data[$i]['EMPLOYEE_NO'],
              'employee_name' => $claim_data[$i]['EMPLOYEE_NAME'],
              'patient_name' => $claim_data[$i]['PATIENT_NAME'],
              'relation' => $claim_data[$i]['PATIENT_REALTION'],
              'claim_type' =>$claim_data[$i]['TYPE_OF_CLAIM'],
              'tpa_claim_no' => $claim_data[$i]['TPA_CLAIM_NO'],
              'hospitlization_date' => (!empty($claim_data[$i]['DATE_OF_ADMISSION'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $claim_data[$i]['DATE_OF_ADMISSION']))) : '',
              'discharge_date' => (!empty($claim_data[$i]['DATE_OF_DISCHARGE'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $claim_data[$i]['DATE_OF_DISCHARGE']))) : '',
              'hospital_name' => $claim_data[$i]['HOSPITAL_NAME'],
              'amount_claimed' => $claim_data[$i]['REPORTED_AMOUNT'],
              'sactioned_amount' => $claim_data[$i]['PAID_AMOUNT'],
              'claim_status' => $claim_data[$i]['CLAIM_STATUS'],
              'gender' => $gender,
              'hospital_state' => $claim_data[$i]['HOSPITAL_STATE'],
              'network_status' =>$claim_data[$i]['NETWORK_STATUS'],
              'treatment_type' =>$claim_data[$i]['TREATMENT_TYPE'],
              'level_of_care' =>$claim_data[$i]['LEVEL_OF_CARE'],
              'disease' => $claim_data[$i]['FINAL_DIAGNOSIS'],
              'city' =>$claim_data[$i]['CITY'],
              'age' =>$claim_data[$i]['AGE'],
              'claim_filed_date' => (!empty($claim_data[$i]['FILE_RECEIVED_DATE'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $claim_data[$i]['FILE_RECEIVED_DATE']))) : '',
              'claim_settled_date' => (!empty($claim_data[$i]['DATE_OF_SETTLEMENT'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $claim_data[$i]['DATE_OF_SETTLEMENT']))) : '',
              'disease_category' => $claim_data[$i]['DISEASE_CATEGORY'],
              'claim_register_date' => (!empty($claim_data[$i]['CLAIM_REGISTERED_DATE'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $claim_data[$i]['CLAIM_REGISTERED_DATE']))) : '',
              'intimation_method' => $claim_data[$i]['INTIMATION_METHOD'],
              'sum_insured' => $claim_data[$i]['SUM_INSURED'],
              'tds_amount' => $claim_data[$i]['TDS_AMOUNT'],
              'deduction_amount' => $claim_data[$i]['DEDUCTION_AMOUNT'],
              'deduction_reason' => $claim_data[$i]['DEDUCTION_REASONS'],
              'deficiency_intimated_date' => (!empty($claim_data[$i]['DEFICIENCY_INTIMATED_DATE'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $claim_data[$i]['DEFICIENCY_INTIMATED_DATE']))) : '',
              'deficiency_submission_date' => (!empty($claim_data[$i]['DEFICIENCIES_RETRIEVED_DATE'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $claim_data[$i]['DEFICIENCIES_RETRIEVED_DATE']))) : '',
              'icd_code' => $claim_data[$i]['ICD_CODE'],
              'claim_paid_amount' => $claim_data[$i]['PAID_AMOUNT'],
              'closure_reason' => $claim_data[$i]['REASON_FOR_CLOSURE'],
              'deficiency_reason' => $claim_data[$i]['Deficiency_Reason'],
              'claim_sub_status' => $claim_data[$i]['CLAIM_STATUS'],
              'insurance_claim_no' => $claim_data[$i]['INSURANCE_CLAIM_NO'],
              'created_at' => date('Y-m-d H:i:s'),
          );
		  

          $tpa_claim_no = $arrayName['tpa_claim_no'];
          $insurance_claim_no = $arrayName['insurance_claim_no'];

          $id = $this->cm->check_claim_exist($tpa_claim_no,$insurance_claim_no);
          if(!empty($id)){
               $this->cm->upload_claim_update_data($id,$arrayName);
          }else{
               $this->cm->upload_claim_data($arrayName);
          }

		  $log_data = array(
			'username' => $this->session->userdata('username'),
			'login_user_id' => $this->session->userdata('adminId'),
			'module_name' => 'Upload Claim Api Data',
			'corporate_name' => $arrayName['corporate'],
			'policy_number' => $arrayName['policy_no'],
			'created_at' => date('Y-m-d h:i:sa')
		);

		$this->admin->log_data_manage($log_data);
        }

        $this->session->set_flashdata('L_strErrorMessage', 'Upload Claims Successfully');
        redirect($this->config->item('base_url') . 'claim/upload_claim_list/');

    }

    public function getPatientDetails(){
  			$explode = explode("_",strip_tags($this->input->post('relation')));
  			$relation = $this->input->post('relation');
  			$policy_id = $this->input->post('policy_id');
  			$employee_id = $this->input->post('employee_id');
  			$result = $this->cm->get_patient_details_by_member_id($policy_id,$employee_id,$relation);
  			echo json_encode($result);
  	}

}
