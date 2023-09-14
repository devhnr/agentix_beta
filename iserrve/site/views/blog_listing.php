<?php include("includes/header.php"); ?>
<style> 
    section{
      height: auto;
    }

    .blog-col {
    width: 100%;
    background: #fff;
    box-shadow: 0 0.25rem 1.5rem 0.25rem rgb(160 160 160 / 20%);
    border-radius: 12px;
    transition: 0.4s;
    cursor: pointer;
}

.blog-col:hover{
  transform: translateY(-10px);
}

.blog-img {
    overflow: hidden;
    transition: 0.4s;
    border-radius: 12px 12px 0 0;
}

.blog-img img{
  width: 100%;
  transition: 0.4s;
}

.blog-img img:hover{
  transform: scale(1.1);
  border-radius: 12px 12px 0 0;
  object-fit: cover;
    height: 265px;
}

.blog-desc-area {
    padding: 14px;
}

.blog-cat h6 {
    font-weight: 700;
    color: #eb631d;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 1px;
}

.blog-title h4 {
    font-size: 17px;
    font-weight: 600;
    letter-spacing: 0px;
    height: 42px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    font-family: 'Poppins', sans-serif;
     color: #000;
}

.blog-desc p {
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 20px ;
    color: #000;
    height: 42px;
    overflow: hidden;
}

.blog-cta a {
    letter-spacing: 1px;
    font-weight: 600;
    /* margin-bottom: 20px; */
    display: inline-block;
    color: #eb631d;
    font-size: 14;
}

.blog_dropbtn {
    background-color: transparent;
    color: #232323;
    padding: 7px 16px;
    font-size: 15px;
    border: none;
    cursor: pointer;
    border-radius: 50px;
    font-weight: 400;
    text-transform: uppercase;
    transition: 0.3s;
}
.blog_dropbtn:hover, .blog_dropbtn:focus {
  background-color: #2980B9;
  color: #fff;
}

.blog_dropdown {
  position: relative;
  display: inline-block;
}

.blog_dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 6px 0px rgb(0 0 0 / 20%);
    z-index: 1;
    padding: 20px 0px;
    border-radius: 12px;
    border: 1px solid #efefef;
}

.blog_dropdown-content a {
    color: black;
    padding: 2px 16px;
    text-decoration: none;
    display: block;
    font-size: 14px;
    font-weight: 500;
}

