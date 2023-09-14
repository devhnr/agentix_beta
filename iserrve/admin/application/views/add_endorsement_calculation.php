<?php include('include/header.php');?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px 10px;
}
th {
  text-align: left;
}
</style>
<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Endorsement Calculation</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>endorsement_calculation/lists">Endorsement Calculation</a></li>
                    <li class="crumb-trail">Endorsement Calculation</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Endorsement Calculation</span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>endorsement_calculation/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_endorsement_calculation">


                                    
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
                                            <?php  if($allproduct_name !='' && count($allproduct_name) > 0){ 
                                            foreach($allproduct_name as $policy_no){ ?>
                                            <option value="<?php echo $policy_no->id; ?>"><?php echo $policy_no->policy_no; ?></option>      
                                        <?php } }  ?>             
                                        </select>
                                        </span>
                                    </div>
                                </div>
                                    
                              

                               

                                <div class="col-md-6">
                                <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_start_date">Policy Start Date</label>
                                        <span id="prod1">
                                        <input id="policy_start_date" name="policy_start_date" type="date" class="form-control"
                                            placeholder="Enter Start Date" value="" readonly/>
                                        </span>
                                    </div>
                                    </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="policy_end_date">Policy End Date</label>
                                        <span id="prod1">
                                        <input id="policy_end_date" name="policy_end_date" type="date" class="form-control"
                                            placeholder="Enter End Date" value="" readonly/>
                                        </span>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endorsement_type" style="width:100%; margin:15px 0 5px;">Endorsement Type <span class="mandatory_field">*</span></label>
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="Family Wise" onClick="radio_click(this.value)" > Family Wise
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="Per Life Wise" onClick="radio_click(this.value)"> Per Life Wise

                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="GPA" onClick="radio_click(this.value)"> GPA

                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="GTL" onClick="radio_click(this.value)"> GTL
                                      

                                    </div>
                                </div>
                                <div class="col-md-12">
                                <hr>
                                </div>

                                <div class="col-md-6">
                                    <h3>Addition Calculation</h3>
                                </div>

                                <div class="col-md-6">
                                    <input type="file" name="add_user" id="add_user" class="form-control">
                                    <a href="<?php echo $front_base_url; ?>upload/XLS_file/endorsement-template.xlsx">Download Template Format</a>
                                </div>

                                <div class="col-md-12" style="margin: 25px 0;">
                                    
                                <table style="width:100%" id="table_id">
                                    <tr>
                                        <th>Age Group</th>
                                        <th>Sum Insured</th>
                                        <th>Annual Premium</th>
                                        <th>Premium Per Day</th>
                                        <th>Count</th>
                                        <th>Addition Premium</th>

                                    </tr>
                                    <span id="age_group_new">
                                        
                                    </span>
                                    
                                    </table>

                                </div>

                                <div class="col-md-12">
                                <hr>
                                </div>

                                <div class="col-md-6">
                                    <h3>Deletion Calculation</h3>
                                </div>

                                <div class="col-md-6">
                                    <input type="file" name="delete_user" id="delete_user" class="form-control">
                                    <a href="<?php echo $front_base_url; ?>upload/XLS_file/endorsement-template.xlsx">Download Template Format</a>
                                </div>

                                <div class="col-md-12" style="margin: 25px 0;">
                                    
                                <table style="width:100%" id="table_id_deletion">
                                    <tr>
                                        <th>Age Group</th>
                                        <th>Sum Insured</th>
                                        <th>Annual Premium</th>
                                        <th>Premium Per Day</th>
                                        <th>Count</th>
                                        <th>Deletion Premium</th>

                                    </tr>
                                    <span id="age_group_new_deletion">
                                        
                                    </span>
                                    
                                    </table>

                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="total_additional_premium" style="width:100%; margin:15px 0 5px;">Total Addition Premium</label>
                                        <input type="number" name="total_additional_premium" id="total_additional_premium" class="form-control" placeholder="Enter Total Additional Premium" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="corporatotal_deletion_premiumte_id" style="width:100%; margin:15px 0 5px;">Total Deletion Premium</label>
                                        <input type="number" name="total_deletion_premium" id="total_deletion_premium" class="form-control" placeholder="Enter Total Deletion Premium " readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="net_premium" style="width:100%; margin:15px 0 5px;">Net Premium</label>
                                        <input type="number" name="net_premium" id="net_premium" class="form-control" placeholder="Enter Net Premium" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="net_premium" style="width:100%; margin:15px 0 5px;">Net Premium with GST</label>
                                        <input type="number" name="net_premium_with_gst" id="net_premium_with_gst" class="form-control" placeholder="Enter Net Premium With GST" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="endersoment_title" style="width:100%; margin:15px 0 5px;">Endersoment Title <span class="mandatory_field">*</span></label>
                                        <input type="text" name="endersoment_title" id="endersoment_title" class="form-control" placeholder="Enter Endersoment Title">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="endersoment_number" style="width:100%; margin:15px 0 5px;">Endersoment Number <span class="mandatory_field">*</span></label>
                                        <input type="text" name="endersoment_number" id="endersoment_number" class="form-control" placeholder="Enter Endersoment Number">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="endersoment_number" style="width:100%; margin:15px 0 5px;">Transaction Statement <span class="mandatory_field">*</span></label>
                                        <input type="text" name="transaction_statement" id="transaction_statement" class="form-control" placeholder="Enter Transaction Statement">
                                    </div>
                                </div>

