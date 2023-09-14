<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashless_hospital extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('admin');
        $this->load->model('Cashless_Hospital_Model','ch');
        if($this->session->userdata('adminId') == ''){
    		    redirect($this->config->item('base_url'));
        }
    }

    public function lists(){
        $data['cashless_hospital']= $this->ch->get_cashless_hospital_list();
        $this->load->view('list_cashless_hospital',$data);
    }

    public function add(){

        // echo "<pre>";print_r($data);echo "</pre>";exit;
        $this->load->view('upload_cashless_hospital',$data);
    }

    public function add_file(){
  		  $form_field = $data = array();

  		  if($this->input->post('action') == 'add_XLS'){
    				if($_FILES['csv']['name'] != ''){

              $insurer = $this->admin->xss_clean_inputData($_POST['insurer']);
              $tpa = $this->admin->xss_clean_inputData($_POST['tpa']);



              $check = $this->ch->check_exist_cashless_hospital($insurer,$tpa);

              //echo "<pre>";print_r($check);echo"</pre>";exit;
              if($check == 0){
                  $this->upload_atribute_xl($_FILES['csv'],$insurer,$tpa);
              }else{
                  $delete = $this->ch->delete_exist_cashless_hospital($insurer,$tpa);
                  if($delete == true){
                      $this->upload_atribute_xl($_FILES['csv'],$insurer,$tpa);
                  }
              }

    				}else{
    					$this->session->set_flashdata('L_strErrorMessage','Something went wrong');
    				  redirect($this->config->item('base_url').'cashless_hospital/lists');
    				}
    		}
  	}


    function upload_atribute_xl($csv,$insurer,$tpa){

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
                            $data['insurer'] = $insurer;
                            $data['tpa'] = $tpa;
							$data['hospital_name'] = $sheetData[$i][0];
							$data['hospital_address'] = $sheetData[$i][1];
							$data['location'] = $sheetData[$i][2];
							$data['landmark'] = $sheetData[$i][3];
							$data['city'] = $sheetData[$i][4];
							$data['state'] = $sheetData[$i][5];
                            $data['pincode'] = $sheetData[$i][6];
                            $data['email'] = $sheetData[$i][7];
                            $data['contact_no'] = $sheetData[$i][8];
                            // $data['insurence_company'] = $sheetData[$i][9];
                            $data['created_at'] = date('Y-m-d H:i:s');

                            // echo "<pre>";print_r($data);echo "</pre>";exit;

                            $this->ch->add($data);

                            $log_data = array(
                                'username' => $this->session->userdata('username'),
                                'login_user_id' => $this->session->userdata('adminId'),
                                'module_name' => 'Upload Cashless Hospital',
                                'corporate_name' => '',
                                'policy_number' => '',
                                'created_at' => date('Y-m-d h:i:sa')
                            );
                            

                            $this->admin->log_data_manage($log_data);		

					}

                    $this->session->set_flashdata('L_strErrorMessage', 'Upload Cashless Hospital Successfully');
                    redirect($this->config->item('base_url') . 'cashless_hospital/lists/');

				}

			}

			
        }

  	}


}
