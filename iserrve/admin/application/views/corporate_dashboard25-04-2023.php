<body class="dashboard-page"><script> var boxtest = localStorage.getItem('boxed'); if (boxtest === 'true') {document.body.className+=' boxed-layout';} </script>

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" > <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9" > <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" > <!--<![endif]-->

<?php include('include/header.php');?><!-- Start: Main -->

<style>
.valierror {
    background-color: #ee2e34;
    border-color: #ee2e34;
    color: #fff;
}

.alert-message {
    background-size: 40px 40px;
    background-image: linear-gradient(
135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent);
    /* box-shadow: inset 0 -1px 0 rgb(255 255 255 / 40%); */
    width: 100%;
    border: 0px solid;
    color: #fff;
    padding: 10px;
    /* position: fixed; */
    animation: animate-bg 5s linear infinite;
    display: block;
    margin-bottom: 5px;
}
.successmain {
    background-color: #09c6ab;
    border-color: #09c6ab;
}
.size_active {

    background: #ABABAB;
    color: #000;
    border: 1px solid #09c6ab !important;
}

.color_active {
    border: 1px solid #09c6ab !important;
}

.alert-message_cart {
    background-size: 40px 40px;
    background-image: linear-gradient(
135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent);
    width: 100%;
    border: 0px solid;
    color: #000;
    padding: 10px;
    animation: animate-bg 5s linear infinite;
}
.topalert_cart {
    z-index: 9999;
    text-align: center;
    padding: 10px;
    font-size: 18px;
    color: #fff !important;
    position: fixed;
    top: 0px;
}
.successcart {
    background-color: #09c6ab;
    border-color: #09c6ab;
}

.table .thead-dark th {
    color: #fff;
    background-color: #212529;
    border-color: #383f45;
}
</style>


<div id="main">

<style>



</style>

   <?php include('include/sidebar_left.php');?>  <!-- Start: Content -->  <section id="content_wrapper">

   <div id="topbar">

   <div class="topbar-left">

   <ol class="breadcrumb">

   <li class="crumb-active"><a href="javascript:void(0);">Corporate Dashboard</a></li>

   <li class="crumb-icon"><a href="javascript:void(0);"><span class="glyphicon glyphicon-home"></span></a></li>

   <li class="crumb-link"><a href="javascript:void(0);">Home</a></li>

   <li class="crumb-trail">Corporate Dashboard</li>

   </ol>

   </div>

   </div>


