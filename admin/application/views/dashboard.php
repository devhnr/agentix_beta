<body class="dashboard-page">

    <script>

    var boxtest = localStorage.getItem('boxed');

    if (boxtest === 'true') {

        document.body.className += ' boxed-layout';

    }

    </script>

    <!DOCTYPE html>

    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->

    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" > <![endif]-->

    <!--[if IE 8]>         <html class="no-js lt-ie9" > <![endif]-->

    <!--[if gt IE 8]><!-->

    <html class="no-js">

    <!--<![endif]-->

    <?php include('include/header.php');?>

    <!-- Start: Main -->



    <div id="main">

        <?php include('include/sidebar_left.php');?>

        <!-- Start: Content -->

        <section id="content_wrapper">

            <div id="topbar">

                <div class="topbar-left">

                    <ol class="breadcrumb">

                        <li class="crumb-active"><a href="javascript:void(0);">Dashboard</a></li>

                        <li class="crumb-icon"><a href="javascript:void(0);"><span

                                    class="glyphicon glyphicon-home"></span></a></li>

                        <li class="crumb-link"><a href="javascript:void(0);">Home</a></li>

                        <li class="crumb-trail">Dashboard</li>

                    </ol>

                </div>

            </div>



            <div class="tab-pane p15 active" id="tab3">

                <h2>Welcome to The Agentix</h2>

            </div>

            <div id="content">

                <!--<div id="widget-dropdown" class="row">

                    <div class="col-sm-3">

                        <div class="panel panel-overflow mb10">

                            <div class="panel-body pn pl20">

                                <div class="icon-bg"><i class="fa fa-product-hunt"></i></div>

                                <h2 class="mt15 lh15 text-teal2"><b><?php echo  $this->admin->list_user();  ?></b></h2>

                                <h5 class="text-muted"><a style="text-decoration:none;"

                                        href="<?php echo $base_url; ?>user/lists">Register User</a>

                                    <a style="float: right; padding: 0px 10px 0px 0px;"

                                        href="<?php echo $base_url; ?>home/download_user">Download</a>

                                </h5>

                            </div>

                        </div>

                    </div>-->

                    <!--<div class="col-sm-3">   

		 <div class="panel panel-overflow mb10">   

		 <div class="panel-body pn pl20" > 

		 <div class="icon-bg"><i class="fa fa-bar-chartq-o text-teal"></i></div>   

       	 <h2 class="mt15 lh15 text-teal2"><b><?php echo $this->admin->list_subscribe();?></b></h2>    	 

		 <h5 class="text-muted"><a style="text-decoration:none;" href="<?php echo $base_url; ?>subscribe/lists">Subscribe</a>

		 <a style="float: right; padding: 0px 10px 0px 0px;" href="<?php echo $base_url; ?>home/download_subscribe">Download</a>	

		 </h5>  	

		 </div>

		 </div>

		 </div>	-->

                    <div class="col-sm-3">

                        <div class="panel panel-overflow mb10">

                            <div class="panel-body pn pl20">

                                <div class="icon-bg"><i class="fa fa-bar-chartq-o text-teal"></i></div>

                                <h2 class="mt15 lh15 text-teal2"><b><?php echo $this->admin->list_product(); ?></b></h2>

                                <h5 class="text-muted"><a style="text-decoration:none;"

                                        href="<?php echo $base_url; ?>product/lists">Products</a></h5>

                            </div>

                        </div>

                    </div>

                    <!--<div class="col-sm-12" style="margin-top: 21px;">

                        <h3>Shop Order ( Total Order : <?php echo $this->admin->list_orders(); ?> ) </h3>

                    </div>-->

                    <!--<div class="col-sm-3">

                        <div class="panel panel-overflow mb10">

                            <div class="panel-body pn pl20">

                                <div class="icon-bg"><i class="fa fa-bar-chartq-o text-teal"></i></div>

                                <h2 class="mt15 lh15 text-teal2"><b><?php echo $this->admin->list_orders('P'); ?></b>

                                </h2>

                                <h5 class="text-muted"><a style="text-decoration:none;"

                                        href="<?php echo $base_url; ?>orders/lists/P">Pending Order</a></h5>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">

                        <div class="panel panel-overflow mb10">

                            <div class="panel-body pn pl20">

                                <div class="icon-bg"><i class="fa fa-bar-chartq-o text-teal"></i></div>

                                <h2 class="mt15 lh15 text-teal2"><b><?php echo $this->admin->list_orders('S'); ?></b>

                                </h2>

                                <h5 class="text-muted"><a style="text-decoration:none;"

                                        href="<?php echo $base_url; ?>orders/lists/S">Shipping order</a></h5>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">

                        <div class="panel panel-overflow mb10">

                            <div class="panel-body pn pl20">

                                <div class="icon-bg"><i class="fa fa-bar-chartq-o text-teal"></i></div>

                                <h2 class="mt15 lh15 text-teal2"><b><?php echo $this->admin->list_orders('D'); ?></b>

                                </h2>

                                <h5 class="text-muted"><a style="text-decoration:none;"

                                        href="<?php echo $base_url; ?>orders/lists/D">Delivery Order</a></h5>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">

                        <div class="panel panel-overflow mb10">

                            <div class="panel-body pn pl20">

                                <div class="icon-bg"><i class="fa fa-bar-chartq-o text-teal"></i></div>

                                <h2 class="mt15 lh15 text-teal2"><b><?php echo $this->admin->list_orders('C'); ?></b>

                                </h2>

                                <h5 class="text-muted"><a style="text-decoration:none;"

                                        href="<?php echo $base_url; ?>orders/lists/C">Cancel Order</a></h5>

                            </div>

                        </div>

                    </div>-->

                </div>

            </div>

        </section>

        <?php include('include/sidebar_right.php');?>

    </div><!-- End #Main -->

    <?php include('include/footer.php')?>

</body>



</html>