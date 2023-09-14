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
              <a href="<?php echo $base_url?>index.php/blog-listing"><i class="feather icon-feather-arrow-left"></i> Back to Insights</a>
            </div>
            <div class="blog-det-heading">
              <h4>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, sequi?
              </h4>
            </div>
            <div class="blog-det-img">
              <img src="<?php echo $base_url_views?>img/blog-det-img1.jpg" alt="">

              <div class="blog-det-cat">
                <span>Insurance</span>
              </div>
            </div>
            <div class="blog-det-desc">
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit autem facere cupiditate, placeat dolor temporibus. Voluptatum beatae temporibus laudantium vitae ipsa iusto dolores natus enim ex at, inventore, nostrum, esse quia perferendis molestias incidunt. Quas exercitationem odio voluptas recusandae numquam esse dignissimos beatae, molestiae quae dolore aspernatur sapiente quidem id nisi sequi voluptate, ducimus optio magnam, incidunt amet. Tempora natus quidem eaque voluptatibus nemo corporis nobis, alias omnis blanditiis, magnam eveniet? Praesentium, facilis, quo aperiam in quae reiciendis officia fuga expedita laudantium, soluta temporibus, provident. Cupiditate unde mollitia vitae natus exercitationem tenetur explicabo rerum illum voluptatibus magnam, beatae, fuga aspernatur!
              </p>
              <p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Dignissimos id praesentium magnam voluptatibus pariatur consequuntur in laborum nemo ea nihil distinctio nobis neque repudiandae est adipisci minima voluptatem inventore, culpa quam similique maiores fugit perspiciatis aliquid architecto hic. Ratione, libero ab porro quae dolorem excepturi harum modi iusto dolores inventore eos expedita tempore corporis aperiam id odio soluta iste! Dicta corrupti facere veniam. Commodi qui assumenda molestiae totam, dolore, exercitationem similique harum tenetur dolorem labore non impedit, maiores eos fugiat atque doloremque consequatur libero dolorum ipsa corporis ex repellendus esse ad inventore! Sit culpa repellat adipisci magnam, aliquid facilis illum quis minus, eaque est voluptates eos consequuntur mollitia nemo nostrum. Ab odio esse similique soluta, blanditiis corporis impedit tenetur consequatur nobis laborum a natus minus incidunt aliquid molestiae in dicta earum voluptate perspiciatis officiis error laudantium. Ea repellat et possimus ad itaque laborum voluptatum, eos, natus quam rerum accusantium nesciunt ducimus pariatur, a architecto dolore, sit rem labore fugiat facere perferendis atque assumenda eligendi. Nesciunt illum delectus ipsam illo tenetur suscipit reprehenderit vel sed quam tempore? Dolores obcaecati nisi ratione quia eos. Reprehenderit vel sequi mollitia earum officia est obcaecati itaque, ea necessitatibus, distinctio unde omnis aliquid illo, minima totam?</p>
            </div>
            <div class="blog-back text-center">
              <a href="#" class="mt-5"><i class="feather icon-feather-arrow-left"></i> Back to Insights</a>
            </div>
            <div class="blog-share">
              <div class="blog-social">
                <h5 class="mb-4" style="color: #232323; font-weight: 700">Share</h5>
                <ul>
                  <li><a href="#"><i class="feather icon-feather-facebook"></i></a></li>
                  <li><a href="#"><i class="feather icon-feather-twitter"></i></a></li>
                  <li><a href="#"><i class="feather icon-feather-instagram"></i></a></li>
                </ul>
              </div>
              <div class="blog-comment-form mt-4">
                <h5 class="" style="color: #232323; font-weight: 700">Leave a Comment</h5>
                <form action="">
                  <div class="row">
                    <div class="col-lg-4">
                      <input type="text" placeholder="name" name="" id="">
                    </div>
                    <div class="col-lg-4">
                      <input type="email" placeholder="email" name="" id="">
                    </div>
                    <div class="col-lg-4">
                      <input type="text" placeholder="Subject" name="" id="">
                    </div>
                    <div class="col-lg-12">
                      <textarea name="" id="" placeholder="comment" cols="30" rows="10"></textarea>
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
                  <li><a href="#"><i class="feather icon-feather-facebook"></i></a></li>
                  <li><a href="#"><i class="feather icon-feather-twitter"></i></a></li>
                  <li><a href="#"><i class="feather icon-feather-instagram"></i></a></li>
                </ul>
              </div>
          </div>
          <div class="side-sec mb-4">
            <div class="blog-recent">
                <h5 class="mb-4" style="color: #232323; font-weight: 700">Recent In</h5>
                <ul>
                  <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, eum.</a></li>
                  <li><a href="#">Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Culpa, sequi.</a></li>
                  <li><a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, aspernatur!</a></li>
                </ul>
              </div>
          </div>
      </div>
  </div>
 </div>
</section>


<?php include("includes/footer.php"); ?>