<?php
            if($this->session->userdata('adminId') !='')
            {
            $uid = $this->session->userdata('adminId');
            $getuser['data'] = $this->footer->getuser($uid);

	//echo "<pre>";print_r($getuser['data']);echo"</pre>";
            $category = $getuser['data']->role_id;
            //echo "<pre>";print_r($category);echo"</pre>";
            $usercategory = $this->footer->usercategory($category);
            $permission1=$usercategory->editperm;
            //echo "<pre>";print_r($permission1);echo"</pre>";
            $permission1 = explode(',',$permission1);
        ?>

<div class="container">
   <div class="row">

	<?php

		//echo "<pre>";print_r($policy_number);echo"</pre>";
	?>
      <div class="col-md-4">
               <select name="policy_id" id="policy_id" class="form-control" onchange="change_policy_number('<?php echo $corporate_id?>',this.value);" style="margin: 30px 0;">
                  <option value="0">Select Policy Number</option>
                  <?php if($policy_number != ''){

                     foreach($policy_number as $policy_number_data){

                  ?>
                  <option value="<?php echo $policy_number_data->id;?>" <?php if($policy_id == $policy_number_data->id){echo "selected";}?>><?php echo $policy_number_data->policy_no;?>  (<?php echo $policy_number_data->product_type;?>)</option>

                  <?php } }?>
               </select>

         </div>
   </div>
   <div class="row">
   <?php if($this->session->flashdata('L_strErrorMessage'))  { ?>

                <div class="alert alert-success alert-dismissable">

                    <i class="fa fa-check"></i>

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <b> </b> <?php echo $this->session->flashdata('L_strErrorMessage',5); ?>

                </div>

                <?php } ?>

				</div>

   <div class="row">
            <?php

               $policy_data = $this->corporate_dashboard_model->get_policy_using_id($policy_id);

               //echo "<pre>";print_r($policy_data);echo"</pre>";
            ?>


            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Insurance Name</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php echo $policy_data->insurer;?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Policy Number</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php echo $policy_data->policy_no;?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Policy Expire Date</h6>
                     </div>
                     <div class="box-content">
                     <?php
                        $policy_start_date = date("d-M-Y", strtotime($policy_data->policy_start_date));
                        $policy_end_date = date("d-M-Y", strtotime($policy_data->policy_end_date));
                     ?>
                        <h6><?php
                              if($policy_data != ''){
                                  echo $policy_start_date ."  ".$policy_end_date;
                              }

                           ?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Tpa Name</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php echo $policy_data->tpa;?></h6>
                     </div>
                  </div>
               </div>
            </div>

            <?php
                  $update_premium_data = $this->corporate_dashboard_model->get_update_premium_data($corporate_id,$policy_id);

                  //echo "<pre>";print_r($update_premium_data);echo"</pre>";
            ?>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Inception Premium</h6>
                     </div>
                     <div class="box-content">
                        <h6>
							<?php

							if($update_premium_data != ''){
								echo number_format($update_premium_data->inception_premium_amount);

							}

							?>
						</h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Addition Premium</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php if($update_premium_data != ''){ echo number_format($update_premium_data->addition_premium_amount);}?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Deletion Premium</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php if($update_premium_data != ''){ echo number_format($update_premium_data->deletion_premium_amount);}?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Total Premium</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php if($update_premium_data != ''){ echo number_format($update_premium_data->total_premium_amount); }?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <?php

             $reported_claim_amount_data = $this->corporate_dashboard_model->get_reported_claim_amount($corporate_id,$policy_id);
            ?>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Reportated Claims Amount</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php if($reported_claim_amount_data != ''){  echo number_format($reported_claim_amount_data); }?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <?php

             $total_claim_paid = $this->corporate_dashboard_model->get_total_claim_paid($corporate_id,$policy_id);
            ?>

            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Total Claims paid</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php if($total_claim_paid != ''){  echo number_format($total_claim_paid); }?></h6>
                     </div>
                  </div>
               </div>
            </div>

            <?php

             $claim_under_process_amount = $this->corporate_dashboard_model->get_claim_under_process($corporate_id,$policy_id);
            ?>

            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Claims Under Process</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php
                              if($corporate_id != 0 && $policy_id != 0){
                                 echo  number_format($claim_under_process_amount);
                              }

                           ?></h6>
                     </div>
                  </div>
               </div>
            </div>

            <?php

             $claim_close_reject_amount = $this->corporate_dashboard_model->get_claim_close_reject_amount($corporate_id,$policy_id);
            ?>

            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Claims closed / Rejected</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php
                           if($corporate_id != 0 && $policy_id != 0){
                           echo number_format($claim_close_reject_amount);

                           }
                           ?></h6>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Edosment / CD Statement</h6>
                     </div>
                     <div class="box-content">
                        <!-- <h6>The New India Assurance </h6> -->
                        <a href="<?php echo $base_url?>endorsement_transaction/view_detail/<?php echo $corporate_id;?>/0">View Details</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Employee Activation / Verification</h6>
                     </div>
                     <div class="box-content">
                     <a href="<?php echo $base_url?>home/view_user_status/<?php echo $corporate_id;?>/<?php echo $policy_id;?>">View Details</a>
                     </div>
                  </div>
               </div>
            </div>

			<?php if(in_array('24',$permission1)){ ?>
            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Policy Update / Corporate Enrollment</h6>
                     </div>
                     <div class="box-content">
                        <h6 class="v-btn">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#policyUpdateModal_1">Policy Detals Update</button>
                           <!--<button class="btn btn-sm btn-primary">Enrollment List</button> -->
                        </h6>
                     </div>
                  </div>
               </div>
            </div>
			<?php } ?>


            <div class="col-lg-3">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Employee Activity</h6>
                     </div>
                     <div class="box-content">
                     <h6 class="v-btn">
                           <!--<button class="btn btn-sm btn-primary">Employee File Upload Details</button>-->
                           <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#employee_activity_model">Users Activity</button>
                        </h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
         <div class="col-lg-6">


         <?php

         if($update_premium_data->total_premium_amount != ''){
            $total_premium = $update_premium_data->total_premium_amount;

            $claim_ratio_total = $total_claim_paid +  $claim_under_process_amount;

            $claim_ratio_percentage = ($claim_ratio_total/ $total_premium) * 100;
         }else{
            $claim_ratio_percentage = 0;
         }

         //$claim_ratio_percentage = 46;

         ?>
         <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6 class="text-uppercase">Claims Ratio (<?php echo round($claim_ratio_percentage);?>%)</h6>
                     </div>
                     <div class="box-content">
                     <span>
                     <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?php echo round($claim_ratio_percentage);?>" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: <?php echo round($claim_ratio_percentage);?>%"></div>
                  </div>
                     </span>
                     </div>
                  </div>
               </div>
         </div>

         <?php

         if($update_premium_data->total_premium_amount != ''){

            $total_premium = $update_premium_data->total_premium_amount;

            $policy_start_date = date("d-m-Y", strtotime($policy_start_date));
            $today_date = date('d-m-Y');

            //$later = date("d-m-Y", strtotime($policy_start_date));

			$later = new DateTime($today_date);
			$earlier = new DateTime($policy_start_date);
			$day_diff = $later->diff($earlier)->format("%a");
			$day_diff = $day_diff +1 ;


         $policy_end_date = date("d-m-Y", strtotime($policy_end_date));

         $later_policy = new DateTime($policy_end_date);
			$earlier_policy = new DateTime($policy_start_date);
			$day_diff_policy = $later_policy->diff($earlier_policy)->format("%a");
			$day_diff_policy = $day_diff_policy +1 ;




         $total_earned_premium = $total_premium * $day_diff / $day_diff_policy;




            //$total_premium = $update_premium_data->total_premium_amount;

            $incurred_claim_ratio_total = $total_claim_paid +  $claim_under_process_amount;

            $incurred_claim_ratio_percentage = ($incurred_claim_ratio_total/ $total_earned_premium) * 100;
         }else{
            $incurred_claim_ratio_percentage = 0;
         }

         //$incurred_claim_ratio_percentage = 46;
         //echo $incurred_claim_ratio_percentage;

?>
         <div class="col-lg-6">
         <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6 class="text-uppercase">Incurred Ratio (<?php echo round($incurred_claim_ratio_percentage);?>%)</h6>
                     </div>
                     <div class="box-content">
                     <span>
                     <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?php echo round($incurred_claim_ratio_percentage);?>" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: <?php echo round($incurred_claim_ratio_percentage);?>%"></div>
                  </div>
                     </span>
                     </div>
                  </div>
               </div>
         </div>


         </div>


         <div class="row tab-sec">
            <div class="col-lg-12">
            <ul class="admin-tab nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Policy Feature</a></li>
  <li><a data-toggle="tab" href="#menu1">Corporate Buffer</a></li>
  <li><a data-toggle="tab" href="#menu2">Enrollment Details</a></li>
  <li><a data-toggle="tab" href="#menu3">Cashless Hospital</a></li>
  <li><a data-toggle="tab" href="#menu4">Live Claim</a></li>
  <li><a data-toggle="tab" href="#menu5">Escalation Matrix</a></li>
  <li><a data-toggle="tab" href="#menu6">Utilities</a></li>
  <li><a data-toggle="tab" href="#menu7">Wellness Deshboard</a></li>
			<li><a href="<?php echo $base_url;?>home/view_report/<?php echo $corporate_id;?>/<?php echo $policy_id; ?>" target="_blank">Reports</a></li>
  <li><a data-toggle="tab" href="#menu9">Summary</a></li>
</ul>
<div class="tab-content admin-tab-cont">
<div id="home" class="tab-pane v-tabular fade in active">
      <div class="row">
      <div class="col-lg-12">
            <h5>Group Topup Policy Feature</h5>
      </div>

      </div>
      <div class="row">

		<?php

			//$policy_fea_att = $this->corporate_dashboard_model->get_policy_feature_attribute($policy_feature->id);

			$get_form_field = $this->corporate_dashboard_model->get_form_field($policy_feature->product_type);


			if($get_form_field != ''){
			foreach($get_form_field as $get_form_field_data){


				$answer_data = $this->corporate_dashboard_model->get_answer_data($policy_feature->id,$get_form_field_data->id);

				//echo "<pre>";print_r($answer_data);echo"</pre>";



				if($answer_data->status == 1){

		?>
         <div class="col-lg-4">
            <div class="v-card">
               <div class="v-card-head">
                  <h5><?php echo $get_form_field_data->label_name; ?></h5>
                  <!-- <i class="fa fa-info-circle"></i> -->
               </div>
               <div class="v-card-cont">

					<?php if($get_form_field_data->type == 4){ // Radio

							if($answer_data->field_type == 'Yes' || $answer_data->field_type == 'yes'){

								$radio_attribute = $this->corporate_dashboard_model->radio_attribute($get_form_field_data->id);

								$answer_data_radio_att = $this->corporate_dashboard_model->get_answer_data_radio_att($policy_feature->id,$get_form_field_data->id);

								//echo "<pre>";print_r($answer_data);echo"</pre>";

								if($radio_attribute != ''){

									$sd = 0;
									foreach($radio_attribute as $radio_attribute_data){

										if($answer_data_radio_att[$sd]->status == 1){


					?>
								<p>
									<?php echo $radio_attribute_data->label_name ?> : 
									
										<?php 
												if(is_numeric($answer_data_radio_att[$sd]->field_type)){
													echo number_format($answer_data_radio_att[$sd]->field_type);
												}else{
													
													echo $answer_data_radio_att[$sd]->field_type;
												}
												
												
										?>
									
								</p>
								
								
							<?php } $sd++;} } } ?>
					<?php }elseif($get_form_field_data->type == 3){

							$form_field_attribute_option_name = $this->corporate_dashboard_model->get_form_field_attribute_option_name($answer_data->field_type);
					?>

							<p>
								<?php //echo $form_field_attribute_option_name->option_name ?>
								
								<?php 
												if(is_numeric($form_field_attribute_option_name->option_name)){
													echo number_format($form_field_attribute_option_name->option_name);
												}else{
													
													echo $form_field_attribute_option_name->option_name;
												}
												
												
										?>
							
							</p>

					<?php }else{ ?>
							<p>
									<?php //echo $answer_data->field_type;?>
									
									<?php 
												if(is_numeric($answer_data->field_type)){
													echo number_format($answer_data->field_type);
												}else{
													
													echo $answer_data->field_type;
												}
												
												
										?>
									
							</p>
					<?php } ?>
               </div>
            </div>
         </div>

			<?php } } }else{echo "No Policy Feature Available";}?>
		 <!--
         <div class="col-lg-4">
            <div class="v-card">
               <div class="v-card-head">
                  <h5>Room Rent Limit </h5>

               </div>
               <div class="v-card-cont">
                  <p>2% of Sum Insured</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="v-card">
               <div class="v-card-head">
                  <h5>Room Rent Limit </h5>

               </div>
               <div class="v-card-cont">
                  <p>2% of Sum Insured</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="v-card">
               <div class="v-card-head">
                  <h5>Room Rent Limit </h5>

               </div>
               <div class="v-card-cont">
                  <p>2% of Sum Insured</p>
               </div>
            </div>
         </div> -->
      </div>
  </div>
  <div id="menu1" class="tab-pane v-tabular fade">
		<div class="row">
		  <div class="col-lg-12">
				<h5>Corporate Buffer</h5>
		  </div>

      </div>

	  <?php if(in_array('44',$permission1)){ ?>
	  <div class="row">
		  <div class="col-lg-12">
				<button class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#update_corp_buffer_model">Update Corporate Buffer Sum-Insured</button>
		  </div>

      </div>
	  <?php } ?>
	  <?php

		$total_corporate_sum_insured_count = $this->corporate_dashboard_model->get_total_count_corporate_buffer_sum_insured($corporate_id,$policy_id);

		if($total_corporate_sum_insured_count != ''){
			$total_corporate_sum_insured_count = $total_corporate_sum_insured_count;
		}else{
			$total_corporate_sum_insured_count = 0;
		}


		$utilized_corporate_sum_insured_count = $this->corporate_dashboard_model->get_utilized_corporate_sum_insured_count($corporate_id,$policy_id);

		if($utilized_corporate_sum_insured_count != ''){
			$utilized_corporate_sum_insured_count = $utilized_corporate_sum_insured_count;
		}else{
			$utilized_corporate_sum_insured_count = 0;
		}




		$remaining_corporate_sum_insured_count = $total_corporate_sum_insured_count - $utilized_corporate_sum_insured_count;
		
		
		//$total_corporate_sum_insured_count = number_format($total_corporate_sum_insured_count);

	  ?>

	  <div class="row">
		<div class="col-lg-4">
		  <div class="form-group">
			   <label style="width:100%; margin:15px 0 5px;" for="total_corporate_sum_insured">Total Corporate Buffer Sum-Insured</label>
			   
			   <span class="form-control"><?php echo number_format($total_corporate_sum_insured_count);?></span>
				<!--<input type="number" name="total_corporate_sum_insured_count" id="total_corporate_sum_insured_count" class="form-control" value="<?php //echo $total_corporate_sum_insured_count;?>" readonly> -->
		  </div>
		</div>

		<div class="col-lg-4">
		  <div class="form-group">
			   <label style="width:100%; margin:15px 0 5px;" for="total_corporate_sum_insured">Utilized Corporate Buffer Sum-Insured</label>
			   <span class="form-control"><?php echo number_format($utilized_corporate_sum_insured_count);?></span>
				<!--<input type="number" name="utilized_corporate_sum_insured_count" id="utilized_corporate_sum_insured_count" class="form-control" value="<?php //echo $utilized_corporate_sum_insured_count;?>" readonly>-->
		  </div>
		</div>

		<div class="col-lg-4">
		  <div class="form-group">
			   <label style="width:100%; margin:15px 0 5px;" for="total_corporate_sum_insured">Remaining Corporate Buffer Sum-Insured</label>
			   
			   <span class="form-control"><?php echo number_format($remaining_corporate_sum_insured_count);?></span>
				<!--<input type="number" name="remaining_corporate_sum_insured_count" id="remaining_corporate_sum_insured_count" class="form-control" value="<?php //echo $remaining_corporate_sum_insured_count;?>" readonly>-->
			
		  </div>
		</div>

      </div>


	  <?php if(in_array('44',$permission1)){ ?>
	  <div class="row">
		  <div class="col-lg-12">

				<a href="javascript:void(0)" class="btn btn-sm btn-primary " onclick="add_corporate_buffer_utilization_form()">Add Corporate Buffer Utilization</a>
		  </div>

      </div>
	  <?php } ?>

		<div class="row" id="add_corporate_buffer_utilization_form_div" style="display:none;padding: 50px 0 35px 0px;">
			<div class="col-lg-12">
				<form role="form" id="corporate_buffer_utilization_form" method="post" action="<?php echo $base_url;?>home/add_corporate_buffer_utilization" enctype="multipart/form-data">

					<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
					<INPUT TYPE="hidden" NAME="action" VALUE="update_corporate_buffer">
					<INPUT TYPE="hidden" NAME="corporate_id" VALUE="<?php echo $corporate_id; ?>">
					<INPUT TYPE="hidden" NAME="policy_id" VALUE="<?php echo $policy_id; ?>">

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Employee Id</label>
							<input id="corporate_buffer_utilization_employe_id" name="corporate_buffer_utilization_employe_id" type="text" class="form-control" placeholder="Enter Employee Id" onkeyup="get_member('<?php echo $corporate_id; ?>','<?php echo $policy_id; ?>',this.value);"/>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Member Name</label>
							<span id="member_replace">
								<select class="form-control" id="corporate_buffer_utilization_member_id" name="corporate_buffer_utilization_member_id">
									<option value="">Select Member</option>
								</select>
							</span>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Contact Number</label>
							<input id="corporate_buffer_utilization_contact_number" name="corporate_buffer_utilization_contact_number" type="number" class="form-control" placeholder="Enter Contact Number" readonly/>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Email Address</label>
							<input id="corporate_buffer_utilization_email_address" name="corporate_buffer_utilization_email_address" type="text" class="form-control" placeholder="Enter Email Address" readonly/>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Claim Amount</label>
							<input id="corporate_buffer_utilization_claim_amount" name="corporate_buffer_utilization_claim_amount" type="number" class="form-control" placeholder="Enter Claim Amount" />
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Settled Amount</label>
							<input id="corporate_buffer_utilization_settled_amount" name="corporate_buffer_utilization_settled_amount" type="number" class="form-control" placeholder="Enter Settled Amount" />
						</div>
					</div>


					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Employee Si Utilised</label>
							<input id="corporate_buffer_utilization_employee_si_utilised" name="corporate_buffer_utilization_employee_si_utilised" type="number" class="form-control" placeholder="Enter Employee Si Utilised" />
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Corporate Buffer Used</label>
							<input id="corporate_buffer_utilization_corporate_buffer_used" name="corporate_buffer_utilization_corporate_buffer_used" type="number" class="form-control" placeholder="Enter Corporate Buffer Used" />
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Ailment</label>
							<input id="corporate_buffer_utilization_ailment" name="corporate_buffer_utilization_ailment" type="text" class="form-control" placeholder="Enter Ailment" />
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="title">Attach Document</label>
							<input id="corporate_buffer_utilization_document" name="corporate_buffer_utilization_document" type="file" class="form-control" placeholder="Enter Ailment" />
						</div>
					</div>

					<div class="col-lg-12">
						<div class="form-group">

							<span id="corporate_buffer_utilization_error" class="error alert-message valierror" style="display:none;"></span>
							<span id="success_corporate_buffer_utilization" class="successmain alert-message" style="display:none;"></span>

						</div>
					</div>

					<button type="button" class="btn btn-sm btn-primary  pull-right" onclick="javascript:validate_corporate_buffer_utilization();return false;">Submit</button>

				</form>
			</div>
		</div>

		<div class="row">

		</div>
		<div class="row" style="padding: 50px 0 35px 0px;">
			<a href="<?php echo $base_url;?>home/corporate_buffer_utilization_excel_download/<?php echo $corporate_id;?>/<?php echo $policy_id; ?>" class="btn btn-alert pull-left" style="margin-bottom:10px"> Download Excel</a>
			<?php

				$get_corporate_buffer_utilization = $this->corporate_dashboard_model->get_corporate_buffer_utilization($corporate_id,$policy_id);

				//echo "<pre>";print_r($get_corporate_buffer_utilization);echo "</pre>";

			?>
			<div class="col-lg-12">
					<table id="example4" class="table table-bordered table-striped">

						<thead>

							<tr>
								<th>SI No</th>
								<th>Employee Id</th>
								<th>Member Name</th>
								<th>Member Relation</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Claim Amount</th>
								<th>Approved Amount</th>
								<th>Employee Sum-Insured Utilization</th>
								<th>Corporate Buffer Used</th>
								<th>Ailment</th>
								<th>File</th>
							</tr>
						</thead>
						<tbody>
						<?php
							if($get_corporate_buffer_utilization != ''){
								$bi = 1 ;
								foreach($get_corporate_buffer_utilization as $get_corporate_buffer_utilization_data){

								$member_data = $this->corporate_dashboard_model->get_member_data($get_corporate_buffer_utilization_data->member_id);

								//echo "<pre>";print_r($member_data);echo "</pre>";
						?>
							<tr>
								<td><?php echo $bi;?></td>
								<td><?php echo $get_corporate_buffer_utilization_data->employe_id;?></td>
								<td><?php echo $member_data->name_of_the_employee;?></td>
								<td><?php echo $member_data->relationship;?></td>
								<td><?php echo $get_corporate_buffer_utilization_data->email_address;?></td>
								<td><?php echo $get_corporate_buffer_utilization_data->contact_number;?></td>
								<td><?php echo number_format($get_corporate_buffer_utilization_data->claim_amount);?></td>
								<td><?php echo number_format($get_corporate_buffer_utilization_data->settled_amount);?></td>
								<td><?php echo number_format($get_corporate_buffer_utilization_data->employee_si_utilised);?></td>
								<td><?php echo number_format($get_corporate_buffer_utilization_data->corporate_buffer_used);?></td>
								<td><?php echo $get_corporate_buffer_utilization_data->ailment;?></td>
								<td>
									<?php if($get_corporate_buffer_utilization_data->document != '') { ?>
								<a class="btn bg-purple2" href="<?php echo $this->config->item('front_base_url').'upload/corporate_buffer_utilization/'.$get_corporate_buffer_utilization_data->document?>" target="_blank">Download</a>

									<?php } ?>

								</td>
							</tr>

							<?php $bi++;} }?>
						</tbody>

					</table>
			</div>
		</div>

  </div>
  <div id="menu2" class="tab-pane v-tabular fade">
  <div class="row">
      <div class="col-lg-12">
            <h5>Enrollment Details</h5>
      </div>
		
		 <a href="<?php echo $base_url;?>home/download_endersoment_detail/<?php echo $corporate_id;?>/<?php echo $policy_id; ?>" class="btn btn-alert pull-left" style="margin-bottom:10px"> Download Excel</a>
		 
      </div>
      <div class="row">
	   <div class="col-lg-12">
			 <table id="example1" class="table table-bordered table-striped">

				<thead>

					<tr>
						<th>SI No</th>
						<th>Employee Name</th>
						<th>Employee Id</th>
						<th>Gender</th>
						<th>Sum Insured</th>


						<!-- <th>Set as Home</th> -->
						<th>Dependent</th>
						<th>Cards</th>
						
						<th>Cards Upload Date</th>
						<th>Employee Mobile</th>
						<th>Employee Email</th>
						<!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
					</tr>
				</thead>

				<tbody>
					<?php

						if($enrolement_details != ''){




							foreach($enrolement_details as $enrolement_details_data){


								$enrolement_att = $this->corporate_dashboard_model->get_enrolement_att($enrolement_details_data->id);



								//echo "<pre>";print_r($enrolement_att);echo"</pre>";
								$i = 1 ;
								foreach($enrolement_att as $enrolement_att_data){

									$ecard_data = $this->corporate_dashboard_model->get_e_card($enrolement_att_data->employee_id);
										
										//echo "<pre>";print_r($ecard_data);echo"</pre>";


					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $enrolement_att_data->name_of_the_employee; ?></td>
						<td><?php echo $enrolement_att_data->employee_id; ?></td>
						<td><?php echo $enrolement_att_data->gender; ?></td>
						<td><?php echo number_format($enrolement_att_data->sum_insured); ?></td>


						<td> <button type="button" class="btn bg-purple2" data-toggle="modal" data-target="#myModal_<?php echo $enrolement_att_data->id;?>">Dependent</button></td>
						<td>
							<?php
                        if($ecard_data != ''){

                           if($ecard_data->pdf_file != ''){ ?>

                              <!--<a class="btn bg-purple2" download href="<?php echo $this->config->item('front_base_url').'upload/pdf_file/'.$ecard_data->pdf_file?>" target="_blank">Download</a>-->
							  
							  <a href="<?php echo base_url().'home/download_card/'.$ecard_data->pdf_file; ?>" class="btn bg-purple2">Download</a>
                         <?php   }
                        }

                     ?>
						</td>
						
						<td>
							<?php
                        if($ecard_data != ''){

                           if($ecard_data->created_at != ''){ 
									
							echo date("d-m-Y", strtotime($ecard_data->created_at));
						   }
                        }

                     ?>
						</td>
						
						<td><?php echo $enrolement_att_data->mobile_no; ?></td>
						<td><?php echo $enrolement_att_data->email; ?></td>
					</tr>
						<?php $i++; } } }?>
				</tbody>
            </table>
      </div>
	  </div>
  </div>

  <!-- cashless hospital start -->
  <div id="menu3" class="tab-pane v-tabular fade in">
      <div class="row">
      <div class="col-lg-12">
            <h5>Cashless Hospital</h5>
      </div>

      </div>
      <div class="row">

        <div class="panel-body">

        <div class="table-responsive">
        <?php if(!empty($cashless_hospital)) { ?>
        <table id="example6" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>Insurer</th>
              <th>TPA</th>
              <th>Hospital Name</th>
              <th>Address</th>
              <th>Insurence Company</th>
              <th>Location</th>
              <th>Landmark</th>
              <th>Email</th>
              <th>Contact No.</th>
              <th>City</th>
              <th>Pincode</th>
              <th>State</th>
              <th>Date</th>
            </tr>
        </thead>
        <tbody>
           <?php  foreach ($cashless_hospital as $value) {  ?>
             <tr>
                 <td><?=$value['insurer']?></td>
                 <td><?=$value['tpa']?></td>
                 <td><?=$value['hospital_name']?></td>
                 <td><?=$value['hospital_address']?></td>
                 <td><?=$value['insurence_company']?></td>
                 <td><?=$value['location']?></td>
                 <td><?=$value['landmark']?></td>
                 <td><?=$value['email']?></td>
                 <td><?=$value['contact_no']?></td>
                 <td><?=$value['city']?></td>
                 <td><?=$value['pincode']?></td>
                 <td><?=$value['state']?></td>
                 <td><?=date('d-m-Y', strtotime($value['created_at']))?></td>
             </tr>
           <?php  } ?>
          </tbody>

        </table>
        <?php  } ?>

        <?php if(!empty($network_hospital)) { ?>
        <table id="example7" class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>Hospital Name</th>
                  <th>Address</th>
                  <th>Contact No.</th>
                  <th>Landmark</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Pincode</th>
              </tr>
          </thead>
          <tbody>
           <?php  foreach ($network_hospital as $value) {  ?>
             <tr>
                 <td><?=ucwords(strtolower($value['HospitalName']))?></td>
                 <td><?=ucfirst(strtolower($value['AddressLine1']))?></td>
                 <td><?=$value['PhoneNumber']?></td>
                 <td><?=ucfirst(strtolower($value['Landmark1']))?></td>
                 <td><?=ucfirst(strtolower($value['CityName']))?></td>
                 <td><?=ucfirst(strtolower($value['StateName']))?></td>
                 <td><?=$value['Pincode']?></td>
            </tr>
           <?php  } ?>
          </tbody>

        </table>
        <?php  } ?>
        </div>


        </div>
      </div>
  </div>

  <!-- cashless hospital end -->
  <div id="menu4" class="tab-pane v-tabular fade in">
      <div class="row">
      <div class="col-lg-12">
            <h5>Live Claim</h5>

      </div>

	  <a href="<?php echo $base_url;?>home/download_live_claim/<?php echo $corporate_id;?>/<?php echo $policy_id; ?>" class="btn btn-alert pull-left" style="margin-bottom:10px"> Download Excel</a>

      </div>
      <div class="row">
	   <div class="col-lg-12">
			 <table id="example2" class="table table-bordered table-striped">

				<thead>

					<tr>
						<th>SI No</th>
						<th>Employee Id</th>
						<th>Employee Name</th>

						<th>Beneficiary Name</th>
						<th>Relation</th>


						<th>Claim Type</th>
						<th>Claim Status</th>
						<th>TPA Claim Number</th>
						<th>Hospitalization Date</th>
						<th>Hospital Name</th>
						<th>Amount Claimed</th>
						<th>Amount Sactioned</th>
						<!--<th>Lettar</th>-->
						<th>Data From</th>
						<!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
					</tr>
				</thead>

				<tbody>
					<?php if($live_claim_data != ''){
					$k = 1;
						foreach($live_claim_data as $claim_live_data){


							//echo "<pre>";print_r($claim_live_data);echo "</pre>";

					?>

					<tr>
						<td><?php echo $k;?></td>
						<td><?php echo $claim_live_data->employee_id; ?></td>
						<td><?php echo $claim_live_data->employee_name; ?></td>
						<td><?php echo $claim_live_data->patient_name; ?></td>
						<td><?php echo $claim_live_data->relation; ?></td>
						<td><?php echo $claim_live_data->claim_type; ?></td>
						<td><?php echo $claim_live_data->claim_status; ?></td>
						<td><?php echo $claim_live_data->tpa_claim_no; ?></td>
						<td><?php echo date('d/m/Y', strtotime($claim_live_data->hospitlization_date)); ?></td>
						<td><?php echo $claim_live_data->hospital_name; ?></td>
						<td><?php echo number_format($claim_live_data->amount_claimed); ?></td>
						<td><?php echo number_format($claim_live_data->sactioned_amount); ?></td>
						<!--<td></td>-->
                  <?php if($claim_live_data->source == 0){
                        $data_from = 'Excel';
                     }else{
                        $data_from = 'API';
                     } ?>
						<td><?php echo $data_from; ?></td>
					</tr>
					<?php $k++; }}?>

				</tbody>
            </table>
      </div>
	  </div>
  </div>


  <div id="menu5" class="tab-pane v-tabular fade in">
      <div class="row">
      <div class="col-lg-12">
            <h5>Escalation Matrix</h5>
      </div>

      </div>
      <div class="row">
      <div class="col-lg-12">
          <table id="example5" class="table table-bordered table-striped">

            <thead>

               <tr>
                  <th>SI No</th>
                  <th>Corporate</th>
                  <th>Policy Number</th>

                  <th>Level</th>
                  <th>User</th>
               </tr>
            </thead>

            <tbody>
               <?php if($live_Escalation_data != ''){
               $k = 1;
                  foreach($live_Escalation_data as $live_Escalation_matrix){

                     $corpora_name = $this->corporate_dashboard_model->get_corporate_name($live_Escalation_matrix->corporate_id);

                     $policy_number = $this->corporate_dashboard_model->get_policy_name($live_Escalation_matrix->policy_no);

                     // echo "<pre>";print_r($live_utilitie_tap);echo "</pre>";

               ?>

               <tr>
                  <td><?php echo $k;?></td>
                  <td><?php echo $corpora_name; ?></td>
                  <td><?php echo $policy_number; ?></td>
                  <td>
                     <?php
                        if($live_Escalation_matrix->level == 1){
                           echo "Level 1";
                        }elseif($live_Escalation_matrix->level == 2){
                           echo "Level 2";
                        }elseif($live_Escalation_matrix->level == 3){
                           echo "Level 3";
                        }elseif($live_Escalation_matrix->level == 4){
                           echo "Level 4";
                        }elseif($live_Escalation_matrix->level == 5){
                           echo "Level 5";
                        }elseif($live_Escalation_matrix->level == 6){
                           echo "Level 6";
                        }elseif($live_Escalation_matrix->level == 7){
                           echo "Level 7";
                        }elseif($live_Escalation_matrix->level == 8){
                           echo "Level 8";
                        }else{
                           echo "-";
                        }
                     ?>
                  </td>
                  <td>
                     <?php
                        $user_data = $this->corporate_dashboard_model->get_escalation_user_data($live_Escalation_matrix->user_id);

                        echo $user_data->name." ( ".$user_data->email." )";

                        ?>
                  </td>


               </tr>
               <?php $k++; }}?>

            </body>
            </table>
         </div>
      </div>
  </div>


  <div id="menu6" class="tab-pane v-tabular fade in">
      <div class="row">
      <div class="col-lg-12">
            <h5>Utilities</h5>
      </div>

      </div>
      <div class="row">
        <div class="col-lg-12">
          <table id="example3" class="table table-bordered table-striped">

            <thead>

               <tr>
                  <th>SI No</th>
                  <th>Corporate</th>
                  <th>Policy Number</th>

                  <th>Document Type</th>
                  <th>Policy Type</th>


                  <th>Note</th>
                  <th>Document</th>


               </tr>
            </thead>

            <tbody>
               <?php if($live_utilitie_tap_data != ''){
               $k = 1;
                  foreach($live_utilitie_tap_data as $live_utilitie_tap){

                     $corpora_name = $this->corporate_dashboard_model->get_corporate_name($live_utilitie_tap->corporate_id);

                     $policy_number = $this->corporate_dashboard_model->get_policy_name($live_utilitie_tap->policy_no);

                     $policy_type = $this->corporate_dashboard_model->get_policy_type($live_utilitie_tap->policy_type);

                     $document_type = $this->corporate_dashboard_model->get_document_type($live_utilitie_tap->document_type);

                     // echo "<pre>";print_r($live_utilitie_tap);echo "</pre>";

               ?>

               <tr>
                  <td><?php echo $k;?></td>
                  <td><?php echo $corpora_name; ?></td>
                  <td><?php echo $policy_number; ?></td>
                  <td><?php echo $policy_type; ?></td>
                  <td><?php echo $document_type; ?></td>
                  <td><?php echo $live_utilitie_tap->note; ?></td>
                  <td>
                     <?php if($live_utilitie_tap->document != ''){ ?>
                        <a target="_blank" href="<?php echo $front_base_url; ?>upload/utilities/<?php echo $live_utilitie_tap->document; ?>" class="btn btn-alert ">View Document</a>
                     <?php } ?>
                  </td>

               </tr>
               <?php $k++; }}?>

            </body>
            </table>
         </div>
      </div>
  </div>


  <div id="menu7" class="tab-pane v-tabular fade in">
      <div class="row">
      <div class="col-lg-12">
            <h5>Wellness Dashboard</h5>
      </div>

      </div>
      <div class="row">

         <div class="col-lg-4">
            <div class="v-card">
               <div class="v-card-head">
                  <h5>Room Rent Limit </h5>

               </div>
               <div class="v-card-cont">
                  <p>2% of Sum Insured</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="v-card">
               <div class="v-card-head">
                  <h5>Room Rent Limit </h5>

               </div>
               <div class="v-card-cont">
                  <p>2% of Sum Insured</p>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="v-card">
               <div class="v-card-head">
                  <h5>Room Rent Limit </h5>

               </div>
               <div class="v-card-cont">
                  <p>2% of Sum Insured</p>
               </div>
            </div>
         </div>
      </div>
  </div>


  <div id="menu8" class="tab-pane v-tabular fade in">
      <div class="row">
      <div class="col-lg-12">
            <h5>Reports</h5>
      </div>

      </div>
      <div class="row">

         <div class="col-lg-4">
            <a href="<?php echo $base_url;?>home/view_report/<?php echo $corporate_id;?>/<?php echo $policy_id; ?>" class="btn btn-alert " target="_blank">View Chart</a>
         </div>

      </div>
  </div>

<!-- Summary start -->
<div id="menu9" class="tab-pane v-tabular fade in">
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
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="inception_total"></th>
                        <th id="addition_total"></th>
                        <th id="deletion_total"></th>
                        <th id="active_total"></th>
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
                    <tr>
                        <td class="net_permium"></td>
                        <td class="earned_permium"></td>
                        <td class="claimed_permium"></td>
                        <td class="claimed_ratio"></td>
                        <td class="earned_ratio"></td>
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
                <tbody id="claim_summary_tbl" >
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Grand Total</th>
                        <th id="total_val"></th>
                        <th id="total_val1"></th>
                        <th id="total_val2"></th>
                        <th id="total_val3"></th>
                        <th id="total_val4"></th>
                        <th id="total_val5"></th>
                        <th id="total_val6"></th>
                        <th id="total_val7"></th>
                        <th id="total_val8"></th>
                    </tr>
                </thead>
            </table>
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
                <tbody id="settled_tbl">
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
                <tbody id="age_tbl">
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="age_total_val"></th>
                        <th id="age_total_val1"></th>
                        <th id="age_total_val2"></th>
                        <th id="age_total_val3"></th>
                        <th id="age_total_val4"></th>
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
                <tbody id="tat_tbl">
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Grand Total</th>
                        <th id='tal_total_val'></th>
                        <th id='tal_total_val1'></th>
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
                <tbody id="out_tbl">
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Grand Total</th>
                        <th id='out_total_val'></th>
                        <th id='out_total_val1'></th>
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
                <tbody id="ralation_tbl">
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="ralation_total_val"></th>
                        <th id="ralation_total_val1"></th>
                        <th id="ralation_total_val2"></th>
                        <th id="ralation_total_val3"></th>
                        <th id="ralation_total_val4"></th>
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
                <tbody id="network_tbl">
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        <th>Grand Total</th>
                        <th id='network_total_val'></th>
                        <th id='network_total_val1'></th>
                        <th id='network_total_val2'></th>
                        <th id='network_total_val3'></th>
                        <th id='network_total_val4'></th>
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
                <tbody id="amount_tbl">
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="amount_total_val"></th>
                        <th id="amount_total_val1"></th>
                        <th id="amount_total_val2"></th>
                        <th id="amount_total_val3"></th>
                        <th id="amount_total_val4"></th>
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
                <tbody id="level_tbl" >
                </tbody>
                <thead class="thead-dark">
                    <tr>
                        <th>Total</th>
                        <th id="level_val"></th>
                        <th id="level_val1"></th>
                        <th id="level_val2"></th>
                        <th id="level_val3"></th>
                        <th id="level_val4"></th>
                        <th id="level_val5"></th>
                        <th id="level_val6"></th>
                        <th id="level_val7"></th>
                    </tr>
                </thead>
            </table>
        </div>
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
              <tbody id="disease_tbl">
              </tbody>
              <thead class="thead-dark">
                  <tr>
                      <th>Total</th>
                      <th id="disease_val"></th>
                      <th id="disease_val1"></th>
                      <th id="disease_val2"></th>
                      <th id="disease_val3"></th>
                      <th id="disease_val4"></th>
                      <th id="disease_val5"></th>
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
              <tbody id="hospital_tbl">
              </tbody>
              <thead class="thead-dark">
                  <tr>
                      <th></th>
                      <th>Grand Total</th>
                      <th id='hospital_val'></th>
                      <th id='hospital_val1'></th>
                      <th id='hospital_val2'></th>
                      <th id='hospital_val3'></th>
                      <th id='hospital_val4'></th>
                      <th id='hospital_val5'></th>
                      <!-- <th id='out_total_val1'></th> -->
                  </tr>
              </thead>
            </table>
        </div>
      </div>

</div>

<!-- Summary end -->


</div>

            </div>
         </div>
      </div>

			<?php } ?>
