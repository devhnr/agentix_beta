<body class="dashboard-page"><script> var boxtest = localStorage.getItem('boxed'); if (boxtest === 'true') {document.body.className+=' boxed-layout';} </script> 

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" > <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9" > <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" > <!--<![endif]-->

<?php include('include/header.php');?><!-- Start: Main -->



<div id="main"> 

   <?php include('include/sidebar_left.php');?>  <!-- Start: Content -->  <section id="content_wrapper"> 

   <div id="topbar">     

   <div class="topbar-left">      

   <ol class="breadcrumb">    

   <li class="crumb-active"><a href="javascript:void(0);">Dashboard</a></li>  

   <li class="crumb-icon"><a href="javascript:void(0);"><span class="glyphicon glyphicon-home"></span></a></li> 

   <li class="crumb-link"><a href="javascript:void(0);">Home</a></li>

   <li class="crumb-trail">Dashboard</li> 

   </ol>  

   </div>      

   </div>   



	<div class="tab-pane p15 active" id="tab3">    

		<h2>Welcome to MSME Accelerate</h2>

	</div>

			    

	</section> 

	<?php include('include/sidebar_right.php');?> </div><!-- End #Main --> 

<?php include('include/footer.php')?></body></html>