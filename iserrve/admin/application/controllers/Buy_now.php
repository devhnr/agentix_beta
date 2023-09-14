<?php

	if (!defined('BASEPATH')) exit('No direct script access allowed');
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	class Buy_now extends CI_Controller {
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('adminId') == ''){

			redirect($this->config->item('base_url'));
        }
		$this->load->model('buy_now_model');
		$this->load->model('admin');
	}


	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');

		$config['base_url'] = $url_to_paging.'buy_now/lists/';
		$config['per_page'] = '1000000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['categoryname'] = $this->admin->xss_clean_inputData($this->input->post('categoryname'));
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->buy_now_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_buy_now', $data);
	}

	function edit($id)
	{	 	
			if(is_numeric($id))
			{
				$result = $this->buy_now_model->get_user_data($id);  

					$form_field = $data = array(
						'L_strErrorMessage' => '',
						'id'	=> $result->id,
						'fname' =>  $result->fname,
						'email' =>  $result->email,
						'mobile' =>  $result->mobile,
						'added_date' =>  $result->added_date,
						);
				if($this->input->post('action') == 'edit_buy_now') 
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
							$this->buy_now_model->edit($id, $form_field);
							$this->session->set_flashdata('L_strErrorMessage','Buy Now Updated Successfully');
							redirect($this->config->item('base_url').'buy_now/lists');
					}
				}
				$this->load->view('edit_buy_now',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Assess Your Risk !!!!');
				redirect($this->config->item('base_url').'buy_now/lists');
			}
	}

	function deletes()
	{
		if(isset($_POST['selected']) && count($_POST['selected']) > 0) {

			foreach($_POST['selected'] as $selCheck) {

				$selCheck = $this->admin->xss_clean_inputData($selCheck);

				if($this->buy_now_model->deletes($selCheck)) {
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Buy Now',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);

					$this->session->set_flashdata('L_strErrorMessage','Buy Now Deleted Successfully!!!!');
				}  
				else 
				{
						$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
			}
		}
		redirect($this->config->item('base_url').'buy_now/lists');
	}



	function userstatus($redirect,$id,$value)	{

			$result=$this->buy_now_model->updatestatus($id,$value);
			$this->session->set_flashdata('L_strErrorMessage','Status Updated Succcessfully!!!!');
			if($redirect==1)
			{
				redirect($this->config->item('base_url').'buy_now/buyer_lists');	
			}else
			{
				redirect($this->config->item('base_url').'buy_now/vendor_lists');
			}
	}

	function download_buy_now(){
		
		$orders_list = $this->buy_now_model->all_buy_now();
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
		$quateData = $this->buy_now_model->get_buy_now_list();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Sr. No');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Company Name');
        $sheet->setCellValue('D1', 'Eamil Id');
		$sheet->setCellValue('E1', 'Mobile No');
		$sheet->setCellValue('F1', 'Location');
		$sheet->setCellValue('G1', 'Date');
        $rows = 2;
				$i=1;

        foreach ($quateData as $val){
            $sheet->setCellValue('A' . $rows, $i);
            $sheet->setCellValue('B' . $rows, $val['name']);
            $sheet->setCellValue('C' . $rows, $val['company']);
            $sheet->setCellValue('D' . $rows, $val['email']);
	    	$sheet->setCellValue('E' . $rows, $val['phone_number']);
	    	$sheet->setCellValue('F' . $rows, $val['location']);
			$sheet->setCellValue('G' . $rows, $val['created_at']);
            $rows++;
						$i++;
        }

				$sheet->getStyle("A1:G1")->getFont()->setBold( true );
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

			// 	header('Content-Type: application/vnd.ms-excel');
			//   header('Content-Disposition: attachment;filename="GetBuyNow.xls"');
			//   $writer->save('php://output');

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="GetBuyNow.xls"'); 
			header('Cache-Control: max-age=0');
			
			//$writer->save('php://output'); // download file 
			
			ob_end_clean();
			$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			exit();
    }
}

?>