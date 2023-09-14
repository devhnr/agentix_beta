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
                    <li class="crumb-active"><a href="javascript:void(0);">City</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-trail">City</li>
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
				
				<?php if(in_array('9',$permission1)){ ?>

                <div class="col-md-12">
                

                    <a href="javascript:void('0');" onclick="deletecountry();" class="btn btn-danger pull-right"
                        style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>
                    <a href="<?php echo $base_url;?>city/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add City</a>
                            <a href="<?php echo $base_url;?>city/xlsuploadcity" class="btn btn-alert pull-right" style="margin-right:10px"><i class="fa fa-plus" ></i> Add Bulk City</a>

                            <a href="<?php echo $front_base_url;?>upload/XLS_file/city_template.csv" class="btn btn-alert pull-left">Download Template Format</a>
                </div>
                <div class="clearfix">&nbsp;</div>
				
				<?php } ?>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>City </span> </div>
                        <div class="panel-body">
                            <form action="<?php echo $base_url."city/deletes";?>" method="post"
                                enctype="multipart/form-data" id="form">
                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">

                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>State</th>
                                                <th>City Name</th>
                                                <!-- <th>Page URL</th> -->
												<?php if(in_array('9',$permission1)){ ?>
                                                <th>Edit</th>
												<?php } ?>
                                                <!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                  if($result){
                    
					for($i=0;$i<count($result);$i++){
                        $state= $this->city_model->getState($result[$i]['state_id']); 
				?>
                                            <tr>
                                                <td><input name="selected[]" id="selected[]"
                                                        value="<?php echo $result[$i]['id']; ?>" type="checkbox"
                                                        class="minimal-red"></td>
                                                <td><?php echo $state->name ?></td>
                                                <td><?php echo $result[$i]['name']; ?></td>
                                                <!-- <td><?php echo $result[$i]['page_url']; ?></td> -->
												
												<?php if(in_array('9',$permission1)){ ?>
                                                <td><a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."city/edit/"; ?><?php echo $result[$i]['id'];?>">
                                                        <i class="fa fa-pencil"></i></a></td>
												<?php } ?>
                                            </tr>
                                            <?php
                  } 
                  } else {
					  echo 'No City Found';
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
</script>