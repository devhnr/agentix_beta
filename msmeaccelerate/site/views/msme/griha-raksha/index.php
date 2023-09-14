<?php
include("../connect.php");
include("../table_2.php");
include("../bookconsultation.php");

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
              <span class="mai-call fg-primary"></span> <a href="tel:+0011223495">+91-7045161616</a>
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
           <img src="../assets/images/banner/Bharat Griha Raksha Policy.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <!--<ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
           <!-- <h1 class="text-center">Bharat Griha Raksha Policy</h1>-->
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
             
             <input type="hidden" name="route" value="griha-raksha">
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
            <h2 class="title-section">What is <span class="marked">Bharat Griha Raksha</span> Policy?</h2>
            <div class="divider"></div>
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp It covers your building and home against loss, damage and destruction</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true" style="text-align:justify;"></i> &nbsp; Griha Raksha Policy also covers contents, articles or things which  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;belong to your home.Contents like television, refrigerator, furniture and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;other household articles are covered</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp; Optional covers which are available include – cover for valuable &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;contents and personal accident cover for insured and spouse</li>

</ul>
</div>
        
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/BG1.jpg" alt="">
            </div>
          </div>
           <!-- <div style="margin-left:450px">
             <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
            <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>
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
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>  Name of Housing Society</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter  Name of Housing Society" name="name_corporate" required>
            </div>
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
             
         
<input type="hidden" name="route" value="griha-raksha">

             
            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
              <!--<button type="BUTTON" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off" onclick="myFunction()"></span> Submit</button>-->
              <input type="submit" name="sub5" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')"></button>
          </form>
        </div>
         <div class="modal-footer">
          <button type="button"  class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
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
              <img src="../assets/img/BharatGrihaRaksha_head.svg" alt="" >
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
     <br>
            <h2 class="title-section">Who Needs  <span class="marked"> Bharat Griha Raksha </span> Policy?</h2>
            <div class="divider"></div>
           
      <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Housing Societies</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Property owners</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Renters</li>

</ul>
</div>
         <!--<button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>-->
         <!--   <a href="https://www.ilgi.co/136A68F18A?product_name=Bharat Griha Raksha Policy&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-outline border ml-2" target="blank">Buy Now</a>-->
          </div>
        </div>
          
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
   <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
            <h2 class="title-section">Why do you need <span class="marked">Bharat Griha Raksha </span> Policy?</h2>
            <div class="divider"></div>
            It covers your society, home against any loss, damage and destruction. The coverage also includes home contents and articles which belong to your home. Optional covers include cover for valuables, contents and personal accident cover for insured and spouse.
             
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/images/Why do you need Bharat Griha Raksha Policy.svg" alt="">
            </div>
          </div>
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
         <a href="https://www.ilgi.co/136A68F18A?product_name=Bharat Griha Raksha Policy&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
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
                                <h3>What is covered in Bharat Griha Raksha  Policy?</h3>
                                <p>Below are the detailed inclusions and exclusions of our Bharat Griha Raksha  Policy</p>
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
                                                        <li>Fire</li>
                                                        <li>Lightning</li>
                                                          <li>Storm, cyclone, typhoon, tempest, hurricane, tornado, tsunami, flood and inundation</li>
                                                            <li>Forest fire, bush fire, jungle fire</li>
                                                              <li>Missile testing operations</li>
                                                                <li>Acts of terrorism</li>
                                                                <li>Bursting or overflowing of water tanks, apparatus and pipes</li>
                                                                <li>Theft within 7 days from the occurrence of and proximately caused by any of the above insured events</li>
                                                                <li>Explosion or Implosion</li>
                                                                <li>Earthquake</li>
                                                                <li>Subsidence of the land on which your home building stands, landslide, rockslide</li>
                                                                <li>Impact damage of any kind, i.e. damage caused by impact of, or collision caused by, any external physical object (e.g. vehicle, falling trees, aircraft, wall etc.)</li>
                                                                <li>Riot, strike, malicious damages</li>
                                                                <li>Leakage from automatic sprinkler installations.</li>
                                                       
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
                                                       <li>War, invasion, war-like operations.</li>
                                                      
                                                       <li>Ionising radiation or contamination by radioactivity.</li>
                                                       <li>Pollution or contamination.</li>
                                                       <li>Loss of earning, loss by delay, consequential loss</li>
                                                       <li>Deliberate, wilful or intentional act or omission</li>
                                                       <li>Loss, destruction or damage to insured property by undergoing any heating, drying process or centrifugal Forces</li>
                                                       <li>Short circuiting, arcing, self- heating or leakage of electricity from whatever cause (lightning included)</li>
                                                       <li>Reduction in market value</li>
                                                       <li>Costs, fees, expenses for preparing any claim</li>
                                                      
                                                      
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
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Bharat Griha Raksha</span> Policy</div>
        
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
          How Building Sum insured is being calculated in Bharat Griha Raksha Policy product?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
              
              Building sum insured is calculated by considering Carpet area and Cost of Construction.
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">Whether all the Individuals in the family can be covered under Personal Accident cover? Is there any sum insured capping?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
           There is no sum insured capping for  Bharat Griha Raksha Policy.</div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">Whether Housing Society/Dwelling in the name corporate is a part of Bharat Griha Raksha Policy?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
              Yes. Housing Society is a Part of Bharat Griha Raksha Policy
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What rating should be given in case of Dwelling and Shop in the same premise?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
              Per se rating can be done in case of Dwelling and Shop in the same premise.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">I live in a rented home. Can I avail Household articles Insurance for my home?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
             Yes you can avail for household articles.
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
                <p class="mb-0">What is the provision of Underinsurance waiver in this product?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
            There is no underinsurance applicable for Bharat Griha Raksha Policy.
                        </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">What is the SI limit for Loss of Rent and Rent for alternate accommodation and any capping on Indemnity period?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
                  As per IRDA Guidelines, Insured has to select the number of months and sum insured limits if the corresponding cover has been opted for.
              
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutThree">
              <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                <p class="mb-0">How do I become eligible to buy the cover?</p>
              </a>
            </div>
            <div id="collapseeight" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion">
              <div class="card-body">
               
               <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp You can buy cover for the building if you are its owner, authorised occupier, landlord, or tenant.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp You can buy the cover if your home building is used for residence</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp If you carry on commercial activity by employing other persons, you cannot buy this policy but have to buy the appropriate policy.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp You can buy cover for any item of article or thing if you are its owner, purchaser, or responsible for it.</li>

