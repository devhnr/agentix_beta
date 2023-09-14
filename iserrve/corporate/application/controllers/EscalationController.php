<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EscalationController extends CI_Controller {
    function __construct(){
          parent::__construct();
  				if(!$this->session->userdata("loginHR")){
  						$redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('Escalation_Model','em');
          $this->policies = $this->need_lib->get_policies();
    }

    public function index(){
  			$data=array('file'=>'escalation-matrix');
  	    $this->template->full_corporate_html_view($data);
  	}

    public function showEscallationMatrix() {
  			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $result = $this->em->get_escalation_matrix_by_policy($policy_id);
        // echo '<pre>'; print_r($result);exit;
        if(!empty($result)){
  						$output = '';
  			      foreach($result as $row){
  								$output.='<div class="col-md-4">
                                <div class="card_n border-1px card-primary">
                                    <div class="card-header pt-4 pb-4">
                                        <h3 class="card-title text-dark text-center float-none mb-3 font-weight-600">'.$row["name"].'</h3>
                                        <span class="badge badge-success f-left badge-padding font-weight-500">'.$row["product_name"].'</span>
                                        <span class="badge badge-success1 f-right badge-padding font-weight-500">Level '.$row["level"].'</span>
                                    </div>

                                    <div class="card-body d-block pt-4 pb-4">
                                        <div class="d-flex mb-2">
                                            <strong> <i class="ti-location-pin info-box-icon bg-white border-radius-8px new-box-shadow"></i></strong>
                                            <p class="text-muted ml-2">'.$row["address"].'</p>
                                        </div>

                                        <div class="d-flex mb-4 align-items-baseline">
                                            <strong> <i class="feather icon-feather-phone info-box-icon bg-white border-radius-8px new-box-shadow"></i></strong>
                                            <p class="text-muted ml-2">+91 '.$row["phone"].'</p>
                                        </div>

                                        <div class="d-flex mb- align-items-baseline">
                                            <strong> <i class="ti-email info-box-icon bg-white border-radius-8px new-box-shadow"></i></strong>
                                            <p class="text-muted ml-2">'.$row["email"].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
  			      }

  			      echo json_encode($output);
  		   }else{
  				 	echo json_encode('<div class="col-md-12 col-sm-12 col-12"><center>No record found</center></div>');
  			 }
  	  }
}
