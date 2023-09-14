<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Summary extends CI_Controller {
    function __construct(){
          parent::__construct();
  				// if(!$this->session->userdata("loginHR")){
  				// 		$redirection = str_replace('corporate/', '', base_url());
          //     redirect($redirection);
          // }
          $this->load->model('Summary_Model','sm');

    }

    public function showSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $premium = $this->sm->get_premium_by_policy($policy_id,$corporate_id);

        $claim_amount = $this->sm->get_claim_paid_by_policy($policy_id,$corporate_id);
        $policy_start_date = $_POST['policy_start_date'];
        $first_date = new DateTime(date('Y-m-d', strtotime($policy_start_date)));
        $second_date = new DateTime(date('Y-m-d', strtotime('now')));
        $difference = $first_date->diff($second_date);
        $no_of_days = $difference->days + 1;


        $first_date = new DateTime(date('Y-m-d', strtotime($policy_start_date)));
        $third_date = new DateTime(date('Y-m-d', strtotime($_POST['policy_end_date'])));

        $policy_days = $first_date->diff($third_date);
        $total_policy_days = $policy_days->days + 1;

        // $output['policy_text'] = $result[0];
        $output['premium'] = (!empty($premium))?$premium : '';

        if(!empty($premium['second'])){
            $total_premium = (!empty($premium['second'])) ? $premium['second']['total_premium']:'0';
            $earned_premium = $total_premium * ($no_of_days/$total_policy_days);

            $claim_ratio = (($claim_amount['claim_paid'] + $claim_amount['claim_under_process']) * 100) / $total_premium;
            $earned_ratio = (($claim_amount['claim_paid'] + $claim_amount['claim_under_process']) * 100) / $earned_premium;

            $output['earned_premium'] = (!empty($earned_premium))?$earned_premium : '';
            $output['claim_paid_amount'] = (!empty($claim_amount))?$claim_amount : '';
            $output['claim_ratio'] = (!empty($claim_ratio))?$claim_ratio : '';
            $output['earned_ratio'] = (!empty($earned_ratio))?$earned_ratio : '';
        }

         echo json_encode($output);
    }

    public function showEnrollmentSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;

        $inception = $this->sm->get_enrollment_inception($policy_id,$corporate_id);
        $addition = $this->sm->get_enrollment_addition($policy_id,$corporate_id);
        $deletion = $this->sm->get_enrollment_deletion($policy_id,$corporate_id);

        $keys = array_keys($inception);
        $inception['total'] = $inception['Employee'] + $inception['Spouse'] + $inception['Children'] + $inception['Parents'] + ($inception['Others'] - $inception['Employee'] - $inception['Spouse']- $inception['Children'] - $inception['Parents']);
        $addition['total'] = $addition['Employee'] + $addition['Spouse'] + $addition['Children'] + $addition['Parents'] + ($addition['Others'] - $addition['Employee'] -$addition['Spouse']- $addition['Children'] - $addition['Parents']);
        $deletion['total'] = $deletion['Employee'] + $deletion['Spouse'] + $deletion['Children'] + $deletion['Parents'] + ($deletion['Others'] - $deletion['Employee'] -$deletion['Spouse']- $deletion['Children'] - $deletion['Parents']);
        $active['total'] = $inception['total'] + $addition['total'] - $deletion['total'];

        $output = '';
        if(!empty($inception)){
            $active['Employee'] = ($inception['Employee']+$addition['Employee']-$deletion['Employee']);
            $active['Spouse'] = ($inception['Spouse']+$addition['Spouse']-$deletion['Spouse']);
            $active['Children'] = ($inception['Children']+$addition['Children']-$deletion['Children']);
            $active['Parents'] = ($inception['Parents']+$addition['Parents']-$deletion['Parents']);
            $active['Others'] =($inception['Others']+$addition['Others']-$deletion['Others']);
						$output.= '<tr><td>'.$keys[0].'</td><td>'.$inception['Employee'].'</td><td>'.$addition['Employee'].'</td><td>'.$deletion['Employee'].'</td><td>'.$active['Employee'].'</td></tr>';
            $output.= '<tr><td>'.$keys[1].'</td><td>'.$inception['Spouse'].'</td><td>'.$addition['Spouse'].'</td><td>'.$deletion['Spouse'].'</td><td>'.$active['Spouse'].'</td></tr>';
            $output.= '<tr><td>'.$keys[2].'</td><td>'.$inception['Children'].'</td><td>'.$addition['Children'].'</td><td>'.$deletion['Children'].'</td><td>'.$active['Children'].'</td></tr>';
            $output.= '<tr><td>'.$keys[3].'</td><td>'.$inception['Parents'].'</td><td>'.$addition['Parents'].'</td><td>'.$deletion['Parents'].'</td><td>'.$active['Parents'].'</td></tr>';
            $output.= '<tr><td>'.$keys[4].'</td><td>'.($inception['Others'] - $inception['Employee'] - $inception['Spouse']- $inception['Children'] - $inception['Parents']).'</td>
                    <td>'.($addition['Others'] - $addition['Employee'] -$addition['Spouse']- $addition['Children'] - $addition['Parents']).'</td>
                    <td>'.($deletion['Others'] - $deletion['Employee'] -$deletion['Spouse']- $deletion['Children'] - $deletion['Parents']).'</td>
                    <td>'.($active['Others'] - $active['Employee'] - $active['Spouse'] - $active['Children'] - $active['Parents']) .'</td></tr>';
				}

        $res = array(
            'body_html' => $output,
            'total_val' => $inception['total'],
            'total_val1' => $addition['total'],
            'total_val2' => $deletion['total'],
            'total_val3' => $active['total'],
        );
        echo json_encode($res);
    }

    public function showClaimStatusSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;

        $claim_status_summary = $this->sm->get_claim_summary_by_policy($policy_id,$corporate_id);
        $keys = ['Closed','Outstanding','Paid','Rejected'];

        $claim_cashless['total'] = $claim_status_summary['closed_cashless'] + $claim_status_summary['outstanding_cashless'] + $claim_status_summary['paid_cashless'] + $claim_status_summary['rejected_cashless'];
        $amount_claim['total'] = $claim_status_summary['closed_cashless_claimed'] + $claim_status_summary['outstanding_cashless_claimed'] + $claim_status_summary['paid_cashless_claimed'] + $claim_status_summary['rejected_cashless_claimed'];
        $amount_incurred['total'] = $claim_status_summary['closed_cashless_incurred'] + $claim_status_summary['outstanding_cashless_incurred'] + $claim_status_summary['paid_cashless_incurred'] + $claim_status_summary['rejected_cashless_incurred'];

        $claim_reimbursement['total'] = $claim_status_summary['closed_reimbursement'] + $claim_status_summary['outstanding_reimbursement'] + $claim_status_summary['paid_reimbursement'] + $claim_status_summary['rejected_reimbursement'];
        $amount_reimbursement_claim['total'] = $claim_status_summary['closed_reimbursement_claimed'] + $claim_status_summary['outstanding_reimbursement_claimed'] + $claim_status_summary['paid_reimbursement_claimed'] + $claim_status_summary['rejected_reimbursement_claimed'];
        $amount_reimbursement_incurred['total'] = $claim_status_summary['closed_reimbursement_incurred'] + $claim_status_summary['outstanding_reimbursement_incurred'] + $claim_status_summary['paid_reimbursement_incurred'] + $claim_status_summary['rejected_reimbursement_incurred'];

        $total_closed_claim['total'] = ($claim_status_summary['closed_cashless']+$claim_status_summary['closed_reimbursement']) + ($claim_status_summary['outstanding_cashless']+$claim_status_summary['outstanding_reimbursement']) + ($claim_status_summary['paid_cashless']+$claim_status_summary['paid_reimbursement']) + ($claim_status_summary['rejected_cashless']+$claim_status_summary['rejected_reimbursement']);
        $total_claim_amount['total'] = ($claim_status_summary['closed_cashless_claimed']+$claim_status_summary['closed_reimbursement_claimed']) + ($claim_status_summary['outstanding_cashless_claimed']+$claim_status_summary['outstanding_reimbursement_claimed']) + ($claim_status_summary['paid_cashless_claimed']+$claim_status_summary['paid_reimbursement_claimed']) + ($claim_status_summary['rejected_cashless_claimed']+$claim_status_summary['rejected_reimbursement_claimed']);
        $total_incurred_amount['total'] = ($claim_status_summary['closed_cashless_incurred']+$claim_status_summary['closed_reimbursement_incurred']) + ($claim_status_summary['outstanding_cashless_incurred']+$claim_status_summary['outstanding_reimbursement_incurred']) + ($claim_status_summary['paid_cashless_incurred']+$claim_status_summary['paid_reimbursement_incurred']) + ($claim_status_summary['rejected_cashless_incurred']+$claim_status_summary['rejected_reimbursement_incurred']);

        $output = '';
        if(!empty($keys)){
            $output.= '<tr><td>'.$keys[0].'</td><td>'.$claim_status_summary['closed_cashless'].'</td><td>'.$claim_status_summary['closed_cashless_claimed'].'</td><td>'.$claim_status_summary['closed_cashless_incurred'].'</td><td>'.$claim_status_summary['closed_reimbursement'].'</td><td>'.$claim_status_summary['closed_reimbursement_claimed'].'</td><td>'.$claim_status_summary['closed_reimbursement_incurred'].'</td>
            <td>'.($claim_status_summary['closed_cashless']+$claim_status_summary['closed_reimbursement']).'</td>
            <td>'.($claim_status_summary['closed_cashless_claimed']+$claim_status_summary['closed_reimbursement_claimed']).'</td>
            <td>'.($claim_status_summary['closed_cashless_incurred']+$claim_status_summary['closed_reimbursement_incurred']).'</td>
            </tr>';
            $output.= '<tr><td>'.$keys[1].'</td><td>'.$claim_status_summary['outstanding_cashless'].'</td><td>'.$claim_status_summary['outstanding_cashless_claimed'].'</td><td>'.$claim_status_summary['outstanding_cashless_incurred'].'</td><td>'.$claim_status_summary['outstanding_reimbursement'].'</td><td>'.$claim_status_summary['outstanding_reimbursement_claimed'].'</td><td>'.$claim_status_summary['outstanding_reimbursement_incurred'].'</td>
            <td>'.($claim_status_summary['outstanding_cashless']+$claim_status_summary['outstanding_reimbursement']).'</td>
            <td>'.($claim_status_summary['outstanding_cashless_claimed']+$claim_status_summary['outstanding_reimbursement_claimed']).'</td>
            <td>'.($claim_status_summary['outstanding_cashless_incurred']+$claim_status_summary['outstanding_reimbursement_incurred']).'</td>
            </tr>';
            $output.= '<tr><td>'.$keys[2].'</td><td>'.$claim_status_summary['paid_cashless'].'</td><td>'.$claim_status_summary['paid_cashless_claimed'].'</td><td>'.$claim_status_summary['paid_cashless_incurred'].'</td><td>'.$claim_status_summary['paid_reimbursement'].'</td><td>'.$claim_status_summary['paid_reimbursement_claimed'].'</td><td>'.$claim_status_summary['paid_reimbursement_incurred'].'</td>
            <td>'.($claim_status_summary['paid_cashless']+$claim_status_summary['paid_reimbursement']).'</td>
            <td>'.($claim_status_summary['paid_cashless_claimed']+$claim_status_summary['paid_reimbursement_claimed']).'</td>
            <td>'.($claim_status_summary['paid_cashless_incurred']+$claim_status_summary['paid_reimbursement_incurred']).'</td>
            </tr>';
            $output.= '<tr><td>'.$keys[3].'</td><td>'.$claim_status_summary['rejected_cashless'].'</td><td>'.$claim_status_summary['rejected_cashless_claimed'].'</td><td>'.$claim_status_summary['rejected_cashless_incurred'].'</td><td>'.$claim_status_summary['rejected_reimbursement'].'</td><td>'.$claim_status_summary['rejected_reimbursement_claimed'].'</td><td>'.$claim_status_summary['rejected_reimbursement_incurred'].'</td>
            <td>'.($claim_status_summary['rejected_cashless']+$claim_status_summary['rejected_reimbursement']).'</td>
            <td>'.($claim_status_summary['rejected_cashless_claimed']+$claim_status_summary['rejected_reimbursement_claimed']).'</td>
            <td>'.($claim_status_summary['rejected_cashless_incurred']+$claim_status_summary['rejected_reimbursement_incurred']).'</td>
            </tr>';
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  $claim_cashless['total'],
            'total_val1' =>  $amount_claim['total'],
            'total_val2' =>  $amount_incurred['total'],
            'total_val3' =>  $claim_reimbursement['total'],
            'total_val4' =>  $amount_reimbursement_claim['total'],
            'total_val5' =>  $amount_reimbursement_incurred['total'],
            'total_val6' =>  $total_closed_claim['total'],
            'total_val7' =>  $total_claim_amount['total'],
            'total_val8' =>  $total_incurred_amount['total'],
        );
        echo json_encode($res);
    }

    public function showSettledACS(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $settled_acs = $this->sm->get_settled_acs_by_policy($policy_id,$corporate_id);
        $keys = ['Settled'];
        $output = '';
        if(!empty($settled_acs['paid_claim_count'])){
          $cashless_acs = $settled_acs['claim_paid_amount'] / $settled_acs['paid_claim_count'];
          $reimbursement_acs = $settled_acs['claim_paid_reimbursement_amount'] / $settled_acs['paid_claim_reimbursement_count'];
          $total_acs = ($settled_acs['claim_paid_amount']+$settled_acs['claim_paid_reimbursement_amount']) / ($settled_acs['paid_claim_count'] +$settled_acs['paid_claim_reimbursement_count']);
          $output.= '<tr><td>'.$keys[0].'</td><td>'.$settled_acs['claim_count'].'</td><td>'.$settled_acs['paid_claim_count'].'</td><td>₹ '.$settled_acs['claim_paid_amount'].'</td><td>'.$cashless_acs.'</td>
          <td>'.$settled_acs['claim_reimbursement_count'].'</td><td>'.$settled_acs['paid_claim_reimbursement_count'].'</td><td>₹ '.$settled_acs['claim_paid_reimbursement_amount'].'</td><td>'.$reimbursement_acs.'</td>
          <td>'.($settled_acs['claim_count'] + $settled_acs['claim_reimbursement_count']).'</td><td>'.($settled_acs['paid_claim_count'] +$settled_acs['paid_claim_reimbursement_count']).'</td><td>₹ '.($settled_acs['claim_paid_amount']+$settled_acs['claim_paid_reimbursement_amount']).'</td><td>'.$total_acs.'</td></tr>';
        }

        echo json_encode($output);
    }

    public function showAgeWiseSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $keys = ['0-25','26-35','36-45','46-55','56-65','> 65'];
        $age_summary = $this->sm->get_age_wise_claim_summary($policy_id,$corporate_id);
        // echo '<pre>'; print_r($age_summary);exit;
        $output = '';
        $total_clims = 0;
        $paid_clims = 0;
        $settled_amt = 0;

        for($i=0;$i<count($keys);$i++){
          $total_clims += $age_summary['claim_count_'.$i];
          $paid_clims += $age_summary['paid_claim_'.$i];
          $settled_amt += $age_summary['settled_amt_'.$i];
        }

        if(!empty($keys)){
          for($i=0;$i<count($keys);$i++){
            if($age_summary['paid_claim_'.$i] != 0){
              $acs = $age_summary['settled_amt_'.$i]/ $age_summary['paid_claim_'.$i];

            }else {
              $acs = '-';
            }
            $percentage = ($age_summary['claim_count_'.$i]*100)/$total_clims;
            $output.= '<tr><td>'.$keys[$i].'</td><td>'.$age_summary['claim_count_'.$i].'</td><td>'.$age_summary['paid_claim_'.$i].'</td><td>'.$age_summary['settled_amt_'.$i].'</td><td>'.$percentage.'</td><td>'.$acs.'</td></tr>';

          }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_clims,
            'total_val1' =>  $paid_clims,
            'total_val2' => $settled_amt,
            'total_val3' => ($total_clims *100)/$total_clims,
            'total_val4' => ($settled_amt/$paid_clims),
        );
        echo json_encode($res);

    }

    public function showClaimTATSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $keys = ['8-17','18-30','> 30'];
        $tat_summary = $this->sm->get_tat_claim_summary($policy_id,$corporate_id);
        // echo '<pre>'; print_r($tat_summary);exit;
        $output = '';

        if(!empty($keys)){
            $total_clims = 0;
            $grand_total_percentage = 0;
            for($i=0;$i<count($keys);$i++){
              $total_clims += $tat_summary['tat_count_'.$i];
              if($tat_summary['tat_count_'.$i] != 0){
                $percentage = round(($tat_summary['tat_count_'.$i] *100)/$total_clims);
                $grand_total_percentage += ($percentage*100)/100;
              }else {
                $percentage = '-';
              }
              $output.= '<tr><td>'.$keys[$i].' days</td><td>'.$tat_summary['tat_count_'.$i].'</td><td>'.$percentage.'</td></tr>';
            }
        }
        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_clims,
            'total_val1' =>  $grand_total_percentage,
        );
        echo json_encode($res);

    }

    public function showOutstandingClaimTATSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $keys = ['8-17','18-30','> 30'];
        $tat_summary = $this->sm->get_outstanding_tat_claim_summary($policy_id,$corporate_id);
        // echo '<pre>'; print_r($tat_summary);exit;
        $output = '';
        if(!empty($keys)){
            $total_clims = 0;
            $grand_total_percentage = 0;
            for($i=0;$i<count($keys);$i++){
              $total_clims += $tat_summary['tat_count_'.$i];
              if($tat_summary['tat_count_'.$i] != 0){
                $percentage = round(($tat_summary['tat_count_'.$i] *100)/$total_clims);
                $grand_total_percentage += ($percentage*100)/100;
              }else {
                $percentage = '-';
              }
              $output.= '<tr><td>'.$keys[$i].' days</td><td>'.$tat_summary['tat_count_'.$i].'</td><td>'.$percentage.'</td></tr>';
            }
        }
        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_clims,
            'total_val1' =>  $grand_total_percentage,
        );
        echo json_encode($res);

    }

    public function showRelationWiseSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $keys = ['Daughter','Employee','Father','Mother','Sister','Son','Spouse'];
        $ralation_summary = $this->sm->get_ralation_wise_claim_summary($policy_id,$corporate_id);

        $output = '';
        $total_clims = 0;
        $paid_clims = 0;
        $settled_amt = 0;
        for($i=0;$i<count($keys);$i++){
          $total_clims += $ralation_summary['claim_count_'.$i];
          $paid_clims += $ralation_summary['paid_claim_'.$i];
          $settled_amt += $ralation_summary['settled_amt_'.$i];
        }

        if(!empty($keys)){
          for($i=0;$i<count($keys);$i++){
            if($ralation_summary['paid_claim_'.$i] != 0){
              $acs = $ralation_summary['settled_amt_'.$i]/ $ralation_summary['paid_claim_'.$i];
            }else {
              $acs = '-';
            }
            $percentage = ($ralation_summary['claim_count_'.$i]*100)/$total_clims;
            $output.= '<tr><td>'.$keys[$i].'</td><td>'.$ralation_summary['claim_count_'.$i].'</td><td>'.$ralation_summary['paid_claim_'.$i].'</td><td>'.$ralation_summary['settled_amt_'.$i].'</td><td>'.$percentage.'</td><td>'.$acs.'</td></tr>';

          }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_clims,
            'total_val1' =>  $paid_clims,
            'total_val2' => $settled_amt,
            'total_val3' => ($total_clims * 100)/$total_clims,
            'total_val4' => ($settled_amt/$paid_clims),
        );
        echo json_encode($res);

    }

    public function showNetworkWiseSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;

        $network = $this->sm->get_network_claim_summary($policy_id,$corporate_id);
        $keys = ['Network','Non Network'];
        // $total_acs = ($settled_amt/$paid_clims);
        $output = '';
        if(!empty($keys)){
            $total_clims = 0;
            $paid_clims = 0;
            $settled_amt = 0;
            $total_acs = 0;

            if($network['paid_cashless'] != 0){
                $acs1 = $network['settled_cashless'] / $network['paid_cashless'];
                $acs2 = $network['settled_reimbursement'] / $network['paid_reimbursement'];
                $acs3 = ($network['settled_cashless']+$network['settled_reimbursement']) / ($network['paid_cashless']+$network['paid_reimbursement']);

                if($network['paid_cashless_1'] !=0){
                  $acs4 = $network['settled_cashless_1'] / $network['paid_cashless_1'];
                  $acs5 = $network['settled_reimbursement_1'] / $network['paid_reimbursement_1'];
                  $acs6 = ($network['settled_cashless_1']+$network['settled_reimbursement_1']) / ($network['paid_cashless_1']+$network['paid_reimbursement_1']);
                }else{
                    $acs4 ='-';
                    $acs5='-';
                    $acs6 ='-';
                }

                $total_clims = ($network['cashless_count'] + $network['reimbursement_count'] + $network['cashless_count_1'] + $network['reimbursement_count_1']);
                $paid_clims = ($network['paid_cashless'] + $network['paid_reimbursement'] + $network['paid_cashless_1'] + $network['paid_reimbursement_1']);
                $settled_amt = ($network['settled_cashless'] + $network['settled_reimbursement'] + $network['settled_cashless_1'] + $network['paid_reimbursement_1']);

                $total_acs = ($settled_amt/$paid_clims);
                $total_percentage1 = round((($network['cashless_count'] + $network['reimbursement_count']) * 100)/$total_clims);
                $total_percentage2 = round((($network['cashless_count_1'] + $network['reimbursement_count_1']) * 100)/$total_clims);
                $grand_percentage = ($total_clims*100)/$total_clims;
            }else {
                $acs1 = '-';
                $acs2 = '-';
                $acs3 = '-';
                $acs4 = '-';
                $acs5 = '-';
                $acs6 = '-';
                $total_percentage1='-';
                $total_percentage2='-';
                $grand_percentage = '-';
            }
            $output.= '<tr><td rowspan="4">'.$keys[0].'</td><tr><td>Cashless</td><td>'.$network['cashless_count'].'</td><td>'.$network['paid_cashless'].'</td><td>'.$network['settled_cashless'].'</td><td>'.$acs1.'</td><td rowspan="4" style="padding: 4.9% !important;">'.$total_percentage1.'</td></tr>
            <tr><td>Reimbursement</td><td>'.$network['reimbursement_count'].'</td><td>'.$network['paid_reimbursement'].'</td><td>'.$network['settled_reimbursement'].'</td><td>'.$acs2.'</td></tr>
            <tr><td>Total</td><td>'.($network['cashless_count']+$network['reimbursement_count']).'</td>
            <td>'.($network['paid_cashless']+$network['paid_reimbursement']).'</td><td>'.($network['settled_cashless']+$network['settled_reimbursement']).'</td><td>'.$acs3.'</td></tr></tr>';

            $output.= '<tr><td rowspan="4">'.$keys[1].'</td><tr><td>Cashless</td><td>'.$network['cashless_count_1'].'</td><td>'.$network['paid_cashless_1'].'</td><td>'.$network['settled_cashless_1'].'</td><td>'.$acs4.'</td><td rowspan="4" style="padding: 4.9% !important;">'.$total_percentage2.'</td></tr>
            <tr><td>Reimbursement</td><td>'.$network['reimbursement_count_1'].'</td><td>'.$network['paid_reimbursement_1'].'</td><td>'.$network['settled_reimbursement_1'].'</td><td>'.$acs5.'</td></tr>
            <tr><td>Total</td><td>'.($network['cashless_count_1']+$network['reimbursement_count_1']).'</td>
            <td>'.($network['paid_cashless_1']+$network['paid_reimbursement_1']).'</td><td>'.($network['settled_cashless_1']+$network['settled_reimbursement_1']).'</td><td>'.$acs6.'</td></tr></tr>';

        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_clims,
            'total_val1' =>  $paid_clims,
            'total_val2' =>  $settled_amt,
            'total_val3' =>  $total_acs,
            'total_val4' =>  $grand_percentage,
        );
        echo json_encode($res);
    }

    public function showAmountBandClaimSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $keys = ['Upto 25 K','> 25K to 50K','> 50 K to 1 Lac','> 1 Lac to 2 Lac','> 2 Lac'];
        $amount_summary = $this->sm->get_amount_band_claim_summary($policy_id,$corporate_id);
        // echo '<pre>'; print_r($age_summary);exit;
        $output = '';
        $total_clims = 0;
        $paid_clims = 0;
        $settled_amt = 0;
        for($i=0;$i<count($keys);$i++){
          $total_clims += $amount_summary['claim_count_'.$i];
          $paid_clims += $amount_summary['paid_claim_'.$i];
          $settled_amt += $amount_summary['settled_amt_'.$i];
        }

        if(!empty($keys)){
            for($i=0;$i<count($keys);$i++){
              if($amount_summary['paid_claim_'.$i] != 0){
                  $acs = $amount_summary['settled_amt_'.$i]/ $amount_summary['paid_claim_'.$i];
                  $paid_clims += $amount_summary['paid_claim_'.$i];
              }else {
                  $acs = '-';
                  $percentage = 0;
                  $paid_clims += 0;
              }
              $percentage = ($amount_summary['claim_count_'.$i] *100)/$total_clims;
              $output.= '<tr><td>'.$keys[$i].'</td><td>'.$amount_summary['claim_count_'.$i].'</td><td>'.$amount_summary['paid_claim_'.$i].'</td><td>'.$amount_summary['settled_amt_'.$i].'</td><td>'.$percentage.'</td><td>'.$acs.'</td></tr>';
            }
        }


        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_clims,
            'total_val1' => $paid_clims,
            'total_val2' => $settled_amt,
            'total_val3' => ($total_clims * 100)/$total_clims,
            'total_val4' => ($settled_amt/$paid_clims),
        );
        echo json_encode($res);

    }

    public function showLevelCareClaimSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $keys = ['Primary','Secondary','Tertiary','Intermediate','Intensive','General'];
        $level_care = $this->sm->get_level_care_claim_summary($policy_id,$corporate_id);
        $output = '';
        if(!empty($keys)){
            $total_clims = 0;
            $paid_clims = 0;
            $settled_amt = 0;
            $total_acs = 0;

            $total_clims1 = 0;
            $paid_clims1 = 0;
            $settled_amt1 = 0;
            $total_acs1 = 0;
            for($i=0;$i<count($keys);$i++){
              if($level_care['medical_paid_claim_'.$i] != 0){
                  $acs = $level_care['medical_settled_amt_'.$i]/ $level_care['medical_paid_claim_'.$i];
                  $total_clims += $level_care['medical_claim_count_'.$i];
                  $paid_clims += $level_care['medical_paid_claim_'.$i];
                  $settled_amt += $level_care['medical_settled_amt_'.$i];
                  $total_acs += ($settled_amt/$paid_clims);
              }else {
                  $acs = '-';
                  $total_clims += 0;
                  $paid_clims += 0;
                  $settled_amt += 0;
                  $total_acs += 0;
              }

              if($level_care['surgical_paid_claim_'.$i] != 0){
                  $acs1 = $level_care['surgical_settled_amt_'.$i]/ $level_care['surgical_paid_claim_'.$i];
                  $total_clims1 += $level_care['surgical_claim_count_'.$i];
                  $paid_clims1 += $level_care['surgical_paid_claim_'.$i];
                  $settled_amt1 += $level_care['surgical_settled_amt_'.$i];
                  $total_acs1 += ($settled_amt1/$paid_clims1);
              }else {
                  $acs1 = '-';
                  $total_clims1 += 0;
                  $paid_clims1 += 0;
                  $settled_amt1 += 0;
                  $total_acs1 += 0;
              }


              $output.= '<tr><td>'.$keys[$i].'</td><td>'.$level_care['medical_claim_count_'.$i].'</td><td>'.$level_care['medical_paid_claim_'.$i].'</td><td>'.$level_care['medical_settled_amt_'.$i].'</td><td>'.$acs.'</td>
                        <td>'.$level_care['surgical_claim_count_'.$i].'</td><td>'.$level_care['surgical_paid_claim_'.$i].'</td><td>'.$level_care['surgical_settled_amt_'.$i].'</td><td>'.$acs1.'</td></tr>';

            }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_clims,
            'total_val1' => $paid_clims,
            'total_val2' => $settled_amt,
            'total_val3' => $total_acs,
            'total_val4' => $total_clims1,
            'total_val5' => $paid_clims1,
            'total_val6' => $settled_amt1,
            'total_val7' => $total_acs1,
        );
        echo json_encode($res);

    }


    public function showDiseaseCategoryClaimSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;

        $keys = [
          'Certain conditions originating in the perinatal period',
          'Certain infectious and parasitic diseases',
          'Covid - 19',
          'Diseases of the digestive system',
          'Diseases of the eye and adnexa',
          'Diseases of the genitourinary system',
          'Diseases of the nervous system',
          'Diseases of the respiratory system',
          'Injury,poisoning and certain other consequences of external causes',
          'Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified',
        ];
        $diseases = $this->sm->get_disease_category_claim_summary($policy_id,$corporate_id);

        $output = '';
        if(!empty($keys)){
            $total_cashless_paid = 0;
            $total_settled_amt = 0;
            $total_reimbursement_paid = 0;
            $total_settled_amt1 = 0;
            $total_paid1 = 0;
            $total_settled = 0;

            for($i=0;$i<count($keys);$i++){
              if($diseases['cashless_claim_'.$i] != 0){
                  $total_cashless_paid += $diseases['cashless_claim_'.$i];
              }
              if($diseases['cashless_settled_amt_'.$i] != 0){
                $total_settled_amt += $diseases['cashless_settled_amt_'.$i];
              }

              if($diseases['reimbursement_claim_'.$i] != 0){
                $total_reimbursement_paid += $diseases['reimbursement_claim_'.$i];
              }

              if($diseases['reimbursement_settled_amt_'.$i] != 0){
                $total_settled_amt1 += $diseases['reimbursement_settled_amt_'.$i];
              }

              $output.= '<tr><td>'.$keys[$i].'</td><td>'.$diseases['cashless_claim_'.$i].'</td><td>'.$diseases['cashless_settled_amt_'.$i].'</td><td>'.$diseases['reimbursement_claim_'.$i].'</td><td>'.$diseases['reimbursement_settled_amt_'.$i].'</td><td>'.($diseases['cashless_claim_'.$i] + $diseases['reimbursement_claim_'.$i]).'</td><td>'.($diseases['cashless_settled_amt_'.$i] + $diseases['reimbursement_settled_amt_'.$i]).'</td></tr>';
            }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  $total_cashless_paid,
            'total_val1' => $total_settled_amt,
            'total_val2' => $total_reimbursement_paid,
            'total_val3' => $total_settled_amt1,
            'total_val4' => ($total_cashless_paid + $total_reimbursement_paid),
            'total_val5' => ($total_settled_amt + $total_settled_amt1),
        );
        echo json_encode($res);
    }

    public function showHospitalClaimSummary(){
        $policy_id = isset($_POST['policy_id'])?$_POST['policy_id']:null;
        $corporate_id = isset($_POST['corporate_id'])?$_POST['corporate_id']:null;
        $keys = $this->sm->get_top20_hospitals($policy_id,$corporate_id);
        // echo '<pre>'; print_r($keys);exit;
        $output = '';
        if(!empty($keys)){

            $total3 = 0;
            $total4 = 0;
            $total5 = 0;
            $total6 = 0;
            $total7 = 0;
            $total8 = 0;
            for($i=0;$i<count($keys);$i++){
              $hospital_name= $keys[$i]['hospital_name'];
              $hospital = $this->sm->get_hospital_claim_summary($policy_id,$corporate_id,$hospital_name);

              $total1 = ($hospital['cashless_claim']+$hospital['reimbursement_claim']);
              $total2 = ($hospital['cashless_settled_amt']+$hospital['reimbursement_settled_amt']);
              $total3 += $hospital['cashless_claim'];
              $total4 += $hospital['cashless_settled_amt'];
              $total5 += $hospital['reimbursement_claim'];
              $total6 += $hospital['reimbursement_settled_amt'];
              $total7 += ($hospital['cashless_claim']+$hospital['reimbursement_claim']);
              $total8 += ($hospital['cashless_settled_amt']+$hospital['reimbursement_settled_amt']);
              $output.= '<tr><td>'.$hospital_name.' ('.$keys[$i]['hospital_city'].')</td><td>'.$keys[$i]['network_status'].'</td><td>'.$hospital['cashless_claim'].'</td><td>'.$hospital['cashless_settled_amt'].'</td><td>'.$hospital['reimbursement_claim'].'</td><td>'.$hospital['reimbursement_settled_amt'].'</td><td>'.$total1.'</td><td>'.$total2.'</td></tr>';

            }
        }

        $res = array(
            'body_html' => $output,
            'total_val' =>  $total3,
            'total_val1' => $total4,
            'total_val2' => $total5,
            'total_val3' => $total6,
            'total_val4' => $total7,
            'total_val5' => $total8,
        );
        echo json_encode($res);

    }

}
