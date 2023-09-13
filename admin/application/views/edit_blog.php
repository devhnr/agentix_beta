<?php include('include/header.php');?>

<!-- Start: Main -->

<div id="main">



    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->

    <section id="content_wrapper">



        <div id="topbar">



            <div class="topbar-left">



                <ol class="breadcrumb">



                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Blog </a></li>



                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span



                                class="glyphicon glyphicon-home"></span></a></li>



                    <li class="crumb-link"><a href="<?php echo $base_url; ?>blog/lists">Blog</a></li>



                    <li class="crumb-trail">Edit Blog</li>



                </ol>



            </div>



        </div>



        <div id="content">



            <div class="row">



                <div class="col-md-12">





                    <div class="panel">



                        <div class="panel-heading"> <span class="panel-title"> <span



                                    class="glyphicon glyphicon-lock"></span> Edit Blog</span> </div>



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



                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>blog/edit/<?php echo $id; ?>" enctype="multipart/form-data">



                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">

                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_blog">

                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">



                                    <div class="form-group">

                                        <label style="width:100%;" for="product_name">Blog Category</label>

                                        <select name="blog_cate_id" id="blog_cate_id" onchange="subcategory(this.value);"

                                            class="form-control" placeholder="Select Category Name" />

                                        <option value=''>Select Category</option>

                                        <?php  if($all_blog_category !='' && count($all_blog_category) > 0){ 

                                        foreach($all_blog_category as $category){ ?>

                                        <option value="<?php echo $category->id; ?>"

                                            <?php if($category->id==$blog_cate_id){ echo "selected";} ?>>

                                            <?php echo $category->name; ?>

                                        </option>

                                        <?php } } ?>

                                        </select>

                                    </div>



                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="title">Title

                                            <!--<span style="color:red"> *<span>-->

                                        </label>

                                        <input id="title" name="title" type="text" class="form-control"

                                            placeholder="Enter Title" value="<?php echo $title; ?>" />

                                    </div>



                                     <div class="form-group">

                                        <label for="name"> Page url </label>

                                        <input id="page_url" name="page_url" type="text" class="form-control"

                                            placeholder="Enter  Page url" value="<?php echo $page_url;?>" />

                                    </div>



                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="title">Title 2

                                            <!--<span style="color:red"> *<span>-->

                                        </label>

                                        <input id="title2" name="title2" type="text" class="form-control"

                                            placeholder="Enter Title 2" value="<?php echo $title2; ?>" />

                                    </div>



                                 <!--     <div class="form-group">

                                       <label for="url">Url</label>

                                       <input id="url" name="url" type="text" class="form-control" placeholder="Enter Page Url " value="<?php echo $url; ?>"/>

                                    </div> -->



                                    <div class="form-group">

                                       <label for="name">Name<!--  <span color="red">*</span> --></label>

                                       <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name " value="<?php echo $name; ?>"/>

                                    </div>



                                     <div class="form-group">

                                       <label>Date </label>

                                       <input id="startdate" name="date" type="date" class="form-control" placeholder="Enter Date " value="<?php echo $date; ?>"/>

                                    </div>



                                <div class="form-group">

                                    <label style="width:100%; margin:15px 0 5px;" for="image">Image (Size :415px X 270px)</label>

                                    <input id="image" name="image" type="file" class="form-control" value="" />

                                    <img src="<?php echo $front_base_url;?>upload/blogs/medium/<?php echo $image; ?>"

                                            height="50" width="50">

                                </div>



                                <div class="form-group">

                                       <label for="alt">Alt</label>

                                       <input id="alt" name="alt" type="text" class="form-control" placeholder="Enter Alt" value="<?php echo $alt; ?>"/>

                                    </div>



                                <div class="form-group">

                                    <label style="width:100%; margin:15px 0 5px;" for="image">Detail Image (Size :925px X 600px)</label>

                                    <input id="detail_img" name="detail_img" type="file" class="form-control" value="" />

                                    <img src="<?php echo $front_base_url;?>upload/blogs/detail_image/large/<?php echo $detail_img; ?>"

                                            height="50" width="50">

                                </div>



                                <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="short_desc">Short Description</label>

                                        <textarea id="short_desc" name="short_desc" type="text" class="form-control"

                                            placeholder="Enter Short Description" value="" /><?php echo $short_desc; ?></textarea>

                                    </div>



                                <div class="form-group">

                                    <label for="description">Description</label>

                                    <textarea id="description" name="description" type="text" class="form-control"

                                                placeholder="Enter Description" value="" /><?php echo $description; ?>

                                    </textarea>

                                </div>





                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="metatitle">Meta Title</label>

                                        <input id="metatitle" name="metatitle" type="text" class="form-control" value="<?php echo $metatitle; ?>"  placeholder="Meta Title"/>

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="metakeywords">Meta Keywords </label>

                                        <input id="metakeywords" name="metakeywords" type="text" class="form-control" value="<?php echo $metakeywords; ?>"  placeholder="Meta Keywords"/>

                                        <!-- <span id="metakeywordserror" class="valierror"></span> -->

                                    </div>

                                </div>



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="metadescription">Meta Description</label>

                                        <textarea id="metadescription" name="metadescription" class="form-control"

                                            placeholder="Meta Description"><?php echo $metadescription; ?></textarea>

                                    </div>

                                </div>

                                    

                                   <!--  <div class="form-group ">

                                       <label for="detail_title">Detail Title </label>

                                       <input id="detail_title" name="detail_title" type="text" class="form-control" placeholder="Enter Detail Title" value="<?php echo $detail_title; ?>" />

                                       <span id="productnameerror" class="valierror"></span>

                                    </div>



                                    <div class="form-group">

                                    <label style="width:100%; margin:15px 0 5px;    " for="detail_image">

                                      Detail Image (Size : 1350px X 600px ) </label>

                                    <input id="detail_image" name="detail_image" type="file" class="form-control" value="" />

                                    <img src="<?php echo $front_base_url; ?>upload/blogs/detail_image/<?php echo $detail_image; ?>"

                                            height="50" width="50">

                                </div> -->



                            </div>



                            <div class="form-group">



                                <input class="submit btn bg-purple pull-right" type="submit" value="Update" onclick="javascript:validate();return false;" />



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

<script>

function validate() {



    var category_name = $("#category_name").val();

    if(category_name == ''){

        $("#error_msg1").html("Please Enter Category Name.");

        $("#validator").css("display","block");

        return false;

    }



    var name = $("#title").val();

    if (name == '') {

        //alert('Please Enter Category ');

        $("#error_msg1").html("Please Enter Title.");

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

