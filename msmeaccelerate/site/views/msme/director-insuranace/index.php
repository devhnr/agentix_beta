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
          <img src="../assets/images/banner/Directors & Officers Insurance.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
             <!-- <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>-->
              </ul>
            </nav>
          <!--  <h1 class="text-center">Directors & Officers Insurance</h1>-->
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
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>  Name</label>
              <input type="text" name="name1" class="form-control" id="psw" placeholder="Enter Name">
            </div>
              
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email Id</label>
              <input type="text" name="email" class="form-control" id="psw" placeholder="Enter Email Id">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" name="phone" class="form-control" id="psw" placeholder="Enter Mobile Number">
            </div>
             
             <input type="hidden" name="route" value="director-insuranace">
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
            <h2 class="title-section">What is <span class="marked">Directors & Officers</span> Insurance?</h2>
            <div class="divider"></div>
            <p class="mb-5" style="text-align: justify;">Directors and officers (D&O) insurance is liability insurance which covers or protects Directors, Officers and Employees of company from claims which may arise from decision and actions taken while serving their duty. It covers legal defense costs or other costs incurred by company in defending such individual against lawsuits. Directors & Officers can be sued or alleged for wrongful acts related to:
            </p>
             <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Breach of duty, breach of trust, misstatement or misleading statement, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;defamation, libel or slander, act of omission or negligence. </li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Employment process or inappropriate workplace conduct such as &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;discrimination, retaliation, defamation, failure to promote, sexual &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;harassment etc.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Claim solely because of their status.</li>

</ul>
</div>

          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/directors2.jpg" alt="">
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
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>  Enter Contact PersonName</label>
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

<input type="hidden" name="route" value="director-insuranace">

            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
                <input type="submit" name="sub2" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')"></button>
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
              <img src="../assets/img/directors1.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
        
            <h2 class="title-section">Who Needs  <span class="marked">Directors & Officers</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Any privately or publicly held company with corporate board or advisory committee should take D&O policy to protect their Director’s, officers and employees.</p>
           
         
          </div>
        </div>
          
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
   <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
           
             <h2 class="title-section"> Why do you need   <span class="marked">Directors & Officers</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Directors and officers are legally responsible and bound by duty towards various stakeholders like shareholders, employees, creditors, customers, competitors and government or regulatory bodies. Any breach or non-performance in the duties can result in claims against directors, officers and employees by reason of wrongful act and need to incur various expenses like defense costs, damages or compensation and other incidental costs. This can affect company’s growth and performance. This policy will protect against such expenses, losses and claims.</p>
           
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/images/direct.webp" alt="">
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
         <a href="https://www.ilgi.co/C13E0D409A?product_name=Directors %26 Officers Insurance&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
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
                                <h3>What is covered by Directors & Officers Insurance</h3>
                                <p>Below are the detailed inclusions and exclusions of our Directors & Officers Insurance</p>
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
                                                        <li>Covers Directors and officers for claims where the company refuses to or is financially unable to pay for loss and the Directors and officers have to protect themselves, against demands, legal suits, allegations</li>
                                                        <li>Covers company under Employment practice liability (EPL) from wrongful acts arising out of allegations and legal suits related to employment process or inappropriate workplace conduct such as sexual harassment, gender or caste discrimination, retaliation, defamation, failure to promote, etc.</li>
                                                      
                                                

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
                                                        <li>Impact damage of any kind, i.e. damage caused by impact of, Covers costs incurred by the insured company in defending such individual against losses.falling trees, aircraft, wall etc.)</li>
                                                       
                                                       
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
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Directors & Officers </span> Insurance</div>
        
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
               Need for D&O Policy?  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
              Directors and officers are legally responsible and bound by duty towards various stakeholders like Shareholders, employees, creditors, customers, competitors and government or regulatory bodies. Any breach or non-performance in the duties can result in claims against directors, officers and employees by reason of wrongful act. This can affect company’s growth and performance. This policy will protect against such losses and claims. </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">Can a member of Board of Directors be sued?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
              Yes, Member of Board of Directors can be sued. Any stakeholders like Shareholders, employees, creditors, customers, competitors and government or regulatory bodies can sue a particular member of the board.
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">Can a director or officer become personally liable for their actions?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
              Yes, as per the companies’ act, the Director or officer can be alleged and held personally liable for their actions.
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">Are my personal assets at risk if I serve as a director or officer or a member of board?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
                    Yes, the liability of director is unlimited resulting loss of personal assets at time of insolvency or any claim. This policy will protect personal assets of director.
               
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">Who is insured in D&O insurance policy?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
              Following parties are insured under D&O policy:
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Director, Officer, or employee of a company.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp An outside entity director.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  A consultant as member appointed by company’s board.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Trainee</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Employed Lawyer</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Spouse of insured person.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Administrator, heirs, legal representatives.</li>
</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
              <div class="card">
              <div class="card-header" id="infras">
                <a href="#collapsey" class="collapsed" data-toggle="collapse" data-target="#collapsey" aria-expanded="false" aria-controls="collapsey">
                  <p class="mb-0">Who exactly are directors and officers?</p>
                </a>
              </div>
              <div id="collapsey" class="collapse" aria-labelledby="infras" data-parent="#accordion">
                <div class="card-body">
             A director and officer is person who holds a managerial or supervisory position in the company. The concerned person can be member of board of directors or part of organization’s management. </div>
              </div>
            </div><!-- card-->
            
            <div class="card">
              <div class="card-header" id="infrasone">
                <a href="#collapseyone" class="collapsed" data-toggle="collapse" data-target="#collapseyone" aria-expanded="false" aria-controls="collapseyone">
                  <p class="mb-0">Who buys D&O protection?</p>
                </a>
              </div>
              <div id="collapseyone" class="collapse" aria-labelledby="infrasone" data-parent="#accordion">
                <div class="card-body">
             Any privately or publicly held company with corporate board or advisory committee should take D&O policy to protect their Directors, officers and employees.</div>
              </div>
            </div><!-- card-->
          </div><!-- accordion-->
        </div><!-- tab 1-->
      <div id="tab2" class="tab-pane fade">
        <div class="accordion">
          <div class="card">
            <div class="card-header" id="aboutOne">
              <a href="#collapsesix" class="collapsed" class="collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                <p class="mb-0">What does a Directors and Officer’s (D&O) Policy covers?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
             The D&O policy covers personal liability of directors, officers and employees arising due to wrongful acts while performing duty. It also covers defence costs and other expenses incidental to a loss.
               
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">Does D&O insurance cover fines and penalties?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
                  The policy will only cover civil fines and penalties levied on an insured due to violation of laws or regulations and when such fines and penalties are insurable by law.
              
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutThree">
              <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                <p class="mb-0">What are the add-on covers one should opt for while issuing D&O insurance policy?</p>
              </a>
            </div>
            <div id="collapseeight" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion">
              <div class="card-body">
                  
             <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Entity is covered under Employment practice liability (EPL) coverage. Which protects company from claims arising out wrongful acts of employment process or inappropriate workplace conduct such as discrimination, retaliation, defamation, failure to promote, sexual harassment etc.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Entity Security cover corporate entity when claims are made against the entity in conjunction with securities it has issued.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Addon covers may be availed by paying additional premium.</li>

