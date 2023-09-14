<?php
include("../connect.php");
include("../marine_transist.php");
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
          <img src="../assets/images/banner/Marine Transit Insurance.svg" width="100%" >
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
             <!-- <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Insurances</li>
              </ul>-->
            </nav>
            <h1 class="text-center">Marine Transit Insurance</h1>
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
             
             <input type="hidden" name="route" value="marine-transist">
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
              <input type="submit" name="sub10" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">
          </form>
        </div>
         <div class="modal-footer">
          <button type="sub" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
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
            <h2 class="title-section">What is <span class="marked">Marine Transit</span> Insurance?</h2>
            <div class="divider"></div>
            <p class="mb-5" style="text-align: justify;">Marine Insurance is a type of insurance that provides coverage against the losses or damages of cargo or goods during transportation between the points of origin to the final destination. Marine insurance policy provides coverage for all means of transportation example road, railway, air, sea, couriers and postal service.
Marine Cargo insurance primarily covers loss during transit caused due to fire, explosion, hijacks, accidents, collisions, and overturning. We offer specially curated plans for covering the risk of theft, malicious damage, shortage, and non-delivery of goods, damages during loading and unloading, and mishandling of goods/cargo. The insured can choose the coverage based on specific business requirements. The policy is available for a variety of cargo/goods if you are dealing in or manufacturing them.</p>
          <!--   <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline ml-2">See pricing</a> -->
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/marine 1.jpg" alt="">
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
              <img src="../assets/img/Artboard – 7.png" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
        
            <h2 class="title-section">Who needs  <span class="marked">Marine Transit</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">Having this policy is essential for businesses and individuals alike. Business shipments are usually high in value and any damage can directly impact business. When it comes to an individual, relocation is regarded as one of the most stressful life events, be it for job change or marriage.
Whatever your reason may be for transporting your goods, our policy protects your goods against material damages.</p>
           
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
          <form action="" method="POST">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Commodity Type</label>
              <select class="form-control" id="commodity"  name="commodity">
                <option value="0">--Select--</option>
                <option value="Aggregators/transporters">Aggregators/transporters</option>
                <option value="All Types of Containers">All Types of Containers</option>
                <option value="All kinds of Food like Oils Essence Flavours and other various Packed items">All kinds of Food like Oils Essence Flavours and other various Packed items</option>
                <option value="All types of Chemicals duly packed">All types of Chemicals duly packed</option>
                <option value="All types of FMCG commodities">All types of FMCG commodities</option>
                <option value="All types of paints duly packed">All types of paints duly packed</option>
                <option value="Auto Spare Parts">Auto Spare Parts</option>
                <option value="Automobiles">Automobiles</option>
                <option value="Cables and Wires">Cables and Wires</option>
                <option value="Ceramic products and Tiles">Ceramic products and Tiles</option>
                <option value="Edible oil in Tanker">Edible oil in Tanker</option>
                <option value="Edible vegetables or fruits and nuts or peel of citrus fruits or melons">Edible vegetables or fruits and nuts or peel of citrus fruits or melons</option>
                <option value="Electronic And White Goods">Electronic And White Goods</option>
                <option value="Garments, Apparel, Fabrics Or Textiles">Garments, Apparel, Fabrics Or Textiles</option>
                <option value="Granite and Marble">Granite and Marble</option>
                <option value="Household items - New and old">Household items - New and old</option>
                <option value="Iron and Steel Rods, Metal Pipes, Tubes, Steel Coils">Iron and Steel Rods, Metal Pipes, Tubes, Steel Coils</option>
                <option value="Leather and Leather Goods">Leather and Leather Goods</option>
                <option value="Machinery Machine Tools Spares Duly Packed/lashed">Machinery Machine Tools Spares Duly Packed/lashed</option>
                <option value="Metal Hand Tools">Metal Hand Tools</option>
                <option value="Metal Handicrafts and Brasswares">Metal Handicrafts and Brasswares</option>
                <option value="Metals of all types excluding precious metals">Metals of all types excluding precious metals</option>
                <option value="Milk and Ghee Packaged or In Tankers">Milk and Ghee Packaged or In Tankers</option>
                <option value="New CPM Equipment">New CPM Equipment</option>
                <option value="Pharmaceuticals and Bulk drugs">Pharmaceuticals and Bulk drugs</option>
                <option value="Plastics and Articles Thereof">Plastics and Articles Thereof</option>
                <option value="Rubber and Articles Thereof">Rubber and Articles Thereof</option>
                <option value="Soap, Cosmetics, Toiletries">Soap, Cosmetics, Toiletries</option>
                <option value="Stationery Items">Stationery Items</option>
                <option value="Timber and Wood Products">Timber and Wood Products</option>
                <option value="Toys, Games and Sports Equipment">Toys, Games and Sports Equipment</option>
                <option value="Used CPM Machines And Equipments">Used CPM Machines And Equipments</option>
                <option value="Used Machinery Machine Tools and Spares In Closed ISO Containers">Used Machinery Machine Tools and Spares In Closed ISO Containers</option>

              </select>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Cargo Sum Insured</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Cargo Sum Insured" name="cargo" required>
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Mobile Number" name="mobile" required> 
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email Id</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Email Id" name="email" required>
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Name of Company</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Company" name="company" required>
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Pincode</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Pincode" name="pincode" required>
            </div>
            
            <input type="hidden" name="route" value="marine-transist">
            <div class="checkbox">
              <label><input type="checkbox" value="" checked required>I agree to the terms and conditions</label>
            </div>
            <input type="submit" name="sub4" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')"></button>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span></button>-->
          </form>
        </div>
         <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         
        </div>
      </div>
      
    </div>
  </div> 
