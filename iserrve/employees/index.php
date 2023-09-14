<?php include 'includes/header.php';?>
	<style>
		
			
		.member-sec {
    display: flex;
    align-items: center;
   margin-left: 15px
}
		
.member{
	margin-right: -10px
}
		
		.member.more-mem {
    margin-right: 0;
    margin-left: 15px;
    font-size: 13px;
    font-weight: bold;
}
		
		.member.more-mem span{
			font-weight: 600;
		}
		
		.member {
    margin-right: -7px;
}
		
		.member img {
    width: 45px;
}
		
		.emp-link2 {
        background: var(--firstcolor);
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin-bottom: 20px;
    box-shadow: 0px 11px 20px 1px rgb(0 0 0 / 12%);
    position: absolute;
    bottom: -16%;
    left: 41%;
    z-index: 100;
    color: #fff;
}
		
	.modal-contain {
    padding: 30px;
}
</style>
	<section class="p-0 first-sec">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="welcome-text text-center">
						<h4>Welcome <span class="text-aqua">Yatrik</span></h4>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 margin-20px-bottom">
					<h5 class="v-title-new">
						Your <span class="text-aqua">Policies</span>
					</h5>
				</div>
			</div>
			<div class="row align-items-center justify-content-center" >
				<div class="col-lg-5 col-md-8">
					<a href="policy-detail1.php">
					<div class="v-policy-card active-policy">
						<div class="cdp-det-main">
							<div class="cdp-sec-name">
								<div class="cdp-pol-ico">
									<i class="fas fa-building"></i>
								</div>
								<div class="cdp-pol-name">
									<h5>HDFC Health Protection </h5>
								</div>
							</div>
							<div class="cdp-sign">
								<div class="dot-cir">
								</div>
								<span>Activated</span>
							</div>
							<div class="cdp-no">
								<span class="text-para margin-10px-bottom">HDFC Eargo General Insurance</span>
								<h6 class="m-0">Policy No: <span>123456789012345678</span></h6>
								<h6 class="mt-3 ">TPA: <span>Health India Private Limited</span></h6>
								
							</div>
							<div class="cdp-foot">
								<div class="cdp-dates">
								<div class="cdp-dates-flex">
									<span>Start Date</span>
									<span>01-12-2022</span>
								</div>
								<div class="cdp-dates-flex">
									<span>End Date</span>
									<span>01-12-2022</span>
								</div>

									
							</div>


							
								
						</div>	

						<div class="cdp-tpa-flex">
							<div class="member-sec">
								<div class="member member1">
									<img src="img/mem1.png">
								</div>
								<div class="member member2">
									<img src="img/mem2.png">
								</div>
								<div class="member member3">
									<img src="img/mem3.png">
								</div>
								<div class="member more-mem">
									<span>+3</span>
								</div>
							</div>
						</div>
							</div>
					</div>
					</a>
				</div>
				<div class="col-lg-5  col-md-8">
					<a href="policy-detail1.php">
					<div class="v-policy-card ">
						<div class="cdp-det-main">
							<div class="cdp-sec-name">
								<div class="cdp-pol-ico">
									<i class="fas fa-building"></i>
								</div>
								<div class="cdp-pol-name">
									<h5>HDFC Health Protection </h5>
								</div>
							</div>
							<div class="cdp-sign">
								<div class="dot-cir">
								</div>
								<span>Paused</span>
							</div>
							<div class="cdp-no">
								<span class="text-para margin-10px-bottom">HDFC Eargo General Insurance</span>
								<h6 class="m-0">Policy No: <span>123456789012345678</span></h6>
								
								<h6 class="mt-3">TPA: <span>Health India Private Limited</span></h6>
							</div>
							<div class="cdp-foot">
								<div class="cdp-dates">
								<div class="cdp-dates-flex">
									<span>Start Date</span>
									<span>01-12-2022</span>
								</div>
								<div class="cdp-dates-flex">
									<span>End Date</span>
									<span>01-12-2022</span>
								</div>

								
							</div>
							
								
						</div>	

						<div class="cdp-tpa-flex">
									<div class="member-sec">
								<div class="member member1">
									<img src="img/mem1.png">
								</div>
								<div class="member member2">
									<img src="img/mem2.png">
								</div>
								<div class="member member3">
									<img src="img/mem3.png">
								</div>
								<div class="member more-mem">
									<span>+3</span>
								</div>
							</div>
								</div>
							</div>
					</div>
					</a>
				</div>
				<div class="col-lg-2">
					<div class="pol-btn">
						<a href="index-policy-extended.php"><span>VIEW MORE</span><i class="feather icon-feather-arrow-right"></i> </a>
					</div>
				</div>	
			</div>
		</div>
	</section>

	<section class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 margin-20px-bottom">
					<h5 class="v-title-new">
						Iserrve <span class="text-aqua">Assessment</span>
					</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
                        <div class="swiper-container black-move swiper-pagination-bottom" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 30, "observer": true, "observeParents": true, "autoplay": { "delay": 2500, "disableOnInteraction": false }, "pagination": { "el": ".swiper-pagination", "clickable": true, "dynamicBullets": true }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 }, "400": { "slidesPerView": 2 } } }'>
                            <div class="swiper-wrapper">
                                <!-- start team member slider item -->
	                               <div class="swiper-slide">
							        	<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
											<img src="img/assess1.jpg" alt="">
									   	<div class="emp-link2">
                                			<i class="feather icon-feather-arrow-right"></i>
                                	</div>
									   </a>
							        </div>
							        <div class="swiper-slide">
							        	<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
											<img src="img/assess2.jpg" alt="">
											<div class="emp-link2">
                                			<i class="feather icon-feather-arrow-right"></i>
                                	</div>
										</a>
							        </div>
							        <div class="swiper-slide">
							        	<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
											<img src="img/assess3.jpg" alt="">
											<div class="emp-link2">
                                			<i class="feather icon-feather-arrow-right"></i>
                                	</div>
										</a>
							        </div>
							        <div class="swiper-slide">
							        	<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
											<img src="img/assess2.jpg" alt="">
											<div class="emp-link2">
                                				<i class="feather icon-feather-arrow-right"></i>
                                			</div>
										</a>
							        </div>
							        <div class="swiper-slide">
							        	<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
											<img src="img/assess3.jpg" alt="">
											<div class="emp-link2">
                                				<i class="feather icon-feather-arrow-right"></i>
                                			</div>
										</a>
							        </div>
                                <!-- end team member slider item -->
                            </div>
                            <!-- start slider pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- end slider pagination -->
                        </div>
                    </div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 margin-20px-bottom">
					<h5 class="v-title-new">
						Iserrve <span class="text-aqua">Protection</span>
					</h5>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="empprod-scroll">
				<div  class="scroll-link">
					<a href="#" data-bs-toggle="modal" data-bs-target="#products">
					<div class="empprod-dec prodgrad-blue">
                                			<div class="emp-prod">
                                		
                                		<div class="ep-name">
                                			<h6>HDFC Health Insurance</h6>
                                		</div>

                                		<div class="emp-link">
                                			<i class="feather icon-feather-arrow-right"></i>
                                		</div>

                                	</div>
                                	     <div class="ep-img">
                                			<img src="img/empprod1.png" alt="" data-no-retina="">
                                		</div>
                                	</div>
					</a>
				</div>

				<div  class="scroll-link">
					<a href="#" data-bs-toggle="modal" data-bs-target="#products">
					<div class="empprod-dec prodgrad-pink">
                                			<div class="emp-prod">
                                		
                                		<div class="ep-name">
                                			<h6>Tata Cyber Insurance</h6>
                                		</div>

                                		<div class="emp-link">
                                			<i class="feather icon-feather-arrow-right"></i>
                                		</div>

                                	</div>
                                	     <div class="ep-img">
                                			<img src="img/emprod2.png" alt="" data-no-retina="">
                                		</div>
                                	</div>
					</a>
				</div>

				<div class="scroll-link">
					<a href="#" data-bs-toggle="modal" data-bs-target="#products">
					<div class="empprod-dec prodgrad-yellow">
                                			<div class="emp-prod">
                                		
                                		<div class="ep-name">
                                			<h6>Lorem ipsum dolor sit, amet.</h6>
                                		</div>

                                		<div class="emp-link">
                                			<i class="feather icon-feather-arrow-right"></i>
                                		</div>

                                	</div>
                                	     <div class="ep-img">
                                			<img src="img/empprod3.png" alt="" data-no-retina="">
                                		</div>
                                	</div>
					</a>
				</div>

				<div  class="scroll-link">
					<a href="#" data-bs-toggle="modal" data-bs-target="#products">
					<div class="empprod-dec prodgrad-green">
                                			<div class="emp-prod">
                                		
                                		<div class="ep-name">
                                			<h6>Lorem ipsum dolor sit, amet.</h6>
                                		</div>

                                		<div class="emp-link">
                                			<i class="feather icon-feather-arrow-right"></i>
                                		</div>

                                	</div>
                                	     <div class="ep-img">
                                			<img src="img/emprod2.png" alt="" data-no-retina="">
                                		</div>
                                	</div>
						</a>
				</div>

				<div  class="scroll-link">
					<a href="#" data-bs-toggle="modal" data-bs-target="#products">
					<div class="empprod-dec prodgrad-pink">
                                			<div class="emp-prod">
                                		
                                		<div class="ep-name">
                                			<h6>Lorem ipsum dolor sit, amet.</h6>
                                		</div>

                                		<div class="emp-link">
                                			<i class="feather icon-feather-arrow-right"></i>
                                		</div>

                                	</div>
                                	     <div class="ep-img">
                                			<img src="img/empprod3.png" alt="" data-no-retina="">
                                		</div>
                                	</div>
					</a>
				</div>

				<div class="scroll-link">
					<a href="#" data-bs-toggle="modal" data-bs-target="#products">
					<div class="empprod-dec prodgrad-blue">
                                			<div class="emp-prod">
                                		
                                		<div class="ep-name">
                                			<h6>Lorem ipsum dolor sit, amet.</h6>
                                		</div>

                                		<div class="emp-link">
                                			<i class="feather icon-feather-arrow-right"></i>
                                		</div>

                                	</div>
                                	     <div class="ep-img">
                                			<img src="img/empprod1.png" alt="" data-no-retina="">
                                		</div>
                                	</div>
						</a>
				</div>
			</div>
		
		</div>
		
	</section>

	<section class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 margin-20px-bottom">
					<h5 class="v-title-new">
						Iserrve <span class="text-aqua">Prevention</span>
					</h5>
				</div>
			</div>
			<div class="row">
				<div class="col">
                        <div class="swiper-container black-move swiper-pagination-bottom" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 30, "observer": true, "observeParents": true, "autoplay": { "delay": 10500, "disableOnInteraction": false }, "pagination": { "el": ".swiper-pagination", "clickable": true, "dynamicBullets": true }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 4 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } } }'>
                            <div class="swiper-wrapper">
                                <!-- start team member slider item -->
                              <div class="swiper-slide">
									<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
										<img src="img/assess1.jpg" alt="">
										<div class="emp-link2">
												<i class="feather icon-feather-arrow-right"></i>
										</div>
								  </a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
									<img src="img/assess2.jpg" alt="">
									<div class="emp-link2">
                                		<i class="feather icon-feather-arrow-right"></i>
                                	</div>
                                	
								</a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
									<img src="img/assess3.jpg" alt="">
									<div class="emp-link2">
                                			<i class="feather icon-feather-arrow-right"></i>
                                	</div>
								</a>
							</div>
							<div class="swiper-slide">
								<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
									<img src="img/assess2.jpg" alt="">
									<div class="emp-link2">
                                			<i class="feather icon-feather-arrow-right"></i>
                                	</div>
								</a>
							</div>
        <div class="swiper-slide">
        	<a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
				<img src="img/assess3.jpg" alt="">
				<div class="emp-link2">
					<i class="feather icon-feather-arrow-right"></i>
				</div>
			</a>
        </div>
                                <!-- end team member slider item -->
                            </div>
                            <!-- start slider pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- end slider pagination -->
                        </div>
                    </div>
			</div>
		</div>
	</section>


