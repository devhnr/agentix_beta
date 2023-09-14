<?php
include("../connect.php");
include("../customer.php");
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
   <nav       <div class="col-md-8">
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
    <div class="container mt-5">
      <div class="page-banner">
          <img src="../assets/images/banner/Erection All Risks (EAR) Insurance.svg">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
             <!-- <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
          <!--  <h1 class="text-center">Erection All Risks (EAR) Insurance</h1>-->
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
          <form  method="post" action="">
         
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Name</label>
              <input type="text" name="name1" class="form-control" id="psw" placeholder="Enter Name" required>
            </div>
              
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email Id</label>
              <input type="text" name="email" class="form-control" id="psw" placeholder="Enter Email Id" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" name="phone" class="form-control" id="psw" placeholder="Enter Mobile Number" required>
            </div>
             
             <!--<input type="hidden" name="pincode" value="null">-->

            <input type="hidden" name="route" value="erection">
            <div class="checkbox">
              <label><input type="checkbox" value="1" checked required>I agree to the terms and conditions</label>
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
            <h2 class="title-section">What is <span class="marked">Erection All Risks (EAR) </span> Insurance?</h2>
            <div class="divider"></div>
            <p class="mb-5" style="text-align: justify;">An Erection All Risks (EAR) insurance offers protection to Principals and Contractors and also to Manufacturers and Suppliers erecting machinery and plant etc. against financial loss due to any sudden fortuitous and unforeseen causes resulting in loss or damage to the property insured at the project site whilst being stored, erected, tested and maintained. EAR insurance has been designed to meet the needs of the market, which are fast changing with the advancement in technology and the economic structure projects of all sizes of Macro or Micro levels i.e. large projects such as erection of Thermal Power Stations, Oil Refineries, Fertilizer Plants etc, or small projects like installation of Computers of Electrical equipment.
            </p>
            
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/Artboard – 31.jpg" alt="">
            </div>
          </div>
           <!--<div style="margin-left:450px">
             <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
            <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal2">Buy Now</button>
            </div>-->
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
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contact Person Name</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Contact Person Name" name="name1" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Pincode</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Pincode" name="pincode" required>
            </div>
              
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email Id</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Email Id" name="email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Mobile Number" name="mobile" required>
            </div>

<input type="hidden" name="route" value="erection">
             
            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
              <input type="submit" name="sub2"class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">
          </form>
        </div>
         <div class="modal-footer">
          <Button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
        </div>
      </div>
      
    </div>
  </div> 
</div>
      <div class="page-section client-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/images/er.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
     
            <h2 class="title-section">Who Needs  <span class="marked">Erection All Risks (EAR)</span> Insurance?</h2>
            <div class="divider"></div>
           
      <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Property owners or renters</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Small Business owners</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Medium Business owners</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Large Business owners</li>
</ul>
</div>
        
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
         <a href="https://www.ilgi.co/C13E0D409A?product_name=Erection All Risk&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
        </div>
      </div>
    </div>
  </div>
</div>
          </div>
        </div>
          
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
   <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
            <h2 class="title-section">Why do you need <span class="marked">Erection All Risks (EAR)</span> Insurance?</h2>
            <div class="divider"></div>
             <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp This insurance provides comprehensive insurance cover to the client &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;with respect to</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Any contingency during unloading at the project site</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp During storage, physical construction/erection</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp During test run and maintenance if covered</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Covers all physical losses or damages</li>

</ul>
</div>
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/Artboard – 30.jpg" alt="">
            </div>
          </div>
        </div>
       
 <div class="container">
  <div class="modal fade" id="myModal2" role="dialog">
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
         <a href="https://www.ilgi.co/C13E0D409A?product_name=Erection All Risk&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
       <section class="upper-tab-div">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="headding text-center">
                                <h3>What is covered under Erection All Risks Insurance?</h3>
                                <p>Below are the detailed inclusions and exclusions of our Erection All Risks Insurance</p>
                            </div>
                            <div class="incl-exclu-box">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-inclu" role="tab" aria-selected="true">Inclusions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-exclu" role="tab" aria-selected="false">Exclusions</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- exclusions tab-->
                                    <div class="tab-pane active" id="tabs-inclu" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                <div>
                                                    <ul class="incl-list">
                                                        <li>Location Risks:Fire, Lighting, Theft, Burglary & Housebreaking.</li>
                                                        <li>Testing and Commissioning Risks*:Failure of Safety Devices, Leakage of Electricity, Insulation failure, Short circuit, explosion.</li>
                                                          <li>Testing and Commissioning Risks*:Failure of Safety Devices, Leakage of Electricity, Insulation failure, Short circuit, explosion.</li>
                                                            <li>Act of God:Storm, Tempest, Hurricane, Flood, Inundation, Subsidence, Landslide, Rockslide, earthquake.</li>
                                                              <li>The insurance cover is subject a few exclusion listed in the policy which are applied internationally and are common to the insurance industry.</li>
                                                                <li>Its inbuilt cover in EAR, for CAR specific request to be made to UW.</li>
                                                       
                                                      </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-exclu" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                <div class="">
                                                    <ul class="exclu-list">
                                                        <li>Handling Risks:Impact from falling objects, Collision, Failure of Cranes or Tackles etc.</li>
                                                       <li>Risk of Human Element:Carelessness, Negligence, Faults in Erection/Construction, Strike & Riot, Malicious damage, Terrorism.</li>
                                                      
                                                       <li>Testing Perils:Maximum value at risk.</li>
                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                        

 <div class="page-section">
  <div class="container">
     <div class="text-center">
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Erection All Risks </span> Insurance</div>
        
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
                <a href="#collapseOne"  class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <p class="mb-0">
           Who needs erection all risk policy?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
              The policy can be taken by any individual or organisation as Principal or Contractor of a project. It can be taken in joint names also.
                
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What service does erection all risk policy offers?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
          EAR policy offers protection to Principals and Contractors and also to Manufacturers and Suppliers erecting machinery and plant etc. against financial loss due to any sudden fortuitous and unforeseen causes resulting in loss or damage to the property insured at the project site whilst being stored, erected, tested and maintained. </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">Is it a compulsory policy?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
              Yes
                </div>
              </div>
            </div><!-- card-->
             
          </div><!-- accordion-->
        </div><!-- tab 1-->
      <div id="tab2" class="tab-pane fade">
        <div class="accordion">
          <div class="card">
            <div class="card-header" id="aboutOne">
              <a href="#collapsesix"  class="collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                <p class="mb-0">What does erection all risk policy covers?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
            The Policy indemnifies the Insured in the event of unforeseen and sudden physical loss or physical damage to the Property Insured arising:
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp during the period of Insurance</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp whilst at the Project Site (or in storage)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Erection All Risk Policy provides cover for electromechanical projects, erection of various type of plants and T&D network.</li>

