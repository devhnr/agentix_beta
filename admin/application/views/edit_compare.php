<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Compare </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>compare/lists">Compare</a></li>
                    <li class="crumb-trail">Edit Compare</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Compare</span> </div>
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
                                    action="<?php echo $base_url;?>compare/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_compare">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Compare Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Compare Name" value="<?php echo $name; ?>" />
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="name"> Page url </label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter  Page url" value="<?php echo $page_url;?>" />
                                    </div>
									<div class="form-group">
									  <label style="width:100%; margin:15px 0 5px;" for="home_image">Home Image (Size : 475px X 705px ) </label>
									  <input id="home_image" name="home_image" type="file" class="form-control" value=""/>
									  <img src="<?php echo $front_base_url; ?>upload/category_home/large/<?php echo $home_image; ?>" height="50" width="50">
									</div>
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="image">Banner Image (Size :
                                            1350px X 450px ) </label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url; ?>upload/category_banner/large/<?php echo $image; ?>"
                                            height="50" width="50">
                                    </div> -->
									
									<!--  <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input id="meta_title" name="meta_title" value="<?php echo $meta_title; ?>"
                                            type="text" class="form-control" placeholder="Enter Meta Title" />
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keywords</label>
                                        <input id="meta_keyword" name="meta_keyword"
                                            value="<?php echo $meta_keyword; ?>" type="text" class="form-control"
                                            placeholder="Enter Meta Keywords" />
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_desc">Meta Description</label>
                                        <textarea id="meta_desc" name="meta_desc" type="text" class="form-control"
                                            placeholder="Enter Meta Description"><?php echo $meta_desc; ?></textarea>
                                    </div> -->
                            </div>


                            <div class="form-group">
                                <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                    onclick="javascript:validate();return false;" />
                                <a href="<?php echo $base_url;?>compare/lists" class="submit btn bg-purple pull-right"
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
$(function() {

    $("#name").keyup(function() {

        var Text = $(this).val();

        Text = Text.toLowerCase();

        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');

        $("#page_url").val(Text);

    });

});
</script>
<script>
function validate() {

    var name = $("#name").val();
    if (name == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Enter Compare Name.");
        $("#validator").css("display", "block");
        return false;
    }

    var page_url = $("#page_url").val();
    if (page_url == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Enter Page URL.");
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