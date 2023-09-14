<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/PHPExcel.php';

class ClaimController extends CI_Controller {

	function __construct(){
        parent::__construct();
				if(!$this->session->userdata("loginHR")){
						$redirection = str_replace('corporate/', '', base_url());
            redirect($redirection);
        }
        $this->load->model('Claim_Model','cm');
				$this->policies = $this->need_lib->get_policies();
  }

	public function claims(){
			$data=array('file'=>'claim-list');
			$data['records'] = $this->cm->get_no_of_claims();
	    $this->template->full_corporate_html_view($data);
	}

	public function showClaims() {
			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
      $result = array('data' => array());
      $data = $this->cm->get_all_claims($policy_id);
			if(!empty($data)){
					foreach ($data['records'] as $key => $value) {
							$view_details = '<button type="button" class="btn btn-sm editRecord bg-purple" data-id="'.base64_encode($value["id"]).'"  data-toggle="modal" data-target="#modal-lg" style="color:white;">View Details</button>';

							$result['data'][$key] = array(
											$key+1,
											$view_details,
											$value['employee_id'],
											ucwords(strtolower($value['employee_name'])),
											ucfirst(strtolower($value['patient_name'])),
											ucfirst(strtolower($value['relation'])),
											ucfirst(strtolower($value['claim_type'])),
											$value['claim_status'],
											$value['insurance_claim_no'],
											$value['hospitliz_date'],
											ucfirst(strtolower($value['hospital_name'])),
											number_format($value['amount_claimed']),
											number_format($value['sactioned_amount']),
											$value['created_date'],
							);
					}
					$result['tpa'] = isset($data['tpa']['tpa'])?$data['tpa']['tpa']:null;
			}

      echo json_encode($result);
	  }

		public function get_no_ofclaims(){
				$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
				$result = $this->cm->get_no_of_claims($policy_id);
				echo json_encode($result);
		}