</div>
   <div class="page-section ">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3">
             <h2 class="title-section"> Why should you buy   <span class="marked">Marine Transit</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">As a businessperson your goods are of immense value to you. It’s your source of revenue. Insuring your goods against any untoward incident, while they are being transported, means securing your own future & business.
If you’re an individual and making a move due to personal or professional reasons, you’re likely to be worried about a lot of things already.
Your household items no doubt have memories attached to them and you have painstakingly collected each thing as you’ve moved ahead in life. Knowing that all your stuff is safe means you can breathe easy about this one thing at least.</p>
           
          </div>
          <div class="col-lg-6 py-3">
            <div class="img-place text-center">
              <img src="../assets/img/Artboard – 6.png" alt="">
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
      <div class="page-section client-section">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center"><br>
              <img src="../assets/images/marine.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <h2 class="title-section">What is Covered in  <span class="marked">Marine Transit</span> Insurance?</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">All the modes of transportation namely, air, water, rail & road are covered under this policy. Goods being transported via courier services are also insured. Your goods in transit will be protected against vehicle collision, overturning, derailment, or accidents happening anywhere from the source to destination. This coverage can also be extended to loss or damage of goods due to theft, strike, riots, terrorism, and other hostile acts by human by opting for appropriate coverage as per one’s needs.</p>
           
          <!--   <div class="img-place mb-3">
              <img src="../assets/img/testi_image.png" alt="">
            </div> -->
        <!--  <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Get Quote</button>
            
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
         <a href="https://www.ilgi.co/567B192C5B?product_name=Marine Transit Insurance&partner_name=Raghnall Insurance Broking and Risk Management Pvt. Ltd&im_id=DB59914&mobile=022-42571999&email=consult@raghnall.co.in&deal_id" class="btn btn-danger btn-default pull-left" target="blank">Proceed</a>
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
     <div class="text-center">
          <div class="subhead" style="color:black">Get answers to common questions about <span class="marked">Marine Transit</span> Policy</div>
        
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
              What are the types of Marine Cargo Insurance covers available?
                  </p>
                </a>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="infraOne" data-parent="#accordion">
                <div class="card-body">
               Following types of covers are available:For Import and Export Transits:
                               <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Institute Cargo Clause – A (All Risk)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Institute Cargo Clause – B (Named Perils/ Basic Cover)</li>
  <b>For Inland (Transit within India):</b></li>
