<?php include('include/header.php');?>



<!-- Start: Main -->

<div id="main">



    <?php include('include/sidebar_left.php');?>



    <!-- Start: Content -->

    <section id="content_wrapper">

        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);"> Add Banner</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>banner/lists">Banner</a></li>

                    <li class="crumb-trail">Add a Banner</li>

                </ol>

            </div>

        </div>

        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Add Banner </span> </div>

                        <div class="panel-body">



                            <?php if($this->session->flashdata('L_strErrorMessage')) 

  { ?>

                            <div class="alert alert-success alert-dismissable">

                                <i class="fa fa-check"></i>

                                <button type="button" class="close" data-dismiss="alert"

                                    aria-hidden="true">&times;</button>

                                <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>

                            </div>







                            <?php } 





  ?>





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



                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>banner/add"

                                    enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">

                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_category">





                                    <div class="form-group">

                                        <label for="title1">Title</label>

                                        <input id="title1" name="title1" type="text" class="form-control"

                                            placeholder="Enter Title" value="" />

                                    </div>





                                    <!-- <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="title2">Title 2 </label>

                                        <input id="title2" name="title2" type="text" class="form-control"

                                            placeholder="Enter Title 2" value="" />

                                    </div>



                                    <div class="form-group">

                                        <label for="title3">Title 3 </label>

                                        <input id="title3" name="title3" type="text" class="form-control"

                                            placeholder="Enter Title 3" value="" />

                                    </div> -->



                                   <!--  <div class="form-group">

                                        <label for="url">URL </label>

                                        <input id="url" name="url" type="text" class="form-control"

                                            placeholder="Enter URL" value="" />

                                    </div> -->



                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="name">Banner Image (Size :

                                            1920px X 762px)</label>

                                        <input id="image" name="image" type="file" class="form-control" value="" />

                                    </div>

                                   <!--  <div class="form-group">

                                        <label for="web_image_alt_tag">Banner Image Alt Tag</label>

                                        <input id="web_image_alt_tag" name="web_image_alt_tag" type="text"

                                            class="form-control" placeholder="Enter Banner Image Alt Tag" value="" />

                                    </div>

                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="name">Mobile Banner Image

                                            (Size : 767px X 645px)</label>

                                        <input id="mobile_image" name="mobile_image" type="file" class="form-control"

                                            value="" />

                                    </div>



                                    <div class="form-group">

                                        <label for="mob_image_alt_tag">Mobile Banner Image Alt Tag</label>

                                        <input id="mob_image_alt_tag" name="mob_image_alt_tag" type="text"

                                            class="form-control" placeholder="Enter Mobile Banner Image Alt Tag"

                                            value="" />

                                    </div> -->





                                    <div class="form-group">

                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"

                                            onclick="javascript:validate();return false;" />

                                        <a href="<?php echo $base_url;?>banner/lists"

                                            class="submit btn bg-purple pull-right"

                                            style="margin-right: 10px;">Cancel</a>

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





    var name = $("#name").val();

    if (name == '') {

        //alert('Please Enter Category ');

        $("#error_msg1").html("Please Enter Title.");

        $("#validator").css("display", "block");

        return false;

    }

    // var image = $("#image").val();

    // if (image == '') {

    //     //alert('Please Enter Category ');

    //     $("#error_msg1").html("Please Select Banner Image.");

    //     $("#validator").css("display", "block");

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