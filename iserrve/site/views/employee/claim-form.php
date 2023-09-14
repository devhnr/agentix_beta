<?php include 'includes/header.php';?>

<style>
    .v-form select, .v-form input{
        margin-bottom: 0 !important;
    }
</style>
<section class="first-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="v-card ptop-0">
                    <div class="v-card-body">
                        <div class="row align-items-center">
                        <div class="col-lg-6">
                        <div class="v-card-head">
                            <h3 class="text-head">
                                Intimate Claim
                            </h3>
                            <!-- <a href="#" class="btn-back"><i class="feather icon-feather-chevrons-left"></i> Back</a> -->
                        </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <select class="policy-select" name="" id="">
                                <option value="">Select Policy</option>
                                <option value="">Group Cyber Insurance</option>
                                <option value="">Group Life Insurance</option>
                            </select>
					    </div>
                        </div>



                        <div class="v-card-con">
                            <form action="" class="v-form claim claim-form" method="post">
                                <input type="hidden" id="hr_email" name="hr_email" value=""/>
                                <input type="hidden" id="sales_person_email" name="sales_person_email" value=""/>
                                <input type="hidden" id="operations_person_email" name="operations_person_email" value=""/>
                                <input type="hidden" id="tpa_person_email" name="tpa_person_email" value=""/>
                                <input type="hidden" id="tpa_name" name="tpa" value=""/>
                                <input type="hidden" id="policy_original_number" name="policy_original_number" value=""/>
                                <div class="row">
																		<div class="col-lg-6">
																				<label class="select" for="slct">
																						<span class="disabled-label">Employee No.</span>
																						<input type="text" name="employee_no" id="employee_no" class="input" placeholder="Enter employee no" readonly value="<?=$emp_details[0]->employee_id?>"/>
                                            <p class="errors" id="no_err" style="color:red; font-size:13px;"></p>
																				</label>
																		</div>
                                    <div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span>Policy No.</span>
                                            <select id="policy_no" class="input" name="policy_no">
                                              <option value="" selected readonly>--Select Policy--</option>
                                              <?php foreach($emp_details as $s) {?>
                                              <option value="<?=$s->policy_id?>"><?=$s->policy_no?></option>
                                              <?php } ?>
                                            </select>
                                            <i class="feather icon-feather-chevron-down"></i>
                                             <p class="errors" id="pno_err" style="color:red; font-size:13px;"></p>
                                        </label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span>Relation of the patient with employee</span>
                                            <select id="relation" class="input" name="relation">
                                              <option value="" selected readonly>--Select Relation--</option>
                                              <?php foreach($relations as $s) {?>
                                              <option value="<?=ucfirst($s->relationship)?>"><?=ucfirst($s->relationship)?></option>
                                              <?php } ?>
                                            </select>
                                            <i class="feather icon-feather-chevron-down"></i>
                                            <p class="errors" id="relation_err" style="color:red; font-size:13px;"></p>
                                        </label>
                                    </div>
																		<div class="col-lg-6">
																				<label class="select" for="slct">
																						<span class="disabled-label">Patient Name</span>
																						<input type="text" name="employee_name" class="input" placeholder="Enter employee name" readonly/>
                                            <p class="errors" id="name_err" style="color:red; font-size:13px;"></p>
																				</label>

																		</div>
																		<div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Contact No.</span>
                                            <input type="tel" name="contact_no" class="input" placeholder="Enter contact no" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10"/>
                                            <p class="errors" id="contact_err" style="color:red; font-size:13px;"></p>
                                        </label>

                                    </div>
																		<div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Employee Email</span>
                                            <input type="text" name="employee_email" class="input" placeholder="Enter employee email" />
                                            <p class="errors" id="email_err" style="color:red; font-size:13px;"></p>
                                        </label>

                                    </div>

                                    <div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span>Type of Policy</span>
                                            <input type="text" id="product_type" name="product_type" class="input" readonly/>
                                            <p class="errors" id="policy_err" style="color:red; font-size:13px;"></p>
                                        </label>


                                    </div>
                                    <div class="col-lg-6">
                                      <label class="select" for="slct">
                                          <span class="disabled-label">Corporate</span>
                                          <input type="text" name="corporate" class="input" placeholder="Enter corporate" readonly value="<?=$emp_details->co_name?>"/>
                                          <p class="errors" id="corporate_err" style="color:red; font-size:13px;"></p>
                                      </label>

                                    </div>


                                    <div class="col-lg-12">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Diagnosis</span>
                                            <input type="text" name="diagnosis" class="input" placeholder="Enter diagnosis"/>
                                            <p class="errors" id="diagnosis_err" style="color:red; font-size:13px;"></p>
                                        </label>

                                    </div>
																		<div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Estimated Amount</span>
                                            <input type="tel" name="estimated_amt" class="input" placeholder="Enter estimated amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10"/>
                                            <p class="errors" id="estimated_amt_err" style="color:red; font-size:13px;"></p>
                                        </label>

                                    </div>
																		<div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Date of Admission</span>
                                            <input type="date" name="date_of_admission" class="input" />
                                            <p class="errors" id="date_err" style="color:red; font-size:13px;"></p>
                                        </label>

                                    </div>
																		<div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Hospital Name</span>
                                            <input type="text" name="hospital_name" class="input" placeholder="Enter hospital name"/>
                                            <p class="errors" id="hosp_name_err" style="color:red; font-size:13px;"></p>
                                        </label>


                                    </div>
										<div class="col-lg-6">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Hospital Address</span>
                                            <input type="text" name="hospital_address" class="input" placeholder="Enter hospital address"/>
                                            <p class="errors" id="hosp_addr_err" style="color:red; font-size:13px;"></p>
                                        </label>


                                    </div>
                                    <div class="col-lg-5	">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">City</span>
                                            <input type="text" name="city" class="input" placeholder="Enter city"/>
                                             <p class="errors" id="city_err" style="color:red; font-size:13px;"></p>
                                        </label>


                                    </div>
																		<div class="col-lg-3">
                                        <label class="select" for="slct">
                                            <span>State</span>
                                            <select id="state" name="state" class="input">
																							<option value="" selected readonly>--Select State--</option>
																							<?php foreach($state as $s) { ?>
																							<option value="<?=$s['state']?>"><?=$s['state']?></option>
																							<?php } ?>
                                            </select>
                                            <i class="feather icon-feather-chevron-down"></i>
                                             <p class="errors" id="state_err" style="color:red; font-size:13px;"></p>
                                        </label>

                                    </div>
																		<div class="col-lg-4">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Pincode</span>
                                            <input type="tel" name="pincode" class="input" placeholder="Enter pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6"/>
                                             <p class="errors" id="pincode_err" style="color:red; font-size:13px;"></p>
                                        </label>


                                    </div>
                                    <div class="col-lg-12">
                                        <label class="select" for="slct">
                                            <span class="disabled-label">Remarks</span>
                                            <textarea name="remarks" placeholder="Type here..." id="remarks" cols="30" rows="4"></textarea>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button type="submit" class="v-theme-btn" id="btnClaim">Claim Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3">
                <div class="ad-area">
                	<a href="https://www.raghnall.co.in/cyber_insurance">
                		<img src="<?=base_url('assets/')?>employee_assets/img/ad-veh.png" alt="" />
                	</a>

                </div>
            </div> -->
        </div>
    </div>
