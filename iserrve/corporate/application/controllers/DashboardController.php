<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    function __construct(){
          parent::__construct();
  				if(!$this->session->userdata("loginHR")){
  						$redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('Dashboard_Model','dm');
  				$this->policies = $this->need_lib->get_policies();
    }

    public function index(){
  			$data=array('file'=>'index');
        $data['result'] = $this->need_lib->get_policies();
  	    $this->template->full_corporate_html_view($data);
  	}

    public function signout(){
  			 $this->session->unset_userdata("hr_login_id");
  			 $this->session->unset_userdata("corporate_name");
  			 $this->session->unset_userdata("loginHR");

  			 $this->session->sess_destroy();
  			 $redirection = str_replace('corporate/', '', base_url());
  			 redirect($redirection);
  	}

    public function showMembersCounts(){
        $this->load->model('Summary_Model','sm');

        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $inception = $this->sm->get_enrollment_inception($policy_id);
        $addition = $this->sm->get_enrollment_addition($policy_id);
        $deletion = $this->sm->get_enrollment_deletion($policy_id);

        $keys = array_keys($inception);
        $inception['total'] = $inception['Employee'] + $inception['Spouse'] + $inception['Children'] + $inception['Parents'] + ($inception['Others'] - $inception['Employee'] - $inception['Spouse']- $inception['Children'] - $inception['Parents']);
        $addition['total'] = $addition['Employee'] + $addition['Spouse'] + $addition['Children'] + $addition['Parents'] + ($addition['Others'] - $addition['Employee'] -$addition['Spouse']- $addition['Children'] - $addition['Parents']);
        $deletion['total'] = $deletion['Employee'] + $deletion['Spouse'] + $deletion['Children'] + $deletion['Parents'] + ($deletion['Others'] - $deletion['Employee'] -$deletion['Spouse']- $deletion['Children'] - $deletion['Parents']);
        $active['total'] = $inception['total'] + $addition['total'] - $deletion['total'];    
        // $active['total'] = $inception['total'] + $addition['total'];

        $res = array(
            'total_val' => $inception['total'],
            'total_val1' => $addition['total'],
            'total_val2' => $deletion['total'],
            'total_val3' => $active['total'],
        );
        echo json_encode($res);
    }

    public function showClaimCounts(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $result = $this->dm->get_claim_count($policy_id);
        echo json_encode($result);
    }

    public function showClaimAmounts(){
        $claim_type = isset($_POST['claim_type'])?$_POST['claim_type']:null;
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $result = $this->dm->get_claim_amount_by_type($claim_type,$policy_id);
        echo json_encode($result);
    }

    public function showGenderClaimRatio(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $this->load->model('Report_Model','rm');
        $result = $this->rm->get_gender_wise_claim_report($policy_id);
        echo json_encode($result);
    }

    public function showClaimRatio(){
        $this->load->model('Home_Model');
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $result =$this->Home_Model->get_policy_by_corporate($policy_id);

        $this->load->model('Summary_Model','sm');
        $premium = $this->sm->get_premium_by_policy($policy_id);

        $claim_amount = $this->sm->get_claim_paid_by_policy($policy_id);
        $policy_start_date = $result[0]['policy_start_date'];
        $first_date = new DateTime(date('Y-m-d', strtotime($policy_start_date)));
        $second_date = new DateTime(date('Y-m-d', strtotime('now')));
        $difference = $first_date->diff($second_date);
        $no_of_days = $difference->days + 1;


        $first_date = new DateTime(date('Y-m-d', strtotime($policy_start_date)));
        $third_date = new DateTime(date('Y-m-d', strtotime($result[0]['policy_end_date'])));

        $policy_days = $first_date->diff($third_date);
        $total_policy_days = $policy_days->days + 1;

        if(!empty($premium['second'])){
            $total_premium = (!empty($premium['second'])) ? $premium['second']['total_premium']:'0';
            $earned_premium = $total_premium * ($no_of_days/$total_policy_days);

            $claim_ratio = (($claim_amount['claim_paid'] + $claim_amount['claim_under_process']) * 100) / $total_premium;
            $earned_ratio = (($claim_amount['claim_paid'] + $claim_amount['claim_under_process']) * 100) / $earned_premium;

            $output['claim_ratio'] = (!empty($claim_ratio))?$claim_ratio : '';
            $output['earned_ratio'] = (!empty($earned_ratio))?$earned_ratio : '';
        }

         echo json_encode($output);
    }

    public function showEmployeesLoginRatio(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $result = $this->dm->get_total_employee_by_policy($policy_id);
        $res = $this->dm->get_register_employee_by_policy($policy_id);
        $data = array(
          'total_employee' => $result['total_employees'],
          'register_employee' => $res['register_employees'],
        );

        echo json_encode($data);
    }

}
