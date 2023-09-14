<?php include("includes/header.php");?>
<style>
	.img-ban{
		max-width: 100%;
		margin-top: -10px;
    max-height: 400px;
	}

  .v-tab {
    overflow: hidden;
    justify-content: center;
    margin: 0 auto;
    display: flex;
    margin-top: 20px;
}

.v-tab .v-tablinks {
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    font-weight: bold;
    text-transform: uppercase;
}

.v-tabcontent {
    display: none;
    padding: 20px 12px;
    border-top: none;
}

.boot-tab-sec{
  margin-top: 30px;
   border: none;
  justify-content: center;
}


.boot-tab-li .boot-tab{
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    margin-right: 20px;
    border-radius: 50px;
    padding: 10px 33px;
    background-color: #f1f1f1;
    color: #000;
}

.nav-tabs .nav-item.show .nav-link, .nav-tabs .boot-tab.active {
    color: #fff;
    background-color: #eb631d !important;

}

form.v-home-form {
    width: 70%;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 3px 16px #00000019;
    text-align: left;
    margin: 0 auto;
}
  form.v-home-form h5 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}
</style>

<section style="background-color: #F9FBFE;" class="p-0">
  <div class="container">
    <div class="row">
        <div class="col-12">
        <div id="demo">
        <div id="owl-form-demo" class="owl-carousel">          
           <div class="item">
            <div class="innerforms">
              <div class="row align-items-center padding-new" style="flex-direction:row-reverse">
              <div class="col-lg-6">

                <div class="img-place text-center">
                    <form class="v-home-form" method="POST">
                      <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 ">
                          <h5>Get Quote</h5>
                        </div>
                        <div class="col-lg-12">
                          <input type="text" placeholder="Your Name" class="" name="name" id="name">
                        </div>
                        <div class="col-lg-12">
                          <input type="text" placeholder="Company Name" class="" name="company_name" id="company_name">
                        </div>
                        <div class="col-lg-12">
                          <input type="mail" placeholder="Email" class="" name="email" id="email">
                        </div>
                        <div class="col-lg-12">
                            <input type="tel" placeholder="Phone" class="" name="phone" id="phone">
                        </div>
                        <div class="col-lg-12">                       
                            <input type="tel" placeholder="Location" class="" name="location" id="location">
                        </div>
                        <div class="col-lg-12">
                          <select class="hs-input" name="number_of_employee" id="number_of_employee" >
                            <option  value="">Number of employees*</option>
                            <option value="7-15">7-15</option>
                            <option value="15-30">15-30</option>
                            <option value="31-50">31-50</option>
                            <option value="51-100">51-100</option>
                            <option value="101-500">101-500</option>
                            <option value="501-1000">501-1000</option>
                            <option value="1000+">1000+</option>
                          </select>

                        </div>

                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-2 p-0">
                              <input type="checkbox" class="" name="send_me_whatsapp" id="send_me_whatsapp" value="0">
                            </div>
                            <div class="col-10">
                              <span>Send me Whatsapp Update</span>
                            </div>
                          </div>


                        </div>
                        <span id="contact_error" class="error alert-message valierror"
                                                    style="display:none;"></span>
                                                <span id="contact_success" class="successmain alert-message"
                                                    style="display:none;"></span>
                        <div class="col-lg-12">
                          <button type="button" class="v-btn2 mt-3" onclick="quote_validation();" >Submit</button>
                        </div>
                      </div>
                    </form>
                </div>
                  <!-- <div class="img-place text-center"> -->
                  <!--   <img src="<?=base_url()?>site/views/img/banner-iserrve-1.gif" alt="GHI alt" class="img-ban"> -->
                  <!--  <img src="<?=base_url()?>site/views/img/home-iserrve.gif" alt="GHI alt" class="img-ban">-->

                  <!--</div> -->
                </div> 

              <div class="col-lg-6" style="margin-top: 30px">
                      <h4>Don’t Just Secure Healthcare for Your Workforce.</h4>
                      <h1 class="h1-landing">Revolutionize It With Comprehensive Employee Benefits Packages.</h1>
                      <div class="hero-desc"><p class="text-justify"> Discover the finest Employee Benefits Plans for Your Business.</p>
                  </div>
                 <div class="cta-btn">

                      <!-- <a class="v-btn  margin-20px-right" href="<?=base_url()?>get-quote"> -->
                <a class="v-btn" href="#" data-bs-toggle="modal" style="margin-right: 20px" data-bs-target="#talktoexpert"> 
                      GET QUOTE
                      </a>

                  <button type="button" class="v-btn2 margin-20px-right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Buy Now
                  </button>



              </div>
            </div>
            </div>
           </div>
          </div> 
          <div class="item">
          <div class="innerforms">
              <div class="row align-items-center padding-new" style="flex-direction:row-reverse">
              <div class="col-lg-6">

                <div class="img-place text-center">
                    <form class="v-home-form" method="POST">
                      <div class="row align-items-center justify-content-center">
                        <div class="col-lg-12 ">
                          <h5>Get Quote</h5>
                        </div>
                        <div class="col-lg-12">
                          <input type="text" placeholder="Your Name" class="" name="" id="">
                        </div>
                        <div class="col-lg-12">
                          <input type="text" placeholder="Company Name" class="" name="" id="">
                        </div>
                        <div class="col-lg-12">
                          <input type="mail" placeholder="Email" class="" name="" id="">
                        </div>
                        <div class="col-lg-12">
                            <input type="tel" placeholder="Phone" class="" name="" id="">
                        </div>
                        <div class="col-lg-12">                       
                            <input type="tel" placeholder="Location" class="" name="" id="">
                        </div>
                        <div class="col-lg-12">
                          <select class="hs-input" name="number_of_employee" id="" >
                            <option  value="">Number of employees*</option>
                            <option value="7-15">7-15</option>
                            <option value="15-30">15-30</option>
                            <option value="31-50">31-50</option>
                            <option value="51-100">51-100</option>
                            <option value="101-500">101-500</option>
                            <option value="501-1000">501-1000</option>
                            <option value="1000+">1000+</option>
                          </select>

                        </div>

                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-2 p-0">
                              <input type="checkbox" class="" name="send_me_whatsapp" id="" value="0">
                            </div>
                            <div class="col-10">
                              <span>Send me Whatsapp Update</span>
                            </div>
                          </div>


                        </div>
                        <span id="contact_error" class="error alert-message valierror"
                                                    style="display:none;"></span>
                                                <span id="contact_success" class="successmain alert-message"
                                                    style="display:none;"></span>
                        <div class="col-lg-12">
                          <button type="button" class="v-btn2 mt-3" onclick="quote_validation();" >Submit</button>
                        </div>
                      </div>
                    </form>
                </div>
                  <!-- <div class="img-place text-center"> -->
                    <!-- <img src="<?=base_url()?>site/views/img/banner-iserrve-1.gif" alt="GHI alt" class="img-ban"> -->
                  <!--  <img src="<?=base_url()?>site/views/img/home-iserrve.gif" alt="GHI alt" class="img-ban">

                  </div> -->
                </div>

              <div class="col-lg-6" style="margin-top: 30px">
                  <h4>Registration & Consultation</h4>
                      <h1 class="h1-landing">Infertility Services offered</h1>
                      
                  
                      <!-- <h4>Don’t Just Secure Healthcare for Your Workforce.</h4> -->
                      <!--<h1 class="h1-landing">Registration & Consultation</h1>-->
                      <div class="hero-desc"><p class=""> Semen Analysis,
