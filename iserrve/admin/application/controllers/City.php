<?php
    class City extends CI_Controller 
    {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
        if($this->session->userdata('adminId') == '')
        {
			redirect($this->config->item('base_url'));
        }
		$this->load->model('city_model'); 
		$this->load->model('admin'); 
	}

    function add()
    {
		$L_strErrorMessage='';
		$form_field = $data = array(
			'state_id' => '',
			'name' => '',
			//'page_url' => '',
        );
        
		if($this->input->post('action') == 'add_city') 
		{ 
			foreach($form_field as $key => $value)
			{	
				$data[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	
            }
            $this->load->library('validation');

			$this->city_model->add($data);
			
			$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Create City',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
			$this->session->set_flashdata('L_strErrorMessage','City Added Successfully!!!!');
			redirect($this->config->item('base_url').'city/lists');
			
                if ($this->validation->run() == FALSE)
                {
				$data['L_strErrorMessage'] = $this->validation->error_string;
			    } 
    }
	
	$data['allstate'] = $this->city_model->allstate();
    $this->load->view('add_city',$data);
}

    function edit($id)
	{	 
			if(is_numeric($id))
			{
				$result = $this->city_model->get_city($id);  
			
				$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result[0]->id,
						'state_id'	=> $result[0]->state_id,
						'name' =>  $result[0]->name,
						//page_url' =>  $result[0]->page_url,
						);  

				if($this->input->post('action') == 'edit_city') 
				{
                    foreach($data as $key => $value) 
                    {  
                        $form_field[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	
					}
												
								$ccid=$id;
								$this->city_model->edit($id, $form_field);
								
								$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Edit City',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
								$this->session->set_flashdata('L_strErrorMessage','City Updated Successfully!!!!');
								redirect($this->config->item('base_url').'city/lists');
					}
				$data['allstate'] = $this->city_model->allstate();
				$this->load->view('edit_city',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such City !!!!');
				redirect($this->config->item('base_url').'city/lists');
			}
	}

	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'coupan/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['coupanname'] = $this->admin->xss_clean_inputData($this->input->post('coupanname'));
		$data['startdate'] = $this->admin->xss_clean_inputData($this->input->post('startdate'));
		$data['enddate'] = $this->admin->xss_clean_inputData($this->input->post('enddate'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->city_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
       
	$this->load->view('list_city', $data);
	}

	function deletes()
	{
        if(isset($_POST['selected']) && count($_POST['selected']) > 0) 
        {
            foreach($_POST['selected'] as $selCheck) 
            {
            	$selCheck = $this->admin->xss_clean_inputData($selCheck);
                if($this->city_model->deletes($selCheck)) 
                {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete City',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
					$this->session->set_flashdata('L_strErrorMessage','City Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
						break;
				}
			}
		}
		redirect($this->config->item('base_url').'city/lists');
	}

	function updateorder($id,$val){
		$this->city_model->updateorder($id,$val);
		$this->session->set_flashdata("L_strErrorMessage","Set Order updated succesfully");
		redirect($this->config->item('base_url').'city/lists');
	}

	function xlsuploadcity()
    {

        ini_set('memory_limit', -1);
        if ($this->input->post('action') == 'add_XLS') {


			$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


			if(isset($_FILES['csv']['name']) && in_array($_FILES['csv']['type'], $file_mimes)) {

				$arr_file = explode('.', $_FILES['csv']['name']);
				$extension = end($arr_file);
			
				if('csv' == $extension) {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				}
		
				$spreadsheet = $reader->load($_FILES['csv']['tmp_name']);

				$sheetData = $spreadsheet->getActiveSheet()->toArray();
         
					if (!empty($sheetData)) {
						for ($i=1; $i<count($sheetData); $i++) {

							$data_new['state_id'] = $this->city_model->get_state_id($sheetData[$i][0]);
                			$data_new['name'] = $sheetData[$i][1];

							
							$check_name = $this->city_model->check_name($data_new['name']);
                        //echo "<pre>";print_r($check_name);echo"</pre>";

							if($check_name == 1){
								$goods_id = $this->city_model->update_name($data_new);
							}
							else{

								$goods_id = $this->city_model->addcity($data_new);
							}
							
							$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Upload City Excel',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);

						}
					}

			}

            $this->session->set_flashdata('L_strErrorMessage', 'Your Data File Uploaded Successfully.!!');
            redirect($this->config->item('base_url') . 'city/lists');
        }
        $data = array();
        $this->load->view('add_xlscity', $data);
    }
}

?>