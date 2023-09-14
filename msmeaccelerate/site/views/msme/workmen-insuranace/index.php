<?php
include("../connect.php");
include("../workmen.php");
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

  <meta name="copyright" content="">

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
              <span class="mai-mail fg-primary"></span> <a href="consult@raghnall.co.in">consult@raghnall.co.in</a>
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
          <img src="../assets/images/banner/Workmen's Compensation Insurance.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <!--<ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
            <!--<h1 class="text-center">Workmen's Compensation Insurance</h1>-->
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
             
             <input type="hidden" name="route" value="workmen-insuranace">
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
            <h2 class="title-section">What is <span class="marked">Workmen's</span> Compensation?</h2>
            <div class="divider"></div>
            <p class="mb-5" style="text-align: justify;">The Workmen’s Compensation Insurance policy covers the legal liability of the employers under the Workmen’s Compensation Act 1923 and Fatal Accident Act 1855. Despite the preventive measures and safety precautions taken, accidents at your workplace are inevitable. The Workmen’s Compensation policy enables the employer to pay the compensation to the employees or for their family in case of death or bodily injury (permanent partial disablement / permanent total disablement / temporary disablement) caused due to injury and accident at workplace (including certain occupational disease) arising out of and in the course of employment. This policy provides coverage for medical expenditure, occupational disease, compressed air disease and terrorism.</p>
          <!--   <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline ml-2">See pricing</a> -->
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/Artboard – 3.jpg" alt="">
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
              <img src="../assets/img/Artboard – 2.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
        
            <h2 class="title-section">Who should buy  <span class="marked">Workmen’s Compensation</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Policy is required by all manufacturing/trading/servicing setups for all floor workers and office staff as well. Most of the contractors’/Sub contractors stands benefited by this policy. Policy can be taken by Individual/Public or Private companies/ Partnership firms or by any of business/Trading entity operating in the Country.</p>
           
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
      
          <h4 style="text-align:center;"><span class="glyphicon glyphicon-lock"></span> Get Quote</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form ACTION="" method="POST">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Select Industry Category</label>
              <select  class="form-control" id="industry" placeholder="Name of Corporate" name="industry">
                <option selected="selected" value="0">--Select--</option>
    <option value="Brick">Brick and Tile Makers -Where any machinery is used;excl. clay or blaes getting below 6 metres</option>
    <option value="Builders">Builders - construction incl civil constructions</option>
    <option value="Cable">Cable Laying, installation &amp; erection work - away from shop / yard risk</option>
    <option value="Cable">Cable Laying, installation &amp; erection work - shop / yard risk</option>
    <option value="Caretakers">Caretakers Durwans, Chowkidars and Gatekeepers</option>
    <option value="Carpenters">Carpenters</option>
    <option value="Cement">Cement works (excl Quarry &amp; Mining risk)</option>
    <option value="clothing">Clothing &amp; Underclothing Mfgrs</option>
    <option value="commercial">Commercial Travellers</option>
    <option value="domestic">Domestic Servants</option>
    <option value="Electricity">Electricity - Power supply</option>
    <option value="Engineering">Engineering workshop &amp; Fabrication works (Above 9 meters)</option>
    <option value="Engineering">Engineering workshop &amp; Fabrication works (up to 9 meters)</option>
    <option value="Hotels">Hotels - indoor</option>
    <option value="Indoor">Indoor Clerical works</option>
    <option value="Loading">Loading and Unloading</option>
    <option value="Metal">Metal Workers</option>
    <option value="Painters">Painters &amp; Decorators (not builder)</option>
    <option value="paper">Paper Mfgr</option>
    <option value="Pharma">Pharma, Chemists &amp; Druggists</option>
    <option value="Plastic">Plastic Goods Mfgrs</option>
    <option value="Road">Road Paving, Tarring and Road Making</option>
    <option value="Steel">Steel works</option>
    <option value="yarn">Yarn Production</option>

  </select>

            </div>
             <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Select Sub Industry Category</label>
              <select  class="form-control" id="sub" placeholder="Name of Corporate" name="subcategory">
                <option selected="selected" value="0">--Select--</option>
   
    

  </select>

            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Policy Period (Months)</label>
              <input type="text" name="policy" class="form-control" id="psw" placeholder="Enter Policy Period (Months)">
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Number of Skilled Workers</label>
              <input type="text" name="skilled" class="form-control" id="psw" placeholder="Enter Number of Skilled Workers">
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Salary (per month per worker)</label>
              <input type="text" name="salary_skill" class="form-control" id="psw" placeholder="Enter Salary (per month per worker)">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Number of unskilled worker</label>
              <input type="text" name="unskilled" class="form-control" id="psw" placeholder="Enter Number of unskilled worker">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Salary (per month per worker)</label>
              <input type="text" name="salary_unskill" class="form-control" id="psw" placeholder="Enter Salary (per month per worker)">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Did you have claim in your last policy?</label>
              <label class="radio-inline" ><input type="radio" name="claim" value="more_than_1_lakh" >More than Rs 1 lac claim</label>
