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

                    <li class="crumb-active"><a href="javascript:void(0);">Employee Enrollment</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">Employee Enrollment</li>

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

                <?php if($this->session->flashdata('L_strErrorMessage')) { ?>
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage',5); ?>
                </div>
                <?php } ?>

                <?php if($this->session->flashdata('flashError')!='') { ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-warning"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Error!</b> <?php echo $this->session->flashdata('flashError',5); ?>
                </div>
                <?php }  ?>

				<?php if($this->session->flashdata('count_msg')) { ?>
					  <div class="alert" id="message_succsess1" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;"></div>
				<?php } ?>

				<?php if($this->session->flashdata('Error_msg')) { ?>
					  <div class="alert" id="message_succsess1_error" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;"></div>
				<?php } ?>
				
				<?php if($this->session->flashdata('Error_self')) { ?>
                      <div class="alert" id="message_succsess1_error_self" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;"></div>
                <?php } ?>



				<?php

					if($error_display != ''){

						foreach($error_display as $error_display_data){
							echo "<span style='color: red;font-size: 15px;'>".$error_display_data."</span><br>";
						}
					}

					if($add_count != ''){
						echo "<span style='color: red;font-size: 15px;'> Added Record : ".$add_count."</span><br>";
					}

					if($update_count != ''){
						echo "<span style='color: red;font-size: 15px;'>Updated Record :  ".$update_count."</span><br>";
					}
					if($delete_count != ''){
						echo "<span style='color: red;font-size: 15px;'>Deleted Record : ".$delete_count."</span><br>";
					}

				?>


				<?php if(in_array('27',$permission1)){ ?>

                <div class="col-md-12">

                    <a href="javascript:void('0');" onclick="deletecountry();" class="btn btn-danger pull-right" style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>

                    <a href="<?php echo $base_url;?>employee_enrollment/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add Employee Enrollment</a>

                    <!-- <a href="<?php echo $base_url;?>employee_enrollment/xlsuploadproduct" class="btn btn-alert pull-right" style="margin-left:10px;margin-right: 15px;">Update Employee</a>-->

                    <a href="<?php echo $front_base_url;?>upload/XLS_file/iSerrve_Employee Upload Field List.csv" class="btn btn-alert pull-left"> Download Template Format</a> 

                    <a href="<?php echo $base_url;?>enrollment_api/add" class="btn btn-alert pull-right" style="margin-left:10px;margin-right: 10px;"><i class="fa fa-plus" ></i> Api Employee Enrollment</a>
                </div>

                <div class="clearfix">&nbsp;</div>
				
				<?php } ?>



            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>Employee Enrollment Listing </span> </div>

                        <div class="panel-body">

                            <form action="<?php echo $base_url."employee_enrollment/deletes";?>" method="post"
                                enctype="multipart/form-data" id="form">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">



                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Insurer</th>
                                                <th>Corporate</th>
                                                <th>Product Name</th>
                                                <th>Policy Number</th>
                                                <th>Sum Insured</th>


                                               <!--  <th>Image</th>
                                                <th>Set As Home Page</th> -->
                                                <!-- <th>Set Order</th> -->
                                                <!-- <th>Edit</th> -->
                                                <th>Detail</th>
                                            </tr>

                                        </thead>



                                        <tbody>

                                            <?php

                  if($result){

					for($i=0;$i<count($result);$i++){

                        $corporate_data = $this->admin->get_corp_data_ac_de($result[$i]->corporate_id);
						
						$policy_data = $this->admin->get_policy_data($result[$i]->policy_no);

                        // echo "<pre>";print_r($corporate_data);echo "</pre>";exit;
                        if($corporate_data->active_deactive == 0 && $policy_data->policy_end_date >= date('Y-m-d')){

				?>

                                            <tr>

                                                <td><input name="selected[]" id="selected[]"
                                                        value="<?php echo $result[$i]->id; ?>" type="checkbox"
                                                        class="minimal-red"></td>


                                               <td><?php echo $result[$i]->insurer; ?></td>

                                               <td><?php echo $this->employee_enrollment_model->get_corporate_name($result[$i]->corporate_id); ?></td>

                                               <!-- <td><?php //echo $this->employee_enrollment_model->get_product_name($result[$i]->product_name); ?></td> -->

                                               <td><?php echo $result[$i]->product_name; ?></td>

                                               <td><?php echo $this->employee_enrollment_model->get_policy_no($result[$i]->policy_no); ?></td>

                                               <td><?php
                                                    $sum_insured = $this->employee_enrollment_model->get_sum_insured_name($result[$i]->sum_insured);
                                                    if(!empty($sum_insured )){  echo number_format($sum_insured); }else{ echo 'Api';} 
                                                    ?>
                                              </td>

                                                <!-- <td><?php echo $result[$i]->sum_insured; ?></td> -->


                                                <!-- <td><?php echo $result[$i]->name; ?></td> -->

                                              <!--   <td><img src="<?php echo $front_base_url.'/upload/sum_insured_home/large/'.$result[$i]->home_image;?>" width="50" height="50" /></td> -->

                                             <!--    <td>

                                                    <input type="checkbox" id="set_home" name="set_home" value="1"
                                                        onclick="featured_product('<?php echo $result[$i]->id; ?>',this);"
                                                        <?php if($result[$i]->set_home == '1') { echo "checked"; } ?>>

                                                </td> -->





                                                <!-- <td class="left"><input type="text" value="<?php echo $result[$i]->set_order; ?>" onblur="updateorder(this.value, '<?php echo $result[$i]->id; ?>');" /></td> -->



                                                <!-- <td><a class="btn bg-purple2" title="Edit" href="<?php echo $base_url."employee_enrollment/edit/"; ?><?php echo $result[$i]->id; ?>"><i class="fa fa-pencil"></i></a></td> -->

                                                <td><a class="btn bg-purple2" title="Detail" href="<?php echo $base_url."employee_enrollment/list1/"; ?><?php echo $result[$i]->id; ?>">Detail</a></td>





                                            </tr>

                                            <?php

                 } } } else {

					  echo 'No Employee Enrollment Found';

				  }

                ?>



                                        </tbody>

                                    </table>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>

            </div>





        </div>
		
		<?php } ?>

    </section>



    <?php include('include/sidebar_right.php');?>