<br><li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Inland Transit Clause – A (All Risk)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Inland Transit Clause – B (Named Perils/ Basic Cover)</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="infraTwo">
                <a href="#collapseTwo" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What are the perils covered in A (All Risk) or B (Named Perils / Basic Cover)?</p>
                </a>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="infraTwo" data-parent="#accordion">

                <div class="card-body">
              <table class="table-striped" cellpadding="15">
                                                    <tr>
                                                        <th>Risk</th>
                                                        <th>All Risk</th>
                                                        <th>Basic</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Fire, Lightening or Explosion</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Overturning or derailment of vehicle</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Earthquake or Volcanic Eruption during transit</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Collision between 2 Vehicles</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>River or lake water entering cargo</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Damage/Loss to goods during loading & unloading</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">No</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Damage/Loss to goods during handling of goods in transit</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">No</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Theft or malicious damage</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">No</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shortage or non-delivery of goods</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">No</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Hijack of goods</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">No</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Any other risk not specifically excluded</td>
                                                        <td class="text-center">Yes</td>
                                                        <td class="text-center">No</td>
                                                    </tr>
                                                </table>
                </div>
              </div>
            </div><!-- card-->
            <div class="card">
              <div class="card-header" id="infraThree">
                <a href="#collapseThree" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <p class="mb-0">What are INCO Terms?</p>
                </a>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="infraThree" data-parent="#accordion">
                <div class="card-body">
             <p>
                                                    They determine the point of change of responsibility between the buyer and seller. Incoterms inform sales 
                                                    contracts defining respective obligations, costs, and risks involved in the delivery of goods from the seller to 
                                                    the buyer
                                                </p>
                                                <strong>Some commonly used Inco Terms:</strong>
                                                <p>
                                                    <small>Ex Works (EXW):</small> Seller has to place the goods at the disposal of the buyer. Carriage and Insurance are 
                                                    arranged by buyer
                                                </p>
                                                <p>
                                                    <small>Free On Board (FOB):</small> Seller delivers when the goods pass the ship’s rail at the named port of shipment. This 
                                                    means the buyer has to bear all costs &risks to the goods from that point
                                                </p>
                                                <p>
                                                    <small>Cost, Insurance, Freight (CIF):</small> The seller delivers when the goods pass the ship’s rail in the port of shipment. 
                                                    The seller must pay the cost & freight necessary to bring goods to the named port of destination, but the risk 
                                                    is transferred from seller to buyer
                                                </p>
                                                <strong>Other INCO Terms used in the market : </strong>
                                                <h4>Rules for Any Mode (or modes) of Transport </h4>
                                                <ul>
                                                    <li>CIP - Carriage and Insurance Paid</li>
                                                    <li>CPT - Carriage Paid To</li>
                                                    <li>DAP - Delivered At Place</li>
                                                    <li>DAT - Delivered At Terminal</li>
                                                    <li>DDP - Delivered Duty Paid</li>
                                                    <li>EXW - Ex Works</li>
                                                    <li>FCA - Free Carrier</li>
                                                </ul>
                                                <h4>Rules for Sea and Inland Waterway Transport Only</h4>
                                                <ul>
                                                    <li>CFR - Cost and Freight</li>
                                                    <li>CIF - Cost, Insurance and Freight</li>
                                                    <li>FAS - Free Alongside Ship</li>
                                                    <li>FOB - Free On Board</li>
                                                </ul>
                                                <span>Note: New Incoterms 2020 has been published recently</span>
                                            
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFour">
                <a href="#collapseFour" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <p class="mb-0">What are the Risks Specifically Excluded from Marine Insurance?</p>
                </a>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="infraFour" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Wilful Misconduct of the Assured</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Ordinary leakage, ordinary loss in weight or volume or ordinary wear and tear of the subject-matter insured	Ordinary leakage, ordinary loss in weight or volume or ordinary wear and tear of the subject-matter insured</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Insufficiency or unsuitability of packing</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Inherent vice or nature of the subject-matter insured</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Delay</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Insolvency or financial default of owner, manager, charters or operators of the vessel</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Unfitness/ Unseaworthiness of carrying conveyance</li>

</ul>
</div>
                </div>
              </div>
            </div><!-- card-->
             <div class="card">
              <div class="card-header" id="infraFive">
                <a href="#collapseFive" class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <p class="mb-0">What are Common Warranties, Conditions and Exclusions?</p>
                </a>
              </div>
              <div id="collapseFive" class="collapse" aria-labelledby="infraFive" data-parent="#accordion">
                <div class="card-body">
             Below are some general conditions or warranties attached to a marine insurance policy:
                               <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Rusting, oxidation, discoloration and corrosion are excluded unless caused by ICC(B) perils</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Institute Replacement clause</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Pair and set clause</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Second hand Replacement clause</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Excluding Mechanical, Electrical and Electronic derangement unless caused by ICC (B)/ITC (B) perils</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Over Dimensional Cargo Survey Warranty</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Warranted that losses due to adulteration, contamination and deterioration of quality is excluded</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Warranted that goods are transported in closed wagons and/or trucks to be covered with tarpaulin or any other water proof material to avoid ingress of water</li>

</ul>
</div>
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
                <p class="mb-0">What is Marine Cargo/Transit insurance?</p>
              </a>
            </div>
            <div id="collapsesix" class="collapse" aria-labelledby="aboutOne" data-parent="#accordion">
              <div class="card-body">
             Marine Cargo insurance / Transit Insurance covers the loss or damage of cargo / goods in ordinary course of transit between the points of origin and the final destination
