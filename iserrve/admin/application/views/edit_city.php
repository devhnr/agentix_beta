<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);">Edit City</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>city/lists">City</a></li>
                    <li class="crumb-trail">Edit City</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Edit City </span> </div>
                        <div class="panel-body">

                            <?php if($this->session->flashdata('L_strErrorMessage')) 
  { ?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                            </div>
                            <?php }  ?>

                            <?php if($this->session->flashdata('flashError')!='') { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('flashError'); ?>
                            </div>
                            <?php }  ?>

                            <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b> &nbsp; </b><span id="error_msg1"></span>
                            </div>

                            <div class="col-md-12">

                                <form role="form" id="form" method="post"
                                    action="<?php echo $base_url;?>city/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_city">

                                    <div class="form-group">
                                        <label for="state_id">State <span class="mandatory_field">*</span></label>
                                        <select id="state_id" name="state_id" class="form-control">
                                            <option value="">Select State</option>
                                            <?php if ($allstate != '' && count($allstate) > 0) {
                                                foreach ($allstate as $state) { ?>
                                            <option value="<?php echo $state->id; ?>" <?php if ($state->id == $state_id) {
                                                            echo "selected";
                                                        } ?>><?php echo $state->name; ?></option>
                                            <?php }
                                                } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name <span class="mandatory_field">*</span></label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter City Name" value="<?php echo $name; ?>" />
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="page_url">Page URL</label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Page URL" value="<?php echo $page_url; ?>" />
                                    </div> -->

                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>city/lists"
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

    var state_id = $("#state_id").val();
    if (state_id == '') {
        //alert('Please Enter Fabric ');
        $("#error_msg1").html("Please Select State.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var name = $("#name").val();
    if (name == '') {
        $("#error_msg1").html("Please Enter City Name.");
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
$(function() {
    $("#name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#page_url").val(Text);
    });

});

function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 45 || unicode > 57) //if not a number
            return false //disable key press
    }
}
</script>

<?php //include('include/footer.php');?>

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