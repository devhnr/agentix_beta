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

                    <li class="crumb-active"><a href="javascript:void(0);">Endorsement Rack Rates</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">Endorsement Rack Rates</li>

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

	
				<?php if(in_array('12',$permission1)){ ?>

                <div class="col-md-12">

                    <a href="javascript:void('0');" onclick="deletecountry();" class="btn btn-danger pull-right"
                        style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>

                    <a href="<?php echo $base_url;?>endorsement_rack_rates/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add Endorsement Rack Rates</a>

                </div>

                <div class="clearfix">&nbsp;</div>
				
				<?php } ?>



            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>Endorsement Rack Rates Listing </span> </div>

                        <div class="panel-body">

                            <form action="<?php echo $base_url."endorsement_rack_rates/deletes";?>" method="post"
                                enctype="multipart/form-data" id="form">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">



                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                
                                                <th>Corporate</th>
                                                
                                                <th>Policy Number</th>
                                                <th>Sum Insured</th>
                                                <th>Endorsement Type</th>

                                               <!--  <th>Image</th>
                                                <th>Set As Home Page</th> -->
                                                <!-- <th>Set Order</th> -->
												
												<?php if(in_array('12',$permission1)){ ?>
                                                <th>Edit</th>
												<?php } ?>
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


                                                

                                               <td><?php echo $this->endorsement_rack_rates_model->get_corporate_name($result[$i]->corporate_id); ?></td>

                                             

                                               <td><?php echo $this->endorsement_rack_rates_model->get_policy_no($result[$i]->policy_no); ?></td>

                                               <td><?php echo number_format($this->endorsement_rack_rates_model->get_sum_insured_name($result[$i]->sum_insured)); ?></td>

                                                <td>
                                                    <?php 
                                                        if($result[$i]->endorsement_type == 'Family Wise'){
                                                            echo "Family Wise";
                                                        }

                                                        if($result[$i]->endorsement_type == 'Per Life Wise'){
                                                            echo "Per Life Wise";
                                                        }

                                                        if($result[$i]->endorsement_type == 'GPA'){
                                                            echo "GPA";
                                                        }

                                                        if($result[$i]->endorsement_type == 'GTL'){
                                                            echo "GTL";
                                                        }
                                                    ?>
                                                </td>


                                                <!-- <td><?php echo $result[$i]->name; ?></td> -->

                                              <!--   <td><img src="<?php echo $front_base_url.'/upload/sum_insured_home/large/'.$result[$i]->home_image;?>" width="50" height="50" /></td> -->

                                             <!--    <td>

                                                    <input type="checkbox" id="set_home" name="set_home" value="1"
                                                        onclick="featured_product('<?php echo $result[$i]->id; ?>',this);"
                                                        <?php if($result[$i]->set_home == '1') { echo "checked"; } ?>>

                                                </td> -->





                                                <!-- <td class="left"><input type="text" value="<?php echo $result[$i]->set_order; ?>" onblur="updateorder(this.value, '<?php echo $result[$i]->id; ?>');" /></td> -->


												<?php if(in_array('12',$permission1)){ ?>
                                                <td><a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."endorsement_rack_rates/edit/"; ?><?php echo $result[$i]->id; ?>">

                                                        <i class="fa fa-pencil"></i></a></td>
												<?php } ?>





                                            </tr>

                                            <?php

                }  } } else {

					  echo 'No Endorsement Rack Rates Found';

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

        var base_url = '<?php echo $base_url.'endorsement_rack_rates/lists'; ?>';

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

        url: '<?php echo $base_url; ?>endorsement_rack_rates/ajaxlist_country',

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

        var base_url = '<?php echo $base_url. 'endorsement_rack_rates/featured_product';?>';

        window.location = base_url + "/" + id + "/1";

    } else

    {



        var base_url = '<?php echo $base_url. 'endorsement_rack_rates/featured_product';?>';

        window.location = base_url + "/" + id + "/0";

    }



}
</script>



<script>
function updateorder(val, id) {

    var t = confirm('Are you sure you want to Set order of Endorsement Rack Rates');

    if (t) {

        window.location.href = '<?php echo $base_url;?>endorsement_rack_rates/updateorder/' + id + '/' + val;

    } else {

        return false;

    }

}
</script>