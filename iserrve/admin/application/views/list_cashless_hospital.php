<?php include('include/header.php');?>

<!-- Start: Main --><div id="main">

 <?php include('include/sidebar_left.php');?>

 <!-- Start: Content -->  <!-- Start: Content -->

 <section id="content_wrapper">

 	<div id="topbar">

 <div class="topbar-left">

 	<ol class="breadcrumb">

 <li class="crumb-active">

 	<a href="javascript:void(0);">Cashless Hospital</a></li>

 <li class="crumb-icon"><a href="<?php echo $base_url; ?>">

 <span class="glyphicon glyphicon-home"></span></a></li>

 <li class="crumb-trail">Cashless Hospital</li>

 </ol>

 </div>

 </div>


<?php
            if($this->session->userdata('adminId') !='')
            {
            $uid = $this->session->userdata('adminId');
            $getuser['data'] = $this->footer->getuser($uid);
	
	//echo "<pre>";print_r($getuser['data']);echo"</pre>";
            $category = $getuser['data']->role_id;
            //echo "<pre>";print_r($category);echo"</pre>";
            $usercategory = $this->footer->usercategory($category);
            $permission1=$usercategory->editperm;
            //echo "<pre>";print_r($permission1);echo"</pre>";
            $permission1 = explode(',',$permission1);
        ?>

 <div id="content">

 <div class="row">

 <?php if($this->session->flashdata('L_strErrorMessage'))   { ?>

 <div class="alert alert-success alert-dismissable">

 <i class="fa fa-check"></i>

 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

 <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage',5); ?>

 </div>

 <?php }   ?><?php if($this->session->flashdata('flashError')!='') { ?>

 <div class="alert alert-danger alert-dismissable">

 <i class="fa fa-warning"></i>

 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

 <b>Error!</b> <?php echo $this->session->flashdata('flashError',5); ?>

</div><?php }  ?>

<?php if(in_array('33',$permission1)){ ?>
<div class="col-md-12">
    <button name="delete_all" id="delete_all2" class="btn btn-danger pull-right" style="margin-left:10px"><i class="fa fa-trash-o"></i>
           Delete </button>

           <a href="<?php echo $base_url;?>cashless_hospital/add" class="btn btn-alert pull-right"><i
                   class="fa fa-plus"></i> Upload Cashless Hospital</a>
                   <a href="<?php echo $front_base_url;?>upload/XLS_file/cashless_hospital_template.csv" class="btn btn-alert pull-left"> Download Template Format</a>

 </div>
 <div class="clearfix">&nbsp;</div>
 
<?php } ?>



 </div>

 <div class="row">

 <div class="col-md-12">

 <div class="panel">

 <div class="panel-heading">

 <span class="panel-title">

 <span class="glyphicon glyphicon-list-alt"></span>Cashless Hospital</span>

 </div>            <div class="panel-body">



 <div class="table-responsive">

 <table id="example1" class="table table-bordered table-striped">

 <thead>

 <tr>
	 <th>Select</th>
   <th>Insurer</th>
   <th>TPA</th>
   <th>Hospital Name</th>
   <th>Address</th>
   <!-- <th>Insurence Company</th> -->
   <th>Location</th>
	 <th>Landmark</th>
   <th>Email</th>
   <th>Contact No.</th>
	 <th>City</th>
	 <th>Pincode</th>
   <th>State</th>
   <th>Date</th>

 <!--<th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->

 </tr>

 </thead>

 <tbody>

 		<?php foreach ($cashless_hospital as $value) {  ?>
            <tr>
                <td><input name="checkbox_value" value="<?php echo base64_encode($value['id']); ?>" type="checkbox"
                        class="delete_checkbox minimal-red"></td>
                <td><?=$value['insurer']?></td>
                <td><?=$value['tpa']?></td>
                <td><?=$value['hospital_name']?></td>
                <td><?=$value['hospital_address']?></td>
                <!-- <td><?=$value['insurence_company']?></td> -->
                <td><?=$value['location']?></td>
                <td><?=$value['landmark']?></td>
                <td><?=$value['email']?></td>
                <td><?=$value['contact_no']?></td>
                <td><?=$value['city']?></td>
                <td><?=$value['pincode']?></td>
                <td><?=$value['state']?></td>
                <td><?=date('d-m-Y', strtotime($value['created_at']))?></td>
            </tr>
          <?php  } ?>

 </tbody>

 </table>

 </div>


 </div>

 </div>

 </div>

 <div class="clearfix"></div>

 </div>

 </div>  
			<?php } ?>
 
 </section>

 <?php include('include/sidebar_right.php');?>

 </div><!-- End #Main --> <?php include('include/footer.php')?>

<!-- Modal -->
  <div class="modal fade" id="myModal_cashless_hospital" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>-->
        <div class="modal-body" style="text-align:center;">
            <span class="model_success_span"><i class="fa fa-check" aria-hidden="true"></i></span>
            <p class="model_success_p1">Cashless Hospital Create Successfully</p>
            <!-- <p class="model_success_p2">Please Click On Next Button TO Create Product</p> -->
            <button type="button" class="btn btn-default" data-dismiss="modal">Stay Here</button>
            <!-- <a href="<?php echo $base_url;?>cashless_hospital/add/" class="btn btn-default">Next</a> -->
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>


 <!-- DATA TABES SCRIPT -->

 <link href="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

 <script src="<?php echo $base_url_views; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>

 <script src="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

 <link href="<?php echo $base_url_views; ?>plugins/iCheck/minimal/_all.css" rel="stylesheet" type="text/css" />

 <script src="<?php echo $base_url_views; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>

 <!-- page script -->

 <script type="text/javascript">
 $(function() {

     $('#example1').dataTable({

         "bPaginate": true,

         "bLengthChange": true,

         "bFilter": true,

         "bSort": true,

         "bInfo": true,

     

         "scrollX": true,
		 
		 "bAutoWidth": false,
		   "pageLength": 50

     });

     $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({

         checkboxClass: 'icheckbox_minimal-red',

         radioClass: 'iradio_minimal-red'
     });

     $('#delete_all2').click(function() {
         var checkbox = $('.delete_checkbox:checked');
         if (checkbox.length > 0) {
             var checkbox_value = [];
             $(checkbox).each(function() {
                 checkbox_value.push($(this).val());
             });

             var conf = confirm("Do you want to delete?");

             if (conf == true) {
                 $.ajax({
                     url: "<?php echo base_url('home/deleteData');?>",
                     method: "POST",
                     data: {checkbox_value: checkbox_value, tbl : 'tbl_cashless_hospital'},
                     success: function() {
                       var base_url = '<?php echo $base_url.'cashless_hospital/lists'; ?>';
                       window.location = base_url;
                     }

                 })

             } else {
                 return false;
             }
         } else {
             alert("Please select at least one record to delete");
             return false;
         }
     });
 });
 </script>

<?php 
if($this->session->userdata('product_type_name_session') != 'GPA' && $this->session->userdata('product_type_name_session') != 'GTL' ) {
if($this->session->flashdata('L_strErrorMessage') == 'Upload Cashless Hospital Successfully') { ?>
    <script>
        $("#myModal_cashless_hospital").modal('show');
    </script>
<?php } }?>