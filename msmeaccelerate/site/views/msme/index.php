<?php

if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}
include ('header.php');
include("connect.php");

include("bookconsultation.php");
// echo '<script>alert("Just an alert for alerting to pay salary for employees")</script>';
?>


    <div class="page-banner home-banner">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1 class="mb-4">MSME Insurance</h1>
            <p class="text-lg mb-5">Get comprehensive solutions to secure your business</p>
          </div>
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place">
              <img src="assets/service/banner.png" alt="">
            </div>
          </div>
               <div class="container">
        <div class="row">
            <ul class="container-thumb msme">
                <li>
                    <div  class="msmestyle" style="background-color:#ffbfbf;border:1px solid #ffbfbf">
                    <a href="https://raghnall.msmeaccelerate.in/group-health-insurance/"><img src="assets/images/icon 5.png" alt="Open Bootstrap Modal on Image Click Using jQuery" id="Myimg"><p style="text-align:center;">Employee Benefits</p></a>
<!--               <div class="modal fade modalcenter" id="Mymodal">-->
<!--	<div class="modal-dialog">-->
<!--		<div class="modal-content">-->
<!--			<div class="modal-header">-->
			 
<!--				<h4 class="modal-title">-->
<!--               	Employee Benefits-->
<!--              </h4>                                                          -->
<!--		</div> -->
<!--			<div class="modal-body">-->
<!--				<form id="MyForm">-->
<!--					<label><a href="workmen-insuranace">Workmen's Compensation</a></label><br>-->
				
<!-- 					<label><a href="group-health-insurance">Group Health Insurance</a></label>-->
					
  					
<!--				</form>-->
<!--		</div>  -->
<!--			<div class="modal-footer">-->
<!--				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        -->
<!--			</div>-->
<!--		</div>                                                                       -->
<!--	</div>                                      -->
<!--</div>-->
             

                    </div>
                       
                    </li>
                <li>
                    <div class="msmestyle" style="background-color:#bcf2ba;border:1px solid #bcf2ba">
                     <a href="https://raghnall.msmeaccelerate.in/marine-transist/">   <img src="assets/images/icon 2.png" alt="" id="myMarine">
                    <p style="text-align:center;">Marine</p></a>
<!--<div class="modal fade modalcenter" id="Mymodalmarine">-->
<!--	<div class="modal-dialog">-->
<!--		<div class="modal-content">-->
<!--			<div class="modal-header">-->
			 
<!--				<h4 class="modal-title">-->
<!--               	Marine-->
<!--              </h4>                                                          -->
<!--		</div> -->
<!--			<div class="modal-body">-->
<!--				<form id="MyForm" action="" method="post">-->
<!--					<label><a href="marine-transist">Marine Transit Insurance (Inland)</a></label><br>-->
				
<!-- 					<label><a href="marine-open">Marine Open Insurance</a></label>-->
					
  					
<!--				</form>-->
<!--		</div>  -->
<!--			<div class="modal-footer">-->
<!--				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        -->
<!--			</div>-->
<!--		</div>                                                                       -->
<!--	</div>                                      -->
<!--</div>-->
                    </div>
                    
                </li>
                <li>
                    <div class="msmestyle" style="background-color:#c6dfff;border:1px solid #c6dfff;">
                      <a href="https://raghnall.msmeaccelerate.in/laghu-udayam/">  <img src="assets/images/icon 3.png" alt="" id="myProperty">
                    <p style="text-align:center;">Property</p></a>
<!--                    <div class="modal fade modalcenter" id="Mymodalproperty">-->
<!--	<div class="modal-dialog">-->
<!--		<div class="modal-content">-->
<!--			<div class="modal-header">-->
			 
<!--				<h4 class="modal-title">-->
<!--               	Property-->
<!--              </h4>                                                          -->
<!--		</div> -->
<!--			<div class="modal-body">-->
<!--				<form id="MyForm" action="" method="post">-->
<!--					<label><a href="sookshma-udayam">Bharat Sookshma Udyam Suraksha Policy</a></label><br>-->
				
