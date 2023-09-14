<?php
error_reporting(0);
@ini_set('display_errors', 0);
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>

<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url_views;?>css/vendor.css">

<script type="text/javascript" src="<?php echo $base_url_views;?>js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url_views;?>js/jquery-ui.min.js"></script> <!-- Bootstrap -->
<script type="text/javascript" src="<?php echo $base_url_views;?>js/bootstrap.min.js"></script>

<div class="container">

  <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Enrollment Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                        <th scope="col">Lives</th>
                        <th scope="col">Inception Lives</th>
                        <th scope="col">Additional Lives</th>
                        <th scope="col">Deletion Lives</th>
                        <th scope="col">Active Lives</th>
                    </tr>
                </thead>
                <tbody id="emp_summary_tbl">
					<?php
					
					ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
					
					//$this->load->model('Summary_Model','sm');
					
					$inception = $this->admin->get_enrollment_inception($policy_id,$corporate_id);
					$addition = $this->admin->get_enrollment_addition($policy_id,$corporate_id);
					$deletion = $this->admin->get_enrollment_deletion($policy_id,$corporate_id);
					
					$keys = array_keys($inception);
					$inception['total'] = $inception['Employee'] + $inception['Spouse'] + $inception['Children'] + $inception['Parents'] + ($inception['Others'] - $inception['Employee'] - $inception['Spouse']- $inception['Children'] - $inception['Parents']);
					$addition['total'] = $addition['Employee'] + $addition['Spouse'] + $addition['Children'] + $addition['Parents'] + ($addition['Others'] - $addition['Employee'] -$addition['Spouse']- $addition['Children'] - $addition['Parents']);
					$deletion['total'] = $deletion['Employee'] + $deletion['Spouse'] + $deletion['Children'] + $deletion['Parents'] + ($deletion['Others'] - $deletion['Employee'] -$deletion['Spouse']- $deletion['Children'] - $deletion['Parents']);
					$active['total'] = $inception['total'] + $addition['total'] - $deletion['total'];
					
					if(!empty($inception)){ 
					
						$active['Employee'] = ($inception['Employee']+$addition['Employee']-$deletion['Employee']);
						$active['Spouse'] = ($inception['Spouse']+$addition['Spouse']-$deletion['Spouse']);
						$active['Children'] = ($inception['Children']+$addition['Children']-$deletion['Children']);
						$active['Parents'] = ($inception['Parents']+$addition['Parents']-$deletion['Parents']);
						$active['Others'] =($inception['Others']+$addition['Others']-$deletion['Others']);
					
					?>
						
						<tr>
						
							<td><?php echo $keys[0] ?></td>
							<td><?php echo $inception['Employee']?></td>
							<td><?php echo $addition['Employee']?></td>
							<td><?php echo $deletion['Employee']?></td>
							<td><?php echo $active['Employee']?></td>
						
						</tr>
						
						<tr>
						
							<td><?php echo $keys[1] ?></td>
							<td><?php echo $inception['Spouse']?></td>
							<td><?php echo $addition['Spouse']?></td>
							<td><?php echo $deletion['Spouse']?></td>
							<td><?php echo $active['Spouse']?></td>
						
						</tr>
						
						<tr>
						
							<td><?php echo $keys[2] ?></td>
							<td><?php echo $inception['Children']?></td>
							<td><?php echo $addition['Children']?></td>
							<td><?php echo $deletion['Children']?></td>
							<td><?php echo $active['Children']?></td>
						
						</tr>
						
						
						<tr>
						
							<td><?php echo $keys[3] ?></td>
							<td><?php echo $inception['Parents']?></td>
							<td><?php echo $addition['Parents']?></td>
							<td><?php echo $deletion['Parents']?></td>
							<td><?php echo $active['Parents']?></td>
						
						</tr>
						
						<tr>
						
							<td><?php echo $keys[4] ?></td>
							<td><?php echo $inception['Others'] - $inception['Employee'] - $inception['Spouse']- $inception['Children'] - $inception['Parents']?></td>
							<td><?php echo $addition['Others'] - $addition['Employee'] -$addition['Spouse']- $addition['Children'] - $addition['Parents']?></td>
							<td><?php echo $deletion['Others'] - $deletion['Employee'] -$deletion['Spouse']- $deletion['Children'] - $deletion['Parents']?></td>
							<td><?php echo $active['Others'] - $active['Employee'] -$active['Spouse']- $active['Children'] - $active['Parents']?></td>
						
						</tr>
						
						
					<?php } ?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="inception_total"><?php echo $inception['total'];?></th>
                        <th id="addition_total"><?php echo $addition['total'];?></th>
                        <th id="deletion_total"><?php echo $deletion['total'];?></th>
                        <th id="active_total"><?php echo $active['total'];?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Claim Ratio (%) Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                      <th scope="col">Net Premium</th>
                      <th scope="col">Earned Premium</th>
                      <th scope="col">Incurred Premium</th>
                      <th scope="col">Claim Ratio (%)</th>
                      <th scope="col">Incurred Claim Ratio (%)</th>
                    </tr>
                </thead>
                <tbody id="ratio_tbl">
					<?php
						
						$premium = $this->admin->get_premium_by_policy($policy_id,$corporate_id);
						
						//echo"<pre>";print_r($premium);echo"</pre>";exit;

						$claim_amount = $this->admin->get_claim_paid_by_policy($policy_id,$corporate_id);
						
						$policy_start_date = $policy_start_date_pdf;
						$first_date = new DateTime(date('Y-m-d', strtotime($policy_start_date)));
						$second_date = new DateTime(date('Y-m-d', strtotime('now')));
						$difference = $first_date->diff($second_date);
						$no_of_days = $difference->days + 1;
						
						
						$first_date = new DateTime(date('Y-m-d', strtotime($policy_start_date)));
						$third_date = new DateTime(date('Y-m-d', strtotime($policy_end_date_pdf)));

						$policy_days = $first_date->diff($third_date);
						$total_policy_days = $policy_days->days + 1;
						
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

					
					?>
                    <tr>
                        <td class="net_permium"><?php //echo $premium['second']['total_premium']?></td>
                        <td class="earned_permium"><?php //echo $output['earned_premium']?></td>
                        <td class="claimed_permium"><?php //echo $output['claim_paid_amount']?></td>
                        <td class="claimed_ratio"><?php //echo $output['claim_ratio']?></td>
                        <td class="earned_ratio"><?php //echo $output['earned_ratio']?></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Claim Status Summary</h5>
            </div>
        </div>

        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered">
                <thead style="background: #ddd;">
                  <tr style="text-align:center;">
                      <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Status</th>
                      <th scope="col" colspan="3">Cashless</th>
                      <th scope="col" colspan="3">Reimbursement</th>
                      <th scope="col" colspan="3">Total</th>
                  </tr>
                  <tr>
                    <!-- <td >total Claim</td> -->
                    <td> Total Claim</td>
                    <td>Claim Amount</td>
                    <td>Incurred Amount</td>
                    <td>Total Claim</td>
                    <td>Claim Amount</td>
                    <td>Incurred Amount</td>
                    <td>Total Claim</td>
                    <td>Claim Amount</td>
                    <td>Incurred Amount</td>
                  </tr>
                </thead>
				<?php
					$claim_status_summary = $this->admin->get_claim_summary_by_policy($policy_id,$corporate_id);
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
							
				?>
                <tbody id="claim_summary_tbl" >
						<tr>
							<td><?php echo $keys[0] ?></td>
							<td><?php echo number_format($claim_status_summary['closed_cashless'])?></td>
							<td><?php echo number_format($claim_status_summary['closed_cashless_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['closed_cashless_incurred'])?></td>
							<td><?php echo number_format($claim_status_summary['closed_reimbursement'])?></td>
							<td><?php echo number_format($claim_status_summary['closed_reimbursement_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['closed_reimbursement_incurred'])?></td>
							<td><?php echo (number_format($claim_status_summary['closed_cashless']+$claim_status_summary['closed_reimbursement']))?></td>
							<td><?php echo (number_format($claim_status_summary['closed_cashless_claimed']+$claim_status_summary['closed_reimbursement_claimed']))?></td>
							<td><?php echo (number_format($claim_status_summary['closed_cashless_incurred']+$claim_status_summary['closed_reimbursement_incurred']))?></td>
 						</tr>
						
						<tr>
							
							<td><?php echo $keys[1] ?></td>
							<td><?php echo number_format($claim_status_summary['outstanding_cashless'])?></td>
							<td><?php echo number_format($claim_status_summary['outstanding_cashless_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['outstanding_cashless_incurred'])?></td>
							<td><?php echo number_format($claim_status_summary['outstanding_reimbursement'])?></td>
							<td><?php echo number_format($claim_status_summary['outstanding_reimbursement_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['outstanding_reimbursement_incurred'])?></td>
							<td><?php echo (number_format($claim_status_summary['outstanding_cashless']+$claim_status_summary['outstanding_reimbursement']))?></td>
							<td><?php echo (number_format($claim_status_summary['outstanding_cashless_claimed']+$claim_status_summary['outstanding_reimbursement_claimed']))?></td>
							<td><?php echo (number_format($claim_status_summary['outstanding_cashless_incurred']+$claim_status_summary['outstanding_reimbursement_incurred']))?></td>
 						</tr>
						
						
						<tr>
							<td><?php echo $keys[2] ?></td>
							<td><?php echo number_format($claim_status_summary['paid_cashless'])?></td>
							<td><?php echo number_format($claim_status_summary['paid_cashless_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['paid_cashless_incurred'])?></td>
							<td><?php echo number_format($claim_status_summary['paid_reimbursement'])?></td>
							<td><?php echo number_format($claim_status_summary['paid_reimbursement_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['paid_reimbursement_incurred'])?></td>
							<td><?php echo (number_format($claim_status_summary['paid_cashless']+$claim_status_summary['paid_reimbursement']))?></td>
							<td><?php echo (number_format($claim_status_summary['paid_cashless_claimed']+$claim_status_summary['paid_reimbursement_claimed']))?></td>
							<td><?php echo (number_format($claim_status_summary['paid_cashless_incurred']+$claim_status_summary['paid_reimbursement_incurred']))?></td>
						</tr>
						
						<tr>
							<td><?php echo $keys[3] ?></td>
							<td><?php echo number_format($claim_status_summary['rejected_cashless'])?></td>
							<td><?php echo number_format($claim_status_summary['rejected_cashless_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['rejected_cashless_incurred'])?></td>
							<td><?php echo number_format($claim_status_summary['rejected_reimbursement'])?></td>
							<td><?php echo number_format($claim_status_summary['rejected_reimbursement_claimed'])?></td>
							<td><?php echo number_format($claim_status_summary['rejected_reimbursement_incurred'])?></td>
							<td><?php echo (number_format($claim_status_summary['rejected_cashless']+$claim_status_summary['rejected_reimbursement']))?></td>
							<td><?php echo (number_format($claim_status_summary['rejected_cashless_claimed']+$claim_status_summary['rejected_reimbursement_claimed']))?></td>
							<td><?php echo (number_format($claim_status_summary['rejected_cashless_incurred']+$claim_status_summary['rejected_reimbursement_incurred']))?></td>
						</tr>
						
						
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Grand Total</th>
                        <th id="total_val"><?php echo number_format($claim_cashless['total']);?></th>
                        <th id="total_val1"><?php echo number_format($amount_claim['total']);?></th>
                        <th id="total_val2"><?php echo number_format($amount_incurred['total']);?></th>
                        <th id="total_val3"><?php echo number_format($claim_reimbursement['total']);?></th>
                        <th id="total_val4"><?php echo number_format($amount_reimbursement_claim['total']);?></th>
                        <th id="total_val5"><?php echo number_format($amount_reimbursement_incurred['total']);?></th>
                        <th id="total_val6"><?php echo number_format($total_closed_claim['total']);?></th>
                        <th id="total_val7"><?php echo number_format($total_claim_amount['total']);?></th>
                        <th id="total_val8"><?php echo number_format($total_incurred_amount['total']);?></th>
                    </tr>
                </thead>
            </table>
        </div>
           
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Settled (ACS)</h5>
            </div>
        </div>

        <div class="card-body" >
            <table class="table table-bordered" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                <thead style="background: #ddd;">
                      <tr style="text-align:center;">
                          <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Status</th>
                          <th scope="col" colspan="4">Cashless</th>
                          <th scope="col" colspan="4">Reimbursement</th>
                          <th scope="col" colspan="4">Total</th>
                      </tr>
                      <tr>
                        <td>Total Claim</td>
                        <td>Settled Claim Count</td>
                        <td>Settled Amount</td>
                        <td>ACS</td>
                        <td>Total Claim</td>
                        <td>Settled Claim Count</td>
                        <td>Settled Amount</td>
                        <td>ACS</td>
                        <td>Total Claim</td>
                        <td>Settled Claim Count</td>
                        <td>Settled Amount</td>
                        <td>ACS</td>
                </thead>
				<?php
					
					$settled_acs = $this->admin->get_settled_acs_by_policy($policy_id,$corporate_id);
					$keys = ['Settled'];
				
				?>
                <tbody id="settled_tbl">
					
					<?php 
					
						if(!empty($settled_acs['paid_claim_count'])){
							
							$cashless_acs = $settled_acs['claim_paid_amount'] / $settled_acs['paid_claim_count'];
							$reimbursement_acs = $settled_acs['claim_paid_reimbursement_amount'] / $settled_acs['paid_claim_reimbursement_count'];
							$total_acs = ($settled_acs['claim_paid_amount']+$settled_acs['claim_paid_reimbursement_amount']) / ($settled_acs['paid_claim_count'] +$settled_acs['paid_claim_reimbursement_count']);
					
					?>
					
							<tr>
								<td><?php echo $keys[0] ?></td>
								<td><?php echo number_format($settled_acs['claim_count'])?></td>
								<td><?php echo number_format($settled_acs['paid_claim_count'])?></td>
								<td>₹ <?php echo number_format($settled_acs['claim_paid_amount'])?></td>
								<td><?php echo number_format($cashless_acs, 2, '.', '')?></td>
								<td><?php echo number_format($settled_acs['claim_reimbursement_count'])?></td>
								<td><?php echo number_format($settled_acs['paid_claim_reimbursement_count'])?></td>
								<td>₹ <?php echo number_format($settled_acs['claim_paid_reimbursement_amount'])?></td>
								<td><?php echo number_format($reimbursement_acs, 2, '.', '')?></td>
								<td><?php echo (number_format($settled_acs['claim_count'] + $settled_acs['claim_reimbursement_count']))?></td>
								<td><?php echo (number_format($settled_acs['paid_claim_count'] +$settled_acs['paid_claim_reimbursement_count']))?></td>
								<td>₹ <?php echo (number_format($settled_acs['claim_paid_amount']+$settled_acs['claim_paid_reimbursement_amount']))?></td>
								<td><?php echo number_format($total_acs, 2, '.', '')?></td>
							</tr>
					
					
					<?php } ?>
						
                </tbody>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Agewise Settled Claim Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                        <th scope="col">Age Group</th>
                        <th scope="col">Total Claims</th>
                        <th scope="col">Paid Claim Count</th>
                        <th scope="col">Settled Amount</th>
                        <th scope="col">% of Claims</th>
                        <th scope="col">ACS</th>
                    </tr>
                </thead>
				<?php
				
					$keys = ['0-25','26-35','36-45','46-55','56-65','> 65'];
					$age_summary = $this->admin->get_age_wise_claim_summary($policy_id,$corporate_id);
					//echo '<pre>'; print_r($age_summary);exit;
					
					$total_clims = 0;
					$paid_clims = 0;
					$settled_amt = 0;

					for($i=0;$i<count($keys);$i++){
					  $total_clims += $age_summary['claim_count_'.$i];
					  $paid_clims += $age_summary['paid_claim_'.$i];
					  $settled_amt += $age_summary['settled_amt_'.$i];
					}
				
				?>
                <tbody id="age_tbl">
					<?php 
						if(!empty($keys)){
							for($i=0;$i<count($keys);$i++){
								
								if($age_summary['paid_claim_'.$i] != 0){
								  $acs = $age_summary['settled_amt_'.$i]/ $age_summary['paid_claim_'.$i];

								}else {
								  $acs = '0';
								}
								
								$percentage = ($age_summary['claim_count_'.$i]*100)/$total_clims;
					?>
							<tr>
								<td><?php echo $keys[$i]?></td>
								<td><?php echo number_format($age_summary['claim_count_'.$i])?></td>
								<td><?php echo number_format($age_summary['paid_claim_'.$i])?></td>
								<td><?php echo number_format($age_summary['settled_amt_'.$i])?></td>
								<td><?php echo number_format($percentage, 2, '.', '')?></td>
								<td><?php echo number_format($acs)?></td>
							</tr>
					
						<?php } }?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="age_total_val"><?php echo number_format($total_clims);?></th>
                        <th id="age_total_val1"><?php echo number_format($paid_clims);?></th>
                        <th id="age_total_val2"><?php echo number_format($settled_amt);?></th>
                        <th id="age_total_val3"><?php echo number_format(($total_clims *100)/$total_clims, 2, '.', '');?></th>
                        <th id="age_total_val4"><?php echo (number_format($settled_amt/$paid_clims));?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Settled Claim TAT Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                        <th scope="col">Internal Processing TAT (No)</th>
                        <th scope="col">Claims Count</th>
                        <th scope="col">Claims (%)</th>
                    </tr>
                </thead>
				<?php
					$keys = ['8-17','18-30','> 30'];
					$tat_summary = $this->admin->get_tat_claim_summary($policy_id,$corporate_id);
				?>
                <tbody id="tat_tbl">
					<?php 
					
						 if(!empty($keys)){
							$total_clims = 0;
							$grand_total_percentage = 0;
							for($i=0;$i<count($keys);$i++){
							  $total_clims += $tat_summary['tat_count_'.$i];
							  if($tat_summary['tat_count_'.$i] != 0){
								$percentage = round(($tat_summary['tat_count_'.$i] *100)/$total_clims);
								$grand_total_percentage += ($percentage*100)/100;
							  }else {
								$percentage = '0';
							  } 
					?>
							  
							 <tr>
								<td><?php echo $keys[$i] ?> days</td>
								<td><?php echo number_format($tat_summary['tat_count_'.$i])?></td>
								<td><?php echo number_format($percentage)?></td>
							</tr>
							
					<?php }
						}
					?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Grand Total</th>
                        <th id='tal_total_val'><?php echo number_format($total_clims);?></th>
                        <th id='tal_total_val1'><?php echo number_format($grand_total_percentage);?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Outstanding Claim TAT Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                        <th scope="col">Internal Processing TAT (No)</th>
                        <th scope="col">Claims Count</th>
                        <th scope="col">Claims (%)</th>
                    </tr>
                </thead>
				<?php
				
					$keys = ['8-17','18-30','> 30'];
					$tat_summary = $this->admin->get_outstanding_tat_claim_summary($policy_id,$corporate_id);
				?>
                <tbody id="out_tbl">
					<?php
						if(!empty($keys)){
						$total_clims = 0;
						$grand_total_percentage = 0;
						for($i=0;$i<count($keys);$i++){
						  $total_clims += $tat_summary['tat_count_'.$i];
						  if($tat_summary['tat_count_'.$i] != 0){
							$percentage = round(($tat_summary['tat_count_'.$i] *100)/$total_clims);
							$grand_total_percentage += ($percentage*100)/100;
						  }else {
							$percentage = '0';
						  }
					?>
						<tr>
							<td><?php echo $keys[$i] ?> days</td>
							<td><?php echo number_format($tat_summary['tat_count_'.$i])?></td>
							<td><?php echo number_format($percentage)?></td>
						</tr>
						  
					<?php 	}
					}
					?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Grand Total</th>
                        <th id='out_total_val'><?php echo number_format($total_clims);?></th>
                        <th id='out_total_val1'><?php echo number_format($grand_total_percentage);?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Relationwise Settled Claim Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                        <th scope="col">Relation</th>
                        <th scope="col">Total Claims</th>
                        <th scope="col">Paid Claim Count</th>
                        <th scope="col">Settled Amount</th>
                        <th scope="col">% of Claims</th>
                        <th scope="col">ACS</th>
                    </tr>
                </thead>
				<?php
				
				$keys = ['Daughter','Employee','Father','Mother','Sister','Son','Spouse'];
				$ralation_summary = $this->admin->get_ralation_wise_claim_summary($policy_id,$corporate_id);
				
				$output = '';
				$total_clims = 0;
				$paid_clims = 0;
				$settled_amt = 0;
				for($i=0;$i<count($keys);$i++){
				  $total_clims += $ralation_summary['claim_count_'.$i];
				  $paid_clims += $ralation_summary['paid_claim_'.$i];
				  $settled_amt += $ralation_summary['settled_amt_'.$i];
				}
		
				?>
                <tbody id="ralation_tbl">
					<?php
						
						if(!empty($keys)){
						  for($i=0;$i<count($keys);$i++){
							if($ralation_summary['paid_claim_'.$i] != 0){
							  $acs = $ralation_summary['settled_amt_'.$i]/ $ralation_summary['paid_claim_'.$i];
							}else {
							  $acs = '0';
							}
							$percentage = ($ralation_summary['claim_count_'.$i]*100)/$total_clims;
					?>		
							<tr>
								<td><?php echo $keys[$i]?></td>
								<td><?php echo number_format($ralation_summary['claim_count_'.$i])?></td>
								<td><?php echo number_format($ralation_summary['paid_claim_'.$i])?></td>
								<td><?php echo number_format($ralation_summary['settled_amt_'.$i])?></td>
								<td><?php echo number_format($percentage, 2, '.', '')?></td>
								<td><?php echo number_format($acs)?></td>
							</tr>

					<?php	  }
						}
					
					?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="ralation_total_val"><?php echo number_format($total_clims)?></th>
                        <th id="ralation_total_val1"><?php echo number_format($paid_clims)?></th>
                        <th id="ralation_total_val2"><?php echo number_format($settled_amt)?></th>
                        <th id="ralation_total_val3"><?php echo number_format(($total_clims * 100)/$total_clims, 2, '.', '')?></th>
                        <th id="ralation_total_val4"><?php echo number_format($settled_amt/$paid_clims)?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Network / Non Network Claim Summary</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                        <th scope="col">Network Type</th>
                        <th scope="col">Type of Claim</th>
                        <th scope="col">Total Claim</th>
                        <th scope="col">Paid Claim</th>
                        <th scope="col">Settled Amount</th>
                        <th scope="col">ACS</th>
                        <th scope="col">% of Claims</th>
                    </tr>
                </thead>
				<?php
					$network = $this->admin->get_network_claim_summary($policy_id,$corporate_id);
					$keys = ['Network','Non Network'];
				?>
                <tbody id="network_tbl">
						<?php
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
										$acs4 ='0';
										$acs5='0';
										$acs6 ='0';
									}

									$total_clims = ($network['cashless_count'] + $network['reimbursement_count'] + $network['cashless_count_1'] + $network['reimbursement_count_1']);
									$paid_clims = ($network['paid_cashless'] + $network['paid_reimbursement'] + $network['paid_cashless_1'] + $network['paid_reimbursement_1']);
									$settled_amt = ($network['settled_cashless'] + $network['settled_reimbursement'] + $network['settled_cashless_1'] + $network['paid_reimbursement_1']);

									$total_acs = ($settled_amt/$paid_clims);
									$total_percentage1 = round((($network['cashless_count'] + $network['reimbursement_count']) * 100)/$total_clims);
									$total_percentage2 = round((($network['cashless_count_1'] + $network['reimbursement_count_1']) * 100)/$total_clims);
									$grand_percentage = ($total_clims*100)/$total_clims;
									
									
									
								}else{

									$acs1 = '0';
									$acs2 = '0';
									$acs3 = '0';
									$acs4 = '0';
									$acs5 = '0';
									$acs6 = '0';
									$total_percentage1='0';
									$total_percentage2='0';
									$grand_percentage = '0';

								}		?>		

									<tr>
										<td rowspan="4"><?php echo $keys[0] ?></td>
										
										<tr>
											<td>Cashless</td>
											<td><?php echo number_format($network['cashless_count'])?></td>
											<td><?php echo number_format($network['paid_cashless'])?></td>
											<td><?php echo number_format($network['settled_cashless'])?></td>
											<td><?php echo number_format($acs1, 2, '.', '')?></td>
											<td rowspan="4" style="padding: 4.9% !important;"><?php echo number_format($total_percentage1, 2, '.', '')?></td>
										</tr>
										
										<tr>
											<td>Reimbursement</td>
											<td><?php echo number_format($network['reimbursement_count'])?></td>
											<td><?php echo number_format($network['paid_reimbursement'])?></td>
											<td><?php echo number_format($network['settled_reimbursement'])?></td>
											<td><?php echo number_format($acs2, 2, '.', '')?></td>
										</tr>
										
										<tr>
											<td>Total</td>
											<td><?php echo number_format(($network['cashless_count']+$network['reimbursement_count']))?></td>
											<td><?php echo ($network['paid_cashless']+$network['paid_reimbursement'])?></td>
											<td><?php echo number_format(($network['settled_cashless']+$network['settled_reimbursement']))?></td>
											<td><?php echo number_format($acs3, 2, '.', '')?></td>
										</tr>
									</tr>
									
									
									<tr>
										<td rowspan="4"><?php echo $keys[1] ?></td>
										
										<tr>
											<td>Cashless</td>
											<td><?php echo number_format($network['cashless_count_1'])?></td>
											<td><?php echo number_format($network['paid_cashless_1'])?></td>
											<td><?php echo number_format($network['settled_cashless_1'])?></td>
											<td><?php echo number_format($acs4, 2, '.', '')?></td>
											<td rowspan="4" style="padding: 4.9% !important;"><?php echo number_format($total_percentage2, 2, '.', '')?></td>
										</tr>
										
										<tr>
											<td>Reimbursement</td>
											<td><?php echo number_format($network['reimbursement_count_1'])?></td>
											<td><?php echo number_format($network['paid_reimbursement_1'])?></td>
											<td><?php echo number_format($network['settled_reimbursement_1'])?></td>
											<td><?php echo number_format($acs5, 2, '.', '')?></td>
										</tr>
										
										<tr>
											<td>Total</td>
											<td><?php echo number_format(($network['cashless_count_1']+$network['reimbursement_count_1']))?></td>
											<td><?php echo number_format(($network['paid_cashless_1']+$network['paid_reimbursement_1']))?></td>
											<td><?php echo number_format(($network['settled_cashless_1']+$network['settled_reimbursement_1']))?></td>
											<td><?php echo number_format($acs6, 2, '.', '')?></td>
										</tr>
									</tr>
						
						<?php	}	?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Grand Total</th>
                        <th id='network_total_val'><?php echo  number_format($total_clims) ?></th>
                        <th id='network_total_val1'><?php echo number_format($paid_clims) ?></th>
                        <th id='network_total_val2'><?php echo number_format($settled_amt) ?></th>
                        <th id='network_total_val3'><?php echo number_format($total_acs) ?></th>
                        <th id='network_total_val4'><?php echo number_format($grand_percentage, 2, '.', '') ?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Amount Band Settled Claim Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                    <tr>
                        <th scope="col">Amount Band</th>
                        <th scope="col">Total Claims</th>
                        <th scope="col">Paid Claim Count</th>
                        <th scope="col">Settled Amount</th>
                        <th scope="col">% of Claims</th>
                        <th scope="col">ACS</th>
                    </tr>
                </thead>
				<?php
					
					$keys = ['Upto 25 K','> 25K to 50K','> 50 K to 1 Lac','> 1 Lac to 2 Lac','> 2 Lac'];
					$amount_summary = $this->admin->get_amount_band_claim_summary($policy_id,$corporate_id);
					
					$output = '';
					$total_clims = 0;
					$paid_clims = 0;
					$settled_amt = 0;
					for($i=0;$i<count($keys);$i++){
					  $total_clims += $amount_summary['claim_count_'.$i];
					  $paid_clims += $amount_summary['paid_claim_'.$i];
					  $settled_amt += $amount_summary['settled_amt_'.$i];
					}
				
				?>
                <tbody id="amount_tbl">
				<?php
					if(!empty($keys)){
						for($i=0;$i<count($keys);$i++){
						  if($amount_summary['paid_claim_'.$i] != 0){
							  $acs = $amount_summary['settled_amt_'.$i]/ $amount_summary['paid_claim_'.$i];
							  $paid_clims += $amount_summary['paid_claim_'.$i];
						  }else {
							  $acs = '0';
							  $percentage = 0;
							  $paid_clims += 0;
						  }
						  $percentage = ($amount_summary['claim_count_'.$i] *100)/$total_clims;
					?>
						 
							<tr>
								<td><?php echo $keys[$i] ?></td>
								<td><?php echo number_format($amount_summary['claim_count_'.$i])?></td>
								<td><?php echo number_format($amount_summary['paid_claim_'.$i])?></td>
								<td><?php echo number_format($amount_summary['settled_amt_'.$i])?></td>
								<td><?php echo number_format($percentage, 2, '.', '')?></td>
								<td><?php echo number_format($acs, 2, '.', '')?></td>
							</tr>
						
					<?php }	} ?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="amount_total_val"><?php echo number_format($total_clims)?></th>
                        <th id="amount_total_val1"><?php echo number_format($paid_clims)?></th>
                        <th id="amount_total_val2"><?php echo number_format($settled_amt)?></th>
                        <th id="amount_total_val3"><?php echo number_format(($total_clims * 100)/$total_clims, 2, '.', '')?></th>
                        <th id="amount_total_val4"><?php echo number_format(($settled_amt/$paid_clims), 2, '.', '')?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Level of Care Settled Claim Summary</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                  <tr style="text-align:center;">
                      <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Level of Care</th>
                      <th scope="col" colspan="4">Medical</th>
                      <th scope="col" colspan="4">Surgical</th>

                  </tr>
                  <tr>
                    <td>Total Claim</td>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                    <td>ACS</td>
                    <td>Total Claim</td>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                    <td>ACS</td>
                  </tr>
                </thead>
				<?php
				
					$keys = ['Primary','Secondary','Tertiary','Intermediate','Intensive','General'];
					$level_care = $this->admin->get_level_care_claim_summary($policy_id,$corporate_id);
				
				?>
                <tbody id="level_tbl" >
				<?php
				
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
						  $acs = '0';
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
						  $acs1 = '0';
						  $total_clims1 += 0;
						  $paid_clims1 += 0;
						  $settled_amt1 += 0;
						  $total_acs1 += 0;
					  }
				?>

					<tr>
						<td><?php echo $keys[$i] ?></td>
						<td><?php echo number_format($level_care['medical_claim_count_'.$i])?></td>
						<td><?php echo number_format($level_care['medical_paid_claim_'.$i])?></td>
						<td><?php echo number_format($level_care['medical_settled_amt_'.$i])?></td>
						<td><?php echo number_format($acs, 2, '.', '')?></td>
						<td><?php echo number_format($level_care['surgical_claim_count_'.$i])?></td>
						<td><?php echo number_format($level_care['surgical_paid_claim_'.$i])?></td>
						<td><?php echo number_format($level_care['surgical_settled_amt_'.$i])?></td>
						<td><?php echo number_format($acs1, 2, '.', '')?></td>
					</tr>

				<?php	} } ?>
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="level_val"><?php echo number_format($total_clims)?></th>
                        <th id="level_val1"><?php echo number_format($paid_clims)?></th>
                        <th id="level_val2"><?php echo number_format($settled_amt)?></th>
                        <th id="level_val3"><?php echo number_format($total_acs, 2, '.', '')?></th>
                        <th id="level_val4"><?php echo number_format($total_clims1)?></th>
                        <th id="level_val5"><?php echo number_format($paid_clims1)?></th>
                        <th id="level_val6"><?php echo number_format($settled_amt1)?></th>
                        <th id="level_val7"><?php echo number_format($total_acs1, 2, '.', '')?></th>
                    </tr>
                </thead>
            </table>
        </div>
      </div>
	  
	   <div id="content" style="padding-bottom:0px!important;height:200px">
	  
	  </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Disease Category Wise Settled Claim Summary (Based on Amount)</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                <thead style="background: #ddd;">
                  <tr style="text-align:center;">
                      <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Disease Category</th>
                      <th scope="col" colspan="2">Cashless</th>
                      <th scope="col" colspan="2">Reimbursement</th>
                      <th scope="col" colspan="2">Total</th>
                  </tr>
                  <tr>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                  </tr>
              </thead>
			  <?php
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
				$diseases = $this->admin->get_disease_category_claim_summary($policy_id,$corporate_id);
			  ?>
              <tbody id="disease_tbl">
				<?php
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
				?>
				
				
						<tr>
							<td><?php echo $keys[$i] ?></td>
							<td><?php echo number_format($diseases['cashless_claim_'.$i])?></td>
							<td><?php echo number_format($diseases['cashless_settled_amt_'.$i])?></td>
							<td><?php echo number_format($diseases['reimbursement_claim_'.$i])?></td>
							<td><?php echo number_format($diseases['reimbursement_settled_amt_'.$i])?></td>
							<td><?php echo number_format(($diseases['cashless_claim_'.$i] + $diseases['reimbursement_claim_'.$i]))?></td>
							<td><?php echo number_format(($diseases['cashless_settled_amt_'.$i] + $diseases['reimbursement_settled_amt_'.$i]))?></td>
						</tr>
				
				<?php }	} ?>
              </tbody>
              <thead class="thead-dark">
                  <tr>
                      <th>Total</th>
                      <th id="disease_val"><?php echo number_format($total_cashless_paid)?></th>
                      <th id="disease_val1"><?php echo number_format($total_settled_amt)?></th>
                      <th id="disease_val2"><?php echo number_format($total_reimbursement_paid)?></th>
                      <th id="disease_val3"><?php echo number_format($total_settled_amt1)?></th>
                      <th id="disease_val4"><?php echo number_format($total_cashless_paid + $total_reimbursement_paid)?></th>
                      <th id="disease_val5"><?php echo number_format($total_settled_amt + $total_settled_amt1)?></th>
                  </tr>
              </thead>
            </table>
        </div>
      </div>

      <div id="content" style="padding-bottom:0px!important;">
        <div class="row">
            <div class="col-lg-12">
                <h5>Top 20 Hospital Settled Claim Summary (Based on Count)</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead style="background: #ddd;">
                  <tr>
                      <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Hospital Name with City</th>
                      <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Network Type</th>
                      <th scope="col" colspan="2">Cashless</th>
                      <th scope="col" colspan="2">Reimbursement</th>
                      <th scope="col" colspan="2">Total</th>
                  </tr>
                  <tr>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                    <td>Paid Claim</td>
                    <td>Settled Amount</td>
                  </tr>
              </thead>
			  <?php
				$keys = $this->admin->get_top20_hospitals($policy_id,$corporate_id);
			  ?>
              <tbody id="hospital_tbl">
			  <?php
			  
				if(!empty($keys)){

					$total3 = 0;
					$total4 = 0;
					$total5 = 0;
					$total6 = 0;
					$total7 = 0;
					$total8 = 0;
					for($i=0;$i<count($keys);$i++){
					  $hospital_name= $keys[$i]['hospital_name'];
					  $hospital = $this->admin->get_hospital_claim_summary($policy_id,$corporate_id,$hospital_name);

					  $total1 = ($hospital['cashless_claim']+$hospital['reimbursement_claim']);
					  $total2 = ($hospital['cashless_settled_amt']+$hospital['reimbursement_settled_amt']);
					  $total3 += $hospital['cashless_claim'];
					  $total4 += $hospital['cashless_settled_amt'];
					  $total5 += $hospital['reimbursement_claim'];
					  $total6 += $hospital['reimbursement_settled_amt'];
					  $total7 += ($hospital['cashless_claim']+$hospital['reimbursement_claim']);
					  $total8 += ($hospital['cashless_settled_amt']+$hospital['reimbursement_settled_amt']);
					  
				?>
					<tr>
						<td><?php echo $hospital_name."(".$keys[$i]['hospital_city'].")" ?></td>
						<td><?php echo $keys[$i]['network_status']?></td>
						<td><?php echo number_format($hospital['cashless_claim'])?></td>
						<td><?php echo number_format($hospital['cashless_settled_amt'])?></td>
						<td><?php echo number_format($hospital['reimbursement_claim'])?></td>
						<td><?php echo number_format($hospital['reimbursement_settled_amt'])?></td>
						<td><?php echo number_format($total1).'</td><td>'.number_format($total2)?></td>
					</tr>

				<?php	}
				}
			  ?>
              </tbody>
              <thead class="thead-dark">
                  <tr>
                      <th></th>
                      <th>Grand Total</th>
                      <th id='hospital_val'><?php echo number_format($total3)?></th>
                      <th id='hospital_val1'><?php echo number_format($total4)?></th>
                      <th id='hospital_val2'><?php echo number_format($total5)?></th>
                      <th id='hospital_val3'><?php echo number_format($total6)?></th>
                      <th id='hospital_val4'><?php echo number_format($total7)?></th>
                      <th id='hospital_val5'><?php echo number_format($total8)?></th>
                      <!-- <th id='out_total_val1'></th> -->
                  </tr>
              </thead>
            </table>
        </div>
      </div>

</div>
</div>
