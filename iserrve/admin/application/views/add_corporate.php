<?php include('include/header.php');?>

<!-- Start: Main -->
<div id="main">

    <?php include('include/sidebar_left.php');?>

    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add Corporate</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>corporate/lists">Corporate</a></li>
                    <li class="crumb-trail">Add a Corporate</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Corporate </span> </div>
                        <div class="panel-body">

                            <?php if($this->session->flashdata('L_strErrorMessage')){ ?>
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Success!</b> <?php echo $this->session->flashdata('L_strErrorMessage'); ?>
                            </div>
                            <?php } ?>


                            <?php if($this->session->flashdata('flashError')!='') { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Error!</b> <?php echo $this->session->flashdata('flashError'); ?>
                            </div>
                            <?php }  ?>

                            <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
                                <i class="fa fa-warning"></i>
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <b>Error &nbsp; </b><span id="error_msg1"></span>
                            </div>


                            <div class="col-md-12">


                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>corporate/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_corporate">




                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Corporate Name <span class="mandatory_field">*</span>
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="co_name" name="co_name" type="text" class="form-control"
                                            placeholder="Enter Corporate Name" value="" />
                                    </div>

                                     <!-- <div class="form-group">
                                        <label style="width:100%; margin:15px 0 5px;" for="name">Page Url
                                            <span style="color:red"> *<span>
                                        </label>
                                        <input id="page_url" name="page_url" type="text" class="form-control"
                                            placeholder="Enter Page Url" value="" />
                                    </div> -->

                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="pincode">Pincode<span class="mandatory_field"></span>
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="pincode" name="pincode" type="number" class="form-control"
                                            placeholder="Enter Pincode" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="state" style="width:100%; margin:15px 0 5px;">State</label>
                                        <select id="state" name="state"
                                            class="form-control" onChange="showcity(this.value)">
                                            <option value="">Select State</option>
                                            <?php if ($allstate != '' && count($allstate) > 0) {
                                                foreach ($allstate as $allstate_data) {
                                                    ?>
                                            <option value="<?php echo $allstate_data->id; ?>"><?php echo $allstate_data->name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="city" style="width:100%; margin:15px 0 5px;">City</label>
                                        <span id="city_id">
                                        <select id="city" name="city"
                                            class="form-control">
                                            <option value="">Select City</option>
                                            <?php if ($allcity != '' && count($allstate) > 0) {
                                                foreach ($allcity as $allcity_data) {
                                                    ?>
                                            <option value="<?php echo $allcity_data->id; ?>"><?php echo $allcity_data->name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                                </span>
                                    </div>



                                    <!-- <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="city">City
                                            
                                        </label>
                                        <input id="city" name="city" type="text" class="form-control"
                                            placeholder="Enter City" value="" />
                                    </div> -->



                                    <!-- <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="state">State
                                            
                                        </label>
                                        <input id="state" name="state" type="text" class="form-control"
                                            placeholder="Enter State" value="" />
                                    </div> -->

                                   

                                    <div class="form-group col-md-12">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                            Corporate Address</label>
                                        <textarea id="co_address" name="co_address" class="form-control"
                                            placeholder="Enter Corporate Address"></textarea>
                                    </div>




                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="hr_name">HR Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="hr_name" name="hr_name" type="text" class="form-control"
                                            placeholder="Enter HR Name" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="hr_mobile">HR Mobile
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="hr_mobile" name="hr_mobile" type="number" class="form-control"
                                            placeholder="Enter HR Mobile" value="" />
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="hr_email">HR Email
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="hr_email" name="hr_email" type="text" class="form-control"
                                            placeholder="Enter HR Email" value="" />
                                    </div>


                                     <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="group_code">Group Code <span class="mandatory_field">*</span>
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="group_code" name="group_code" type="text" class="form-control"
                                            placeholder="Enter Group Code" value="" />
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="co_landline">Corporate Landline
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="co_landline" name="co_landline" type="number" class="form-control"
                                            placeholder="Enter Corporate Landline" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="industry_type">Industry Type
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="industry_type" name="industry_type" type="text" class="form-control"
                                            placeholder="Enter Industry Type" value="" />
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="no_of_employee">Number Of Employee
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="no_of_employee" name="no_of_employee" type="number" class="form-control"
                                            placeholder="Enter Industry Type" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="remark">Remark
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="remark" name="remark" type="text" class="form-control"
                                            placeholder="Enter Remark" value="" />
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label style="width:100%; margin:15px 0 5px;" for="co_user_name">Corporate User Name
                                            <!--<span style="color:red"> *<span>-->
                                        </label>
                                        <input id="co_user_name" name="co_user_name" type="text" class="form-control"
                                            placeholder="Enter Corporate User Name" value="" />
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label  for="password" style="width:100%; margin:15px 0 5px;">Password:</label>
                                        <div class="">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $password;?>">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label  for="confirm_password" style="width:100%; margin:15px 0 5px;">Confirm Password:</label>
                                        <div class="">
                                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" class="form-control" >
                                        </div>
                                    </div>

                                    
                                    <div class="form-group col-md-6">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Sales person name</label>
                                            <input id="sales_person_name" name="sales_person_name" type="text" class="form-control"
                                            placeholder="Enter Sales person name" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Sales person Mobile Number</label>
                                        
                                        <input id="sales_person_mobile" name="sales_person_mobile" type="number" class="form-control"
                                            placeholder="Enter Sales person Mobile Number" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Sales person Email Id</label>
                                       
                                        <input id="sales_person_email" name="sales_person_email" type="text" class="form-control"
                                            placeholder="Enter Sales person Email Id" value="" />
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Operations person name</label>
                                            <input id="operations_person_name" name="operations_person_name" type="text" class="form-control"
                                            placeholder="Enter Operations person name" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Operations person Mobile Number</label>
                                        
                                        <input id="operations_person_mobile" name="operations_person_mobile" type="number" class="form-control"
                                            placeholder="Enter Operations person Mobile Number" value="" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Operations person Email Id</label>
                                       
                                        <input id="operations_person_email" name="operations_person_email" type="text" class="form-control"
                                            placeholder="Enter Operations person Email Id" value="" />
                                    </div>




                                    
                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right" type="button" value="Submit" style="margin-top: 100px;"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>corporate/lists"
                                            class="submit btn bg-purple pull-right"
                                            style="margin-right: 10px;margin-top: 100px;" />Cancel</a>
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
$(function() {
    $("#name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#page_url").val(Text);
    });
});
</script>

<script>
function validate() {

    var co_name = $("#co_name").val();
    if (co_name == '') {
        //alert('Please Enter corporate ');
        $("#error_msg1").html("Please Enter Corporate Name.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

   
    

    var pincode = $('#pincode').val();
    if(pincode != ''){
    var filter = /^\d{6}$/;
    if (!filter.test(pincode)) {
        $('#error_msg1').html("Please Enter Six Digit PinCode ");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }
    }

    

    var hr_email = $('#hr_email').val();

    if(hr_email != ''){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(hr_email)) {
            $('#error_msg1').html("Please enter valid HR email");
            $("#validator").css("display", "block");
                $('html, body').animate({
                    'scrollTop': $("#error_msg1").position().top
                });
            return false;
        }
    }



    var hr_mobile = $('#hr_mobile').val();
    if(hr_mobile != ''){
    var filter = /^\d{10}$/;
    if (!filter.test(hr_mobile)) {
        $('#error_msg1').html("Please Enter Valid HR Mobile Number");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }
    }


    

    
    if(hr_email != ''){

    var url= '<?php echo $base_url;?>corporate/check_hr_email';
        // alert(url);
        $.ajax({
            url:url,
            type: 'post',
            data: 'hr_email='+ hr_email,
            success:function(msg){
                if(msg == "0"){
                    $("#error_msg1").html("HR Email Already Exists.");
                    $("#validator").css("display", "block");
                    $('html, body').animate({'scrollTop': $("#error_msg1").position().top});
                    // jQuery("#group_code").val('')
                    return false;

                }
            }
        });
    }


    var group_code = $("#group_code").val();
    if (group_code == '') {
        //alert('Please Enter corporate ');
        $("#error_msg1").html("Please Enter Group Code.");
        $("#validator").css("display", "block");
        $('html, body').animate({
            'scrollTop': $("#error_msg1").position().top
        });
        return false;
    }

    var url= '<?php echo $base_url;?>corporate/check_corporate_group_code';


    var co_user_name = $("#co_user_name").val();
    // alert(url);
    $.ajax({
        url:url,
        type: 'post',
        data: 'group_code='+ group_code,
        success:function(msg){
            if(msg == "0"){
                $("#error_msg1").html("Group Code Already Exists.");
                $("#validator").css("display", "block");
                $('html, body').animate({'scrollTop': $("#error_msg1").position().top});
                // jQuery("#group_code").val('')
                return false;

            }
            else{ 
                //alert("Success");

                if(co_user_name != ''){

                    var url= '<?php echo $base_url;?>corporate/check_user_name';
                         // alert(url);
                        $.ajax({
                            url:url,
                            type: 'post',
                            data: 'co_user_name='+ co_user_name,
                            success:function(msg){

                                // alert(msg);
                                if(msg == "0"){
                                    $("#error_msg1").html("User Name Already Exists.");
                                    $("#validator").css("display", "block");
                                    $('html, body').animate({'scrollTop': $("#error_msg1").position().top});
                                    // jQuery("#group_code").val('')
                                    return false;

                                }else{
                                    var co_landline = $('#co_landline').val();
                    if(co_landline != ''){
                        var filter = /^\d{10}$/;
                        if (!filter.test(co_landline)) {
                            $('#error_msg1').html("Please Enter Valid Corporate Landline Number ");
                            $("#validator").css("display", "block");
                            $('html, body').animate({
                                'scrollTop': $("#error_msg1").position().top
                            });
                            return false;
                        }
                    }

                    var sales_person_mobile = $("#sales_person_mobile").val();
                    if(sales_person_mobile != ''){

                        var filter = /^\d{10}$/;
                        if (!filter.test(sales_person_mobile)) {
                            $('#error_msg1').html("Please Enter Valid Sales Person Mobile Number ");
                            $("#validator").css("display", "block");
                            $('html, body').animate({
                                'scrollTop': $("#error_msg1").position().top
                            });
                            return false;
                        }

                    }

                        var operations_person_mobile = $("#operations_person_mobile").val();
                        if(operations_person_mobile != ''){

                            var filter = /^\d{10}$/;
                            if (!filter.test(operations_person_mobile)) {
                                $('#error_msg1').html("Please Enter Valid Operation Person Mobile Number ");
                                $("#validator").css("display", "block");
                                $('html, body').animate({
                                    'scrollTop': $("#error_msg1").position().top
                                });
                                return false;
                            }

                        }

                        


                        var sales_person_email = $('#sales_person_email').val();

                        if(sales_person_email != ''){
                            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            if (!filter.test(sales_person_email)) {
                                $('#error_msg1').html("Please enter valid Sales Person email");
                                $("#validator").css("display", "block");
                                    $('html, body').animate({
                                        'scrollTop': $("#error_msg1").position().top
                                    });
                                return false;
                            }
                        }


                        var operations_person_email = $('#operations_person_email').val();

                        if(operations_person_email != ''){
                            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            if (!filter.test(operations_person_email)) {
                                $('#error_msg1').html("Please enter valid Operation Person email");
                                $("#validator").css("display", "block");
                                    $('html, body').animate({
                                        'scrollTop': $("#error_msg1").position().top
                                    });
                                return false;
                            }
                        }


                $('#form').submit();
                                }
                            }
                        });
                    }else{
						var co_landline = $('#co_landline').val();
                    if(co_landline != ''){
                        var filter = /^\d{10}$/;
                        if (!filter.test(co_landline)) {
                            $('#error_msg1').html("Please Enter Valid Corporate Landline Number ");
                            $("#validator").css("display", "block");
                            $('html, body').animate({
                                'scrollTop': $("#error_msg1").position().top
                            });
                            return false;
                        }
                    }

                    var sales_person_mobile = $("#sales_person_mobile").val();
                    if(sales_person_mobile != ''){

                        var filter = /^\d{10}$/;
                        if (!filter.test(sales_person_mobile)) {
                            $('#error_msg1').html("Please Enter Valid Sales Person Mobile Number ");
                            $("#validator").css("display", "block");
                            $('html, body').animate({
                                'scrollTop': $("#error_msg1").position().top
                            });
                            return false;
                        }

                    }

                        var operations_person_mobile = $("#operations_person_mobile").val();
                        if(operations_person_mobile != ''){

                            var filter = /^\d{10}$/;
                            if (!filter.test(operations_person_mobile)) {
                                $('#error_msg1').html("Please Enter Valid Operation Person Mobile Number ");
                                $("#validator").css("display", "block");
                                $('html, body').animate({
                                    'scrollTop': $("#error_msg1").position().top
                                });
                                return false;
                            }

                        }

                        


                        var sales_person_email = $('#sales_person_email').val();

                        if(sales_person_email != ''){
                            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            if (!filter.test(sales_person_email)) {
                                $('#error_msg1').html("Please enter valid Sales Person email");
                                $("#validator").css("display", "block");
                                    $('html, body').animate({
                                        'scrollTop': $("#error_msg1").position().top
                                    });
                                return false;
                            }
                        }


                        var operations_person_email = $('#operations_person_email').val();

                        if(operations_person_email != ''){
                            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                            if (!filter.test(operations_person_email)) {
                                $('#error_msg1').html("Please enter valid Operation Person email");
                                $("#validator").css("display", "block");
                                    $('html, body').animate({
                                        'scrollTop': $("#error_msg1").position().top
                                    });
                                return false;
                            }
                        }


                $('#form').submit();
						
					}



                
            }

        }
    });
}
            
 

function numbersonly(e) {
    var unicode = e.charCode ? e.charCode : e.keyCode
    if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
        if (unicode < 45 || unicode > 57) //if not a number
            return false //disable key press
    }
}

function showcity(pro_id){
        // alert(pro_id);exit;
        var url = '<?php echo $base_url; ?>corporate/get_city';

        $.ajax({
            url : url,
            type : 'post',
            data : 'pro_id=' + pro_id,
            success: function(msg){

                //showproduct_insurer(pro_id);
                //$('#product_name').val(msg);
                //alert(msg)
                document.getElementById('city_id').innerHTML = msg;
            }
        });
    }
</script>