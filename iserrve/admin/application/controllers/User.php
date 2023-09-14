<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	class User extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){

			redirect($this->config->item('base_url'));
        }
		$this->load->model('user_model');
		$this->load->model('admin');
	}


	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');

		$config['base_url'] = $url_to_paging.'user/lists/';
		$config['per_page'] = '1000000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->admin->xss_clean_inputData($this->input->post('categoryname'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->user_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_user', $data);
	}

	function edit($id)
	{	 	
			if(is_numeric($id))
			{
				$result = $this->user_model->get_user_data($id);  

					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'fname' =>  $result->fname,
						'email' =>  $result->email,
						'mobile' =>  $result->mobile,
						'added_date' =>  $result->added_date,
						);
				if($this->input->post('action') == 'edit_user') 
				{
					foreach($data as $key => $value) {  $form_field[$key]= $this->admin->xss_clean_inputData($this->input->post($key));	}
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
							$this->user_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','User Updated Successfully');
							redirect($this->config->item('base_url').'user/lists');
					}
				}
				$this->load->view('edit_user',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Assess Your Risk !!!!');
				redirect($this->config->item('base_url').'user/lists');
			}
	}

	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {

			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				if($this->user_model->deletes($selCheck)) {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Get Quote Listing',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);

					$this->session->set_flashdata('L_strErrorMessage','Get Quote Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'user/lists');
	}



	function userstatus($redirect,$id,$value)	{

			$result=$this->user_model->updatestatus($id,$value);
			$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
			if($redirect==1)
			{
				redirect($this->config->item('base_url').'user/buyer_lists');	
			}else
			{
				redirect($this->config->item('base_url').'user/vendor_lists');
			}
	}

	function download_user(){
		
		$orders_list = $this->user_model->all_user();
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


	public function createExcel() {

// 		ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
				$quateData = $this->user_model->get_user_data_list_new();
				//   echo "<pre>";print_r($quateData);echo "</pre>";exit;
		
		
				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();
				$sheet->setCellValue('A1', 'Sr. No');
				$sheet->setCellValue('B1', 'Product Name');
				$sheet->setCellValue('C1', 'Name');
				$sheet->setCellValue('D1', 'Eamil Id');
				$sheet->setCellValue('E1', 'Mobile No');
				$sheet->setCellValue('F1', 'Company Name');
				$sheet->setCellValue('G1', 'Location');
				$sheet->setCellValue('H1', 'No Of Employee');
				$sheet->setCellValue('I1', 'Coverage For');
				$sheet->setCellValue('J1', 'Sum Insurer');
				$sheet->setCellValue('K1', 'Average Age of Employees');
				$sheet->setCellValue('L1', 'Date And Time');
				$sheet->setCellValue('M1', 'Customize Plan');
				$sheet->setCellValue('N1', 'Platform');
		
				$rows = 2;
				$i=1;
		
				foreach ($quateData as $val){
					// echo "<pre>";print_r($val->product_id);echo "</pre>";exit;
		
					if($val->product_id == 1){
						$product_name = "Iserrve";
					}else{
						$product_name = "";
					}
		
					if($val->radio_group == 1){
						$radio_name = "Employee Only";
					}elseif($val->radio_group == 2){
						$radio_name = "Employee, Spouse & Children";
					}elseif($val->radio_group == 3){
						$radio_name = "Employee, Spouse, Children & Parents";
					}else{
						$radio_name = "";
					}
		
		
					if($val->customize_plan == 0){
						$customize = "No";
					}else{
						$customize = "Yes";
					}
		
					$sheet->setCellValue('A' . $rows, $i);
					$sheet->setCellValue('B' . $rows, $product_name);
					$sheet->setCellValue('C' . $rows, $val->name);
					$sheet->setCellValue('D' . $rows, $val->email);
					$sheet->setCellValue('E' . $rows, $val->mobile_number);
					$sheet->setCellValue('F' . $rows, $val->company);
					$sheet->setCellValue('G' . $rows, $val->location);
					$sheet->setCellValue('H' . $rows, $val->no_emp);
					$sheet->setCellValue('I' . $rows, $radio_name);
					$sheet->setCellValue('J' . $rows, $val->sum_insurance);
					$sheet->setCellValue('K' . $rows, $val->age_emp);
					$sheet->setCellValue('L' . $rows, $val->added_date);
					$sheet->setCellValue('M' . $rows, $customize);
					$sheet->setCellValue('N' . $rows, $val->platform);
		
					$rows++;
					$i++;
				}
		
						$sheet->getStyle("A1:N1")->getFont()->setBold( true );
						// $styleArray = array(
					  //   'borders' => array(
					  //       'outline' => array(
					  //           'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					  //           'color' => array('argb' => '000000'),
					  //       ),
					  //   ),
					  // );
						//
						// $sheet->getStyle('A1:G1')->applyFromArray($styleArray);
						for ($s=65; $s<=90; $s++) {
							$sheet->getColumnDimension(chr($s))->setAutoSize(true);
						}
		
				$writer = new Xlsx($spreadsheet);
						// $writer->save("upload/".$fileName);
					//     redirect(base_url()."/upload/".$fileName);
		
						header('Content-Type: application/vnd.ms-excel');
					  header('Content-Disposition: attachment;filename="GetBuyNow.xlsx"');
					  $writer->save('php://output');
			}
}

?>