Ultrasound,
Infertility Panel,<br>
IVF Package 1 cycle,
IVF Package 2 cycle,
IVF Package 3 cycle,<br>
Egg Freezing</p>
                  </div>
                  <div class="cta-btn">

                      <!-- <a class="v-btn  margin-20px-right" href="<?=base_url()?>get-quote"> -->
                <a class="v-btn" href="#" data-bs-toggle="modal" style="margin-right: 20px" data-bs-target="#talktoexpert"> 
                      Know More
                      </a>

                  <!--<button type="button" class="v-btn2 margin-20px-right" data-bs-toggle="modal" data-bs-target="#exampleModal">-->
                  <!--        Buy Now-->
                  <!--</button>-->



              </div>
            </div>
            </div>
           </div>
          </div>
          </div>

        </div>
    </div>

    <!-- <div class="customNavigation">-->
    <!--  <a class="btn prev">Previous</a>-->
    <!--  <a class="btn next">Next</a>-->
    <!--</div> -->
        </div>
    </div>
  </div>
</section>

  

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="v-title text-center">
          <h3>Explore our Universe of Employee Benefits</h3>
        </div>
        <span>Huge range of potential benefits for your team in one convenient ecosystem </span>
      </div>
    </div>
    <div class="row margin-20px-top">
      <div id="demo">
  <div id="ghi_slide_new" class="owl-carousel">
    <div class="item">
		<div class="v-compare bg-light-blue">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Career & Growth coaching</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">First and foremost requirement to perform at any workplace, get access to specialised career coach and counsellors</p>
          </div>
			</div>
          <div class="com-ico bg-blue">
            <img src="<?=base_url()?>site/views/img/compare_ico6.png" alt="">
          </div>
        </div>
	  </div>
	  <div class="item">
		<div class="v-compare bg-light-orange">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Workplace & Personal stress management</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Counselling & Resources to manage Mental Health on an ongoing basis</p>
          </div>
			</div>
          <div class="com-ico bg-orange">
            <img src="<?=base_url()?>site/views/img/compare_ico7.png" alt="">
          </div>
        </div>
	  </div>




	  <div class="item">
		<div class="v-compare bg-light-blue">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Specialist nutrition</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Nutrition counselling that focuses on flourishing and goes beyond standardised diet plans</p>
          </div>
			</div>
          <div class="com-ico bg-blue">
            <img src="<?=base_url()?>site/views/img/compare_ico8.png" alt="">
          </div>
        </div>
	  </div>
	  <div class="item">
        <div class="v-compare bg-light-orange">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Doctor consultation</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Get unlimited tele consultations with our doctors for free</p>
          </div>
			</div>
          <div class="com-ico bg-orange">
            <img src="<?=base_url()?>site/views/img/compare_ico1.png" alt="">
          </div>
        </div>
	  </div>


      <div class="item">
         <div class="v-compare bg-light-blue">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Discounts on Medicines</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Buy daily medicines at specially discounted prices</p>
          </div>
			 </div>
          <div class="com-ico bg-blue">
            <img src="<?=base_url()?>site/views/img/compare_ico2.png" alt="">
          </div>
        </div>
      </div>

      <div class="item">
         <div class="v-compare bg-light-orange">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Mental wellness</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Personal therapists and mental wellness tools</p>
          </div>
			 </div>
          <div class="com-ico bg-orange">
            <img src="<?=base_url()?>site/views/img/compare_ico3.png" alt="">
          </div>
        </div>
      </div>

      <div class="item">
         <div class="v-compare bg-light-blue">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Dental and Vision care</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Extra protection with dental and vision coverage to your plans
</p>
          </div>
			 </div>
          <div class="com-ico bg-blue">
            <img src="<?=base_url()?>site/views/img/compare_ico4_1.png" alt="">
          </div>
        </div>
      </div>

