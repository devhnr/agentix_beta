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
        <a class="nav-link" href="#">Claims Assistance
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
           <img src="../assets/images/banner/Bharat Sookshma Insurance.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <!--<ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
            <h1 class="text-center">Bharat Sookshma Insurance</h1>
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
             
             <input type="hidden" name="route" value="sookshma-udayam">
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
            <h2 class="title-section">What is <span class="marked">Fire</span> Insurance?</h2>
            <div class="divider"></div>
            <p class="mb-5" style="text-align: justify;">Fire insurance covers your property against the damage and losses caused by fire. This Insurance protects physical goods and the equipment of the business or home against any loss from theft, fire, and other perils. It helps to cover the cost of replacement, repair or reconstruction of the property. Fire Insurance coverage is for loss from unexpected events which causes physicals loss, damage or destruction of building and structures, plant and machinery, stock and other assets relating to your business. All micro-level enterprises like hotels, restaurants, offices, and others are eligible for this policy.
            </p>
        
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/bs1.jpg" alt="">
            </div>
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
             <!--<input type="hidden" name="pincode" value="null">-->

<input type="hidden" name="route" value="sookshma-udayam">
             
            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
             <input type="submit" name="sub2" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')"></button>
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
      <div class="page-section client-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/img/bs2.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
     
            <h2 class="title-section">Who Needs <span class="marked">Fire</span> Insurance?</h2>
            <div class="divider"></div>
           
      <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp An organisation/firm/institution/individual who wishes to save their &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;business from an unforeseen event in case of fire</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Shopkeepers, retailers or godown/storage keepers</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Anyone with household contents like furniture, valuable contents <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and so on</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Banks, financial, research, educational institutes, and so on</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Manufacturing and non-manufacturing firms</li>
</ul>
</div>
        
          </div>
        </div>
          
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
   <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
            <h2 class="title-section">Why do you need <span class="marked">Fire</span> Insurance?</h2>
            <div class="divider"></div>
            Our business are always prone to risks and fire eruption and fire insurance provides a comprehensive protection against damages caused due to fire explosion and other risks. Besides fire related perils, it also protect damages caused due to any natural calamity, bursting of water tanks, theft etc. The built in covers include alterations or extensions, stocks on floater basis, temporary removal of stock, cover for specific contents, start-up expenses, professional fees, costs for removal of debris and costs compelled by Municipal regulations.
             
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/bs3.jpg" alt="">
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
    
    <div class="page-section client-section">
      <div class="container">
         
             <div class="text-center">
          <h3 class="title-section">What are the products available under <span class="marked"> Fire Insurance?</span></h3>
          <div class="divider mx-auto"></div>
        </div>
            
           
<div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-5">
                                <h5>Bharat Sookshma Udyam Suraksha Policy</h5>
                                <p>
                                    The policy covers the insured property related to the business against insured peril at one location with the total value at risk up to ₹ 5 Crores. This shall include Buildings, Plant Fixtures, Machinery, Stocks RM, and Finished Goods & Stock in process.
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-5">
                                <h5>Bharat Laghu Udyam Suraksha Policy</h5>
                                <p>
                                    The policy covers the insured property related to the business against insured peril at one location with the total value at risk above ₹ 5 Crore and upto ₹ 50 Crore. This include Buildings, Plant & Fixtures, Machinery, Stocks RM, and Finished Goods & Stock in process.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-5">
                                <h5>Standard Fire and Special Perils</h5>
                                <p>The policy covers the insured property related to the business against insured peril at one location with the total value at risk above ₹ 50 Crores. This include Buildings, Plant & Fixtures, Machinery, Stocks RM, and Finished Goods & Stock in process.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-5">
                                <h5>Bharat Griha Raksha Policy</h5>
                                <p>Bharat Griha Raksha Policy coves for your dwelling (housing societies), against fire and natural calamities like storm, floods, earth quake, etc. This policy acts as a safety net, covering your housing societies. It comes with the promise of financial security and support, when you and your business need it the most.</p>
                            </div>
                        </div>
