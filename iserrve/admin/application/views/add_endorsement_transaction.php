<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">

            <div class="topbar-left">

                <ol class="breadcrumb">

                    <li class="crumb-active"><a href="javascript:void(0);">Add Endorsement Transaction</a></li>

                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span

                                class="glyphicon glyphicon-home"></span></a></li>

                    <li class="crumb-link"><a href="<?php echo $base_url; ?>endorsement_transaction/lists">Endorsement Transaction</a></li>

                    <li class="crumb-trail">Add Endorsement Transaction</li>

                </ol>

            </div>

        </div>
        <div id="content">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel">

                        <div class="panel-heading"> <span class="panel-title"> <span

                                    class="glyphicon glyphicon-lock"></span> Add Endorsement Transaction </span> </div>

                        <div class="panel-body">

                            <?php if($this->session->flashdata('L_strErrorMessage')) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                            </div>
                            <?php }  ?>


                            <?php if($this->session->flashdata('flashError')!='') { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> </b> <?php echo $this->session->flashdata('flashError'); ?>
                            </div>
                            <?php }  ?>


                            <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b> &nbsp; </b><span id="error_msg1"></span>
                            </div>


                            <div class="col-md-12">

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>endorsement_transaction/add"
                                    enctype="multipart/form-data">

                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_endorsement_transaction">

                                    <input type="hidden" name="policy_hidden_radio" id="policy_hidden_radio" value="">

                                    <!-- <div class="col-md-12"> -->
                                        <div class="form-group">
                                            <label for="corporate_id" style="width:100%; margin:15px 0 5px;">Corporate <span class="mandatory_field">*</span></label>
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
                                    <!-- </div> -->

                                    <div class="form-group">
                                        <label for="cd_number_id">CD Number <span class="mandatory_field">*</span></label>
                                        <select id="cd_number_id" name="cd_number_id"
                                            class="form-control">
                                            <option value="">Select CD Number</option>
                                            <?php if ($all_cd_entry != '' && count($all_cd_entry) > 0) {
                                                foreach ($all_cd_entry as $all_cd_data) {
                                                    ?>
                                            <option value="<?php echo $all_cd_data->id; ?>"><?php echo $all_cd_data->cd_number; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>


                                        <div class="form-group">
                                            <label for="endorsement_type" style="width:100%; margin:15px 0 5px;">Endorsement Type <span class="mandatory_field">*</span></label>

                                            <input type="radio" name="policy_endorsement_entry" id="policy_endorsement_entry" value="0" onclick="radio_click(this.value);"> Cheque Entry

                                            <input type="radio" name="policy_endorsement_entry" id="policy_endorsement_entry" value="1" onclick="radio_click(this.value);"> Policy/Endorsement Entry

                                        </div>


                                    <div class="col-md-12" id="cheque_entry_field" style="display:none;">


                                        <div class="form-group rfa_multiple_select">
                                            <label for="policy_no">Policy Number <span class="mandatory_field">*</span></label>

                                            <span id="show_policy_number_cheque">
                                            <select id="policy_no_cheque" name="policy_no_cheque" class="form-control policy_blank"
                                            onChange="showUser(this.value)">
                                                <option value="">Select Policy No</option>
                                                <?php  if($allproduct_name !='' && count($allproduct_name) > 0){
                                                foreach($allproduct_name as $policy_no){ ?>
                                                <option value="<?php echo $policy_no->id; ?>"><?php echo $policy_no->policy_no; ?></option>
                                            <?php } }  ?>
                                            </select>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_type">Policy Type <span class="mandatory_field">*</span></label>
                                            <span id="product_type_ajax_cheque">
                                            <select id="product_type_cheque" name="product_type_cheque"
                                                class="form-control policy_blank" >
                                                <option value="">Select Policy Type</option>
                                                <?php if ($allproduct_type != '' && count($allproduct_type) > 0) {
                                                    foreach ($allproduct_type as $allproduct_type_data) {
                                                        ?>
                                                <option value="<?php echo $allproduct_type_data->id; ?>"><?php echo $allproduct_type_data->name; ?>
                                                </option>
                                                <?php } } ?>
                                            </select>
                                            </span>
                                        </div>


                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input id="bank_name" name="bank_name" type="text" class="form-control cheque_blank" placeholder="Enter Bank Name" />
                                        </div>

                                        <div class="form-group">
                                            <label for="cheque_utr_no">Cheque/UTR Number </label>
                                            <input id="cheque_utr_no" name="cheque_utr_no" type="text" class="form-control cheque_blank" placeholder="Enter Cheque/UTR Number" />
                                        </div>

                                        <div class="form-group">
                                            <label for="particular">Particular <span class="mandatory_field">*</span></label>
                                            <textarea id="particular" name="particular" type="text" class="form-control cheque_blank" placeholder="Enter Particular" value="" /></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Entry Date <span class="mandatory_field">*</span></label>
                                            <input type="date" id="date" name="date" class="form-control cheque_blank" placeholder="Date">
                                        </div>

                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="name">Upload Attachment</label>
                                            <input id="upload_file" name="upload_file" type="file" class="form-control cheque_blank" value="" />
                                        </div>

                                        <div class="form-group">
                                            <label>Entry Amount <span class="mandatory_field">*</span></label>
                                            <input type="number" id="amount" name="amount" class="form-control cheque_blank" placeholder="Enter Amount">
                                        </div>
                                    </div>


                                    <div class="col-md-12" id="policy_endor_entry" style="display:none;">

                                        <div class="form-group">
                                            <label for="particular">Particular <span class="mandatory_field">*</span></label>
                                            <textarea id="particular_policy" name="particular_policy" type="text" class="form-control policy_blank" placeholder="Enter Particular" value="" /></textarea>
                                        </div>




                                        <div class="form-group rfa_multiple_select">
                                            <label for="policy_no">Policy Number <span class="mandatory_field">*</span></label>

                                            <span id="show_policy_number">
                                            <select id="policy_no" name="policy_no" class="form-control policy_blank"
                                            onChange="showUser(this.value)">
                                                <option value="">Select Policy No</option>
                                                <?php  if($allproduct_name !='' && count($allproduct_name) > 0){
                                                foreach($allproduct_name as $policy_no){ ?>
                                                <option value="<?php echo $policy_no->id; ?>"><?php echo $policy_no->policy_no; ?></option>
                                            <?php } }  ?>
                                            </select>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_type">Policy Type <span class="mandatory_field">*</span></label>
                                            <span id="product_type_ajax">
                                            <select id="product_type" name="product_type"
                                                class="form-control policy_blank" >
                                                <option value="">Select Policy Type</option>
                                                <?php if ($allproduct_type != '' && count($allproduct_type) > 0) {
                                                    foreach ($allproduct_type as $allproduct_type_data) {
                                                        ?>
                                                <option value="<?php echo $allproduct_type_data->id; ?>"><?php echo $allproduct_type_data->name; ?>
                                                </option>
                                                <?php } } ?>
                                            </select>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label for="policy_start_date">Policy Start Date </label>
                                            <span id="prod1">
                                            <input id="policy_start_date" name="policy_start_date" type="date" class="form-control policy_blank"
                                                placeholder="Enter Start Date" value="" readonly/>
                                            </span>
                                        </div>


                                        <div class="form-group">
                                            <label for="policy_end_date">Policy End Date</label>
                                            <span id="prod1">
                                            <input id="policy_end_date" name="policy_end_date" type="date" class="form-control policy_blank"
                                                placeholder="Enter End Date" value="" readonly/>
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label>Endorsement Number <span class="mandatory_field">*</span></label>
                                            <input type="text" id="endorsement_no" name="endorsement_no_policy" class="form-control policy_blank" placeholder="Enter Endorsement Number">
                                        </div>

                                        <div class="form-group">
                                            <label>Employee Count <span class="mandatory_field">*</span></label>
                                            <input type="number" id="employee_count" name="employee_count_policy" class="form-control policy_blank" placeholder="Enter Employee Count">
                                        </div>

                                        <div class="form-group">
                                            <label>Dependent Count <span class="mandatory_field">*</span></label>
                                            <input type="number" id="dependent_count" name="dependent_count_policy" class="form-control policy_blank" placeholder="Enter Dependent Count">
                                        </div>

                                        <div class="form-group">
                                            <label for="transaction_type">Transaction Type <span class="mandatory_field">*</span></label>

                                            <select id="transaction_type_policy" name="transaction_type"
                                                class="form-control policy_blank">
                                                <option value="">Select Transaction Type</option>
                                                <option value="debit">Debit</option>
                                                <option value="credit">Credit</option>
                                                <option value="nil">Nil</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Entry Date <span class="mandatory_field">*</span></label>
                                            <input type="date" id="date_policy" name="date_policy" class="form-control policy_blank" placeholder="Date">
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Upload Attachment</label>
                                            <input id="upload_policy" name="upload_policy" type="file" class="form-control policy_blank" value="" />
                                        </div>

                                        <div class="form-group">
                                            <label for="net_premium">Net Premium <span class="mandatory_field">*</span></label>
                                            <input id="net_premium_policy" name="net_premium" type="number" class="form-control policy_blank" onkeyup="myFunction(this.value)" placeholder="Enter Net Premium" value="" />
                                        </div>


                                        <div class="form-group">
                                            <label for="gst">GST(in %)</label>
                                            <input id="gst_policy" name="gst" type="text" class="form-control" placeholder="Enter GST" value="18" readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label for="gross_premium_policy">Gross Premium</label>
                                            <span id="prod1">
                                            <input id="gross_premium_policy" name="gross_premium_policy" type="text" class="form-control policy_blank" value="" readonly/>
                                            </span>
                                        </div>

                                    </div>


                                    <!-- <div class="form-group">
                                        <label>Entry Date</label>
                                        <input type="date" id="startdate" name="date" class="form-control" placeholder="Date">
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label for="cd_account_name">CD Account Name</label>
                                        <input id="cd_account_name" name="cd_account_name" type="text" class="form-control" placeholder="Enter CD Number" />
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label for="particular">Particular</label>
                                        <textarea id="particular" name="particular" type="text" class="form-control"
                                            placeholder="Enter Short Particular" value="" /></textarea>
                                    </div>                                      -->

                                   <!-- <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Image (Size :415px X 310px)</label>
                                        <input id="image" name="image" type="file" class="form-control" value="" />
                                    </div> -->

                                    <!-- <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="description">Description</label>
                                        <textarea id="description" name="description" type="text" class="form-control"
                                            placeholder="Enter Description" value="" /></textarea>
                                    </div> -->



                                    <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="metakeywords">Meta Keywords </label>
                                            <input id="metakeywords" name="metakeywords" type="text" class="form-control" value=""  placeholder="Meta Keywords"/>
                                            <span id="metakeywordserror" class="valierror"></span>
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="width:100%; margin:15px 0 5px;" for="metadescription">Meta Description</label>
                                            <textarea id="metadescription" name="metadescription" class="form-control"
                                                placeholder="Meta Description"></textarea>
                                        </div>
                                    </div> -->




                                    <div class="form-group">

                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />

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


    if (( form.policy_endorsement_entry[0].checked == false ) && ( form.policy_endorsement_entry[1].checked == false ))
    {
        $("#error_msg1").html("Please Select Any One Type Of Entry");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }


    if (form.policy_endorsement_entry[0].checked == true){


        var policy_no = $("#policy_no_cheque").val();
        // alert(policy_no);
        if (policy_no == '') {
            $("#error_msg1").html("Please Select Policy Number.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var product_type = $("#product_type_cheque").val();
        if (product_type == '') {
            $("#error_msg1").html("Please Select Policy Type.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

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

        var policy_no = $("#policy_no").val();
        if (policy_no == '') {
            $("#error_msg1").html("Please Select Policy Number.");
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

    // var cd_account_name = $("#cd_account_name").val();
    // if(cd_account_name == ''){
    //     $("#error_msg1").html("Please Enter CD Account Name.");
    //     $("#validator").css("display","block");
    //     return false;
    // }


}





function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 45 || unicode > 57) //if not a number
            return false //disable key press
    }
}
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


<?php include('include/footer.php');?>
<link href="<?php echo $base_url_views; ?>css/fSelect.css" rel="stylesheet">
<link href="<?php echo $base_url_views; ?>css/mediaBoxes.css" rel="stylesheet">
<script src="<?php echo $base_url_views; ?>js/fSelect.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.dropdown.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.js"></script>
<script>
$('.multiple-select').fSelect();
$('.fs-label').html('Select Product');



function radio_click(val){

    $("#policy_hidden_radio").val(val);
     if(val == 0){
         $('#cheque_entry_field').show();

         showpolicy_new('',val);
     }else{
        $('#cheque_entry_field').hide();
        $('.policy_blank').val('');
        // $('#product_type').val('');
        // $('#policy_no').val('');

     }

     if(val == 1){
        $('#policy_endor_entry').show();
        showpolicy_new('',val);
     }else{
        $('#policy_endor_entry').hide();
        $('.cheque_blank').val('');
        // $('#cheque_utr_no').val('');

     }


 }


 function showpolicy_new(pro_id,val){
     // alert(pro_id);


         var pro_id = $('#corporate_id').val();


        var url = '<?php echo $base_url; ?>endorsement_transaction/show_policy_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id + '&radio_val=' + val,
            success: function(msg){

                if(val == 1){
                    document.getElementById('show_policy_number').innerHTML = msg;
                }else{
                    document.getElementById('show_policy_number_cheque').innerHTML = msg;
                }
                //show_cd_Number(pro_id);
            }
        });
    }



 function showpolicy(pro_id,val){
     // alert(pro_id);


         var pro_id = $('#corporate_id').val();


        var url = '<?php echo $base_url; ?>endorsement_transaction/show_policy_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id + '&radio_val=' + val,
            success: function(msg){

                if(val == 1){
                    document.getElementById('show_policy_number').innerHTML = msg;
                }else{
                    document.getElementById('show_policy_number_cheque').innerHTML = msg;
                }
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


        //   alert(radio_value);exit;

        var url = '<?php echo $base_url; ?>endorsement_transaction/get_policy_start_date';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                //  alert(msg);


                $('#policy_start_date').val(msg);

                policy_end_date(pro_id);
                get_product_type(pro_id);
                // document.getElementById('prod1').innerHTML = msg;
            }

        });
    }

    function get_product_type(pro_id){
       //var radio_value = $('#policy_endorsement_entry').val();
       var policy_hidden_radio = $('#policy_hidden_radio').val();

        // alert(policy_hidden_radio);
       var url = '<?php echo $base_url; ?>endorsement_transaction/get_product_type';

       $.ajax({
           url : url,
           type : 'post',
           data : 'pro_id=' + pro_id + '&policy_hidden_radio=' + policy_hidden_radio,
           success: function(msg){
               //$('#insurer').val(msg);
               //alert(msg)

                if(policy_hidden_radio == 1){
                    document.getElementById('product_type_ajax').innerHTML = msg;
                }else{
                    document.getElementById('product_type_ajax_cheque').innerHTML = msg;
                }
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

</body>
</html>
