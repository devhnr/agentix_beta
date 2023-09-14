<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_card_new extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('E_Card_Model','ec');
        $this->load->model('policy_model','pm');
        if($this->session->userdata('adminId') == ''){
    		    redirect($this->config->item('base_url'));
        }
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
        $data = $this->ec->get_policy($id)->result();
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
            redirect($this->config->item('base_url').'e_card_new/list');
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
                               $uploadPdfData['corporate_id'] = $this->input->post('corporate_id');
                               $uploadPdfData['policy_id'] = $this->input->post('policy_id');
                               $uploadPdfData['employee_id'] = substr($new_name, 0, strrpos($new_name, "."));

                               if(!empty($uploadPdfData)){
                                 $result = $this->ec->zip_upload($uploadPdfData);
                               }
                          }
                     }

                     $this->session->set_flashdata('L_strErrorMessage','E-Card Uploaded Successfully');
                     redirect($this->config->item('base_url').'e_card/list');
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
                     $zip = new ZipArchive;
                     if($zip->open($location)){
                          $zip->extractTo('../upload/pdf_file');
                          $zip->close();
                     }
                     $files = scandir('../upload/pdf_file');

                     foreach($files as $file){
                          $file_ext = end(explode(".", $file));
                          $allowed_ext = array('pdf');
                          if(in_array($file_ext, $allowed_ext)){
                               $new_name = $file;
                               //$uploadPdfData['group_code'] = $name;
                               $uploadPdfData['pdf_file'] = $new_name;
                               $uploadPdfData['corporate_id'] = $this->input->post('corporate_id');
                               $uploadPdfData['policy_id'] = $this->input->post('policy_id');
                               $uploadPdfData['employee_id'] = substr($new_name, 0, strrpos($new_name, "."));

                               if(!empty($uploadPdfData)){
                                 $result = $this->ec->zip_upload($uploadPdfData);
                               }
                          }
                     }

                     $this->session->set_flashdata('L_strErrorMessage','E-Card Uploaded Successfully');
                     redirect($this->config->item('base_url').'e_card/list');
                }
           }
      }
    }

}