</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">Is third party liability covered?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
                  Yes, Third Party Cover can be opted upto 10% of Sum Insured or upto INR 25 Crs, whichever is greater.
              
              </div>
            </div>
          </div>
         
            
        </div><!-- accordion-->
      </div><!-- tab2 -->

             <div id="tab3" class="tab-pane fade show ">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="claimOne">
                <a href="#claimones"  class="collapsed" data-toggle="collapse" data-target="#claimones" aria-expanded="false" aria-controls="claimones">
                  <p class="mb-0">
               How to report losses?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Get in touch with your Relationship Manager</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">Is there any time limit to register for claims?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Yes, within 14 days.</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
                   <div class="card">
              <div class="card-header" id="claimThree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimThree">
                  <p class="mb-0">What are the documents required to register a claim?</p>
                </a>
              </div>
              <div id="claimthrees" class="collapse" aria-labelledby="claimThree" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp As specified by the Insurance Company</li>
</ul>
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
                <a href="#policyones"  class="collapsed" data-toggle="collapse" data-target="#policyones" aria-expanded="false" aria-controls="policyones">
                  <p class="mb-0">
                What is testing period in erection all risk policy?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                The testing period shall commence for each item of property insured with the application of the first test-load or the first introduction of fuel, feedstock or process materials and shall last for the duration specified in the schedule or until the item has passed its tests, whichever is the earlier.
                </div>
              </div>
            </div><!-- close card-->
             <div class="card">
              <div class="card-header" id="policyThree">
                <a href="#policythrees" class="collapsed"  data-toggle="collapse" data-target="#policythrees" aria-expanded="false" aria-controls="policythrees">
                  <p class="mb-0">
               What is extended maintenance cover?
                  </p>
                </a>
              </div>
              <div id="policythrees" class="collapse" aria-labelledby="policyThree" data-parent="#accordion">
                <div class="card-body">
                <ul>
                    <li>Covers Loss or damage caused by contractor while carrying out obligations under maintenance contract.</li>
                    <li>Cover loss or damage occurring during maintenance period provided such loss or damage was caused during construction / erection period.</li>
                </ul>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">Is machinery breakdown covered in erection all risk policy?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
               Yes
                </div>
              </div>
            </div><!-- card-->
           
           <div class="card"> <div class="card-header" id="aboutThree"> <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight"> <p class="mb-0">Are there any deductibles?</p> </a> </div> <div id="collapseeight" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion"> <div class="card-body"> Yes there are as per the Risk Occupancy. </div> </div> </div> 
            <div class="card"> <div class="card-header" id="infraFive"> <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"> <p class="mb-0">What documents do I require to issue a policy?</p> </a> </div> <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion"> <div class="card-body">  <ul>
                                                                <li>Detailed RFQ</li>
                                                                <li>Principal, Contractor, Sub-contractor details</li>
                                                                <li>Estimated Cost of project- contract cost, Other than Project BOQ material, Taxes etc.</li>
                                                                <li>Projects Start date, End date, and Bar chart.</li>
                                                                <li>Details towards Testing for EAR projects.</li>
                                                                <li>Equipment details like Imported equipment, second-hand details for EAR projects.</li>
                                                                <li>Sum Insured breakup towards different scope of works</li>
                                                                <li>Risk location details, in case of multiple locations- names of all locations. (Lat-long coordinates & Google maps required for road projects, transmission lines)</li>
                                                                <li>Complete/Detailed scope of works or contract copy.</li>
                                                                <li>Wet works details and sum insured if involved.</li>
                                                            </ul> </div> </div> </div><!-- card-->
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