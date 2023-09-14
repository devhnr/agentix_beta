<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add Endorsement Rack Rates</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>endorsement_rack_rates/lists">Endorsement Rack Rates</a></li>
                    <li class="crumb-trail">Add a Endorsement Rack Rates</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Endorsement Rack Rates</span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>endorsement_rack_rates/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_endorsement_rack_rates">


                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="corporate_id" style="width:100%; margin:15px 0 5px;"> Select Corporate <span class="mandatory_field">*</span></label>
                                        <select id="corporate_id" name="corporate_id"
                                            class="form-control" onChange="showpolicy(this.value)">
                                            <option value="">Select Corporate</option>
                                            <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                foreach ($allcorporate as $corporate) {
                                                    ?>
                                            <option value="<?php echo $corporate->id; ?>"><?php echo $corporate->co_name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>

                                   

                                <div class="col-md-6">
                                    <div class="form-group rfa_multiple_select">
                                        <label for="policy_no" style="width:100%; margin:15px 0 5px;">Policy Number <span class="mandatory_field">*</span></label>

                                        <span id="show_policy_number">
                                        <select id="policy_no" name="policy_no" class="form-control multiple-select" onChange="showproduct_name(this.value)">
                                            <option value="">Select Policy No</option>
                                                     
                                        </select>
                                        </span>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sum_insured" style="width:100%; margin:15px 0 5px;">Sum Insured <span class="mandatory_field">*</span></label>
                                        <span id="suminsure">
                                        <select id="sum_insured" name="sum_insured"
                                            class="form-control"  onChange="get_sum_insure_val(this.value)">
                                            <option value="">Select Sum Insured</option>
                                            <?php if ($allsum_insured != '' && count($allsum_insured) > 0) {
                                                foreach ($allsum_insured as $sum_insured_data) {
                                                    ?>
                                            <option value="<?php echo $sum_insured_data->id; ?>"><?php echo $sum_insured_data->sum_insured; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endorsement_type" style="width:100%; margin:15px 0 5px;">Endorsement Type <span class="mandatory_field">*</span></label>
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="Family Wise" onclick="radio_click(this.value);"> Family Wise
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="Per Life Wise" onclick="radio_click(this.value);"> Per Life Wise

                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="GPA" onclick="radio_click(this.value);"> GPA
                                                
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="GTL" onclick="radio_click(this.value);"> GTL

                                    </div>
                                </div>

                                <input type="hidden" name="add_more_count" id="add_more_count" value="0" >

                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="categoryname"> Age From <span class="mandatory_field">*</span></label>
                                            <input id="agefrom_0" name="agefrom[]" type="number" class="form-control"
                                                placeholder="Enter  Age From" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ageto"> Age To <span class="mandatory_field">*</span></label>
                                            <input id="ageto_0" name="ageto[]" type="number" class="form-control"
                                                placeholder="Enter  Age To" />
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="rate_in_mili_section" style="display:none;">
                                        <div class="form-group">
                                            <label for="rate_in_mili">Rate In Mili <span class="mandatory_field">*</span></label>
                                            <input id="rate_in_mili_0" name="rate_in_mili[]" type="number" class="form-control"
                                                placeholder="Enter Rate In Mili" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="annual_premium">Annual Premium <span class="mandatory_field">*</span></label>
                                            <input id="annual_premium_0" name="annual_premium[]" type="number" class="form-control annual_premium"
                                                placeholder="Enter Annual Premium" />
                                        </div>
                                    </div>
                                </div>
                                <div class="input_fields_wrap12">
                                </div>

                                <div class="form-group" id="add_more_button">
                                    <div class="col-sm-12">
                                        <button
                                            style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                            class="submit btn bg-purple pull-right" type="button"
                                            id="add_field_button12">New Group <i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            
                                <input type="hidden" name="suminsure_hidden" id="suminsure_hidden" value="0">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="test_validate" class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>endorsement_rack_rates/lists"
                                            class="submit btn bg-purple pull-right"
                                            style="margin-right: 10px;" />Cancel</a>
                                    </div>
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
        $("#error_msg1").html("Please Select Sum Insured.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    if (    ( form.endorsement_type[0].checked == false ) && 
            ( form.endorsement_type[1].checked == false ) &&
            ( form.endorsement_type[2].checked == false ) &&
            ( form.endorsement_type[3].checked == false )
        )
    {
        $("#error_msg1").html("Please Select Endorsement Type");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var agefrom_0 = $("#agefrom_0").val();
    if (agefrom_0 == '') {
        $("#error_msg1").html("Please Enter Age From.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var ageto_0 = $("#ageto_0").val();
    if (ageto_0 == '') {
        $("#error_msg1").html("Please Enter Age To.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    if ( ( form.endorsement_type[2].checked == true ) ||
            ( form.endorsement_type[3].checked == true )
        )
    {
        var rate_in_mili_0 = $("#rate_in_mili_0").val();
        if (rate_in_mili_0 == '') {
            $("#error_msg1").html("Please Enter Rates In Mili.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

    }

    var annual_premium_0 = $("#annual_premium_0").val();
    if (annual_premium_0 == '') {
        $("#error_msg1").html("Please Enter Annual Premium.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }


    if (form.endorsement_type[0].checked == true|| form.endorsement_type[1].checked == true ){

        var add_more_count = $("#add_more_count").val();
    // alert(add_more_count);
        for (var i = 0; i < add_more_count; i++) {
            var test =  i + 1;

            var agefrom = $("#agefrom_"+ test).val();
            if (agefrom == '') {
                $("#error_msg1").html("Please Enter Age From.");
                $("#validator").css("display", "block");
                $('html, body').animate({
                    'scrollTop': $("#error_msg1").position().top
                });
                return false;
            }

            var ageto = $("#ageto_"+ test).val();
            if (ageto == '') {
                $("#error_msg1").html("Please Enter Age To.");
                $("#validator").css("display", "block");
                $('html, body').animate({
                    'scrollTop': $("#error_msg1").position().top
                });
                return false;
            }

            var annual_premium = $("#annual_premium_"+ test).val();
            if (annual_premium == '') {
                $("#error_msg1").html("Please Enter Annual Premium.");
                $("#validator").css("display", "block");
                $('html, body').animate({
                    'scrollTop': $("#error_msg1").position().top
                });
                return false;
            }
            //alert(i+1);
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


<script type = "text/javascript">
    function showUser(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_rack_rates/show_policy_number';

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
        var url = '<?php echo $base_url; ?>endorsement_rack_rates/show_policy_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                document.getElementById('show_policy_number').innerHTML = msg;
            }
        });
    }

    function get_sum_insure_val(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_rack_rates/get_sum_insure_val';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){

                $('#suminsure_hidden').val(msg);
                //document.getElementById('show_policy_number').innerHTML = msg;
            }
        });
    }

    

    function showproduct_name(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_rack_rates/get_policy_data';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){

                
                get_suminsurence(pro_id);
                $('#product_name').val(msg);
                //alert(msg)
                //document.getElementById('prod1').innerHTML = msg;
            }
        });
    }


    function get_suminsurence(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_rack_rates/get_policy_suminsurance';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                //$('#insurer').val(msg);
                //alert(msg)
                document.getElementById('suminsure').innerHTML = msg;
            }
        });
    }



    
    

</script>

<script type="text/javascript" src="<?php echo $base_url_views; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">


function check_box_click(id, value){
    if (value.checked){
        $('#checkbox_hidden_' + id).val(1);
   }else{
        $('#checkbox_hidden_' + id).val(0);
   }
}

function check_box_radio_click(id, value){
    if (value.checked){
        $('#checkbox_radio_hidden_' + id).val(1);
   }else{
        $('#checkbox_radio_hidden_' + id).val(0);
   }
}

function check_box_radio_att_click(id, value){

    //alert('sd');
    if (value.checked){
        $('#checkbox_radio_att_hidden_' + id).val(1);
   }else{
        $('#checkbox_radio_att_hidden_' + id).val(0);
   }
}


function radio_hide_show_Attrdiv(id, value){
    
    if(value == 'Yes' || value == 'yes'){
        $('#hide_radio_attr' + id).show();
        
    }else{
        $('#hide_radio_attr' + id).hide();
    }
}

function radio_click(val){
     
    if(val == 'GPA' || val == 'GTL'){
        $('#rate_in_mili_section').show();
        $("#add_more_button").css("display", "none");
        $(".input_fields_wrap12").css("display", "none");
        $(".annual_premium").attr("readonly", true);
        
    }else{
        $("#add_more_button").css("display", "block");
        $(".input_fields_wrap12").css("display", "block");
        $('#rate_in_mili_section').hide();
        $(".annual_premium").attr("readonly", false);
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
            $(wrapper).append('<div class="col-md-12"><div class="col-md-2"><div class="form-group">           <label for="categoryname"> Age From <span class="mandatory_field">*</span></label><input id="agefrom_'+ b +'" name="agefrom[]" type="number" class="form-control"  placeholder="Enter  Age From" /> </div> </div><div class="col-md-2"><div class="form-group"> <label for="ageto"> Age To <span class="mandatory_field">*</span></label> <input id="ageto_'+ b +'" name="ageto[]" type="number" class="form-control" placeholder="Enter  Age To" /></div></div>           <div class="col-md-2" id="rate_in_mili_section" style="display:none;"><div class="form-group"><label for="rate_in_mili">Rate In Mili <span class="mandatory_field">*</span></label>           <input id="rate_in_mili_'+ b +'" name="rate_in_mili[]" type="number" class="form-control"               placeholder="Enter Rate In Mili" /></div></div>        <div class="col-md-2"><div class="form-group"> <label for="annual_premium">Annual Premium <span class="mandatory_field">*</span></label><input id="annual_premium_'+ b +'" name="annual_premium[]" type="number" class="form-control"  placeholder="Enter Annual Premium" /></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 110px; margin-top: 24px;">Remove</a></div>'
            );

            $('#add_more_count').val(b);

    
                $("input[name='endorsement_type']").click(function() {
                    var test = $(this).val();
                    if(test == 'GPA' || test == 'GTL'){
                        $('#rate_in_mili_section').show();
                        
                    }else{
                       
                        $('#rate_in_mili_section').hide();
                    }
                
                }); 
           
        }

        
    });
    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $('#add_more_count').val(b-1);
        $(this).parent('div').remove();
        b--;
    })
});

$(document).ready(function() {
    $("#rate_in_mili_0").keyup(function() {
        var dInput = $(this).val();
        var suminsure = $('#suminsure_hidden').val()

        var total = dInput / 1000 * suminsure;

        $('#annual_premium_0').val(total.toFixed(2));
       // alert(total);
        //$(".dDimension:contains('" + dInput + "')").css("display","block");
    });
});
</script>