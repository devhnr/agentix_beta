<?php
include("../connect.php");
include("../table_2.php");
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
    <div class="container mt-5">
      <div class="page-banner">
          <img src="../assets/images/banner/Group Health Insurance.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <!--<ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
           <!-- <h1 class="text-center">Group Health Insurance</h1>-->
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
             
             <input type="hidden" name="route" value="group-health-insurance">
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
              <input type="submit" name="sub10" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">
          </form>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-default pull-left" data-dismiss="modal" name="send"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
        </div>
      </div>
      
    </div>
  </div> 
</div>

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
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Name of Corporate</label>
              <input type="text" class="form-control" id="usrname" placeholder="Name of Corporate" name="name_corporate" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Pincode</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter pincode" name="pincode" required>
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Email" name="email" required>
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Mobile Number" name="mobile" required>
            </div>
           <input type="hidden" name="name1" value="null">

<input type="hidden" name="route" value="group-health-insurance">

            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
               <input type="submit" name="sub5" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">

          </form>
        </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
        </div>
      </div>
      
    </div>
  </div> 
</div>
   <!-- <div class="page-section">
      <div class="container">
         <div class="text-center">
          <h2 class="title-section">Why <span class="marked">Raghnall?</span></h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row">
          <div class="col-lg-12 py-3">
                
            <p class="mb-5" style="text-align: justify;">Employees are the backbone of an organization and the most valued asset. Group health insurance product is designed to offer health coverage to suit employees of all business types ranging from small & medium enterprises to large organizations. The group health insurance policy gives choice to employees to choose plans, sum insured range starting from 1 lac to 10 lacs.<p>
          
          </div>
       
        </div>-->
         <!--<div class="row mt-5 text-center">
          <div class="col-lg-4 py-3">
            <div class="display-3"><img src="../assets/grouphealth/Health assistance services.png"></div>
            <h5>Health assistance services</h5>
            <p>Health Assistance is a dedicated medical care service that assists you in all your health related queries for identifying specialist/hospital/fixing an appointment with doctors/nutritionist /facilitating 2nd opinion.</p>
          </div>
          <div class="col-lg-4 py-3">
            <div class="display-3"><img src="../assets/grouphealth/Wellness programs.png"></div>
            <h5>Wellness programs</h5>
            <p>Opt for multiple wellness plans structured and customized specially for your employees</p>
          </div>
          <div class="col-lg-4 py-3">
            <div class="display-3"><img src="../assets/grouphealth/Dedicated Servicing Portal.png"></div>
            <h5>Dedicated Servicing Portal</h5>
            <p>Dedicted Servicing Portal for quick support</p>
          </div>
        </div>
      </div> 
    </div> <!-- .page-section -->
    
      <div class="page-section">
         

      <div class="container">
        <div class="row">
             <div style="margin-left:1000px;margin-top:-40px;">
    <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
          <!-- <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>-->
           </div>
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/images/Group 14310.svg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
        
            <h2 class="title-section">What is <span class="marked">Group Health</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Group health insurance cover is offered to the employees of an organization, which can also be extended to cover their family. The policy covers indemnification of medical expenses incurred by the insured during hospitalization & any illness or injury suffered in India. Pre & Post hospitalization medical expenses can be covered upto 30 days and 60 days and covers age from 91 days to 80 years. </p>
           
          <!--   <div class="img-place mb-3">
              <img src="../assets/img/testi_image.png" alt="">
            </div> -->
           
          </div>
        </div>
        <!--   <div style="margin-left:450px">-->
        <!--<button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>-->
        <!--    <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>-->
        <!--    </div>-->
      </div> <!-- .container -->
    </div> <!-- .page-section -->

 

 
   <div class="page-section  client-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
             <h2 class="title-section"> Why <span class="marked">Group Health </span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">The need of health insurance is more than ever before due to the following reasons:</p>
             <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Sky rocketing medical expenses </li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Need for routine medical check-up and care</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Expensive trips to specialist doctors</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Possibility of hospitalization and treatment</li>
</ul>
</div>
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/Artboard – 5.jpg" alt="">
            </div>
          </div>
        </div>
        
      </div> <!-- .container -->
    </div> <!-- .page-section -->
      <div class="page-section">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/img/jj-removebg-preview.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <h2 class="title-section">What is covered in <span class="marked">Group Health</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Group health insurance indemnifies your health care needs according to the coverages opted. We cover the below:</p>
           <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Pre & post hospitalization</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Pre-existing disease</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Maternity expenses</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Baby day one</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Pre post natal expense</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp In-patient department expenses</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Ambulance charges</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Day care expenses etc.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Coverages can also be customized as per the client's needs</li>
