<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrollment_api extends CI_Controller {
    function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    		if($this->session->userdata('adminId') == ''){
    			redirect($this->config->item('base_url'));
            }
    		$this->load->model('employee_enrollment_model','eem');
            $this->load->model('admin');
    }

    public function add(){
    		$form_field = $data = array(
      			'insurer' => '',
      			'corporate_id' => '',
      			'product_name' => '',
      			'policy_no' => '',
      			'policy_start_date' =>'',
      			'policy_end_date' => '',
      			'policy_end_date' => '',
    		);
        $array = explode("_", $this->input->post('policy_no'));
        $policy_id = $array[1];
        $policy_no = $array[0];
        $corporate = $this->admin->xss_clean_inputData($this->input->post('corporate_id'));
        $sum_insured = 'Api';

    		if($this->input->post('action') == 'add_employee_enrollment'){
                /******check employee_enrollment exist or not *******/
                $check = $this->eem->chech_employee_status($corporate,$policy_id,$sum_insured);  //check modal tbl

                if($check == 0){
                      /******added to employee_enrollment table*******/
                      $arrayName = array(
                          'insurer' => $this->admin->xss_clean_inputData($this->input->post('insurer')),
                          'corporate_id' => $corporate,
                          'product_name' => $this->admin->xss_clean_inputData($this->input->post('product_name')),
                          'policy_no' => $this->admin->xss_clean_inputData($policy_id),
                          'sum_insured' => $this->admin->xss_clean_inputData($sum_insured),
                          'policy_start_date' => $this->admin->xss_clean_inputData($this->input->post('policy_start_date')),
                          'policy_end_date' => $this->admin->xss_clean_inputData($this->input->post('policy_end_date')),
                          'mode' => 1,
                          'date' => date('Y-m-d'),
                      );
                      //echo "<pre>";print_r($policy_id);echo"</pre>";exit;
                      $e_id = $this->eem->add_api_data($arrayName);

                      $log_data = array(
                    			'username' => $this->session->userdata('username'),
                    			'login_user_id' => $this->session->userdata('adminId'),
                    			'module_name' => 'Create Api Employee Enrollment',
                    			'corporate_name' => $corporate,
                    			'policy_number' => $policy_id,
                    			'created_at' => date('Y-m-d h:i:sa')
					           );

					            $this->admin->log_data_manage($log_data);
                      $entry = 0;
                      if(!empty($e_id)){
                          $this->upload_api_data($e_id,$policy_no,$entry);
                      }
                }else{

                      $get_data = $this->eem->get_employement_data($check); //check modal tbl

                      $entry = 1;
                      $this->upload_api_data($get_data->id,$policy_no,$entry);
                }

        }

    		$data['allcorporate']= $this->eem->allcorporate();
    		$data['allproduct_name'] = $this->eem->allproduct_name();
    		// $data['allsum_insured'] = $this->eem->allsum_insured();

    		$this->load->view('add_employee_enrollment_api',$data);
  	}

  public function upload_api_data($e_id,$policy_no,$entry){
        $this->load->library("Need_lib");
        $lib = $this->need_lib->getEnrollmentDetails($policy_no);
        $enrollment_data= json_decode($lib->result, TRUE);

        for ($i=0; $i < count($enrollment_data); $i++) {
            $relation = $enrollment_data[$i]['Relation'];
            $employee_id = $enrollment_data[$i]['EmployeeCode'];

            /*******check employee record exist or not******/
            $check = $this->eem->check_employee_enrollment($e_id,$employee_id,$relation);

              if(!empty($check)){
                  if($enrollment_data[$i]['InsuredStatus'] == 'A' OR $enrollment_data[$i]['InsuredStatus'] == 'S'){

                      switch ($enrollment_data[$i]['Gender']) {
                          case "F":
                              $gender = "Female";
                          break;
                          case "M":
                              $gender =  "Male";
                          break;
                          default:
                              $gender = "Other";
                      }

                      $data = array(
                          'name_of_the_employee' => $enrollment_data[$i]['MemberName'],
                          'gender' => $gender,
                          'relationship' =>ucfirst($enrollment_data[$i]['Relation']) ,
                          'd_o_b' => (!empty($enrollment_data[$i]['DateOfBirth'])) ? date('d-m-Y', strtotime(str_replace('/', '-', $enrollment_data[$i]['DateOfBirth']))) : '',
                          'age' => $enrollment_data[$i]['Age'],
                          'mobile_no' => $enrollment_data[$i]['InsuredMobile'],
                          'email' => $enrollment_data[$i]['EmailId'],
                          'sum_insured' => $enrollment_data[$i]['BaseSumInsured'],
                          'date_of_joining' => (!empty($enrollment_data[$i]['DateofPolicyJoining'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $enrollment_data[$i]['DateofPolicyJoining']))) : '',
                          'endorsement_no' => $enrollment_data[$i]['EndorsementNumber'],
                          'endorsement_date' => (!empty($enrollment_data[$i]['EndorsementDate'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $enrollment_data[$i]['EndorsementDate']))) : '',
                          'date_of_leaving' => (!empty($enrollment_data[$i]['PolicyResignDate'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $enrollment_data[$i]['PolicyResignDate']))) : '',
                          'type_of_addition' => ($enrollment_data[$i]['InsuredStatus'] == 'A') ? 'update' : 'delete',
                          'mode' => 1,
                          'created_at' => date('Y-m-d H:i:s'),

                      );
                      $this->eem->update_employee_enrollment_attribute($employee_id,$relation,$data);

                      // $this->session->set_flashdata('L_strErrorMessage', 'Employee Enrollment Updated Successfully');
                      // redirect($this->config->item('base_url') . 'employee_enrollment/lists/');
                  }

              }else{
                  if($enrollment_data[$i]['InsuredStatus'] == 'A' OR $enrollment_data[$i]['InsuredStatus'] == 'S'){

                      switch ($enrollment_data[$i]['Gender']) {
                          case "F":
                              $gender = "Female";
                          break;
                          case "M":
                              $gender =  "Male";
                          break;
                          default:
                              $gender = "Other";
                      }

                      $data = array(
                          'e_id' => $e_id,
                          'Employee_id' => $employee_id,
                          'name_of_the_employee' => $enrollment_data[$i]['MemberName'],
                          'gender' => $gender,
                          'relationship' =>ucfirst($enrollment_data[$i]['Relation']) ,
                          'd_o_b' => (!empty($enrollment_data[$i]['DateOfBirth'])) ? date('d-m-Y', strtotime(str_replace('/', '-', $enrollment_data[$i]['DateOfBirth']))) : '',
                          'age' => $enrollment_data[$i]['Age'],
                          'mobile_no' => $enrollment_data[$i]['InsuredMobile'],
                          'email' => $enrollment_data[$i]['EmailId'],
                          'sum_insured' => $enrollment_data[$i]['BaseSumInsured'],
                          'date_of_joining' => (!empty($enrollment_data[$i]['DateofPolicyJoining'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $enrollment_data[$i]['DateofPolicyJoining']))) : '',
                          'member_id' => $enrollment_data[$i]['MemberId'],
                          'endorsement_no' => $enrollment_data[$i]['EndorsementNumber'],
                          'endorsement_date' => (!empty($enrollment_data[$i]['EndorsementDate'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $enrollment_data[$i]['EndorsementDate']))) : '',
                          'date_of_leaving' => (!empty($enrollment_data[$i]['PolicyResignDate'])) ? date('Y-m-d', strtotime(str_replace('/', '-', $enrollment_data[$i]['PolicyResignDate']))) : '',
                          'type_of_addition' => ($enrollment_data[$i]['InsuredStatus'] == 'A') ? 'add' : 'delete',
                          'mode' => 1,
                          'entry' => $entry,
                          'created_at' => date('Y-m-d H:i:s'),
                      );

                      $this->eem->add_employee_enrollment_attribute($data);


                  }

              }
        }

        $this->session->set_flashdata('L_strErrorMessage', 'Employee Enrollment Added Successfully');
        redirect($this->config->item('base_url') . 'employee_enrollment/lists/');


  }

  function show_policy_using_corporate(){
        $pro_id = $_POST['pro_id'];
        $po_id = $_POST['po_id'];

        $data = $this->eem->show_policy_using_corporate($pro_id);

        $html = '<select id="policy_no" name="policy_no" class="form-control multiple-select" onChange="showproduct_name(this.value)">';
        $html .= '<option value="">--Select Policy No--</option>';
        if($data != 0){
            for($i=0; $i < count($data); $i++){
                if($po_id == $data[$i]->id){
                    $selected = "selected";
                }else{
                    $selected = "";
                }
                $html .= "<option value='" .$data[$i]->policy_no."_".$data[$i]->id."' ".$selected . ">" . $data[$i]->policy_no ."</option>";
            }
        }
        $html .= '</select>';
        echo $html;
    }

}
