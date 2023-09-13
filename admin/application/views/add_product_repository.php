<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add Product Repository</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>product_repository/lists">Product Repository</a></li>
                    <li class="crumb-trail">Add a Product Repository</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Product Repository </span> </div>
                        <div class="panel-body">

                            <?php if($this->session->flashdata('L_strErrorMessage')){ ?>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>product_repository/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_product_repository">

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Select Policy
                                            <!--<span style="color:red"> *<span>-->
                                        </label>

                                        <select name="policy_id" id="policy_id" class="form-control" onchange="get_cat_id(this.value)">
                                            <option value="">Select Policy</option>
                                            <?php 
                                            //echo "<pre>";print_r($all_policy);
                                            foreach($all_policy as $all_policy_data){ ?>
                                                <option value="<?php echo $all_policy_data->id; ?>"><?php echo $all_policy_data->plan_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Select Document Type
                                            <!--<span style="color:red"> *<span>-->
                                        </label>

                                        <select name="document_type" id="document_type" class="form-control">
                                            <option value="">Select Document Type</option>
                                            <option value="1">Wording</option>
                                            <option value="2">Brochure</option>
                                            <!-- <option value="3">Both</option> -->
                                        </select>
                                    </div>
									
									

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Document</label>
                                        <input id="document_file" name="document_file" type="file" class="form-control" value="" />
                                    </div>
									
									<input type="hidden" name="cat_id" id="cat_id" value="" >

                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>product_repository/lists"
                                            class="submit btn bg-purple pull-right"
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

    var url = '<?php echo $base_url; ?>product_repository/check_data_exit';

    $.ajax({

        url : url,
        type : 'post',
        data : 'policy_id='+policy_id+ '&document_type='+document_type,

        success : function(msg){

            if(msg == 1){
                $("#error_msg1").html("This policy Data Already exit");
                $("#validator").css("display", "block");
                return false;
            }else{
                $('#form').submit();
            }
        }

    });
}

function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 45 || unicode > 57) //if not a number
            return false //disable key press
    }
}

function get_cat_id(policy_id){
	//alert(policy_id);
	
	 var url = '<?php echo $base_url; ?>product_repository/get_cat_data';

    $.ajax({

        url : url,
        type : 'post',
        data : 'policy_id='+policy_id,

        success : function(msg){

            if(msg != 0){
                $('#cat_id').val(msg);
            }
        }

    });
}
</script>