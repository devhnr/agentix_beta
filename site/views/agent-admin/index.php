<?php include('includes/header.php');?>
 <section>

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <h3 class="mb-5">Try Out Feature in Action</h3>

                </div>

            </div>

            <div class="row feat-row justify-content-center">

                <div class="col-lg-3">

                    <a href="<?php echo $base_url;?>agent-admin/product-comparison" class="action-sec mb-4">
                        
                        <div class="act-img">
                              <img src="<?php echo $base_url_views ?>agent-admin/img/act-ico1.png" class="w-100" alt="">
                        </div>
                      

                        <span>Product Comparison</span>

                    </a>

                </div>

                <div class="col-lg-3">

                    <a href="<?php echo $base_url;?>agent-admin/repository-of-brochure" class="action-sec mb-4">
                        <div class="act-img">
                            <img src="<?php echo $base_url_views ?>agent-admin/img/act-ico2.png" class="w-100" alt="">
                        </div>

                        <span>Product Repository</span>

                    </a>

                </div>                

                <div class="col-lg-3">

                    <a type="button"  data-bs-toggle="modal" data-bs-target="#gappolicy" class="btn action-sec mb-4">
                        <div class="act-img">
                            <img src="<?php echo $base_url_views ?>agent-admin/img/act-ico3.png" class="w-100" alt="">
                        </div>

                        <span>Policy GAP Analysis</span>

                    </a>

                </div>

                <div class="col-lg-3">

                    <a type="button"  data-bs-toggle="modal" data-bs-target="#newsletter" class="btn action-sec mb-4">
                        <div class="act-img">
                        <img src="<?php echo $base_url_views ?>agent-admin/img/act-ico4.png" class="w-100" alt="">
                        </div>

                        <span>New Product Launches</span>

                    </a>

                </div>

                <div class="col-lg-3">

                    <a type="button"  data-bs-toggle="modal" data-bs-target="#newsletter" class="btn action-sec mb-4">
                        <div class="act-img">
                        <img src="<?php echo $base_url_views ?>agent-admin/img/act-ico5.png" class="w-100" alt="">
                        </div>

                        <span>Client Educational Content</span>

                    </a>

                </div>

                <div class="col-lg-3">

                    <a type="button"  data-bs-toggle="modal" data-bs-target="#newsletter" class="btn action-sec mb-4">
                        <div class="act-img">
                            <img src="<?php echo $base_url_views ?>agent-admin/img/act-ico6.png" class="w-100" alt="">
                        </div>

                        <span>Newsletter</span>

                    </a>

                </div>

            </div>

        </div>

    </section>

    <section>

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <h4 class="mb-4">Offerings you can't miss</h4>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-4">

                    <div class="offerings-sec">

                        <div class="offering-img">

                            <img src="<?php echo $base_url_views ?>agent-admin/img/serv1.png" alt="">

                        </div>

                        <div class="offering-feature">

                            <ul>

                                <li>Email Quotation to Client</li>

                                <li>Product Rating</li>

                            </ul>



                            <ul id="more">

                                <li>Lorem ipsum dolor sit amet.</li>

                                <li>Product Rating</li>

                                <li>Lorem ipsum dolor sit amet.</li>

                            </ul>

                            <button onclick="myFunction()" id="feaBtn">More Features</button>



                            <a href="#" class="btn btn-subs">Subscribe</a>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="offerings-sec">

                        <div class="offering-img">

                            <img src="<?php echo $base_url_views ?>agent-admin/img/serv2.png" alt="">

                        </div>

                        <div class="offering-feature">

                            <ul>

                                <li>Email Quotation to Client</li>

                                <li>Product Rating</li>

                            </ul>



                            <ul id="more_1">

                                <li>Lorem ipsum dolor sit amet.</li>

                                <li>Product Rating</li>

                                <li>Lorem ipsum dolor sit amet.</li>

                            </ul>

                            <button onclick="myFunction1()" id="feaBtn_1">More Features</button>



                            <a href="#" class="btn btn-subs">Subscribe</a>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="offerings-sec">

                        <div class="offering-img">

                            <img src="<?php echo $base_url_views ?>agent-admin/img/serv3.png" alt="">

                        </div>

                        <div class="offering-feature">

                            <ul>

                                <li>Email Quotation to Client</li>

                                <li>Product Rating</li>

                            </ul>



                            <ul id="more_2">

                                <li>Lorem ipsum dolor sit amet.</li>

                                <li>Product Rating</li>

                                <li>Lorem ipsum dolor sit amet.</li>

                            </ul>

                            <button onclick="myFunction2()" id="feaBtn_2">More Features</button>



                            <a href="#" class="btn btn-subs">Subscribe</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
<?php include('includes/footer.php');?>

<!-- Modal -->
<div class="modal fade" id="gappolicy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <div class="contact-modal">
            <div class="ct-ico">
                <i class="feather icon-feather-check"></i>
            </div>
            <div class="ct-head">
                <h6>Please Drop an email to <a href="mailTo: support@agentix.in"><i class="feather icon-feather-mail"></i> support@agentix.in</a> for Policy Gap Analysis</h6>
                <p>Our team will contact you shortly !</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
    </div>
  </div>
</div>

<div class="modal newsletter fade" id="newsletter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      
      <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="notification-sec">
              <div class="not-img">
                  <img src="<?php echo $base_url_views ?>agent-admin/img/notification.png" alt="">
              </div>
              <div class="not-desc">
                  <p>You will Receive our most popular Client Educational Content to your Registered Email Address Every Week</p>
              </div>
          </div>
      </div>
      
    </div>
  </div>
</div>