<!-- 					<label><a href="griha-raksha">Bharat Griha Raksha Policy</a></label><br>-->
<!-- 					<label><a href="laghu-udayam">Bharat Laghu Udyam Suraksha Policy</a></label>-->
					
  					
<!--				</form>-->
<!--		</div>  -->
<!--			<div class="modal-footer">-->
<!--				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        -->
<!--			</div>-->
<!--		</div>                                                                       -->
<!--	</div>                                      -->
<!--</div>-->
                    </div>
                    
                </li>
                <li>
                    <div class="msmestyle" style="background-color:#fee7b2;border:1px solid #fee7b2">
                      <a href="https://raghnall.msmeaccelerate.in/contractor/"> <img src="assets/images/icon 4.png" alt="" id="myEngineering">
                    <p style="text-align:center;">Engineering</p></a>
<!--                                        <div class="modal fade modalcenter" id="Mymodalengineering">-->
<!--	<div class="modal-dialog">-->
<!--		<div class="modal-content">-->
<!--			<div class="modal-header">-->
			 
<!--				<h4 class="modal-title">-->
<!--               	Engineering-->
<!--              </h4>                                                          -->
<!--		</div> -->
<!--			<div class="modal-body">-->
<!--				<form id="MyForm" action="" method="post">-->
<!--					<label><a href="contractor">Contractor's All Risk</a></label><br>-->
				
<!-- 					<label><a href="plant-machinery">Contractor's Plant and Machinary</a></label><br>-->
<!-- 					<label><a href="erection">Erection All Risk</a></label>-->
					
  					
<!--				</form>-->
<!--		</div>  -->
<!--			<div class="modal-footer">-->
<!--				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        -->
<!--			</div>-->
<!--		</div>                                                                       -->
<!--	</div>                                      -->
<!--</div>-->
                    </div>
                    
                </li>
                <li>
                     <div class="msmestyle" style="background-color:#b09e99;border:1px solid #b09e99">
                   <a href="https://raghnall.msmeaccelerate.in/director-insuranace/"><img src="assets/images/icon 1.png" alt="" id="myLiability">
                    <p style="text-align:center;">Liability</p></a> 
<!--<div class="modal fade modalcenter" id="Mymodalliability">-->
<!--	<div class="modal-dialog">-->
<!--		<div class="modal-content">-->
<!--			<div class="modal-header">-->
			 
<!--				<h4 class="modal-title">-->
<!--               	Liability-->
<!--              </h4>                                                          -->
<!--		</div> -->
<!--			<div class="modal-body">-->
<!--				<form id="MyForm" action="" method="post">-->
<!--					<label><a href="profeesional-ca">Professional indemnity for CA</a></label><br>-->
				
