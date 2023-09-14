
<!DOCTYPE html>
<html lang="en">
<head>

<!-- meta tags -->
<meta charset="utf-8">
<meta name="keywords" content="insurance broker, Risk Management, Commercial Insurance, Cyber Insurance" />
<meta name="description" content="Raghnall is India’s leading insurance broker and risk advisor in MSME Segment. We serve MSMEs, Start-ups and individual clients with data-driven risk solutions" />
<meta name="author" content="www.themeht.com" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

<!-- Title -->
<title>iSerrve</title>

<!-- favicon icon -->
<link rel="shortcut icon" href="<?=base_url()?>site/views/img/favicon01.ico" />

<!-- inject css start -->

<!--== bootstrap -->
<link href="<?=base_url()?>site/views/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>site/views/css/v-style-new.css" rel="stylesheet" type="text/css" />



    <!-- Owl Carousel Assets -->
    <link href="<?=base_url()?>site/views/Owl Sliders/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url()?>site/views/Owl Sliders/owl-carousel/owl.theme.css" rel="stylesheet">


<!--== lightslider -->
<link href="<?=base_url()?>site/views/css/lightslider.min.css" rel="stylesheet" type="text/css" />



<link href="<?=base_url()?>site/views/css/custom.css" rel="stylesheet" type="text/css" />
<!--== style -->
<link href="<?=base_url()?>site/views/css/custom1.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>site/views/css/responsive.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>site/views/css/v-style.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>site/views/css/v-skin.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>site/views/css/multiform.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>site/views/css/font-icons.min.css" rel="stylesheet" type="text/css" />
<!-- <script src="<?=base_url()?>site/views/sweetalert@2.1.2/sweetalert.min.js"></script> -->
<script src="<?=base_url('assets/employee_assets/')?>sweetalert@2.1.2/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KEJ8VF5T70"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KEJ8VF5T70');
</script>

<style>

.v-form {
    background: transparent;
    padding: 40px 50px 30px 50px;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0%);
    -webkit-box-shadow: 0 3px 10px rgb(0 0 0 / 0%);
    margin-top: 20px;
}

/* ============ desktop view ============ */
@media all and (min-width: 992px) {

.dropdown-menu li{
  position: relative;
}
.dropdown-menu .submenu{
  display: none;
  position: absolute;
  left:100%; top:-7px;
}
.dropdown-menu .submenu-left{
  right:100%; left:auto;
}

.dropdown-menu > li:hover{ background-color: #f1f1f1 }
.dropdown-menu > li:hover > .submenu{
  display: block;
}
}
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width: 991px) {

.dropdown-menu .dropdown-menu{
  margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
}

}

@media (max-width: 575px) {

.dropdown-menu .dropdown-menu{
  margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
}

}
/* ============ small devices .end// ============ */
</style>
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

.loader {
  display: none;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 999999999;
  width: 50px;
  height: 50px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #ff5c00;
  border-bottom: 16px solid #4494de;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

#overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    background: black url('https://www.raghnall.co.in/iserrve-beta/site/views/img/Spinner-1s-88px.gif') center center no-repeat;
    opacity: 0.8;
    z-index: 9999999;
}

</style>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-226703675-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-226703675-1');
</script>


<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
  FB.init({
    xfbml            : true,
    version          : 'v13.0'
  });
};

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-customerchat"
  attribution="install_email"
  attribution_version="biz_inbox"
  page_id="925653704140289">
</div> -->

<!-- Messenger Chat plugin Code -->

<div id="fb-root"></div>



<!-- Your Chat plugin code -->

<div id="fb-customer-chat" class="fb-customerchat">

</div>



<script>

  var chatbox = document.getElementById('fb-customer-chat');

  chatbox.setAttribute("page_id", "103648929191316");

  chatbox.setAttribute("attribution", "biz_inbox");

</script>



<!-- Your SDK code -->

<script>

  window.fbAsyncInit = function() {

    FB.init({

      xfbml            : true,

      version          : 'v15.0'

    });

  };



  (function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';

    fjs.parentNode.insertBefore(js, fjs);

  }(document, 'script', 'facebook-jssdk'));

</script>

</head>

<body>
	<div id="overlay" style="display: none;"></div>
  <div id="message_error" class="valierror alert-message topalert_cart" style="display:none;text-align: center;"></div>

<div id="message_succsess" class="successmain alert-message topalert_cart" style="display:none;text-align: center;">

    </div>
    <header>
