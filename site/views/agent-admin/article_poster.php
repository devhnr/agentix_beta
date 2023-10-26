<?php include('includes/header.php');?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb-3">
                    <?php if($all_blogs != ''){?>
                        <h1>Article Poster</h1>
                    <?php } else { ?>
                        <h1>No Article Poster Available</h1>

                    <?php } ?>
                   
                </div>
            </div>
          
        </div>
        <?php if($all_blogs != ''){?>
        <div class="row">
            <?php foreach($all_blogs as $all_blogs_data){ ?>
            <div class="col-lg-3">
                 <div class="ce-down-list">
                      <div class="ce-down-img">
                          <?php if($all_blogs_data->image != ''){?>
                                      <img src="<?php echo $base_url?>upload/blogs/<?php echo $all_blogs_data->image;?>" alt="" class="w-100">
                                    <?php }else{ ?>

                                      <img src="<?php echo $base_url?>upload/blogs/no-image.png" alt="" class="w-100">
                                    <?php } ?>
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
            <!-- <div class="col-lg-3">
                 <div class="ce-down-list">
                      <div class="ce-down-img">
                          <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                      </div>
                      <div class="ce-down-cta sh-whatsapp">
                           <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                      </div>
                  </div>
            </div>
            <div class="col-lg-3">
                 <div class="ce-down-list">
                      <div class="ce-down-img">
                          <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                      </div>
                      <div class="ce-down-cta sh-whatsapp">
                           <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                      </div>
                  </div>
            </div>
             <div class="col-lg-3">
                 <div class="ce-down-list">
                      <div class="ce-down-img">
                          <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                      </div>
                      <div class="ce-down-cta sh-whatsapp">
                           <a href="#" class="btn"><i class="fab fa-whatsapp"></i>Share</a>
                      </div>
                  </div>
            </div> -->
        </div>
    <?php } ?>
    </div>
</section>
<?php include('includes/footer.php');?>