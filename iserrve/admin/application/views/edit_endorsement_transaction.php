<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">

        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Endorsement Transaction</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>endorsement_transaction/lists">Endorsement Transaction</a></li>

                    <li class="crumb-trail">Edit Endorsement Transaction</li>

                </ol>

            </div>

        </div>

        <div id="content">

            <div class="row">

                <div class="col-md-12">


                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Edit Endorsement Transaction</span> </div>

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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>endorsement_transaction/edit/<?php echo $id; ?>" enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_endorsement_transaction">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

                                    <!-- <div class="col-md-6"> -->
                                    <div class="form-group">
                                        <label for="corporate_id">Select Corporate</label>
                                        <select id="corporate_id" name="corporate_id"
                                            class="form-control" onChange="showpolicy(this.value)">
                                            <option value="">Select Corporate</option>
                                            <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                foreach ($allcorporate as $corporate) {
                                                    ?>
                                            <option value="<?php echo $corporate->id; ?>" <?php if ($corporate->id == $corporate_id) {
                                                echo "selected";
                                            } ?>><?php echo $corporate->co_name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
									<!-- </div> -->

                                    <div class="form-group">
                                        <label for="cd_number_id">CD Number</label>
                                        <select id="cd_number_id" name="cd_number_id"
                                            class="form-control">
                                            <option value="">Select CD Number</option>
                                            <?php if ($all_cd_entry_new != '' && count($all_cd_entry_new) > 0) {
                                                foreach ($all_cd_entry_new as $all_cd_data_edit) {
                                                    ?>
                                            <option value="<?php echo $all_cd_data_edit->id; ?>" <?php if ($all_cd_data_edit->id == $cd_number_id) {
                                            echo "selected";
                                        } ?>><?php echo $all_cd_data_edit->cd_number; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label for="endorsement_type" style="width:100%; margin:15px 0 5px;">Endorsement Type</label> -->

                                            <input type="radio" name="policy_endorsement_entry" id="cheque_entry" value="0" onclick="radio_click(this.value);" <?php if($policy_endorsement_entry == 0){echo "checked"; } ?>> Cheque Entry

                                            <input type="radio" name="policy_endorsement_entry" id="policy_endorsement_entry" value="1" onclick="radio_click(this.value);"<?php if($policy_endorsement_entry == 1){ echo "checked";}?>> Policy/Endorsement Entry

                                        </div>
                                    </div>


                                    <div class="col-md-12" id="cheque_entry_field" style="display:none;">
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input id="bank_name" name="bank_name" type="text" class="form-control cheque_blank" placeholder="Enter Bank Name" value="<?php echo $bank_name; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="cheque_utr_no">Cheque/UTR Number</label>
                                            <input id="cheque_utr_no" name="cheque_utr_no" type="text" class="form-control cheque_blank" placeholder="Enter Cheque/UTR Number" value="<?php echo $cheque_utr_no; ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="particular">Particular</label>
                                            <textarea id="particular" name="particular" type="text" class="form-control cheque_blank" placeholder="Enter Particular" value="" /><?php echo $particular; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Entry Date</label>
                                            <input type="date" id="date" name="date" class="form-control cheque_blank" placeholder="Date" value="<?php echo $date; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="name">Upload Attachment</label>
                                            <input id="upload_file" name="upload_file" type="file" class="form-control cheque_blank"/>
                                            <?php if($document != ''){?>
                                                <a target="_blank" href="<?php echo $front_base_url; ?>upload/endor_trans/<?php echo $upload_file; ?>">View Document</a>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Entry Amount</label>
                                            <input type="number" id="amount" name="amount" class="form-control cheque_blank" placeholder="Enter Amount" value="<?php echo $amount; ?>">
                                        </div>
                                    </div>


                                    <div class="col-md-12" id="policy_endor_entry" style="display:none;">

                                        <div class="form-group">
                                            <label for="particular">Particular</label>
                                            <textarea id="particular_policy" name="particular_policy" type="text" class="form-control policy_blank" placeholder="Enter Particular" value="" /><?php echo $particular_policy; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_type">Policy Type</label>

                                            <select id="product_type" name="product_type"
                                                class="form-control policy_blank" onChange="show_form_data(this.value)">
                                                <option value="">Select Policy Type</option>
                                                <?php if ($allproduct_type != '' && count($allproduct_type) > 0) {
                                                    foreach ($allproduct_type as $allproduct_type_data) {
                                                        ?>
                                                <option value="<?php echo $allproduct_type_data->id; ?>" <?php if ($allproduct_type_data->id == $product_type) {
                                            echo "selected";
                                        } ?>><?php echo $allproduct_type_data->name; ?>
                                                </option>
                                                <?php } } ?>
                                            </select>
                                        </div>


                                        <div class="form-group rfa_multiple_select">
                                            <label for="policy_no">Policy Number</label>

                                            <span id="show_policy_number">
                                            <select id="policy_no" name="policy_no" class="form-control policy_blank"
                                            onChange="showUser(this.value)">
                                                <option value="">Select Policy No</option>
                                                <?php  if($allproduct_name_new !='' && count($allproduct_name_new) > 0){
                                                foreach($allproduct_name_new as $policy_no_data_new){ ?>
                                                <option value="<?php echo $policy_no_data_new->id; ?>" <?php if($policy_no_data_new->policy_no == $policy_no){ echo "selected";} ?>><?php echo $policy_no_data_new->policy_no; ?></option>
                                            <?php } }  ?>
                                            </select>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="policy_start_date">Policy Start Date</label>
                                            <span id="prod1">
                                            <input id="policy_start_date" name="policy_start_date" type="date" class="form-control policy_blank"
                                                placeholder="Enter Start Date" value="<?php echo $policy_start_date; ?>" readonly/>
                                            </span>
                                        </div>


                                        <div class="form-group">
                                            <label for="policy_end_date">Policy End Date</label>
                                            <span id="prod1">
                                            <input id="policy_end_date" name="policy_end_date" type="date" class="form-control policy_blank"
                                                placeholder="Enter End Date" value="<?php echo $policy_end_date; ?>" readonly/>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label>Endorsement Number</label>
                                            <input type="text" id="endorsement_no" name="endorsement_no_policy" class="form-control policy_blank" placeholder="Enter Endorsement Number" value="<?php echo $endorsement_no_policy; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Employee Count</label>
                                            <input type="number" id="employee_count" name="employee_count_policy" class="form-control policy_blank" placeholder="Enter Employee Count" value="<?php echo $employee_count_policy; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Dependent Count</label>
                                            <input type="number" id="dependent_count" name="dependent_count_policy" class="form-control policy_blank" placeholder="Enter Dependent Count" value="<?php echo $dependent_count_policy; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="transaction_type">Transaction Type</label>

                                            <select id="transaction_type_policy" name="transaction_type"
                                                class="form-control policy_blank">
                                                <option value="">Select Transaction Type</option>
                                                <option value="debit" <?php if($transaction_type == "debit"){ echo "selected";} ?>>Debit</option>
                                                <option value="credit" <?php if($transaction_type == "credit"){ echo "selected";} ?>>Credit</option>
                                                <option value="nil" <?php if($transaction_type == "nil"){ echo "selected";} ?>>Nil</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Entry Date</label>
                                            <input type="date" id="startdate" name="date_policy" class="form-control policy_blank" placeholder="Date" value="<?php echo $date_policy; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Upload Attachment</label>
                                            <input id="upload_policy" name="upload_policy" type="file" class="form-control policy_blank" value="" />
                                        </div>

                                        <div class="form-group">
                                            <label for="net_premium">Net Premium</label>
                                            <input id="net_premium_policy" name="net_premium" type="number" class="form-control policy_blank" onkeyup="myFunction(this.value)" placeholder="Enter Net Premium" value="<?php echo $net_premium; ?>" />
                                        </div>


                                        <div class="form-group">
                                            <label for="gst">GST(in %)</label>
                                            <input id="gst_policy" name="gst" type="text" class="form-control" placeholder="Enter GST" value="18" readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label for="gross_premium_policy">Gross Premium</label>
                                            <span id="prod1">
                                            <input id="gross_premium_policy" name="gross_premium_policy" type="text" class="form-control policy_blank" value="<?php echo $gross_premium_policy;?>" readonly/>
                                            </span>
                                        </div>

                                    </div>

                            </div>

                            <div class="form-group">

                                <input class="submit btn bg-purple pull-right" type="submit" value="Update" onclick="javascript:validate();return false;" />

                                <a href="<?php echo $base_url;?>endorsement_transaction/lists" class="submit btn bg-purple pull-right"
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
    var corporate_id = $("#corporate_id").val();
    if(corporate_id == ''){
        $("#error_msg1").html("Please Select Corporate Name.");
        $("#validator").css("display","block");
        return false;
    }

    var cd_number = $("#cd_number_id").val();
    if(cd_number == ''){
        $("#error_msg1").html("Please Enter CD Number.");
        $("#validator").css("display","block");
        return false;
    }


    if (form.policy_endorsement_entry[0].checked == true){

        var bank_name = $("#bank_name").val();
        // if (bank_name == '') {
        //     $("#error_msg1").html("Please Enter Bank Name.");
        //     $("#validator").css("display", "block");
        //     $('html, body').animate({
        //         'scrollTop': $("#error_msg1").position().top
        //     });
        //     return false;
        // }

        var cheque_utr_no = $("#cheque_utr_no").val();
        // if (cheque_utr_no == '') {
        //     $("#error_msg1").html("Please Enter Cheque/UTR Number.");
        //     $("#validator").css("display", "block");
        //     $('html, body').animate({
        //         'scrollTop': $("#error_msg1").position().top
        //     });
        //     return false;
        // }

        var particular = $("#particular").val();
        if (particular == '') {
            $("#error_msg1").html("Please Enter Particular.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var date = $("#date").val();
        if (date == '') {
            $("#error_msg1").html("Please Enter Date.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        // var upload_file = $("#upload_file").val();
        // if (upload_file == '') {
        //     $("#error_msg1").html("Please Select File.");
        //     $("#validator").css("display", "block");
        //     $('html, body').animate({
        //         'scrollTop': $("#error_msg1").position().top
        //     });
        //     return false;
        // }

        var amount = $("#amount").val();
        if (amount == '') {
            $("#error_msg1").html("Please Enter Amount.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }


        $('#form').submit();
    }
        if (form.policy_endorsement_entry[1].checked == true){


        var particular_policy = $("#particular_policy").val();
        if (particular_policy == '') {
            $("#error_msg1").html("Please Enter Particular.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }


        var product_type = $("#product_type").val();
        if (product_type == '') {
            $("#error_msg1").html("Please Select Policy Type.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var policy_no = $("#policy_no").val();
        if (policy_no == '') {
            $("#error_msg1").html("Please Select Policy Number.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var endorsement_no = $("#endorsement_no").val();
        if (endorsement_no == '') {
            $("#error_msg1").html("Please Enter Endorsement Number.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }


        var employee_count = $("#employee_count").val();
        if (employee_count == '') {
            $("#error_msg1").html("Please Enter Employee Count.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }


        var dependent_count = $("#dependent_count").val();
        if (dependent_count == '') {
            $("#error_msg1").html("Please Enter Dependent Count.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var transaction_type_policy = $("#transaction_type_policy").val();
        if (transaction_type_policy == '') {
            $("#error_msg1").html("Please Enter Transaction Type.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var date_policy = $("#date_policy").val();
        if (date_policy == '') {
            $("#error_msg1").html("Please Enter Date.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var net_premium_policy = $("#net_premium_policy").val();
        if (net_premium_policy == '') {
            $("#error_msg1").html("Please Enter Net Primium Policy.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        $('#form').submit();
    }
}



function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 45 || unicode > 57) //if not a number
            return false //disable key press
    }
}


function radio_click(val){
    //  alert(val);
     if(val == 0){
         $('#cheque_entry_field').show();
         $('.policy_blank').val('');
     }else{
        $('#cheque_entry_field').hide();
        $('.policy_blank').val('');
        // $('#product_type').val('');
        // $('#policy_no').val('');

     }

     if(val == 1){
        $('#policy_endor_entry').show();
        $('.cheque_blank').val('');
     }else{
        $('#policy_endor_entry').hide();
        $('.cheque_blank').val('');
        // $('#cheque_utr_no').val('');

     }

 }

 <?php if($policy_endorsement_entry == 0){?>
        $("#cheque_entry_field").css("display", "block");
    <?php } ?>

 <?php if($policy_endorsement_entry == 1){?>
        $("#policy_endor_entry").css("display", "block");
    <?php } ?>



 function showpolicy(pro_id){
        //  alert(pro_id);
        var url = '<?php echo $base_url; ?>endorsement_transaction/show_policy_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                document.getElementById('show_policy_number').innerHTML = msg;
                show_cd_Number(pro_id);
            }
        });
    }


    function show_cd_Number(pro_id){
        //   alert(pro_id);
        var url = '<?php echo $base_url; ?>endorsement_transaction/show_cd_Number_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                document.getElementById('cd_number_id').innerHTML = msg;

            }
        });
    }


    function showUser(pro_id){
        //  alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_transaction/get_policy_start_date';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                //  alert(msg);


                $('#policy_start_date').val(msg);

                policy_end_date(pro_id);
                // document.getElementById('prod1').innerHTML = msg;
            }

        });
    }


    function policy_end_date(pro_id){

            //alert(pro_id);

            var url = '<?php echo $base_url; ?>endorsement_transaction/show_policy_end_date';

            $.ajax({
                url : url,
                type : 'post',
                data : 'pro_id=' + pro_id,
                success: function(msg){
                    //alert(msg);

                    $('#policy_end_date').val(msg);
                    //policy_date(pro_id);
                    //document.getElementById('prod1').innerHTML = msg;
                }

            });

            }

    function myFunction(val){
        // alert(val);
        var gross_premium = val * 1.18;

        // alert(gross_premium);

        $('#gross_premium_policy').val(gross_premium);


    }
</script>
