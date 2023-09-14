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
          <img src="../assets/images/banner/Professional Indemnity for Chartered Accountants 1.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              
            </nav>
            <h1 class="text-center">Professional Indemnity Insurance for Medical Practitioners</h1>
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
             
             <input type="hidden" name="route" value="profeesional-mp">
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
          <div style="margin-left:1000px;margin-top:-40px;">
    <button  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get&nbsp;Quote</button>
          <!-- <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>-->
           </div>
         <div class="text-center">
          <h2 >What is <span class="title-section marked ">Professional Indemnity Insurance</span> for Doctor's?</h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row">
          <div class="col-lg-12 py-3">
                
            <p class="mb-5" style="text-align: justify;">Professional Indemnity insurance from Raghnall is designed to help you legally and financially if you ever make a professional mistake with your patients. It also helps to protect you against claims that are not your fault and will cover the below mentioned expenses /allegations. Cover Your Legal fees and court awarded damages or settlement compensation to be paid against claims arising out of:</p>
          <!--   <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline ml-2">See pricing</a> -->
          </div>
          
          <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Medical malpractice allegations / legal suits (Errors & Omissions in practice) </li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Breach of confidentiality allegations</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Loss of third party documents (cost of reinstatement of documents)</li>
</ul>
</div>
<!--<div class="col-lg-6 py-3">-->
<!--            <div class="img-place text-center">-->
<!--              <img src="../assets/img/p1.jpg" alt="">-->
<!--            </div>-->
<!--        </div>-->
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  

      <div class="page-section client-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/img/pm1.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
        
            <h2 class="title-section">Who <span class="marked">Needs</span> It?</h2>
            <div class="divider"></div>
           <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp If you are a medical graduate working as a resident doctor</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp If you are a practising medical professional</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp If you are a specialist in your specialised field, you need it more.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Whether you are working with a Hospital or have one of your own practice.</li>
</ul>
</div>
          <!--   <div class="img-place mb-3">
              <img src="../assets/img/testi_image.png" alt="">
            </div> -->
            
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
      
          <h4 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span>Get Quote</h4>
          
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="" method="POST">
            
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span>Name of Insured</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter Name of Insured" name="name1" required>
            </div>
          
          <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Pin Code</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Pin Code" name="pincode" required>
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
<input type="hidden" name="name_corporate" value="null">
<input type="hidden" name="route" value="profeesional-mp">

            
            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
              <input type="submit" name="sub5" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span></button>
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
             <h2 class="title-section"> Why do <span class="marked">Need</span> It?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">You may be a newly graduated professional or an experienced medical specialist or surgeon. It may not be an error but you may still be alleged, or you might have acted as a Good Samaritan. Being a professional you may be held liable. Our insurance product is your protection against all such odds in case of your negligence or against any allegation related to your professional services. It will cover litigation expenses when lawsuits arise. It will pay settlements and awards whenever applicable.</p>
             
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/pm2.jpg" alt="">
            </div>
          </div>
         <!--  <div style="margin-left:400px">
    <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
           <button href=""https://www.ilgi.co/CF89F06B1D?product_name=Erection All Risk&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>
           </div>-->
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
     
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
         <a href="https://www.ilgi.co/C13E0D409A?product_name=Contractor's All Risk&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-outline border ml-2" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
        </div>
      </div>
    </div>
  </div>
