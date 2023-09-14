<?php

defined('BASEPATH') OR exit('No direct script aess allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	class Employee_enrollment extends CI_Controller {
	private $_data = array();
	function __construct()
	{

	/* ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); */

		include("phpmailer/PHPMailer.php");
		include("phpmailer/SMTP.php");
		include("phpmailer/POP3.php");
		date_default_timezone_set('Asia/Kolkata');
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
        }
		$this->load->model('employee_enrollment_model');
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
			'policy_start_date' =>'',
			'policy_end_date' => '',
			'policy_end_date' => '',
			);



		if($this->input->post('action') == 'add_employee_enrollment')
		{
			//echo $_FILES['csv'];exit;

			//echo "<pre>";print_r($_FILES['csv']);echo"</pre>";exit;
			foreach($form_field as $key => $value)
			{
				$data[$key]=$this->admin->xss_clean_inputData($this->input->post($key));
			}
			/* $this->load->library('validation');
			$rules['product_name'] = "trim|required";
			$this->validation->set_rules($rules);
			$fields['product_name'] = "Name";
			$this->validation->set_fields($fields); */

				
				$group_code = $this->employee_enrollment_model->get_group_code($data['corporate_id']);
				
				$sum_insured_val = $this->employee_enrollment_model->get_sum_insured_name($data['sum_insured']);
				
				//echo "<pre>";print_r($sum_insured_val);echo"</pre>";exit;
				//echo $group_code;exit;
				$policy_id = $data['policy_no'];


				//$id = $this->employee_enrollment_model->add($data);

				//echo "<pre>";print_r($data);echo"</pre>";

				$get_employeenrolement_id = $this->employee_enrollment_model->chech_employee_status($data['corporate_id'],$data['policy_no'],$data['sum_insured']);
				if($get_employeenrolement_id == 0){
					$id = $this->employee_enrollment_model->add($data);

					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => 'Create Employee Enrollment',
						'corporate_name' => $data['corporate_id'],
						'policy_number' => $data['policy_no'],
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);

					if($_FILES['csv']['name'] != ''){
						$entry = 0; //prashant added
						$this->upload_atribute_xl($id,$_FILES['csv'],$group_code,$policy_id,$entry,$sum_insured_val);
					}
				}else{
					$get_employement_data = $this->employee_enrollment_model->get_employement_data($get_employeenrolement_id);
					if($_FILES['csv']['name'] != ''){
						$entry = 1; //prashant added
						$this->upload_atribute_xl($get_employement_data->id,$_FILES['csv'],$group_code,$policy_id,$entry,$sum_insured_val);
					}

					//echo "<pre>";print_r($get_employement_data);echo"</pre>";exit;

				}



				//$employee_enrollment_attributes = $this->employee_enrollment_model->chech_employee_enrollment_attributes($get_employeenrolement_id,$employe_id);



				// if($_FILES['csv']['name'] != ''){
				// 	echo "sfs";
				// }else{
				// 	echo "sfddfddfd";
				// }
				//  echo $id;exit;

				/* if($_FILES['csv']['name'] != ''){

					$this->upload_atribute_xl($id,$_FILES['csv'],$group_code,$policy_id);

				}else{
					$this->session->set_flashdata('L_strErrorMessage','Employee Enrollment Added Successfully');
				redirect($this->config->item('base_url').'employee_enrollment/lists');
				} */

			// 	if ($this->validation->run() == FALSE){
			// $data['L_strErrorMessage'] = $this->validation->error_string;
			// }

		}
		$data['allcorporate']= $this->employee_enrollment_model->allcorporate();
		$data['allproduct_name'] = $this->employee_enrollment_model->allproduct_name();
		$data['allsum_insured'] = $this->employee_enrollment_model->allsum_insured();
		 // echo "<pre>";print_r($data['allsum_insured']);echo "</pre>";

		$this->load->view('add_employee_enrollment',$data);
	}

	function upload_atribute_xl($id,$csv,$group_code,$policy_id,$entry,$sum_insured_val){




		$policy_data = $this->employee_enrollment_model->getPolicyData($policy_id);

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

			$self_count = 0;
			$different_sum_insured_count = 0;
			for ($k=1; $k<count($sheetData); $k++) {
				if($sheetData[$k][3] == 'Self' || $sheetData[$k][3] == 'self'){
					$self_count += 1;
				}
				
				if($sum_insured_val != $sheetData[$k][8]){
					$different_sum_insured_count += 1;
				}
			}
			
			//echo "<pre>";print_r($sum_insured_val);echo"</pre>";
			
			//echo "<pre>";print_r($sum_insured_val);echo"</pre>";
			
			//echo "<pre>";print_r($different_sum_insured_count);echo"</pre>";exit;


			if (!empty($sheetData)) {

				$error = "Error at Row no : ";
				$add_array = array();
				$update_array = array();
				$delete_array = array();
				$sd = 0;

				if($self_count == 0){
					
				// 	if($different_sum_insured_count == 0){

				for ($i=1; $i<count($sheetData); $i++) {

					$employee_id = $sheetData[$i][0];
					$name_of_the_employee = $sheetData[$i][1];
					$gender = $sheetData[$i][2];
					$relationship = $sheetData[$i][3];
					$d_o_b = $sheetData[$i][4];
					$age = $sheetData[$i][5];
					$mobile_no = $sheetData[$i][6];
					$email = $sheetData[$i][7];
					$sum_insured = $sheetData[$i][8];
					$date_of_joining = $sheetData[$i][9];
					$member_id = $sheetData[$i][10];
					$endorsement_no = $sheetData[$i][11];
					$endorsement_date = $sheetData[$i][12];
					$type_of_addition = $sheetData[$i][13];
					$date_of_leaving = $sheetData[$i][14];

					if($gender == 'M'){
						$employee_gender = 'Male';
					}elseif($gender == 'F'){
						$employee_gender = 'Female';
					}else{
						$employee_gender = '';
					}



					$data = array(
                            'Employee_id'    => $employee_id,
                            'name_of_the_employee'    => $name_of_the_employee,
                            'gender'    => $employee_gender,
                            'relationship'    => $relationship,
                            'd_o_b'    => $d_o_b,
                            'age'    => $age,
                            'mobile_no'    => $mobile_no,
                            'email'    => $email,
                            'sum_insured'    => $sum_insured,
                            'date_of_joining'    => $date_of_joining,
                            'member_id'    => $member_id,
                            //'beneficiary_name'    => addslashes($PHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue()),
                            //'relation'    => addslashes($PHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue()),
                            //'gender_'    => $member_gender,
                            //'date_of_birth'    => addslashes($PHPExcel->getActiveSheet()->getCell('O' . $i)->getCalculatedValue()),
                            'endorsement_no'    => $endorsement_no,
                            'endorsement_date'    => $endorsement_date,
                            'type_of_addition'    => $type_of_addition,
                            'date_of_leaving'    => $date_of_leaving,


                        );


						$messagebody = '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Risk Assessment Report</title>
</head>
<body style="margin: 0 auto;">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tbody>
	<tr>
			<td align="center">
					<table class="col-600" width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 20px;" bgcolor="#b6fdff">
							<link rel="preconnect" href="https://fonts.googleapis.com" />
							<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
							<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
							<tbody>
									<tr>
											<td align="center" valign="top">
													<table class="col-600" width="900" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 10px 0px;" bgcolor="white">
															<tbody>
																	<tr>
																			<td height="20"></td>
																	</tr>
																	<tr>
																			<td align="center">
																					<img src="https://www.raghnall.co.in/iserrve-beta/site/views/iserve-Emailer-02012023/img/emialer-logo-iserve.png" />
																			</td>
																	</tr>
																	<tr>
																			<td height="20"></td>
																	</tr>
																	<tr>
																			<td align="center"><h4 style="text-align:center;margin:0px;font-size:30px;line-height:30px; font-family:Poppins, sans-serif; color:#e85305;"><span style="color:#141d60; font-weight:bolder ;">Welcome  </span><span srtyle="color:#e85305;">'.$name_of_the_employee.'</span></h4></td>
																	</tr>
																	<tr>
																		<td height="20"></td>
																	</tr>
																	<tr>
																		<td>
																				<table class="col-600" width="800" border="0" align="top" cellpadding="0" cellspacing="0" background="https://www.raghnall.co.in/iserrve-beta/site/views/iserve-Emailer-02012023/img/banner.png" style="margin:20px 50px; background-repeat: no-repeat;height: 400px;background-size: cover;background-position: right;position: relative;">
																						<tbody>
																								<tr>
																										<td>
																												<h4 style="width:450px; font-size: 25px; text-align: left; line-height:35px; top: 50px;left: 55px; font-weight: 600; font-family: Poppins, sans-serif; position: absolute; ">Healthcare and Insurance,all under one roof for you and your family!</h4>
																												<p style="width:380px; font-size: 14px; text-align: left; bottom: 120px;left: 55px; font-family: Poppins, sans-serif; position: absolute; margin-left: 35px">We are here to help you make the most of your coverage and protect what matters most.</p>
																										</td>
																								</tr>
																								<tr>
																										<td>

																										</td>
																								</tr>

																					</tbody>
																				</table>
																		</td>
																</tr>
																<tr>
																		<td>
																				<table class="col-600" width="800" border="0" align="top" cellpadding="0" cellspacing="0" style="margin:10px 50px;">
																					<tbody>
																						<tr>
																								<td>
																										<h4 style="font-size: 22px; text-align: left;padding: 0px; margin: 5px 0px;font-weight: 900; font-family: Poppins, sans-serif; color:#1ab2d4">Greetings <span style="color:#141d60;">from </span> <span style="color:#e85305;"> iSerrve by Raghnall!</span></h4>
																								</td>
																						</tr>

																						<tr>
																								<td>
																										<p style="font-size: 15px; text-align: left;color:#212a69; font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 600;">We are pleased to inform you that your <span style="color:#e85305;">'.$policy_data["product_name"].'</span> of <span style="color:#e85305; font-weight: 600;">“'.$policy_data["co_name"].'”</span> is placed by us and the following are the Policy details:</p>
																								</td>
																						</tr>
																						<tr>
																							<td>
																								<ul style="font-size: 16px; color:#212a69; font-weight: 600;  font-family: Poppins, sans-serif;">
																									<li style="margin-bottom: 5px;">Insurance Company <span style="margin-right: 30px; margin-left: 30px"> : </span> <span style=" color:black; font-weight: 600;"> '.$policy_data["insurer"].'</span></li>
																									<li  style="margin-bottom: 5px;">Policy Period <span style="margin-right: 30px; margin-left: 93px"> : </span> <span style=" color:black; font-weight: 600;"> '.date("d-M-Y", strtotime($policy_data["policy_start_date"])).' to '.date("d-M-Y", strtotime($policy_data["policy_end_date"])).'</span></li>
																									<li style="margin-bottom: 5px;">Policy No <span style="margin-right: 30px; margin-left: 123px"> : </span> <span style=" color:black; font-weight: 600;">'.$policy_data["policy_no"].'</span></li>
																									<li style="margin-bottom: 5px;">TPA  <span style="margin-right: 30px; margin-left: 167px"> : </span> <span style=" color:black; font-weight: 600;">'.$policy_data["tpa"].'</span></li>
																								</ul>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																				<table class="col-600" width="800" border="0" align="top" cellpadding="0" cellspacing="0" style="margin:10px 50px 0px 50px; padding: 30px;" bgcolor="#f4e0d7">
																						<tbody>
																								<tr>
																									<td>
																										<p style="font-size: 15px; text-align:center;color:#212a69; font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 600;">At iSerrve, we are committed to providing our customers with top-quality products and services.Explore our wide range of exclusive benefits specially curated for you and your family:</p>
																									</td>
																								</tr>
																								<tr>
																									<td height="20"></td>
																								</tr>
																								<tr>
																									<td style="text-align: center;">
																										<img src="https://www.raghnall.co.in/iserrve-beta/site/views/iserve-Emailer-02012023/img/imag1.png" width="650px">
																									</td>
																								</tr>
																								<tr>
																									<td height="20"></td>
																								</tr>


																						 </tbody>
																					</table>
																					<table class="col-600" width="800" border="0" align="top" cellpadding="0" cellspacing="0" style="margin:0px 50px 0px 50px; padding:0px  30px;" bgcolor="#d1f2eb">
																						 <tbody>
																								<tr>
																										<td width="60%;">
																											<p style="font-size: 17px; text-align:left;color:#212a69;font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 600;">Discover the endless horizons of exclusive benefits at iSerrve</p>
																												<a href="https://www.raghnall.co.in/iserrve-beta/"><button style="font-size: 15px; text-align:left;color:#e85305; border: 1px solid #e85305;padding: 5px 15px;font-family: Poppins, sans-serif;  margin: 05px 0px; font-weight: 700; text-transform: uppercase;">Click Here</button></a>
																										</td>
																										<td  width="40%" style="text-align: right;">
																											<img src="https://www.raghnall.co.in/iserrve-beta/site/views/iserve-Emailer-02012023/img/banner-right.png" width="250px">
																										</td>
																								</tr>
																							</tbody>
																					</table>
																					<table class="col-600" width="800" border="0" align="top" cellpadding="0" cellspacing="0" style="margin:0px 50px 0px 50px; padding:0px  30px;" bgcolor="#141d60">
																							<tbody>
																									<tr>
																										<td height="20"></td>
																									</tr>
																									<tr><td>
																										<p style="font-size: 15px; text-align: left;color:#ffffff; font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 500;">Please follow the below steps to access the portal:</p></td></tr>
																									<tr>
																										<td height="10"></td>
																									</tr>
																									<tr>
																										<td>
																											<ul style="font-size: 14px; color:#ffffff; font-weight: 900;  font-family: Poppins, sans-serif;">
																												<li style="margin-bottom: 5px; color:rgb(255, 255, 255); font-weight: 400;">Visit our website &#45; https://www.raghnall.co.in/iserrve</li>    
																												<li style="margin-bottom: 5px; color:rgb(255, 255, 255); font-weight: 400;">Click on the Login button (Top right) and select Employee</li>
																												<li  style="margin-bottom: 5px; color:rgb(255, 255, 255); font-weight: 400;"> First register yourself (one time) by adding your Employee Code ( '.$employee_id.' ) and Group
																													Code ( '.$group_code.' )</li>
																												<li style="margin-bottom: 5px; color:rgb(255, 255, 255); font-weight: 400;">Enter your name, email id and mobile number and click on Request OTP</li>
																												<li style="margin-bottom: 5px; color:rgb(255, 255, 255); font-weight: 400;">Enter the OTP received on your mobile number and click on verify</li>
																												<li style="margin-bottom: 5px; color:rgb(255, 255, 255); font-weight: 400;">Once the OTP is verified, user will be redirected to the home screen of our portal</li>
																											</ul>
																										</td>
																									</tr>
																									<tr>
																										<td height="10"></td>
																									</tr>
																									</tbody>
																									</table>
																									<table class="col-600" width="800" border="0" align="top" cellpadding="0" cellspacing="0" style="margin:0px 50px 0px 50px; padding:0px  10px;" bgcolor="white">
																										<tbody>
																											<tr>
																												<td height="20"></td>
																											</tr>
																											<tr>
																												<td>
																														<p style="font-size: 15px; text-align: left;color:#212a69;font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 400;">Think of us as your employee benefits sherpas &#45; review this info carefully and do not hesitate to reach out if you have got any questions or worries.</p>
																												</td>
																											</tr>
																											<tr>
																													<td>
																														<p style="font-size: 15px; text-align: left;color:#212a69;font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 400;">We are here to help you make the most of your coverage!</p>
																													</td>
																											</tr>
																											<tr>
																													<td>
																															<p style="font-size: 15px; text-align: left;color:#212a69;
																															 font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 400;">Do not let portal troubles bring you down &#45; just drop us a line at <a href="mailto:priyankab@raghnall.co.in" style="color:#1ab2d4">priyankab@raghnall.co.in</a>
																														and we will come to the rescue. Our customer service is always here for you, no matter what!</p></td></tr>
																											<tr>
																													<td>
																															<p style="font-size: 15px; text-align: left;color:#212a69;
																															 font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 400;">Regards,
																														<br> Team iSerrve</p>
																													</td>
																											</tr>
																											<tr>
																												<td height="10"></td>
																											</tr>
																									</tbody>
																									</table>
																									<table class="col-600" width="800" border="0" align="top" cellpadding="0" cellspacing="0" style="margin:0px 50px 0px 50px; padding:0px  30px;" bgcolor="#eef1ff">
																										<tbody>
																											<tr>
																													<td height="20"></td>
																											</tr>
																											<tr>
																													<td>
																														<p style="font-size: 15px; text-align: center;color:#252e6d;font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 600;">Follow Us</p>
																													</td>
																											</tr>
																											<tr>
																													<td height="10"></td>
																											</tr>
																											<tr style="text-align:center;">
																												<td>
																														<ul style="display:inline-flex;padding-left:0;list-style:none;margin:0px">
																																<li style="margin-right: 20px">
																																		<a href="https://www.facebook.com/people/iSerrve/100086144868126/" target="_blank"><img src="https://www.raghnall.co.in/iserrve-beta/site/views/iserve-Emailer-02012023/img/fb.png" style="height:40px;width:40px" class="CToWUd" data-bit="iit"></a>
																																</li>
																																<li style="margin-right: 20px">
																																		<a href="https://www.linkedin.com/company/iserrve/" target="_blank"> <img src="https://www.raghnall.co.in/iserrve-beta/site/views/iserve-Emailer-02012023/img/linkedin.png" style="height:40px;width:40px" class="CToWUd" data-bit="iit"></a>
																																</li>
																																<li>
																																		<a href="https://www.instagram.com/iserrvebyraghnall/" target="_blank"> <img src="https://www.raghnall.co.in/iserrve-beta/site/views/iserve-Emailer-02012023/img/insta.png" style="height:40px;width:40px" class="CToWUd" data-bit="iit"></a>
																															 </li>
																														</ul>
																												</td>
																											 </tr>
																										</tbody>
																								</table>
																						</td>
																				</tr>
																				<tr>
																					<td height="10"></td>
																				</tr>
																				<tr>
																					<td>
																							<p style="font-size: 15px; text-align: center;color:#e85305;font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 600;">Please do not reply to this mail as it is an auto generated mail.</p>
																					</td>
																				</tr>
																				<tr>
																					<td height="10"></td>
																				</tr>
																			</tbody>
																			</table>
																	</td>
																	</tr>

																</tbody>
																</table>
														</td>
														</tr>
										</tbody>
										</table>
							</body>
							</html>';


							$subject  = 'Login Credentials Details';
							// $message  = "Text Message";
							$addcc = array();
							$AddAttachment = array();
							if($email != ''){
								//$this->mailsent_with_attachment($email,$subject,$messagebody,$addcc,$AddAttachment);
							}

							$check_attribute =  $this->employee_enrollment_model->check_attribute($id,$data['Employee_id'],$data['relationship']);

							if($check_attribute == 0){

								if($data['type_of_addition'] == 'add'){

									$data['entry'] = $entry; //new
									$data['status'] = 0;
									$this->employee_enrollment_model->add_xls($data,$id);

									$add_array['add_count'] = $add_array['add_count'] + 1;

								}else{
									$error .= $i .',';
								}

							}else{

								if($data['type_of_addition'] == 'add' && $check_attribute == 0){
								//$data['status'] = 0;
								$data['entry'] = $entry; //add
								$this->employee_enrollment_model->add_xls($data,$id);

								$add_array['add_count'] = $add_array['add_count'] + 1;


								}elseif($data['type_of_addition'] == 'update' && $check_attribute != 0){
									$data['status'] = 0;
									$this->employee_enrollment_model->updateVariation($check_attribute,$id, $data);

									$update_array['update_count'] = $update_array['update_count'] + 1;

								}elseif($data['type_of_addition'] == 'delete' && $check_attribute != 0){

									$check_user_delete_status = $this->employee_enrollment_model->check_user_delete_status($check_attribute);

									if($check_user_delete_status == 0){
										$delete_array['delete_count'] = $delete_array['delete_count'] + 1;
									}

									$data['status'] = 1;
									$this->employee_enrollment_model->updateVariation($check_attribute,$id, $data);



									//echo $check_user_delete_status;exit;
									/* if($check_user_delete_status == 0{
										$delete_array['delete_count'] = $delete_array['delete_count'] + 1;
									} */


								}else{
									$error.= $i.',';
								}


							}

							$sd++;
				}
				
				// 	}else{
						
				// 		$error_self = "Data not uploaded - Error in Sheet, Sum Insured Mismatch";
				// 	}

				}else{

					$error_self = "Data not uploaded - Error in Sheet, Self not allowed in Relationship Column";

				}
			}

		}

		//echo "sd";exit;

			$data_new['add_count'] = $add_array['add_count'];
			$data_new['update_count'] = $update_array['update_count'];
			$data_new['delete_count'] = $delete_array['delete_count'];

			$string_error = rtrim($error, ", ");

			//echo $string_error;exit;

			if($add_array['add_count'] != 0){
				$add_count = $add_array['add_count'];
			}else{

				$add_count = 0;
			}


			if($update_array['update_count'] != 0){
				$update_count = $update_array['update_count'];
			}else{

				$update_count = 0;
			}

			if($delete_array['delete_count'] != 0){
				$delete_count = $delete_array['delete_count'];
			}else{

				$delete_count = 0;
			}

			$count = "Added Record = ".$add_count." <br>Updated Count = ".$update_count." <br> Deleted Count = ".$delete_count;

			//echo "<pre>";print_r($data_new);echo"</pre>";exit;
			//$this->load->view('list_employee_enrollment', $data_new);

            $this->session->set_flashdata('L_strErrorMessage', 'Employee Enrollment Added Successfully');
			$this->session->set_flashdata('Error_msg',$string_error);
			$this->session->set_flashdata('Error_self',$error_self);
			$this->session->set_flashdata('count_msg',$count);
            redirect($this->config->item('base_url') . 'employee_enrollment/lists/');


	}




	function test(){

		$subject  = 'Test Subject';
		$message  = "Text Message";
		$addcc = array();
		$AddAttachment = array();
		if($this->mailsent_with_attachment_new('devang.hnrtechnologies@gmail.com',$subject,$message,$addcc,$AddAttachment)){
			echo "Success";
		}else{
			echo "Fail";
		}
	}
	
	function mailsent_with_attachment_new($to,$subject,$message,$addcc,$AddAttachment)
	{

		/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
		error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			//Server settings
			//$mail = new PHPMailer();
			//$mail->Encoding = "base64";

			//$mail->SMTPDebug = 2;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'smtp.zeptomail.in';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'emailapikey';      // SMTP username
			$mail->Password   = 'PHtE6r0FF+vpjW4o8RVS4KDpE5WnMYou/e4yfwVEuYhKA6MDFk1crtB/wTG2qBh/UvBAFPOYwY5t4OjOteKAIGvrMD5JWmqyqK3sx/VYSPOZsbq6x00UsFsSdkfUXYfpcdVj0iDWvNbZNA==';                   // SMTP password
			$mail->SMTPSecure = "TLS";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('ebsupport@iserrve.raghnall.co.in', 'iSerrve by Raghnall');
			$mail->addAddress($to, "");     // Add a recipient
			if($addcc !='' && count($addcc)>0)
			{
				foreach($addcc as $key=>$value)
				{
					$mail->addCC($value);
				}
			}

			//$mail->addStringAttachment(file_get_contents($AddAttachment), 'Raghnall');
			// if($AddAttachment !='' && count($AddAttachment)>0)
			// {
			// 	foreach($AddAttachment as $key=>$value)
			// 	{
			// 		if($value !='')
			// 		{
			// 			$mail->addAttachment($value);
			// 		}
			// 	}
			// }
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->send();
			//echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}



	function mailsent_with_attachment($to,$subject,$message,$addcc,$AddAttachment)
	{

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
		error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			//Server settings
			// $mail->SMTPDebug = 2;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'mail.raghnall.net';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'iSerrve@raghnall.net';      // SMTP username
			$mail->Password   = 'iSerrve@rib22';                   // SMTP password
			$mail->SMTPSecure = "ssl";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 465;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('iSerrve@raghnall.net', 'Raghnall');
			$mail->addAddress($to, "");     // Add a recipient
			if($addcc !='' && count($addcc)>0)
			{
				foreach($addcc as $key=>$value)
				{
					$mail->addCC($value);
				}
			}

			//$mail->addStringAttachment(file_get_contents($AddAttachment), 'Raghnall');
			// if($AddAttachment !='' && count($AddAttachment)>0)
			// {
			// 	foreach($AddAttachment as $key=>$value)
			// 	{
			// 		if($value !='')
			// 		{
			// 			$mail->addAttachment($value);
			// 		}
			// 	}
			// }
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->send();
			//echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
    function edit($id)
	{
	//echo $id; die;
			if(is_numeric($id))
			{
				$result = $this->employee_enrollment_model->get_employee_enrollment($id);
				//echo "<pre>";print_r($result);echo "</pre>";
					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'insurer' => $result->insurer,
						'corporate_id' => $result->corporate_id,
						'product_name' => $result->product_name,
						'policy_no' => $result->policy_no,
						'sum_insured' => $result->sum_insured,
						'policy_start_date' =>$result->policy_start_date,
						'policy_end_date' => $result->policy_end_date,

						);

				if($this->input->post('action') == 'edit_employee_enrollment')
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
							$this->employee_enrollment_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Employee Enrollment Updated Successfully');
							redirect($this->config->item('base_url').'employee_enrollment/lists');
					}
				}

				$data['allcorporate'] = $this->employee_enrollment_model->allcorporate();
				$data['allproduct_name'] = $this->employee_enrollment_model->allproduct_name();
				$data['allsum_insured'] = $this->employee_enrollment_model->allsum_insured();
				// echo "<pre>";print_r($data['allproduct_name']);echo "</pre>";

				$this->load->view('edit_employee_enrollment',$data);
			}
			else
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Employee Enrollment !!!!');
				redirect($this->config->item('base_url').'employee_enrollment/lists');
			}
	}
	//first function calling after pressing coupan tab...
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'employee_enrollment/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['product_name'] = $this->admin->xss_clean_inputData($this->input->post('product_name'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->employee_enrollment_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_employee_enrollment', $data);
	}


	function list1($id){
		// echo $id;exit;

		$data['result'] = $this->employee_enrollment_model->list1($id);
		
		$data['id'] = $id ;

		 // echo "<pre>";print_r($data);echo "</pre>";

		$this->load->view('list_employee_enrollment_attributes', $data);

	}
	
	function download_excel_att($id){
		
		$orders_list = $this->employee_enrollment_model->list1($id);
		
		//echo "<pre>";print_r($orders_list);echo "</pre>";exit;
		

		$output = '';

		$output .= 'Employee Id,Name of the Employee,Gender, Relationship,Date of Birth,Age,Mobile No,Email,Sum Insured,Date of Joining,Member Id,Endorsement No,Endorsement Date,Type of Addition,Date of Leaving';

		$output .="\n";

		if($orders_list != '' && count($orders_list) > 0) {
			
			

			$i=1;

		foreach($orders_list as $orders) {
			
			
		if($orders->d_o_b != ''){
            $date = date("d-m-Y",strtotime($orders->d_o_b));
        }else{
			$date ="";
		}	

		if($orders->date_of_joining != ''){
            $date_j = date("d-m-Y",strtotime($orders->date_of_joining));
        }else{
			$date_j ="";
		}			
		
		
		if($orders->endorsement_date != ''){
            $e_date = date("d-m-Y",strtotime($orders->endorsement_date));
        }else{
			$e_date ="";
		}

		if($orders->date_of_leaving != ''){
            $date_of_leaving = date("d-m-Y",strtotime($orders->date_of_leaving));
        }else{
			$date_of_leaving ="";
		}		

		$output .= '"'.$orders->employee_id.'","'.$orders->name_of_the_employee.'","'.$orders->gender.'","'.$orders->relationship.'","'.$date.'","'.$orders->age.'","'.$orders->mobile_no.'","'.$orders->email.'","'.$orders->sum_insured.'","'.$date_j.'","'.$orders->member_id.'","'.$orders->endorsement_no.'","'.$e_date.'","'.$orders->type_of_addition.'","'.$date_of_leaving.'"';

		$output .="\n";

		$i++; }

		}

		$filename = "Employee Enrollment Attributes.csv";

		header('Content-type: application/csv');

		header('Content-Disposition: attachment; filename='.$filename);

		echo $output;

		exit;
		
	}


	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {
			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				$employee_enrollment_data = $this->employee_enrollment_model->get_employee_enrollment($selCheck);
				//echo "<pre>";print_r($employee_enrollment_data);echo "</pre>";exit;

				if($employee_enrollment_data->mode == 1){
					$module_name = 'Delete Api Employee Enrollment';
				}else{
					$module_name = 'Delete Employee Enrollment';
				}

				if($this->employee_enrollment_model->deletes($selCheck)) {

					$log_data = array(
						'username' => $this->session->userdata('username'),
						'login_user_id' => $this->session->userdata('adminId'),
						'module_name' => $module_name,
						'corporate_name' => $employee_enrollment_data->corporate_id,
						'policy_number' => $employee_enrollment_data->policy_no,
						'created_at' => date('Y-m-d h:i:sa')
					);

					$this->admin->log_data_manage($log_data);

					$this->employee_enrollment_model->deletes_attributes($selCheck);
					$this->session->set_flashdata('L_strErrorMessage','Employee Enrollment Deleted Successfully');
				}
				else
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'employee_enrollment/lists');
	}
	function userstatus($id,$value)	{
	$result=$this->employee_enrollment_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'user/lists');
	}