		public function showCalimDetails() {
	        $result = array('data' => array());
					$claim_id = $this->input->post('claim_id');
	        $result = $this->cm->get_claim_details_by_id($claim_id);

					$output = '';
					if(!empty($result)){
							$output.= '<tr><th style="color:gray;">Employee ID</th><th>:</th><th>'.$result->employee_id.'</th></tr>
												<tr><th style="color:gray;">Employee Name</th><th>:</th><th>'.ucwords(strtolower($result->employee_name)).'</th></tr>
												<tr><th style="color:gray;">Beneficiary Name</th><th>:</th><th>'.ucwords(strtolower($result->patient_name)).'</th></tr>
												<tr><th style="color:gray;">Relation</th><th>:</th><th>'.ucwords(strtolower($result->relation)).'</th></tr>
												<tr><th style="color:gray;">Claim Type</th><th>:</th><th>'.ucwords(strtolower($result->claim_type)).'</th></tr>
												<tr><th style="color:gray;">TPA Claim Number</th><th>:</th><th>'.$result->tpa_claim_no.'</th></tr>
												<tr><th style="color:gray;">Hospitlization Date</th><th>:</th>';if($result->hospitlization_date == '0000-00-00'){$output.= '<th></th>';}else{$output.= '<th>'.date('d/m/Y',strtotime($result->hospitlization_date)).'</th>';}$output.= '</tr>
												<tr><th style="color:gray;">Discharge Date</th><th>:</th>';if($result->discharge_date == '0000-00-00'){$output.= '<th></th>';}else{$output.= '<th>'.date('d/m/Y',strtotime($result->discharge_date)).'</th>';}$output.= '</tr>
												<tr><th style="color:gray;">Hospital Name</th><th>:</th><th>'.ucwords(strtolower($result->hospital_name)).'</th></tr>
												<tr><th style="color:gray;">Amount Claimed</th><th>:</th><th>₹ '.number_format($result->amount_claimed).'</th></tr>
												<tr><th style="color:gray;">Amount Sactioned</th><th>:</th><th>₹ '.number_format($result->sactioned_amount).'</th></tr>
												<tr><th style="color:gray;">Claim Status</th><th>:</th><th>'.$result->claim_status.'</th></tr>
												<tr><th style="color:gray;">Gender</th><th>:</th>';if($result->gender == 'M'){$output.= '<th>Male</th>';}else{$output.= '<th>Female</th>';}$output.= '</tr>
												<tr><th style="color:gray;">Hospital State</th><th>:</th><th>'.$result->hospital_state.'</th></tr>
												<tr><th style="color:gray;">Network Status</th><th>:</th><th>'.$result->network_status.'</th></tr>
												<tr><th style="color:gray;">Treatment Type</th><th>:</th><th>'.$result->treatment_type.'</th></tr>
												<tr><th style="color:gray;">Level of Care</th><th>:</th><th>'.$result->level_of_care.'</th></tr>
												<tr><th style="color:gray;">Disease</th><th>:</th><th>'.ucwords(strtolower($result->disease)).'</th></tr>
												<tr><th style="color:gray;">City</th><th>:</th><th>'.ucwords(strtolower($result->city)).'</th></tr>
												<tr><th style="color:gray;">Age</th><th>:</th><th>'.$result->age.'</th></tr>
												<tr><th style="color:gray;">Claim Filed Date</th><th>:</th>';if($result->claim_filed_date == '0000-00-00'){$output.= '<th></th>';}else{$output.= '<th>'.date('d/m/Y',strtotime($result->claim_filed_date)).'</th>';}$output.= '</tr>
												<tr><th style="color:gray;">Claim Settled Date</th><th>:</th>';if($result->claim_settled_date == '0000-00-00'){$output.= '<th></th>';}else{$output.= '<th>'.date('d/m/Y',strtotime($result->claim_settled_date)).'</th>';}	$output.= '</tr>
												<tr><th style="color:gray;">Disease Category</th><th>:</th><th>'.$result->disease_category.'</th></tr>
												<tr><th style="color:gray;">Claim Register Date</th><th>:</th>';if($result->claim_register_date == '0000-00-00'){$output.= '<th></th>';}else{$output.= '<th>'.date('d/m/Y',strtotime($result->claim_register_date)).'</th>';}$output.= '</tr>
												<tr><th style="color:gray;">Intimation Method</th><th>:</th><th>'.$result->intimation_method.'</th></tr>
												<tr><th style="color:gray;">Sum Insured</th><th>:</th><th>₹ '.number_format($result->sum_insured).'</th></tr>
												<tr><th style="color:gray;">Tds Amount</th><th>:</th><th>₹ '.number_format($result->tds_amount).'</th></tr>
												<tr><th style="color:gray;">Deduction Amount</th><th>:</th><th>₹ '.number_format($result->deduction_amount).'</th></tr>
												<tr><th style="color:gray;">Deduction Reason</th><th>:</th><th>'.$result->deduction_reason.'</th></tr>
												<tr><th style="color:gray;">Deficiency Intimated Date</th><th>:</th>';if($result->deficiency_intimated_date == '0000-00-00'){$output.= '<th></th>';}else{$output.= '<th>'.date('d/m/Y',strtotime($result->deficiency_intimated_date)).'</th>';}$output.= '</tr>
												<tr><th style="color:gray;">Deficiency Submission Date</th><th>:</th>';if($result->deficiency_submission_date == '0000-00-00'){$output.= '<th></th>';}else{$output.= '<th>'.date('d/m/Y',strtotime($result->deficiency_submission_date)).'</th>';}$output.= '</tr>
												<tr><th style="color:gray;">ICD Code</th><th>:</th><th>'.$result->icd_code.'</th></tr>
												<tr><th style="color:gray;">Claim Paid Amount</th><th>:</th><th>₹ '.number_format($result->claim_paid_amount).'</th></tr>
												<tr><th style="color:gray;">Closure Reason</th><th>:</th><th>'.$result->closure_reason.'</th></tr>
												<tr><th style="color:gray;">Deficiency Reason</th><th>:</th><th>'.$result->deficiency_reason.'</th></tr>
												<tr><th style="color:gray;">Insurance Claim No.</th><th>:</th><th>'.$result->insurance_claim_no.'</th></tr>';
					}else{
							$output.= '<tr><td>No record found...</td></tr>';
					}

	        echo json_encode($output);
	    }

