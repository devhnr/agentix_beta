<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template {

	/*********Corporate Html View***********/
	public function full_corporate_html_view($data){
			$CI =& get_instance();
			$CI->load->view('links/header',$data);
			$CI->load->view($data['file'],$data);
			$CI->load->view('links/footer',$data);
	}

}
