<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	class Home extends CI_Controller
	{
	function __construct() {
		parent::__construct();
		$this->load->model('home_model');

		include("phpmailer/PHPMailer.php");
		include("phpmailer/SMTP.php");
		include("phpmailer/POP3.php");

		//include("phpmailer/class.phpmailer.php");
		$this->load->helper('url','form');
    $this->load->library("pagination");
		$this->load->model('home_Model');
	}

	function index()
	{
		if(empty($this->session->userdata("loginEmp"))){
				$this->load->view('index');
		}else{
				redirect('employee');
		}

	}

	function test()
	{
		$this->load->view('test',$data);
	}

	function get_quote()
	{
		$this->load->view('get-quote',$data);
	}

	function iserrve_blog_listing()
	{
		$this->load->view('iserrve_blog_listing',$data);
	}


		function iserrve_blog_detail()
	{
		$this->load->view('iserrve_blog_detail',$data);
	}

	function thankyou()
	{
		$this->load->view('thankyou',$data);
	}
	function blog_listing()
	{
		$data['all_blog'] = $this->home_model->all_blog();

		//echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('blog_listing',$data);
	}

	function blog_detail($page_url)
	{
		$data['blog_details'] = $this->home_model->blog_details($page_url);

		$data['recent_blog'] = $this->home_model->latest_blog($data['blog_details']->id);

		$data['meta_title'] = $data['blog_details']->meta_title;
		$data['meta_keyword'] = $data['blog_details']->meta_keyword;
		$data['meta_description'] = $data['blog_details']->meta_description;
		//echo "<pre>";print_r($data);echo"</pre>";exit;

		$this->load->view('blog_detail',$data);
	}

	function myreview()
	{
		// echo "test";exit;
		$data['err_msg'] = '';
		foreach($_POST as $key => $value) {

			$form_field[$key] = $this->input->post($key);
		}

		if($response = $this->home_model->add_review($form_field)) {
			echo 1;
		}
	}


	function bookappointment()
	{
		$this->load->view('bookappointment');
	}

	function health_main_page()
	{
		$this->load->view('health_main_page',$data);
	}
	function employee_login()
	{
		$this->load->view('employee_login',$data);
	}
		function calendly_thankyou()
	{
		$this->load->view('calendly_thankyou',$data);
	}







	// function check_mobileno()
	// {
	// 	$phone = $_POST['phone'];
	// 	$data = $this->home_model->check_mobileno($phone);
	// 	if($data !=""){
	// 		echo "0"; die;
	// 	}else
	// 	{
	// 		echo "1"; die;
	// 	}
	// }

	function otpsent()
	{
		$phone = $_POST['phone'];
		$fourRandomDigit = $_POST['otp'];
        $curl = curl_init();
        curl_setopt_array($curl, array(CURLOPT_URL =>"https://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&send_to=91$phone&msg=Dear%20Customer,%20Your%20OTP%20for%20Raghnall%20Login%20is%20$fourRandomDigit.%20%20Kindly%20do%20not%20share%20your%20OTP,%20as%20it%20is%20confidential.&msg_type=TEXT&userid=2000214818&auth_scheme=plain&password=5E9V3QAG&v=1.1&format=text",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        echo '1';
	}

	function register()
	{
		$data['L_strErrorMessage'] = '';

			foreach($_POST as $key => $value)
			{

				$data[$key]=$this->input->post($key);

			}
			$content['company']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['company'] : $data['company'];
			$content['no_emp']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['no_emp'] : $data['no_emp'];
			$content['name']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['name'] : $data['name'];
			$content['age_emp']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['age_emp'] : $data['age_emp'];
			$content['product_id']  = $data['product_id'];
			$content['email']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['email'] : $data['email'];
			$content['radio_group']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['coverage_val'] :$data['radio_group'];
			$content['sum_insurance']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['sum_insurance_val'] :$data['sum_insurance'];
			$content['phone']  = (!empty($_SESSION['get_quote_sess'])) ? $_SESSION['get_quote_sess']['mobile'] : $data['phone'];
			$content['location']  = (!empty($_SESSION['get_quote_session'])) ? $_SESSION['get_quote_session']['location'] : $data['location'];
			$content['platform']  = (!empty($_SESSION['get_quote_session'])) ? 'OTPless' : 'OTP';

			if($data['customize_plan'] != ''){
				$content['customize_plan']  = 1;
			}else{
				$content['customize_plan']  =0;
			}
			//$content['customize_plan']  = $data['customize_plan'];
            if($this->input->post("action") == "verifyyourself11")
			{

					//echo "<pre>";print_r($content);echo"</pre>";exit;
						$id= $this->home_model->add($content);
						$userdata = $this->home_model->userdata($id);

						$this->load->library('session');
						$newuserdata = array(
								'userid'  => $userdata->id,
		            'name'  => $userdata->name,
								'email'  => $userdata->email,
								'phone'  => $userdata->phone,
								'logged_in' => true
						);
					$check = $this->session->set_userdata($newuserdata);

					$message = '<!doctype html> <html>

			<head>
				<meta charset="utf-8">
				<title>Registration Email</title>
				<style>
					.logo {
						text-align: center;
						width: 100%;
					      }

					.wrapper {

						width: 100%;

						max-width:500px;

						margin:auto;

						font-size:14px;

						line-height:24px;

						font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;

						color:#555;

					}

					.wrapper div {

						height: auto;

						float: left;

						margin-bottom: 15px;

						width:100%;

					}

					.text-center {

						text-align: center;

					}

					.email-wrapper {

						padding:5px;

						border:1px solid #ccc;

						width:100%;

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
				<div class="wrapper" >

					<div class="logo">
						<img src="'.$this->config->item('base_url_views').'images/New/favicon.png" style="width: 30%;" >
					</div>
					<div class="email-wrapper" >
						<table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">
							<tr>
								<td>
									<table width="100%" border="0" cellspacing="0" cellpadding="5">
										<tr>
											<td style="font-size:18px;">Hello ,</td>
										</tr>
										<tr>
											<td style="line-height:20px;">
											   Please find the below Registration details
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table style="border-top:3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">
										<tr>
											<td width="50%">
											<table width="100%" border="0" cellspacing="0" cellpadding="5">
												<tr><td width="100px">Name: </td><td>'.$data['name'].'</td></tr>
												<tr><td width="100px">Email: </td><td>'.$data['email'].'</td></tr>
												<tr><td width="100px">Password: </td><td>'.$data['phone'].'</td></tr>



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

				// $to = $this->input->post('email');
				// $subject  = 'Thank you for Registration - Raghnall Cyber-Insurance';
				// $addcc = array();
				// $AddAttachment = array();
				// $this->mailsent('valmik.hnrtechnologies@gmail.com',$subject,$message,$addcc,$AddAttachment);
				$this->session->set_flashdata('L_strsucessMessage','Register Successfully!');

				if($this->input->post("ri_redirect")=="1") {

					//redirect('https://calendly.com/raghnall_cal');
					redirect('book-appointment');
				}
			}
			$this->load->view('get-quote',$data);
	}

	function chatForm()
	{
		$data['L_strErrorMessage'] = '';

			foreach($_POST as $key => $value)
			{

				$data[$key]=$this->input->post($key);

			}
			$content['name']  = $data['name'];
			$content['email']  = $data['email'];
			$content['phone_number']  = $data['phone_number'];
			$content['company']  = $data['company'];
			$content['product_id']  = $data['product_id'];
			//echo "<pre>";print_r($content);echo "</pre>";exit;
            if($this->input->post("action") == "verifyyourself22")
			{
						$id= $this->home_model->add_chatBox($content);
						$this->load->library('session');
						$newuserdata = array(
						'userid'  => $userdata->id,
            'name'  => $userdata->name,
						'email'  => $userdata->email,
						'phone'  => $userdata->phone_number,
						'logged_in' => true
						);
				$this->session->set_flashdata('L_strsucessMessage','Talk to Our Expert Successfully!');

				if($this->input->post("ri_redirect_popUp")=="1") {
					redirect('book-appointment');
				}
			}
			$this->load->view('get-quote',$data);
	}

	function book_consultation()
	{
		$data['L_strErrorMessage'] = '';

			foreach($_POST as $key => $value)
			{

				$data[$key]=$this->input->post($key);

			}
			$content['name']  = $data['name'];
			$content['email']  = $data['email'];
			$content['phone']  = $data['phone'];
			$content['company']  = $data['company'];
			$content['location']  = $data['location'];
			// $content['product_id']  = $data['product_id'];
			//echo "<pre>";print_r($content);echo "</pre>";exit;
            if($this->input->post("action") == "verifyyourself1919")
			{
						$id= $this->home_model->add_bookConsultation($content);
						$this->load->library('session');
						$newuserdata = array(
						'userid'  => $userdata->id,
            'name'  => $userdata->name,
						'email'  => $userdata->email,
						'phone'  => $userdata->phone,
						'logged_in' => true
						);
				$this->session->set_flashdata('L_strsucessMessage','Book Consultation Successfully!');

				if($this->input->post("ri_redirect_bookconsult")=="1") {

					redirect('book-appointment');
				}
			}
			// $this->load->view('get-quote',$data);
	}

	function buy_now()
	{
		$data['L_strErrorMessage'] = '';

			foreach($_POST as $key => $value)
			{

				$data[$key]=$this->input->post($key);

			}
			$content['name']  = $data['name'];
			$content['email']  = $data['email'];
			$content['phone_number']  = $data['phone_number'];
			$content['company']  = $data['company'];
			$content['location']  = $data['location'];
			$content['product_id']  = $data['product_id'];
			//echo "<pre>";print_r($content);echo "</pre>";exit;
            if($this->input->post("action") == "verifyyourself33")
			{

						$this->home_model->add_buyNow($content);
						// //echo "test";exit;
						// $this->load->library('session');
						// $newuserdata = array(
						// 'userid'  => $userdata->id,
      //       'name'  => $userdata->name,
						// 'email'  => $userdata->email,
						// 'phone'  => $userdata->phone_number,
						// 'logged_in' => true
						// );
				$this->session->set_flashdata('L_strsucessMessage','Buy Now Submitted Successfully!');

				if($this->input->post("ri_redirect_buynow")=="1") {
					//redirect($this->config->item('raghnall_cyber/policies'));
					redirect('https://www.ilgi.co/D0A40492A0');
				}
			}
			//$this->load->view('get-quote',$data);
	}

	public function get_quote_last()	{
		if(!empty($this->session->userdata("get_quote_session"))){
				$this->load->view('get-quote-last',$data);
		}else{
				redirect('get-quote');
		}

	}

	function quote_mail(){

		//echo"sd";exit;

			$data['name']     			= $name         			= $_POST['name'];
			$data['company_name']    	= $company_name        		= $_POST['company_name'];
			$data['email']  			= $email    				= $_POST['email'];
			$data['phone']  			= $phone    				= $_POST['phone'];
			$data['location']  			= $location    				= $_POST['location'];
			$data['number_of_employee'] = $number_of_employee      	= $_POST['number_of_employee'];
			$data['send_me_whats_app']  = $send_me_whats_app      	= $_POST['send_me_whatsapp'];

			$data['added_date'] = date('Y-m-d');

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

			if($send_me_whats_app == 1){
				$whats_update = 'Yes';
			}else{
				$whats_update = 'No';
			}

		$messageBody = '<!doctype html> <html>
				<head>
					<meta charset="utf-8">
					<title>Contact Email</title>
					<style>
						.logo {
							text-align: center;
							width: 100%;
							}
						.wrapper {
							width: 100%;
							max-width:500px;
							margin:auto;
							font-size:14px;
							line-height:24px;
							font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;
							color:#555;
						}
						.wrapper div {
							height: auto;
							float: left;
							margin-bottom: 15px;
							width:100%;
						}
						.text-center {
							text-align: center;
						}
						.email-wrapper {
							padding:5px;
							border:1px solid #ccc;
							width:100%;
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
					<div class="wrapper" >

						<div class="email-wrapper" >
							<table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="5">
											<tr>
												<td style="font-size:18px;">Hello ,</td>
											</tr>
											<tr>
												<td style="line-height:20px;">
												Please find the below Quote details
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table style="border-top:3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">
											<tr>
												<td width="50%">
													<table width="100%" border="0" cellspacing="0" cellpadding="5">
														<tr><td width="100px">Name: </td><td>'.$name.'</td></tr>
														<tr><td width="100px">Company Name: </td><td>'.$company_name.'</td></tr>
														<tr><td width="100px">Email: </td><td>'.$email.'</td></tr>
														<tr><td width="100px">Phone: </td><td>'.$phone.'</td></tr>
														<tr><td width="100px">Location: </td><td>'.$location.'</td></tr>
														<tr><td width="100px">Number Of Employee: </td><td>'.$number_of_employee.'</td></tr>
														<tr><td width="100px">Send me Whatsapp Update: </td><td>'.$whats_update.'</td></tr>
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


		$subject  = 'Get Quote';
		$addcc = array();
		$AddAttachment = array();
		$this->mailsent_with_attachment('iSerrve@raghnall.co.in',$subject,$messageBody,$addcc,$AddAttachment);
		//$this->mailsent_with_attachment('devang.hnrtechnologies@gmail.com',$subject,$messageBody,$addcc,$AddAttachment);
		$this->home_model->add_contact($data);
			$arrr_result = $this->generate_lead($data);
			$response = json_decode($arrr_result);
			if($response->Status == 'Success'){
				echo "1";
			}

	}
	
	
	function slider_ivf_form_mail(){

		//echo"sd";exit;

			$data['name']     			= $name         			= $_POST['name'];
			$data['company_name']    	= $company_name        		= $_POST['company_name'];
			$data['email']  			= $email    				= $_POST['email'];
			$data['phone']  			= $phone    				= $_POST['phone'];
			$data['location']  			= $location    				= $_POST['location'];
			$data['services'] 			= $services      			= $_POST['services'];
			$data['send_me_whats_app']  = $send_me_whats_app      	= $_POST['send_me_whatsapp'];

			$data['added_date'] = date('Y-m-d');

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;

			if($send_me_whats_app == 1){
				$whats_update = 'Yes';
			}else{
				$whats_update = 'No';
			}

		$messageBody = '<!doctype html> <html>
				<head>
					<meta charset="utf-8">
					<title>Contact Email</title>
					<style>
						.logo {
							text-align: center;
							width: 100%;
							}
						.wrapper {
							width: 100%;
							max-width:500px;
							margin:auto;
							font-size:14px;
							line-height:24px;
							font-family:Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;
							color:#555;
						}
						.wrapper div {
							height: auto;
							float: left;
							margin-bottom: 15px;
							width:100%;
						}
						.text-center {
							text-align: center;
						}
						.email-wrapper {
							padding:5px;
							border:1px solid #ccc;
							width:100%;
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
					<div class="wrapper" >

						<div class="email-wrapper" >
							<table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="5">
											<tr>
												<td style="font-size:18px;">Hello ,</td>
											</tr>
											<tr>
												<td style="line-height:20px;">
												Please find the below Quote details
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table style="border-top:3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">
											<tr>
												<td width="50%">
													<table width="100%" border="0" cellspacing="0" cellpadding="5">
														<tr><td width="100px">Name: </td><td>'.$name.'</td></tr>
														<tr><td width="100px">Company Name: </td><td>'.$company_name.'</td></tr>
														<tr><td width="100px">Email: </td><td>'.$email.'</td></tr>
														<tr><td width="100px">Phone: </td><td>'.$phone.'</td></tr>
														<tr><td width="100px">Location: </td><td>'.$location.'</td></tr>
														<tr><td width="100px">Services: </td><td>'.$services.'</td></tr>
														<tr><td width="100px">Send me Whatsapp Update: </td><td>'.$whats_update.'</td></tr>
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


		$subject  = 'Get Quote';
		$addcc = array();
		$AddAttachment = array();
		$this->mailsent_with_attachment('iSerrve@raghnall.co.in',$subject,$messageBody,$addcc,$AddAttachment);
		//$this->mailsent_with_attachment('devang.hnrtechnologies@gmail.com',$subject,$messageBody,$addcc,$AddAttachment);

		$this->home_model->add_slider_ivf_form($data);
		echo "1";
			/* $arrr_result = $this->generate_lead($data);
			$response = json_decode($arrr_result);
			if($response->Status == 'Success'){
				echo "1";
			} */

	}


	/* function mailsent_with_attachment($to,$subject,$message,$addcc,$AddAttachment)
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
			$mail->setFrom('iSerrve@raghnall.net', 'iSerrve');
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
	} */
	
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
			$mail->Host       = 'smtp.zeptomail.in';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'emailapikey';      // SMTP username
			$mail->Password   = 'PHtE6r0FF+vpjW4o8RVS4KDpE5WnMYou/e4yfwVEuYhKA6MDFk1crtB/wTG2qBh/UvBAFPOYwY5t4OjOteKAIGvrMD5JWmqyqK3sx/VYSPOZsbq6x00UsFsSdkfUXYfpcdVj0iDWvNbZNA==';                   // SMTP password
			$mail->SMTPSecure = "TLS";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('ebsupport@iserrve.raghnall.co.in', 'iSerrve');
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


	public function generate_lead($data){
			 $SearchBy = (!empty($data["email"])) ? 'EmailAddress' :'Phone';
			 $parts = explode(" ",$data['name']);
			 $data_string = '[
					  {
						"Attribute": "EmailAddress",
						"Value": "'.$data['email'].'"
					  },
					  {
						"Attribute": "FirstName",
						"Value": "'.$parts[0].'"
					  },
					  {
						"Attribute": "LastName",
						"Value": "'.$parts[1].'"
					  },

					  {
						"Attribute": "Phone",
						"Value": "'.$data["phone"].'"
					  },

					  {
						"Attribute": "Company",
						"Value": "'.$data["company_name"].'"
					  },

					  {
						"Attribute": "SearchBy",
						"Value": "'.$SearchBy.'"
					  }

					]';

			 try {
				 $operation = 'Lead.Capture';//'Lead.CreateOrUpdate';
				 $accessKey = 'u$r4570ee2f2836faec864523c537c0daa6';
				 $secretKey = 'd40fef8da06dec2b37f6efc2ce8618dcfd877c68';
				 $url="https://api-in21.leadsquared.com/v2/LeadManagement.svc/".$operation."?accessKey=".$accessKey."&secretKey=".$secretKey;

				 $curl = curl_init($url);
				 curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				 curl_setopt($curl, CURLOPT_HEADER, 0);
				 curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
				 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				 curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
				 $json_response = curl_exec($curl);
				 curl_close($curl);
         return $json_response;
			} catch (Exception $ex) {
				curl_close($curl);
			}

	}

	public function corporate_login(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
			//$pass = password_hash($password,PASSWORD_BCRYPT);
      if($username != '' && $password != ''){
					$getpass = $this->home_model->isCorporateExist($username);
          if(!empty($getpass)){
              if(password_verify($password ,$getpass["password"])) {
									if($getpass["active_deactive"] == 0){
											$session_data=array(
		                      'hr_login_id' =>$getpass["corporate_id"],
		                      'corporate_name' =>$getpass["co_name"],
													'group_code' =>$getpass["group_code"],
		                      'loginHR' =>TRUE //boolean value TRUE
		                  );
		                  $this->session->set_userdata($session_data);
											if(!empty($session_data)){
													echo json_encode('success');
											}
									}else{
										echo json_encode('inactive');
									}

              }else{
                  	echo json_encode('password_fail');
              }
          }else{
              echo json_encode('not_exist');
          }
      }

   }

}