<!--<div style="margin-left:400px">
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
         <a href=" https://www.ilgi.co/136A68F18A?product_name=Bharat Sookshma Udyam Suraksha Policy&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
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
                            <div class="headding text-center"><br>
                                <h3>What is covered in Fire Insurance?</h3>
                                <p>Below are the detailed inclusions and exclusions of our Fire Insurance</p>
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
                                                        <li>Fire, including due to its own fermentation, or natural heating or spontaneous combustion.</li>
                                                        <li>Explosion or Implosion - This policy protects against the loss caused due to explosion and implosion. A vessel can explode when it’s inside pressure reaches to or is more than the atmospheric pressure outside. Whereas an implosion occurs when the external pressure is more than the internal pressure.</li>
                                                          <li>Lightning - Fire or any other damage caused to the property due to a peril like lightning is covered by the fire insurance policy</li>
                                                            <li>Earthquake, volcanic eruption, or other convulsions of nature.</li>
                                                              <li>Storm, Cyclone, Typhoon, Tempest, Hurricane, Tornado, Tsunami, Flood and Inundation - These violent destructions are also covered under fire insurance.</li>
                                                                <li>Acts of terrorism - An act of terrorism means an act or series of acts, including but not limited to the use of force or violence and/or the threat thereof.</li>
                                                                <li>Bursting or overflowing of water tanks, apparatus and pipes: This policy also covers loss and damage caused to the property by water due to the Bursting or overflowing of water tanks, apparatus and pipes</li>
                                                                <li>Leakage from automatic sprinkler installations</li>
                                                       
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
                                                        <li>Burning of Insured Property by any order of Public authority.</li>
                                                       <li>Deliberate, wilful or intentional act or omission.</li>
                                                      
                                                       <li>Loss, destruction or damage to stocks in cold storage due to change in temperature.</li>
                                                       <li>Loss, destruction or damage to insured property by undergoing any heating, drying process or centrifugal Forces.</li>
                                                       <li>War, invasion, war-like operations</li>
                                                       <li>Ionising radiation	Ionising radiation</li>
                                                       <li>Pollution or contamination</li>
                                                       <li>Property is missing or has been mislaid</li>
                                                       <li>Consequential or indirect loss or damage</li>
                                                       <li>Costs, fees or expenses for preparing any claim</li>
                                                       <li>Insured premised or building remains unoccupied for more than 30 days</li>
                                                      
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
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Bharat Udayam Sooksma</span> Policy</div>
        
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
                <a href="#collapseOne" class="collapsed"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <p class="mb-0">
           What does actual cost mean in Costs compelled by Municipal Regulations?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
              
                Upon Occurrence of an Insured peril, these are the costs incurred by insured (on actual basis) at the time of Reinstatement of property due to change in Municipal Regulations.
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What does Impact damage of any kind means?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
           Impact damage of any kind means damage caused by impact, or collision caused by, any external physical object (e.g. vehicle, falling trees, aircraft, wall etc.).It is similar to the traditional accidental damage.</div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">Whether Jungle Fire and Forest Fire are same?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
              Yes, both are same as per product wordings.
                </div>
              </div>
            </div><!-- card-->
             
              <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What is Reinstatement Value?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
                    It is New Replacement Value where the idea is to put the insured in the same position as he was just before happening of the incident/claim.
               
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">For which property can I take Bharat Sookshma Udyam Suraksha policy?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
               Bharat Sookshma Udyam Suraksha can be taken for all properties except Individual dwellings and housing societies. Assets that cab covered under the policy are Building including plinth, Basement and additional structures, Plant & Machinery , Stocks – Raw Material, Finished goods and stocks in process, Other contents.
                </div>
              </div>
            </div><!-- card-->
                <div class="card">
              <div class="card-header" id="infraSix">
                <a href="#collapsesixs" class="collapsed" data-toggle="collapse" data-target="#collapsesixs" aria-expanded="false" aria-controls="collapsesixs">
                  <p class="mb-0">How long does this cover protect me?</p>
                </a>
              </div>
              <div id="collapsesixs" class="collapse" aria-labelledby="infraSix" data-parent="#accordion">
                <div class="card-body">
              Policy period upto 12 months as opted and mentioned in the policy document.
                </div>
              </div>
            </div><!-- card-->
            
            <div class="card">
              <div class="card-header" id="infraSeven">
                <a href="#collapsesevens" class="collapsed" data-toggle="collapse" data-target="#collapsesevens" aria-expanded="false" aria-controls="collapsesevens">
                  <p class="mb-0">Can this policy be cancelled and will my premium be returned?</p>
                </a>
              </div>
              <div id="collapsesevens" class="collapse" aria-labelledby="infraSeven" data-parent="#accordion">
                <div class="card-body">
              You can cancel this policy at any time during the policy period. Premium will be returned on the pro-rate basis.
                </div>
              </div>
            </div><!-- card-->
          </div><!-- accordion-->
        </div><!-- tab 1-->
      <div id="tab2" class="tab-pane fade">
        <div class="accordion">
          <div class="card">
            <div class="card-header" id="aboutOne">
              <a href="#collapsesix" class="collapsed"  data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                <p class="mb-0">What are the built in coverages of Bharat Sookshma Udyam Suraksha Policy?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
            Basic cover includes
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Additions, alterations or extensions - Property that You erect, acquire or add during the Policy Period is covered upto 15% of the Sum Insured for that item (excluding stocks).</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Stocks on floater basis: Loss to stocks located at more than one named location.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Temporary removal of stocks - Loss to stocks temporarily removed to other premises for fabrication, processing or finishing upto 10% of value.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Cover for Specific Contents - Cover for Money upto ₹ 50,000 during the policy period, cover for documents such as deeds, manuscripts, business books, plans, drawings, securities etc. upto ₹ 50,000 during the policy period, cover for computer programmes, information and data upto ₹ 5 Lakh during the policy period and cover for personal effects of employees, Directors and visitors upto ₹ 15,000 per person for a maximum of 20 persons during the policy period.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Start-Up Expenses - Start-up cost incurred by You in respect of insured risk consequent upon a loss or damage due to insured events upto ₹5 Lakhs.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Professional fees - Reasonable fees of architects, surveyors and consulting engineers upto 5% of the claim amount.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Costs for Removal of debris - Reasonable expenses for removal of debris upto 2% of the claim amount.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Costs compelled by Municipal Regulations - Additional cost of reconstruction of property incurred solely for complying with municipal regulations.</li>

