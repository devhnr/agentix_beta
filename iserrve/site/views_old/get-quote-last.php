<?php include("includes/header.php"); ?>
<style>
     .margin-bottom-20px{
         margin-bottom:20px;
    }

.v-tooltip {
  position: relative;
  display: inline-block;

}

.v-tooltip .v-tooltiptext {
    visibility: hidden;
    width: 320px;
    background-color: #1a1b1c;
    color: #fff;
    text-align: justify;
    border-radius: 6px;
    padding: 10px;
    position: absolute;
    z-index: 1;
    top: -100%;
    font-size: 13px;
    /* left: 0%; */
}

.v-tooltip:hover .v-tooltiptext {
  visibility: visible;
}

.v-check{
    margin-right: 30px;
    margin-bottom: 0;
    width: auto;
    }

    img.tte-img {
    width: 42px;
    margin-right: 9px;
}


    </style>

<section class="padding-25px-tb bg-light-gray">
    <div class="container">
        <div class="row get-quote align-items-center margin-30px-bottom">
            <div class="col-lg-4">
                <a href="https://www.raghnall.co.in/iserrve" class="v-btn">BACK TO HOME</a>
            </div>
            <div class="col-lg-4 text-center">
                <h1 class="alt-font font-weight-700">Get <span class="text-blue1">Quote</span></h1>
            </div>
            <div class="col-lg-4">
                <button href="#" class="expert-btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                   <img class="tte-img" src="<?php echo $base_url_views?>img/avatar.png" alt="">
                    <span>
                    <span class="ex-btn-title">Need Help?</span>
                    <br>
                    <span class="ex-main">Talk to Our Expert</span>
                    </span>
                </button>
            </div>

        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 bg-white">
                <form id="regForm" role="regForm" method="post" action="<?=base_url()?>home/register">

    <INPUT TYPE="hidden" NAME="action" VALUE="verifyyourself11">
    <INPUT TYPE="hidden" name="ri_redirect" value="1">
    <INPUT TYPE="hidden" NAME="user_id" VALUE="<?php echo $this->session->userdata('userid');?>">
                    <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-bottom:30px; width: 100%">
    <span class="s-count text-center ">1</span>
    <span class="step" id="step1"></span>
     <span class="s-count text-center">2</span>
    <span class="step" id="step2"></span>
     <span class="s-count text-center">3</span>
    <span class="step" id="step3"></span>
     <span class="s-count text-center">4</span>
    <span class="step" id="step4"></span>
    <span class="s-count text-center">5</span>
        <span class="step active" id="step5"></span>
                    </div>

  <!-- One "tab" for each step in the form: -->
  <!--<div class="tab" id="step1">
      <div class="row justify-content-center">
          <div class="col-lg-12 text-center margin-20px-bottom">
              <h4>Tell us About your team</h4>
          </div>
          <div class="col-lg-6">
              <!--<input placeholder="Location" class="text-extra-dark-gray" name="location">
                  <select class="radio-bg1 box-shadow form-select"   aria-label="Default select example">
      <option selected>Select Location</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
          </div>

            <div class="col-lg-6">
                          <select class="form-select radio-bg1" aria-label="Default select example">
      <option selected>Average Age Of Employees</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
             </div>
             <div class="col-lg-12 text-center ">
              <span class="text-extra-dark-gray font-weight-700">Coverage for</span>
              </div>
            <div class="col-lg-6  margin-10px-bottom">
                <div class="radio-bg box-shadow">
                    <input id="radio-1" class="radio-custom" name="radio-group" type="radio" >
                <label for="radio-1" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i> Employee Only</label>
                </div>

            </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-2" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-2" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse & Children</label>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-3" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-3" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse, Children & Parents</label>
            </div>
        </div>
          </div>
      </div>-->


  <!--<div class="tab">


     <div class="col-lg-12 text-center ">
              <h6>Coverage For</h6>
          </div>
               <div class="row">
            <div class="col-lg-6  margin-10px-bottom">
                <div class="radio-bg box-shadow">
                    <input id="radio-01" class="radio-custom"   name="radio-group" type="radio" >
                <label for="radio-01" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-user text-blue1"></i> Employee Only</label>
                </div>

            </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow position-relative">
            <input id="radio-02" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-02" class="new-display radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse & Children

            </label>
                <span class="recom-sec">(Recommended)</span>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-03" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-03" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse, Children & Parents</label>
            </div>
        </div>
        <div class="col-lg-6 margin-10px-bottom">
            <div class="radio-bg box-shadow">
            <input id="radio-04" class="radio-custom" name="radio-group" type="radio">
            <label for="radio-04" class="radio-custom-label text-extra-dark=gray"><i class="fas fa-users text-blue1"></i> Employee, Spouse, Children & Parents</label>
            </div>
        </div>
          </div>
          </div>-->


    <div class="tab5">


      <div class="new-input new-padding box-shadow">

            <div class="container">
            <div class="row">

          <div class="col-lg-12 text-center heading-section-title margin-20px-bottom">
         <h6>Thank You for sharing your details. </h6>
              <h6>Your tentative premium is INR <span id="sum_count"><?=$this->session->userdata('get_quote_session')['sum_value']?></span> </h6>

			  <p>We will get back to you soon with detailed quotes!</p>
          </div>
                <div class="col-lg-12 col-12 padding-30px-bottom order-lg-2">
                    <div class="accountdetails">
                        <div class="row padding-30px-bottom">
                            <div class="col-sm-12">
                                <div class="displayfields">
                                    <h6 class="text-black">Plan Details<!-- <span><a href="#step1"><u>Edit</u></a></span>--></h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Location</h4>
                                    <p id="location_print"><?=$this->session->userdata('get_quote_session')['location']?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Coverage Type</h4>
                                    <?php
                                        $coverage_val = $this->session->userdata('get_quote_session')['coverage_val'];
                                        if($coverage_val == 1){
                                            $c_val = 'Employee Only';
                                        }else if($coverage_val == 2){
                                            $c_val = 'Employee, Spouse & Children';
                                        }else if($coverage_val == 3){
                                            $c_val = 'Employee, Spouse, Children & Parents';
                                        }
                                    ?>
                                    <p id="cov_print"><?=$c_val?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Sum Insured</h4>
                                    <?php
                                        $sum_insurance_val = $this->session->userdata('get_quote_session')['sum_insurance_val'];
                                        if($sum_insurance_val == 100000){
                                            $s_val = '1 Lacs';
                                        }else if($sum_insurance_val == 300000){
                                            $s_val = '3 Lacs';
                                        }else if($sum_insurance_val == 500000){
                                            $s_val = '5 Lacs';
                                        }
                                    ?>
                                    <p id="sum_print"><?=$s_val?></p>
                                </div>
                            </div>

                            <input type="hidden" name="product_id" id="product_id" value="1">
                              <!--<div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Room Rent Cap</h4>
                                    <p>1% of SI for Normal and 2% of Si for ICU</p>
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="displayfields">
                                    <h4>Maternity Coverage</h4>
                                    <p>Yes</p>
                                </div>
                            </div>-->
                        </div>
                        <div class="d-flex align-items-center">
            <input type="checkbox" class="v-check " name="customize_plan" id="customize_plan" value="0"><span>I would like to customize plan