<label class="radio-inline"><input type="radio" name="claim" value="nill_lessthan_1_lakh" checked="">Nil or Less than Rs 1 lac claim</label>
            </div>
            
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Email Id</label>
              <input type="text" name="email" class="form-control" id="psw" placeholder="Enter Email Id">
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Mobile Number</label>
              <input type="text" name="mobile" class="form-control" id="psw" placeholder="Enter Mobile Number">
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Name of the Company</label>
              <input type="text" name="company" class="form-control" id="psw" placeholder="Enter Name of the Company">
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Pincode</label>
              <input type="text" name="pincode" class="form-control" id="psw" placeholder="Enter Pincode">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>I agree to the terms and conditions</label>
            </div>
              <input type="submit" name="sub6" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">
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
              <br><br>
             <h2 class="title-section"> Why should you buy   <span class="marked">Workmen’s Compensation</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">The Workmen’s Compensation policy provides payment for legal compensation to Employees or their dependants in case of injury and accident of the employees at workplace (including certain occupational disease) arising out of and in the course of employment and resulting in disablement or death.</p>
           
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/hero-image-1.jpg" alt="" height="200px" width="200px">
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
              <img src="../assets/images/OIP.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <h2 class="title-section">What is Included in  <span class="marked">Workmen’s Compensation</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Basic covers include Accidental death, Permanent total or Partial Disability and Temporary total disability. Add on covers include Medical Extension, Compressed Air Disease, Occupational Disease, Terrorism and Sub Contractor Coverage</p>
           
          <!--   <div class="img-place mb-3">
              <img src="../assets/img/testi_image.png" alt="">
            </div> -->
           <!--  <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline border ml-2">Success Stories</a> -->
          </div>
        </div>
      </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Benefits</div>
          <h2 class="title-section"><span class="marked">Workmen’s Compensation</span> Policy</h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row mt-5 text-center">
          <div class="col-lg-6 py-3 wow fadeInRight">
            <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Terrorism Coverage </li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Hassle-free and convenient buying journey in few clicks</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Comprehensive and flexible</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Swift response and efficient service in handling claims</li>
</ul>
</div>

  
</div>
<!--<div style="margin-left:450px">
    <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
           <button href="#" class="btn btn-outline border ml-2" data-toggle="modal" data-target="#myModal1">Buy Now</button>
           </div>-->
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
         <a href="https://www.ilgi.co/3BBA5F1528?product_name=workmen compensation&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<!--  <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="../assets/img/bg_image_2.png" alt="">
            </div>
          </div> -->
       
   
      </div> <!-- .container -->
    <!--</div> 

 <div class="page-section">-->
  <div class="container">
     <div class="text-center">
         <br>
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Workmen’s Compensation</span> Policy</div>
        
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
                <a href="#collapseOne" class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="infraOne">
                  <p class="mb-0">
                 What are the basic coverage provided under Workmen Compensation policy?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
               The policy provides coverage for accidental death, permanent total disability, permanent partial disability and temporary total disability
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What addon covers are provided in Workmen Compensation policy?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Occupational Disease</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Compressed Air Disease</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Contractor /Sub Contractor Coverage</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Terrorism Cover</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp PAN India Location Coverage</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Medical Expenses (Per Employee Limit)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Cashless for Medical Expenses</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">What is Permanent Total Disablement?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
                Permanent total disablement means such disablement of a permanent nature as incapacitates an employee for all work which he was capable of performing at the time of the accident resulting in such disablement