</ul>
</div>
                   </div>
            </div>
          </div>
           
           <div class="card">
              <div class="card-header" id="infraten">
                <a href="#collapseten" class="collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                  <p class="mb-0">How much do I pay for this cover?</p>
                </a>
              </div>
              <div id="collapseten" class="collapse" aria-labelledby="infraten" data-parent="#accordion">
                <div class="card-body">
                    The premium for the Insurance depends on:
                     <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp The nature of insured property, viz. building, plant & machinery, stock etc.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp The sum insured opted</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp The nature of the insured business and activity being carried</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Claims experience past 3 years.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Various factors that define the risk profile of the enterprise.</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infranine">
                <a href="#collapsenine" class="collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                  <p class="mb-0">What are the optional cover available under this policy?</p>
                </a>
              </div>
              <div id="collapsenine" class="collapse" aria-labelledby="infranine" data-parent="#accordion">
                <div class="card-body">
              <ul>
                  <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Cover for valuable contents on agreed value basis</li>
                  <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Personal accident cover</li>
                  <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp The above covers are available at the payment of additional premium</li>
              </ul>
                </div>
              </div>
            </div><!-- card-->
            
            <div class="card">
              <div class="card-header" id="infratwelve">
                <a href="#collapsetwelve" class="collapsed" data-toggle="collapse" data-target="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve">
                  <p class="mb-0">What are the important exclusions under this policy?</p>
                </a>
              </div>
              <div id="collapsetwelve" class="collapse" aria-labelledby="infratwelve" data-parent="#accordion">
                <div class="card-body">
              <ul>
                  <li>Your deliberate, wilful or intentional act,</li>
                  <li>War, invasion, war-like operations,</li>
                  <li>Ionising radiation,</li>
                  <li>Property is missing or has been mislaid,</li>
                  <li>Consequential or indirect loss or damage,</li>
                  <li>Loss and damage to bullion or unset precious stones, manuscripts, vehicles and explosive substances,</li>
                  <li>Addition, extension, or alteration to your building more than 10% of its carpet area,</li>
                  <li>Costs, fees or expenses for preparing any claim.</li>
              </ul>
              <b>(*Please refer to policy document for entire list of exclusions)</b>
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infra13">
                <a href="#collapse13" class="collapsed" data-toggle="collapse" data-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                  <p class="mb-0">Can I opt for cover for Building or Contents section alone?</p>
                </a>
              </div>
              <div id="collapse13" class="collapse" aria-labelledby="infra13" data-parent="#accordion">
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
                How do I make a claim?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
                    If you suffer a loss that is covered by this policy, you must make a claim. The Insurance Company will verify the claim and accept it if it is according to the terms and conditions of this policy. When you suffer loss to any Insured property because of an insured event, you must:
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Notify the Insurance Company immediately</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp In case the insured declares the content sum insured, declared value of the content will be considered.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Report to police, fire authorities and other appropriate legal authorities</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Take all reasonable steps to prevent further damage to insured property</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Preserve and collect evidence, take and preserve photographs,</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Assist us and our representatives in collecting evidence and details, give us all information, books of accounts, and other documents etc,</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Submit claim form at the earliest opportunity but within 30 days from date you first notice the loss or damage.,</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">Who will collect amounts in the unfortunate event of my date?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                    In the event of the unfortunate death of the Insured during the policy period, the home building cover and the home contents cover that you have purchased will continue for the benefit of your legal representative/s during the policy period subject to all the terms and conditions of this policy.
               
                </div>
              </div>
            </div><!-- card-->
                   <div class="card">
              <div class="card-header" id="claimThree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimThree">
                  <p class="mb-0">What are documents required to raise a claim?</p>
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
            <div class="card">
              <div class="card-header" id="claim4">
                <a href="#claim4s" class="collapsed" data-toggle="collapse" data-target="#claim4s" aria-expanded="false" aria-controls="claim4">
                  <p class="mb-0">How do you register a claim?</p>
                </a>
              </div>
              <div id="claim4s" class="collapse" aria-labelledby="claim4" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li>Contact your Relationship Manager
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
                Whether Content and Building sum insured bifurcation is required at the time of Policy issuance?

                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                There is an automatic Cover for Home contents up to 20% of Home building sum insured subject to maximum 10 lakhs. However, if customer wants to cover more than 20% he has to specify sum insured of the building and the contents separately.

             
                </div>
              </div>
            </div><!-- close card-->
             <div class="card">
              <div class="card-header" id="policyThree">
                <a href="#policythrees" class="collapsed"  data-toggle="collapse" data-target="#policythrees" aria-expanded="false" aria-controls="policythrees">
                  <p class="mb-0">
                What Does Auto escalation of 10% of sum insured every year mean?
                  </p>
                </a>
              </div>
              <div id="policythrees" class="collapse" aria-labelledby="policyThree" data-parent="#accordion">
                <div class="card-body">
                Escalation of 10% will be applicable on base sum insured every Year.<br>