</span>
                </div>

                     <!--   <div class="row">
                            <div class="col-sm-12">
                                <div class="displayfields">
                                    <h6 class="text-black">Address<span><a href="https://evauniversal.co.uk/home/add_address"><u>Add New Address</u></a></span></h6>
                                </div>
                            </div>
                                                    </div>-->
                        <!--<p class="text-center">Your tentative premium is INR xxx</p>
<p class="text-center">Our experts will get in touch with you for detailed quotes!</p>-->
                    </div>
                </div>

            </div>
        </div>
   </div>

      <!-- <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
      <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p> -->

            <div class="row">

                            <div class="col-md-12" style=" margin-top: 20px;">
                    <span id="tab3_error" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="tab3_success" class="successmain alert-message"
                        style="display:none;"></span>
                </div>

                        <div class="col-lg-12">
                            <div class="bg-white">

                       <div style="float:right;">


                            <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="get_hide_show(3)">Previous</button>
                            <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn12" onclick="get_hide_show(6);">Talk to Expert</button>
                        </div>
                    </div>
                </div>
            </div>
      </div>





  <div class="row align-items-center justify-content-center">

      <!-- <div class="col-lg-12">
           <div class="bg-white">
            <div style="float:right;">
              <button type="button" class="v-btn2  margin-20px-bottom" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button type="button" class="v-btn  margin-20px-bottom phn_error" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
  </div>
      </div> -->
      <div class="col-lg-12 text-center">
          <h4 class="margin-20px-bottom">Policy Conditions</h4>
          <div class="row">
              <div class="col-lg-6">
                  <div class="li-sec">
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Hospitalization Expenses: Covered</span>
                  </div>
                  </div>
                   <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Covid 19: Covered</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Room Rent: 2% sum insured capped at 5,000 per day</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>ICU: 4% sum insured capped at 10,000 per day</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Pre-Post Hospitalization Expenses: 30 days, 60 days</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Domiciliary Hospitalization: Covered</span>
                  </div>
                  </div>
                  </div>



              </div>
              <div class="col-lg-6">
                  <div class="li-sec">
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Day Care Treatment: Covered</span>
                  </div>
                  </div>
                   <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Pre-Existing diseases: Covered from Day 1</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Maternity Expenses: Not Covered</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Pre-Post Natal Expenses: Not Covered</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Disease wise capping: None</span>
                  </div>
                  </div>
                       <div class="d-flex align-items-center li-flex-item">
                      <div class="li-num">

                  </div>
                  <div class="li-desc">
                      <span>Addition/Deletion of life: Pro-rated</span>
                  </div>
                  </div>
                  </div>



              </div>

          </div>
      </div>

