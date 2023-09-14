<?php
include("../connect.php");



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MSME ACCELERATE</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    
      <!-- partial:partials/_navbar.html -->
      <?php
      include("partials/_navbar.html");
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
         <?php
      include("partials/_sidebar.html");
      ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p>
                   <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Id </th>
                          <th>Contact Person Name</th>
                          
                          <th> Pincode </th>
                          <th> Email Id </th>
                           <th>Mobile Number </th>
                         <th>Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $sql = "SELECT * FROM customer where route='corporate-cyber' ORDER BY created_at DESC";
$result = $con->query($sql);
                        foreach ($result as $row) 
    { 
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
       
        echo '<td>' . $row['name'] . '</td>';
          echo '<td>' . $row['pincode'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['mobile'] .'</td>';
       
      
        echo '<td>' . $row['created_at'] .'</td>';
        echo '</tr>';
    }
                        
            	
    
           
            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
           <?php
      include("partials/_footer.html");
      ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>