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

                    <li class="crumb-active"><a href="javascript:void(0);">What's New</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-trail">What's New</li>

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


                <div class="col-md-12">
                    <a href="javascript:void('0');" onclick="deleteraghnall();" class="btn btn-danger pull-right"
                        style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>
                    <a href="<?php echo $base_url;?>whats_new/add/" class="btn btn-alert pull-right"><i
                            class="fa fa-plus"></i> Add What's New</a>
                </div>
                <div class="clearfix">&nbsp;</div>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-list-alt"></span>What's New</span> </div>


                        <div class="panel-body">

                            <form action="<?php echo $base_url."whats_new/deletes";?>" method="post" enctype="multipart/form-data" id="form">

                                <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>
                                                <th>Select</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                               <!--  <th>Description</th> -->
                                                <th>Set Order</th>
                                                <th>Edit</th>
                                                <!-- <th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($result){

					       for($i=0;$i<count($result);$i++){ ?>


                                            <tr>
                                                <td>
                                            <input type="checkbox"  name="selected[]" id="selected[]" value="<?php echo $result[$i]['id']; ?>" class="minimal-red"></td>

                                                <td><?php echo $result[$i]['title']; ?></td>
                                                <td>

                                                    <?php if($result[$i]['image'] !='') { ?>

                                                    <img src="<?php echo $front_base_url; ?>upload/whats_new/medium/<?php echo $result[$i]['image']; ?>"

                                                        height="50" width="50">

                                                    <?php } else { ?>
                                                    -
                                                    <?php } ?>
                                                </td>
                                                <td class="left"><input type="text"
                                                        value="<?php echo $result[$i]['set_order']; ?>"
                                                        onblur="updateorder(this.value, '<?php echo $result[$i]['id']; ?>');" />
                                                </td>

                                                <td><a class="btn bg-purple2" title="Edit"
                                                        href="<?php echo $base_url."whats_new/edit/"; ?><?php echo $result[$i]['id'];?>">
                                                        <i class="fa fa-pencil"></i></a></td>
                                            </tr>
                                            <?php } 
                  } else {

					  echo 'No Whats New Found';
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
        "bAutoWidth": false
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
});
</script>

<script>
 function updateorder(val,id){
            var t = confirm('Are you sure you want to Set order of Whats New');
            if(t){
                window.location.href='<?php echo $base_url;?>whats_new/updateorder/'+id+'/'+val;
            }else {
                return false;
            }
        }
 </script>

<script>

function deleteraghnall() {

    
    var checked = $("#form input:checked").length > 0;
    //alert(checked);
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