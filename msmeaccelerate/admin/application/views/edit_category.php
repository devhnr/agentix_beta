<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Industry </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>category/lists">Industry</a></li>
                    <li class="crumb-trail">Edit Industry</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Industry</span> </div>
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
                                    action="<?php echo $base_url;?>category/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_category">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name"> Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Name" value="<?php echo $name; ?>" />
                                    </div>
									
									<?php

                                    $k = 0;
                                    if ($addition_item != '') {
                                        ?>
                                    <input type="hidden" name="description1[]" value="">
                                    <input type="hidden" name="title1[]" value="">
                                    <input type="hidden" name="e_image1_<?php echo $k; ?>" value="">
                                    <!--<input type="hidden" name="price1[]" value="">
                                    <input type="hidden" name="colour1[]" value="">
                                    <input type="hidden" name="qty1[]" value="">-->
                                    <?php
                                        for ($i = 0; $i < count($addition_item); $i++) {
                                            ?>
                                    <input type="hidden" name="updateid1xxx[]" id="updateid1xxx<?php echo $i + 1; ?>"
                                        value="<?php echo $addition_item[$i]->id; ?>">

                                    <div class="col-md-12">


                                        <div class="col-md-2">

                                             <div class="form-group ">
                                               <label for="prod_name">Title</label>
                                               <input id="title" name="titleu[]" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $addition_item[$i]->title; ?>" />
                                               
                                            </div>

                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="emp_image">Image(Size 70px X 70px)</label>
                                                <input id="emp_image<?php echo $i + 1; ?>" name="s_imageu_<?php echo $k;?>" type="file" class="form-control" value="" />
                                        <img src="<?php echo $front_base_url;?>upload/industry_add_more/<?php echo $addition_item[$i]->s_image; ?>" height="50" width="50">
                                            </div>
                                        </div>

                                       

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description"> Description</label>
												
												<textarea id="descriptionu_<?php echo $i + 1; ?>" name="descriptionu[]" class="form-control"><?php echo $addition_item[$i]->description; ?></textarea>
                                                <!--<input id="description<?php echo $i + 1; ?>"
                                                    value="<?php echo $addition_item[$i]->description; ?>" name="descriptionu[]"
                                                    type="text" class="form-control" placeholder="Enter  description" />-->
                                            </div>
                                        </div>
                                        
                                        <a href="#"
                                            onclick="singledelete('<?php echo $base_url . "category/removeprice/"; ?><?php echo $addition_item[$i]->p_id; ?>/<?php echo $addition_item[$i]->id; ?>');"
                                            href="javascript:void(0);" style="margin-right: 87px; margin-top: 44px;"
                                            class="btn btn-danger pull-right"> Remove</a>
                                    </div>

                                    <?php $k++; }
                                        } else { ?>
                                    <div class="col-md-12">


                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label style="width:100%; margin:15px 0 5px;" for="emp_image1"> Image (Size : 70px X 70px ) </label>
                                                <input id="s_image" name="e_image1_0" type="file" class="form-control" value="" />
                                            </div>
                                       </div>
									
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description"> Description</label>
												
												<textarea id="description1" name="description1[]" class="form-control"></textarea>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <?php } ?>
                                    <div class="input_fields_wrap12">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12">Add</button>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mail_description" > Mail Description</label>
                                    <textarea id="mail_description" name="mail_description" class="form-control"><?php echo $mail_description; ?></textarea>
                                    
                                </div>
                            </div>

                                        
                            <div class="form-group">
                                <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                    onclick="javascript:validate();return false;" />
                                <a href="<?php echo $base_url;?>category/lists" class="submit btn bg-purple pull-right"
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
        $("#error_msg1").html("Please Enter Category Name.");
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

<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap12");
    var add_button = $("#add_field_button12");

    var b = 0;
    $(add_button).click(function(e) { //alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="col-md-12"><div class="col-md-2"><div class="form-group "><label for="prod_name">Title</label><input id="title" name="title1[]" type="text" class="form-control" placeholder="Enter Title"  /></div></div><div class="col-md-2"><div class="form-group"><label for="emp_image">Image(Size 70px X 70px)</label><input id="emp_image" name="e_image1_' + b + '" type="file" class="form-control " value =""/></div></div><div class="col-md-6"><div class="form-group"><label for="description" > Description</label><textarea id="description_' + b + '" name="description1[]" class="form-control"></textarea></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 86px;margin-top: 45px;">Remove</a></div>'
            );

            CKEDITOR.replace('description_' + b + '', {
                filebrowserBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Flash',
                filebrowserUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            });
        }
    });
    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
});
</script>

<script src="<?php echo $base_url_views; ?>/ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace('mail_description', {
    filebrowserBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>
<script>
function singledelete(url) {
    window.location.href = url;
}


<?php if($addition_item != '') {
      for ($i = 0; $i < count($addition_item); $i++) { ?>
CKEDITOR.replace('descriptionu_<?php echo $i + 1; ?>', {
    filebrowserBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo $base_url_views;?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '<?php echo $base_url_views;?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
<?php } } else {?>
CKEDITOR.replace('description', {
    filebrowserBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
<?php } ?>
</script>