<!-- Assessment Modal -->
<div class="modal fade" id="assessment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-body">
		  <form class="v-form">
			  <div class="modal-contain">
			  <div class="row align-items-center">
				  
				  
				  <div class="col-lg-12 mb-4 text-center">
					  <h5>Assesment form</h5>
				  </div>
				  <div class="col-lg-12">
					 <label class="select" for="slct">
						 <span class="disabled-label">Your Name</span>
						 <input type="text" value="" placeholder="Enter Name" >
					  </label>
				  </div>
				  <div class="col-lg-12">
					  <label class="select" for="slct">
						 <span class="disabled-label">Your Email Address</span>
						 <input type=	"text" value="" placeholder="Enter Name" >
					  </label>
				  </div>
				  <div class="col-lg-12">
					   <label class="select" for="slct">
						 <span class="disabled-label">Your Phone Number</span>
						 <input type="tel" value="" placeholder="Enter Phone Number">
					  </label>
				  </div>
				  <div class="col-lg-12">
					  <label class="select" for="slct">
						  <span class="disabled-label">Write a Message</span>

						  <textarea name="" id="" cols="30" rows="4"></textarea>
					  </label>
				  </div>
				  <div class="col-lg-12">
					  <button type="submit" class="btn btn-primary w-100">Submit</button>
				  </div>
				  
					  
			</div>
				  </div>
		  </form>
      </div>
    </div>
  </div>
