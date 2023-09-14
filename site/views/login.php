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

                
                    <form class="login-form" method="post" action="<?php echo $base_url;?>home/login"  enctype="multipart/form-data" id="loginModal">

                        <input type="hidden" name="action" value="login" />
                        
                        <?php
                        
                        $last_ursl = $_SERVER['HTTP_REFERER'];
                        
                        $explode_urls = explode('/',$last_ursl);
                         $end_urls = end($explode_urls);
                        
                        if($end_urls != 'register' && $end_urls != 'register')
                        {
                            
                         $this->session->set_userdata('redirect_url',$_SERVER['HTTP_REFERER']);  ?>

                        <?php } ?>


                    <div class="row">

                        <div class="col-lg-12 text-center">

                            <h3>Agentix Login</h3>

                            <!--<p>Please enter correct details to login</p>-->

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <input type="text" class="" placeholder="Enter Email Id" name="login_email" id="loginEmail">

                        </div>

                        <div class="col-lg-12">

                            <input type="password" class="" placeholder="Enter password" name="login_password" id="LoginPassword">

                        </div>

                        <div class="col-lg-12">

                        <span id="contact_error_login" class="error alert-message valierror " style="display: none;"></span>
                            <span id="contact_success" class="successmain alert-message" style="display:none;"></span>

                        </div>

                        <div class="col-lg-5">
                            <a href="<?php echo $base_url?>forgot-password">Forgot Password</a>
                        </div>

                        <div class="col-lg-7">

                            <button type="button" class="btn" onclick="javascript:login_validation();">Login</button>

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
function login_validation() {
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

    var LoginPassword = jQuery("#LoginPassword").val();
    if (LoginPassword == '') {
        jQuery('#contact_error_login').html("Please enter Password");
        jQuery('#contact_error_login').show().delay(0).fadeIn('show');
        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');
        return false;
    }
    /*if(!$("#rememberMe").prop("checked"))
    {
        jQuery('#contact_error').html("Please Select Remember Me");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }*/

    var url = '<?php echo $base_url; ?>home/checlogin';
    $.ajax({
        url: url,
        type: 'post',
        data: 'email=' + loginEmail + '&password=' + LoginPassword,
        dataType : 'json',
        success: function(msg) {

            console.log(msg);
             if(msg == 'not_exist'){

                $('#contact_error_login').html("User does not exist, Please enter correct credentail.");
                $('#contact_error_login').show().delay(0).fadeIn('show');
                $('#contact_error_login').show().delay(2000).fadeOut('show');
                return false;

             }else if(msg == 'password_fail'){

                $('#contact_error_login').html("Password does not match, Please enter correct.");
                $('#contact_error_login').show().delay(0).fadeIn('show');
                $('#contact_error_login').show().delay(2000).fadeOut('show');
                return false;
             }else if(msg == 'success'){
                $('#loginModal').submit();
             }

            // if (msg == "0") {
            //     $('#contact_error_login').html("Please enter Correct Email & Password");
            //     $('#contact_error_login').show().delay(0).fadeIn('show');
            //     $('#contact_error_login').show().delay(2000).fadeOut('show');
            //     return false;
            // } else {
            //     //$('#loginModal').submit();
            // }

        }
    });
    
    
    
    
    
}
</script>