</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">What are the options to increase the coverage under the policy?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp There is an option to increase the coverage by the means of add-ons.</li>
</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutThree">
              <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                <p class="mb-0">Whether Partial Selection of Assets is Allowed or not?</p>
              </a>
            </div>
            <div id="collapseeight" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion">
              <div class="card-body">
               Partial Selection of asset is not allowed. The policy allows cover for complete value of plant and machinery, Stocks and FFF at the risk premise.
                   </div>
            </div>
          </div>
           
           <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapse4" class="collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                  <p class="mb-0">Whether are the floater provision in the policies?</p>
                </a>
              </div>
              <div id="collapse4" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
           Floater is an inbuilt cover in Bharat Sooksham Udyog Suraksha but it is optional cover under Bharat Laghu Udyog Suraksha policy.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infra5">
                <a href="#collapse5" class="collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                  <p class="mb-0">What is the provision of Theft coverage in the policy?</p>
                </a>
              </div>
              <div id="collapse5" class="collapse" aria-labelledby="infra5" data-parent="#accordion">
                <div class="card-body">
              Losses / damage due to Theft will be covered within 7 days from occurrence of an Insured peril.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infra6">
                <a href="#collapse6" class="collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                  <p class="mb-0">What are the options to increase sum insured limits for Inbuilt Covers?</p>
                </a>
              </div>
              <div id="collapse6" class="collapse" aria-labelledby="infra6" data-parent="#accordion">
                <div class="card-body">
              Presently, Sum Insured limits of inbuilt covers are fixed as per IRDA guidelines.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infra7">
                <a href="#collapse7" class="collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                  <p class="mb-0">What is the Insurance Cover under Bharat Sookshma Udyam suraksha?</p>
                </a>
              </div>
              <div id="collapse7" class="collapse" aria-labelledby="infra7" data-parent="#accordion">
                <div class="card-body">
              Provides insurance cover for physical loss or damage to, or destruction of Insured Property against Fire and Allied Perils.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraeight">
                <a href="#collapse8" class="collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                  <p class="mb-0">Which unexpected events does Sookshma Udyam Suraksha cover?</p>
                </a>
              </div>
              <div id="collapse8" class="collapse" aria-labelledby="infraeight" data-parent="#accordion">
                <div class="card-body">
              <ul>
                  <li>Fire, including due to its own fermentation, or natural heating or spontaneous combustion</li>
                  <li>Explosion or Implosion</li>
                  <li>Lightning</li>
                  <li>Earthquake, volcanic eruption, or other convulsions of nature</li>
                  <li>Storm, Cyclone, Typhoon, Tempest, Hurricane, Tornado, Tsunami, Flood and Inundation</li>
                  <li>Subsidence of the land on which Your Premises stand, Landslide, Rockslide</li>
                  <li>Bush fire, Forest fire, Jungle fire</li>
                  <li>Impact damage of any kind, i.e., damage caused by impact of, or collision caused by, any external physical object (e.g. vehicle, falling trees, aircraft, wall etc.)</li>
                  <li>Missile testing operations</li>
                  <li>Riot, Strikes, Malicious Damages</li>
                  <li>Acts of terrorism</li>
                  <li>Bursting or overflowing of water tanks, apparatus and pipes</li>
                  <li>Leakage from automatic sprinkler installations.</li>
                  <li>Theft within 7 days from the occurrence of and proximately caused by, any of the above insured events</li>
              </ul>
                </div>
              </div>
            </div><!-- card-->
              <div class="card">
              <div class="card-header" id="infranine">
                <a href="#collapsenine" class="collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                  <p class="mb-0">Can I cover curios and works of art under Sookshma Udyam Suraksha policy?</p>
                </a>
              </div>
              <div id="collapsenine" class="collapse" aria-labelledby="infranine" data-parent="#accordion">
                <div class="card-body">
              Yes on agreed value basis subject to valuation certificate being submitted and accepted by us.
                </div>
              </div>
            </div><!-- card-->
              <div class="card">
              <div class="card-header" id="infraten">
                <a href="#collapseten" class="collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                  <p class="mb-0">Are machinery and equipment temporarily removed for repairs, cleaning or similar purposes covered under  Sookshma Udyam Suraksha Policy?</p>
                </a>
              </div>
              <div id="collapseten" class="collapse" aria-labelledby="infraten" data-parent="#accordion">
                <div class="card-body">
              No
                </div>
              </div>
            </div><!-- card-->
        </div><!-- accordion-->
      </div><!-- tab2 -->

             <div id="tab3" class="tab-pane fade show ">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="claimOne">
                <a href="#claimones"  class="collapsed" data-toggle="collapse" data-target="#claimones" aria-expanded="false" aria-controls="claimones">
                  <p class="mb-0">
                Does the Bharat Sookshma Udyam Suraksha cover the entire claim?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
                    Yes. Excess amount of 5,000/- for each claim is deducted and remaining is paid.
            
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">How do I make a claim?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp If you suffer a loss that is covered by this policy, you must make a claim. The Insurance Company will verify the claim and accept it if it is according to the terms and conditions of this policy.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp When you suffer loss to any Insured Property because of an Insured Event, You must:</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp notify the Insurance Company immediately</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp report to police, fire authorities and other appropriate legal Authorities</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp take all reasonable steps to prevent further damage to Insured Property</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp preserve and collect evidence, take and preserve photographs,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp assist the Insurance Company and their representatives in collecting evidence and details, give us all information, books of accounts, and other documents etc</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp submit claim form at the earliest opportunity but within 30 days from date You first notice the loss or damage</li>
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
                <a href="#policyones" class="collapsed" data-toggle="collapse" data-target="#policyones" aria-expanded="false" aria-controls="policyones">
                  <p class="mb-0">
                What are provisions in the Policy to exclude inbuilt perils (ex. STFI) to arrive at reduction in Price?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                 There are no provision in the policy to exclude Inbuilt Perils.
                </div>
              </div>
            </div><!-- close card-->
             <div class="card">
              <div class="card-header" id="policyThree">
                <a href="#policythrees" class="collapsed" data-toggle="collapse" data-target="#policythrees" aria-expanded="false" aria-controls="policythrees">
                  <p class="mb-0">
                Does Bharat Sookshma Suraksha policy allow Underinsurance Waiver?
                  </p>
                </a>
              </div>
              <div id="policythrees" class="collapse" aria-labelledby="policyThree" data-parent="#accordion">
                <div class="card-body">
                In these products, underinsurance is waived up to 15%, but beyond that underinsurance is applicable to full extent.
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">What is the provision to increase/decrease the Sum insured during the policy period?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp At the Request of the insured, Sum insured under the policy can be increased / decreased subjected to payment of Premium.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Whether there will be an impact on policy wording due to increase in Policy Sum Insured, once it falls in next SI Slab i.e. Policy SI changes from 0-5 Cr slab to 5-50 Cr slab.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp During Mid-term, there will be no impact on Policy wording due to SI increase. However, at the time of renewal, applicable policy wording as per sum insured will be selected while policy issuance.</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
           
             <div class="card">
              <div class="card-header" id="claimThree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimThree">
                  <p class="mb-0">Whether Extension of short period policy is possible in the product?</p>
                </a>
              </div>
              <div id="claimthrees" class="collapse" aria-labelledby="claimThree" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Extension of short period policy is not possible, however annual policy can be issued on completion of Short period.</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
                       <div class="card">
              <div class="card-header" id="claimFive">
                <a href="#claimfives" class="collapsed" data-toggle="collapse" data-target="#claimfives" aria-expanded="false" aria-controls="claimfives">
                  <p class="mb-0">What is the basis of Sum Insured in this policy?</p>
                </a>
              </div>
              <div id="claimfives" class="collapse" aria-labelledby="claimFive" data-parent="#accordion">
                <div class="card-body">
                    For Building, Plant and Machinery, Furniture, Fixture and Fittings and any other contents: Reinstatement Value.
                    <strong>For stock:</strong>
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  For raw material: Landed Cost at Your Premises.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  For stock in process: Input Cost of the stock at the time of damage,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp For finished stock: the Manufacturing Cost of the finished stock or the Contract price of goods sold but not delivered</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
                   <div class="card">
              <div class="card-header" id="claimSix">
                <a href="#claimsixs" class="collapsed" data-toggle="collapse" data-target="#claimsixs" aria-expanded="false" aria-controls="claimsixs">
                  <p class="mb-0">What kind of commercial enterprise is this policy meant for?</p>
                </a>
              </div>
              <div id="claimsixs" class="collapse" aria-labelledby="claimSix" data-parent="#accordion">
                <div class="card-body">
                   Offices, Hotels, Shops, Industrial/Manufacturing risks, Utilities located outside the compound of Industrial/ Manufacturing risks, Storage risks outside the compound of Industrial/ Manufacturing risks and Tank farms/Gas holders outside the compounds of Industrial/ Manufacturing risks.
                  
                </div>
              </div>
            </div><!-- card-->
            
                               <div class="card">
              <div class="card-header" id="claimSeven">
                <a href="#claimsevens" class="collapsed" data-toggle="collapse" data-target="#claimsevens" aria-expanded="false" aria-controls="claimsevens">
                  <p class="mb-0">How much do I pay for this policy and how is my premium calculated?</p>
                </a>
              </div>
              <div id="claimsevens" class="collapse" aria-labelledby="claimSeven" data-parent="#accordion">
                <div class="card-body">
                  The premium for the Insurance depends on:
                  <ul>
                      <li>i. The nature of insured property, viz. building, plant & Machinery, stock etc.</li>
                      <li>ii. The Sum Insured opted</li>
                      <li>iii. The nature of the Insured business and activity being carried</li>
                      <li>iv. Claims experience past 3 years.</li>
                      <li>v. Various factors that define the risk profile of the enterprise.</li>
                  </ul>
                  
                </div>
              </div>
            </div><!-- card-->
            
                            <div class="card">
              <div class="card-header" id="claimEight">
                <a href="#claimeights" class="collapsed" data-toggle="collapse" data-target="#claimeights" aria-expanded="false" aria-controls="claimeights">
                  <p class="mb-0">What are my obligations of the Insured in this policy?</p>
                </a>
              </div>
              <div id="claimeights" class="collapse" aria-labelledby="claimEight" data-parent="#accordion">
                <div class="card-body">
                  You have some obligations to fulfil. You must
                  <ul>
                      <li> state all and true information about Yourself, Your property and Your business when You submit a proposal.</li>
                      <li>make true and full disclosure in Your claim and documents supporting the claim.</li>
                      <li>give Us full cooperation for investigating the claim that You will make.</li>
                      <li>make a claim when You suffer loss, and follow the claim procedure.</li>
                      <li>ensure that unauthorised persons do not occupy Your premises and whenever Your premises is unoccupied, ensure that all security procedures are in force.</li>
                      <li>Inform to Us change in circumstances such as change in nature of business or process, premises or if any part of it no longer is solely occupied by You, premises remain unoccupied for more than 30 days or You change the use of the premises or building.</li>
                  </ul>
                  <b>Note:The above list is not exhaustive.</b>
                </div>
              </div>
            </div><!-- card-->
            
                      <div class="card">
              <div class="card-header" id="claimnine">
                <a href="#claimnines" class="collapsed" data-toggle="collapse" data-target="#claimnines" aria-expanded="false" aria-controls="claimnines">
                  <p class="mb-0">What is the effect of death of the insured on this policy?</p>
                </a>
              </div>
              <div id="claimnines" class="collapse" aria-labelledby="claimnine" data-parent="#accordion">
                <div class="card-body">
                  If you are an individual, the policy will continue for the benefit of Your legal representatives until the end of the period of the policy.
                  
                </div>
              </div>
            </div><!-- card-->
               
                      <div class="card">
              <div class="card-header" id="claimten">
                <a href="#claimtens" class="collapsed" data-toggle="collapse" data-target="#claimtens" aria-expanded="false" aria-controls="claimtens">
                  <p class="mb-0">What will happen if the value at risk for all insurable assets exceeds ₹ 5 Crore during the policy period?</p>
                </a>
              </div>
              <div id="claimtens" class="collapse" aria-labelledby="claimten" data-parent="#accordion">
                <div class="card-body">
                  If the value of Insurable Assets exceeds ₹ 5 Crore during the Policy Period, the cover under Bharat Sookshma Udyam Suraksha policy will continue until expiry of the policy. However, on renewal, Bharat Sookshma Udyam Suraksha policy has to be replaced with the applicable policy.
                  
                </div>
              </div>
            </div><!-- card-->
            
             <div class="card">
              <div class="card-header" id="claimeleven">
                <a href="#claimelevens" class="collapsed" data-toggle="collapse" data-target="#claimelevens" aria-expanded="false" aria-controls="claimelevens">
                  <p class="mb-0">Can I make changes to this policy during the policy tenure?</p>
                </a>
              </div>
              <div id="claimelevens" class="collapse" aria-labelledby="claimeleven" data-parent="#accordion">
                <div class="card-body">
                  You can choose to make changes to the covers of this Policy, for example, take additional cover, or increase or reduce any sum insured, you must make a proposal or request for any change. It will be effective only after we have accepted your proposal, and you have paid the additional premium where applicable.
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