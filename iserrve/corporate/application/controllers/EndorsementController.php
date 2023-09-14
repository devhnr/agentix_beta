<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'/libraries/PHPExcel.php';
class EndorsementController extends CI_Controller {
    function __construct(){
          parent::__construct();
  				if(!$this->session->userdata("loginHR")){
  						$redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('Endorsement_Model','em');
    }

    public function index(){
  			$data=array('file'=>'cd-report');
        $data['cd_number'] = $this->em->get_cd_numbers_by_corporate();
  	    $this->template->full_corporate_html_view($data);
  	}

    public function showCDEntries() {
        $result = array('data' => array());
        $cd_no = $this->input->post('cd_no');
        $data = $this->em->get_deposite_entry($cd_no);
            $total = 0;
			
			 if($data != ''){
            foreach ($data as $key => $value) {
                $total +=$value['amount'];
                $document = '';
                if(!empty($value['upload_file'])){
                  $document  = '<a href="'.str_replace('corporate/', '', base_url()).'upload/endor_trans/'.$value['upload_file'].'" target="_blank" class="btn btn-sm editRecord bg-purple" style="color:white;" >Download</a>';
                }
                $result['data'][$key] = array(
                        $key+1,
                        $value['particular'],
                        
                        $value['cd_number'],
                        $value['bank_name'],
  											$value['cheque_utr_no'],
                        number_format($value['amount']),
                        $document,
  											$value['created_date'],
                        $value['product_type'],
                        $value['policy_no'],
                );
            }
			 }
        $result['total'] = $total;

        $dat = $this->em->get_premium_entry($cd_no);
            $total_1 = 0;
            $total_2 = 0;
			
			if($dat != ''){
            foreach ($dat as $key => $value) {
                if($value['transaction_type'] == 'debit'){
                    $debit = $value['gross_premium_policy'];
                    $total_1 +=$value['gross_premium_policy'];
                }else{
                    $debit = 0;
                }

                if($value['transaction_type'] == 'credit'){
                    $credit = $value['gross_premium_policy'];
                    $total_2 +=$value['gross_premium_policy'];
                }else{
                    $credit = 0;
                }

                $document1 = '';
                if(!empty($value['upload_file'])){
                  $document1  = '<a href="'.str_replace('corporate/', '', base_url()).'upload/endor_trans/'.$value['upload_file'].'" target="_blank" class="btn btn-sm editRecord bg-purple" style="color:white;" >Download</a>';
                }

                $result['dat'][$key] = array(
                        $key+1,
                        $value['particular'],
                        $value['product_type'],
                        $value['policy_no'],
                        $value['endorsement_no_policy'],
                        number_format($value['employee_count_policy']),
                        number_format($value['dependent_count_policy']),
                        number_format($debit),
                        number_format($credit),
                        $document1,
                        $value['created_date'],
                );
            }
			}
        $pro_balance = $this->em->endersoment_net_premium_with_gst_total();

        $result['total_1'] = $total_1;
        $result['total_2'] = $total_2;
        $result['balance_amt'] = $total - $total_1 + $total_2;
        $result['pro_balance_amt'] = ($total - $total_1 + $total_2) - $pro_balance;

        echo json_encode($result);
  	}

    public function endorsement_list($value=''){
        $data=array('file'=>'endorsement_calculation');
        $data['calculation'] = $this->em->corporate_endersoment_calculation();
		
        $this->template->full_corporate_html_view($data);
    }

    public function download_endorsement_excel_file(){
  			$filename = 'endorsement_excel_'.date('d-m-Y').'.xls';
        $cd_no = $this->input->post('cd_no');
        $deposite = $this->em->get_deposite_entry($cd_no);

  			$this->load->library('PHPExcel');
  			$objePHPExecel = new PHPExcel();
  			$objePHPExecel->setActiveSheetIndex(0);
  			$objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Corporate:');
  			$objePHPExecel->getActiveSheet()->SetCellValue('B2', 'CD Account No:');
  			$objePHPExecel->getActiveSheet()->SetCellValue('B6', 'Premium Amount Received');
  			$objePHPExecel->getActiveSheet()->SetCellValue('B7', 'Sr No');
  			$objePHPExecel->getActiveSheet()->SetCellValue('C7', 'Date');
  			$objePHPExecel->getActiveSheet()->SetCellValue('D7', 'Particular');
  			$objePHPExecel->getActiveSheet()->SetCellValue('E7', 'Bank Name');
  			$objePHPExecel->getActiveSheet()->SetCellValue('F7', 'Cheque-UTR No');
  			$objePHPExecel->getActiveSheet()->SetCellValue('G7', 'Amount(INR)');

				$objePHPExecel->getActiveSheet()->SetCellValue('C1', $this->session->userdata('corporate_name'));
				$objePHPExecel->getActiveSheet()->SetCellValue('C2', $this->input->post('cd_text'));
        $rows = 8;
  			$i=1;
        $total = 0;
  			foreach ($deposite as $val){
            $total +=$val['amount'];
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $rows, $i);
  					$objePHPExecel->getActiveSheet()->SetCellValue('C' . $rows, $val['print_date']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('D' . $rows, $val['particular']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('E' . $rows, $val['bank_name']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('F' . $rows, $val['cheque_utr_no']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('G' . $rows, $val['amount']);
  					$rows++;
  					$i++;
  			}

        $total_row = $objePHPExecel->getActiveSheet()->getHighestRow()+1;
        $total_row2 = $objePHPExecel->getActiveSheet()->getHighestRow()+6;
        $title = $total_row2 - 1;
        $objePHPExecel->getActiveSheet()->SetCellValue('B'.$total_row.'', 'Total');
        $objePHPExecel->getActiveSheet()->SetCellValue('G'.$total_row.'', number_format($total, 2));

        $objePHPExecel->getActiveSheet()->SetCellValue('B'.$title.'', 'Premium Adjustment Statement');
        $objePHPExecel->getActiveSheet()->SetCellValue('B'.$total_row2.'', 'Sr No');
  			$objePHPExecel->getActiveSheet()->SetCellValue('C'.$total_row2.'', 'Date');
  			$objePHPExecel->getActiveSheet()->SetCellValue('D'.$total_row2.'', 'Particular');
  			$objePHPExecel->getActiveSheet()->SetCellValue('E'.$total_row2.'', 'Employee Count');
  			$objePHPExecel->getActiveSheet()->SetCellValue('F'.$total_row2.'', 'Deposit Count');
  			$objePHPExecel->getActiveSheet()->SetCellValue('G'.$total_row2.'', 'Policy OR Endorsement Number');
  			$objePHPExecel->getActiveSheet()->SetCellValue('H'.$total_row2.'', 'Debit (Incl GST)');
  			$objePHPExecel->getActiveSheet()->SetCellValue('I'.$total_row2.'', 'Credit (Incl GST)');
  			$objePHPExecel->getActiveSheet()->SetCellValue('J'.$total_row2.'', 'Policy Type');


        $rows2 = $total_row2+1;
  			$j=1;
        $primium = $this->em->get_premium_entry($cd_no);
        $total_1 = 0;
        $total_2 = 0;
  			foreach ($primium as $val){
            if($val['transaction_type'] == 'debit'){
                $debit = $val['gross_premium_policy'];
                $total_1 +=$val['gross_premium_policy'];
            }else{
                $debit = 0;
            }

            if($val['transaction_type'] == 'credit'){
                $credit = $val['gross_premium_policy'];
                $total_2 +=$val['gross_premium_policy'];
            }else{
                $credit = 0;
            }

            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $rows2, $j);
  					$objePHPExecel->getActiveSheet()->SetCellValue('C' . $rows2, $val['created_date']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('D' . $rows2, $val['particular']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('E' . $rows2, $val['employee_count_policy']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('F' . $rows2, $val['dependent_count_policy']);
  					$objePHPExecel->getActiveSheet()->SetCellValue('G' . $rows2, $val['policy_no']);
            $objePHPExecel->getActiveSheet()->SetCellValue('H' . $rows2, $debit);
      			$objePHPExecel->getActiveSheet()->SetCellValue('I' . $rows2, $credit);
      			$objePHPExecel->getActiveSheet()->SetCellValue('J' . $rows2, $val['product_type']);
  					$rows2++;
  					$j++;
  			}

        $high_row = $objePHPExecel->getActiveSheet()->getHighestRow()+1;
        $high_row1 = $high_row+1;
        $objePHPExecel->getActiveSheet()->SetCellValue('B'.$high_row.'', 'Total');
        $objePHPExecel->getActiveSheet()->SetCellValue('B'.$high_row1.'', 'Float Balance as on date');
        $objePHPExecel->getActiveSheet()->SetCellValue('H'.$high_row.'', number_format($total_1, 2));
        $objePHPExecel->getActiveSheet()->SetCellValue('H'.$high_row1.'', number_format($total_2, 2));

        $total_4 = $total - $total_1 + $total_2;

        $objePHPExecel->getActiveSheet()->SetCellValue('H'.$high_row1.'', number_format($total_4, 2));
        //
        $objePHPExecel->getActiveSheet()->getStyle("B1:B2")->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle("B6:G7")->getFont()->setBold(true);
  			$objePHPExecel->getActiveSheet()->getStyle("B".$title.":J".$total_row2."")->getFont()->setBold(true);
  			for ($s=65; $s<=90; $s++) {
  					$objePHPExecel->getActiveSheet()->getColumnDimension(chr($s))->setAutoSize(true);
  			}

        $objePHPExecel->getActiveSheet()->getStyle("B1:C2")->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'00E1FF')));
        $objePHPExecel->getActiveSheet()->getStyle("B6:G7")->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'63FFAD')));
        $objePHPExecel->getActiveSheet()->getStyle("B".$total_row.":G".$total_row."")->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'FFD800')));

        $objePHPExecel->getActiveSheet()->getStyle("B".$title.":J".$total_row2."")->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'63FFAD')));
        $objePHPExecel->getActiveSheet()->getStyle("B".$high_row.":I".$high_row1."")->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'FFD800')));


        $writer = PHPExcel_IOFactory::createWriter($objePHPExecel,'Excel2007');
  			header('Content-Type: application/vnd.ms-excel');
  			header('Content-Disposition: attachment;filename="'.$filename.'"');
  			header('Cache-control: max-age=0');
  			// ob_end_clean();
        ob_start();
  			$writer->save('php://output');
        $xlsData = ob_get_contents();
        ob_end_clean();
        $response =  array(
            'op' => 'ok',
            'filename'=> $filename,
            'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
        );

        die(json_encode($response));

  	}

    public function download_calculation_excel_file(){
        $id= explode('_',$_POST['id']);
        $ec_id = base64_decode($id[0]);

        $operation = $id[1];
        $filename = 'export_'.$operation.'_'.date('d-m-Y').'.xls';
        $gt_data = $this->em->get_endorsement_calculation_table_data($ec_id);
        $get_rack_rate = $this->em->get_rack_rate_id($gt_data['policy_no'],$gt_data['endorsement_type']);

        $excel_data = $this->em->export_operation_xl_file_data($ec_id,$operation,$gt_data['endorsement_type']);

        if(empty($excel_data)){
            echo json_encode('not_exist');
        }else{
            $this->load->library('PHPExcel');
            $objePHPExecel = new PHPExcel();
            $objePHPExecel->setActiveSheetIndex(0);
            $objePHPExecel->getActiveSheet()->SetCellValue('A1', 'Sr. No');
            $objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Employee ID');
            $objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Employee Name');
            $objePHPExecel->getActiveSheet()->SetCellValue('D1', 'Relation');
            if($operation == 'addition'){
              $objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Date of Joining');
            }else{
              $objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Date of Leaving');
            }

            $objePHPExecel->getActiveSheet()->SetCellValue('F1', 'Date of Birth');
            $objePHPExecel->getActiveSheet()->SetCellValue('G1', 'Gender');
            $objePHPExecel->getActiveSheet()->SetCellValue('H1', 'Age');
            $objePHPExecel->getActiveSheet()->SetCellValue('I1', 'Sum Insured');
            $objePHPExecel->getActiveSheet()->SetCellValue('J1', 'Age Group');
            $objePHPExecel->getActiveSheet()->SetCellValue('K1', 'Days');
            $objePHPExecel->getActiveSheet()->SetCellValue('L1', 'Net Premium');
            $objePHPExecel->getActiveSheet()->SetCellValue('M1', 'Gst');
            $objePHPExecel->getActiveSheet()->SetCellValue('N1', 'Gross Premium');

            $rows = 2;
            $i=1;
            $total_net_premium = 0;
            $total_gst_value = 0;
            $total_gross_premium = 0;


            foreach ($excel_data as $val){
                $later = new DateTime(date("d-m-Y", strtotime($val['endo_date'])));
                $earlier = new DateTime(date("d-m-Y", strtotime($gt_data['policy_end_date'])));

                $day_diff = $later->diff($earlier)->format("%a");
                if($operation == 'addition'){
                  $day_diff = $day_diff + 1;  //for addition
                }else{
                  $day_diff = $day_diff;  //for deletion
                }
                $age_array = explode("-",$val['age_group']);

                $get_rack_rate_attribute = $this->em->get_rack_rate_attribute($get_rack_rate['id'],$age_array);

                $premium_per_day = $get_rack_rate_attribute / 365;
                $addition_premium =$premium_per_day * $day_diff;
                $net_premium = $addition_premium;
                $gross_premium = $addition_premium * 1.18;
                $gst_value = $gross_premium - $net_premium;

                $objePHPExecel->getActiveSheet()->SetCellValue('A' . $rows, $i);
                $objePHPExecel->getActiveSheet()->SetCellValue('B' . $rows, $val['employe_id']);
                $objePHPExecel->getActiveSheet()->SetCellValue('C' . $rows, $val['employe_name']);
                $objePHPExecel->getActiveSheet()->SetCellValue('D' . $rows, $val['relationship']);
                $objePHPExecel->getActiveSheet()->SetCellValue('E' . $rows, $val['endo_date']);
                $objePHPExecel->getActiveSheet()->SetCellValue('F' . $rows, $val['dob']);
                $objePHPExecel->getActiveSheet()->SetCellValue('G' . $rows, $val['gender']);
                $objePHPExecel->getActiveSheet()->SetCellValue('H' . $rows, $val['age']);
                $objePHPExecel->getActiveSheet()->SetCellValue('I' . $rows, $val['sum_insured']);
                $objePHPExecel->getActiveSheet()->SetCellValue('J' . $rows, $val['age_group']);
                $objePHPExecel->getActiveSheet()->SetCellValue('K' . $rows, $day_diff);
                $objePHPExecel->getActiveSheet()->setCellValue('L' . $rows, $net_premium);
                $objePHPExecel->getActiveSheet()->setCellValue('M' . $rows, $gst_value);
                $objePHPExecel->getActiveSheet()->setCellValue('N' . $rows, $gross_premium);

                $total_net_premium += $net_premium;
                $total_gst_value += $gst_value;
                $total_gross_premium += $gross_premium;

                $rows++;
                $i++;
            }

            $high_row = $objePHPExecel->getActiveSheet()->getHighestRow()+1;
            $objePHPExecel->getActiveSheet()->SetCellValue('K'.$high_row.'', 'Total');

            $objePHPExecel->getActiveSheet()->setCellValue('L'.$high_row.'', $total_net_premium);
            $objePHPExecel->getActiveSheet()->setCellValue('M'.$high_row.'', $total_gst_value);
            $objePHPExecel->getActiveSheet()->setCellValue('N'.$high_row.'', $total_gross_premium);

            $objePHPExecel->getActiveSheet()->getStyle("A1:N1")->getFont()->setBold(true);
            $objePHPExecel->getActiveSheet()->getStyle("K".$high_row."")->getFont()->setBold(true);
            for ($s=65; $s<=90; $s++) {
                $objePHPExecel->getActiveSheet()->getColumnDimension(chr($s))->setAutoSize(true);
            }

            $writer = PHPExcel_IOFactory::createWriter($objePHPExecel,'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-control: max-age=0');
            ob_start();
            $writer->save('php://output');
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

    public function rackRateCalculation(){
        $data=array('file'=>'rack-rate-calculation');
        $calculation_id = base64_decode($_GET['ecd']);
        $data['calculation_data'] = $this->em->get_calculation_table_data($calculation_id);
    		$data['addition_attribute'] = $this->em->get_endorsement_calculation_operation_attribute($calculation_id,'addition');
    		$data['deletion_attribute'] = $this->em->get_endorsement_calculation_operation_attribute($calculation_id,'deletion');
        $this->template->full_corporate_html_view($data);
    }

}
