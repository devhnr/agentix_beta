<?php include("includes/header.php"); ?>
        <!-- start section -->
        <section class="h-vh padding-55px-tb bg-blue4">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-5 xs-margin-20px-bottom">
                        <h2 class="text-extra-dark-gray font-weight-700 "><?php echo $banner_data->name?></span>
                        </h2>
                        <h5 class="text-extra-dark-gray font-weight-300 main-font"><?php echo $banner_data->sub_title?></h5>
                        <div class="btn-contain">
                            <a href="<?php echo $base_url?>detail-form" class="btn theme-btn-2 text-uppercase">Get Quote Now</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <img src="<?php echo $base_url?>upload/banner/medium/<?php echo $banner_data->image?>" alt="" />
                    </div>


                </div>
               
            </div>
        </section>
        <!-- end section -->
        <?php if($all_product_home !=''){?>
        <!-- start section -->
        <section class=" padding-55px-tb wow animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col position-relative">
                        <div class="swiper-container black-move swiper-pagination-bottom" data-slider-options='{ "loop": false, "slidesPerView": 1, "spaceBetween": 30, "observer": true, "observeParents": true, "autoplay": { "delay": 4500, "disableOnInteraction": false }, "pagination": { "el": ".swiper-pagination", "clickable": true, "dynamicBullets": true }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 } } }'>
                            <div class="swiper-wrapper">
                                <!-- start testimonial item -->
                                <?php if($all_product_home !=''){
                                      foreach($all_product_home as $product_home_detail){
                                ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo $product_home_detail->url?>">
                                    <div class="testimonials-style-02 box-shadow border-radius-5px overflow-hidden">
                                        <?php if($product_home_detail->image !=''){?>
                                        <img alt="" class="d-inline-block" src="<?php echo $base_url?>upload/product_home/medium/<?php echo $product_home_detail->image?>">
                                        <?php } else {?>
                                        <img alt="" class="d-inline-block" src="<?php echo $base_url?>upload/product_home/medium/noimage.jpg">
                                         <?php }?>
                                        <div class="testimonials-content padding-1-half-rem-all text-center bg-white lg-padding-1-half-rem-lr">
                                            <h6 class="text-extra-dark-gray m-0 margin-15px-bottom"><?php echo $product_home_detail->title?></h6>
                                           
                                        </div>
                                    </div>
                                </a>
                                </div>
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    <?php } ?>

        <section class="padding-55px-tb wow animate__fadeIn bg-blue4">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-7 position-relative text-end md-margin-30px-bottom">
                                    <img src="<?php echo $base_url?>upload/about_image/large/<?php echo $get_about_detail->image?>" alt="" data-no-retina="">
                                    <div class="bg-gra1 text-white text-start alt-font text-extra-large w-300px padding-3-rem-tb padding-1-half-rem-lr position-absolute left-0px text-center top-60px xs-top-10px md-w-250px sm-padding-1-rem-all md-padding-2-rem-all">
                                    <?php echo $get_about_detail->sub_title?>
                                    </div>
                    </div>
                  
                    <div class="col-lg-5">
                        <h4 class="alt-font text-extra-dark-gray font-weight-700"><?php echo $get_about_detail->name?></h4>
                       
                       <p class="text-extra-dark-gray margin"><?php echo $get_about_detail->description?></p>
                        

                       <!--  <div class="btn-area">
                            <a href="#" class="btn theme-btn-2 text-uppercase">Know more</a>
                        </div> -->

                    </div>

                     
                </div>
            </div>
        </section>



        <!-- <section class="padding-55px-tb wow animate__fadeIn">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                </div>


                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-5">
                        <h4 class="alt-font text-extra-dark-gray font-weight-700"><span class="text-blue1">Lorem</span> Ipsum</h4>
                        <p class="text-extra-dark-gray">
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam repellat molestiae, commodi eius reiciendis ad provident, nesciunt asperiores perferendis aliquam inventore minus libero dolore ullam earum quasi, facilis vitae vero? Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore commodi provident quo eos dolor facere possimus architecto incidunt illum cupiditate maxime voluptas obcaecati, pariatur sint nesciunt blanditiis, earum autem laudantium?
                        </p>
                        <p class="text-extra-dark-gray">
                           Lorem ipsum dolor, sit amet consectetur adipisicing, elit. Asperiores dicta, impedit, quo expedita enim iste nihil cupiditate et sit nobis sapiente ex assumenda vero vitae, numquam soluta earum, neque autem.
                        </p> -->
                        <!-- <div class="btn-area">
                            <a href="#" class="btn theme-btn-2 text-uppercase">Know more</a>
                        </div> -->
                    <!-- 
                    </div>
                       <div class="col-lg-7">
                        <img src="img/about_home1.jpg" alt="">
                    </div>
                    

                   
                </div>
            </div>
        </section> -->

        <section class="padding-55px-tb wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-20px-bottom">
                        <h4 class="alt-font text-extra-dark-gray font-weight-700"><span class="text-blue1">MSME</span> Accelerate Edge</h4>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 justify-content-center">
                    <!-- start feature box item -->
                    <?php if($all_msme_edge !=''){
                          foreach($all_msme_edge as $msme_edge_detail){
                            // echo "<pre>";print_r($msme_edge_detail);echo "</pre>";
                    ?>
                    <div class="col text-center md-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <a href="<?php echo $msme_edge_detail->url?>" class="text-medium-gray text-fast-blue-hover cursor-default">
                            <?php if($msme_edge_detail->image !=''){?>
                            <img src="<?php echo $base_url?>upload/msme_edge_image/medium/<?php echo $msme_edge_detail->image?>" alt="" class="edge-ico">
                            <?php } else { ?>
                            <img src="<?php echo $base_url?>upload/msme_edge_image/medium/noimage.jpg" alt="" class="edge-ico">
                            <?php } ?>
                            <span class="alt-font font-weight-600 text-extra-dark-gray text-uppercase d-block"><?php echo $msme_edge_detail->name?></span>
                        </a>
                    </div>
                    <?php } } ?>
                    <!-- end feature box item -->
                    <!-- start feature box item -->
                   <!--  <div class="col text-center md-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                        <a href="#" class="text-medium-gray text-fast-blue-hover cursor-default">
                            <img src="<?php echo $base_url_views?>asset_new/img/ico_2.png" alt="" class="edge-ico">
                            <span class="alt-font font-weight-600 text-extra-dark-gray text-uppercase d-block">Extensive Service Network</span>
                        </a>
                    </div> -->
                    <!-- end feature box item -->
                    <!-- start feature box item -->
                    <!-- <div class="col text-center md-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                        <a href="#" class="text-medium-gray text-fast-blue-hover cursor-default">
                            <img src="<?php echo $base_url_views?>asset_new/img/ico_3.png" alt="" class="edge-ico">
                            <span class="alt-font font-weight-600 text-extra-dark-gray text-uppercase d-block">Comprehensive Product </span>
                        </a>
                    </div> -->
                    <!-- end feature box item -->
                    <!-- start feature box item -->
                    <!-- <div class="col text-center sm-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                        <a href="#" class="text-medium-gray text-fast-blue-hover cursor-default">
                            <<img src="<?php echo $base_url_views?>asset_new/img/ico_4.png" alt="" class="edge-ico">
                            <span class="alt-font font-weight-600 text-extra-dark-gray text-uppercase d-block">Technology Differentiaton</span>
                        </a>
                    </div> -->
                    <!-- end feature box item -->
                    
                </div>
            </div>
        </section>
         <?php if($all_product_strength !=''){?>
        <section class="padding-55px-tb bg-blue4 wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-six-bottom">
                        <h4 class="alt-font text-extra-dark-gray font-weight-700">Product <span class="text-blue1">Strength</span></h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- start feature box item -->
                    <?php if($all_product_strength !=''){
                           foreach($all_product_strength as $product_strength_detail){
                    ?>
                    <div class="col-12 col-lg-6 col-md-9 margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
                        <div class="feature-box h-100 feature-box-left-icon border-radius-5px bg-white box-shadow-small box-shadow-extra-large-hover overflow-hidden padding-4-rem-all">
                            <div class="feature-box-icon">
                                <?php if($product_strength_detail->image !=''){?>
                                <img src="<?php echo $base_url?>upload/product_strength/small/<?php echo $product_strength_detail->image?>">
                                <?php } else { ?>
                                <img src="<?php echo $base_url?>upload/product_strength/small/noimage.jpg">
                                <?php } ?>
                                <!-- <i class="fas fa-fire icon-medium text-blue3"></i> -->
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray"><?php echo $product_strength_detail->name?></span>
                                <p class="text-extra-dark-gray"><?php echo $product_strength_detail->description?></p>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
                </div>
            </div>
        </section>
    <?php }?>

<?php if($all_whats_new !=''){?>
        <section class="padding-55px-tb wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <div class="container">
               <div class="row justify-content-center">
                    <div class="col-md-12 text-center margin-six-bottom">
                        <h4 class="alt-font text-extra-dark-gray font-weight-700">What's <span class="text-blue1">New</span></h4>
                    </div>
                </div>
               <div class="row text-center row-cols-1 row-cols-lg-4 row-cols-sm-2">
                            
                            <?php if($all_whats_new !=''){
                                  foreach($all_whats_new as $whats_new_detail){
                            ?>
                                    <div class="col interactive-banners-style-01 margin-30px-bottom xs-margin-15px-bottom">
                                        <div class="interactive-banners-image border-radius-6px bg-dark-slate-blue">
                                            <?php if($whats_new_detail->image !=''){?>
                                            <img src="<?php echo $base_url?>upload/whats_new/medium/<?php echo $whats_new_detail->image?>" class="scale" alt="" data-no-retina="">
                                            <?php } else { ?>
                                            <img src="<?php echo $base_url?>upload/whats_new/medium/noimage.jpg" class="scale" alt="" data-no-retina="">
                                            <?php } ?>
                                            <div class="interactive-banners-hover bg-gradient-extra-dark-gray-transparent">
                                                <div class="d-table h-100 w-100">
                                                    <div class="d-table-cell align-bottom padding-3-half-rem-tb xs-padding-6-half-rem-tb">
                                                        <a href="<?php echo $whats_new_detail->url?>" class="rounded-icon bg-blue3 interactive-banners-icon"><i class="feather icon-feather-arrow-right text-white"></i></a>
                                                        <div class="font-weight-500 line-height-normal alt-font text-white text-large interactive-banners-title"><?php echo $whats_new_detail->title?></div>
                                                        <div class="font-weight-500 line-height-normal alt-font text-uppercase interactive-banners-sub-title"><a href="<?php echo $whats_new_detail->url?>" class="text-white text-medium text-decoration-line-bottom">Explore Now</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } } ?>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
        <!-- start footer -->
        <?php include("includes/footer.php"); ?>