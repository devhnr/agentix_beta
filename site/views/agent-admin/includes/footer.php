 <footer>

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="footer-head-flex">

                        <div class="foot-logo">
                            <a href="<?php echo $base_url; ?>agent-admin">

                            <img src="<?php echo $base_url_views ?>agent-admin/img/logo.png" alt="">
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

                                <li><a href="#">Technology</a></li>

                                <li><a href="#">Insurers</a></li>

                                <li><a href="<?php echo $base_url?>signup">Sign up</a></li>

                            </ul>

                        </div>

                        <div class="col-lg-4">

                            <ul class="footer-menus">

                                <li><a href="#">Work with us</a></li>

                                <li><a href="#">FAQs</a></li>

                                <li><a href="#">Referral program</a></li>

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

                    <p>Made with ♡ favorite in India</p>

                    <p>© Mititek Ventures Pvt Ltd | All rights reserved</p>

                </div>

            </div>

        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>

        function myFunction() {

        

          var moreText = document.getElementById("more");

          var btnText = document.getElementById("feaBtn");

        

          if (moreText.style.display === "none") {

            btnText.innerHTML = "More Features"; 

            moreText.style.display = "none";

          } else {

            btnText.style.display = "none";

            moreText.style.display = "block";

          }

        }

        </script>



<script>

    function myFunction1() {

    

      var moreText1 = document.getElementById("more_1");

      var btnText1 = document.getElementById("feaBtn_1");

    

      if (moreText1.style.display === "none") {

        btnText1.innerHTML = "More Features"; 

        moreText1.style.display = "none";

      } else {

        btnText1.style.display = "none";

        moreText1.style.display = "block";

      }

    }

    </script>



<script>

    function myFunction2() {

    

      var moreText2 = document.getElementById("more_2");

      var btnText2 = document.getElementById("feaBtn_2");

    

      if (moreText2.style.display === "none") {

        btnText2.innerHTML = "More Features"; 

        moreText2.style.display = "none";

      } else {

        btnText2.style.display = "none";

        moreText2.style.display = "block";

      }

    }

    </script>


</body>

</html>

<?php if ($this->session->flashdata('L_strsucessMessage')) { ?>
<script>document.getElementById('message_succsess').innerHTML = "<?php echo $this->session->flashdata('L_strsucessMessage'); ?>";$('#message_succsess').show().delay(0).fadeIn('show');$('#message_succsess').show().delay(2000).fadeOut('show');</script>
<?php } ?>
<?php if ($this->session->flashdata('L_strErrorMessage')) { ?>
<script>document.getElementById('message_error').innerHTML = "<?php echo $this->session->flashdata('L_strErrorMessage'); ?>";$('#message_error').show().delay(0).fadeIn('show');$('#message_error').show().delay(2000).fadeOut('show');</script>
<?php } ?>