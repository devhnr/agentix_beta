<body class="dashboard-page"><script> var boxtest = localStorage.getItem('boxed'); if (boxtest === 'true') {document.body.className+=' boxed-layout';} </script> 

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" > <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9" > <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" > <!--<![endif]-->

<?php include('include/header.php');?><!-- Start: Main -->


<div id="main"> 

<style>



</style>

   <?php include('include/sidebar_left.php');?>  <!-- Start: Content -->  <section id="content_wrapper"> 

   <div id="topbar">     

   <div class="topbar-left">      

   <ol class="breadcrumb">    

   <li class="crumb-active"><a href="javascript:void(0);">Endorsement Calculation</a></li>  

   <li class="crumb-icon"><a href="javascript:void(0);"><span class="glyphicon glyphicon-home"></span></a></li> 

   <li class="crumb-link"><a href="javascript:void(0);">Home</a></li>

   <li class="crumb-trail">Endorsement Calculation</li> 

   </ol>  

   </div>      

   </div>   



 
<div class="container">
   <div class="row">
    <div class="v-box-card">
    <div class="table-responsive">     
    <h5>Endorsement Calculation</h5>     
  <table class="table cus-table">
    <thead>
      <tr>
        <th>SI No</th>
        <th>Endorsement Title</th>
        <th>Endorsement Number</th>
        <th>Transaction Statement</th>
        <th>Export Addition</th>
        <th>Export Deletion</th>
        <th>View Details</th>
        <th>Credited At</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Feb Addition Inputs 03032023</td>
        <td>Endorsement Under Process</td>
        <td>Feb 2023</td>
        <td><button class="btn btn-sm btn-primary">Export Addition</button></td>
        <td><button class="btn btn-sm btn-primary">Export Deletion</button></td>
        <td><button class="btn btn-sm btn-info">View Details</button></td>
        <td>Feb 2023 15:17:42</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Feb Addition Inputs 03032023</td>
        <td>Endorsement Under Process</td>
        <td>Feb 2023</td>
        <td><button class="btn btn-sm btn-primary">Export Addition</button></td>
        <td><button class="btn btn-sm btn-primary">Export Deletion</button></td>
        <td><button class="btn btn-sm btn-info">View Details</button></td>
        <td>Feb 2023 15:17:42</td>
      </tr>
      
    </tbody>
  </table>
  </div>
    </div>
   
   </div>
   
</div>
   




   
			    

	</section> 

	<?php include('include/sidebar_right.php');?> </div><!-- End #Main --> 

<?php include('include/footer.php')?></body></html>