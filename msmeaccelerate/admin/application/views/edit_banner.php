<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main"> 

 <?php include('include/sidebar_left.php');?>

  <!-- Start: Content -->
  <section id="content_wrapper">
    <div id="topbar">

      <div class="topbar-left">

        <ol class="breadcrumb">

		  <li class="crumb-active"><a href="javascript:void(0);"> Edit Banner </a></li>

          <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>

          <li class="crumb-link"><a href="<?php echo $base_url; ?>banner/edit/1">Banner</a></li>

          <li class="crumb-trail">Edit Banner</li>

        </ol>

      </div>

    </div>



    <div id="content">

      <div class="row">

        <div class="col-md-12">

          <div class="panel">

            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Banner</span> </div>

            <div class="panel-body">

<?php if($this->session->flashdata('L_strErrorMessage')) { ?>

		  <div class="alert alert-success alert-dismissable">

          <i class="fa fa-check"></i>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
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
	
        <!-- <div class="col-md-12 " style="margin: 0;padding: 0;">
            <h3 style="margin-top: 25px;margin-bottom: 0px;">Section 1</h3>		 -->

        <form role="form" id="form" method="post" action="<?php echo $base_url;?>banner/edit/<?php echo $id; ?>" enctype="multipart/form-data" >

      			<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">

      			<INPUT TYPE="hidden" NAME="action" VALUE="edit_banner">

      			<INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

    			 <div class="col-md-12"> 
             <div class="form-group">
                <label style="width:100%; margin:15px 0 5px;" for="name">Banner (Size: 800px x 650px)</label>
                <input id="image" name="image" type="file" class="form-control" value=""/>
      				  <img src="<?php echo $front_base_url; ?>upload/banner/large/<?php echo $image; ?>" height="50" width="50">
            </div>
        </div>

         <div class="col-md-12"> 
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $name?>">
          </div>
        </div>

        <div class="col-md-12"> 
          <div class="form-group">
            <label>Sub Title</label>
            <input type="text" name="sub_title" id="sub_title" class="form-control" value="<?php echo $sub_title?>">
          </div>
        </div>

         <div class="col-md-12"> 
          <div class="form-group">
            <label>Url</label>
            <input type="text" name="url" id="url" class="form-control" value="<?php echo $url?>">
          </div>
        </div>

         

     <!--  </div>   -->
       
           <div class="form-group">
           <input class="submit btn bg-purple pull-right" type="submit" value="Update" onclick="javascript:validate();return false;"/>

				   <a href="<?php echo $base_url;?>banner/edit/1" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>

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

	var name = $("#name").val();

		if(name == ''){
			//alert('Please Enter Category ');
			$("#error_msg1").html("Please Enter Category Name.");
			$("#validator").css("display","block");
			return false;
		}
		$('#form').submit();
	}

	function numbersonly(e){

		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
			 if (unicode < 45 || unicode > 57) //if not a number
				return false //disable key press
		}
	}
</script>