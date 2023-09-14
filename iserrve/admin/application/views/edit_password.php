	
<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main"> 
  
 <?php include('include/sidebar_left.php'); ?>
 
  <!-- Start: Content -->
  <section id="content_wrapper">
    <div id="topbar">
      <div class="topbar-left">
        <ol class="breadcrumb">
		  <li class="crumb-active"><a href="javascript:void(0);"> Edit Password </a></li>
          <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
          <li class="crumb-link"><a href="<?php echo $base_url; ?>home/change_password">Password</a></li>
          <li class="crumb-trail">Edit Password</li>
        </ol>
      </div>
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Password  </span> </div>
            <div class="panel-body">
                      
<?php if($this->session->flashdata('L_strErrorMessage')) 
  { ?>
		  <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                                    </div>
                                    
                                    
                  
  <?php } 


  ?>

  <?php if($this->session->flashdata('alreadyexist')!='') { ?>
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Error!</b> <?php echo $this->session->flashdata('alreadyexist',5); ?>
                                    </div>
<?php }  ?>


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
			
            <form role="form" id="form" method="post" action="<?php echo $base_url;?>home/change_password" enctype="multipart/form-data" >
			<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
			<INPUT TYPE="hidden" NAME="action" VALUE="edit_pass">
				 <div class="form-group">
                  <label  for="categoryname">Old Password</label>
                 <input id="oldpass" name="oldpass" type="password" class="form-control" placeholder="Enter Old Password"  value="" />
                </div>
				 <div class="form-group">
                  <label  for="categoryname">New Password</label>
                 <input id="newpassword" name="newpassword" type="password" placeholder="Enter New Password" class="form-control"/>
                </div>
				
				
                <div class="form-group">
                  <input class="submit btn bg-purple pull-right" type="button" value="Update" onclick="javascript:validate();return false;"/>
				   <a href="<?php echo $base_url;?>" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>
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
	//alert ('hi');
	var old ='<?php echo $password; ?>';
	var oldpass = $("#oldpass").val();
		if(oldpass == ''){
			
			$("#error_msg1").html("Please Enter Old Password.");
			$("#validator").css("display","block");
			return false;
		}
		var newpassword = $("#newpassword").val();
		if(newpassword == ''){
			//alert('Please Enter Category ');
			$("#error_msg1").html("Please Enter New Password.");
			$("#validator").css("display","block");
			return false;
		}
		<?php 
		if (password_verify($_POST['oldpass'], $password)) {
			$password_hash = $get_hash_password->password;
		}
		
		?>
		<?php if($password_hash != ''){?>
			var oldpass ='<?php echo $password_hash; ?>';
		<?php } else {?>
		
		var oldpass = $("#oldpass").val();
		
		<?php } ?>
		
		alert(oldpass);
		alert(old);
		
		if(oldpass != old){
			//alert('Please Enter Category ');
			$("#error_msg1").html("Old Password does not match.");
			$("#validator").css("display","block");
			return false;
		}
	
		$('#form').submit();
	}
	
	
</script>