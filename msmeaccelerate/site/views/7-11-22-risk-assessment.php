<?php include("includes/header.php"); ?>

<style>

  #premiumBreakup{

    display: none;

}
</style>

<section class="padding-25px-tb bg-blue4">

         <div class="container">

            <div class="row justify-content-center text-center margin-two-bottom">

               <h4 class="text-extra-dark-gray font-weight-600"><span class="text-blue1 font-weight-700"><?php echo $this->session->userdata('company')?></span> Risk Profile</h4>

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



                     <?php 

                        $sub_industry_id = $this->session->userdata('sub_industry_id');

                        $sub_industry = $this->home_model->get_sub_industry_grap($sub_industry_id);

                        // echo "<pre>";print_r($sub_industry);echo "</pre>";exit

                        ?>

                  <!--  <canvas id="myChart"></canvas> -->

                  <!--chart start-->

                  <div class="graph-contain">

                     <div class="row margin-30px-top align-items-end justify-content-center">

                        <?php if($sub_industry->emp_insurance != 0){?>

                     <div class="col-auto p-0">

                         

                        <div class="v-graph">

                        <div class="v-graph-label">

                           <span class="alt-font text-extra-dark-gray font-weight-600">Employee Risk</span>

                        </div>

                         <?php if($sub_industry->emp_insurance == 1){?>

                           

                        

                          

                           

                     <div class="v-graph-inner risky">

                        

                        <div class="v-graph-bar">

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.8s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.9s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.0s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.1s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="1.2s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="1.2s"></div>

                        </div>

                        

                     </div>

                      <?php } else { ?>

                     <div class="v-graph-inner medium">

                        

                        <div class="v-graph-bar">

                           

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="0.8s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="0.9s"></div>

                        </div>

                        

                     </div>

                     <?php } ?>

                  </div>

                  

                     </div>
                      <?php } ?>


                     <?php if($sub_industry->pro_insurance != 0){?>
                     <div class="col-auto p-0">

                        <div class="v-graph">

                        <div class="v-graph-label">

                           <span class="alt-font text-extra-dark-gray font-weight-600">Property Risk</span>

                        </div>

                         <?php if($sub_industry->pro_insurance == 1){?>

                           

                        

                          

                           

                     <div class="v-graph-inner risky">

                        

                        <div class="v-graph-bar">

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.8s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.9s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.0s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.1s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="1.2s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="1.2s"></div>

                        </div>

                        

                     </div>

                      <?php } else { ?>

                     <div class="v-graph-inner medium">

                        

                        <div class="v-graph-bar">

                           

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="0.8s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="0.9s"></div>

                        </div>

                        

                     </div>

                     <?php } ?>

                  </div>

                     </div>

                     <?php } ?>


                     <?php if($sub_industry->liability_insurance != 0){?>
                     <div class="col-auto p-0">

                        <div class="v-graph">

                        <div class="v-graph-label">

                           <span class="alt-font text-extra-dark-gray font-weight-600">Liability Risk</span>

                        </div>

                         <?php if($sub_industry->liability_insurance == 1){?>

                           

                        

                          

                           

                     <div class="v-graph-inner risky">

                        

                        <div class="v-graph-bar">

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.8s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.9s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.0s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.1s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="1.2s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="1.2s"></div>

                        </div>

                        

                     </div>

                      <?php } else { ?>

                     <div class="v-graph-inner medium">

                        

                        <div class="v-graph-bar">

                           

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="0.8s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="0.9s"></div>

                        </div>

                        

                     </div>

                     <?php } ?>

                  </div>

                     </div>

                     <?php } ?>




                     <?php if($sub_industry->crime_insurance != 0){?>
                     <div class="col-auto p-0">

                        <div class="v-graph">

                        <div class="v-graph-label">

                           <span class="alt-font text-extra-dark-gray font-weight-600">Crime Risk</span>

                        </div>

                         <?php if($sub_industry->crime_insurance == 1){?>

                           

                        

                          

                           

                     <div class="v-graph-inner risky">

                        

                        <div class="v-graph-bar">

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.8s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.9s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.0s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.1s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="1.2s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="1.2s"></div>

                        </div>

                        

                     </div>

                      <?php } else { ?>

                     <div class="v-graph-inner medium">

                        

                        <div class="v-graph-bar">

                           

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="0.8s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="0.9s"></div>

                        </div>

                        

                     </div>

                     <?php } ?>

                  </div>

                     </div>
                      <?php } ?>


                      <?php if($sub_industry->cyber_insurance != 0){?>
                     <div class="col-auto p-0">

                        <div class="v-graph">

                        <div class="v-graph-label">

                           <span class="alt-font text-extra-dark-gray font-weight-600">Cyber Risk</span>

                        </div>

                         <?php if($sub_industry->cyber_insurance == 1){?>

                           

                        

                          

                           

                     <div class="v-graph-inner risky">

                        

                        <div class="v-graph-bar">

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.8s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.9s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.0s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="1.1s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="1.2s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="1.2s"></div>

                        </div>

                        

                     </div>

                      <?php } else { ?>

                     <div class="v-graph-inner medium">

                        

                        <div class="v-graph-bar">

                           

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.2s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.3s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.4s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.5s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.6s"></div>

                           <div class="v-g-circle wow animate__fadeInUp" data-wow-delay="0.7s"></div>

                           <div class="line-left wow animate__fadeInLeft" data-wow-delay="0.8s"></div>

                           <div class="line-right wow animate__fadeInRight" data-wow-delay="0.9s"></div>

                        </div>

                        

                     </div>

                     <?php } ?>

                  </div>

                     </div>

                      <?php } ?>

                     

                  </div>

                  </div>

                  <!--  <canvas id="myChart"></canvas> -->

                  <!--chart start-->

                  

                  

               </div>



               <!--  <?php 



                $userdata_form_data = $this->session->userdata('sub_industry_id');

                // echo "<pre>";print_r($userdata_form_data);echo "</pre>";



                ?> -->


               <?php 
               $industry_add_more = $this->home_model->industry_add_more($this->session->userdata('industry_id'));
               if($industry_add_more != ''){?>
               <div class="col-lg-3">

                   <div class="v-dynamic-text bg-white box-shadow">

                       <div class="dy-heading text-center">

                        <h6 class="text-extra-dark-gray margin-15px-bottom font-weight-700">Lorem ipsum</h6>

                        <div class="bg-extra-light-gray margin-10px-bottom h-1px"></div>

                       </div>

                       <?php 

                        
                        //echo "<pre>";print_r($industry_add_more);echo"</pre>";
                       if($industry_add_more !=''){

                            foreach($industry_add_more as $industry_add_more_data){

                      ?>

                       <div class="dy-content">

                            <p class="text-extra-dark-gray m-0 font-weight-500"><?php echo $industry_add_more_data->description?></p>

                            <div class="bg-extra-light-gray margin-10px-bottom h-1px"></div>

                       </div>

                      <?php } }?>

                   </div>

               </div>

            <?php } ?>

              

            </div>

         </div>

      </section>

     <section class="padding-55px-tb">

         <div class="container">

             <div class="row justify-content-center text-center margin-two-bottom">

                 <h4 class="text-extra-dark-gray font-weight-600">What we recommend to manage your risk!</h4>

             </div>

             <form class="" >

                 <div class="row justify-content-center align-items-center margin-three-bottom">

                  <?php if($all_coverage !=''){ 

                        $i = 0;

                        foreach($all_coverage as $coverage_detail){

                  ?>

                     <div class="col-lg-5">

                         <div class="check-flex  box-shadow padding-20px-tb padding-30px-lr">

                           

                            <label for="essentials" class="radio-flex">

                                 <input type="radio" name="essentials" id="essentials" onClick="coverage_ajax(<?php echo $coverage_detail->id;?>);" <?php if($i == 0){echo "checked";}?> style="width: 50px;"/>

                                 <div class="check-cont">

                                     <h5 class="text-blue1 margin-10px-bottom"><?php echo $coverage_detail->name?></h5>

                                     <p class="m-0"><?php echo $coverage_detail->description?>  <!--<a href="#" class="text-blue1 font-weight-500">Check Breakup</a>-->  </p>

                                 </div>

                             </label>

                         </div>

                     </div>

                   <?php $i++;} }?>

                 </div>



                    <?php

                    $h = 1;

                     foreach($all_coverage as $coverage_detail){

                      if($h == 1){

                          $styleShow = "display:block";

                      }else{

                          $styleShow = "display:none";

                      }

                     //echo "<pre>";print_r($coverage_detail);echo"</pre>"; ?>

                      <div id="coverage123_<?php echo $coverage_detail->id;?>" class="row justify-content-center align-items-center" style="<?php echo $styleShow; ?>">

                     

                    <?php if($all_type !=''){ 

                    foreach($all_type as $type_detail){ 

                      $get_product_detail = $this->home_model->get_all_product($type_detail->id,$coverage_detail->id,$this->session->userdata('sub_industry_id'));

                    ?>

                    <div class="cov"> 

                     <div class="row align-items-center" >

                     <div class="col-lg-4">

                        <div class="service-flex">

                          <?php if($type_detail->image !=''){?>

                           <div class="service-icon">

                              <img src="<?php echo $base_url?>upload/type_image/small/<?php echo $type_detail->image?>" alt="">

                           </div>

                         <?php } else { ?>

                          <div class="service-icon">

                              <img src="<?php echo $base_url?>upload/type_image/small/noimage.jpg?>" alt="">

                           </div>

                         <?php } ?>

                           <div class="service-cont">

                              <h6 class="text-extra-dark-gray margin-10px-bottom"><?php echo $type_detail->name?></h6>

                              <p class="m-0"><?php echo $type_detail->description?></p>

                              <a href="#" class="text-blue2 margin-5px-tb">Read more >></a>

                           </div>

                        </div>

                     </div>

                     <div class="col-lg-8 position-relative">

                        <div class="swiper-container text-center" data-slider-options='{ "slidesPerView": 1, "loop": false, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "pagination": { "el": ".swiper-pagination", "clickable": true }, "observer": true, "observeParents": true, "autoplay": { "delay": 5000, "disableOnInteraction": false }, "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "1200": { "slidesPerView": 3 }, "992": { "slidesPerView": 3 }, "768": { "slidesPerView": 2 }, "600": { "slidesPerView": 1 } } }'>

                           <div class="swiper-wrapper">

                              <!-- start slider item -->

                              <?php foreach($get_product_detail as $product_detail){ 

                                 $this->session->unset_userdata('product_price_change_id_'.$product_detail->id.'');
                                 $this->session->unset_userdata('product_price_change_'.$product_detail->id.'');
                              ?>

                              <div class="swiper-slide" id="remove_product">

                                 <div class="sub-pro">

                                  <?php if($product_detail->image !=''){?>

                                    <img alt="" src="<?php echo $base_url?>upload/products/small/<?php echo $product_detail->image?>">

                                  <?php } else { ?>

                                    <img alt="" src="<?php echo $base_url?>upload/products/small/noimage.jpg">

                                  <?php }?>

                                    <p class="text-extra-dark-gray"><?php echo $product_detail->name?></p>

                                    <div class="quantity">

                                       

                                       <?php 

                                        $annual_turnover = $this->session->userdata('annual_turnover');

                                        $asses_value = $this->session->userdata('asses_value');

                                        $no_of_emp = $this->session->userdata('no_of_emp');



                                        if($product_detail->show_price == 1){//fix formula



                                            if($annual_turnover <= '1000000000'){

                                              $product_price = $product_detail->zero_to_hundred;

                                            }elseif($annual_turnover >= '1000000000' && $annual_turnover <= '5000000000' ){

                                              $product_price = $product_detail->hund_to_five;

                                            }elseif($annual_turnover > '5000000000'){

                                              $product_price = $product_detail->above_five;

                                            }

                                        }

                                        if($product_detail->show_price == 2){ //assess value formula



                                          if($asses_value <= '1000000000'){


                                            // echo $product_price = 10;
                                             if($product_detail->assets_zero_to_hund == 1){

                                                $product_price = $asses_value * 40/100;


                                              }elseif($product_detail->assets_zero_to_hund == 2) {

                                                 $product_price = $asses_value * 20/100;



                                              }elseif($product_detail->assets_zero_to_hund == 4) {

                                               $product_price = $asses_value * 2;

                                            }
                                            elseif($product_detail->assets_zero_to_hund == 0) {

                                               $product_price = $asses_value ;

                                            }



                                          }elseif($asses_value >= '1000000001' && $asses_value <= '5000000000' ){

                                           //echo $product_price = $asses_value;

                                            if($product_detail->asset_hund_to_five == 1){

                                                $product_price = $asses_value * 40/100;

                                            }elseif($product_detail->asset_hund_to_five == 2) {

                                               $product_price = $asses_value * 20/100;

                                            }elseif($product_detail->asset_hund_to_five == 4) {

                                               $product_price = $asses_value * 2;

                                            }
                                            elseif($product_detail->asset_hund_to_five == 0) {

                                               $product_price = $asses_value ;

                                            }



                                          }elseif($asses_value > '5000000000'){

                                                //echo $product_price = $asses_value;

                                             if($product_detail->asset_above_five == 1){

                                              $product_price = $asses_value * 40/100;

                                            }elseif($product_detail->asset_above_five == 2) {

                                               $product_price = $asses_value * 20/100;

                                            }elseif($product_detail->asset_above_five == 4) {

                                               $product_price = $asses_value * 2;

                                            }
                                            elseif($product_detail->asset_above_five == 0) {

                                               $product_price = $asses_value ;

                                            }
                                            

                                            

                                          }

                                        }

                                        if($product_detail->show_price == 3){ //no of employee formula

                                          if($asses_value <= '1000000000'){

                                             $amount = $product_detail->emp_zero_to_hundred_amount;
                                             $percentage = $product_detail->emp_zero_to_hundred_percentage;

                                             $ema_percentage = $this->session->userdata('no_of_emp') * $percentage / 100;

                                             $product_price = $amount * $ema_percentage;


                                            // echo $product_price = 10;
                                             // if($product_detail->emp_zero_to_hundred == 1){

                                             //    $ema_percentage = $this->session->userdata('no_of_emp') * 50 / 100;

                                             //    $product_price = 500000 * $ema_percentage;


                                             //  }elseif($product_detail->emp_zero_to_hundred == 2) {

                                             //    $ema_percentage = $this->session->userdata('no_of_emp') * 25 / 100;

                                             //     $product_price = 500000 * $ema_percentage ;



                                             //  }else{
                                             //     $product_price = 500000;
                                             //  }



                                          }elseif($asses_value >= '1000000001' && $asses_value <= '5000000000' ){


                                             $amount = $product_detail->emp_hund_to_five_amount;
                                             $percentage = $product_detail->emp_hund_to_five_percentage;

                                             $ema_percentage = $this->session->userdata('no_of_emp') * $percentage / 100;

                                             $product_price = $amount * $ema_percentage;


                                             // if($product_detail->emp_hund_to_five == 1){

                                             //     $ema_percentage = $this->session->userdata('no_of_emp') * 50 / 100;

                                             //    $product_price = 1000000 * $ema_percentage ;


                                             //  }elseif($product_detail->emp_hund_to_five == 2) {

                                             //    $ema_percentage = $this->session->userdata('no_of_emp') * 25 / 100;

                                             //     $product_price = 1000000 * $ema_percentage ;



                                             //  }else{
                                             //     $product_price = 1000000;
                                             //  }


                                          }elseif($asses_value > '5000000000'){


                                             $amount = $product_detail->emp_above_five_amount;
                                             $percentage = $product_detail->emp_above_five_percentage;

                                             $ema_percentage = $this->session->userdata('no_of_emp') * $percentage / 100;

                                             $product_price = $amount * $ema_percentage;

                                                //echo $product_price = $asses_value;
                                              // if($product_detail->emp_above_five == 1){

                                              //   $ema_percentage = $this->session->userdata('no_of_emp') * 50 / 100;

                                              //   $product_price = 2500000 * $ema_percentage;


                                              // }elseif($product_detail->emp_above_five == 2) {

                                              //   $ema_percentage = $this->session->userdata('no_of_emp') * 25 / 100;

                                              //    $product_price = 2500000 * $ema_percentage;



                                              // }else{
                                              //    $product_price = 2500000;
                                              // }
                                           
                                            

                                          }
                                        }

                                        // echo "<pre>";print_r($annual_turnover);echo "</pre>";

                                       ?>
                                      <!--  <a href="#" class="quantity__minus"><span>-</span></a> -->
                                       <!-- <input name="quantity" type="text" class="quantity__input" value="<?php echo $product_price;?>"> -->

                                       <!-- <a href="#" class="quantity__plus"><span>+</span></a> -->

                                    </div>

                                    <div class="input_amt">

                                        <input class="cover-input" value="<?php echo $product_price;?>" id="cover_input" onkeyup="change_product_price('<?php echo $product_detail->id?>','<?php echo $coverage_detail->id?>','1',this.value);">

                                        <span id="contact_error_<?php echo $product_detail->id?>" class="" style="display:none;color: red;"></span>

                                    </div>

                                 </div>

                                  <!-- <div class="delete-btn" onclick="removeParent(this.value)"> -->

                                     <div class="delete-btn" onclick="sessionStore(this,<?php echo $product_detail->id?>,<?php echo $coverage_detail->id ?>);" >

                                   <a href="javascript:void(0);" class="trash-btn"><i class="fas fa-trash-alt"></i></a>

                                </div>

                                 <div class="sub-cont">

                                    <p class="m-0 text-extra-dark-gray"></p>

                                 </div>

                              </div>

                            <?php } ?>

                            

                           </div>

                            <!-- start slider pagination -->

                <div class="swiper-pagination swiper-light-pagination d-sm-none"></div>

                <!-- end slider pagination -->

                           <!-- start slider navigation -->

                        <div class="swiper-button-next-nav swiper-button-next rounded-circle light slider-navigation-style-07 box-shadow-double-large"><i class="feather icon-feather-arrow-right"></i></div>

                        <div class="swiper-button-previous-nav swiper-button-prev rounded-circle light slider-navigation-style-07 box-shadow-double-large"><i class="feather icon-feather-arrow-left"></i></div>

                        <!-- end slider navigation -->

                        </div>

                  </div>

                   <div class="bg-extra-light-gray margin-60px-tb h-2px"></div>

                    

                    </div>

                     </div>

                <?php } } ?></div> <?php $h++;} ?>

                    

                

              

               

                  <div class="row">

            <div class="text-center margin-15px-top">   

               <button class="btn theme-btn-1 text-uppercase" type="button" id="cuslog" onclick="showPremiumBreakup();">Get Premium Breakup</button>

            </div>

         </div>

             </form>

             

         </div>

         </section> 

      

        



         </div>

         </div>

      </section>

  <div class="bg-extra-light-gray margin-60px-tb h-2px"></div>

      <section class="padding-55px-tb" id="premiumBreakup">

        <div id="prod2">

      <?php

            $i = 1;

           foreach($all_coverage as $coverage_details){

            if($i == 1){

              $styleDiv = "display:block";

            }else{

              $styleDiv = "display:none";

            } 

            ?> 
			<form action="<?php echo $base_url;?>agent-inquiry" id="risk_assessment_<?php echo $coverage_details->id?>" method="post">

            <input type="hidden" name="coverage_id" value="<?php echo $coverage_details->id?>">


            <div class="container" id="coverage1_<?php echo $coverage_details->id;?>" style="<?php echo $styleDiv; ?>">   

                    <div class="row justify-content-center align-items-center text-center">   

                            <h4 class="text-extra-dark-gray font-weight-600">Premium Breakup</h4>

                    </div>

                    

                    <div class="row justify-content-center align-items-center" >  

                        <h6 class="text-blue1 text-center font-weight-600">Coverage Selected</h6>

                         

                      <?php if($all_type !=''){ 

                        $total_premium = 0;

                    foreach($all_type as $type_detail){ 

                      $get_product_detail = $this->home_model->get_all_product($type_detail->id,$coverage_details->id,$this->session->userdata('sub_industry_id'));

                    ?>
                        <input type="hidden" name="type_id[]" value="<?php echo $type_detail->id;?>">
                        <div class="col-lg-4">

                            <div class="premium-flex box-shadow">

                                <div class="premium">

                                    <h6 class="text-blue2 text-center font-weight-600"><?php echo $type_detail->name?></h6>

                                </div>

                                <!-- <?php ?> -->

                                <div class="premium-selected">

                                   <?php //$sessionProduct =  $this->session->userdata('sessionProductList');

                                  // $in_array = explode(",",$sessionProduct)

                                   ?>

                                   <?php 

                                   //$product_price_new = 0;

                                   $total_coverage_premium = 0;

                                   //$total_premium = array();

                                   foreach($get_product_detail as $product_detail){  

                                    //echo"<pre>";print_r($product_detail);echo"</pre>";




                                    $annual_turnover = $this->session->userdata('annual_turnover');

                                    $asses_value = $this->session->userdata('asses_value');

                                    $no_of_emp = $this->session->userdata('no_of_emp');



                                    if($product_detail->show_price == 1){//fix formula



                                        if($annual_turnover <= '1000000000'){

                                          $product_price = $product_detail->zero_to_hundred;

                                        }elseif($annual_turnover >= '1000000000' && $annual_turnover <= '5000000000' ){

                                          $product_price = $product_detail->hund_to_five;

                                        }elseif($annual_turnover > '5000000000'){

                                          $product_price = $product_detail->above_five;

                                        }

                                    }

                                    if($product_detail->show_price == 2){ //assess value formula



                                          if($asses_value <= '1000000000'){


                                            // echo $product_price = 10;
                                             if($product_detail->assets_zero_to_hund == 1){

                                                $product_price = $asses_value * 40/100;


                                              }elseif($product_detail->assets_zero_to_hund == 2) {

                                                 $product_price = $asses_value * 20/100;



                                              }elseif($product_detail->assets_zero_to_hund == 4) {

                                               $product_price = $asses_value * 2;

                                            }
                                            elseif($product_detail->assets_zero_to_hund == 0) {

                                               $product_price = $asses_value ;

                                            }



                                          }elseif($asses_value >= '1000000001' && $asses_value <= '5000000000' ){

                                           //echo $product_price = $asses_value;

                                            if($product_detail->asset_hund_to_five == 1){

                                                $product_price = $asses_value * 40/100;

                                            }elseif($product_detail->asset_hund_to_five == 2) {

                                               $product_price = $asses_value * 20/100;

                                            }elseif($product_detail->asset_hund_to_five == 4) {

                                               $product_price = $asses_value * 2;

                                            }
                                            elseif($product_detail->asset_hund_to_five == 0) {

                                               $product_price = $asses_value ;

                                            }



                                          }elseif($asses_value > '5000000000'){

                                                //echo $product_price = $asses_value;

                                             if($product_detail->asset_above_five == 1){

                                              $product_price = $asses_value * 40/100;

                                            }elseif($product_detail->asset_above_five == 2) {

                                               $product_price = $asses_value * 20/100;

                                            }
                                            elseif($product_detail->asset_above_five == 4) {

                                               $product_price = $asses_value * 2;

                                            }
                                            elseif($product_detail->asset_above_five == 0) {

                                               $product_price = $asses_value ;

                                            }

                                            

                                          }

                                        }


                                        if($product_detail->show_price == 3){ //no of employee formula

                                          if($asses_value <= '1000000000'){


                                             $amount = $product_detail->emp_zero_to_hundred_amount;
                                             $percentage = $product_detail->emp_zero_to_hundred_percentage;

                                             $ema_percentage = $this->session->userdata('no_of_emp') * $percentage / 100;

                                             $product_price = $amount * $ema_percentage;


                                            // echo $product_price = 10;
                                             // if($product_detail->emp_zero_to_hundred == 1){

                                             //    $ema_percentage = $this->session->userdata('no_of_emp') * 50 / 100;

                                             //    $product_price = 500000 * $ema_percentage;


                                             //  }elseif($product_detail->emp_zero_to_hundred == 2) {

                                             //       $ema_percentage = $this->session->userdata('no_of_emp') * 25 / 100;

                                             //     $product_price = 500000 * $ema_percentage ;



                                             //  }else{
                                             //     $product_price = 500000;
                                             //  }



                                          }elseif($asses_value >= '1000000001' && $asses_value <= '5000000000' ){


                                             $amount = $product_detail->emp_hund_to_five_amount;
                                             $percentage = $product_detail->emp_hund_to_five_percentage;

                                             $ema_percentage = $this->session->userdata('no_of_emp') * $percentage / 100;

                                             $product_price = $amount * $ema_percentage;
                                             

                                             // if($product_detail->emp_hund_to_five == 1){

                                             //    $ema_percentage = $this->session->userdata('no_of_emp') * 50 / 100;

                                             //    $product_price = 1000000 * $ema_percentage;


                                             //  }elseif($product_detail->emp_hund_to_five == 2) {

                                             //    $ema_percentage = $this->session->userdata('no_of_emp') * 25 / 100;

                                             //     $product_price = 1000000 * $ema_percentage;



                                             //  }else{
                                             //     $product_price = 1000000;
                                             //  }


                                          }elseif($asses_value > '5000000000'){


                                             $amount = $product_detail->emp_above_five_amount;
                                             $percentage = $product_detail->emp_above_five_percentage;

                                             $ema_percentage = $this->session->userdata('no_of_emp') * $percentage / 100;

                                             $product_price = $amount * $ema_percentage;



                                                //echo $product_price = $asses_value;
                                              // if($product_detail->emp_above_five == 1){

                                              //   $ema_percentage = $this->session->userdata('no_of_emp') * 50 / 100;

                                              //   $product_price = 2500000 * $ema_percentage ;


                                              // }elseif($product_detail->emp_above_five == 2) {

                                              //   $ema_percentage = $this->session->userdata('no_of_emp') * 25 / 100;

                                              //    $product_price = 2500000 * $ema_percentage ;



                                              // }else{
                                              //    $product_price = 2500000;
                                              // }
                                           
                                            

                                          }
                                        }



                                        if($type_detail->id == 3){
                                   
                                         $product_price_new = $product_price * $this->session->userdata('no_of_emp') * $product_detail->average /100;
                                         

                                          $total_coverage_premium += round($product_price_new); 
                                      }else{
                                          

                                          $product_price_new = $product_price * $product_detail->average /100 ;
                                         $total_coverage_premium += round($product_price_new); 

                                          
                                      }


                                      if( !next( $get_product_detail ) ) {

                                         $total_premium += round($total_coverage_premium);
                                       

                                      }

                                    

                                   ?>

                                    <div class="coverage cov_Selected" id="mydiv_pc">

                                        <div class="coverage-name ">

                                            <p class="m-0 text-extra-dark-gray"><?php echo $product_detail->name." <br><span class='rupee-icon'><i class='fas fa-rupee-sign'> </i></span>".$product_price_new?></p>

                                        </div>

                                        <div class="delete-btn m-0">

                                   <a href="javascript:void(0);" class="trash-btn" onclick="sessionStore(this,<?php echo $product_detail->id?>,<?php echo $coverage_details->id ?>)"><i class="fas fa-trash-alt"></i></a>

                                </div>

                                    </div>

                                  <?php 


                                   ?>

                                <input type="hidden" name="product_id[]" value="<?php echo $product_detail->id;?>">
                                <input type="hidden" name="product_price[]" value="<?php echo $product_price;?>">
                                <input type="hidden" name="product_average[]" value="<?php echo $product_detail->average;?>">

                                <input type="hidden" name="total_coverage_premium[]" value="<?php echo $product_price_new;?>">
                              <?php } 
                                //echo"<pre>";print_r($total_coverage_premium);echo"</pre>";
                                


                              ?>



                                    <div class="coverage-premium text-center">  

                                            <div class="label-coverage m-0">

                                                <p class="text-extra-dark-gray m-0 font-weight-700">TOTAL COVERAGE PREMIUM </p>

                                            </div>

                                            <div class="coverage-amount text-center">

                                                <p class="text-extra-dark-gray m-0 font-weight-700"><span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span class="amount text-blue1"><?php echo $total_coverage_premium ;?></span><span class="tenure">/year</span> </p>

                                            </div>

                                    </div>  



                                     

                                </div>

                            </div>

                        </div>

                      <?php 

                    

                  } }?>

                        

                        <div class="row justify-content-center">   

                                <div class="col-lg-6 ">  



                                <div class="full-premium-box bg-white box-shadow padding-20px-tb padding-30px-lr">  

                                    <div class="row text-center">   



                                            <h6 class="text-blue2 text-center font-weight-600">Total Premium</h6>



                              

                                    </div>  



                                    <div class="row align-items-center justify-content-center">

                                            <div class="tbl_flex">

                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> Net Premium</p>

                                                    <p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><?php echo $total_premium;?>/-</p>

                                            </div> 

                                            <?php 
                                             //$get_discount_price = $total_premium * 5 /100;

                                             //$discount_price = $total_premium - $get_discount_price;

                                             //$gst_include_rate = ( $discount_price * 18 ) / 100;

                                            ?>
                                             <!-- <div class="tbl_flex">

                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> Discount(5%)</p>

                                                    <p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><?php echo $discount_price;?>/-</p>

                                            </div>  --> 
                                            <?php

                                             $discount_price = 0;
                                              $gst_add_amount = $total_premium*18/100;


                                              $last_final_premium = $total_premium + $gst_add_amount;
                                            ?>

                                            <input type="hidden" name="net_premium" value="<?php echo $total_premium?>">
                                            <input type="hidden" name="gst_amount" value="<?php echo $gst_add_amount;?>">
                                            <input type="hidden" name="discount_amount" value="<?php echo $discount_price;?>">
                                            <input type="hidden" name="total_premium" value="<?php echo $last_final_premium;?>">


                                            <div class="tbl_flex">

                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> GST(18%)</p>

                                                    <p class="m-0 text-extra-dark-gray m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><?php echo $gst_add_amount;?>/-</p>

                                            </div> 

                                            <div class="tbl_flex total_sec">

                                                    <p class="text-extra-dark-gray m-0 font-weight-700"> Total Premium</p>

                                                    <p class="m-0 text-blue2 m-0 font-weight-600"> <span class="rupee-icon"><i class="fas fa-rupee-sign"> </i></span><span> <?php echo $last_final_premium;?></span><span class="tenure">/year</span> </p>

                                            </div>   

                                    </div>

                                    <div class="row text-center justify-content-center margin-two-top">

                                        <a class="btn theme-btn-1 text-uppercase" id="cuslog" onclick="process_to_inquiry('<?php echo $coverage_details->id?>');">Proceed to Enquiry >></a>

                                    </div>



                                </div>  

                            </div>

                        </div>

                        

                    </div>

            </div>  
			
			</form>

                    <?php $i++;}?>

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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <!-- <script type="text/javascript" src="<?php echo $base_url_views?>asset_new/js/gauge.js"></script> -->

      <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-gauge@0.3.0/dist/chartjs-gauge.min.js"></script> -->

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

         //document.getElementById("defaultOpen").click();

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

        <script>



