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
		$this->load->view('index',$data);
	}

	function test()
	{
		$this->load->view('test',$data);
	}

	function get_quote()
	{
		$this->load->view('get-quote',$data);
	}

	function thankyou()
	{
		$this->load->view('thankyou',$data);
	}
		
	function bookappointment()
	{
		$this->load->view('bookappointment');
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

		//echo "sd";exit;
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
			$content['company']  = $data['company']; 
			$content['no_emp']  = $data['no_emp']; 
			$content['name']  = $data['name']; 
			$content['age_emp']  = $data['age_emp']; 
			$content['product_id']  = $data['product_id']; 
			$content['email']  = $data['email'];
			$content['radio_group']  = $data['radio_group'];
			$content['sum_insurance']  = $data['sum_insurance'];
			$content['phone']  = $data['phone'];
			$content['location']  = $data['location'];

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
					redirect($this->config->item('http_host').'book-appointment');
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
					//redirect($this->config->item('raghnall_cyber/policies'));
					//redirect($this->config->item('http_host').'thankyou');
					redirect($this->config->item('http_host').'book-appointment');
				}
			}
			$this->load->view('get-quote',$data);
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
					redirect('https://sme.icicilombard.com/group-health-insurance-policy');
				}
			}
			//$this->load->view('get-quote',$data);
	}

	
	
}