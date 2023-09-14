<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Employee extends CI_Controller
	{
	function __construct() {
		parent::__construct();
		$this->load->model('employee_model','em');
		$this->load->helper('url','form');
    $this->load->library("pagination");
		$this->load->library("Need_lib");

	}

	public function index(){
			if($this->session->userdata("loginEmp")){
				
				//$this->session->userdata("loginEmp")
				//echo "<pre>";print_r($this->session->userdata('group_code'));echo"</pre>";
				$group_code = $this->session->userdata('group_code');
				
				$corp_id = $this->em->get_corp_id_using_group_code($group_code);
				
				//echo "<pre>";print_r($corp_id->id);echo"</pre>";exit;
				
				$employee_no = $this->session->userdata("login_id");
				$data['emp'] = $this->em->getEmpData($employee_no,$corp_id->id);
				
				$this->load->view('employee/index',$data);
			}else{
				redirect('home');
			}
	}

	//prasahnt create
	public function otpsent_login_new($mobileNo='',$otpNo='',$emailId=''){
			$mobile = !empty($mobileNo) ?	$mobileNo: $this->input->post('mobile');
			$otp = !empty($otpNo) ?	$otpNo: $this->input->post('otp');
			$email = !empty($emailId) ?	$emailId: $this->input->post('email');
			$result = $this->em->isExistUser($mobile,$email);
			if($result == true){
					$project = 'Dear%20Customer,%20Your%20OTP%20for%20Raghnall%20Login%20is%20'.$otp.'.%20%20Kindly%20do%20not%20share%20your%20OTP,%20as%20it%20is%20confidential.';
		    	$res = $this->need_lib->send_otp($mobile,$otp,$project);
					if($res==TRUE){
							echo 'success';
				  }
			}else{
				echo 'fail';
			}

	}

	public function checkLogin(){
			$this->load->model('employee_model');
			$mobile = $this->input->post('mobile');
			$otp =  $this->input->post('otp');
			$result = $this->em->isUserExist($mobile);
			if($result == true){
				$this->otpsent_login_new($mobile,$otp);
			}else{
				echo 'fail';
			}
	}

	public function login($mob=""){
			$mobile = (!empty($mob)) ? $mob : $this->input->post('mobile');
			if($mobile != ''){
	        if($this->em->isUserExist($mobile)){
						$getpass=$this->em->getData($mobile);
							$joining = $this->em->get_date_of_joining($getpass["emp_id"]);
							
							//echo "<pre>";print_r($getpass);echo"</pre>";exit;
							
							$session_data=array(
									'login_id' =>$getpass["emp_id"],
									'name' =>$getpass["name"],
									'email' =>$getpass["email"],
									'mobile' => $mobile,
									'join_date' => $joining["date_of_joining"],
									'group_code' =>$getpass["group_code"],
									'loginEmp' =>TRUE //boolean value TRUE
							);
							$this->session->set_userdata($session_data);

							if(!empty($session_data)){
									echo 'success';
							}

	        }else{
	            $this->session->set_flashdata('error_msg',"User does not exists.");
	            redirect('');
	        }
	    }else{
	        $this->session->set_flashdata('error_msg',"Username and password are required.");
	        redirect('');
	    }
	}

	public function signout(){
      $this->session->unset_userdata("login_id");
      $this->session->unset_userdata("name");
			$this->session->unset_userdata("email");
			$this->session->unset_userdata("mobile");
      $this->session->unset_userdata("loginEmp");

      $this->session->sess_destroy();
      redirect('');
  }

	public function register(){
				$this->form_validation->set_rules('emp_id', 'Employee ID', 'required|trim');

				if($this->form_validation->run() === TRUE){
					$data = array(
                'emp_id' => $this->input->post('emp_id'),
                'group_code' => $this->input->post('group_code'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
            );
            $data = $this->security->xss_clean($data);
						$emp_id = $this->input->post('emp_id');
						$joining = $this->em->get_date_of_joining($emp_id);
						$session_data=array(
							 'login_id' =>$emp_id,
							 'group_code' => $this->input->post('group_code'),
							 'email' => $this->input->post('email'),
							 'name' => $this->input->post('name'),
							 'mobile' => $this->input->post('mobile'),
							 'join_date' => $joining['date_of_joining'],
							 'loginEmp' =>TRUE //boolean value TRUE

						);
						$this->session->set_userdata($session_data);

            $result = $this->em->insertEmployee($data);
							if($result == true){
								  if(!empty($session_data)){
										 echo 'success';
								  }
						 }
				}else{
						$response = str_replace("\n","",strip_tags($this->form_validation->error_string()));
            echo $response;
				}
	}

	public function get_cities(){
			$state = $this->input->post('state',TRUE);
			$data = $this->em->get_cities($state)->result();
			echo json_encode($data);
	}

	public function get_all_cities(){
			$data = $this->em->get_all_cities()->result();
			echo json_encode($data);
	}

	public function network_hospitals(){
			if($this->session->userdata("loginEmp")){
					$employee_no = $this->session->userdata("login_id");
					$data['policy'] = $this->em->get_emp_policy_details($employee_no);
					$data['state'] = $this->em->get_all_state();
					$data['city'] = $this->em->get_all_city();
					//
					// $lib = $this->need_lib->newtwork_hospitals();
					// $data['newtwork_hospitals'] = json_decode($lib->result, TRUE);
					$this->load->view('employee/hospital-listing',$data);
			}else{
				redirect('home');
			}
	}

	public function add_data(){
			$table = $this->input->post('tbl');
			$data = array(
					'name' => $this->input->post('name'),
					'contact_no' => $this->input->post('contact_no'),
					'email' => $this->input->post('email'),
					'message' => $this->input->post('message'),
					'type' => $this->input->post('type'),
			);
			$data = $this->security->xss_clean($data);

			$data = $this->em->insertData($data,$table);
			if($data == true){
				/***email configuration***/
				$to = 'iserrve@raghnall.net';
				$subject = 'Isserve Assessment';
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
																			<img src="https://www.raghnall.co.in/iserrve/assets/employee_assets/img/logo-iserrve.png" style="width: 30%;" />
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
																															Please find the below Isserve '.ucfirst(substr($table, 4)).' details
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
																																			<td width="100px">Name:</td>
																																			<td>'.$this->input->post('name').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">Mobile No:</td>
																																			<td>'.$this->input->post('contact_no').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">Email:</td>
																																			<td>'.$this->input->post('email').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">Message:</td>
																																			<td>'.$this->input->post('message').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">'.ucfirst(substr($table, 4)).':</td>
																																			<td>'.$this->input->post('type').'</td>
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


					$this->sent_claim_mail($to,$subject,$message,$addcc);
					echo json_encode('success');
			}
	}
	
	public function add_doctor_assessment_data(){

			$table = $this->input->post('tbl');
			$data = array(
					'name' => $this->input->post('name'),
					'contact_no' => $this->input->post('contact_no'),
					'email' => $this->input->post('email'),
					'dob' => $this->input->post('dob'),
					'gender' => $this->input->post('gender'),
					'message' => $this->input->post('message'),
					'type' => $this->input->post('type'),
			);
			$data = $this->security->xss_clean($data);

			$data = $this->em->insertData($data,$table);
			if($data == true){
				/***email configuration***/
				$to = 'iserrve@raghnall.co.in';
				$subject = 'Isserve Assessment';
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
																			<img src="https://www.raghnall.co.in/iserrve/assets/employee_assets/img/logo-iserrve.png" style="width: 30%;" />
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
																															Please find the below Isserve '.ucfirst(substr($table, 4)).' details
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
																																			<td width="100px">Name:</td>
																																			<td>'.$this->input->post('name').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">Mobile No:</td>
																																			<td>'.$this->input->post('contact_no').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">Email:</td>
																																			<td>'.$this->input->post('email').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">Message:</td>
																																			<td>'.$this->input->post('message').'</td>
																																	</tr>
																																	<tr>
																																			<td width="100px">'.ucfirst(substr($table, 4)).':</td>
																																			<td>'.$this->input->post('type').'</td>
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

					$mail = $this->sent_claim_mail($to,$subject,$message,$addcc);
					if($mail == true){
							$api = $this->need_lib->assessment_api($_POST);
							if($api->status == true){
								 echo json_encode($api->result);
							}
					}


					// }
					// echo json_encode('success');
			}
	}

	public function policy_details()	{

			if($this->session->userdata("loginEmp")){
					$employee_no = $this->session->userdata("login_id");
					$policy_no = base64_decode(substr($_GET['pid'], 5));

					$data['policy_data']= $this->em->getPolicyData($policy_no);
					
					//echo "<pre>";print_r($data['policy_data']);echo"</pre>";exit;
					
					if($data['policy_data']['policy_end_date'] > date('Y-m-d')){
						$data['policy_members']= $this->em->get_policy_members($policy_no);
					}else{
						$data['policy_members']= '';
					}

					$product_type = $data['policy_data']['product_type'];
					$product_features_id = $data['policy_data']['id'];
					
					
					$data['policy_features'] = $this->em->get_policy_features($product_features_id,$product_type);
					
					$data['other_benefit'] = $this->em->get_other_benefit($product_features_id);
					
					//echo "<pre>";print_r($data['other_benefit']);echo"</pre>";exit;

					//$lib2 = $this->need_lib->downloaded_Ecard($policy_no,$employee_no);
					$e_card = $this->em->get_e_card($employee_no);
					
					//
					
					if($e_card->pdf_file != '' ){
						
						//$policy_no_new = $data['policy_data']['id'];
						//$ecardN = '<button type="button" class="e-card-btn btn btn-sm download_ecard" data-policy_id="'.$policy_no.'" data-id="'.$employee_no.'" style="color:white;">Download E-CARD</button>';
						
						$ecardN = '<a href="javascript:void(0)" class="e-card-btn download_ecard" data-policy_id="'.$policy_no.'" data-id="'.$employee_no.'" >Download E-CARD</a>';
						
						$data['e_card'] = $ecardN;
						$data['status'] = 'not_api';
					}



					/* if(!empty($lib2->result)){

						$data['e_card'] = json_decode($lib2->result, TRUE);
						$data['status'] = 'api';
					}elseif(!empty($e_card)){

						$data['e_card'] = base_url().'upload/pdf_file/'.$data['policy_data']['policy_no'].'/'.$e_card;
						$data['status'] = 'not_api';
					} */

					$isEcardExist = $this->em->isEcardExist($employee_no);
					if($isEcardExist == false){
							if($data['status'] == 'api'){
								$file = str_replace("https://www.healthindiatpa.com/Ecard_Integrations/","",$data['e_card']);
							}else{
								$file = str_replace(base_url()."upload/pdf_file/","",$data['e_card']);
							}
							//$file = $data['e_card'];
	            $tmp_file = $data['e_card'];
	            $path = './upload/pdf_file/';
	            $lib = $this->need_lib->upload_file($file, $tmp_file, $path);
	            $photo = $lib;
							$arr = array(
	                'corporate_id' => $data['policy_members'][0]['corporate_id'],
	                'policy_id' => $policy_no,
	                'employee_id' => $employee_no,
	                'pdf_file' => $file,
	            );

							$insert = $this->em->pdf_upload($arr);
					}

					$this->load->view('employee/policy-detail1',$data);
			}else{
				redirect('home');
			}
	}

	public function verify_employee(){
			$result = $this->em->verify_employee($_POST['emp_id'],$_POST['group_code']);
			
			
			if($result){
					echo json_encode($result);
			}else{
				  echo json_encode('fail');
			}
	}

	public function claim_form(){
			$employee_no = $this->session->userdata("login_id");
			$data['emp_details'] = $this->em->get_emp_policy_details($employee_no);
			$data['state'] = $this->em->get_all_state();
			$this->load->view('employee/claim-form',$data);
	}

	public function add_claim_data(){
			$relation = $this->input->post('relation');
			$employee_id = $this->input->post('employee_no');

			$data = array(
				'employee_id' => $employee_id,
				'employee_name' => $this->input->post('employee_name'),
				'contact_no' => $this->input->post('contact_no'),
				'employee_email' => $this->input->post('employee_email'),
				'policy_no' => $this->input->post('policy_no'),
				'product_type' => $this->input->post('product_type'),
				'corporate' => $this->input->post('corporate'),
				'relation' => $relation,
				'diagnosis' => $this->input->post('diagnosis'),
				'estimated_amount' => $this->input->post('estimated_amount'),
				'date_of_admission' => $this->input->post('date_of_admission'),
				'hospital_name' => $this->input->post('hospital_name'),
				'hospital_address' => $this->input->post('hospital_address'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'pincode' => $this->input->post('pincode'),
				'remarks' => $this->input->post('remarks'),
			);
			$result = true;//$this->em->insert_claim_data($data);

		if($result == true){
			if($this->input->post('tpa') == 'Health India Insurance TPA Services Private Limited'){
					$policy_no = $this->input->post('policy_original_number');
					$member_id = $this->em->get_member_id($employee_id,$relation);
					$res = $this->need_lib->add_to_healthindia($data,$policy_no,$member_id);
			}
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
										                <img src="https://www.raghnall.co.in/iserrve/assets/employee_assets/img/logo-iserrve.png" style="width: 30%;" />
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
										                                                <td>'.$this->input->post('employee_no').'</td>
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
																																		<td>'.$this->input->post('corporate').'</td>
																																</tr>
																																<tr>
																																		<td width="100px">Policy No.:</td>
																																		<td>'.$this->input->post('policy_original_number').'</td>
																																</tr>
																																<tr>
																																<tr>
										                                                <td width="100px">Relation of the patient with employee:</td>
										                                                <td>'.$relation.'</td>
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
					$addcc[0] = 'iSerrve@raghnall.co.in';
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

			$this->sent_claim_mail($to,$subject,$message,$addcc);
			echo json_encode('success');
		}else{
			echo json_encode('fail');
		}
	}

	public function sent_claim_mail($to,$subject,$message,$addcc){
		$AddAttachment = array();
		if($this->need_lib->mail_sent($to,$subject,$message,$addcc,$AddAttachment)){
			return true;
		}else{
			return false;
		}
	}

	public function add_request(){
			$data = array(
				'name' => $this->input->post('name'),
				'contact_no' => $this->input->post('contact_no'),
				'email' => $this->input->post('email'),
				'request' => $this->input->post('request'),
				'type' => 1 //for add or delete member request,
			);
			$result = $this->em->insertMemberRequest($data);

		if($result == true){
			/***email configuration***/
			$to = 'iSerrve@raghnall.co.in';
			$subject = 'Employee Member Request';
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
										                <img src="https://www.raghnall.co.in/iserrve/assets/employee_assets/img/logo-iserrve.png" style="width: 30%;" />
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
										                                        Please find the below employee request details
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
										                                                <td width="100px">Name:</td>
										                                                <td>'.$this->input->post('name').'</td>
										                                            </tr>
										                                            <tr>
										                                                <td width="100px">Email:</td>
										                                                <td>'.$this->input->post('email').'</td>
										                                            </tr>
										                                            <tr>
										                                                <td width="100px">Contact No:</td>
										                                                <td>'.$this->input->post('contact_no').'</td>
										                                            </tr>
																																<tr>
										                                                <td width="100px">Request:</td>
										                                                <td>'.$this->input->post('request').'</td>
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


			$addcc = array(); $i= 0;
			if(!empty($this->input->post('hr_email'))){
				$addcc[$i] = $this->input->post('hr_email');
				$i+1;
			}

			$this->sent_claim_mail($to,$subject,$message,$addcc);
			echo json_encode('success');
		}else{
			echo json_encode('fail');
		}
	}

	public function update_request(){
			$data = array(
				'name' => $this->input->post('name'),
				'contact_no' => $this->input->post('contact_no'),
				'email' => $this->input->post('email'),
				'request' => $this->input->post('request'),
				'type' => 2 //for update member request,
			);
			$result = $this->em->insertMemberRequest($data);

		if($result == true){
			/***email configuration***/
			$to = 'iSerrve@raghnall.co.in';
			$subject = 'Employee Member Request';
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
										                <img src="https://www.raghnall.co.in/iserrve/assets/employee_assets/img/logo-iserrve.png" style="width: 30%;" />
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
										                                        Please find the below employee request details
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
																																<td width="100px">Name:</td>
																																<td>'.$this->input->post('name').'</td>
																														</tr>
																														<tr>
																																<td width="100px">Email:</td>
																																<td>'.$this->input->post('email').'</td>
																														</tr>
																														<tr>
																																<td width="100px">Contact No:</td>
																																<td>'.$this->input->post('contact_no').'</td>
																														</tr>
																														<tr>
																																<td width="100px">Request:</td>
																																<td>'.$this->input->post('request').'</td>
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


			$addcc = array(); $i= 0;
			if(!empty($this->input->post('hr_email'))){
				$addcc[$i] = $this->input->post('hr_email');
				$i+1;
			}

			$this->sent_claim_mail($to,$subject,$message,$addcc);
			echo json_encode('success');
		}else{
			echo json_encode('fail');
		}
	}

	public function send_feedback(){
			$data = array(
				'name' => $this->input->post('name'),
				'contact_no' => $this->input->post('contact_no'),
				'email' => $this->input->post('email'),
				'message' => $this->input->post('message'),
			);
			$result = $this->em->insertFeedback($data);

		if($result == true){
			/***email configuration***/
			$to = 'iSerrve@raghnall.co.in';
			$subject = 'Employee Member Request';
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
										                <img src="https://www.raghnall.co.in/iserrve/assets/employee_assets/img/logo-iserrve.png" style="width: 30%;" />
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
										                                        Please find the below Registration details
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
										                                                <td width="100px">Name:</td>
										                                                <td>'.$data['name'].'</td>
										                                            </tr>
										                                            <tr>
										                                                <td width="100px">Email:</td>
										                                                <td>'.$data['email'].'</td>
										                                            </tr>
										                                            <tr>
										                                                <td width="100px">Password:</td>
										                                                <td>'.$data['phone'].'</td>
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

			$this->sent_claim_mail($to,$subject,$message,$addcc);
			echo json_encode('success');
		}else{
			echo json_encode('fail');
		}
	}

	public function get_relation_by_policy(){
			$policy_id = $this->input->post('policy',TRUE);
			$employee_id = $this->input->post('employee_id',TRUE);
			$data = $this->em->get_relation_by_policy($policy_id,$employee_id);
			echo json_encode($data);
	}

	public function get_otp(){
			$mobile = $this->input->post('mobile');
			$otp = $this->input->post('otp');

			$project = 'Dear%20Customer,%20Your%20OTP%20for%20Raghnall%20Login%20is%20'.$otp.'.%20%20Kindly%20do%20not%20share%20your%20OTP,%20as%20it%20is%20confidential.';
	    $result = $this->need_lib->send_otp($mobile,$otp,$project);
			if($result==TRUE){
				echo 'success';
			}
	}

	public function otpless(){
			$session_data['get_quote_session']=array(
					'no_emp' =>'',
					'sum_insurance_val' =>'',
					'sum_value' => '',
					'location' =>'',
					'coverage_val' => '',
					'company' => '',
					'email' => '',
					'name' => '',
					'age_emp' => '',
					'loginQuote' =>''
			);
			$this->session->unset_userdata($session_data['get_quote_session']);
			$redirectionURL = base_url()."get-quote-last";
			$result = $this->need_lib->otpless($redirectionURL);
			$res = $result->data;
			if(!empty($res)){
					$session_data['get_quote_session']=array(
							'no_emp' =>$_POST["no_emp"],
							'sum_insurance_val' =>$_POST["sum_insurance_val"],
							'sum_value' => $_POST["sum_value"],
							'location' =>$_POST["location"],
							'coverage_val' => $_POST["coverage_val"],
							'company' => $_POST["company"],
							'email' => $_POST["email"],
							'name' => $_POST["name"],
							'age_emp' => $_POST["age_emp"],
							'loginQuote' =>TRUE //boolean value TRUE
					);

					$this->session->set_userdata($session_data);
					echo json_encode($res);
			}

	}

	public function otpless_getdata(){
			$session_data['get_quote_sess']=array('mobile' =>'');
			$this->session->unset_userdata($session_data['get_quote_sess']);
			$token = $this->input->post('token');
			$result = $this->need_lib->otpless_userdata($token);
			if($result->responseCode == 200){
					$mobile = substr($result->data->mobile, 2);
					$session_data['get_quote_sess']=array('mobile' => $mobile);
					$this->session->set_userdata($session_data);
			}
			echo json_encode($result);
	}

	public function otpless_login(){
			$redirectionURL = base_url()."home";
			$result = $this->need_lib->otpless($redirectionURL);
			$res = $result->data;
			if(!empty($res)){
					echo json_encode($res);
			}
	}
	//
	public function otpless_logindata(){
		  $session_data['optless_sess']=array('mobile' =>'');
			$this->session->unset_userdata($session_data['optless_sess']);
			$token = $this->input->post('token');
			$result = $this->need_lib->otpless_userdata($token);

			if($result->responseCode == 200){
					$mobile = substr($result->data->mobile, 2);
					$res = $this->em->isUserExist($mobile);
					if($res== true){
						$session_data['optless_sess']=array('mobile' => $mobile);
						$this->session->set_userdata($session_data);
						echo json_encode($session_data);//$this->otpsent_new($mobile,$otp);
					}else{
						echo json_encode('fail');
					}
					//echo json_encode($mobile);
			}
	}

	public function otpsent_register_new($mobileNo='',$otpNo='',$emailId=''){
			$mobile = !empty($mobileNo) ?	$mobileNo: $this->input->post('mobile');
			$otp = !empty($otpNo) ?	$otpNo: $this->input->post('otp');
			$email = !empty($emailId) ?	$emailId: $this->input->post('email');
			$result = $this->em->isExistUser($mobile,$email);
			if($result == false){
					$project = 'Dear%20Customer,%20Your%20OTP%20for%20Raghnall%20Login%20is%20'.$otp.'.%20%20Kindly%20do%20not%20share%20your%20OTP,%20as%20it%20is%20confidential.';
		    	$res = $this->need_lib->send_otp($mobile,$otp,$project);
					if($res==TRUE){
							echo 'success';
				  }
			}else{
				echo 'fail';
			}
	}

	public function get_cashless_hospital_by_tpa(){
			$result = array('data' => array());
			$policy_id = $this->input->post('policy_id');
			$tpa = $this->em->get_tpa_by_policy($policy_id);
			if($tpa[0]['tpa'] == 'Health India Insurance TPA Services Private Limited'){
					$lib = $this->need_lib->newtwork_hospitals();
					$data['result'] = json_decode($lib->result, TRUE);
					$result = $data['result'];

			}else{
					$result = $this->em->get_cashless_hospital_list($tpa[0]['tpa']);
			}

			if(!empty($result)){
						$output = '';
			      for($i=0; $i<count($result); $i++){
								$row = $i+1;
								$output.='<tr>
										<td>'.$row.'</td>
										<td>'.ucwords(strtolower($result[$i]['HospitalName'])).'</td>
										<td>'.ucwords(strtolower($result[$i]['AddressLine1'])).'</td>
										<td>'.$result[$i]['PhoneNumber'].'</td>
										<td>'.ucwords(strtolower($result[$i]['Landmark1'])).'</td>
										<td>'.ucwords(strtolower($result[$i]['CityName'])).'</td>
										<td>'.ucwords(strtolower($result[$i]['StateName'])).'</td>
										<td>'.$result[$i]['Pincode'].'</td>
								</tr>';
			      }
			      echo json_encode($output);
		   }else{
				 	echo json_encode('No record found');
			 }
	}

	public function current_claims(){
			$employee_no = $this->session->userdata("login_id");
			$data['claims'] = $this->em->get_current_claims($employee_no);
			//$data['track_claim'] = $this->em->get_current_claims_details($employee_no);
			$this->load->view('employee/claim-stat',$data);
	}

	public function downloads_doc(){
			$employee_no = $this->session->userdata("login_id");
			$data['policy'] = $this->em->get_emp_policy_details($employee_no);
			$policy_id = $data['policy'][0]->policy_id;
			$data['doc'] =$this->em->get_documents_by_policy($policy_id);
			$this->load->view('employee/downloads_documents',$data);
	}

	public function get_documents($value=''){
			$policy_id = $this->input->post('policy_id');
			$result = $this->em->get_documents_by_policy($policy_id);
			if(!empty($result)){
						$output = '';
			      foreach($result as $row){
							$info = new SplFileInfo($row["document"]);
							$path = strtoupper($info->getExtension());
								$output.='<div class="col-lg-6 margin-20px-bottom">
															<a href="'.base_url().'upload/utilities/'.$row["document"].'" target="_blank">
																	<div class="download-sec">
																			<div class="download-ico">
																					<i class="feather icon-feather-file-text"></i>
																			</div>
																			<div class="download-cont">
																					<h6>'.$row["name"].'</h6>
																					<span><i>Format: '.$path.'</i>
																					</span>
																			</div>
																			<div class="download-btn">
																					<i class="feather icon-feather-download"></i>
																			</div>
																	</div>
															</a>
											  </div>';
			      }

			      echo json_encode($output);
		   }else{
				 	echo json_encode('No record found');
			 }
	}

	public function track_claim_status(){
			$result = array('data' => array());
			$employee_no = $this->session->userdata("login_id");
			$claim_id = base64_decode($this->input->post("claim_id"));
			$result = $this->em->get_current_claims_details($employee_no,$claim_id);
			$output = '';
			if(!empty($result)){
				$output .='<tr>
											<td>Name of Insured</td>
											<td>'.ucwords(strtolower($result['employee_name'])).'</td>
									</tr>
									<tr>
											<td>Patient Name</td>
											<td>'.ucwords(strtolower($result['patient_name'])).'</td>
									</tr>
									<tr>
											<td>Hospital Name</td>
											<td>'.ucwords(strtolower($result['hospital_name'])).'</td>
									</tr>
									<tr>
											<td>Relation</td>
											<td>'.ucwords(strtolower($result['relation'])).'</td>
									</tr>

									<tr>
											<td>Date of Admission</td>
											<td>'.$result['hospitliz_date'].'</td>
									</tr>
									<tr>
											<td>Date of Discharge</td>
											<td>'.$result['discharge_date'].'</td>
									</tr>
									<tr>
											<td>Claim Number</td>
											<td>'.$result['insurance_claim_no'].'</td>
									</tr>
									<tr>
											<td>Claim Status</td>
											<td>'.$result['claim_status'].'</td>
									</tr>

									<tr>
											<td>Outstanding Claim Status</td>
											<td>'.$result['claim_sub_status'].'</td>
									</tr>
									<tr>
											<td>Claim Type</td>
											<td>'.ucwords(strtolower($result['claim_type'])).'</td>
									</tr>

									<tr>
											<td>Network Status</td>
											<td>'.$result['network_status'].'</td>
									</tr>
									<tr>
											<td>Claim Registered Date</td>
											<td>'.$result['register_date'].'</td>
									</tr>
									<tr>
											<td>Disease Category</td>
											<td>'.$result['disease_category'].'</td>
									</tr>

									<tr>
											<td>File Received Date</td>
											<td>'.$result['filed_date'].'</td>
									</tr>
									<tr>
											<td>Approved Date</td>
											<td>'.$result['settled_date'].'</td>
									</tr>

									<tr>
											<td>Claim Amount</td>
											<td>₹ '.$result['amount_claimed'].'</td>
									</tr>
									<tr>
											<td>Deduction Amount</td>
											<td>₹ '.$result['deduction_amount'].'</td>
									</tr>
									<tr>
											<td>Deduction Reason</td>
											<td>'.$result['deduction_reason'].'</td>
									</tr>
									<tr>
											<td>Amount Paid</td>
											<td>₹ '.$result['claim_paid_amount'].'</td>
									</tr>
									<tr>
											<td>Amount Paid Date</td>
											<td>'.$result['settled_date'].'</td>
									</tr>
									<tr>
											<td>Reason For Closure</td>
											<td>'.$result['closure_reason'].'</td>
									</tr>';
			}else{
					$output.= '<tr><td>No record found...</td></tr>';
			}

			echo json_encode($output);
	}

	public function getEmployeeDetails(){
			$employee_no = $this->session->userdata("login_id");
			$result = $this->em->getEmpData($employee_no);
			if(!empty($result)){
				echo json_encode($result);
			}else{
				echo json_encode('fail');
			}
	}

	public function getPatientDetails(){
			$relation = $this->input->post('relation');
			$policy_id = $this->input->post('policy_id');
			$employee_id = $this->input->post('employee_id');
			$result = $this->em->get_patient_details_by_member_id($policy_id,$employee_id,$relation);
			echo json_encode($result);
	}
	
	function download_ecard(){
		
			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
			$employee_no = isset($_POST['employee_no'])?$_POST['employee_no']:null;
			$policydata = $this->em->get_policy_no($policy_id);
			
			
			
			$e_card = $this->em->get_e_card_new($policy_id,$employee_no,$policydata->corporate_id);
			
			//echo "<pre>";print_r($e_card);echo"</pre>";exit;
			
			if($e_card->is_upload_from == 1){


					$ecard = $e_card->pdf_file;		
					$data['api'] = 'yes';
					$data['file'] = $ecard;	
					$data['filename'] = basename($e_card->pdf_file); // to get file name
			    echo json_encode($data);
			}else{
					$e_card = $e_card->pdf_file;
					$ecard = base_url().'upload/pdf_file/'.$policydata->policy_no.'/'.$e_card;
					$data['api'] = 'no';
					$data['filename'] = $e_card;
					$data['file'] = $ecard;	
					echo json_encode($data);
			}
			
			//echo "<pre>";print_r($e_card);echo"</pre>";exit;
	}

}