</div>








	</section>


	<?php

if($enrolement_details != ''){


	foreach($enrolement_details as $enrolement_details_data){


		$enrolement_att = $this->corporate_dashboard_model->get_enrolement_att($enrolement_details_data->id);

		//echo "<pre>";print_r($enrolement_att);echo"</pre>";
		$ik = 1 ;
		foreach($enrolement_att as $enrolement_att_data){

			 $employee_atrribute = $this->corporate_dashboard_model->get_employee_atrribute($enrolement_att_data->employee_id);


?>
<!-- Modal -->
<div class="modal fade" id="myModal_<?php echo $enrolement_att_data->id;?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Family Covered Details </h4>
        </div>
        <div class="modal-body">

        <?php  //echo "<pre>";print_r($employee_atrribute);echo"<pre>";?>
          <!-- <p>Some text in the modal. <?php //echo $result[$i]->id;?></p> -->
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Relation</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Age</th>
                        <th>Gender</th>
                    <tr>
                </thead>
                <tbody>

                    <?php if($employee_atrribute != ''){
                            $k=1;
                            foreach($employee_atrribute as $employee_atrribute_data){
                        ?>
                    <tr>
                        <td><?php echo $k;?></td>
                        <td><?php echo $employee_atrribute_data->relationship;?></td>
                        <td><?php echo $employee_atrribute_data->name_of_the_employee;?></td>
                        <td><?php
                            $dob = date("d-m-Y", strtotime($employee_atrribute_data->d_o_b));
                            echo $dob;
                            ?>
                        </td>
                        <td><?php echo $employee_atrribute_data->age;?></td>
                        <td><?php echo $employee_atrribute_data->gender;?></td>
                    <tr>
                        <?php
                        $k++;
                    }
                    }?>

                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

<?php $ik++;} } }?>


	<?php include('include/sidebar_right.php');?> </div><!-- End #Main -->


   <!-- Modal -->
  <div class="modal fade" id="employee_activity_model" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employee Activity</h4>
        </div>
        <div class="modal-body">

               <a href="<?php echo $base_url;?>home/assessment_list" class="btn btn-sm btn-primary">Assessment</a>
               <a href="<?php echo $base_url;?>home/protection_list" class="btn btn-sm btn-primary">Protection</a>
               <a href="<?php echo $base_url;?>home/protection_list" class="btn btn-sm btn-primary">Protection</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>