</ul>
</div>
          <!--   <div class="img-place mb-3">
              <img src="../assets/img/testi_image.png" alt="">
            </div> -->
           <!--  <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline border ml-2">Success Stories</a> -->
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section  client-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Advantages</div>
          <h2 class="title-section"><span class="marked">Group Health </span> Insurance</h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row mt-5 text-center">
          <div class="col-lg-6 py-3 wow fadeInRight">
              <br>
            <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp The policy covers benefits for the employee and their family</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp No physical health checkup</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Covers people regardless of their age</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Customized health care</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Boosts employee morale</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Affordable than buying an individual health insurance policy</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Family is covered in the given sum insured</li>
</ul>
</div>
</div>
  <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/img/health-insurance.png" alt="">
            </div>
          </div> 
       
      </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
<div class="page-section ">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
             <h2 class="title-section"><span class="marked">Claim</span> Settlement</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Health claim processing is automated and simplified by using AI/ML algorithms</p>
             <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insured requires hospitalization </li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Admitted in network hospital</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Hospital submits Pre-Auth through web portal</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp System auto adjudicates & gives instant approval</li>
</ul>
</div>
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/images/Group 14348.svg" alt="">
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
         <a href="https://www.ilgi.co/D0A40492A0?product_name=group health insurance&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
        </div>
      </div>
    </div>
  </div>
</div>

            </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->



 <div class="page-section  client-section">
  <div class="container">
     <div class="text-center">
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Group Health</span> Policy</div>
        
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
               Is Covid 19 covered under  Group Health Insurance policy?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
               Covid 19 is covered subject to minimum 24 hr of in-patient.
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">When should I get a group health insurance policy for my employees?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
              Employer can initiate a request for quotation of the Group Health Insurance policy for their employees at any point of time. The employer has to specify the coverage requirement and a quote shall be given to them.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">Our workplace has only 10 to 15 members. Can I still buy a Group Health Insurance policy for them?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
              Minimum requirement for an employer to opt for Group Health Insurance is 10 employees or 25 total lives, below which we cannot provide Group health insurance.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">Who all can be covered in a Group Health Insurance policy?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Group health insurance is categorized in 2 categories</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Employer-employee - Employees along with their spouse, children and parents are covered</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Non employer-employee – The enrolled are covered</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">Can I have a corporate health insurance and an individual health insurance policy both at same time?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
               Yes, you can you have corporate health insurance and individual health insurance at the same time.
                </div>
              </div>
            </div><!-- card-->
              <div class="card">
              <div class="card-header" id="infras">
                <a href="#collapsey" class="collapsed" data-toggle="collapse" data-target="#collapsey" aria-expanded="false" aria-controls="collapsey">
                  <p class="mb-0">What are the limitations of a Group Health Insurance?</p>
                </a>
              </div>
              <div id="collapsey" class="collapse" aria-labelledby="infras" data-parent="#accordion">
                <div class="card-body">
              Group Health Insurance policy is customized and tailor made and the policies are designed as per the client’s requirements. Therefore there are no limitations.  </div>
              </div>
            </div><!-- card-->
            
                    <div class="card">
              <div class="card-header" id="infrasone">
                <a href="#collapseyone" class="collapsed" data-toggle="collapse" data-target="#collapseyone" aria-expanded="false" aria-controls="collapseyone">
                  <p class="mb-0">How is a Group Health Insurance different from an Individual Health Insurance?</p>
                </a>
              </div>
              <div id="collapseyone" class="collapse" aria-labelledby="infrasone" data-parent="#accordion">
                <div class="card-body">
             Group Health Insurance is a collective insurance an organization buys for the beneﬁt of its employees and employee’s dependents. The organization may tailor a plan or select a pre-planned insurance policy from an insurance company.
