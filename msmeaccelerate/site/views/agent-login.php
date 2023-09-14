<?php
$front_base_url = $this->config->item('front_base_url');
$base_url       = $this->config->item('base_url');
$index_url      = $this->config->item('index_url');
$findex_url         = $this->config->item('findex_url');
$base_url_views = $this->config->item('base_url_views');
$http_host = $this->config->item('http_host');
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>MSME Accelerate</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="description" content="MSME Accelerate | Agent Login">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="<?php echo $base_url_views?>asset_new/images/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo $base_url_views?>asset_new/images/favicon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $base_url_views?>asset_new/images/favicon.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $base_url_views?>asset_new/images/favicon.png">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/font-icons.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/theme-vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/responsive.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/v-style.css" />
    </head>
     <style>
.valierror {
    background-color: #ee2e34;
    border-color: #ee2e34;
    color: #fff;
}

.alert-message {
    background-size: 40px 40px;
    background-image: linear-gradient(
135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent);
    /* box-shadow: inset 0 -1px 0 rgb(255 255 255 / 40%); */
    width: 100%;
    border: 0px solid;
    color: #fff;
    padding: 10px;
    /* position: fixed; */
    animation: animate-bg 5s linear infinite;
    display: block;
    margin-bottom: 5px;
}
.successmain {
    background-color: #09c6ab;
    border-color: #09c6ab;
}
.size_active {

    background: #ABABAB;
    color: #000;
    border: 1px solid #09c6ab !important;
}

.color_active {
    border: 1px solid #09c6ab !important;
}

.alert-message_cart {
    background-size: 40px 40px;
    background-image: linear-gradient(
135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent);
    width: 100%;
    border: 0px solid;
    color: #000;
    padding: 10px;
    animation: animate-bg 5s linear infinite;
}
.topalert_cart {
    z-index: 9999;
    text-align: center;
    padding: 10px;
    font-size: 18px;
    color: #fff !important;
    position: fixed;
    top: 0px;
}
.successcart {
    background-color: #09c6ab;
    border-color: #09c6ab;
}
.alert-message-fix {
    
     position: fixed; 
    
    top: 0;
    z-index: 9999;
}
.successmain {
    background-color: #09c6ab;
    border-color: #09c6ab;
}
</style>
    <body data-mobile-nav-style="classic">
        <!-- start header -->
      
        <!-- end header -->
        <!-- start section -->
       <section class=" p-0 h-login-vh bg-blue4 d-flex align-items-center">
           <div class="container"> 
            <div class="row align-items-center justify-content-center row-reverse">
                <div class="col-lg-7 col-sm-5 sm-text-center v-mobile-hide sm-margin-30px-top sm-padding-20px-tb"> 
                    <h1 class="text-extra-dark-gray  sm-font-h1 font-weight-500">Welcome to <br>
                        <span class="text-blue1">MSME </span> Accelerate</h1>
                     <a href="<?php echo $base_url?>" class="btn theme-btn-3 text-uppercase"><< Back to Home</a>
                </div>
                <div class="col-lg-5 col-sm-7 col-xs-10 p-0">
                    <div class="msme-login-contain box-shadow">
                        <div class="login-logo-contain text-center padding-20px-tb">
                              <img src="<?php echo $base_url_views?>asset_new/img/logo_msmew.png" alt="">
                              <h5 class="text-extra-dark-gray font-weight-500 v-desktop-hide sm-text-center m-0 margin-15px-top">Welcome</h5>
                        </div>
                        <form class="main-login-form text-center" method="post" action="<?php echo $base_url;?>home/login" enctype="multipart/form-data" id="loginModal">

                            <input type="hidden" value="1" name="lo_redirect" id="lo_redirect">
                            <input type="hidden" name="action" value="login" />
                            
                            <input class="text-extra-dark-gray medium-input margin-25px-bottom border-radius-0px" type="text" id="agent_id" name="agent_id" placeholder="Agent ID">
                     
                            <input class="text-extra-dark-gray medium-input border-radius-0px" type="password" id="pass" name="password" placeholder="Enter Password">

                             <span id="contact_error_login" class="error alert-message valierror " style="display: none;"></span>
                            <span id="contact_success" class="successmain alert-message" style="display:none;"></span>

                            <div class="d-flex justify-content-between align-items-center ">
                               <span class="text-extra-dark-gray margin-5px-top"><input type="checkbox" class="margin-5px-right" onclick="checkpass()">Show Password</span> 
                  

                            
                            <a href="<?php echo $base_url; ?>forgot-password" class="text-blue2 text-right m-0 p-0">Forgot Your Password?</a>
                            </div>
                            
                            
                           
                            <input type="hidden" name="redirect" value="">
                            <div class="text-center margin-15px-top">   
                                <button class="btn theme-btn-1 text-uppercase" type="button" onclick="javascript:login_validation();return false;">Login</button>
                            </div>
                            
                            <div class="form-results d-none"></div>
                        </form>
                        <div class="bg-extra-light-gray m-0 h-1px"></div>
                        <div class="new-cus-sec text-center padding-40px-tb">
                           
                           <div class="cus-btn">
                            <p class="alt-font text-extra-dark-gray  font-weight-500">Not an Agent !! Don't Worry , <a href="<?php echo $base_url?>detail-form" class="text-blue2">Click Here to get a Quote now</a></p>
                                
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       </section>
        <!-- end section -->

        <!-- start footer -->
        
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
        <!-- end scroll to top -->
        <!-- javascript -->
        <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/theme-vendors.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/main.js"></script>

        <script>
            function checkpass() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
        </script>


        
        
        <!-- <script type="text/javascript">
    document.getElementById("cuslog").onclick = function () {
        location.href = "detail-form.php";
    };
</script> -->

    </body>
</html>
<script>
function login_validation() {
    // alert('test');
    var agent_id = jQuery("#agent_id").val();
    if (agent_id == '') {
        // alert('Please enter Agent ID');
        jQuery('#contact_error_login').html("Please enter Agent ID");
        jQuery('#contact_error_login').show().delay(0).fadeIn('show');
        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');
        return false;
    }
    var password = jQuery("#pass").val();
    if (password == '') {
        jQuery('#contact_error_login').html("Please enter Password");
        jQuery('#contact_error_login').show().delay(0).fadeIn('show');
        jQuery('#contact_error_login').show().delay(2000).fadeOut('show');
        return false;
    }
    
    var url = '<?php echo $base_url; ?>home/checlogin';
    $.ajax({
        url: url,
        type: 'post',
        data: 'agent_id=' + agent_id + '&password=' + password,
        success: function(msg) {

            if (msg == "0") {
                $('#contact_error_login').html("Please enter Correct Email & Password");
                $('#contact_error_login').show().delay(0).fadeIn('show');
                $('#contact_error_login').show().delay(2000).fadeOut('show');
                return false;
            } else {
                $('#loginModal').submit();
            }

        }
    });  
}
</script>