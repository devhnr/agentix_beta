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

                
                <form id="reset_password" class="login-form" action="<?php echo $base_url; ?>home/reset_password/<?php echo $uid; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="reset_password" />

                       


                    <div class="row">

                        <div class="col-lg-12 text-center">

                            <h3>Agentix Reset Password</h3>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <input type="password" class="" placeholder="New Password" name="agent_password" id="agent_password">

                        </div>

                        <div class="col-lg-12">

                            <input type="password" class="" placeholder="New Confirm Password" name="agent_conf_password" id="agent_conf_password">

                        </div>

                        <div class="col-lg-12">

                        <span id="register_error" class="error alert-message valierror " style="display: none;"></span>
                            <span id="register_success" class="successmain alert-message" style="display:none;"></span>

                        </div>

                        <div class="col-lg-12">

                            <button type="button" class="btn" onclick="javascript:reset_validation();">Submit</button>

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
function reset_validation() {

    var agent_password = jQuery("#agent_password").val();
    if (agent_password == '') {
        
        //alert ('message alert');
        jQuery('#register_error').html("Plesae Enter New Password");
        jQuery('#register_error').show().delay(0).fadeIn('show');
        jQuery('#register_error').show().delay(2000).fadeOut('show');
        return false;
    }else {


    var agent_password = jQuery("#agent_password").val();
    if (agent_password == '') {
        
        //alert ('message alert');
        jQuery('#register_error').html("Plesae Enter Password");
        jQuery('#register_error').show().delay(0).fadeIn('show');
        jQuery('#register_error').show().delay(2000).fadeOut('show');
        return false;
    }else{
        if (agent_password.length < 8 || agent_password.length > 30) {
            jQuery('#register_error').html("Your password must be between 8 to 30 characters");
            jQuery('#register_error').show().delay(0).fadeIn('show');
            jQuery('#register_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (agent_password.search(/[a-z]/i) < 0) {
            jQuery('#register_error').html("Your password must contain at least one alphabet.");
            jQuery('#register_error').show().delay(0).fadeIn('show');
            jQuery('#register_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (agent_password.search(/[0-9]/) < 0) {
            jQuery('#register_error').html("Your password must contain at least one numeric.");
            jQuery('#register_error').show().delay(0).fadeIn('show');
            jQuery('#register_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (agent_password.search(/[A-Z]/) < 0) {
            jQuery('#register_error').html("Your password must contain at least one capital letter.");
            jQuery('#register_error').show().delay(0).fadeIn('show');
            jQuery('#register_error').show().delay(2000).fadeOut('show');
            return false;
        }

        if (agent_password.search(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/) < 0) {
            jQuery('#register_error').html("Your password must contain at least Special letter.");
            jQuery('#register_error').show().delay(0).fadeIn('show');
            jQuery('#register_error').show().delay(2000).fadeOut('show');
            return false;
        }
    }


    var agent_conf_password = jQuery("#agent_conf_password").val();
    if (agent_conf_password == '') {
        
        //alert ('message alert');
        jQuery('#register_error').html("Please Enter New Confirm Password");
        jQuery('#register_error').show().delay(0).fadeIn('show');
        jQuery('#register_error').show().delay(2000).fadeOut('show');
        return false;
    }


    if (agent_password != agent_conf_password) {

        jQuery('#register_error').html("Password does not match");
        jQuery('#register_error').show().delay(0).fadeIn('show');
        jQuery('#register_error').show().delay(2000).fadeOut('show');
        return false;
    }

    
    $('#reset_password').submit();
    
    
    
}
</script>

