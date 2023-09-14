<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Edit policy </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>policy/lists">policy</a></li>
                    <li class="crumb-trail">Edit policy</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit policy</span> </div>
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
                                    action="<?php echo $base_url;?>policy/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_policy">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

                                    <div class="form-group">
                                        <label for="corporate_id">Corporate <span class="mandatory_field">*</span></label>
                                        <select id="corporate_id" name="corporate_id"
                                            class="form-control" disabled>
                                            <option value="">Select Corporate</option>
                                            <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                foreach ($allcorporate as $corporate) {
                                                    ?>
                                            <option value="<?php echo $corporate->id; ?>" <?php if ($corporate->id == $corporate_id) {
                                                echo "selected"; } ?>><?php echo $corporate->co_name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Insurer <span class="mandatory_field">*</span></label>
                                        <select id="insurer" name="insurer" class="form-control" disabled>
                                            <option value="">Select Insurer</option>
                                            <option value="Acko General Insurance Ltd." <?php if($insurer == "Acko General Insurance Ltd."){echo "selected"; } ?>>Acko General Insurance Ltd.</option>
                                            <option value="Aditya Birla Health insurance Co Ltd." <?php if($insurer == "Aditya Birla Health insurance Co Ltd."){echo "selected"; } ?>>Aditya Birla Health insurance Co Ltd.</option>
                                            <option value="Aditya Birla SunLife Insurance Co. Ltd." <?php if($insurer == "Aditya Birla SunLife Insurance Co. Ltd."){echo "selected"; } ?>>Aditya Birla SunLife Insurance Co. Ltd.</option>
                                            <option value="Aegon Life Insurance Company Limited" <?php if($insurer == "Aegon Life Insurance Company Limited"){echo "selected"; } ?>>Aegon Life Insurance Company Limited</option>
                                            <option value="Agriculture Insurance Company of India Ltd." <?php if($insurer == "Agriculture Insurance Company of India Ltd."){echo "selected"; } ?>>Agriculture Insurance Company of India Ltd.</option>
                                            <option value="Aviva Life Insurance Company India Ltd." <?php if($insurer == "Aviva Life Insurance Company India Ltd."){echo "selected"; } ?>>Aviva Life Insurance Company India Ltd.</option>
                                            <option value="Bajaj Allianz General Insurance Co. Ltd" <?php if($insurer == "Bajaj Allianz General Insurance Co. Ltd"){echo "selected"; } ?>>Bajaj Allianz General Insurance Co. Ltd</option>
                                            <option value="Bajaj Allianz Life Insurance Co. Ltd." <?php if($insurer == "Bajaj Allianz Life Insurance Co. Ltd."){echo "selected"; } ?>>Bajaj Allianz Life Insurance Co. Ltd.</option>
                                            <option value="Bharti AXA Life Insurance Company Ltd" <?php if($insurer == "Bharti AXA Life Insurance Company Ltd"){echo "selected"; } ?>>Bharti AXA Life Insurance Company Ltd</option>
                                            <option value="Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited" <?php if($insurer == "Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited"){echo "selected"; } ?>>Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited</option>
                                            <option value="Care Health Insurance Ltd" <?php if($insurer == "Care Health Insurance Ltd"){echo "selected"; } ?>>Care Health Insurance Ltd</option>
                                            <option value="Cholamandalam MS General Insurance Co. Ltd" <?php if($insurer == "Cholamandalam MS General Insurance Co. Ltd"){echo "selected"; } ?>>Cholamandalam MS General Insurance Co. Ltd</option>
                                            <option value="ECGC Ltd." <?php if($insurer == "ECGC Ltd."){echo "selected"; } ?>>ECGC Ltd.</option>
                                            <option value="Edelweiss General Insurance Company Limited" <?php if($insurer == "Edelweiss General Insurance Company Limited"){echo "selected"; } ?>>Edelweiss General Insurance Company Limited </option>
                                            <option value="Edelweiss Tokio Life Insurance Company Limited" <?php if($insurer == "Edelweiss Tokio Life Insurance Company Limited"){echo "selected"; } ?>>Edelweiss Tokio Life Insurance Company Limited</option>
                                            <option value="Exide Life Insurance Co. Ltd" <?php if($insurer == "Exide Life Insurance Co. Ltd"){echo "selected"; } ?>>Exide Life Insurance Co. Ltd</option>
                                            <option value="Future Generali India Insurance Co. Ltd." <?php if($insurer == "Future Generali India Insurance Co. Ltd."){echo "selected"; } ?>>Future Generali India Insurance Co. Ltd.</option>
                                            <option value="Future Generali India Life Insurance Company Limited" <?php if($insurer == "Future Generali India Life Insurance Company Limited"){echo "selected"; } ?>>Future Generali India Life Insurance Company Limited</option>
                                            <option value="Go Digit General Insurance Limited" <?php if($insurer == "Go Digit General Insurance Limited"){echo "selected"; } ?>>Go Digit General Insurance Limited</option>
                                            <option value="HDFC ERGO General Insurance Co. Ltd" <?php if($insurer == "HDFC ERGO General Insurance Co. Ltd"){echo "selected"; } ?>>HDFC ERGO General Insurance Co. Ltd</option>
                                            <option value="HDFC Life Insurance Co. Ltd" <?php if($insurer == "HDFC Life Insurance Co. Ltd"){echo "selected"; } ?>>HDFC Life Insurance Co. Ltd</option>
                                            <option value="ICICI Lombard General Insurance Co. Ltd." <?php if($insurer == "ICICI Lombard General Insurance Co. Ltd."){echo "selected"; } ?>>ICICI Lombard General Insurance Co. Ltd.</option>
                                            <option value="ICICI Prudential Life Insurance Co. Ltd." <?php if($insurer == "ICICI Prudential Life Insurance Co. Ltd."){echo "selected"; } ?>>ICICI Prudential Life Insurance Co. Ltd.</option>
                                            <option value="IDBI Federal Life Insurance Company Limited" <?php if($insurer == "IDBI Federal Life Insurance Company Limited"){echo "selected"; } ?>>IDBI Federal Life Insurance Company Limited</option>
                                            <option value="IFFCO-TOKIO General Insurance Co. Ltd." <?php if($insurer == "IFFCO-TOKIO General Insurance Co. Ltd."){echo "selected"; } ?>>IFFCO-TOKIO General Insurance Co. Ltd.</option>
                                            <option value="IndiaFirst Life Insurance Company Ltd." <?php if($insurer == "IndiaFirst Life Insurance Company Ltd."){echo "selected"; } ?>>IndiaFirst Life Insurance Company Ltd.</option>
                                            <option value="Kotak Mahindra General insurance co. Ltd." <?php if($insurer == "Kotak Mahindra General insurance co. Ltd."){echo "selected"; } ?>>Kotak Mahindra General insurance co. Ltd.</option>
                                            <option value="Kotak Mahindra Life Insurance Co. Ltd." <?php if($insurer == "Kotak Mahindra Life Insurance Co. Ltd."){echo "selected"; } ?>>Kotak Mahindra Life Insurance Co. Ltd.</option>
                                            <option value="Liberty  General Insurance Co. Ltd." <?php if($insurer == "Liberty  General Insurance Co. Ltd."){echo "selected"; } ?>>Liberty  General Insurance Co. Ltd.</option>
                                            <option value="Life Insurance Corporation of India" <?php if($insurer == "Life Insurance Corporation of India"){echo "selected"; } ?>>Life Insurance Corporation of India</option>
                                            <option value="Magma HDI General Insurance Co. Ltd." <?php if($insurer == "Magma HDI General Insurance Co. Ltd."){echo "selected"; } ?>>Magma HDI General Insurance Co. Ltd.</option>
                                            <option value="Manipal Cigna Health Insurance Company Limited" <?php if($insurer == "Manipal Cigna Health Insurance Company Limited"){echo "selected"; } ?>>Manipal Cigna Health Insurance Company Limited</option>
                                            <option value="Max Life Insurance Co. Ltd." <?php if($insurer == "Max Life Insurance Co. Ltd."){echo "selected"; } ?>>Max Life Insurance Co. Ltd.</option>
                                            <option value="National Insurance Co. Ltd." <?php if($insurer == "National Insurance Co. Ltd."){echo "selected"; } ?>>National Insurance Co. Ltd.</option>
                                            <option value="Navi General Insurance Ltd" <?php if($insurer == "Navi General Insurance Ltd"){echo "selected"; } ?>>Navi General Insurance Ltd</option>
                                            <option value="Niva bupa health insurance company limited" <?php if($insurer == "Niva bupa health insurance company limited"){echo "selected"; } ?>>Niva bupa health insurance company limited</option>
                                            <option value="PNB MetLife India Insurance Co. Ltd" <?php if($insurer == "PNB MetLife India Insurance Co. Ltd"){echo "selected"; } ?>>PNB MetLife India Insurance Co. Ltd</option>
                                            <option value="Pramerica Life Insurance Co. Ltd." <?php if($insurer == "Pramerica Life Insurance Co. Ltd."){echo "selected"; } ?>>Pramerica Life Insurance Co. Ltd.</option>
                                            <option value="Raheja QBE General Insurance Co. Ltd." <?php if($insurer == "Raheja QBE General Insurance Co. Ltd."){echo "selected"; } ?>>Raheja QBE General Insurance Co. Ltd.</option>
                                            <option value="Reliance General Insurance Co. Ltd." <?php if($insurer == "Reliance General Insurance Co. Ltd."){echo "selected"; } ?>>Reliance General Insurance Co. Ltd.</option>
                                            <option value="Reliance Nippon Life Insurance Company" <?php if($insurer == "Reliance Nippon Life Insurance Company"){echo "selected"; } ?>>Reliance Nippon Life Insurance Company</option>
                                            <option value="Royal Sundaram General Insurance Co. Ltd" <?php if($insurer == "Royal Sundaram General Insurance Co. Ltd"){echo "selected"; } ?>>Royal Sundaram General Insurance Co. Ltd</option>
                                            <option value="Sahara India Life Insurance Co. Ltd." <?php if($insurer == "Sahara India Life Insurance Co. Ltd."){echo "selected"; } ?>>Sahara India Life Insurance Co. Ltd.</option>
                                            <option value="SBI General Insurance Co. Ltd." <?php if($insurer == "SBI General Insurance Co. Ltd."){echo "selected"; } ?>>SBI General Insurance Co. Ltd.</option>
                                            <option value="SBI Life Insurance Co. Ltd." <?php if($insurer == "SBI Life Insurance Co. Ltd."){echo "selected"; } ?>>SBI Life Insurance Co. Ltd.</option>
                                            <option value="Shriram General Insurance Co. Ltd." <?php if($insurer == "Shriram General Insurance Co. Ltd."){echo "selected"; } ?>>Shriram General Insurance Co. Ltd.</option>
                                            <option value="Shriram Life Insurance Co. Ltd." <?php if($insurer == "Shriram Life Insurance Co. Ltd."){echo "selected"; } ?>>Shriram Life Insurance Co. Ltd.</option>
                                            <option value="Star Health & Allied Insurance Co. Ltd" <?php if($insurer == "Star Health & Allied Insurance Co. Ltd"){echo "selected"; } ?>>Star Health & Allied Insurance Co. Ltd</option>
                                            <option value="Star Union Dai-Ichi Life Insurance Co. Ltd." <?php if($insurer == "Star Union Dai-Ichi Life Insurance Co. Ltd."){echo "selected"; } ?>>Star Union Dai-Ichi Life Insurance Co. Ltd.</option>
                                            <option value="TATA AIA Life Insurance Co. Ltd." <?php if($insurer == "TATA AIA Life Insurance Co. Ltd."){echo "selected"; } ?>>TATA AIA Life Insurance Co. Ltd.</option>
                                            <option value="Tata-AIG General Insurance Co. Ltd." <?php if($insurer == "Tata-AIG General Insurance Co. Ltd."){echo "selected"; } ?>>Tata-AIG General Insurance Co. Ltd.</option>
                                            <option value="The New India Assurance Co. Ltd." <?php if($insurer == "The New India Assurance Co. Ltd."){echo "selected"; } ?>>The New India Assurance Co. Ltd.</option>
                                            <option value="The Oriental Insurance Co. Ltd." <?php if($insurer == "The Oriental Insurance Co. Ltd."){echo "selected"; } ?>>The Oriental Insurance Co. Ltd.</option>
                                            <option value="United India Insurance Co. Ltd." <?php if($insurer == "United India Insurance Co. Ltd."){echo "selected"; } ?>>United India Insurance Co. Ltd.</option>
                                            <option value="Universal Sompo General Insurance Co. Ltd." <?php if($insurer == "Universal Sompo General Insurance Co. Ltd."){echo "selected"; } ?>>Universal Sompo General Insurance Co. Ltd.</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_type">Policy Type <span class="mandatory_field">*</span></label>
                                        <select id="policy_type" name="policy_type" class="form-control" disabled>
                                            <option value="">Select Policy Type</option>

                                            <option value="Health" <?php if($policy_type == "Health"){echo "selected"; } ?>>Health</option>
                                            <option value="Life" <?php if($policy_type == "Life"){echo "selected"; } ?>>Life</option>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="product_type">Product Type <span class="mandatory_field">*</span></label>
                                        <select id="product_type" name="product_type" class="form-control" disabled>
                                            <option value="">Select Product Type</option>

                                            <?php //echo "<pre>";print_r($allproduct_type);echo "</pre>";
                                            if ($allproduct_type != '' && count($allproduct_type) > 0) {
                                                foreach ($allproduct_type as $allproduct_type_data) {
                                                    ?>
                                            <option value="<?php echo $allproduct_type_data->id; ?>" <?php if($allproduct_type_data->name == $product_type){echo "selected";}?>><?php echo $allproduct_type_data->name; ?>
                                            </option>
                                            <?php } } ?>


                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="product_name">Product Name <span class="mandatory_field">*</span></label>
                                        <input id="product_name" name="product_name" type="text" class="form-control"
                                            placeholder="Enter Product Name" value="<?php echo $product_name; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_no">Policy Number <span class="mandatory_field">*</span></label>
                                        <input id="policy_no" name="policy_no" type="text" class="form-control"
                                            placeholder="Enter Policy Number" value="<?php echo $policy_no; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_holder_name">Policy Holder Name <span class="mandatory_field">*</span></label>
                                        <input id="policy_holder_name" name="policy_holder_name" type="text" class="form-control"
                                            placeholder="Enter Policy Holder Name" value="<?php echo $policy_holder_name; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_start_date">Policy Start Date <span class="mandatory_field">*</span></label>
                                        <input id="policy_start_date" name="policy_start_date" type="date" class="form-control"
                                            placeholder="Enter Start Date" value="<?php echo $policy_start_date; ?>" readonly>
                                    </div>


                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_end_date">Policy End Date <span class="mandatory_field">*</span></label>
                                        <input id="policy_end_date" name="policy_end_date" type="date" class="form-control"
                                            placeholder="Enter End Date" value="<?php echo $policy_end_date; ?>" readonly>
                                    </div>


                                    <div class="form-group hideTPA">
                                       <label style="width:100%; margin:15px 0 5px;" for="tpa">TPA <span class="mandatory_field">*</span></label>
                                       <select id="tpa" name="tpa" class="form-control">
                                           <option value="">Select TPA</option>
                                           <?php foreach(TPA as $TPA){ ?>
                                             <option value="<?=$TPA?>" <?php if($tpa == $TPA){echo "selected"; } ?>><?=$TPA?></option>
                                           <?php } ?>
                                       </select>
                                    </div>

                            </div>

                            <div class="form-group hideTPA">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Tpa person name</label>
                                            <input id="tpa_person_name" name="tpa_person_name" type="text" class="form-control"
                                            placeholder="Enter Tpa person name" value="<?php echo $tpa_person_name; ?>" />
                                    </div>

                                    <div class="form-group hideTPA">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Tpa person Mobile Number </label>

                                        <input id="tpa_person_mobile" name="tpa_person_mobile" type="number" class="form-control"
                                            placeholder="Enter Tpa person Mobile Number" value="<?php echo $tpa_person_mobile; ?>" />
                                    </div>

                                    <div class="form-group hideTPA">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Tpa person Email Id</label>

                                        <input id="tpa_person_email" name="tpa_person_email" type="text" class="form-control"
                                            placeholder="Enter Tpa person Email Id" value="<?php echo $tpa_person_email; ?>" />
                                    </div>


                            <div class="form-group">
                                <input class="submit btn bg-purple pull-right" type="button" value="Update"
                                    onclick="javascript:validate();return false;" />
                                <a href="<?php echo $base_url;?>policy/lists" class="submit btn bg-purple pull-right"
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

   var insurer= $("#insurer").val();
    if (insurer == '') {
        //alert('Please Enter policy ');
        $("#error_msg1").html("Please Select Insurer.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }
    var corporate_id = $("#corporate_id").val();
    if (corporate_id == '') {
        $("#error_msg1").html("Please Select Corporate.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var policy_type = $("#policy_type").val();
    if (policy_type == '') {
        $("#error_msg1").html("Please Enter Policy Type.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var product_type = $("#product_type").val();
    if (product_type == '') {
        $("#error_msg1").html("Please Enter Product Type.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var product_name = $("#product_name").val();
    if (product_name == '') {
        $("#error_msg1").html("Please Enter Product Name.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var policy_no = $("#policy_no").val();
    if (policy_no == '') {
        $("#error_msg1").html("Please Enter Policy Number.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }


    var policy_holder_name = $("#policy_holder_name").val();
    if (policy_holder_name == '') {
        $("#error_msg1").html("Please Enter Policy Holder Name.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }


    var policy_start_date = $("#policy_start_date").val();
    if (policy_start_date == '') {
        $("#error_msg1").html("Please Enter Policy Start Date.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var policy_end_date = $("#policy_end_date").val();
    if (policy_end_date == '') {
        $("#error_msg1").html("Please Enter Policy End Date.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var tpa = $("#tpa").val();
    if (tpa == '') {
        $("#error_msg1").html("Please Enter TPA.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var tpa_person_mobile = $("#tpa_person_mobile").val();
    if(tpa_person_mobile != ''){

        var filter = /^\d{10}$/;
        if (!filter.test(tpa_person_mobile)) {
            $('#error_msg1').html("Please Enter Valid Tpa Person Mobile Number ");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

    }

    var tpa_person_email = jQuery('#tpa_person_email').val();

    if(tpa_person_email != ''){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(tpa_person_email)) {
            jQuery('#error_msg1').html("Please enter valid Tpa Person email");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }
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

$(document).ready(function() {
    var product_type = $("#product_type").val();
    if (product_type == '3' || product_type == '4') {
      $('.hideTPA').hide();
    }else{
      $('.hideTPA').show();
    }
});
</script>
