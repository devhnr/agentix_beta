<?php
include("../connect.php");
include("../customer.php");
include("../bookconsultation.php");
echo '<script>alert("Just an alert for alerting to pay salary for employees")</script>';
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
              <span class="mai-mail fg-primary"></span> <a href="mailto:contact@mail.com">consult@raghnall.co.in</a>
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

                      <img src="../assets/images/banner/Bharat Laghu Udyam Suraksha Policy.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <!--<ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
            <!--<h1 class="text-center">Bharat Laghu Udyam Suraksha Policy</h1>-->
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
             
             <input type="hidden" name="route" value="laghu-udayam">
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
            <h2 class="title-section">What is <span class="marked">Bharat Laghu Udyam Suraksha</span> Policy?</h2>
            <div class="divider"></div>
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp This policy covers the property if total assets value ranges above 
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs 5 crore upto Rs 50 crore at policy commencement date.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp It covers loss due to unexpected events which result to physical &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;loss, damage or destruction of building and structures, plant and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;machinery, stock and other assets relating to your business.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Underinsurance is waived off upto 15 %</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Additions, alterations or extentions</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Temporary removal of stocks</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Start up expenses</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Cost of removal of debris</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Stocks on Floater basis</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Cover for specified contents*</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Professional Fees</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Costs compelled by Municipal regulations</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp All Small and Medium level enterprises like hotels, restaurants, offices &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and others are eligible for this policy.</li>

</ul>
</div>
        
          </div>
        
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/bl2.jpg" alt="" style="margin-top:100px">
            </div>
          </div>
        </div>
       <!--  <div style="margin-left:450px">
             <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
           <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>
           </div>-->
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
             