List of disablements is specified in the Workmen compensation Act.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What is Permanent Partial Disablement?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
                Permanent partial disablement means, where the disablement is of a permanent nature, such disablement as reduces the earning capacity of an employee in every employment which he was capable of undertaking at the time of the accident resulting in the disablement.
List of disablements is specified in the Workmen compensation Act.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">What is Temporary Disablement?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
               Temporary disablement means a condition resulting from an employment injury which requires medical treatment and renders an employee, as a result of such injury, temporarily incapable of doing the work which he was doing prior to or at the time of the injury.
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
                <p class="mb-0">What is workmen compensation insurance?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
             The Workmen/Employee Compensation Insurance provides for payment of compensation to Employer on behalf of its employees in case of accidental injury at workplace arising out of and in the course of employment and resulting in death or disablement:
 
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Workmen compensation claims are for accidents within work premises and during working hours</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  It also covers direct travel of employees from office to home and vice-versa</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  At the time of injury, workman must have been engaged in the business of the employer and must not be doing something for his personal benefit</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Employer and employee relationship is an important prerequisite for issuance of workmen compensation (WC) / employee compensation (EC) policy</li>
</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">What legal liabilities are covered in Workmen compensation policy?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Workmen Compensation Act, 1923 [As Amended through Employee Compensation (Amendment) Act, 2017], and subsequent amendments of the said Act prior to the date of issue of the policy.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Fatal Accidents as per Fatal Accident Act, 1855</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Common Laws</li>

</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutThree">
              <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                <p class="mb-0">How is Workmen Compensation policy different from ESIC (Employee State Insurance)?</p>
              </a>
            </div>
            <div id="collapseeight" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion">
              <div class="card-body">
             <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbspConstruction site workers are excluded from ESIC coverage as per ESI Act but can be covered in WC policy.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Employees with wages above 21000 not covered in ESIC but there is no limit of wages under WC/ EC Act</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Seasonal Factories (Includes factories engaged Less than 7 Months) are not covered in ESIC, but can be covered in a Employee compensation policy</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Organization with up to 10 workers (20 in case of Maharashtra and Chandigarh) does not require to have ESIC registration however there is no restriction as to no. of workers in WC /EC policy</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Lower and flexible rates as compared to fixed ESIC Rates</li>

</ul>
</div>
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutFour">
              <a href="#collapsenine"  class="collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="aboutFour">
                <p class="mb-0">What is occupational disease cover?</p>
              </a>
            </div>
            <div id="collapsenine" class="collapse" aria-labelledby="aboutFour" data-parent="#accordion">
              <div class="card-body">
           Occupational Diseases covers those diseases that are specified under Schedule III of Workmen or Employee Compensation Act
It covers those disease which arise due to nature of occupation
Ex. disease caused by use of toxic compounds
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutFive">
              <a href="#collapseten" class="collapsed"  data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                <p class="mb-0">What is Compressed Air Disease cover?</p>
              </a>
            </div>
            <div id="collapseten" class="collapse" aria-labelledby="aboutFive" data-parent="#accordion">
              <div class="card-body">
           Compressed air disease is one of the occupational illnesses covered under workmen compensation policy. It is a sickness attributed to the working environments where air pressure may be higher or lower than the normal surface air pressure.