Marine insurance covers Movement of goods from one place to another:
 
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Within the country(Inland)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  From India to Country outside India(Export)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp From Country outside India to India(Import)</li>

</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutTwo">
              <a href="#collapseseven" class="collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                <p class="mb-0">Who can buy Marine/Transit Cargo Insurance?</p>
              </a>
            </div>
            <div id="collapseseven" class="collapse" aria-labelledby="aboutTwo" data-parent="#accordion">
              <div class="card-body">
                  Any person with insurable interest in the goods in transit can insure. Further the policy can be assigned freely to any person who acquires insurable interest during transit of the cargo

              <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Exporters.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Importers</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Manufacturers</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Traders.</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Merchant Exporters
</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Contractors of Projects
</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Logistics Operators

</li>

<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  C&F Agents
</li>


</ul>
</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="aboutThree">
              <a href="#collapseeight" class="collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                <p class="mb-0">What are the types of cargo that can be covered in Marine Cargo Insurance?</p>
              </a>
            </div>
            <div id="collapseeight" class="collapse" aria-labelledby="aboutThree" data-parent="#accordion">
              <div class="card-body">
                  The types of cargo / commodities are:

             <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp General Cargo: Ex. Furniture, spare parts, footwear, electronic items, food items, textiles etc
Metals: Plastic, iron and steel rolls, leather</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Machinery: Ex. Standard size in containers. oversize in bulk or open top containers
Liquid Bulk Cargo: Ex. Crude oil, edible oil, etc</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Dry Bulk Cargo : Ex. Coal, grain, ore and other similar products in loose form
Above commodities / cargo can be covered depending on the risk involved in it</li>

</ul>
</div>
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutFour">
              <a href="#collapsenine"   class="collapsed" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                <p class="mb-0">What is per sending Limit?</p>
              </a>
            </div>
            <div id="collapsenine" class="collapse" aria-labelledby="aboutFour" data-parent="#accordion">
              <div class="card-body">
           Per Sending limit represents the maximum sum insured amount that in the event of a claim of any one consignment or shipment whilst the goods are in ordinary course of transit
               
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutFive">
              <a href="#collapseten"  class="collapsed"  data-toggle="collapse" data-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                <p class="mb-0">What is Sum Insured?</p>
              </a>
            </div>
            <div id="collapseten" class="collapse" aria-labelledby="aboutFive" data-parent="#accordion">
              <div class="card-body">
          Sum insured is the total value of the goods in transit including freight, taxes and any other port handling charges. This is the maximum amount which is payable in the event of a total loss of the insured cargo
The sum insured will comprise of the following:
 
               <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Cost of the goods either on (CIF)/FOB/C & F (Depending on the INCO term)
</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp  Clearing charges and internal freight
</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Customs Duty</li>