Individual health insurance is one that an individual purchases for himself or their dependents. </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infrastwo">
                <a href="#collapseytwo" class="collapsed" data-toggle="collapse" data-target="#collapseytwo" aria-expanded="false" aria-controls="collapseytwo">
                  <p class="mb-0">What employers should look for when buying a Group Health Insurance policy in India?</p>
                </a>
              </div>
              <div id="collapseytwo" class="collapse" aria-labelledby="infrastwo" data-parent="#accordion">
                <div class="card-body">
             While buying the Group Health Insurance, the employer should take in consideration the coverage provided by the insurance company, the services offered and the company's claims process, this will make insurance policy buying more feasible and convenient.</div>
              </div>
            </div><!-- card-->
            
             <div class="card">
              <div class="card-header" id="infrasthree">
                <a href="#collapseythree" class="collapsed" data-toggle="collapse" data-target="#collapseythree" aria-expanded="false" aria-controls="collapseythree">
                  <p class="mb-0">Why should you take Group Health Insurance for your employees?</p>
                </a>
              </div>
              <div id="collapseythree" class="collapse" aria-labelledby="infrasthree" data-parent="#accordion">
                <div class="card-body">
            While buying Group Health Insurance, employer should see the coverages provided by insurance company, services offered and the company's claims process, this will make insurance policy buying more feasible and convenient.</div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infrasfour">
                <a href="#collapseyfour" class="collapsed" data-toggle="collapse" data-target="#collapseyfour" aria-expanded="false" aria-controls="collapseyfour">
                  <p class="mb-0">Will I have to pay penalty if I don’t provide health insurance to my employees?</p>
                </a>
              </div>
              <div id="collapseyfour" class="collapse" aria-labelledby="infrasfour" data-parent="#accordion">
                <div class="card-body">
            There is no penalty.
</div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infrasfive">
                <a href="#collapseyfive" class="collapsed" data-toggle="collapse" data-target="#collapseyfive" aria-expanded="false" aria-controls="collapseyfive">
                  <p class="mb-0">Can the policy be transferred from one insurance provider to another provider without losing the benefits?</p>
                </a>
              </div>
              <div id="collapseyfive" class="collapse" aria-labelledby="infrasfive" data-parent="#accordion">
                <div class="card-body">
            

Yes, at the time of renewal of the policy for next tenure.</div>
              </div>
            </div><!-- card-->
          </div><!-- accordion-->
        </div><!-- tab 1-->
      <div id="tab2" class="tab-pane fade">
        <div class="accordion">
          <div class="card">
            <div class="card-header" id="aboutOne">
              <a href="#collapsesix" class="collapsed"  data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                <p class="mb-0">What is the initial waiting period for Group Health Insurance?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
            30 Days
                
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">What is a waiting period?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
                  Expenses related to the treatment of any illness within 30 days from the first policy commencement date shall be excluded except claims arising due to an accident, provided the same are covered
              
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutThree">
              <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                <p class="mb-0">What’s not covered in Group Health Insurance?</p>
              </a>
            </div>
            <div id="collapseeight" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion">
              <div class="card-body">
                  Treatment on trial/experimental basis and any device/instrument/machine contributing/replacing the function of an organ; Holter Monitoring are outside the scope of the policy.
Please refer the Policy Wordings for detailed list of exclusions
          
              </div>
            </div>
          </div>
