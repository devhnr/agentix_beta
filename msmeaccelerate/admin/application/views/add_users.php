<?php include('include/header.php');?>
<!-- Start: Main -->
<div id="main">   
 <?php include('include/sidebar_left.php');?>
 
  <!-- Start: Content -->
  <section id="content_wrapper">
    <div id="topbar">
      <div class="topbar-left">
        <ol class="breadcrumb">
		  <li class="crumb-active"><a href="#"> Add a Users</a></li>
          <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span class="glyphicon glyphicon-home"></span></a></li>
          <li class="crumb-link"><a href="<?php echo $base_url; ?>users/lists">Users</a></li>
          <li class="crumb-trail">Add a Users</li>
        </ol>
      </div>
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Add Users </span> </div>
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


<?php if($this->session->flashdata('flashError')!='') { ?>
<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Error!</b> <?php echo $this->session->flashdata('flashError'); ?>
                                    </div>
<?php } if($L_strErrorMessage != ""){?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Error!</b> <?php echo $L_strErrorMessage; ?>
                                    </div>
<?php } ?>

    <div id="validator"  class="alert alert-danger alert-dismissable" style="display:none;">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Error &nbsp; </b><span id="error_msg1"></span>
                                    </div>
    
            <div class="col-md-12">			
			
            <form role="form" id="form" method="post" action="<?php echo $base_url;?>users/add" enctype="multipart/form-data">
			<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
			<INPUT TYPE="hidden" NAME="action" VALUE="add_users">
	
               <div class="form-group">
						<label  for="select">User Category :</label>
						<div class="">
						  <span id='prod2'>
                          
                           <select id="ucategory" name="ucategory" class="form-control">
								<option value="">Select User Category</option>
								<?php 
								if($utype_list != '' && count($utype_list) > 0){
								for($i=0;$i<count($utype_list);$i++)
					{
					?>
										<option value='<?php echo $utype_list[$i]->id; ?>' >
					<?php echo $utype_list[$i]->cname; ?>
					</option>
								<?php  } }  ?>
						   </select>
                           
						</span>
						</div>
					</div>
					
				<div class="form-group">
					<label for="inputEmail"> Name:</label>
					<div class="">
					  <input type="text" id="name" name="name" class="form-control" value="<?php echo $name;?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail">User Name:</label>
					<div class="">
					  <input type="text" id="login" name="login" class="form-control" value="<?php echo $login;?>">
					</div>
				</div>
				<div class="form-group">
					<label  for="inputEmail">Password:</label>
					<div class="">
					  <input type="password" id="password" name="password" class="form-control" value="<?php echo $password;?>">
					</div>
				</div>
				<div class="form-group">
					<label  for="inputEmail">Confirm Password:</label>
					<div class="">
					  <input type="password" id="conpassword" name="conpassword" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label  for="inputEmail">Email:</label>
					<div class="">
					  <input type="text" id="email" name="email" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail">Mobile No:</label>
					<div class="">
					  <input type="text" id="mobile" name="mobile" class="form-control" value="">
					</div>
				</div>
				
			
                <div class="form-group">
                  <input class="submit btn bg-purple pull-right" type="submit" value="Submit" onclick="javascript:validate();return false;"/>
				  <a href="<?php echo $base_url;?>users/lists" class="submit btn bg-purple pull-right" style="margin-right: 10px;" />Cancel</a>
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
<script>
function listbox_moveacross(sourceID, destID) {
	//alert(sourceID);
    var src = document.getElementById(sourceID);
    var dest = document.getElementById(destID);
    var errCount = 0;
    for (var count = 0; count < src.options.length; count++) {
        if (src.options[count].selected == true) {
            var option = src.options[count];
            var newOption = document.createElement("option");
            newOption.value = option.value;
            newOption.text = option.text;
            newOption.selected = true;
            try {
                dest.add(newOption, null); // Standard
                src.remove(count, null);
				
				//src.selected=true;
				
            } catch (error) {
                dest.add(newOption); // IE only         
                src.remove(count);
				
				//src.selected=true;
            }
            count--;
            errCount++;
        }
    }
    if (errCount == 0) {
       // alert("No Element Selected or you have no element to move");
    }
}
function listbox_moveacross1(sourceID, destID) {
	//alert(sourceID);
    var src = document.getElementById(sourceID);
    var dest = document.getElementById(destID);
    var errCount = 0;
    for (var count = 0; count < src.options.length; count++) {
        if (src.options[count].selected == true) {
            var option = src.options[count];
            var newOption = document.createElement("option");
            newOption.value = option.value;
            newOption.text = option.text;
            newOption.selected = true;
            try {
                dest.add(newOption, null); // Standard
                src.remove(count, null);
				
				//src.selected=true;
				
            } catch (error) {
                dest.add(newOption); // IE only         
                src.remove(count);
				
				//src.selected=true;
            }
            count--;
            errCount++;
        }
    }
    if (errCount == 0) {
       // alert("No Element Selected or you have no element to move");
    }
}
function listbox_moveacross2(sourceID, destID) {
	//alert(sourceID);
    var src = document.getElementById(sourceID);
    var dest = document.getElementById(destID);
    var errCount = 0;
    for (var count = 0; count < src.options.length; count++) {
        if (src.options[count].selected == true) {
            var option = src.options[count];
            var newOption = document.createElement("option");
            newOption.value = option.value;
            newOption.text = option.text;
            newOption.selected = true;
            try {
                dest.add(newOption, null); // Standard
                src.remove(count, null);
				
				//src.selected=true;
				
            } catch (error) {
                dest.add(newOption); // IE only         
                src.remove(count);
				
				//src.selected=true;
            }
            count--;
            errCount++;
        }
    }
    if (errCount == 0) {
       // alert("No Element Selected or you have no element to move");
    }
}

