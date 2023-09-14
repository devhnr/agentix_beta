<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);">Add CD Statement Entry</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>cd_statement_entry/lists">CD Statement Entry</a></li>

                    <li class="crumb-trail">Add CD Statement Entry</li>

                </ol>

            </div>

        </div>
        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Add CD Statement Entry </span> </div>

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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>cd_statement_entry/add"
                                    enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_cd_statement_entry">

                                    <!-- <div class="col-md-12"> -->
                                        <div class="form-group">
                                            <label for="corporate_id" style="width:100%; margin:15px 0 5px;">Corporate <span class="mandatory_field">*</span></label>
                                            <select id="corporate_id" name="corporate_id"
                                                class="form-control" onChange="showpolicy(this.value)">
                                                <option value="">Select Corporate</option>
                                                <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                    foreach ($allcorporate as $corporate) {
                                                        ?>
                                                <option value="<?php echo $corporate->id; ?>"><?php echo $corporate->co_name; ?>
                                                </option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    <!-- </div> -->

                                    <div class="form-group">
                                        <label for="cd_number">CD Number <span class="mandatory_field">*</span></label>
                                        <input id="cd_number" name="cd_number" type="text" class="form-control" placeholder="Enter CD Number" />
                                    </div>


                                    <div class="form-group">
                                        <label>Entry Date <span class="mandatory_field">*</span></label>
                                        <input type="date" id="startdate" name="date" class="form-control" placeholder="Date">
                                    </div>

                                    <div class="form-group">
                                        <label for="cd_account_name">CD Account Name <span class="mandatory_field">*</span></label>
                                        <input id="cd_account_name" name="cd_account_name" type="text" class="form-control" placeholder="Enter CD Number" />
                                    </div>

                                    <div class="form-group">
                                        <label for="particular">Particular <span class="mandatory_field">*</span></label>
                                        <textarea id="particular" name="particular" type="text" class="form-control"
                                            placeholder="Enter Short Particular" value="" /></textarea>
                                    </div>                                     

                                   <!-- <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size :415px X 310px)</label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                    </div> -->
                                    
                                    <!-- <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="description">Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control"
                                            placeholder="Enter Description" value="" /></textarea>
                                    </div> -->

                                    

                                    <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="metakeywords">Meta Keywords </label>
                                            <input id="metakeywords" name="metakeywords" type="text" class="form-control" value=""  placeholder="Meta Keywords"/>
                                            <span id="metakeywordserror" class="valierror"></span>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="metadescription">Meta Description</label>
                                            <textarea id="metadescription" name="metadescription" class="form-control"
                                                placeholder="Meta Description"></textarea>
                                        </div>
                                    </div> -->
                                     

                                  

                                    <div class="form-group">

                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />

                                        <a href="<?php echo $base_url;?>cd_statement_entry/lists" class="submit btn bg-purple pull-right"
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
    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#page_url").val(Text);
    });
});
</script>

<script type="text/javascript" src="<?php echo $base_url_views; ?>js/bootstrap-datepicker.js"></script> 

<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<script>
function validate() {
    
    var corporate_id = $("#corporate_id").val();
    if(corporate_id == ''){
        $("#error_msg1").html("Please Select Corporate Name.");
        $("#validator").css("display","block");
        return false;
    }

    var cd_number = $("#cd_number").val();
    if(cd_number == ''){
        $("#error_msg1").html("Please Enter CD Number.");
        $("#validator").css("display","block");
        return false;
    }

    var startdate = $("#startdate").val();
    if(startdate == ''){
        $("#error_msg1").html("Please Select Entry Date.");
        $("#validator").css("display","block");
        return false;
    }

    

    var cd_account_name = $("#cd_account_name").val();
    if(cd_account_name == ''){
        $("#error_msg1").html("Please Enter CD Account Name.");
        $("#validator").css("display","block");
        return false;
    }

    var particular = $("#particular").val();
    if(particular == ''){
        $("#error_msg1").html("Please Enter Particular.");
        $("#validator").css("display","block");
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
<link href="<?php echo $base_url_views; ?>css/fSelect.css" rel="stylesheet">
<link href="<?php echo $base_url_views; ?>css/mediaBoxes.css" rel="stylesheet">
<script src="<?php echo $base_url_views; ?>js/fSelect.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.dropdown.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.js"></script>
<script>
$('.multiple-select').fSelect();
$('.fs-label').html('Select Product');
</script>
</body>
</html>