<?php include('include/footer.php')?>

<!-- Modal -->
<div class="modal fade" id="policyUpdateModal_1" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Family Covered Details</h4>
        </div>

        <div class="modal-body">
        <div class="row">
        <form role="form" id="Policy_update_form" method="post" action="<?php echo $base_url;?>home/corporate_dashboard/<?php echo $corporate_id;?>/<?php echo $policy_id; ?>" enctype="multipart/form-data">

         <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
         <INPUT TYPE="hidden" NAME="action" VALUE="policy_update">
         <INPUT TYPE="hidden" NAME="policy_id" VALUE="<?php echo $policy_id; ?>">

         <?php
         $find_corporat_id_cd = $this->corporate_dashboard_model->find_corporat_id_cd($corporate_id);

         $find_corp_id_policy_id_cal = $this->corporate_dashboard_model->find_corp_id_policy_id_cal($corporate_id,$policy_id);

         if($find_corporat_id_cd == 1 || $find_corp_id_policy_id_cal == 1){
            $read_only = 'readonly="readonly"';
         }else{
            $read_only = '';
         }

         ?>

            <div class="form-group col-sm-6">
               <label style="width:100%; margin:15px 0 5px;" for="policy_no">Policy Number</label>
               <span id="show_product">
                  <input type="text" name="policy_no" id="policy_no" class="form-control" value="<?php echo $policy_data->policy_no; ?>" <?php echo $read_only; ?>>
               </span>
            </div>

            <div class="form-group col-sm-6">
               <label style="width:100%; margin:15px 0 5px;" for="tpa">TPA</label>
               <select id="tpa" name="tpa" class="form-control">
                  <option value="">Select TPA</option>

                  <option value="Alankit Insurance TPA Limited" <?php if($policy_data->tpa == "Alankit Insurance TPA Limited"){echo "selected"; } ?>>Alankit Insurance TPA Limited</option>

                  <option value="Anmol Medicare Insurance TPA Limited" <?php if($policy_data->tpa == "Anmol Medicare Insurance TPA Limited"){echo "selected"; } ?>>Anmol Medicare Insurance TPA Limited</option>

                  <option value="Anyuta Insuance TPA In Health Care Private Limited" <?php if($policy_data->tpa == "Anyuta Insuance TPA In Health Care Private Limited"){echo "selected"; } ?>>Anyuta Insuance TPA In Health Care Private Limited</option>

                  <option value="Dedicated Healthcare Services TPA (India) Pvt Ltd." <?php if($policy_data->tpa == "Dedicated Healthcare Services TPA (India) Pvt Ltd."){echo "selected"; } ?>>Dedicated Healthcare Services TPA (India) Pvt Ltd.</option>

                  <option value="East West Assist Insurance TPA Private Limited" <?php if($policy_data->tpa == "East West Assist Insurance TPA Private Limited"){echo "selected"; } ?>>East West Assist Insurance TPA Private Limited</option>

                  <option value="Ericson Insurance TPA Private Limited" <?php if($policy_data->tpa == "Ericson Insurance TPA Private Limited"){echo "selected"; } ?>>Ericson Insurance TPA Private Limited</option>

                  <option value="Emeditek Insurance TPA Limited" <?php if($policy_data->tpa == "Emeditek Insurance TPA Limited"){echo "selected"; } ?>>Emeditek Insurance TPA Limited</option>

                  <option value="Family Health Plan Insurance (TPA) Private Limited" <?php if($policy_data->tpa == "Family Health Plan Insurance (TPA) Private Limited"){echo "selected"; } ?>>Family Health Plan Insurance (TPA) Private Limited</option>

                  <option value="Focus Health Insurance TPA Private Limited" <?php if($policy_data->tpa == "Focus Health Insurance TPA Private Limited"){echo "selected"; } ?>>Focus Health Insurance TPA Private Limited</option>

                  <option value="Genins India Insurance TPA Limited" <?php if($policy_data->tpa == "Genins India Insurance TPA Limited"){echo "selected"; } ?>>Genins India Insurance TPA Limited</option>

                  <option value="Good Health Insurance TPA Limited" <?php if($policy_data->tpa == "Good Health Insurance TPA Limited"){echo "selected"; } ?>>Good Health Insurance TPA Limited</option>

                  <option value="Grand Insurance TPA Private Limited" <?php if($policy_data->tpa == "Grand Insurance TPA Private Limited"){echo "selected"; } ?>>Grand Insurance TPA Private Limited</option>

                  <option value="Happy Insurance TPA Services Pvt. Ltd" <?php if($policy_data->tpa == "Happy Insurance TPA Services Pvt. Ltd"){echo "selected"; } ?>>Happy Insurance TPA Services Pvt. Ltd</option>

                  <option value="Health India Insurance TPA Services Private Limited" <?php if($policy_data->tpa == "Health India Insurance TPA Services Private Limited"){echo "selected"; } ?>>Health India Insurance TPA Services Private Limited</option>

                  <option value="Health Insurance TPA of India  Limited" <?php if($policy_data->tpa == "Health Insurance TPA of India  Limited"){echo "selected"; } ?>>Health Insurance TPA of India  Limited</option>

                  <option value="Heritage Health Insurance TPA Private Limited" <?php if($policy_data->tpa == "Heritage Health Insurance TPA Private Limited"){echo "selected"; } ?>>Heritage Health Insurance TPA Private Limited</option>

                  <option value="Internal TPA" <?php if($policy_data->tpa == "Internal TPA"){echo "selected"; } ?>>Internal TPA</option>

                  <option value="MD India Health Insurance TPA Private Limited" <?php if($policy_data->tpa == "MD India Health Insurance TPA Private Limited"){echo "selected"; } ?>>MD India Health Insurance TPA Private Limited</option>

                  <option value="Medi Assist Insurance TPA Private Limited" <?php if($policy_data->tpa == "Medi Assist Insurance TPA Private Limited"){echo "selected"; } ?>>Medi Assist Insurance TPA Private Limited </option>

                  <option value="Medicare Insurance TPA Services (India) Pvt Ltd" <?php if($policy_data->tpa == "Medicare Insurance TPA Services (India) Pvt Ltd"){echo "selected"; } ?>>Medicare Insurance TPA Services (India) Pvt Ltd</option>

                  <option value="Medsave Health Insurance TPA Limited" <?php if($policy_data->tpa == "Medsave Health Insurance TPA Limited"){echo "selected"; } ?>>Medsave Health Insurance TPA Limited</option>

                  <option value="Paramount Health Services & Insurance  TPA Private Limited" <?php if($policy_data->tpa == "Paramount Health Services & Insurance  TPA Private Limited"){echo "selected"; } ?>>Paramount Health Services & Insurance  TPA Private Limited </option>

                  <option value="Park Mediclaim Insurance TPA Private Limited" <?php if($policy_data->tpa == "Park Mediclaim Insurance TPA Private Limited"){echo "selected"; } ?>>Park Mediclaim Insurance TPA Private Limited</option>

                  <option value="Raksha Health Insurance TPA Private Limited" <?php if($policy_data->tpa == "Raksha Health Insurance TPA Private Limited"){echo "selected"; } ?>>Raksha Health Insurance TPA Private Limited</option>

                  <option value="Rothshield Insurance TPA Limited" <?php if($policy_data->tpa == "Rothshield Insurance TPA Limited"){echo "selected"; } ?>>Rothshield Insurance TPA Limited</option>

                  <option value="Safeway Insurance TPA Private Limited" <?php if($policy_data->tpa == "Safeway Insurance TPA Private Limited"){echo "selected"; } ?>>Safeway Insurance TPA Private Limited</option>

                  <option value="United Health Care Parekh Insurance TPA Private Limited" <?php if($policy_data->tpa == "United Health Care Parekh Insurance TPA Private Limited"){echo "selected"; } ?>>United Health Care Parekh Insurance TPA Private Limited</option>

                  <option value="Vidal Health Insurance TPA Private Limited" <?php if($policy_data->tpa == "Vidal Health Insurance TPA Private Limited"){echo "selected"; } ?>>Vidal Health Insurance TPA Private Limited</option>

                  <option value="Vidal Health TPA Pvt Ltd" <?php if($policy_data->tpa == "Vidal Health TPA Pvt Ltd"){echo "selected"; } ?>>Vidal Health TPA Pvt Ltd</option>

                  <option value="Vipul Medcorp Insurance TPA Private Limited" <?php if($policy_data->tpa == "Vipul Medcorp Insurance TPA Private Limited"){echo "selected"; } ?>>Vipul Medcorp Insurance TPA Private Limited</option>

                  <option value="Vision Digital Insurance TPA Private Limited" <?php if($policy_data->tpa == "Vision Digital Insurance TPA Private Limited"){echo "selected"; } ?>>Vision Digital Insurance TPA Private Limited</option>


               </select>

            </div>
            <div class="form-group col-sm-6">
               <label style="width:100%; margin:15px 0 5px;" for="start_date">Start Date</label>
               <span id="show_product">
               <input type="date" name="policy_start_date" id="policy_start_date" class="form-control" value="<?php echo $policy_data->policy_start_date ?>" <?php echo $read_only; ?>>
               </span>
            </div>


            <div class="form-group col-sm-6">
               <label style="width:100%; margin:15px 0 5px;" for="tpa">End Date</label>
               <span id="show_tpa">
                  <input type="date" name="policy_end_date" id="policy_end_date" class="form-control" value="<?php echo $policy_data->policy_end_date; ?>" <?php echo $read_only; ?>>
               </span>
            </div>



             <div class="form-group col-sm-12">

                <span id="Policy_update_error" class="alert alert-danger alert-dismissable" style="display:none;width:100%;"></span>

                  <span id="success_Policy_update_error" class="successmain alert-message" style="display:none;"></span>

              </div>


              </form>
              </div>
			  </div>
        <div class="modal-footer">
		<?php if(in_array('24',$permission1)){ ?>
          <button type="button" class="btn btn-default" onclick="javascript:validate_policy_update();return false;">Update</button>
		<?php } ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>



      </div>

    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="update_corp_buffer_model" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Corporate Buffer Update</h4>
        </div>

        <div class="modal-body">
        <div class="row">
        <form role="form" id="corporate_buffer_update_form" method="post" action="<?php echo $base_url;?>home/update_corporate_buffer" enctype="multipart/form-data">

         <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
         <INPUT TYPE="hidden" NAME="action" VALUE="update_corporate_buffer">
         <INPUT TYPE="hidden" NAME="corporate_id" VALUE="<?php echo $corporate_id; ?>">
		 <INPUT TYPE="hidden" NAME="policy_id" VALUE="<?php echo $policy_id; ?>">



            <div class="form-group col-sm-12">
               <label style="width:100%; margin:15px 0 5px;" for="total_corporate_sum_insured">Total Corporate Buffer Sum-Insured</label>

                  <input type="number" name="total_corporate_sum_insured" id="total_corporate_sum_insured" class="form-control" value="">

            </div>



             <div class="form-group col-sm-12">

                <!--<span id="buffer_update_error" class="alert alert-danger alert-dismissable" style="display:none;width:100%;"></span>

                  <span id="success_buffer_update_error" class="successmain alert-message" style="display:none;"></span> -->

				<span id="buffer_update_error" class="error alert-message valierror" style="display:none;"></span>
                <span id="success_buffer_update_error" class="successmain alert-message" style="display:none;"></span>

              </div>


              </form>
              </div>
			  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="javascript:validate_buffer_update();return false;">Update</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>



      </div>

    </div>
  </div>