$(document).ready(function(){
    $("#adddata").trigger("click");
	$("#adddata1").trigger("click");
	$("#adddata2").trigger("click");
});
</script>
<?php include('include/footer.php')?>

<script>
	function validate(){
		var category = $("#ucategory").val()
		if(category == ''){			
			$("#error_msg1").html("Please Select User Type.");
			$("#validator").css("display","block");
			return false;
		}
		
		var name = $("#name").val();
		if(name == ''){			
			$("#error_msg1").html("Please Enter The Name.");
			$("#validator").css("display","block");
			return false;
		}

		var n = document.getElementById('name');
		var filteru = /^[A-Za-z]/;
		if (!filteru.test(n.value)) {		
			$("#error_msg1").html("Please Provide a Valid Name.");
			$("#validator").css("display","block");
			em.focus;
			return false;
			
		}

		var login= $("#login").val();
		if(login==''){
			
			$("#error_msg1").html("Please Enter The UserName.");
			$("#validator").css("display","block");
			return false;
		}
		var n1 = document.getElementById('login');
		var fil = /^[A-Za-z]/;
		if (!fil.test(n1.value)) {
			
			$("#error_msg1").html("Please Provide a Valid UserName.");
			$("#validator").css("display","block");
			em.focus;
			return false;
		}

		var password= $("#password").val();
		if(password==''){
			
			$("#error_msg1").html("please Enter The Password.");
			$("#validator").css("display","block");
			return false;
		}
		var conpassword= $("#conpassword").val();
		if(conpassword==''){
			
			$("#error_msg1").html("please Enter The Confirm Password.");
			$("#validator").css("display","block");
			return false;
		}
		if(conpassword != password){
			
			$("#error_msg1").html("Do not match Confirm Password.");
			$("#validator").css("display","block");
			return false;
		}

	/*	var p=document.getElementById('password');
		var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;  
		if(!decimal.test(p.value))   
		{   
			alert('Please provide password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character ');  
			return false;  
		}  */

		var email= $("#email").val();
		if(email==''){
			$("#error_msg1").html("Please Enter The Email.");
			$("#validator").css("display","block");
			return  false;
		}
		
		var em = document.getElementById('email');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(em.value)) {
			
			$("#error_msg1").html("Please Provide a Valid Email Address.");
			$("#validator").css("display","block");
			em.focus;
			return false;
		}
		var mobile_numberc= document.getElementById("mobile").value;
		if(mobile_numberc == ''){
			//alert('Please enter Mobile Number');
			$("#error_msg1").html("Please enter Mobile Number.");
			$("#validator").css("display","block");
			return false;
		}
		var emd = document.getElementById('mobile');
			var filter = /^[1-9]{1}[0-9]{9}$/;
			if (!filter.test(emd.value)) {
					//alert(' Mobile Number Must be 10 Digit Number');
					$("#error_msg1").html("Mobile Number Must be 10 Digit Number.");
			$("#validator").css("display","block");
					emd.focus;
					return false;
			}
		var enabled=$("#enabled").val();
		if(enabled==''){			
			$("#error_msg1").html("Please Choose One Option");
			$("#validator").css("display","block");
			return false;
		}
		
		
		$('#form').submit();
	}
	
</script>
<script>
function get_city(sid)
{
	//alert(cid);
		//country id
		var url = '<?php echo $base_url ?>users/get_city/';
		//window.location = url;
		$.ajax({
		url:url,
		type:'post',
		data:'sid='+sid,
		success:function(msg)
		{
			//alert(msg);
			document.getElementById('prod1').innerHTML = msg ;
		}
		});
}

</script>
<script>
function subcategory(cid)
{
	//alert(cid);
		//country id
		var sid = $("#sid").val();
		var url = '<?php echo $base_url ?>/users/show_subcategory/';
		//window.location = url;
		$.ajax({
		url:url,
		type:'post',
		data:'cid='+cid+'&sid='+sid,
		success:function(msg)
		{
			//alert(msg);
			document.getElementById('subprod').innerHTML = msg ;
		}
		});
}

</script>
