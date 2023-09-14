<?php include('include/header.php');?>

<!-- Start: Main --><div id="main">

 <?php include('include/sidebar_left.php');?>

 <!-- Start: Content -->  <!-- Start: Content -->

 <section id="content_wrapper">

 	<div id="topbar">

 <div class="topbar-left">

 	<ol class="breadcrumb">

 <li class="crumb-active">

 	<a href="javascript:void(0);">Current Claims</a></li>

 <li class="crumb-icon"><a href="<?php echo $base_url; ?>">

 <span class="glyphicon glyphicon-home"></span></a></li>

 <li class="crumb-trail">Current Claims</li>

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

<?php if(in_array('32',$permission1)){ ?>
<div class="col-md-12">
    <!-- <button name="delete_all" id="delete_all2" class="btn btn-danger pull-right" style="margin-left:10px"><i class="fa fa-trash-o"></i>
           Delete </button>
       <a href="<?php echo $base_url;?>claim/add" class="btn btn-alert pull-right"><i
               class="fa fa-plus"></i> Add Intimate Claim</a> -->
      <a href="<?php echo $base_url;?>claim/upload_claim" class="btn btn-alert pull-right" style="margin-left:10px;margin-right: 15px;"><i
              class="fa fa-plus"></i> Upload Claims Data</a>
              <a href="<?php echo $base_url;?>claim/add_claim_by_api" class="btn btn-alert pull-right"><i
                      class="fa fa-plus"></i> Api Upload Claim</a>

              <a href="<?php echo $front_base_url;?>upload/XLS_file/claim-mis-template.csv" class="btn btn-alert pull-left">Download Template Format</a>
 </div>
 <div class="clearfix">&nbsp;</div>
 
<?php } ?>

 </div>

 <div class="row">

 <div class="col-md-12">

 <div class="panel">

 <div class="panel-heading">

 <span class="panel-title">

 <span class="glyphicon glyphicon-list-alt"></span>Current Claims </span>

 </div>            <div class="panel-body">



 <div class="table-responsive">

 <table id="example1" class="table table-bordered table-striped">

 <thead>

 <tr>
	 <th>Select</th>
   <th>Corporate</th>
   <th>Policy No</th>
	 <th>Employee Id</th>
	 <th>Employee Name</th>
	 <th>Patient Name</th>
   <th>Relation</th>
	 <th>Claim Type</th>
   <th>TPA Claim Number</th>
	 <th>Hospitlization Date</th>
	 <th>Discharge Date</th>
   <th>Hospital Name</th>
	 <th>Amount Claimed</th>
   <th>Amount Sactioned</th>
   <th>Claim Status</th>
	 <th>Gender</th>
   <th>Hospital State</th>
   <th>Network Status</th>
   <th>Treatment Type</th>
	 <th>Level of care</th>
   <th>Disease</th>
	 <th>City</th>
   <th>Age</th>
	 <th>Claim filed Date</th>
	 <th>Claim Settled Date</th>
   <th>Disease Category</th>
	 <th>Claim Register Date</th>
   <th>Intimation Method</th>
   <th>Sum Insured</th>
	 <th>TDS Amount</th>
   <th>Deduction Amount</th>
   <th>Deduction Reason</th>
   <th>Deficiency Intimated Date</th>
	 <th>Deficiency Submission Date</th>
   <th>ICD Code</th>
   <th>Claim Paid Amount</th>
	 <th>Closure Reason</th>
   <th>Deficiency Reason</th>
   <th>Claim Sub Status</th>
   <th>Insurance Claim No.</th>
   <th>Date</th>

 <!--<th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->

 </tr>

 </thead>

 <tbody>

 		<?php foreach ($upload_claim as $value) { 
            //    echo "<pre>";print_r($value);echo "</pre>"; 
             $corporate_data = $this->admin->get_corp_data_ac_de($value['corporate']);
			 
			 

                        //   echo "<pre>";print_r($corporate_data);echo "</pre>";exit;
                        if($corporate_data->active_deactive == 0 ){ ?>
            <tr>
                <td><input name="checkbox_value" value="<?php echo base64_encode($value['id']); ?>" type="checkbox"
                        class="delete_checkbox minimal-red"></td>
                <td><?=$value['co_name']?></td>
                <td><?=$value['policy_no']?></td>
                <td><?=$value['employee_id']?></td>
                <td><?=$value['employee_name']?></td>
                <td><?=$value['patient_name']?></td>
                <td><?=$value['relation']?></td>
                <td><?=$value['claim_type']?></td>
                <td><?=$value['tpa_claim_no']?></td>
                <td><?=date('d/m/Y', strtotime($value['hospitlization_date']))?></td>
                <td><?=date('d/m/Y', strtotime($value['discharge_date']))?></td>
                <td><?=$value['hospital_name']?></td>
                <td><?=number_format($value['amount_claimed'])?></td>
                <td><?=number_format($value['sactioned_amount'])?></td>
                <td><?=$value['claim_status']?></td>
                <td><?=$value['gender']?></td>
                <td><?=$value['hospital_state']?></td>
                <td><?=$value['network_status']?></td>
                <td><?=$value['treatment_type']?></td>
                <td><?=$value['level_of_care']?></td>
                <td><?=$value['disease']?></td>
                <td><?=$value['city']?></td>
                <td><?=$value['age']?></td>
                <td><?=date('d/m/Y', strtotime($value['claim_filed_date']))?></td>
                <td><?=date('d/m/Y', strtotime($value['claim_settled_date']))?></td>
                <td><?=$value['disease_category']?></td>
                <td><?=date('d/m/Y', strtotime($value['claim_register_date']))?></td>
                <td><?=$value['intimation_method']?></td>
                <td><?=number_format($value['sum_insured'])?></td>
                <td><?=number_format($value['tds_amount'])?></td>
                <td><?=number_format($value['deduction_amount'])?></td>
                <td><?=$value['deduction_reason']?></td>
                <td><?=date('d/m/Y', strtotime($value['deficiency_intimated_date']))?></td>
                <td><?=date('d/m/Y', strtotime($value['deficiency_submission_date']))?></td>
                <td><?=$value['icd_code']?></td>
                <td><?=number_format($value['claim_paid_amount'])?></td>
                <td><?=$value['closure_reason']?></td>
                <td><?=$value['deficiency_reason']?></td>
                <td><?=$value['claim_sub_status']?></td>
                <td><?=$value['insurance_claim_no']?></td>
                <td><?=date('d/m/Y', strtotime($value['created_at']))?></td>
            </tr>
          <?php  } } ?>

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

 </div><!-- End #Main --> <?php include('include/footer.php')?><!-- DATA TABES SCRIPT -->

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
                     data: {checkbox_value: checkbox_value, tbl : 'tbl_claim'},
                     success: function() {
                       var base_url = '<?php echo $base_url.'claim/list'; ?>';
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
