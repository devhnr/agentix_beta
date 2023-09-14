<?php include('include/header.php');?>

<style>
.table_report, .table_report th, .table_report td {
  border: 1px solid black;
  border-collapse: collapse;
}
.table_report th, .table_report td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
   font-size: 15px;
}
</style>
<!-- Start: Main -->
<div id="main">
   <?php include('include/sidebar_left.php');?>
   <!-- Start: Content -->
   <!-- Start: Content -->
   <section id="content_wrapper">
      <div id="topbar">
         <div class="topbar-left">
            <ol class="breadcrumb">
               <li class="crumb-active"><a href="javascript:void(0);">Reports</a></li>
               <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                  class="glyphicon glyphicon-home"></span></a></li>
               <li class="crumb-trail">Reports</li>
            </ol>
         </div>
      </div>
      <div id="content">
         <div class="row">
            <?php if($this->session->flashdata('L_strErrorMessage'))  { ?>
            <div class="alert alert-success alert-dismissable">
               <i class="fa fa-check"></i>
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <b> </b> <?php echo $this->session->flashdata('L_strErrorMessage',5); ?>
            </div>
            <?php } ?>
            <?php if($this->session->flashdata('flashError')!='') { ?>
            <div class="alert alert-danger alert-dismissable">
               <i class="fa fa-warning"></i>
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <b> </b> <?php echo $this->session->flashdata('flashError',5); ?>
            </div>
            <?php }  ?>
            <div class="clearfix">&nbsp;</div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="panel">
                  <div class="panel-heading"> <span class="panel-title"> <span
                     class="glyphicon glyphicon-list-alt"></span>Reports</span> </div>
                  <div class="panel-body">
				  
					<h5><?php echo $corpora_name = $this->corporate_dashboard_model->get_corporate_name($corporate_id);?></h5>
                     <div class="row tab-sec">
                        <div class="col-lg-12">
                           <ul class="admin-tab nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Total Claim Reported</a></li>
                              <li><a data-toggle="tab" href="#menu1">Claim Status</a></li>
							  <li><a data-toggle="tab" href="#menu2">Month Wise</a></li>
							  <li><a data-toggle="tab" href="#menu3">Gender Wise</a></li>
							  <li><a data-toggle="tab" href="#menu4">Relation Wise</a></li>
							  <li><a data-toggle="tab" href="#menu5">Age Band Wise</a></li>
							  <li><a data-toggle="tab" href="#menu6">Top 10 Claims</a></li>
							  <li><a data-toggle="tab" href="#menu7">Demography Graph</a></li>
							  <li><a data-toggle="tab" href="#menu8">Endersoment Report</a></li>
							
                           </ul>
                           <div class="tab-content admin-tab-cont">
                              <div id="home" class="tab-pane v-tabular fade in active">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Total Claim Reported</h5>
                                    </div>
                                 </div>
								 
								 <?php
										
									$get_total_claim_reported_cashless_data = $this->corporate_dashboard_model->get_total_claim_reported_cashless_data($corporate_id,$policy_id);
									$total_cr_cashless_total = 0;
									$count_cashless = 0;
									if($get_total_claim_reported_cashless_data != ''){
										
										foreach($get_total_claim_reported_cashless_data as $data_cashless){
											$total_cr_cashless_total += $data_cashless->amount_claimed;
											$count_cashless += 1;
										}
									}else{
										$total_cr_cashless_total = 0;
										$count_cashless = 0;
									}
									
									$get_total_claim_reported_Reimbursement_data = $this->corporate_dashboard_model->get_total_claim_reported_Reimbursement_data($corporate_id,$policy_id);
									
									$total_cr_Reimbursement_total = 0;
									$count_Reimbursement = 0;
									
									if($get_total_claim_reported_Reimbursement_data != ''){
										
										foreach($get_total_claim_reported_Reimbursement_data as $data_Reimbursement){
											$total_cr_Reimbursement_total += $data_Reimbursement->amount_claimed;
											$count_Reimbursement += 1;
										}
										//$total_cr_Reimbursement_total = $get_total_claim_reported_Reimbursement_data;
									}else{
										$total_cr_Reimbursement_total = 0;
										$count_Reimbursement = 0;
									}
																		
								?>
                                 <div class="row">
                                    <!--<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="barChartp"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="pieChart"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="charts">
                                          <canvas id="stackedChart" ></canvas>
                                       </div>
                                    </div>
									-->
									
                                    <div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="barChartp_new"></canvas>
                                             </div>
                                          </div>
                                         
                                       </div>
                                    </div>
                                 </div>
									<div class="row">
										<div class="col-md-6">
											<table style="width:100%;margin-top: 14%;" class="table_report">
											  <tr>
												<th>Claim Type</th>
												<th>Cashless</th> 
												<th>Reimbursement</th>
												<th>Total</th>
											  </tr>
											  <tr>
												<td>Amount Claimed</td>
												<td><?php echo number_format($total_cr_cashless_total);?></td>
												<td><?php echo number_format($total_cr_Reimbursement_total);?></td>
												<td><?php echo number_format($total_cr_cashless_total + $total_cr_Reimbursement_total);?></td>
											  </tr>
											  <tr>
												<td>Claim Count</td>
												<td><?php echo $count_cashless;?></td>
												<td><?php echo $count_Reimbursement;?></td>
												<td><?php echo $count_cashless + $count_Reimbursement;?></td>
											  </tr>
											</table>
										</div>
									</div>	
                              </div>
                              <div id="menu1" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Claim Status</h5>
                                    </div>
                                 </div>
								 <?php
								 
									$get_claim_status_report_cashless_outstandindg = $this->corporate_dashboard_model->get_claim_status_report_cashless_outstandindg($corporate_id,$policy_id);
									
									if($get_claim_status_report_cashless_outstandindg != ''){
										
										foreach($get_claim_status_report_cashless_outstandindg as $get_claim_status_report_cashless_outstandindg_data){
											
											$outstanding_cashless_count_claim_status_report += 1;
										}
										
										
									}else{
										$outstanding_cashless_count_claim_status_report = 0;
									}
									
									//echo"<pre>";print_r($get_claim_status_report_cashless_outstandindg);echo"</pre>";
									
									$get_claim_status_report_cashless_paid = $this->corporate_dashboard_model->get_claim_status_report_cashless_paid($corporate_id,$policy_id);
									
									if($get_claim_status_report_cashless_paid != ''){
										
										foreach($get_claim_status_report_cashless_paid as $get_claim_status_report_cashless_paid_data){
											
											$paid_cashless_count_claim_status_report += 1;
										}
										
										
									}else{
										$paid_cashless_count_claim_status_report = 0;
									}
									
									//echo"<pre>";print_r($get_claim_status_report_cashless_paid);echo"</pre>";
									
									
									$get_claim_status_report_cashless_rejected = $this->corporate_dashboard_model->get_claim_status_report_cashless_rejected($corporate_id,$policy_id);
									
									if($get_claim_status_report_cashless_rejected != ''){
										
										foreach($get_claim_status_report_cashless_rejected as $get_claim_status_report_cashless_rejected_data){
											
											$reject_cashless_count_claim_status_report += 1;
										}
										
										
									}else{
										$reject_cashless_count_claim_status_report = 0;
									}
									
									//echo"<pre>";print_r($get_claim_status_report_cashless_rejected);echo"</pre>";
									
									
									$get_claim_status_report_Reimbursement_outstandindg = $this->corporate_dashboard_model->get_claim_status_report_Reimbursement_outstandindg($corporate_id,$policy_id);
									
									if($get_claim_status_report_Reimbursement_outstandindg != ''){
										
										foreach($get_claim_status_report_Reimbursement_outstandindg as $get_claim_status_report_Reimbursement_outstandindg_data){
											
											$outstanding_Reimbursement_count_claim_status_report += 1;
										}
										
										
									}else{
										$outstanding_Reimbursement_count_claim_status_report = 0;
									}
									
									//echo"<pre>";print_r($get_claim_status_report_Reimbursement_outstandindg);echo"</pre>";
									
									
									$get_claim_status_report_Reimbursement_paid = $this->corporate_dashboard_model->get_claim_status_report_Reimbursement_paid($corporate_id,$policy_id);
									
									if($get_claim_status_report_Reimbursement_paid != ''){
										
										foreach($get_claim_status_report_Reimbursement_paid as $get_claim_status_report_Reimbursement_paid_data){
											
											$paid_Reimbursement_count_claim_status_report += 1;
										}
										
										
									}else{
										$paid_Reimbursement_count_claim_status_report = 0;
									}
									
									//echo"<pre>";print_r($get_claim_status_report_cashless_paid);echo"</pre>";
									
									
									$get_claim_status_report_Reimbursement_rejected = $this->corporate_dashboard_model->get_claim_status_report_Reimbursement_rejected($corporate_id,$policy_id);
									
									if($get_claim_status_report_Reimbursement_rejected != ''){
										
										foreach($get_claim_status_report_Reimbursement_rejected as $get_claim_status_report_Reimbursement_rejected_data){
											
											$reject_Reimbursement_count_claim_status_report += 1;
										}
										
										
									}else{
										$reject_Reimbursement_count_claim_status_report = 0;
									}
									
									//echo"<pre>";print_r($get_claim_status_report_cashless_rejected);echo"</pre>";
									
									$Cashless_grand_total = $outstanding_cashless_count_claim_status_report + $paid_cashless_count_claim_status_report + $reject_cashless_count_claim_status_report;
									
									$Reimbursement_grand_total = $outstanding_Reimbursement_count_claim_status_report + $paid_Reimbursement_count_claim_status_report + $reject_Reimbursement_count_claim_status_report;
									
								 ?>
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="barChartp_claim_status"></canvas>
                                             </div>
                                          </div>
                                         
                                       </div>
                                    </div>
								 </div>
								 
								 <div class="row">
									<div class="col-md-6">
										<table style="width:100%;margin-top: 14%;" class="table_report">
										  <tr>
											<th>Claim Type</th>
											<th>Outstanding</th> 
											<th>Paid</th>
											<th>Rejected</th>
											<th>Grand Total</th>
										  </tr>
										  <tr>
											
											<td>Cashless</td>
											<td><?php echo $outstanding_cashless_count_claim_status_report;?></td>
											<td><?php echo $paid_cashless_count_claim_status_report;?></td>
											<td><?php echo $reject_cashless_count_claim_status_report;?></td>
											<td><?php echo $Cashless_grand_total;?></td>
											
										  </tr>
										  <tr>
											<td>Reimbursement</td>
											<td><?php echo $outstanding_Reimbursement_count_claim_status_report;?></td>
											<td><?php echo $paid_Reimbursement_count_claim_status_report;?></td>
											<td><?php echo $reject_Reimbursement_count_claim_status_report;?></td>
											<td><?php echo $Reimbursement_grand_total;?></td>
										  </tr>
										  <tr>
											<td>Grand Total</td>
											<td><?php echo $outstanding_cashless_count_claim_status_report + $outstanding_Reimbursement_count_claim_status_report;?></td>
											<td><?php echo $paid_cashless_count_claim_status_report + $paid_Reimbursement_count_claim_status_report;?></td>
											<td><?php echo $reject_cashless_count_claim_status_report + $reject_Reimbursement_count_claim_status_report;?></td>
											<td><?php echo $Cashless_grand_total + $Reimbursement_grand_total;?></td>
										  </tr>
										</table>
									</div>
								</div>
									
									
                              </div>
							  
							<div id="menu2" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Month Wise</h5>
                                    </div>
                                 </div>
								 
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="stackedChart"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
								 </div>
								 
								 <?php
								 
									$get_month_wise_report_cashless_jan = $this->corporate_dashboard_model->get_month_wise_report_cashless_jan($corporate_id,$policy_id);

									// echo "<pre>";print_r($get_month_wise_report_cashless_jan);echo "</pre>";
									
									if($get_month_wise_report_cashless_jan != ''){
										
										foreach($get_month_wise_report_cashless_jan as $get_month_wise_report_cashless_jan_data){
											
											$claim_filed_date = date("d-m-Y", strtotime($get_month_wise_report_cashless_jan_data->claim_filed_date));

											
											
											$claim_filed_date = explode("-", $claim_filed_date);

											// echo "<pre>";print_r($claim_filed_date);echo "</pre>";
											
											if($claim_filed_date[1] == "01"){ //jan
												
												$jan_month_wise_count_cashless += 1;
												
											}else{
												$jan_month_wise_count_cashless += 0;
											}
											
											
											if($claim_filed_date[1] == "02"){ // Feb
												$feb_month_wise_count_cashless += 1;
											}else{
												$feb_month_wise_count_cashless += 0;
											}
											
											if($claim_filed_date[1] == "03"){ // March
												$mar_month_wise_count_cashless += 1;
											}else{
												$mar_month_wise_count_cashless += 0;
											}
											
											if($claim_filed_date[1] == "04"){ // Apr
												$apr_month_wise_count_cashless += 1;
											}else{
												$apr_month_wise_count_cashless += 0;
											}


											if($claim_filed_date[1] == "05"){ // May
												$may_month_wise_count_cashless += 1;
											}else{
												$may_month_wise_count_cashless += 0;
											}

											if($claim_filed_date[1] == "06"){ // June
												$jun_month_wise_count_cashless += 1;
											}else{
												$jun_month_wise_count_cashless += 0;
											}

											if($claim_filed_date[1] == "07"){ // July
												$july_month_wise_count_cashless += 1;
											}else{
												$july_month_wise_count_cashless += 0;
											}

											if($claim_filed_date[1] == "08"){ // Aug
												$aug_month_wise_count_cashless += 1;
											}else{
												$aug_month_wise_count_cashless += 0;
											}

											if($claim_filed_date[1] == "09"){ // Sep
												$sep_month_wise_count_cashless += 1;
											}else{
												$sep_month_wise_count_cashless += 0;
											}

											if($claim_filed_date[1] == "10"){ // Oct
												$oct_month_wise_count_cashless += 1;
											}else{
												$oct_month_wise_count_cashless += 0;
											}

											if($claim_filed_date[1] == "11"){ // nov
												$nov_month_wise_count_cashless += 1;
											}else{
												$nov_month_wise_count_cashless += 0;
											}

											
											if($claim_filed_date[1] == "12"){ // dec
												$dec_month_wise_count_cashless += 1;
											}else{
												$dec_month_wise_count_cashless += 0;
											}
											
											//echo"<pre>";print_r($claim_filed_date);echo"</pre>";
											
											
										}
										
										
										
									}else{
										$jan_month_wise_count_cashless = 0;
										$feb_month_wise_count_cashless = 0;
										$mar_month_wise_count_cashless = 0;
										$apr_month_wise_count_cashless = 0;
										$may_month_wise_count_cashless = 0;
										$jun_month_wise_count_cashless = 0;
										$july_month_wise_count_cashless = 0;
										$aug_month_wise_count_cashless = 0;
										$sep_month_wise_count_cashless = 0;
										$oct_month_wise_count_cashless = 0;
										$nov_month_wise_count_cashless = 0;
										$dec_month_wise_count_cashless = 0;
									}
									
									/* echo"<pre>";print_r($get_month_wise_report_cashless_jan);echo"</pre>"; */
									
									
									$get_month_wise_report_Reimbursement_jan = $this->corporate_dashboard_model->get_month_wise_report_Reimbursement_jan($corporate_id,$policy_id);
									
									if($get_month_wise_report_Reimbursement_jan != ''){
										
										foreach($get_month_wise_report_Reimbursement_jan as $get_month_wise_report_Reimbursement_jan_data){
											
											$claim_filed_date = date("d-m-Y", strtotime($get_month_wise_report_Reimbursement_jan_data->claim_filed_date));
											
											$claim_filed_date = explode("-", $claim_filed_date);
											
											if($claim_filed_date[1] == "01"){ //jan
												
												$jan_month_wise_count_Reimbursement += 1;
												
											}else{
												$jan_month_wise_count_Reimbursement += 0;
											}
											
											
											if($claim_filed_date[1] == "02"){ // Feb
												$feb_month_wise_count_Reimbursement += 1;
											}else{
												$feb_month_wise_count_Reimbursement += 0;
											}
											
											if($claim_filed_date[1] == "03"){ // March
												$mar_month_wise_count_Reimbursement += 1;
											}else{
												$mar_month_wise_count_Reimbursement += 0;
											}
											
											if($claim_filed_date[1] == "04"){ // April
												$apr_month_wise_count_Reimbursement += 1;
											}else{
												$apr_month_wise_count_Reimbursement += 0;
											}


											if($claim_filed_date[1] == "05"){ // May
												$may_month_wise_count_Reimbursement += 1;
											}else{
												$may_month_wise_count_Reimbursement += 0;
											}

											if($claim_filed_date[1] == "06"){ // June
												$jun_month_wise_count_Reimbursement += 1;
											}else{
												$jun_month_wise_count_Reimbursement += 0;
											}

											if($claim_filed_date[1] == "07"){ // July
												$july_month_wise_count_Reimbursement += 1;
											}else{
												$july_month_wise_count_Reimbursement += 0;
											}

											if($claim_filed_date[1] == "08"){ // Aug
												$aug_month_wise_count_Reimbursement += 1;
											}else{
												$aug_month_wise_count_Reimbursement += 0;
											}

											if($claim_filed_date[1] == "09"){ // Sep
												$sep_month_wise_count_Reimbursement += 1;
											}else{
												$sep_month_wise_count_Reimbursement += 0;
											}

											if($claim_filed_date[1] == "10"){ // Oct
												$oct_month_wise_count_Reimbursement += 1;
											}else{
												$oct_month_wise_count_Reimbursement += 0;
											}

											if($claim_filed_date[1] == "11"){ // nov
												$nov_month_wise_count_Reimbursement += 1;
											}else{
												$nov_month_wise_count_Reimbursement += 0;
											}

										

											
											if($claim_filed_date[1] == "12"){ // dec
												$dec_month_wise_count_Reimbursement += 1;
											}else{
												$dec_month_wise_count_Reimbursement += 0;
											}
											
											//echo"<pre>";print_r($claim_filed_date);echo"</pre>";
											
											
										}
										
										
										
									}else{
										$jan_month_wise_count_Reimbursement = 0;
										$feb_month_wise_count_Reimbursement = 0;
										$mar_month_wise_count_Reimbursement = 0;
										$apr_month_wise_count_Reimbursement = 0;
										$may_month_wise_count_Reimbursement = 0;
										$jun_month_wise_count_Reimbursement = 0;
										$july_month_wise_count_Reimbursement = 0;
										$aug_month_wise_count_Reimbursement = 0;
										$sep_month_wise_count_Reimbursement = 0;
										$oct_month_wise_count_Reimbursement = 0;
										$nov_month_wise_count_Reimbursement = 0;
										$dec_month_wise_count_Reimbursement = 0;
									}
									
									/* echo"<pre>";print_r($get_month_wise_report_cashless_jan);echo"</pre>"; */
									
								 
									$grand_total_month_wise_cashless =  $jan_month_wise_count_cashless + $feb_month_wise_count_cashless+ $mar_month_wise_count_cashless +$apr_month_wise_count_cashless +$may_month_wise_count_cashless +$jun_month_wise_count_cashless +$july_month_wise_count_cashless +$aug_month_wise_count_cashless +$sep_month_wise_count_cashless +$oct_month_wise_count_cashless +$nov_month_wise_count_cashless +$dec_month_wise_count_cashless ;
									
									$grand_total_month_wise_Reimbursement = $jan_month_wise_count_Reimbursement + $feb_month_wise_count_Reimbursement+ $mar_month_wise_count_Reimbursement +$apr_month_wise_count_Reimbursement +$may_month_wise_count_Reimbursement +$jun_month_wise_count_Reimbursement +$july_month_wise_count_Reimbursement +$aug_month_wise_count_Reimbursement +$sep_month_wise_count_Reimbursement +$oct_month_wise_count_Reimbursement +$nov_month_wise_count_Reimbursement +$dec_month_wise_count_Reimbursement ;
									
									$grand_total_month_wise_cashless_jan = $jan_month_wise_count_cashless+ $jan_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_feb = $feb_month_wise_count_cashless+ $feb_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_march = $mar_month_wise_count_cashless+ $mar_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_apr = $apr_month_wise_count_cashless+ $apr_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_may = $may_month_wise_count_cashless+ $may_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_jun = $jun_month_wise_count_cashless+ $jun_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_july = $july_month_wise_count_cashless+ $july_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_aug = $aug_month_wise_count_cashless+ $aug_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_sep = $sep_month_wise_count_cashless+ $sep_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_oct = $oct_month_wise_count_cashless+ $oct_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_nov = $nov_month_wise_count_cashless+ $nov_month_wise_count_Reimbursement;
									$grand_total_month_wise_cashless_dec = $dec_month_wise_count_cashless+ $dec_month_wise_count_Reimbursement;
									
									$grand_total_month_wise_cashless_all = $grand_total_month_wise_cashless_jan+ $grand_total_month_wise_cashless_feb + $grand_total_month_wise_cashless_march + $grand_total_month_wise_cashless_apr + $grand_total_month_wise_cashless_may+ $grand_total_month_wise_cashless_jun + $grand_total_month_wise_cashless_july + $grand_total_month_wise_cashless_aug + $grand_total_month_wise_cashless_sep + $grand_total_month_wise_cashless_oct + $grand_total_month_wise_cashless_nov  + $grand_total_month_wise_cashless_dec;
								 
								 ?>
								 
								 <div class="row">
									<div class="col-md-6">
										<table style="width:100%;margin-top: 14%;" class="table_report">
										  <tr>
											<th>Month</th>
											<th>Cashless</th> 
											<th>Reimbursement</th>
											<th>Grand Total</th>
											
										  </tr>
										  <tr>
											
											<td>Jan</td>
											<td><?php echo $jan_month_wise_count_cashless;?></td>
											<td><?php echo $jan_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_jan;?></td>
											
											
										  </tr>
										  <tr>
											<td>Feb</td>
											<td><?php echo $feb_month_wise_count_cashless;?></td>
											<td><?php echo $feb_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_feb;?></td>
											
										  </tr>
										  
										  <tr>
											<td>Mar</td>
											<td><?php echo $mar_month_wise_count_cashless;?></td>
											<td><?php echo $mar_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_march;?></td>
											
										  </tr>

										  <tr>
											<td>Apr</td>
											<td><?php echo $apr_month_wise_count_cashless;?></td>
											<td><?php echo $apr_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_apr;?></td>
											
										  </tr>

										  <tr>
											<td>May</td>
											<td><?php echo $may_month_wise_count_cashless;?></td>
											<td><?php echo $may_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_may;?></td>
											
										  </tr>

										  <tr>
											<td>Jun</td>
											<td><?php echo $jun_month_wise_count_cashless;?></td>
											<td><?php echo $jun_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_jun;?></td>
											
										  </tr>


										  <tr>
											<td>July</td>
											<td><?php echo $july_month_wise_count_cashless;?></td>
											<td><?php echo $july_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_july;?></td>
											
										  </tr>

										  <tr>
											<td>Aug</td>
											<td><?php echo $aug_month_wise_count_cashless;?></td>
											<td><?php echo $aug_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_aug;?></td>
											
										  </tr>


										  <tr>
											<td>Sep</td>
											<td><?php echo $sep_month_wise_count_cashless;?></td>
											<td><?php echo $sep_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_sep;?></td>
											
										  </tr>

										  <tr>
											<td>Oct</td>
											<td><?php echo $oct_month_wise_count_cashless;?></td>
											<td><?php echo $oct_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_oct;?></td>
											
										  </tr>

										  <tr>
											<td>Nov</td>
											<td><?php echo $nov_month_wise_count_cashless;?></td>
											<td><?php echo $nov_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_nov;?></td>
											
										  </tr>
										  
										  <tr>
											<td>Dec</td>
											<td><?php echo $dec_month_wise_count_cashless;?></td>
											<td><?php echo $dec_month_wise_count_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_dec;?></td>
											
										  </tr>
										  
										  <tr>
											<td>Grand Total</td>
											<td><?php echo $grand_total_month_wise_cashless;?></td>
											<td><?php echo $grand_total_month_wise_Reimbursement;?></td>
											<td><?php echo $grand_total_month_wise_cashless_all;?></td>
											
										  </tr>
										  
										</table>
									</div>
								</div>
								 
							</div>
							  
							  
							  <div id="menu3" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Gender Wise</h5>
                                    </div>
                                 </div>
								 
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="pieChart"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
								 </div>
								 
								 <?php
								 
									$get_gender_wise_report_female = $this->corporate_dashboard_model->get_gender_wise_report_female($corporate_id,$policy_id);
									
									
									if($get_gender_wise_report_female != ''){
										
										foreach($get_gender_wise_report_female as $get_gender_wise_report_female_data){
											
											$total_count_gender_wise_report_female += 1;
											$total_amount_claimed_gender_wise_report_female += $get_gender_wise_report_female_data->amount_claimed;
										}
										
										
									}else{
										
										$total_count_gender_wise_report_female = 0;
										$total_amount_claimed_gender_wise_report_female = 0;
									}
									
									
									/* echo"<pre>";print_r($get_gender_wise_report_female);echo"</pre>"; */
									
									$get_gender_wise_report_male = $this->corporate_dashboard_model->get_gender_wise_report_male($corporate_id,$policy_id);
									
									
									if($get_gender_wise_report_male != ''){
										
										foreach($get_gender_wise_report_male as $get_gender_wise_report_male_data){
											
											$total_count_gender_wise_report_male += 1;
											$total_amount_claimed_gender_wise_report_male += $get_gender_wise_report_male_data->amount_claimed;
										}
										
										
									}else{
										
										$total_count_gender_wise_report_male = 0;
										$total_amount_claimed_gender_wise_report_male = 0;
									}
									
									
									$grand_total_count_gender_wise_report = $total_count_gender_wise_report_female + $total_count_gender_wise_report_male;
									
									$grand_total_amount_gender_wise_report = $total_amount_claimed_gender_wise_report_female + $total_amount_claimed_gender_wise_report_male;
									
									
									$total_percentage_gender_wise_report_female = $total_amount_claimed_gender_wise_report_female / $grand_total_amount_gender_wise_report;
									
									$total_percentage_gender_wise_report_female = number_format($total_percentage_gender_wise_report_female, 2, '.', '');
									
									$total_percentage_gender_wise_report_male = $total_amount_claimed_gender_wise_report_male / $grand_total_amount_gender_wise_report;
									
									$total_percentage_gender_wise_report_male = number_format($total_percentage_gender_wise_report_male, 2, '.', '');
									
									
									//echo"<pre>";print_r($get_gender_wise_report_male);echo"</pre>";
									
								 
								 ?>
								 
								 <div class="row">
									<div class="col-md-6">
										<table style="width:100%;margin-top: 14%;" class="table_report">
										  <tr>
											<th>Gender</th>
											<th>%</th> 
											<th>Claim Count</th>
											<th>Claim Amount</th>
											
										  </tr>
										  <tr>
											
											<td>Female</td>
											<td><?php echo $total_percentage_gender_wise_report_female;?></td>
											<td><?php echo $total_count_gender_wise_report_female;?></td>
											<td><?php echo number_format($total_amount_claimed_gender_wise_report_female);?></td>
											
											
										  </tr>
										  
										  <tr>
											
											<td>Male</td>
											<td><?php echo $total_percentage_gender_wise_report_male;?></td>
											<td><?php echo $total_count_gender_wise_report_male;?></td>
											<td><?php echo number_format($total_amount_claimed_gender_wise_report_male);?></td>
											
											
										  </tr>
										  
										    <tr>
											
											<td>Grand Total</td>
											<td><?php echo $total_percentage_gender_wise_report_female + $total_percentage_gender_wise_report_male;?></td>
											<td><?php echo $grand_total_count_gender_wise_report;?></td>
											<td><?php echo number_format($grand_total_amount_gender_wise_report);?></td>
											
											
										  </tr>
										  
										</table>
									</div>
								</div>
								 
							</div>




