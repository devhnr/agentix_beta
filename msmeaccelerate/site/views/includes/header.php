<?php
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$index_url 		= $this->config->item('index_url');
$findex_url 		= $this->config->item('findex_url');
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
        <meta name="description" content="MSME Accelerate">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="<?php echo $base_url_views?>images/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo $base_url_views?>images/favicon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $base_url_views?>images/favicon.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $base_url_views?>images/favicon.png">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/font-icons.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/theme-vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $base_url_views?>asset_new/css/responsive.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css">
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
 <div id="message_error" class="valierror alert-message topalert" style="display:none;text-align: center;"></div>
    <div id="message_succsess" class="successmain alert-message topalert" style="display:none;text-align: center;">
    </div>
    <span id="product_added" class="topalert_cart successmain alert-message alert-message-fix topalert" style="display:none;text-align: center;margin-bottom:0px;"></span>
  
    <body data-mobile-nav-style="classic">
       
        <!-- start header -->
        <header class="header-with-topbar">
            <div class="top-bar bg-blue1 text-white border-bottom border-color-black-transparent d-none d-md-inline-block">
                <div class="container-lg nav-header-container">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="col-12 text-center text-sm-start col-sm-auto me-auto ps-lg-0">
                            <ul class="social-icon padding-5px-tb">
                                <li><a class="text-fast-blue-hover text-white" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="text-fast-blue-hover text-white" href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="text-fast-blue-hover text-white" href="http://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a class="text-fast-blue-hover text-white" href="http://www.youtube.com" target="_blank"><i class="fab fa-instagram"></i></a></li>                                
                            </ul>
                        </div>
                        <div class="col-auto d-none d-sm-block text-end px-lg-0 font-size-0">
                            <div class="top-bar-contact">
                                <span class="top-bar-contact-list">
                                    <i class="feather icon-feather-phone-call text-blue3"></i>
                                    1-800-222-000
                                </span>
                                <span class="top-bar-contact-list">
                                    <i class="far fa-envelope text-blue3"></i>
                                    <a href="mailto:info@yourdomain.com" class="text-white">info@yourdomain.com</a>
                                </span>
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg top-space navbar-light bg-blue4 header-light fixed-top ">
                <div class="container-lg nav-header-container">
                    <div class="col-6 col-lg-2 me-auto ps-lg-0">
                        <a class="navbar-brand" href="<?php echo $base_url?>">
                            <img src="<?php echo $base_url_views?>asset_new/img/logo_msmew.png" data-at2x="<?php echo $base_url_views?>asset_new/img/logo_msmew.png" class="default-logo" alt="">
                            <img src="<?php echo $base_url_views?>asset_new/img/logo_msmew.png" data-at2x="<?php echo $base_url_views?>asset_new/img/logo_msmew.png" class="alt-logo" alt="">
                            <img src="<?php echo $base_url_views?>asset_new/img/logo_msmew.png" data-at2x="<?php echo $base_url_views?>asset_new/img/logo_msmew.png" class="mobile-logo" alt="">
                        </a>
                    </div>
                    <div class="col-auto col-lg-8 menu-order px-lg-0">
                        <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class=" collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav alt-font">
                                <li class="nav-item">
                                    <a href="<?php echo $base_url?>" class="nav-link active">Home</a>
                                </li>
                               <!--  <li class="nav-item dropdown simple-dropdown">
                                    <a href="#" class="nav-link">About Us</a>
                                </li> -->
                                <li class="nav-item dropdown simple-dropdown">
                                    <a href="#" class="nav-link">Our Products</a>
                                   <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="dropdown">
                                            <a data-bs-toggle="dropdown" href="javascript:void(0);">Employee Benefits<i class="fas fa-angle-right dropdown-toggle"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="https://www.msmeaccelerate.in/msme/workmen-insuranace">Workmen's Compensation</a></li>
                                                <li><a href="https://www.msmeaccelerate.in/msme/group-health-insurance">Group Health Insurance</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-bs-toggle="dropdown" href="javascript:void(0);">Marine Insurance<i class="fas fa-angle-right dropdown-toggle"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="https://www.msmeaccelerate.in/msme/marine-transist">Marine Transit Insurance (Inland)</a></li>
          <li><a href="https://www.msmeaccelerate.in/msme/marine-open">Marine Open Insurance</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-bs-toggle="dropdown" href="javascript:void(0);">Property Insurance<i class="fas fa-angle-right dropdown-toggle"></i></a>
                                            <ul class="dropdown-menu">
                                                 <li><a href="https://www.msmeaccelerate.in/msme/sookshma-udayam">Bharat Sookshma Udyam Suraksha Policy</a></li>
          <li><a href="msme/griha-raksha">Bharat Griha Raksha Policy</a></li>
           <li><a href="msme/laghu-udayam">Bharat Laghu Udyam Suraksha Policy</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-bs-toggle="dropdown" href="javascript:void(0);">Liability Insurance<i class="fas fa-angle-right dropdown-toggle"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="https://www.msmeaccelerate.in/msme/profeesional-ca">Professional indemnity for CA</a></li>
          <li><a href="https://www.msmeaccelerate.in/msme/profeesional-mp">Professional indemnity for medical practitioners</a></li>
           <li><a href="https://www.msmeaccelerate.in/msme/corporate-cyber">Corporate cyber insurance</a></li>
           <li><a href="https://www.msmeaccelerate.in/msme/director-insuranace">Directors & Officers Insurance</a></li>
           <li><a href="https://www.msmeaccelerate.in/msme/general-liability">Comprehensive General Liability Insurance</a></li>
                                            </ul>
                                        </li>
                                         <li class="dropdown">
                                            <a data-bs-toggle="dropdown" href="javascript:void(0);">Engineering Insurance<i class="fas fa-angle-right dropdown-toggle"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="https://www.msmeaccelerate.in/msme/contractor">Contractor's All Risk</a></li>
          <li><a href="https://www.msmeaccelerate.in/msme/plant-machinery">Contractor's Plant and Machinary</a></li>
           <li><a href="https://www.msmeaccelerate.in/msme/erection">Erection All Risk</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown megamenu">
                                    <a href="javascript:void(0);" class="nav-link">Claim Assistance</a>
                                  
                                    
                                </li>
                                <li class="nav-item dropdown simple-dropdown">
                                    <a href="<?php echo $base_url_views?>blog.html" class="nav-link">Blogs</a>
                                    
                                    
                                </li>
                                <li class="nav-item dropdown simple-dropdown">
                                    <a href="<?php echo $base_url_views?>msme/career" class="nav-link">Career</a>
                                    
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-lg-2 text-end pe-0 font-size-0">
                        <!-- <div class="header-search-icon search-form-wrapper margin-10px-right d-xs-none">
                            <a href="javascript:void(0)" class="search-form-icon header-search-form"><i class="feather icon-feather-search"></i></a>
                            
                            <div class="form-wrapper">
                                <button title="Close" type="button" class="search-close alt-font">×</button>
                                <form id="search-form" role="search" method="get" class="search-form text-start" action="search-result.html">
                                    <div class="search-form-box">
                                        <span class="search-label alt-font text-small text-uppercase text-medium-gray">What are you looking for?</span>
                                        <input class="search-input alt-font" id="search-form-input5e219ef164995" placeholder="Enter your keywords..." name="s" value="" type="text" autocomplete="off">
                                        <button type="submit" class="search-button">
                                            <i class="feather icon-feather-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                           
                        </div> -->
                         <!-- <a href="login.html" class="btn theme-btn-3 text-uppercase">Book Consultation</a> -->
                         <?php if($this->session->userdata('userid') != ''){ ?>
                             <a href="<?php echo $base_url?>home/logout" class="btn theme-btn-1 text-uppercase">Logout</a>
                      
                        <?php } else { ?>
                        <a href="<?php echo $base_url?>agent-login" class="btn theme-btn-1 text-uppercase">Login</a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </header>
        <!-- end header -->