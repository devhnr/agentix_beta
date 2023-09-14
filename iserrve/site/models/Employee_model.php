<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_Model extends CI_Model {

    function __construct(){
            parent::__construct();
    }

    public function isUserExist($mobile){
        try{
            $this->db->select('id');
            $this->db->from('tbl_employee');
            $this->db->where('mobile',$mobile);
            $query=$this->db->get();
                if($this->db->affected_rows() > 0){
                    return true;
                }else{
                    return false;
                }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function getData($mobile){
      try{
            $this->db->select('*');
            $this->db->from('tbl_employee');
            $this->db->where('mobile',$mobile);

            $query=$this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->row_array();
                }else{
                    return 0;
                }
      }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
      }
    }

    public function insertEmployee($data){
        try{
            $this->db->insert('tbl_employee', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function insertData($data,$table){
        try{
            $this->db->insert($table,$data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_cities($state){
          $this->db->select('city');
          $this->db->from('cities');
          $this->db->where('state',$state);
          $this->db->order_by('city', 'ASC');
          $query = $this->db->get();
          return $query;
    }

    public function get_all_cities(){
          $this->db->select('city');
          $this->db->from('cities');
          $this->db->order_by('city', 'ASC');
          $query = $this->db->get();
          return $query;
    }

    public function get_all_state() {
        try{
            $this->db->select('state');
            $this->db->from('cities');
            $this->db->group_by('state');
            $this->db->order_by('state', 'ASC');
            $query =$this->db->get();

            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_city() {
        try{
            $this->db->select('city');
            $this->db->from('cities');
            $this->db->order_by('city', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function verify_employee($emp_id,$group_code){
        try{
            $this->db->select('employee_enrollment_attributes.name_of_the_employee,employee_enrollment_attributes.email,employee_enrollment_attributes.mobile_no,employee_enrollment_attributes.employee_id,employee_enrollment.id,corporate.group_code');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment.id = employee_enrollment_attributes.e_id','LEFT');
            $this->db->join('corporate', 'employee_enrollment.corporate_id = corporate.id','LEFT');
            $this->db->where('employee_enrollment_attributes.employee_id',$emp_id);
            $this->db->where('corporate.group_code',$group_code);
            $this->db->where('employee_enrollment_attributes.relationship','Employee');
            $query=$this->db->get();

                if($this->db->affected_rows() > 0){
                    return $query->row();
                }else{
                    return false;
                }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function isEcardExist($employee_id){
        try{
            $this->db->select('employee_id');
            $this->db->from('tbl_e_card');
            $this->db->where('employee_id',$employee_id);
            $query=$this->db->get();
                if($this->db->affected_rows() > 0){
                    return true;
                }else{
                    return false;
                }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function pdf_upload($data){
      try{
          $this->db->insert('tbl_e_card', $data);
          if($this->db->affected_rows() > 0){
              return true;
          }else{
              return false;
          }
      }catch(Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  //if need group code add join carporate table
  public function getEmpData($employee_no,$corp_id){
      try{
          $this->db->select('employee_enrollment_attributes.name_of_the_employee as MemberName,employee_enrollment_attributes.relationship as Relation,employee_enrollment_attributes.d_o_b as DateOfBirth,employee_enrollment_attributes.employee_id as EmployeeCode,employee_enrollment.corporate_id,employee_enrollment.product_name,employee_enrollment.policy_no as policy_id,employee_enrollment.sum_insured,policy.policy_no');
          $this->db->from('employee_enrollment_attributes');
          $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
          $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
      $this->db->where('employee_enrollment.corporate_id ',$corp_id);
          $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
          $this->db->where('employee_enrollment_attributes.relationship','Employee');
          $this->db->where('policy.policy_end_date >', date("Y-m-d"));
          $query=$this->db->get();
              if($this->db->affected_rows() > 0){
                  return $query->result_array();
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function getSumInsured($sum_insured){
      try{
          $this->db->select('sum_insured');
          $this->db->from('sum_insured');
          $this->db->where('id',$sum_insured);
          $query=$this->db->get();
          return $query->row()->sum_insured;
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_employee_details($employee_no){
      try{
          $this->db->select('emp_id,email,mobile,name');
          $this->db->from('tbl_employee');
          $this->db->where('tbl_employee.emp_id',$employee_no);
          $query=$this->db->get();
              if($this->db->affected_rows() > 0){
                  return $query->row();
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }
  
    public function get_emp_policy_details($employee_no){
      try{
          $this->db->select('employee_enrollment_attributes.e_id,employee_enrollment_attributes.employee_id,policy.policy_no,policy.id as policy_id,tbl_employee.email,tbl_employee.mobile,tbl_employee.name');
          $this->db->from('employee_enrollment_attributes');
          $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
          $this->db->join('tbl_employee', 'tbl_employee.emp_id = employee_enrollment_attributes.employee_id','LEFT');
          $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
          $this->db->join('corporate', 'employee_enrollment.corporate_id = corporate.id','LEFT');
          $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
          $this->db->where('employee_enrollment_attributes.relationship','Employee'); //if final to insert self to uncomment or_where condition
          $this->db->where('corporate.group_code',$this->session->userdata('group_code'));
          $this->db->group_by('employee_enrollment.policy_no');
          $query=$this->db->get();
          // echo $this->db->last_query();exit;
              if($this->db->affected_rows() > 0){
                  return $query->result();
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
    }
//   public function get_emp_policy_details($employee_no){
//       try{
//           $this->db->select('employee_enrollment_attributes.e_id,employee_enrollment_attributes.employee_id,policy.policy_no,policy.id as policy_id,tbl_employee.email,tbl_employee.mobile,tbl_employee.name');
//           $this->db->from('employee_enrollment_attributes');
//           $this->db->join('tbl_employee', 'tbl_employee.emp_id = employee_enrollment_attributes.employee_id','LEFT');
//           $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
//           $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
//           // $this->db->join('corporate', 'employee_enrollment.corporate_id = corporate.id','LEFT');
//           $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
//           $this->db->where('employee_enrollment_attributes.relationship','Employee'); //if final to insert self to uncomment or_where condition
//           // $this->db->or_where('employee_enrollment_attributes.relationship','Self');
//           $query=$this->db->get();
//               if($this->db->affected_rows() > 0){
//                   return $query->result();
//               }else{
//                   return false;
//               }
//       }catch(Exception $ex){
//           error_log($ex->getTraceAsString());
//           echo $ex->getTraceAsString();
//           return FALSE;
//       }
//   }

  // public function get_employee_detailss($employee_no){
  //     try{
  //         $this->db->select('employee_enrollment_attributes.*,tbl_employee.email,tbl_employee.mobile,corporate.co_name,corporate.hr_email,corporate.sales_person_email,corporate.operations_person_email,policy.product_type,policy.policy_no,policy.tpa_person_email');
  //         $this->db->from('employee_enrollment_attributes');
  //         $this->db->join('tbl_employee', 'tbl_employee.emp_id = employee_enrollment_attributes.employee_id','LEFT');
  //         $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
  //         $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
  //         $this->db->join('corporate', 'employee_enrollment.corporate_id = corporate.id','LEFT');
  //         $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
  //         $this->db->where('employee_enrollment_attributes.relationship','Employee'); //if final to insert self to uncomment or_where condition
  //         // $this->db->or_where('employee_enrollment_attributes.relationship','Self');
  //         $query=$this->db->get();
  //             if($this->db->affected_rows() > 0){
  //                 return $query->result();
  //             }else{
  //                 return false;
  //             }
  //     }catch(Exception $ex){
  //         error_log($ex->getTraceAsString());
  //         echo $ex->getTraceAsString();
  //         return FALSE;
  //     }
  // }

  public function get_employee_relations($employee_no){
      try{
          $this->db->select('DISTINCT(relationship)');
          $this->db->from('employee_enrollment_attributes');
          $this->db->where('employee_id',$employee_no);
          $query=$this->db->get();
              if($this->db->affected_rows() > 0){
                  return $query->result();
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_product_type($employee_no){
      try{
          $this->db->select('employee_enrollment_attributes.*,tbl_employee.email,tbl_employee.mobile,corporate.co_name,corporate.hr_email');
          $this->db->from('employee_enrollment_attributes');
          $this->db->join('tbl_employee', 'tbl_employee.emp_id = employee_enrollment_attributes.employee_id','LEFT');
          $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
          $this->db->join('corporate', 'employee_enrollment.corporate_id = corporate.id','LEFT');
          $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
          $query=$this->db->get();
              if($this->db->affected_rows() > 0){
                  return $query->row();
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function insert_claim_data($data){
      try{
          $this->db->insert('tbl_claim', $data);
          if($this->db->affected_rows() > 0){
              return true;
          }else{
              return false;
          }
      }catch(Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function getPolicyData($policy_id){
      try{
          $this->db->select('policy.insurer,policy.product_name,policy.policy_no,policy.tpa,policy.policy_start_date,policy.policy_end_date,policy_features.id,policy_features.product_type,policy_features.inclusions,policy_features.exclusions,corporate.hr_email');
          $this->db->from('policy');
          $this->db->join('policy_features', 'policy_features.policy_no = policy.id','LEFT');
          $this->db->join('corporate', 'corporate.id = policy.corporate_id','LEFT');
          $this->db->where('policy.id',$policy_id);
          $this->db->where('policy.policy_end_date >', date("Y-m-d"));
          $query=$this->db->get();
              if($this->db->affected_rows() > 0){
                  $data = $query->row_array();   //please check
                  return $data;
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function isExistUser($mobile,$email){
      try{
          $this->db->select('id');
          $this->db->from('tbl_employee');
          $this->db->where('email',$email);
          $this->db->or_where('mobile',$mobile);
          $query=$this->db->get();
              if($this->db->affected_rows() > 0){
                  return true;
              }else{
                  return false;
              }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_e_card($employee_no){
    try{
        $this->db->select('*');
        $this->db->from('tbl_e_card');
        $this->db->where('is_deleted',0);
        $this->db->where('employee_id',$employee_no);
        $query =$this->db->get();
        return $query->row();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function insertMemberRequest($data){
      try{
          $this->db->insert('tbl_request', $data);
          if($this->db->affected_rows() > 0){
              return true;
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }

  }

  public function insertFeedback($data){
      try{
          $this->db->insert('tbl_feedback', $data);
          if($this->db->affected_rows() > 0){
              return true;
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }

  }

  public function get_policy_members($policy_no){
    try{
      $employee_no = $this->session->userdata("login_id");
      $this->db->select('employee_enrollment_attributes.name_of_the_employee as MemberName,employee_enrollment_attributes.relationship as Relation,employee_enrollment_attributes.mobile_no,employee_enrollment_attributes.email,employee_enrollment_attributes.d_o_b as DateOfBirth,employee_enrollment_attributes.employee_id as EmployeeCode,employee_enrollment.corporate_id,employee_enrollment.product_name,employee_enrollment.policy_no,employee_enrollment.sum_insured');
      $this->db->from('employee_enrollment');
      $this->db->join('employee_enrollment_attributes', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
      $this->db->where('employee_enrollment.policy_no',$policy_no);
      $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
      $query=$this->db->get();
      // echo $this->db->last_query();exit;
          if($this->db->affected_rows() > 0){
              return $query->result_array();
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_relation_by_policy($policy_id,$employee_no){
        try{
            $this->db->select('employee_enrollment_attributes.relationship,policy.product_type,policy.policy_no,corporate.co_name,corporate.hr_email,corporate.sales_person_email,corporate.operations_person_email,policy.tpa_person_email,policy.tpa');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('tbl_employee', 'tbl_employee.emp_id = employee_enrollment_attributes.employee_id','LEFT');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
            $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
            $this->db->join('corporate', 'employee_enrollment.corporate_id = corporate.id','LEFT');
            $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
            $this->db->where('employee_enrollment.policy_no',$policy_id); //if final to insert self to uncomment or_where condition
            // $this->db->or_where('employee_enrollment_attributes.relationship','Self');
            $query=$this->db->get();
                if($this->db->affected_rows() > 0){
                    return $query->result();
                }else{
                    return false;
                }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
  }

  public function get_policy_features($product_features_id,$policy_type){
    /* try{
      $this->db->select('form_field.label_name,policy_features_attribute.field_type,policy_features_attribute.field_id');
      $this->db->from('form_field');
      $this->db->join('policy_features_attribute', 'policy_features_attribute.field_id = form_field.id','LEFT');
      //$this->db->where('form_field.product_type_id',$policy_type);
    $this->db->where("FIND_IN_SET('".$policy_type."', form_field.product_type_id)");
      $this->db->where('policy_features_attribute.policy_features_id',$product_features_id);
      $this->db->where('policy_features_attribute.radio_att_flag',0);
      $this->db->where('policy_features_attribute.field_type !=', '');
      $this->db->order_by('form_field.id','ASC');
      $this->db->group_by('policy_features_attribute.field_id');
      $query=$this->db->get();

          if($this->db->affected_rows() > 0){
              $data = $query->result_array();
              foreach ($data as $key => $value) {
                if($value['field_type'] =='Yes'){
                  $this->db->select('label_name,form_field_id');
                  $this->db->from('form_field_attribute_radio');
                  $this->db->where('form_field_id',$value['field_id']);
                  $query1=$this->db->get();
                  $data1 = $query1->result_array();
                    $data[$key]['addition'] = $data1;

                }
              }

              return $data;
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      } */
    
    
    try{
        $this->db->select('form_field.label_name,policy_features_attribute.field_type,policy_features_attribute.field_id');
        $this->db->from('form_field');
        $this->db->join('policy_features_attribute', 'policy_features_attribute.field_id = form_field.id','LEFT');
        //$this->db->where('form_field.product_type_id',$policy_type);
    //$this->db->where(find_in_set($policy_type,'form_field.product_type_id'));
    
    $this->db->where("FIND_IN_SET('".$policy_type."', form_field.product_type_id)");
    
        $this->db->where('policy_features_attribute.policy_features_id',$product_features_id);
        $this->db->where('policy_features_attribute.radio_att_flag',0);
        $this->db->where('policy_features_attribute.field_type !=', '');
        $this->db->order_by('form_field.id','ASC');
        $this->db->group_by('policy_features_attribute.field_id');
        $query=$this->db->get();
    
    //echo $this->db->last_query();exit;
            if($query->num_rows() > 0){
                $data = $query->result_array();
                foreach ($data as $key => $value) {
                  if($value['field_type'] =='Yes'){
                    $this->db->select('label_name,form_field_id');
                    $this->db->from('form_field_attribute_radio');
                    $this->db->where('form_field_id',$value['field_id']);
                    $query1=$this->db->get();
                    $data1 = $query1->result_array();
                      $data[$key]['addition'] = $data1;
                  }
                }

                return $data;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
  }

    public function get_sub_policy_features_attribute($policy_features_id,$field_id){
      try{
        $this->db->select('field_type');
        $this->db->from('policy_features_attribute');
        $this->db->where('policy_features_id',$policy_features_id);
        $this->db->where('field_id',$field_id);
        $this->db->where('radio_att_flag',1);
        $query=$this->db->get();
        // echo $this->db->last_query();exit;
            if($this->db->affected_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

  public function get_tpa_by_policy($policy_id){
      try{
          $this->db->select('product_name,policy_no,tpa');
          $this->db->from('policy');
          $this->db->where('id', $policy_id);
          $query =$this->db->get();
          if($this->db->affected_rows() > 0){
              return $query->result_array();
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_cashless_hospital_list($tpa){
      try{
          $this->db->select('hospital_name as HospitalName,hospital_address as AddressLine1 ,contact_no as PhoneNumber,landmark as Landmark1,city as CityName,state as StateName,pincode as Pincode');
          $this->db->from('tbl_cashless_hospital');
          $this->db->order_by("created_at", "DESC");
          $this->db->where('tpa', $tpa);
          $query =$this->db->get();
          return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_current_claims($employee_no) {
      try{
          $this->db->select('id,claim_status,tpa_claim_no,insurance_claim_no,DATE_FORMAT(deficiency_intimated_date, "%d/%m/%Y") AS intimated_date,employee_id,employee_name,patient_name,hospital_name,DATE_FORMAT(hospitlization_date, "%d/%m/%Y") AS hospitliz_date,DATE_FORMAT(created_at, "%d/%m/%Y") AS created_date');
          $this->db->from('upload_claims');
          $this->db->where('employee_id', $employee_no);
          $query =$this->db->get();
          if($this->db->affected_rows() > 0){
              return $query->result_array();
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_documents_by_policy($policy_id){
      try{
        $this->db->select('utilities.document,document_type.name');
        $this->db->from('utilities');
        $this->db->join('document_type', 'document_type.id = utilities.document_type','LEFT');
        $this->db->where('utilities.policy_no',$policy_id);
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
  }

  public function get_current_claims_details($employee_no,$claim_id){
      try{
          $this->db->select('employee_name,patient_name,hospital_name,relation,insurance_claim_no,claim_status,claim_sub_status,claim_type,network_status,disease_category,amount_claimed,deduction_amount,deduction_reason,claim_paid_amount,closure_reason,DATE_FORMAT(hospitlization_date, "%d/%m/%Y") AS hospitliz_date,DATE_FORMAT(discharge_date, "%d/%m/%Y") AS discharge_date,DATE_FORMAT(claim_register_date, "%d/%m/%Y") AS register_date,DATE_FORMAT(claim_filed_date, "%d/%m/%Y") AS filed_date,DATE_FORMAT(claim_settled_date, "%d/%m/%Y") AS settled_date');
          $this->db->from('upload_claims');
          $this->db->where('employee_id', $employee_no);
          $this->db->where('id', $claim_id);
          $query =$this->db->get();
          if($this->db->affected_rows() > 0){
              return $query->row_array();
          }else{
              return false;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_date_of_joining($emp_id){
    try{
          $this->db->select('date_of_joining');
          $this->db->from('employee_enrollment_attributes');
          $this->db->where('employee_id',$emp_id);
          $this->db->where('relationship','Employee');
          $query=$this->db->get();
              if($query->num_rows() > 0){
                  return $query->row_array();
              }else{
                  return 0;
              }
    }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
    }
  }

  public function get_patient_details_by_member_id($policy_id,$employee_no,$relation){
        try{
            $this->db->select('employee_enrollment_attributes.relationship,employee_enrollment_attributes.name_of_the_employee as patient_name,employee_enrollment_attributes.email,employee_enrollment_attributes.mobile_no');
            $this->db->from('employee_enrollment_attributes');
            $this->db->join('employee_enrollment', 'employee_enrollment_attributes.e_id = employee_enrollment.id','LEFT');
            $this->db->join('policy', 'employee_enrollment.policy_no = policy.id','LEFT');
            $this->db->where('employee_enrollment_attributes.employee_id',$employee_no);
            $this->db->where('employee_enrollment.policy_no',$policy_id);
            $this->db->where('employee_enrollment_attributes.relationship',$relation);
            $query=$this->db->get();
                if($query->num_rows() > 0){
                    return $query->row_array();
                }else{
                    return false;
                }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
  }

  public function get_member_id($employee_id,$relation){
    try{
          $this->db->select('member_id');
          $this->db->from('employee_enrollment_attributes');
          $this->db->where('employee_id',$employee_id);
          $this->db->where('relationship',$relation);
          $query=$this->db->get();
          if($query->num_rows() > 0){
              return $query->row()->member_id;
          }
    }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
    }
  }
  
  public function get_policy_no($policy_id) {
        try{
            $this->db->select('*');
            $this->db->where('policy.id', $policy_id);
            $this->db->where('policy.policy_end_date >', date("Y-m-d"));
            $query = $this->db->get('policy');
            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result;
            } else {
                return false;
            }
        }catch(Exception $ex){
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
        }
    }
  
  public function get_e_card_new($policy_id,$employee_id,$corporate_id){
        try{
            //$corporate_id = $this->session->userdata('hr_login_id');
            $this->db->select('*');
            //$this->db->select('is_upload_from');
            $this->db->from('tbl_e_card');
            $this->db->where('corporate_id', $corporate_id);
            $this->db->where('policy_id', $policy_id);
            $this->db->where('is_deleted',0);
            $this->db->where('employee_id',$employee_id);
            $query =$this->db->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return false;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
  
  
  function get_corp_id_using_group_code($group_code){

        $sql = "SELECT * FROM corporate where group_code = '".$group_code."'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
        {
            $result = $query->row();
            return $result;
        }else{
          
            return 0;
        }
    }
  
  function get_other_benefit($id){

    $sql = "SELECT * FROM `policy_features` WHERE id = '".$id."'";

    $query = $this->db->query($sql);
    if($query->num_rows() > 0)
    {
      $result = $query->row();
            return $result;
    }
    else
    {
      return false;
    }
  }

}
