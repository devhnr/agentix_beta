<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {



	private $_data = array();

	function __construct() {

		parent::__construct();		

		$this->load->model('admin');	

	}

	

	function index()

	{

		$this->load->library('session');



		$data	=	array(



						'eamil'=> '',



						'L_strErrorMessage'=> '',



						'success'=> '',



						'password'=>'',



					);



					//print_r($data);die;



		if($this->session->userdata('adminId') !='') 



		{



			redirect($this->config->item('base_url').'home');



		} else {

			

       $this->load->view('login', $data);

    



		}

	}

	function changepwd()

	{

		

	}



	function logout()



	{



		$this->load->library('session');



		$this->session->sess_destroy();



		redirect($this->config->item('base_url'));



	}



 



	function login()



	{



 		$this->load->library('session');



		$this->load->library('validation');



		if($this->input->post("action")=="login") 



		{



			$form_field	=	array(



							'txtUserName'=> '',



							'txtPassword'=>''



							);







			$rules['txtUserName'] =	"trim|required";



			$rules['txtPassword'] =	"trim|required";







			$this->validation->set_rules($rules);







			$fields['txtUserName'] = "Email";



			$fields['txtPassword'] = "Password";







			$this->validation->set_fields($fields);







				if($this->validation->run() == FALSE)



				{



					if($this->validation->error_string!='') 



					{



						foreach($form_field as $key => $value)	



						{	



							$data[$key]=$this->input->post($key);	



						}



					}



 					$data['L_strErrorMessage'] = $this->validation->error_string;



					$this->load->view('login',$data);



				} 



				else 



				{



					$this->load->model('admin');



					if($this->input->post("txtUserName")) 



					{


						$get_hash_password = $this->admin->get_hash_password($this->input->post("txtUserName"));

						 // echo "<pre>";print_r($get_hash_password);echo "</pre>";exit;


						if (password_verify($this->input->post("txtPassword"), $get_hash_password->password)) {
						    $password = $get_hash_password->password;
						} else {
						    $password = $this->input->post("txtPassword");
						}


						$newdata = array(



								   'username'  => $this->input->post("txtUserName"),



								   'password'  => $password



							   );

						  // echo "<pre>";print_r($newdata);echo "</pre>";exit;
						 



						$selUser = $this->input->post("selUser");	

						//	print_r($response = $this->admin->check_login($newdata)); die;

						if($response = $this->admin->check_login($newdata)) 



						{ // for super admin

							// echo "test";exit;

							$newdata = array(



											   'username' => $this->input->post("txtUserName"),

												'uname' => $response->name,

											   'adminId' => $response->id,



											//   'usertype' => $response->status,

											   

											   'role_id' => $response->role_id,

												//'autogen_status' => $response->autogen_status,



										   );






							$this->session->set_userdata($newdata);


							$log_data = array(
								'username' => $this->session->userdata('username'),
								'login_user_id' => $this->session->userdata('adminId'),
								'module_name' => 'Login Admin Users',
								'corporate_name' => '',
								'policy_number' => '',
								'created_at' => date('Y-m-d h:i:sa')
							);
	
							$this->admin->log_data_manage($log_data);



						//	print_r($newdata);die;

								/*if($this->session->userdata('autogen_status')==0){

									

									redirect($this->config->item('base_url').'admin_user/chngepassword');

									

								}*/

							redirect($this->config->item('base_url').'home');



						} 



						else 



						{



							foreach($form_field as $key => $value)	



							{	



								$data[$key]=$this->input->post($key);	



							}



							$data['L_strErrorMessage'] = "Invalid User Name  or Password.";



							$this->load->view('login',$data);



						}



					 



				} 



				else 



				{



					$this->load->view('login',$data);



				}



			}



		 } 



		 else 



	     {



			redirect($this->config->item('base_url'));



		 }



	}

}

