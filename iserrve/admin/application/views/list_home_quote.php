<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">
   <?php include('include/sidebar_left.php');?>
   <!-- Start: Content -->  <!-- Start: Content -->
   <section id="content_wrapper">
      <div id="topbar">
         <div class="topbar-left">
            <ol class="breadcrumb">
               <li class="crumb-active">
                  <a href="javascript:void(0);">Get Quote Home</a>
               </li>
               <li class="crumb-icon"><a href="<?php echo $base_url; ?>">
                  <span class="glyphicon glyphicon-home"></span></a>
               </li>
               <li class="crumb-trail">Get Quote Home</li>
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
            </div>
            <?php }  ?>	

			<?php if(in_array('18',$permission1)){ ?>			
            <div class="col-md-12">
			
               <a href="<?php echo $base_url;?>home_get_quote/createExcel" class="btn btn-alert pull-right"> Download Excel</a>
               <!-- <a href="javascript:void('0');" onclick="deletecountry();" class="btn btn-danger pull-right"  style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a> -->
               <!-- <form action="<?php echo $base_url."user/download_user";?>" method="post" enctype="multipart/form-data">
                  <input class="submit btn btn-alert pull-right " type="submit" value="Download User" style="margin-left:10px;">
                  </form>	 -->
               <!--<a href="<?php echo $base_url;?>user/add/" class="btn btn-alert pull-right"><i class="fa fa-plus"></i> Add User</a> -->
            </div>
            <div class="clearfix">&nbsp;</div>
			<?php } ?>
			
			
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="panel">
                  <div class="panel-heading">
                     <span class="panel-title">
                     <span class="glyphicon glyphicon-list-alt"></span>Get Quote Home Listing </span>
                  </div>
                  <div class="panel-body">
                     <form action="<?php echo $base_url."home_get_quote/deletes";?>" method="post" enctype="multipart/form-data" id="form">
                        <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                        <div class="table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Email Id</th>
                                    <th>Mobile No</th>
                                    <th>Location</th>
                                    <th>No. of Employee</th>
                                    <th>Send Me Whatsapp</th>
                                    <th>Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    if($result){
                                    
                                    for($i=0;$i<count($result);$i++){ ?>
                                 <tr>
                                    <td><input name="selected[]" id="selected[]" value="<?php echo $result[$i]->id; ?>" type="checkbox"  class="minimal-red"></td>
                                    <td><?php echo $result[$i]->name; ?></td>
                                    <td><?php echo $result[$i]->company_name; ?></td>
                                    <td><?php echo $result[$i]->email; ?></td>
                                    <td><?php echo $result[$i]->phone; ?></td>
                                    <td><?php echo $result[$i]->location; ?></td>
                                    <td><?php echo $result[$i]->number_of_employee; ?></td>
                                    <td><?php if($result[$i]->send_me_whats_app ==1){echo "Yes";} ?>
                                       <?php if($result[$i]->send_me_whats_app ==0){echo "No";} ?>
                                    </td>
                                    <td><?php echo date('d/m/Y',strtotime($result[$i]->added_date));?></td>
                                    <!--   <td><a class="btn bg-purple2" title="Edit"
                                       href="<?php // echo $base_url."user/edit/"; ?><?php //echo $result[$i]->id; ?>">
                                       
                                       <i class="fa fa-pencil"></i></a></td> -->
                                 </tr>
                                 <?php } } else {	 echo 'No Get Quote Found';
                                    }  ?>
                                 </body>
                           </table>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
			<?php } ?>
   </section>
   <?php include('include/sidebar_right.php');?>
</div>
<!-- End #Main --> <?php include('include/footer.php')?><!-- DATA TABES SCRIPT -->
<link href="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $base_url_views; ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<link href="<?php echo $base_url_views; ?>plugins/iCheck/minimal/_all.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url_views; ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
   $(function () {
   
   $('#example1').dataTable({
   
   "bPaginate": true,
   
   "bLengthChange": true,
   
   "bFilter": true,
   
   "bSort": true,
   
   "bInfo": true,
   
   "bAutoWidth": false,
		   "pageLength": 50
   
   });
   
   $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
   
   checkboxClass: 'icheckbox_minimal-red',
   
   radioClass: 'iradio_minimal-red'
   
   });
   
   });
   
</script>
<script>function approve(url,is_active){
   if(is_active=='1'){
   
   var t = confirm('Are you sure you want to Active Coupan ?');
   
   }
   
   else
   
   {
   
   var t = confirm('Are you sure you want to Deactive Coupan  ?');
   
   }
   
   if(t){			window.location.href = url+"/"+is_active;
   
   }
   
   else {
   
   		return false;
   
   		}}
   
   		function deletecountry(){
   
   		var checked = $("#form input:checked").length > 0;
   
   		if (!checked)
   
   		{
   
   			alert("Please select at least one record to delete");
   
   		return false;
   
   		}
   
   		else
   
   		{
   
   			var conf = confirm("Do you want to delete?");
   
   		if(conf == true){
   
   				$('#form').submit();
   
   				return true;
   
   				}else{
   
   				return false;
   
   				}
   
   				}
   
   				}
   
   				
</script>