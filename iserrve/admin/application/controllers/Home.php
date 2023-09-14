<?php
defined('BASEPATH') OR exit('No direct script aess allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Mpdf\Mpdf;

class Home extends CI_Controller {

	private $_data = array();

	function __construct() {

		parent::__construct();
		$this->load->model('admin');
		$this->load->model('corporate_dashboard_model');
		if($this->session->userdata('adminId') == ''){

			redirect($this->config->item('base_url'));

		}

		include("phpmailer/PHPMailer.php");
		include("phpmailer/SMTP.php");
		include("phpmailer/POP3.php");
		date_default_timezone_set('Asia/Kolkata');

	}

	function index()

	{

		$data = array();

		$data['L_strErrorMessage']='';

		$this->load->view('dashboard',$data);

	}


	function summary()

	{

		$data = array();

		$data['L_strErrorMessage']='';

		$this->load->view('summary',$data);

	}

	function summary_pdf()

	{
		//echo "sd";exit;
		$data = array();

		$data['corporate_id'] = 73;
				$data['policy_id'] = 67;

				$data['policy_start_date_pdf'] = '2023-04-18';
				$data['policy_end_date_pdf'] = '2024-04-17';

		$data['L_strErrorMessage']='';

		$this->load->view('summary_pdf',$data);

	}

	public function generatePDF() {


				$data = array();

				$data['L_strErrorMessage']='';


				$data['corporate_id'] = $_POST['pdf_corp_id'];
				$data['policy_id'] = $_POST['pdf_policy_id'];

				$data['policy_start_date_pdf'] = $_POST['pdf_policy_start_date'];

				$data['policy_end_date_pdf'] = $_POST['pdf_policy_end_date'];

				$html = $this->load->view('summary_pdf', $data, true);


				//echo"<pre>";print_r($html);echo"</pre>";exit;

				$path =  $this->config->item('upload') . "summary_pdf/";

				if(!is_dir($path)){
					@mkdir($path, 0777, true);
				}




		        include_once APPPATH . 'libraries/mpdf/mpdf.php';
				$filename= time()."_summary.pdf";
		        $mpdf = new mPDF();
		        $mpdf->SetFooter('|{PAGENO} of {nb}|');
		        $mpdf->SetAutoPageBreak(TRUE);
		        $mpdf->WriteHTML($html);
		        $mpdf->Output($path.$filename);


				/* $path =  $this->config->item('upload') . "summary_pdf/";

				if(!is_dir($path)){
					@mkdir($path, 0777, true);
				}

				$filename= time()."summary.pdf";
		        $mpdf = new mPDF();
		        $mpdf->SetFooter('|{PAGENO} of {nb}|');
		        $mpdf->SetAutoPageBreak(TRUE);
		        $mpdf->WriteHTML($html);
		        $mpdf->Output($path.$filename, 'F');

				//echo"<pre>";print_r($mpdf);echo"</pre>";exit;

				$download_link = $this->config->item('front_base_url')."upload/summary_pdf/".$filename;//base_url('pdfs/' . $file_name);

				$download = str_replace('index.php/', '',$download_link);

				$this->load->helper(array('download', 'file'));



				$this->downloadFile($filename); */


				//redirect($download);


    }
	public function downloadFile($filename)
	{

		if(!empty($filename)){

            $this->load->helper(array('download', 'file'));

            $pth    =   $this->config->item('front_base_url')."upload/summary_pdf/".$filename."";

            //force_download($filename, $pth);

			force_download($filename, file_get_contents($pth));

			//$this->removeFile($filename);

			//delete_files($pth);
        }
	}

	public function removeFile()
{
	$file_name = "no-image.png";
    $folder_path = $this->config->item('front_base_url')."upload/summary_pdf/";  // Replace with the actual folder path

    $file_path = "http://localhost/iserve_git/iserrrve-beta/upload/summary_pdf/no-image.png";

    // Check if the file exists

        // Attempt to delete the file
        if (unlink($file_name)) {
            echo 'File removed successfully.';
        } else {
            echo 'Unable to remove the file.';
        }

}

	function corporate_dashboard($corp_id,$policy_id)

	{
		/* ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL); */

		//$this->session->set_userdata('policy_id',$policy_id);

		$data = array();

		$data['L_strErrorMessage']='';
		$data['corporate_id'] = $corp_id;
		$data['policy_id'] = $policy_id;
		$data['policy_number'] = $this->corporate_dashboard_model->get_policy_using_corporate($corp_id);

		$data['enrolement_details'] = $this->corporate_dashboard_model->get_enrolement_details($corp_id,$policy_id);

		$data['policy_feature'] = $this->corporate_dashboard_model->get_policy_feature_details($corp_id,$policy_id);

		$data['policy_data'] = $this->corporate_dashboard_model->single_policy_data($data['policy_id']);

		$data['live_claim_data'] = $this->corporate_dashboard_model->live_claim_data($corp_id,$policy_id);

		$data['live_utilitie_tap_data'] = $this->corporate_dashboard_model->live_utilitie_tap_data($corp_id,$policy_id);

		$data['live_Escalation_data'] = $this->corporate_dashboard_model->live_Escalation_data($corp_id,$policy_id);

		$this->load->library('Need_lib');


		// echo $data['policy_id'];exit;
		//echo "<pre>";print_r($data['policy_data']->tpa);echo "</pre>";




		if($data['policy_data']->tpa == 'Health India Insurance TPA Services Private Limited'){

			//echo "health";exit;

				$lib = $this->need_lib->newtwork_hospitals();

				//echo "<pre>";print_r($lib);echo "</pre>";exit;
				$data['network_hospital']= json_decode($lib->result, TRUE);
				$data['cashless_hospital'] = '';
		}else{

			//echo "error";exit;
				$this->load->model('Cashless_Hospital_Model','ch');
				$tpa= $data['policy_data']->tpa;
				$data['cashless_hospital']= $this->ch->get_cashless_hospital_list($tpa);
				$data['network_hospital'] = '';
		}







		if($this->input->post('action') == 'policy_update'){

			$data1['policy_id'] = $this->input->post('policy_id');
			$data1['policy_no'] = $this->input->post('policy_no');
			$data1['tpa'] = $this->input->post('tpa');
			$data1['policy_start_date'] = $this->input->post('policy_start_date');
			$data1['policy_end_date'] = $this->input->post('policy_end_date');

			// echo "<pre>";print_r($data1);echo "</pre>";exit;


			$this->corporate_dashboard_model->update_policy_data($data1);

			$this->session->set_flashdata('L_strErrorMessage','Policy Updated Successfully!!!!');

			redirect($this->config->item('base_url').'home/corporate_dashboard/'.$data['corporate_id'].'/'.$data['policy_id']);
		}


		//echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('corporate_dashboard',$data);

	}

	function corporate_listing()

	{

		$data = array();

		$data['L_strErrorMessage']='';

		$data['all_corporate'] = $this->corporate_dashboard_model->get_all_corporate();

		//echo "<pre>";print_r($data['all_corporate']);echo"</pre>";

		$this->load->view('corporate_listing',$data);

	}

	function view_user_status($corp_id,$policy_id){

		$data['error_msg'] = "";
		//echo $corp_id;

		$data['corporate_id'] = $corp_id;
		$data['policy_id'] = $policy_id;

		$data['all_corporate'] = $this->corporate_dashboard_model->get_all_corporate();

		$data['all_policy'] = $this->corporate_dashboard_model->get_all_policy();

		$data['all_suminsured'] = $this->corporate_dashboard_model->get_policy_suminsurance($policy_id);

		$data['result'] = $this->corporate_dashboard_model->get_active_verification_user_xls_data($corp_id,$policy_id);

		//echo "<pre>";print_r($data);echo"<pre>";exit;

		$this->load->view('corp_user_status',$data);
	}

	function rack_rate_calculation()

	{

		$data = array();

		$data['L_strErrorMessage']='';

		$this->load->view('rack_rate_calculation',$data);

	}

	function endorsement_calculation()

	{

		$data = array();

		$data['L_strErrorMessage']='';

		$this->load->view('endorsement_calculation',$data);

	}



	function change_password(){

	$result = $this->admin->get_user($this->session->userdata('adminId'));

	$form_field = $data = array(

	'L_strErrorMessage' => '',

	'id'	=> $result[0]->id,

	'password'	=> $result[0]->password,

	'newpassword'	=>"",

	);

	if($this->input->post('action') == 'edit_pass')

	{

	foreach($data as $key => $value)

	{

	$form_field[$key]=$this->input->post($key);

	}

	$this->load->library('validation');

	$rules['newpassword'] = "trim|required";

	$this->validation->set_rules($rules);

	$fields['newpassword']   = "tutorial Category Name";

	$this->validation->set_fields($fields);

	if ($this->validation->run() == FALSE)

		{

	$data = $form_field;

	$data['L_strErrorMessage'] = $this->validation->error_string;

		}else{

	if($response = $this->admin->edit_pass($form_field))

		{

	$this->session->set_flashdata('L_strErrorMessage','Password Updated Successfully!!!!');

	redirect($this->config->item('base_url').'home/change_password');

	}

	else

		{

	$data['L_strErrorMessage'] = 'Some Errors prevented from update data,please try again later.';

	}

	}

	}

	$this->load->view('edit_password',$data);

	}





	function download_user()

	{



		$orders_list  = $this->admin->list_user1();

		$output = '';

		$output .= 'Sr No.,First Name,Last Name, Email,Mobile';

		$output .="\n";

		if($orders_list != '' && count($orders_list) > 0) {

			$i=1;

		foreach($orders_list as $orders) {



		$output .= '"'.$i.'","'.$orders['fname'].'","'.$orders['lname'].'","'.$orders['email'].'","'.$orders['mobile'].'"';

		$output .="\n";

		$i++; }

		}

		$filename = "users.csv";

		header('Content-type: application/csv');

		header('Content-Disposition: attachment; filename='.$filename);

		echo $output;

		exit;



	}



	function download_subscribe()

	{

		$orders_list  = $this->admin->list_subscribe1();

		$output = '';

		$output .= 'Sr No.,Email,Type';

		$output .="\n";

		if($orders_list != '' && count($orders_list) > 0) {

			$i=1;

		foreach($orders_list as $orders) {

			if($orders['flage']==0)

			{

				$flage="Say YAA to Yoga";

			}else

			{

				$flage="YogiTribe";

			}

		$output .= '"'.$i.'","'.$orders['email'].'","'.$flage.'"';

		$output .="\n";

		$i++; }

		}

		$filename = "subscribe.csv";

		header('Content-type: application/csv');

		header('Content-Disposition: attachment; filename='.$filename);

		echo $output;

		exit;



	}

	function get_file_contents()

	{

		ini_set('max_execution_time',-1);

		ini_set('memory_limit', '512M');



		$this->load->library('PHPExcel');

		$pathfile =$this->config->item('document_root').'data.xlsx';

		$PHPExcel = PHPExcel_IOFactory::load($pathfile);



		$objWorksheet = $PHPExcel->getActiveSheet();

		$highestrow = $objWorksheet->getHighestRow();

		$branch_item_list =array();

		if($highestrow != 0)

		{

				for($i=2;$i<=$highestrow;$i++)

				{

					$obj_insData = array('code.'=> addslashes($PHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()));

					if($obj_insData == '' && count($obj_insData) == '0')

					{

						continue;

					}else

					{

						$branch_item_list[] = $productcode= addslashes($PHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue());



						if($response = $this->admin->updateproduct($productcode)){



						}

					}

				}

		}

		echo "Successfully";

	}

	public function network_hospitals(){
		$this->load->library('Need_lib');
		$data['title']	= 'Home';
		$lib = $this->need_lib->newtwork_hospitals();
    	$data['newtwork_hospitals']= json_decode($lib->result, TRUE);
		$this->load->view('list_network_hospital',$data);
	}

	public function assessment_list(){
		$title = 'assessment';
		$data['assessment'] = $this->admin->get_all_data($title);
		$this->load->view('list_assessment',$data);
	}

	public function prevention_list(){
		$title = 'prevention';
		$data['prevention'] = $this->admin->get_all_data($title);
		$this->load->view('list_prevention',$data);
	}

	public function protection_list(){
		$title = 'protection';
		$data['protection'] = $this->admin->get_all_data($title);
		$this->load->view('list_protection',$data);
	}

	public function request_list(){
		$title = 'request';
		$data['request'] = $this->admin->get_all_data($title);
		$this->load->view('list_request',$data);
	}

	public function feedback_list(){
		$title = 'feedback';
		$data['feedback'] = $this->admin->get_all_data($title);
		$this->load->view('list_feedback',$data);
	}

	public function deleteData(){
			if($this->input->post('checkbox_value')){
					 $id = $this->input->post('checkbox_value');
					 $tbl = $this->admin->xss_clean_inputData($this->input->post('tbl'));
					 for($count = 0; $count < count($id); $count++)
					 {
						$this->admin->delete_data($id[$count],$tbl);

						if($tbl == 'tbl_request'){
							$module= 'Delete Employee Request';
						}elseif($tbl == 'tbl_assessment'){
							$module= 'Delete Assessment';
						}elseif($tbl == 'tbl_protection'){
							$module= 'Delete Protection';
						}elseif($tbl == 'tbl_prevention'){
							$module= 'Delete Prevention';
						}
						elseif($tbl == 'tbl_cashless_hospital'){
							$module= 'Delete Cashless Hospital';
						}
						elseif($tbl == 'tbl_claim'){
							$module= 'Delete Claim';
						}elseif($tbl == 'tbl_feedback'){
							$module= 'Delete Feedback';
						}



						$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => $module,
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
					 }
					 $this->session->set_flashdata('L_strErrorMessage',ucfirst(substr($tbl, 4)). ' Deleted Successfully');
			}
	}

	function show_policy_using_corporate(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->corporate_dashboard_model->show_policy_using_corporate($pro_id);
		//echo "<pre>";print_r($data);echo"</pre>";exit;
        // echo $data; exit;
        $html = '<select id="policy_id" name="policy_id" class="form-control multiple-select" onChange="get_suminsurence(this.value)">';
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

	function get_policy_suminsurance(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        // echo $pro_id;
        $data = $this->corporate_dashboard_model->get_policy_suminsurance($pro_id);
        // echo $data; exit;
        //echo "<pre>";print_r($data);echo"</pre>";exit;
        $html = '<select id="sum_insured" name="sum_insured" class="form-control multiple-select" >';
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


    function updatestatus($id,$value)	{

	// echo $id."fdf".$value;exit;
	$result=$this->corporate_dashboard_model->updatestatus($id,$value);
	$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully');
	redirect($this->config->item('base_url').'home/corporate_listing');
	}


	function employee_activation_verification(){


		$data['corporate_id'] = $_POST['corporate_id'];
		$data['policy_id'] = $_POST['policy_id'];
		$data['suminsure_id'] = $_POST['suminsure_id'];


		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$get_employeenrolement_id = $this->corporate_dashboard_model->chech_employee_status($data['corporate_id'],$data['policy_id'],$data['suminsure_id']);

		$error = "Error at Row no : ";

		//echo $get_employeenrolement_id;exit;

		$k = 2;

// 		if($get_employeenrolement_id > 0){

			//

			$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

			if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {

				//


				$arr_file = explode('.', $_FILES['file']['name']);
				$extension = end($arr_file);

				if('csv' == $extension) {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				}

				$spreadsheet = $reader->load($_FILES['file']['tmp_name']);


				$sheetData = $spreadsheet->getActiveSheet()->toArray();

				if (!empty($sheetData)) {



					for ($i=1; $i<count($sheetData); $i++) {

						$employee_id = $sheetData[$i][0];
						$name_of_the_employee = $sheetData[$i][1];
						$relationship = $sheetData[$i][2];
						$date_of_joining = $sheetData[$i][3];
						$d_o_b = $sheetData[$i][4];
						$gender = $sheetData[$i][5];
						$age = $sheetData[$i][6];
						$email = $sheetData[$i][7];
						$mobile_no = $sheetData[$i][8];
						$sum_insured = $sheetData[$i][9];
						$hr_cc = $sheetData[$i][10];


						$data = array(
                            'Employee_id'    => $employee_id,
                            'name_of_the_employee'    => $name_of_the_employee,
                            'relationship'    => $relationship,
							'date_of_joining'    => $date_of_joining,
                            'd_o_b'    => $d_o_b,
							'gender'    => $gender,
                            'age'    => $age,
							'email'    => $email,
                            'mobile_no'    => $mobile_no,
                            'sum_insured'    => $sum_insured,
							'hr_cc'    => $hr_cc,
							'corporate_id'    => $data['corporate_id'],
							'policy_id'    => $data['policy_id'],
							'suminsure_id'    => $data['suminsure_id'],

                        );



						$group_code = $this->corporate_dashboard_model->get_group_code($_POST['corporate_id']);



						$policy_data = $this->corporate_dashboard_model->getPolicyData($_POST['policy_id']);

						//echo "sdwwsdds";exit;

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
																												<a href="https://www.raghnall.co.in/iserrve/"><button style="font-size: 15px; text-align:left;color:#e85305; border: 1px solid #e85305;padding: 5px 15px;font-family: Poppins, sans-serif;  margin: 05px 0px; font-weight: 700; text-transform: uppercase;">Click Here</button></a>
																										</td>
																										<td  width="40%" style="text-align: right;">
																											<img src="https://www.raghnall.co.in/iserrve/site/views/iserve-Emailer-02012023/img/banner-right.png" width="250px">
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
																											    <li style="margin-bottom: 5px; color:rgb(255, 255, 255); font-weight: 400;">Visit our website &#45; https://www.raghnall.co.in/iserrve </li>
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
																															 font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 400;">Do not let portal troubles bring you down – just drop us a line at <a href="mailto:priyankab@raghnall.co.in" style="color:#1ab2d4">priyankab@raghnall.co.in</a>
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


							//echo "sd";exit;

						$check_attribute =  $this->corporate_dashboard_model->check_attribute($get_employeenrolement_id,$data['Employee_id'],$data['relationship']);

						//echo $check_attribute;exit;

						if($check_attribute > 0){

							$subject  = 'Login Credentials Details';

							if($hr_cc != ''){
								$addcc = array($hr_cc);
							}else{
								$addcc = array();
							}

							$AddAttachment = array();

							if($email != ''){
								$this->mailsent_with_attachment_new($email,$subject,$messagebody,$addcc,$AddAttachment);
							}

							//echo "<pre>";print_r($data);echo"</pre>";exit;

							$check_attribute_active_user =  $this->corporate_dashboard_model->check_attribute_active_user($data);

							//echo $check_attribute_active_user;exit;

							if($check_attribute_active_user != 0){

								$get_employee_mail_count = $this->corporate_dashboard_model->get_employee_mail_count($check_attribute_active_user);
								$data['mail_sent_count'] = $get_employee_mail_count + 1;
								$this->corporate_dashboard_model->update_employee_active_verification_xls($check_attribute_active_user,$data);
							}else{

								$this->corporate_dashboard_model->add_employee_active_verification_xls($data);
							}

						}else{

							//

							$error .= $i+1 .',';
						}

						$k++;
					}

				}
			}


// 		}else{

// 			$error .= $k .',';
// 		}


		$string_error = rtrim($error, ", ");

		$this->session->set_flashdata('Error_msg_user',$string_error);

		/* $data['corporate_id'] = $_POST['corporate_id'];
		$data['policy_id'] = $_POST['policy_id']; */

		///echo "<pre>";print_r($_POST);echo"</pre>";exit;


		redirect($this->config->item('base_url') . 'home/view_user_status/'.$_POST['corporate_id'].'/'.$_POST['policy_id']);

		//
	}

	function pending_user_mail_sent($id){

		$emp_data = $this->corporate_dashboard_model->get_emp_data_verified_active_excel($id);


		//echo "<pre>";print_r($emp_data);echo"</pre>";exit;

		$group_code = $this->corporate_dashboard_model->get_group_code($emp_data->corporate_id);

						//echo "<pre>";print_r($group_code);echo"</pre>";


		$policy_data = $this->corporate_dashboard_model->getPolicyData($emp_data->policy_id);

		//echo "<pre>";print_r($policy_data);echo"</pre>";exit;








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
																			<td align="center"><h4 style="text-align:center;margin:0px;font-size:30px;line-height:30px; font-family:Poppins, sans-serif; color:#e85305;"><span style="color:#141d60; font-weight:bolder ;">Welcome  </span><span srtyle="color:#e85305;">'.$emp_data->name_of_the_employee.'</span></h4></td>
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
																															 font-family: Poppins, sans-serif; padding: 0px; margin: 05px 0px; font-weight: 400;">Do not let portal troubles bring you down – just drop us a line at <a href="mailto:priyankab@raghnall.co.in" style="color:#1ab2d4">priyankab@raghnall.co.in</a>
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
				$addcc = array();
				$AddAttachment = array();
				//$this->mailsent_with_attachment_new($emp_data->email,$subject,$messagebody,$addcc,$AddAttachment);
				$this->mailsent_with_attachment_new('ventesh.hnrtechnologies@gmail.com',$subject,$messagebody,$addcc,$AddAttachment);

				$this->session->set_flashdata('L_strErrorMessage','Mail Sent Successfully');

				redirect($this->config->item('base_url') . 'home/view_user_status/'.$emp_data->corporate_id.'/'.$emp_data->policy_id);
	}

	function test_mail(){

		//echo "sd";exit;
				$subject  = 'test';
				$addcc = array();
				$AddAttachment = array();
				$this->mailsent_with_attachment_new('devang.hnrtechnologies@gmail.com',$subject,'test message',$addcc,$AddAttachment);

	}


	function download_live_claim($corporate,$policy_id){

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


		$live_claim_data = $this->corporate_dashboard_model->live_claim_data($corporate,$policy_id);

		// $user_list = $this->user_model->get_user_list();

		//echo"<pre>";print_r($user_list);echo"</pre>";exit;

		$output = 'Sr.no,Employee Id,Employee Name,Beneficiary Name,Relation,Claim Type,Claim Status,TPA Claim Number,Hospitalization Date,Hospital Name,Amount Claimed,Amount Sactioned,Data From';

		$output .= "\n";

		if($live_claim_data != '' && count($live_claim_data) > 0) {

			$i=1;

			foreach ($live_claim_data as $claim_live_data) {

			$date_new = date('d/m/Y', strtotime($claim_live_data->hospitlization_date));

			if($claim_live_data->source == 0){
				$data_from = 'Excel';
			}else{
				$data_from = 'API';
			}


			$output .= '"'.$i.'","'.$claim_live_data->employee_id.'","'.$claim_live_data->employee_name.'","'.$claim_live_data->patient_name.'","'.$claim_live_data->relation.'","'.$claim_live_data->claim_type.'","'.$claim_live_data->claim_status.'","'.$claim_live_data->tpa_claim_no.'","'.$date_new.'","'.$claim_live_data->hospital_name.'","'.$claim_live_data->amount_claimed.'","'.$claim_live_data->sactioned_amount.'","'.$data_from.'"';


			$output .= "\n";
			$i++;
			}
		}

		$filename = "LiveClaim.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=' . $filename);
		echo $output;
		//echo "<pre>";print_r($output);echo "</pre>";
		exit;
	}

	function update_corporate_buffer(){


		if($this->input->post('action') == 'update_corporate_buffer'){

			$data1['corporate_id'] = $this->input->post('corporate_id');
			$data1['policy_id'] = $this->input->post('policy_id');
			$data1['total_corporate_sum_insured'] = $this->input->post('total_corporate_sum_insured');

			//echo "<pre>";print_r($data1);echo "</pre>";exit;


			$this->corporate_dashboard_model->add_corporate_buffer($data1);

			$this->session->set_flashdata('L_strErrorMessage','Corporate Buffer Update Successfully!!!!');

			redirect($this->config->item('base_url').'home/corporate_dashboard/'.$data1['corporate_id'].'/'.$data1['policy_id']);
		}

	}

	function show_member(){

		$data['corp_id'] 	= $_POST['corp_id'];
		$data['policy_id']  = $_POST['policy_id'];
		$data['emp_id']     = $_POST['val'];




		$enrolement_details = $this->corporate_dashboard_model->get_enrolement_details($data['corp_id'],$data['policy_id']);

		$employee_enrolement_array = array();
		foreach($enrolement_details as $enrolement_details_data){

			$employee_enrolement_array[] = $enrolement_details_data->id;
		}

		$employee_enrolement_id = implode("," , $employee_enrolement_array);


		$get_employee_enrolement_att = $this->corporate_dashboard_model->get_employee_enrolement_att($employee_enrolement_id);


		$html = '<select id="corporate_buffer_utilization_member_id" name="corporate_buffer_utilization_member_id" class="form-control" onChange="get_employee_data(this.value)">';
        $html .= '<option value="">Select Member</option>';
        if($get_employee_enrolement_att != 0){
            for($i=0; $i < count($get_employee_enrolement_att); $i++){

				if($get_employee_enrolement_att[$i]->employee_id == $data['emp_id']){
					if($po_id == $get_employee_enrolement_att[$i]->id){
						$selected = "selected";
					}else{
						$selected = "";
					}
					$html .= "<option value='" .$get_employee_enrolement_att[$i]->id."' ".$selected . ">" . $get_employee_enrolement_att[$i]->name_of_the_employee ."</option>";

				}
            }
        }
        $html .= '</select>';
        echo $html;


		//echo "<pre>";print_r($get_employee_enrolement_att);echo "</pre>";exit;

	}

	function get_employee_data(){


		$get_employee_enrolement_att_data = $this->corporate_dashboard_model->get_employee_enrolement_att_data($_POST['id']);

		//$array = array($get_employee_enrolement_att_data->mobile_no,$get_employee_enrolement_att_data->email);

		$result = [];
		$result['mobile'] = $get_employee_enrolement_att_data->mobile_no;
		$result['email'] = $get_employee_enrolement_att_data->email;

		echo json_encode($result);

		//echo "<pre>";print_r($array);echo "</pre>";exit;
		//echo json_encode($array);

	}

	function add_corporate_buffer_utilization(){




		//echo "<pre>";print_r($_POST);echo "</pre>";exit;



		if($this->input->post('action') == 'update_corporate_buffer')
		{


			$data['corporate_id'] = $_POST['corporate_id'];
			$data['policy_id'] = $_POST['policy_id'];
			$data['employe_id'] = $_POST['corporate_buffer_utilization_employe_id'];
			$data['member_id'] = $_POST['corporate_buffer_utilization_member_id'];
			$data['contact_number'] = $_POST['corporate_buffer_utilization_contact_number'];
			$data['email_address'] = $_POST['corporate_buffer_utilization_email_address'];
			$data['claim_amount'] = $_POST['corporate_buffer_utilization_claim_amount'];
			$data['settled_amount'] = $_POST['corporate_buffer_utilization_settled_amount'];
			$data['employee_si_utilised'] = $_POST['corporate_buffer_utilization_employee_si_utilised'];
			$data['corporate_buffer_used'] = $_POST['corporate_buffer_utilization_corporate_buffer_used'];
			$data['ailment'] = $_POST['corporate_buffer_utilization_ailment'];

			$this->load->library('upload');

			if($_FILES['corporate_buffer_utilization_document']['name'] != ''){

				$_FILES['file']['name']       =  time() .$_FILES['corporate_buffer_utilization_document']['name'];
				$_FILES['file']['type']       = $_FILES['corporate_buffer_utilization_document']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['corporate_buffer_utilization_document']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['corporate_buffer_utilization_document']['error'];
				$_FILES['file']['size']       = $_FILES['corporate_buffer_utilization_document']['size'];

				$uploadPath = $this->config->item('upload') . "corporate_buffer_utilization/";
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


			//echo "<pre>";print_r($data);echo "</pre>";exit;

			$this->corporate_dashboard_model->add_corporate_buffer_utilization($data);
			$this->session->set_flashdata('L_strErrorMessage','Corporate Buffer Utilization Added Successfully');
			redirect($this->config->item('base_url').'home/corporate_dashboard/'.$data['corporate_id'].'/'.$data['policy_id']);

		}

	}

	function corporate_buffer_utilization_excel_download($corporate,$policy_id){

		$get_corporate_buffer_utilization = $this->corporate_dashboard_model->get_corporate_buffer_utilization($corporate,$policy_id);

		// $user_list = $this->user_model->get_user_list();

		//echo"<pre>";print_r($user_list);echo"</pre>";exit;

		$output = 'Sr.no,Employee Id,Member Name,Member Relation,Email,Mobile,Claim Amount,Approved Amount,Employee Sum-Insured Utilization,Corporate Buffer Used,Ailment';

		$output .= "\n";

		if($get_corporate_buffer_utilization != '' && count($get_corporate_buffer_utilization) > 0) {

			$i=1;

			foreach ($get_corporate_buffer_utilization as $get_corporate_buffer_utilization_data) {

				$member_data = $this->corporate_dashboard_model->get_member_data($get_corporate_buffer_utilization_data->member_id);

			//$date_new = date('d/m/Y', strtotime($claim_live_data->hospitlization_date));




			$output .= '"'.$i.'","'.$get_corporate_buffer_utilization_data->employe_id.'","'.$member_data->name_of_the_employee.'","'.$member_data->relationship.'","'.$get_corporate_buffer_utilization_data->email_address.'","'.$get_corporate_buffer_utilization_data->contact_number.'","'.$get_corporate_buffer_utilization_data->claim_amount.'"," ","'.$get_corporate_buffer_utilization_data->employee_si_utilised.'","'.$get_corporate_buffer_utilization_data->corporate_buffer_used.'","'.$get_corporate_buffer_utilization_data->ailment.'"';


			$output .= "\n";
			$i++;
			}
		}

		$filename = "Corporate_Buffer_Utilization.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=' . $filename);
		echo $output;
		//echo "<pre>";print_r($output);echo "</pre>";
		exit;

	}

	function view_report($corporate_id,$policy_id){

		$data['error'] = '';
		$data['corporate_id'] = $corporate_id;
		$data['policy_id'] = $policy_id ;
		$this->load->view('view_report',$data);
	}


	function download_endersoment_detail($corp_id,$policy_id){


		$enrolement_details = $this->corporate_dashboard_model->get_enrolement_details($corp_id,$policy_id);

		if($enrolement_details != ''){

			$output = 'Sr.no,Employee Name,Employee Id,Gender,Sum Insured,Cards,Cards Upload Date,Employee Mobile,Employee Email';

			$output .= "\n";

			foreach($enrolement_details as $enrolement_details_data){

				$enrolement_att = $this->corporate_dashboard_model->get_enrolement_att($enrolement_details_data->id);
				$i = 1;
				foreach($enrolement_att as $enrolement_att_data){


				$ecard_data = $this->corporate_dashboard_model->get_e_card($enrolement_att_data->employee_id);

				if($ecard_data != ''){

					if($ecard_data->pdf_file != ''){

						$ecard = 'Yes';

					}else{
						$ecard = 'No';
					}

					$ecard_upload_date = date("d-m-Y", strtotime($ecard_data->created_at));

				}else{
						$ecard = 'No';
						$ecard_upload_date ="-";
					}


				$output .= '"'.$i.'","'.$enrolement_att_data->name_of_the_employee.'","'.$enrolement_att_data->employee_id.'","'.$enrolement_att_data->gender.'","'.$enrolement_att_data->sum_insured.'","'.$ecard.'","'.$ecard_upload_date.'","'.$enrolement_att_data->mobile_no.'","'.$enrolement_att_data->email.'"';

				$output .="\n";


				$i++;}
			}
		}

		$filename = "Enrollment Details.csv";

		header('Content-type: application/csv');

		header('Content-Disposition: attachment; filename='.$filename);

		echo $output;

		exit;


	}

	function download_card($doc_name){

		//echo $doc_name;exit;

		if(!empty($doc_name)){
            //load download helper

            //echo $doc_name;exit;
            $this->load->helper('download');


            // $file = $this->config->item('front_base_url').'upload/post_lc_document/'.$doc_name;
            //$file = $this->config->item('front_base_url').'upload/post_lc_document/';
            $pth    =   file_get_contents($this->config->item('front_base_url')."upload/pdf_file/".$doc_name."");

            force_download($doc_name, $pth);
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

	function download_ecard_new(){

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

		$this->load->library("Need_lib");
			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
			$employee_no = isset($_POST['employee_no'])?$_POST['employee_no']:null;
			$policyNo = $this->corporate_dashboard_model->get_policy_no($policy_id);
			$lib2 = $this->need_lib->downloaded_Ecard($policyNo,$employee_no);
			$e_card = $this->corporate_dashboard_model->get_e_card_new($policy_id,$employee_no);

			//echo "<pre>";print_r($e_card);echo"</pre>";exit;
			if(!empty($e_card)){
					$ecard = str_replace('corporate/', '', base_url()).'upload/pdf_file/'.$policyNo.'/'.$e_card;
					$data['api'] = 'no';
					$data['filename'] = $e_card;
					$data['file'] = $ecard;
					echo json_encode($data);
			}elseif(!empty($lib2->result)){
					$ecard = json_decode($lib2->result, TRUE);
					$data['api'] = 'yes';
					$data['file'] = $ecard;
					$data['filename'] = basename($ecard); // to get file name
			        echo json_encode($data);
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
			//$mail->SMTPDebug = 2;                                       // Enable verbose debug output
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

	public function getSumInsured(){
			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
			$corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
			$data = $this->corporate_dashboard_model->get_sum_insured($policy_id,$corporate_id);
			echo json_encode($data);
	}

}