<div class="top-bar">
                <div class="container-lg nav-header-container">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="col-12 text-center text-sm-start col-sm-auto me-auto ps-lg-0">
                            <ul class="social-icon">
                                <li><a class="text-fast-blue-hover text-white" href="https://www.facebook.com/profile.php?id=100086144868126" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                               <!-- <li><a class="text-fast-blue-hover text-white" href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>-->
                                <li><a class="text-fast-blue-hover text-white" href="https://www.linkedin.com/company/iserrve/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="text-fast-blue-hover text-white" href="https://www.instagram.com/iserrvebyraghnall/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-auto ml-auto d-none d-sm-block text-end px-lg-0 font-size-0">
                            <div class="top-bar-contact">
                                <span class="top-bar-contact-list">
                                    <i class="fa fa-phone"></i>
                                    +91-7045161616
                                </span>
                                <span class="top-bar-contact-list">
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:consult@raghnall.co.in" class="text-white">consult@raghnall.co.in </a>
                                </span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="https://www.raghnall.co.in/iserrve/">
        <img id="logo-img" class="img-fluid" src="<?=base_url()?>site/views/img/isserve.png" alt="Header Alt">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo $base_url;?>">Home</a>
          </li>
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Products
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#"> Employee Benefits  &raquo; </a>
                <ul class="submenu dropdown-menu">
                 <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/workmen-insuranace/">Workmen's Compensation</a></li>
                 <li><a class="dropdown-item" href="#">Group Health Insurance</a></li>

              </ul>
             </li>

             <li><a class="dropdown-item" href="#"> Marine Insurance  &raquo; </a>
              <ul class="submenu dropdown-menu">
               <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/marine-transist/">Marine Transit Insurance (Inland)</a></li>
               <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/marine-open/">Marine Open Insurance</a></li>

            </ul>
           </li>



           <li><a class="dropdown-item" href="#"> Property Insurance  &raquo; </a>
            <ul class="submenu dropdown-menu">
             <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/sookshma-udayam/">Bharat Sookshma Udyam Suraksha Policy</a></li>
             <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/griha-raksha">Bharat Griha Raksha Policy</a></li>
             <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/laghu-udayam/">Bharat Laghu Udyam Suraksha Policy</a></li>

          </ul>
         </li>
         <li><a class="dropdown-item" href="#"> Liability Insurance  &raquo; </a>
          <ul class="submenu dropdown-menu">
           <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/profeesional-ca/">Professional indemnity for CA</a></li>
           <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/profeesional-mp/">Professional indemnity for medical practitioners</a></li>
           <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/corporate-cyber/">Corporate cyber insurance</a></li>
           <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/director-insuranace/">Directors & Officers Insurance</a></li>
           <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/general-liability/">Comprehensive General Liability Insurance</a></li>

        </ul>
       </li>

       <li><a class="dropdown-item" href="#"> Engineering Insurance  &raquo; </a>
        <ul class="submenu dropdown-menu">
         <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/contractor/">Contractor's All Risk</a></li>
         <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/plant-machinery/">Contractor's Plant and Machinary</a></li>
         <li><a class="dropdown-item" href="http://msmeaccelerate.in/msme/erection/">Erection All Risk</a></li>

      </ul>
     </li>



            </ul>
          </li>-->

          <li class="nav-item">
            <a class="nav-link" href="https://www.raghnall.co.in/claim-assistance">Claim Assistance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.raghnall.co.in/category/all-blogs">Insights</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.raghnall.co.in/career">Career</a>
          </li>
       <li class="nav-item">
             <a class="v-btn" href="#"  data-bs-toggle="modal" data-bs-target="#talktoexpert">
          <!-- <a class="btn"href="https://www.raghnall.co.in/contact">  -->
                 Book Consultation
                </a>
          </li>
			 <li class="nav-item">
             <!--<a class="v-btn2 headbtn2" href="#"  data-bs-toggle="modal" data-bs-target="#loginopt" >
               Login
              </a> -->
          	</li>
          <li>
               <a class="navbar-brand logo d-none-desktop" href="https://www.raghnall.co.in">
         			 <img id="logo-img" class="img-fluid" src="<?=base_url()?>site/views/img/raghnall.png" alt="Header Alt">
       		</a>
        </li>
        </ul>



      </div>

       <a class="navbar-brand logo d-none-mob" href="https://www.raghnall.co.in/">
          <img id="logo-img" class="img-fluid" src="<?=base_url()?>site/views/img/raghnall.png" alt="Header Alt">
        </a>

    </div>
  </nav>
  </header>