<div class="item">
         <div class="v-compare bg-light-orange">
          <div class ="com-ico-det">
          <div class="com-ico-head">
            <h5>Holistic Wellbeing</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Wellness benefits that go beyond mental and physical health with curated options designed for your team</p>
          </div>
			 </div>
          <div class="com-ico bg-orange">
            <img src="<?=base_url()?>site/views/img/compare_ico5.png" alt="">
          </div>
        </div>
      </div>


        	  <div class="item">

		<div class="v-compare bg-light-blue clickable1">

          <div onclick="window.location.href = 'https://www.raghnall.co.in/cyber-insurance/assessment';" style="cursor: pointer" class ="com-ico-det">

          <div class="com-ico-head">
            <h5>Cyber Theft Scanner</h5>
          </div>
          <div class="com-desc">
            <p class="text-justify">Assess your cyber risk and check if your personal data has been exposed, using our cyber theft scanner tool</p>
          </div>
			  <p class="text-justify clickable-m"> Click to assess your Cyber risk. </p>
			</div>
          <div class="com-ico bg-blue"><a href="https://www.raghnall.co.in/cyber-insurance/assessment">
			  <img src="<?=base_url()?>site/views/img/img-icon2.png" alt=""></a>
			  </div>

        </div>

	  </div>






      </div>


  </div>
   </div>
</div>

</section>





<!-- <section class="bg-light-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="v-title text-center">
          <h3>Table of Content</h3>
        </div>
      </div>
    </div>
    <div class="row margin-20px-top">
      <div class="col-lg-12">
          <div class="list-tbl  align-items-center row">
            <div class="col-lg-6">
            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p ><a href="#ghi1">What is Group Health Insurance?</a></p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p><a href="#ghi2">Importance of Group Health Insurance?</a></p>
            </div>
          </div>
            <div class="col-lg-6">
            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p><a href="#ghi3">Advantages of Group Health Insurance?</a></p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p><a href="#ghi4">Features  of Group Health Insurance?</a></p>
            </div>
          </div>
          <div class="col-lg-6">

            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p><a href="#ghi5">Why buy Group Health Insurance from raghnall?</a></p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p><a href="#ghi6">Who should buy Group Health Insurance?</a></p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p><a href="#factor">Factors before purchasing GHI for your Employees</a></p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="list_tbl_ico">
              <i class="fas fa-check-circle"></i>
              <p><a href="#faq">Frequently Asked Questions</a></p>
            </div>
          </div>

      </div>

    </div>
  </div>
</section> -->

	<section>
  <div class="container">
  <div class="row">
      <div class="col-lg-12 text-center">
        <div class="v-title text-center">
          <h3>All-round protection with Comprehensive Health Benefits</h3>
        </div>
   <!--      <span>All-round protection with Comprehensive Health Benefits</span>-->
      </div>
    </div>
    <div class="row margin-20px-top">
      <div id="demo">
  <div id="ghi_slide1" class="owl-carousel">
    <div class="item">
        <div class="v-ico-sec">
          <div class="v-ivo">
            <img src="<?=base_url()?>site/views/img/super-top.png" alt="">
          </div>
          <div class="ico-head">
            <h5 class="f-size"><a href="#"> Enhanced coverage at affordable rates </a></h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Medical inflation in India stands at around 20% at present and health care costs are rising. Average coverage offered by employers is between 2 to 5 lacs which is not enough. Offer your employees an additional layer of security on top of their existing group health insurance policy which is also cost effective. </p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="v-ico-sec">
          <div class="v-ivo">
            <img src="<?=base_url()?>site/views/img/gci.png" alt="">
          </div>
          <div class="ico-head">
            <h5 class="f-size"><a href="#">Financial protection against cyber frauds</a></h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Humans need life and health insurance to protect their property – that's their life. However, in this digital era, it is also important to protect your employees from the dangers of the cyber world. Cyber Insurance protects your employees against any financial losses incurred online and ensures that they are protected if anything goes wrong.</p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="v-ico-sec">
          <div class="v-ivo">
            <img src="<?=base_url()?>site/views/img/gpi.png" alt="">
          </div>
          <div class="ico-head">
            <h5 class="f-size"><a href="#">Coverage against accidental injuries</a></h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Getting a Group Personal Accident policy is one of the prime things to do while trying to protect your employees. Group Personal Accident Insurance understands that employees are the most important asset of any organization and therefore it offers protection against several types of unfortunate events that can cause death or permanent disablement to the insured. </p>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="v-ico-sec">
          <div class="v-ivo">
            <img src="<?=base_url()?>site/views/img/hosp.png" alt="">
          </div>
          <div class="ico-head">
            <h5 class="f-size"><a href="#">Financial security in case of unexpected critical situations</a></h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Cardiac arrests or Illnesses like Cancer, lever diseases have been on the rise today. Employers are expected to be supportive through the journey of prolonged treatments for such illnesses. Group critical Illness insurance helps employees prepare financially for an unexpected life event. The lump-sum benefit can be used any way to help cover costs such as child care, mortgage payments or out-of-pocket medical costs.</p>
          </div>
        </div>
      </div>


  </div>
</div>
    </div>
  </div>
</section>

<section id="ghi1">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 ">
          <div class="v-title ">
          <h3>What is Group Health Insurance ?</h3>
        </div>
        <p class="margin-20px-top text-justify">
         Group Health Insurance is an umbrella policy offered to a group of Individuals. It is a type of health insurance plan mostly purchased by organizations, small and large, to meet the medical needs of their employees and their family. The policy covers indemnification of medical expenses incurred by the insured during hospitalization due to any illness or injury suffered in India. Further, this policy also covers all your pre-existing diseases from day 1 without any waiting period. Organizations can either select a pre-designed plan or can customize the policy as per their requirements. Unlike individual health insurance plans, Group Health Insurance is an affordable option plus, employers are also eligible for tax deductions for the premium paid for this policy.
        </p>
      </div>
      <div class="col-lg-6 offset-lg-1">
        <img src="<?=base_url()?>site/views/img/about_ghi.png" alt="">
      </div>
    </div>
  </div>
