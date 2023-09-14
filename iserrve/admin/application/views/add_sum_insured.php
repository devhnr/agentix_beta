<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add Sum Insured</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>sum_insured/lists">Sum Insured</a></li>
                    <li class="crumb-trail">Add a Sum Insured</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Sum Insured</span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>sum_insured/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_sum_insured">


                                    <div class="form-group" style="display:none">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Insurer  <span class="mandatory_field">*</span></label>
                                        <select id="insurer_old" name="insurer_old" class="form-control">
                                            <option value="">Select Insurer</option>
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
                                            <option value="Go Digit General Insurance Limited">HDFC ERGO General Insurance Co. Ltd</option>
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
                                        <label for="corporate_id" style="width:100%; margin:15px 0 5px;">Corporate <span class="mandatory_field">*</span></label>
                                        <select id="corporate_id" name="corporate_id"
                                            class="form-control" onChange="showpolicy(this.value)">
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


                                    <div class="form-group rfa_multiple_select">
                                        <label for="policy_no" style="width:100%; margin:15px 0 5px;">Policy Number  <span class="mandatory_field">*</span></label>

                                        <span id="show_policy_number">
                                        <select id="policy_no" name="policy_no" class="form-control multiple-select"
                                         onChange="showproduct_name(this.value)">
                                            <option value="">Select Policy No</option>
                                            <?php  if($allproduct_name !='' && count($allproduct_name) > 0){
                                            foreach($allproduct_name as $policy_no){ ?>
                                            <option value="<?php echo $policy_no->id; ?>" <?php if ($policy_no->id == $this->session->userdata('policy_id_session')) {
                                                echo "selected"; } ?>><?php echo $policy_no->policy_no; ?></option>
                                        <?php } }  ?>
                                        </select>
                                        </span>
                                    </div>

                  									<?php

                  										if($this->session->userdata('policy_id_session') != ''){
                  											$data = $this->sum_insured_model->show_policy_number($this->session->userdata('policy_id_session'));

                  											$product_name_sess = $data[0]->product_name;
                  											$insurer_name_sess = $data[0]->insurer;
                  										}else{
                  											$product_name_sess = "";
                  											$insurer_name_sess = "";
                  										}

                  									?>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="product_name">Product Name  <span class="mandatory_field">*</span></label>
                                        <span id="show_product">
                                            <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo $product_name_sess;?>" readonly >

                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="insurer" >Insurer  <span class="mandatory_field">*</span></label>
                                        <span id="show_insurer">
                                            <input type="text" name="insurer" id="insurer" class="form-control" value="<?php echo $insurer_name_sess;?>" readonly>

                                        </span>
                                    </div>


                                    <input type="hidden" id="add_more_count" value="0" >

                                    <div class="form-group">
                                      <div class="col-sm-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="sum_insured">Sum Insured  <span class="mandatory_field">*</span></label>
                                        <input id="sum_insured" name="sum_insured[]" type="number" class="form-control"
                                            placeholder="Enter Sum Insured" value="" />
                                        </div>
                                    </div>

                                    <div class="input_fields_wrap12">
                                    </div>

                                    <div class="form-group" id="add_more_button">
                                        <div class="col-sm-8">
                                            <button
                                                style="border: medium none; line-height: 23px; margin-top: -43px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>








                                   <!--  <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Page Url
                                            <span style="color:red"> *<span>
                                        </label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Page Url" value="" />
                                    </div>
                                     -->
                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>sum_insured/lists"
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

    // var insurer= $("#insurer").val();
    // if (insurer == '') {
    //     //alert('Please Enter sum_insured ');
    //     $("#error_msg1").html("Please Select Insurer.");
    //     $("#validator").css("display", "block");
    //     $('html, body').animate({
    //         'scrollTop': $("#error_msg1").position().top
    //     });
    //     return false;
    // }
    var corporate_id = $("#corporate_id").val();
    if (corporate_id == '') {
        $("#error_msg1").html("Please Select Corporate.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    // var product_name = $("#product_name").val();
    // if (product_name == '') {
    //     $("#error_msg1").html("Please Select Product Name.");
    //     $("#validator").css("display", "block");
    //     $('html, body').animate({
    //         'scrollTop': $("#error_msg1").position().top
    //     });
    //     return false;
    // }

    var policy_no = $("#policy_no").val();
    if (policy_no == '') {
        $("#error_msg1").html("Please Select Policy Number.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }


    var sum_insured = $("#sum_insured").val();
    if (sum_insured == '') {
        $("#error_msg1").html("Please Enter Sum Insured.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
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


<script type = "text/javascript">
    function showUser(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>sum_insured/show_policy_number';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                document.getElementById('prod1').innerHTML = msg;
            }
        });
    }

    function showpolicy(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>sum_insured/show_policy_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                document.getElementById('show_policy_number').innerHTML = msg;
            }
        });
    }


    function showproduct_name(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>sum_insured/get_policy_data';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){

                showproduct_insurer(pro_id);
                $('#product_name').val(msg);
                //alert(msg)
                //document.getElementById('prod1').innerHTML = msg;
            }
        });
    }

    function showproduct_insurer(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>sum_insured/get_policy_insurer';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                $('#insurer').val(msg);
                //alert(msg)
                //document.getElementById('prod1').innerHTML = msg;
            }
        });
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
            $(wrapper).append('<div class="col-md-12"><div class="col-md-6"><div class="form-group"><label style="width:100%; margin:15px 0 5px;" for="sum_insured">Sum Insured  <span class="mandatory_field">*</span></label><input id="sum_insured_'+ b +'" name="sum_insured[]" type="number" class="form-control" placeholder="Enter Sum Insured" value="" /></div> </div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 285px; margin-top: 56px;"><i class="fa fa-minus"></i></a></div>'
            );

            $('#add_more_count').val(b);

        }


    });
    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $('#add_more_count').val(b-1);
        $(this).parent('div').remove();
        b--;
    })
});


</script>
