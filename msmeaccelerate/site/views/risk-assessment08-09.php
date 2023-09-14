<?php include("includes/header.php"); ?>

<section class="padding-25px-tb bg-blue4">
         <div class="container">
            <div class="row justify-content-center text-center margin-two-bottom">
               <h4 class="text-extra-dark-gray font-weight-600"><span class="text-blue1 font-weight-700">Raghnall Insurance</span> Risk Profile</h4>
            </div>
            <div class="row justify-content-center align-items-center">
                
               <div class="col-lg-9">
                 <div class="graph-para">
                        <div class="parameter">
                            <div class="red-para">
                            </div>
                            <p class="m-0 text-extra-dark-gray">Extreme Risk</p>
                        </div>
                        <div class="parameter">
                            <div class="blue-para">
                            </div>
                            <p class="m-0 text-extra-dark-gray">Medium Risk</p>
                        </div>
                    </div>
                  <!--  <canvas id="myChart"></canvas> -->
                  <!--chart start-->
                  <div class="chart">
                     <!--  <ul class="numbers">
                        <li><span>100%</span></li>
                        <li><span>50%</span></li>
                        <li><span>0%</span></li>
                        </ul> -->
                     <ul class="bars">
                        <li>
                            <span>Employee Insurance</span>
                            <?php if($sub_industry_profile->emp_insurance == 1){?>
                           <div class="bar extreme" data-percentage="100"></div>
                         <?php } else { ?>
                          <div class="bar medium" data-percentage="50"></div>
                           <?php } ?>
                        </li>
                        <li>
                            <span>Property Insurance</span>
                            <?php if($sub_industry_profile->pro_insurance == 1){?>
                           <div class="bar extreme" data-percentage="100"></div>
                           <?php } else { ?>
                            <div class="bar medium" data-percentage="50"></div>
                           <?php } ?>
                        </li>
                        <li>
                            <span>Liability Insurance</span>
                            <?php if($sub_industry_profile->liability_insurance == 1){?>
                           <div class="bar extreme" data-percentage="100"></div>
                           <?php } else { ?>
                             <div class="bar medium" data-percentage="50"></div>
                           <?php } ?>
                           
                        </li>
                        <li>
                             <span>Crime Insurance</span>
                           <?php if($sub_industry_profile->crime_insurance == 1){?>
                           <div class="bar extreme" data-percentage="100"></div>
                           <?php } else { ?>
                             <div class="bar medium" data-percentage="50"></div>
                           <?php } ?>
                          
                        </li>
                        <li>
                            <span>Cyber Insurance</span>
                           <?php if($sub_industry_profile->cyber_insurance == 1){?>
                           <div class="bar extreme" data-percentage="100"></div>
                           <?php } else { ?>
                             <div class="bar medium" data-percentage="50"></div>
                           <?php } ?>
                           
                        </li>
                     </ul>
                  </div>
                  
               </div>

               <div class="col-lg-3">
                   <div class="v-dynamic-text bg-white box-shadow">
                       <div class="dy-heading text-center">
                        <h6 class="text-extra-dark-gray margin-15px-bottom font-weight-700">Lorem ipsum</h6>
                        <div class="bg-extra-light-gray margin-10px-bottom h-1px"></div>
                       </div>
                       <?php if($all_risk_assessment !=''){
                            foreach($all_risk_assessment as $risk_assessment_detail){
                      ?>
                       <div class="dy-content">
                            <p class="text-extra-dark-gray m-0 font-weight-500"><?php echo $risk_assessment_detail->name?></p>
                            <div class="bg-extra-light-gray margin-10px-bottom h-1px"></div>
                       </div>
                      <?php } }?>
                       <!-- <div class="dy-content">
                            <p class="text-extra-dark-gray m-0 font-weight-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                            <div class="bg-extra-light-gray margin-10px-bottom h-1px"></div>
                       </div>
                       <div class="dy-content">
                            <p class="text-extra-dark-gray m-0 font-weight-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                            <div class="bg-extra-light-gray margin-10px-bottom h-1px"></div>
                       </div>
                       <div class="dy-content">
                            <p class="text-extra-dark-gray m-0 font-weight-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                            <div class="bg-extra-light-gray margin-10px-bottom h-1px"></div>
                       </div> -->
                   </div>
               </div>
              
            </div>
         </div>
      </section>
     <section class="padding-55px-tb">
         <div class="container">
             <div class="row justify-content-center text-center margin-two-bottom">
                 <h4 class="text-extra-dark-gray font-weight-600">What we recommend to manage your risk!</h4>
             </div>
             <form class="">
                 <div class="row justify-content-center align-items-center margin-three-bottom">
                     <div class="col-lg-5">
                         <div class="check-flex  box-shadow padding-20px-tb padding-30px-lr">
                           
                            <label for="essentials" class="radio-flex">
                                 <input type="radio" name="essentials" id="essentials" checked/>
                                 <div class="check-cont">
                                     <h5 class="text-blue1 margin-10px-bottom">Essential Coverage</h5>
                                     <p class="m-0">Must have coverages to protect your business</p>
                                     <p class="m-0">INR XXX/year    <a href="#" class="text-blue1 font-weight-500">Check Breakup</a></p>
                                 </div>
                             </label>
                         </div>
                     </div>
                     <!-- <div class="col-lg-2 text-center ">
                         <label class="switch">
                           <input type="checkbox" checked>
                           <span class="slider round"></span>
                         </label>
                     </div> -->
                     <div class="col-lg-5">
                          <div class="check-flex  box-shadow padding-20px-tb padding-30px-lr">
                            
                             <label for="optimum" class="radio-flex">
                                <input type="radio" name="essentials" id="optimum" />
                                 <div class="check-cont">
                                     <h5 class="text-blue1 margin-10px-bottom">Optimum Coverage</h5>
                                     <p class="m-0" >Choose the bese overall protection for your business</p>
                                      <p class="m-0">INR XXX/year    <a href="#" class="text-blue1 font-weight-500">Check Breakup</a></p>
                                </div>
                            </label>
                         </div>
                     </div>
                 </div>
                 <div class="row justify-content-center align-items-center">
                     <div class="row align-items-center">
                     <div class="col-lg-4">
                        <div class="service-flex">
                           <div class="service-icon">
                              <img src="<?php echo $base_url_views?>asset_new/img/emp_ico_1.png" alt="">
                           </div>
                           <div class="service-cont">
                              <h6 class="text-extra-dark-gray margin-10px-bottom">Employee Insurance</h6>
                              <p class="m-0">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Neque Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Deleniti illum quaerat dolorem ipsum </p>
                              <a href="#" class="text-blue2 margin-5px-tb">Read more >></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8 position-relative">
                        <div class="swiper-container text-center" data-slider-options='{ "slidesPerView": 1, "loop": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 3000, "disableOnInteraction": true }, "pagination": { "el": ".swiper-pagination", "clickable": true, "dynamicBullets": true }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 2 }, "768": { "slidesPerView": 1 } } }'>
                           <div class="swiper-wrapper">
                              <!-- start slider item -->
                              <div class="swiper-slide">
                                
                               
                            
                                 <div class="sub-pro">
                                    <img alt="" src="<?php echo $base_url_views?>asset_new/img/emp_ico_1.png">
                                    <p class="text-extra-dark-gray">Group Health Policy</p>
                                    <div class="quantity">
                                       <a href="#" class="quantity__minus"><span>-</span></a>
                                       <input name="quantity" type="text" class="quantity__input" value="10000">
                                       <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div>
                                 </div>
                                  <div class="delete-btn">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                 <div class="sub-cont">
                                    <p class="m-0 text-extra-dark-gray"></p>
                                 </div>
                              </div>
                              <!-- end slider item -->
                              <!-- start slider item -->
                              <div class="swiper-slide">
                                 <div class="sub-pro">
                                    <img alt="" src="<?php echo $base_url_views?>asset_new/img/emp_ico_1.png">
                                    <p class="text-extra-dark-gray"> Group Life Insurance</p>
                                    <div class="quantity">
                                       <a href="#" class="quantity__minus"><span>-</span></a>
                                       <input name="quantity" type="text" class="quantity__input" value="10000">
                                       <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div>
                                 </div>
                                  <div class="delete-btn">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                 <div class="sub-cont">
                                    <p class="m-0 text-extra-dark-gray"></p>
                                 </div>
                              </div>
                              <!-- end slider item -->
                              <div class="swiper-slide">
                                 <div class="sub-pro">
                                    <img alt="" src="<?php echo $base_url_views?>asset_new/img/emp_ico_1.png">
                                    <p class="text-extra-dark-gray">Group Personal Acc..</p>
                                    <div class="quantity">
                                       <a href="#" class="quantity__minus"><span>-</span></a>
                                       <input name="quantity" type="text" class="quantity__input" value="10000">
                                       <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div>
                                 </div>
                                  <div class="delete-btn">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                 <div class="sub-cont">
                                    <p class="m-0 text-extra-dark-gray"></p>
                                 </div>
                              </div>
                              <!-- end slider item -->
                           </div>
                        </div>
                      
                        <!-- start slider navigation -->
                     </div>
                     <div class="bg-extra-light-gray margin-60px-tb h-2px"></div>
                  </div>
                  <div class="row align-items-center">
                     <div class="col-lg-4">
                        <div class="service-flex">
                           <div class="service-icon">
                              <img src="<?php echo $base_url_views?>asset_new/img/li_ico_1.png" alt="">
                           </div>
                           <div class="service-cont">
                              <h6 class="text-extra-dark-gray margin-10px-bottom">Liability Insurance</h6>
                              <p class="m-0">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Neque Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Deleniti illum quaerat dolorem ipsum </p>
                              <a href="#" class="text-blue2 margin-5px-tb">Read more >></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8 position-relative">
                        <div class="swiper-container text-center" data-slider-options='{ "slidesPerView": 1, "loop": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 3000, "disableOnInteraction": true }, "pagination": { "el": ".swiper-pagination", "clickable": true, "dynamicBullets": true }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 2 }, "768": { "slidesPerView": 1 } } }'>
                           <div class="swiper-wrapper">
                              <!-- start slider item -->
                              <div class="swiper-slide">
                                 <div class="sub-pro">
                                    <img alt="" src="<?php echo $base_url_views?>asset_new/img/emp_ico_1.png">
                                    <p class="text-extra-dark-gray">Group Health Policy</p>
                                    <div class="quantity">
                                       <a href="#" class="quantity__minus"><span>-</span></a>
                                       <input name="quantity" type="text" class="quantity__input" value="10000">
                                       <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div>
                                 </div>
                                  <div class="delete-btn">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                 <div class="sub-cont">
                                    <p class="m-0 text-extra-dark-gray"></p>
                                 </div>
                              </div>
                              <!-- end slider item -->
                              <!-- start slider item -->
                              <div class="swiper-slide">
                                 <div class="sub-pro">
                                    <img alt="" src="<?php echo $base_url_views?>asset_new/img/emp_ico_1.png">
                                    <p class="text-extra-dark-gray"> Health Policy 1</p>
                                    <div class="quantity">
                                       <a href="#" class="quantity__minus"><span>-</span></a>
                                       <input name="quantity" type="text" class="quantity__input" value="10000">
                                       <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div>
                                 </div>
                                  <div class="delete-btn">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                 <div class="sub-cont">
                                    <p class="m-0 text-extra-dark-gray"></p>
                                 </div>
                              </div>
                              <!-- end slider item -->
                              <div class="swiper-slide">
                                 <div class="sub-pro">
                                    <img alt="" src="<?php echo $base_url_views?>asset_new/img/emp_ico_1.png">
                                    <p class="text-extra-dark-gray">Health Policy 2</p>
                                    <div class="quantity">
                                       <a href="#" class="quantity__minus"><span>-</span></a>
                                       <input name="quantity" type="text" class="quantity__input" value="10000">
                                       <a href="#" class="quantity__plus"><span>+</span></a>
                                    </div>
                                 </div>
                                  <div class="delete-btn">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                 <div class="sub-cont">
                                    <p class="m-0 text-extra-dark-gray"></p>
                                 </div>
                              </div>
                              <!-- end slider item -->
                           </div>
                        </div>
                       
                        <!-- start slider navigation -->
                     </div>
                     <div class="bg-extra-light-gray margin-60px-tb h-2px"></div>
                 </div>
                  <div class="row">
            <div class="text-center margin-15px-top">   
               <button class="btn theme-btn-1 text-uppercase" id="cuslog">Get Premium Breakup</button>
            </div>
         </div>
             </form>
             
         </div>
         </section> 
      
        

         </div>
         </div>
      </section>