			public function download_claim_excel_file(){
					$filename = 'claim_excel_'.date('d-m-Y').'.xls';
					$policy_id = isset($_GET['policy_id']) ? base64_decode($_GET['policy_id']):null;
					$claimData = $this->cm->get_all_claims_data($policy_id);
					$this->load->library('PHPExcel');
					$objePHPExecel = new PHPExcel();
					$objePHPExecel->setActiveSheetIndex(0);
					$objePHPExecel->getActiveSheet()->SetCellValue('A1', 'Sr. No');
					$objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Employee ID');
					$objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Employee Name');
					$objePHPExecel->getActiveSheet()->SetCellValue('D1', 'Beneficiary Name');
					$objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Relation');
					$objePHPExecel->getActiveSheet()->SetCellValue('F1', 'Claim Type');
					$objePHPExecel->getActiveSheet()->SetCellValue('G1', 'TPA Claim Number');
					$objePHPExecel->getActiveSheet()->SetCellValue('H1', 'Hospitlization Date');
					$objePHPExecel->getActiveSheet()->SetCellValue('I1', 'Discharge Date');
					$objePHPExecel->getActiveSheet()->SetCellValue('J1', 'Hospital Name');
					$objePHPExecel->getActiveSheet()->SetCellValue('K1', 'Amount Claimed');
					$objePHPExecel->getActiveSheet()->SetCellValue('L1', 'Amount Sactioned');
					$objePHPExecel->getActiveSheet()->SetCellValue('M1', 'Claim Status');
					$objePHPExecel->getActiveSheet()->SetCellValue('N1', 'Gender');
					$objePHPExecel->getActiveSheet()->SetCellValue('O1', 'Hospital State');
					$objePHPExecel->getActiveSheet()->SetCellValue('P1', 'Network Status');
					$objePHPExecel->getActiveSheet()->SetCellValue('Q1', 'Treatment Type');
					$objePHPExecel->getActiveSheet()->SetCellValue('R1', 'Level of Care');
					$objePHPExecel->getActiveSheet()->SetCellValue('S1', 'Disease');
					$objePHPExecel->getActiveSheet()->SetCellValue('T1', 'City');
					$objePHPExecel->getActiveSheet()->SetCellValue('U1', 'Age');
					$objePHPExecel->getActiveSheet()->SetCellValue('V1', 'Claim Filed Date');
					$objePHPExecel->getActiveSheet()->SetCellValue('W1', 'Claim Settled Date');
					$objePHPExecel->getActiveSheet()->SetCellValue('X1', 'Disease Category');
					$objePHPExecel->getActiveSheet()->SetCellValue('Y1', 'Claim Register Date');
					$objePHPExecel->getActiveSheet()->SetCellValue('Z1', 'Intimation Method');
					$objePHPExecel->getActiveSheet()->SetCellValue('AA1', 'Sum Insured');
					$objePHPExecel->getActiveSheet()->SetCellValue('AB1', 'Tds Amount');
					$objePHPExecel->getActiveSheet()->SetCellValue('AC1', 'Deduction Amount');
					$objePHPExecel->getActiveSheet()->SetCellValue('AD1', 'Deduction Reason');
					$objePHPExecel->getActiveSheet()->SetCellValue('AE1', 'Deficiency Intimated Date');
					$objePHPExecel->getActiveSheet()->SetCellValue('AF1', 'Deficiency Submission Date');
					$objePHPExecel->getActiveSheet()->SetCellValue('AG1', 'ICD Code');
					$objePHPExecel->getActiveSheet()->SetCellValue('AH1', 'Claim Paid Amount');
					$objePHPExecel->getActiveSheet()->SetCellValue('AI1', 'Closure Reason');
					$objePHPExecel->getActiveSheet()->SetCellValue('AJ1', 'Deficiency Reason');
					$objePHPExecel->getActiveSheet()->SetCellValue('AK1', 'Insurance Claim No.');

					$rows = 2;
					$i=1;

					foreach ($claimData as $val){
							$objePHPExecel->getActiveSheet()->SetCellValue('A' . $rows, $i);
							$objePHPExecel->getActiveSheet()->SetCellValue('B' . $rows, $val['employee_id']);
							$objePHPExecel->getActiveSheet()->SetCellValue('C' . $rows, ucwords(strtolower($val['employee_name'])));
							$objePHPExecel->getActiveSheet()->SetCellValue('D' . $rows, ucwords(strtolower($val['patient_name'])));
							$objePHPExecel->getActiveSheet()->SetCellValue('E' . $rows, ucwords(strtolower($val['relation'])));
							$objePHPExecel->getActiveSheet()->SetCellValue('F' . $rows, ucwords(strtolower($val['claim_type'])));
							$objePHPExecel->getActiveSheet()->SetCellValue('G' . $rows, $val['tpa_claim_no']);
							if($val['hospitlization_date'] == '0000-00-00'){
							$objePHPExecel->getActiveSheet()->SetCellValue('H' . $rows, '');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('H' . $rows, date('d/m/Y',strtotime($val['hospitlization_date'])));
						  }
							if($val['discharge_date'] == '0000-00-00'){
							$objePHPExecel->getActiveSheet()->SetCellValue('I' . $rows, '');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('I' . $rows, date('d/m/Y',strtotime($val['discharge_date'])));
						  }
							$objePHPExecel->getActiveSheet()->SetCellValue('J' . $rows, ucwords(strtolower($val['hospital_name'])));
							$objePHPExecel->getActiveSheet()->SetCellValue('K' . $rows, $val['amount_claimed']);
							$objePHPExecel->getActiveSheet()->SetCellValue('L' . $rows, $val['sactioned_amount']);
							$objePHPExecel->getActiveSheet()->SetCellValue('M' . $rows, $val['claim_status']);
							if($val['gender'] == 'M'){
							$objePHPExecel->getActiveSheet()->SetCellValue('N' . $rows, 'Male');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('N' . $rows, 'Female');
						  }
							$objePHPExecel->getActiveSheet()->SetCellValue('O' . $rows, $val['hospital_state']);
							$objePHPExecel->getActiveSheet()->SetCellValue('P' . $rows, $val['network_status']);
							$objePHPExecel->getActiveSheet()->SetCellValue('Q' . $rows, $val['treatment_type']);
							$objePHPExecel->getActiveSheet()->SetCellValue('R' . $rows, $val['level_of_care']);
							$objePHPExecel->getActiveSheet()->SetCellValue('S' . $rows, ucwords(strtolower($val['disease'])));
							$objePHPExecel->getActiveSheet()->SetCellValue('T' . $rows, ucwords(strtolower($val['city'])));
							$objePHPExecel->getActiveSheet()->SetCellValue('U' . $rows, $val['age']);
							if($val['claim_filed_date'] == '0000-00-00'){
							$objePHPExecel->getActiveSheet()->SetCellValue('V' . $rows, '');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('V' . $rows, date('d/m/Y',strtotime($val['claim_filed_date'])));
						  }
							if($val['claim_settled_date'] == '0000-00-00'){
							$objePHPExecel->getActiveSheet()->SetCellValue('W' . $rows, '');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('W' . $rows, date('d/m/Y',strtotime($val['claim_settled_date'])));
						  }
							$objePHPExecel->getActiveSheet()->SetCellValue('X' . $rows, $val['disease_category']);
							if($val['claim_register_date'] == '0000-00-00'){
							$objePHPExecel->getActiveSheet()->SetCellValue('Y' . $rows, '');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('Y' . $rows, date('d/m/Y',strtotime($val['claim_register_date'])));
						  }
							$objePHPExecel->getActiveSheet()->SetCellValue('Z' . $rows, $val['intimation_method']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AA' . $rows, $val['sum_insured']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AB' . $rows, $val['tds_amount']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AC' . $rows, $val['deduction_amount']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AD' . $rows, $val['deduction_reason']);
							if($val['deficiency_intimated_date'] == '0000-00-00'){
							$objePHPExecel->getActiveSheet()->SetCellValue('AE' . $rows, '');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('AE' . $rows, date('d/m/Y',strtotime($val['deficiency_intimated_date'])));
						  }
							if($val['deficiency_submission_date'] == '0000-00-00'){
							$objePHPExecel->getActiveSheet()->SetCellValue('AF' . $rows, '');
							}else{
							$objePHPExecel->getActiveSheet()->SetCellValue('AF' . $rows, date('d/m/Y',strtotime($val['deficiency_submission_date'])));
						  }
							$objePHPExecel->getActiveSheet()->SetCellValue('AG' . $rows, $val['icd_code']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AH' . $rows, $val['claim_paid_amount']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AI' . $rows, $val['closure_reason']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AJ' . $rows, $val['deficiency_reason']);
							$objePHPExecel->getActiveSheet()->SetCellValue('AK' . $rows, $val['insurance_claim_no']);

							$rows++;
							$i++;
					}

					$objePHPExecel->getActiveSheet()->getStyle("A1:AK1")->getFont()->setBold(true);
					for ($s=65; $s<=90; $s++) {
							$objePHPExecel->getActiveSheet()->getColumnDimension(chr($s))->setAutoSize(true);
					}

					$writer = PHPExcel_IOFactory::createWriter($objePHPExecel,'Excel2007');
					header('Content-Type: application/vnd.ms-excel');
					header('Content-Disposition: attachment;filename="'.$filename.'"');
					header('Cache-control: max-age=0');
					ob_end_clean();
					$writer->save('php://output');
			}

			public function intimateClaim(){
					$data=array('file'=>'intimate-claim');
					$data['state'] = $this->cm->get_all_state();
			    $this->template->full_corporate_html_view($data);
			}

			public function getEmployeeDetails(){
					$employee_id = $this->input->post('employee_id');
					$result = $this->cm->get_emp_details($employee_id);
					if(!empty($result)){
						echo json_encode($result);
					}else{
						echo json_encode('fail');
					}
			}

			public function getRelationByPolicy(){
					$policy_id = $this->input->post('policy',TRUE);
					$employee_id = $this->input->post('employee_id',TRUE);
					$data = $this->cm->get_relation_by_policy($policy_id,$employee_id);
					echo json_encode($data);
			}

			public function insertClaim(){
					$relation = strip_tags($this->input->post('relation'));
					$employee_id = strip_tags($this->input->post('employee_id'));
					$data = array(
						'employee_id' => $employee_id,
						'employee_name' => strip_tags($this->input->post('employee_name')),
						'contact_no' => strip_tags($this->input->post('contact_no')),
						'employee_email' => strip_tags($this->input->post('employee_email')),
						'policy_no' => strip_tags($this->input->post('policy_no')),
						'product_type' => strip_tags($this->input->post('product_type')),
						'corporate' => $this->session->userdata('hr_login_id'),
						'relation' => $relation,
						'diagnosis' => strip_tags($this->input->post('diagnosis')),
						'estimated_amount' => strip_tags($this->input->post('estimated_amount')),
						'date_of_admission' => strip_tags($this->input->post('date_of_admission')),
						'hospital_name' => strip_tags($this->input->post('hospital_name')),
						'hospital_address' => strip_tags($this->input->post('hospital_address')),
						'city' => strip_tags($this->input->post('city')),
						'state' => strip_tags($this->input->post('state')),
						'pincode' => strip_tags($this->input->post('pincode')),
						'remarks' => strip_tags($this->input->post('remarks')),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->cm->insert_claim_data($data);

					if($result == true){
						$this->session->unset_userdata('intimate_session_employee_id');
						
							if(strip_tags($this->input->post('tpa')) == 'Health India Insurance TPA Services Private Limited'){
									$member_id = $this->cm->get_member_id($employee_id,$relation);
									$policy_no = strip_tags($this->input->post('policy_original_number'));
									$res = $this->need_lib->add_to_healthindia($data,$policy_no,$member_id);
							}

							$to = strip_tags($this->input->post('employee_email'));
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
														                                                <td width="100px">Employee ID:</td>
														                                                <td>'.strip_tags($this->input->post('employee_id')).'</td>
														                                            </tr>
														                                            <tr>
														                                                <td width="100px">Name:</td>
														                                                <td>'.strip_tags($this->input->post('employee_name')).'</td>
														                                            </tr>
														                                            <tr>
														                                                <td width="100px">Contact No:</td>
														                                                <td>'.strip_tags($this->input->post('contact_no')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Email:</td>
														                                                <td>'.strip_tags($this->input->post('employee_email')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Corporate:</td>
														                                                <td>'.$this->session->userdata('corporate_name').'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Policy No.:</td>
														                                                <td>'.$this->input->post('policy_original_number').'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Relation of the patient with employee:</td>
														                                                <td>'.$relation.'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Dignosis:</td>
														                                                <td>'.strip_tags($this->input->post('diagnosis')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Estimated Amount:</td>
														                                                <td>'.strip_tags($this->input->post('estimated_amount')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Date of Admission:</td>
														                                                <td>'.date('d-m-Y', strtotime($this->input->post('date_of_admission'))).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Hospital Name:</td>
														                                                <td>'.strip_tags($this->input->post('hospital_name')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Hospital Address:</td>
														                                                <td>'.strip_tags($this->input->post('hospital_address')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">City:</td>
														                                                <td>'.strip_tags($this->input->post('city')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">State:</td>
														                                                <td>'.strip_tags($this->input->post('state')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Pincode:</td>
														                                                <td>'.strip_tags($this->input->post('pincode')).'</td>
														                                            </tr>
																																				<tr>
														                                                <td width="100px">Remarks:</td>
														                                                <td>'.strip_tags($this->input->post('remarks')).'</td>
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
									if(!empty(strip_tags($this->input->post('hr_email')))){
										$addcc[$i] = strip_tags($this->input->post('hr_email'));
										$i+1;
									}
									if(!empty(strip_tags($this->input->post('sales_person_email')))){
										$i=$i+1;
										$addcc[$i] = strip_tags($this->input->post('sales_person_email'));
									}
									if(!empty(strip_tags($this->input->post('operations_person_email')))){
										$i=$i+1;
										$addcc[$i] = strip_tags($this->input->post('operations_person_email'));
									}
									if(!empty(strip_tags($this->input->post('tpa_person_email')))){
										$i=$i+1;
										$addcc[$i] = strip_tags($this->input->post('tpa_person_email'));
									}

							$this->sent_claim_mail($to,$subject,$message,$addcc);
							echo json_encode('success');
					}
			}

			public function sent_claim_mail($to,$subject,$message,$addcc){
					$AddAttachment = array();
					$this->need_lib->mail_sent($to,$subject,$message,$addcc,$AddAttachment);
			}

			public function getPatientDetails(){
					$relation = $this->input->post('relation');
					$policy_id = $this->input->post('policy_id');
					$employee_id = $this->input->post('employee_id');
					$result = $this->cm->get_patient_details_by_member_id($policy_id,$employee_id,$relation);
					echo json_encode($result);
			}

}
