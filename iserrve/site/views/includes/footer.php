<script src="<?=base_url()?>site/views/Owl Sliders/assets/js/jquery-1.9.1.min.js"></script>
<script src="<?=base_url()?>site/views/Owl Sliders/owl-carousel/owl.carousel.js"></script>


<footer class="page-footer p-0">
  <div class="container">



    <div class="row justify-content-center">


      <div class="col-sm-9 py-2 text-center">
		  <p>iSerrve is a Product by Raghnall Insurance Broking and Risk Management Pvt. Ltd. (CIN - U74900MH2014PTC254164) IRDA License Code: IRDA/DB-599/14, IRDA License Number: 536 valid till <strong>23/08/2024</strong>.</p>
        <p id="copyright" style="font-size:13px">Copyrights © 2022 All Rights Reserved By <a href="<?php echo $base_url?>"> Mititek</a>. </p>
       <!-- <p style="font-size:11px;margin-left:115px">Designed By <a href="#" target="_blank">Five Online</a>.</p>-->
      </div>

    </div>
  </div> <!-- .container -->
</footer>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Talk to Our Expert</h5>
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
                        <input type="hidden" class="form-control" placeholder="Enter Company Name" name="product_id" id="product_id" value="1">
                    </div>
                     <div class="col-md-12">
                    <span id="contact_error2" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="contact_success2" class="successmain alert-message"
                        style="display:none;"></span>
                     </div>
                    <div class="col-lg-12">
                        <button type="button" class="v-btn" onclick="javascript:popUpform();">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
</div>

	 <div class="modal fade" id="talktoexpert" tabindex="-1" aria-labelled="" aria-hidden="true">
		  <div class="modal-dialog">
			  <div class="modal-content">
				  <div class="modal-header">
					  <h5 class="modal-title">Book Consultation</h5>
        				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
					  <div class="buy-now-contain">
						  <form class="v-form" id="book_consultation" role="need_help" method="post" action="<?=base_url()?>home/book_consultation">
                            <INPUT TYPE="hidden" NAME="action" VALUE="verifyyourself1919">
                            <INPUT TYPE="hidden" name="ri_redirect_bookconsult" value="1">
							  <div class="row">
								  <div class="col-lg-12">
									  <input type="text" class="form-control" id="name_book" name="name" placeholder="Enter Your Name">
								  </div>
								  <div class="col-lg-12">
									  <input type="mobile" class="form-control" id="phone_book" name="phone" placeholder="Enter Your Mobile" onkeypress="return validateNumber(event)">
								  </div>
								  <div class="col-lg-12">
									  <input type="email" class="form-control" id="email_book" name="email" placeholder="Enter Your Email">
								  </div>
								  <div class="col-lg-12">
									  <input type="text" class="form-control" id="company_book" name="company" placeholder="Enter Your Company Name">
								  </div>
                                  <div class="col-lg-12">
                                        <input type="text" class="form-control" id="location_book" name="location" placeholder="Enter Your Location">
                                    </div>
                                   <div class="col-md-12">
                                    <span id="bookconsult_error" class="error alert-message valierror"
                                        style="display:none;"></span>
                                    <span id="bookconsult_success" class="successmain alert-message"
                                        style="display:none;"></span>
                                     </div>
								  <div class="col-lg-12 text-center">
									  <button type="button" class="v-btn" onclick="javascript:bookConsultation();">Submit</button>
								  </div>
							  </div>
						  </form>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>

			  <!-- <div class="modal fade" id="loginopt" tabindex="-1" aria-labelled="" aria-hidden="true">
		  <div class="modal-dialog">
			  <div class="modal-content modal-lg">

				  <div class="modal-body">
					  <div class="buy-now-contain">
						 <div class="row align-items-center" >
							 <div class="col-lg-12 text-center pb-2">
								 <h5>Select Your Login Option</h5>
							 </div>
							 <div class="col-lg-6">
								 <a href="#" class="empLogin" data-bs-toggle="modal" data-bs-target="#loginmodal">
									 <img src="<?=base_url()?>site/views/img/employee-login.png">
								 </a>
							 </div>
							 <div class="col-lg-6">
								 <a href="#" class="">
									 <img src="<?=base_url()?>site/views/img/hr-login.png">
								 </a>
							 </div>

						 </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div> -->

      <div class="modal fade" id="loginopt" tabindex="-1" aria-labelled="" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content modal-lg">

                  <div class="modal-body">
                      <div class="buy-now-contain">
                         <div class="row align-items-center" >
                             <div class="col-lg-12 text-center pb-2">
                                 <h5>Select Your Login Option</h5>
                             </div>
                             <div class="col-6">
                                 <a href="#" class="log-opt empLogin" data-bs-toggle="modal" data-bs-target="#loginmodal">
                                     <img src="<?=base_url()?>site/views/img/emp-login-icon.png">
                                     <span>Employee</span>
                                 </a>
                             </div>
                             <div class="col-6">
                                 <a href="#"  data-bs-toggle="modal" data-bs-target="#loginhr" class="log-opt hrLogin">
                                     <img src="<?=base_url()?>site/views/img/hr-icon-login.png">
                                     <span>HR</span>
                                 </a>
                             </div>

                         </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

			  <style>