<!-- 					<label><a href="profeesional-mp">Professional indemnity for medical practitioners</a></label><br>-->
<!-- 					<label><a href="corporate-cyber">Corporate cyber insurance</a></label><br>-->
<!-- 					<label><a href="director-insuranace">Directors & Officers Insurance</a></label><br>-->
<!-- 					<label><a href="general-liability">Comprehensive General Liability Insurance</a></label>-->
					
  					
<!--				</form>-->
<!--		</div>  -->
<!--			<div class="modal-footer">-->
<!--				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        -->
<!--			</div>-->
<!--		</div>                                                                       -->
<!--	</div>                                      -->
<!--</div>-->
                    </div>
                </li>
            </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>
    <!--<div class="page-section">
      <div class="container">
        <div class="text-center wow fadeInUp">
         
          <h2 class="title-section"> <span class="marked">MSME </span> Accelerate</h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row mt-5 text-center">
          <div class="col-lg-4 py-3 wow fadeInUp">
            <div class="display-3"> <img src="assets/service/employee.svg"></div>
            <h5>Employee Benefits</h5>
          
          </div>
          <div class="col-lg-4 py-3 wow fadeInUp">
            <div class="display-3"> <img src="assets/service/marine.svg"></div>
            <h5>Marine</h5>
           
          </div>
          <div class="col-lg-4 py-3 wow fadeInUp">
            <div class="display-3"> <img src="assets/service/property.svg"></div>
            <h5>Property</h5>
           
          </div>
        </div>
         <div class="row mt-5 text-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <div class="display-3"> <img src="assets/service/enginerr.svg"></div>
            <h5>Engineering</h5>
           
          </div>
          <div class="col-lg-6 py-3 wow fadeInUp">
            <div class="display-3"> <img src="assets/service/liability.svg"></div>
            <h5>Liability</h5>
          
          </div>
          
        </div>
      </div> 
    </div> -->
    <!-- .page-section -->
 <!--<div class="page-section features">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="assets/img/icon_pattern.svg" alt="">
              </div>
              <div>
                <h5>Provide financial advice by our advisor</h5>
                <p>Copywrite, blogpublic realations content translation.</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="assets/img/icon_pattern.svg" alt="">
              </div>
              <div>
                <h5>Complete solutions for global organisations</h5>
                <p>Copywrite, blogpublic realations content translation.</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="assets/img/icon_pattern.svg" alt="">
              </div>
              <div>
                <h5>Provide financial advice by our advisor</h5>
                <p>Copywrite, blogpublic realations content translation.</p>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>  
  -->
  
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
              <input type="text" class="form-control" id="psw" placeholder="Enter  Your Name" name="name1">
            </div>
              
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Email Id</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Email Id" name="email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile Number</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter Mobile Number" name="phone">
            </div>
             <!--<div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Enter Comment</label>
              <textarea name="comment" class="form-control"></textarea>
            </div>-->
              <input type="hidden" name="route" value="/">
             
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>I agree to the terms and conditions</label>
            </div>
              <!--<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button>-->
              <!--<button type="submit" class="btn btn-success btn-block" name="send">Submit</button>-->
               <input type="submit" name="sub10" class="btn btn-success btn-block" onclick="alert('Thank you for your details. Our representative will connect with you shortly')">
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
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="assets/whatsnew/5031659.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight" style="justify-content: flex-end;">
            <h2 class="title-section">About <span class="marked">MSME</span> Accelerate</h2>
            <div class="divider"></div>
            <p style="text-align: justify;">MSME Accelerate is an ecosystem catering to the needs of Small, Medium, Micro Enterprises and Start-ups. We enable Insurance providers/Intermediaries to identify and evaluate risks unique to corporate and provide expert guidance on Insurance, Finance, Claims, Employee Wellness and other related matters.

</p>
            <p  style="text-align: justify;">

We believe that each company is unique in its business, structure and environment. That’s why there is no one size that fits for all with standard offering or one click support. We enable providers to assess your business scenario in detail and customize the tailor made program for you. We help you in valuation of your assets and liabilities to arrive at right mixture of coverage required at the right time with entire eco system support. We also enable Insurance Brokers and Agents with Modernized Tools, Marketing/Training contents and Technology to grow their brand and support their Insurance Business in this segment.
<p>
<b>We are backed by Technology but not blindly run by machines !!</b></p><br>

