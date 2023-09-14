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

                    <li class="crumb-active"><a href="javascript:void(0);">Registered Employees</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">Registered Employees</li>

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
		<?php if(in_array('38',$permission1)){ ?>
                <div class="col-md-12">
                        <button name="delete_all" id="delete_all2" class="btn btn-danger pull-right" style="margin-left:10px"><i class="fa fa-trash-o"></i>
                          Delete </button>
                         <button type="button" class="btn btn-success pull-left" id="download_emp"> Download</button>

                </div>
                <div class="clearfix">&nbsp;</div>
		<?php } ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title">
                          <span class="glyphicon glyphicon-list-alt"></span> Registered Employees </span> </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th>Employee Name</th>
                                                <th>Email</th>
                                                <th>Mobile No</th>
                                                <th>Employeee Id</th>
                                                <th>Group Code</th>
                                                <th>Date</th>
                                                <!-- <th>Edit</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; if($emp){ foreach ($emp as $value) {?>
                                            <tr>
                                              <td><input name="checkbox_value" value="<?php echo base64_encode($value['id']); ?>" type="checkbox"
                                                      class="delete_checkbox minimal-red"></td>
                                                <td><?php echo $value['name']; ?></td>
                                                <td><?php echo $value['email']; ?></td>
                                                <td><?php echo $value['mobile']; ?></td>
                                                <td><?php echo $value['emp_id']; ?></td>
                                                <td><?php echo $value['group_code']; ?></td>
                                                <td><?php echo date("d-m-Y",strtotime($value['created_at'])); ?></td>
                                            </tr>
                                            <?php $i++;  } } else { echo 'No Records Found';}  ?>
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
                    url: "<?php echo base_url('registered_emp/delete');?>",
                    method: "POST",
                    data: {checkbox_value: checkbox_value},
                    success: function() {
                      var base_url = '<?php echo $base_url.'registered_emp/list'; ?>';
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
    
    $(document).on('click', '#download_emp', function(){
        $.ajax({
            url : '<?php echo base_url("registered_emp/download");?>',
            type : 'get',
            dataType: 'json',
            success: function(data){
                // console.log(data);
                var $a = $("<a>");
                $a.attr("href",data.file);
                $("body").append($a);
                $a.attr("download",data.filename);
                $a[0].click();
                $a.remove();
            }
        });
        return false;
    });
});
</script>
