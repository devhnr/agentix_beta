<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

	

	class Compare_policies extends CI_Controller 

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
		$this->load->model('compare_policies_model');

		$this->load->helper('cookie'); 

	}

  	function index(){ 

		//echo $_GET['compareids'];
		
		$data['error'] = "";
		$this->load->view('agent-admin/compare_policies',$data);
	}
	
	function compare_policies_remove(){
		
		$policies_id = $_POST['hidden_policy_id'];
		
		$policy_price = $_POST['hidden_policy_price'];
		
		$combine = $policies_id."-".$policy_price;
		
		$hidden_array = $_POST['hidden_array'];
		
		$create_array = explode(",",$hidden_array);
		
		$key = array_search($combine, $create_array);
		
		if ($key !== false) {
			unset($create_array[$key]);
		}
		
		$implode_array = implode(",",$create_array);
		
		$this->session->set_flashdata('L_strsucessMessage','Mail Send SuccessFully');

		redirect($this->config->item('base_url')."compare-policies/?compareids=".$implode_array);
		
		//echo "<pre>";print_r($create_array);echo"</pre>";exit;
	}

	
}