.cus-tab {
  overflow: hidden;
    justify-content: center;
    margin: 0 auto;
    display: flex;
    margin-top: 20px;
}

/* Style the buttons inside the tab */
.cus-tab button {
   float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    margin-right: 20px;
    border-radius: 50px;
    padding: 10px 33px;
}

/* Change background color of buttons on hover */
.cus-tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.cus-tab .custab.cusactive {
  /* background-color: var(--maincolor); */
    background-color: #eb631d;
    color: #fff;
}

/* Style the tab content */
.custabcontent {
  display: none;
  padding: 20px 12px;
  border-top: none;
}

button.whatsapp-login i {
    font-size: 26px;
    vertical-align: middle;
    margin-right: 9px;
}

button.whatsapp-login {
    margin: 20px 0;
    outline: none;
    border: none;
    padding: 10px 24px;
    background: #25D366;
    color: #fff;
    font-weight: 400;
    font-family: 'Poppins', sans-serif;
    /* border-radius: 50px; */
    font-size: 13px;
    display:none;
}

.hr-login{
    padding: 40px !important;
}

	</style>
     <div class="modal fade" id="loginhr" tabindex="-1" aria-labelled="" aria-hidden="true">
		      <div class="modal-dialog">
      			  <div class="modal-content modal-lg">
      				   <div class="modal-body">
                      <form action="" method="post" class="hr-login" autocomplete="off">
                          <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="mb-3">HR Login</h3>
                                </div>
                                <div class="col-lg-12 ">
                                    <input type="text" placeholder="Enter Username" class="form-control corporatrLog" name="" id="hr_username">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" placeholder="Enter Password" class="form-control corporatrLog" name="" id="hr_password">
                                </div>
                                <span class="errors" id="login_err" style="color:red; font-size:13px; font-weight:bold;"></span>
                                <div class="col-lg-12">
                                    <button type="button" class="v-btn w-100" id="corporateLogin">Login</button>
                                </div>
                          </div>
                      </form>
      		        </div>
      	     </div>
		     </div>
		</div>

	  <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelled="" aria-hidden="true">
		  <div class="modal-dialog">
			  <div class="modal-content modal-lg">

				  <div class="modal-body">
					  <div class="is-login">



	<div class="cus-tab">
        <button class="custab" onclick="openCity(event, 'London')" id="vigOpen">Login</button>
        <button class="custab" onclick="openCity(event, 'Paris')">Register</button>

</div>

<div id="London" class="custabcontent">


	<form class="emp_login" action="" method="post">
	  <div class="row align-items-center" style="padding: 30px">

		  <div class="col-lg-12 text-center pb-3">
			  <h5>Employee Login</h5>
		  </div>
      <?php $this->session->set_userdata('mobileOtp',rand (1000,9999)); ?>
		  <div class="col-lg-12">
					<input type="tel" class="form-control" placeholder="Enter Mobile" name="mobileno" id="mobileno" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
          <span class="errors" id="phone_err" style="color:red; font-size:13px; font-weight:bold;"></span>
          <span class="errors" id="otp_success" style="color:green; font-size:13px; font-weight:bold;"></span>
      </div>
      <div class="col-lg-12">
        <button type="button" class="whatsapp-login"> <i class="fa fa-whatsapp"></i> Login with Whatsapp</button>
      </div>

      <div class="col-lg-12 text-center">
        <button type="button" class="v-btn2" id="otpRequest">Request OTP</button>
		  </div>
			<div class="col-lg-8">
				<input type="tel" class="form-control my-0 BTN" placeholder="Enter OTP" name="otp" id="otp" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
			</div>
				<div class="col-lg-4">
				<button type="button" class="v-btn my-0 BTN" id="VerifyBTN" style="width:100%">Verify</button>
			</div>
      <span class="errors" id="otp_err" style="color:red; font-size:13px; font-weight:bold;"></span>
      <div class="col-lg-12 text-center">
			  <button type="button" class="v-btn BTN" id="btnLogin" style="width:100%">Login</button>
		  </div>
	  </div>
	</form>
