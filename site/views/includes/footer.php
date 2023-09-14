  <footer>

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="footer-head-flex">

                        <div class="foot-logo">
                            <a href="<?php echo $base_url; ?>">
                            <img src="<?php echo $base_url_views;?>img/logo.png" alt="">
                        </a>

                        </div>

                        <div class="social-icon">

                            <ul>

                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>

                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>

                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>                                

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row mt-4">

                <div class="col-lg-6">

                    <div class="row">

                        <div class="col-lg-4">

                            <ul class="footer-menus">

                                <li><a href="<?php echo $base_url?>products">Products</a></li>

                                <li><a href="<?php echo $base_url?>services">Services</a></li>

                                <li><a href="<?php echo $base_url?>pricing">Pricing</a></li>

                            </ul>

                        </div>

                        <div class="col-lg-4">

                            <ul class="footer-menus">

                                <li><a href="<?php echo $base_url?>about-us">About us</li>

                                <li><a href="<?php echo $base_url?>signup">Sign up for Free</a></li>

                                <li><a href="<?php echo $base_url?>login">Login</a></li>

                            </ul>

                        </div>

                        <div class="col-lg-4">

                            <h6>Contact</h6>

                            <ul class="footer-menus">                               

                                <li><a href="#">contact@agentix.com</a></li>

                                <li><a href="#">(+91)-9987764627</a></li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 footer-text">

                    <ul class="footer-menus d-flex align-items-center">                               

                        <li><a href="#">Terms of Use</a></li>

                        <li><a href="#">Privacy Policy</a></li>

                    </ul>

                    <p>Made with ♡ in India</p>

                    <p>© Mititek Ventures Pvt Ltd | All rights reserved</p>

                </div>

            </div>

        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>

        var swiper = new Swiper(".tabswipe", {

          slidesPerView: 1,

          spaceBetween: 10,

          pagination: {

            el: ".swiper-pagination",

            clickable: true,

          },

          navigation: {

        nextEl: ".swiper-button-next",

        prevEl: ".swiper-button-prev",

      },

          breakpoints: {

            640: {

              slidesPerView: 2,

              spaceBetween: 20,

            },

            768: {

              slidesPerView: 4,

              spaceBetween: 40,

            },

            1024: {

              slidesPerView: 5,

              spaceBetween: 50,

            },

          },

        });

      </script>



<script>

    var swiper = new Swiper(".testimonial", {

    //   slidesPerView: 3,

      loop: true,

      spaceBetween: 30,

      centeredSlides: true,

    //   pagination: {

    //     el: ".swiper-pagination",

    //     clickable: true,

    //   },
      navigation: {

        nextEl: ".swiper-button-next",

        prevEl: ".swiper-button-prev",
      },

      breakpoints: {

            640: {

              slidesPerView: 1,

              spaceBetween: 20,

            },

            768: {

              slidesPerView: 1,

              spaceBetween: 40,

            },

            1024: {

              slidesPerView: 3,

              spaceBetween: 50,

            },

          },

    });

  </script>

      <script>

        function openCity(evt, cityName) {

          var i, tabcontent, tablinks;

          tabcontent = document.getElementsByClassName("tabcontent");

          for (i = 0; i < tabcontent.length; i++) {

            tabcontent[i].style.display = "none";

          }

          tablinks = document.getElementsByClassName("tablinks");

          for (i = 0; i < tablinks.length; i++) {

            tablinks[i].className = tablinks[i].className.replace(" vactive", "");

          }

          document.getElementById(cityName).style.display = "block";

          evt.currentTarget.className += " vactive";

        }

        

        // Get the element with id="defaultOpen" and click on it

        document.getElementById("defaultOpen").click();

        </script>



</body>

</html>
<?php if ($this->session->flashdata('L_strsucessMessage')) { ?>
<script>document.getElementById('message_succsess').innerHTML = "<?php echo $this->session->flashdata('L_strsucessMessage'); ?>";$('#message_succsess').show().delay(0).fadeIn('show');$('#message_succsess').show().delay(2000).fadeOut('show');</script>
<?php } ?>
<?php if ($this->session->flashdata('L_strErrorMessage')) { ?>
<script>document.getElementById('message_error').innerHTML = "<?php echo $this->session->flashdata('L_strErrorMessage'); ?>";$('#message_error').show().delay(0).fadeIn('show');$('#message_error').show().delay(2000).fadeOut('show');</script>
<?php } ?>