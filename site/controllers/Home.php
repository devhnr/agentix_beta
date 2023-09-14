<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

	

	class Home extends CI_Controller 

	{

		function __construct() {

		parent::__construct();		

		include("phpmailer/PHPMailer.php");

		include("phpmailer/SMTP.php");

		include("phpmailer/POP3.php");

		//include("phpmailer/class.phpmailer.php");

		$this->load->helper('url','form');

        $this->load->library("pagination");

		$this->load->model('home_model');

		$this->load->helper('cookie'); 

	}

    function index()

	{  

	    //echo 'sd';exit;

		$data['error'] = "";

		

		$this->load->view('index',$data);

	}



	function products()

	{  

	    //echo 'sd';exit;

		$data['error'] = "";

		

		$this->load->view('products',$data);

	}

	function pricing()

	{  

	    //echo 'sd';exit;

		$data['error'] = "";

		

		$this->load->view('pricing',$data);

	}



	function services()

	{  

	    //echo 'sd';exit;

		$data['error'] = "";

		

		$this->load->view('services',$data);

	}



	function about_us()

	{  

	    //echo 'sd';exit;

		$data['error'] = "";

		

		$this->load->view('about_us',$data);

	}

	

	function login()

	{  

	    if($this->input->post("action")=="login") { 

	    	foreach($_POST as $key => $value) {	$data[$key]=$this->input->post($key); }


	    	$content['email'] = $data['login_email'];

        $content['password'] = $data['login_password']; 



				$checklogin = $this->home_model->userlogin($content);  

				
               

				if($checklogin !='')

				{

					$newuserdata = array(

            'userid'  => $checklogin->id,

            'name'  => $checklogin->name,

						'email'  => $checklogin->email,

						//'lname'  => $checklogin->lname,

						'mobile'  => $checklogin->mobile,		

						'logged_in' => true

					);

					$check = $this->session->set_userdata($newuserdata);


					//$this->home_model->update_login_flag($checklogin->id,'1');

					

					$this->session->set_flashdata('L_strsucessMessage','Login Successfull!!!!');				

					
					//redirect($this->config->item('http_host')."agentportal");	

					redirect($this->config->item('base_url')."agent-admin");	

            }

	    }

		

		$this->load->view('login',$data);

	}

	

		

	function signup(){ 

		$data['insurance_company'] = $this->home_model->get_insurance_company();
		//echo"<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('signup',$data);
	}



	function blogs()

	{  

	    //echo 'sd';exit;

		$data['error'] = "";



		$data['get_blog_data'] = $this->home_model->get_blog_data_all();



		//echo"<pre>";print_r($data);echo"</pre>";exit;

		

		$this->load->view('blogs',$data);

	}



	function blogs_detail($page_url)

	{  

	    //echo 'sd';exit;

		$data['error'] = "";



		$data['get_blog_detail'] = $this->home_model->get_blog_detail($page_url);

		$data['metatitle'] = $data['get_blog_detail']->metatitle;

		$data['metakeywords'] = $data['get_blog_detail']->metakeywords;

		$data['metadescription'] = $data['get_blog_detail']->metadescription;

		$this->load->view('blogs_detail',$data);

	}

	function checkemail()
	{
		$email = $_POST['email'];
		$data = $this->home_model->checkemail($email);
		if($data !=""){
			echo "0"; die;
		}else
		{
			echo "1"; die;
		}
	}

	function send_register_otp(){

		$mobile = $_POST['mobile'];

		$fourRandomDigit = $this->session->userdata('register_otp');

		// $url = "https://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&send_to=91$mobile&msg=Dear%20Customer,%20Your%20Mititek%20verification%20code%20(OTP)%20is%20$fourRandomDigit.%20Kindly%20do%20not%20share%20your%20OTP%20as%20it%20is%20confidential.&msg_type=TEXT&userid=2000217308&auth_scheme=plain&password=Mititek@2022&v=1.1&format=text";

		// echo $new_url = str_replace(' ', '', $url);exit;
		
		$curl = curl_init();
        curl_setopt_array($curl, array(CURLOPT_URL =>"https://enterprise.smsgupshup.com/GatewayAPI/rest?method=SendMessage&send_to=91$mobile&msg=Dear%20Customer,%20Your%20Mititek%20verification%20code%20(OTP)%20is%20$fourRandomDigit.%20Kindly%20do%20not%20share%20your%20OTP%20as%20it%20is%20confidential.&msg_type=TEXT&userid=2000217308&auth_scheme=plain&password=Mititek@2022&v=1.1&format=text",
        	
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

		    
		echo "<pre>";print_r($err);echo"</pre>";exit;

        echo "1";

	}


	function register()

	{

		//echo"<pre>";print_r($_POST);echo"</pre>";exit;

		$form_field = $data = array(  


                'agent_name' => '',

                'agent_email' => '',

                'agent_password' => '',
                'mobile' => '',
                'agent_licence_no' => '',
                'agent_pan' => '',
                'name_of_company_insurance' => '',

		);

		foreach($form_field as $key => $value){	
			$data[$key]=$this->input->post($key);		
		}

		$id= $this->home_model->register($data);

		$userdata = $this->home_model->userdata($id);

		$this->load->library('session');
						
		$newuserdata = array(				
			'userid'  => $userdata->id,
            'name'  => $userdata->name,						
			'email'  => $userdata->email,					
		    //'lname'=> $userdata->lname,
			'mobile'  => $userdata->mobile,	
			'logged_in' => true
		);

		$check = $this->session->set_userdata($newuserdata);

		$comapny_name = $this->home_model->get_compamy_name($data['name_of_company_insurance']);

		$nameString = '';

		foreach ($comapny_name as $comapny_name_data) {
    	$nameString .= $comapny_name_data->name . ', '; // Concatenate the name with a comma and space
		}

		$nameString = rtrim($nameString, ', ');

		//echo"<pre>";print_r($nameString);echo"</pre>";exit;

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

						<img src="'.$this->config->item('base_url_views').'img/logo.png" style="width: 30%;" >

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

												<tr><td width="100px">Agent Name: </td><td>'.$data['agent_name'].'</td></tr>

												<tr><td width="100px">Email Id: </td><td>'.$data['agent_email'].'</td></tr>

												<tr><td width="100px">Password: </td><td>'.$data['agent_password'].'</td></tr>

												<tr><td width="100px">Mobile No: </td><td>'.$data['mobile'].'</td></tr>

												<tr><td width="100px">Agent Licence No: </td><td>'.$data['agent_licence_no'].'</td></tr>

												<tr><td width="100px">Agent Pan: </td><td>'.$data['agent_pan'].'</td></tr>

												<tr><td width="100px">Name Of The Insurance Company: </td><td>'.$comapny_name.'</td></tr>

												

												

												

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

		//echo"<pre>";print_r($message);echo"</pre>";exit;	

		



				$to = $this->input->post('agent_email');				

				$subject  = 'Thank you for Registration - Agentix'; 

				$addcc = array();

				$AddAttachment = array();

				$name = $data['agent_name'];


				$html = $this->load->view('agent-admin/email_temp/register_mail', $data, true);

				$this->mailsent($to,$subject,$html,$addcc,$AddAttachment,$name);

				//$this->mailsent($to,$subject,$message,$addcc,$AddAttachment,$name);

				//echo "dev";exit;

				// $this->mailsent('devang.hnrtechnologies@gmail.com',$subject,$message,$addcc,$AddAttachment);

				$this->session->set_flashdata('L_strsucessMessage','Register Successfully!');

				//redirect($this->config->item('base_url')."cyber-insurance/policies");
				redirect($this->config->item('base_url')."agent-admin");

	}



	function test_pdf(){

		$data['name'] = "devang";
		$data['agent_email'] = "devang@gmail.com";
		$data['agent_password'] = "123456";
		$data['mobile'] = "9033259413";
		$data['agent_licence_no'] = "devang_licence";
		$data['agent_pan'] = "devang_pan";

		$data['policy_name'] = 'test';
		//echo "sd";exit;
		$html = $this->load->view('agent-admin/email_temp/product_repositroy_mail', $data, true);

		echo $html;exit;
	}

	public function checlogin()

	{

		$email = $_POST['email'];

		$password = $_POST['password'];

		if($email != '' && $password != ''){

			$getpass = $this->home_model->isUserExist($email);

			//echo"<pre>";print_r($getpass->password);echo"</pre>";exit;

			if(!empty($getpass)){

				if(password_verify($password ,$getpass->password)) {

					echo json_encode('success');
				}else{
         	echo json_encode('password_fail');
        }

			}else{

				echo json_encode('not_exist');
			}


		}

			

	}


	function forgot_password(){ 

		$data['error'] = "";
		//echo"<pre>";print_r($data);echo"</pre>";exit;

		if($this->input->post("action")=="forgot_password"){ 

			$userdata = $this->home_model->userbyemail($this->input->post('login_email'));

			if($userdata!=''){


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

						<img src="'.$this->config->item('base_url_views').'img/logo.png" style="width: 30%;" >

					</div>

					<div class="email-wrapper" >

						<table style="border-collapse:collapse;" width="100%" border="0" cellspacing="0" cellpadding="10">   		

							<tr>

								<td>

									<table width="100%" border="0" cellspacing="0" cellpadding="5">   

										<tr>

											<td style="font-size:18px;">Dear '.$userdata->name.'</td>

										</tr>

										<tr>

											<td style="line-height:20px;">

											   Please find the below Forgot Password details

											</td> 

										</tr>

									</table>

								</td>

							</tr>

							<tr>

								<td>

									<table style="border-top:3px solid #333;" bgcolor="#f7f7f7" width="100%" border="0" cellspacing="0" cellpadding="5">   

										<tr>

											<td > 

													You recently requested a password reset.<br> To change your password,
													 click <a href="'.$this->config->item('base_url').'reset-password/'.$userdata->id.'">here</a> or paste the following link into your browser: '.$this->config->item('base_url').'reset-password/'.$userdata->id.' <br>
													The link will expire in 24 hours, so be sure to use it right away.


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

			//echo "<pre>";print_r($message);echo"</pre>";exit;
			$to = $userdata->email;
			$subject = "Reset Password";
			$addcc = array();
			$AddAttachment=array();
			$name= $userdata->name;
			$this->mailsent($to,$subject,$message,$addcc,$AddAttachment,$name);
			//$this->mailsent($to,$subject,$message,$addcc,$AddAttachment);

			$this->session->set_flashdata('L_strsucessMessage','Password reset link sent to your email address successfully');
			redirect($this->config->item('base_url').'login');




			}else {

				$this->session->set_flashdata('L_strErrorMessage','The email ID does not exist');
				redirect($this->config->item('base_url').'forgot-password');
			}

		}


		$this->load->view('forgot_password',$data);
	}

	function reset_password($id){

		$data['err_msg'] = '';
		$data['uid'] = $id;

		if($this->input->post('action') == 'reset_password'){

			foreach($_POST as $key => $value)
			{
				$data[$key]=$this->input->post($key);
			}

			$content['agent_password']  = $data['agent_password'];
			$content['user_id']  = $id;

			//echo"<pre>";print_r($content);echo"</pre>";exit;
			$reset_password = $this->home_model->reset_password($content);
			$this->session->set_flashdata('L_strsucessMessage','Your password has been reset successfully !');
			redirect($this->config->item('base_url').'login');

		}

		$this->load->view('reset_password',$data);
	}

	function test(){

		//echo "sd";exit;
				$subject  = 'Test Subject 12'; 
				$addcc = array();
				$AddAttachment = array();
				$name = "devang";
				if($this->mailsent('parth.hnrtechnologies@gmail.com',$subject,'test message',$addcc,$AddAttachment,$name)){
					echo "Success";
				}else{
					echo "Fail";
				}
	}


	function mailsent($to,$subject,$message,$addcc,$AddAttachment,$name)
	{
		error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			//Server settings
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'digtialagents@agentix.in';      // SMTP username
			$mail->Password   = 'casyojbusbbfvjpu';                   // SMTP password
			$mail->SMTPSecure = "tls";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('digtialagents@agentix.in', $name);
			$mail->addAddress($to, "");     // Add a recipient
			if($addcc !='' && count($addcc)>0)
			{
				foreach($addcc as $key=>$value)
				{	
					$mail->addCC($value);	
				}
			}
			if($AddAttachment !='' && count($AddAttachment)>0)
			{
				foreach($AddAttachment as $key=>$value)
				{	
					if($value !='')
					{
						$mail->addAttachment($value);
					}
				}
			}
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
	

}