MSME Accelerate is a consulting arm of <a href="https://mititek.in/" target="_blank" style="color: red"><h6 class="title-section" style="display:inline"><span class="marked">Mititek Ventures. </span></h6></a>We enable Protection, don’t sell Insurance. 
          <!--   <div class="img-place mb-3">
              <img src="assets/img/testi_image.png" alt="">
            </div> -->
           <!--  <a href="#" class="btn btn-primary">More Details</a>
            <a href="#" class="btn btn-outline border ml-2">Success Stories</a> -->
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
 
  <div class="page-section client-section1">

 
      <div class="container-fluid">
 <div class="text-center wow fadeInUp">
           <h2 style="text-align: center;">MSME <span class="marked">Accelerate</span> Edge</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
         
          <div class="item wow zoomIn">
            <img src="assets/images/symb.png" alt="" height="150px" width="150px">
            <h6>Strong Brand Equity</h6>
          </div>
          <div class="item wow zoomIn">
            <img src="assets/images/symb 2.png" alt="" height="150px" width="150px">
            <h6>Extensive Service Network</h6>
          </div>
          <div class="item wow zoomIn">
            <img src="assets/images/symb 3.png" alt="" height="150px" width="150px">
            <h6>Comprehensive Product Portfolio</h6>
          </div>
          <div class="item wow zoomIn">
            <img src="assets/images/symb 4.png" alt="" height="150px" width="150px">
            <h6>Technology Differentiaton</h6>
          </div>
        </div>
      </div> <!-- .container-fluid -->
    </div> 

 <div class="page-section">
      <div class="container">
        <div class="text-center wow fadeInUp">
         <!--  <div class="subhead">Why Choose Us</div> -->
          <h2 class="title-section">Product <span class="marked">Strength</span></h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row mt-5 text-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
           <div class="leftsidebar">
            <div class="display-3"><img src="assets/service/fire.svg"></div>
            <h5>Fire</h5>
            <p style="text-align: justify;">Fire insurance policy covers damage and losses caused by fire and helps to cover the cost of replacement, repair or reconstruction of property.
We offer 250+ occupancy types, value added services & can assess risk through remote video and provide a recommendation report.</p>
</div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInUp" >
               <div  class="leftsidebar">
            <div class="display-3"><img src="assets/service/ship.svg"></div>
            <h5>Marine</h5>
            <p style="text-align: justify;">We offer variety of value-added services and customized solutions in our marine insurance.
Our loss control consulting services further enhance our value proposition. Our vast experience in logistics planning and execution of Over Dimensional Consignments (ODC) across India makes us a trusted insurance partner.</p>
          </div>
         </div>
        </div>
           <div class="row mt-5 text-center">
           <div class="col-lg-6 py-3 wow fadeInUp" >
                <div class="leftsidebar">
            <div class="display-3"><img src="assets/service/engineering.svg"></div>
            <h5>Engineering</h5>
            <p style="text-align: justify;">Our customized and unique solutions drafted by our technical experts for various industries put us at the forefront of risk management.
We continue to expand our footprint in this segment and provide value-added & risk management solutions to MSME, SME & corporate clients through our technology driven platforms.</p>
</div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInUp" >
            <div class="leftsidebar">
            <div class="display-3"><img src="assets/service/credit-card.svg"></span></div>
            <h5>Trade Credit</h5>
            <p style="text-align: justify;">Trade credit insurance (TCI) is a method for protecting a business against its commercial customers’ inability to pay for products or services, whether because of bankruptcy, insolvency, or political upheaval in countries where the trade partner operates.This policy will act as a safety net, protecting businesses from defaulting customers and the bad debts which would otherwise arise when a customer is unable to pay. 
Our customized and unique solutions drafted by our technical experts helps our customers to trade more securely and help businesses to make good risk decisions about who to trade with.
</p>
          </div>
          </div>
         
        </div>
       
      </div> <!-- .container -->
    </div> <!-- .page-section -->
    
    
   
    <div class="page-section bg-light">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">What's New</h2>
          <div class="divider mx-auto"></div>
        </div>
