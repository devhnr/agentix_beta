<?php include("includes/header.php"); ?>
       <section class="padding-25px-tb bg-blue4">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    
                    <div class="col-lg-6 h-100 col-sm-10">
                        <div class="row align-items-center bg-white box-shadow">
                        
                        <div class="col-lg-12 padding-25px-tb padding-25px-lr">
                            <h6 class="text-blue1 text-center font-weight-700 margin-15px-bottom">Contact Details</h6>
                            <!-- <h6 class="text-blue1">Help us understand your business!</h6> -->

                            <form class="cus-form-contain" id="inquiry_form" action="<?php echo $base_url;?>billship/inquiry_form_submit" method="post">

                                 <?php //echo"<pre>";print_r($_POST);echo"</pre>";
                                    
                                 $type_id = implode(",", $_POST['type_id']);
                                 $product_id = implode(",", $_POST['product_id']);
                                 $product_price = implode(",", $_POST['product_price']);
                                 $product_average = implode(",", $_POST['product_average']);
                                 $total_coverage_premium = implode(",", $_POST['total_coverage_premium']);
                                ?>

                                <input type="hidden" name="companyname" value="<?php echo $this->session->userdata('company')?>">
                                <input type="hidden" name="industry_id" value="<?php echo $this->session->userdata('industry_id')?>">
                                <input type="hidden" name="sub_industry_id" value="<?php echo $this->session->userdata('sub_industry_id')?>">
                                <input type="hidden" name="annual_turnover" value="<?php echo $this->session->userdata('annual_turnover')?>">
                                <input type="hidden" name="asses_value" value="<?php echo $this->session->userdata('asses_value')?>">
                                <input type="hidden" name="no_of_emp" value="<?php echo $this->session->userdata('no_of_emp')?>">
                                <input type="hidden" name="email" value="<?php echo $this->session->userdata('email')?>">
                                



                                <input type="hidden" name="coverage_id" value="<?php echo $_POST['coverage_id']?>">
                                <input type="hidden" name="type_id" value="<?php echo $type_id?>">
                                <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                                <input type="hidden" name="product_price" value="<?php echo $product_price?>">
                                <input type="hidden" name="product_average" value="<?php echo $product_average?>">
                                <input type="hidden" name="total_coverage_premium" value="<?php echo $total_coverage_premium?>">

                                <input type="hidden" name="net_premium" value="<?php echo $_POST['net_premium']?>">
                                <input type="hidden" name="gst_amount" value="<?php echo $_POST['gst_amount']?>">
                                <input type="hidden" name="total_premium" value="<?php echo $_POST['total_premium']?>">
                                <input type="hidden" name="discount_amount" value="<?php echo $_POST['discount_amount']?>">
                                
                                 <?php $this->session->set_userdata('mobileOtp',rand (1000,9999)); ?>

                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <input type="text" name="name_inquiry" id="name_inquiry" placeholder="Enter your Name">
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <input type="text" name="mobile_inquiry" id="mobile_inquiry" placeholder="Mobile Number">
                                    </div>

                                    <?php if($this->session->userdata('userid') == ''){ ?>

                                        <div id="otp_success" style="display: none;">

                                        <input type="hidden" name="isverified_mobile" id="isverified_mobile" value="0">
										<input type="hidden" name="is_otp_send" id="is_otp_send" value="0">

                                        <!-- <div class="bg-extra-light-gray margin-30px-tb h-2px"></div> -->


                                        <div class="row align-items-center " style="
    margin-bottom: 17px;
">
                                        <div class="col-lg-8 col-md-8 col-sm-8 ">
                                            <input type="text" name="otp_number" id="otp_number" class="m-0" placeholder="Enter OTP">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <span><a href="javascript:void(0)" onclick="get_otp();" class="text-blue2 ">Resend OTP</a></span>
                                        </div>
                                        <!--<div class="col-lg-4 col-md-4 col-sm-4 ">
                                            <button class="btn theme-btn-1 text-uppercase" type="button" onclick="verify_otp();">Verify </button>
                                        </div> -->
                                        
                                        </div>
                                        </div>
                                        <?php }?>

                                     <div class="col-lg-12">
                                        <input type="text" name="email_inquiry" id="email_inquiry" placeholder="Email ID" value="<?php echo $this->session->userdata('email');?>">
                                    </div>

                                    <?php if($this->session->userdata('userid') != ''){ ?>
                                    <div class="col-lg-12">
                                           <textarea name="agent_comment" id="agent_comment" cols="30" rows="6" placeholder="Agent Comment"></textarea>
                                    </div>
                                <?php }?>
                                    <div class="col-lg-12">
                                        <span id="tab4_error" class="error alert-message valierror"
                                            style="display:none;"></span>
                                        <span id="tab4_success" class="successmain alert-message"
                                            style="display:none;"></span>
                                    </div>
                                    

                                    <?php if($this->session->userdata('userid') == ''){ ?>
                                        <div class="col-lg-12 text-center margin-15px-top otp_send_success">   
                                         <button class="btn theme-btn-1 text-uppercase" id="otp_button" type="button" onclick="get_otp();">Submit </button>
                                        </div>
                                    <?php } ?>
									
									<div class="col-lg-12 text-center margin-15px-top otp_verify " style="display:none;">
                                            <button class="btn theme-btn-1 text-uppercase" type="button" onclick="verify_otp();">Submit </button>
                                    </div>

                                    

                                </div>

                                 

                                    <div class="text-center margin-15px-top" id="submit_button" style="<?php if($this->session->userdata('userid') != ''){echo "display: block";}else{echo "display: none";} ?>">   
                                         <button class="btn theme-btn-1 text-uppercase" type="button" onclick="validate();">Submit </button>
                                    </div>
                                

                                

                            </form>

                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- start footer -->
        <?php include("includes/footer.php"); ?>
        <script type="text/javascript">

            function get_otp() {


                var name_inquiry = jQuery("#name_inquiry").val();
                if (name_inquiry == '') {
                    jQuery("#tab4_error").html("Please Enter Name.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }

                var mobile_inquiry = jQuery("#mobile_inquiry").val();
                if (mobile_inquiry == '') {
                    jQuery("#tab4_error").html("Please Enter Mobile No.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }


                var mobile_inquiry = jQuery('#mobile_inquiry').val();
                if(mobile_inquiry != ''){
                    var filter = /^\d{10}$/;
                    if (!filter.test(mobile_inquiry)) {
                        jQuery('#tab4_error').html("Enter Valid Mobile Number");
                        jQuery('#tab4_error').show().delay(0).fadeIn('show');
                        jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                        return false;
                    }
                }

                var email_inquiry = jQuery("#email_inquiry").val();
                if (email_inquiry == '') {
                    jQuery("#tab4_error").html("Please Enter Email.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }


                var em1 = jQuery('#email_inquiry').val();
                var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter1.test(em1)) {
                    jQuery('#tab4_error').html("Please Enter Valid Email Id");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }

                 var url = '<?php echo $base_url;?>home/otpsent';
                 var otptosend = <?php echo $this->session->userdata('mobileOtp'); ?>;
                 $.ajax({
                 url: url,
                 type: 'post',
                 data: 'mobile_inquiry=' + mobile_inquiry + '&otp=' + otptosend,

                    success: function(msg) {

                        if(msg != 0){
                            $("#otp_success").show();
							$(".otp_send_success").hide();
							$(".otp_verify").show();
                            $("#message_succsess").html("OTP Sent to your Mobile Number Successfully.");
                            $('#message_succsess').show().delay(0).fadeIn('show');
                            $('#message_succsess').show().delay(5000).fadeOut('show');
                            
                            
                        }
                        // else{
                        //      $('#regForm').submit();
                        // }
                    }
                });
                     

                
                
            }

            function verify_otp() {
                
                var otp_number = jQuery("#otp_number").val();
                if (otp_number == '') {
                    jQuery("#tab4_error").html("Please Enter otp.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }

                if (otp_number != '<?php echo $this->session->userdata('mobileOtp'); ?>') {
                    jQuery("#tab4_error").html("Please Enter Valid otp.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }

                if (otp_number == '<?php echo $this->session->userdata('mobileOtp'); ?>') {

                    jQuery("#message_succsess").html("Mobile Number Verified Successfully.");
                    jQuery('#message_succsess').show().delay(0).fadeIn('show');
                    jQuery('#message_succsess').show().delay(5000).fadeOut('show');
                    jQuery("#isverified_mobile").val('1');
					
					jQuery('#inquiry_form').submit();
					
                    /* jQuery("#otp_button").hide();
                    jQuery("#otp_success").hide(); */
					
					
					
                    //jQuery("#submit_button").show();
                }
            }

            function validate(){

                var name_inquiry = jQuery("#name_inquiry").val();
                if (name_inquiry == '') {
                    jQuery("#tab4_error").html("Please Enter Name.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }

                var mobile_inquiry = jQuery("#mobile_inquiry").val();
                if (mobile_inquiry == '') {
                    jQuery("#tab4_error").html("Please Enter Mobile No.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }


                var mobile_inquiry = jQuery('#mobile_inquiry').val();
                if(mobile_inquiry != ''){
                    var filter = /^\d{10}$/;
                    if (!filter.test(mobile_inquiry)) {
                        jQuery('#tab4_error').html("Enter Valid Mobile Number");
                        jQuery('#tab4_error').show().delay(0).fadeIn('show');
                        jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                        return false;
                    }
                }

                var email_inquiry = jQuery("#email_inquiry").val();
                if (email_inquiry == '') {
                    jQuery("#tab4_error").html("Please Enter Email.");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }


                var em1 = jQuery('#email_inquiry').val();
                var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter1.test(em1)) {
                    jQuery('#tab4_error').html("Please Enter Valid Email Id");
                    jQuery('#tab4_error').show().delay(0).fadeIn('show');
                    jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                    return false;
                }
                var userid = '<?php echo $this->session->userdata('userid');?>';
                if(userid != ''){

                    var agent_comment = jQuery("#agent_comment").val();
                    if (agent_comment == '') {
                        jQuery("#tab4_error").html("Please Comment.");
                        jQuery('#tab4_error').show().delay(0).fadeIn('show');
                        jQuery('#tab4_error').show().delay(2000).fadeOut('show');
                        return false;
                    }
                }

                jQuery('#inquiry_form').submit();

            }
        </script>