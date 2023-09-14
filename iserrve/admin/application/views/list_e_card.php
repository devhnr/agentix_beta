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

                    <li class="crumb-active"><a href="javascript:void(0);">E-Card</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">E-Card</li>

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
				
				<?php if(in_array('30',$permission1)){ ?>

                <div class="col-md-12">
                        <button name="delete_all" id="delete_all2" class="btn btn-danger pull-right" style="margin-left:10px"><i class="fa fa-trash-o"></i>
                          Delete </button>

                    

                    <a href="<?php echo $base_url;?>ecards/zip_upload/" class="btn btn-alert pull-right"><i class="fa fa-plus"></i> Zip E-Card Upload</a>

                    <a href="<?php echo $base_url;?>ecards/add/" class="btn btn-alert pull-right"><i class="fa fa-plus"></i> Add E-Card Upload APi</a>
                </div>
                <div class="clearfix">&nbsp;</div>
				<?php } ?>
				
				
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title">
                          <span class="glyphicon glyphicon-list-alt"></span> E-Card Listing </span> </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Employee Id</th>
                                                <th>Employee Name</th>
                                                <th>Corporate</th>
                                                <th>Product Name</th>
                                                <th>Policy Number</th>
                                                <th>Card</th>
                                                <th>Date</th>
                                                <!-- <th>Edit</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; if($e_cards){ 
                                                // echo "<pre>";print_r($e_cards);echo "</pre>"; 
                                                foreach ($e_cards as $value) {
                                                $corporate_data = $this->admin->get_corp_data_ac_de($value['corporate_id']);
												
												$policy_data = $this->admin->get_policy_data($value['policy_id']);

                                                //echo "<pre>";print_r($value);echo "</pre>";
                                                if($corporate_data->active_deactive == 0 && $policy_data->policy_end_date >= date('Y-m-d')){?>
                                            <tr>
                                              <td><input name="checkbox_value" value="<?php echo base64_encode($value['id']); ?>" type="checkbox"
                                                      class="delete_checkbox minimal-red"></td>
                                                <td><?php echo $value['employee_id']; ?></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['co_name']; ?></td>
                                                <td><?php echo $value['product_name']; ?></td>
                                                <td><?php echo $value['policy_no']; ?></td>
                                                <td>
													<?php if($value['is_upload_from'] == 0){?>
													<a href="<?php echo base_url().'ecards/download_card/'.$value['pdf_file'].'/'.$value['policy_no']; ?>"
                                                        ><img src="<?php echo $this->config->item('front_base_url').'upload/download.png'?>" width="30" height="30"/></a>
                                                    <?php }else{ ?>

                                                        <a target="_blank" href="<?php echo $value['pdf_file'] ?>"
                                                        ><img src="<?php echo $this->config->item('front_base_url').'upload/download.png'?>" width="30" height="30"/></a>
                                                    
                                                    <?php } ?>
												</td>
                                                <td><?php echo date("d-m-Y",strtotime($value['created_at'])); ?></td>
                                            </tr>
                                            <?php $i++;   } } } else { echo 'No Records Found';}  ?>
                                        </tbody>
                                    </table>
                                </div>
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
  <div class="modal fade" id="myModal_e_card" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>-->
        <div class="modal-body" style="text-align:center;">
            <span class="model_success_span"><i class="fa fa-check" aria-hidden="true"></i></span>
            <p class="model_success_p1">Ecards Create Successfully</p>
            <p class="model_success_p2">Please Click On Next Button TO Create Cashless Hospital</p>
            <button type="button" class="btn btn-default" data-dismiss="modal">Stay Here</button>
            <a href="<?php echo $base_url;?>cashless_hospital/add/" class="btn btn-default">Next</a>
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>

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

    $('#delete_all2').click(function() {
        var checkbox = $('.delete_checkbox:checked');
        if (checkbox.length > 0) {
            var checkbox_value = [];
            $(checkbox).each(function() {
                checkbox_value.push($(this).val());
            });

            var conf = confirm("Do you want to delete?");

            if (conf == true) {
                $.ajax({
                    url: "<?php echo base_url('ecards/delete');?>",
                    method: "POST",
                    data: {checkbox_value: checkbox_value},
                    success: function() {
                      var base_url = '<?php echo $base_url.'ecards/list'; ?>';
                      window.location = base_url;
                    }

                })

            } else {
                return false;
            }
        } else {
            alert("Please select at least one record to delete");
            return false;
        }
    });
});
</script>

<?php 
if($this->session->userdata('product_type_name_session') != 'GPA' && $this->session->userdata('product_type_name_session') != 'GTL' ) {
if($this->session->flashdata('L_strErrorMessage') == 'E-Card Uploaded Successfully') { ?>
    <script>
        $("#myModal_e_card").modal('show');
    </script>
<?php } }?>
