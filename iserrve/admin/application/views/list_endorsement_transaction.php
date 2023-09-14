<?php include('include/header.php');?>
<style>
    .table-responsive{
        height: auto !important;
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

                    <li class="crumb-active"><a href="javascript:void(0);">Endorsement Transaction Lists</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">Endorsement Transaction Lists</li>

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
				
				<div class="col-md-4">
						<select name="cd_number" id="cd_number" class="form-control" onchange="change_cd_number('<?php echo $corporate_id?>',this.value);">
							<option value="0">Select CD Number</option>
							<?php if($cd_number != ''){
								
								foreach($cd_number as $cd_number_data){
								
							?>
							<option value="<?php echo $cd_number_data->id;?>" <?php if($cd_number_data->id == $this->session->userdata('cd_no')){echo "selected";}?>><?php echo $cd_number_data->cd_number;?></option>
							
							<?php } }?>
						</select>
				
				</div>

                <div class="col-md-8">
				
				<form action="<?php echo $base_url . "endorsement_transaction/download_report/"?>" method="post"
                        enctype="multipart/form-data" id="download_user_report">
                        <input class="submit btn btn-alert pull-right " type="button" onclick="download_user_report_button();" value="Export">
						<input type="hidden" name="cd_id" id="cd_id" value="<?php echo $this->session->userdata('cd_no');?>">
						<input type="hidden" name="corporate_id" id="corporate_id" value="<?php echo $corporate_id;?>">
						
						</form>
                    <!-- <a href="javascript:void('0');" onclick="deleteblog();" class="btn btn-danger pull-right"
                        style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>
                    <a href="<?php echo $base_url;?>endorsement_transaction/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add Endorsement Transaction</a>-->
                </div> 
                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>Endorsement Transaction Lists</span> </div>


                        <div class="panel-body">

                            <form action="<?php echo $base_url."endorsement_transaction/deletes";?>" method="post" enctype="multipart/form-data" id="form">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                <div class="table-responsive">
									<h4>Deposit Entry</h4>
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>
                                                <th>SrNo</th>
                                                <th>Particular</th>
                                                <th>Policy Type</th>
                                                <th>Policy Number</th>
                                                <th>CD Number</th>
                                                <th>Bank Name</th>
                                                <th>Cheque Number</th>
                                                <th>Amount</th>
												<th>Document</th>
                                                <th>Created At</th>
                                                <!-- <th>Set as Home</th> -->
												<?php if(in_array('16',$permission1)){ ?>
													<th>Delete</th>
												<?php } ?>
                                                <!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            //echo "<pre>";print_r($result);echo"</pre>";
                                            if($result){
                                                $k = 1;
							$check_total = "0";
					for($i=0;$i<count($result);$i++){ 

                        
                        if($result[$i]->policy_endorsement_entry == 0){
                        
                        ?>


                                            <tr>
                                               
                                                <td><?php echo $k; ?></td>

                                                <td>
                                                   <?php echo $this->endorsement_transaction_model->get_corp_name($result[$i]->corporate_id); ?>
                                                </td>

                                                <td><?php echo $this->endorsement_transaction_model->get_policy_type_name($result[$i]->product_type); ?></td>

                                                <td><?php echo $this->endorsement_transaction_model->get_policy_number($result[$i]->policy_no); ?></td>

                                                <td>
                                                    <?php echo $this->endorsement_transaction_model->get_cd_number($result[$i]->cd_number_id); ?>
                                                </td>

                                                <td><?php echo $result[$i]->bank_name; ?></td>

                                                <td><?php echo $result[$i]->cheque_utr_no; ?></td>

                                                <td><?php echo number_format($result[$i]->amount); ?></td>
												
												<?php if($result[$i]->upload_file != ''){ ?>
															
															<td><a href="<?php echo $this->config->item('front_base_url').'upload/endor_trans/'.$result[$i]->upload_file;?>" target="_blank"  class="btn btn-primary">Download</a></td>
															
															
												<?php }else{	?>
												
													<td></td>
												<?php } ?>

                                                <td><?php echo $result[$i]->date; ?></td>

												<?php if(in_array('16',$permission1)){ ?>

                                                <td>
                                                    <a class="btn btn-danger" title="delete"
                                                        href="#" onclick="deleteblog('<?php echo $result[$i]->id;?>');">
                                                        <i class="fa fa-trash-o"></i></a>
                                                </td>
												
												<?php } ?>
                                            </tr>
                                            <?php 
											
												$check_total  +=$result[$i]->amount;
											
											?>
                                            <?php $k++;}  } ?>
											
											<tr style="color: #000 !important;">


												
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
                                                <td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
                                                <td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td  class="thick-line text-center" style="background-color: #32CD32;border: 2px solid #32CD32;border-left: 2px solid #fff;">
													<strong>Total</strong></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;border-left: 2px solid #fff;border-right: 2px solid #fff;">
													<?php echo number_format($check_total);?>
												</td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<?php if(in_array('16',$permission1)){ ?>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<?php } ?>
											</tr>
						 
						 
						 
						 <?php } else {

        					  echo 'No Endorsement Transaction Found';
        				  }
                        ?>
                                            </body>
                                    </table>

                                </div>




                                <div class="table-responsive" style="margin-top:6%;">
								
								<h4>Premium Entry</h4>

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>
                                                <th>SrNo</th>
                                                <th>Particular</th>
                                                <th>Policy Type</th>
                                                <th>Policy Number</th>
                                                <th>Endorsement Number</th>
                                                <th>Employee Count</th>
                                                <th>Dept Count</th>
                                                <th>Debit(incl GST)</th>
                                                <th>Credit(incl GST)</th>
												 <th>Document</th>
                                                <th>Created At</th>
                                               
											   <?php if(in_array('16',$permission1)){ ?>
                                                <th>Action</th>
											   <?php } ?>
                                                <!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($result){
                                                $k = 1;
												
												$premium_entry_debit_total = "0";
												$premium_entry_credit_total = "0";

					for($i=0;$i<count($result);$i++){ 
					
					$policy_data = $this->admin->get_policy_data($result[$i]->policy_no);
					
                        if($result[$i]->policy_endorsement_entry == 1 && $policy_data->policy_end_date >= date('Y-m-d')){
							
							
                        
                        ?>


                                            <tr>
                                                
                                                <td><?php echo $k; ?></td>

                                                <td><?php echo $result[$i]->particular; ?></td>

                                                <td><?php echo $this->endorsement_transaction_model->get_policy_type_name($result[$i]->product_type); ?></td>

                                                <td><?php echo $this->endorsement_transaction_model->get_policy_number($result[$i]->policy_no); ?></td>

                                                <td><?php echo $result[$i]->endorsement_no_policy; ?></td>

                                                <td><?php echo $result[$i]->employee_count_policy; ?></td>

                                                <td><?php echo $result[$i]->dependent_count_policy; ?></td>

                                                <td><?php if($result[$i]->transaction_type == "debit"){
													
                                                    echo number_format($result[$i]->gross_premium_policy);
													$premium_entry_debit_total += $result[$i]->gross_premium_policy;
                                                }else{ echo "0";} ?></td>

                                                <td><?php if($result[$i]->transaction_type == "credit"){
                                                    echo number_format($result[$i]->gross_premium_policy);
													
													$premium_entry_credit_total += $result[$i]->gross_premium_policy;
                                                }else{ echo "0";} ?></td>
												
												
												<?php if($result[$i]->upload_file != ''){ ?>
															
															<td><a href="<?php echo $this->config->item('front_base_url').'upload/endor_trans/'.$result[$i]->upload_file;?>" target="_blank"  class="btn btn-primary">Download</a></td>
															
															
												<?php }else{	?>
												
													<td></td>
												<?php } ?>
												

                                                <td><?php echo $result[$i]->date; ?></td>


												<?php if(in_array('16',$permission1)){ ?>
                                                <td>
												
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?php echo $result[$i]->id;?>"><i class="fa fa-pencil"></i></button>
                                                    <!--<a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."endorsement_transaction/edit/"; ?><?php echo $result[$i]->id;?>" >
                                                        <i class="fa fa-pencil"></i></a>-->
                                                        <a class="btn btn-danger" title="delete"
                                                        href="#" onclick="deleteblog('<?php echo $result[$i]->id;?>');">
                                                        <i class="fa fa-trash-o"></i></a> 
                                                </td>
												<?php } ?>
                                            </tr>
                                            <?php $k++;} } ?>
											
											<tr style="color: #000 !important;">


												
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td  class="thick-line text-center" style="background-color: #32CD32;border: 1px solid #32CD32;border-left: 2px solid #fff;">
													<strong>Total</strong></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;border-left: 2px solid #fff;border-right: 2px solid #fff;">
													<?php echo number_format($premium_entry_debit_total);?>
												</td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;border-right: 2px solid #fff;">
													<?php echo number_format($premium_entry_credit_total);?>
												</td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<?php if(in_array('16',$permission1)){ ?>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<?php } ?>
											</tr>
						 
						 
						 <?php } else {

        					  echo 'No Endorsement Transaction Found';
        				  }
                        ?>
                                            </body>
                                    </table>

                                </div>

                            </form>
							
							<div class="col-md-12">
				
								<div style="width: 100%;display: inline-block;text-align: center;">
									<div>
										<hr style="width: 40%;display: inline-block;border-top: 2px solid blue;margin-bottom: 8px;">
										<div>
											<?php
												$balance_amount = $check_total - $premium_entry_debit_total + $premium_entry_credit_total;
											?>
											Balance Amount : <?php echo number_format($balance_amount);?>
										</div>
										<hr style="width: 40%;display: inline-block;border-top: 2px solid #C0C0C0;margin-top: 8px;margin-bottom: 0;">
									</div>
									
									<div>
											<?php
												$provisional_balance_amount = $balance_amount - $endersoment_net_premium_with_gst_total;
											?>
											
										<hr style="width: 60%;display: inline-block;border-top: 2px solid #F4C430;margin-bottom: 8px;margin-top: 15px;">
										<div>
											Provisional Balance Amount : <?php echo number_format($provisional_balance_amount);?>
										</div>
										<hr style="width: 60%;display: inline-block;border-top: 2px solid #C0C0C0;margin-top: 8px;">
									</div>
								</div>
							
								
							</div>

                        </div>
						
						

                    </div>
					
					

                </div>
				
				
				

                <div class="clearfix"></div>

            </div>

        </div>
			<?php } ?>
    </section>
	
	<section id="content_wrapper">

      

        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>Endorsement Calculation</span> </div>


                        <div class="panel-body">

                            <form action="<?php echo $base_url."endorsement_transaction/deletes";?>" method="post" enctype="multipart/form-data" id="form">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>
                                                <th>SI No</th>
                                                <th>Endersoment Title</th>
                                                <th>Endersoment Number</th>
                                                <th>Transaction Statement</th>
                                                <th>Export Addition</th>
                                                <th>Export Deletion</th>
                                                <th>View Details</th>
                                                <!-- <th>Set as Home</th> -->
                                                <th>Created At</th>
                                                <!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            //echo "<pre>";print_r($corporate_endersoment_calculation);echo"</pre>";exit;
                                            if($corporate_endersoment_calculation){
												
												$k = 1;
                                                
					for($i=0;$i<count($corporate_endersoment_calculation);$i++){ 
					
					//echo "<pre>";print_r($corporate_endersoment_calculation[$i]->endersoment_title);echo"</pre>";

                        
                        ?>


                                            <tr>
                                               
                                                <td><?php echo $k; ?></td>

                                                <td>
                                                   <?php echo $corporate_endersoment_calculation[$i]->endersoment_title; ?>
                                                </td>

                                                <td>
                                                    <?php echo $corporate_endersoment_calculation[$i]->endersoment_number; ?>
                                                </td>

                                                <td><?php echo $corporate_endersoment_calculation[$i]->transaction_statement; ?></td>

                                                <td><a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."endorsement_transaction/export_addition/"; ?><?php echo $corporate_endersoment_calculation[$i]->id;?>" >
                                                        Export Addition</a></td>

                                                <td><a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."endorsement_transaction/export_deletion/"; ?><?php echo $corporate_endersoment_calculation[$i]->id;?>" >
                                                        Export Deletion</a></td>

                                                <td><a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."endorsement_transaction/view_calculation/"; ?><?php echo $corporate_endersoment_calculation[$i]->id;?>" >
                                                        View Details</a></td>



                                                <td>
                                                    <?php 
													
													$data =  date("d-M-Y h:i:sa", strtotime($corporate_endersoment_calculation[$i]->created_at));
													
													echo $data; ?>
                                                </td>
                                            </tr>
                                            
                                            <?php   $k++;} ?>
											
						 
						 
						 
						 <?php } else {

        					  echo 'No Endorsement Transaction Found';
        				  }
                        ?>
                                            </body>
                                    </table>

                                </div>


                            </form>
						
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


 <?php if($result){
					for($i=0;$i<count($result);$i++){ 
                        if($result[$i]->policy_endorsement_entry == 1){ ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal_<?php echo $result[$i]->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Endorsement Transaction </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			 <form role="form" id="form_popup_<?php echo $result[$i]->id;?>" method="post" action="<?php echo $base_url;?>endorsement_transaction/edit_popup/<?php echo $result[$i]->id;?>" enctype="multipart/form-data">
				
					<INPUT TYPE="hidden" NAME="action" VALUE="edit_endorsement_transaction">
					
					<INPUT TYPE="hidden" NAME="cd_no" VALUE="<?php echo $this->session->userdata('cd_no');?>">
					
					<div class="form-group">
						<label for="particular">Particular</label>
						<textarea id="particular_policy_<?php echo $result[$i]->id?>" name="particular_policy" type="text" class="form-control policy_blank" placeholder="Enter Particular" value="" /><?php echo $result[$i]->particular;?></textarea>
					</div>
					
					<div class="form-group">
						<label style="width:100%; margin:15px 0 5px;" for="name">Upload Attachment</label>
						<input id="upload_file" name="upload_file" type="file" class="form-control cheque_blank"/>
						<?php if($result[$i]->upload_file != ''){?>
							<!--<a target="_blank" href="<?php echo $front_base_url; ?>upload/endor_trans/<?php echo $result[$i]->upload_file;?>">View Document</a>-->
						<?php } ?>
					</div>
					
					<div id="validator_<?php echo $result[$i]->id?>" class="alert alert-danger alert-dismissable" style="display:none;">
                               
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <span id="error_popup_<?php echo $result[$i]->id?>"></span>
                            </div>
			
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="javascript:validate_<?php echo $result[$i]->id?>();return false;" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

 <?php } } } ?>