</section>

<section class="bg-blue-light" id="ghi2">
    <div class="container">
        <div class="row">
        <div class="v-title text-center">
          <h3>Importance of Group Health Insurance</h3>
        </div>
            <span class="text-center ">Group Health Insurance has today graduated from being a tool for attracting talent to becoming one of the most vital arms of an employer's retention philosophy.</span>

            <div class="row margin-20px-top">
                <div class="col-lg-6 margin-20px-top">
                    <div class="v-ico-sec1">
          <div class="v-ivo1">
            <img src="<?=base_url()?>site/views/img/ad5.png" alt="">
          </div>
          <div class="ico-head">
            <h5>Security & Loyalty</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">
				The sense of security that a GHI brings to an employee is unparalleled. If anything, Covid has only increased this sense of security. With medical inflation rising at around 20% per annum and the employer’s inability to provide employees with commensurate hike in salaries, employee health insurance has become one of the most valuable tools in the employer’s arsenal. This aspect of security in turn breeds loyalty in the employee.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 margin-20px-top">
                    <div class="v-ico-sec1">
          <div class="v-ivo1">
            <img src="<?=base_url()?>site/views/img/imp1.png" alt="">
          </div>
          <div class="ico-head">
            <h5>Attraction & Retention</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Even as job markets shrink, the hunt for cream talent has intensified. There's a limit to the amount of salary an employer is willing to pay, even for the right talent. It is in situations like these a good health insurance for employees can help you seal the deal. In the same vein, GHI is also an extremely important retention tool. Smart Employers incorporate a higher (than market standard) Sum Insured along with a top up policy for the right employees. GHI policies can also be tailor made to incorporate coverage of pre-existing diseases from day 1,(which is not possible for personal policies as it has a waiting period), annual health checks for employees and family members. Perks like these make the smart employee think a thousand times before they switch.</p>
          </div>
        </div>
      </div>
   <!--   <div class="col-lg-4 margin-20px-top">
                    <div class="v-ico-sec1">
          <div class="v-ivo1">
            <img src="img/mat.png" alt="">
          </div>
          <div class="ico-head">
            <h5>Possibility of hospitalization and treatment</h5>
          </div>
          <div class="ico-desc">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium repellendus possimus ipsa libero molestiae voluptatibus.</p>
          </div>
        </div>
      </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

 <section id="ghi3">
   <div class="container">
    <div class="row">
      <div class="v-title text-center">
          <h3>Advantages of Group Health Insurance</h3>
        </div>
            <span class="text-center">The policy covers benefits for the employee and their family</span>
    </div>
     <div class="row">
        <ul class="nav nav-tabs boot-tab-sec" role="tablist">
    <li class="boot-tab-li nav-item">
      <a class="boot-tab nav-link active" data-bs-toggle="tab" href="#home">FOR EMPLOYER</a>
    </li>
    <li class=" boot-tab-li nav-item">
      <a class="boot-tab nav-link" data-bs-toggle="tab" href="#menu1">FOR EMPLOYEES</a>
    </li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <div class="row margin-20px-top justify-content-center">
      <div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad1.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Low-Cost Premiums</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Since a group health insurance policy is spread over a group of people, the premium for the same is a lot cheaper than other health policies. </p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad2.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Tax Benefits</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">According to the Income Tax Department of India, companies offering their employees with a corporate health insurance can avail tax deductions and benefit from some tax savings!</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad3.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Attract and Retain top talent</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Employees are less likely to leave the organisation when they are happy, and the work culture is focused on people-centric policies. Offering employee health insurance as a benefit shows your employees that you care for them and gives them a positive outlook on your organisation, which in turn, leads to increased productivity</p>
        </div>
      </div>
      </div>
    </div>
    <!--<div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad4.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Boosts employee morale</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, autem asperiores commodi dolorem mollitia, id reprehenderit quas odit accusamus, quae minima dolores tempore similique assumenda officia ducimus eius aliquam voluptas?</p>
        </div>
      </div>
      </div>
    </div>-->
  </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
       <div class="row margin-20px-top justify-content-center">
      <div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad5.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Quick and easy claims process</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Employees don’t have to bear tedious settlements. With a group health insurance policy, they can simply route their hospital bills through the employer for easy reimbursement.</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad6.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Coverage at zero-cost</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Most employers typically include group health insurance plan in the annual benefits offered by the company. This means, the employees don’t have to pay for the premium of the same. At the same time. employees can also add their family members, including their parents, depending on the group health insurance plan their organisation selects. This helps in boosting company goodwill</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad7.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Waived off waiting periods</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">A huge differentiator between corporate medical insurance plans is the waiting period. A group health insurance for employees doesn’t have this limitation. By paying a small amount, employees get group medical coverage for pre-existing diseases from the first day of the policy. This waived-off waiting period is extended to their family as well.</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-6 margin-20px-top">
        <div class="v-ico-sec3">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/ad8.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>No Pre-Medical Tests Required</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Generally, in case of an individual health insurance, the insurer will most likely take up pre-medical tests before issuing and confirming the health insurance policy. However, in the case of a group health insurance plan the same is not required. Employees get their policies without the need to have to take any medical tests. </p>
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