<div class="col-sm-12">
                                                                                    <div class="admin-notes">
                                         <h5>Note:</h5>
                                         <ul class="">
                                             <li>The “relation” column for the employee should be mentioned as “Employee” and the Family wise sheet will only take "Employee" into account.</li>
                                             <li>Other fields like Sum Insured, and Age Group should match with the mentioned data in the Rack Rates module while uploading Excel Sheet..</li>
                                             <li>Date Format: dd-mm-yyyy.
</li>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>endorsement_calculation/lists"
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


    // var sum_insured = $("#sum_insured").val();
    // if (sum_insured == '') {
    //     $("#error_msg1").html("Please Select Sum Insured.");
    //     $("#validator").css("display", "block");
    //     $('html, body').animate({
    //         'scrollTop': $("#error_msg1").position().top
    //     });
    //     return false;
    // }

    if (    ( form.endorsement_type[0].checked == false ) && 
            ( form.endorsement_type[1].checked == false ) &&
            ( form.endorsement_type[2].checked == false ) &&
            (form.endorsement_type[3].checked == false )
        )
    {
        $("#error_msg1").html("Please Select Endorsement Type");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var add_user = $("#add_user").val();

    var delete_user = $("#delete_user").val();

    if(add_user == '' && delete_user == ''){

        $("#error_msg1").html("Please Upload Additional Or Deletion Calculation Sheet.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });

        return false;
    }

    if (!(/\.(xlsx|xls|xlsm|csv)$/i).test(add_user) || !(/\.(xlsx|xls|xlsm|csv)$/i).test(delete_user) ) {
        $("#error_msg1").html("Please upload valid excel file .xlsx, .xlsm, .xls, .csv only.");
        $("#validator").css("display", "block");
        $('html, body').animate({
        'scrollTop': $("#error_msg1").position().top
        });
        return false;
        }

    // var add_user = $("#add_user").val();
    // if (add_user == '') {
    //     $("#error_msg1").html("Please Upload Additional Calculation Sheet.");
    //     $("#validator").css("display", "block");
    //     $('html, body').animate({
    //         'scrollTop': $("#error_msg1").position().top
    //     });
    //     return false;
    // }

    // var delete_user = $("#delete_user").val();
    // if (delete_user == '') {
    //     $("#error_msg1").html("Please Upload Deletion Calculation Sheet.");
    //     $("#validator").css("display", "block");
    //     $('html, body').animate({
    //         'scrollTop': $("#error_msg1").position().top
    //     });
    //     return false;
    // }

    var endersoment_title = $("#endersoment_title").val();
    if (endersoment_title == '') {
        $("#error_msg1").html("Please Enter Endersoment Title");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var endersoment_number = $("#endersoment_number").val();
    if (endersoment_number == '') {
        $("#error_msg1").html("Please Enter Endersoment Number");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var transaction_statement = $("#transaction_statement").val();
    if (transaction_statement == '') {
        $("#error_msg1").html("Please Enter Transaction Statement");
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
<script src="jquery-1.10.2.min.js" type="text/javascript"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
<script type = "text/javascript">
    function showUser(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_calculation/show_policy_number';

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
        var url = '<?php echo $base_url; ?>endorsement_calculation/show_policy_using_corporate';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                document.getElementById('show_policy_number').innerHTML = msg;

                var endrosmenet_type = $('input[name="endorsement_type"]:checked').val();

                var excel_array = [];
                //console.log(excel_array);
                radio_click(endrosmenet_type,excel_array);
            }
        });
    }

    function get_sum_insure_val(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_calculation/get_sum_insure_val';

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
        var url = '<?php echo $base_url; ?>endorsement_calculation/get_policy_data';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                policy_date(pro_id);
                policy_end_date(pro_id);
                
                var endrosmenet_type = $('input[name="endorsement_type"]:checked').val();

                radio_click(endrosmenet_type);
            }
        });
    }

    function policy_date(pro_id){

    //alert(pro_id);

        var url = '<?php echo $base_url; ?>endorsement_calculation/show_policy_start_date';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){
                //alert(msg);

                $('#policy_start_date').val(msg);
                //policy_date(pro_id);
                //document.getElementById('prod1').innerHTML = msg;
            }

        });

    }

    function policy_end_date(pro_id){

        //alert(pro_id);

        var url = '<?php echo $base_url; ?>endorsement_calculation/show_policy_end_date';

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


        function radio_click(val,excel_array){

            var corporate = $('#corporate_id').val();
            var policy_no = $('#policy_no').val();
            var policy_end_date = $('#policy_end_date').val();
            //console.log(excel_array);
             
            //var excel_array_new = excel_array;

            var excel_array_new = JSON.stringify( excel_array );

            var url = '<?php echo $base_url; ?>endorsement_calculation/show_age_group';

            $.ajax({
                url : url,
                type : 'post',
                //data : 'corporate=' + corporate + '&policy_no=' + policy_no +'&val=' + val +'&excel_array=' + excel_array,
                data: {corporate:corporate,policy_no:policy_no,val:val,policy_end_date:policy_end_date,excel_array_new:excel_array_new},

                success: function(msg){
                    $("#table_id").find("tr:gt(0)").remove();
                    //document.getElementById('age_group_new').innerHTML = msg;
                    $('#table_id tbody').append(msg);

                    var total_addition_premium = $('#total_addition_premium_hidden').val();

                    var total_deletion_premium = $('#total_deletion_premium_hidden').val();

                    var net_premium = total_addition_premium - total_deletion_premium;
					
					var net_premium = net_premium.toFixed(2);

                    var net_premium_with_gst = net_premium* 1.18;
					
					
					var net_premium_with_gst = net_premium_with_gst.toFixed(2);

                    $('#total_additional_premium').val(total_addition_premium);
                    $('#total_deletion_premium').val(total_deletion_premium);
                    $('#net_premium').val(net_premium);
                    $('#net_premium_with_gst').val(net_premium_with_gst);
                }

            });

            var url = '<?php echo $base_url; ?>endorsement_calculation/show_age_group_deletion';
            var excel_array_new = [];
            $.ajax({
                url : url,
                type : 'post',
                data: {corporate:corporate,policy_no:policy_no,val:val,policy_end_date:policy_end_date,excel_array_new:excel_array_new},

                success: function(msg){
                    $("#table_id_deletion").find("tr:gt(0)").remove();
                    //document.getElementById('age_group_new').innerHTML = msg;
                    $('#table_id_deletion tbody').append(msg);

                    var total_addition_premium = $('#total_addition_premium_hidden').val();

                    var total_deletion_premium = $('#total_deletion_premium_hidden').val();

                    var net_premium = total_addition_premium - total_deletion_premium;

                    var net_premium_with_gst = net_premium* 1.18;

                    $('#total_additional_premium').val(total_addition_premium);
                    $('#total_deletion_premium').val(total_deletion_premium);
                    $('#net_premium').val(net_premium);
                    $('#net_premium_with_gst').val(net_premium_with_gst);
                }

            });


        }

        function radio_click_deletion(val,excel_array){

            var corporate = $('#corporate_id').val();
            var policy_no = $('#policy_no').val();
            var policy_end_date = $('#policy_end_date').val();
            //console.log(excel_array);
            
            //var excel_array_new = excel_array;

            var excel_array_new = JSON.stringify( excel_array );

           

            var url = '<?php echo $base_url; ?>endorsement_calculation/show_age_group_deletion';

            $.ajax({
                url : url,
                type : 'post',
                data: {corporate:corporate,policy_no:policy_no,val:val,policy_end_date:policy_end_date,excel_array_new:excel_array_new},

                success: function(msg){
                    $("#table_id_deletion").find("tr:gt(0)").remove();
                    //document.getElementById('age_group_new').innerHTML = msg;
                    $('#table_id_deletion tbody').append(msg);

                    var total_addition_premium = $('#total_addition_premium_hidden').val();

                    var total_deletion_premium = $('#total_deletion_premium_hidden').val();

                    var net_premium = total_addition_premium - total_deletion_premium;

                    var net_premium_with_gst = net_premium* 1.18;

                    $('#total_additional_premium').val(total_addition_premium);
                    $('#total_deletion_premium').val(total_deletion_premium);
                    $('#net_premium').val(net_premium);
                    $('#net_premium_with_gst').val(net_premium_with_gst);
                }

            });

            }


  $(document).ready(function(){

        $('#add_user').change(function(evt){
           // alert('sd');
           var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#add_user").val().toLowerCase())) {  
         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
         if ($("#add_user").val().toLowerCase().indexOf(".xlsx") > 0) {  
             xlsxflag = true;  
         }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") {  
             var reader = new FileReader();  
             reader.onload = function (e) {  
                 var data = e.target.result;  
                 /*Converts the excel data in to object*/  
                 if (xlsxflag) {  
                     var workbook = XLSX.read(data, {type: 'binary', cellDates: true, dateNF: 'yyyy/mm/dd;@'});  
                 }  
                 else {  
                     var workbook = XLS.read(data, {type: 'binary', cellDates: true, dateNF: 'yyyy/mm/dd;@'});  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     if (exceljson.length > 0 && cnt == 0) {  

                        var endrosmenet_type = $('input[name="endorsement_type"]:checked').val();
                        radio_click(endrosmenet_type,exceljson);
                        //console.log(exceljson);
                         //BindTable(exceljson, '#exceltable');  
                         cnt++;  
                     }  
                 });  
                 //$('#exceltable').show();  
             }  
             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#add_user")[0].files[0]);  
             }  
             else {  
                 reader.readAsBinaryString($("#add_user")[0].files[0]);  
             }  
         }  
         else {  
             alert("Sorry! Your browser does not support HTML5!");  
         }  
     }  
     else {  
         alert("Please upload a valid Excel file!");  
     }  

        

        });
  });      



  $(document).ready(function(){

$('#delete_user').change(function(evt){
   // alert('sd');
   var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
/*Checks whether the file is a valid excel file*/  
if (regex.test($("#delete_user").val().toLowerCase())) {  
 var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
 if ($("#delete_user").val().toLowerCase().indexOf(".xlsx") > 0) {  
     xlsxflag = true;  
 }  
 /*Checks whether the browser supports HTML5*/  
 if (typeof (FileReader) != "undefined") {  
     var reader = new FileReader();  
     reader.onload = function (e) {  
         var data = e.target.result;  
         /*Converts the excel data in to object*/  
         if (xlsxflag) {  
             var workbook = XLSX.read(data, {type: 'binary', cellDates: true, dateNF: 'yyyy/mm/dd;@'});  
         }  
         else {  
             var workbook = XLS.read(data, {type: 'binary', cellDates: true, dateNF: 'yyyy/mm/dd;@'});  
         }  
         /*Gets all the sheetnames of excel in to a variable*/  
         var sheet_name_list = workbook.SheetNames;  

         var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
         sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
             /*Convert the cell value to Json*/  
             if (xlsxflag) {  
                 var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
             }  
             else {  
                 var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
             }  
             if (exceljson.length > 0 && cnt == 0) {  

                var endrosmenet_type = $('input[name="endorsement_type"]:checked').val();
                radio_click_deletion(endrosmenet_type,exceljson);
                //console.log(exceljson);
                 //BindTable(exceljson, '#exceltable');  
                 cnt++;  
             }  
         });  
         //$('#exceltable').show();  
     }  
     if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
         reader.readAsArrayBuffer($("#delete_user")[0].files[0]);  
     }  
     else {  
         reader.readAsBinaryString($("#delete_user")[0].files[0]);  
     }  
 }  
 else {  
     alert("Sorry! Your browser does not support HTML5!");  
 }  
}  
else {  
 alert("Please upload a valid Excel file!");  
}  



});
});      

</script>
<script type="text/javascript" src="<?php echo $base_url_views; ?>ckeditor/ckeditor.js"></script>