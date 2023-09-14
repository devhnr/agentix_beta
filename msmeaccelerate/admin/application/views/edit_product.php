<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Product </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>product/lists">Product</a></li>
                    <li class="crumb-trail">Edit Product</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Product</span> </div>
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
                                    action="<?php echo $base_url;?>product/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_product">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">


                                     <div class="form-group">
                                        <label style="width:100%;margin:15px 0 5px;" for="product_name">Type</label>
                                        <select name="type_id" id="type_id" class="form-control">
                                        <option value=''>Select Type</option>
                                        <?php  if($all_type !='' && count($all_type) > 0){ 
                                        foreach($all_type as $type_detail){ ?>
                                        <option value="<?php echo $type_detail->id; ?>"
                                            <?php if($type_detail->id==$type_id){ echo "selected";} ?>>
                                            <?php echo $type_detail->name; ?>
                                        </option>
                                        <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%;margin:15px 0 5px;" for="product_name">Coverage</label>
                                        <select name="coverage_id[]" multiple id="coverage_id" class="form-control">
                                        <option value=''>Select Coverage</option>
                                        <?php  if($all_coverage !='' && count($all_coverage) > 0){ 

                                            $coverage_id = explode(",",$coverage_id);
                                            
                                        foreach($all_coverage as $coverage){ ?>
                                        <option value="<?php echo $coverage->id; ?>"
                                            <?php if(in_array($coverage->id,$coverage_id)){ echo "selected";} ?>>
                                            <?php echo $coverage->name; ?>
                                        </option>
                                        <?php } } ?>
                                        </select>
                                    </div>
									
									<div class="form-group">
                                    <label for="sub_industry" style="width:100%;margin:15px 0 5px;">Sub Industry</label>
                                        
                                        <select id="sub_industry" name="sub_industry"  class="form-control">
                                            <option value="">Select Sub Industry</option>
                                            <?php  if($all_sub_industry !='' && count($all_sub_industry) > 0){ 
                                            foreach($all_sub_industry as $all_sub_industry_data){ ?>
                                            <option value="<?php echo $all_sub_industry_data->id; ?>" <?php if($all_sub_industry_data->id==$sub_industry){ echo "selected";} ?>><?php echo $all_sub_industry_data->name; ?></option>      
                                        <?php } }  ?>             
                                        </select>
                                    
                                </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name"> Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter Name" value="<?php echo $name; ?>" />
                                    </div>

                                     <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="image">Image (Size : 76px X 76px)</label>
                                        <input type="file" name="image" id="image" value="" class="form-control">
                                        <img src="<?php echo $front_base_url; ?>upload/products/small/<?php echo $image; ?>" height="50px;" width="50px;">
                                    </div>

                                    <div class="form-group">
                                    <label for="show_price" style="width:100%;margin:15px 0 5px;">Estimated Value</label>
                                        <span id="prod1">
                                        <select id="show_price" name="show_price"  class="form-control" onchange="hideAndShow(this.value);">
                                            <option value="">Select Estimated</option>
                                            <option value="1" <?php if($show_price == 1){ echo "selected";}?> selected>Fix</option>      
                                            <option value="2" <?php if($show_price == 2){ echo "selected";}?>>Assess Value</option>      
                                            <option value="3" <?php if($show_price == 3){ echo "selected";}?>>Number of Employee</option>            
                                            </select>
                                        </span>
                                    </div>
                                <div class="row col-md-12" id="div_first">
                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">0 - 100 Crore
                                        </label>
                                        <input id="zero_to_hundred" name="zero_to_hundred" type="text" class="form-control"
                                            placeholder="Enter 0 To 100" value="<?php echo $zero_to_hundred?>" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Above 100 - 500 Crore
                                        </label>
                                        <input id="hund_to_five" name="hund_to_five" type="text" class="form-control"
                                            placeholder="Enter 100 To 500" value="<?php echo $hund_to_five?>" />
                                    </div>

                                    <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Above 500 crore
                                        </label>
                                        <input id="above_five" name="above_five" type="text" class="form-control"
                                            placeholder="Enter Above 500" value="<?php echo $above_five?>" />
                                    </div>
                                </div>
                                    <!-- ----------------------   Drop-Down  ---------------------- -->
                                <div class="row col-md-12" id="div_two">
                                    <div class="form-group">
                                    <label for="show_price" style="width:100%;margin:15px 0 5px;">0 to 100 Crore</label>
                                        <span id="prod1">
                                        <select id="assets_zero_to_hund" name="assets_zero_to_hund"  class="form-control">
                                            <option value="" > = Estimated asset value</option>
                                            <option value="1" <?php if($assets_zero_to_hund == 1){echo "selected";}?>>40 % Of Asset Value</option>      
                                            <!-- <option value="2" <?php if($assets_zero_to_hund == 2){echo "selected";}?>>20 % Of Assets Value</option>      
                                             <option value="3">Number of Employee</option>             -->
											 <option value="4" <?php if($assets_zero_to_hund == 4){echo "selected";}?>>= Estimated asset value * 2</option>

                                           
                                            <option value="5" <?php if($assets_zero_to_hund == 5){echo "selected";}?>>= Estimated asset value or 10,00,000 whichever is higher </option>

                                            <option value="6" <?php if($assets_zero_to_hund == 6){echo "selected";}?>>= Estimated asset value * 2 or 10,00,000 whichever is higher </option>

                                            <option value="7" <?php if($assets_zero_to_hund == 7){echo "selected";}?>>= Estimated asset value or 500,000 whichever is higher </option>

                                            <option value="8" <?php if($assets_zero_to_hund == 8){echo "selected";}?>> 40% of estimated asset value or 200,000 whichever is higher </option>

                                            </select>
                                        </span>
                                    </div>

                                     <div class="form-group">
                                    <label for="show_price" style="width:100%;margin:15px 0 5px;">100 to 500 Crore</label>
                                        <span id="prod1">
                                        <select id="asset_hund_to_five" name="asset_hund_to_five"  class="form-control">
                                            <option value="" > = Estimated asset value</option>
                                            <option value="1" <?php if($asset_hund_to_five == 1){echo "selected";}?>>40 % Of Asset Value</option>      
                                            <!--<option value="2" <?php if($asset_hund_to_five == 2){echo "selected";}?>>20 % Of Assets Value</option>      
                                             <option value="3">Number of Employee</option>             -->
											 <option value="4" <?php if($asset_hund_to_five == 4){echo "selected";}?>>= Estimated asset value * 2</option>

                                            

                                            <option value="5" <?php if($asset_hund_to_five == 5){echo "selected";}?>>= Estimated asset value or 10,00,000 whichever is higher </option>

                                            <option value="6" <?php if($asset_hund_to_five == 6){echo "selected";}?>>= Estimated asset value * 2 or 10,00,000 whichever is higher </option>

                                            <option value="7" <?php if($asset_hund_to_five == 7){echo "selected";}?>>= Estimated asset value or 500,000 whichever is higher </option>

                                            <option value="8" <?php if($asset_hund_to_five == 8){echo "selected";}?>> 40% of estimated asset value or 200,000 whichever is higher </option>

                                            </select>
                                        </span>
                                    </div>

                                     <div class="form-group">
                                    <label for="show_price" style="width:100%;margin:15px 0 5px;">Above 500 crore</label>
                                        <span id="prod1">
                                        <select id="asset_above_five" name="asset_above_five"  class="form-control">
                                            <option value="" > = Estimated asset value</option>
                                            <option value="1" <?php if($asset_above_five == 1){echo "selected";}?>>40 % Of Asset Value</option>      
                                            <!--<option value="2" <?php if($asset_above_five == 2){echo "selected";}?>>20 % Of Assets Value</option>      
                                             <option value="3">Number of Employee</option>             -->
											 <option value="4" <?php if($asset_above_five == 4){echo "selected";}?>>= Estimated asset value * 2</option>

                                             <option value="5" <?php if($asset_above_five == 5){echo "selected";}?>>= Estimated asset value or 10,00,000 whichever is higher </option>

                                            <option value="6" <?php if($asset_above_five == 6){echo "selected";}?>>= Estimated asset value * 2 or 10,00,000 whichever is higher </option>

                                            <option value="7" <?php if($asset_above_five == 7){echo "selected";}?>>= Estimated asset value or 500,000 whichever is higher </option>

                                            <option value="8" <?php if($asset_above_five == 8){echo "selected";}?>> 40% of estimated asset value or 200,000 whichever is higher </option>

                                            </select>
                                        </span>
                                    </div>
                                </div>

                                     <!-- ----------------------        ---------------------- -->
                                <div class="row col-md-12" id="div_three">
                                    <div class="form-group">
                                    <label for="show_price" style="width:100%;margin:15px 0 5px;">0 to 100 Crore</label>
                                        <span id="prod1">

                                            <div style="width:49%;display: inline-block;">
                                                <label for="show_price" style="width:100%;margin:15px 0 5px;">Amount</label>
                                                <input type="text" name="emp_zero_to_hundred_amount" id="emp_zero_to_hundred_amount" class="form-control" value="<?php echo $emp_zero_to_hundred_amount?>">
                                            </div>
                                            <div style="width:49%;display: inline-block;">
                                                <label for="show_price" style="width:100%;margin:15px 0 5px;">Percentage</label>
                                                <input type="text" name="emp_zero_to_hundred_percentage" id="emp_zero_to_hundred_percentage" class="form-control" value="<?php echo $emp_zero_to_hundred_percentage?>">
                                            </div>
                                        <!-- <select id="emp_zero_to_hundred" name="emp_zero_to_hundred"  class="form-control">
                                            <option value="" >Select 0 to 100 Crore</option>
                                            <option value="1" <?php if($emp_zero_to_hundred == 1){echo "selected";}?>>50% of Employee</option>      
                                            <option value="2" <?php if($emp_zero_to_hundred == 2){echo "selected";}?>>25% of Employee</option>      
                                           
                                            </select> -->
                                        </span>
                                    </div>

                                    <div class="form-group">
                                    <label for="show_price" style="width:100%;margin:15px 0 5px;">100 to 500 Crore</label>
                                        <span id="prod1">

                                            <div style="width:49%;display: inline-block;">
                                                <label for="show_price" style="width:100%;margin:15px 0 5px;">Amount</label>
                                                <input type="text" name="emp_hund_to_five_amount" id="emp_hund_to_five_amount" class="form-control" value="<?php echo $emp_hund_to_five_amount?>">
                                            </div>
                                            <div style="width:49%;display: inline-block;">
                                                <label for="show_price" style="width:100%;margin:15px 0 5px;">Percentage</label>
                                                <input type="text" name="emp_hund_to_five_percentage" id="emp_hund_to_five_percentage" class="form-control" value="<?php echo $emp_hund_to_five_percentage?>">
                                            </div>
                                        <!-- <select id="emp_hund_to_five" name="emp_hund_to_five"  class="form-control">
                                            <option value="" >Select 0 to 100 Crore</option>
                                            <option value="1" <?php if($emp_hund_to_five == 1){echo "selected";}?>>50% of Employee</option>      
                                            <option value="2" <?php if($emp_hund_to_five == 2){echo "selected";}?>>25% of Employee</option>      
                                           
                                            </select> -->
                                        </span>
                                    </div>

                                    <div class="form-group">
                                    <label for="show_price" style="width:100%;margin:15px 0 5px;">Above 500 Crore</label>
                                        <span id="prod1">

                                            <div style="width:49%;display: inline-block;">
                                                <label for="show_price" style="width:100%;margin:15px 0 5px;">Amount</label>
                                                <input type="text" name="emp_above_five_amount" id="emp_above_five_amount" class="form-control" value="<?php echo $emp_above_five_amount?>">
                                            </div>
                                            <div style="width:49%;display: inline-block;">
                                                <label for="show_price" style="width:100%;margin:15px 0 5px;">Percentage</label>
                                                <input type="text" name="emp_above_five_percentage" id="emp_above_five_percentage" class="form-control" value="<?php echo $emp_above_five_percentage?>">
                                            </div>
                                       <!--  <select id="emp_above_five" name="emp_above_five" class="form-control">
                                            <option value="" >Select 0 to 100 Crore</option>
                                            <option value="1" <?php if($emp_above_five == 1){echo "selected";}?>>50% of Employee</option>      
                                            <option value="2" <?php if($emp_above_five == 2){echo "selected";}?>>25% of Employee</option>      
                                            
                                            </select> -->
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Average(%)
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="average" name="average" type="text" class="form-control"
                                            placeholder="Enter Average" value="<?php echo $average?>" />
                                </div>

                                <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Min Amount
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="min_amount" name="min_amount" type="text" class="form-control"
                                            placeholder="Enter Min Amount" value="<?php echo $min_amount?>" />
                                </div>
                                    <!-- <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Description </label>
                                        <textarea id="description" name="description" type="text" class="form-control"
                                            placeholder="Enter Description" value=""><?php echo $description?></textarea>
                                    </div> -->
                            </div>


                            <div class="form-group">
                                <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                    onclick="javascript:validate();return false;" />
                                <a href="<?php echo $base_url;?>product/lists" class="submit btn bg-purple pull-right"
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

$('#coverage_id').multiselect({
    columns: 1,
    selectedOptions: 'PHP',
    placeholder: 'Select Season'
});


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

    var name = $("#name").val();
    if (name == '') {
        //alert('Please Enter Category ');
        $("#error_msg1").html("Please Enter Name.");
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
    function hideAndShow(display_div){
        if(display_div == 1){
            $('#div_first').show();
            $('#div_two').hide();
            $('#div_three').hide();
        }else if(display_div == 2){
            $('#div_two').show();
            $('#div_first').hide();
            $('#div_three').hide();
        }else if(display_div == 3){
            $('#div_three').show();
            $('#div_first').hide();
            $('#div_two').hide();
        }
    }
    var show_price = $("#show_price").val();
    if(show_price == 1){
        $('#div_two').hide();
        $('#div_three').hide();
    }else if(show_price == 2){
        $('#div_first').hide();
        $('#div_three').hide();
    }else if(show_price == 3){
        $('#div_first').hide();
        $('#div_two').hide();
    }
</script>