</ul>
</div>
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutFour">
              <a href="#collapsenine"  class="collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                <p class="mb-0">Does D&O insurance cover entity?</p>
              </a>
            </div>
            <div id="collapsenine" class="collapse" aria-labelledby="aboutFour" data-parent="#accordion">
              <div class="card-body">
           Yes, Entity is covered under Employment practice liability (EPL) coverage. Which protects company from claims arising out wrongful acts of employment process or inappropriate workplace conduct such as discrimination, retaliation, defamation, failure to promote, sexual harassment etc.
           <br>
           Entity Security cover corporate entity when claims are made against the entity in conjunction with securities it has issued.
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutFive">
              <a href="#collapseten"  class="collapsed"   data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                <p class="mb-0">Does D&O insurance provide legal defence?</p>
              </a>
            </div>
            <div id="collapseten" class="collapse" aria-labelledby="aboutFive" data-parent="#accordion">
              <div class="card-body">
           Yes, It covers legal defence costs. It covers defence cost for breach of occupational health and safety laws, including workplace death.
 
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutSix">
              <a href="#collapseeleven" class="collapsed"  data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                <p class="mb-0">What information do I need to provide to issue D&O policy?</p>
              </a>
            </div>
            <div id="collapseeleven" class="collapse" aria-labelledby="aboutSix" data-parent="#accordion">
              <div class="card-body">
          The policy will only cover civil fines and penalties levied on an insured due to violation of laws or regulations and when such fines and penalties are insurable by law.
          <ul>
              <li>Insured’s name and address</li>
              <li>Audit report of company</li>
              <li>Share holding pattern</li>
          </ul>
               
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
                What is the claim settlement process?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
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
                  <p class="mb-0">What documents I need to submit in case of any claim?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Insured’s name and address.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Audit report of company.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Share holding pattern.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Any other document as specified by the Insurance Company</li>

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
                Only directors and officers covered in D&O insurance policy?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
                    Following parties are insured under D&O policy:
              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Director, Officer, or employee of a company.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp An outside entity director.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp A consultant as member appointed by company’s board.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Trainee</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Employed Lawyer</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Spouse of insured person.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Administrator, heirs, legal representatives.</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">Should a small business take D&O insurance policy?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                    Yes, Small businesses and companies are most vulnerable to financial damage from litigation fees than large company with more money and resources. However, proprietorship firms may not buy as the ownership is individual.
                
                </div>
              </div>
            </div><!-- card-->
           <div class="card">
              <div class="card-header" id="policyThree">
                <a href="#policythrees" class="collapsed" data-toggle="collapse" data-target="#policythrees" aria-expanded="false" aria-controls="policythrees">
                  <p class="mb-0">What type of D&O insurance policy should one buy?</p>
                </a>
              </div>
              <div id="policythrees" class="collapse" aria-labelledby="policyThree" data-parent="#accordion">
                <div class="card-body">
                    The D&O policy is only of one type. The one which is purchased by corporate entities to protect their directors, officers and employees. The policy is quite customizable and one should take relevant coverage in the policy.
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