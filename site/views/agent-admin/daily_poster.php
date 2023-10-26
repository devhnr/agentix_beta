<?php include('includes/header.php');?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb-2">
                    <?php if($daily_poster != ''){?>
                        <h1>Daily Poster</h1>
                    <?php } else { ?>
                        <h1>No Daily Poster Available</h1>

                    <?php } ?>
                    
                </div>
            </div>
          
        </div>
        <?php if($daily_poster != ''){?>
        <div class="row">
            <?php foreach($daily_poster as $daily_poster_data){ ?>
                <div class="col-lg-3">
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
           <!--  <div class="col-lg-3">
                 <div class="ce-down-list">
                      <div class="ce-down-img">
                          <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                      </div>
                      <div class="ce-down-cta">
                          <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                      </div>
                  </div>
            </div>
            <div class="col-lg-3">
                 <div class="ce-down-list">
                      <div class="ce-down-img">
                          <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                      </div>
                      <div class="ce-down-cta">
                          <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                      </div>
                  </div>
            </div>
             <div class="col-lg-3">
                 <div class="ce-down-list">
                      <div class="ce-down-img">
                          <img src="<?php echo $base_url_views ?>agent-admin/img/img2.png" alt="" class="w-100">
                      </div>
                      <div class="ce-down-cta">
                          <a href="#" class="btn"><i class="feather icon-feather-download"></i>Download</a>
                      </div>
                  </div>
            </div> -->
        </div>
    <?php } ?>
    </div>
</section>
<?php include('includes/footer.php');?>