<script>

function change_policy_number(corporate_id,policy_id){

	   var conf = confirm("Do you want to Change Policy Number?");
        if (conf == true) {
            var base_url = '<?php echo $base_url. 'home/corporate_dashboard';?>';
            window.location = base_url + "/" + corporate_id + "/"+policy_id ;
        } else {
            return false;
        }
}
</script>

<!-- DATA TABES SCRIPT -->
<link href="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"
    type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript">
</script>
<link href="<?php echo $base_url_views; ?>plugins/iCheck/minimal/_all.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<script type="text/javascript">

function validate_policy_update() {

// alert('test');

var policy_no = jQuery("#policy_no").val();
 if (policy_no == '') {

     //alert("name");
     jQuery('#Policy_update_error').html("Please Enter Policy Number");
     jQuery('#Policy_update_error').show().delay(0).fadeIn('show');
     jQuery('#Policy_update_error').show().delay(2000).fadeOut('show');
     return false;
 }

 var tpa = jQuery("#tpa").val();
 if (tpa == '') {

     //alert("name");
     jQuery('#Policy_update_error').html("Please Select TPA");
     jQuery('#Policy_update_error').show().delay(0).fadeIn('show');
     jQuery('#Policy_update_error').show().delay(2000).fadeOut('show');
     return false;
 }


 var policy_start_date = jQuery("#policy_start_date").val();
 if (policy_start_date == '') {

     //alert("name");
     jQuery('#Policy_update_error').html("Please Enter Start Date");
     jQuery('#Policy_update_error').show().delay(0).fadeIn('show');
     jQuery('#Policy_update_error').show().delay(2000).fadeOut('show');
     return false;
 }


 var policy_end_date = jQuery("#policy_end_date").val();
 if (policy_end_date == '') {

     //alert("name");
     jQuery('#Policy_update_error').html("Please Enter End Date");
     jQuery('#Policy_update_error').show().delay(0).fadeIn('show');
     jQuery('#Policy_update_error').show().delay(2000).fadeOut('show');
     return false;
 }



$('#Policy_update_form').submit();
}


