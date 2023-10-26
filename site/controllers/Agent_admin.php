<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

	

	class Agent_admin extends CI_Controller 

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
		$this->load->model('agent_admin_model');

		$this->load->helper('cookie'); 

		if($this->session->userdata('userid') == ''){

			redirect($this->config->item('base_url').'login');

    }

	}

  	function index(){ 
		$data['error'] = "";
		$this->load->view('agent-admin/index',$data);
	}

	function product_comparison(){ 
		$data['error'] = "";
		$data['policy_category'] = $this->agent_admin_model->get_all_policy_category();

		//echo"<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('agent-admin/product_comparison',$data);
	}

	function compare_list($page_url){ 
		$data['error'] = "";

		$data['policy_cat_data'] = $this->agent_admin_model->get_policy_category_data($page_url);

		$data['sort_by'] = $this->input->get('sort_by');

		$data['menu'] = $this->input->get('menu');

		$data['insurer'] = $this->input->get('insurer');

		$data['sum_insurer'] = $this->input->get('sum_insurer');

		$data['all_policy'] = $this->agent_admin_model->get_policy_using_catrgory($data['policy_cat_data']->id,$data);

		$data['all_company_name'] = $this->agent_admin_model->all_company_name();

		$data['get_sum_insured_detail'] = $this->agent_admin_model->get_sum_insured_detail();
		

		//echo"<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('agent-admin/compare_list',$data);
	}

	public function download($doc_name)

	{	

        if(!empty($doc_name)){

            $this->load->helper('download');

            $pth  =  file_get_contents($this->config->item('front_base_url')."upload/policy_worlding/".$doc_name."");



            force_download($doc_name, $pth);

        }

    }

    public function download_brochure($doc_name)

	{

        if(!empty($doc_name)){

            $this->load->helper('download');

            $pth    =  file_get_contents($this->config->item('front_base_url')."upload/brochure/".$doc_name."");

            force_download($doc_name, $pth);

        }

    }

    function compare_policy(){

    	//echo "sd";exit;
    	$compare_count = 0;
    	if($this->session->userdata('compare_array') == ''){
    		$dataArray = array();
    		$compare_count = 1;
    	}else{
    		$dataArray = $this->session->userdata('compare_array');


    	}

    	//$dataArray = array();



    	$policy_id = $_POST['policy_id'];
    	$plan_name = $_POST['plan_name'];
    	$premium_amount = $_POST['premium_amount'];
    	$sum_insured = $_POST['sum_insured'];

    	$dataIdentifier = "$policy_id|$premium_amount|$sum_insured";

    	if (!in_array($dataIdentifier, $dataArray)) {
    		 $dataArray[] = $dataIdentifier;
    	}



    	$this->session->set_userdata('compare_array',$dataArray);

    	 if($this->session->userdata('compare_array') != ''){
		        $compare_count = 0;
		        foreach($this->session->userdata('compare_array') as $key => $value){
		            $compare_count += 1;
		        }
		    }

		$this->session->set_userdata('compare_array_count',$compare_count);

    	echo "1";

    	//echo"<pre>";print_r($this->session->userdata('compare_array'));echo"</pre>";exit;

    }

    function delete_compare($policies_id,$premium_amount,$sum_insured,$cat_page_url)

	{ 	
		$originalArray = $this->session->userdata('compare_array');
		$elementToRemove  = "$policies_id|$premium_amount|$sum_insured";
		$elementToRemove = urldecode($elementToRemove);
		// echo"<pre>";print_r($originalArray);echo"</pre>";
		// echo"<pre>";print_r($elementToRemove);echo"</pre>";exit;

		$index = array_search($elementToRemove, $originalArray);

		if ($index !== false) {
		    unset($originalArray[$index]);
		}

		$newArray = array_values($originalArray);

		$this->session->set_userdata('compare_array',$newArray);

		if($this->session->userdata('compare_array') != ''){
		        $compare_count = 0;
		        foreach($this->session->userdata('compare_array') as $key => $value){
		            $compare_count += 1;
		        }
		    }

		$this->session->set_userdata('compare_array_count',$compare_count);

		$this->session->set_flashdata('L_strsucessMessage','Compare Deleted Successfully!');

		redirect($this->config->item('base_url').'agent-admin/compare-list/'.$cat_page_url, 'location');

	}


	function delete_compare_page($policies_id,$premium_amount,$sum_insured)

	{ 	
		$originalArray = $this->session->userdata('compare_array');
		$elementToRemove  = "$policies_id|$premium_amount|$sum_insured";

		$elementToRemove = urldecode($elementToRemove);

		$index = array_search($elementToRemove, $originalArray);

		if ($index !== false) {
		    unset($originalArray[$index]);
		}

		$newArray = array_values($originalArray);

		$this->session->set_userdata('compare_array',$newArray);

		if($this->session->userdata('compare_array') != ''){
		        $compare_count = 0;
		        foreach($this->session->userdata('compare_array') as $key => $value){
		            $compare_count += 1;
		        }
		    }

		$this->session->set_userdata('compare_array_count',$compare_count);

		$this->session->set_flashdata('L_strsucessMessage','Compare Deleted Successfully!');

		redirect($this->config->item('base_url').'agent-admin/compare/', 'location');

	}

	function compare(){
		$data['error'] = "";
		$this->load->view('agent-admin/compare',$data);
	}

	function logout(){

		$this->load->library('session');

		$this->session->sess_destroy();

		redirect($this->config->item('base_url')."login");

	}

	function compare_login(){
		$policy_id_array = $this->session->userdata('compare_array')[0];

		$policy_id = explode('|',$policy_id_array);


		$policy_data = $this->agent_admin_model->get_policy_usingid($policy_id[0]);

		$cat_data = $this->agent_admin_model->get_catdata_usingid($policy_data->cat_id);

		//echo "<pre>";print_r($cat_data);echo"</pre>";exit;


		$data['name'] = $_POST['name'];
		$data['mobile'] = $_POST['mobile'];
		$data['email'] = $_POST['email'];
		$data['location'] = $_POST['location'];

		$compare_array = $this->session->userdata('compare_array');
		$idList = "";
		foreach($compare_array as $key => $value){

			$explode = explode('|',$value);
			$id = $explode[0]."-".$explode[1];
			$idList .= $id . ",";
		}
		$idList = rtrim($idList, ',');

		$compare_url = $this->config->item('base_url')."compare-policies/?compareids=".$idList;

		$data['url'] =$compare_url;

		$this->agent_admin_model->add_compare_send_mail_data($data);

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

											   Please find the below Compare Policies details

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
												<tr><td width="100px">Mobile No: </td><td>'.$data['mobile'].'</td></tr>
												<tr><td width="100px">Email Id: </td><td>'.$data['email'].'</td></tr>
												<tr><td width="100px">Location: </td><td>'.$data['location'].'</td></tr>

												<tr><td width="100px">Compare Url: </td><td>'.$compare_url.'</td></tr>
												

												
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

		$to = $this->input->post('email');				

		$subject  = 'Product Comparison: '.$cat_data->name.' Insurance'; 

		$addcc = array();

		$AddAttachment = array();

		//$name = $data['name'];
		$name = $this->session->userdata('name');

		$data['compare_url'] = $compare_url;

		$html = $this->load->view('agent-admin/email_temp/product_compare_mail', $data, true);

		//echo $html;exit;

		//$this->mailsent($to,$subject,$message,$addcc,$AddAttachment,$name);

		
		$this->mailsent($to,$subject,$html,$addcc,$AddAttachment,$name);

		$this->session->set_flashdata('L_strsucessMessage','Mail Send SuccessFully');

		redirect($this->config->item('base_url')."agent-admin/compare");

		//
	}

	function test_mail_simple(){

		//echo "sd";exit;
		$to = 'devang.hnrtechnologies@gmail.com';				

		$subject  = 'check mail'; 

		$addcc = array();

		$AddAttachment = array();

		$message="Meesage Text Come here";

		$name="";

		if($this->mailsent($to,$subject,$message,$addcc,$AddAttachment,$name)){
			echo "Successfully";
		}else{
			echo "fail";
		}
	}

	function product_respository($page_url){


		//echo "s";exit;
		$data['error'] = "";
		$data['policy_cat_data'] = $this->agent_admin_model->get_policy_category_data($page_url);
		$data['all_policy_repository'] = $this->agent_admin_model->all_policy_repository($data['policy_cat_data']->id);

		$data['all_company_name'] = $this->agent_admin_model->all_company_name();
		
		//echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('agent-admin/product_respository',$data);
	}


	function repository_of_brochure(){ 
		$data['error'] = "";
		$data['policy_category'] = $this->agent_admin_model->get_all_policy_category();

		//echo"<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('agent-admin/repository_of_brochure',$data);
	}

	function policy_rep_doc_download($filename){

		if(!empty($filename)){      
			//load download helper      
			//echo $doc_name;exit;      
			$this->load->helper('download');            
			//get file info from database      
			//$fileInfo = $this->file->getRows(array('id' => $id));            
			//file path      
			$file = $this->config->item('upload').'product_repository/'.$filename;      
			//echo $file;exit;      
			//download file from directory      
			force_download($file, NULL);    
		}

	}

	function poster_doc_download($filename){

		if(!empty($filename)){      
			//load download helper      
			//echo $doc_name;exit;      
			$this->load->helper('download');            
			//get file info from database      
			//$fileInfo = $this->file->getRows(array('id' => $id));            
			//file path      
			$file = $this->config->item('upload').'poster/'.$filename;      
			//echo $file;exit;      
			//download file from directory      
			force_download($file, NULL);    
		}

	}

	function product_repository_single_policy_mail(){

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

		
		$data['name'] = $_POST['name'];
		$data['mobile'] = $_POST['mobile'];
		$data['email'] = $_POST['email'];
		$data['location'] = $_POST['location'];
		$data['policy_id'] = $_POST['policy_id'];
		$data['policy_cat_id'] = $_POST['policy_cat_id'];

		$cat_page_url = $_POST['cate_page_url'];

		$text = str_replace('-', ' ', $cat_page_url); // Replace hyphens with spaces
		$cat_name = ucwords($text);

		$policy_data = $this->agent_admin_model->get_policy_usingid_new($data['policy_id']);

		//echo"<pre>";print_r($policy_data);echo"</pre>";exit;




		$this->agent_admin_model->product_repository_single_policy_mail($data);

		$policy_wording_data = $this->agent_admin_model->policy_repository_data($_POST['policy_id'],'1');
		//echo "sd";exit;
        $policy_brochure_data = $this->agent_admin_model->policy_repository_data($_POST['policy_id'],'2');



        if($policy_wording_data->document_file != '' && $policy_brochure_data->document_file != ''){

        	//echo "sdss";

        	$file_wording = $this->config->item('base_url').'upload/product_repository/'.$policy_wording_data->document_file;

        	$file_brouchure = $this->config->item('base_url').'upload/product_repository/'.$policy_brochure_data->document_file;

        	$AddAttachment = array($file_wording,$file_brouchure);


        }elseif($policy_wording_data->document_file != '' && $policy_brochure_data->document_file == ''){

        	$file_wording = $this->config->item('base_url').'upload/product_repository/'.$policy_wording_data->document_file;
        	$AddAttachment = array($file_wording);

        }elseif($policy_brochure_data->document_file != '' && $policy_wording_data->document_file == ''){

        	$file_brouchure = $this->config->item('base_url').'upload/product_repository/'.$policy_brochure_data->document_file;

        	$AddAttachment = array($file_brouchure);

        }else{

        	$AddAttachment = array();
        }

//         ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

        $to = $this->input->post('email');				

		//$subject  = 'Thank you for product Respository - Agentix'; 
		$subject  = 'Product Documents: '.$cat_name.' Insurance'; 

		$addcc = array();

		//$AddAttachment = array();

		

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

											   Please find the below Product Repository details

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
												<tr><td width="100px">Mobile No: </td><td>'.$data['mobile'].'</td></tr>
												<tr><td width="100px">Email Id: </td><td>'.$data['email'].'</td></tr>
												<tr><td width="100px">Location: </td><td>'.$data['location'].'</td></tr>

												<tr><td width="100px">Policy Name: </td><td>'.$policy_data->plan_name.'</td></tr>
												

												
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

		$data['policy_name'] = $policy_data->plan_name;
		
		$html = $this->load->view('agent-admin/email_temp/product_repositroy_mail', $data, true);

		$name = $this->session->userdata('name');

		//echo "<pre>";print_r($this->session->userdata('name'));echo"</pre>";exit;

		//$this->mailsent_with_attachment_new($to,$subject,$message,$addcc,$AddAttachment,$name);

		$this->mailsent_with_attachment_new($to,$subject,$html,$addcc,$AddAttachment,$name);

		$this->session->set_flashdata('L_strsucessMessage','Mail Sent Successfully!');

		redirect($this->config->item('base_url').'agent-admin/product-respository/'.$cat_page_url, 'location');

		//echo "<pre>";print_r($AddAttachment);echo"</pre>";exit;

        
	}


	function zip_download(){

		//echo "<pre>";print_r($_POST);echo"</pre>";exit;


		// $documentArray = $_POST['checkboxes']; // Assuming you receive the array through a form POST request.
		// $zipFolderPath = $this->config->item('upload').'product_repository/zip/'; // Replace with the actual path to your zip folder.
		// $zipFilename = 'documents.zip';
		// $zipFullPath = $zipFolderPath . $zipFilename;

		// $zip = new ZipArchive();

		// if ($zip->open($zipFullPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
		//     // Loop through each document in the array and add it to the zip file.
		//     foreach ($documentArray as $document) {
		//         $documentPath = $this->config->item('upload').'product_repository/'. $document; // Replace with the actual path to your documents.
		//         $zip->addFile($documentPath, $document);
		//     }

		//     $zip->close();

		//     // Set the appropriate headers to force download.
		//     header('Content-Type: application/zip');
		//     header('Content-Disposition: attachment; filename="' . $zipFilename . '"');
		//     header('Content-Length: ' . filesize($zipFullPath));

		//     // Read and output the ZIP file.
		//     readfile($zipFullPath);
		    
		//     // Delete the ZIP file after download (optional).
		//    // unlink($zipFullPath);
		    
		//     exit;
		// } else {
		//     echo 'Failed to create the zip file.';
		// }


		if(isset($_POST['checkboxes'])){
		    $checkboxes = $_POST['checkboxes'];
		    $zip = new ZipArchive();
		    $zipFileName = 'downloaded_documents.zip';

		    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
		        foreach ($checkboxes as $document) {

		        	$documentPath = $this->config->item('upload').'product_repository/'. $document;
		            //$file = pathinfo($document, $documentPath);
		            $zip->addFile($document, $documentPath);
		        }

		        $zip->close();

		        header('Content-Type: application/zip');
		        header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
		        readfile($zipFileName);

		        //unlink($zipFileName);
		    } else {
		        echo 'error';
		    }
		} elseif(isset($_GET['download'])){
		    $file = $_GET['download'];
		    $filepath = $file;
		    
		    if (file_exists($filepath)) {
		        header('Content-Description: File Transfer');
		        header('Content-Type: application/zip');
		        header('Content-Disposition: attachment; filename=' . basename($filepath));
		        header('Content-Length: ' . filesize($filepath));
		        readfile($filepath);
		        exit;
		    }
		}
	}

	function new_products(){  
		$data['error'] = "";
		$data['new_products'] =$this->agent_admin_model->get_all_new_products();
		//echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('agent-admin/new_products',$data);
	}

	function client_educational_content(){  
		$data['error'] = "";
		$data['recommended_poster'] =$this->agent_admin_model->get_recommended_poster();
		$data['daily_poster'] =$this->agent_admin_model->get_daily_poster();
		$data['daily_poster'] =$this->agent_admin_model->get_daily_poster();
		$data['all_blogs'] =$this->agent_admin_model->get_all_blogs();

		//echo "<pre>";print_r($data);echo"</pre>";exit;
		$this->load->view('agent-admin/client_educational_content',$data);
	}

	function recommended_poster(){  
		$data['error'] = "";
		$data['recommended_poster'] =$this->agent_admin_model->get_recommended_poster();
		$this->load->view('agent-admin/recommended_poster',$data);
	}

	function daily_poster(){  
		$data['error'] = "";
		$data['daily_poster'] =$this->agent_admin_model->get_daily_poster();
		$this->load->view('agent-admin/daily_poster',$data);
	}

	function article_poster(){  
		$data['error'] = "";
		$data['all_blogs'] =$this->agent_admin_model->get_all_blogs();
		$this->load->view('agent-admin/article_poster',$data);
	}


	// function test_mail(){

	// 	//echo "sd";exit;
	// 	$to = 'devang.hnrtechnologies@gmail.com';				

	// 	$subject  = 'Thank you for product Respository - Agentix'; 

	// 	$addcc = array();

	// 	$AddAttachment = array('http://localhost/agentix/beta/upload/product_repository/1693804919.4555.pdf');

	// 	$message="dd";

	// 	$name="";

	// 	if($this->mailsent_with_attachment_new($to,$subject,$message,$addcc,$AddAttachment,$name)){
	// 		echo "Successfully";
	// 	}else{
	// 		echo "fail";
	// 	}
	// }

	function mailsent_with_attachment_new($to,$subject,$message,$addcc,$AddAttachment,$name)

	{

		error_reporting(E_STRICT);

			$mail = new PHPMailer(true);



			try {

			//Server settings

			$mail->SMTPDebug = 0;                                       // Enable verbose debug output

			$mail->isSMTP();                                            // Set mailer to use SMTP

			$mail->Host       = 'node7388.myfcloud.com';  // Specify main and backup SMTP servers

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

			if (!empty($AddAttachment) && is_array($AddAttachment)) {
            foreach ($AddAttachment as $AddAttachment_data) {
                if (!empty($AddAttachment_data)) {
                    // Get the file contents and add it as an attachment
                    $file_contents = file_get_contents($AddAttachment_data);
                    $file_name = basename($AddAttachment_data);
                    $mail->addStringAttachment($file_contents, $file_name);
	                }
	            }
	        }
			
			
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subject;

			$mail->Body    = $message;

			$mail->send();

			//echo 'Message has been sent';

		} catch (Exception $e) {

			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

		}

	}


	// function mailsent($to,$subject,$message,$addcc,$AddAttachment,$name)
	// {
	// 	error_reporting(E_STRICT);
	// 		$mail = new PHPMailer(true);

	// 		try {
	// 		//Server settings
	// 		$mail->SMTPDebug = 0;                                       // Enable verbose debug output
	// 		$mail->isSMTP();                                            // Set mailer to use SMTP
	// 		$mail->Host       = 'mail.mititek.in';  // Specify main and backup SMTP servers
	// 		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	// 		$mail->Username   = 'info@mititek.in';      // SMTP username
	// 		$mail->Password   = 'info@123$%';                   // SMTP password
	// 		$mail->SMTPSecure = "ssl";         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
	// 		$mail->Port       = 465;                                    // TCP port to connect to
	// 		//Recipients
	// 		$mail->setFrom('info@mititek.in', $name);
	// 		$mail->addAddress($to, "");     // Add a recipient
	// 		if($addcc !='' && count($addcc)>0)
	// 		{
	// 			foreach($addcc as $key=>$value)
	// 			{	
	// 				$mail->addCC($value);	
	// 			}
	// 		}
	// 		if($AddAttachment !='' && count($AddAttachment)>0)
	// 		{
	// 			foreach($AddAttachment as $key=>$value)
	// 			{	
	// 				if($value !='')
	// 				{
	// 					$mail->addAttachment($value);
	// 				}
	// 			}
	// 		}
	// 		// Content
	// 		$mail->isHTML(true);                                  // Set email format to HTML
	// 		$mail->Subject = $subject;
	// 		$mail->Body    = $message;
	// 		$mail->send();
	// 		//echo 'Message has been sent';
	// 	} catch (Exception $e) {
	// 		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	// 	}
	// }

	function mailsent($to,$subject,$message,$addcc,$AddAttachment,$name)
	{
		error_reporting(E_STRICT);
			$mail = new PHPMailer(true);

			try {
			//Server settings
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
			$mail->isSMTP();                                            // Set mailer to use SMTP
			$mail->Host       = 'node7388.myfcloud.com';  // Specify main and backup SMTP servers
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