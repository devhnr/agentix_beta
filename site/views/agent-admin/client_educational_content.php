<?php include('includes/header.php');?>

<section>
    <div class="container">

        <?php if($recommended_poster != ''){?>
        <div class="row  mb-3">
             <div class="col-8">
                <div class="main-title">
                    <h2>Recommended Poster</h2>
                </div>
            </div>
            <div class="col-4 text-right">
                <a href="<?php echo $base_url ?>agent-admin/recommended-poster" class="btn">View More <i class="feather icon-feather-chevron-right"></i></a>
            </div>
        </div>
        <div class="row">
           
            <div class="col-12">
                    <div class="swiper ceslider position-relative">
                        <div class="swiper-wrapper">
                          <?php foreach($recommended_poster as $recommended_poster_data){ ?>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                    <?php if($recommended_poster_data->image != ''){?>
                                      <img src="<?php echo $base_url?>upload/poster/<?php echo $recommended_poster_data->image;?>" alt="" class="w-100">
                                    <?php }else{ ?>

                                      <img src="<?php echo $base_url?>upload/poster/no-image.png" alt="" class="w-100">
                                    <?php } ?>
                                  </div>
                                  <?php if($recommended_poster_data->image != ''){?>
                                    <div class="ce-down-cta">
                                        <a href="<?php echo $base_url?>agent_admin/poster_doc_download/<?php echo $recommended_poster_data->image;?>" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                    </div>
                                  <?php } ?>
                              </div>
                          </div>
                        <?php } ?>


                        <!--   <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img3.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img1.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img3.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img1.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div> -->
                         
                        </div>
                         
                    </div>
                    <div class="swiper-pagination"></div>
            </div>
        </div>

      <?php } ?>
    </div>
</section>
<section>
    <div class="container">

      <?php if($daily_poster != ''){?>
        <div class="row  mb-3">
             <div class="col-8">
                <div class="main-title">
                    <h2>Daily Poster</h2>
                </div>
            </div>
            <div class="col-4 text-right">
                <a href="<?php echo $base_url ?>agent-admin/daily-poster" class="btn">View More <i class="feather icon-feather-chevron-right"></i></a>
            </div>
        </div>
        <div class="row">
           
            <div class="col-12">
                    <div class="swiper ceslider position-relative">
                        <div class="swiper-wrapper">

                          <?php foreach($daily_poster as $daily_poster_data){ ?>

                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <?php if($daily_poster_data->image != ''){?>
                                      <img src="<?php echo $base_url?>upload/poster/<?php echo $daily_poster_data->image;?>" alt="" class="w-100">
                                    <?php }else{ ?>

                                      <img src="<?php echo $base_url?>upload/poster/no-image.png" alt="" class="w-100">
                                    <?php } ?>
                                  </div>
                                  <?php if($daily_poster_data->image != ''){?>
                                    <div class="ce-down-cta">
                                        <a href="<?php echo $base_url?>agent_admin/poster_doc_download/<?php echo $daily_poster_data->image;?>" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                    </div>
                                  <?php } ?>
                              </div>
                          </div>

                          <?php } ?>


                         <!--  <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img3.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img1.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img3.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img1.png" alt="" class="w-100">
                                  </div>
                                  <div class="ce-down-cta">
                                      <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                                  </div>
                              </div>
                          </div> -->
                         
                        </div>
                         
                    </div>
                    <div class="swiper-pagination"></div>
            </div>
        </div>
      <?php } ?>
    </div>
</section>

<section>
    <div class="container">
      <?php if($all_blogs != ''){?>
        <div class="row mb-3">
             <div class="col-8">
                <div class="main-title">
                    <h2>Articles</h2>
                </div>
            </div>
            <div class="col-4 text-right">
                <a href="<?php echo $base_url ?>agent-admin/article-poster" class="btn">View More <i class="feather icon-feather-chevron-right"></i></a>
            </div>
        </div>
        <div class="row">
           
            <div class="col-12">
                    <div class="swiper ceslider position-relative">
                        <div class="swiper-wrapper">

                          <?php foreach($all_blogs as $all_blogs_data){ ?>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                     <?php if($all_blogs_data->image != ''){?>
                                      <img src="<?php echo $base_url?>upload/blogs/<?php echo $all_blogs_data->image;?>" alt="" class="w-100">
                                    <?php }else{ ?>

                                      <img src="<?php echo $base_url?>upload/blogs/no-image.png" alt="" class="w-100">
                                    <?php } ?>
                                  </div>
                                  <div class="ve-down-head mt-2">
                                      <h4><?php echo $all_blogs_data->title;?></h4>
                                  </div>
                                  <?php

                                    $blog_page_url = $base_url."blogs-detail/".$all_blogs_data->page_url;

                                    $text = 'Hi, Please find this interesting article on '.$all_blogs_data->title.' :- '.$blog_page_url.'';
                                  ?>
                                  <div class="ce-down-cta sh-whatsapp">
                                      <a href="https://api.whatsapp.com/send?text=<?php echo $text;?>" target="_blank" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                                  </div>
                              </div>
                          </div>
                        <?php } ?>

                          <!-- 
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                                  </div>
                                  <div class="ve-down-head mt-2">
                                      <h4>Lorem ipsum solor seuc</h4>
                                  </div>
                                  <div class="ce-down-cta sh-whatsapp">
                                      <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img3.png" alt="" class="w-100">
                                  </div>
                                  <div class="ve-down-head mt-2">
                                      <h4>Lorem ipsum solor seuc</h4>
                                  </div>
                                  <div class="ce-down-cta sh-whatsapp">
                                      <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img1.png" alt="" class="w-100">
                                  </div>
                                  <div class="ve-down-head mt-2">
                                      <h4>Lorem ipsum solor seuc</h4>
                                  </div>
                                  <div class="ce-down-cta sh-whatsapp">
                                      <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                            <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                                  </div>
                                  <div class="ve-down-head mt-2">
                                      <h4>Lorem ipsum solor seuc</h4>
                                  </div>
                                  <div class="ce-down-cta sh-whatsapp">
                                      <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img3.png" alt="" class="w-100">
                                  </div>
                                  <div class="ve-down-head mt-2">
                                      <h4>Lorem ipsum solor seuc</h4>
                                  </div>
                                  <div class="ce-down-cta sh-whatsapp">
                                      <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                                  </div>
                              </div>
                          </div>
                          <div class="swiper-slide">
                              <div class="ce-down-list">
                                  <div class="ce-down-img">
                                      <img src="<?php echo $base_url_views ?>agent-admin/img/img1.png" alt="" class="w-100">
                                  </div>
                                  <div class="ve-down-head mt-2">
                                      <h4>Lorem ipsum solor seuc</h4>
                                  </div>
                                  <div class="ce-down-cta sh-whatsapp">
                                      <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                                  </div>
                              </div>
                          </div> -->
                         
                        </div>
                         
                    </div>
                    <div class="swiper-pagination"></div>
            </div>
        </div>
      <?php } ?>
    </div>
</section>

<?php include('includes/footer.php');?>

<script>
    var swiper = new Swiper(".ceslider", {
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
    });
  </script>