function validate_buffer_update() {

// alert('test');

var total_corporate_sum_insured = jQuery("#total_corporate_sum_insured").val();
 if (total_corporate_sum_insured == '') {

     //alert("name");
     jQuery('#buffer_update_error').html("Please Enter Total Corporate Buffer Sum-Insured");
     jQuery('#buffer_update_error').show().delay(0).fadeIn('show');
     jQuery('#buffer_update_error').show().delay(2000).fadeOut('show');
     return false;
 }





$('#corporate_buffer_update_form').submit();
}


	function validate_corporate_buffer_utilization() {

	// alert('test');

		var corporate_buffer_utilization_employe_id = jQuery("#corporate_buffer_utilization_employe_id").val();
		 if (corporate_buffer_utilization_employe_id == '') {

			 //alert("name");
			 jQuery('#corporate_buffer_utilization_error').html("Please Enter Employee Id");
			 jQuery('#corporate_buffer_utilization_error').show().delay(0).fadeIn('show');
			 jQuery('#corporate_buffer_utilization_error').show().delay(2000).fadeOut('show');
			 return false;
		 }

		  var corporate_buffer_utilization_member_id = jQuery("#corporate_buffer_utilization_member_id").val();
		 if (corporate_buffer_utilization_member_id == '') {

			 //alert("name");
			 jQuery('#corporate_buffer_utilization_error').html("Please Select Member Name");
			 jQuery('#corporate_buffer_utilization_error').show().delay(0).fadeIn('show');
			 jQuery('#corporate_buffer_utilization_error').show().delay(2000).fadeOut('show');
			 return false;
		 }

		 var corporate_buffer_utilization_claim_amount = jQuery("#corporate_buffer_utilization_claim_amount").val();
		 if (corporate_buffer_utilization_claim_amount == '') {

			 //alert("name");
			 jQuery('#corporate_buffer_utilization_error').html("Please Enter Claim Amount");
			 jQuery('#corporate_buffer_utilization_error').show().delay(0).fadeIn('show');
			 jQuery('#corporate_buffer_utilization_error').show().delay(2000).fadeOut('show');
			 return false;
		 }

		 var corporate_buffer_utilization_settled_amount = jQuery("#corporate_buffer_utilization_settled_amount").val();
		 if (corporate_buffer_utilization_settled_amount == '') {

			 //alert("name");
			 jQuery('#corporate_buffer_utilization_error').html("Please Enter Settled Amount");
			 jQuery('#corporate_buffer_utilization_error').show().delay(0).fadeIn('show');
			 jQuery('#corporate_buffer_utilization_error').show().delay(2000).fadeOut('show');
			 return false;
		 }

		 var corporate_buffer_utilization_employee_si_utilised = jQuery("#corporate_buffer_utilization_employee_si_utilised").val();
		 if (corporate_buffer_utilization_employee_si_utilised == '') {

			 //alert("name");
			 jQuery('#corporate_buffer_utilization_error').html("Please Enter Employee Si Utilized");
			 jQuery('#corporate_buffer_utilization_error').show().delay(0).fadeIn('show');
			 jQuery('#corporate_buffer_utilization_error').show().delay(2000).fadeOut('show');
			 return false;
		 }

		 var corporate_buffer_utilization_corporate_buffer_used = jQuery("#corporate_buffer_utilization_corporate_buffer_used").val();
		 if (corporate_buffer_utilization_corporate_buffer_used == '') {

			 //alert("name");
			 jQuery('#corporate_buffer_utilization_error').html("Please Enter Corporate Buffer Used");
			 jQuery('#corporate_buffer_utilization_error').show().delay(0).fadeIn('show');
			 jQuery('#corporate_buffer_utilization_error').show().delay(2000).fadeOut('show');
			 return false;
		 }

		$('#corporate_buffer_utilization_form').submit();
	}


