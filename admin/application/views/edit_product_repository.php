<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Product Repository </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>product_repository/lists">Product Repository</a></li>
                    <li class="crumb-trail">Edit Product Repository</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Product Repository</span> </div>
                        <div class="panel-body">

                            <?php if($this->session->flashdata('L_strErrorMessage')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                            </div>

                            <?php } ?>
                            <?php if($this->session->flashdata('flashError')!='') { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Error!</b> <?php echo $this->session->flashdata('flashError'); ?>
                            </div>
                            <?php }  ?>

                            <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Error &nbsp; </b><span id="error_msg1"></span>
                            </div>
                            <div class="col-md-12">

                                <form role="form" id="form" method="post"
                                    action="<?php echo $base_url;?>product_repository/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_product_repository">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Select Policy
                                            <!--<span style="color:red"> *<span>-->
                                        </label>

                                        <select name="policy_id" id="policy_id" class="form-control" disabled>
                                            <option value="">Select Policy</option>
                                            <?php 
                                            //echo "<pre>";print_r($all_policy);
                                            foreach($all_policy as $all_policy_data){ ?>
                                                <option value="<?php echo $all_policy_data->id; ?>" <?php if($all_policy_data->id == $policy_id){echo "selected";}?>><?php echo $all_policy_data->plan_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Select Document Type
                                            <!--<span style="color:red"> *<span>-->
                                        </label>

                                        <select name="document_type" id="document_type" class="form-control" disabled>
                                            <option value="">Select Document Type</option>
                                            <option value="1" <?php if($document_type == 1){echo "selected";}?>>Wording</option>
                                            <option value="2" <?php if($document_type == 2){echo "selected";}?>>Brochure</option>
                                            <!-- <option value="3" <?php if($document_type == 3){echo "selected";}?>>Both</option> -->
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="name">Download Brochure</label>

                                        <input id="document_file" name="document_file" type="file" class="form-control" />

                                        <a href="<?php echo $front_base_url; ?>upload/product_repository/<?php echo $document_file; ?>" target="_blank">View Document</a>
                                        

                                    </div>

                                    
                            </div>


                            <div class="form-group">
                                <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                    onclick="javascript:validate();return false;" />
                                <a href="<?php echo $base_url;?>product_repository/lists" class="submit btn bg-purple pull-right"
                                    style="margin-right: 10px;" />Cancel</a>
                            </div>

                            </form>

                        </div>
                    </div>


                </div>
            </div>
        </div>
</div>
</section>
<!-- End: Content -->


<?php include('include/sidebar_right.php');?>
</div>
<!-- End #Main -->
<?php include('include/footer.php')?>

<script>
function validate() {

     var policy_id = $("#policy_id").val();
    if (policy_id == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Select Policy.");
        $("#validator").css("display", "block");
        return false;
    }

    var document_type = $("#document_type").val();
    if (document_type == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Select Document Type");
        $("#validator").css("display", "block");
        return false;
    }

    var document_file = $("#document_file").val();
    if (document_file == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Select Document");
        $("#validator").css("display", "block");
        return false;
    }

    var file = $("#document_file")[0].files[0];
    var fileType = file.type;
    if (fileType != "application/pdf") {
        $("#error_msg1").html("Please Select Document Pdf Only");
        $("#validator").css("display", "block");
        return false;
    }


    $('#form').submit();
}

</script>