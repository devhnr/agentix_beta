<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <!-- Start: Content -->
	
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
    <section id="content_wrapper">
        <div id="topbar">


            <div class="row">
                <div class="col-md-12">

                <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);">Employee Activation / Verification</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-trail">Employee Activation / Verification</li>
                </ol>
                
               
            </div>
                </div>
		
                <div class="col-md-12 pull-right" style="margin-top: 20px">
                     <!-- <a href="<?php echo $front_base_url;?>upload/XLS_file/new_employee.csv" class="btn btn-alert pull-left">Download Template Format</a> -->
						<?php if(in_array('43',$permission1)){ ?>
                        <a href="<?php echo $base_url;?>employee_enrollment/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add New Enrollement</a>
						<?php } ?>
                </div>
            </div>


            

            
        </div>
		<?php if(in_array('43',$permission1)){ ?>
		<div class="row" >
                <div class="col-md-12">

                        <form action="<?php echo $base_url."home/employee_activation_verification";?>" method="post"
                                enctype="multipart/form-data" id="form">

                                <div class="col-md-3">
                              <div class="form-group">
                                 <label for="corporate_id" style="width:100%; margin:15px 0 5px;">Corporate</label>
                                 <select id="corporate_id" name="corporate_id"
                                    class="form-control" onChange="showpolicy(this.value)">
                                    <option value="">Select Corporate</option>
                                    <?php if ($all_corporate != '' && count($all_corporate) > 0) {
                                       foreach ($all_corporate as $corporate) {
                                           ?>
                                    <option value="<?php echo $corporate->id; ?>" <?php if($corporate_id == $corporate->id){echo "selected";}?>><?php echo $corporate->co_name; ?>
                                    </option>
                                    <?php } } ?>
                                 </select>
								 
								 <p class="form-error-text" id="corporate_id_error" style="color: red;"></p>
								 
                              </div>
                              </div>

                              <div class="col-md-3">
                              <div class="form-group">
                                 <label for="policy_id" style="width:100%; margin:15px 0 5px;">Policy Number</label>
								 <span id="show_policy_number">
                                 <select id="policy_id" name="policy_id"
                                    class="form-control" onChange="get_suminsurence(this.value)">
                                    <option value="">Select Policy No</option>
                                    <?php if ($all_policy != '' && count($all_policy) > 0) {
                                       foreach ($all_policy as $policy) {
                                           ?>
                                    <option value="<?php echo $policy->id; ?>" <?php if($policy_id == $policy->id){echo "selected";}?>><?php echo $policy->policy_no; ?>
                                    </option>
                                    <?php } } ?>
                                 </select>
								  <p class="form-error-text" id="policy_id_error" style="color: red;"></p>
								 </span>
                              </div>
							 </div>
							 
							 
							  <div class="col-md-3">
                              <div class="form-group">
                                 <label for="policy_id" style="width:100%; margin:15px 0 5px;">Suminsured</label>
								 <span id="suminsure">
                                 <select id="suminsure_id" name="suminsure_id"
                                    class="form-control">
                                    <option value="">Select Suminsured</option>
                                    <?php if ($all_suminsured != '' && count($all_suminsured) > 0) {
                                       foreach ($all_suminsured as $all_suminsured_data) {
                                           ?>
                                    <option value="<?php echo $all_suminsured_data->id; ?>"><?php echo $all_suminsured_data->sum_insured; ?>
                                    </option>
                                    <?php } } ?>
                                 </select>
								  <p class="form-error-text" id="suminsure_id_error" style="color: red;"></p>
								 </span>
                              </div>
							  </div>
							  
							  <div class="col-md-3">
                              <div class="form-group">
                                 <label for="policy_id" style="width:100%; margin:15px 0 5px;">Select File</label>
									<input type="file" name="file" id="file" class="form-control">
									 
                                     <a href="<?php echo $front_base_url;?>upload/XLS_file/new_employee.csv" class="">Download Template Format</a>
                                     <p class="form-error-text m-0" id="file_error" style="color: red;"></p>
								 </div>
							  </div>
							  <div class="col-sm-12">
                                <div class="admin-notes">
                                         <h5>Note:</h5>
                                         <ul class="">
                                             <li>The “relation” column for the employee should be mentioned as “Employee”.</li>
                                             <li>Sum Insured should match with the selected "Sum Insured" while uploading Excel Sheet.</li>
                                             <li>Date Format: dd-mm-yyyy.</li>                                            
                                         </ul>
                                     </div>
                                </div>
							  
							  <div class="col-md-3">
								
									<div class="form-group">
                                        <input id="test_validate" class="submit btn bg-purple" type="button" value="Upload"
                                            onclick="javascript:validate();return false;" />											
									</div>
							  </div>
								 

                        </form>
                </div>
            </div>
			<?php } ?>
            <?php


                if($result){

                    $total_verified_member = 0;
                    $total_member = 0;
                    $total_pending_member = 0;
                    foreach($result as $result_data){

                        $check_employee_verification = $this->corporate_dashboard_model->check_employee_verification($result_data->employee_id);

                        if($check_employee_verification != ''){
                            $total_verified_member++;
                        }else{

                            $total_pending_member++;
                        }

                        //echo "<pre>";print_r($check_employee_verification);echo"</pre>";
                        $total_member++;
                    }

                }
            ?>
			
			<div class="row" style="margin-top: 35px;">
				 <div class="col-lg-4">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Pending Member Count</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php echo $total_pending_member;?></h6>
                     </div>
                  </div>
               </div>
            </div>
			
				 <div class="col-lg-4">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Verified Member Count</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php echo $total_verified_member;?></h6>
                     </div>
                  </div>
               </div>
            </div>
			
				 <div class="col-lg-4">
               <div class="v-box-layout">
                  <div class="v-box">
                     <div class="box-label">
                        <h6>Total Member Count</h6>
                     </div>
                     <div class="box-content">
                        <h6><?php echo $total_member;?></h6>
                     </div>
                  </div>
               </div>
            </div>
			</div>
        <div id="content">

            <div class="row">

                <?php if($this->session->flashdata('L_strErrorMessage')) 
  { ?>
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b> </b> <?php echo $this->session->flashdata('L_strErrorMessage',5); ?>
                </div>
                <?php } 

  ?>

                <?php if($this->session->flashdata('flashError')!='') { ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-warning"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b> </b> <?php echo $this->session->flashdata('flashError',5); ?>
                </div>
                <?php }  ?>
				
				<?php if($this->session->flashdata('Error_msg_user')) { ?>
					  <div class="alert" id="message_succsess1_error" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;"></div>
				<?php } ?>

                <!-- <div class="col-md-12">
                

                    <a href="javascript:void('0');" onclick="deletecountry();" class="btn btn-danger pull-right"
                        style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>
                    <a href="<?php echo $base_url;?>city/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add City</a>
                            <a href="<?php echo $base_url;?>city/xlsuploadcity" class="btn btn-alert pull-right" style="margin-right:10px"><i class="fa fa-plus" ></i> Add Bulk City</a>

                            <a href="<?php echo $front_base_url;?>upload/XLS_file/city_template.csv" class="btn btn-alert pull-left"><i class="fa fa-plus"></i> Download XLS File</a>
                </div> -->
                <div class="clearfix">&nbsp;</div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>Employee Activation / Verification </span> </div>
                        <div class="panel-body">
                            <form action="<?php echo $base_url."city/deletes";?>" method="post"
                                enctype="multipart/form-data" id="form">
                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">

                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Si No</th>
                                                <th>Emp Id</th>
                                                <th>Emp Name</th>
                                                <!-- <th>Page URL</th> -->
                                                <th>Email Id</th>
												<th>Mobile Number</th>
												<th>Age</th>
												<th>Gender</th>
												<th>DOB</th>
												<th>Verified Status</th>
												<th>Verified Date</th>
												<th>Created At</th>
												<th>View Dependent</th>
                                                <!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                  if($result){

                    //echo "<pre>";print_r($result);echo"<pre>";
                    $k = 1;
					for($i=0;$i<count($result);$i++){

                        $check_employee_verification = $this->corporate_dashboard_model->check_employee_verification($result[$i]->employee_id);

                        //echo "<pre>";print_r($check_employee_verification);echo"<pre>";
                        //$state= $this->city_model->getState($result[$i]['state_id']); 
				?>
                                            <tr>
                                                <td><?php echo $k;?></td>
                                                <td><?php echo $result[$i]->employee_id;?></td>
                                                <td><?php echo $result[$i]->name_of_the_employee;?></td>
                                                <td><?php echo $result[$i]->email;?></td>
                                                <td><?php echo $result[$i]->mobile_no;?></td>
                                                <td><?php echo $result[$i]->age;?></td>
                                                <td><?php echo $result[$i]->gender;?></td>
                                                <td>
                                                    <?php

                                                        $dob = date("d-m-Y", strtotime($result[$i]->d_o_b));
                                                        echo $dob;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
													
													if(in_array('43',$permission1)){
														
														$readonly = "";
														
													}else{
														
														$readonly = "disabled";
													}
                                                        if($check_employee_verification != ''){ ?>
                                                            <button type="button" class="btn btn-success" <?php echo $readonly;?>>Verified</button>
                                                       <?php }else{ ?>
                                                        <button type="button" onclick="Pending_mail_sent('<?php echo $result[$i]->id;?>');" class="btn btn-warning" <?php echo $readonly;?>>Pending</button>
                                                       <?php }
                                                    ?>
                                                </td>

                                                <td>

                                                    <?php
                                                        if($check_employee_verification != ''){
                                                            $created_at_emp = date("d-m-Y h:i:s", strtotime($check_employee_verification->created_at));
                                                    echo $created_at_emp;
                                                        }else{
                                                            echo "";
                                                        }
                                                    ?>

                                                </td>

                                                <td>
                                                <?php

                                                    $created_at = date("d-m-Y h:i:s", strtotime($result[$i]->created_at));
                                                    echo $created_at;
                                                    ?>
                                                </td>
                                                

                                                <td>
                                                    <!-- <a class="btn bg-purple2" title="Edit"
                                                        href="#">Dependent</a> -->
                                                        <button type="button" class="btn bg-purple2" data-toggle="modal" data-target="#myModal_<?php echo $result[$i]->id;?>">Dependent</button>
                                                    </td>
                                            </tr>
                                            <?php

                                            $k++;
                  } 
                  } else {
					  echo 'No data Found';
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
	<?php } ?>
    <?php include('include/sidebar_right.php');?>
