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
	
}