<div class="slider"> 
  <!-- picture 01 -->
  <div class="slide active-slide">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                 <img src="assets/whatsnew/Drone.jpg" width="300px" height="300px"> 
            <div class="testi-content">
                  <p>Drone Insurance/Remotely piloted aircraft insurance</p>
                 
                </div>
            </div>
            <div class="col-md-4">
                 <img src="assets/images/mobil.jpg" width="300px" height="300px"> 
            <div class="testi-content">
                  <p>Mobile Insurance</p>
                 
                </div>
            </div>
            <div class="col-md-4">
                 <img src="assets/whatsnew/Business shield.jpg" width="300px" height="300px"> 
            <div class="testi-content">
                  <p>Business Shield</p>
                 
                </div>
            </div>
        </div>
        
    </div>
  </div>
  <!-- picture 02 -->
  <div class="slide">
   <div class="container">
        <div class="row">
            <div class="col-md-4">
                 <img src="assets/whatsnew/Business shield.jpg" width="300px" height="300px"> 
            <div class="testi-content">
                  <p>Business Shield</p>
                </div>
            </div>
            <div class="col-md-4">
                 <img src="assets/images/pack.jpg" width="300px" height="300px"> 
            <div class="testi-content">
                  <p>Package Insurance</p>
                 
                </div>
            </div>
            <div class="col-md-4">
                 <img src="assets/whatsnew/Wedding Insurance.jpg" width="300px" height="300px"> 
            <div class="testi-content">
                  <p>Wedding Insurance</p>
                 
                </div>
            </div>
        </div>
        
    </div>
  </div>
  <!-- picture 03 -->
  
  
 
  
</div>  
<!-- Slider nav -->
<div class="slider-nav"> 
  <a href="" class="arrow-prev"><img src="https://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-prev.png"></a>
  <ul class="slider-dots">
    <li class="dot active-dot">&bull;</li>
    <li class="dot">&bull;</li>
    <!--<li class="dot">&bull;</li>
    <li class="dot">&bull;</li>
    <li class="dot">&bull;</li>-->
  </ul>
  <a href="" class="arrow-next"><img src="https://s3.amazonaws.com/codecademy-content/courses/ltp2/img/flipboard/arrow-next.png"></a> 
</div>
<!--End of slide show-->
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
  
    
  </main>

  <footer class="page-footer">
    <div class="container">
        
           <img src="assets/msmelogo.png" class="center" style="margin-top:-55px;" >

      <div class="row justify-content-center mb-5">
 
       
        <div class="col-lg-2 py-3">
          <h5>Employee Benefits</h5>
          <ul class="footer-menu">
            <li><a href="workmen-insuranace">Workmen's Compensation</a></li>
            <li><a href="group-health-insurance">Group Health</a></li>
          </ul>
        </div>
        <div class="col-lg-2 py-3">
          <h5>Marine Insurance</h5>
          <ul class="footer-menu">
            
            <li><a href="marine-transist">Marine Transist</a></li>
            <li><a href="marine-open">Marine Open</a></li>
            
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
            <li><a href="griha-raksha">Bharat Griha Raksha</a></li>
            <li><a href="sookshma-udayam">Bharat Sookshma Udyam</a></li>
            <li><a href="laghu-udayam">Bharat Laghu Udyam</a></li>
           
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Liability Insurance</h5>
          <ul class="footer-menu">
             <li><a href="corporate-cyber">Corporate Cyber</a></li>
            <li><a href="director-insuranace">Directors & Officers</a></li>
            
            <li><a href="profeesional-ca">Professional indemnity for CA</a></li>
            <li><a href="profeesional-mp">Professional indemnity for MP</a></li>
            <li><a href="general-liability">Comprehensive General</a></li>
            
            
          </ul>
        </div>
        <div class="col-lg-2 py-3">
            <h5>Engineering Insurance</h5>
             <ul class="footer-menu">
            <li><a href="contractor">Contractor's All Risk</a></li>
            <li><a href="plant-machinery">Contractor's Plant and Machinary</a></li>
            <li><a href="erection">Erection All Risk</a></li>
            </ul
        </div>
        
      </div>
      </div>
     
 <hr>
      <div class="row">
          <div class="col-sm-4 py-2">
              
               <p style="color:black"><i class="fa fa-phone mr-2"></i>9987764627</p>
                <p style="color:black"><i class="fa fa-envelope mr-2"></i>consult@raghnall.co.in</p>
          
          </div>
        <div class="col-sm-5 py-2">
           
          <p id="copyright"  style="font-size:13px">Copyrights &copy; 2022 All Rights Reserved By <a href="#"> MSME Accelerate</a>. </p>
          <p style="font-size:11px;margin-left:115px">Designed By <a href="http://bissogo.com/" target="_blank">Bissogo</a>.</p>
        </div>
        <div class="col-sm-3 py-2 text-right">
          <div class="d-inline-block px-3">
            <a href="assets/policy/MSME Accelerate Privacy Policy.pdf
