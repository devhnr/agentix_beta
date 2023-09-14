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

                    <li class="crumb-active"><a href="javascript:void(0);">CD Statement Entry</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">CD Statement Entry</li>

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

				
				<?php if(in_array('14',$permission1)){ ?>
                <div class="col-md-12">
                    <a href="javascript:void('0');" onclick="deleteblog();" class="btn btn-danger pull-right"
                        style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>
                    <a href="<?php echo $base_url;?>cd_statement_entry/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add CD Statement Entry</a>
                </div>
                <div class="clearfix">&nbsp;</div>
				<?php } ?>
				
				
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>CD Statement Entry </span> </div>


                        <div class="panel-body">

                            <form action="<?php echo $base_url."cd_statement_entry/deletes";?>" method="post" enctype="multipart/form-data" id="form">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>
                                                <th>Select</th>
                                                <th>Corporate</th>
                                                <th>CD Number</th>
                                                <th>Date</th>
                                                <th>CD Account Name</th>
                                                <!-- <th>Set as Home</th> -->
												
												<?php if(in_array('14',$permission1)){ ?>
                                                <th>Edit</th>
												<?php } ?>
                                                <!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($result){

					for($i=0;$i<count($result);$i++){ 
                        //  echo "<pre>";print_r($corporate_data);echo "</pre>";exit;
                        $corporate_data = $this->admin->get_corp_data_ac_de($result[$i]->corporate_id);

                        // echo "<pre>";print_r($corporate_data);echo "</pre>";exit;
                        if($corporate_data->active_deactive == 0){
					
					
//echo "<pre>";print_r($result[$i]);echo"</pre>";
?>


                                            <tr>
                                                <td>
                                                    <input name="selected[]" id="selected[]" value="<?php echo $result[$i]->id; ?>" type="checkbox" class="minimal-red">
                                                </td>

                                                <td>
                                                   <?php echo $this->cd_statement_entry_model->get_corp_name($result[$i]->corporate_id); ?>
                                                </td>

                                                <td>
                                                    <?php echo $result[$i]->cd_number; ?>
                                                </td>

                                                <td style="width: 75px;">
                                                    <?php echo $result[$i]->date; ?>
                                                </td>

                                                <td>
                                                <?php echo $result[$i]->cd_account_name; ?>
                                                </td>

                                              
                                                
												<?php if(in_array('14',$permission1)){ ?>
                                                <td>
                                                    <a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."cd_statement_entry/edit/"; ?><?php echo $result[$i]->id;?>">
                                                        <i class="fa fa-pencil"></i></a>
                                                </td>
												
												<?php } ?>
                                            </tr>
                                            <?php } 
                         } } else {

        					  echo 'No CD Statement Entry Found';
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

function deleteblog() {

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
</script>