</div>	

<!----->

<!-- Products Modal -->
<div class="modal fade" id="products" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-body">
		  <form class="v-form">
			  <div class="modal-contain">
			  <div class="row align-items-center">
				  			  
				  <div class="col-lg-12 mb-4 text-center">
					  <h5>Products form</h5>
				  </div>
				  <div class="col-lg-12">
					 <label class="select" for="slct">
						 <span class="disabled-label">Your Name</span>
						 <input type="text" value="" placeholder="Enter Name" >
					  </label>
				  </div>
				  <div class="col-lg-12">
					  <label class="select" for="slct">
						 <span class="disabled-label">Your Email Address</span>
						 <input type=	"text" value="" placeholder="Enter Name" >
					  </label>
				  </div>
				  <div class="col-lg-12">
					   <label class="select" for="slct">
						 <span class="disabled-label">Your Phone Number</span>
						 <input type="tel" value="" placeholder="Enter Phone Number">
					  </label>
				  </div>
				  <div class="col-lg-12">
					  <label class="select" for="slct">
						  <span class="disabled-label">Write a Message</span>

						  <textarea name="" id="" cols="30" rows="4"></textarea>
					  </label>
				</div>
				  <div class="col-lg-12">
					  <button type="submit" class="btn btn-primary w-100">Submit</button>
				  </div>
				  
					  
			</div>
				  </div>
		  </form>
      </div>
    </div>
  </div>
