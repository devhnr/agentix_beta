<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Iserrve</title>
        <!--<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="<?=base_url('assets/employee_assets/')?>css/v-style-new.css" />
        <link rel="stylesheet" href="<?=base_url('assets/employee_assets/')?>css/font-icons.min.css" />
        <link rel="shortcut icon" href="<?=base_url('assets/employee_assets/')?>img/favicon.png" />
        <link rel="stylesheet" href="<?=base_url('assets/employee_assets/')?>css/v-skin.css" />
        <link rel="stylesheet" href="<?=base_url('assets/employee_assets/')?>css/responsive.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css" />
        <link rel="stylesheet" href="<?=base_url('assets/employee_assets/')?>css/slick.css" />
        <link rel="stylesheet" href="<?=base_url('assets/employee_assets/')?>css/slick-theme.css" />
        <link rel="stylesheet" href="<?=base_url('assets/employee_assets/')?>css/v-style.css" />

        <script></script>
        <style>
            select.policy-select {
                padding: 10px 26px;
                font-size: 13px;
                border: 1px solid #efefef;
                outline: none;
                border-radius: 2px;
            }

            .text-right {
                text-align: right !important;
            }

            @media only screen and (max-width: 600px) {
                .text-right {
                    text-align: unset !important;
                }
                select.policy-select {
                    margin-top: 20px !important;
                }
            }
        </style>
    </head>

    <body>
        <div id="fb-root"></div>

        <!-- Your Chat plugin code -->

        <div id="fb-customer-chat" class="fb-customerchat"></div>

        <script>
            var chatbox = document.getElementById("fb-customer-chat");

            chatbox.setAttribute("page_id", "103648929191316");

            chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->

        <script>
            // window.fbAsyncInit = function() {
            //
            //   FB.init({
            //
            //     xfbml            : true,
            //
            //     version          : 'v15.0'
            //
            //   });
            //
            // };
            //
            //
            //
            // (function(d, s, id) {
            //
            //   var js, fjs = d.getElementsByTagName(s)[0];
            //
            //   if (d.getElementById(id)) return;
            //
            //   js = d.createElement(s); js.id = id;
            //
            //   js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            //
            //   fjs.parentNode.insertBefore(js, fjs);
            //
            // }(document, 'script', 'facebook-jssdk'));
        </script>
        <header class="header">
            <nav>
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-2 col-md-2">
                            <a href="<?=base_url()?>employee" class="main-logo">
                                <img src="<?=base_url('assets/employee_assets/')?>img/logo-iserrve.png" alt="" />
                            </a>
                        </div>
                        <div class="col-6 col-lg-10 col-md-10">
                            <div class="d-flex v-mobo-hide align-items-center">
                                <ul class="v-nav">
                                    <li><a href="<?=base_url()?>employee">Home</a></li>
                                    <?php if(!empty($emp)){ foreach ($emp as $e){
																		$policy_no = $e['policy_no'];
																		$policy_data = $this->em->getPolicyData($policy_no); } } ?>
                                    <li><a href="<?=base_url('employee/network_hospitals')?>">Cashless Hospital</a></li>
                                    <li><a href="<?=base_url('employee/claim_form')?>">Intimate Claim </a></li>
                                    <?php
																			$employee_no = $this->session->userdata("login_id");
                                      $claims = $this->em->get_current_claims($employee_no); ?>
                                    <?php if(!empty($claims)) { ?>
                                    <li><a href="<?=base_url('employee/current_claims')?>">Current Claim </a></li>
                                    <?php } ?>
                                    <li><a href="#feedback" data-bs-toggle="modal" data-bs-target="#feedback">Feedback</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="<?=base_url('employee/downloads_doc')?>">Downloads</a></li>
                                    <!-- <li><a href="#">Msmeaccelerate</a></li>  -->
                                </ul>

                                <div class="head-sec">
                                    <div class="v-dropdown1">
                                        <a href="<?=base_url()?>employee/signout" class="vdropbtn" onclick="myFunction()"><i class="feather icon-feather-sign-out"></i> Sign out</a>
                                    </div>
                                </div>
                                <div class="head-sec">
                                    <a href="index.html" class="rag-logo">
                                        <img src="<?=base_url('assets/employee_assets/')?>img/raghnall.png" alt="" />
                                    </a>
                                </div>
                            </div>

                            <div class="burger-menu v-des-hide">
                                <span style="font-size: 30px; cursor: pointer;" onclick="openNav()">
                                    <i class="feather icon-feather-align-center"></i>
                                </span>
                                <div id="mySidenav" class="sidenav">
                                    <div class="head-sec">
                                        <a href="#" class="v-btn-head">LOGIN</a>
                                    </div>
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                    <div class="side-main-menu">
                                        <a href="#">HOME</a>
                                        <!-- <a href="#">ABOUT US</a> -->
                                        <a href="<?=base_url('employee/network_hospitals')?>">Cashless Hospital</a>
                                        <!-- <a href="#">PURCHASES</a> -->
                                        <a href="<?=base_url('employee/claim_form')?>">Intimate form</a>
                                        <!-- 		  <a href="#">DIGITAL LOCKER</a>
									  <a href="#">TERMS & CONDITIONS</a> -->
                                        <li><a href="#feedback" data-bs-toggle="modal" data-bs-target="#feedback">FEEDBACK</a></li>
                                        <a href="#">LOGOUT</a>
                                    </div>
                                    <div class="logo-sec mt-4">
                                        <a href="index.html" class="rag-logo">
                                            <img src="<?=base_url('assets/employee_assets/')?>img/raghnall.png" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </body>
</html>