<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecards extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('E_Card_Model','ec');
        $this->load->model('policy_model','pm');
        $this->load->model('admin');
        if($this->session->userdata('adminId') == ''){
    		    redirect($this->config->item('base_url'));
        }

        ini_set('max_execution_time', 0);
    }


    public function add(){
        //
        $data['error'] = '';

        if($this->input->post('action') == 'add_ecard_api') 
		{ 
            

            $corporate_id  = $_POST['corporate_id'];
            $policy_id  = $_POST['policy_id'];

            // echo "<pre>";print_r($_POST);echo"</pre>";exit;

            $policy_data = $this->ec->single_policy_data($policy_id);

            if($policy_data->tpa == 'Health India Insurance TPA Services Private Limited'){
                
                $this->load->library("Need_lib");
                $all_emp_list = $this->ec->get_all_employees($policy_id,$corporate_id);

                //echo "<pre>";print_r($all_emp_list);echo"</pre>";exit;

                foreach($all_emp_list as $emp_data){
                    //
                    $check_ecard_exit = $this->ec->check_e_card_exit($corporate_id,$policy_id,$emp_data['employee_id']);

                    $policyNo = $this->ec->get_policy_no($policy_id);

                    $lib2 = $this->need_lib->downloaded_Ecard($policyNo,$emp_data['employee_id']);

                   // echo "<pre>";print_r($lib2->result);echo"</pre>";

                    $data_in['corporate_id'] = $corporate_id;
                    $data_in['policy_id'] = $policy_id;
                    $data_in['employee_id'] = $emp_data['employee_id'];
                    $data_in['pdf_file'] = trim($lib2->result,'"');
                    $data_in['is_upload_from'] = 1;

                    if($check_ecard_exit == 0 && $lib2->status == true){
                        $this->ec->add_ecard_api($data_in);
                    }elseif($lib2->status == true){
                        $this->ec->update_ecard_api($data_in);
                    }
					
					$log_data = array(
									'username' => $this->session->userdata('username'),
									'login_user_id' => $this->session->userdata('adminId'),
									'module_name' => 'Create E-Card Api',
									'corporate_name' => '',
									'policy_number' => '',
									'created_at' => date('Y-m-d h:i:sa')
								);

								$this->admin->log_data_manage($log_data);

                }
                //echo "health";exit;
                $this->session->set_flashdata('L_strErrorMessage','E-Card Api Uploaded Successfully');
                redirect($this->config->item('base_url').'ecards/list');

                
            }else{
                $this->session->set_flashdata('flashError','This Policy Not Come From Api');
                redirect($this->config->item('base_url').'ecards/list');
            }

            

            //echo "sd";exit;
        }
        $data['allcorporate']= $this->pm->allcorporate();
		$data['allproduct_name'] = $this->ec->allproduct_name();
        $this->load->view('add_ecard_api',$data);
    }

    public function list(){
        $data['e_cards']= $this->ec->get_e_card_list();
        $this->load->view('list_e_card',$data);
    }

    public function e_card_upload(){
        $data['allcorporate']= $this->pm->allcorporate();
        $this->load->view('e_card_upload_view',$data);
    }

    public function get_policy_details(){
        $id = $this->input->post('id',TRUE);
        //$data = $this->ec->get_policy($id)->result();
		
		$data = $this->ec->get_policy_new($id);
		//echo "<pre>";print_r($data);echo "</pre>";exit;
        echo json_encode($data);
    }

    public function multiple_upload(){

        $this->load->library('upload');
        $pdf_array= array();

        $file_count = count($_FILES['pdf_file']['name']);
          for ($i=0; $i < $file_count; $i++) {
              $_FILES['file']['name'] = $_FILES['pdf_file']['name'][$i];
              $_FILES['file']['type'] = $_FILES['pdf_file']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['pdf_file']['tmp_name'][$i];
              $_FILES['file']['error'] = $_FILES['pdf_file']['error'][$i];
              $_FILES['file']['size'] = $_FILES['pdf_file']['size'][$i];

              //file upload configuration
              $uploadPath = '../upload/pdf_file/';
              $config['upload_path'] = $uploadPath;
              $config['allowed_types'] = 'pdf';

              //load and initialize upload library
              $this->load->library('upload',$config);
              $this->upload->initialize($config);

              //upload file to server
              if($this->upload->do_upload('file')){
                $pdfData = $this->upload->data();
                if($pdfData['file_ext'] == '.pdf'){
                    $uploadPdfData[$i]['pdf_file'] = $pdfData['orig_name'];
                    $uploadPdfData[$i]['corporate_id'] = $this->input->post('corporate_id');
                    $uploadPdfData[$i]['policy_id'] = $this->input->post('policy_id');
                    $uploadPdfData[$i]['employee_id'] = substr($pdfData['orig_name'], 0, strrpos($pdfData['orig_name'], "."));
                }

              }
          }

          if(!empty($uploadPdfData)){
            $this->ec->multiple_upload($uploadPdfData);
            $this->session->set_flashdata('L_strErrorMessage','E-Card Uploaded Successfully');
            redirect($this->config->item('base_url').'ecards/list');
          }

    }

    public function delete(){
        if($this->input->post('checkbox_value')){
             $id = $this->input->post('checkbox_value');
             for($count = 0; $count < count($id); $count++)
             {
              $this->ec->delete_e_card($id[$count]);
             }
             $this->session->set_flashdata('L_strErrorMessage','E-Card Deleted Successfully');

        }
    }

    /*********Zip E-card Upload*********/
    public function zip_upload(){
        $data['allcorporate']= $this->pm->allcorporate();
		$data['allproduct_name'] = $this->ec->allproduct_name();
        $this->load->view('e_card_zip_upload',$data);
    }

    public function upload_zip_folder(){
        if($_FILES['pdf_file']['name'] != ''){
           $file_name = $_FILES['pdf_file']['name'];
           $array = explode(".", $file_name);
           $name = $array[0];
           $ext = $array[1];
           if($ext == 'zip'){
                $path = '../upload/zip_file/';
                $location = $path . $file_name;
                if(move_uploaded_file($_FILES['pdf_file']['tmp_name'], $location)){
                     $zip = new ZipArchive;
                     if($zip->open($location)){
                          $zip->extractTo('../upload/');
                          $zip->close();
                     }
                     $files = scandir('../upload/pdf_file/');

                     foreach($files as $file){
                          $file_ext = end(explode(".", $file));
                          $allowed_ext = array('pdf');
                          if(in_array($file_ext, $allowed_ext)){
                               $new_name = $file;
                               //$uploadPdfData['group_code'] = $name;
                               $uploadPdfData['pdf_file'] = $new_name;
                               $uploadPdfData['corporate_id'] = $this->admin->xss_clean_inputData($this->input->post('corporate_id'));
                               $uploadPdfData['policy_id'] = $this->admin->xss_clean_inputData($this->input->post('policy_id'));
                               $uploadPdfData['employee_id'] = substr($new_name, 0, strrpos($new_name, "."));

                               if(!empty($uploadPdfData)){
                                 $result = $this->ec->zip_upload($uploadPdfData);
                               }
                          }
                     }

                     $this->session->set_flashdata('L_strErrorMessage','E-Card Uploaded Successfully');
                     redirect($this->config->item('base_url').'ecards/list');
                }
           }
      }
    }

    public function upload_zip(){


        if($_FILES['pdf_file']['name'] != ''){
           $file_name = $_FILES['pdf_file']['name'];
           $array = explode(".", $file_name);
           $name = $array[0];
           $ext = $array[1];
           if($ext == 'zip'){
                $path = '../upload/zip_file/';
                $location = $path . $file_name;
                if(move_uploaded_file($_FILES['pdf_file']['tmp_name'], $location)){

                    $policy_data = $this->ec->get_policy_data($this->input->post('policy_id'));



                     $zip = new ZipArchive;
                     if($zip->open($location)){

                          $dynamic_folder = mkdir('../upload/pdf_file/'.$policy_data->policy_no, 0777);
                         //echo "<pre>";print_r($test);exit;
                          $zip->extractTo('../upload/pdf_file/'.$policy_data->policy_no);

                          $zip->close();
                     }
                  
                     $files = scandir('../upload/pdf_file/'.$policy_data->policy_no);

                     foreach($files as $file){
                          $file_ext = end(explode(".", $file));
                          $allowed_ext = array('pdf');
                          if(in_array($file_ext, $allowed_ext)){
                               $new_name = $file;
                               //$uploadPdfData['group_code'] = $name;
                               $uploadPdfData['pdf_file'] = $new_name;
                               $uploadPdfData['corporate_id'] = $this->admin->xss_clean_inputData($this->input->post('corporate_id'));
                               $uploadPdfData['policy_id'] = $this->admin->xss_clean_inputData($this->input->post('policy_id'));
                               $uploadPdfData['employee_id'] = substr($new_name, 0, strrpos($new_name, "."));

                               if(!empty($uploadPdfData)){
                                 $result = $this->ec->zip_upload($uploadPdfData);
                                 $log_data = array(
                                    'username' => $this->session->userdata('username'),
                                    'login_user_id' => $this->session->userdata('adminId'),
                                    'module_name' => 'Create Ecards',
                                    'corporate_name' => $uploadPdfData['corporate_id'],
                                    'policy_number' => $uploadPdfData['policy_id'],
                                    'created_at' => date('Y-m-d h:i:sa')
                                );
                                

                                $this->admin->log_data_manage($log_data);
                               }
                          }
                     }

                     $this->session->set_flashdata('L_strErrorMessage','E-Card Uploaded Successfully');
                     redirect($this->config->item('base_url').'ecards/list');
                }
           }
      }
    }
	
	function download_card($doc_name,$policy_no){
		
		//echo $doc_name;exit;
		
		if(!empty($doc_name)){
            //load download helper

            //echo $doc_name;exit;
            $this->load->helper('download');
            
            
            // $file = $this->config->item('front_base_url').'upload/post_lc_document/'.$doc_name;
            //$file = $this->config->item('front_base_url').'upload/post_lc_document/';
            $pth    =   file_get_contents($this->config->item('front_base_url')."upload/pdf_file/".$policy_no."/".$doc_name."");
            
            force_download($doc_name, $pth);
        }
	}
}
