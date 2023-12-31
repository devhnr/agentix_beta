<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add New Products</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>new_products/lists">New Products</a></li>
                    <li class="crumb-trail">Add a New Products</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add New Products </span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>new_products/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_new_products">

                                    <div class="form-group">
                                    <label for="blog_cate_id">Company Name</label>
                                        <span id="prod1">
                                        <select id="company_id" name="company_id"  class="form-control">
                                            <option value="">Select Company Name</option>
                                            <?php  if($all_company_name !='' && count($all_company_name) > 0){ 
                                            foreach($all_company_name as $compare_name){ ?>
                                            <option value="<?php echo $compare_name->id; ?>"><?php echo $compare_name->name; ?></option>      
                                            <?php } }  ?>             
                                            </select>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Product Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Product Name" value="" />
                                    </div>
									
									<div class="form-group">

                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">Description</label>

                                        <textarea type="text" id="description" name="description" class="form-control" placeholder="Enter Description"></textarea>

                                </div>
								
								<div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Link
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="url" name="url" type="text" class="form-control"
                                            placeholder="Enter Link" value="" />
                                    </div>

                                  <!--   <div class="form-group">
                                        <label for="page_url">Page Url</label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Page Url" value="" />
                                    </div> -->
									
									
									<!-- <div class="form-group">
											  <label style="width:100%; margin:15px 0 5px;" for="home_image">Image (Size : 475px X 705px ) </label>
											  <input id="home_image" name="home_image" type="file" class="form-control" value=""/>
									</div>
									

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="image">Banner Image (Size :1350px X 450px ) </label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                    </div> -->
									<!-- <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input id="meta_title" name="meta_title" type="text" class="form-control"
                                            placeholder="Enter Meta Title" />
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keywords</label>
                                        <input id="meta_keyword" name="meta_keyword" type="text" class="form-control"
                                            placeholder="Enter Meta Keywords" />
                                    </div>


                                    <div class="form-group">
                                        <label for="meta_desc">Meta Description</label>
                                        <textarea id="meta_desc" name="meta_desc" type="text" class="form-control"
                                            placeholder="Enter Meta Description"></textarea>
                                    </div> -->

                                    

                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>new_products/lists"
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

<script type="text/javascript" src="<?php echo $base_url_views; ?>ckeditor/ckeditor.js"></script>
<script>

jQuery(document).ready(function() {

    "use strict";

    Core.init();

    Ajax.init();

    CKEDITOR.replace('description', {});

    CKEDITOR.disableAutoInline = false;

});

function validate() {

    var company_id = $("#company_id").val();
    if (company_id == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Select Company Name.");
        $("#validator").css("display", "block");
        return false;
    }

    var name = $("#name").val();
    if (name == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Enter Product Name.");
        $("#validator").css("display", "block");
        return false;
    }

   

    $('#form').submit();
}

function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 45 || unicode > 57) //if not a number
            return false //disable key press
    }
}
</script>