.blog_dropdown a:hover {background-color: #ddd;}

.blog_show {display: block;}

.blog-head-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>  
<section> </section>
<?php if($all_blog != ''){ ?>
<section class="position-relative">
 <div class="container">
   <div class="row">
     <div class="col-lg-12">
      <div class="blog-head-flex">
        <div class="v-title ">
         <h1>Insights</h1>
       </div>
        <div class="blog_dropdown">
          <button onclick="myblogFunction()" class="blog_dropbtn">Categories <i class="feather icon-feather-chevron-down"></i></button>
          <div id="blog_myDropdown" class="blog_dropdown-content">
            <a href="#">Insurance</a>
            <a href="#">Business</a>
            <a href="#">Corporate</a>
          </div>
        </div>  
      </div>
       
     </div>
   </div>
   <div class="row mt-5"> 

      <?php foreach ($all_blog as $all_blog_data) {?> 
      <div class="col-lg-4 mb-4">  
            <a href="<?php echo $http_host?>blog-detail/<?php echo $all_blog_data->page_url;?>">
              <div class="blog-col">  
                  <div class="blog-contain">  
                      <div class="blog-img">  
                        <?php if($all_blog_data->image != ''){?>
                          <img src="<?=base_url()?>upload/blogs/medium/<?php echo $all_blog_data->image;?>" alt="">
                        <?php }else{ ?>
                          <img src="<?=base_url()?>upload/blogs/medium/no-image.png" alt="">
                        <?php } ?>
                      </div> 

                      <div class="blog-desc-area">  
                        <div class="blog-cat">
                          <h6><?php echo $all_blog_data->title;?></h6>
                        </div>
                            <?php if($all_blog_data->title2 !='' ){?>
                              <div class="blog-title">  
                                  <h4><?php echo $all_blog_data->title2;?></h4>
                              </div> 
                              <?php } ?> 
                              <?php if($all_blog_data->short_desc !='' ){?>
                                        <div class="blog-desc"> 
                                              <p><?php echo $all_blog_data->short_desc;?></p>
                                        </div>

                              <?php } ?>
                          <div class="blog-cta">  
                              <a href="<?php echo $http_host?>blog-detail/<?php echo $all_blog_data->page_url;?>" class="blog-btn">READ MORE <i class="feather icon-feather-arrow-up-right"></i></a>
                          </div>  
                      </div>   


                  </div>  
              </div>
              </a>  
          
      </div>  
    <?php } ?>
      <!-- <div class="col-lg-4 mb-4">  
            <a href="<?php echo $base_url?>index.php/blog-detail">
              <div class="blog-col">  
                  <div class="blog-contain">  
                      <div class="blog-img">  
                          <img src="<?php echo $base_url_views?>img/blog1.jpg" alt="">
                      </div> 

                      <div class="blog-desc-area">  
                        <div class="blog-cat">
                          <h6>Insurance</h6>
                        </div>
                          <div class="blog-title">  
                              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, nulla. </h4>
                          </div>  
                          <div class="blog-desc"> 
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit quam perspiciatis</p>
                          </div>
                          <div class="blog-cta">  
                              <a href="<?php echo $base_url?>index.php/blog-detail" class="blog-btn">READ MORE <i class="feather icon-feather-arrow-up-right"></i></a>
                          </div>  
                      </div>   


                  </div>  
              </div>
              </a>  
          
      </div>  
      <div class="col-lg-4 mb-4">  
            <a href="<?php echo $base_url?>index.php/blog-detail">
              <div class="blog-col">  
                  <div class="blog-contain">  
                      <div class="blog-img">  
                          <img src="<?php echo $base_url_views?>img/blog1.jpg" alt="">
                      </div> 

                      <div class="blog-desc-area">  
                        <div class="blog-cat">
                          <h6>Insurance</h6>
                        </div>
                          <div class="blog-title">  
                              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, nulla. </h4>
                          </div>  
                          <div class="blog-desc"> 
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit quam perspiciatis</p>
                          </div>
                          <div class="blog-cta">  
                              <a href="<?php echo $base_url?>index.php/blog-detail" class="blog-btn">READ MORE <i class="feather icon-feather-arrow-up-right"></i></a>
                          </div>  
                      </div>   


                  </div>  
              </div>
              </a>  
          
      </div>  
       <div class="col-lg-4 mb-4">  
            <a href="<?php echo $base_url?>index.php/blog-detail">
              <div class="blog-col">  
                  <div class="blog-contain">  
                      <div class="blog-img">  
                          <img src="<?php echo $base_url_views?>img/blog1.jpg" alt="">
                      </div> 

                      <div class="blog-desc-area">  
                        <div class="blog-cat">
                          <h6>Insurance</h6>
                        </div>
                          <div class="blog-title">  
                              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, nulla. </h4>
                          </div>  
                          <div class="blog-desc"> 
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit quam perspiciatis</p>
                          </div>
                          <div class="blog-cta">  
                              <a href="<?php echo $base_url?>index.php/blog-detail" class="blog-btn">READ MORE <i class="feather icon-feather-arrow-up-right"></i></a>
                          </div>  
                      </div>   


                  </div>  
              </div>
              </a>  
          
      </div>  
      <div class="col-lg-4 mb-4">  
            <a href="<?php echo $base_url?>index.php/blog-detail">
              <div class="blog-col">  
                  <div class="blog-contain">  
                      <div class="blog-img">  
                          <img src="<?php echo $base_url_views?>img/blog1.jpg" alt="">
                      </div> 

                      <div class="blog-desc-area">  
                        <div class="blog-cat">
                          <h6>Insurance</h6>
                        </div>
                          <div class="blog-title">  
                              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, nulla. </h4>
                          </div>  
                          <div class="blog-desc"> 
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit quam perspiciatis</p>
                          </div>
                          <div class="blog-cta">  
                              <a href="<?php echo $base_url?>index.php/blog-detail" class="blog-btn">READ MORE <i class="feather icon-feather-arrow-up-right"></i></a>
                          </div>  
                      </div>   


                  </div>  
              </div>
              </a>  
          
      </div>  
      <div class="col-lg-4 mb-4">  
            <a href="<?php echo $base_url?>index.php/blog-detail">
              <div class="blog-col">  
                  <div class="blog-contain">  
                      <div class="blog-img">  
                          <img src="<?php echo $base_url_views?>img/blog1.jpg" alt="">
                      </div> 

                      <div class="blog-desc-area">  
                        <div class="blog-cat">
                          <h6>Insurance</h6>
                        </div>
                          <div class="blog-title">  
                              <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, nulla. </h4>
                          </div>  
                          <div class="blog-desc"> 
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit quam perspiciatis</p>
                          </div>
                          <div class="blog-cta">  
                              <a href="<?php echo $base_url?>index.php/blog-detail" class="blog-btn">READ MORE <i class="feather icon-feather-arrow-up-right"></i></a>
                          </div>  
                      </div>   


                  </div>  
              </div>
              </a>  
          
      </div>   -->
   </div> 
 </div>
</section>

<?php } ?>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myblogFunction() {
  document.getElementById("blog_myDropdown").classList.toggle("blog_show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.blog_dropbtn')) {
    var dropdowns = document.getElementsByClassName("blog_dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('blog_show')) {
        openDropdown.classList.remove('blog_show');
      }
    }
  }
}
</script>



<?php include("includes/footer.php"); ?>