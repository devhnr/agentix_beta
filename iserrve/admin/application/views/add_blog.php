<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);">Add Blog</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>blog/lists">Blog</a></li>

                    <li class="crumb-trail">Add Blog</li>

                </ol>

            </div>

        </div>
        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Add Blog </span> </div>

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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>blog/add"
                                    enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_blog">

                                     <div class="form-group">
                                    <label for="blog_cate_id">Blog Category</label>
                                        <span id="prod1">
                                        <select id="blog_cate_id" name="blog_cate_id"  class="form-control">
                                            <option value="">Select Blog Category</option>
                                            <?php  if($all_blog_category !='' && count($all_blog_category) > 0){ 
                                            foreach($all_blog_category as $category){ ?>
                                            <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>      
                                        <?php } }  ?>             
                                        </select>
                                    </span>
                                </div>

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" name="title" type="text" class="form-control" placeholder="Enter Title" />
                                    </div>

                                     <div class="form-group">
                                        <label for="page_url">Page Url</label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Page Url" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="title2">Title 2</label>
                                        <input id="title2" name="title2" type="text" class="form-control" placeholder="Enter Title" />
                                    </div>

                                    <!--   <div class="form-group">
                                       <label for="url">Url</label>
                                       <input id="url" name="url" type="text" class="form-control" placeholder="Enter Page Url " value=""/>
                                    </div> -->

                                    <div class="form-group">
                                       <label for="name">Name :</label>
                                       <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" value=""/>
                                    </div>

                                   <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control" placeholder="Date">
                                  </div>

                                   <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size :320px X 328px)</label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                    </div>

                                    <div class="form-group">
                                       <label for="alt">Alt</label>
                                       <input id="alt" name="alt" type="text" class="form-control" placeholder="Enter Alt" value=""/>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Detail Image (Size :1350px X 350px)</label>
                                        <input id="detail_img" name="detail_img" type="file" class="form-control" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="short_desc">Short Description</label>
                                        <textarea id="short_desc" name="short_desc" type="text" class="form-control"
                                            placeholder="Enter Short Description" value="" /></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="description">Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control"
                                            placeholder="Enter Description" value="" /></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="metatitle">Meta Title</label>
                                            <input id="metatitle" name="metatitle" type="text" class="form-control" value=""  placeholder="Meta Title"/>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="metakeywords">Meta Keywords </label>
                                            <input id="metakeywords" name="metakeywords" type="text" class="form-control" value=""  placeholder="Meta Keywords"/>
                                            <!-- <span id="metakeywordserror" class="valierror"></span> -->
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="metadescription">Meta Description</label>
                                            <textarea id="metadescription" name="metadescription" class="form-control"
                                                placeholder="Meta Description"></textarea>
                                        </div>
                                    </div>
                                     

                                    <!--<div class="form-group ">
                                       <label for="detail_title">Detail Title </label>
                                       <input id="detail_title" name="detail_title" type="text" class="form-control" placeholder="Enter Detail Title"  />
                                       <span id="productnameerror" class="valierror"></span>
                                    </div> -->

                                    <!-- <div class="form-group">
                                    <label style="width:100%; margin:15px 0 5px;    " for="detail_image">
                                      Detail Image (Size : 1350px X 600px ) </label>
                                    <input id="detail_image" name="detail_image" type="file" class="form-control" value="" />
                                </div> -->

                                    <div class="form-group">

                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />

                                        <a href="<?php echo $base_url;?>blog/lists" class="submit btn bg-purple pull-right"
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
    
    var category_name = $("#category_name").val();
    if(category_name == ''){
        $("#error_msg1").html("Please Enter Category Name.");
        $("#validator").css("display","block");
        return false;
    }

    var title = $("#title").val();
    if(title == '')
    {
    	$("#error_msg1").html("Please Enter Title.");
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
 <script src="<?php echo $base_url_views; ?>/ckeditor_new/ckeditor.js"></script>
<script>
/* CKEDITOR.replace('description', {
    filebrowserBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/ckfinder.html?Type=Flash',
    filebrowserUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '<?php echo $base_url_views; ?>ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
}); */CKEDITOR.replace( 'description',    {        on :        {            instanceReady : function( ev )            {                // Output paragraphs as <p>Text</p>.                this.dataProcessor.writer.setRules( 'p',                    {                        indent : false,                        breakBeforeOpen : true,                        breakAfterOpen : false, breakBeforeClose : false,                        breakAfterClose : true                    });            }        }    });
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