<?php include('include/footer.php')?>

 <?php if($result){
					for($i=0;$i<count($result);$i++){ 
                        if($result[$i]->policy_endorsement_entry == 1){ ?>
<script>
function validate_<?php echo $result[$i]->id?>(){
		var particular_policy = $("#particular_policy_<?php echo $result[$i]->id?>").val();
		if(particular_policy == ''){
			$("#error_popup_<?php echo $result[$i]->id?>").html("Please Enter Particular.");
			$("#validator_<?php echo $result[$i]->id?>").css("display","block");
			return false;
		}
		
		$('#form_popup_<?php echo $result[$i]->id?>').submit();
}
</script>

 <?php } } } ?>




<!-- DATA TABES SCRIPT -->
<link href="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"
    type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript">
</script>
<link href="<?php echo $base_url_views; ?>plugins/iCheck/minimal/_all.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
$(function() {
    $('#example1').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,
		   "pageLength": 50
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
});
</script>

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

function deleteblog(id) {

    // alert(id);

    // var checked = $("#form input:checked").length > 0;
    // if (!checked) {
    //     alert("Please select at least one record to delete");
    //     return false;
    // } else {

        var conf = confirm("Do you want to delete?");
        if (conf == true) {
            var base_url = '<?php echo $base_url. 'endorsement_transaction/deletes';?>';
            window.location = base_url + "/" + id;
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