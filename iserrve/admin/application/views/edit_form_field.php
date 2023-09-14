<?php include('include/header.php');?>
<link href="<?php echo $base_url_views; ?>css/fSelect.css" rel="stylesheet">

<link href="<?php echo $base_url_views; ?>css/mediaBoxes.css" rel="stylesheet">
<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);">Edit Form Field</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>form_field/lists">Form Field</a></li>
                    <li class="crumb-trail">Edit Form Field</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Edit Form Field</span> </div>
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

                                <form role="form" id="form" method="post"
                                    action="<?php echo $base_url;?>form_field/edit/<?php echo $id; ?>"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="edit_form_field">

                                    <div class="form-group rfa_multiple_select">
                                        <label for="name">Product Type <span class="mandatory_field">*</span></label>
                                        <select name="product_type_id[]" id="product_type_id" multiple="multiple" class="form-control multiple-select">
                                            <option value="">Select Product Type</option>
                                            <?php foreach($product_type as $product_type_data){ 
                                                $product_type_id_array = explode(',',$product_type_id);    
                                            ?>
                                                <option value="<?php echo $product_type_data->id?>" <?php if(in_array($product_type_data->id,$product_type_id_array)){ echo "selected";} ?>><?php echo $product_type_data->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Label Name <span class="mandatory_field">*</span></label>
                                        <input id="label_name" name="label_name" type="text" class="form-control"
                                            placeholder="Enter Name" value="<?php echo $label_name; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Type <span class="mandatory_field">*</span></label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="1" <?php if($type == 1){echo "selected";}?>>Input</option>
                                            <option value="2" <?php if($type == 2){echo "selected";}?>>Text Area</option>
                                            <option value="3" <?php if($type == 3){echo "selected";}?>>DropDown</option>
                                            <option value="4" <?php if($type == 4){echo "selected";}?>>Radio</option>
                                        </select>
                                    </div>

                                    <?php if ($addition_item != '') { ?>
                                        <input type="hidden" name="option1[]" value="">

                                        <div class="add_more" id="add_more" style="display:none;">

                                        <?php for ($i = 0; $i < count($addition_item); $i++) { ?>

                                            <input type="hidden" name="updateid1xxx[]" id="updateid1xxx<?php echo $i + 1; ?>"
                                        value="<?php echo $addition_item[$i]->id; ?>">

                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="option"> Option</label>
                                                        <input id="option<?php echo $i + 1; ?>"
                                                            value="<?php echo $addition_item[$i]->option_name; ?>" name="optionu[]"
                                                            type="text" class="form-control" placeholder="Enter  Price" />
                                                    </div>

                                                </div>
                                                <a href="#"
                                            onclick="singledelete('<?php echo $base_url . "form_field/removeprice/"; ?><?php echo $addition_item[$i]->form_field_id; ?>/<?php echo $addition_item[$i]->id; ?>');"
                                            href="javascript:void(0);" style="margin-right: 87px; margin-top: 22px;"
                                            class="btn btn-danger pull-right"> Remove</a>
                                            </div>
                                            <?php } ?>
                                        </div>

                                    <?php } else { ?>
                                        
                                        <div class="add_more_new" id="add_more_new" style="display:none">
                                            <div class="col-md-12">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="price1"> Option</label>
                                                        <input id="option1" name="option1[]" type="text" class="form-control"
                                                            placeholder="Enter Option" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <div class="add_more_button" id="add_more_button" style="display:none">

                                    <div class="input_fields_wrap12">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-11">
                                            <button
                                                style="
                                                "
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12">Add Option</button>
                                        </div>
                                    </div>

                                    </div>
									
									
									
									<?php if ($addition_item_radio != '') { ?>
									
											<input type="hidden" name="label_name_raido1[]" value="">
											
											<input type="hidden" name="type_radio1[]" value="">
											

											<div class="add_more_radio" id="add_more_radio" style="display:none;">
									
												<?php for ($i = 0; $i < count($addition_item_radio); $i++) { ?>

													<input type="hidden" name="updateid1xxx_radio[]" id="updateid1xxx_radio<?php echo $i + 1; ?>" value="<?php echo $addition_item_radio[$i]->id; ?>">
														
														<div class="col-md-12">
														
															<div class="col-md-4">
																<div class="form-group">
																	<label for="label_name_raidou"> Label Name <span class="mandatory_field">*</span></label>
																	<input id="label_name_raidou<?php echo $i + 1; ?>"
																		value="<?php echo $addition_item_radio[$i]->label_name; ?>" name="label_name_raidou[]"
																		type="text" class="form-control" placeholder="Enter  Label Name" />
																</div>

															</div>
															
															<div class="col-md-4">
																<div class="form-group">
																	<label for="name">Type <span class="mandatory_field">*</span></label>
																	<select name="type_radiou[]" id="type_radio" class="form-control">
																		<option value="">Select Type</option>
																		<option value="1" <?php if($addition_item_radio[$i]->type == 1){echo "selected";}?>>Input</option>
																		<option value="2" <?php if($addition_item_radio[$i]->type == 2){echo "selected";}?>>Text Area</option>
																	</select>
																</div>
															</div>
															
																	<a href="#"
													onclick="singledelete_radio('<?php echo $base_url . "form_field/removeprice_new/"; ?><?php echo $addition_item_radio[$i]->form_field_id; ?>/<?php echo $addition_item_radio[$i]->id; ?>');"
													href="javascript:void(0);" style="margin-right: 87px; margin-top: 22px;"
													class="btn btn-danger pull-right"> Remove</a>
											
														</div>
										
												<?php } ?>
											</div>
									
									<?php }else{ ?>
									
												<div class="add_more_new_radio" id="add_more_new_radio" style="display:none">
													<div class="col-md-12">
														<div class="col-md-4">
															<div class="form-group">
																<label for="price1"> Label Name</label>
																<input id="label_name_raido1" name="label_name_raido1[]" type="text" class="form-control"
																	placeholder="Enter Label Name" />
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label for="name">Type</label>
																<select name="type_radio1[]" id="type_radio1" class="form-control">
																	<option value="">Select Type</option>
																	<option value="1">Input</option>
																	<option value="2">Text Area</option>
																</select>
															</div>
														</div>
													</div>
												</div>
									
									<?php } ?>
									
									<div class="add_more_button_radio" id="add_more_button_radio" style="display:none">

                                    <div class="input_fields_wrap12_radio">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12_radio">Add More</button>
                                        </div>
                                    </div>

                                    </div>

                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Update"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>form_field/lists"
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
        $("#error_msg1").html("Please Enter Name.");
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

$(document).ready(function(){
    $('#type').on('change', function(){
    	var demovalue = $(this).val(); 

        if(demovalue == 3 || demovalue == 4){
            $("#add_more").show();
            $("#add_more_new").show();
            $("#add_more_button").show();
			
			if(demovalue == 4){
				$("#add_more_radio").show();
				$("#add_more_new_radio").show();
				$("#add_more_button_radio").show();
			}else{
				
				$("#add_more_radio").hide();
				$("#add_more_new_radio").hide();
				$("#add_more_button_radio").hide();
			}
            
        }else{
            $("#add_more").hide();
            $("#add_more_new").hide();
            $("#add_more_button").hide();
        }
        //$("div.myDiv").hide();
        
    });
    <?php if($type == 3 || $type == 4){?>
        $("#add_more").show();
        $("#add_more_new").show();
        $("#add_more_button").show();
		
		<?php if($type == 4){ ?>
	
				$("#add_more_radio").show();
				$("#add_more_new_radio").show();
				$("#add_more_button_radio").show();
		<?php 	}else{ ?>
				
				$("#add_more_radio").hide();
				$("#add_more_new_radio").hide();
				$("#add_more_button_radio").hide();
		<?php } ?>
		
		
		
    <?php } else{?>
        $("#add_more").hide();
        $("#add_more_new").hide();
        $("#add_more_button").hide();
    <?php } ?>
});

</script>

<script>
function singledelete(url) {
    window.location.href = url;
}

function singledelete_radio(url) {
    window.location.href = url;
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
            $(wrapper).append(
                '<div class="col-md-12"><div class="col-md-8"><div class="form-group"><label for="option">Option</label><input id="option1" name="option1[]" type="text" class="form-control" placeholder="Enter Option"/></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
});
</script>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap12_radio");
    var add_button = $("#add_field_button12_radio");

    var b = 0;
    $(add_button).click(function(e) { //alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="col-md-12"><div class="col-md-4"><div class="form-group"><label for="categoryname"> Label Name</label>                                               <input id="label_name_raido" name="label_name_raido1[]" type="text" class="form-control"  placeholder="Enter  Label Name" />                                          </div></div><div class="col-md-4"><div class="form-group"><label for="name">Type</label><select name="type_radio1[]" id="type_radio" class="form-control">		<option value="">Select Type</option><option value="1">Input</option><option value="2">Text Area</option></select></div></div><a href="#" class="btn btn-danger pull-right remove_field1_radio" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field1_radio", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
});
</script>

<?php //include('include/footer.php');?>

<script>
function singledelete(url) {
    window.location.href = url;
}
</script>
<script src="<?php echo $base_url_views; ?>js/fSelect.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.dropdown.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.js"></script>
<script>
/* Multiple Select initialiaztion */
$('#grid').mediaBoxes({
    filterContainer: '#filter',
    search: '#search',
    columns: 3,
    boxesToLoadStart: 9,
    boxesToLoad: 9,
    horizontalSpaceBetweenBoxes: 30,
    verticalSpaceBetweenBoxes: 30,
    minBoxesPerFilter: 20,
    deepLinkingOnFilter: false,
    fancybox: {
        thumbs: {
            autoStart: true
        }, // Display thumbnails on opening/closing
    }
});
$('#grid2').mediaBoxes({
    filterContainer: '#filter2',
    search: '#search',
    columns: 3,
    boxesToLoadStart: 10,
    boxesToLoad: 9,
    horizontalSpaceBetweenBoxes: 20,
    verticalSpaceBetweenBoxes: 20,
    minBoxesPerFilter: 20,
    deepLinkingOnFilter: false,
});
$('.multiple-select').fSelect();
$('#occasion_id').fSelect();
$('.rfa_multiple_select .fs-wrap').addClass('col-sm-12');
$('.rfa_multiple_select .fs-label').text('Select Product Type');
$('#rfa_multiple_select2 .fs-label').text('Select Product');
<?php if(empty($fabric_id)){ ?>
$('#rfa_multiple_selectFabric .fs-label').text('Select Fabric');
<?php } if(empty($occasion_id)){ ?>
$('#rfa_multiple_selectOccasion .fs-label').text('Select Occasion');
<?php }if(empty($more_color_id)){  ?>
$('#more_colors .fs-label').text('Select More Color Products');
<?php } ?>
</script>
</body>

</html>