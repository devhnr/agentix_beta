<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PolicyFeaturesController extends CI_Controller {
    function __construct(){
          parent::__construct();
          if(!$this->session->userdata("loginHR")){
              $redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('PolicyFeatures_Model','pm');
          $this->policies = $this->need_lib->get_policies();
    }

    public function index(){
        $data=array('file'=>'policy-features');
        $this->template->full_corporate_html_view($data);
    }

    public function showPolicyFeatures(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $policy_features_id = isset($_POST['policy_features_id'])?$_POST['policy_features_id']:null;
        $this->load->model('Home_Model');
        $data = $this->Home_Model->get_policy_tpa($policy_id);
        // $result = $this->pm->get_policy_features($data['id'],$data['product_type']);
        $result = $this->pm->get_policy_features($policy_features_id,$data['product_type']);
    
    //echo "<pre>";print_r($result);echo"</pre>";exit;
    
        if(!empty($result)){
              $output = '';
              foreach($result as $row){


                  if(is_numeric($row["field_type"])){
                    $field_type = number_format($row["field_type"]);
                  }else{

                    $field_type = $row["field_type"];
                  }
                  $output.='
                          <div class="col-md-3">
                              <div class="card card-primary border-1px">
                                  <div class="card-header">
                                      <h3 class="card-title">'.$row["label_name"].'</h3>
                                  </div>

                                  <div class="card-body">
                                      <ul>
                                          <li>
                                              <p class="text-muted">'.$field_type.'</p>';

                                             // echo "<pre>";print_r($row);echo"</pre>";
                                              if(!empty($row['addition'])){
                                                $res = $this->pm->get_sub_policy_features_attribute($policy_features_id,$row['field_id']);
                                                foreach ($row['addition'] as $key => $sub) {

                                                    if(!empty($res[$key]['field_type'])){
                    

                                                        $row['addition'][$key]['value'] =  $res[$key]['field_type'];
    
                                                        $test = $row["addition"][$key]["value"];
    
                                                        if(is_numeric($row["addition"][$key]["value"])){
                                                          $test = number_format($row["addition"][$key]["value"]);
                                                        }else{
    
                                                          $test = $row["addition"][$key]["value"];
                                                        }
    
                                                        $output.='<img src="'.base_url().'assets/sub.svg">
                                                            <div class="col-md-12">
                                                                <div class="card card-primary border-1px">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">'.$row["addition"][$key]["label_name"].'</h3>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="text-muted">'.$test.'</p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                    }
                                                }    
                                                    
                                              }
                                $output.='</li>
								
                                      </ul>
                                  </div>
                              </div>
                          </div>';
              }
          if($data['inclusions'] != ''){
            
          $output .= '<div class="col-md-12">
                              <div class="card card-primary border-1px">
                                  <div class="card-header">
                                      <h3 class="card-title" style="text-align: left !important;">Other Benefits</h3>
                                  </div>

                                  <div class="card-body">
                                      <ul>
                                          <li>
                                              <p class="text-muted">'.$data['inclusions'].'</p></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>';
          }

              echo json_encode($output);
         }else{
            echo json_encode('<div class="col-md-12 col-sm-12 col-12"><center>No record found</center></div>');
         }

    }

    public function getSumInsured(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $data = $this->pm->get_sum_insured($policy_id);
        echo json_encode($data);
    }
}