<div class="bg-extra-light-gray margin-60px-tb h-2px"></div>
      <section class="padding-55px-tb"> 
            <div class="container">   
                    <div class="row justify-content-center align-items-center text-center">   
                            <h4 class="text-extra-dark-gray font-weight-600">Premium Breakup</h4>

                    </div>
                    <div class="row justify-content-center align-items-center">  
                        <h6 class="text-blue1 text-center font-weight-600">Coverage Selected</h6>
                        <div class="col-lg-4">
                            <div class="premium-flex box-shadow">
                                <div class="premium">
                                    <h6 class="text-blue2 text-center font-weight-600">Employee Insurance</h6>
                                </div>
                                <div class="premium-selected">
                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Health Insurance</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>

                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Life Insurance</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>
                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Personal Accident</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>

                                    <div class="coverage-premium text-center">  
                                            <div class="label-coverage m-0">
                                                <p class="text-extra-dark-gray m-0 font-weight-700">TOTAL COVERAGE PREMIUM </p>
                                            </div>
                                            <div class="coverage-amount text-center">
                                                <p class="text-extra-dark-gray m-0 font-weight-700"><span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span class="amount text-blue1">10,000</span><span class="tenure">/year</span> </p>
                                            </div>
                                    </div>  

                                     
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="premium-flex box-shadow">
                                <div class="premium">
                                    <h6 class="text-blue2 text-center font-weight-600">Employee Benefits</h6>
                                </div>
                                <div class="premium-selected">
                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Health Insurance</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>

                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Life Insurance</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>
                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Personal Accident</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>

                                    <div class="coverage-premium text-center">  
                                            <div class="label-coverage m-0">
                                                <p class="text-extra-dark-gray m-0 font-weight-700">TOTAL COVERAGE PREMIUM </p>
                                            </div>
                                            <div class="coverage-amount text-center">
                                                <p class="text-extra-dark-gray m-0 font-weight-700"><span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span class="amount text-blue1">35,000</span><span class="tenure">/year</span> </p>
                                            </div>
                                    </div> 
                                     
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="premium-flex box-shadow">
                                <div class="premium">
                                    <h6 class="text-blue2 text-center font-weight-600">Employee Benefits</h6>
                                </div>
                                <div class="premium-selected">
                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Health Insurance</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>

                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Life Insurance</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>
                                    <div class="coverage ">
                                        <div class="coverage-name ">
                                            <p class="m-0 text-extra-dark-gray">Group Personal Accident</p>
                                        </div>
                                        <div class="delete-btn m-0">
                                   <a href="" class="trash-btn"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    </div>
                                    <div class="coverage-premium text-center">  
                                            <div class="label-coverage m-0">
                                                <p class="text-extra-dark-gray m-0 font-weight-700">TOTAL COVERAGE PREMIUM </p>
                                            </div>
                                            <div class="coverage-amount text-center">
                                                <p class="text-extra-dark-gray m-0 font-weight-700"><span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span class="amount text-blue1">15,000</span><span class="tenure">/year</span> </p>
                                            </div>
                                    </div> 
                                     
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">   
                                <div class="col-lg-6 ">  

                                <div class="full-premium-box bg-white box-shadow padding-20px-tb padding-30px-lr">  
                                    <div class="row text-center">   

                                            <h6 class="text-blue2 text-center font-weight-600">Total Premium</h6>

                              
                                    </div>  

                                    <div class="row align-items-center justify-content-center">
                                            <div class="tbl_flex">
                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> Net Premium</p>
                                                    <p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span>60000/-</p>
                                            </div> 
                                             <div class="tbl_flex">
                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> Discount(5%)</p>
                                                    <p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span>3000/-</p>
                                            </div>  
                                            <div class="tbl_flex">
                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> GST(18%)</p>
                                                    <p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span>10000/-</p>
                                            </div> 
                                            <div class="tbl_flex total_sec">
                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> Total Premium</p>
                                                    <p class="m-0 text-blue2 m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span> 67000</span><span class="tenure">/year</span> </p>
                                            </div>   
                                    </div>
                                    <div class="row text-center justify-content-center margin-two-top">
                                        <a class="btn theme-btn-1 text-uppercase" id="cuslog">Proceed to Enquiry >></a>
                                    </div>

                                </div>  
                        </div>
                        </div>
                        
                    </div>
            </div>  
      </section> 
      
      
       <section class="padding-25px-tb ">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    
                    <div class="col-lg-6 h-100 col-sm-10">
                        <div class="row align-items-center bg-white box-shadow">
                        
                        <div class="col-lg-12 padding-25px-tb padding-25px-lr">
                            <h6 class="text-blue1 text-center font-weight-700 margin-15px-bottom">Customer Details <span class="text-light-gray">(for Agent)</span></h6>
                            <!-- <h6 class="text-blue1">Help us understand your business!</h6> -->

                            <form class="cus-form-contain">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <input type="text" name="companyname" placeholder="Enter your Name">
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <input type="text" name="companyname" placeholder="Mobile Number">
                                    </div>

                                     <div class="col-lg-12">
                                        <input type="text" name="companyname" placeholder="Email ID">
                                    </div>
                                    <div class="col-lg-12">
                                       <textarea name="" id="" cols="30" rows="6" placeholder="Agent Comment"></textarea>
                                    </div>
                                 
                                     
                                   

                                    <div class="text-center margin-15px-top">   
                                     <button class="btn theme-btn-1 text-uppercase">Submit </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="padding-25px-tb ">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    
                    <div class="col-lg-6 h-100 col-sm-10">
                        <div class="row align-items-center bg-white box-shadow">
                        
                        <div class="col-lg-12 padding-25px-tb padding-25px-lr">
                            <h6 class="text-blue1 text-center font-weight-700 margin-15px-bottom">Contact Details <span class="text-light-gray">(for Customer)</span></h6>
                            <!-- <h6 class="text-blue1">Help us understand your business!</h6> -->

                            <form class="cus-form-contain">
                                <div class="row align-items-center">
                                    <div class="col-lg-12">
                                        <input type="text" name="companyname" placeholder="Enter your Name">
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <input type="text" name="companyname" placeholder="Mobile Number">
                                    </div>

                                     <div class="col-lg-12">
                                        <input type="text" name="companyname" placeholder="Email ID">
                                    </div>

                                    <div class="col-lg-12 text-center margin-15px-top">   
                                     <button class="btn theme-btn-1 text-uppercase">Get OTP </button>
                                    </div>

                                    

                                </div>

                                <div class="bg-extra-light-gray margin-30px-tb h-2px"></div>

                                <div class="row align-items-center margin-25px-top">
                                 <div class="col-lg-8 col-md-8 col-sm-8 ">
                                        <input type="text" name="companyname" class="m-0" placeholder="Enter OTP">
                                    </div>
                                     <div class="col-lg-4 col-md-4 col-sm-4 ">
                                        <button class="btn theme-btn-1 text-uppercase">Submit </button>
                                    </div>
                                    <div class="col-lg-12">
                                        <span><a href="#" class="text-blue2 ">Resend OTP</a></span>
                                    </div>
                                </div>

                            </form>

                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <!-- start footer -->
      <!-- start scroll to top -->
      <a class="scroll-top-arrow" href="javascript:void(0);"><i class="feather icon-feather-arrow-up"></i></a>
      <!-- end scroll to top -->
      <!-- javascript -->
      <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/theme-vendors.min.js"></script>
      <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/main.js"></script>
      <script src="<?php echo $base_url_views?>asset_new/https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/gauge.js"></script>
      <script src="<?php echo $base_url_views?>asset_new/https://cdn.jsdelivr.net/npm/chartjs-gauge@0.3.0/dist/chartjs-gauge.min.js"></script>
      <script>
         function checkpass() {
           var x = document.getElementById("pass");
           if (x.type === "password") {
             x.type = "text";
           } else {
             x.type = "password";
           }
         }
      </script>
      <script>
         function openCity(evt, cityName) {
           var i, tabcontent, tablinks;
           tabcontent = document.getElementsByClassName("v-tabcontent");
           for (i = 0; i < tabcontent.length; i++) {
             tabcontent[i].style.display = "none";
           }
           tablinks = document.getElementsByClassName("v-tablinks");
           for (i = 0; i < tablinks.length; i++) {
             tablinks[i].className = tablinks[i].className.replace(" v-active", "");
           }
           document.getElementById(cityName).style.display = "block";
           evt.currentTarget.className += " v-active";
         }
         
         // Get the element with id="defaultOpen" and click on it
         document.getElementById("defaultOpen").click();
      </script>
      <script>
         $(document).ready(function() {
         const minus = $('.quantity__minus');
         const plus = $('.quantity__plus');
         const input = $('.quantity__input');
         minus.click(function(e) {
         e.preventDefault();
         var value = input.val();
         if (value > 1) {
           value--;
         }
         input.val(value);
         });
         
         plus.click(function(e) {
         e.preventDefault();
         var value = input.val();
         value++;
         input.val(value);
         })
         });
      </script>
      <!--Custom Chart-->
      <script type="text/javascript">
         $(function(){
           $('.bars li .bar').each(function(key, bar){
             var percentage = $(this).data('percentage');
             $(this).animate({
               'height' : percentage + '%'
             },1000);
           });
         });
      </script>

      


        <div class="chat-sec">
            <input type="checkbox" id="chatcheck"> 
            <label class="chat-ico" for="chatcheck">
              <i class="far fa-comment"></i>
              <i class="fas fa-window-close"></i>
            </label>
            <div class="chat-wrap"> 
              <div class="chat-form box-shadow">
              
                <button class="btn theme-btn-1 text-uppercase w-100 d-inline-block">Talk to our Expert</button>
            </div>
            </div>
            
        </div>
        