</div>

<!-- End #Main -->

<?php include('include/footer.php')?>


<!-- Modal -->
  <div class="modal fade" id="myModal_employee_enrollment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>-->
        <div class="modal-body" style="text-align:center;">
		
		
		<div style="text-align:left">
		
		<?php if($this->session->flashdata('count_msg')) { ?>
					  <div class="alert" id="message_succsess1_popup" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;padding-bottom: 0;
    margin-bottom: 0;"></div>
				<?php } ?>

				<?php if($this->session->flashdata('Error_msg')) { ?>
					  <div class="alert" id="message_succsess1_error_popup" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;margin-bottom: 0;"></div>
				<?php } ?>
				
				<?php if($this->session->flashdata('Error_self')) { ?>
                      <div class="alert" id="message_succsess1_error_self_popup" style="display: none;color: #C70039;font-size: 14px;line-height: 20px;padding-top: 0;"></div>
                <?php } ?>
				
				<?php

					if($error_display != ''){

						foreach($error_display as $error_display_data){
							echo "<span style='color: red;font-size: 15px;'>".$error_display_data."</span><br>";
						}
					}

					if($add_count != ''){
						echo "<span style='color: red;font-size: 15px;'> Added Record : ".$add_count."</span><br>";
					}

					if($update_count != ''){
						echo "<span style='color: red;font-size: 15px;'>Updated Record :  ".$update_count."</span><br>";
					}
					if($delete_count != ''){
						echo "<span style='color: red;font-size: 15px;'>Deleted Record : ".$delete_count."</span><br>";
					}

				?>
				</div>
            <span class="model_success_span"><i class="fa fa-check" aria-hidden="true"></i></span>
            <p class="model_success_p1">Employee Enrollment Create Successfully</p>
            <p class="model_success_p2" style="
    margin-bottom: 5% !important;
">Please Click On Next Button TO Create Premium Update</p>
            <button type="button" class="btn btn-default" data-dismiss="modal">Stay Here</button>
            <a href="<?php echo $base_url;?>update_premium/add/" class="btn btn-default">Next</a>
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>


