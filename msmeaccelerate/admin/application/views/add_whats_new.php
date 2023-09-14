<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);">Add What's New</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>whats_new/lists"> What's New</a></li>

                    <li class="crumb-trail">Add What's New</li>

                </ol>

            </div>

        </div>
        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Add What's New </span> </div>

                        <div class="panel-body">

                            <?php if($this->session->flashdata('L_strErrorMessage')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                            </div>
                            <?php }  ?>


                            <?php if($this->session->flashdata('flashError')!='') { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('flashError'); ?>
                            </div>
                            <?php }  ?>


                            <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> &nbsp; </b><span id="error_msg1"></span>
                            </div>


                            <div class="col-md-12">

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>whats_new/add"
                                    enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_whats_new">

                                    <div class="form-group">

                                        <label for="title">Title</label>
                                        <input id="title" name="title" type="text" class="form-control" placeholder="Enter Title" />
                                    </div>

                                     <div class="form-group">

                                        <label for="alt">Url</label>
                                        <input id="url" name="url" type="text" class="form-control" placeholder="Enter Url" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size :526px X 526px)</label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                    </div>

                                    

                                   <!--   <div class="form-group">

                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control" placeholder="Enter Description" /></textarea>
                                    </div> -->

                                    <div class="form-group">

                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />

                                        <a href="<?php echo $base_url;?>whats_new/lists" class="submit btn bg-purple pull-right"
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

<script type="text/javascript" src="<?php echo $base_url_views; ?>js/bootstrap-datepicker.js"></script> 

<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<script>
function validate() {
    var title = $("#title").val();
    if(title == '')
    {
    	$("#error_msg1").html("Please Enter Title.");
    	$("#validator").css("display","block");
    	return false;
    }
    var url = $("#url").val();
    if(url == ''){
    	$("#error_msg1").html("Please Enter URL.");
    	$("#validator").css("display","block");
    	return false;
    }

    //  var image = $("#image").val();
    // if(image == ''){
    //     $("#error_msg1").html("Please Enter Image.");
    //     $("#validator").css("display","block");
    //     return false;
    // }
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
<script src="<?php echo $base_url_views; ?>/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('description', {
    filebrowserBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>

<?php include('include/footer.php');?>
</body>
</html>