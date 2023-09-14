<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logmanage extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('logmanage_model');
        if($this->session->userdata('adminId') == ''){
    		    redirect($this->config->item('base_url'));
        }
    }
    

    public function list(){

        $data['user_name'] = $this->input->post('user_name');

        $this->data['user_name'] = $this->input->post('user_name');


        $data['emp']= $this->logmanage_model->get_registered_emp_list($data);
        $data['user_name_new'] = $this->logmanage_model->get_user_name();

        // echo "<pre>";print_r($data['user_name']);echo "</pre>";exit;
        $this->load->view('list_logmanage',$data);
    }

    public function delete(){
        if($this->input->post('checkbox_value')){
             $id = $this->input->post('checkbox_value');
             for($count = 0; $count < count($id); $count++)
             {
              $this->logmanage_model->delete_emp($id[$count]);
             }
             $this->session->set_flashdata('L_strErrorMessage','Logmanage Deleted Successfully');

        }
    }



}
