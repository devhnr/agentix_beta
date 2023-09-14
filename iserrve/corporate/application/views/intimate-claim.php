<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="content-header" style="padding-top:0px !important;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="m-0">Intimate Claims</h5>
                        </div>
                        <div class="col-md-8">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active">Intimate Claims</li>
                            </ol>
                        </div>
                    </div>
                </div>

                    <div class="row p-tb-30px">
                        <div class="col-12">
                            <div class="card border-1px new-border-radius">
                                <div class="card-body">
                                  <form action="" method="post" autocomplete="off" class="intimate_claim">
                                    <input type="hidden" id="hr_email" name="hr_email" value=""/>
                                    <input type="hidden" id="sales_person_email" name="sales_person_email" value=""/>
                                    <input type="hidden" id="operations_person_email" name="operations_person_email" value=""/>
                                    <input type="hidden" id="tpa_person_email" name="tpa_person_email" value=""/>
                                    <input type="hidden" id="tpa_name" name="tpa" value=""/>
                                    <input type="hidden" id="policy_original_number" name="policy_original_number" value=""/>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="text">Employee ID</label>
                                                    <input type="text" class="form-control intimanteClass" name="employee_id" id="employee_ids" placeholder="Enter Employee ID" />
                                                    <p class="errors" id="id_err" style="color:red; font-size:13px;"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputStatus">Policy No</label>
                                                <select id="policy_no" class="form-control intimanteClass" name="policy_no">
                                                    <option selected="" disabled="">--Select Policy--</option>
                                                </select>
                                                <p class="errors" id="policy_err" style="color:red; font-size:13px;"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputStatus">Relation of the patient with employee</label>
                                                <select id="relation" name="relation" class="form-control intimanteClass">
                                                    <option selected="" disabled="">--Select Relation--</option>
                                                </select>
                                                <p class="errors" id="relation_err" style="color:red; font-size:13px;"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="text">Patient Name</label>
                                                <input type="text" class="form-control intimanteClass" name="employee_name" id="text" placeholder="Enter Patient Name" readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="text">Contact No.</label>
                                              <input type="text" class="form-control intimanteClass" name="contact_no" id="text" placeholder="Enter Contact No" />
                                              <p class="errors" id="mobile_err" style="color:red; font-size:13px;"></p>
                                          </div>
                                      </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="text">Email</label>
                                                <input type="email" class="form-control intimanteClass" name="employee_email" id="email" placeholder="Enter Email-Id" />
                                                <p class="errors" id="email_err" style="color:red; font-size:13px;"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputStatus">Type of Policy</label>
                                                <input type="text" class="form-control intimanteClass" id="text" name="product_type" placeholder="Type of Policy"  readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="text">Diagnosis</label>
                                                <input type="text" class="form-control intimanteClass" name="diagnosis" id="text" placeholder="Diagnosis" />
                                                <p class="errors" id="diagnosis_err" style="color:red; font-size:13px;"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="text">Estimated/Reported Amount</label>
                                                    <input type="tel" class="form-control intimanteClass" name="estimated_amount" id="text" placeholder="Enter Estimated/Reported Amount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10"/>
                                                    <p class="errors" id="estimated_amt_err" style="color:red; font-size:13px;"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of Admission</label>
                                                <input type="date" class="form-control intimanteClass" name="date_of_admission" id="doa" />
                                                <p class="errors" id="date_err" style="color:red; font-size:13px;"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="text">Hospital Name</label>
                                                    <input type="text" class="form-control intimanteClass" name="hospital_name" id="text" placeholder="Enter Hospital Name" />
                                                    <p class="errors" id="hosp_name_err" style="color:red; font-size:13px;"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="text">Hospital Address</label>
                                                <input type="text" class="form-control intimanteClass" name="hospital_address" id="text" placeholder="Enter Hospital Address" />
                                                <p class="errors" id="hosp_addr_err" style="color:red; font-size:13px;"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="text">City</label>
                                                    <input type="text" class="form-control intimanteClass" name="city" id="text" placeholder="Enter City" />
                                                    <p class="errors" id="city_err" style="color:red; font-size:13px;"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="text">State</label>
                                                <select id="state" name="state" class="form-control intimanteClass">
                                                  <option value="" selected readonly>--Select State--</option>
                                                  <?php foreach($state as $s) { ?>
                                                  <option value="<?=$s['state']?>"><?=$s['state']?></option>
                                                  <?php } ?>
                                                </select>
                                                <p class="errors" id="state_err" style="color:red; font-size:13px;"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="text">Pincode</label>
                                                    <input type="tel" class="form-control intimanteClass" name="pincode" id="text" placeholder="Enter Pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="text">Remark</label>
                                                <textarea class="form-control intimanteClass" rows="3" name="remarks" placeholder="Enter ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-12 text-center">
                                            <!--<a href="#" class="btn btn-secondary">Upload</a>-->
                                            <button type="submit" id="btnSubmit" class="btn btn-submit">Submit</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {

       /*  $(document).on('keyup', '#employee_ids', function(){
            var employee_id = $(this).val();
            $.ajax({
                url : '<?= site_url("get-employee-details")?>',
                type : 'post',
                data : 'employee_id=' + employee_id,
                dataType: 'json',
                success: function(data){
                    var response = data[0];
                    if(data == 'fail' || response == 'fail'){
                        $("#id_err").html("Please enter valid Employee ID").show();
                        return false;
                    }
                    if(data[0] != ''){
                        $('#id_err').html('');

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
        }); */
		
		var employee_id = '<?php echo $this->session->userdata("intimate_session_employee_id");?>';
        if(employee_id != ''){
                $('#employee_ids').val(employee_id);
            }else{
                $('#employee_ids').val('');
                //var employee_id = $(this).val();
            }

        getEmployeePolicyDetails(employee_id);

        function getEmployeePolicyDetails(employee_id){
            // var employee_id = $(this).val();
            $.ajax({
                url : '<?= site_url("get-employee-details")?>',
                type : 'post',
                data : 'employee_id=' + employee_id,
                dataType: 'json',
                success: function(data){
                    var response = data[0];
                    if(data == 'fail' || response == 'fail'){
                        $("#id_err").html("Please enter valid Employee ID").show();
                        return false;
                    }
                    if(data[0] != ''){
                        $('#id_err').html('');

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

        $(document).on('keyup', '#employee_ids', function(){
            var employee_id = $(this).val();
            getEmployeePolicyDetails(employee_id);
        });
		

        $('#policy_no').change(function(){
            var policy = $(this).val();
            var employee_id = $('#employee_ids').val();

            $.ajax({
                url : '<?= site_url("get-policy-details")?>',
                method : "POST",
                data : {policy: policy, employee_id:employee_id},
                async : true,
                dataType : 'json',
                success: function(data){
                    // console.log(data)
                    var html = '<option value="" selected readonly>--Select Relation--</option>';
                    if(data != ''){
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].relationship+'>'+data[i].relationship+'</option>';
                        }
                        $('#relation').html(html);
                        $("input[name*='product_type']").val(data[0].product_type);

                        $("#hr_email").val(data[0].hr_email);
                        $("#sales_person_email").val(data[0].sales_person_email);
                        $("#operations_person_email").val(data[0].operations_person_email);
                        $("#tpa_person_email").val(data[0].tpa_person_email);
                        $("#tpa_name").val(data[0].tpa);
                        $("#policy_original_number").val(data[0].policy_no);

                    }else{
                        $('#relation').html(html);
                        $("input[name*='product_type']").val('');
                        $("#hr_email,#sales_person_email,#operations_person_email,#tpa_person_email,#tpa_name,#policy_original_number").val('');
                    }

                }
            });
            return false;
        });


        $(document).on('click', '#btnSubmit', function(){
            if($("input[name*='employee_id']").val() == ''){
                $("#id_err").html("Please enter employee id").show();
                return false;
            }if($("#policy_no").val()== ''){
                $("#policy_err").html("Please select Policy").show();
                return false;
            }if($("#relation").val() == ''){
                $("#relation_err").html("Please select Relation").show();
                return false;
            }if($("input[name*='contact_no']").val() == ''){
                $("#mobile_err").html("Please enter Contact No.").show();
                return false;
            }if ($("input[name*='contact_no']").val().length != 10) {
                $("#mobile_err").html("Please enter correct mobile no").show();
                return false;
            }if($("input[name*='employee_email']").val() == ''){
                $("#email_err").html("Please enter Employee Email").show();
                return false;
            }if($("input[name*='diagnosis']").val() == ''){
                $("#diagnosis_err").html("Please enter City").show();
                return false;
            }if($("input[name*='estimated_amount']").val() == ''){
                $("#estimated_amt_err").html("Please enter City").show();
                return false;
            }if($("input[name*='date_of_admission']").val() == ''){
                $("#date_err").html("Please enter City").show();
                return false;
            }if($("input[name*='hospital_name']").val() == ''){
                $("#hosp_name_err").html("Please enter City").show();
                return false;
            }if($("input[name*='hospital_address']").val() == ''){
                $("#hosp_addr_err").html("Please enter City").show();
                return false;
            }if($("input[name*='city']").val() == ''){
                $("#city_err").html("Please enter City").show();
                return false;
            }
            if($("#state").val() == ''){
                $("#state_err").html("Please select State").show();
                return false;
            }

            $(this).html('Processing...');
            $(this).attr('disabled', true);

            $.ajax({
                url : '<?= site_url("insert-claim")?>',
                method : "POST",
                data : $('.intimate_claim').serialize(),
                dataType : 'json',
                success: function(data){
                    // console.log(data)
                    if(data == 'success'){
                      swal({
                          title: "Success!",
                          text: "Your intimate claim request submitted successfully..",
                          icon: "success",
                          buttons: false,
                          timer: 1800,
                      });
                      $('.intimate_claim')[0].reset();
                      $('#btnSubmit').html('Submit');
                      $('#btnSubmit').attr('disabled', false);

                    }
                }

            });
            return false;

        });

        $('.intimanteClass').bind('change', function() {

            if($("input[name*='employee_id']").val() == ''){
                $("#id_err").html("Please enter employee id").show();
                return false;
            }else{
                $("#id_err").html("").show();
            }
            if($("#policy_no").val()== ''){
                $("#policy_err").html("Please select Policy").show();
                return false;
            }else{
                $("#policy_err").html("").show();
            }
            if($("#relation").val() == ''){
                $("#relation_err").html("Please select Relation").show();
                return false;
            }else{
                $("#relation_err").html("").show();
            }
            if($("input[name*='contact_no']").val() == ''){
                $("#mobile_err").html("Please enter Contact No.").show();
                return false;
            }else{
                $("#mobile_err").html("").show();
            }if ($("input[name*='contact_no']").val().length != 10) {
                $("#mobile_err").html("Please enter correct mobile no").show();
                return false;
            } else {
                $("#mobile_err").html("").show();
            }
            if($("input[name*='employee_email']").val() == ''){
                $("#email_err").html("Please enter Employee Email").show();
                return false;
            }else{
                $("#email_err").html("").show();
            }




            if($("input[name*='diagnosis']").val() == ''){
                $("#diagnosis_err").html("Please enter Diagnosis").show();
                return false;
            }else{
                $("#diagnosis_err").html("").show();
            }
            if($("input[name*='estimated_amount']").val() == ''){
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

        $('#relation').change(function(){
            var policy_id = $("#policy_no").val();
            var employee_id = $('#employee_ids').val();
            var relation = $(this).val();
            $.ajax({
                url : '<?= site_url("get-patient-details")?>',
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
                        $("input[name*='product_type']").val('');
                        $("input[name*='contact_no']").val('');
                        $("input[name*='employee_email']").val('');
                    }

                }
            });
            return false;
        });
    });
</script>
