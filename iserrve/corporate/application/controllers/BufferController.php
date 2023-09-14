<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BufferController extends CI_Controller {
    function __construct(){
          parent::__construct();
  				if(!$this->session->userdata("loginHR")){
  						$redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('Buffer_Model','bm');
  				$this->policies = $this->need_lib->get_policies();
    }

    public function index(){
  			$data=array('file'=>'corporate-buffer');
  	    $this->template->full_corporate_html_view($data);
  	}

    public function showCorporateBuffer() {
  			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $result = array('data' => array());
        $data = $this->bm->get_all_corporate_buffer($policy_id);
        if(!empty($data)){
            foreach ($data as $key => $value) {
              $downloads = '<a class="btn btn-sm editRecord bg-purple" href="'.base_url().'"upload/corporate_buffer_utilization/"'.$value['document'].'" target="_blank" style="color:white;">Download</a>';
            	$result['data'][$key] = array(
                  $key+1,
                  $value["employe_id"],
                  ucwords(strtolower($value['emp_name'])),
                  $value['relationship'],
                  $value['email_address'],
                  $value['contact_number'],
                  number_format($value['claim_amount']),
									number_format($value['settled_amount']),
									number_format($value['employee_si_utilised']),
									$value['corporate_buffer_used'],
							    $value['ailment'],
							    $downloads
              );
          }
          echo json_encode($result);
      }else{
        echo json_encode('fail');
      }

    }

    public function buffer_sum_insured(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $data['total'] = $this->bm->get_total_corporate_sum_insured($policy_id);
        $data['utilized'] = $this->bm->get_utilized_corporate($policy_id);
        if($data['total']['total_corporate'] != ''){
            $data['remaining'] = ($data['total']['total_corporate'] - $data['utilized']['utilized_corporate']);
        }else{
            $data['total']['total_corporate'] = 0;
            $data['remaining'] = $data['utilized']['utilized_corporate'];
        }
        echo json_encode($data);
    }
}