</div>	

<!----->

<!-- Prevention Modal -->
<div class="modal fade" id="prevention" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-body">
		  <form class="v-form">
			  <div class="modal-contain">
			  <div class="row align-items-center">
				  
				  
				  <div class="col-lg-12 mb-4 text-center">
					  <h5>Prevention form</h5>
				  </div>
				  <div class="col-lg-12">
					 <label class="select" for="slct">
						 <span class="disabled-label">Your Name</span>
						 <input type="text" value="" placeholder="Enter Name" >
					  </label>
				  </div>
				  <div class="col-lg-12">
					  <label class="select" for="slct">
						 <span class="disabled-label">Your Email Address</span>
						 <input type=	"text" value="" placeholder="Enter Name" >
					  </label>
				  </div>
				  <div class="col-lg-12">
					   <label class="select" for="slct">
						 <span class="disabled-label">Your Phone Number</span>
						 <input type="tel" value="" placeholder="Enter Phone Number">
					  </label>
				  </div>
				  <div class="col-lg-12">
												<label class="select" for="slct">
													<span class="disabled-label">Write a Message</span>
													
													<textarea name="" id="" cols="30" rows="4"></textarea>
												</label>
											</div>
				  <div class="col-lg-12">
					  <button type="submit" class="btn btn-primary w-100">Submit</button>
				  </div>
					  
			</div>
				  </div>
		  </form>
      </div>
    </div>
  </div>
</div>	

<!----->

	
					
	








	
<?php include 'includes/footer.php';?>




	