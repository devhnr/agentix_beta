<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Edit Endorsement Calculation </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>endorsement_calculation/lists">Endorsement Calculation</a></li>
                    <li class="crumb-trail">Edit Endorsement Calculation</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Endorsement Calculation</span> </div>
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
                                    action="<?php echo $base_url;?>endorsement_calculation/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_endorsement_calculation">
                                    <INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">



                                   <div class="col-md-6">
										<div class="form-group">
											<label for="corporate_id" style="width:100%; margin:15px 0 5px;">Select Corporate</label>
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
									</div>

									<div class="col-md-6">
										<div class="form-group rfa_multiple_select">
											<label for="policy_no" style="width:100%; margin:15px 0 5px;">Policy Number</label>

											<span id="show_policy_number">
											<select id="policy_no" name="policy_no" class="form-control multiple-select" onChange="showproduct_name(this.value)">
												<option value="">Select Policy No</option>
												<?php  if($allpolicy_using_corporate !='' && count($allpolicy_using_corporate) > 0){ 
												foreach($allpolicy_using_corporate as $policy_no_data){ ?>
												<option value="<?php echo $policy_no_data->id; ?>" <?php if ($policy_no_data->id == $policy_no) {
													echo "selected";
												} ?>><?php echo $policy_no_data->policy_no; ?></option>      
											<?php } }  ?>             
											</select>
											</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="sum_insured" style="width:100%; margin:15px 0 5px;">Sum Insured</label>
											<span id="suminsure">
											<select id="sum_insured" name="sum_insured"
												class="form-control" onChange="get_sum_insure_val(this.value)">
												<option value="">Select Sum Insured</option>
												<?php if ($allpolicy_using_id != '' && count($allpolicy_using_id) > 0) {
													foreach ($allpolicy_using_id as $sum_insured_data) {
														?>
												<option value="<?php echo $sum_insured_data->id; ?>" <?php if ($sum_insured_data->id == $sum_insured) {
													echo "selected";
												} ?>><?php echo $sum_insured_data->sum_insured; ?>
												</option>
												<?php } } ?>
											</select>
										</span>
										</div>
									</div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endorsement_type" style="width:100%; margin:15px 0 5px;">Endorsement Type</label>
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="Family Wise" onclick="radio_click(this.value);" <?php if ($endorsement_type == 'Family Wise') {echo "checked";} ?>> Family Wise
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="Per Life Wise" onclick="radio_click(this.value);" <?php if ($endorsement_type == 'Per Life Wise') {echo "checked";} ?>> Per Life Wise

                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="GPA" onclick="radio_click(this.value);" <?php if ($endorsement_type == 'GPA') {echo "checked";} ?>> GPA
                                                
                                        <input type="radio" name="endorsement_type" id="endorsement_type" value="GTL" onclick="radio_click(this.value);" <?php if ($endorsement_type == 'GTL') {echo "checked";} ?>> GTL

                                    </div>
                                </div>   
								
								<?php if ($addition_item != '') { ?>
										<input type="hidden" name="agefrom[]" value="">
										<input type="hidden" name="ageto[]" value="">
										<input type="hidden" name="rate_in_mili[]" value="">
										<input type="hidden" name="annual_premium[]" value="">
										
										<div id="addition_item">
										
										<?php for ($i = 0; $i < count($addition_item); $i++) { ?>
											<input type="hidden" name="updateid1xxx[]" id="updateid1xxx<?php echo $i + 1; ?>" value="<?php echo $addition_item[$i]->id; ?>">
											
											<div class="col-md-12">
											
												<div class="col-md-2">
													<div class="form-group">
														<label for="agefromu"> Age From</label>
														<input id="agefromu" name="agefromu[]" type="text" class="form-control blank_val"
															placeholder="Enter  Age From" value="<?php echo $addition_item[$i]->agefrom; ?>"/>
													</div>
												</div>
												
												<div class="col-md-2">
													<div class="form-group">
														<label for="agetou"> Age To</label>
														<input id="agetou" name="agetou[]" type="text" class="form-control blank_val"
															placeholder="Enter  Age To" value="<?php echo $addition_item[$i]->ageto; ?>"/>
													</div>
												</div>
												
												<div class="col-md-2" id="rate_in_mili_section" style="display:none;">
													<div class="form-group">
														<label for="rate_in_miliu">Rate In Mili</label>
														<input id="rate_in_miliu" name="rate_in_miliu[]" type="text" class="form-control blank_val"
															placeholder="Enter Rate In Mili" value="<?php echo $addition_item[$i]->rate_in_mili; ?>"/>
													</div>
												</div>
												
												
												<div class="col-md-2">
													<div class="form-group">
														<label for="annual_premiumu">Annual Premium</label>
														<input id="annual_premiumu" name="annual_premiumu[]" type="text" class="form-control blank_val"
															placeholder="Enter Annual Premium" value="<?php echo $addition_item[$i]->annual_premium; ?>"/>
													</div>
												</div>
												
												<a href="#"
                                            onclick="singledelete('<?php echo $base_url . "endorsement_calculation/removeprice/"; ?><?php echo $addition_item[$i]->endorsement_calculation_id; ?>/<?php echo $addition_item[$i]->id; ?>');"
                                            href="javascript:void(0);" style="margin-right: 110px; margin-top: 25px;"
                                            class="btn btn-danger pull-right"> Remove</a>
											
											</div>
											
											
										
										
										<?php } ?>
										
										</div>
										
								<?php }else{ ?>
								
								<div class="col-md-12" id="add_more_sec_for_gpa_gtl_new">
								
									<div class="col-md-2">
                                        <div class="form-group">
                                            <label for="categoryname"> Age From</label>
                                            <input id="agefrom" name="agefrom[]" type="text" class="form-control"
                                                placeholder="Enter  Age From" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ageto"> Age To</label>
                                            <input id="ageto" name="ageto[]" type="text" class="form-control"
                                                placeholder="Enter  Age To" />
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="rate_in_mili_section" style="display:none;">
                                        <div class="form-group">
                                            <label for="rate_in_mili">Rate In Mili</label>
                                            <input id="rate_in_mili" name="rate_in_mili[]" type="text" class="form-control"
                                                placeholder="Enter Rate In Mili" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="annual_premium">Annual Premium</label>
                                            <input id="annual_premium" name="annual_premium[]" type="text" class="form-control annual_premium"
                                                placeholder="Enter Annual Premium" />
                                        </div>
                                    </div>
								
								</div>
								
								<?php } ?>
								
								<div class="col-md-12" id="add_more_sec_for_gpa_gtl" style="display:none">
								
									<div class="col-md-2">
                                        <div class="form-group">
                                            <label for="categoryname"> Age From</label>
                                            <input id="agefrom" name="agefrom[]" type="text" class="form-control blank_val_gpa_gtl"
                                                placeholder="Enter  Age From" value="<?php echo $addition_item[0]->agefrom; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="ageto"> Age To</label>
                                            <input id="ageto" name="ageto[]" type="text" class="form-control blank_val_gpa_gtl"
                                                placeholder="Enter  Age To" value="<?php echo $addition_item[0]->ageto; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="rate_in_mili_section" >
                                        <div class="form-group">
                                            <label for="rate_in_mili">Rate In Mili</label>
                                            <input id="rate_in_mili_gpa_gtl" name="rate_in_mili[]" type="text" class="form-control blank_val_gpa_gtl"
                                                placeholder="Enter Rate In Mili" value="<?php echo $addition_item[0]->rate_in_mili; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="annual_premium">Annual Premium</label>
                                            <input id="annual_premium_gpa_gtl" name="annual_premium[]" type="text" class="form-control blank_val_gpa_gtl annual_premium"
                                                placeholder="Enter Annual Premium" value="<?php echo $addition_item[0]->annual_premium; ?>"/>
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
                                
                                <div class="col-sm-12">
                                                                                    <div class="admin-notes">
                                         <h5>Note:</h5>
                                         <ul class="">
                                             <li>The “relation” column for the employee should be mentioned as “Employee” and the Family wise sheet will only take "Employee" into account.</li>
                                             <li>Other fields like Sum Insured, and Age Group should match with the mentioned data in the Rack Rates module while uploading Excel Sheet..</li>
                                             <li>Date Format: dd-mm-yyyy.