</div>
<!-- End #Main -->


<?php 

if($result){
    for($i=0;$i<count($result);$i++){

        $employee_atrribute = $this->corporate_dashboard_model->get_employee_atrribute($result[$i]->employee_id);

       
?>
<!-- Modal -->
<div class="modal fade" id="myModal_<?php echo $result[$i]->id;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Family Covered Details</h4>
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

<?php } }?>


<?php include('include/footer.php')?>

<?php if($this->session->flashdata('Error_msg_user') !=""){ ?>
<script>
$(document).ready(function() {
	$('#message_succsess1_error').html("<?php echo $this->session->flashdata('Error_msg_user');?>");
    $('#message_succsess1_error').show().delay(0).fadeIn('show');
    //$('#message_succsess1').show().delay(3000).fadeOut('show');
});
</script>

<?php } ?>


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
</script>

<script>
function deletecountry() {
    var checked = $("#form input:checked").length > 0;
    if (!checked) {
        alert("Please select at least one record to delete");
        return false;
    } else {
        var conf = confirm("Do you want to delete?");
        if (conf == true) {
            $('#form').submit();
            return true;
        } else {
            return false;
        }

    }
}

function showpolicy(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>home/show_policy_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                document.getElementById('show_policy_number').innerHTML = msg;

            }
        });
    }
	
	function get_suminsurence(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>home/get_policy_suminsurance';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                //$('#insurer').val(msg);
                //alert(msg)
                document.getElementById('suminsure').innerHTML = msg;
            }
        });
    }
	