<?php if($this->session->flashdata('Error_msg') !=""){ ?>
<script>
$(document).ready(function() {
	$('#message_succsess1_error').html("<?php echo $this->session->flashdata('Error_msg');?>");
    $('#message_succsess1_error').show().delay(0).fadeIn('show');
	
	$('#message_succsess1_error_popup').html("<?php echo $this->session->flashdata('Error_msg');?>");
    $('#message_succsess1_error_popup').show().delay(0).fadeIn('show');
    //$('#message_succsess1').show().delay(3000).fadeOut('show');
});
</script>

<?php } ?>


<?php if($this->session->flashdata('Error_self') !=""){ ?>
<script>
$(document).ready(function() {
	$('#message_succsess1_error_self').html("<?php echo $this->session->flashdata('Error_self');?>");
    $('#message_succsess1_error_self').show().delay(0).fadeIn('show');
	
	$('#message_succsess1_error_self_popup').html("<?php echo $this->session->flashdata('Error_self');?>");
    $('#message_succsess1_error_self_popup').show().delay(0).fadeIn('show');
	
	
    //$('#message_succsess1').show().delay(3000).fadeOut('show');
});
</script>

<?php } ?>



<?php if($this->session->flashdata('count_msg') !=""){ ?>
<script>
$(document).ready(function() {
	$('#message_succsess1').html("<?php echo $this->session->flashdata('count_msg');?>");
	$('#message_succsess1').show().delay(0).fadeIn('show');
	
	$('#message_succsess1_popup').html("<?php echo $this->session->flashdata('count_msg');?>");
    $('#message_succsess1_popup').show().delay(0).fadeIn('show');
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
function deletecountry() {

    var checked = $("#form input:checked").length > 0;

    if (!checked)

    {

        alert("Please select at least one record to delete");

        return false;

    } else

    {

        var conf = confirm("Do you want to delete?");

        if (conf == true) {

            $('#form').submit();

            return true;

        } else {

            return false;

        }



    }



}
</script>

<script type="text/javascript">
$(document).ready(function($) {

    $('#reset').click(function() {

        var base_url = '<?php echo $base_url.'policy_features/lists'; ?>';

        window.location = base_url;

    });



    $("#sbutton").click(function() {

        var countryname = $("#countryname").val();



        if (countryname == '')

        {

            alert("Please Enter atleast one search condition.");

            return false;

        } else

        {

            return true;

        }

    });



    $.ajax({

        url: '<?php echo $base_url; ?>policy_features/ajaxlist_country',

        type: 'POST',

        data: '',

        success: function(msg)

        {

            //alert(msg);

            var c = msg.split(",");

            var availableTags = [msg];

            $("#countryname").autocomplete({

                source: c

            });

        }





    });

});
</script>

<script>
function approve(url, is_active) {

    if (is_active == '1') {

        var t = confirm('Are you sure you want to Active ?');

    } else

    {

        var t = confirm('Are you sure you want to Deactive ?');

    }



    if (t) {

        window.location.href = url + "/" + is_active;

    } else {

        return false;

    }

}
</script>





<script>
function featured_product(id, value)



{



    if (value.checked)

    {

        var base_url = '<?php echo $base_url. 'policy_features/featured_product';?>';

        window.location = base_url + "/" + id + "/1";

    } else

    {



        var base_url = '<?php echo $base_url. 'policy_features/featured_product';?>';

        window.location = base_url + "/" + id + "/0";

    }



}
</script>



<script>
function updateorder(val, id) {

    var t = confirm('Are you sure you want to Set order of Policy Features');

    if (t) {

        window.location.href = '<?php echo $base_url;?>policy_features/updateorder/' + id + '/' + val;

    } else {

        return false;

    }

}
</script>

<?php 
//if($this->session->userdata('product_type_name_session') != 'GPA' && $this->session->userdata('product_type_name_session') != 'GTL' ) {
if($this->session->flashdata('L_strErrorMessage') == 'Employee Enrollment Added Successfully') { ?>
    <script>
        $("#myModal_employee_enrollment").modal('show');
    </script>
<?php } //} ?>