<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HospitalController extends CI_Controller {
    function __construct(){
          parent::__construct();
  				if(!$this->session->userdata("loginHR")){
  						$redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('Hospital_Model','hm');
  				$this->policies = $this->need_lib->get_policies();
    }

    public function index(){
  			$data=array('file'=>'cashless-hospitals');
        $this->load->model('Claim_Model');
        $data['city'] = $this->Claim_Model->get_all_city();
        $data['state'] = $this->Claim_Model->get_all_state();
  	    $this->template->full_corporate_html_view($data);
  	}

    public function showHospitals() {
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        if(!empty($policy_id)){
            $this->load->model('Home_Model');
            $tpa_value = $this->Home_Model->get_policy_tpa($policy_id);
            if($tpa_value['tpa'] == 'Health India Insurance TPA Services Private Limited'){
                $result = array('data' => array());
                $lib = $this->need_lib->newtwork_hospitals();
                $data= json_decode($lib->result, TRUE);

                    foreach ($data as $key => $value) {
                        $result['data'][$key] = array(
                            $key+1,
                            ucwords(strtolower($value['HospitalName'])),
                            ucfirst(strtolower($value['AddressLine1'])),
                            $value['PhoneNumber'],
                            ucfirst(strtolower($value['Landmark1'])),
                            ucfirst(strtolower($value['CityName'])),
                            ucfirst(strtolower($value['StateName'])),
                            $value['Pincode'],
                        );
                    }
                    $result['arr_length'] = 10;

                    echo json_encode($result);
            }else{
                $result = array('data' => array());
                 $data = $this->hm->get_cashless_hospital_list($tpa_value['tpa']);
                 if(!empty($data)){
                   foreach ($data as $key => $value) {
                       $result['data'][$key] = array(
                           $key+1,
                           ucwords(strtolower($value['HospitalName'])),
                           ucfirst(strtolower($value['AddressLine1'])),
                           $value['PhoneNumber'],
                           ucfirst(strtolower($value['Landmark1'])),
                           ucfirst(strtolower($value['CityName'])),
                           ucfirst(strtolower($value['StateName'])),
                           $value['Pincode'],
                       );
                   }
                   $result['arr_length'] = count($data);
                   echo json_encode($result);
                 }else{
                   echo json_encode('fail');
                 }

            }
        }
  	  }


      public function getCities(){
          $this->load->model('Claim_Model');
          $state = isset($_POST['state'])?$_POST['state']:null;
    			$data = $this->Claim_Model->get_all_city($state);
    			echo json_encode($data);
    	}
}
