<?php

class Home extends CI_Controller {

	private $_data = array();

	function __construct() {

		parent::__construct();

		if($this->session->userdata('adminId') == ''){

			redirect($this->config->item('base_url'));

		}

	}

	function index()

	{	

	//	$this->load->model('users_model');

		$this->load->model('admin');

		$data = array();

		$data['L_strErrorMessage']='';

		$this->load->view('dashboard',$data);

	}	

	function change_password(){	
	    
	    //echo "sd";exit;

	$this->load->model('admin');

	$result = $this->admin->get_user($this->session->userdata('adminId'));  

	$form_field = $data = array(				

	'L_strErrorMessage' => '',	

	'id'	=> $result[0]->id,	

	'password'	=> $result[0]->password,	

	'newpassword'	=>"",		

	);				

	if($this->input->post('action') == 'edit_pass') 	

	{				

	foreach($data as $key => $value) 		

	{					

	$form_field[$key]=$this->input->post($key);		

	}				

	$this->load->library('validation');			

	$rules['newpassword'] = "trim|required";		

	$this->validation->set_rules($rules);		

	$fields['newpassword']   = "tutorial Category Name";

	$this->validation->set_fields($fields);			

	if ($this->validation->run() == FALSE) 		

		{						

	$data = $form_field;	

	$data['L_strErrorMessage'] = $this->validation->error_string;	

		}else{						

	if($response = $this->admin->edit_pass($form_field))	

		{					

	$this->session->set_flashdata('L_strErrorMessage','Password Updated Successfully!!!!');	

	redirect($this->config->item('base_url').'home/change_password');		

	}			

	else 		

		{		

	$data['L_strErrorMessage'] = 'Some Errors prevented from update data,please try again later.';

	}		

	}	

	}		

	$this->load->view('edit_password',$data);	

	}

	

	

	function download_user()

	{

		$this->load->model('admin');

		$orders_list  = $this->admin->list_user1();

		$output = '';

		$output .= 'Sr No.,First Name,Last Name, Email,Mobile';

		$output .="\n";

		if($orders_list != '' && count($orders_list) > 0) {

			$i=1;

		foreach($orders_list as $orders) {

			

		$output .= '"'.$i.'","'.$orders['fname'].'","'.$orders['lname'].'","'.$orders['email'].'","'.$orders['mobile'].'"';  

		$output .="\n";

		$i++; }

		}

		$filename = "users.csv";

		header('Content-type: application/csv');

		header('Content-Disposition: attachment; filename='.$filename);

		echo $output;

		exit;	

		

	}

	

	function download_subscribe()

	{

		$this->load->model('admin');

		$orders_list  = $this->admin->list_subscribe1();

		$output = '';

		$output .= 'Sr No.,Email,Type';

		$output .="\n";

		if($orders_list != '' && count($orders_list) > 0) {

			$i=1;

		foreach($orders_list as $orders) {

			if($orders['flage']==0)

			{

				$flage="Say YAA to Yoga";

			}else

			{

				$flage="YogiTribe";

			}

		$output .= '"'.$i.'","'.$orders['email'].'","'.$flage.'"';  

		$output .="\n";

		$i++; }

		}

		$filename = "subscribe.csv";

		header('Content-type: application/csv');

		header('Content-Disposition: attachment; filename='.$filename);

		echo $output;

		exit;	

		

	}

	function get_file_contents()

	{

		$this->load->model('admin');

		ini_set('max_execution_time',-1);

		ini_set('memory_limit', '512M');

		

		$this->load->library('PHPExcel');

		$pathfile =$this->config->item('document_root').'data.xlsx';

		$PHPExcel = PHPExcel_IOFactory::load($pathfile);	

		

		$objWorksheet = $PHPExcel->getActiveSheet();				

		$highestrow = $objWorksheet->getHighestRow();

		$branch_item_list =array();

		if($highestrow != 0)

		{

				for($i=2;$i<=$highestrow;$i++)

				{

					$obj_insData = array('code.'=> addslashes($PHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()));

					if($obj_insData == '' && count($obj_insData) == '0')

					{

						continue;

					}else

					{

						$branch_item_list[] = $productcode= addslashes($PHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue());

						

						if($response = $this->admin->updateproduct($productcode)){ 

						

						}

					}

				}	

		}

		echo "Successfully";

	}
	
	public function network_hospitals(){
		$this->load->library('Need_lib');
		$data['title']	= 'Home';
		$lib = $this->need_lib->newtwork_hospitals();
    	$data['newtwork_hospitals']= json_decode($lib->result, TRUE);
		$this->load->view('list_network_hospital',$data);
	}

}