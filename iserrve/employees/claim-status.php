<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Claim Details</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <link rel="stylesheet" href="dist/css/new.css">
  <link rel="stylesheet" href="dist/css/a.css">
	 <link rel="stylesheet" href="dist/css/font-icons.min.css">
  <link rel="stylesheet" href="dist/css/responsive-new.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
	.small-box p {
    font-size: 18px;
}
	
	.btn-group, .btn-group-vertical {
    position: relative;
    display: -ms-inline-flexbox;
    display: none!important;
    vertical-align: middle;
}
	div#example_filter {
    margin-top: 0px!important;
    /* right: 0; */
    z-index: 1;
    /* position: absolute; */
}


.policy-label {
    padding: 30px 20px;
    
    border: 1px solid #E5EAF5;
    border-radius: 12px;
    display: flex;
    align-items: flex-start;
}

.policy-label-icon {
    width: 75px;
    height: 75px;
    margin-right: 10px;
    box-shadow: 0px 17px 26px 2px rgb(0 0 0 / 9%);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.policy-label-icon i {
    font-size: 22px;
    color: var(--maincolor);
}
.policy-text{
  margin-left: 10px;
}

.policy-text h5 {
    font-size: 21px;
    color: #18bdc9;
}

.policy-tpa {
    display: flex;
    align-items: center;
}

.policy-tpa h6 {
    margin-right: 91px;
}

.policy-tpa h6 span {
    color: #8b8888;
}

.sum-counter .card {
    padding: 20px 10px 15px;
}

.sum-counter .card h6 {
    font-size: 14px;
}

.sum-counter .card span {
    font-size: 32px;
    margin: 0;
}
	
	</style>
	
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'include/navigation.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'include/aside.php';?>

  <!-- End Main Sidebar Container -->




     <div class="container-fluid">
       
     </div>


<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<div class="row mt-2">
  <div class="col-md-4">

<div class="form-group">

<select class="form-control">
<option>option 1</option>
<option>option 2</option>
<option>option 3</option>
<option>option 4</option>
<option>option 5</option>
</select>
</div>
</div>
<div class="col-md-8">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">All Utilities</li>
</ol>

</div>
</div>
</div>
</div>


<div class="content p-0">
<div class="container">

<div class="row">
  <div class="col-12">
    
     

         <div class="row mt-4">
          <div class="col-lg-12">
              <div class="policy-label">
                  <div class="policy-label-icon">
                      <i class="fas fa-heart"></i>
                  </div>
                  <div class="policy-text">
                    <h5 class="policy-name">HDFC Eargo General Insurance</h5>
                    <div class="policy-tpa">  
                      <h6>TPA: <span>No Applicable</span></h6>
                      <h6>Policy No: <span>1234567890</span></h6>
                    </div>
                    <div class="policy-period">
                       <h6> Validity: <span>12/11/2022 - 12/12/22</span></h6>
                    </div>

                  </div>
              </div>
          </div>
      </div>


      <div class="row mt-4 sum-counter">
        <div class="col">
            <div class="card  border-1px new-border-radius" style="background: #ffebeb;">
                <h6>Inception Premium</h6>
                <span class="text-danger">50,000,00</span>
            </div>
        </div>
        <div class="col">
            <div class="card  border-1px new-border-radius" style="background: #ecebff;">
                <h6>Additional Premium</h6>
                <span class="text-primary">30,000</span>
            </div>
          </div>
          <div class="col">
            <div class="card  border-1px new-border-radius" style="background: #e7ffeb;">
                <h6>Deletion Premium</h6>
                <span class="text-success">50,000</span>
            </div>
          </div>
          <div class="col">
             <div class="card  border-1px new-border-radius" style="background: #fff6d5">
                <h6>NFT Premium</h6>
                <span class="text-warning">50,000.00</span>
            </div>
          </div>
          <div class="col">
            <div class="card  border-1px new-border-radius" style="background: #e7edff">
                <h6>Active Premium</h6>
                <span class="text-info">54</span>
            </div>
          </div>
        </div>
     

<div class="row mt-4">
          <div class="col-lg-12">
              <div class="card  border-1px new-border-radius">
      <div class="card-body">
        
        <div class="row mb-4">
  <div class="col-md-8">
<h2 class="m-0  box-heading">
 Enrollment Summary
  

  </h2>
  </div>
          
        
        </div>
        
  <div class="row mb-2 mt-2">
    
    <div class="col-12">
      <table class="table">
 
          <thead class="thead-light font-size-15px">
    <tr>
      <th scope="col">Lives</th>
      <th scope="col">Inception Lives</th>
      <th scope="col">Additional Lives</th>
      <th scope="col">Deletion Lives</th>
      <th scope="col">Active Lives</th>
      
    </tr>
  </thead>
  <tbody class="font-size-13px">
    <tr>
      
      <td>Employees</td>
      <td>13</td>
      <td>3</td>
    <td>3</td>
      <td>13</td>
   
    </tr>
    <tr>
      <td>Employees</td>
      <td>13</td>
      <td>3</td>
    <td>3</td>
      <td>13</td>
    </tr>
    <tr>
      <td>Employees</td>
      <td>13</td>
      <td>3</td>
    <td>3</td>
      <td>13</td>
    </tr>
      </tbody><thead class="thead-dark">
    <tr>
      <th>Total</th>
      <th>29</th>
      <th>10</th>
      <th>9</th>
      <th>34</th>
    </tr>
  </thead>
  
</table>

        </div>
      </div>
      
    
    
    
    </div>
  </div>
          </div>
      </div>



  
    
  </div>
</div>
</div>
</div>
</div>
    













<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	

<script src="dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="dist/js/demo.js"></script>





<!--<script>
  $(document).ready(function () {
    $('#example').DataTable();
});
</script>-->
	
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
	</script>
	

		<script>
		$("#selectAll").click(function() {
	$("input[type=checkbox]").prop("checked", $(this).prop("checked"));
});

$("input[type=checkbox]").click(function() {
	if (!$(this).prop("checked")) {
		$("#selectAll").prop("checked", false);
	}
});

		
		</script>
	
	
</body>
</html>
