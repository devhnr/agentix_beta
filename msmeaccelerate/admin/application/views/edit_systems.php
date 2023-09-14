<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main"> 
  
 <?php include('include/sidebar_left.php');?>
 
  <!-- Start: Content -->
  <section id="content_wrapper">
    <div id="topbar">
      <div class="topbar-left">
        <ol class="breadcrumb">
		  <li class="crumb-active"><a href="javascript:void(0);"> Edit Systems </a></li>
          <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
          <li class="crumb-link"><a href="<?php echo $base_url; ?>systems/lists">Systems</a></li>
          <li class="crumb-trail">Edit Systems</li>
        </ol>
      </div>
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Edit Systems</span> </div>
            <div class="panel-body">
                      
<?php if($this->session->flashdata('L_strErrorMessage')) { ?>
		  <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                                    </div>        
  <?php } ?>


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
			
      <form role="form" id="form" method="post" action="<?php echo $base_url;?>systems/edit/<?php echo $id; ?>" enctype="multipart/form-data" >
			<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
			<INPUT TYPE="hidden" NAME="action" VALUE="edit_systems">
			<INPUT TYPE="hidden" NAME="hiddenaction" VALUE="<?php echo $id;?>">

				
				 <div class="col-md-6">
			 <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">About Banner (Size: 1000x1000)</label>
                  <input id="sub_banner_1" name="sub_banner_1" type="file" class="form-control" value=""/>
				  
				  <img src="<?php echo $front_base_url; ?>upload/systems/<?php echo $sub_banner_1; ?>" height="50" width="50">
                </div>
              </div>
				
				 <div class="col-md-6">
				<div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Award Banner (Size : 2048 x 2048)</label>
                  <input id="sub_banner_2" name="sub_banner_2" type="file" class="form-control" value=""/>
				  
				  <img src="<?php echo $front_base_url; ?>upload/systems/<?php echo $sub_banner_2; ?>" height="50" width="50">
                </div>
              </div>


              <div class="col-md-6">
        <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Community welfare Banner (Size : 2048 x 2048)</label>
                  <input id="sub_banner_3" name="sub_banner_3" type="file" class="form-control" value=""/>
          
          <img src="<?php echo $front_base_url; ?>upload/systems/<?php echo $sub_banner_3; ?>" height="50" width="50">
                </div>
              </div>


               <div class="col-md-6">
        <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Infrastructure Banner (Size : 2048 x 2048)</label>
                  <input id="sub_banner_4" name="sub_banner_4" type="file" class="form-control" value=""/>
          
          <img src="<?php echo $front_base_url; ?>upload/systems/<?php echo $sub_banner_4; ?>" height="50" width="50">
                </div>
              </div>


              <div class="col-md-6">
        <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Custom Manufacturing Banner (Size : 2048 x 2048)</label>
                  <input id="sub_banner_5" name="sub_banner_5" type="file" class="form-control" value=""/>
          
          <img src="<?php echo $front_base_url; ?>upload/systems/<?php echo $sub_banner_5; ?>" height="50" width="50">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Career Banner(Size : 648 x 344)</label>
                    <input id="career_banner" name="career_banner" type="file" class="form-control" value=""/>

                    <img src="<?php echo $front_base_url; ?>upload/systems/medium/<?php echo $career_banner; ?>" height="50" width="50">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Contact Banner(Size : 1024 x 468)</label>
                    <input id="contact_banner" name="contact_banner" type="file" class="form-control" value=""/>

                    <img src="<?php echo $front_base_url; ?>upload/systems/large/<?php echo $contact_banner; ?>" height="50" width="50">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">News & Events Banner(Size : 2500 x 966)</label>
                    <input id="news_event_banner" name="news_event_banner" type="file" class="form-control" value=""/>

                    <img src="<?php echo $front_base_url; ?>upload/systems/large/<?php echo $news_event_banner; ?>" height="50" width="50">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Regulatory Banner(Size : 569 x 364)</label>
                    <input id="regulatory_banner" name="regulatory_banner" type="file" class="form-control" value=""/>

                    <img src="<?php echo $front_base_url; ?>upload/systems/large/<?php echo $regulatory_banner; ?>" height="50" width="50">
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Home Title 1</label>
                  <input id="home_title" name="home_title" type="text" class="form-control" value="<?php echo $home_title; ?>"/>
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Home Subtitle 1</label>
                  <input id="home_subtitle" name="home_subtitle" type="text" class="form-control" value="<?php echo $home_subtitle; ?>"/>
                </div>
              </div>


               <div class="col-md-6">
              <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Home Url 1</label>
                  <input id="home_url" name="home_url" type="text" class="form-control" value="<?php echo $home_url; ?>"/>
                </div>
              </div>

              <div class="col-md-6">
              <div class="form-group">
                        <label style="width:100%; margin:15px 0 5px;" for="name">Home Image 1 (Size : 648 x 344)</label>
                        <input id="home_image" name="home_image" type="file" class="form-control" value=""/>
                
                <img src="<?php echo $front_base_url; ?>upload/systems/<?php echo $home_image; ?>" height="50" width="50">
                      </div>
              </div>
               

              <div class="col-md-6">
              <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Home Title 2</label>
                  <input id="home_title1" name="home_title1" type="text" class="form-control" value="<?php echo $home_title1; ?>"/>
                </div>
              </div>


              <div class="col-md-6">
              <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Home Subtitle 2</label>
                  <input id="home_subtitle1" name="home_subtitle1" type="text" class="form-control" value="<?php echo $home_subtitle1; ?>"/>
                </div>
              </div>


               <div class="col-md-6">
              <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Home Url 2</label>
                  <input id="home_url1" name="home_url1" type="text" class="form-control" value="<?php echo $home_url1; ?>"/>
                </div>
              </div>


               <div class="col-md-6">
        <div class="form-group">
                  <label style="width:100%; margin:15px 0 5px;" for="name">Home Image 2 (Size : 648 x 344)</label>
                  <input id="home_image1" name="home_image1" type="file" class="form-control" value=""/>
          
          <img src="<?php echo $front_base_url; ?>upload/systems/<?php echo $home_image1; ?>" height="50" width="50">
                </div>
              </div>


				</div>
				
                <div class="form-group">
                  <input class="submit btn bg-purple pull-right" type="submit" value="Update" onclick="javascript:validate();return false;"/>
				   <a href="<?php echo $base_url;?>systems/edit/1" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>
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