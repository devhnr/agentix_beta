<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ReportsController extends CI_Controller {
    function __construct(){
          parent::__construct();
  				if(!$this->session->userdata("loginHR")){
  						$redirection = str_replace('corporate/', '', base_url());
              redirect($redirection);
          }
          $this->load->model('Report_Model','rm');
          $this->policies = $this->need_lib->get_policies();
    }

    public function index(){
  			$data=array('file'=>'reports');
  	    $this->template->full_corporate_html_view($data);
  	}

    public function showReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $data = $this->rm->get_total_claim_reported($policy_id);
        $keys = ['Amount Claimed','Claim Count'];

        $output = '';
        if(!empty($keys)){
            $output.= '<tr><td>'.$keys[0].'</td><td>'.number_format($data['cashless_claimed']).'</td><td>'.number_format($data['reimbursement_claimed']).'</td><td>'.number_format(($data['cashless_claimed']+$data['reimbursement_claimed'])).'</td></tr>';
            $output.= '<tr><td>'.$keys[1].'</td><td>'.number_format($data['cashless_count']).'</td><td>'.number_format($data['reimbursement_count']).'</td><td>'.number_format(($data['cashless_count']+$data['reimbursement_count'])).'</td></tr>';
        }

        $res = array(
          'body_html' => $output,
          'cashless_claimed' => $data['cashless_claimed'],
          'cashless_count' => $data['cashless_count'],
          'reimbursement_claimed' => $data['reimbursement_claimed'],
          'reimbursement_count' => $data['reimbursement_count'],
        );
        echo json_encode($res);
      // echo json_encode($data);
    }

    public function showClaimStatusReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $data = $this->rm->get_claim_status_reported($policy_id);
        $keys = ['Cashless','Reimbursement'];

        $output = '';
        if(!empty($keys)){
            $output.= '<tr><td>'.$keys[0].'</td><td>'.number_format($data['outstanding_cashless']).'</td><td>'.number_format($data['paid_cashless']).'</td><td>'.number_format($data['rejected_cashless']).'</td><td>'.number_format(($data['outstanding_cashless']+$data['paid_cashless']+$data['rejected_cashless'])).'</td></tr>';
            $output.= '<tr><td>'.$keys[1].'</td><td>'.number_format($data['outstanding_reimbursement']).'</td><td>'.number_format($data['paid_reimbursement']).'</td><td>'.number_format($data['rejected_reimbursement']).'</td><td>'.number_format(($data['outstanding_reimbursement']+$data['paid_reimbursement']+$data['rejected_reimbursement'])).'</td></tr>';
        }

        $res = array(
          'body_html' => $output,
          'total_val' => (number_format($data['outstanding_cashless']+$data['outstanding_reimbursement'])),
          'total_val1' => (number_format($data['paid_cashless']+$data['paid_reimbursement'])),
          'total_val2' => (number_format($data['rejected_cashless']+$data['rejected_reimbursement'])),
          'total_val3' => (number_format($data['outstanding_cashless']+$data['paid_cashless']+$data['rejected_cashless']+ $data['outstanding_reimbursement']+$data['paid_reimbursement']+$data['rejected_reimbursement'])),
          'outstanding_cashless' => $data['outstanding_cashless'],
          'paid_cashless' => $data['paid_cashless'],
          'rejected_cashless' => $data['rejected_cashless'],
          'outstanding_reimbursement' => $data['outstanding_reimbursement'],
          'paid_reimbursement' => $data['paid_reimbursement'],
          'rejected_reimbursement' => $data['rejected_reimbursement'],

        );
        echo json_encode($res);
    }

    public function showMonthWiseClaimReports($value=''){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;

        $month = time();
        $output = '';
        $grand_cashless =0;
        $grand_reimbursement=0;
        $month_wise_casless =0;
        for ($i = 0; $i<= 11; $i++) {
          $month = strtotime('last month', $month);
          $months[] = date("M", $month);
          $month_no = date("n", $month);
          $month_wise = $this->rm->get_month_wise_claim_report($policy_id,$month_no);

          $grand_cashless += $month_wise['cashless'];
          $grand_reimbursement += $month_wise['reimbursement'];
          $month_cashless[] = $month_wise['cashless'];
          $month_reimbursement[] = $month_wise['reimbursement'];
          $output.= '<tr><td>'.$months[$i].'</td><td>'.number_format($month_wise['cashless']).'</td><td>'.number_format($month_wise['reimbursement']).'</td><td>'.number_format(($month_wise['cashless']+$month_wise['reimbursement'])).'</td></tr>';

        }

        $res = array(
          'body_html' => $output,
          'month_val' => number_format($grand_cashless),
          'month_val1' => number_format($grand_reimbursement),
          'month_val2' => (number_format($grand_cashless+$grand_reimbursement)),
          'months' =>$months,
          'month_cashless' => $month_cashless,
          'month_reimbursement' => $month_reimbursement,
        );
        echo json_encode($res);
    }

    public function showGenderWiseClaimReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $gender = $this->rm->get_gender_wise_claim_report($policy_id);
        $keys = ['Male','Female'];

        $output = '';
        if(!empty($keys)){
            $male_percentage = 0;
            $female_percentage = 0;
            if($gender['male_claim_amt'] != 0){
              $male_percentage = ($gender['male_claim_amt'] * 100) / ($gender['male_claim_amt']+$gender['female_claim_amt']);
            }
            if($gender['female_claim_amt'] != 0){
              $female_percentage = ($gender['female_claim_amt'] * 100) / ($gender['male_claim_amt']+$gender['female_claim_amt']);
            }
            $output.= '<tr><td>'.$keys[0].'</td><td>'.number_format($male_percentage,2,'.','').'</td><td>'.number_format($gender['male_claims']).'</td><td>'.number_format($gender['male_claim_amt']).'</td></tr>';
            $output.= '<tr><td>'.$keys[1].'</td><td>'.number_format($female_percentage,2,'.','').'</td><td>'.number_format($gender['female_claims']).'</td><td>'.number_format($gender['female_claim_amt']).'</td></tr>';
        }

        $res = array(
          'body_html' => $output,
          'total_val' => (number_format($male_percentage+$female_percentage)),
          'total_val1' => (number_format($gender['male_claims']+$gender['female_claims'])),
          'total_val2' => (number_format($gender['male_claim_amt']+$gender['female_claim_amt'])),
          'male_percentage' => $male_percentage,
          'female_percentage' => $female_percentage,
        );
        echo json_encode($res);
    }

    public function showRelationWiseClaimReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $keys = ['Daughter','Employee','Father','Mother','Sister','Son','Spouse'];
        $ralation_summary = $this->rm->get_ralation_wise_claim_report($policy_id);

        $output = '';
        $total_clims = 0;

        $settled_amt = 0;
        for($i=0;$i<count($keys);$i++){
          $total_clims += $ralation_summary['claim_count_'.$i];
          $settled_amt += $ralation_summary['settled_amt_'.$i];
          $relation_wise[] = $ralation_summary['claim_count_'.$i];
          $relations[] =$keys[$i];
        }

        if(!empty($keys)){
          for($i=0;$i<count($keys);$i++){
            $output.= '<tr><td>'.$keys[$i].'</td><td>'.number_format($ralation_summary['claim_count_'.$i]).'</td><td>'.number_format($ralation_summary['settled_amt_'.$i]).'</td></tr>';
          }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  number_format($total_clims),
            'total_val1' =>  number_format($settled_amt),
            'relations' =>  $relations,
            'relation_wise' => $relation_wise,
        );
        echo json_encode($res);

    }

    public function showAgeWiseClaimReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $keys = ['Closed','Outstanding','Paid','Rejected'];

        $age_summary = $this->rm->get_age_wise_claim_report($policy_id);

        $output = '';
        $total_val = 0;
        $total_val1 = 0;
        $total_val2 = 0;
        $total_val3 = 0;
        $total_val4 = 0;
        $total_val5 = 0;

        for($i=0;$i<count($keys);$i++){
            $total_val += $age_summary['under_26_'.$i];
            $total_val1 += $age_summary['under_36_'.$i];
            $total_val2 += $age_summary['under_46_'.$i];
            $total_val3 += $age_summary['under_56_'.$i];
            $total_val4 += $age_summary['under_66_'.$i];
            $total_val5 += $age_summary['greater_65_'.$i];
        }

        if(!empty($keys)){
            $closed_total = ($age_summary['under_26_0'] + $age_summary['under_36_0'] + $age_summary['under_46_0']+ $age_summary['under_56_0']+$age_summary['under_66_0']+$age_summary['greater_65_0']);
            $outstanding_total = ($age_summary['under_26_1'] + $age_summary['under_36_1'] + $age_summary['under_46_1']+ $age_summary['under_56_1']+$age_summary['under_66_1']+$age_summary['greater_65_1']);
            $paid_total = ($age_summary['under_26_2'] + $age_summary['under_36_2'] + $age_summary['under_46_2']+ $age_summary['under_56_2']+$age_summary['under_66_2']+$age_summary['greater_65_2']);
            $rejected_total = ($age_summary['under_26_3'] + $age_summary['under_36_3'] + $age_summary['under_46_3']+ $age_summary['under_56_3']+$age_summary['under_66_3']+$age_summary['greater_65_3']);

            $output.= '<tr><td>'.$keys[0].'</td><td>'.number_format($age_summary['under_26_0']).'</td><td>'.number_format($age_summary['under_36_0']).'</td><td>'.number_format($age_summary['under_46_0']).'</td><td>'.number_format($age_summary['under_56_0']).'</td><td>'.number_format($age_summary['under_66_0']).'</td>
            <td>'.number_format($age_summary['greater_65_0']).'</td><td>'.number_format($closed_total).'</td></tr>';

            $output.= '<tr><td>'.$keys[1].'</td><td>'.number_format($age_summary['under_26_1']).'</td><td>'.number_format($age_summary['under_36_1']).'</td><td>'.number_format($age_summary['under_46_1']).'</td><td>'.number_format($age_summary['under_56_1']).'</td><td>'.number_format($age_summary['under_66_1']).'</td>
            <td>'.number_format($age_summary['greater_65_1']).'</td><td>'.number_format($outstanding_total).'</td></tr>';

            $output.= '<tr><td>'.$keys[2].'</td><td>'.number_format($age_summary['under_26_2']).'</td><td>'.number_format($age_summary['under_36_2']).'</td><td>'.number_format($age_summary['under_46_2']).'</td><td>'.number_format($age_summary['under_56_2']).'</td><td>'.number_format($age_summary['under_66_2']).'</td>
            <td>'.number_format($age_summary['greater_65_2']).'</td><td>'.number_format($paid_total).'</td></tr>';

            $output.= '<tr><td>'.$keys[3].'</td><td>'.number_format($age_summary['under_26_3']).'</td><td>'.number_format($age_summary['under_36_3']).'</td><td>'.number_format($age_summary['under_46_3']).'</td><td>'.number_format($age_summary['under_56_3']).'</td><td>'.number_format($age_summary['under_66_3']).'</td>
            <td>'.number_format($age_summary['greater_65_3']).'</td><td>'.number_format($rejected_total).'</td></tr>';

        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  number_format($total_val),
            'total_val1' =>  number_format($total_val1),
            'total_val2' =>  number_format($total_val2),
            'total_val3' =>  number_format($total_val3),
            'total_val4' =>  number_format($total_val4),
            'total_val5' =>  number_format($total_val5),
            'total_val6' =>  (number_format($total_val+ $total_val1+ $total_val2+ $total_val3+ $total_val4 +$total_val5)),
            'age_wise' => $age_summary,
        );
        echo json_encode($res);

    }

    public function showTopClaimAmountReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $keys = $this->rm->get_top10_hospitals($policy_id);

        $output = '';
        $grand_total = 0;
        $grand_count = 0;
        if(!empty($keys)){
            for($i=0;$i<count($keys);$i++){
              $grand_total +=$keys[$i]['sum_claim'];
              $grand_count +=$keys[$i]['claim_count'];
              $hospital_name[] = $keys[$i]['hospital_name'];
              $claim_amt[] = $keys[$i]['sum_claim'];
              $output.= '<tr><td>'.$keys[$i]['hospital_name'].'</td><td>'.number_format($keys[$i]['sum_claim']).'</td><td>'.number_format($keys[$i]['claim_count']).'</td></tr>';
            }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  number_format($grand_total),
            'total_val1' => number_format($grand_count),
            'hospital_name' => $hospital_name,
            'claim_amt' => $claim_amt,
        );
        echo json_encode($res);

    }

    public function showTopPaidClaimAmountReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $keys = $this->rm->get_top10_paid_hospitals($policy_id);

        $output = '';
        $grand_total = 0;
        $grand_count = 0;
        if(!empty($keys)){
            for($i=0;$i<count($keys);$i++){
              $grand_total +=$keys[$i]['sum_claim'];
              $grand_count +=$keys[$i]['claim_count'];
              $hospital_name[] = $keys[$i]['hospital_name'];
              $claim_amt[] = $keys[$i]['sum_claim'];
              $output.= '<tr><td>'.$keys[$i]['hospital_name'].'</td><td>'.number_format($keys[$i]['sum_claim']).'</td><td>'.number_format($keys[$i]['claim_count']).'</td></tr>';
            }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  number_format($grand_total),
            'total_val1' => number_format($grand_count),
            'hospital_name' => $hospital_name,
            'claim_amt' => $claim_amt,
        );
        echo json_encode($res);

    }

    public function showSumInsuredReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;

        $ralation_summary = $this->rm->get_ralation_wise_count_report($policy_id);
        $sum_insured = $this->rm->get_sum_insured_by_policy($policy_id);
        $keys = ['Daughter','Employee','Father','Mother','Sister','Son','Spouse'];
        $output = '';
        $total_clims = 0;

        for($i=0;$i<count($keys);$i++){
          $total_clims += $ralation_summary['claim_count_'.$i];
          $relations[] =$keys[$i];
          $employee_count[] = $ralation_summary['claim_count_'.$i];
        }

        if(!empty($keys)){
          // for($i=0;$i<count($keys);$i++){
          $output.= '<tr><td>'.$keys[0].'</td><td>'.number_format($ralation_summary['claim_count_0']).'</td><td rowspan="7" style="padding: 15.9% !important;">'.number_format($sum_insured['sum_insured']).'</td></tr>';
          $output.= '<tr><td>'.$keys[1].'</td><td>'.$ralation_summary['claim_count_1'].'</td></tr>';
          $output.= '<tr><td>'.$keys[2].'</td><td>'.$ralation_summary['claim_count_2'].'</td></tr>';
          $output.= '<tr><td>'.$keys[3].'</td><td>'.$ralation_summary['claim_count_3'].'</td></tr>';
          $output.= '<tr><td>'.$keys[4].'</td><td>'.$ralation_summary['claim_count_4'].'</td></tr>';
          $output.= '<tr><td>'.$keys[5].'</td><td>'.$ralation_summary['claim_count_5'].'</td></tr>';
          $output.= '<tr><td>'.$keys[6].'</td><td>'.$ralation_summary['claim_count_6'].'</td></tr>';

        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  number_format($total_clims),
            'total_val1' =>  number_format($sum_insured['sum_insured']),
            'relationship' =>  $relations,
            'employee_count' => $employee_count,
        );
        echo json_encode($res);
    }

    public function showEndorsementReports(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $keys = ['Employee Addition','Dependent Addition','Employee Correction','Dependent Correction','Employee Deletion','Dependent Deletion'];

        $month = time();
        $output = '';
        $total_employee_addition =0;
        $total_dependent_addition=0;
        $total_employee_correction =0;
        $total_dependent_correction =0;
        $total_employee_deletion =0;
        $total_dependent_deletion =0;
        for ($i = 0; $i<= 11; $i++) {
            $month = strtotime('last month', $month);
            $months[] = date("M", $month);
            $month_no = date("n", $month);
            $month_wise = $this->rm->get_month_wise_endorsement_report($policy_id,$month_no);

            $total_employee_addition += $month_wise['employee_addition'];
            $total_dependent_addition += $month_wise['dependent_addition'];
            $total_employee_correction += $month_wise['employee_correction'];
            $total_dependent_correction += $month_wise['dependent_correction'];
            $total_employee_deletion += $month_wise['employee_deletion'];
            $total_dependent_deletion += $month_wise['dependent_deletion'];

            $employee_addition[] = $month_wise['employee_addition'];
            $dependent_addition[] = $month_wise['dependent_addition'];
            $employee_correction[] = $month_wise['employee_correction'];
            $dependent_correction[] = $month_wise['dependent_correction'];
            $employee_deletion[] = $month_wise['employee_deletion'];
            $dependent_deletion[] = $month_wise['dependent_deletion'];

            $output.= '<tr><td>'.$months[$i].'</td><td>'.number_format($month_wise['employee_addition']).'</td><td>'.number_format($month_wise['dependent_addition']).'</td><td>'.number_format($month_wise['employee_correction']).'</td><td>'.number_format($month_wise['dependent_correction']).'</td><td>'.number_format($month_wise['employee_deletion']).'</td><td>'.number_format($month_wise['dependent_deletion']).'</td></tr>';
        }

        $res = array(
            'body_html'  =>  $output,
            'total_val'  =>  number_format($total_employee_addition),
            'total_val1' =>  number_format($total_dependent_addition),
            'total_val2' =>  number_format($total_employee_correction),
            'total_val3' =>  number_format($total_dependent_correction),
            'total_val4' =>  number_format($total_employee_deletion),
            'total_val5' =>  number_format($total_dependent_deletion),
            'months'     =>  $months,
            'employee_addition' => $employee_addition,
            'dependent_addition' => $dependent_addition,
            'employee_correction' => $employee_correction,
            'dependent_correction' => $dependent_correction,
            'employee_deletion' => $employee_deletion,
            'dependent_deletion' => $dependent_deletion,

        );
        echo json_encode($res);
    }

}
