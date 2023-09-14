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
                    <li class="crumb-active"><a href="javascript:void(0);">Add Form Field </a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>form_field/lists">Form Field</a></li>
                    <li class="crumb-trail">Add Form Field</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Form Field</span> </div>
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

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>form_field/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_form_field">

                                    <div class="form-group rfa_multiple_select">
                                        <label for="name">Product Type <span class="mandatory_field">*</span></label>
                                        <select name="product_type_id[]" id="product_type_id" multiple="multiple" class="form-control multiple-select">
                                            <option value="">Select Product Type</option>
                                            <?php foreach($product_type as $product_type_data){ ?>
                                                <option value="<?php echo $product_type_data->id?>"><?php echo $product_type_data->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Label Name <span class="mandatory_field">*</span></label>
                                        <input id="label_name" name="label_name" type="text" class="form-control"
                                            placeholder="Enter Label Name" value="" />
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Type <span class="mandatory_field">*</span> </label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="1">Input</option>
                                            <option value="2">Text Area</option>
                                            <option value="3">DropDown</option>
                                            <option value="4">Radio</option>
                                        </select>
                                    </div>

                                    <div class="add_more" id="add_more" style="display:none;">

                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="categoryname"> Option</label>
                                                <input id="option" name="option[]" type="text" class="form-control"
                                                    placeholder="Enter  Option" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input_fields_wrap12">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12">Add Option </button>
                                        </div>
                                    </div>
                                            
                                    
                                </div>
								
								<div class="add_more_new" id="add_more_new" style="display:none;">
									
									<div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="categoryname"> Label Name <span class="mandatory_field">*</span></label>
                                                <input id="label_name_raido" name="label_name_raido[]" type="text" class="form-control"
                                                    placeholder="Enter  Label Name" />
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
												<label for="name">Type <span class="mandatory_field">*</span></label>
												<select name="type_radio[]" id="type_radio" class="form-control">
													<option value="">Select Type</option>
													<option value="1">Input</option>
													<option value="2">Text Area</option>
												</select>
											</div>
                                        </div>
                                    </div>
									
									<div class="input_fields_wrap12_new">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button
                                                style="border: medium none; margin-right: -12px; line-height: 23px; margin-top: -49px;"
                                                class="submit btn bg-purple pull-right" type="button"
                                                id="add_field_button12_new">Add More </button>
                                        </div>
                                    </div>
								
								</div>


                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="submit" value="Submit"
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

    var product_type_id = $("#product_type_id").val();
    if (product_type_id == '') {
        $("#error_msg1").html("Please Select Product Type");
        $("#validator").css("display", "block");
        return false;
    }


    var label_name = $("#label_name").val();
    if (label_name == '') {
        $("#error_msg1").html("Please Enter Label Name.");
        $("#validator").css("display", "block");
        return false;
    }

    var type = $("#type").val();
    if (type == '') {
        $("#error_msg1").html("Please Select Type");
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
                '<div class="col-md-12"><div class="col-md-8"><div class="form-group"><label for="option">Option</label><input id="option" name="option[]" type="text" class="form-control" placeholder="Enter Option"/></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
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
    var wrapper = $(".input_fields_wrap12_new");
    var add_button = $("#add_field_button12_new");

    var b = 0;
    $(add_button).click(function(e) { //alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="col-md-12"><div class="col-md-4"><div class="form-group"><label for="categoryname"> Label Name</label>                                               <input id="label_name_raido" name="label_name_raido[]" type="text" class="form-control"  placeholder="Enter  Label Name" />                                          </div></div><div class="col-md-4"><div class="form-group"><label for="name">Type</label><select name="type_radio[]" id="type_radio" class="form-control">		<option value="">Select Type</option><option value="1">Input</option><option value="2">Text Area</option></select></div></div><a href="#" class="btn btn-danger pull-right remove_field1_new" style="margin-right: 87px; margin-top: 24px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field1_new", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
});
</script>

<?php //include('include/footer.php');?>
<script src="<?php echo $base_url_views; ?>js/fSelect.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.dropdown.js"></script>
<script src="<?php echo $base_url_views; ?>js/jquery.mediaBoxes.js"></script>
<script>
$('#grid').mediaBoxes({
    filterContainer: '#filter',
    search: '#search',
    selectAll: true,
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
    selectAll: true,
    columns: 3,
    boxesToLoadStart: 10,
    boxesToLoad: 9,
    horizontalSpaceBetweenBoxes: 20,
    verticalSpaceBetweenBoxes: 20,
    minBoxesPerFilter: 20,
    deepLinkingOnFilter: false,
});

$('.multiple-select').fSelect();
$('.rfa_multiple_select .fs-wrap').addClass('col-sm-12');
$('.rfa_multiple_select .fs-label').text('Select Product Type');

</script>

<script>
$(document).ready(function(){
    $('#type').on('change', function(){
    	var demovalue = $(this).val(); 

        if(demovalue == 3 || demovalue == 4){
            $("#add_more").show();
			
			if(demovalue == 4){
				//alert('dev');
				$("#add_more_new").show();
			}else{
				$("#add_more_new").hide();
			}
        }else{
            $("#add_more").hide();
        }
		
		
		
        //$("div.myDiv").hide();
        
    });
});
</script> 

</body>

</html>