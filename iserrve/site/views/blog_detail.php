<?php include("includes/header.php"); ?>
<style> 
    section{
      height: auto;
    }
.blog-social ul {
    display: flex;
    list-style: none;
    padding: 0;
}


.blog-social ul li a {
    font-size: 27px;
    margin: 0 11px 0 0;
    color: #00c7ae;
}
.blog-social {
    border: none;
}


.side-sec {
    background: #fff;
    border: 1px solid #efefef;
    padding: 20px;
    border-radius: 12px;
}


.blog-recent ul {
    padding: 0;
    list-style: none;
}

.blog-recent ul li{
  margin-bottom: 20px;
}

.blog-recent ul li a{
  color: #000;
  margin-bottom: 20px;
}
</style>    

<section class="position-relative">
 <div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="blog-det-col">
          <div class="blog-det-contain">
            <div class="blog-back text-center">
              <a href="<?=base_url()?>index.php/blog-listing"><i class="feather icon-feather-arrow-left"></i> Back to Insights</a>
            </div>
            <?php if($blog_details->title !='' ){?>
            <div class="blog-det-heading">
              <h4>
                <?php echo $blog_details->title;?>
              </h4>
            </div>
          <?php } ?>
            <div class="blog-det-img">

              <?php if($blog_details->detail_img != ''){?>
                  <img src="<?=base_url()?>upload/blogs/detail_image/large/<?php echo $blog_details->detail_img;?>" alt="">
              <?php }else{ ?>
                    <img src="<?=base_url()?>upload/blogs/detail_image/large/no-image.png" alt="">
              <?php } ?>

              <!--<div class="blog-det-cat">-->
              <!--  <span>Insurance</span>-->
              <!--</div>-->
            </div>

            <?php if($blog_details->description != ''){?>
            <div class="blog-det-desc">
              <p>
                <?php echo $blog_details->description;?>
              </p>
              
            </div>
          <?php } ?>
            <div class="blog-back text-center">
              <a href="<?=base_url()?>index.php/blog-listing" class="mt-5"><i class="feather icon-feather-arrow-left"></i> Back to Insights</a>
            </div>
            <div class="blog-share">
              <!--<div class="blog-social">-->
              <!--  <h5 class="mb-4" style="color: #232323; font-weight: 700">Share</h5>-->
              <!--  <ul>-->
              <!--    <li><a href="#"><i class="feather icon-feather-facebook"></i></a></li>-->
              <!--    <li><a href="#"><i class="feather icon-feather-twitter"></i></a></li>-->
              <!--    <li><a href="#"><i class="feather icon-feather-instagram"></i></a></li>-->
              <!--  </ul>-->
              <!--</div>-->
              <div class="blog-comment-form mt-4">
                <h5 class="" style="color: #232323; font-weight: 700">Leave a Comment</h5>
                <form method="post" name="review_form" id="review_form" role="form">
                  <div class="row">
                    <div class="col-lg-4">
                      <input id="form_name" type="text" name="name" placeholder="name">
                    </div>
                    <div class="col-lg-4">
                      <input type="email" placeholder="email" name="email" id="form_email">
                    </div>
                    <div class="col-lg-4">
                      <input type="text" placeholder="Subject" name="subject" id="form_subject">
                    </div>
                    <div class="col-lg-12">
                      <textarea name="message" id="form_message" placeholder="comment" cols="30" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="blog_id" id="blog_id" value="<?php echo $blog_details->id?>">

                    <div class="clearfix">
             <div class="form-group">
                <span id="contact_error" class="error alert-message valierror" style="display:none;"></span>
                  <span id="contact_success" class="successmain alert-message" style="display:none;"></span>
              </div>
            </div>

                    <div class="col-lg-12 text-center">
                      <button type="submit" class="v-btn2">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
          <div class="side-sec mb-4">
            <div class="blog-social">
                <h5 class="mb-4" style="color: #232323; font-weight: 700">Follow us on</h5>
                <ul>
                  <li><a href="https://www.facebook.com/profile.php?id=100086144868126"><i class="feather icon-feather-facebook"></i></a></li>
                  <!--<li><a href="#"><i class="feather icon-feather-twitter"></i></a></li>-->
                  <li><a href="https://www.instagram.com/iserrvebyraghnall/"><i class="feather icon-feather-instagram"></i></a></li>
                </ul>
              </div>
          </div>
          <div class="side-sec mb-4">
            <?php if($recent_blog != ''){ ?>
            <div class="blog-recent">
                <h5 class="mb-4" style="color: #232323; font-weight: 700">Recent In</h5>
                <ul>

                  <?php foreach($recent_blog as $recent_blog_data){?>
                  <li><a href="<?php echo $http_host?>blog-detail/<?php echo $recent_blog_data->page_url;?>"><?php echo $recent_blog_data->title2?></a></li>
                <?php } ?>
                  <!-- <li><a href="#">Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Culpa, sequi.</a></li>
                  <li><a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, aspernatur!</a></li> -->
                </ul>
              </div>
            <?php } ?>
          </div>
      </div>
  </div>
 </div>
