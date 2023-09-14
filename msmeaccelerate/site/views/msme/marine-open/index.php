<?php
include("../connect.php");
include("../marineopen.php");
include("../bookconsultation.php");
// echo '<script>alert("Just an alert for alerting to pay salary for employees")</script>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V2MVYF05CP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-V2MVYF05CP');
</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>MSME - Insurance</title>

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <!-- <link rel="stylesheet" href="../assets/css/ss.css"> -->
  <link rel="stylesheet" href="../assets/css/theme.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/30c21ac8e0.js"></script>
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.leftsidebar {
    background-color: #F6F5FC;
    height: 100%;
    padding: 8px;
    transition: 0.7s;
}
   .leftsidebar:hover {
    background-color: #0096c7;
    color: #fff;
}
.leftsidebar:hover p{
    color: #fff;
}


ul {
  list-style: none;
  padding: 0;
  margin: 0;
  
}
ul .msmemenu {
  display: block;
  position: relative;6
  float: left;
  
}

li ul { display: none; }
ul .msmemenu  a {
  display: block;
  padding: 1em;
  text-decoration: none;
  white-space: nowrap;
  
}
.msmemenu
{
    display:block;
   background: rgba(142, 202, 230, .95);
}
ul ul ul {
  left: 100%;
  top: 0;
}
li:hover > ul {
  display: block;
  position: absolute;
}
li:hover li { float: none; }
li .msmemenu:hover a { background: rgba(142, 202, 230, .95) }
li .msmemenu a:hover { background: #219ebc; }
.main-navigation li ul li { border-top: 0; }
ul:before,
ul:after {
  content: " "; /* 1 */
  display: table; /* 2 */
}
ul:after { clear: both; }

</style>
</head>
<body>

  <!-- Back to top button -->
  <!--<div id="fixed-social">
  <a href="tel:+91 9645167897 " class="fixed-skype" target="_blank"><i class="fa fa-phone fa-2x"></i></a>

    <a href="https://api.whatsapp.com/send?phone=+91 9645167897 &#10;" class="fixed-whatsapp" target="_blank"><i class="fa fa-whatsapp fa-2x"></i></a>

  </div>-->
  <div class="back-to-top"></div>

  <header>
     <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-inline-block">
              <span class="mai-mail fg-primary"></span> <a href="mailto:consult@raghnall.co.in">consult@raghnall.co.in</a>
            </div>
            <div class="d-inline-block ml-2">
              <span class="mai-call fg-primary"></span> <a href="tel:+91-7045161616">+91-7045161616</a>
            </div>
          </div>
          <div class="col-md-4 text-right d-none d-md-block">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
              <!--<a href="#"><span class="mai-logo-youtube"></span></a>-->
              <a href="https://www.linkedin.com/company/msme-accelerate/" target="blank"><span class="mai-logo-linkedin"></span></a>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .top-bar -->
   <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#e8e8e4">
      <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
     <a href="https://www.raghnall.co.in"><img src="../assets/images/banner/ragnallogo-removebg-preview (1).png" height="auto" width="150px"></a>
        <div class="navbar-collapse collapse" id="navbarContent" style="margin-left:70px;">
          <ul class="navbar-nav ml pt-3 pt-lg-0" >
         <li class="nav-item">
              <a href="../" class="nav-link">Home</a>
            </li>
               <li class="nav-item"><a href="#">Products</a>
    <ul>
      <li class="msmemenu"><a href="#">Employee Benefits</a>
        <ul>
          <li><a href="../../workmen-insuranace">Workmen's Compensation</a></li>
          <li><a href="../../group-health-insurance">Group Health Insurance</a></li>
        </ul>
      </li>
       <li class="msmemenu"><a href="#">Marine Insurance</a>
        <ul>
          <li><a href="../../marine-transist">Marine Transit Insurance (Inland)</a></li>
          <li><a href="../../marine-open">Marine Open Insurance</a></li>
        </ul>
      </li>
      <li class="msmemenu"><a href="#">Property Insurance</a>
        <ul>
          <li><a href="../../sookshma-udayam">Bharat Sookshma Udyam Suraksha Policy</a></li>
          <li><a href="../../griha-raksha">Bharat Griha Raksha Policy</a></li>
           <li><a href="../../laghu-udayam">Bharat Laghu Udyam Suraksha Policy</a></li>
        </ul>
      </li>
       <li class="msmemenu"><a href="#">Liability Insurance</a>
        <ul>
          <li><a href="../../profeesional-ca">Professional indemnity for CA</a></li>
          <li><a href="../../profeesional-mp">Professional indemnity for medical practitioners</a></li>
           <li><a href="../../corporate-cyber">Corporate cyber insurance</a></li>
           <li><a href="../../director-insuranace">Directors & Officers Insurance</a></li>
           <li><a href="../../general-liability">Comprehensive General Liability Insurance</a></li>
        </ul>
      </li>
      <li class="msmemenu"><a href="#">Engineering Insurance</a>
        <ul>
          <li><a href="../../contractor">Contractor's All Risk</a></li>
          <li><a href="../../plant-machinery">Contractor's Plant and Machinary</a></li>
           <li><a href="../../erection">Erection All Risk</a></li>
        </ul>
      </li>
    </ul>
  </li>
      <li class="nav-item">
        <a class="nav-link" href="../../blog.html">Claims Assistance
        <!--<span class="caret"></span>--></a>
       <!-- <ul class="dropdown-menu">
          <li><a href="#" class="nav-link">Page 1-1</a></li>
          <li><a href="#" class="nav-link">Page 1-2</a></li>
          <li><a href="#" class="nav-link">Page 1-3</a></li>
        </ul>-->
      </li>
       <li class="nav-item">
              <a href="../../blog.html" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
              <a href="../career" class="nav-link">Career</a>
            </li>
          </ul>
          <div class="ml-auto">
            <a href="#" class="btn btn-outline rounded-pill" data-toggle="modal" data-target="#myBook">Book&nbsp;Consultation</a>
          </div>
         <div class="ml-auto">
            <a href="https://raghnall.msmeaccelerate.in/"><img src="../assets/msmelogo.png"></a>
</div>
        </div>
      </div>
    </nav>
      <div class="page-banner">
           <img src="../assets/images/banner/Marine Open Insurance.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <!--<ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
            <h1 class="text-center">Marine Open Insurance</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>
        
  <div class="container">
  <div class="modal fade" id="myBook" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
      
          <h4 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span> Book Consultation</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form method="post" action="">
         
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Name</label>
              <input type="text" name="name1" class="form-control" id="psw" placeholder="Enter  Name">
            </div>
              
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email Id</label>
              <input type="text" name="email" class="form-control" id="psw" placeholder="Enter Email Id">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" name="phone" class="form-control" id="psw" placeholder="Enter Mobile Number">
            </div>
             
             <input type="hidden" name="route" value="marine-open">
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
              <input type="submit" name="sub10" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">
          </form>
        </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" name="send"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
        </div>
      </div>
      
    </div>
  </div> 
</div>
    <div class="page-section">
      <div class="container">
        <div class="row">
            <div style="margin-left:1000px;margin-top:-40px;">
    <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
          <!-- <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>-->
           </div>
          <div class="col-lg-6 py-3">
            <h2 class="title-section">What is <span class="marked">Marine Open</span> Insurance?</h2>
            <div class="divider"></div>
            <p class="mb-5" style="text-align: justify;">Marine Open Declaration Policy enables you to insure all your goods in transit or shipment during the year under a single policy. This policy is of a huge advantage for logistic companies, for multiple transits during the year and a single insurance policy can cover loss or damage of the cargo for multiple transit.
Marine Open Declaration policy are of three types, covering movement of goods from one place to another.
Within the country (Inland)
From India to Country outside India (Export)
From Country outside India to India (Import)</p>
          <!--   <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline ml-2">See pricing</a> -->
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/Artboard – 8.png" alt="">
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
      <div class="page-section client-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/img/Artboard – 9.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
        
            <h2 class="title-section">Who needs  <span class="marked">Marine Open</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Entities or individual dealing in multiple shipment of cargo, during the year should buy this insurance policy to protect the goods from loss or damage.
Business goods and consignments are usually very high in value and needless to say it is exposed to risk when it is in transit.</p>
           
          <!--   <div class="img-place mb-3">
              <img src="../assets/img/testi_image.png" alt="">
            </div> -->
              <!--<button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
            <a href="https://www.ilgi.co/567B192C5B?product_name=Marine Open Insurance&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-outline border ml-2" target="blank">Buy Now</a>-->
          </div>
        </div>
          
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
 <div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
      
          <h4 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span> Get Quote</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="" method="POST">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Select Product</label>
              <select  class="form-control" id="product" name="product">
                <option value="0">--Select--</option>
                <option value="In land declarationPolicy">Marine Open Inland Declaration Policy</option>
                <option value="Import declaration Policy">Marine Open Import Declaration Policy</option>
                <option value="Export declaration Policy">Marine Open Export Declaration Policy</option>
              </select>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Name of Corporate</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter Name of Corporate" name="corporate" required>
            </div>
          
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Mobile Number" name="mobile" required>
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email Id</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Email Id" name="email" required>
            </div>
            
<input type="hidden" name="route" value="marine-open">
            
            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
              <input type="submit" name="sub3" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly\nAfter submiting form for get quote')"></button>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
          </form>
        </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
        </div>
      </div>
      
    </div>
  </div> 
</div>
   <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
             <h2 class="title-section"> Why Do You Need   <span class="marked">Marine Open</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">When an entity is dealing in multiple shipments in year, it is very tough and time consuming for the insured to insure goods for each shipments. Rather, one can insure all goods in transit in a single open policy subject to periodic declaration.</p>
           
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/marine 3.jpg" alt="">
            </div>
          </div>
        </div>
       <!-- <div style="margin-left:400px">
             <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
           <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>-->
 <div class="container">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
     target="blank"
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span> Disclaimer</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          This link will bring you to a third party website, owned and operated by an independent party over which MSME Accelerate has no control. Any link you make to or from the 3rd Party Website will be at your own risk. Any use of the 3rd Party Website will be subject to and any information you provide will be governed by the terms of the 3rd Party Website, including those relating to confidentiality, data privacy and security.<br><br>
<b>By clicking "Proceed", you will be confirming that you have read and agreed to the terms herein.</b>
        </div>
         <div class="modal-footer">
          <button type="submit"class="btn btn-outline border ml-2"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         <a href="https://www.ilgi.co/567B192C5B?product_name=Marine Open Insurance&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
        </div>
      </div>
    </div>
  </div>
</div>

        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
     

    
        <section class="marine-table">
                <div class="container piInfo">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="headding text-center">
                                <h2>What is covered by Marine Open Insurance?</h2>
                                <p>Below are the detailed inclusions and exclusions of our Marine Open Insurance</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" rowspan="2" class="top-left">Covers</th>
                                            <th scope="col" colspan="2" class="text-center">Import / Export</th>
                                            <th scope="col" colspan="2" class="text-center top-right">Inland</th>
                                        </tr>
                                        <tr class="header-bottom">
                                            <th scope="col" class="text-center">ICC A</th>
                                            <th scope="col" class="text-center">ICC B</th>
                                            <th scope="col" class="text-center">ITC A</th>
                                            <th scope="col" class="text-center">ITC B</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr>
                                            <td>Fire or Explosion</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Overturning or derailment of vehicle</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Discharge of cargo at port of distress</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Collision between 2 Vehicles</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Jettison</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Washing overboard</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Earthquake, Lightening or Volcanic Eruption during transit</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>          
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                            <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>River or lake water entering cargo</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Damage/Loss to goods during loading & unloading</td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                               <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                 <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Damage/Loss to goods during handling of goods in transit</td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Theft or malicious damage</td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                        </tr>
                                        <tr>
                                            <td>Hijack of goods</td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                        </tr>
                                        <tr class="header-bottom">
                                            <td>Any other risk not specifically excluded</td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1.png" alt=""></td>
                                            <td>
                                                <img class="img-center" src="../assets/img/Fill-1-1.png" alt=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            

 <div class="page-section">
  <div class="container">
     <div class="text-center">
          <div class="subhead" style="color:black">Get answers to common questions about<span class="marked">Marine Open </span> Policy</div>
        
          <div class="divider mx-auto"></div>
        </div>
          <div class="row">
    <div class="col-sm-12">
      <ul class="nav nav-tabs acco-tab">
        <li ><a data-toggle="tab" href="#tab1" aria-selected="true" class="active">General</a></li>
        <li><a data-toggle="tab" href="#tab2" aria-selected="false">Cover</a></li>
          <li ><a data-toggle="tab" href="#tab3" aria-selected="true" >Claims</a></li>
        <li><a data-toggle="tab" href="#tab4" aria-selected="false">Policy</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      
      <div class="tab-content">
        <div id="tab1" class="tab-pane fade show active">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="infraOne">
                <a href="#collapseOne" class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <p class="mb-0">
              What do you mean by bill of lading?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
              A bill of lading (BL or BoL) is a legal document issued by a carrier to a shipper that details the type of shipment, quantity of the shipment and destination of the shipment being carried
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What is the meaning of per sending limit?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
            Per sending limit is defined as the maximum amount of liability which the insurer would assume in respect of goods belonging to the insured carried on a single transit. The policy may have a single limit per sending across different modes of conveyance or specify different limits for different modes of conveyance.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">What is open policy in marine insurance?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
              Single insurance policy which can cover loss or damage of the cargo for their multiple transit.Thus, Marine Open Declaration Policy enables you insure all your goods in transit or shipment during the year in a single policy.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What are INCO terms in marine insurance in India?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
                    They determine the point of change of responsibility between the buyer and seller. Inco terms inform sales contracts defining respective obligations, costs, and risks involved in the delivery of goods from the seller to the buyer. Some commonly used Inco Terms:



                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Ex Works (EXW): Seller has to place the goods at the disposal of the buyer. Carriage and Insurance are arranged by buyer</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Free On Board (FOB): Seller delivers when the goods pass the ship’s rail at the named port of shipment. This means the buyer has to bear all costs &risks to the goods from that point</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Cost, Insurance, Freight (CIF): The seller delivers when the goods pass the ship’s rail in the port of shipment. The seller must pay the cost & freight necessary to bring goods to the named port of destination, but the risk is transferred from seller to buyer</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">Who can buy marine open inland transit insurance?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
              Every entity or individual dealing in shipment of cargo and they are involved in multiple shipments during the year can buy this insurance policy to protect the goods from loss or damage.
                </div>
              </div>
            </div><!-- card-->
             
          </div><!-- accordion-->
        </div><!-- tab 1-->
      <div id="tab2" class="tab-pane fade">
        <div class="accordion">
          <div class="card">
            <div class="card-header" id="aboutOne">
              <a href="#collapsesix"   class="collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                <p class="mb-0">What are the types of covers provided under marine open transit insurance policy?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
            
 
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp All risk cover (ITC A/ICC A)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Basic Cover (ITC B/ICC B)</li>

</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">Can I cover terrorism under marine open transit insurance?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp No Terrorism is not covered in Marine open transit insurance.</li>

</ul>
</div>
              </div>
            </div>
          </div>
          
        </div><!-- accordion-->
      </div><!-- tab2 -->

             <div id="tab3" class="tab-pane fade show ">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="claimOne">
                <a href="#claimones" class="collapsed" data-toggle="collapse" data-target="#claimones" aria-expanded="false" aria-controls="claimones">
                  <p class="mb-0">
                 What is claim settlement process in marine open transit insurance policy?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
                    
              <div class="list">
                  Claim Intimation:
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Where the consignment is found in damage condition at the time of taking delivery or if consignment carrying vehicle met with an accident, being a rightful claimant, claim to be intimated immediately after delivery or notification of loss through Web Claim portal.</li>

</ul>
           List of Requirements:
              
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp After survey inspection, surveyor will share quantification of loss and list of documents to be submit (For Claim Above 1 Lakh)</li>

</ul>
          Submission:
              
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insured should arrange all requested details to surveyor / insurance company within time.</li>

</ul>
         Assessment:
              
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Surveyor will assess the loss based on docs submitted and share assessment with the insured.</li>

</ul>
        Consent/Discharge voucher:
              
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Surveyor will assess the loss based on docs submitted and share assessment with the insured.</li>

</ul>
       Final Survey Report:
              
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Surveyor will arrange to prepare and submit their report to insurer upon receipt of all requested details along with consent.</li>

</ul>
Processing:
              
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Upon receipt of final survey report from surveyor, notarized subrogation (claims above 2 lakhs) and duly singed Discharge voucher (claims above 10 lakhs) Insurer will arrange to release payment.</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">Can I claim for partial loss of cargo under marine open transit insurance policy?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                    Yes, partial loss is covered. It is of two types. One is particular average which means losses shall be covered up to the level of damage on subject matter insured. Other one is general average, which means, in order to avoid any other risk or danger, if the remaining cargo is voluntarily destroyed, the same shall be covered.
                
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="claimthree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimthrees">
                  <p class="mb-0">Can I claim for partial loss of cargo under marine open transit insurance policy?</p>
                </a>
              </div>
              <div id="claimthrees" class="collapse" aria-labelledby="claimthree" data-parent="#accordion">
                <div class="card-body">
                   <b>Below 1 lakh- Self Survey</b>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <ul>
                                                                    <li>Invoice copy</li>
                                                                    <li>Final Repair Bill</li>
                                                                    <li>Repair Estimate (If repairable) claim and original AD</li>
                                                                    <li>FIR copy</li>
                                                                    <li>Salvage Bill</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <ul>
                                                                    <li>LR Copy</li>
                                                                    <li>Photographs (In case of damage claim</li>
                                                                    <li>Shortage Certificate(In case of shortage)</li>
                                                                    <li>Driving License, RC Book of transporters of vehicles</li>
                                                                    <li>Discharge voucher on mail</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <b>Above 1 lakh- surveyor will be deputed</b>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <ul>
                                                                    <li>Original invoice</li>
                                                                    <li>Repair Estimate</li>
                                                                    <li>Acknowledged copy of letter lodging monetary</li>
                                                                    <li>FIR in case of accident and theft claims</li>
                                                                    <li>Salvage Bill</li>
                                                                    <li>Photographs (In case of damage claim)</li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <ul>
                                                                    <li>Original LR</li>
                                                                    <li>Original Damage certificate issued by transporter</li>
                                                                    <li>Final claim Bill along with salvage value</li>
                                                                    <li>Driving License, RC Book of transporters vehicle</li>
                                                                    <li>Original Letter of subrogation on Rs 200 on stamp paper notary</li>
                                                                    <li>Original Discharge voucher</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                </div>
              </div>
            </div><!-- card-->
            
            
           
          </div><!-- accordion-->
        </div><!-- tab 3-->

          <div id="tab4" class="tab-pane fade show ">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="policyOne">
                <a href="#policyones" class="collapsed" data-toggle="collapse" data-target="#policyones" aria-expanded="false" aria-controls="policyones">
                  <p class="mb-0">
               How is premium determined under marine open transit insurance policy?  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                    Premium is calculated by multiplying the Sum insured with the defined rate of specific cargo. Premium is subject to total value of cargo insured and type of cargo.
             
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">Is damage due to loading and unloading covered in marine declaration policy?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                    Cargo is prone to damage during the loading into the vehicle/ship and unloading of the goods from the vehicle. Such damages can be covered under marine open declaration policy with all risk cover (Cover A).
               
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="policyThree">
                <a href="#policythrees" class="collapsed" data-toggle="collapse" data-target="#policythrees" aria-expanded="false" aria-controls="policythrees">
                  <p class="mb-0">What are the exclusions of open marine policy?</p>
                </a>
              </div>
              <div id="policythrees" class="collapse" aria-labelledby="policyThree" data-parent="#accordion">
                <div class="card-body">
                   <div class="list"> <ul class="text-left"> <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Wilful Misconduct of the Assured</li>
                   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Ordinary leakage, ordinary loss in weight or volume or ordinary wear and tear of the subject-matter insured</li> 
                   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insufficiency or unsuitability of packing</li> 
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Inherent vice or nature of the subject-matter insured</li> 
                   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Delay</li> 
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insolvency or ﬁnancial default of owner, manager, charters or operators of the vessel</li> 
                   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Unﬁtness/ Unseaworthiness of carrying conveyance</li> 
                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Please refer the Policy Wordings for detailed list of exclusions</li> 
                   </ul> </div>
                </div>
              </div>
            </div><!-- card-->
           
          </div><!-- accordion-->
        </div><!-- tab 4-->
      </div><!-- tab content-->
    </div>
  </div>
</div>
</div>

  </main>
<footer class="page-footer">
    <div class="container">
        
           <img src="../assets/msmelogo.png" class="center" style="margin-top:-55px;" >

      <div class="row justify-content-center mb-5">
 
       
        <div class="col-lg-2 py-3">
          <h5>Employee Benefits</h5>
          <ul class="footer-menu">
            <li><a href="../../workmen-insuranace">Workmen's Compensation</a></li>
            <li><a href="../../group-health-insurance">Group Health</a></li>
          </ul>
        </div>
        <div class="col-lg-2 py-3">
          <h5>Marine Insurance</h5>
          <ul class="footer-menu">
            
            <li><a href="../../marine-transist">Marine Transist</a></li>
            <li><a href="../../marine-open">Marine Open</a></li>
            
          </ul>
        </div>
       <!-- <div class="col-lg-3 py-3">
          <h5>Locate Us</h5>
         

          <div class="sosmed-button mt-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7908159.480946479!2d70.75310276152766!3d14.575926565134365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae17baa8194715%3A0x639f2fbe922fbe5!2sRaghnall%20Insurance%20Broking!5e0!3m2!1sen!2sin!4v1648895059707!5m2!1sen!2sin" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>-->
        <div class="col-lg-3 py-3">
          <h5>Property Insurance</h5>
          <ul class="footer-menu">
            <li><a href="../../griha-raksha">Bharat Griha Raksha</a></li>
            <li><a href="../../sookshma-udayam">Bharat Sookshma Udyam</a></li>
            <li><a href="../../laghu-udayam">Bharat Laghu Udyam</a></li>
           
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Liability Insurance</h5>
          <ul class="footer-menu">
             <li><a href="../../corporate-cyber">Corporate Cyber</a></li>
            <li><a href="../../director-insuranace">Directors & Officers</a></li>
            
            <li><a href="../../profeesional-ca">Professional indemnity for CA</a></li>
            <li><a href="../../profeesional-mp">Professional indemnity for MP</a></li>
            <li><a href="../../general-liability">Comprehensive General</a></li>
            
            
          </ul>
        </div>
        <div class="col-lg-2 py-3">
            <h5>Engineering Insurance</h5>
             <ul class="footer-menu">
            <li><a href="../../contractor">Contractor's All Risk</a></li>
            <li><a href="../../plant-machinery">Contractor's Plant and Machinary</a></li>
            <li><a href="../../erection">Erection All Risk</a></li>
            </ul
        </div>
        
      </div>
      </div>
     
 <hr>
      <div class="row">
          <div class="col-sm-4 py-2">
              
               <p style="color:black"><i class="fa fa-phone mr-2"></i>+91-7045161616</p>
                <p style="color:black"><i class="fa fa-envelope mr-2"></i>consult@raghnall.co.in</p>
          
          </div>
        <div class="col-sm-5 py-2">
           
          <p id="copyright"  style="font-size:13px">Copyrights &copy; 2022 All Rights Reserved By <a href="#"> MSME Accelerate</a>. </p>
          <p style="font-size:11px;margin-left:115px">Designed By <a href="http://bissogo.com/" target="_blank">Bissogo</a>.</p>
        </div>
        <div class="col-sm-3 py-2 text-right">
          <div class="d-inline-block px-3">
            <a href="../assets/policy/MSME Accelerate Privacy Policy.pdf
" target="blank">Privacy</a>
          </div>
          <!--<div class="d-inline-block px-3">
            <a href="contact.html">Contact Us</a>
          </div>-->
        </div>
      </div>
    </div> <!-- .container -->
  </footer> <!-- .page-footer -->


  <script src="../assets/js/jquery-3.5.1.min.js"></script>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/vendor/wow/wow.min.js"></script>

  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <script src="../assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

  <script src="../assets/js/google-maps.js"></script>

  <script src="../assets/js/theme.js"></script>

</body>
</html>