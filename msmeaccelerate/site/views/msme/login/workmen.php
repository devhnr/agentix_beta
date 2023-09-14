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
    <!-- CSS only -->

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
                  <li class="breadcrumb-item"><a href="#">Employee Benefits</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Workmen's Compensation</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Workmen's Compensation</h4>
                    <!--<p class="card-description"> Add class <code>.table-striped</code>-->
                    <!--</p>-->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> id </th>
                          <th> Industry Category </th>
                          <th> Subcategory </th>
                          <th> Policy Period </th>
                          <!--<th> Skilled Worker </th>-->
                          <!--<th>Salary</th>-->
                          <!--<th>Unskilled Worker</th>-->
                          <!--<th>  Salary</th>-->
                          <!--<th>Claim</th>-->
                          <!--<th>Email</th>-->
                          <!--<th>Mobile</th>-->
                          <!--<th>Name Company</th>-->
                          <!--<th>Pincode</th>-->
                          <!--<th>Created At</th>-->
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $sql = "SELECT * FROM workmen_insurance ORDER BY created_at DESC";
$result = $con->query($sql);
                        foreach ($result as $row) 
    { 
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['industry_category'] . '</td>';
        echo '<td>' . $row['sub_category'] . '</td>';
        echo '<td>' . $row['policy_period'] .'</td>';
        //  echo '<td>' . $row['skilled_worker'] .'</td>';
        //   echo '<td>' . $row['salary_skilled'] .'</td>';
        //   echo '<td>' . $row['unskilled_worker'] .'</td>';
        //     echo '<td>' . $row['salary_unskilled'] .'</td>';
        //      echo '<td>' . $row['claim'] .'</td>';
        //       echo '<td>' . $row['email'] .'</td>';
        //       echo '<td>' . $row['mobile'] .'</td>';
        //         echo '<td>' . $row['name_company'] .'</td>';
        //          echo '<td>' . $row['pincode'] .'</td>';
                  echo ' <td><button type="button" class="btn btn-info btn-rounded btn-fw" data-bs-toggle="modal" data-bs-target="#subcategory' . $row['id'] . '">
  View
</button></td>';
                  
        echo '</tr>';
    
                        
            	
    
           
            
            echo'<div class="modal fade" id="subcategory' . $row['id'] . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="subcategory' . $row['id'] . 'Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subcategory' . $row['id'] . 'Label">ADD POLICY</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Select Industry Category</label>
              <select  class="form-control" id="industry" placeholder="Name of Corporate" name="industry">
                <option selected="selected" value="">' . $row['industry_category'] . '</option>
   

  </select>

            </div>
             <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Select Sub Industry Category</label>
              <select  class="form-control" id="sub" placeholder="Name of Corporate" name="subcategory">
                <option selected="selected" value="0">' . $row['sub_category'] . '</option>
   
    

  </select>

            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Policy Period (Months)</label>
              <input type="text" name="policy" value="' . $row['policy_period'] .'" class="form-control" id="psw" placeholder="Enter Policy Period (Months)">
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Number of Skilled Workers</label>
              <input type="text" name="skilled" value="' . $row['skilled_worker'] .'" class="form-control" id="psw" placeholder="Enter Number of Skilled Workers">
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Salary (per month per worker)</label>
              <input type="text" value="' . $row['salary_skilled'] .'" name="salary_skill" class="form-control" id="psw" placeholder="Enter Salary (per month per worker)">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Number of unskilled worker</label>
              <input type="text" value="' . $row['unskilled_worker'] .'" name="unskilled" class="form-control" id="psw" placeholder="Enter Number of unskilled worker">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Salary (per month per worker)</label>
              <input type="text" value="' . $row['salary_unskilled'] .'" name="salary_unskill" class="form-control" id="psw" placeholder="Enter Salary (per month per worker)">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Did you have claim in your last policy?</label>
              <label class="radio-inline" >' . $row['claim'] .'</label>
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Mobile Number</label>
              <input type="text" name="mobile" value="' . $row['mobile'] .'" class="form-control" id="psw" placeholder="Enter Mobile Number">
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Email Id</label>
              <input type="text" name="email" class="form-control" value="' . $row['email'] .'" id="psw" placeholder="Enter Email Id">
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Name of the Company</label>
              <input type="text" name="company" value="' . $row['name_company'] .'" class="form-control" id="psw" placeholder="Enter Name of the Company">
            </div>
             <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Pincode</label>
              <input type="text" name="pincode" value="' . $row['pincode'] .'" class="form-control" id="psw" placeholder="Enter Pincode">
            </div>
           
          </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-inverse-warning btn-fw" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>';
}
?>
            
                      </tbody>
                    </table>
                    <?php
                    $limit = 5;  
                    $initial_page = ($page_number-1) * $limit; 
?>

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