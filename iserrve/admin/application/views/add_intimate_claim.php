<?php include('include/header.php');?>
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">-->
<!-- Start: Main -->
<div id="main">
    <?php include('include/sidebar_left.php');?>
    <!-- Start: Content -->
    <section id="content_wrapper">
        <div id="topbar">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="crumb-active"><a href="javascript:void(0);"> Add Intimate Claim</a></li>
                    <li class="crumb-icon"><a href="<?php echo $base_url; ?>"><span
                                class="glyphicon glyphicon-home"></span></a></li>
                    <li class="crumb-link"><a href="<?php echo $base_url; ?>policy/lists">Intimate Claim</a></li>
                    <li class="crumb-trail">Add a Intimate Claim</li>
                </ol>
            </div>
        </div>
        <div id="content">
            <div class="row">
                
                    <div class="panel">
                        <div class="panel-heading"> <span class="panel-title"> <span
                                    class="glyphicon glyphicon-lock"></span> Add Intimate Claim </span> </div>
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


                           

                                <form role="form" id="form" method="post" action="<?php echo $base_url;?>claim/add"
                                    enctype="multipart/form-data">
                                    <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
                                    <INPUT TYPE="hidden" NAME="action" VALUE="add_intimate_claim">

                                      <input type="hidden" id="hr_email" name="hr_email" value=""/>
                                      <input type="hidden" id="sales_person_email" name="sales_person_email" value=""/>
                                      <input type="hidden" id="operations_person_email" name="operations_person_email" value=""/>
                                      <input type="hidden" id="tpa_person_email" name="tpa_person_email" value=""/>
                                      <input type="hidden" id="tpa_name" name="tpa" value=""/>
                                      <input type="hidden" id="policy_original_number" name="policy_original_number" value=""/>
                                      <input type="hidden" id="corporate_name" value=""/>
                                    <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="corporate_id">Corporate</label>
                                        <select id="corporate_id"
                                            class="form-control" name="corporate">
                                            <option value="">--Select Corporate--</option>
                                            <?php if ($allcorporate != '' && count($allcorporate) > 0) {
                                                foreach ($allcorporate as $corporate) {
                                                    ?>
                                            <option value="<?php echo $corporate->id; ?>"><?php echo $corporate->co_name; ?>
                                            </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="policy_no">Policy Number</label>
                                        <span id="show_policy_number">
                                        <select id="policy_no" name="policy_no" class="form-control">
                                            <option value="">--Select Policy No--</option>
                                            <?php  if($allproduct_name !='' && count($allproduct_name) > 0){
                                            foreach($allproduct_name as $policy_no){ ?>
                                            <option value="<?php echo $policy_no->id; ?>"><?php echo $policy_no->policy_no; ?></option>
                                        <?php } }  ?>
                                        </select>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="policy_no">Type of Policy</label>
                                        <input type="text" id="product_type" name="product_type" class="form-control" readonly/>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="policy_no">Employee No.</label>

                                          <select id="employee_no" name="employee_id" class="form-control">
                                              <option value="">--Select Emplyee No--</option>
                                          </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="policy_type">Relation of the patient with Employee</label>
                                        <select id="relation" class="form-control" name="relation">
                                          <option value="" selected readonly>--Select Relation--</option>
                                          <?php foreach($relations as $s) {?>
                                          <option value="<?=ucfirst($s->relationship)?>"><?=ucfirst($s->relationship)?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="policy_holder_name">Employee Name</label>
                                        <input type="text" name="employee_name" class="form-control" placeholder="Enter employee name" readonly value="<?=$emp_details[0]->name?>"/>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="policy_start_date">Contact Number</label>
                                        <input type="tel" name="contact_no" class="form-control" placeholder="Enter contact no" value="<?=$emp_details[0]->mobile?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10"/>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label for="policy_end_date">Employee Email</label>
                                        <input type="text" name="employee_email" class="form-control" placeholder="Enter employee email" value="<?=$emp_details[0]->email?>"/>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label  >Diagnosis</label>
                                        <input type="text" name="diagnosis" class="form-control" placeholder="Enter diagnosis"/>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label  >Estimated Amount</label>
                                        <input type="tel" name="estimated_amount" class="form-control" placeholder="Enter estimated amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="13"/>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label >Date of Admission</label>
                                        <input type="date" name="date_of_admission" class="form-control"/>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label  >Hospital Name</label>
                                        <input type="text" name="hospital_name" class="form-control" placeholder="Enter hospital name"/>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6">
                                        <label >Hospital Address</label>
                                        <input type="text" name="hospital_address" class="form-control" placeholder="Enter hospital address"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >City</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter city"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >State</label>
                                        <select id="state" name="state" class="form-control">
                                          <option value="" selected readonly>--Select State--</option>
                                          <?php foreach($state as $s) { ?>
                                          <option value="<?=$s['state']?>"><?=$s['state']?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Pincode</label>
                                        <input type="tel" name="pincode" class="form-control" placeholder="Enter pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6"/>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label >Remarks</label>
                                        <textarea remarksname="remarks" class="form-control" placeholder="Type here..." id="remarks" cols="30" rows="2"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="submit btn bg-purple pull-right btnSubmit" type="submit" value="Submit"
                                            onclick="javascript:validate();return false;" />
                                        <a href="<?php echo $base_url;?>claim/list"
                                            class="submit btn bg-purple pull-right"
                                            style="margin-right: 10px;" />Cancel</a>
                                    </div>
                                    </div>
                                </form>

                           
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

<script type="text/javascript">
    function validate() {

        var corporate_id = $("#corporate_id").val();
        if (corporate_id == '') {
            $("#error_msg1").html("Please Select Corporate.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var policy_no = $("#policy_no").val();
        if (policy_no == '') {
            $("#error_msg1").html("Please Select Policy Number.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }


        var employee_no = $("#employee_no").val();
        if (employee_no == '') {
            $("#error_msg1").html("Please Select Employee No.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var cname = $("input[name*='contact_no']").val();
    		if(cname == ''){
    			$("#error_msg1").html("Please Enter Contact Number.");
    				$("#validator").css("display","block");
    			   return false;
    		}

        var email = $("input[name*='employee_email']").val();

        if(email != ''){
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email)) {
                $("#error_msg1").html("Please Enter valid Employe Email.");
                $("#validator").css("display","block");
                return false;
            }
        }

        var relation = $("#relation").val();
        if (relation == '') {
            $("#error_msg1").html("Please Select Relation of the patient with Employee.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var diagnosis = $("input[name*='diagnosis']").val();
    		if(diagnosis == ''){
    			  $("#error_msg1").html("Please Enter Diagnosis.");
    				$("#validator").css("display","block");
    			   return false;
    		}

        var estimated_amt = $("input[name*='estimated_amount']").val();
    		if(estimated_amt == ''){
    			  $("#error_msg1").html("Please Enter Estimated Amount.");
    				$("#validator").css("display","block");
    			   return false;
    		}

        var date_of_admission = $("input[name*='date_of_admission']").val();
    		if(date_of_admission == ''){
    			  $("#error_msg1").html("Please select Date of Admission");
    				$("#validator").css("display","block");
    			   return false;
    		}

        var hospital_name = $("input[name*='hospital_name']").val();
    		if(hospital_name == ''){
    			  $("#error_msg1").html("Please enter Hospital Name");
    				$("#validator").css("display","block");
    			   return false;
    		}

        var hospital_address = $("input[name*='hospital_address']").val();
    		if(hospital_address == ''){
    			  $("#error_msg1").html("Please enter Hospital Address");
    				$("#validator").css("display","block");
    			   return false;
    		}

        var city = $("input[name*='city']").val();
    		if(city == ''){
    			  $("#error_msg1").html("Please enter City");
    				$("#validator").css("display","block");
    			   return false;
    		}

        var state = $("#state").val();
        if (state == '') {
            $("#error_msg1").html("Please Select State.");
            $("#validator").css("display", "block");
            $('html, body').animate({
                'scrollTop': $("#error_msg1").position().top
            });
            return false;
        }

        var pincode = $("input[name*='pincode']").val();
    		if(pincode == ''){
    			  $("#error_msg1").html("Please enter Pincode");
    				$("#validator").css("display","block");
    			   return false;
    		}

        $('.btnSubmit').val('Processing...');
        $('.btnSubmit').attr('disabled', true);

        $('#form').submit();
    }

    $(document).on('change', '#corporate_id', function(){
        var corporate =  $(this).val();
        var url = '<?php echo $base_url; ?>claim/get_policy';

        $.ajax({
            url : url,
            type : 'post',
            data : 'corporate=' + corporate,
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data != ''){
                    var html = '<option value="" selected>--Select Policy No.--</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        console.log(data[i]);
                        html += '<option value='+data[i].id+'>'+data[i].policy_no+'</option>';
                    }

                    $('#policy_no').html(html);
                    $("input[name*='tpa']").val(data[0].tpa);
                    $("input[name*='tpa_person_email']").val(data[0].tpa_person_email);
                    $("input[name*='policy_original_number']").val(data[0].policy_no);

                    $("#hr_email").val(data[0].hr_email);
                    $("#sales_person_email").val(data[0].sales_person_email);
                    $("#operations_person_email").val(data[0].operations_person_email);
                    $("#corporate_name").val($("#corporate_id option:selected").text());
                }else{
                  $("input[name*='product_type']").val('');
                  $("input[name*='corporate']").val('');
                  $("#hr_email,#sales_person_email,#operations_person_email,#tpa_person_email,#corporate_name").val('');
                }
            }
        });
    });

    $(document).on('change', '#policy_no', function(){
        var corporate =  $('#corporate_id').val();
        var policy_no = $(this).val();
        var url = '<?php echo $base_url; ?>claim/show_employee_data';
        $.ajax({
            url : url,
            type : 'post',
            data : 'corporate=' + corporate + '&policy_no=' + policy_no,
            dataType: 'json',
            success: function(data){
                console.log(data)
                if(data != ''){
                    var html = '<option value="" selected>--Select Employee No.--</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        console.log(data[i]);
                        html += '<option value='+data[i].employee_id+'>'+data[i].employee_id+'</option>';
                    }

                    $('#employee_no').html(html);
                    $("input[name*='product_type']").val(data[0].product_type);
                }else{
                    $("input[name*='product_type']").val('');
                }
            }
        });

    });


    $(document).on('change', '#employee_no', function(){
        var employee_no = $(this).val();

        var url = '<?php echo $base_url; ?>claim/get_employee_relations';
        $.ajax({
            url : url,
            type : 'post',
            data : 'employee_no=' + employee_no,
            dataType: 'json',
            success: function(data){
                if(data != ''){
                    var html = '<option value="" selected>--Select Relation--</option>';
                    var i;
                    for(i=0; i<data.relations.length; i++){
                        html += '<option value='+data.relations[i].relationship+'>'+data.relations[i].relationship+'</option>';
                    }
                    $('#relation').html(html);
                    // $("input[name*='employee_name']").val(data.empdata.name_of_the_employee);
                    // $("input[name*='contact_no']").val(data.empdata.mobile_no);
                    // $("input[name*='employee_email']").val(data.empdata.email);
                }
            }
        });

    });

    $(document).on('change', '#relation', function(){
        var policy_id = $("#policy_no").val();
        var employee_id = $('#employee_no').val();
        var relation = $(this).val();
        $.ajax({
            url : '<?php echo $base_url; ?>claim/getPatientDetails',
            method : "POST",
            data : {policy_id: policy_id, employee_id:employee_id, relation:relation},
            async : true,
            dataType : 'json',
            success: function(data){
                console.log(data)
                // var html = '<option value="" selected readonly>--Select Relation--</option>';
                if(data != ''){
                  $("input[name*='employee_name']").val(data.patient_name);
                  $("input[name*='contact_no']").val(data.mobile_no);
                  $("input[name*='employee_email']").val(data.email);
                }else{
                    $("input[name*='employee_name']").val('');
                    $("input[name*='contact_no']").val('');
                    $("input[name*='employee_email']").val('');
                }

            }
        });
        return false;
    });

</script>
