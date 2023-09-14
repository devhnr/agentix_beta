<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	class Billship extends CI_Controller 
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
		$this->load->model('billship_model');
	}

	function inquiry_form_submit(){


		//echo "sd";exit;

		//echo "<pre>";print_r($_POST);echo"</pre>";

		$intOrderNumber=$this->billship_model->getOrderNumber();
		$order_number = array('order_number'=>$intOrderNumber);
		$this->session->set_userdata($order_number);





		//echo $this->session->userdata('order_number');

		$product_id = explode(",", $_POST['product_id']);
		$product_price = explode(",", $_POST['product_price']);
		$total_coverage_premium = explode(",", $_POST['total_coverage_premium']);

		//echo "<pre>";print_r($_POST);echo"</pre>";

		// echo "<pre>";print_r($product_id);echo"</pre>";
		// echo "<pre>";print_r($total_coverage_premium);echo"</pre>";

		// $data_pdf['username'] = $_POST['name_inquiry'];

		// $html = $this->load->view('sucess_mail_pdf', $data_pdf, true);


		// //echo"<pre>";print_r($html);echo"</pre>";exit;

		// $path =  $this->config->item('upload') . "pdf/";

		// if(!is_dir($path)){
		// 	@mkdir($path, 0777, true);
		// }

		// $name_file = $stripped = str_replace(' ', '_', $_POST['name_inquiry']);
		     
  //       include_once APPPATH . 'libraries/mpdf/mpdf.php'; 
		// $filename= time()."_".$name_file.".pdf";
  //       $mpdf = new mPDF();
  //       $mpdf->SetFooter('|{PAGENO} of {nb}|');
  //       $mpdf->SetAutoPageBreak(TRUE);
  //       $mpdf->WriteHTML($html);
  //       $mpdf->Output($path.$filename);


  //       $downfile = $this->config->item('front_base_url')."upload/pdf/".$filename;

		

		$content=array(
			//'user_id'				=> $this->session->userdata('userid'),
			'companyname'			=> $_POST['companyname'],
			'industry_id'			=> $_POST['industry_id'],
			'sub_industry_id'		=> $_POST['sub_industry_id'],
			'annual_turnover'		=> $_POST['annual_turnover'],
			'asses_value'			=> $_POST['asses_value'],
			'no_of_emp'				=> $_POST['no_of_emp'],
			'email'					=> $_POST['email'],
			'net_premium'			=> $_POST['net_premium'],
			'gst_amount'			=> $_POST['gst_amount'],
			'discount_amount'		=> $_POST['discount_amount'],
			'order_total'			=> $_POST['total_premium'],
			'name_inquiry'			=> $_POST['name_inquiry'],
			'mobile_inquiry'		=> $_POST['mobile_inquiry'],
			'email_inquiry'			=> $_POST['email_inquiry'],
			'agent_comment'			=> $_POST['agent_comment'],



			'order_number'			=> $intOrderNumber,
			'order_invoice'			=> $intOrderNumber,
			//'user_info_id'			=> $this->session->userdata('userid'),
			
			//'shippingcost'			=> $this->session->userdata('shippingcost'),
			'order_currency'		=> 'INR',
			//'order_status'			=> $order_status,
			//'paymentmode'			=> $paymentmode,
			//'payment_status'		=> $payment_status,
			'cdate'					=> date('Y-m-d H:i:s'),
			//'coupondiscount'		=> $this->session->userdata('discount_amount'),
			//'coup_name' 			=> $coupanname,
			//'coupon_code'			=> $coupancode,
			'ip_address'			=> $_SERVER['REMOTE_ADDR'],
			//'pdf'			=> $filename,
			//'list_order_status'		=> $list_order_status,
			//'extra_charge'		=> $this->session->userdata('extra_charge'),
			
			);
		//echo "<pre>";print_r($content);echo "</pre>";
		$arrOrderId=$this->billship_model->saveOrderInDatabase($content,$this->session->userdata('order_number')); 


		foreach ($product_id as $key => $pid){

			//echo $key;exit;
			$product_price_new = $product_price[$key];
			$total_coverage_premium_new = $total_coverage_premium[$key];
			//echo $product_price_new;
			$product_data = $this->billship_model->product_data($pid);

			//echo "<pre>";print_r($product_data);echo"</pre>";exit;

			if($product_data->image != ''){
				$image = $product_data->image;
			}else{
				$image = "no-image.png";
			}

			$arrData=array(
						'order_id'					=> $this->session->userdata('order_number'),
						//'user_info_id'			=> $userid,
						'product_id'				=> $pid,
						//'order_item_code'			=> "",
						'order_item_name'			=> $product_data->name,
						//'product_quantity'		=> $arrRowDeailts['qty'],
						'product_item_price'		=> $product_price_new,
						'total_coverage_premium'	=> $total_coverage_premium_new,
						'type_id'					=> $product_data->type_id,
						'coverage_id'				=> $product_data->coverage_id,
						'sub_industry'				=> $product_data->sub_industry,
						'average'					=> $product_data->average,
						'show_price'				=> $product_data->show_price,
						'base_image'				=> $image,
						'cdate'=> date('Y-m-d'),
					 );
					//echo "<pre>";print_r($arrData);echo"</pre>";exit;
					$arrOrderId= $this->billship_model->saveOrderFromCart($arrData);

			

		}	

				// $data_pdf['username'] = $_POST['name_inquiry'];

				// $html = $this->load->view('sucess_mail_pdf', $data_pdf, true);


				// //echo"<pre>";print_r($html);echo"</pre>";exit;

				// $path =  $this->config->item('upload') . "pdf/";

				// if(!is_dir($path)){
				// 	@mkdir($path, 0777, true);
				// }
				     
	   //          include_once APPPATH . 'libraries/mpdf/mpdf.php'; 
				// $filename= time()."_".$_POST['name_inquiry'].".pdf";
	   //          $mpdf = new mPDF();
	   //          $mpdf->SetFooter('|{PAGENO} of {nb}|');
	   //          $mpdf->SetAutoPageBreak(TRUE);
	   //          $mpdf->WriteHTML($html);
	   //          $mpdf->Output($path.$filename);


	   //          $downfile = $this->config->item('front_base_url')."upload/pdf/".$filename;




		//exit;
				$data_new['username'] = $_POST['name_inquiry'];
				$message = $this->load->view('sucess_mail',$data_new,true);


				$to = $_POST['email'];
				$to2 = $_POST['email_inquiry'];
				$subject  = 'Risk Exposure Report'; 
				$addcc = array();
				$AddAttachment = $downfile;
				//$this->mailsent_with_attachment($to,$subject,$message,$addcc,$AddAttachment);
				//$this->mailsent_with_attachment($to2,$subject,$message,$addcc,$AddAttachment);



		$this->session->set_flashdata('L_strsucessMessage','Inquiry Submit Successfully');
		redirect($this->config->item('base_url'));
	}


	function success_mail(){

		$data['username'] = 'devang';
		$this->load->view('sucess_mail',$data);	
	}

	function success_mail_pdf(){



		// $data['username'] = 'devang';
		// $data['company'] = $this->session->userdata('company');
		// $data['industry_id'] = $this->session->userdata('industry_id');
		// $data['sub_industry_id'] = $this->session->userdata('sub_industry_id');

		// echo"<pre>";print_r($data);echo"</pre>";exit;

		$this->load->view('sucess_mail_pdf',$data);	
	}

	function test(){

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

		//echo $this->session->userdata('industry_id');exit;
		//echo "sd";exit;

				$data['username'] = 'devang';
				$html = $this->load->view('sucess_mail_pdf', $data, true);


				//echo"<pre>";print_r($html);echo"</pre>";exit;

				$path =  $this->config->item('upload') . "pdf/";

				if(!is_dir($path)){
					@mkdir($path, 0777, true);
				}
				     
	            include_once APPPATH . 'libraries/mpdf/mpdf.php'; 
				$filename= time()."_".$data['username'].".pdf";
	            $mpdf = new mPDF();
	            $mpdf->SetFooter('|{PAGENO} of {nb}|');
	            $mpdf->SetAutoPageBreak(TRUE);
	            $mpdf->WriteHTML($html);
	            $mpdf->Output($path.$filename);


	            $downfile = $this->config->item('front_base_url')."upload/pdf/".$filename;

	            //echo"<pre>";print_r($downfile);echo"</pre>";exit;


				$subject  = 'Test Subject'; 
				$addcc = array();
				//$AddAttachment = $this->config->item('front_base_url').'/upload/pdf/'.$filename.'';


				//echo $AddAttachment;exit;
				if($this->mailsent_with_attachment('devang.hnrtechnologies@gmail.com',$subject,'test mail message',$addcc,$AddAttachment)){
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
			//$mail->SMTPDebug = 2;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'mail.msmeaccelerate.in';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'info@msmeaccelerate.in';      // SMTP username
			$mail->Password   = 'info@123$%';                   // SMTP password
			$mail->SMTPSecure = "ssl";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 465;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('info@msmeaccelerate.in', 'MSME Accelerate');
			$mail->addAddress($to, "");     // Add a recipient
			if($addcc !='' && count($addcc)>0)
			{
				foreach($addcc as $key=>$value)
				{	
					$mail->addCC($value);	
				}
			}

			//$mail->addStringAttachment(file_get_contents($AddAttachment), 'test.pdf');
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


	function mailsent_with_attachment($to,$subject,$message,$addcc,$AddAttachment)
	{
		error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			//Server settings
			//$mail->SMTPDebug = 2;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'mail.msmeaccelerate.in';  // Specify main and backup SMTP servers
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'info@msmeaccelerate.in';      // SMTP username
			$mail->Password   = 'info@123$%';                   // SMTP password
			$mail->SMTPSecure = "ssl";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 465;                                    // TCP port to connect to
			//Recipients
			$mail->setFrom('info@msmeaccelerate.in', 'MSME Accelerate');
			$mail->addAddress($to, "");     // Add a recipient
			if($addcc !='' && count($addcc)>0)
			{
				foreach($addcc as $key=>$value)
				{	
					$mail->addCC($value);	
				}
			}

			$mail->addStringAttachment(file_get_contents($AddAttachment), 'Risk Exposure Report.pdf');
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
}