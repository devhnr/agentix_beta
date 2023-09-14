<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/PHPExcel.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class HomeController extends CI_Controller {

	function __construct(){
        parent::__construct();
				if(!$this->session->userdata("loginHR")){
						$redirection = str_replace('corporate/', '', base_url());
            redirect($redirection);
        }
        $this->load->model('Home_Model','hm');
				$this->policies = $this->need_lib->get_policies();

  }

	public function index(){
			$data=array('file'=>'employee-list');
			$data['records'] = $this->hm->get_no_of_employees();
			// echo '<pre>'; print_r($data['records']);exit;
			$this->template->full_corporate_html_view($data);
	}

	public function showEmployees() {
			$this->load->library("Need_lib");
			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
      $result = array('data' => array());
      $data = $this->hm->get_all_employees($policy_id);
          foreach ($data as $key => $value) {
          	$resu = $this->hm->get_policy_no($policy_id);
						$policyNo = $resu->policy_no;
						$ProType = $resu->product_type;

            //$lib2 = $this->need_lib->downloaded_Ecard($policyNo,$value["employee_id"]);
            $e_card = $this->hm->get_e_card($policy_id,$value["employee_id"]);
            if(!empty($e_card)){
                $ecardN = '<button type="button" class="btn btn-sm download_ecard bg-maroon" data-policy_id="'.$policy_id.'" data-id="'.$value["employee_id"].'" style="color:white;">E-Card</button>';
								$ecardN_mail = '<button type="button" class="btn btn-sm e_card_mail bg-purple" data-id="'.$value["employee_id"].'"  data-policy_id="'.$policy_id.'"  style="color:white;">E-Card Mail</button>';
            }else{
                $ecardN = '-';
								$ecardN_mail = '-';
            }
						if($ProType == 'GPA'){
								$dependent = '-';
						}elseif($ProType == 'GTL'){
								$dependent = '-';
						}else{
								$dependent = '<button type="button" class="btn btn-sm editRecord bg-purple" data-id="'.$value["employee_id"].'"  data-toggle="modal" data-target="#modal-xl" style="color:white;">Dependent</button>';
						}
						//$ecardN = '<button type="button" class="btn btn-sm download_ecard bg-maroon" data-policy_id="'.$policy_id.'" data-id="'.$value["employee_id"].'" style="color:white;">E-Card</button>';

            $intimate_claim_btn = '<button type="button" class="btn btn-sm intimate_claim bg-maroon" data-policy_id="'.$value["employee_id"].'" data-id="'.$value["employee_id"].'" style="color:white;">Intimate Claim </button>';

              $result['data'][$key] = array(
                    $key+1,
                    $value["employee_id"],
                    ucwords(strtolower($value['emp_name'])),
                    $value['email'],
                    $value['mobile_no'],
                    $value['age'],
										$value['gender'],
										$value['birth_date'],
										$value['created_date'],
								    $dependent,
								    $ecardN,
								    $ecardN_mail,
										$intimate_claim_btn,
              );
          }
      echo json_encode($result);
  }

	public function download_employee_excel_file(){
			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
			$filename = 'employee_excel_'.date('d-m-Y').'.xls';
			$empData = $this->hm->get_all_employees_with_dependent($policy_id);
			$this->load->library('PHPExcel');
			$objePHPExecel = new PHPExcel();
			$objePHPExecel->setActiveSheetIndex(0);
			$objePHPExecel->getActiveSheet()->SetCellValue('A1', 'Sr. No');
			$objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Employee ID');
			$objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Employee Name');
			$objePHPExecel->getActiveSheet()->SetCellValue('D1', 'Email');
			$objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Mobile No');
			$objePHPExecel->getActiveSheet()->SetCellValue('F1', 'Age');
			$objePHPExecel->getActiveSheet()->SetCellValue('G1', 'Gender');
			$objePHPExecel->getActiveSheet()->SetCellValue('H1', 'Relation');
			$objePHPExecel->getActiveSheet()->SetCellValue('I1', 'D.O.B');
			$objePHPExecel->getActiveSheet()->SetCellValue('J1', 'D.O.J');
			$objePHPExecel->getActiveSheet()->SetCellValue('K1', 'Date');
			$objePHPExecel->getActiveSheet()->SetCellValue('L1', 'ECard');
			$rows = 2;
			$i=1;

			foreach ($empData as $val){
					$employee_id = $val['employee_id'];
					$ecard_status = $this->hm->get_e_card($policy_id,$employee_id);
					$ecard = (!empty($ecard_status) ? 'Yes':'No');
					$objePHPExecel->getActiveSheet()->SetCellValue('A' . $rows, $i);
					$objePHPExecel->getActiveSheet()->SetCellValue('B' . $rows, $employee_id);
					$objePHPExecel->getActiveSheet()->SetCellValue('C' . $rows, $val['emp_name']);
					$objePHPExecel->getActiveSheet()->SetCellValue('D' . $rows, $val['email']);
					$objePHPExecel->getActiveSheet()->SetCellValue('E' . $rows, $val['mobile_no']);
					$objePHPExecel->getActiveSheet()->SetCellValue('F' . $rows, $val['age']);
					$objePHPExecel->getActiveSheet()->SetCellValue('G' . $rows, $val['gender']);
					$objePHPExecel->getActiveSheet()->SetCellValue('H' . $rows, $val['relationship']);
					$objePHPExecel->getActiveSheet()->SetCellValue('I' . $rows, $val['birth_date']);
					$objePHPExecel->getActiveSheet()->SetCellValue('J' . $rows, $val['joining_date']);
					$objePHPExecel->getActiveSheet()->SetCellValue('K' . $rows, $val['created_date']);
					$objePHPExecel->getActiveSheet()->SetCellValue('L' . $rows, $ecard);
					$rows++;
					$i++;
			}

			$objePHPExecel->getActiveSheet()->getStyle("A1:L1")->getFont()->setBold(true);
			for ($s=65; $s<=90; $s++) {
					$objePHPExecel->getActiveSheet()->getColumnDimension(chr($s))->setAutoSize(true);
			}

			$writer = PHPExcel_IOFactory::createWriter($objePHPExecel,'Excel2007');
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-control: max-age=0');
			// ob_end_clean();
			// $writer->save('php://output');

			ob_start();
			$writer->save("php://output");
			$xlsData = ob_get_contents();
			ob_end_clean();

			$response =  array(
	        'op' => 'ok',
					'filename'=> $filename,
	        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
	    );

			die(json_encode($response));
	}

	public function showFamily() {
        $result = array('data' => array());
				$employee_id = $this->input->post('employee_id');
        $result = $this->hm->get_family_members($employee_id);
				$output = '';
				if(!empty($result)){
						foreach($result as $key => $value){
						$i= $key+1;
							$output.= '<tr>
													<td>'.$i.'</td>
													<td>'.ucfirst(strtolower($value['relationship'])).'</td>
													<td>'.ucwords(strtolower($value['emp_name'])).'</td>
													<td>'.$value['birth_date'].'</td>
													<td>'.$value['age'].'</td>
													<td>'.$value['gender'].'</td>
													<td>'.$value['email'].'</td>
													<td>'.$value['mobile_no'].'</td>
													<td>'.$value['created_date'].'</td>
												</tr>';
						}
				}else{
						$output.= '<tr><td>No record found...</td></tr>';
				}

        echo json_encode($output);
    }

		public function get_no_ofemployees(){
				$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
				$result = $this->hm->get_no_of_employees($policy_id);
				echo json_encode($result);
		}

		public function download_ecard(){
			$this->load->library("Need_lib");
			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
			$employee_no = isset($_POST['employee_no'])?$_POST['employee_no']:null;
			$resu = $this->hm->get_policy_no($policy_id);
			$policyNo = $resu->policy_no;
			$lib2 = $this->need_lib->downloaded_Ecard($policyNo,$employee_no);
			$e_card = $this->hm->get_e_card($policy_id,$employee_no);

			if($e_card->is_upload_from == 1){

					$ecard = $e_card->pdf_file;
					$data['api'] = 'yes';
					$data['file'] = $ecard;
					$data['filename'] = basename($e_card->pdf_file); // to get file name
			    echo json_encode($data);
			}else{
					$e_card = $e_card->pdf_file;
					$ecard = str_replace('corporate/', '', base_url()).'upload/pdf_file/'.$policyNo.'/'.$e_card;
					$data['api'] = 'no';
					$data['filename'] = $e_card;
					$data['file'] = $ecard;
					echo json_encode($data);
			}


			// echo "<pre>";print_r($e_card->pdf_file);echo"</pre>";exit;
			// if(!empty($e_card)){
			// 		$ecard = str_replace('corporate/', '', base_url()).'upload/pdf_file/'.$policyNo.'/'.$e_card;
			// 		$data['api'] = 'no';
			// 		$data['filename'] = $e_card;
			// 		$data['file'] = $ecard;
			// 		echo json_encode($data);
			// }elseif(!empty($lib2->result)){
			// 		$ecard = json_decode($lib2->result, TRUE);
			// 		$data['api'] = 'yes';
			// 		$data['file'] = $ecard;
			// 		$data['filename'] = basename($ecard); // to get file name
			//         echo json_encode($data);
			// }
		}

		public function send_ecard_mail(){

			$this->load->library("Need_lib");

			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
			$employee_no = isset($_POST['employee_id'])?$_POST['employee_id']:null;
			$resu = $this->hm->get_policy_no($policy_id);
			$policyNo = $resu->policy_no;
      $lib2 = $this->need_lib->downloaded_Ecard($policyNo,$employee_no);
      $e_card = $this->hm->get_e_card($policy_id,$employee_no);

			if(!empty($e_card)){

				if($e_card->is_upload_from == 1){
					//echo "sd";exit;
					$ecard_url = $e_card->pdf_file;
					$api = 1;
				}else{
					$api = 0;
					$e_card = $e_card->pdf_file;
					$ecard_url = str_replace('corporate/', '', base_url()).'upload/pdf_file/'.$policyNo.'/'.$e_card;

				}

			}


			//echo $ecard_url."sd";

            /* if(!empty($e_card)){
				$ecard_url = str_replace('corporate/', '', base_url()).'upload/pdf_file/'.$e_card;
			}elseif(!empty($lib2->result)){
				$ecard_url = json_decode($lib2->result, TRUE);
			} */

			//echo "<pre>";print_r($ecard_url);exit;

				$to = $_POST['email'];
				$subject = 'Isserve E-Card';
				$message_api = '<!DOCTYPE html>
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
																	</div>';

																		$message_api.='<div class="email-wrapper">
																				<p>Ecard Url : '.$ecard_url.'</p>
																		</div>';


															$message_api.='</div>
													</body>
											</html>';


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
																	</div>';
															$message.='</div>
													</body>
											</html>';


					$addcc = array();

					//if(!empty($e_card)){

						if($api == 1){

							//echo "api";exit;

							$AddAttachment = array();
							$this->need_lib->mail_sent($to,$subject,$message_api,$addcc,$AddAttachment);
						}else{

							//echo "custom";exit;
							//$e_card = $e_card->pdf_file;
							$ecard_url = str_replace('corporate/', '', base_url()).'upload/pdf_file/'.$policyNo.'/'.$e_card;

							$AddAttachment = $ecard_url;
							$this->mailsent_with_attachment($to,$subject,$message,$addcc,$AddAttachment);
						}

					//}


					//$AddAttachment = array();
					//$this->need_lib->mail_sent($to,$subject,$message,$addcc,$AddAttachment);
					/* $this->mailsent_with_attachment($to,$subject,$message,$addcc,$AddAttachment); */
					echo json_encode('success');
		}


		function mailsent_with_attachment($to,$subject,$message,$addcc,$AddAttachment)
	{
		error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			//Server settings
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

			$mail->addStringAttachment(file_get_contents($AddAttachment), 'E-Card.pdf');

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

	public function intimate_claim_session(){
		$employee_id = $_POST['employee_id'];
		$newdata = array('intimate_session_employee_id' => $employee_id);
		$this->session->set_userdata($newdata);
		echo json_encode('success');
	}

	public function cd_balance(){
			$this->load->model('Endorsement_Model','em');
			$result = $this->hm->get_cd_balance();
			$output = '';
			if(!empty($result)){
				foreach($result as $key => $value){
					$cd_nimber = $value['cd_number'];
					$cd_no = $value['id'];
					$data = $this->em->get_deposite_entry($cd_no);
					$total = 0;
					if($data != ''){
						foreach ($data as $key => $value) {
								$total +=$value['amount'];
						}
					}

    				$dat = $this->em->get_premium_entry($cd_no);
    	            $total_1 = 0;
    	            $total_2 = 0;
    
    				if($dat != ''){
        	            foreach ($dat as $key => $value) {
        	                if($value['transaction_type'] == 'debit'){
        	                    $total_1 +=$value['gross_premium_policy'];
        	                }
        	                if($value['transaction_type'] == 'credit'){
        	                    $total_2 +=$value['gross_premium_policy'];
        	                }
        	            }
    				}
    
    				$balance_amt = $total - $total_1 + $total_2;
    
    				$output.= '<span class="dropdown-header">'.$cd_nimber.' : ₹ '.$balance_amt.'/-</span>';
			   }
			}else{
					$output.= '<tr><td>No record found...</td></tr>';
			}

        echo json_encode($output);

	}

}