<section class="bg-blue-light" id="ghi4">
  <div class="container">
    <div class="row">
      <div class="v-title text-center">
          <h3>Features of Group Health Insurance</h3>
        </div>
            <!-- <span class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span> -->
    </div>
    <div class="row margin-20px-top justify-content-center">
      <div class="col-lg-4 margin-20px-top">
        <div class="v-ico-sec4">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/hosp.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Hospitalization Expenses</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">In case your employee or their dependent get hospitalized due to an illness or an accident, this benefit will cover their medical expenses including pre and post hospitalization expenses, road ambulance charges, room rent, diagnosis, day care procedures, etc.</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-4 margin-20px-top">
        <div class="v-ico-sec4">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/f2.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>COVID-19 Hospitalization</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">In case your employee or his/her family members get hospitalized due to COVID – 19, their corporate health insurance will cover the cost for such hospitalization as well</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-4 margin-20px-top">
        <div class="v-ico-sec4">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/f3.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Maternity Benefit with New born Baby Cover</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">This is something many young working professionals worry about! This benefit can be opted to cover for child delivery expenses for your employee or their spouse. It also covers expenses in case of an infertility treatment or medically necessary terminations.</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-4 margin-20px-top">
        <div class="v-ico-sec4">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/f4.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Preventive Care</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Organizations can also opt for preventive benefits for their employees. Such benefits could range from OPD consultations, routine health check-ups and mental wellness support. This encourages employees to take better care of themselves proactively.</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-4 margin-20px-top">
        <div class="v-ico-sec4">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/f5.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Comprehensive Coverage</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Group health insurance plans can be easily enhanced through additional benefits. You can add benefits such as maternity, pre-existing disease, and accidental cover to the base policy</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-4 margin-20px-top">
        <div class="v-ico-sec4">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/f6.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Other Benefits</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">Group health insurance plan also includes additional benefits to cover for things such as Alternate Treatment (AYUSH), Organ Donation Expenses, Infertility Treatment and Bariatric Surgeries among others.</p>
        </div>
      </div>
      </div>
    </div>
    <div class="col-lg-4 margin-20px-top">
        <div class="v-ico-sec4">
          <div class="v-ico3">
            <img src="<?=base_url()?>site/views/img/f7.png" alt="">
          </div>
          <div class="ico3-flex">
          <div class="ico-head">
            <h5>Wellness Benefits</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">At Raghnall, we also offer a plethora of wellness benefits which makes your employee benefit offering even more attractive. This could range anywhere from educating employees on different aspects of health to providing them with doctor consultations or exclusive discounts on medicines, health check-ups, gym memberships, hospital locators, dental consultations and more.</p>
        </div>
      </div>
      </div>
    </div>

  </div>
  </div>
</section>

<section id="ghi5">
  <div class="container">
    <div class="row">
      <div class="v-title text-center">
          <h3>Why buy Group Health Insurance from Raghnall ?</h3>
        </div>
     <!-- <span class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>-->
    </div>
    <div class="row margin-20px-top">
        <div class="col-lg-4 margin-20px-top">
            <div class="v-check-flex text-center">
              <div class="v-check-ico">
                <i class="fas fa-check"></i>
              </div>
              <div class="ico-head">
            <h5>One Point of Contact</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">No need to coordinate with multiple points of contact and third parties. With Raghnall, you only need to stay in touch with us and no one else.</p>
        </div>
            </div>
        </div>
        <div class="col-lg-4 margin-20px-top">
            <div class="v-check-flex text-center">
              <div class="v-check-ico">
                <i class="fas fa-check"></i>
              </div>
              <div class="ico-head">
            <h5>Prevention and Protection both</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">At Raghnall, we provide the entire ecosystem of employee benefits in one place. You have access to a range of added benefits e.g., wellness services, expert consultation, health check-ups and many more.</p>
        </div>
            </div>
        </div>
        <div class="col-lg-4 margin-20px-top">
            <div class="v-check-flex text-center">
              <div class="v-check-ico">
                <i class="fas fa-check"></i>
              </div>
              <div class="ico-head">
            <h5>Seamless Claims Experience</h5>
          </div>
          <div class="ico-desc">
            <p class="text-justify">We offer and end-to-end claims handling service and ensure timely and hassle-free claims experience for your employees</p>
        </div>
            </div>
        </div>
    </div>
  </div>
</section>


