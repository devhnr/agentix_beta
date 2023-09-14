<?php include('includes/header.php');?>
<section>

        <div class="container">

            <div class="row">

                <div class="col-lg-9">

                    <div class="blog-det">

                        <div class="blog-head">

                            <h1><?php echo $get_blog_detail->title?></h1>

                        </div>

                        <div class="blog-img">

                            <?php if($get_blog_detail->detail_img !=''){?>
                                <img src="<?php echo $http_host;?>upload/blogs/detail_image/<?php echo $get_blog_detail->detail_img?>" class="w-100" alt="<?php echo $get_blog_detail->alt?>">
                            <?php } else{ ?>
                                <img src="<?php echo $http_host?>upload/blogs/medium/no-image.png" class="w-100" alt="">
                            <?php } ?>

                        </div>

                        <div class="blog-desc mt-4">

                           <p><?php echo $get_blog_detail->description?></p> 

                        </div>

                    </div>

                </div>

                <?php $latest_blog = $this->home_model->latest_blog($get_blog_detail->id); ?>

                <div class="col-lg-3">

                    <h3 class="mb-3">Recent Blogs</h3>

                    <?php 
                    if($latest_blog != '') { 
                        foreach($latest_blog as $recent_blog) { 
                        
                        //echo "<pre>";print_r($recent_blog);echo"</pre>";?>

                    <div class="blog-sec mb-3">

                        <div class="blog-img">

                            <?php if($recent_blog->image !=''){?>

                                <img src="<?php echo $http_host?>upload/blogs/medium/<?php echo $recent_blog->image?>" class="w-100" alt="<?php echo $recent_blog->alt?>">
                            <?php } else{ ?>
                                <img src="<?php echo $http_host?>upload/blogs/medium/no-image.png?>" class="w-100" alt="">
                            <?php } ?>

                        </div>

                        <div class="blog-head">

                            <h5><?php echo $recent_blog->title2?></h5>



                                <a href="<?php echo $base_url?>blogs-detail/<?php echo $recent_blog->page_url?>">Read More <i class="feather icon-feather-arrow-right"></i></a>

                        </div>

                    </div>

                    <?php } }?>

                    <!-- <div class="blog-sec mb-3">

                        <div class="blog-img">

                            <img src="<?php echo $base_url_views;?>img/45.png" class="w-100" alt="">

                        </div>

                        <div class="blog-head">

                            <h5>Modernizing Your Insurance Agency on a Budget</h5>



                                <a href="#">Read More <i class="feather icon-feather-arrow-right"></i></a>

                        </div>

                    </div> -->

                </div>



                

            </div>

        </div>

    </section>
<?php include('includes/footer.php');?>
