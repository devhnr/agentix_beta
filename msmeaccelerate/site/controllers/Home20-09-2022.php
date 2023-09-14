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
		$data['err_msg'] = '';	
		$data['banner_data'] = $this->home_model->allbanner();
		$data['all_product_home'] = $this->home_model->all_product_home();
		$data['get_about_detail'] = $this->home_model->get_about_detail();
		$data['all_msme_edge'] = $this->home_model->all_msme_edge();
		$data['all_product_strength'] = $this->home_model->all_product_strength();
		$data['all_whats_new'] = $this->home_model->all_whats_new();
		$this->load->view('index',$data);
	}

	function agent_login()
	{
		$this->load->view('agent-login',$data);
	}

	function risk_assessment()
	{	
		if($this->session->userdata('userid') == ''){
			redirect($this->config->item('base_url'));
	   	} 
		$data['all_risk_assessment'] = $this->home_model->all_risk_assessment();
		$data['sub_industry_profile'] = $this->home_model->sub_industry_profile();
		$data['all_coverage'] = $this->home_model->all_coverage();
		$data['all_type'] = $this->home_model->all_type();
		// $this->session->unset_userdata('sessionProductList');
		$this->load->view('risk-assessment',$data);
	}

	function detail_form()
	{
		$data['all_industry'] = $this->home_model->all_industry();
		$data['all_sub_industry'] = $this->home_model->all_industry();
		$this->load->view('detail-form',$data);
	}

	public function checlogin()
	{	
		$data['agent_id'] = $_POST['agent_id'];
		$data['password'] = $_POST['password'];
		$data = $this->home_model->checkLogin($data);
		echo $data;	
	}


	function login()
	{	
        $data = array();
		$data['err_msg'] = '';
		$data['flashError'] = ''; 
		$this->load->library('session');
        $data = array();
			
			if($this->input->post("action")=="login") { 
				foreach($_POST as $key => $value) {	$data[$key]=$this->input->post($key); }

				$content['agent_id'] = $data['agent_id'];
                $content['password'] = $data['password']; 
				$checklogin = $this->home_model->userlogin($content);  
				if($checklogin !='')
				{
					$newuserdata = array(
                        'userid'  => $checklogin->id,
                        'agent_id'  => $checklogin->agent_id,
						'password'  => $checklogin->password,		
						'logged_in' => true
					);
					$check = $this->session->set_userdata($newuserdata);
            	}	
            	$this->session->set_flashdata('L_strsucessMessage','Login Successfull!');
           		 if($this->input->post("lo_redirect")=="1") { 	
					redirect($this->config->item('base_url').'detail-form');
					// redirect($this->config->item('base_url'));
				}
			}		
		$this->load->view('agent-login',$data);
	}

	function forgot_password(){

		$data['err_msg'] = '';
		$data['L_strErrorMessage'] = '';
		
		if($this->input->post("action")=="forgot_password")
		{ 
			$userdata = $this->home_model->userbyemail($this->input->post('agent_id'));
			if($userdata!=''){		
			// $message = '<table><tr>
			// 		<td>Name:</td><td>'.$userdata->name.'</td></tr>
			// 		<tr><td>Email:</td><td>'.$userdata->email.'</td></tr>
			// 		<tr><td>Password:</td><td>'.$userdata->password.'</td>
			// 		</tr></table>
			// 		<br/>
			// 		<p>Click Here to <a href="'.$this->config->item("base_url").'login">Sign In</a></p>
			// 		';

			$message = '<!doctype html> <html>
		
			<head>
				<meta charset="utf-8">
				<title>Login Email</title>
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
						<img src="'.$this->config->item('base_url_views').'asset_new/img/logo_msmew.png" style="width: 30%;" >
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
											   Please find the below Login details
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
												<tr><td width="100px">Agent Name: </td><td>'.$userdata->name.'</td></tr>
												<tr><td width="100px">Agent Email: </td><td>'.$userdata->email.'</td></tr>
												<tr><td width="100px">Password: </td><td>'.$userdata->password.'</td></tr>
												<tr><td width="100px">Click Here to : </td><td><a href="'.$this->config->item("base_url").'agent-login">Sign In</a></td></tr>
												
												
												
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
	
			

				$to = $this->input->post('agent_id'); 				
				$subject  = 'MSME Accelerate : Forgot password'; 
				$addcc = array();
				$AddAttachment = array();
				$this->mailsent('valmik.hnrtechnologies@gmail.com',$subject,$message,$addcc,$AddAttachment);
				
				
			
			$this->session->set_flashdata('L_strsucessMessage','Your password has been sent In Email');
			redirect($this->config->item('base_url').'forgot-password');
			} else {
				 $this->session->set_flashdata('L_strErrorMessage','The email ID does not exist');
				 redirect($this->config->item('base_url').'forgot-password');
			}
		}
		
		$this->load->view('forgot-password',$data);	
	}

	function test(){

				$subject  = 'Test Subject'; 
				$addcc = array();
				$AddAttachment = array();
				if($this->mailsent('valmik.hnrtechnologies@gmail.com',$subject,'test message',$addcc,$AddAttachment)){
					echo "Success";
				}else{
					echo "Fail";
				}
	}

	function mailsent($to,$subject,$message,$addcc,$AddAttachment)
	{
		error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			//Server settings
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'mail.mititek.in';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'info@mititek.in';      // SMTP username
			$mail->Password   = 'info@123$%';                   // SMTP password
			$mail->SMTPSecure = "ssl";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 465;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('info@mititek.in', 'MSME Accelerate');
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

	function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect($this->config->item('base_url'));
	}
	
	function show_subcategory() {
        $cid = $_POST['cid'];
        $sid = $_POST['sid'];
        $data = $this->home_model->sub_industry($cid);
        $html = '<select id="sub_industry_id" name="sub_industry_id"  class="form-control">';
        $html .= "<option value=''>Select Sub Industry Type</option>";
        if ($data != '') {
            for ($i = 0; $i < count($data); $i++) {
                if ($sid == $data[$i]->id) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                $html .= "<option value='" . $data[$i]->id . "' " . $selected . ">" . $data[$i]->name . "</option>";
            }
        }
        $html .= "</select>";
        echo $html;
    }

    function detail_form_submit()
	{			
				$data['company']     		= $_POST['company'];
				$data['industry_id']        = $_POST['industry_id'];
				$data['sub_industry_id']    = $_POST['sub_industry_id'];
				$data['annual_turnover']    = $_POST['annual_turnover'];
				$data['asses_value']  		= $_POST['asses_value'];
				$data['no_of_emp']  		= $_POST['no_of_emp'];
				$data['check1']  		    = $_POST['check1'];

				$userdata = $this->session->set_userdata($data);
				// $data['check1']  		    = $_POST['check2'];
				$this->home_model->add_detail_form($data);
				echo "1";
	}


	function sessionProduct()
	{
		$a = $this->session->userdata('sessionProductList');
		$b =$_POST['product_id'];
		if($a ==''){
			$c =$b;
		}else{
			$c = $a.",".$b;
		}
		$this->session->set_userdata('sessionProductList',$c);
		 //echo "<pre>";print_r($this->session->userdata('sessionProductList'));echo "</pre>";
		// $this->session->unset_userdata('sessionProductList');
	}

	function coverageSelected()
	{	
		$a = $this->session->userdata('sessionProductList');
		$b =$_POST['product_id'];
		if($a ==''){
			$c =$b;
		}else{
			$c = $a.",".$b;
		}
		// echo "<pre>";print_r($c);echo "</pre>";exit;
		$this->session->set_userdata('sessionProductList',$c);
		$product_id = $_POST['product_id'];
		$all_coverage = $this->home_model->all_coverage();
		$all_type = $this->home_model->all_type();
		$html = $i = 1;
           		foreach($all_coverage as $coverage_details){
            	if($i == 1){
              	$styleDiv = "display:block";
            	}else{
              	$styleDiv = "display:none";
            } 
        $html .=  '<div class="container" id="coverage1_'.$coverage_details->id.'" style="'.$styleDiv.'"><div class="row justify-content-center align-items-center text-center"><h4 class="text-extra-dark-gray font-weight-600">Premium Breakup</h4></div><div class="row justify-content-center align-items-center" ><h6 class="text-blue1 text-center font-weight-600">Coverage Selected</h6>';

					if($all_type !=''){ 
                    foreach($all_type as $type_detail){ 
                      $get_product_detail = $this->home_model->get_all_product($type_detail->id,$coverage_details->id);

                $html .= '<div class="col-lg-4"><div class="premium-flex box-shadow"><div class="premium"><h6 class="text-blue2 text-center font-weight-600">'.$type_detail->name.'</h6></div><div class="premium-selected">';

				//$sessionProduct = $this->session->userdata('sessionProductList');
                                   $in_array = explode(",",$c);
                foreach($get_product_detail as $product_detail){ 

                                    if(!in_array($product_detail->id, $in_array)){
                           
                $html .= '<div class="coverage cov_Selected" id="mydiv_pc"><div class="coverage-name "><p class="m-0 text-extra-dark-gray">'.$product_detail->name.'</p></div><div class="delete-btn m-0"><a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a></div></div>';
                 } }

                $html .= '<div class="coverage-premium text-center"><div class="label-coverage m-0"><p class="text-extra-dark-gray m-0 font-weight-700">TOTAL COVERAGE PREMIUM </p></div><div class="coverage-amount text-center"><p class="text-extra-dark-gray m-0 font-weight-700"><span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span class="amount text-blue1">10,000</span><span class="tenure">/year</span> </p></div></div>  </div></div></div>';
                      } }
            $html .= '<div class="row justify-content-center"><div class="col-lg-6 "><div class="full-premium-box bg-white box-shadow padding-20px-tb padding-30px-lr"><div class="row text-center"><h6 class="text-blue2 text-center font-weight-600">Total Premium</h6></div><div class="row align-items-center justify-content-center"><div class="tbl_flex"><p class="text-extra-dark-gray m-0 font-weight-700"> Net Premium</p><p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span>60000/-</p></div><div class="tbl_flex"><p class="text-extra-dark-gray m-0 font-weight-700"> Discount(5%)</p><p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span>3000/-</p></div><div class="tbl_flex"><p class="text-extra-dark-gray m-0 font-weight-700"> GST(18%)</p><p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span>10000/-</p></div> <div class="tbl_flex total_sec"><p class="text-extra-dark-gray m-0 font-weight-700"> Total Premium</p><p class="m-0 text-blue2 m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span> 67000</span><span class="tenure">/year</span> </p></div></div><div class="row text-center justify-content-center margin-two-top"><a class="btn theme-btn-1 text-uppercase" id="cuslog">Proceed to Enquiry >></a></div></div></div></div></div></div>';
                    $i++;}
		echo $html;
	}


	// function show_description()
	// {	

	// 	$slider =  '{ "slidesPerView": 1, "loop": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 3000, "disableOnInteraction": true }, "pagination": { "el": ".swiper-pagination", "clickable": true, "dynamicBullets": true }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 2 }, "768": { "slidesPerView": 1 } } }';

	// 	$coverage_id = $_POST['coverage_id'];
	// 	$data = $this->home_model->get_coverage_data($coverage_id);
	// 	//echo "<pre>";print_r($data);echo "</pre>";exit;
	// 	foreach($data as $tewst => $test_value){
	// 		//echo "<pre>";print_r($test_value);echo "</pre>";
	// 		$products_data = $this->home_model->product_covId($test_value->type_id,$coverage_id);	
	// 		//echo "<pre>";print_r($products_data);echo "</pre>";

	// 		$html.='<div class="row align-items-center">
 //                     <div class="col-lg-4">
 //                        <div class="service-flex">';
 //                           if($test_value->timage !=''){
 //                           $html.='<div class="service-icon">
 //                              <img src="'.$this->config->item('base_url').'upload/type_image/small/'.$test_value->timage.'" alt="">
 //                           </div>';
 //                           } else { 

 //                           	$html .= '<div class="service-icon"><img src="'.$this->config->item('base_url').'upload/type_image/small/noimage.jpg." alt=""></div>';

 //                           }
                           
 //                           $html.='<div class="service-cont">
 //                              <h6 class="text-extra-dark-gray margin-10px-bottom">'.$test_value->tname.'</h6>
 //                              <p class="m-0">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Neque Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Deleniti illum quaerat dolorem ipsum </p>
 //                              <a href="#" class="text-blue2 margin-5px-tb">Read more >></a>
 //                           </div>
 //                        </div>
 //                     </div>
 //                     <div class="col-lg-8 position-relative">
 //                        <div class="swiper-container text-center" data-slider-options='.$slider.' >
 //                           <div class="swiper-wrapper">
 //                              <!-- start slider item -->
 //                              <div class="swiper-slide">
 //                                 <div class="sub-pro">
 //                                    <img alt="" src="'.$this->config->item('base_url_views').'asset_new/img/emp_ico_1.png">
 //                                    <p class="text-extra-dark-gray">Group Health Policy</p>
 //                                    <div class="quantity">
 //                                       <a href="#" class="quantity__minus"><span>-</span></a>
 //                                       <input name="quantity" type="text" class="quantity__input" value="10000">
 //                                       <a href="#" class="quantity__plus"><span>+</span></a>
 //                                    </div>
 //                                 </div>
 //                                  <div class="delete-btn">
 //                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
 //                                </div>
 //                                 <div class="sub-cont">
 //                                    <p class="m-0 text-extra-dark-gray"></p>
 //                                 </div>
 //                              </div>
 //                              <!-- end slider item -->
 //                              <!-- start slider item -->
 //                              <div class="swiper-slide">
 //                                 <div class="sub-pro">
 //                                    <img alt="" src="'.$this->config->item('base_url_views').'asset_new/img/emp_ico_1.png">
 //                                    <p class="text-extra-dark-gray"> Health Policy 1</p>
 //                                    <div class="quantity">
 //                                       <a href="#" class="quantity__minus"><span>-</span></a>
 //                                       <input name="quantity" type="text" class="quantity__input" value="10000">
 //                                       <a href="#" class="quantity__plus"><span>+</span></a>
 //                                    </div>
 //                                 </div>
 //                                  <div class="delete-btn">
 //                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
 //                                </div>
 //                                 <div class="sub-cont">
 //                                    <p class="m-0 text-extra-dark-gray"></p>
 //                                 </div>
 //                              </div>
 //                              <!-- end slider item -->
 //                              <div class="swiper-slide">
 //                                 <div class="sub-pro">
 //                                    <img alt="" src="'.$this->config->item('base_url_views').'asset_new/img/emp_ico_1.png">
 //                                    <p class="text-extra-dark-gray">Health Policy 2</p>
 //                                    <div class="quantity">
 //                                       <a href="#" class="quantity__minus"><span>-</span></a>
 //                                       <input name="quantity" type="text" class="quantity__input" value="10000">
 //                                       <a href="#" class="quantity__plus"><span>+</span></a>
 //                                    </div>
 //                                 </div>
 //                                  <div class="delete-btn">
 //                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
 //                                </div>
 //                                 <div class="sub-cont">
 //                                    <p class="m-0 text-extra-dark-gray"></p>
 //                                 </div>
 //                              </div>
 //                              <!-- end slider item -->
 //                           </div>
 //                        </div>
                       
 //                        <!-- start slider navigation -->
 //                     </div>
 //                     <div class="bg-extra-light-gray margin-60px-tb h-2px"></div>
 //                 </div>';
		
	// 	}
	// 	echo $html;
	// }
	
}