<?php
	class Access_risk extends CI_Controller {
	private $_data = array();
	function __construct()
	{	

		parent::__construct();

		// if($this->session->userdata('adminId') == ''){

		// 	redirect($this->config->item('base_url'));
        // }
		$this->load->model('access_risk_model');
		//echo "test";exit;
	}


	function lists()
	{	
		ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
		// echo "tesst";exit;
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'access_risk/lists/';
		$config['per_page'] = '1000000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->input->post('categoryname');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->access_risk_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_access_risk', $data);
	}

	function edit($id)
	{	 	
			if(is_numeric($id))
			{
				$result = $this->access_risk_model->get_user_data($id);  

					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'fname' =>  $result->fname,
						'email' =>  $result->email,
						'mobile' =>  $result->mobile,
						'added_date' =>  $result->added_date,
						);
				if($this->input->post('action') == 'edit_access_risk') 
				{
					foreach($data as $key => $value) {  $form_field[$key]=$this->input->post($key);	}
					$this->load->library('validation');
					$rules['email'] = "trim|required";
  					$this->validation->set_rules($rules);
					$fields['email']   = "position name";
					$this->validation->set_fields($fields);
					if ($this->validation->run() == FALSE) 
					{
							$data = $form_field;
							$data['L_strErrorMessage'] = $this->validation->error_string;
							$data['email'] = $id;
					} 
					else 
					{
							$this->access_risk_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Access your Risk Data Updated Successfully');
							redirect($this->config->item('base_url').'access_risk/lists');
					}
				}
				$this->load->view('edit_access_risk',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Assess Your Risk !!!!');
				redirect($this->config->item('base_url').'access_risk/lists');
			}
	}

	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {

			foreach($_POST['selected'] as $selCheck) {

				if($this->access_risk_model->deletes($selCheck)) {

					$this->session->set_flashdata('L_strErrorMessage','Access your Risk Data Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'access_risk/lists');
	}



	function userstatus($redirect,$id,$value)	{

			$result=$this->access_risk_model->updatestatus($id,$value);
			$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
			if($redirect==1)
			{
				redirect($this->config->item('base_url').'access_risk/buyer_lists');	
			}else
			{
				redirect($this->config->item('base_url').'access_risk/vendor_lists');
			}
	}

	function download_access_risk(){
		
		$orders_list = $this->access_risk_model->all_access_risk();
		//$orders_list = $return['result'];
		// echo "<pre>"; print_r($orders_list); echo "</pre>";exit;
		//exit;
		$output = 'Name,E-mail,Mobile Number,Added Date';
		$output .="\n";

		if($orders_list != '' && count($orders_list) > 0) {
			$i=1;
		foreach ($orders_list as $key => $orders) {

		$output .= '"'.$orders->fname.'","'.$orders->email.'","'.$orders->mobile.'","'.$orders->added_date.'"';  
		$output .="\n";
		$i++; }
		}

		$filename = "User.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);
		echo $output;
		exit;	
	}
}

?>