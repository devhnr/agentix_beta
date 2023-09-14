

<script src="<?php echo $base_url_views?>Owl Sliders/assets/js/jquery-1.9.1.min.js"></script> 
    <script src="<?php echo $base_url_views?>Owl Sliders/owl-carousel/owl.carousel.js"></script>

<footer class="page-footer p-0">
  <div class="container">
      
          

    <div class="row justify-content-center ">
	
     

    <div class="row">
        <div class="col-sm-4 ">
            
             <!-- <p style="color:black"><i class="fa fa-phone mr-2"></i>9987764627</p>
              <p style="color:black"><i class="fa fa-envelope mr-2"></i>consult@raghnall.co.in</p> -->
        
        </div>
      <div class="col-sm-5 py-2">
         
        <p id="copyright" style="font-size:13px">Copyrights © 2022 All Rights Reserved By <a href="<?php echo $base_url?>"> Mititek</a>. </p>
       <!-- <p style="font-size:11px;margin-left:115px">Designed By <a href="#" target="_blank">Five Online</a>.</p>-->
      </div>
      <div class="col-sm-3 py-2 text-right">
      <!-- <div class="d-inline-block px-3">
          <a href="../assets/policy/MSME Accelerate Privacy Policy.pdf
" target="blank">Privacy</a>
        </div>-->
        <!--<div class="d-inline-block px-3">
          <a href="contact.html">Contact Us</a>
        </div>-->
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
            <form class="v-form" id="need_help" role="need_help" method="post" action="<?php echo $http_host;?>home/chatForm">
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
						  <form class="v-form" action="" method="">
							  <div class="row">
								  <div class="col-lg-12">
									  <input type="text" class="form-control" placeholder="Enter Your Name">
								  </div>
								  <div class="col-lg-12">
									  <input type="mobile" class="form-control" placeholder="Enter Your Mobile">
								  </div>
								  <div class="col-lg-12">
									  <input type="email" class="form-control" placeholder="Enter Your Email">
								  </div>
								  <div class="col-lg-12">
									  <input type="text" class="form-control" placeholder="Enter Your Company Name">
								  </div>
								  <div class="col-lg-12 text-center">
									  <button type="button" class="v-btn" >Submit</button>
								  </div>
							  </div>
						  </form>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
	  
	
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Buy Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="buy-now-contain">
            <form class="v-form" id="buyNowform" role="buyNowform" method="post" action="<?php echo $http_host;?>home/buy_now">
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

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("v-tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("v-tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" v-active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " v-active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

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



    </body>
    </html>