<!--            <div class="card">-->
<!--            <div class="card-header" id="aboutFour">-->
<!--              <a href="#collapsenine"   data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="aboutFour">-->
<!--                <p class="mb-0">What is occupational disease cover?</p>-->
<!--              </a>-->
<!--            </div>-->
<!--            <div id="collapsenine" class="collapse" aria-labelledby="aboutFour" data-parent="#accordion">-->
<!--              <div class="card-body">-->
<!--           Occupational Diseases covers those diseases that are specified under Schedule III of Workmen or Employee Compensation Act-->
<!--It covers those disease which arise due to nature of occupation-->
<!--Ex. disease caused by use of toxic compounds-->
               
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
            <div class="card">
            <div class="card-header" id="aboutFive">
              <a href="#collapseten"  class="collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="aboutFive">
                <p class="mb-0">What is a pre-existing disease? Are pre-existing diseases covered in a standard health insurance?</p>
              </a>
            </div>
            <div id="collapseten" class="collapse" aria-labelledby="aboutFive" data-parent="#accordion">
              <div class="card-body">
          Pre-existing disease is covered under the Group Health Insurance.. The term ‘Pre-existing Disease’ means any condition, ailment or injury or illness or related condition (s) for which the insured had developed signs or symptoms, and/or were diagnosed and/or received medical advice/treatment, within 48 months prior to the first Policy with the company.
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutSix">
              <a href="#collapseeleven"  class="collapsed" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="aboutSix">
                <p class="mb-0">What is “health check-up” facility?</p>
              </a>
            </div>
            <div id="collapseeleven" class="collapse" aria-labelledby="aboutSix" data-parent="#accordion">
              <div class="card-body">
         Health check-up facility is provided from the vast network hospitals across multiple locations in India.
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutseven">
              <a href="#collapsetwel" class="collapsed"  data-toggle="collapse" data-target="#collapsetwel" aria-expanded="false" aria-controls="aboutseven">
                <p class="mb-0">What is Maternity Benefit coverage under the Group Health Insurance?</p>
              </a>
            </div>
            <div id="collapsetwel" class="collapse" aria-labelledby="aboutseven" data-parent="#accordion">
              <div class="card-body">
        Maternity Benefit covers the pre and post-natal expenses. It covers for the pre (30 days) and post (60 days) hospitalization and delivery expense. The monetary limit is customized depending on the requirement of the employer.     
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="abouteight">
              <a href="#collapsethir"  class="collapsed" data-toggle="collapse" data-target="#collapsethir" aria-expanded="false" aria-controls="abouteight">
                <p class="mb-0">Is abortion covered under the Group Health policy?</p>
              </a>
            </div>
            <div id="collapsethir" class="collapse" aria-labelledby="abouteight" data-parent="#accordion">
              <div class="card-body">
        Abortion is covered, subject to prescription from doctor & under a critical condition during pregnancy. Voluntary abortion is not covered under the policy.
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutnine">
              <a href="#collapsefourty"  class="collapsed"  data-toggle="collapse" data-target="#collapsefourty" aria-expanded="false" aria-controls="aboutnine">
                <p class="mb-0">Does the policy provide coverage to a new born baby under maternity coverage?</p>
              </a>
            </div>
            <div id="collapsefourty" class="collapse" aria-labelledby="aboutnine" data-parent="#accordion">
              <div class="card-body">
       New born baby can be covered under the policy if the addon cover is opted for. This addon cover includes hospitalization expense of new born baby from day 1 upto full sum insured or maternity limit
              </div>
            </div>
          </div>
                      <div class="card">
            <div class="card-header" id="aboutten">
              <a href="#collapsetens"   class="collapsed" data-toggle="collapse" data-target="#collapsetens" aria-expanded="false" aria-controls="aboutten">
                <p class="mb-0">Is congenital disease covered under the Group Health Insurance?</p>
              </a>
            </div>
            <div id="collapsetens" class="collapse" aria-labelledby="aboutten" data-parent="#accordion">
              <div class="card-body">
      Internal congenital is covered under the policy. External congenital is covered only in life threatening situation subject to minimum of 24 hours of hospitalization.
              </div>
            </div>
          </div>
          
          <div class="card">
            <div class="card-header" id="abouteleven">
              <a href="#collapseelvens"  class="collapsed"  data-toggle="collapse" data-target="#collapseelvens" aria-expanded="false" aria-controls="abouteleven">
                <p class="mb-0">Is treatment through AYUSH medicine covered under the policy?</p>
              </a>
            </div>
            <div id="collapseelvens" class="collapse" aria-labelledby="abouteleven" data-parent="#accordion">
              <div class="card-body">
     Yes, subject to minimum 24 hours of hospitalization on in-patient (IPD) basis and is covered only in government recognized AYUSH hospital.
              </div>
            </div>
          </div>
          
             
          <div class="card">
            <div class="card-header" id="abouttwelve">
              <a href="#collapsetwelve"  class="collapsed" data-toggle="collapse" data-target="#collapsetwelve" aria-expanded="false" aria-controls="abouttwelve">
                <p class="mb-0">Do I have to undergo medical tests to avail this health cover?</p>
              </a>
            </div>
            <div id="collapsetwelve" class="collapse" aria-labelledby="abouttwelve" data-parent="#accordion">
              <div class="card-body">
     Medical tests are not required to avail Group Health Insurance.  </div>
            </div>
          </div>
          
            <div class="card">
            <div class="card-header" id="aboutthirteen">
              <a href="#collapsethirteen"  class="collapsed" data-toggle="collapse" data-target="#collapsethirteen" aria-expanded="false" aria-controls="aboutthirteen">
                <p class="mb-0">Is there any age limit?</p>
              </a>
            </div>
            <div id="collapsethirteen" class="collapse" aria-labelledby="aboutthirteen" data-parent="#accordion">
              <div class="card-body">
     Employee and spouse are covered upto age of 65 years, Children are covered upto 25 years of age and parents upto age limit of 80 years. Employee and spouse should be minimum 18 yrs.</div>
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
                 What is a cashless facility? Is it available at all hospitals across India?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
                    On admission to the hospital the insured can avail the cashless facility, where the cost of treatment is paid by the insurance company directly to the network hospital.