<!--<input type="hidden" name="created_at" value="<?php echo date("Y/m/d h:i:s");?>">-->
<input type="hidden" name="route" value="laghu-udayam">
             
            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
              <input type="submit" name="sub2" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">
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
              <img src="../assets/images/Who Needs Bharat Laghu Udyam Suraksha Policy.svg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
     
            <h2 class="title-section">Who Needs  <span class="marked"> Bharat Laghu Udyam Suraksha </span> Policy?</h2>
            <div class="divider"></div>
           
      <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Small Business owners</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Medium Business owners</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Large Business owners</li>

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
            <h2 class="title-section">Why do you need <span class="marked">Bharat Laghu Udyam Suraksha </span> Policy?</h2>
            <div class="divider"></div>
           Our business are prone to risks like fire eruption, therefore property insurance becomes all the more crucial to have as it provides a comprehensive protection against damages caused due to fire explosion and other risks. Besides fire related perils, the policy also covers damages caused due to natural calamity, bursting of water tanks, theft etc.
             
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/bl3.jpg" alt="">
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
         <a href="https://www.ilgi.co/136A68F18A?product_name=Bharat Laghu Udyam Suraksha Policy&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
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
                                <h3>What is covered in Bharat Laghu Udyam Suraksha  Policy?</h3>
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
                                                          <li>storm, cyclone, typhoon, tempest, hurricane, tornado, tsunami, flood and inundation</li>
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
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Bharat Laghu Udyam Suraksha</span> Policy</div>
        
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
          Who is required to take PL non industrial insurance policy?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
              
               Upon occurrence of an insured peril, these are the costs incurred by insured (on actual basis) at the time of reinstatement of property due to change in municipal regulations.
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What does impact damage of any kind means?</p>
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
                  <p class="mb-0">Whether partial selection of assets SME is allowed or not?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
             Partial selection of asset is not allowed. The policy allows cover for complete value of plant and machinery, stocks and FFF at the risk premise.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapsefour" class="collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                  <p class="mb-0">Whether jungle fire and forest fire are same?</p>
                </a>
              </div>
              <div id="collapsefour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
             Yes, both are same as per product wordings.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapsefive" class="collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                  <p class="mb-0">What is the basis of sum insured in Bharat Laghu Udyam Suraksha Policy?</p>
                </a>
              </div>
              <div id="collapsefive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
            For building, plant and machinery, furniture, fixture and fittings and any other contents:
              
                  <ul>
                      <li>Reinstatement Value</li>
                  </ul>
           
                                                        For Stocks:
              <div class="acc-ul">
                  <ul>
                      <li>For raw material: <b>Landed Cost</b> at your premises</li>
                      <li>For stock in process: <b>Input Cost</b> of the stock at the time of damage,</li>
                      <li>For finished stock: the <b>Manufacturing Cost</b> of the finished stock or the Contract price of goods sold but not delivered.</li>
                  </ul>
              </div>
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraSix">
                <a href="#collapsesix" class="collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                  <p class="mb-0">What is reinstatement value?</p>
                </a>
              </div>
              <div id="collapsesix" class="collapse" aria-labelledby="infraSix" data-parent="#accordion">
                <div class="card-body">
            It is new replacement value where the idea is to put the insured in the same position as he was just before happening of the incident/claim.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraseven">
                <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                  <p class="mb-0">Are valued policies allowed under Bharat Laghu Udyam Suraksha Policy?</p>
                </a>
              </div>
              <div id="collapseseven" class="collapse" aria-labelledby="infraseven" data-parent="#accordion">
                <div class="card-body">
            Bullion or unset precious stones, any curious or works of art are excluded from the policy. However, these items can be covered if you specifically declare such amount and it is recorded in policy schedule.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraeight">
                <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                  <p class="mb-0">Can plinth and foundation be excluded from value of building?</p>
                </a>
              </div>
              <div id="collapseeight" class="collapse" aria-labelledby="infraeight" data-parent="#accordion">
                <div class="card-body">
            No, it is including plinth and foundation.
                </div>
              </div>
            </div><!-- card-->
             
          </div><!-- accordion-->
        </div><!-- tab 1-->
      <div id="tab2" class="tab-pane fade">
        <div class="accordion">
          <div class="card">
            <div class="card-header" id="aboutOne">
              <a href="#collapsesixs"  class="collapsed" data-toggle="collapse" data-target="#collapsesixs" aria-expanded="false" aria-controls="collapsesixs">
                <p class="mb-0">Whether there will be an impact on policy wording due to increase in policy sum insured, once it falls in next sum insured slab i.e. policy sum insured changes from 0-5 Cr slab to 5-50 Cr slab?</p>
              </a>
            </div>
            <div id="collapsesixs" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
            During mid-term, there will be no impact on policy wording due to sum insured increase. However, at the time of renewal, applicable policy wording as per sum insured will be selected while policy issuance.
                   </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapsesevens" class="collapsed" data-toggle="collapse" data-target="#collapsesevens" aria-expanded="false" aria-controls="collapsesevens">
                <p class="mb-0">What is the provision of theft coverage in the policy?</p>
              </a>
            </div>
            <div id="collapsesevens" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
                  Losses / damage due to theft will be covered within 7 days from occurrence of an insured peril.
             
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutThree">
              <a href="#collapseeights" class="collapsed" data-toggle="collapse" data-target="#collapseeights" aria-expanded="false" aria-controls="collapseeights">
                <p class="mb-0">What are the options to increase sum insured limits for inbuilt covers?</p>
              </a>
            </div>
            <div id="collapseeights" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion">
              <div class="card-body">
              Presently, sum insured limits of inbuilt covers are fixed as per IRDA guidelines.</div>
            </div>
          </div>
           
           <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What is the insurance cover under Bharat Laghu Udyam Suraksha Policy?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
           Provides insurance cover for physical loss or damage to, or destruction of insured property against fire and allied Perils.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">What are the unexpected events that are covered under Bharat Laghu Udyam Suraksha Policy ?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
              <ol>
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
              </ol>
                </div>
              </div>
            </div><!-- card-->
            
             <div class="card">
              <div class="card-header" id="infraSix">
                <a href="#collapsesixse" class="collapsed" data-toggle="collapse" data-target="#collapsesixse" aria-expanded="false" aria-controls="collapsesixse">
                  <p class="mb-0">For which type of property can I take Bharat Laghu Udyam Suraksha policy?</p>
                </a>
              </div>
              <div id="collapsesixse" class="collapse" aria-labelledby="infraSix" data-parent="#accordion">
                <div class="card-body">
                    Bharat Laghu Udyam Suraksha Policy can be taken for all properties except individual dwellings and housing societies. assetsSME that can covered under the policy are building including plinth, basement and additional structures, plant & machinery , stocks – raw material, finished goods and stocks in process, other contents.
             
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraSevens">
                <a href="#collapsesevense" class="collapsed" data-toggle="collapse" data-target="#collapsesevense" aria-expanded="false" aria-controls="collapsesevense">
                  <p class="mb-0">Whether the Consequential Loss (Fire) Insurance will continue to be guided by erstwhile Consequential Loss (Fire) Tariff when issued – Bharat Laghu Udyam Suraksha Policy ?</p>
                </a>
              </div>
              <div id="collapsesevense" class="collapse" aria-labelledby="infraSevens" data-parent="#accordion">
                <div class="card-body">
                    No, Any consequential or indirect loss or damage of any description, i.e. losses or extra costs (financial or non-financial) that follow or are a consequence of an insured event, like, loss by delay, loss of income or wages or earnings, or of market, or of time, medical expenses, or any costs not covered by this policy.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraEights">
                <a href="#collapseeightse" class="collapsed" data-toggle="collapse" data-target="#collapseeightse" aria-expanded="false" aria-controls="collapseeightse">
                  <p class="mb-0">What is excluded in Bharat Laghu Udyam Suraksha Policy?</p>
                </a>
              </div>
              <div id="collapseeightse" class="collapse" aria-labelledby="infraEights" data-parent="#accordion">
                <div class="card-body">
                    <ol>
                                                                <li>We will deduct 5 % of each claim, subject to a minimum of ₹ 10,000 (Rupees Ten Thousand) for each and every loss suffered by you.</li>
                                                                <li>Deliberate, wilful or intentional act or omission</li>
                                                                <li>Insured building remaining continuously unoccupied for a period of more than 30 days unless</li>
                                                                <li>Storm, Cyclone, Typhoon, Tempest, Hurricane, Tornado, Tsunami, Flood and Inundation</li>
                                                                <li>Subsidence of the land on which Your Premises stand, Landslide, Rockslide</li>
                                                                <li>Bush fire, Forest fire, Jungle fire</li>
                                                                <li>Impact damage of any kind, i.e., damage caused by impact of, or collision caused by, any external physical object (e.g. vehicle, falling trees, aircraft, wall etc.)</li>
                                                                <li>Pollution or contamination</li>
                                                                <li>Ionizing radiation</li>
                                                                <li>Acts of terrorism</li>
                                                                <li>Missing/Mislaid Property</li>
                                                                <li>War, invasion, war like operation</li>
                                                                <li>Consequential or indirect loss or damage</li>
                                                                <li>Other exclusion as per ICICI Bharat Laghu Udyam Suraksha Policy wordings.</li>
                                                            </ol>
 </div>
              </div>
            </div><!-- card-->
        </div><!-- accordion-->
      </div><!-- tab2 -->

             <div id="tab3" class="tab-pane fade show ">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="claimOne">
                <a href="#claimones" class="collapsed" data-toggle="collapse" data-target="#claimones" aria-expanded="false" aria-controls="claimones">
                  <p class="mb-0">
              Does the Bharat Laghu Udyam Suraksha Policy cover the entire claim?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Yes. Excess amount of 10,000/- for each claim is deducted and remaining is paid.</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">Will any deductible/ excess be applicable to the policy?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                    Excess of 5 % of each claim, subject to a minimum of ₹ 10,000 (Rupees Ten Thousand) and for terrorism risk the Excess shall be as per the clause attached with a policy.
               
                </div>
              </div>
            </div><!-- card-->
                   <div class="card">
              <div class="card-header" id="claimThree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimThree">
                  <p class="mb-0">How do I make a claim?</p>
                </a>
              </div>
              <div id="claimthrees" class="collapse" aria-labelledby="claimThree" data-parent="#accordion">
                <div class="card-body">
                    If You suffer a loss that is covered by this policy, you must make a claim. The Insurance Company will verify the claim and accept it if it is according to the terms and conditions of this policy. When you suffer loss to any insured property because of an insured event, you must:
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp notify the Insurance Company immediately</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp report to police, fire authorities and other appropriate legal authorities</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp take all reasonable steps to prevent further damage to insured property</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp preserve and collect evidence, take and preserve photographs,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp assist us and our representatives in collecting evidence and details, give us all information, books of accounts, and other documents etc,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp submit claim form at the earliest opportunity but within 30 days from date you first notice the loss or damage.</li>

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
                What are provisions in the policy to exclude inbuilt perils (ex. STFI) to arrive at reduction in price?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                 There are no provision in the policy to exclude inbuilt perils.
                </div>
              </div>
            </div><!-- close card-->
             <div class="card">
              <div class="card-header" id="policyThree">
                <a href="#policythrees" class="collapsed" data-toggle="collapse" data-target="#policythrees" aria-expanded="false" aria-controls="policythrees">
                  <p class="mb-0">
               Does Bharat Laghu Udyam Suraksha Policy allow underinsurance waiver?
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
                  <p class="mb-0">What is the provision to increase/decrease the sum insured during the policy period?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                    At the request of the insured, sum insured under the policy can be increased / decreased subjected to payment of premium.
                    </div>
              </div>
            </div><!-- card-->
           <div class="card">
              <div class="card-header" id="policyFour">
                <a href="#policyfours" class="collapsed" data-toggle="collapse" data-target="#policyfours" aria-expanded="false" aria-controls="policyfours">
                  <p class="mb-0">Whether extension of short period policy is possible in the product?</p>
                </a>
              </div>
              <div id="policyfours" class="collapse" aria-labelledby="policyFour" data-parent="#accordion">
                <div class="card-body">
                    Extension of short period policy is not possible, however annual policy can be issued on completion of short period.
                    </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="policyFive">
                <a href="#policyfives" class="collapsed" data-toggle="collapse" data-target="#policyfives" aria-expanded="false" aria-controls="policyfives">
                  <p class="mb-0">What are the floater provision in the policies?</p>
                </a>
              </div>
              <div id="policyfives" class="collapse" aria-labelledby="policyFive" data-parent="#accordion">
                <div class="card-body">
                   Floater is an inbuilt cover in Bharat Sooksham Udyam Suraksha Policy but it is optional cover under Bharat Laghu Udyam Suraksha Policy.Floater is an inbuilt cover in Bharat Sooksham Udyam Suraksha Policy but it is optional cover under Bharat Laghu Udyam Suraksha Policy.
                    </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="policySix">
                <a href="#policysixs" class="collapsed" data-toggle="collapse" data-target="#policysixs" aria-expanded="false" aria-controls="policysixs">
                  <p class="mb-0">Whether there are any provision in the policy to exclude inbuilt perils to arrive at reduction in price?</p>
                </a>
              </div>
              <div id="policysixs" class="collapse" aria-labelledby="policySix" data-parent="#accordion">
                <div class="card-body">
                  No
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