function coverage_ajax(coverage_id) {

   <?php foreach($all_coverage as $coverage_detail){ ?>

   $('#coverage123_<?php echo $coverage_detail->id?>').css('display','none');

   $('#coverage1_<?php echo $coverage_detail->id?>').css('display','none');

      if(coverage_id == '<?php echo $coverage_detail->id?>'){

        

        $('#coverage123_<?php echo $coverage_detail->id?>').css('display','block');

        $('#coverage1_<?php echo $coverage_detail->id?>').css('display','block');

      }

  <?php } ?> 

    }

</script>

<script>

function showPremiumBreakup() {



   $("#premiumBreakup").toggle();

   $('html,body').animate({
        scrollTop: $("#premiumBreakup").offset().top},
        'slow');

}

</script>

<script>

  function sessionStore(elem,product_id,coverage_id) {


    //alert(type_id);
    removeProduct(product_id,coverage_id,'0','0');

    $(elem).parent(".swiper-slide").remove();

  

    var url = '<?php echo $base_url;?>home/sessionProduct';

    jQuery.ajax({

        url: url,

        type: 'post',

        data: 'product_id=' + product_id,

        

        success: function(msg) {

             //console.log(msg);

            if (msg == "1") {

              $("#premiumBreakup_new").load(location.href + " #premiumBreakup_new");

                return false;

            } else {

                console.log("err");

            }

        }

    });

}



 function removeProduct(product_id,coverage_id,flag,price_new) {

    var url = '<?php echo $base_url;?>home/coverageSelected';

    jQuery.ajax({

        url: url,

        type: 'post',

        data: 'product_id=' + product_id + '&coverage_id=' + coverage_id + '&flag=' + flag + '&product_price_new=' + price_new,



         success: function(msg) {

            document.getElementById('prod2').innerHTML = msg;



          }

        <?php $this->session->unset_userdata('sessionProductList');?>

    });

}


