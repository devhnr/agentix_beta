<?php include('includes/header.php');?>
<section>

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="banner-content">

                        <h1 class="mb-4">Insights</h1>

                        <div class="line-gree-sm m-0 mt-2"></div>

                            <p class="mt-3 sh-para">The latest insights and thought leadership for independent insurance agents.</p>

                    </div>

                </div>

                <div class="col-lg-4">

                    <img src="<?php echo $base_url_views;?>img/41.png" class="w-100" alt="">

                </div>

            </div>

        </div>

    </section>

    <section class="mt-0">

        <div class="container">

            <div class="row">

                <?php 

                if($get_blog_data != ''){

                    foreach($get_blog_data as $blog_detail){
                ?>

                <div class="col-lg-4">

                    <div class="blog-sec">

                        <div class="blog-img">

                            <?php if($blog_detail->image !=''){?>

                                <img src="<?php echo $http_host?>upload/blogs/<?php echo $blog_detail->image?>" class="w-100" alt="<?php echo $blog_detail->alt?>">
                            <?php } else{ ?>
                                <img src="<?php echo $http_host?>upload/blogs/medium/no-image.png?>" class="w-100" alt="">
                            <?php } ?>

                        </div>

                        <div class="blog-head">

                            <h5><?php echo $blog_detail->title?></h5>



                                <a href="<?php echo $base_url?>blogs-detail/<?php echo $blog_detail->page_url?>">Read More <i class="feather icon-feather-arrow-right"></i></a>

                        </div>

                    </div>

                </div>
            <?php } } ?>


               <!--  <div class="col-lg-4">

                    <div class="blog-sec">

                        <div class="blog-img">

                            <img src="<?php echo $base_url_views;?>img/45.png" class="w-100" alt="">

                        </div>

                        <div class="blog-head">

                            <h5>Modernizing Your

                                Insurance Agency on a

                                Budget</h5>



                                <a href="#">Read More <i class="feather icon-feather-arrow-right"></i></a>

                        </div>

                    </div>

                </div> -->

            </div>

        </div>

    </section>
<?php include('includes/footer.php');?>