</div>




</form>
            </div>
        </div>
        </div>

</section>

<script>
   function get_hide_show(id)
   {

    if(id == 1){

        $( "#step1" ).addClass( 'active');


        $( "#step1" ).removeClass( 'finish');

        $( "#step2" ).removeClass( 'active');
        $( "#step3" ).removeClass( 'active');
        $( "#step4" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'active');

        //$( "#step2" ).addClass( 'active');



        $(".tab1").css("display", "block");
        $(".tab3").css("display", "none");
        $(".tab4").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab2").css("display", "none");

    }

    if(id == 2)
     {
       var company = $('#company').val();
      if (company == '') {
        $('#tab1_error').html("Please Enter Company Name");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
      }

       var email = jQuery("#email").val();
        if (email == '') {
            jQuery('#tab1_error').html("Please Enter Email Id");
            jQuery('#tab1_error').show().delay(0).fadeIn('show');
            jQuery('#tab1_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var em1 = jQuery('#email').val();
        var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter1.test(em1)) {
            jQuery('#tab1_error').html("Please Enter Valid Email Id");
            jQuery('#tab1_error').show().delay(0).fadeIn('show');
            jQuery('#tab1_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var no_emp = $("#no_emp").val();
        if (no_emp == '') {
        $("#tab1_error").html("Please Enter No Of Employees.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
        }

        var coverage_val = $("input[name='radio_group']:checked").val();

     var name = $("#name").val();
        if (name == '') {
        $("#tab1_error").html("Please Enter Your Name.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }

     var location = $("#location").val();
        if (location == '') {
        $("#tab1_error").html("Please Select Location.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }

     var age_emp = $("#age_emp").val();
        if (age_emp == '') {
        $("#tab1_error").html("Please Select Average Age Of Employees.");
        $('#tab1_error').show().delay(0).fadeIn('show');
        $('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }

     var coverage =  $('input[name="radio_group"]:checked');
     if (coverage.length == 0) {
         jQuery('#tab1_error').html("Plesae Choose Coverage");
        jQuery('#tab1_error').show().delay(0).fadeIn('show');
        jQuery('#tab1_error').show().delay(2000).fadeOut('show');
        return false;
     }
        $( "#step1" ).addClass( 'finish');
        $( "#step1" ).removeClass( 'active');

        $( "#step2" ).addClass( 'active');
        $( "#step2" ).removeClass( 'finish');

        $( "#step3" ).removeClass( 'active');
        $( "#step3" ).removeClass( 'finish');

        $( "#step4" ).removeClass( 'active');
        $( "#step4" ).removeClass( 'finish');

        $( "#step5" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'finish');


        $(".tab1").css("display", "none");
        $(".tab3").css("display", "none");
        $(".tab4").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab2").css("display", "block");

    }

    if (id == 3) {

        var sum_insurance = $("input[name='sum_insurance']:checked").val();

         if (sum_insurance == undefined) {
            $('#tab2_error').html("Please Select Coverage For");
            $('#tab2_error').show().delay(0).fadeIn('show');
            $('#tab2_error').show().delay(2000).fadeOut('show');
            return false;
        }

        $( "#step2" ).addClass( 'finish');
        $( "#step2" ).removeClass( 'active');


        $( "#step3" ).addClass( 'active');
        $( "#step3" ).removeClass( 'finish');

        $( "#step4" ).removeClass( 'active');
        $( "#step4" ).removeClass( 'finish');

        $( "#step5" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'finish');


        $(".tab1").css("display", "none");
        $(".tab2").css("display", "none");

        $(".tab4").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab3").css("display", "block");
    }


    if(id == 4){

        var phone = $("#phone").val();
        if (phone == '') {
            jQuery('#tab3_error').html("Please Enter Mobile Number");
            jQuery('#tab3_error').show().delay(0).fadeIn('show');
            jQuery('#tab3_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone = jQuery('#phone').val();
        if(phone != ''){
            var filter = /^\d{10}$/;
            if (!filter.test(phone)) {
                jQuery('#tab3_error').html("Enter Valid Mobile Number");
                jQuery('#tab3_error').show().delay(0).fadeIn('show');
                jQuery('#tab3_error').show().delay(2000).fadeOut('show');
                return false;
            }
        }



        if(!document.getElementById('termscondition').checked){
            jQuery('#tab3_error').html("Please Agree To The Terms & Conditions");
            jQuery('#tab3_error').show().delay(0).fadeIn('show');
            jQuery('#tab3_error').show().delay(2000).fadeOut('show');
            return false;
        }

        $( "#step3" ).addClass( 'finish');
        $( "#step3" ).removeClass( 'active');


        $( "#step4" ).addClass( 'active');
        $( "#step4" ).removeClass( 'finish');

        $( "#step5" ).removeClass( 'active');
        $( "#step5" ).removeClass( 'finish');


        $(".tab1").css("display", "none");
        $(".tab2").css("display", "none");

        $(".tab3").css("display", "none");
        $(".tab5").css("display", "none");

        $(".tab4").css("display", "block");

        const last4Str = String(phone).slice(-4); // 👉️ '6789'
    const last4Num = Number(last4Str);

    var no_emp = $("#no_emp").val();

    document.getElementById('last4_digits').innerHTML = last4Num ;
    var sum_insurance_val = $("input[name='sum_insurance']:checked").val();
    var sum_value = sum_insurance_val * no_emp * 0.85/100;

    var location = $("#location").val();
    var coverage_val = $("input[name='radio_group']:checked").val();


    // alert(sum_insurance_val);


                         var url = '<?=base_url()?>home/otpsent';
                         var otptosend = <?php echo $this->session->userdata('mobileOtp'); ?>;

                         var isverified_mobile = jQuery("#isverified_mobile").val();
                        if (isverified_mobile == 0) {
                         $.ajax({
                         url: url,
                         type: 'post',
                         data: 'phone=' + phone + '&otp=' + otptosend,

                            success: function(msg) {

                                if(msg != 0){
                                    $("#mobile_otp_display").css("display", "block");
                                    $("#mobile_button_display").css("display", "block");
                                    $("#display_none").css("display", "none");
                                    $("#show").css("display", "block");
                                    $("#message_succsess").html("OTP Sent to your Mobile Number Successfully.");
                                    $('#message_succsess').show().delay(0).fadeIn('show');
                                    $('#message_succsess').show().delay(5000).fadeOut('show');
                                    document.getElementById('location_print').innerHTML = location ;
                                    if(coverage_val == 1){
                                        document.getElementById('cov_print').innerHTML = 'Employee Only';
                                    }else if(coverage_val == 2){
                                        document.getElementById('cov_print').innerHTML = 'Employee, Spouse & Children';
                                    }else if(coverage_val == 3){
                                        document.getElementById('cov_print').innerHTML = 'Employee, Spouse, Children & Parents';
                                    }
                                    if(sum_insurance_val == 100000){
                                        document.getElementById('sum_print').innerHTML = '1 Lacs' ;
                                    }else if(sum_insurance_val == 300000){
                                        document.getElementById('sum_print').innerHTML = '3 Lacs';
                                    }else if(sum_insurance_val == 500000){
                                        document.getElementById('sum_print').innerHTML = '5 Lacs';
                                    }
                                    document.getElementById('sum_count').innerHTML = sum_value ;
                                    //$("#location_print").html(location);

                                }
                                // else{
                                //      $('#regForm').submit();
                                // }
                            }
                        });
                     }

    }

    if(id == 5){

        var isverified_mobile = jQuery("#isverified_mobile").val();
        if (isverified_mobile == 0) {

        var verify_mobile_otp = jQuery("#verify_mobile_otp").val();
        if (verify_mobile_otp == '') {
            jQuery("#tab4_error").html("Please Enter otp.");
            jQuery('#tab4_error').show().delay(0).fadeIn('show');
            jQuery('#tab4_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp != '<?php echo $this->session->userdata('mobileOtp'); ?>') {
            jQuery("#tab4_error").html("Please Enter Valid otp.");
            jQuery('#tab4_error').show().delay(0).fadeIn('show');
            jQuery('#tab4_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp == '<?php echo $this->session->userdata('mobileOtp'); ?>') {

            jQuery("#message_succsess").html("Mobile Number Verified Successfully.");
            jQuery('#message_succsess').show().delay(0).fadeIn('show');
            jQuery('#message_succsess').show().delay(5000).fadeOut('show');
            jQuery("#isverified_mobile").val('1');
        }

        var isverified_mobile = jQuery("#isverified_mobile").val();
        if (isverified_mobile == 0) {

            jQuery('#tab4_error').html("Please Verify Mobile Number");
            jQuery('#tab4_error').show().delay(0).fadeIn('show');
            jQuery('#tab4_error').show().delay(2000).fadeOut('show');
            return false;

        }

    }

        $( "#step4" ).addClass( 'finish');
        $( "#step4" ).removeClass( 'active');


        $( "#step5" ).addClass( 'active');
        $( "#step5" ).removeClass( 'finish');




        $(".tab1").css("display", "none");
        $(".tab2").css("display", "none");

        $(".tab3").css("display", "none");
        $(".tab4").css("display", "none");

        $(".tab5").css("display", "block");
    }


    if(id == 6){
        //alert('submit');
        //

        if(!document.getElementById('customize_plan').checked){
           jQuery("#customize_plan").val('0');
        }else{
            jQuery("#customize_plan").val('1');
        }

        $('#regForm').submit();
    }
}


 </script>


 <script>

    function verify_mobileOtp(){

        var verify_mobile_otp = jQuery("#verify_mobile_otp").val();
        if (verify_mobile_otp == '') {
            jQuery("#contact_error1").html("Please Enter otp.");
            jQuery('#contact_error1').show().delay(0).fadeIn('show');
            jQuery('#contact_error1').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp != '<?php echo $this->session->userdata('mobileOtp'); ?>') {
            jQuery("#contact_error1").html("Please Enter Valid otp.");
            jQuery('#contact_error1').show().delay(0).fadeIn('show');
            jQuery('#contact_error1').show().delay(2000).fadeOut('show');
            return false;
        }

        if (verify_mobile_otp == '<?php echo $this->session->userdata('mobileOtp'); ?>') {

            jQuery("#message_succsess").html("Mobile Number Verified Successfully.");
            jQuery('#message_succsess').show().delay(0).fadeIn('show');
            jQuery('#message_succsess').show().delay(5000).fadeOut('show');
            jQuery("#isverified_mobile").val('1');
        }

        var isverified_mobile = jQuery("#isverified_mobile").val();
        if (isverified_mobile == 0) {

            jQuery('#contact_error1').html("Please Verify Mobile Number");
            jQuery('#contact_error1').show().delay(0).fadeIn('show');
            jQuery('#contact_error1').show().delay(2000).fadeOut('show');
            return false;

        }

    }

</script>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Talk to our Expert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="buy-now-contain">
            <form class="v-form" id="need_help" role="need_help" method="post" action="<?=base_url()?>home/chatForm">
                 <INPUT TYPE="hidden" NAME="action" VALUE="verifyyourself22">
                <INPUT TYPE="hidden" name="ri_redirect_popUp" value="1">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="pop_name">
                    </div>
                    <div class="col-lg-12">
                        <input type="email" class="form-control" placeholder="Enter Email" name="email" id="pop_email">
                    </div>
                    <div class="col-lg-12">
                        <input type="tel" class="form-control" placeholder="Enter Mobile" name="phone_number" id="phone_number" onkeypress="return validateNumber(event)">
                    </div>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Enter Company Name" name="company" id="pop_company">
                        <input type="hidden" class="form-control" placeholder="Enter Company Name" name="product_id" id="product_id" value="<?php echo $get_product_detail->id;?>">
                    </div>
                     <div class="col-md-12">
                    <span id="contact_error2" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="contact_success2" class="successmain alert-message"
                        style="display:none;"></span>
                     </div>
                    <div class="col-lg-12">
                        <button type="button" class="v-btn" onclick="javascript:popUpform();">TALK TO EXPERT</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    var token = "<?php echo $_GET['token']?>";
     if(token != ''){
       $.ajax({
           url: '<?=base_url()?>employee/otpless_getdata',
           type: 'post',
           dataType:'json',
           data: 'token=' + token,
              success: function(response) {
                console.log(response);
              }
       })
    }
  });
    function popUpform(){
       // alert('test');
        var pop_name = jQuery("#pop_name").val();
        if (pop_name == '') {
            jQuery("#contact_error2").html("Please Enter Name");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

         var pop_email = jQuery("#pop_email").val();
        if (pop_email == '') {
            jQuery('#contact_error2').html("Please Enter Email Id");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

        var em1 = jQuery('#pop_email').val();
        var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter1.test(em1)) {
            jQuery('#contact_error2').html("Please Enter Valid Email Id");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone_number = $("#phone_number").val();
        if (phone_number == '') {
            jQuery('#contact_error2').html("Please Enter Mobile Number");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone_number = jQuery('#phone_number').val();
        if(phone_number != ''){
            var filter = /^\d{10}$/;
            if (!filter.test(phone_number)) {
                jQuery('#contact_error2').html("Enter Valid Mobile Number");
                jQuery('#contact_error2').show().delay(0).fadeIn('show');
                jQuery('#contact_error2').show().delay(2000).fadeOut('show');
                return false;
            }
        }

         var pop_company = jQuery("#pop_company").val();
        if (pop_company == '') {
            jQuery("#contact_error2").html("Please Enter Company Name");
            jQuery('#contact_error2').show().delay(0).fadeIn('show');
            jQuery('#contact_error2').show().delay(2000).fadeOut('show');
            return false;
        }

         $('#need_help').submit();


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

<?php include("includes/footer.php"); ?>
    </body>

    </html>
