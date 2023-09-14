

<?php include('include/header.php');?>



<!-- Start: Main -->

<div id="main"> 

  

 <?php include('include/sidebar_left.php');?>

 

  <!-- Start: Content -->

  <section id="content_wrapper">

    <div id="topbar">

	

      <div class="topbar-left">

        <ol class="breadcrumb">

		  <li class="crumb-active"><a href="#"> User Permission</a></li>

          <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>

          <li class="crumb-link"><a href="<?php echo $base_url; ?>permission/list_permission">Permission</a></li>

          <li class="crumb-trail">Edit User Permission</li>

        </ol>

      </div>

    </div>

    <div id="content">

      <div class="row">

        <div class="col-md-12">

          <div class="panel">

            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit User Permission </span> </div>

            <div class="panel-body">

                      

 



<?php if($this->session->flashdata('flashError')!='') { ?>

<div class="alert alert-danger alert-dismissable">

                                        <i class="fa fa-warning"></i>

                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                        <b>Error!</b> <?php echo $this->session->flashdata('flashError'); ?>

                                    </div>

<?php }  ?>



    

								<div id="validator"  class="alert alert-danger alert-dismissable" style="display:none;">

                                        <i class="fa fa-warning"></i>

                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                        <b>Error &nbsp; </b><span id="error_msg1"></span>

                                    </div>

    

            <div class="col-md-12">			

			

            <form role="form" id="form" method="post" action="<?php echo $base_url;?>permission/edit/<?php echo $this->uri->segment(3);?>" enctype="multipart/form-data">

			<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">

			<INPUT TYPE="hidden" NAME="action" VALUE="edit_permission">

	

                <div class="form-group">

                  <label for="fabricname">User Type: <span class="mandatory_field">*</span></label>

                  <input id="cname" name="cname" value="<?php echo $cname;?>"  type="text" class="form-control" placeholder="Enter User Type" />

                </div>

              <style>

						table, th, td {

							border: 1px solid black;

						}

					</style>

				<table class="table table-bordered table-striped datatable dataTable">

				  <tr>

					<th>Feature</th>

					<th>View</th>		

					<th>Edit</th>

				  </tr>

					<?php

					//print_r($editperm);die;

					$permvalue = explode(',',$permission);

					$editpermvalue = explode(',',$editperm);

					 

					if($allpermission != '' ){

					foreach($allpermission as $perm)

					{ 

					?>	

					

				  <tr>

					<td><label class="col-sm-3 control-label" for="select"> <?php echo $perm->pname; ?> </label></td>

					<td><input type="checkbox" name="permission[]" id="permission" value="<?php echo $perm->id; ?>" <?php if (in_array($perm->id, $permvalue)) { ?> checked = 'checked' <?php } ?> multiple="multiple" ></td>	



					

					<td><input type="checkbox" name="editperm[]" id="editperm" value="<?php echo $perm->id; ?>" <?php if (in_array($perm->id, $editpermvalue)) { ?> checked = 'checked' <?php } ?> multiple="multiple"></td>

					

					

					

				  </tr>

   <?php }} ?>

				</table>

			  

                <div class="form-group">

                  <input class="submit btn bg-purple pull-right" type="submit" value="Submit" onclick="javascript:validate();return false;"/>

				  <a href="<?php echo $base_url;?>permission/list_permission" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>

                </div>

              </form>

			  

            </div>

          </div>

          

          

        </div>

       </div> 

      </div>

    </div>

  </section>

  <!-- End: Content --> 

  

   

 <?php include('include/sidebar_right.php');?>

 </div>

<!-- End #Main --> 

<?php include('include/footer.php')?>



             

<script>

	function validate(){

		var cname = $("#cname").val();

		if(cname == ''){

			//alert('Please Enter Fabric ');

			$("#error_msg1").html("Please Enter User Category Name.");

				$("#validator").css("display","block");

			return false;

		}



		var pa=document.getElementById('cname');

		var p = /[a-zA-Z\s-, ]+$/; 

		if(!p.test(pa.value))

			{

				//alert("Please Enter Valid Fabric ");

				$("#error_msg1").html("Please Enter Valid User Category Name.");

				$("#validator").css("display","block");

				 

				return false;

			}

			

		

		

		

		

		$('#form').submit();

	}

	 

	

</script>

