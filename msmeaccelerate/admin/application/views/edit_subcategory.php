<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">

        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Sub Industry </a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>subcategory/lists">Sub Industry</a></li>

                    <li class="crumb-trail">Edit Sub Industry</li>

                </ol>

            </div>

        </div>

        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Edit Sub Industry</span> </div>

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

                                <form role="form" id="form" method="post"
                                    action="<?php echo $base_url;?>subcategory/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">

                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_category">

                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="name">Industry
                                            <!--<span style="color:red"> *<span>-->
                                        </label>

                                        <span id="prod1">

                                            <select id="industry_id" name="industry_id" class="form-control jobtext">

                                                <option value="" selected>-- Select Industry --</option>

                                                <?php for($i=0;$i<count($allcategory);$i++){ ?>

                                                <option value='<?php echo $allcategory[$i]->id; ?>'
                                                    <?php if($industry_id==$allcategory[$i]->id){ echo "selected";} ?>>

                                                    <?php echo $allcategory[$i]->name; ?>

                                                </option>

                                                <?php } ?>

                                            </select>

                                        </span>

                                    </div>



                                    <div class="form-group">

                                        <label style="width:100%; margin:15px 0 5px;" for="name">Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>

                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Name" value="<?php echo $name; ?>" />

                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employee Insurance</label>
                                        <select id="emp_insurance" name="emp_insurance" class="form-control">
                                            <option value="" selected>-- Select Employee Insurance --</option>
                                            <option value="1" <?php if($emp_insurance == 1){ echo "selected";}?>>High</option>
                                            <option value="2" <?php if($emp_insurance == 2){ echo "selected";}?>>Medium</option>
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Property Insurance</label>
                                        <select id="pro_insurance" name="pro_insurance" class="form-control">
                                            <option value="" selected>-- Select Property Insurance --</option>
                                            <option value="1" <?php if($pro_insurance == 1){ echo "selected";}?>>High</option>
                                            <option value="2" <?php if($pro_insurance == 2){ echo "selected";}?>>Medium</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Liability Insurance</label>
                                        <select id="liability_insurance" name="liability_insurance" class="form-control">
                                            <option value="" selected>-- Select Liability Insurance --</option>
                                            <option value="1" <?php if($liability_insurance == 1){ echo "selected";}?>>High</option>
                                            <option value="2" <?php if($liability_insurance == 2){ echo "selected";}?>>Medium</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Crime Insurance</label>
                                        <select id="crime_insurance" name="crime_insurance" class="form-control">
                                            <option value="" selected>-- Select Crime Insurance --</option>
                                            <option value="1" <?php if($crime_insurance == 1){ echo "selected";}?>>High</option>
                                            <option value="2" <?php if($crime_insurance == 2){ echo "selected";}?>>Medium</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cyber Insurance</label>
                                        <select id="cyber_insurance" name="cyber_insurance" class="form-control">
                                            <option value="" selected>-- Select Cyber Insurance --</option>
                                            <option value="1" <?php if($cyber_insurance == 1){ echo "selected";}?>>High</option>
                                            <option value="2" <?php if($cyber_insurance == 2){ echo "selected";}?>>Medium</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">

                                <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                    onclick="javascript:validate();return false;" />

                                <a href="<?php echo $base_url;?>subcategory/lists"
                                    class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>

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

    // var group_id = $("#group_id").val();

    // if (group_id == '') {

    //     //alert('Please Enter Category ');

    //     $("#error_msg1").html("Please Select Group.");

    //     $("#validator").css("display", "block");

    //     return false;

    // }



    var category_id = $("#category_id").val();

    if (category_id == '') {

        //alert('Please Enter Category ');

        $("#error_msg1").html("Please Select Category Name.");

        $("#validator").css("display", "block");

        return false;

    }



    var name = $("#name").val();

    if (name == '') {

        //alert('Please Enter Category ');

        $("#error_msg1").html("Please Enter Sub Category Name.");

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

<script>
function get_group(cid)

{
    var sid = '<?php echo $category_id; ?>';

    var url = '<?php echo $base_url ?>/subcategory/show_subcategory/';

    $.ajax({

        url: url,

        type: 'post',

        data: 'cid=' + cid + '&sid=' + sid,

        success: function(msg)

        {



            document.getElementById('prod1').innerHTML = msg;

        }

    });

}
</script>

<script type="text/javascript" src="<?php echo $base_url_views; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    "use strict";
    Core.init();
    Ajax.init();
    CKEDITOR.replace('description', {});
    CKEDITOR.disableAutoInline = false;
});
jQuery(document).ready(function() {
    "use strict";
    Core.init();
    Ajax.init();
    CKEDITOR.replace('meta_desc', {});
    CKEDITOR.disableAutoInline = false;
});
</script>