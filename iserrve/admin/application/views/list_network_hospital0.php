<?php include('include/header.php');?>

<!-- Start: Main --><div id="main">   

 <?php include('include/sidebar_left.php');?>  

 <!-- Start: Content -->  <!-- Start: Content --> 

 <section id="content_wrapper">    

 	<div id="topbar">      

 <div class="topbar-left">        

 	<ol class="breadcrumb">          

 <li class="crumb-active">

 	<a href="javascript:void(0);">Network Hospitals</a></li>         

 <li class="crumb-icon"><a href="<?php echo $base_url; ?>">

 <span class="glyphicon glyphicon-home"></span></a></li>                   

 <li class="crumb-trail">Network Hospitals</li>        

 </ol>      

 </div>    

 </div>    

 

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

 </div><?php }  ?>		<div class="col-md-12">		

 </div>		<div class="clearfix">&nbsp;</div>			        

 </div>      

 <div class="row">        

 <div class="col-md-12">          

 <div class="panel">            

 <div class="panel-heading"> 

 <span class="panel-title"> 

 <span class="glyphicon glyphicon-list-alt"></span>Network Hospital Listing </span> 

 </div>            <div class="panel-body">			  

            

 <div class="table-responsive">                

 <table id="example1" class="table table-bordered table-striped">                 

 <thead>                    

 <tr>      
	 
	 <th >Sr.No</th>
	 <th>Hospital Name</th>
	 <th >Address</th>
	 <th>Location</th>
	 <th>Landmark</th>
	 <th>City</th>
	 <th>State</th>
	 <th>Pincode</th>
 <!-- <th>Edit</th> 				                         -->

 <!--<th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->                    

 </tr>                  

 </thead>     				                    

 <tbody>                

 		<?php $i=1; foreach ($newtwork_hospitals as $value) {  ?>

            <tr>

                <td><?=$i?></td>
                <td><?=$value['HospitalName']?></td>
                <td><?=$value['AddressLine1']?></td>
                <td>----</td>
                <td><?=$value['Landmark1']?></td>
                <td><?=$value['CityName']?></td>
                <td><?=$value['StateName']?></td>
                <td><?=$value['Pincode']?></td>


            </tr>
          <?php $i++; } ?>

 </tbody>                

 </table>              

 </div>			  


 </div>          

 </div>        

 </div>        

 <div class="clearfix"></div>      

 </div>               

 </div>  </section>    

 <?php include('include/sidebar_right.php');?> 

 </div><!-- End #Main --> <?php include('include/footer.php')?><!-- DATA TABES SCRIPT -->	

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

 "bAutoWidth": false        

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