<section id="ghi6">
  <div class="container">
    <div class="row">
       <div class="v-title text-center">
          <h3>Who should buy Group Health Insurance ?</h3>
        </div>
      <!--<span class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>-->
    </div>
    <div class="row margin-20px-top">
      <div class="col-lg-4">
        <div class="v-img-box">
          <div class="v-main-img">
            <img src="<?=base_url()?>site/views/img/wghi2.jpg" alt="">
          </div>
          <div class="v-img-head">
            <h5>Small Companies & Young Start-ups</h5>
          </div>
          <div class="v-img-desv">
            <p class="text-justify">As a start-up or a small business, if you have a team of 7 or more members, then you could sign up for a group health insurance plan that won’t only protect your employees but, will also help in your tax savings.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="v-img-box">
          <div class="v-main-img">
            <img src="<?=base_url()?>site/views/img/wghi1.jpg" alt="">
          </div>
          <div class="v-img-head">
            <h5>Medium Sized Companies & Growing Start-ups</h5>
          </div>
          <div class="v-img-desv">
            <p class="text-justify">If your small business is growing and thriving, and has between 50 and 1,000 employees, you fall under this category and can easily seek small business group health insurance. This won’t only help in increasing your employees’ happiness and motivation but will also help you retain them for longer.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="v-img-box">
          <div class="v-main-img">
            <img src="<?=base_url()?>site/views/img/wghi3.jpg" alt="">
          </div>
          <div class="v-img-head">
            <h5>Large Organizations & Established Start-ups</h5>
          </div>
          <div class="v-img-desv">
            <p class="text-justify">Being a large and established organization/start-up – employees expect benefits such as a health insurance as part of their package. So, if you have a company that has up to 1000 members or more, you need to provide medical insurance to them and their dependents to make sure they stay healthier and more engaged on the job.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-light-gray" id="factor">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="v-title ">
          <h3>Factors to be considered before purchasing Group Health Insurance for your employees</h3>
        </div>
     <!-- <span class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>-->
      </div>
    </div>
    <div class="row align-items-center" >
        <div class="col-lg-6">
          <div class="v-process-step">
            <div class="process-step-num">
              <span>1</span>
            </div>
            <div class="process-con">
              <div class="process-step-head">
                 <h5>Quick and effective accessibility</h5>
              </div>
              <div class="process-step-desc">
                <p class="text-justify">When you get a group health insurance, it’s not only the plan benefits that matter, but also how effective and responsive your insurer is as well. From the initial stage of seeking quotes till the final stages of assistance with claims, you need corporate health plans with providers who are easily accessible. </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="v-process-step">
            <div class="process-step-num">
              <span>2</span>
            </div>
            <div class="process-con">
              <div class="process-step-head">
                 <h5>Claims experience and settlement ratio</h5>
              </div>
              <div class="process-step-desc">
                <p class="text-justify">Always check the insurer’s claims experience, process and support. Verify the claim settlement ratio. Higher settlement ratios are always better!</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="v-process-step">
            <div class="process-step-num">
              <span>3</span>
            </div>
            <div class="process-con">
              <div class="process-step-head">
                 <h5>Service Benefits</h5>
              </div>
              <div class="process-step-desc">
                <p>When it comes to health insurance, service matters more than ever. After all, you need an insurer that will deal with healthcare matters with utmost care and sensitivity. Therefore, always evaluate and compare the service of different insurance providers before deciding on their group health insurance plan.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="v-process-step">
            <div class="process-step-num">
              <span>4</span>
            </div>
            <div class="process-con">
              <div class="process-step-head">
                 <h5>Customizable Plan</h5>
              </div>
              <div class="process-step-desc">
                <p class="text-justify">Always go for a plan that offers complete and seamless customisation. This will help you manage new/old employees and their dependants easily.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="v-process-step">
            <div class="process-step-num">
              <span>5</span>
            </div>
            <div class="process-con">
              <div class="process-step-head">
                 <h5>Meaningful Coverages</h5>
              </div>
              <div class="process-step-desc">
                <p class="text-justify">It is essential in a group health insurance policy to pick coverages that an employee actually finds valuable. Therefore, the kind of benefits provided in a group health insurance plan should be of utmost priority when choosing the best group health insurance plan for your employees. It is also important to add additional features in the policy that complements your group health insurance plan.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="v-process-step">
            <div class="process-step-num">
              <span>6</span>
            </div>
            <div class="process-con">
              <div class="process-step-head">
                 <h5>Premium</h5>
              </div>
              <div class="process-step-desc">
                <p class="text-justify">At the end of the day, money matters! That’s why, it is crucial to evaluate how much your group health insurance will cost you and if that makes sense with respect to the benefits offered or not. Compare the costs of different group medical insurance plans to see what works best for you. Don’t blindly go for cheaper premiums. The key is to choose corporate medical insurance in India which fall within your budget yet offer comprehensive benefits.</p>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</section>

<section id="faq">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="v-title text-center">
          <h3>FAQ (Frequently Asked Questions)</h3>
        </div>
      </div>
    </div>
    <div class="row margin-20px-top justify-content-center">
      <div class="col-lg-9">
         <button class="v-accordion">Is it mandatory to provide health insurance to employees in India?</button>
<div class="v-panel">
  <p class="text-justify">Yes, medical insurance has been made mandatory for employees by the government of India post the COVID-19 pandemic. This has been put in place to ensure that every employee has some form of protection with group health plans.</p>
</div>

<button class="v-accordion">Is Covid 19 covered under Group Health Insurance policy?</button>
<div class="v-panel">
  <p class="text-justify">Covid 19 is covered subject to minimum 24 hr of in-patient hospitalization.</p>
</div>

<button class="v-accordion">How many employees are required for a group health insurance policy?</button>
<div class="v-panel">
  <p class="text-justify">Teams as small as seven can be covered using a group health insurance policy. For example, you can also take a group health insurance policy if you're in a five-member team (and two spouses).</p>
</div>

<button class="v-accordion">Is group health insurance cheaper than individual health insurance?</button>
<div class="v-panel">
  <p class="text-justify">Yes. A group health insurance policy is five to ten times cheaper than an individual policy.</p>
</div>

<button class="v-accordion">Are group health insurance premiums tax-deductible</button>
<div class="v-panel">
  <p class="text-justify">For employers, the premium paid to provide group insurance policy for employees in India can be deemed as a business expense. According to the Indian Income Tax Act, 1961, this expense is eligible for tax benefits.</p>
</div>
		  <button class="v-accordion">How should start-ups get group insurance for employees?</button>
<div class="v-panel">
  <p class="text-justify">With group health insurance, there’s no one size fits all option - and that’s the best part! You can get group health insurance for start-ups as well as large businesses. You can pick a plan and customize it according to your team and your needs. Insurance for your team is like an investment.</p>


</div>

		  <button class="v-accordion">How much does group health insurance cost?
</button>
<div class="v-panel">
  <p class="text-justify">Group health insurance costs can vary based on the number of employees, sum insured, and benefits opted for.</p>
</div>
		  <button class="v-accordion">When should I get a group health insurance policy for my employees?</button>
<div class="v-panel">
  <p class="text-justify">Employer can initiate a request for quotation of the Group Health Insurance policy for their employees at any point of time. The employer has to specify the coverage requirement and a quote shall be given to them.</p>
</div>
		   <button class="v-accordion">Who all can be covered in a Group Health Insurance policy?</button>
<div class="v-panel">
  <p class="text-justify">Group health insurance is categorized in 2 categories:</p>
	<ul>
		<li>Employer-employee - Employees along with their spouse, children and parents can be covered</li>
		<li>Non employer-employee – The enrolled members are covered</li>
	</ul>
