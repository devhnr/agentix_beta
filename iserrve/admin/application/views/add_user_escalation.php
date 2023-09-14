<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);">Add User Escalation</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>user_escalation/lists">User Escalation</a></li>
                    <li class="crumb-trail">Add User Escalation</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add User Escalation </span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>user_escalation/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_user_escalation">

                                    <div class="form-group">
                                        <label for="name">Full Name <span class="mandatory_field">*</span></label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Full Name" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Phone <span class="mandatory_field">*</span></label>
                                        <input id="phone" name="phone"  type="text" class="form-control"
                                            placeholder="Enter Phone" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Email ID <span class="mandatory_field">*</span></label>
                                        <input id="email" name="email" type="email" class="form-control"
                                            placeholder="Enter Email ID" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Alternate Email ID </label>
                                        <input id="alternate_email" name="alternate_email" type="email" class="form-control"
                                            placeholder="Enter Alternate Email ID" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Full address of Respective Company </label>
                                        <input id="address" name="address" type="text" class="form-control"
                                            placeholder="Enter Full address of Respective Company" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Type </label>
                                        
                                        <select id="type" name="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="TPA">TPA</option>
                                            <option value="BROKER">BROKER</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>user_escalation/lists"
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
        $("#error_msg1").html("Please Enter Full Name");
        $("#validator").css("display", "block");
        $('html, body').animate({
                scrollTop: $('#error_msg1').offset().top - 150
            }, 1000);
        return false;
    }

    var phone = $("#phone").val();
    if (phone == '') {
        $("#error_msg1").html("Please Enter Phone");
        $("#validator").css("display", "block");
        $('html, body').animate({
                scrollTop: $('#error_msg1').offset().top - 150
            }, 1000);
        return false;
    }

    var pc = jQuery('#phone').val();
    var filter = /^\d{10}$/;
    if (!filter.test(pc)) {
        $("#error_msg1").html("Please Enter Phone");
        $("#validator").css("display", "block");
        $('html, body').animate({
                scrollTop: $('#error_msg1').offset().top - 150
            }, 1000);
        return false;
    }

    var email = $("#email").val();
    if (email == '') {
        $("#error_msg1").html("Please Enter Email ID");
        $("#validator").css("display", "block");
        $('html, body').animate({
                scrollTop: $('#error_msg1').offset().top - 150
            }, 1000);
        return false;
    }

    var em = jQuery('#email').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(em)) {
        jQuery('#error_msg1').html("Enter Valid Email Address.");
        $("#validator").css("display", "block");
        $('html, body').animate({
                scrollTop: $('#error_msg1').offset().top - 150
            }, 1000);
        return false;
    }

    var alternate_email = $("#alternate_email").val();
    // if (alternate_email == '') {
    //     $("#error_msg1").html("Please Enter Alternate Email ID");
    //     $("#validator").css("display", "block");
    //     $('html, body').animate({
    //             scrollTop: $('#error_msg1').offset().top - 150
    //         }, 1000);
    //     return false;
    // }
    if (alternate_email != '') {

        var em_new = jQuery('#alternate_email').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(em_new)) {
            jQuery('#error_msg1').html("Enter Valid Alternative Email Address.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                    scrollTop: $('#error_msg1').offset().top - 150
                }, 1000);
            return false;
        }
    }

    /* var address = $("#address").val();
    if (address == '') {
        $("#error_msg1").html("Please Enter Full address of Respective Company");
        $("#validator").css("display", "block");
        $('html, body').animate({
                    scrollTop: $('#error_msg1').offset().top - 150
                }, 1000);
        return false;
    }

    var type = $("#type").val();
    if (type == '') {
        $("#error_msg1").html("Please Select Type");
        $("#validator").css("display", "block");
        $('html, body').animate({
                    scrollTop: $('#error_msg1').offset().top - 150
                }, 1000);
        return false;
    } */


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

<?php //include('include/footer.php');?>
<link href="<?php echo $base_url_views; ?>css/fSelect.css" rel="stylesheet">
<link href="<?php echo $base_url_views; ?>css/mediaBoxes.css" rel="stylesheet">
<script src="<?php echo $base_url_views; ?>js/fSelect.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.dropdown.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.js"></script>
<script>
// $('.multiple-select').fSelect();
// $('.fs-label').html('Select Product');
</script>

</body>

</html>