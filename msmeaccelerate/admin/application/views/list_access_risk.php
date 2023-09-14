<?php include('include/header.php');?>

<!-- Start: Main --><div id="main">   

 <?php include('include/sidebar_left.php');?>  

 <!-- Start: Content -->  <!-- Start: Content --> 

 <section id="content_wrapper">    

 	<div id="topbar">      

 <div class="topbar-left">        

 	<ol class="breadcrumb">          

 <li class="crumb-active">

 	<a href="javascript:void(0);">Access your Risk Data</a></li>         

 <li class="crumb-icon"><a href="<?php echo $base_url; ?>">

 <span class="glyphicon glyphicon-home"></span></a></li>                   

 <li class="crumb-trail">Access your Risk Data</li>        

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

 	

  <a href="javascript:void('0');" onclick="deletecountry();" class="btn btn-danger pull-right"  style="margin-left:10px"><i class="fa fa-trash-o"></i> Delete</a>

  <!-- <form action="<?php echo $base_url."access_risk/download_user";?>" method="post" enctype="multipart/form-data">
			<input class="submit btn btn-alert pull-right " type="submit" value="Download User" style="margin-left:10px;">	
		</form>	 -->				

 <!--<a href="<?php echo $base_url;?>user/add/" class="btn btn-alert pull-right"><i class="fa fa-plus"></i> Add User</a> -->		

 </div>		<div class="clearfix">&nbsp;</div>			        

 </div>      

 <div class="row">        

 <div class="col-md-12">          

 <div class="panel">            

 <div class="panel-heading"> 

 <span class="panel-title"> 

 <span class="glyphicon glyphicon-list-alt"></span>Access your Risk Data Listing </span> 

 </div>            <div class="panel-body">			  

 <form action="<?php echo $base_url."access_risk/deletes";?>" method="post" enctype="multipart/form-data" id="form">			  

 <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">                 

 <div class="table-responsive">                

 <table id="example1" class="table table-bordered table-striped">                 

 <thead>                    

 <tr>                      

 <th>Select</th>                                          
<th>Company Name</th>
<th>E-mail</th>
<th>Industry</th>
<th>Sub Industry</th>
<th>Annual Turnover</th>
<th>Asset Value</th>
<th>Number of Employee</th>
<th>Goods or Services on Credit</th>
<th>Added Date</th>

 <!-- <th>Edit</th> 				                         -->

 <!--<th class="sorting" role="columnheader" aria-controls="table-2" style="width: auto;">Action</th> -->                    

 </tr>                  

 </thead>     				                    

 <tbody>                

 <?php                  

 if($result){                    					

 for($i=0;$i<count($result);$i++){ ?>         

 <tr>					

 <td><input name="selected[]" id="selected[]" value="<?php echo $result[$i]->id; ?>" type="checkbox"  class="minimal-red"></td>					                                 
<td><?php echo $result[$i]->company; ?></td>
<td><?php echo $result[$i]->email; ?></td>
<td><?php echo $this->access_risk_model->get_industry_name($result[$i]->industry_id); ?></td>
<td><?php echo $this->access_risk_model->get_sub_industry_name($result[$i]->sub_industry_id); ?></td>
<td><?php echo $result[$i]->annual_turnover; ?></td>
<td><?php echo $result[$i]->asses_value; ?></td>
<td><?php echo $result[$i]->no_of_emp; ?></td>
<td><?php 
            if($result[$i]->check1 == 1){
                echo "Yes";
            }else if($result[$i]->check1 == 2){
                echo "No";
            }else{
                echo "-";
            }

   ?></td>
   <td><?php 
		if($result[$i]->added_date != '0000-00-00'){
			
			 $newDate = date("d-m-Y", strtotime($result[$i]->added_date));  
			 
			echo $newDate; 
		}
			
	?></td>
 </tr>				

 <?php } } else {	 echo 'No Access your Risk Data Found';

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