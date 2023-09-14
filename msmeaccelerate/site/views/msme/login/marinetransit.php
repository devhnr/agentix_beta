<?php
include("../connect.php");



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MSME Accelerate</title>
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
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Marine</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Marine Transist Insurance</li>
                </ol>
              </nav>
            </div>
          
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Marine Transist Insurance</h4>
                    <!--<p class="card-description"> Add class <code>.table-striped</code>-->
                    <!--</p>-->
                    <!--<table class="table table-striped">-->
                    <!--  <thead>-->
                    <!--    <tr>-->
                    <!--      <th> User </th>-->
                    <!--      <th> First name </th>-->
                    <!--      <th> Progress </th>-->
                    <!--      <th> Amount </th>-->
                    <!--      <th> Deadline </th>-->
                    <!--    </tr>-->
                    <!--  </thead>-->
                    <!--  <tbody>-->
                    <!--    <tr>-->
                    <!--      <td class="py-1">-->
                    <!--        <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />-->
                    <!--      </td>-->
                    <!--      <td> Herman Beck </td>-->
                    <!--      <td>-->
                    <!--        <div class="progress">-->
                    <!--          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--      </td>-->
                    <!--      <td> $ 77.99 </td>-->
                    <!--      <td> May 15, 2015 </td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--      <td class="py-1">-->
                    <!--        <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />-->
                    <!--      </td>-->
                    <!--      <td> Messsy Adam </td>-->
                    <!--      <td>-->
                    <!--        <div class="progress">-->
                    <!--          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--      </td>-->
                    <!--      <td> $245.30 </td>-->
                    <!--      <td> July 1, 2015 </td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--      <td class="py-1">-->
                    <!--        <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />-->
                    <!--      </td>-->
                    <!--      <td> John Richards </td>-->
                    <!--      <td>-->
                    <!--        <div class="progress">-->
                    <!--          <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--      </td>-->
                    <!--      <td> $138.00 </td>-->
                    <!--      <td> Apr 12, 2015 </td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--      <td class="py-1">-->
                    <!--        <img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />-->
                    <!--      </td>-->
                    <!--      <td> Peter Meggik </td>-->
                    <!--      <td>-->
                    <!--        <div class="progress">-->
                    <!--          <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--      </td>-->
                    <!--      <td> $ 77.99 </td>-->
                    <!--      <td> May 15, 2015 </td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--      <td class="py-1">-->
                    <!--        <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />-->
                    <!--      </td>-->
                    <!--      <td> Edward </td>-->
                    <!--      <td>-->
                    <!--        <div class="progress">-->
                    <!--          <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--      </td>-->
                    <!--      <td> $ 160.25 </td>-->
                    <!--      <td> May 03, 2015 </td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--      <td class="py-1">-->
                    <!--        <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />-->
                    <!--      </td>-->
                    <!--      <td> John Doe </td>-->
                    <!--      <td>-->
                    <!--        <div class="progress">-->
                    <!--          <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--      </td>-->
                    <!--      <td> $ 123.21 </td>-->
                    <!--      <td> April 05, 2015 </td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--      <td class="py-1">-->
                    <!--        <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />-->
                    <!--      </td>-->
                    <!--      <td> Henry Tom </td>-->
                    <!--      <td>-->
                    <!--        <div class="progress">-->
                    <!--          <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--      </td>-->
                    <!--      <td> $ 150.00 </td>-->
                    <!--      <td> June 16, 2015 </td>-->
                    <!--    </tr>-->
                    <!--  </tbody>-->
                    <!--</table>-->
                     <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> id </th>
                          <th>commodity_type</th>
                          <th> cargo_sum_insured</th>
                          <th> mobile </th>
                          <th> email </th>
                          <th>name_company</th>
                          <!--<th>pincode</th>-->
                         <th>Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $sql = "SELECT * FROM marine_transist ORDER BY created_at DESC";
$result = $con->query($sql);
                        foreach ($result as $row) 
    { 
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['commodity_type'] . '</td>';
        echo '<td>' . $row['cargo_sum_insured'] . '</td>';
        echo '<td>' . $row['mobile'] .'</td>';
        echo '<td>' . $row['email'] .'</td>';
        echo '<td>' . $row['name_company'] .'</td>';
        // echo '<td>' . $row['pincode'] .'</td>';
      
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