<div id="menu5" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Age Band Wise</h5>
                                    </div>
                                 </div>
								 
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="barChartp_age"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
								 </div>
								 
								 <?php
								 	/*  Closed */

									$age = "0-25";
									$get_age_band_wise_report_closed = $this->corporate_dashboard_model->get_age_band_wise_report_closed($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_closed != ''){
										
										foreach($get_age_band_wise_report_closed as $get_age_band_wise_report_closed_data){
								
											$total_amount_age_band_wise_report_closed_0_25 += $get_age_band_wise_report_closed_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_closed_0_25 = 0;
										
									}
									
									
									$age = "26-35";
									$get_age_band_wise_report_closed = $this->corporate_dashboard_model->get_age_band_wise_report_closed($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_closed != ''){
										
										foreach($get_age_band_wise_report_closed as $get_age_band_wise_report_closed_data){
								
											$total_amount_age_band_wise_report_closed_26_35 += $get_age_band_wise_report_closed_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_closed_26_35 = 0;
										
									}
									
									
									$age = "36-45";
									$get_age_band_wise_report_closed = $this->corporate_dashboard_model->get_age_band_wise_report_closed($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_closed != ''){
										
										foreach($get_age_band_wise_report_closed as $get_age_band_wise_report_closed_data){
								
											$total_amount_age_band_wise_report_closed_36_45 += $get_age_band_wise_report_closed_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_closed_36_45 = 0;
										
									}
									
									$age = "46-55";
									$get_age_band_wise_report_closed = $this->corporate_dashboard_model->get_age_band_wise_report_closed($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_closed != ''){
										
										foreach($get_age_band_wise_report_closed as $get_age_band_wise_report_closed_data){
								
											$total_amount_age_band_wise_report_closed_46_55 += $get_age_band_wise_report_closed_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_closed_46_55 = 0;
										
									}
									
									
									$age = "56-65";
									$get_age_band_wise_report_closed = $this->corporate_dashboard_model->get_age_band_wise_report_closed($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_closed != ''){
										
										foreach($get_age_band_wise_report_closed as $get_age_band_wise_report_closed_data){
								
											$total_amount_age_band_wise_report_closed_56_65 += $get_age_band_wise_report_closed_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_closed_56_65 = 0;
										
									}
									
									
									$age = "66-1000";
									$get_age_band_wise_report_closed = $this->corporate_dashboard_model->get_age_band_wise_report_closed($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_closed != ''){
										
										foreach($get_age_band_wise_report_closed as $get_age_band_wise_report_closed_data){
								
											$total_amount_age_band_wise_report_closed_66 += $get_age_band_wise_report_closed_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_closed_66 = 0;
										
									}
									
									
									
									//echo"<pre>";print_r($get_age_band_wise_report_closed);echo"</pre>";
									
									/*  Outstanding */
									
									$age = "0-25";
									$get_age_band_wise_report_outsatnding = $this->corporate_dashboard_model->get_age_band_wise_report_outsatnding($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_outsatnding != ''){
										
										foreach($get_age_band_wise_report_outsatnding as $get_age_band_wise_report_outsatnding_data){
								
											$total_amount_age_band_wise_report_outsatnding_0_25 += $get_age_band_wise_report_outsatnding_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_outsatnding_0_25 = 0;
										
									}
									
									
									
									
									$age = "26-35";
									$get_age_band_wise_report_outsatnding = $this->corporate_dashboard_model->get_age_band_wise_report_outsatnding($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_outsatnding != ''){
										
										foreach($get_age_band_wise_report_outsatnding as $get_age_band_wise_report_outsatnding_data){
								
											$total_amount_age_band_wise_report_outsatnding_26_35 += $get_age_band_wise_report_outsatnding_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_outsatnding_26_35 = 0;
										
									}
									
									
									$age = "36-45";
									$get_age_band_wise_report_outsatnding = $this->corporate_dashboard_model->get_age_band_wise_report_outsatnding($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_outsatnding != ''){
										
										foreach($get_age_band_wise_report_outsatnding as $get_age_band_wise_report_outsatnding_data){
								
											$total_amount_age_band_wise_report_outsatnding_36_45 += $get_age_band_wise_report_outsatnding_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_outsatnding_36_45 = 0;
										
									}
									
									$age = "46-55";
									$get_age_band_wise_report_outsatnding = $this->corporate_dashboard_model->get_age_band_wise_report_outsatnding($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_outsatnding != ''){
										
										foreach($get_age_band_wise_report_outsatnding as $get_age_band_wise_report_outsatnding_data){
								
											$total_amount_age_band_wise_report_outsatnding_46_55 += $get_age_band_wise_report_outsatnding_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_outsatnding_46_55 = 0;
										
									}
									
									
									$age = "56-65";
									$get_age_band_wise_report_outsatnding = $this->corporate_dashboard_model->get_age_band_wise_report_outsatnding($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_outsatnding != ''){
										
										foreach($get_age_band_wise_report_outsatnding as $get_age_band_wise_report_outsatnding_data){
								
											$total_amount_age_band_wise_report_outsatnding_56_65 += $get_age_band_wise_report_outsatnding_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_outsatnding_56_65 = 0;
										
									}
									
									
									$age = "66-1000";
									$get_age_band_wise_report_outsatnding = $this->corporate_dashboard_model->get_age_band_wise_report_outsatnding($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_outsatnding != ''){
										
										foreach($get_age_band_wise_report_outsatnding as $get_age_band_wise_report_outsatnding_data){
								
											$total_amount_age_band_wise_report_outsatnding_66 += $get_age_band_wise_report_outsatnding_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_outsatnding_66 = 0;
										
									}



									/*  Paid */

									$age = "0-25";
									$get_age_band_wise_report_paid = $this->corporate_dashboard_model->get_age_band_wise_report_paid($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_paid != ''){
										
										foreach($get_age_band_wise_report_paid as $get_age_band_wise_report_paid_data){
								
											$total_amount_age_band_wise_report_paid_0_25 += $get_age_band_wise_report_paid_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_paid_0_25 = 0;
										
									}
									
									
									$age = "26-35";
									$get_age_band_wise_report_paid = $this->corporate_dashboard_model->get_age_band_wise_report_paid($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_paid != ''){
										
										foreach($get_age_band_wise_report_paid as $get_age_band_wise_report_paid_data){
								
											$total_amount_age_band_wise_report_paid_26_35 += $get_age_band_wise_report_paid_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_paid_26_35 = 0;
										
									}

									//echo"<pre>";print_r($get_age_band_wise_report_paid);echo"</pre>";
									
									
									$age = "36-45";
									$get_age_band_wise_report_paid = $this->corporate_dashboard_model->get_age_band_wise_report_paid($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_paid != ''){
										
										foreach($get_age_band_wise_report_paid as $get_age_band_wise_report_paid_data){
								
											$total_amount_age_band_wise_report_paid_36_45 += $get_age_band_wise_report_paid_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_paid_36_45 = 0;
										
									}
									
									$age = "46-55";
									$get_age_band_wise_report_paid = $this->corporate_dashboard_model->get_age_band_wise_report_paid($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_paid != ''){
										
										foreach($get_age_band_wise_report_paid as $get_age_band_wise_report_paid_data){
								
											$total_amount_age_band_wise_report_paid_46_55 += $get_age_band_wise_report_paid_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_paid_46_55 = 0;
										
									}
									
									
									$age = "56-65";
									$get_age_band_wise_report_paid = $this->corporate_dashboard_model->get_age_band_wise_report_paid($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_paid != ''){
										
										foreach($get_age_band_wise_report_paid as $get_age_band_wise_report_paid_data){
								
											$total_amount_age_band_wise_report_paid_56_65 += $get_age_band_wise_report_paid_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_paid_56_65 = 0;
										
									}
									
									
									$age = "66-1000";
									$get_age_band_wise_report_paid = $this->corporate_dashboard_model->get_age_band_wise_report_paid($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_paid != ''){
										
										foreach($get_age_band_wise_report_paid as $get_age_band_wise_report_paid_data){
								
											$total_amount_age_band_wise_report_paid_66 += $get_age_band_wise_report_paid_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_paid_66 = 0;
										
									}


									/*  Rejected */

									$age = "0-25";
									$get_age_band_wise_report_rejected = $this->corporate_dashboard_model->get_age_band_wise_report_rejected($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_rejected != ''){
										
										foreach($get_age_band_wise_report_rejected as $get_age_band_wise_report_rejected_data){
								
											$total_amount_age_band_wise_report_rejected_0_25 += $get_age_band_wise_report_rejected_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_rejected_0_25 = 0;
										
									}
									
									
									$age = "26-35";
									$get_age_band_wise_report_rejected = $this->corporate_dashboard_model->get_age_band_wise_report_rejected($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_rejected != ''){
										
										foreach($get_age_band_wise_report_rejected as $get_age_band_wise_report_rejected_data){
								
											$total_amount_age_band_wise_report_rejected_26_35 += $get_age_band_wise_report_rejected_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_rejected_26_35 = 0;
										
									}

									//echo"<pre>";print_r($get_age_band_wise_report_paid);echo"</pre>";
									
									
									$age = "36-45";
									$get_age_band_wise_report_rejected = $this->corporate_dashboard_model->get_age_band_wise_report_rejected($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_rejected != ''){
										
										foreach($get_age_band_wise_report_rejected as $get_age_band_wise_report_rejected_data){
								
											$total_amount_age_band_wise_report_rejected_36_45 += $get_age_band_wise_report_rejected_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_rejected_36_45 = 0;
										
									}
									
									$age = "46-55";
									$get_age_band_wise_report_rejected = $this->corporate_dashboard_model->get_age_band_wise_report_rejected($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_rejected != ''){
										
										foreach($get_age_band_wise_report_rejected as $get_age_band_wise_report_rejected_data){
								
											$total_amount_age_band_wise_report_rejected_46_55 += $get_age_band_wise_report_rejected_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_rejected_46_55 = 0;
										
									}
									
									
									$age = "56-65";
									$get_age_band_wise_report_rejected = $this->corporate_dashboard_model->get_age_band_wise_report_rejected($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_paid != ''){
										
										foreach($get_age_band_wise_report_rejected as $get_age_band_wise_report_rejected_data){
								
											$total_amount_age_band_wise_report_rejected_56_65 += $get_age_band_wise_report_rejected_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_rejected_56_65 = 0;
										
									}
									
									
									$age = "66-1000";
									$get_age_band_wise_report_rejected = $this->corporate_dashboard_model->get_age_band_wise_report_rejected($corporate_id,$policy_id,$age);
									
									if($get_age_band_wise_report_rejected != ''){
										
										foreach($get_age_band_wise_report_rejected as $get_age_band_wise_report_rejected_data){
								
											$total_amount_age_band_wise_report_rejected_66 += $get_age_band_wise_report_rejected_data->amount_claimed;
										}
										
									}else{
										
										$total_amount_age_band_wise_report_rejected_66 = 0;
										
									}
									
								 
								 ?>
								 
								 <div class="row">
									<div class="col-md-6">
										<table style="width:100%;margin-top: 14%;" class="table_report">
										  <tr>
											<th>Claim Status</th>
											<th>0-25</th>
											<th>26-35</th>
											<th>36-45</th>
											<th>46-55</th>
											<th>56-65</th>
											<th>> 65</th>
											<th>Grand Total</th>
										  </tr>
										<tr>
											<?php

												$grand_total_closed = $total_amount_age_band_wise_report_closed_0_25 + 
																			 $total_amount_age_band_wise_report_closed_26_35 + 
																			 $total_amount_age_band_wise_report_closed_36_45 + 
																			 $total_amount_age_band_wise_report_closed_46_55 + 
																			 $total_amount_age_band_wise_report_closed_56_65 + 
																			 $total_amount_age_band_wise_report_closed_66  ;
											?>
											
											<td>Closed</td>
											<td><?php echo $total_amount_age_band_wise_report_closed_0_25;?></td>
											<td><?php echo $total_amount_age_band_wise_report_closed_26_35;?></td>
											<td><?php echo $total_amount_age_band_wise_report_closed_36_45;?></td>
											<td><?php echo $total_amount_age_band_wise_report_closed_46_55;?></td>
											<td><?php echo $total_amount_age_band_wise_report_closed_56_65;?></td>
											<td><?php echo $total_amount_age_band_wise_report_closed_66;?></td>
											<td><?php echo $grand_total_closed;?></td>
										</tr>
										
										<tr>

											<?php

												$grand_total_outstanding = $total_amount_age_band_wise_report_outstanding_0_25 + 
																			 $total_amount_age_band_wise_report_outsatnding_26_35 + 
																			 $total_amount_age_band_wise_report_outsatnding_36_45 + 
																			 $total_amount_age_band_wise_report_outsatnding_46_55 + 
																			 $total_amount_age_band_wise_report_outsatnding_56_65 + 
																			 $total_amount_age_band_wise_report_outsatnding_66  ;
											?>
											
											<td>Outstanding</td>
											<td><?php echo $total_amount_age_band_wise_report_outstanding_0_25;?></td>
											
											<td><?php echo $total_amount_age_band_wise_report_outsatnding_26_35;?></td>
											<td><?php echo $total_amount_age_band_wise_report_outsatnding_36_45;?></td>
											<td><?php echo $total_amount_age_band_wise_report_outsatnding_46_55;?></td>
											<td><?php echo $total_amount_age_band_wise_report_outsatnding_56_65;?></td>
											<td><?php echo $total_amount_age_band_wise_report_outsatnding_66;?></td>
											<td><?php echo $grand_total_outstanding;?></td>
										</tr>

										<?php

												$grand_total_paid = $total_amount_age_band_wise_report_paid_0_25 + 
																			 $total_amount_age_band_wise_report_paid_26_35 + 
																			 $total_amount_age_band_wise_report_paid_36_45 + 
																			 $total_amount_age_band_wise_report_paid_46_55 + 
																			 $total_amount_age_band_wise_report_paid_56_65 + 
																			 $total_amount_age_band_wise_report_paid_66  ;
											?>
										
										<tr>
											
											<td>Paid</td>
											<td><?php echo $total_amount_age_band_wise_report_paid_0_25;?></td>
											<td><?php echo $total_amount_age_band_wise_report_paid_26_35;?></td>
											<td><?php echo $total_amount_age_band_wise_report_paid_36_45;?></td>
											<td><?php echo $total_amount_age_band_wise_report_paid_46_55;?></td>
											<td><?php echo $total_amount_age_band_wise_report_paid_56_65;?></td>
											<td><?php echo $total_amount_age_band_wise_report_paid_66;?></td>
											<td><?php echo $grand_total_paid;?></td>
										</tr>
										
										 
										 <?php

												$grand_total_rejected = $total_amount_age_band_wise_report_rejected_0_25 + 
																			 $total_amount_age_band_wise_report_rejected_26_35 + 
																			 $total_amount_age_band_wise_report_rejected_36_45 + 
																			 $total_amount_age_band_wise_report_rejected_46_55 + 
																			 $total_amount_age_band_wise_report_rejected_56_65 + 
																			 $total_amount_age_band_wise_report_rejected_66  ;
											?>

										 <tr>
											
											<td>Rejected</td>
											<td><?php echo $total_amount_age_band_wise_report_rejected_0_25;?></td>
											<td><?php echo $total_amount_age_band_wise_report_rejected_26_35;?></td>
											<td><?php echo $total_amount_age_band_wise_report_rejected_36_45;?></td>
											<td><?php echo $total_amount_age_band_wise_report_rejected_46_55;?></td>
											<td><?php echo $total_amount_age_band_wise_report_rejected_56_65;?></td>
											<td><?php echo $total_amount_age_band_wise_report_rejected_66;?></td>
											<td><?php echo $grand_total_rejected;?></td>
										</tr>

										<?php

												$grand_total_0_25 = $total_amount_age_band_wise_report_closed_0_25 + 
																			 $total_amount_age_band_wise_report_outstanding_0_25 + 
																			 $total_amount_age_band_wise_report_paid_0_25 + 
																			 $total_amount_age_band_wise_report_rejected_0_25  ;

												$grand_total_26_35 = $total_amount_age_band_wise_report_closed_26_35 + 
																			 $total_amount_age_band_wise_report_outsatnding_26_35 + 
																			 $total_amount_age_band_wise_report_paid_26_35 + 
																			 $total_amount_age_band_wise_report_rejected_26_35  ;

												$grand_total_36_45 = $total_amount_age_band_wise_report_closed_36_45 + 
																			 $total_amount_age_band_wise_report_outsatnding_36_45 + 
																			 $total_amount_age_band_wise_report_paid_36_45 + 
																			 $total_amount_age_band_wise_report_rejected_36_45  ;

											 $grand_total_46_55 = $total_amount_age_band_wise_report_closed_46_55 + 
																		 $total_amount_age_band_wise_report_outsatnding_46_55 + 
																		 $total_amount_age_band_wise_report_paid_46_55 + 
																		 $total_amount_age_band_wise_report_rejected_46_55  ;

											$grand_total_56_65 = $total_amount_age_band_wise_report_closed_56_65 + 
																		 $total_amount_age_band_wise_report_outsatnding_56_65 + 
																		 $total_amount_age_band_wise_report_paid_56_65 + 
																		 $total_amount_age_band_wise_report_rejected_56_65  ;

											$grand_total_66 = $total_amount_age_band_wise_report_closed_66 + 
																		 $total_amount_age_band_wise_report_outsatnding_66 + 
																		 $total_amount_age_band_wise_report_paid_66 + 
																		 $total_amount_age_band_wise_report_rejected_66  ;

											$grand_total_final = $grand_total_closed +  $grand_total_outstanding + $grand_total_paid + $grand_total_rejected ;
											?>

										<tr>
											
											<td>Grand Total</td>
											<td><?php echo $grand_total_0_25; ?></td>
											<td><?php echo $grand_total_26_35; ?></td>
											<td><?php echo $grand_total_36_45; ?></td>
											<td><?php echo $grand_total_46_55; ?></td>
											<td><?php echo $grand_total_56_65; ?></td>
											<td><?php echo $grand_total_66; ?></td>
											
											<td><?php echo $grand_total_final; ?></td>
										</tr>
										  
										</table>
									</div>
								</div>
								 
							</div>
							
							 
							  <div id="menu4" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Relation Wise</h5>
                                    </div>
                                 </div>
								 
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="barChartp"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
								 </div>
								 
								 <?php
								 
									$get_relation_wise_report_daughter = $this->corporate_dashboard_model->get_relation_wise_report_daughter($corporate_id,$policy_id);
									
									if($get_relation_wise_report_daughter != ''){
										
										foreach($get_relation_wise_report_daughter as $get_relation_wise_report_daughter_data){
											$total_count_relation_wise_report_daughter += 1;
											$total_amount_relation_wise_report_daughter += $get_relation_wise_report_daughter_data->amount_claimed;
										}
										
									}else{
										
										$total_count_relation_wise_report_daughter = 0;
										$total_amount_relation_wise_report_daughter = 0 ;
										
									}
									
									$relation = 'Employee';
									$get_relation_wise_report_employee = $this->corporate_dashboard_model->get_relation_wise_report_employee($corporate_id,$policy_id,$relation);
									
									if($get_relation_wise_report_employee != ''){
										
										foreach($get_relation_wise_report_employee as $get_relation_wise_report_employee_data){
											$total_count_relation_wise_report_employee += 1;
											$total_amount_relation_wise_report_employee += $get_relation_wise_report_employee_data->amount_claimed;
										}
										
									}else{
										
										$total_count_relation_wise_report_employee = 0;
										$total_amount_relation_wise_report_employee = 0 ;
										
									}
									
									
									$relation = 'Father';
									$get_relation_wise_report_father = $this->corporate_dashboard_model->get_relation_wise_report_employee($corporate_id,$policy_id,$relation);
									
									if($get_relation_wise_report_father != ''){
										
										foreach($get_relation_wise_report_father as $get_relation_wise_report_father_data){
											$total_count_relation_wise_report_father += 1;
											$total_amount_relation_wise_report_father += $get_relation_wise_report_father_data->amount_claimed;
										}
										
									}else{
										
										$total_count_relation_wise_report_father = 0;
										$total_amount_relation_wise_report_father = 0 ;
										
									}
									
									
									$relation = 'Mother';
									$get_relation_wise_report_mother = $this->corporate_dashboard_model->get_relation_wise_report_employee($corporate_id,$policy_id,$relation);
									
									if($get_relation_wise_report_mother != ''){
										
										foreach($get_relation_wise_report_mother as $get_relation_wise_report_mother_data){
											$total_count_relation_wise_report_mother += 1;
											$total_amount_relation_wise_report_mother += $get_relation_wise_report_mother_data->amount_claimed;
										}
										
									}else{
										
										$total_count_relation_wise_report_mother = 0;
										$total_amount_relation_wise_report_mother = 0 ;
										
									}
									
									
									$relation = 'Son';
									$get_relation_wise_report_son = $this->corporate_dashboard_model->get_relation_wise_report_employee($corporate_id,$policy_id,$relation);
									
									/* echo "<pre>";print_r($get_relation_wise_report_son);echo "</pre>"; */
									
									if($get_relation_wise_report_son != ''){
										
										foreach($get_relation_wise_report_son as $get_relation_wise_report_son_data){
											$total_count_relation_wise_report_son += 1;
											$total_amount_relation_wise_report_son += $get_relation_wise_report_son_data->amount_claimed;
										}
										
									}else{
										
										$total_count_relation_wise_report_son = 0;
										$total_amount_relation_wise_report_son = 0 ;
										
									}
									
									
									
									
									$get_relation_wise_report_spouce = $this->corporate_dashboard_model->get_relation_wise_report_spouce($corporate_id,$policy_id,$relation);
									
									if($get_relation_wise_report_spouce != ''){
										
										foreach($get_relation_wise_report_spouce as $get_relation_wise_report_spouce_data){
											$total_count_relation_wise_report_spouce += 1;
											$total_amount_relation_wise_report_spouce += $get_relation_wise_report_spouce_data->amount_claimed;
										}
										
									}else{
										
										$total_count_relation_wise_report_spouce = 0;
										$total_amount_relation_wise_report_spouce = 0 ;
										
									}
									
									
									
									$total_claim_count = $total_count_relation_wise_report_daughter + $total_count_relation_wise_report_employee +$total_count_relation_wise_report_father+ $total_count_relation_wise_report_mother+ $total_count_relation_wise_report_son + $total_count_relation_wise_report_spouce;
									
									
									$total_claim_amount = $total_amount_relation_wise_report_daughter + $total_amount_relation_wise_report_employee +$total_amount_relation_wise_report_father+ $total_amount_relation_wise_report_mother+ $total_amount_relation_wise_report_son + $total_amount_relation_wise_report_spouce;
									
									//echo"<pre>";print_r($get_relation_wise_report_spouce);echo"</pre>";
									
								 
								 ?>
								 
								 <div class="row">
									<div class="col-md-6">
										<table style="width:100%;margin-top: 14%;" class="table_report">
										  <tr>
											<th>Relation</th>
											<th>Claim Count</th>
											<th>Claim Amount</th>
											
										  </tr>
										<tr>
											
											<td>Daughter</td>
											<td><?php echo $total_count_relation_wise_report_daughter;?></td>
											<td><?php echo number_format($total_amount_relation_wise_report_daughter);?></td>
										</tr>
										<tr>
											
											<td>Employee</td>
											<td><?php echo $total_count_relation_wise_report_employee;?></td>
											<td><?php echo number_format($total_amount_relation_wise_report_employee);?></td>
										</tr>
										<tr>
											
											<td>Father</td>
											<td><?php echo $total_count_relation_wise_report_father;?></td>
											<td><?php echo number_format($total_amount_relation_wise_report_father);?></td>
										</tr>
										
										<tr>
											
											<td>Mother</td>
											<td><?php echo $total_count_relation_wise_report_mother;?></td>
											<td><?php echo number_format($total_amount_relation_wise_report_mother);?></td>
										</tr>
										<tr>
											
											<td>Son</td>
											<td><?php echo $total_count_relation_wise_report_son;?></td>
											<td><?php echo number_format($total_amount_relation_wise_report_son);?></td>
										</tr>
										<tr>
											
											<td>Spouse</td>
											<td><?php echo $total_count_relation_wise_report_spouce;?></td>
											<td><?php echo number_format($total_amount_relation_wise_report_spouce);?></td>
										</tr>
										<tr>
											
											<td>Total</td>
											<td><?php echo $total_claim_count;?></td>
											<td><?php echo number_format($total_claim_amount);?></td>
										</tr>
										 
										  
										</table>
									</div>
								</div>
								 
							</div>
							
							
							 <div id="menu6" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Top 10 Claims</h5>
                                    </div>
                                 </div>
								 
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="barChartp_top_ten"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
								 </div>
								 
								 <?php
								 
									$top_ten_claim_hospital_data = $this->corporate_dashboard_model->top_ten_claim_hospital_data($corporate_id,$policy_id);

									// echo "<pre>";print_r($top_ten_claim_hospital_data);echo "</pre>";
									$hospital_array_amount = array();
									$hospital_array_count = array();
									 foreach($top_ten_claim_hospital_data as $top_ten_claim_hospital_data_new){

											
												$hospital_array_amount[$top_ten_claim_hospital_data_new->hospital_name] += $top_ten_claim_hospital_data_new->amount_claimed;

												$hospital_array_count[$top_ten_claim_hospital_data_new->hospital_name] += 1;
											
									 }

									 arsort($hospital_array_amount);

									 $hospital_array_amount = array_slice($hospital_array_amount, 0, 4);

									//  echo "<pre>";print_r($hospital_array_amount);echo "</pre>";
									//  echo "<pre>";print_r($hospital_array_count);echo "</pre>";

									 
									
								 
								 ?>
								 
								 <div class="row">
									 
									<div class="col-md-6">
									<h3 style="margin-top: 6%;text-align:center">Top 10 Claimed Amount</h3>
										<table style="width:100%;margin-top: 2%;" class="table_report">
										  <tr>
											<th>Hospital Name</th>
											<th>Claim Amount </th>
											<th>Claim Count</th>
											
										  </tr>

										 <?php 
										 
										 $grand_total_claim = 0;
										 $grand_total_count = 0;

										 $report_hospital_name = "";
										 $report_hospital_amount = "";
										 foreach($hospital_array_amount as $key => $val){

											$report_hospital_name .= "'".$key."',";
											$report_hospital_amount .= $val.',';
											 //echo "<pre>";print_r($key);echo "</pre>";
											 ?> 
										<tr>
											
											<td><?php echo $key?></td>
											<td><?php echo number_format($val)?></td>
											<td><?php echo $hospital_array_count[$key]?></td>
										</tr>
										<?php 
											$grand_total_claim +=  $val;

											$grand_total_count +=  $hospital_array_count[$key];
									
									}?>
										<tr>
											<td>Grand Total</td>
											<td><?php echo number_format($grand_total_claim);?></td>
											<td><?php echo $grand_total_count;?></td>
										</tr>

										<?php 
										
										$report_hospital_name = rtrim($report_hospital_name,",");
										$report_hospital_amount = rtrim($report_hospital_amount,",");
										?>
										  
										</table>
									</div>
								</div>
								
								
								<div class="row">
                                    <div class="col-lg-12">
                                       <h5 style="margin-top: 30px;">Top 10 Paid Claims</h5>
                                    </div>
                                 </div>
								 
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="barChartp_top_ten_paid"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
								 </div>
								 
								 <?php
									$top_ten_paid_claim_hospital_data = $this->corporate_dashboard_model->top_ten_paid_claim_hospital_data($corporate_id,$policy_id);

									//  echo "<pre>";print_r($top_ten_paid_claim_hospital_data);echo "</pre>";

									$hospital_amount_sactioned = array();
									$hospital_amount_sactioned_count = array();

									foreach($top_ten_paid_claim_hospital_data as $top_ten_paid_claim_hospital_new){
										
										$hospital_amount_sactioned[$top_ten_paid_claim_hospital_new->hospital_name] += $top_ten_paid_claim_hospital_new->sactioned_amount;

										$hospital_amount_sactioned_count[$top_ten_paid_claim_hospital_new->hospital_name] += 1;
									}


									arsort($hospital_amount_sactioned);

									 $hospital_amount_sactioned_paid = array_slice($hospital_amount_sactioned, 0, 4);

									//   echo "<pre>";print_r($hospital_amount_sactioned_paid);echo "</pre>";

									//   echo "<pre>";print_r($hospital_amount_sactioned_count);echo "</pre>";

								 ?>
								 
								 <div class="row">
									 
									<div class="col-md-6">
									<h3 style="margin-top: 6%;text-align:center">Top 10 Paid Claimed</h3>
										<table style="width:100%;margin-top: 2%;" class="table_report">
										  <tr>
											<th>Hospital Name</th>
											<th>Claim Paid Amount</th>
											<th>Claim Count</th>
											
										  </tr>

										 <?php 
										 $grand_total_claim_paid = 0;
										 $grand_total_count_paid = 0;

										 $report_hospital_name_paid = '';
										 $report_hospital_amount_paid = '';
										 foreach($hospital_amount_sactioned_paid as $key=>$val){

											$report_hospital_name_paid .= "'".$key."',";
											$report_hospital_amount_paid .= $val.',';
										 
										 
											 ?> 
										<tr>
											
											<td><?php echo $key; ?></td>
											<td><?php echo number_format($val); ?></td>
											<td><?php echo $hospital_amount_sactioned_count[$key];?></td>
										</tr>

										<?php 
											$grand_total_claim_paid +=  $val;

											$grand_total_count_paid +=  $hospital_amount_sactioned_count[$key];
									
										}?>

										<tr>
											<td>Grand Total</td>
											<td><?php echo number_format($grand_total_claim_paid);?></td>
											<td><?php echo $grand_total_count_paid;?></td>
										</tr>

										<?php 
											$report_hospital_name_paid = rtrim($report_hospital_name_paid,",");
											$report_hospital_amount_paid = rtrim($report_hospital_amount_paid,",");

											// echo "<pre>";print_r($report_hospital_name_paid);echo "</pre>";
										?>

									

										  
										</table>
									</div>
								</div>
								 
							</div>
							
							
							
							<div id="menu7" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Demography Graph</h5>
                                    </div>
                                 </div>
								 
								 
								 
								 <?php
								 
									$get_demography_graph_report = $this->corporate_dashboard_model->get_demography_graph_report($corporate_id,$policy_id);
									//echo"<pre>";print_r($get_demography_graph_report);echo"</pre>";
									
									$demography_report_sum_insured = array();
									
									foreach($get_demography_graph_report as $get_demography_graph_report_data){
										
										$demography_report_sum_insured[$get_demography_graph_report_data->sum_insured] += 1;
									}
									
									
									$demography_report_sum_insured_new = array();
									
									foreach($demography_report_sum_insured as $key => $val){
										
										$get_demography_graph_report_using_suminsured = $this->corporate_dashboard_model->get_demography_graph_report_using_suminsured($corporate_id,$policy_id,$key);
										
										
										
										foreach($get_demography_graph_report_using_suminsured as $get_demography_graph_report_using_suminsured_data){
											
											if($key == $get_demography_graph_report_using_suminsured_data->sum_insured &&  $get_demography_graph_report_using_suminsured_data->relation == 'SON' || $get_demography_graph_report_using_suminsured_data->relation == 'SON1'){
												
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['SON'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['SON'] + 1;
											}else{
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['SON'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['SON'] + 0;
											}
											
											
											if($key == $get_demography_graph_report_using_suminsured_data->sum_insured &&  $get_demography_graph_report_using_suminsured_data->relation == 'DAUGHTER' || $get_demography_graph_report_using_suminsured_data->relation == 'DAUGHTER1'){
												
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['DAUGHTER'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['DAUGHTER'] + 1;
											}else{
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['DAUGHTER'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['DAUGHTER'] + 0;
											}
											
											if($key == $get_demography_graph_report_using_suminsured_data->sum_insured &&  $get_demography_graph_report_using_suminsured_data->relation == 'Father'){
												
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Father'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Father'] + 1;
											}else{
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Father'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Father'] + 0;
											}
											
											if($key == $get_demography_graph_report_using_suminsured_data->sum_insured &&  $get_demography_graph_report_using_suminsured_data->relation == 'Mother'){
												
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Mother'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Mother'] + 1;
											}else{
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Mother'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Mother'] + 0;
											}
											
											if($key == $get_demography_graph_report_using_suminsured_data->sum_insured &&  $get_demography_graph_report_using_suminsured_data->relation == 'Spouse' || $get_demography_graph_report_using_suminsured_data->relation == 'WIFE' ||$get_demography_graph_report_using_suminsured_data->relation == 'HUSBAND'){
												
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Spouse'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Spouse'] + 1;
											}else{
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Spouse'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Spouse'] + 0;
											}
											
											
											if($key == $get_demography_graph_report_using_suminsured_data->sum_insured &&  $get_demography_graph_report_using_suminsured_data->relation == 'Employee'){
												
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Employee'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Employee'] + 1;
											}else{
												$demography_report_sum_insured_new[$get_demography_graph_report_using_suminsured_data->sum_insured]['Employee'] += [$get_demography_graph_report_using_suminsured_data->sum_insured]['Employee'] + 0;
											}
											
										}
										
										
										
										
										
										//
									}
									
									//echo"<pre>";print_r($demography_report_sum_insured_new);echo"</pre>";
									
									
									
									
									
									
								 
								 ?>
								 
								 <div class="row">
								 
								 <?php
								 
								 foreach($demography_report_sum_insured_new as $key => $val){
										//echo"<pre>";print_r($val);echo"</pre>";
								 
								 ?>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-success">
												  <div class="card-body">
													 <div>
														<canvas id="barChartp_demography_<?php echo $key;?>"></canvas>
													 </div>
												  </div>
												  
											   </div>
											 </div>
											 <div class="col-md-12">
												<h3 style="margin-top: 14%;">Sum Insured - <?php echo $key;?></h3>
												<table style="width:100%;margin-top: 1%;" class="table_report">
													<tr>
														<th>Relation</th>
														<th>Count</th>
													</tr>
													<tr>
														<td>Son</td>
														<td><?php echo $val['SON'];?></td>
													</tr>
													<tr>
														<td>Daughter</td>
														<td><?php echo $val['DAUGHTER'];?></td>
													</tr>

													<tr>
														<td>Father</td>
														<td><?php echo $val['Father'];?></td>
													</tr>
													<tr>
														<td>Mother</td>
														<td><?php echo $val['Mother'];?></td>
													</tr>
													<tr>
														<td>Spouse</td>
														<td><?php echo $val['Spouse'];?></td>
													</tr>
													<tr>
														<td>Employee</td>
														<td><?php echo $val['Employee'];?></td>
													</tr>													
													
													</table>
											 </div>
										</div>
										
                                       
                                    </div>
									<?php } ?>
								 </div>
								
									
								 
							</div>
							
							
									<div id="menu8" class="tab-pane v-tabular fade">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <h5>Endersoment Report</h5>
                                    </div>
                                 </div>
								 
								 <div class="row">
									<div class="col-md-6">
                                       <div class="card card-success">
                                          <div class="card-body">
                                             <div>
                                                <canvas id="stackedChart_endersoment"></canvas>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </div>
								 </div>
								 
								 <?php
								 
									$get_endersoment_report = $this->corporate_dashboard_model->get_endersoment_report($corporate_id,$policy_id);
									
									//echo"<pre>";print_r($get_endersoment_report);echo"</pre>";
									
									if($get_endersoment_report != ''){
										
										foreach($get_endersoment_report as $get_endersoment_report_data){
											
											$date = date("d-m-Y", strtotime($get_endersoment_report_data->date));
											
											$date = explode("-", $date);
											
											if($date[1] == "01" && $get_endersoment_report_data->transaction_type == 'debit'){ //jan
												
												$employee_addition_count_debit_jan += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_jan += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_jan += 0;
												$dependant_addition_count_debit_jan += 0;
											}
											
											if($date[1] == "01" && $get_endersoment_report_data->transaction_type == 'credit'){ //jan
												
												$employee_addition_count_credit_jan += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_jan += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_jan += 0;
												$dependant_addition_count_credit_jan += 0;
											}
											
											
											if($date[1] == "01" && $get_endersoment_report_data->transaction_type == 'nil'){ //jan
												
												$employee_addition_count_nil_jan += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_jan += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_jan += 0;
												$dependant_addition_count_nil_jan += 0;
											}
											
											
											/*Feb*/
											
											if($date[1] == "02" && $get_endersoment_report_data->transaction_type == 'debit'){ //feb
												
												$employee_addition_count_debit_feb += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_feb += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_feb += 0;
												$dependant_addition_count_debit_feb += 0;
											}
											
											if($date[1] == "02" && $get_endersoment_report_data->transaction_type == 'credit'){ //feb
												
												$employee_addition_count_credit_feb += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_feb += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_feb += 0;
												$dependant_addition_count_credit_feb += 0;
											}
											
											
											if($date[1] == "02" && $get_endersoment_report_data->transaction_type == 'nil'){ //feb
												
												$employee_addition_count_nil_feb += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_feb += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_feb += 0;
												$dependant_addition_count_nil_feb += 0;
											}


											/*Mar*/
											
											if($date[1] == "03" && $get_endersoment_report_data->transaction_type == 'debit'){ //Mar
												
												$employee_addition_count_debit_mar += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_mar += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_mar += 0;
												$dependant_addition_count_debit_mar += 0;
											}
											
											if($date[1] == "03" && $get_endersoment_report_data->transaction_type == 'credit'){ //Mar
												
												$employee_addition_count_credit_mar += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_mar += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_mar += 0;
												$dependant_addition_count_credit_mar += 0;
											}
											
											
											if($date[1] == "03" && $get_endersoment_report_data->transaction_type == 'nil'){ //Mar
												
												$employee_addition_count_nil_mar += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_mar += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_mar += 0;
												$dependant_addition_count_nil_mar += 0;
											}
											


											/*Apr*/
											
											if($date[1] == "04" && $get_endersoment_report_data->transaction_type == 'debit'){ //Apr
												
												$employee_addition_count_debit_apr += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_apr += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_apr += 0;
												$dependant_addition_count_debit_apr += 0;
											}
											
											if($date[1] == "04" && $get_endersoment_report_data->transaction_type == 'credit'){ //Apr
												
												$employee_addition_count_credit_apr += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_apr += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_apr += 0;
												$dependant_addition_count_credit_apr += 0;
											}
											
											
											if($date[1] == "04" && $get_endersoment_report_data->transaction_type == 'nil'){ //Apr
												
												$employee_addition_count_nil_apr += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_apr += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_apr += 0;
												$dependant_addition_count_nil_apr += 0;
											}


											/*May*/
											
											if($date[1] == "05" && $get_endersoment_report_data->transaction_type == 'debit'){ //May
												
												$employee_addition_count_debit_may += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_may += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_may += 0;
												$dependant_addition_count_debit_may += 0;
											}
											
											if($date[1] == "05" && $get_endersoment_report_data->transaction_type == 'credit'){ //May
												
												$employee_addition_count_credit_may += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_may += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_may += 0;
												$dependant_addition_count_credit_may += 0;
											}
											
											
											if($date[1] == "05" && $get_endersoment_report_data->transaction_type == 'nil'){ //May
												
												$employee_addition_count_nil_may += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_may += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_may += 0;
												$dependant_addition_count_nil_may += 0;
											}
											
											
											/*Jun*/
											
											if($date[1] == "06" && $get_endersoment_report_data->transaction_type == 'debit'){ //Jun
												
												$employee_addition_count_debit_jun += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_jun += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_jun += 0;
												$dependant_addition_count_debit_jun += 0;
											}
											
											if($date[1] == "06" && $get_endersoment_report_data->transaction_type == 'credit'){ //Jun
												
												$employee_addition_count_credit_jun += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_jun += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_jun += 0;
												$dependant_addition_count_credit_jun += 0;
											}
											
											
											if($date[1] == "06" && $get_endersoment_report_data->transaction_type == 'nil'){ //Jun
												
												$employee_addition_count_nil_jun += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_jun += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_jun += 0;
												$dependant_addition_count_nil_jun += 0;
											}



											/*July*/
											
											if($date[1] == "07" && $get_endersoment_report_data->transaction_type == 'debit'){ //July
												
												$employee_addition_count_debit_july += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_july += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_july += 0;
												$dependant_addition_count_debit_july += 0;
											}
											
											if($date[1] == "07" && $get_endersoment_report_data->transaction_type == 'credit'){ //July
												
												$employee_addition_count_credit_july += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_july += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_july += 0;
												$dependant_addition_count_credit_july += 0;
											}
											
											
											if($date[1] == "07" && $get_endersoment_report_data->transaction_type == 'nil'){ //July
												
												$employee_addition_count_nil_july += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_july += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_july += 0;
												$dependant_addition_count_nil_july += 0;
											}



											/*Aug*/
											
											if($date[1] == "08" && $get_endersoment_report_data->transaction_type == 'debit'){ //Aug
												
												$employee_addition_count_debit_aug += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_aug += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_aug += 0;
												$dependant_addition_count_debit_aug += 0;
											}
											
											if($date[1] == "08" && $get_endersoment_report_data->transaction_type == 'credit'){ //Aug
												
												$employee_addition_count_credit_aug += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_aug += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_aug += 0;
												$dependant_addition_count_credit_aug += 0;
											}
											
											
											if($date[1] == "08" && $get_endersoment_report_data->transaction_type == 'nil'){ //Aug
												
												$employee_addition_count_nil_aug += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_aug += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_aug += 0;
												$dependant_addition_count_nil_aug += 0;
											}


												/*Sep*/
											
											if($date[1] == "09" && $get_endersoment_report_data->transaction_type == 'debit'){ //Sep
												
												$employee_addition_count_debit_sep += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_sep += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_sep += 0;
												$dependant_addition_count_debit_sep += 0;
											}
											
											if($date[1] == "09" && $get_endersoment_report_data->transaction_type == 'credit'){ //Sep
												
												$employee_addition_count_credit_sep += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_sep += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_sep += 0;
												$dependant_addition_count_credit_sep += 0;
											}
											
											
											if($date[1] == "09" && $get_endersoment_report_data->transaction_type == 'nil'){ //Sep
												
												$employee_addition_count_nil_sep += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_sep += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_sep += 0;
												$dependant_addition_count_nil_sep += 0;
											}



											/*Oct*/
											
											if($date[1] == "10" && $get_endersoment_report_data->transaction_type == 'debit'){ //Oct
												
												$employee_addition_count_debit_oct += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_oct += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_oct += 0;
												$dependant_addition_count_debit_oct += 0;
											}
											
											if($date[1] == "10" && $get_endersoment_report_data->transaction_type == 'credit'){ //Oct
												
												$employee_addition_count_credit_oct += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_oct += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_oct += 0;
												$dependant_addition_count_credit_oct += 0;
											}
											
											
											if($date[1] == "10" && $get_endersoment_report_data->transaction_type == 'nil'){ //Oct
												
												$employee_addition_count_nil_oct += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_oct += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_oct += 0;
												$dependant_addition_count_nil_oct += 0;
											}



												/*Nov*/
											
											if($date[1] == "11" && $get_endersoment_report_data->transaction_type == 'debit'){ //Nov
												
												$employee_addition_count_debit_nov += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_nov += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_nov += 0;
												$dependant_addition_count_debit_nov += 0;
											}
											
											if($date[1] == "11" && $get_endersoment_report_data->transaction_type == 'credit'){ //Nov
												
												$employee_addition_count_credit_nov += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_nov += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_nov += 0;
												$dependant_addition_count_credit_nov += 0;
											}
											
											
											if($date[1] == "11" && $get_endersoment_report_data->transaction_type == 'nil'){ //Nov
												
												$employee_addition_count_nil_nov += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_nov += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_nov += 0;
												$dependant_addition_count_nil_nov += 0;
											}


											/*Dec*/
											
											if($date[1] == "12" && $get_endersoment_report_data->transaction_type == 'debit'){ //Dec
												
												$employee_addition_count_debit_dec += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_debit_dec += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_debit_dec += 0;
												$dependant_addition_count_debit_dec += 0;
											}
											
											if($date[1] == "12" && $get_endersoment_report_data->transaction_type == 'credit'){ //Dec
												
												$employee_addition_count_credit_dec += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_credit_dec += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_credit_dec += 0;
												$dependant_addition_count_credit_dec += 0;
											}
											
											
											if($date[1] == "12" && $get_endersoment_report_data->transaction_type == 'nil'){ //Dec
												
												$employee_addition_count_nil_dec += $get_endersoment_report_data->employee_count_policy;
												$dependant_addition_count_nil_dec += $get_endersoment_report_data->dependent_count_policy;
												
											}else{
												$employee_addition_count_nil_dec += 0;
												$dependant_addition_count_nil_dec += 0;
											}



										}
										
									}else{
										
										$employee_addition_count_debit_jan = 0;
										$dependant_addition_count_debit_jan = 0;
										
										$employee_addition_count_credit_jan = 0;
										$dependant_addition_count_credit_jan = 0;
										
										$employee_addition_count_nil_jan = 0;
										$dependant_addition_count_nil_jan = 0;


										/*Feb */

										$employee_addition_count_debit_feb = 0;
										$dependant_addition_count_debit_feb = 0;
										
										$employee_addition_count_credit_feb = 0;
										$dependant_addition_count_credit_feb = 0;
										
										$employee_addition_count_nil_feb = 0;
										$dependant_addition_count_nil_feb = 0;



										/*Mar */

										$employee_addition_count_debit_mar = 0;
										$dependant_addition_count_debit_mar = 0;
										
										$employee_addition_count_credit_mar = 0;
										$dependant_addition_count_credit_mar = 0;
										
										$employee_addition_count_nil_mar = 0;
										$dependant_addition_count_nil_mar = 0;


										/*Apr */

										$employee_addition_count_debit_apr = 0;
										$dependant_addition_count_debit_apr = 0;
										
										$employee_addition_count_credit_apr = 0;
										$dependant_addition_count_credit_apr = 0;
										
										$employee_addition_count_nil_apr = 0;
										$dependant_addition_count_nil_apr = 0;


										/*May */

										$employee_addition_count_debit_may = 0;
										$dependant_addition_count_debit_may = 0;
										
										$employee_addition_count_credit_may = 0;
										$dependant_addition_count_credit_may = 0;
										
										$employee_addition_count_nil_may = 0;
										$dependant_addition_count_nil_may = 0;


										/*Jun */

										$employee_addition_count_debit_jun = 0;
										$dependant_addition_count_debit_jun = 0;
										
										$employee_addition_count_credit_jun = 0;
										$dependant_addition_count_credit_jun = 0;
										
										$employee_addition_count_nil_jun = 0;
										$dependant_addition_count_nil_jun = 0;


										/*July */

										$employee_addition_count_debit_july = 0;
										$dependant_addition_count_debit_july = 0;
										
										$employee_addition_count_credit_july = 0;
										$dependant_addition_count_credit_july = 0;
										
										$employee_addition_count_nil_july = 0;
										$dependant_addition_count_nil_july = 0;



										/*Aug */

										$employee_addition_count_debit_aug = 0;
										$dependant_addition_count_debit_aug = 0;
										
										$employee_addition_count_credit_aug = 0;
										$dependant_addition_count_credit_aug = 0;
										
										$employee_addition_count_nil_aug = 0;
										$dependant_addition_count_nil_aug = 0;


										/*Sep */

										$employee_addition_count_debit_sep = 0;
										$dependant_addition_count_debit_sep = 0;
										
										$employee_addition_count_credit_sep = 0;
										$dependant_addition_count_credit_sep = 0;
										
										$employee_addition_count_nil_sep = 0;
										$dependant_addition_count_nil_sep = 0;


										/*Oct */

										$employee_addition_count_debit_oct = 0;
										$dependant_addition_count_debit_oct = 0;
										
										$employee_addition_count_credit_oct = 0;
										$dependant_addition_count_credit_oct = 0;
										
										$employee_addition_count_nil_oct = 0;
										$dependant_addition_count_nil_oct = 0;


										/*Nov */

										$employee_addition_count_debit_nov = 0;
										$dependant_addition_count_debit_nov = 0;
										
										$employee_addition_count_credit_nov = 0;
										$dependant_addition_count_credit_nov = 0;
										
										$employee_addition_count_nil_nov = 0;
										$dependant_addition_count_nil_nov = 0;


										/*Dec */

										$employee_addition_count_debit_dec = 0;
										$dependant_addition_count_debit_dec = 0;
										
										$employee_addition_count_credit_dec = 0;
										$dependant_addition_count_credit_dec = 0;
										
										$employee_addition_count_nil_dec = 0;
										$dependant_addition_count_nil_dec = 0;
										


										
										
									}

									$grand_total_employee_addition = 
												$employee_addition_count_debit_jan + 
												$employee_addition_count_debit_feb +
												$employee_addition_count_debit_mar +
												$employee_addition_count_debit_apr +
												$employee_addition_count_debit_may +
												$employee_addition_count_debit_jun +
												$employee_addition_count_debit_july +
												$employee_addition_count_debit_aug +
												$employee_addition_count_debit_sep +
												$employee_addition_count_debit_oct +
												$employee_addition_count_debit_nov +
												$employee_addition_count_debit_dec 
												;


									$grand_total_dependent_addition = 
												$dependant_addition_count_debit_jan + 
												$dependant_addition_count_debit_feb +
												$dependant_addition_count_debit_mar +
												$dependant_addition_count_debit_apr +
												$dependant_addition_count_debit_may +
												$dependant_addition_count_debit_jun +
												$dependant_addition_count_debit_july +
												$dependant_addition_count_debit_aug +
												$dependant_addition_count_debit_sep +
												$dependant_addition_count_debit_oct +
												$dependant_addition_count_debit_nov +
												$dependant_addition_count_debit_dec 
												;

									$grand_total_employee_correction = 
												$employee_addition_count_credit_jan + 
												$employee_addition_count_credit_feb +
												$employee_addition_count_credit_mar +
												$employee_addition_count_credit_apr +
												$employee_addition_count_credit_may +
												$employee_addition_count_credit_jun +
												$employee_addition_count_credit_july +
												$employee_addition_count_credit_aug +
												$employee_addition_count_credit_sep +
												$employee_addition_count_credit_oct +
												$employee_addition_count_credit_nov +
												$employee_addition_count_credit_dec 
												;


									$grand_total_dependent_correction = 
												$dependant_addition_count_credit_jan + 
												$dependant_addition_count_credit_feb +
												$dependant_addition_count_credit_mar +
												$dependant_addition_count_credit_apr +
												$dependant_addition_count_credit_may +
												$dependant_addition_count_credit_jun +
												$dependant_addition_count_credit_july +
												$dependant_addition_count_credit_aug +
												$dependant_addition_count_credit_sep +
												$dependant_addition_count_credit_oct +
												$dependant_addition_count_credit_nov +
												$dependant_addition_count_credit_dec 
												;

									$grand_total_employee_deletion = 
												$employee_addition_count_nil_jan + 
												$employee_addition_count_nil_feb +
												$employee_addition_count_nil_mar +
												$employee_addition_count_nil_apr +
												$employee_addition_count_nil_may +
												$employee_addition_count_nil_jun +
												$employee_addition_count_nil_july +
												$employee_addition_count_nil_aug +
												$employee_addition_count_nil_sep +
												$employee_addition_count_nil_oct +
												$employee_addition_count_nil_nov +
												$employee_addition_count_nil_dec 
												;
									
									$grand_total_dependent_deletion = 
												$dependant_addition_count_nil_jan + 
												$dependant_addition_count_nil_feb +
												$dependant_addition_count_nil_mar +
												$dependant_addition_count_nil_apr +
												$dependant_addition_count_nil_may +
												$dependant_addition_count_nil_jun +
												$dependant_addition_count_nil_july +
												$dependant_addition_count_nil_aug +
												$dependant_addition_count_nil_sep +
												$dependant_addition_count_nil_oct +
												$dependant_addition_count_nil_nov +
												$dependant_addition_count_nil_dec 
												;

									// echo"<pre>";print_r($employee_addition_count_debit_jan);echo"</pre>";
									// echo"<pre>";print_r($employee_addition_count_credit_jan);echo"</pre>";
									
								 
								 ?>
								 
								 <div class="row">
									<div class="col-md-6">
										<table style="width:100%;margin-top: 14%;" class="table_report">
										  <tr>
											<th>Month</th>
											<th>Jan</th> 
											<th>Feb</th>
											<th>Mar</th>
											<th>Apr</th>
											<th>May</th>
											<th>Jun</th>
											<th>July</th>
											<th>Aug</th>
											<th>Sep</th>
											<th>Oct</th>
											<th>Nov</th>
											<th>Dec</th>
											<th>Grand Total</th>
										  </tr>
										  <tr>
											
											<td>Employee Addition</td>
											<td><?php echo $employee_addition_count_debit_jan;?></td>
											<td><?php echo $employee_addition_count_debit_feb;?></td>
											<td><?php echo $employee_addition_count_debit_mar;?></td>
											<td><?php echo $employee_addition_count_debit_apr;?></td>
											<td><?php echo $employee_addition_count_debit_may;?></td>
											<td><?php echo $employee_addition_count_debit_jun;?></td>
											<td><?php echo $employee_addition_count_debit_july;?></td>
											<td><?php echo $employee_addition_count_debit_aug;?></td>
											<td><?php echo $employee_addition_count_debit_sep;?></td>
											<td><?php echo $employee_addition_count_debit_oct;?></td>
											<td><?php echo $employee_addition_count_debit_nov;?></td>
											<td><?php echo $employee_addition_count_debit_dec;?></td>
											<td><?php echo $grand_total_employee_addition;?></td>
										  </tr>
										  
										  <tr>
											<td>Dependent Addition</td>
											<td><?php echo $dependant_addition_count_debit_jan;?></td>
											<td><?php echo $dependant_addition_count_debit_feb;?></td>
											<td><?php echo $dependant_addition_count_debit_mar;?></td>
											<td><?php echo $dependant_addition_count_debit_apr;?></td>
											<td><?php echo $dependant_addition_count_debit_may;?></td>
											<td><?php echo $dependant_addition_count_debit_jun;?></td>
											<td><?php echo $dependant_addition_count_debit_july;?></td>
											<td><?php echo $dependant_addition_count_debit_aug;?></td>
											<td><?php echo $dependant_addition_count_debit_sep;?></td>
											<td><?php echo $dependant_addition_count_debit_oct;?></td>
											<td><?php echo $dependant_addition_count_debit_nov;?></td>
											<td><?php echo $dependant_addition_count_debit_dec;?></td>
											<td><?php echo $grand_total_dependent_addition;?></td>
										  </tr>
										  
										  <tr>
											<td>Employee Correction</td>
											<td><?php echo $employee_addition_count_credit_jan;?></td>
											<td><?php echo $employee_addition_count_credit_feb;?></td>
											<td><?php echo $employee_addition_count_credit_mar;?></td>
											<td><?php echo $employee_addition_count_credit_apr;?></td>
											<td><?php echo $employee_addition_count_credit_may;?></td>
											<td><?php echo $employee_addition_count_credit_jun;?></td>
											<td><?php echo $employee_addition_count_credit_july;?></td>
											<td><?php echo $employee_addition_count_credit_aug;?></td>
											<td><?php echo $employee_addition_count_credit_sep;?></td>
											<td><?php echo $employee_addition_count_credit_oct;?></td>
											<td><?php echo $employee_addition_count_credit_nov;?></td>
											<td><?php echo $employee_addition_count_credit_dec;?></td>
											<td><?php echo $grand_total_employee_correction;?></td>
										  </tr>
										  
										  <tr>
											<td>Dependent Correction</td>
											<td><?php echo $dependant_addition_count_credit_jan;?></td>
											<td><?php echo $dependant_addition_count_credit_feb;?></td>
											<td><?php echo $dependant_addition_count_credit_mar;?></td>
											<td><?php echo $dependant_addition_count_credit_apr;?></td>
											<td><?php echo $dependant_addition_count_credit_may;?></td>
											<td><?php echo $dependant_addition_count_credit_jun;?></td>
											<td><?php echo $dependant_addition_count_credit_july;?></td>
											<td><?php echo $dependant_addition_count_credit_aug;?></td>
											<td><?php echo $dependant_addition_count_credit_sep;?></td>
											<td><?php echo $dependant_addition_count_credit_oct;?></td>
											<td><?php echo $dependant_addition_count_credit_nov;?></td>
											<td><?php echo $dependant_addition_count_credit_dec;?></td>
											<td><?php echo $grand_total_dependent_correction;?></td>
										  </tr>
										  
										  <tr>
											<td>Employee Deletion</td>
											<td><?php echo $employee_addition_count_nil_jan;?></td>
											<td><?php echo $employee_addition_count_nil_feb;?></td>
											<td><?php echo $employee_addition_count_nil_mar;?></td>
											<td><?php echo $employee_addition_count_nil_apr;?></td>
											<td><?php echo $employee_addition_count_nil_may;?></td>
											<td><?php echo $employee_addition_count_nil_jun;?></td>
											<td><?php echo $employee_addition_count_nil_july;?></td>
											<td><?php echo $employee_addition_count_nil_aug;?></td>
											<td><?php echo $employee_addition_count_nil_sep;?></td>
											<td><?php echo $employee_addition_count_nil_oct;?></td>
											<td><?php echo $employee_addition_count_nil_nov;?></td>
											<td><?php echo $employee_addition_count_nil_dec;?></td>
											<td><?php echo $grand_total_employee_deletion;?></td>
										  </tr>
										  
										  <tr>
											<td>Dependent Deletion</td>
											<td><?php echo $dependant_addition_count_nil_jan;?></td>
											<td><?php echo $dependant_addition_count_nil_feb;?></td>
											<td><?php echo $dependant_addition_count_nil_mar;?></td>
											<td><?php echo $dependant_addition_count_nil_apr;?></td>
											<td><?php echo $dependant_addition_count_nil_may;?></td>
											<td><?php echo $dependant_addition_count_nil_jun;?></td>
											<td><?php echo $dependant_addition_count_nil_july;?></td>
											<td><?php echo $dependant_addition_count_nil_aug;?></td>
											<td><?php echo $dependant_addition_count_nil_sep;?></td>
											<td><?php echo $dependant_addition_count_nil_oct;?></td>
											<td><?php echo $dependant_addition_count_nil_nov;?></td>
											<td><?php echo $dependant_addition_count_nil_dec;?></td>
											<td><?php echo $grand_total_dependent_deletion;?></td>
										  </tr>

										  <?php

										  $grand_total_jan = $employee_addition_count_debit_jan + 
																	$dependant_addition_count_debit_jan +
																	$employee_addition_count_credit_jan +
																	$dependant_addition_count_credit_jan +
																	$employee_addition_count_nil_jan +
																	$dependant_addition_count_nil_jan
																	;

											$grand_total_feb = $employee_addition_count_debit_feb + 
																	$dependant_addition_count_debit_feb +
																	$employee_addition_count_credit_feb +
																	$dependant_addition_count_credit_feb +
																	$employee_addition_count_nil_feb +
																	$dependant_addition_count_nil_feb
																	;

											$grand_total_mar = $employee_addition_count_debit_mar + 
																	$dependant_addition_count_debit_mar +
																	$employee_addition_count_credit_mar +
																	$dependant_addition_count_credit_mar +
																	$employee_addition_count_nil_mar +
																	$dependant_addition_count_nil_mar
																	;

											$grand_total_apr = $employee_addition_count_debit_apr + 
																	$dependant_addition_count_debit_apr +
																	$employee_addition_count_credit_apr +
																	$dependant_addition_count_credit_apr +
																	$employee_addition_count_nil_apr +
																	$dependant_addition_count_nil_apr
																	;

											$grand_total_may = $employee_addition_count_debit_may + 
																	$dependant_addition_count_debit_may +
																	$employee_addition_count_credit_may +
																	$dependant_addition_count_credit_may +
																	$employee_addition_count_nil_may +
																	$dependant_addition_count_nil_may
																	;

											$grand_total_jun = $employee_addition_count_debit_jun + 
																	$dependant_addition_count_debit_jun +
																	$employee_addition_count_credit_jun +
																	$dependant_addition_count_credit_jun +
																	$employee_addition_count_nil_jun +
																	$dependant_addition_count_nil_jun
																	;

											$grand_total_july = $employee_addition_count_debit_july + 
																	$dependant_addition_count_debit_july +
																	$employee_addition_count_credit_july +
																	$dependant_addition_count_credit_july +
																	$employee_addition_count_nil_july +
																	$dependant_addition_count_nil_july
																	;

											$grand_total_aug = $employee_addition_count_debit_aug + 
																	$dependant_addition_count_debit_aug +
																	$employee_addition_count_credit_aug +
																	$dependant_addition_count_credit_aug +
																	$employee_addition_count_nil_aug +
																	$dependant_addition_count_nil_aug
																	;

											$grand_total_sep = $employee_addition_count_debit_sep + 
																	$dependant_addition_count_debit_sep +
																	$employee_addition_count_credit_sep +
																	$dependant_addition_count_credit_sep +
																	$employee_addition_count_nil_sep +
																	$dependant_addition_count_nil_sep
																	;

											$grand_total_oct = $employee_addition_count_debit_oct + 
																	$dependant_addition_count_debit_oct +
																	$employee_addition_count_credit_oct +
																	$dependant_addition_count_credit_oct +
																	$employee_addition_count_nil_oct +
																	$dependant_addition_count_nil_oct
																	;

											$grand_total_nov = $employee_addition_count_debit_nov + 
																	$dependant_addition_count_debit_nov +
																	$employee_addition_count_credit_nov +
																	$dependant_addition_count_credit_nov +
																	$employee_addition_count_nil_nov +
																	$dependant_addition_count_nil_nov
																	;

											$grand_total_dec = $employee_addition_count_debit_dec + 
																	$dependant_addition_count_debit_dec +
																	$employee_addition_count_credit_dec +
																	$dependant_addition_count_credit_dec +
																	$employee_addition_count_nil_dec +
																	$dependant_addition_count_nil_dec
																	;
										  ?>

										  <tr>
											<td>Grand Total</td>
											<td><?php echo $grand_total_jan;?></td>
											<td><?php echo $grand_total_feb;?></td>
											<td><?php echo $grand_total_mar;?></td>
											<td><?php echo $grand_total_apr;?></td>
											<td><?php echo $grand_total_may;?></td>
											<td><?php echo $grand_total_jun;?></td>
											<td><?php echo $grand_total_july;?></td>
											<td><?php echo $grand_total_aug;?></td>
											<td><?php echo $grand_total_sep;?></td>
											<td><?php echo $grand_total_oct;?></td>
											<td><?php echo $grand_total_nov;?></td>
											<td><?php echo $grand_total_dec;?></td>
											<td><?php 

													echo $grand_total_jan + $grand_total_feb + $grand_total_mar + $grand_total_apr +
														  $grand_total_may + $grand_total_jun + $grand_total_july + $grand_total_aug +
														  $grand_total_sep + $grand_total_oct + $grand_total_nov + $grand_total_dec ;


											;?></td>
										  </tr>
										  
										  
										</table>
									</div>
								</div>
								 
							</div>
									
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
   </section>
   <?php include('include/sidebar_right.php');?>
</div>
<!-- End #Main -->
<?php include('include/footer.php')?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- DATA TABES SCRIPT -->
<link href="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"
   type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<link href="<?php echo $base_url_views; ?>plugins/iCheck/minimal/_all.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url_views; ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo $base_url_views; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $base_url_views; ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo $base_url_views; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url_views; ?>dist/js/demo.js"></script>
<!-- page script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   function updateorder_popular(id, value) {
       if (value.checked) {
           var num = 0;
           $('.popular').each(function() {
               if ($(this).is(":checked")) {
                   num++;
               }
           });
   
           var base_url = '<?php echo $base_url. 'blog/updateorder_popular';?>';
           window.location = base_url + "/" + id + "/1";
       } else {
   
           var base_url = '<?php echo $base_url. 'blog/updateorder_popular';?>';
           window.location = base_url + "/" + id + "/0";
       }
   
   }
</script>
<script>
   function updateorder_status(id, value) {
       if (value.checked) {
           var num = 0;
           $('.status').each(function() {
               if ($(this).is(":checked")) {
                   num++;
               }
           });
   
           var base_url = '<?php echo $base_url. 'blog/updateorder_status';?>';
           window.location = base_url + "/" + id + "/1";
       } else {
   
           var base_url = '<?php echo $base_url. 'blog/updateorder_status';?>';
           window.location = base_url + "/" + id + "/0";
       }
   
   }
</script>
<script>
   function approve(url, is_active) {
       if (is_active == '1') {
           var t = confirm('Are you sure you want to Active Coupan ?');
       } else {
           var t = confirm('Are you sure you want to Deactive Coupan  ?');
       }
       if (t) {
           window.location.href = url + "/" + is_active;
       } else {
           return false;
       }
   }
   
   function addition_deleteblog(id) {
   
       // alert(id);
   
       // var checked = $("#form input:checked").length > 0;
       // if (!checked) {
       //     alert("Please select at least one record to delete");
       //     return false;
       // } else {
   
           var conf = confirm("Do you want to delete?");
           if (conf == true) {
               var base_url = '<?php echo $base_url. 'endorsement_transaction/delete_rack_rate_attribute_addition';?>';
               window.location = base_url + "/" + id ;
           } else {
               return false;
           }
       }
   	
   	
   	function deletion_deleteblog(id) {
   
       // alert(id);
   
       // var checked = $("#form input:checked").length > 0;
       // if (!checked) {
       //     alert("Please select at least one record to delete");
       //     return false;
       // } else {
   
           var conf = confirm("Do you want to delete?");
           if (conf == true) {
               var base_url = '<?php echo $base_url. 'endorsement_transaction/delete_rack_rate_attribute_deletion';?>';
               window.location = base_url + "/" + id ;
           } else {
               return false;
           }
       }
   	
   	function download_user_report_button(){
   
       var conf = confirm("Do you want to Download ?");
   
           if (conf == true) {
   
               $('#download_user_report').submit();
               return true;
           } else {
               return false;
           }
   
   }
   
   function change_cd_number(corporate_id,cd_id){
   	
   	/* var url = '<?php echo $base_url; ?>endorsement_transaction/show_using_cd_number';
      
          $.ajax({
              url : url,
              type : 'post',
              data : 'corporate_id=' + corporate_id + '&cd_id=' + cd_id ,
              success: function(msg){
                  //document.getElementById('prod1').innerHTML = msg;
              }
          }); */
   	   
   	   var conf = confirm("Do you want to Change CD Number?");
           if (conf == true) {
               var base_url = '<?php echo $base_url. 'endorsement_transaction/view_detail';?>';
               window.location = base_url + "/" + corporate_id + "/"+cd_id ;
           } else {
               return false;
           }
   }
   
</script>
<script>
   function validate() {
   
      
       var endersoment_title = $("#endersoment_title").val();
       if (endersoment_title == '') {
           $("#endersoment_title_error").html("Please Enter Endersoment Title");
           jQuery('#endersoment_title_error').show().delay(0).fadeIn('show');
           jQuery('#endersoment_title_error').show().delay(2000).fadeOut('show');
           $('html, body').animate({
               scrollTop: $('#endersoment_title_error').offset().top - 150
           }, 1000);
           return false;
       }
   
       var endersoment_number = $("#endersoment_number").val();
       if (endersoment_number == '') {
           $("#endersoment_number_error").html("Please Enter Endersoment Number");
           jQuery('#endersoment_number_error').show().delay(0).fadeIn('show');
           jQuery('#endersoment_number_error').show().delay(2000).fadeOut('show');
           $('html, body').animate({
               scrollTop: $('#endersoment_number_error').offset().top - 150
           }, 1000);
           return false;
       }
   
       var transaction_statement = $("#transaction_statement").val();
       if (transaction_statement == '') {
           $("#transaction_statement_error").html("Please Enter Transaction Statement");
           jQuery('#transaction_statement_error').show().delay(0).fadeIn('show');
           jQuery('#transaction_statement_error').show().delay(2000).fadeOut('show');
           $('html, body').animate({
               scrollTop: $('#transaction_statement_error').offset().top - 150
           }, 1000);
           return false;
       }
   
       
   
       
       $('#form_rack_rate_calculation').submit();
   }
   
</script>
<script>
   const ctx = document.getElementById('pieChart');
   
   new Chart(ctx, {
     type: 'polarArea',
     data: {
       labels: ['Female', 'Male'],
       datasets: [{
     label: 'My First Dataset',
     data: [<?php echo $total_percentage_gender_wise_report_female;?>, <?php echo $total_percentage_gender_wise_report_male;?>],
     backgroundColor: [
       'rgb(255, 99, 132)',
       'rgb(75, 192, 192)'
     ]
   }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>
<script>
   const ctx1 = document.getElementById('barChartp');
     
   new Chart(ctx1, {
     type: 'bar',
     data: {
       labels: ['Daughter', 'Employee', 'Father', 'Mother', 'Son', 'Spouse'],
       datasets: [{
         label: 'Count',
         data: [<?php echo $total_count_relation_wise_report_daughter;?>, <?php echo $total_count_relation_wise_report_employee;?>, <?php echo $total_count_relation_wise_report_father;?>, <?php echo $total_count_relation_wise_report_mother;?>, <?php echo $total_count_relation_wise_report_son;?>, <?php echo $total_count_relation_wise_report_spouce;?>],
         borderWidth: 1
       }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>
<script>
   const ctx2 = document.getElementById('stackedChart');
   
   new Chart(ctx2, {
   type: 'bar',
   data: {
     labels: ['Jan', 'Feb', 'Mar' , 'Apr', 'May','Jun','July','Aug','Sep','Oct','Nov','Dec',],
     datasets: [
         {
       label: 'Cashless',
       data: [ <?php echo $jan_month_wise_count_cashless;?>, <?php echo $feb_month_wise_count_cashless;?>, <?php echo $mar_month_wise_count_cashless;?>, <?php echo $apr_month_wise_count_cashless;?>, <?php echo $may_month_wise_count_cashless;?>,<?php echo $jun_month_wise_count_cashless;?>,<?php echo $july_month_wise_count_cashless;?>,<?php echo $aug_month_wise_count_cashless;?>,<?php echo $sep_month_wise_count_cashless;?>,<?php echo $oct_month_wise_count_cashless;?>,<?php echo $nov_month_wise_count_cashless;?>,<?php echo $dec_month_wise_count_cashless;?>],
       backgroundColor: [
     
     'rgba(75, 190, 192)',
     'rgba(54, 161, 235)',
     'rgba(153, 101, 255)',
     'rgba(201, 200, 207)'
   ],
       borderWidth: 1
     },
     {
       label: 'Reimbursement',
       data: [ <?php echo $jan_month_wise_count_Reimbursement;?>, <?php echo $feb_month_wise_count_Reimbursement;?>, <?php echo $mar_month_wise_count_Reimbursement;?>, <?php echo $apr_month_wise_count_Reimbursement;?>, <?php echo $may_month_wise_count_Reimbursement;?>,<?php echo $jun_month_wise_count_Reimbursement;?>,<?php echo $july_month_wise_count_Reimbursement;?>,<?php echo $aug_month_wise_count_Reimbursement;?>,<?php echo $sep_month_wise_count_Reimbursement;?>,<?php echo $oct_month_wise_count_Reimbursement;?>,<?php echo $nov_month_wise_count_Reimbursement;?>,<?php echo $dec_month_wise_count_Reimbursement;?>],
       backgroundColor: [
     
     'rgba(75, 100, 192)',
     'rgba(54, 111, 235)',
     'rgba(153, 111, 255)',
     'rgba(201, 210, 207)'
   ],
       borderWidth: 1
     }
   
     ]
   },
   options: {
     scales: {
       y: {
         beginAtZero: true,
         stacked: true
       },
       x:{
           stacked: true
       }
     }
   }
   });
</script>


									
									
<script>
   const ctx3 = document.getElementById('barChartp_new');
     
   new Chart(ctx3, {
     type: 'bar',
     data: {
       labels: ['Amount Claimed', 'Claim Count'],
       datasets: [{
         label: 'Cashless',
         data: [<?php echo $total_cr_cashless_total;?>, <?php echo $count_cashless;?>],
         borderWidth: 1
       },
       {
         label: 'Reimbursement',
         data: [<?php echo $total_cr_Reimbursement_total;?>, <?php echo $count_Reimbursement;?>],
         borderWidth: 1
       }
       ]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>

<script>
   const ctx4 = document.getElementById('barChartp_claim_status');
     
   new Chart(ctx4, {
     type: 'bar',
     data: {
       labels: ['Outstanding', 'Paid', 'Rejected'],
       datasets: [{
         label: 'Cashless',
         data: [<?php echo $outstanding_cashless_count_claim_status_report;?>, <?php echo $paid_cashless_count_claim_status_report;?>, <?php echo $reject_cashless_count_claim_status_report;?>],
         borderWidth: 1
       },
       {
         label: 'Reimbursement',
         data: [<?php echo $outstanding_Reimbursement_count_claim_status_report;?>, <?php echo $paid_Reimbursement_count_claim_status_report;?>, <?php echo $reject_Reimbursement_count_claim_status_report;?>],
         borderWidth: 1
       }
       ]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>

<script>
   const ctx5 = document.getElementById('barChartp_age');
     
   new Chart(ctx5, {
     type: 'bar',
     data: {
       labels: ['0-25', '26-35' , '36-45' , '46-55','56-65','>65'],
       datasets: [{
         label: 'Closed',
         data: [<?php echo $total_amount_age_band_wise_report_closed_0_25;?>, <?php echo $total_amount_age_band_wise_report_closed_26_35;?>, <?php echo $total_amount_age_band_wise_report_closed_36_45;?>, <?php echo $total_amount_age_band_wise_report_closed_46_55;?> ,<?php echo $total_amount_age_band_wise_report_closed_56_65;?> , <?php echo $total_amount_age_band_wise_report_closed_66;?>],
         borderWidth: 1
       },
       {
         label: 'Outstanding',
         data: [<?php echo $total_amount_age_band_wise_report_outstanding_0_25;?>, <?php echo $total_amount_age_band_wise_report_outsatnding_26_35;?>, <?php echo $total_amount_age_band_wise_report_outsatnding_36_45;?>, <?php echo $total_amount_age_band_wise_report_outsatnding_46_55;?>,<?php echo $total_amount_age_band_wise_report_outsatnding_56_65;?>,<?php echo $total_amount_age_band_wise_report_outsatnding_66;?>],
         borderWidth: 1
       },
	   {
         label: 'Paid',
         data: [<?php echo $total_amount_age_band_wise_report_paid_0_25;?>, <?php echo $total_amount_age_band_wise_report_paid_26_35;?>, <?php echo $total_amount_age_band_wise_report_paid_36_45;?>, <?php echo $total_amount_age_band_wise_report_paid_46_55;?>,<?php echo $total_amount_age_band_wise_report_paid_56_65;?>,<?php echo $total_amount_age_band_wise_report_paid_66;?>],
         borderWidth: 1
       },
	   {
         label: 'Rejected',
         data: [<?php echo $total_amount_age_band_wise_report_rejected_0_25;?>, <?php echo $total_amount_age_band_wise_report_rejected_26_35;?>, <?php echo $total_amount_age_band_wise_report_rejected_36_45;?>, <?php echo $total_amount_age_band_wise_report_rejected_46_55;?>,<?php echo $total_amount_age_band_wise_report_rejected_56_65;?>,<?php echo $total_amount_age_band_wise_report_rejected_66;?>],
         borderWidth: 1
       }
       ]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>

<script>
   const ctx6 = document.getElementById('barChartp_top_ten');
     
   new Chart(ctx6, {
     type: 'bar',
     data: {
       labels: [<?php echo $report_hospital_name;?>],
       datasets: [{
         label: 'Claim Amount',
         data: [<?php echo $report_hospital_amount;?>],
         borderWidth: 1
       }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>

<script>
   const ctx7 = document.getElementById('barChartp_top_ten_paid');
     
   new Chart(ctx7, {
     type: 'bar',
     data: {
       labels: [<?php echo $report_hospital_name_paid;?>],
       datasets: [{
         label: 'Claim Paid Amount',
         data: [<?php echo $report_hospital_amount_paid;?>],
         borderWidth: 1
       }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>

<script>
   const ctx8 = document.getElementById('stackedChart_endersoment');
   
   new Chart(ctx8, {
   type: 'bar',
     data: {
        labels: ['Jan', 'Feb', 'Mar' , 'Apr', 'May','Jun','July','Aug','Sep','Oct','Nov','Dec',],
       datasets: [{
         label: 'Employee Addition',
         data: [
				<?php echo $employee_addition_count_debit_jan;?>, 
				<?php echo $employee_addition_count_debit_feb;?>, 
				<?php echo $employee_addition_count_debit_mar;?>, 
				<?php echo $employee_addition_count_debit_apr;?> ,
				<?php echo $employee_addition_count_debit_may;?> , 
				<?php echo $employee_addition_count_debit_jun;?>,
				<?php echo $employee_addition_count_debit_july;?>,
				<?php echo $employee_addition_count_debit_aug;?>,
				<?php echo $employee_addition_count_debit_sep;?>,
				<?php echo $employee_addition_count_debit_oct;?>,
				<?php echo $employee_addition_count_debit_nov;?>,
				<?php echo $employee_addition_count_debit_dec;?>
				],
         borderWidth: 1
       },
       {
         label: 'Dependent Addition',
         data: [
				<?php echo $dependant_addition_count_debit_jan;?>, 
				<?php echo $dependant_addition_count_debit_feb;?>, 
				<?php echo $dependant_addition_count_debit_mar;?>, 
				<?php echo $dependant_addition_count_debit_apr;?> ,
				<?php echo $dependant_addition_count_debit_may;?> , 
				<?php echo $dependant_addition_count_debit_jun;?>,
				<?php echo $dependant_addition_count_debit_july;?>,
				<?php echo $dependant_addition_count_debit_aug;?>,
				<?php echo $dependant_addition_count_debit_sep;?>,
				<?php echo $dependant_addition_count_debit_oct;?>,
				<?php echo $dependant_addition_count_debit_nov;?>,
				<?php echo $dependant_addition_count_debit_dec;?>
				
				],
         borderWidth: 1
       },
	   {
         label: 'Employee Correction',
         data: [
				<?php echo $employee_addition_count_credit_jan;?>, 
				<?php echo $employee_addition_count_credit_feb;?>, 
				<?php echo $employee_addition_count_credit_mar;?>, 
				<?php echo $employee_addition_count_credit_apr;?> ,
				<?php echo $employee_addition_count_credit_may;?> , 
				<?php echo $employee_addition_count_credit_jun;?>,
				<?php echo $employee_addition_count_credit_july;?>,
				<?php echo $employee_addition_count_credit_aug;?>,
				<?php echo $employee_addition_count_credit_sep;?>,
				<?php echo $employee_addition_count_credit_oct;?>,
				<?php echo $employee_addition_count_credit_nov;?>,
				<?php echo $employee_addition_count_credit_dec;?>
				
				],
         borderWidth: 1
       },
	   {
         label: 'Dependent Correction',
         data: [
				<?php echo $dependant_addition_count_credit_jan;?>, 
				<?php echo $dependant_addition_count_credit_feb;?>, 
				<?php echo $dependant_addition_count_credit_mar;?>, 
				<?php echo $dependant_addition_count_credit_apr;?> ,
				<?php echo $dependant_addition_count_credit_may;?> , 
				<?php echo $dependant_addition_count_credit_jun;?>,
				<?php echo $dependant_addition_count_credit_july;?>,
				<?php echo $dependant_addition_count_credit_aug;?>,
				<?php echo $dependant_addition_count_credit_sep;?>,
				<?php echo $dependant_addition_count_credit_oct;?>,
				<?php echo $dependant_addition_count_credit_nov;?>,
				<?php echo $dependant_addition_count_credit_dec;?>
				
				],
         borderWidth: 1
       },
	   {
         label: 'Employee Deletion',
         data: [
				<?php echo $employee_addition_count_nil_jan;?>, 
				<?php echo $employee_addition_count_nil_feb;?>, 
				<?php echo $employee_addition_count_nil_mar;?>, 
				<?php echo $employee_addition_count_nil_apr;?> ,
				<?php echo $employee_addition_count_nil_may;?> , 
				<?php echo $employee_addition_count_nil_jun;?>,
				<?php echo $employee_addition_count_nil_july;?>,
				<?php echo $employee_addition_count_nil_aug;?>,
				<?php echo $employee_addition_count_nil_sep;?>,
				<?php echo $employee_addition_count_nil_oct;?>,
				<?php echo $employee_addition_count_nil_nov;?>,
				<?php echo $employee_addition_count_nil_dec;?>
				
				],
         borderWidth: 1
       },
	   {
         label: 'Dependent Deletion',
         data: [
				<?php echo $dependant_addition_count_nil_jan;?>, 
				<?php echo $dependant_addition_count_nil_feb;?>, 
				<?php echo $dependant_addition_count_nil_mar;?>, 
				<?php echo $dependant_addition_count_nil_apr;?> ,
				<?php echo $dependant_addition_count_nil_may;?> , 
				<?php echo $dependant_addition_count_nil_jun;?>,
				<?php echo $dependant_addition_count_nil_july;?>,
				<?php echo $dependant_addition_count_nil_aug;?>,
				<?php echo $dependant_addition_count_nil_sep;?>,
				<?php echo $dependant_addition_count_nil_oct;?>,
				<?php echo $dependant_addition_count_nil_nov;?>,
				<?php echo $dependant_addition_count_nil_dec;?>
				
				],
         borderWidth: 1
       }
       ]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>


<?php 

	$i = 100;
	foreach($demography_report_sum_insured_new as $key => $val){
?>
<script>
   const ctx<?php echo $i;?> = document.getElementById('barChartp_demography_<?php echo $key; ?>');
     
   new Chart(ctx<?php echo $i;?>, {
     type: 'bar',
     data: {
       labels: ['Son', 'Daughter', 'Father', 'Mother', 'Spouse', 'Employee'],
       datasets: [{
         label: 'Count',
         data: [<?php echo $val['SON'];?>, <?php echo $val['DAUGHTER'];?>, <?php echo $val['Father'];?>, <?php echo $val['Mother'];?>, <?php echo $val['Spouse'];?>, <?php echo $val['Employee'];?>],
         borderWidth: 1
       }]
     },
     options: {
       scales: {
         y: {
           beginAtZero: true
         }
       }
     }
   });
</script>

	<?php $i++;} ?>