</section>

<script>
    $(document).ready(function(){
    
    var url = '<?php echo $http_host;?>home/myreview';
    $("#review_form").on('submit', function(e){
            
      var name = jQuery("#form_name").val();
      if (name == '') {

          //alert("name");
          jQuery('#contact_error').html("Please enter name");
          jQuery('#contact_error').show().delay(0).fadeIn('show');
          jQuery('#contact_error').show().delay(2000).fadeOut('show');
          return false;
      }

      var email = jQuery("#form_email").val();
      if (email == '') {
          jQuery('#contact_error').html("Please enter email");
          jQuery('#contact_error').show().delay(0).fadeIn('show');
          jQuery('#contact_error').show().delay(2000).fadeOut('show');
          return false;
      }

      var em = jQuery('#form_email').val();
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (!filter.test(em)) {
          jQuery('#contact_error').html("Please enter valid email");
          jQuery('#contact_error').show().delay(0).fadeIn('show');
          jQuery('#contact_error').show().delay(2000).fadeOut('show');
          return false;
      }

      var subject = jQuery('#form_subject').val();
      if (subject == 0) {
          //alert('phone');
          jQuery('#contact_error').html("Please Enter Subject");
          jQuery('#contact_error').show().delay(0).fadeIn('show');
          jQuery('#contact_error').show().delay(2000).fadeOut('show');
          return false;
      }

      var message = jQuery("#form_message").val();
      if (message == '') {

          //alert('phone');
          jQuery('#contact_error').html("Please enter comment");
          jQuery('#contact_error').show().delay(0).fadeIn('show');
          jQuery('#contact_error').show().delay(2000).fadeOut('show');
          return false;
      }



        e.preventDefault();
      
        $.ajax({
            type: 'POST',
            url: url,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            
            success: function(msg){
                if (msg == "1") {
                    jQuery('#contact_success').html(
                        "Comment Added Successfully!!!!");
                    jQuery('#loading').hide();
                    jQuery('#stop_loading').show();
                    jQuery('#contact_success').show().delay(0).fadeIn('show');
                    jQuery('#contact_success').show().delay(5000).fadeOut('show');
                    jQuery('#form_name').val('');
                    jQuery('#form_email').val('');
                    jQuery('#form_subject').val('');
                    jQuery('#form_message').val('');
                    
                    return false;
                } else {
                    console.log("err");
                    jQuery('#contact_error').html("Blog Review Already Added!");
                    jQuery('#contact_error').show().delay(0).fadeIn('show');
                    jQuery('#contact_error').show().delay(2000).fadeOut('show');
                }
            }
        });
    });
    
   
    
});

</script>


<?php include("includes/footer.php"); ?>