" target="blank">Privacy</a>
          </div>
          <!--<div class="d-inline-block px-3">
            <a href="contact.html">Contact Us</a>
          </div>-->
        </div>
      </div>
    </div> <!-- .container -->
  </footer> <!-- .page-footer -->


  <script src="assets/js/jquery-3.5.1.min.js"></script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/vendor/wow/wow.min.js"></script>

  <script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <script src="assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

  <script src="assets/js/google-maps.js"></script>

  <script src="assets/js/theme.js"></script>
<script>
    
    var slideSpeed = 5000;

var main = function(){
    //Carousel
   setInterval(function() {timedDelay()}, slideSpeed);
   //arrow-next
   $('.arrow-next').click(function(e){
      e.preventDefault();
		
		var currentSlide = $('.active-slide');
		var nextSlide= currentSlide.next();

      var currentDot = $('.active-dot');
		var nextDot = currentDot.next();
		
		if(nextSlide.length === 0){
			nextSlide = $('.slide').first();
         nextDot = $('.dot').first();
		}
         
      currentSlide.fadeOut(600, function() {
         $(this).removeClass('active-slide');
		nextSlide.fadeIn(600).addClass('active-slide');
         
      currentDot.removeClass('active-dot');
		nextDot.addClass('active-dot');
      });
	});
   //arrow-prev
   $('.arrow-prev').click(function(e){
      e.preventDefault();
		
		var currentSlide = $('.active-slide');
		var prevSlide= currentSlide.prev();
      
      var currentDot = $('.active-dot');
		var prevDot = currentDot.prev();
		
		if(prevSlide.length === 0){
			prevSlide = $('.slide').last();
         prevDot = $('.dot').last();
		}
		
      currentSlide.fadeOut(600, function() {
         $(this).removeClass('active-slide');
		prevSlide.fadeIn(600).addClass('active-slide');
      
      currentDot.removeClass('active-dot');
		prevDot.addClass('active-dot');
      });
	});
};

//timedDelay function
function timedDelay() {

   var currentSlide = $('.active-slide');
	var nextTimedSlide = currentSlide.next();
	
	var currentDot = $('.active-dot');
	var nextDot = currentDot.next();
	
   if(nextTimedSlide.length === 0 ) {
		nextTimedSlide = $('.slide').first();
		nextDot = $('.dot').first();
	}
   
	currentSlide.fadeOut(600, function() {
		$(this).removeClass('active-slide');
	nextTimedSlide.fadeIn(600).addClass('active-slide');
		
		currentDot.removeClass('active-dot');
		nextDot.addClass('active-dot');
		});
}

$(document).ready(function(){
	$('#Myimg').click(function(){
  		$('#Mymodal').modal('show')
	});
	$('#myMarine').click(function(){
  		$('#Mymodalmarine').modal('show')
	});
	$('#myProperty').click(function(){
  		$('#Mymodalproperty').modal('show')
	});
	$('#myEngineering').click(function(){
  		$('#Mymodalengineering').modal('show')
	});
	$('#myLiability').click(function(){
  		$('#Mymodalliability').modal('show')
	});
	
});


$(document).ready(main);
</script>

</body>
</html>