function featured_product($pid,$value)
	{
		$return = $this->employee_enrollment_model->featured_product($pid,$value);
		$this->session->set_flashdata('L_strErrorMessage', 'Set As Home Page Updated Successfully');
		redirect($this->config->item('base_url').'employee_enrollment/lists');
	}
	function updateorder($id,$val){
		$this->employee_enrollment_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'employee_enrollment/lists');
	}


	 function show_policy_number(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->employee_enrollment_model->show_policy_number($pro_id);
        //echo "<pre>";print_r($data);echo "</pre>";exit;
        //echo $data;exit;
        // echo $data; exit;

        $html .= '<select id="policy_no" name="policy_no" class="form-control multiple-select">';
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
        $data = $this->employee_enrollment_model->show_policy_number($pro_id);
        //echo "<pre>";print_r($data);echo "</pre>";exit;

        $html = $data[0]->policy_start_date;

        echo $html;
    }

    function show_policy_end_date(){
        $pro_id = $_POST['pro_id'];
        // $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->employee_enrollment_model->show_policy_number($pro_id);
        //echo "<pre>";print_r($data);echo "</pre>";exit;

        $html = $data[0]->policy_end_date;

        echo $html;
    }

	function show_policy_using_corporate(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->employee_enrollment_model->show_policy_using_corporate($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
        // echo $data; exit;
        $html = '<select id="policy_no" name="policy_no" class="form-control multiple-select" onChange="showproduct_name(this.value)">';
        $html .= '<option value="">--Select Policy No--</option>';
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
        $data = $this->employee_enrollment_model->show_policy_number($pro_id);

		$html = $data[0]->product_name;

        echo $html;
    }

	function get_policy_insurer(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->employee_enrollment_model->show_policy_number($pro_id);

		$html = $data[0]->insurer;

        echo $html;
    }

	function get_policy_suminsurance(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->employee_enrollment_model->get_policy_suminsurance($pro_id);
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

	function xlsuploadproduct()
    {
        ini_set('memory_limit', -1);
        if ($this->input->post('action') == 'add_XLS') {
            $data['error'] = '';

            $file_path = $_FILES['csv']['tmp_name'];
            $file_type = $_FILES['csv']['type'];
            $this->load->library('PHPExcel');
            if ($file_type == 'text/csv') {
                $objReader = new PHPExcel_Reader_CSV();
                $PHPExcel = $objReader->load($file_path);
            } else {
                $PHPExcel = PHPExcel_IOFactory::load($file_path);
            }
            $objWorksheet = $PHPExcel->getActiveSheet();
            $highestrow = $objWorksheet->getHighestRow();
            if ($highestrow != 0) {
                //echo "<pre>";print_r($highestrow);echo "</pre>";exit;
                for ($i = 2; $i <= $highestrow; $i++) {
                    $obj_insData = array(
                        'code.' => addslashes($PHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue()));

                    //echo "<pre>";print_r($obj_insData);echo "</pre>";exit;

                    if ($obj_insData == '' && count($obj_insData) == '0') {
                       // continue;
                    } else {

						$corporate_name = addslashes($PHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue());

						$corporate_id = $this->employee_enrollment_model->getcorporatexls($corporate_name);

						$policy_name = addslashes($PHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue());

						$policy_id = $this->employee_enrollment_model->getpolicyxls($policy_name);

						$suminsured_name = addslashes($PHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue());

						$suminsured_id = $this->employee_enrollment_model->getsuminsuredxls($suminsured_name);

						$employe_id = addslashes($PHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue());

						$get_employeenrolement_id = $this->employee_enrollment_model->chech_employee_status($corporate_id,$policy_id,$suminsured_id);

						$employee_enrollment_attributes = $this->employee_enrollment_model->chech_employee_enrollment_attributes($get_employeenrolement_id,$employe_id);



						echo $employee_enrollment_attributes;

						echo $corporate_id."<br>";
						echo $policy_id."<br>";
						echo $suminsured_id."<br>";
						exit;
                    }
                }
            }
            $this->session->set_flashdata('L_strErrorMessage', 'Your Data File Uploaded Successfully.!!');
            redirect($this->config->item('base_url') . 'product/lists');
        }
        $data = array();
        $this->load->view('update_employexls', $data);
    }



}
?>