Example: Initial SI = 10,000,000<br>
2nd Year SI = 10% of base SI 10,000,000+10,00,000 = 11,000,000

             
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">Whether there is any Sum insured capping for  Bharat Griha Raksha Policy?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
               There is no sum insured capping for Bharat Griha Raksha Policy.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="policy3">
                <a href="#policy3s" class="collapsed" data-toggle="collapse" data-target="#policy3s" aria-expanded="false" aria-controls="policy3s">
                  <p class="mb-0">Whether Auto Escalation is valid for Annual Policy?</p>
                </a>
              </div>
              <div id="policy3s" class="collapse" aria-labelledby="policy3" data-parent="#accordion">
                <div class="card-body">
               There is no sum insured capping for Bharat Griha Raksha Policy.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="policy4">
                <a href="#policy4s" class="collapsed" data-toggle="collapse" data-target="#policy4s" aria-expanded="false" aria-controls="policy4s">
                  <p class="mb-0">Whether policy is on First loss basis?</p>
                </a>
              </div>
              <div id="policy4s" class="collapse" aria-labelledby="policy4" data-parent="#accordion">
                <div class="card-body">
               Policy is not on first loss basis, there are 2 scenarios-<br>
<i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbspIn case, the insured do not declare content sum insured, 20% of building sum insured will be considered as content sum insured.<br>
<i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbspIn case the insured declares the content sum insured, declared value of the content will be considered.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="policy5">
                <a href="#policy5s" class="collapsed" data-toggle="collapse" data-target="#policy5s" aria-expanded="false" aria-controls="policy5s">
                  <p class="mb-0">Are valuable contents covered under the policy?</p>
                </a>
              </div>
              <div id="policy5s" class="collapse" aria-labelledby="policy5" data-parent="#accordion">
                <div class="card-body">
               Yes, it is available on payment of additional premium.                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="policy6">
                <a href="#policy6s" class="collapsed" data-toggle="collapse" data-target="#policy6s" aria-expanded="false" aria-controls="policy6s">
                  <p class="mb-0">What are the terms for Policy Cancellation?</p>
                </a>
              </div>
              <div id="policy6s" class="collapse" aria-labelledby="policy6" data-parent="#accordion">
                <div class="card-body">
               Policy is not on first loss basis, There are 2 scenarios-<br>
               
<i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp You can cancel this Policy at any time by giving us notice in writing. The policy will terminate when we receive your notice and premium will be &nbsp;&nbsp;&nbsp; refunded.<br>
<i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp We will not cancel the policy during the policy period except on the grounds of mis-representation, non-disclosure of material facts, fraud or non-co-operation on your part.<br>
(Please refer to policy document for more wording)                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="policy7">
                <a href="#policy7s" class="collapsed" data-toggle="collapse" data-target="#policy7s" aria-expanded="false" aria-controls="policy7s">
                  <p class="mb-0">I bought a new Washing Machine. What do I need to do to include it in the Policy?</p>
                </a>
              </div>
              <div id="policy7s" class="collapse" aria-labelledby="policy7" data-parent="#accordion">
                <div class="card-body">
              Yes you can opt for contents cover under Bharat Griha Raksha Policy                </div>
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