function validate() {

    var corporate_id = $("#corporate_id").val();
    if (corporate_id == '') {
        $("#corporate_id_error").html("Please Select Corporate.");
        
		$("#corporate_id_error").html("Please Enter Endersoment Title");
        jQuery('#corporate_id_error').show().delay(0).fadeIn('show');
        jQuery('#corporate_id_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#corporate_id_error').offset().top - 150
        }, 1000);
        return false;
    }
	
	var policy_id = $("#policy_id").val();
    if (policy_id == '') {
        $("#policy_id_error").html("Please Select Policy Number.");
        
        jQuery('#policy_id_error').show().delay(0).fadeIn('show');
        jQuery('#policy_id_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#policy_id_error').offset().top - 150
        }, 1000);
        return false;
    }


    var suminsure_id = $("#suminsure_id").val();
    if (suminsure_id == '') {
        $("#suminsure_id_error").html("Please Select Sum Insured.");
        jQuery('#suminsure_id_error').show().delay(0).fadeIn('show');
        jQuery('#suminsure_id_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#suminsure_id_error').offset().top - 150
        }, 1000);
        return false;
    }
	
	var file = $("#file").val();
    if (file == '') {
        $("#file_error").html("Please Select File.");
        jQuery('#file_error').show().delay(0).fadeIn('show');
        jQuery('#file_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#file_error').offset().top - 150
        }, 1000);
        return false;
    }

     if (!(/\.(xlsx|xls|xlsm|csv)$/i).test(file)) {

        $("#file_error").html("Please upload valid excel file .xlsx, .xlsm, .xls, .csv only.");
        $("#validator").css("display", "block");
        $('html, body').animate({
        'scrollTop': $("#file_error").position().top
        });
        return false;

        }

	$('#form').submit();
	
}

function Pending_mail_sent(id){
   

    var conf = confirm("Do you want to Sent Mail Again ?");
    if (conf == true) {
        var base_url = '<?php echo $base_url. 'home/pending_user_mail_sent';?>';
        window.location = base_url + "/" + id;
    } else {
        return false;
    }

}
</script>