</li>
                                            
                                         </ul>
                                     </div>
                                </div>
                                    
								<input type="hidden" name="suminsure_hidden" id="suminsure_hidden" value="<?php echo $suminsure_hidden;?>">
								<div class="col-md-12" style="margin-top: 20px">
									<div class="form-group">
										<input class="submit btn bg-purple pull-right" type="button" value="Update"
											onclick="javascript:validate();return false;" />
										<a href="<?php echo $base_url;?>endorsement_calculation/lists" class="submit btn bg-purple pull-right"
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

    var corporate_id = $("#corporate_id").val();
    if (corporate_id == '') {
        $("#error_msg1").html("Please Select Corporate.");
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


    var sum_insured = $("#sum_insured").val();
    if (sum_insured == '') {
        $("#error_msg1").html("Please Enter Sum Insured.");
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
        var url = '<?php echo $base_url; ?>endorsement_calculation/show_policy_using_corporate';

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
        var url = '<?php echo $base_url; ?>endorsement_calculation/get_policy_data';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){

                showproduct_insurer(pro_id);
                get_suminsurence(pro_id);
                $('#product_name').val(msg);
                //alert(msg)
                //document.getElementById('prod1').innerHTML = msg;
            }
        });
    }

    function showproduct_insurer(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_calculation/get_policy_insurer';

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

    function get_suminsurence(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_calculation/get_policy_suminsurance';

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

    function show_form_data(product_type_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>endorsement_calculation/show_form_data';

        $.ajax({
            url : url,
            type : 'post',
            data : 'product_type_id=' + product_type_id,
            success: function(msg){

                // showproduct_insurer(pro_id);
                // get_suminsurence(pro_id);
                // $('#product_name').val(msg);
                //alert(msg)
                document.getElementById('form_fill_data').innerHTML = msg;
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



function radio_hide_show_Attrdiv(id, value){
    
    if(value == 'Yes' || value == 'yes'){
        $('#hide_radio_attr' + id).show();
    }else{
		
		$('.field_type_radio_attu_' + id).val('');
        $('#hide_radio_attr' + id).hide();
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

</script>

<script>
function singledelete(url) {
    
	var t = confirm('Are you sure you want to Remove Age Group ?');
	if (t) {

        window.location.href = url;

    } else {

        return false;

    }
}

function radio_click(val){
     
    if(val == 'GPA' || val == 'GTL'){
        $('#rate_in_mili_section').show();
        $("#add_more_button").css("display", "none");
        $("#addition_item").css("display", "none");
		$('#add_more_sec_for_gpa_gtl').show();
		$("#add_more_sec_for_gpa_gtl_new").css("display", "none");
		$('.blank_val').val('');
        $(".annual_premium").attr("readonly", true);
        
    }else{
		$('#add_more_sec_for_gpa_gtl').hide();
        $("#add_more_button").css("display", "block");
        $("#addition_item").css("display", "block");
        $('#rate_in_mili_section').hide();
		$("#add_more_sec_for_gpa_gtl_new").css("display", "block");
		$('.blank_val_gpa_gtl').val('');
        $(".annual_premium").attr("readonly", false);
    }
}
<?php if($endorsement_type == 'GPA' || $endorsement_type == 'GTL'){?>
	
	$('#rate_in_mili_section').show();
        $("#add_more_button").css("display", "none");
        $("#addition_item").css("display", "none");
		$('#add_more_sec_for_gpa_gtl').show();
		$("#add_more_sec_for_gpa_gtl_new").css("display", "none");
		$('.blank_val').val('');
        $(".annual_premium").attr("readonly", true);
<?php }else{?>
	$('#add_more_sec_for_gpa_gtl').hide();
        $("#add_more_button").css("display", "block");
        $("#addition_item").css("display", "block");
        $('#rate_in_mili_section').hide();
		$("#add_more_sec_for_gpa_gtl_new").css("display", "block");
		$('.blank_val_gpa_gtl').val('');
        $(".annual_premium").attr("readonly", false);
<?php } ?>
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
            $(wrapper).append('<div class="col-md-12"><div class="col-md-2"><div class="form-group">           <label for="categoryname"> Age From</label><input id="agefrom" name="agefrom[]" type="text" class="form-control"  placeholder="Enter  Age From" /> </div> </div><div class="col-md-2"><div class="form-group"> <label for="ageto"> Age To</label> <input id="ageto" name="ageto[]" type="text" class="form-control" placeholder="Enter  Age To" /></div></div>           <div class="col-md-2" id="rate_in_mili_section" style="display:none;"><div class="form-group"><label for="rate_in_mili">Rate In Mili</label>           <input id="rate_in_mili" name="rate_in_mili[]" type="text" class="form-control"               placeholder="Enter Rate In Mili" /></div></div>        <div class="col-md-2"><div class="form-group"> <label for="annual_premium">Annual Premium</label><input id="annual_premium" name="annual_premium[]" type="text" class="form-control"  placeholder="Enter Annual Premium" /></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 110px; margin-top: 24px;">Remove</a></div>'
            );

    //         function radio_click(val){
    //  alert(val);
    //         if(val == 'GPA' || val == 'GTL'){
    //             $('#rate_in_mili_section').show();
    //             $("#add_more_button").css("display", "none");
    //             $(".input_fields_wrap12").css("display", "none");
                
    //         }else{
    //             $("#add_more_button").css("display", "block");
    //             $(".input_fields_wrap12").css("display", "block");
    //             $('#rate_in_mili_section').hide();
    //         }
    //     }

           
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
        $(this).parent('div').remove();
        b--;
    })
});

$(document).ready(function() {
    $("#rate_in_mili_gpa_gtl").keyup(function() {
        var dInput = $(this).val();
        var suminsure = $('#suminsure_hidden').val()

        var total = dInput / 1000 * suminsure;

        $('#annual_premium_gpa_gtl').val(total.toFixed(2));
        //alert(total);
        //$(".dDimension:contains('" + dInput + "')").css("display","block");
    });
});
</script>