</div>

<div id="Paris" class="custabcontent">
    <form class="emp_register" action="" method="post">
									<div class="row align-items-center" style="padding: 30px">

										<div class="col-lg-12 text-center pb-3">
										 <h5>Employee Register</h5>
                   </div><span class="errors" id="otp_success1" style="color:green; font-size:13px; font-weight:bold;"></span>
                      <span class="errors" id="reg_err" style="color:red; font-size:13px; font-weight:bold;"></span>
											<div class="col-lg-12">
												<input type="text" class="form-control" placeholder="Enter Employee ID" name="emp_id" id="empID">
                        </div>
                      <div class="col-lg-12">
												<input type="text" class="form-control" placeholder="Enter Group code" name="group_code" id="grpCode">
                      </div>
											<div class="col-lg-12">
												<input type="name" class="form-control" placeholder="Enter Name" name="name" id="empName" >
                      </div>
											<div class="col-lg-12">
												<input type="mail" class="form-control" placeholder="Enter Email Address" name="email" id="empEmail">
                      </div>
											<div class="col-lg-12">
												<input type="tel" class="form-control" placeholder="Enter Mobile" name="mobile" id="empMobile" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
                      </div>
                      <div class="col-lg-12 text-center">
                        <button type="button" class="v-btn2" id="verifyReq">Verify</button>
                		  </div>
                      <div class="col-lg-12 text-center">
                        <button type="button" class="v-btn2" id="otpRequest2">Request OTP</button>
                		  </div>
											<div class="col-lg-8">
												<input type="tel" class="form-control my-0 HID" placeholder="Enter OTP" name="otp" id="otp2">
											</div>
											<div class="col-lg-4">
												<button type="button" class="v-btn my-0 HID" id="VerifyBTN2" style="width:100%">Verify</button>
											</div>
											<div class="col-lg-12 text-center">
												<button type="button" class="v-btn HID" id="btnRegister" style="width:100%">Register</button>
											</div>
									</div>
						  </form>
