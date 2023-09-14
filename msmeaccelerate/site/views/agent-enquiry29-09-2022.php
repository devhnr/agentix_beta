<?php include("includes/header.php"); ?>
       <section class="padding-25px-tb bg-blue4">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    
                    <div class="col-lg-6 h-100 col-sm-10">
                        <div class="row align-items-center bg-white box-shadow">
                        
                        <div class="col-lg-12 padding-25px-tb padding-25px-lr">
                            <h6 class="text-blue1 text-center font-weight-700 margin-15px-bottom">Contact Details</h6>
                            <!-- <h6 class="text-blue1">Help us understand your business!</h6> -->

                            <form class="cus-form-contain">

                                <?php echo"<pre>";print_r($_POST);echo"</pre>";?>
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
        <?php include("includes/footer.php"); ?>