<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add Policy</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>policy/lists">Policy</a></li>
                    <li class="crumb-trail">Add a Policy</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Policy </span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>policy/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_policy">

                                    <div class="form-group">
                                        <label for="corporate_id">Corporate <span class="mandatory_field">*</span></label>
                                        <select id="corporate_id" name="corporate_id"
                                            class="form-control">
                                            <option value="">Select Corporate</option>
                                            <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                foreach ($allcorporate as $corporate) {
                                                    ?>
                                            <option value="<?php echo $corporate->id; ?>" <?php if ($corporate->id == $this->session->userdata('corp_id_session')) {
                                                echo "selected"; } ?>><?php echo $corporate->co_name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Insurer <span class="mandatory_field">*</span></label>
                                        <select id="insurer" name="insurer" class="form-control">
                                            <option value="">Select Insurer</option>
                                            <?php foreach(INSURER as $INSURER){ ?>
                                              <option value="<?=$INSURER?>"><?=$INSURER?></option>
                                            <?php } ?>
                                            <option value="Acko General Insurance Ltd.">Acko General Insurance Ltd.</option>
                                            <option value="Aditya Birla Health insurance Co Ltd.">Aditya Birla Health insurance Co Ltd.</option>
                                            <option value="Aditya Birla SunLife Insurance Co. Ltd.">Aditya Birla SunLife Insurance Co. Ltd.</option>
                                            <option value="Aegon Life Insurance Company Limited">Aegon Life Insurance Company Limited</option>
                                            <option value="Agriculture Insurance Company of India Ltd.">Agriculture Insurance Company of India Ltd.</option>
                                            <option value="Aviva Life Insurance Company India Ltd.">Aviva Life Insurance Company India Ltd.</option>
                                            <option value="Bajaj Allianz General Insurance Co. Ltd">Bajaj Allianz General Insurance Co. Ltd</option>
                                            <option value="Bajaj Allianz Life Insurance Co. Ltd.">Bajaj Allianz Life Insurance Co. Ltd.</option>
                                            <option value="Bharti AXA Life Insurance Company Ltd">Bharti AXA Life Insurance Company Ltd</option>
                                            <option value="Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited">Canara HSBC Oriental Bank of Commerce Life Insurance Company Limited</option>
                                            <option value="Care Health Insurance Ltd">Care Health Insurance Ltd</option>
                                            <option value="Cholamandalam MS General Insurance Co. Ltd">Cholamandalam MS General Insurance Co. Ltd</option>
                                            <option value="ECGC Ltd.">ECGC Ltd.</option>
                                            <option value="Edelweiss General Insurance Company Limited ">Edelweiss General Insurance Company Limited </option>
                                            <option value="Edelweiss Tokio Life Insurance Company Limited">Edelweiss Tokio Life Insurance Company Limited</option>
                                            <option value="Exide Life Insurance Co. Ltd">Exide Life Insurance Co. Ltd</option>
                                            <option value="Future Generali India Insurance Co. Ltd.">Future Generali India Insurance Co. Ltd.</option>
                                            <option value="Future Generali India Life Insurance Company Limited">Future Generali India Life Insurance Company Limited</option>
                                            <option value="Go Digit General Insurance Limited">Go Digit General Insurance Limited</option>
                                            <option value="HDFC ERGO General Insurance Co. Ltd">HDFC ERGO General Insurance Co. Ltd</option>
                                            <option value="HDFC Life Insurance Co. Ltd">HDFC Life Insurance Co. Ltd</option>
                                            <option value="ICICI Lombard General Insurance Co. Ltd.">ICICI Lombard General Insurance Co. Ltd.</option>
                                            <option value="ICICI Prudential Life Insurance Co. Ltd.">ICICI Prudential Life Insurance Co. Ltd.</option>
                                            <option value="IDBI Federal Life Insurance Company Limited">IDBI Federal Life Insurance Company Limited</option>
                                            <option value="IFFCO-TOKIO General Insurance Co. Ltd.">IFFCO-TOKIO General Insurance Co. Ltd.</option>
                                            <option value="IndiaFirst Life Insurance Company Ltd.">IndiaFirst Life Insurance Company Ltd.</option>
                                            <option value="Kotak Mahindra General insurance co. Ltd.">Kotak Mahindra General insurance co. Ltd.</option>
                                            <option value="Kotak Mahindra Life Insurance Co. Ltd.">Kotak Mahindra Life Insurance Co. Ltd.</option>
                                            <option value="Liberty  General Insurance Co. Ltd.">Liberty  General Insurance Co. Ltd.</option>
                                            <option value="Life Insurance Corporation of India">Life Insurance Corporation of India</option>
                                            <option value="Magma HDI General Insurance Co. Ltd.">Magma HDI General Insurance Co. Ltd.</option>
                                            <option value="Manipal Cigna Health Insurance Company Limited">Manipal Cigna Health Insurance Company Limited</option>
                                            <option value="Max Life Insurance Co. Ltd.">Max Life Insurance Co. Ltd.</option>
                                            <option value="National Insurance Co. Ltd.">National Insurance Co. Ltd.</option>
                                            <option value="Navi General Insurance Ltd">Navi General Insurance Ltd</option>
                                            <option value="Niva bupa health insurance company limited">Niva bupa health insurance company limited</option>
                                            <option value="PNB MetLife India Insurance Co. Ltd">PNB MetLife India Insurance Co. Ltd</option>
                                            <option value="Pramerica Life Insurance Co. Ltd.">Pramerica Life Insurance Co. Ltd.</option>
                                            <option value="Raheja QBE General Insurance Co. Ltd.">Raheja QBE General Insurance Co. Ltd.</option>
                                            <option value="Reliance General Insurance Co. Ltd.">Reliance General Insurance Co. Ltd.</option>
                                            <option value="Reliance Nippon Life Insurance Company">Reliance Nippon Life Insurance Company</option>
                                            <option value="Royal Sundaram General Insurance Co. Ltd">Royal Sundaram General Insurance Co. Ltd</option>
                                            <option value="Sahara India Life Insurance Co. Ltd.">Sahara India Life Insurance Co. Ltd.</option>
                                            <option value="SBI General Insurance Co. Ltd.">SBI General Insurance Co. Ltd.</option>
                                            <option value="SBI Life Insurance Co. Ltd.">SBI Life Insurance Co. Ltd.</option>
                                            <option value="Shriram General Insurance Co. Ltd.">Shriram General Insurance Co. Ltd.</option>
                                            <option value="Shriram Life Insurance Co. Ltd.">Shriram Life Insurance Co. Ltd.</option>
                                            <option value="Star Health & Allied Insurance Co. Ltd">Star Health & Allied Insurance Co. Ltd</option>
                                            <option value="Star Union Dai-Ichi Life Insurance Co. Ltd.">Star Union Dai-Ichi Life Insurance Co. Ltd.</option>
                                            <option value="TATA AIA Life Insurance Co. Ltd.">TATA AIA Life Insurance Co. Ltd.</option>
                                            <option value="Tata-AIG General Insurance Co. Ltd.">Tata-AIG General Insurance Co. Ltd.</option>
                                            <option value="The New India Assurance Co. Ltd.">The New India Assurance Co. Ltd.</option>
                                            <option value="The Oriental Insurance Co. Ltd.">The Oriental Insurance Co. Ltd.</option>
                                            <option value="United India Insurance Co. Ltd.">United India Insurance Co. Ltd.</option>
                                            <option value="Universal Sompo General Insurance Co. Ltd.">Universal Sompo General Insurance Co. Ltd.</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_type">Policy Type <span class="mandatory_field">*</span></label>
                                        <select id="policy_type" name="policy_type" class="form-control">
                                            <option value="">Select Policy Type</option>
                                            <option value="Health">Health</option>
                                            <option value="Life">Life</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="product_type">Product Type <span class="mandatory_field">*</span></label>
                                        <select id="product_type" name="product_type" class="form-control">
                                            <option value="">Select Product Type</option>
                                            <?php if ($allproduct_type != '' && count($allproduct_type) > 0) {
                                                foreach ($allproduct_type as $allproduct_type_data) {
                                                    ?>
                                            <option value="<?php echo $allproduct_type_data->name; ?>"><?php echo $allproduct_type_data->name; ?>
                                            </option>
                                            <?php } } ?>

                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="product_name">Name <span class="mandatory_field">*</span></label>
                                        <input id="product_name" name="product_name" type="text" class="form-control"
                                            placeholder="Enter Product Name" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_no">Policy Number <span class="mandatory_field">*</span></label>
                                        <input id="policy_no" name="policy_no" type="text" class="form-control"
                                            placeholder="Enter Policy Number" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_holder_name">Policy Holder Name <span class="mandatory_field">*</span></label>
                                        <input id="policy_holder_name" name="policy_holder_name" type="text" class="form-control"
                                            placeholder="Enter Policy Holder Name" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_start_date">Policy Start Date <span class="mandatory_field">*</span></label>
                                        <input id="policy_start_date" name="policy_start_date" type="date" class="form-control"
                                            placeholder="Enter Start Date" value="" />
                                    </div>


                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_end_date">Policy End Date <span class="mandatory_field">*</span></label>
                                        <input id="policy_end_date" name="policy_end_date" type="date" class="form-control"
                                            placeholder="Enter End Date" value="" />
                                    </div>

                                    <div class="form-group hideTPA">
                                       <label style="width:100%; margin:15px 0 5px;" for="tpa">TPA <span class="mandatory_field">*</span></label>
                                       <select id="tpa" name="tpa" class="form-control">
                                           <option value="">Select TPA</option>
                                           <?php foreach(TPA as $TPA){ ?>
                                             <option value="<?=$TPA?>"><?=$TPA?></option>
                                           <?php } ?>
                                       </select>
                                   </div>

                                   <!--  <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Page Url
                                            <span style="color:red"> *<span>
                                        </label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Page Url" value="" />
                                    </div>
                                     -->

                                     <div class="form-group hideTPA">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Tpa person name</label>
                                            <input id="tpa_person_name" name="tpa_person_name" type="text" class="form-control"
                                            placeholder="Enter Tpa person name" value="" />
                                    </div>

                                    <div class="form-group hideTPA">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Tpa person Mobile Number</label>

                                        <input id="tpa_person_mobile" name="tpa_person_mobile" type="number" class="form-control"
                                            placeholder="Enter Tpa person Mobile Number" value="" />
                                    </div>

                                    <div class="form-group hideTPA">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Tpa person Email Id </label>

                                        <input id="tpa_person_email" name="tpa_person_email" type="text" class="form-control"
                                            placeholder="Enter Tpa person Email Id" value="" />
                                    </div>


                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>policy/lists"
                                            class="submit btn bg-purple pull-right"
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
    if (product_type == 'GMC' || product_type == 'Parents Policy' || product_type == 'Top Up' || product_type =='Individual Health' || product_type =='Family Floater' || product_type =='Corona Care' || product_type =='Test'){
        if (tpa == '') {
            $("#error_msg1").html("Please Enter TPA.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }
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
            $('#error_msg1').html("Please enter valid Tpa Person email");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
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
</script>

<script type="text/javascript">
    $(document).ready(function() {
    $("#policy_start_date").change(function() {
        var oldDate = jQuery("#policy_start_date").val();
        //alert(oldDate);
        $("#policy_end_date").attr("min", oldDate);
        // $("#basic_discounting_date").attr("min", oldDate);
    }).change();

    $("#product_type").change(function() {
        var product_type = $(this).val();
        if(product_type == 'GPA' || product_type == 'GTL'){
          $('.hideTPA').hide();
        }else{
          $('.hideTPA').show();
        }
    });
});

</script>