</div>

 <button class="v-accordion">Can I have a corporate health insurance and an individual health insurance policy both at same time?</button>
<div class="v-panel">
  <p class="text-justify">Yes, you can you have corporate health insurance and individual health insurance at the same time.</p>
</div>
		  <button class="v-accordion">What are the limitations of a Group Health Insurance?</button>
<div class="v-panel">
  <p class="text-justify">Group Health Insurance policy is customized and tailor made and the policies are designed as per the client’s requirements.  However, one of its biggest limitations is that, with respect to an employee the cover may not be enough to cover for all healthcare needs as most Group Health Insurance plans are limited and generic in nature.</p>
</div>

		  <button class="v-accordion">How is a Group Health Insurance different from an Individual Health Insurance?</button>
<div class="v-panel">
  <p class="text-justify">Group Health Insurance is a collective insurance an organization buys for the beneﬁt of its employees and employee’s dependents. The organization may tailor a plan or select a pre-planned insurance policy from an insurance company.</p>
	<p>Individual health insurance is one that an individual purchases for himself or their dependents.</p>
</div>
		  <button class="v-accordion">Can the policy be transferred from one insurance provider to another provider without losing the benefits?</button>
<div class="v-panel">
  <p class="text-justify">Yes, at the time of renewal of the policy for next tenure.</p>
</div>
		  <button class="v-accordion">What is the initial waiting period for Group Health Insurance?</button>
<div class="v-panel">
  <p class="text-justify">Usually, the initial waiting period in Group health policies is 30 Days. However, the same can be reduced or waived off as per the organization’s requirement.</p>
</div>
		  <button class="v-accordion">What is a waiting period?</button>
<div class="v-panel">
  <p class="text-justify">Expenses related to the treatment of any illness within 30 days from the first policy commencement date shall be excluded except claims arising due to an accident, provided the same is covered in the policy.</p>
</div>
		  <button class="v-accordion">What’s not covered in Group Health Insurance?</button>
<div class="v-panel">
  <p class="text-justify">Treatment on trial/experimental basis and any device/instrument/machine contributing/replacing the function of an organ; Holter Monitoring are outside the scope of the policy.</p>
	<p>Please refer the Policy Wordings for detailed list of exclusions</p>
</div>
		  <button class="v-accordion">What is a pre-existing disease? Are pre-existing diseases covered in group health insurance?</button>
<div class="v-panel">
  <p class="text-justify">The term ‘Pre-existing Disease’ means any condition, ailment or injury or illness or related condition (s) for which the insured had developed signs or symptoms, and/or were diagnosed and/or received medical advice/treatment, within 48 months prior to the first Policy with the company.</p>
	<p>Yes, Pre-existing disease is covered under Group Health Insurance policies.</p>
</div>
		  <button class="v-accordion">Is abortion covered under the Group Health policy?</button>
<div class="v-panel">
  <p class="text-justify">Abortion is covered, subject to prescription from doctor & under a critical condition during pregnancy. Voluntary abortion is not covered under the policy.</p>
</div>
		  <button class="v-accordion">Do I have to undergo medical tests to avail this health cover?</button>
<div class="v-panel">
  <p class="text-justify">Medical tests are not required to avail Group Health Insurance.</p>
</div>
		  <button class="v-accordion">What is a cashless facility? </button>
<div class="v-panel">
  <p class="text-justify">On admission to the hospital the insured can avail the cashless facility, where the cost of treatment is paid by the insurance company directly to the network hospital, provided the treatment undergone is in accordance with the policy terms and conditions.</p>
</div>

		  <button class="v-accordion">Are the dependents covered under the Group Health Insurance? </button>
<div class="v-panel">
  <p class="text-justify">The employees can avail the benefit of the coverage for his/her dependants under the Group Health Insurance. Dependants include spouse, children up to 25 years of age and parents up to 80 years of age.</p>
</div>


      </div>
    </div>
  </div>
</section>


<script>
    var acc = document.getElementsByClassName("accordion");