</div>





			  			</div>
		  </div>
	  </div>
		  </div>
			  </div>



	  <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("custabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("custab");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" cusactive", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " cusactive";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("vigOpen").click();
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Buy Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="buy-now-contain">
            <form class="v-form" id="buyNowform" role="buyNowform" method="post" action="<?=base_url()?>home/buy_now"  target="_blank">
                 <INPUT TYPE="hidden" NAME="action" VALUE="verifyyourself33">
                <INPUT TYPE="hidden" name="ri_redirect_buynow" value="1">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Enter Name" name="name" id="buy_name">
                    </div>
                    <div class="col-lg-12">
                        <input type="email" class="form-control" placeholder="Enter Email" name="email" id="buy_email">
                    </div>
                    <div class="col-lg-12">
                        <input type="tel" class="form-control" placeholder="Enter Mobile" name="phone_number" id="buy_phone" onkeypress="return validateNumber(event)">
                    </div>
                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Enter Company Name" name="company" id="buy_company">
                        <input type="hidden" class="form-control" placeholder="Enter Company Name" name="product_id" id="product_id" value="1">
                    </div>

                    <div class="col-lg-12">
                        <input type="text" class="form-control" placeholder="Enter location" name="location" id="buy_location">
                    </div>

                    <div class="col-md-12">
                    <span id="contact_error3" class="error alert-message valierror"
                        style="display:none;"></span>
                    <span id="contact_success3" class="successmain alert-message"
                        style="display:none;"></span>
                     </div>
                    <div class="col-lg-12">
                        <button type="button" class="v-btn" onclick="javascript:buyNow();">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>

    </div>
  </div>
</div>


<?php if ($this->session->flashdata('L_strsucessMessage')) { ?>
    <script>document.getElementById('message_succsess').innerHTML = "<?php echo $this->session->flashdata('L_strsucessMessage'); ?>";$('#message_succsess').show().delay(0).fadeIn('show');$('#message_succsess').show().delay(2000).fadeOut('show');</script>
<?php } ?>
<?php if ($this->session->flashdata('L_strErrorMessage')) { ?>
<script>document.getElementById('message_error').innerHTML = "<?php echo $this->session->flashdata('L_strErrorMessage'); ?>";$('#message_error').show().delay(0).fadeIn('show');$('#message_error').show().delay(2000).fadeOut('show');</script>
<?php } ?>
  <script>
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

<script>
    function bookConsultation(){
       // alert('test');
        var name1 = jQuery("#name_book").val();
       // alert(name1);
        if (name1 == '') {
            jQuery("#bookconsult_error").html("Please Enter Name");
            jQuery('#bookconsult_error').show().delay(0).fadeIn('show');
            jQuery('#bookconsult_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone1 = $("#phone_book").val();
        if (phone1 == '') {
            jQuery('#bookconsult_error').html("Please Enter Mobile Number");
            jQuery('#bookconsult_error').show().delay(0).fadeIn('show');
            jQuery('#bookconsult_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var phone1 = jQuery('#phone_book').val();
        if(phone1 != ''){
            var filter = /^\d{10}$/;
            if (!filter.test(phone1)) {
                jQuery('#bookconsult_error').html("Enter Valid Mobile Number");
                jQuery('#bookconsult_error').show().delay(0).fadeIn('show');
                jQuery('#bookconsult_error').show().delay(2000).fadeOut('show');
                return false;
            }
        }

         var email1 = jQuery("#email_book").val();
        if (email1 == '') {
            jQuery('#bookconsult_error').html("Please Enter Email Id");
            jQuery('#bookconsult_error').show().delay(0).fadeIn('show');
            jQuery('#bookconsult_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var em1 = jQuery('#email_book').val();
        var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter1.test(em1)) {
            jQuery('#bookconsult_error').html("Please Enter Valid Email Id");
            jQuery('#bookconsult_error').show().delay(0).fadeIn('show');
            jQuery('#contact_errorbookconsult_error2').show().delay(2000).fadeOut('show');
            return false;
        }



         var company1 = jQuery("#company_book").val();
        if (company1 == '') {
            jQuery("#bookconsult_error").html("Please Enter Company Name");
            jQuery('#bookconsult_error').show().delay(0).fadeIn('show');
            jQuery('#bookconsult_error').show().delay(2000).fadeOut('show');
            return false;
        }

         var location1 = jQuery("#location_book").val();
        if (location1 == '') {
            jQuery("#bookconsult_error").html("Please Enter Location");
            jQuery('#bookconsult_error').show().delay(0).fadeIn('show');
            jQuery('#bookconsult_error').show().delay(2000).fadeOut('show');
            return false;
        }

         $('#book_consultation').submit();


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

<script>
    function buyNow(){
       // alert('test');
        var buy_name = jQuery("#buy_name").val();
        if (buy_name == '') {
            jQuery("#contact_error3").html("Please Enter Name");
            jQuery('#contact_error3').show().delay(0).fadeIn('show');
            jQuery('#contact_error3').show().delay(2000).fadeOut('show');
            return false;
        }

         var buy_email = jQuery("#buy_email").val();
        if (buy_email == '') {
            jQuery('#contact_error3').html("Please Enter Email Id");
            jQuery('#contact_error3').show().delay(0).fadeIn('show');
            jQuery('#contact_error3').show().delay(2000).fadeOut('show');
            return false;
        }

        var em2 = jQuery('#buy_email').val();
        var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter1.test(em2)) {
            jQuery('#contact_error3').html("Please Enter Valid Email Id");
            jQuery('#contact_error3').show().delay(0).fadeIn('show');
            jQuery('#contact_error3').show().delay(2000).fadeOut('show');
            return false;
        }

        var buy_phone = $("#buy_phone").val();
        if (buy_phone == '') {
            jQuery('#contact_error3').html("Please Enter Mobile Number");
            jQuery('#contact_error3').show().delay(0).fadeIn('show');
            jQuery('#contact_error3').show().delay(2000).fadeOut('show');
            return false;
        }

        var buy_phone = jQuery('#buy_phone').val();
        if(buy_phone != ''){
            var filter = /^\d{10}$/;
            if (!filter.test(buy_phone)) {
                jQuery('#contact_error3').html("Enter Valid Mobile Number");
                jQuery('#contact_error3').show().delay(0).fadeIn('show');
                jQuery('#contact_error3').show().delay(2000).fadeOut('show');
                return false;
            }
        }

         var buy_company = jQuery("#buy_company").val();
        if (buy_company == '') {
            jQuery("#contact_error3").html("Please Enter Company Name");
            jQuery('#contact_error3').show().delay(0).fadeIn('show');
            jQuery('#contact_error3').show().delay(2000).fadeOut('show');
            return false;
        }

        var buy_location = jQuery("#buy_location").val();
        if (buy_location == '') {
            jQuery("#contact_error3").html("Please Enter Location");
            jQuery('#contact_error3').show().delay(0).fadeIn('show');
            jQuery('#contact_error3').show().delay(2000).fadeOut('show');
            return false;
        }

         $('#buyNowform').submit();


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

<script>
$(document).ready(function(){
   //  var token = "<?php echo $_GET['token']?>";
   //  // alert(token);
   //  if(token != ''){
   //    $.ajax({
   //        url: '<?=base_url()?>employee/otpless_logindata',
   //        type: 'post',
   //        dataType:'json',
   //        data: 'token=' + token,
   //           success: function(response) {
   //             alert('response');
   //        }
   //    })
   // }
    $(document).on('click','.empLogin', function(){
        $('.emp_login')[0].reset();
        $('.emp_register')[0].reset();
        $('.BTN,.HID,#otpRequest2,#empName,#empEmail,#empMobile').hide();
        $('#loginopt').modal('hide');
    });

    $(document).on('click','.hrLogin', function(){
      $('#loginopt').modal('hide');
    });

    $(document).on('click','#otpRequest', function(){
      var url = '<?=base_url()?>employee/checkLogin';
      var mobile = $('#mobileno').val();
      var otptosend = <?php echo $this->session->userdata('mobileOtp'); ?>;
      if(mobile == ''){
          $("#phone_err").html("Please enter Mobile No").show();
          return false;
      }else if(mobile.length != 10){
          $("#phone_err").html("Please enter correct Mobile No").show();
          return false;
      }else{
        //alert(otptosend);
        $.ajax({
            url: url,
            type: 'post',
            data: 'mobile=' + mobile + '&otp=' + otptosend,
               success: function(response) {
                 console.log(response);
                 if(response=='success'){
                   $('#mobileno').attr('readonly', true);
                   $('.BTN').show();
                   $('#otp').focus();
                   $('#otpRequest,#btnLogin').hide();
                   $('#phone_err').html('');

                 }else if(response=='fail'){
                    $('#loginmodal').modal('hide');
                     swal({
                          title: "Oops!",
                          text: "User does not exist!",
                          icon: "error",
                          buttons: false,
                          timer :2500,
                      });
                 }
               }
        })
      }


    });

    $(document).on('click','#VerifyBTN', function(){
        var get_otp = $('#otp').val();
        //alert(get_otp);
        var otptosend = "<?php echo $this->session->userdata('mobileOtp'); ?>";
        if(get_otp == ''){
            $("#otp_err").html("Please Enter otp.").show();
            return false;
        }else if (get_otp != otptosend) {
            $("#otp_err").html("Please Enter Valid otp.").show();
            return false;
        }else{
            $("#otp_err").html("").show();
            $("#otp_success").html("Mobile Number Verified Successfully.");
            $('#otp,#VerifyBTN').hide();
            // $('#btnLogin').show();
            $('#btnLogin').trigger('click');
        }

    });

    $(document).on('click','#btnLogin', function(){
        var url = '<?=base_url()?>employee/login';
        var mobile = $('#mobileno').val();
        $.ajax({
            url: url,
            type: 'post',
            data: 'mobile=' + mobile,
               success: function(response) {
                 if(response == 'success'){
                   window.location='<?=base_url()?>employee';
                 }
               }
        })

    });

    $(document).on('click','#otpRequest2', function(){
        var email = $('#empEmail').val();
        var mobile = $('#empMobile').val()
        var url = '<?=base_url()?>employee/otpsent_register_new';
        var otptosend = "<?php echo $this->session->userdata('mobileOtp'); ?>";

        if($('#empID').val() == '' || $('#grpCode').val() == '' || $('#empName').val() == '' || email == '' || mobile == ''){
            $("#reg_err").html("Please fill all fields!").show();
            return false;
        }else if(IsEmail(email) == false){
            $("#reg_err").html("Please enter valid email").show();
            return false;
        }else if(mobile.length != 10){
            $("#reg_err").html("Please enter correct Mobile No").show();
            return false;
        }else{
            $("#reg_err").html("").show();
            //alert(otptosend);
            $.ajax({
                url: url,
                type: 'post',
                data: 'mobile=' + mobile + '&email=' + email + '&otp=' + otptosend,
                success: function(response) {
                    console.log(response);
                    if (response == "success") {
                        $('.HID').show();
                        $('#otpRequest2,#btnRegister').hide();
                        $('#otp2').focus();
                        $('#empMobile').attr('readonly', true);
                    }else if(response == "fail"){
                        $("#reg_err").html("Emplyee already registered").show();
                        return false;
                    }
                }
            })
        }

    });

    $(document).on('click','#VerifyBTN2', function(){
        var get_otp = $('#otp2').val();
        var otptosend = "<?php echo $this->session->userdata('mobileOtp'); ?>";
        if(get_otp == ''){
            $("#reg_err").html("Please Enter otp.").show();
            return false;
        }else if (get_otp != otptosend) {
            $("#reg_err").html("Please Enter Valid otp.").show();
            return false;
        }else{
            $("#reg_err").html("").show();
            $("#otp_success1").html("Mobile Number Verified Successfully.");
            $('#otp2,#VerifyBTN2').hide();
            // $('#btnRegister').show();
            $('#btnRegister').trigger('click');
        }

    });


    $(document).on('click','#btnRegister', function(){
        var url = '<?=base_url()?>employee/register';
        var mobile = $('#empMobile').val();
        var emp_id = $('#empID').val();
        var group_code = $('#grpCode').val();
        var name = $('#empName').val();
        var email = $('#empEmail').val();

        $.ajax({
            url: url,
            type: 'post',
            data: 'emp_id=' + emp_id + '&group_code=' + group_code + '&name=' + name + '&email=' + email + '&mobile=' + mobile,
               success: function(response) {
                 console.log(response);
                 if(response == 'success'){
                   window.location='<?=base_url()?>employee';
                 }
               }
        })

    });

    $(document).on('click','#verifyReq', function(){
        var url = '<?=base_url()?>employee/verify_employee';
        var emp_id = $('#empID').val();
        var group_code = $('#grpCode').val();
        if(emp_id == '' || group_code == ''){
            $("#reg_err").html("Please fill all fields!").show();
            return false;
        }else if(emp_id != '' && group_code != ''){
            $.ajax({
                url: url,
                type: 'post',
                data: 'emp_id=' + emp_id + '&group_code=' + group_code,
                dataType : 'json',
                   success: function(response) {
                    // console.log(response);
                     if(response != 'fail' && response != ''){
                         $("#reg_err").html("").show();
                         $('#verifyReq').hide();
                         $('#empID,#grpCode').attr('readonly', true);
                         $('#otpRequest2,#empName,#empEmail,#empMobile').show();
                         $('#empName').val(response['name_of_the_employee']);
                         $('#empMobile').val(response['mobile_no']);
                         $('#empEmail').val(response['email']);
                     }else{
                        $("#reg_err").html("Employee does not exist, Please enter correct emplyee id & group code").show();
                        return false;
                     }
                   }
            })
        }

    });



    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
    }

    $(document).on('click','#corporateLogin', function(){
        var url = '<?=base_url()?>home/corporate_login';
        var username = $('#hr_username').val();
        var password = $('#hr_password').val();
        if(username == '' || password == ''){
            if(username == '' && password != ''){
              $("#login_err").html("Please enter Username").show();
              return false;
            }else if(username != '' && password == ''){
              $("#login_err").html("Please enter Password").show();
              return false;
            }else{
              $("#login_err").html("Please enter Username & Password").show();
              return false;
            }
        }
        $.ajax({
            url: url,
            type: 'post',
            data: 'username=' + username + '&password=' + password,
            dataType : 'json',
               success: function(response) {
                console.log(response);
                 if(response == 'not_exist'){
                     $("#login_err").html("Corporate does not exist, Please enter correct credentail.").show();
                     return false;
                 }else if(response == 'password_fail'){
                    $("#login_err").html("Password does not match, Please enter correct.").show();
                    return false;
                 }else if(response == 'inactive'){
                    $("#login_err").html("This corporate is inactive").show();
                    return false;
                 }else{
                    window.location='<?=base_url("corporate")?>';
                 }

               }
        })

    });

    $('.corporatrLog').bind('change', function() {
        if($('#hr_username').val() == ''){
            $("#login_err").html("Please enter Username").show();
            return false;
        }else{
          $("#login_err").html("").show();
        }
        if($('#hr_password').val() == ''){
            $("#login_err").html("Please enter Password").show();
            return false;
        }else{
          $("#login_err").html("").show();
        }
    });



});



</script>





</body>
</html>