function get_member(corp_id,policy_id,val){

/* alert(corp_id);
alert(policy_id);
alert(val); */

		var url = '<?php echo $base_url; ?>home/show_member';

        $.ajax({
            url : url,
            type : 'post',
            data : 'corp_id=' + corp_id + '&policy_id=' + policy_id + '&val=' + val,
            success: function(msg){
                document.getElementById('member_replace').innerHTML = msg;
            }
        });
}


function get_employee_data(id){


	var url = '<?php echo $base_url; ?>home/get_employee_data';

        $.ajax({
            url : url,
            type : 'post',
            data : 'id=' + id ,
            success: function(msg){

				response = JSON.parse(msg);
				//alert(response.mobile);
				$('#corporate_buffer_utilization_contact_number').val(response.mobile);
				$('#corporate_buffer_utilization_email_address').val(response.email);
                //document.getElementById('member_replace').innerHTML = msg;
            }
        });

}

$(function() {
    $('#example1').dataTable({

		//alert('test');
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
		   "pageLength": 50
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
});

$(function() {
    $('#example2').dataTable({

		//alert('test');
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
		   "pageLength": 50
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
});

$(function() {
    $('#example3').dataTable({

		//alert('test');
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
		   "pageLength": 50
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
});

$(function() {
    $('#example4').dataTable({

		//alert('test');
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
		   "pageLength": 50
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
});

$(function() {
    $('#example5').dataTable({

		//alert('test');
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
		   "pageLength": 50
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
});

function add_corporate_buffer_utilization_form() {
  var x = document.getElementById("add_corporate_buffer_utilization_form_div");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>
<!-- summary script start -->
<script type="text/javascript">
  $(document).ready(function() {
      var policy_id = $("#policy_id option:selected").val();
      var corporate_id = $("input[name=corporate_id]").val();

        getSummary(policy_id,corporate_id);
        getEmployeeSummary(policy_id,corporate_id);
        getClaimStatusSummary(policy_id,corporate_id);
        getSettledAcs(policy_id,corporate_id);
        getAgewiseClaimed(policy_id,corporate_id);
        getTATSummary(policy_id,corporate_id);
        getOutstandingTATSummary(policy_id,corporate_id);
        getRelationwiseClaimed(policy_id,corporate_id);
        getNetworkClaimed(policy_id,corporate_id);
        getAmountBandClaimed(policy_id,corporate_id);
        getLevelCareClaimed(policy_id,corporate_id);
        getDiseaseCategoryClaimed(policy_id,corporate_id);
        geTopHospitalClaimed(policy_id,corporate_id);

        function getSummary(policy_id,corporate_id) {
            var policy_start_date = $("input[name=policy_start_date]").val();
            var policy_end_date = $("input[name=policy_end_date]").val();
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id + "&policy_start_date=" + policy_start_date + "&policy_end_date=" + policy_end_date,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('.net_permium,.earned_permium,.claimed_permium,.claimed_ratio,.earned_ratio').html('');
                    if(data.premium != ''){
                        var premium = data.premium;
                        if(data.earned_premium != ''){
                          $('.net_permium').html('₹ '+premium.second.total_premium);
                          $('.earned_permium').html('₹ '+data.earned_premium);
                          $('.claimed_permium').html('₹ '+data.claim_paid_amount.sactioned_amount);
                          $('.claimed_ratio').html(data.claim_ratio);
                          $('.earned_ratio').html(data.earned_ratio);
                        }else{
                          $('#ratio_tbl').html('<tr><td>No record found...</td></tr>');
                        }

                    }

                }
            });
            return false;
        }

        function getEmployeeSummary(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showEnrollmentSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#emp_summary_tbl').html(data.body_html);
                    $('#inception_total').html(data.total_val);
                    $('#addition_total').html(data.total_val1);
                    $('#deletion_total').html(data.total_val2);
                    $('#active_total').html(data.total_val3);
                }
            });
            return false;
        }

        function getClaimStatusSummary(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showClaimStatusSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#claim_summary_tbl').html(data.body_html);
                    $('#total_val').html(data.total_val);
                    $('#total_val1').html(data.total_val1);
                    $('#total_val2').html(data.total_val2);
                    $('#total_val3').html(data.total_val3);
                    $('#total_val4').html(data.total_val4);
                    $('#total_val5').html(data.total_val5);
                    $('#total_val6').html(data.total_val6);
                    $('#total_val7').html(data.total_val7);
                    $('#total_val8').html(data.total_val8);

                }
            });
            return false;
        }

        function getSettledAcs(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showSettledACS',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#settled_tbl').html(data);
                }
            });
            return false;
        }

        function getAgewiseClaimed(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showAgeWiseSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#age_tbl').html(data.body_html);
                    $('#age_total_val').html(data.total_val);
                    $('#age_total_val1').html(data.total_val1);
                    $('#age_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#age_total_val3').html(data.total_val3);
                    $('#age_total_val4').html(data.total_val4);
                }
            });
            return false;
        }

        function getTATSummary(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showClaimTATSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#tat_tbl').html(data.body_html);
                    $('#tal_total_val').html(data.total_val);
                    $('#tal_total_val1').html(data.total_val1);
                }
            });
            return false;
        }

        function getOutstandingTATSummary(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showOutstandingClaimTATSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#out_tbl').html(data.body_html);
                    $('#out_total_val').html(data.total_val);
                    $('#out_total_val1').html(data.total_val1);
                }
            });
            return false;
        }

        function getRelationwiseClaimed(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showRelationWiseSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#ralation_tbl').html(data.body_html);
                    $('#ralation_total_val').html(data.total_val);
                    $('#ralation_total_val1').html(data.total_val1);
                    $('#ralation_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#ralation_total_val3').html(data.total_val3);
                    $('#ralation_total_val4').html(data.total_val4);
                }
            });
            return false;
        }

        function getNetworkClaimed(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showNetworkWiseSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#network_tbl').html(data.body_html);
                    $('#network_total_val').html(data.total_val);
                    $('#network_total_val1').html(data.total_val1);
                    $('#network_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#network_total_val3').html(data.total_val3);
                    $('#network_total_val4').html(data.total_val4);
                }
            });
            return false;
        }

        function getAmountBandClaimed(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showAmountBandClaimSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#amount_tbl').html(data.body_html);
                    $('#amount_total_val').html(data.total_val);
                    $('#amount_total_val1').html(data.total_val1);
                    $('#amount_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#amount_total_val3').html(data.total_val3);
                    $('#amount_total_val4').html(data.total_val4);
                }
            });
            return false;
        }

        function getLevelCareClaimed(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showLevelCareClaimSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#level_tbl').html(data.body_html);
                    $('#level_val').html(data.total_val);
                    $('#level_val1').html(data.total_val1);
                    $('#level_val2').html('₹ '+data.total_val2+' /-');
                    $('#level_val3').html(data.total_val3);
                    $('#level_val4').html(data.total_val4);
                    $('#level_val5').html(data.total_val5);
                    $('#level_val6').html('₹ '+data.total_val6+' /-');
                    $('#level_val7').html(data.total_val7);

                }
            });
            return false;
        }

        function getDiseaseCategoryClaimed(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showDiseaseCategoryClaimSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#disease_tbl').html(data.body_html);
                    $('#disease_val').html(data.total_val);
                    $('#disease_val1').html('₹ '+data.total_val1+' /-');
                    $('#disease_val2').html(data.total_val2);
                    $('#disease_val3').html('₹ '+data.total_val3+' /-');
                    $('#disease_val4').html(data.total_val4);
                    $('#disease_val5').html('₹ '+data.total_val5+' /-');
                }
            });
            return false;
        }

        function geTopHospitalClaimed(policy_id,corporate_id) {
            $.ajax({
                url : '<?php echo $base_url; ?>summary/showHospitalClaimSummary',
                type : 'post',
                data : 'policy_id=' + policy_id + "&corporate_id=" + corporate_id,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    $('#hospital_tbl').html(data.body_html);
                    $('#hospital_val').html(data.total_val);
                    $('#hospital_val1').html('₹ '+data.total_val1+' /-');
                    $('#hospital_val2').html(data.total_val2);
                    $('#hospital_val3').html('₹ '+data.total_val3+' /-');
                    $('#hospital_val4').html(data.total_val4);
                    $('#hospital_val5').html('₹ '+data.total_val5+' /-');
                }
            });
            return false;
        }

  });

  $(function() {
      $('#example6').dataTable({

  		//alert('test');
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
          "scrollX": true
      });

      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
      });
  });

  $(function() {
      $('#example7').dataTable({

  		//alert('test');
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false

      });

      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
      });
  });

  // $("#cashless_table,#network_table").DataTable({scrollX : true,dom: 'Bfrtip'});
</script>

<!-- summary script end-->

<script type="text/javascript">
    $(document).ready(function() {
    $("#policy_start_date").change(function() {
        var oldDate = jQuery("#policy_start_date").val();
        //alert(oldDate);
        $("#policy_end_date").attr("min", oldDate);
        // $("#basic_discounting_date").attr("min", oldDate);
    }).change();
});

</script>

</body></html>