function change_product_price(product_id,coverage_id,flag,price_new) {

   //alert(price_new);return false;


   var url = '<?php echo $base_url;?>home/check_product_min_amount';

   jQuery.ajax({

      url : url,

      type : 'post',

      data : 'product_id=' + product_id + '&price_new=' + price_new,


      success:function(msg){
         if(msg == 0){

            var url = '<?php echo $base_url;?>home/coverageSelected';

             jQuery.ajax({

                 url: url,

                 type: 'post',

                 data: 'product_id=' + product_id + '&coverage_id=' + coverage_id + '&flag=' + flag + '&product_price_new=' + price_new,

                  success: function(msg) {
                     document.getElementById('prod2').innerHTML = msg;
                  }

                 <?php //$this->session->unset_userdata('sessionProductList');?>
                 
             });

         }else{
            //alert(product_id);
               //var error_msg = "Please Enter Valid Amount";
              $('#contact_error_'+ product_id +'').html("Min Sum insured should be INR  "+msg+"");
              $('#contact_error_'+ product_id +'').show().delay(0).fadeIn('show');
              $('#contact_error_'+ product_id +'').show().delay(5000).fadeOut('show');
              return false;
         }
      }
   });

    // var url = '<?php echo $base_url;?>home/coverageSelected';

    // jQuery.ajax({

    //     url: url,

    //     type: 'post',

    //     data: 'product_id=' + product_id + '&coverage_id=' + coverage_id + '&flag=' + flag + '&product_price_new=' + price_new,

    //      success: function(msg) {
    //         document.getElementById('prod2').innerHTML = msg;
    //      }

    //     <?php //$this->session->unset_userdata('sessionProductList');?>
        
    // });

}


function process_to_inquiry(coverage_id){

   $('#risk_assessment_'+ coverage_id +'').submit();
}

// $('#dSuggest').keypress(function() {
//     var dInput = this.value;
//     console.log(dInput);
//     $(".dDimension:contains('" + dInput + "')").css("display","block");
// });
 
</script>