<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilitiController extends CI_Controller {
    function __construct(){
          parent::__construct();
  				if(!$this->session->userdata("loginHR")){
  						$redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('Utiliti_Model','um');
  				$this->policies = $this->need_lib->get_policies();
    }

    public function index(){
  			$data=array('file'=>'utilities');
  	    $this->template->full_corporate_html_view($data);
  	}

    public function showUtilities() {
  			$policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $result = $this->um->get_utilities_by_policy($policy_id);
        if(!empty($result)){
  						$output = '';
  			      foreach($result as $row){
  							$info = new SplFileInfo($row["document"]);
  							$path = strtoupper($info->getExtension());
  								$output.='<div class="col-md-3 mb-2 col-sm-6 col-12">
                                <a href="'.str_replace('corporate/', '', base_url()).'upload/utilities/'.$row["document"].'" target="_blank" style="text-decoration: none;">
                                    <div class="info-box shadow-sm">
                                        <span class="info-box-icon bg-danger"><i class="fa fa-file-pdf"></i></span>

                                        <div class="info-box-content1 text-left1">
                                            <span class="info-box-text text-black"><u>'.$row["name"].'</u></span>
                                            <span class="info-box-number text-black">Download</span>
                                        </div>
                                    </div>
                                </a>
                          </div>';
  			      }

  			      echo json_encode($output);
  		   }else{
  				 	echo json_encode('<div class="col-md-12 col-sm-12 col-12"><center>No record found</center></div>');
  			 }
  	  }

}
