<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <!-- Start: Content -->
    <section id="content_wrapper">

        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);">Rack Rate</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">Rack Rate Calculation</li>

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
                                    class="glyphicon glyphicon-list-alt"></span>Rack Rate Calculation</span> </div>


                        <div class="panel-body">

                            <form action="<?php echo $base_url."endorsement_transaction/delete_rack_rate_attribute";?>" method="post" enctype="multipart/form-data" id="form_addition">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                <div class="table-responsive">
								
									<h2>Addition Premium</h2>

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>
                                                <th>Sum Insured</th>
                                                <th>Annual Premium</th>
                                                <th>Premium Per Day</th>
                                                <th>Count</th>
                                                <th>Addition Premium</th>
                                                
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            //echo "<pre>";print_r($calculation_addition_attribute);echo"</pre>";
                                            if($calculation_addition_attribute){
												
												
												$total_addition_premium = 0;
                                                
					for($i=0;$i<count($calculation_addition_attribute);$i++){ 

                        
                        
                        
                        ?>


                                            <tr>
                                               
                                                <td><?php echo $calculation_addition_attribute[$i]->suminsure_addition; ?></td>

                                                <td>
                                                   <?php echo $calculation_addition_attribute[$i]->annual_premium_addition; ?>
                                                </td>

                                                <td><?php echo $calculation_addition_attribute[$i]->premium_per_day_addition; ?></td>

                                                <td><?php echo $calculation_addition_attribute[$i]->count_addition; ?></td>

                                                <td><?php echo $calculation_addition_attribute[$i]->addition_premium_addition; ?></td>


                                                <td>
                                                    <a class="btn btn-danger" title="delete"
                                                        href="#" onclick="addition_deleteblog('<?php echo $calculation_addition_attribute[$i]->id; ?>');">
                                                        <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php 
											
												$total_addition_premium +=$calculation_addition_attribute[$i]->addition_premium_addition;
											
											?>
                                            <?php   } ?>
											
											<tr style="color: #000 !important;">


												
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												
												<td  class="thick-line text-center" style="background-color: #32CD32;border: 2px solid #32CD32;border-left: 2px solid #fff;">
													<strong>Total</strong></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;border-left: 2px solid #fff;border-right: 2px solid #fff;">
													<?php echo $total_addition_premium;?>
												</td>
												
												<td class="thick-line" style="background-color: #32CD32;"></td>
												
											</tr>
						 
						 
						 
						 <?php } else {

        					  echo 'No Endorsement Transaction Found';
        				  }
                        ?>
                                            </body>
                                    </table>

                                </div>



                            </form>
							
							
							
							
							<form action="<?php echo $base_url."endorsement_transaction/deletes";?>" method="post" enctype="multipart/form-data" id="form">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                <div class="table-responsive">
								
									<h2>Deletion Premium</h2>

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>
                                                <th>Sum Insured</th>
                                                <th>Annual Premium</th>
                                                <th>Premium Per Day</th>
                                                <th>Count</th>
                                                <th>Addition Premium</th>
                                                
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            //echo "<pre>";print_r($result);echo"</pre>";
                                            if($calculation_deletion_attribute){
												
												
												$total_deletion_premium = 0;
                                                
					for($i=0;$i<count($calculation_deletion_attribute);$i++){ 

                        
                        
                        
                        ?>


                                            <tr>
                                               
                                                <td><?php echo $calculation_deletion_attribute[$i]->suminsure_deletion; ?></td>

                                                <td>
                                                   <?php echo $calculation_deletion_attribute[$i]->annual_premium_deletion; ?>
                                                </td>

                                                <td><?php echo $calculation_deletion_attribute[$i]->premium_per_day_deletion; ?></td>

                                                <td><?php echo $calculation_deletion_attribute[$i]->count_deletion; ?></td>

                                                <td><?php echo $calculation_deletion_attribute[$i]->addition_premium_deletion; ?></td>


                                                <td>
                                                    <a class="btn btn-danger" title="delete"
                                                        href="#" onclick="deletion_deleteblog('<?php echo $calculation_deletion_attribute[$i]->id;?>');">
                                                        <i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php 
											
												$total_deletion_premium +=$calculation_deletion_attribute[$i]->addition_premium_deletion;
											
											?>
                                            <?php   } ?>
											
											<tr style="color: #000 !important;">


												
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;"></td>
												
												<td  class="thick-line text-center" style="background-color: #32CD32;border: 2px solid #32CD32;border-left: 2px solid #fff;">
													<strong>Total</strong></td>
												<td class="thick-line" style="background-color: #32CD32;border: 1px solid #32CD32;border-left: 2px solid #fff;border-right: 2px solid #fff;">
													<?php echo $total_deletion_premium;?>
												</td>
												
												<td class="thick-line" style="background-color: #32CD32;"></td>
												
											</tr>
						 
						 
						 
						 <?php } else {

        					  echo 'No Endorsement Transaction Found';
        				  }
                        ?>
                                            </body>
                                    </table>

                                </div>



                            </form>
							
							
							<form action="<?php echo $base_url."endorsement_transaction/update_rack_rate_calculation";?>" method="post" enctype="multipart/form-data" id="form_rack_rate_calculation">
							
								<input type="hidden" name="calc_id" id="calc_id" value="<?php echo $calculation_data->id; ?>">
								
								<input type="hidden" name="action" id="action" value="update_rack_cal">
							
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label for="total_additional_premium">Net Addition Premium</label>
											<input id="total_additional_premium" name="total_additional_premium" type="text" class="form-control"
												placeholder="Enter Net Addition Premium" value="<?php echo $calculation_data->total_additional_premium; ?>" readonly/>
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="total_deletion_premium">Net Deletion Premium</label>
											<input id="total_deletion_premium" name="total_additional_premium" type="text" class="form-control"
												placeholder="Enter Net Deletion Premium" value="<?php echo $calculation_data->total_deletion_premium; ?>" readonly/>
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="net_premium">Net Payable Premium</label>
											<input id="net_premium" name="net_premium" type="text" class="form-control"
												placeholder="Enter Net Payable Premium" value="<?php echo $calculation_data->net_premium; ?>" readonly/>
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label for="net_premium_with_gst">Premium Payable With GST</label>
											<input id="net_premium_with_gst" name="net_premium_with_gst" type="text" class="form-control"
												placeholder="Enter Premium Payable With GST" value="<?php echo $calculation_data->net_premium_with_gst; ?>" readonly/>
										</div>
									</div>
									
									<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="endersoment_title" style="width:100%; margin:15px 0 5px;">Endersoment Title</label>
                                        <input type="text" name="endersoment_title" id="endersoment_title" class="form-control" placeholder="Enter Endersoment Title" value="<?php echo $calculation_data->endersoment_title; ?>">
										
										<p class="form-error-text" id="endersoment_title_error" style="color: red;"></p>
										
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="endersoment_number" style="width:100%; margin:15px 0 5px;">Endersoment Number</label>
                                        <input type="text" name="endersoment_number" id="endersoment_number" class="form-control" placeholder="Enter Endersoment Number" value="<?php echo $calculation_data->endersoment_number; ?>">
										<p class="form-error-text" id="endersoment_number_error" style="color: red;"></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="endersoment_number" style="width:100%; margin:15px 0 5px;">Transaction Statement</label>
                                        <input type="text" name="transaction_statement" id="transaction_statement" class="form-control" placeholder="Enter Transaction Statement" value="<?php echo $calculation_data->transaction_statement; ?>">
										<p class="form-error-text" id="transaction_statement_error" style="color: red;"></p>
                                    </div>
                                </div>
								
								
								<div class="col-md-12">
                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="button" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        
                                    </div>
                                </div>
									
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




 

<?php include('include/footer.php')?>

 




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
        "bAutoWidth": false
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