</ul>
</div>
              </div>
            </div>
          </div>
            <div class="card">
            <div class="card-header" id="aboutSix">
              <a href="#collapseeleven"  class="collapsed" data-toggle="collapse" data-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                <p class="mb-0">What does Perils of the Sea means?</p>
              </a>
            </div>
            <div id="collapseeleven" class="collapse" aria-labelledby="aboutSix" data-parent="#accordion">
              <div class="card-body">
         Perils of the sea means fortuitous accidents or casualties of the seas, but does not include ordinary action of the wind and waves
               
              </div>
            </div>
          </div>
            
        </div><!-- accordion-->
      </div><!-- tab2 -->

             <div id="tab3" class="tab-pane fade show ">
          <div class="accordion">
            <div class="card">
              <div class="card-header" id="claimOne">
                <a href="#claimones" class="collapsed"  data-toggle="collapse" data-target="#claimones" aria-expanded="false" aria-controls="claimones">
                  <p class="mb-0">
                What are the types of Marine claims?
                  </p>
                </a>
              </div>
              <div id="claimones" class="collapse" aria-labelledby="claimOne" data-parent="#accordion">
                <div class="card-body">
              <p>
                                                    <small>Partial Loss (Particular Average) :</small> Particular Average means partial loss of the subject matter insured although 
                                                    not appearing in the Clauses directly, all three sets of ICC covers particular average in full
                                                </p>
                                                <p>
                                                    <small>Total Loss :</small> The goods are completely destroyed. The assured is irretrievably deprived of the goods. 
                                                    The goods are no longer the thing insured (loss of specie). The goods are on a ship that has been posted
                                                    as missing. Total loss can be an Actual Total Loss or Constructive Total Loss
                                                </p>
                                                <p>
                                                    <small>General Average (GA) :</small> This occurs when the insured goods are partly or totally sacrificed in a general
                                                    Average act. Provided the GA does not arise from any of the exclusions expressed in the Clauses, the
                                                    underwriter is liable for the sum insured if the sacrifice results in a total loss of the goods or the proportion
                                                    of the sum insured produced by applying the percentage of depreciation caused by the sacrifice to the SI (Sum Insured), 
                                                    if only part of the goods is sacrificed
                                                </p>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="claimtwo">
                <a href="#claimtwos" class="collapsed" data-toggle="collapse" data-target="#claimtwos" aria-expanded="false" aria-controls="collapseTwo">
                  <p class="mb-0">What is General Average?</p>
                </a>
              </div>
              <div id="claimtwos" class="collapse" aria-labelledby="claimtwo" data-parent="#accordion">
                <div class="card-body">
                    GA (General Average) is a sacrifice or expenditure made or incurred by one of the parties to the maritime adventure for the purpose of saving all of the property insured in such maritime adventure”. All loss which arises in consequence of extraordinary sacrifice made or expenses incurred for the preservation of the ship and cargo comes within general average and must be borne proportionately by all who are interested
              
                </div>
              </div>
            </div><!-- card-->
               <div class="card">
              <div class="card-header" id="claimthree">
                <a href="#claimthrees" class="collapsed" data-toggle="collapse" data-target="#claimthrees" aria-expanded="false" aria-controls="claimthrees">
                  <p class="mb-0">What are the documents required to lodge a claim?</p>
                </a>
              </div>
              <div id="claimthrees" class="collapse" aria-labelledby="claimthree" data-parent="#accordion">
                <div class="card-body">
                    <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Invoice copy</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp LR (Lorry Receipt) copy</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Final Repair Bill</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Photographs (In case of damage claim)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Risk Location Repair Estimate (If repairable) claim</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Shortage Certificate (In case of shortage</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp FIR copy</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Driving License, RC Book of transporters Vehicle</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Salvage Bill</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Discharge voucher</li>
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
                 What are the types of Marine/ Transit cargo Policies?
                  </p>
                </a>
              </div>
              <div id="policyones" class="collapse" aria-labelledby="policyOne" data-parent="#accordion">
                <div class="card-body">
              <div class="list">
                  <p><center>Marine Single Transit Policy
</center></p>
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Covers single consignment from one location/port to another location/port</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp It is suitable for those firms who seldom require marine cargo policies in the course of their trade</li>

</ul>
 <p><center>Marine Open Declaration Policy: (MOP)

</center></p>
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Covers single consignment from one location/port to another location/MOP is an annual arrangement between the insured and the insurer to provide coverage to all the shipments/transits on pre-arranged terms and conditions for a particular leg (Domestic/Import/Export)
</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp Open inland policy is a declaration based policy where insured has to make periodic declaration (Monthly) of sum insured utilization
</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp Certificates are issued for individual transits and are treated as sum insured utilization for open import/export policy

</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp Insurer’s maximum liability is restricted to a pre agreed limit per sending and limit per location

</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp Policy period of one year at an initial Sum Insured which can be enhanced during the duration of the policy

</li>

</ul>

 <p><center>Sales Turnover Policy:


</center></p>
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp It’s a wider form of Marine Open Policy and is issued on the basis of annual sales turnover – both domestic and exports, all transits/voyages deemed to be held covered without specific declaration. (Import, Export or Inland)

</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp Sum Insured and premium is based on the estimated annual Sales Turnover of goods movement under various legs of transit

</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>&nbsp Certificates are issued for individual transits

</li>


</ul>
</div>
                </div>
              </div>
            </div><!-- close card-->
            <div class="card">
              <div class="card-header" id="policyTwo">
                <a href="#policytwos" class="collapsed" data-toggle="collapse" data-target="#policytwos" aria-expanded="false" aria-controls="policytwos">
                  <p class="mb-0">What information does the Insurer need to provide quotation?</p>
                </a>
              </div>
              <div id="policytwos" class="collapse" aria-labelledby="policyTwo" data-parent="#accordion">
                <div class="card-body">
                <div class="list">
<ul class="text-left">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Basic Client Information</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Type of Cover (All risk (A) or basic coverage (B))</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Policy Duration</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Nature of Commodity and its description</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Value of cargo (Sum Insured)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Custom Duty (In case of Import)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Packing Description</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Mode of Conveyance (Sea, Air, Rail, Road or Courier)</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Claim Experience</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Basis of Valuation</li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp Per Sending and Per Location Limit</li>
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
          <p style="font-size:11px;margin-left:115px">Designed By <a href="https://bissogo.com/" target="_blank">Bissogo</a>.</p>
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