The treatment undergone is in accordance with the policy terms and conditions.

             
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What happens to the policy coverage after a claim is filed?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                    Policy coverage will be extended up to expiry date of the policy subjected to availability of sum insured.
              
                </div>
              </div>
            </div><!-- card-->
            
             <div class="card">
              <div class="card-header" id="claimthree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimthree">
                  <p class="mb-0">What is the maximum number of claims allowed over a year?</p>
                </a>
              </div>
              <div id="claimthrees" class="collapse" aria-labelledby="claimthree" data-parent="#accordion">
                <div class="card-body">
                   There is no limit on number of claim admissibility
                </div>
              </div>
            </div><!-- card-->
           
            <div class="card">
              <div class="card-header" id="claimfour">
                <a href="#claimfours" class="collapsed" data-toggle="collapse" data-target="#claimfours" aria-expanded="false" aria-controls="claimfour">
                  <p class="mb-0">How to avail cashless treatment?</p>
                </a>
              </div>
              <div id="claimfours" class="collapse" aria-labelledby="claimfour" data-parent="#accordion">
                <div class="card-body">
                    Cashless Process to be followed:
                    <div class="list">
                        
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insured to get admitted in network hospital</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Hospital to send Cashless Request to the insurer's Claims teams</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Process is done at insurer's Health Claims teams</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Decision to Approve/Query/Reject is taken</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insured to pay non-payables & get discharge</li>

</ul>
</div>
              
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="claimfive">
                <a href="#claimfives" class="collapsed" data-toggle="collapse" data-target="#claimfives" aria-expanded="false" aria-controls="claimfive">
                  <p class="mb-0">What to do if I am admitted to non-network hospitals?</p>
                </a>
              </div>
              <div id="claimfives" class="collapse" aria-labelledby="claimfive" data-parent="#accordion">
                <div class="card-body">
                   Claim will be paid on reimbursement basis
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="claimsix">
                <a href="#claimsixx" class="collapsed" data-toggle="collapse" data-target="#claimsixx" aria-expanded="false" aria-controls="claimsix">
                  <p class="mb-0">What are the documents required for claiming?</p>
                </a>
              </div>
              <div id="claimsixx" class="collapse" aria-labelledby="claimsix" data-parent="#accordion">
                <div class="card-body">
                Original bills for hospitalization, diagnostic, pharmacy, room rent and all the bills related to hospitalization duly signed by the employee and the hospital authority, any other document as specified by the Insurance Company
                </div>
              </div>
            </div><!-- card-->
           
          </div><!-- accordion-->
        </div><!-- tab 3-->

          <div id="tab4" class="tab-pane fade show ">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="policyOne">
                <a href="#policyones" class="collapsed"  data-toggle="collapse" data-target="#policyones" aria-expanded="false" aria-controls="policyones">
                  <p class="mb-0">
                 How is the premium for Group Health Insurance policy calculated?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                    Premium is calculated based on employee’s demography, claim experience of past 2-3 years and coverage provided to the client
                    </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">What are the advantages of Group Health Insurance?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                    Pre-existing disease (PED) is covered under Group Health Insurance, as compared to a waiting period which is applicable in individual health policies. Other coverages can be customized as per client requirement.
                
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="policyThree">
                <a href="#policythree" class="collapsed" data-toggle="collapse" data-target="#policythree" aria-expanded="false" aria-controls="policyThree">
                  <p class="mb-0">Are the dependents covered under the Group Health Insurance?</p>
                </a>
              </div>
              <div id="policythree" class="collapse" aria-labelledby="policyThree" data-parent="#accordion">
                <div class="card-body">
                    The employees can avail the benefit of the coverage for his/her dependants under the Group Health Insurance. Dependants include spouse, children up to 25 years of age and parents up to 80 years of age.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="policyFour">
                <a href="#policyfours" class="collapsed" data-toggle="collapse" data-target="#policyfours" aria-expanded="false" aria-controls="policyFour">
                  <p class="mb-0">Is policy valid Pan India?</p>
                </a>
              </div>
              <div id="policyfours" class="collapse" aria-labelledby="policyFour" data-parent="#accordion">
                <div class="card-body">
                  The coverage of the policy is valid in India and employees, dependents can avail the facility of network hospitals.
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