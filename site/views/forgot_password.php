<?php include('includes/header.php');?>



<style>

    .h-vh {

    min-height: 83vh;

}



form.login-form {

    width: 100%;

    padding: 40px;

    border: 1px solid #2b4865;

    border-radius: 12px;

}



form.login-form input {

    width: 100%;

    padding: 14px 20px;

    border: none;

    border-bottom: 1px solid #797979;

    margin-bottom: 20px;

    margin-top: 12px;

    transition: 0.3s;

}



form.login-form input:focus{

    border-color: var(--altcolor)  ;

    box-shadow: none;

    outline: 0;

    

}



form.login-form input[type="radio"] {

    width: auto;

    padding: 10px;

    margin-right: 10px;

}



.form-check {



    margin-right: 20px;

}

form.login-form button {

    width: 100%;

    text-align: center;

    background: var(--maincolor);

    padding: 10px;

    margin-top: 20px;

    color: #fff;

    text-transform: uppercase;

    transition: 0.3s;

    appearance: none;

    -webkit-appearance: none

}



form.login-form button:hover, form.login-form button:focus{

    background: var(--altcolor);

    color: #fff;

    

}

</style>

<section class="pt-3 pb-3">

    <div class="container ">

        <div class="row justify-content-center align-items-center h-vh">

            <div class="col-lg-5">

                
                <form id="forgot_password" class="login-form" action="<?php echo $base_url;?>home/forgot_password" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="forgot_password" />

                       


                    <div class="row">

                        <div class="col-lg-12 text-center">

                            <h3>Agentix Forgot Password</h3>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <input type="text" class="" placeholder="Enter Email Id" name="login_email" id="loginEmail">

                        </div>

                        <div class="col-lg-12">

                        <span id="contact_error_login" class="error alert-message valierror " style="display: none;"></span>
                            <span id="contact_success" class="successmain alert-message" style="display:none;"></span>

                        </div>

                        <div class="col-lg-12">

                            <button type="button" class="btn" onclick="javascript:forgot_validation();">Submit</button>

                            <!-- <button type="button" class="btn" >Login</button> -->

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

 

<?php include('includes/footer.php');?>

<script>
function forgot_validation() {
    var loginEmail = jQuery("#loginEmail").val();
    if (loginEmail == '') {
        jQuery('#contact_error_login').html("Please enter Email");
        jQuery('#contact_error_login').show().delay(0).fadeIn('show');
        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');
        return false;
    }

    var em = jQuery('#loginEmail').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(em)) {
        jQuery('#contact_error_login').html("Enter Valid Email Address.");
        jQuery('#contact_error_login').show().delay(0).fadeIn('show');
        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');
        return false;
    }

    
    $('#forgot_password').submit();
    
    
    
}
</script>

