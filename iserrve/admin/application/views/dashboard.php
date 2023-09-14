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

		<h2>Welcome to iSerrve</h2>

	</div>


   
      <div class="col-lg-3">
         <div class="v-box-layout">
            <div class="v-box">
               <div class="box-label">
                  <h6>Corporate</h6>
               </div>
               <div class="box-content">
                  <h6 ><?php echo $this->admin->corporate_count();?></h6>
               </div>
            </div>
         </div>
      </div>

      <div class="col-lg-3">
         <div class="v-box-layout">
            <div class="v-box">
               <div class="box-label">
                  <h6>Corporate User</h6>
               </div>
               <div class="box-content">
                  <h6 ><?php echo $this->admin->corporate_user_count();?></h6>
               </div>
            </div>
         </div>
      </div>


      <div class="col-lg-3">
         <div class="v-box-layout">
            <div class="v-box">
               <div class="box-label">
                  <h6>Claims</h6>
               </div>
               <div class="box-content">
                  <h6 ><?php echo $this->admin->claims_count();?></h6>
               </div>
            </div>
         </div>
      </div>


      <div class="col-lg-3">
         <div class="v-box-layout">
            <div class="v-box">
               <div class="box-label">
                  <h6>Expired Policies</h6>
               </div>
               <?php $expired_policies = $this->admin->policies_expired_count(); 
                $current_date = date('Y-m-d');

                // echo "<pre>";print_r($expired_policies);echo "</pre>";
                ?>
               <div class="box-content">
                  <?php 
                  if($expired_policies != ''){
                  foreach($expired_policies as $expired_policies_data){
                     if($expired_policies_data->policy_end_date < $current_date){
                        $count_expiry_policy += 1;
                     }
     
                  } 
                  }else{
                     $count_expiry_policy = 0;
                  } ?>

                  <h6 ><?php echo $count_expiry_policy; ?></h6>
               </div>
            </div>
         </div>
      </div>
   

			    

	</section> 

	<?php include('include/sidebar_right.php');?> </div><!-- End #Main --> 

<?php include('include/footer.php')?></body></html>