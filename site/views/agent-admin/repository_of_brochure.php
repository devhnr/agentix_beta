<?php include('includes/header.php');?>
 <section>

        <div class="container">

            <div class="row align-items-center justify-content-center">

                <div class="col-lg-6">

                    <div class="banner-text">

                        <h1>Compare & Get The Best Insurance Plans in India</h1>

                    </div>

                    

                </div>

                <div class="col-lg-6">

                    <div class="row justify-content-center align-items-center  ">

                        <?php
                            if($policy_category != ''){
                                foreach($policy_category as $policy_category_data){
                        ?>
                        <div class="col-lg-6">

                            <a href="<?php echo $base_url;?>agent-admin/product-respository/<?php echo $policy_category_data->page_url;?>" class="compare-sec">

                                <div class="com-policy-ico">
                                    <?php if($policy_category_data->icon != ''){?>
                                        <img src="<?php echo $http_host?>upload/policy_category/large/<?php echo $policy_category_data->icon?>" alt="">
                                    <?php } else { ?>
                                         <img src="<?php echo $http_host?>upload/policy_category/large/no-image.png" alt="">
                                    <?php } ?>

                                </div>

                                <div class="com-policy-txt">

                                    <h6><?php echo $policy_category_data->name;?></h6>

                                </div>

                            </a>

                        </div>
                    <?php } } ?>
                        <!-- <div class="col-lg-6">

                            <a href="#" class="compare-sec">

                                <div class="com-policy-ico">

                                    <img src="<?php echo $base_url_views ?>agent-admin/img/cp2.png" alt="">

                                </div>

                                <div class="com-policy-txt">

                                    <h6>Critical Illness</h6>

                                </div>

                            </a>

                        </div>

                        <div class="col-lg-6">  

                            <a href="#" class="compare-sec">

                                <div class="com-policy-ico">

                                    <img src="<?php echo $base_url_views ?>agent-admin/img/cp3.png" alt="">

                                </div>

                                <div class="com-policy-txt">

                                    <h6>Motor Insurance</h6>

                                </div>

                            </a>

                        </div>

                        <div class="col-lg-6">

                            <a href="#" class="compare-sec">

                                <div class="com-policy-ico">

                                    <img src="<?php echo $base_url_views ?>agent-admin/img/cp4.png" alt="">

                                </div>

                                <div class="com-policy-txt">

                                    <h6>Personal Accident</h6>

                                </div>

                            </a>    

                        </div>

                        <div class="col-lg-6">

                            <a href="#" class="compare-sec">

                                <div class="com-policy-ico">

                                    <img src="<?php echo $base_url_views ?>agent-admin/img/cp5.png" alt="">

                                </div>

                                <div class="com-policy-txt">

                                    <h6>Cyber Insurance</h6>

                                </div>

                            </a>    

                        </div> -->

                        

                    </div>

                </div>

            </div>

        </div>

    </section>  
<?php include('includes/footer.php');?>