Ex. Underground or underwater works.
 
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutSix">
              <a href="#collapseeleven" class="collapsed"  data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                <p class="mb-0">What does Medical Extension add on cover?</p>
              </a>
            </div>
            <div id="collapseeleven" class="collapse" aria-labelledby="aboutSix" data-parent="#accordion">
              <div class="card-body">
          Medical extension covers reasonable medical surgical and hospital expenses incurred by the Insured in connection with any case of injury of employee, if hospitalisation is for more than 24 hours
 
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutseven">
              <a href="#collapsetwel" class="collapsed"  data-toggle="collapse" data-target="#collapsetwel" aria-expanded="false" aria-controls="collapsetwel">
                <p class="mb-0">What is Terrorism Cover?</p>
              </a>
            </div>
            <div id="collapsetwel" class="collapse" aria-labelledby="aboutseven" data-parent="#accordion">
              <div class="card-body">
         Any injury on account of terrorist activity within workplace is covered
 
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="abouteight">
              <a href="#collapsethir" class="collapsed"  data-toggle="collapse" data-target="#collapsethir" aria-expanded="false" aria-controls="collapsethir">
                <p class="mb-0">What is covered under Contractor /Sub Contractor Coverage?</p>
              </a>
            </div>
            <div id="collapsethir" class="collapse" aria-labelledby="abouteight" data-parent="#accordion">
              <div class="card-body">
        Contractor / Sub-contractor and their employees can be covered under this coverage
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutnine">
              <a href="#collapsefourty" class="collapsed"  data-toggle="collapse" data-target="#collapsefourty" aria-expanded="false" aria-controls="collapsefourty">
                <p class="mb-0">What is PAN India Location Coverage?</p>
              </a>
            </div>
            <div id="collapsefourty" class="collapse" aria-labelledby="aboutnine" data-parent="#accordion">
              <div class="card-body">
       If the insured has more than 1 risk locations (operating branches or factories) across the country, PAN India coverage enables employer to take a single insurance policy to cover its employees in all the branches
               
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
                 What information is required for Claim intimation?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Policy Number</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insured Name</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Injured Name</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Date of Accident (Loss)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Nature of Claim - TTD (temporary total disablement) / PPD (permanent partial disablement) etc</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Brief description of accident</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Any other document as specified by the Insurance Company</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What is the amount of compensation payable under Workmen Compensation policy?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                    Workmen Compensation is a statutory liability as prescribed under Employee Compensation Act which provides for amount of compensation as below:
                <table class="table-striped" cellpadding="15">
                                                    <tr>
                                                        <th>Nature of Claim</th>
                                                        <th>Amount of Claim</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Accidental Death</td>
                                                        <td>(50% * Wages * Age Factor)  OR  INR 1,20,000 
                                                        Whichever is higher</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Permanent Total Disability</td>
                                                        <td>Permanent Total Disability	(60% * Wages * Age Factor)  OR  INR 1,20,000 
                                                        Whichever is higher</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Permanent Partial disability</td>
                                                        <td>Based on % disability / Loss of earning capacity prescribed
                                                        by medical practitioner * Wages * Age Factor</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Temporary total disability</td>
                                                        <td>Temporary total disability	25% * wages * No of days of absence/disability / 15</td>
                                                    </tr>
                                                </table>
                                                <h5>*As prescribed by central govt. notification, maximum amount of wages to be considered for 
                                                compensation is INR 15000 per month</h5>
                                            
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
                 What basic information the Insurer needs to provide quotation?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Nature of work / Occupancy</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp No. of Employees</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Monthly wages</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Policy duration</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Risk Location Address</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Claim Experience of last 3 years with amount and count of claims</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">How Sum Insured is calculated in a Workmen compensation policy?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Sum Insured is the total earnings of the employees in the organisation</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp The Sum Insured is calculated on the basis of monthly wages of employees</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Wages includes basic salary, allowance, perquisites or any benefits provided to the employees (Other than reimbursable expenses made by employees)</li>
</ul>
</div>
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
<script>
$(document).ready(function(){
    $("#industry").change(function(){
        var selectedIndustry = $("#industry").val();
       // alert(selectedCountry);
        $.ajax({
            type: "POST",
            url: "hello.php",
            data: { industry : selectedIndustry }
        }).done(function(data){
        //alert(data);
            $("#sub").html(data);
        });
    });
});
</script>

</body>
</html>