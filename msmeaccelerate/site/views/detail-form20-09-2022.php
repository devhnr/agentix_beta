  <?php include("includes/header.php"); ?>
        <!-- end header -->
        <!-- start section -->
        <section class="padding-25px-tb bg-blue4">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6">
                        <img src="<?php echo $base_url_views?>asset_new/img/cus_banner.png" alt="">
                    </div>
                    <div class="col-lg-6 h-100 col-sm-10">
                        <div class="row align-items-center bg-white box-shadow">
                        
                        <div class="col-lg-12 padding-25px-tb padding-25px-lr">
                            <h6 class="text-extra-dark-gray font-weight-700 m-0 margin-15px-bottom">Confidently Manage complex Risks & make Better Informed Decision with us!</h6>
                            <h6 class="text-blue1">Help us understand your business!</h6>

                            <form class="cus-form-contain" method="post" role="form" id="contact-form" novalidate="true">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <input type="text" name="company" id="company" placeholder="Enter Company Name">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="email" name="email" id="email" placeholder="Enter Email Address">
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="industry_id" id="industry_id" Onchange="subcatefory(this.value);">
                                            <!-- <option value="">Select Industry Type</option> -->
                                             <option value="">Select Industry Type</option>
                                            <?php  if($all_industry !='' && count($all_industry) > 0){ 
                                            foreach($all_industry as $industry){ ?>
                                            <option value="<?php echo $industry->id; ?>"><?php echo $industry->name; ?></option>      
                                            <?php } }  ?> 
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <span id="prod2">
                                        <select name="sub_industry_id" id="sub_industry_id">
                                            <option value="">Select Sub Industry Type</option>
                                            <?php  if($all_industry !='' && count($all_industry) > 0){ 
                                            foreach($all_industry as $industry){ ?>
                                            <option value="<?php echo $industry->id; ?>"><?php echo $industry->name; ?></option>      
                                            <?php } }  ?> 
                                        </select>
                                    </span>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="text" name="annual_turnover" id="annual_turnover" placeholder="Estimated Annual Turnover" onkeypress="return validateNumber(event)">
                                    </div>

                                     <div class="col-lg-12">
                                        <input type="text" name="asses_value" id="asses_value" placeholder="Estimated Asses Value" onkeypress="return validateNumber(event)">
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="text" name="no_of_emp" id="no_of_emp" placeholder="Number of Employee" onkeypress="return validateNumber(event)">
                                    </div>
                                   <!--  <div class="col-lg-12">
                                        <input type="text" name="companyname" placeholder="Do you sell goods or services on credit?">
                                    </div> -->
                                     
                                    <div class="col-lg-12">
                                       <div class="d-flex align-items-center justify-content-evenly">
                                        <label for="check1"> Do you sell goods or services on credit?</label>
                                        <div class="d-flex align-items-center justify-content-evenly"><span class="text-extra-dark-gray margin-15px-right"><input type="radio" name="check1" id="check1" value="1" class="margin-5px-right margin-5px-top" > Yes</span><span class="text-extra-dark-gray"><input type="radio" name="check1" id="check1" value="2" class="margin-5px-right margin-5px-top"> No</span>
                                       </div>
                                    </div>
                                    </div>

                                    <div class="clearfix">
                                     <div class="form-group">
                                        <span id="contact_error" class="error alert-message valierror" style="display:none;"></span>
                                          <span id="contact_success" class="successmain alert-message" style="display:none;"></span>
                                      </div>
                                    </div>

                                    <div class="text-center margin-15px-top">   
                                     <button class="btn theme-btn-1 text-uppercase" type="button" onclick="javascript:detail_form();">Submit </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start footer -->
   <?php include("includes/footer.php"); ?>
   <script type="text/javascript">
function subcatefory(cid) {
    var sid = "";
    var url = '<?php echo $base_url ?>home/show_subcategory';
    $.ajax({
        url: url,
        type: 'post',
        data: 'cid=' + cid + '&sid=' + sid,
        success: function(msg) {
            document.getElementById('prod2').innerHTML = msg;
        }
    });
}
</script>
<script>
function detail_form() {
    
    //alert('test');

    var company = jQuery("#company").val();
    if (company == '') {
        
        //alert("name");
        jQuery('#contact_error').html("Please Enter Company");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var industry_id = jQuery("#industry_id").val();
    if (industry_id == '') {
        
        //alert("name");
        jQuery('#contact_error').html("Please Select Industry Type");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }
    
    

    var sub_industry_id = jQuery("#sub_industry_id").val();
    if (sub_industry_id == '') {
        jQuery('#contact_error').html("Please Select Sub Industry Type");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var annual_turnover = jQuery("#annual_turnover").val();
    if (annual_turnover == '') {
        
        //alert ('message alert');
        jQuery('#contact_error').html("Plesae Enter Estimated Annual Turnover");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var asses_value = jQuery("#asses_value").val();
    if (asses_value == '') {
        
        //alert ('message alert');
        jQuery('#contact_error').html("Plesae Enter Estimated Asses Value");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var no_of_emp = jQuery("#no_of_emp").val();
    if (no_of_emp == '') {
        
        //alert ('message alert');
        jQuery('#contact_error').html("Plesae Enter Number of Employee");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }
    
    var check1 = jQuery('input[name="check1"]:checked').val();
    // var check2 = jQuery("#check2").val();
    // if (check1 == '') {
        
    //     //alert ('message alert');
    //     jQuery('#contact_error').html("Plesae Enter City");
    //     jQuery('#contact_error').show().delay(0).fadeIn('show');
    //     jQuery('#contact_error').show().delay(2000).fadeOut('show');
    //     return false;
    // }

    var url = '<?php echo $base_url;?>home/detail_form_submit';
    jQuery.ajax({
        url: url,
        type: 'post',
        data: '&company=' + company + '&industry_id=' + industry_id + '&sub_industry_id=' + sub_industry_id + '&annual_turnover=' + annual_turnover + '&asses_value=' + asses_value + '&no_of_emp=' + no_of_emp + '&check1=' + check1 ,
        
        success: function(msg) {
             //console.log(msg);
            if (msg == "1") {
                $("#product_added").html("Detail Form Submitted Successfully");
                $('#product_added').show().delay(0).fadeIn('show');
                $('#product_added').show().delay(2000).fadeOut('show');
                jQuery('#company').val('');
                jQuery('#industry_id').val('');
                jQuery('#sub_industry_id').val('');
                jQuery('#annual_turnover').val('');
                jQuery('#asses_value').val('');
                jQuery('#no_of_emp').val('');
                $( "#check1" ).prop("checked",false);
                location.href = "<?php echo $base_url; ?>risk-assessment";

                // jQuery('#annual_turnover').val('');
                return false;
            } else {
                console.log("err");
            }
        }
    });
}

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
}
</script>