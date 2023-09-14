<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registered_emp extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Reg_model');
        if($this->session->userdata('adminId') == ''){
    		    redirect($this->config->item('base_url'));
        }
		$this->load->model('admin');
    }

    public function list(){
        $data['emp']= $this->Reg_model->get_registered_emp_list();
        $this->load->view('list_registered_emp',$data);
    }

    public function delete(){
        if($this->input->post('checkbox_value')){
             $id = $this->input->post('checkbox_value');
             for($count = 0; $count < count($id); $count++)
             {
				 
				 $log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Delete Registered Employees',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);
              $this->Reg_model->delete_emp($id[$count]);
             }
             $this->session->set_flashdata('L_strErrorMessage','Registered Employees Deleted Successfully');

        }
    }
    
    public function download(){
        require_once APPPATH.'/libraries/PHPExcel.php';
		$filename = 'reg_employee_excel_list'.date('d-m-Y').'.xls';
		$empData = $this->Reg_model->get_registered_emp_list();
		$objePHPExecel = new PHPExcel();
		$objePHPExecel->setActiveSheetIndex(0);
		$objePHPExecel->getActiveSheet()->SetCellValue('A1', 'Sr. No');
		$objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Employee Name');
		$objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Email');
		$objePHPExecel->getActiveSheet()->SetCellValue('D1', 'Mobile No');
		$objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Employee ID');
		$objePHPExecel->getActiveSheet()->SetCellValue('F1', 'Group Code');
		$objePHPExecel->getActiveSheet()->SetCellValue('G1', 'Date');
		$rows = 2;
		$i=1;

		foreach ($empData as $val){
				$employee_id = $val['emp_id'];
                $created_dt = date('d-m-Y', strtotime($val['created_at']));
				$objePHPExecel->getActiveSheet()->SetCellValue('A' . $rows, $i);
				$objePHPExecel->getActiveSheet()->SetCellValue('B' . $rows, $val['name']);
				$objePHPExecel->getActiveSheet()->SetCellValue('C' . $rows, $val['email']);
				$objePHPExecel->getActiveSheet()->SetCellValue('D' . $rows, $val['mobile']);
                $objePHPExecel->getActiveSheet()->SetCellValue('E' . $rows, $employee_id);
				$objePHPExecel->getActiveSheet()->SetCellValue('F' . $rows, $val['group_code']);
				$objePHPExecel->getActiveSheet()->SetCellValue('G' . $rows, $created_dt);
				$rows++;
				$i++;
		}

		$objePHPExecel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
		for ($s=65; $s<=90; $s++) {
				$objePHPExecel->getActiveSheet()->getColumnDimension(chr($s))->setAutoSize(true);
		}

		$writer = PHPExcel_IOFactory::createWriter($objePHPExecel,'Excel2007');
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-control: max-age=0');
		// ob_end_clean();
		// $writer->save('php://output');

		ob_start();
		$writer->save("php://output");
		$xlsData = ob_get_contents();
		ob_end_clean();

		$response =  array(
        'op' => 'ok',
				'filename'=> $filename,
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
    );

		die(json_encode($response));
	}

}