</div>
 <div class="page-section">
  <div class="container">
     <div class="text-center">
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Professional Indemnity for Doctor's</span> Cover</div>
        
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
               What is professional negligence?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
              Error, omission or an un-intentional negligence by a medical practitioner during diagnosis or treatment of the patient, which results in bodily injury, illness, sickness, adversities or death of the patient.
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What is PI for doctor’s indemnity insurance?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
              Professional Indemnity for Medical Practitioner is an insurance policy which covers Doctors for legal fees incurred and damages paid (If awarded by the court) for claims or demands raised by third parties (patients or their kin) alleging professional negligence. This Policy will also cover Legal Liability arising against them because of their staff.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">How to opt for sum assured value?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
              Sum assured is referred to the limit of Indemnity. This limit is fixed per accident and per policy period which is called Any One Accident (AOA) limit and Any One Year (AOY) limit respectively and will be offered and reccomended as Ratio 1:1 only. Sum insured is mostly dependent on factors related to Doctor Specialisation and city /type of customer’s doctor is offering services to. Limit of Liability can be from INR 500,000 to INR 50,000,000. Insured need to select and finalise the sum insured he is willing to opt for.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What is difference between public liability and professional indemnity insurance?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
                    Both these Policies are totally different, Public liability policy are Premises Specific risk and and cover third party bodily injury /Property damage claims arising out of accidents and/or incidents emanating from the insured premises, from their business Operations. However Professional Indemnity is not specific to risk location and will cover claim arising due to Error, omission or negligence in treatment given by medical practitioner which results in bodily injury or death of the patient. Public liability Policy will exclude claims pertaining to Professional negligence.
                    </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">Who should take doctor professional indemnity policy?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
              Any qualified medical practitioner (such as Physician, Surgeon, Radiologist, Dentist, Anaesthetists, Gynaecologist, Paediatrician, etc.) who is rendering services to patients can consider to buy this policy.
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
                <p class="mb-0">What does the policy cover?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
             Professional Indemnity for Medical Practitioner Policy protects you against:
 
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Legal liability including defence costs (costs, fees, expenses) incurred while investigation,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  cost of representation,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  compensation for Claims arising out of bodily injury or death caused by error,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  omission,</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  negligence while rendering the professional services.</li>
</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">What does the policy not cover?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Punitive & Exemplary Damages</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Fines and Penalties</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Pure Financial Losses</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Any Criminal Act, Violation of any law / ordinance</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Services while under influence of intoxicants / Narcotics</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Liability arising out of Pure Cosmesis procedures</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Please refer the Policy Wordings for detailed list of exclusions</li>


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
                <a href="#claimones"  class="collapsed" data-toggle="collapse" data-target="#claimones" aria-expanded="false" aria-controls="claimones">
                  <p class="mb-0">
                What is the claims process for indemnity applicable under the policy?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
              Our Professional Indemnity for Medical Practitioner Policy protects you against:<br />
                                                        <div class="text-center">
                                                            <b>Claim Information:</b><br />
                                                            On mail<br />
                                                            <img src="../assets/images/claim-arrow.png" alt="image"><br />
                                                            <b>LOR Request:</b><br />
                                                            List of requirements to be share by the sales team<br />
                                                            <img src="../assets/images/claim-arrow.png" alt="image"><br />
                                                            <b>Submission of internal reports:</b><br />
                                                            To be submitted by insured<br />
                                                            <img src="../assets/images/claim-arrow.png" alt="image"><br />
                                                            <b>Investigation Reports:</b><br />
                                                            Final claim amount to be shared with final investigation report<br />
                                                            <img src="../assets/images/claim-arrow.png" alt="image"><br />
                                                            <b>Seeking Documents:</b><br />
                                                            DV to be signed by insured<br />
                                                            <img src="../assets/images/claim-arrow.png" alt="image"><br />
                                                            <b>Remittance:</b><br />
                                                            Payment of claim amount
                                                        </div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">When can a claim get rejected?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Violation of any laws, rules and regulations</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Performing services under influence of alcohol or toxic substances</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Claims reported in current policy but arising out of procedures or treatments performed before retroactive date</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Non-disclosure of any material facts like claims history</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Proven intentional negligence</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
           
               <div class="card">
              <div class="card-header" id="claimthree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimthrees">
                  <p class="mb-0">When should the insured lodge a claim?</p>
                </a>
              </div>
              <div id="claimthrees" class="collapse" aria-labelledby="claimthree" data-parent="#accordion">
                <div class="card-body">
                    Insured should immediately lodge a claim once he is receipt of complaint, written demand or a legal notice from a third party (patient or their kin, or any other third party) related to their Professional negligence with their insurance company.
                
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
                 What is the limit of indemnity applicable under the policy?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                    No, policy start date will be as payment date in our banking records.
                  </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">How to apply professional indemnity insurance?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                    Eligibility - Any individual who holds a qualification to practice the respective medical specialisation can apply for this policy who is having license to practice in India.
               
                </div>
              </div>
            </div><!-- card-->
            <div class="card"> <div class="card-header" id="aboutFive"> <a href="#collapseten"  class="collapsed" data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten"> <p class="mb-0">Why do doctors need indemnity insurance?</p> </a> </div> <div id="collapseten" class="collapse" aria-labelledby="aboutFive" data-parent="#accordion"> <div class="card-body"> For a patient, his doctor is someone who promises good health by putting him on the right fitness condition when a medical emergency lands. Unfortunately, human error cannot be eliminated and doctors are exposed to the risk of claims from clients who have suffered loss due to neglect, error or omission. In today’s litigious world, claims can pose a significant threat to the financial security for a medical practitioner.</div> </div> </div>
            <div class="card"> <div class="card-header" id="aboutSix"> <a href="#collapseeleven"  class="collapsed" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven"> <p class="mb-0">Is medical indemnity compulsory?</p> </a> </div> <div id="collapseeleven" class="collapse" aria-labelledby="aboutSix" data-parent="#accordion"> <div class="card-body"> In India, this policy is not compulsory but it is highly recommended to have this policy which acts as a safety net if legal liability arises on you. </div> </div> </div> 
            <div class="card"> <div class="card-header" id="aboutseven"> <a href="#collapsetwel"  class="collapsed" data-toggle="collapse" data-target="#collapsetwel" aria-expanded="false" aria-controls="collapsetwel"> <p class="mb-0">Is there any limit of professional indemnity that I need?</p> </a> </div> <div id="collapsetwel" class="collapse" aria-labelledby="aboutseven" data-parent="#accordion"> <div class="card-body"> The Limit of Indemnity (Sum insured) can be decided according to your medical specialisation and type of customer’s segment doctor is offering services to.</div> </div> </div> <div class="card"> <div class="card-header" id="abouteight"> <a href="#collapsethir" class="collapsed"  data-toggle="collapse" data-target="#collapsethir" aria-expanded="false" aria-controls="collapsethir"> <p class="mb-0">What is the duration of the policy?</p> </a> </div> <div id="collapsethir" class="collapse" aria-labelledby="abouteight" data-parent="#accordion"> <div class="card-body"> Duration of the policy is one year i.e. 12 months, which needs to be renewed every year for continuous risk cover.</div> </div> </div> 
           
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
           
          <p id="copyright"  style="font-size:13px">Copyrights &copy; 2022 All Rights Reserved By <a href="https://macodeid.com/"> MSME Accelerate</a>. </p>
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