</section>


<?php include 'includes/footer.php';?>

<script type="text/javascript">

 $(document).ready(function() {
      var employee_id = $('#employee_no').val();
      getEmployeeDetails(employee_id);

      function getEmployeeDetails(employee_id) {
          $.ajax({
            url : '<?=base_url("employee/getEmployeeDetails")?>',
            type : 'post',
            data : 'employee_id=' + employee_id,
            dataType: 'json',
            success: function(data){
              // console.log(data);
              var response = data[0];
              if(data[0] != ''){
                  var html = '<option value="" selected readonly>--Select Policy--</option>';
                  var i;
                  for(i=0; i<data.length; i++){
                      // console.log(data);
                      html += '<option value='+data[i].policy_id+'>'+data[i].policy_no+'</option>';
                  }
                  $('#policy_no').html(html);
              }
            }
        });
        return false;
    }

    $('#relation').change(function(){
        var policy_id = $("#policy_no").val();
        var employee_id = $('#employee_no').val();
        var relation = $(this).val();
        $.ajax({
            url : '<?=base_url("employee/getPatientDetails")?>',
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
                  $("#mobile_err").html("").show();
                }else{
                    $("input[name*='employee_name']").val('');
                    $("input[name*='contact_no']").val('');
                    $("input[name*='employee_email']").val('');
                }

            }
        });
        return false;
    });

});

		$(document).on('click','#btnClaim', function(){
      if($("#policy_no").val()== ''){
          $("#pno_err").html("Please enter Policy No").show();
          return false;
      }if($("#relation").val() == ''){
          $("#relation_err").html("Please select Relation").show();
          return false;
      }if($("input[name*='contact_no']").val() == ''){
          $("#contact_err").html("Please enter Contact No.").show();
          return false;
      }if ($("input[name*='contact_no']").val().length != 10) {
          $("#contact_err").html("Please enter correct mobile no").show();
          return false;
      }if($("input[name*='employee_email']").val() == ''){
          $("#email_err").html("Please enter Employee Email").show();
          return false;
      }if($("input[name*='diagnosis']").val() == ''){
          $("#diagnosis_err").html("Please enter Diagnosis").show();
          return false;
      }if($("input[name*='estimated_amt']").val() == ''){
          $("#estimated_amt_err").html("Please enter Estimated Amount").show();
          return false;
      }if($("input[name*='date_of_admission']").val() == ''){
          $("#date_err").html("Please select Date of Admission").show();
          return false;
      }if($("input[name*='hospital_name']").val() == ''){
          $("#hosp_name_err").html("Please enter Hospital Name").show();
          return false;
      }if($("input[name*='hospital_address']").val() == ''){
          $("#hosp_addr_err").html("Please select Hospital Address").show();
          return false;
      }if($("input[name*='city']").val() == ''){
          $("#city_err").html("Please enter City").show();
          return false;
      }if($("#state").val() == ''){
          $("#state_err").html("Please select State").show();
          return false;
      }

      $(this).html('Processing...');
      $(this).attr('disabled', true);

        var url = '<?=base_url("employee/add_claim_data")?>';
        $.ajax({
            url: url,
            type: 'post',
            data:
                'employee_no=' + $("input[name*='employee_no']").val() +
                '&employee_name=' + $("input[name*='employee_name']").val() +
                '&contact_no=' + $("input[name*='contact_no']").val() +
                '&employee_email=' + $("input[name*='employee_email']").val() +
                '&policy_no=' + $("#policy_no").val() +
                '&product_type=' + $("input[name*='product_type']").val() +
                '&corporate=' + $("input[name*='corporate']").val() +
                '&relation=' + $("#relation").val() +
                '&diagnosis=' + $("input[name*='diagnosis']").val() +
                '&estimated_amount=' + $("input[name*='estimated_amt']").val() +
                '&date_of_admission=' + $("input[name*='date_of_admission']").val() +
                '&hospital_name=' + $("input[name*='hospital_name']").val() +
                '&hospital_address=' + $("input[name*='hospital_address']").val() +
                '&city=' + $("input[name*='city']").val() +
                '&state=' + $("#state").val() +
                '&pincode=' + $("input[name*='pincode']").val() +
                '&remarks=' + $("#remarks").val() +
                '&hr_email=' + $("#hr_email").val() +
                '&sales_person_email=' + $("#sales_person_email").val() +
                '&operations_person_email=' + $("#operations_person_email").val() +
                '&tpa_person_email=' + $("#tpa_person_email").val() +
                '&tpa=' + $("#tpa_name").val() +
                '&policy_original_number=' + $("#policy_original_number").val(),
            dataType : 'json',
            success: function(response) {
                console.log(response);
                if (response == "success") {
                  $('.claim-form')[0].reset();
                  swal({
                      title: "Success!",
                      text: "Claim request submitted successfully!",
                      icon: "success",
                      buttons: false,
                      //timer: 1800,
                  })

                  setTimeout( function (){
                    window.location='<?=base_url("employee/")?>';
                 },2000);

                }
            }

        });
        return false;
  });

  $('.input').bind('change', function() {
    if($("#policy_no").val()== ''){
        $("#pno_err").html("Please enter Policy No").show();
        return false;
    }else{
        $("#pno_err").html("").show();
    }
    if($("#relation").val() == ''){
        $("#relation_err").html("Please select Relation").show();
        return false;
    }else{
        $("#relation_err").html("").show();
    }


    if($("input[name*='diagnosis']").val() == ''){
        $("#diagnosis_err").html("Please enter Diagnosis").show();
        return false;
    }else{
        $("#diagnosis_err").html("").show();
    }
    if($("input[name*='estimated_amt']").val() == ''){
        $("#estimated_amt_err").html("Please enter Estimated Amount").show();
        return false;
    }else{
        $("#estimated_amt_err").html("").show();
    }
    if($("input[name*='date_of_admission']").val() == ''){
        $("#date_err").html("Please select Date of Admission").show();
        return false;
    }else{
        $("#date_err").html("").show();
    }

    if($("input[name*='hospital_name']").val() == ''){
        $("#hosp_name_err").html("Please enter Hospital Name").show();
        return false;
    }else{
        $("#hosp_name_err").html("").show();
    }
    if($("input[name*='hospital_address']").val() == ''){
        $("#hosp_addr_err").html("Please select Hospital Address").show();
        return false;
    }else{
        $("#hosp_addr_err").html("").show();
    }

    if($("input[name*='city']").val() == ''){
        $("#city_err").html("Please enter City").show();
        return false;
    }else{
        $("#city_err").html("").show();
    }
    if($("#state").val() == ''){
        $("#state_err").html("Please select State").show();
        return false;
    }else{
        $("#state_err").html("").show();
    }
  });

  $('#policy_no').change(function(){
      var policy = $(this).val();
      var employee_id = $('#employee_no').val();
      var url = '<?=base_url("employee/get_relation_by_policy")?>';
      $.ajax({
          url : url,
          method : "POST",
          data : {policy: policy, employee_id, employee_id},
          async : true,
          dataType : 'json',
          success: function(data){
              console.log(data)
              var html = '<option value="" selected readonly>--Select Relation--</option>';
              if(data != ''){
                  var i;
                  for(i=0; i<data.length; i++){
                      html += '<option value='+data[i].relationship+'>'+data[i].relationship+'</option>';
                  }
                  $('#relation').html(html);
                  $("input[name*='product_type']").val(data[0].product_type);
                  $("input[name*='corporate']").val(data[0].co_name);

                  $("#hr_email").val(data[0].hr_email);
                  $("#sales_person_email").val(data[0].sales_person_email);
                  $("#operations_person_email").val(data[0].operations_person_email);
                  $("#tpa_person_email").val(data[0].tpa_person_email);
                  $("#tpa_name").val(data[0].tpa);
                  $("#policy_original_number").val(data[0].policy_no);
              }else{
                $("input[name*='product_type']").val('');
                $("input[name*='corporate']").val();
                $("#hr_email,#sales_person_email,#operations_person_email,#tpa_person_email,#tpa_name,#policy_original_number").val('');
                $('#relation').html(html);
              }

          }
      });
      return false;
  });
</script>