for (let i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    for (let j = 0; j < acc.length; j++) {
    acc[j].classList.remove("active");
      if(j!=i){
        acc[j].nextElementSibling.style.maxHeight = null;
      }
    }
    this.classList.add("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>






<script>
      var owl = $("#homeslide");

owl.owlCarousel({

  itemsCustom : [
    [0, 1],
    [400, 1],
[1023, 2],
    [1024, 2],
    [1600, 2]
  ],
  navigation : true,
pagination : true,
autoPlay :true,

});



$(document).ready(function() {

var owl = $("#homeslide");

owl.owlCarousel();


$(".next").click(function(){
  owl.trigger('owl.next');
})
$(".prev").click(function(){
  owl.trigger('owl.prev');
})

});
  </script>




<script>
var acc = document.getElementsByClassName("v-accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("v-active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<!--OWL Demo 2 Start-->
<script>
  $(document).ready(function() {
		var token = "<?php echo $_GET['token']?>";
    if(token != ''){
      $.ajax({
          url: '<?=base_url()?>employee/otpless_logindata',
          type: 'post',
          dataType:'json',
          data: 'token=' + token,
             success: function(response) {
							 if(response == 'fail'){
								 swal({
                      title: "Oops!",
                      text: "User does not exist!",
                      icon: "error",
                      buttons: false,
                      timer :2500,
                  });
							 }else if(response['optless_sess'] != ''){
								 		var mobile = response['optless_sess']['mobile'];
										var url = '<?=base_url()?>employee/login';
							 		 $.ajax({
							 				 url: url,
							 				 type: 'post',
							 				 data: 'mobile=' + mobile,
							 						success: function(response) {
							 							if(response == 'success'){
							 								window.location='<?=base_url()?>employee';
							 							}
							 						}
							 		 });
							 }
          }
      });
   }

    var owl = $("#ghi_slide1");

    owl.owlCarousel({

      itemsCustom : [
        [0, 1],
        [400, 1],
    [1023, 2],
        [1024, 2],
        [1600, 2]
      ],
      navigation : false,
  pagination : true,
  autoPlay :true,

    });



  });


 function loginuser(mobile){
		 var url = '<?=base_url()?>employee/login';
		 $.ajax({
				 url: url,
				 type: 'post',
				 data: 'mobile=' + mobile,
						success: function(response) {
							if(response == 'success'){
								location.reload();//window.location='<?=base_url()?>employee';
							}
						}
		 });
 }

  $(document).ready(function() {

    var owl = $("#ghi_slide1");

    owl.owlCarousel();


    $(".next").click(function(){
      owl.trigger('owl.next');
    })
    $(".prev").click(function(){
      owl.trigger('owl.prev');
    })

  });


  </script>



  <script>
  $(document).ready(function() {

    var owl = $("#ghi_slide_new");

    owl.owlCarousel({

      itemsCustom : [
        [0, 1],
        [400, 1],
    [1023, 2],
        [1024, 4],
        [1600, 4]
      ],
      navigation : false,
  pagination : true,
  autoPlay :true,

    });



  });


  $(document).ready(function() {

    var owl = $("#ghi_slide_new");

    owl.owlCarousel({

      itemsCustom : [
        [0, 1],
        [400, 1],
    [1023, 2],
        [1024, 4],
        [1600, 4]
      ],
      navigation : false,
  pagination : true,
  autoPlay :true,

    });



  });




  $(document).ready(function() {

    var owl = $("#ghi_slide_new");

    owl.owlCarousel();


    $(".next").click(function(){
      owl.trigger('owl.next');
    })
    $(".prev").click(function(){
      owl.trigger('owl.prev');
    })

  });

  function quote_validation(){

    var name = jQuery("#name").val();
    if (name == '') {

    //alert("name");
        jQuery('#contact_error').html("Please enter name");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var company_name = jQuery("#company_name").val();
    if (company_name == '') {

    //alert("name");
        jQuery('#contact_error').html("Please enter Company name");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }


    var email = jQuery("#email").val();
    if (email == '') {

    //alert("name");
        jQuery('#contact_error').html("Please enter email");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var em = jQuery('#email').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(em)) {
        jQuery('#contact_error').html("Please enter valid email");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var phone = jQuery("#phone").val();
    if (phone == '') {

    //alert("name");
        jQuery('#contact_error').html("Please enter phone");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var location = jQuery("#location").val();
    if (location == '') {
    
    //alert("name");
        jQuery('#contact_error').html("Please enter Location");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var number_of_employee = jQuery("#number_of_employee").val();
    if (number_of_employee == '') {

    //alert("name");
        jQuery('#contact_error').html("Please Select number of employee");
        jQuery('#contact_error').show().delay(0).fadeIn('show');
        jQuery('#contact_error').show().delay(2000).fadeOut('show');
        return false;
    }

    var send_me_whatsapp = jQuery("#send_me_whatsapp").val();
		$("#overlay,.loader").show();

    var url = '<?=base_url()?>home/quote_mail';

    jQuery.ajax({
        url: url,
        type: 'post',
        data: '&name=' + name + '&company_name=' + company_name + '&email=' + email + '&phone=' + phone + '&location=' + location + '&number_of_employee=' + number_of_employee + '&send_me_whatsapp=' + send_me_whatsapp ,


        success: function(msg) {
            //console.log(msg);
						//setTimeout(function() {
							 $("#overlay,.loader").hide();
						//}, 1000);
            if (msg == "1") {
                jQuery('#contact_success').html(
                    "Thank you for the Information. We will contact you soon.");
                jQuery('#loading').hide();
                jQuery('#stop_loading').show();
                jQuery('#contact_success').show().delay(0).fadeIn('show');
                jQuery('#contact_success').show().delay(5000).fadeOut('show');
                jQuery('#name').val('');
                jQuery('#company_name').val('');
                jQuery('#email').val('');
                jQuery('#phone').val('');
                jQuery('#location').val('');
                jQuery('#number_of_employee').val('');
								jQuery('#send_me_whatsapp').prop('checked', false); // Unchecks it
								window.location.hash = 'Thank-you';
                return false;

            } /*else if (msg == "0") {
                $("#contact_error").html("Invalid Captacha Code.");
                $('#contact_error').show().delay(0).fadeIn('show');
                $('#contact_error').show().delay(3000).fadeOut('show');
                return false;
            }*/ else {
                console.log("err");
            }
        }
    });


  }

  $("#send_me_whatsapp").on('change', function() {
  if ($(this).is(':checked')) {
    $('#send_me_whatsapp').val('1');
  } else {
    $('#send_me_whatsapp').val('0');
  }

});

$(document).on('click', '.whatsapp-login',function() {
			$("#overlay,.loader").show();
			$.ajax({
					url: '<?=base_url()?>employee/otpless_login',
					type: 'post',
					dataType:'json',
					success: function(response) {
							 if(response!=''){
								 setTimeout(function() {
										$("#overlay,.loader").hide();
								 }, 800);

								 window.location.replace(response['intent']);
							 }
					}
			});
});



  </script>

<script>
    $(document).ready(function() {
      var owl = $("#owl-form-demo");
      owl.owlCarousel({
        itemsCustom : [
          [0, 1],
          [400, 1],
          [1023, 1],
          [1024, 1],
          [1600, 1]
        ],
        navigation : false,
        pagination : true,
        autoPlay :true,
      });
    });
    $(document).ready(function() {
      var owl = $("#owl-form-demo");
      owl.owlCarousel();
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
    });
    </script>

<?php include("includes/footer.php"); ?>


