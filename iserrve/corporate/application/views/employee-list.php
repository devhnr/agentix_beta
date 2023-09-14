<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
          <div class="content-header" style="padding-top:0px !important;">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <select class="form-control select_policy">
                                <option value="">--Select Policy--</option>
                                <?php if(!empty($this->policies)) {foreach ($this->policies as $p) { ?>
                                  <option value="<?=$p['id']?>"><?=$p['policy_no']?></option>
                                <?php } } ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-8">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                              <li class="breadcrumb-item active">Employee List</li>
                          </ol>
                      </div>
                  </div>
                  <div class="row mt-1 mb-4">
                    	<div class="col-12">
                          <h2 class="m-0">
                    	       <button type="button" class="btn btn-danger btn-sm btn-dwnld-csv f-right" id="download_emp"><i class="fa fa-download btn-icon-dwnld mr-2"></i> Download File</button>
                    	    </h2>
                    	</div>
                	</div>
                  <div class="row">
                      <div class="col-lg-4 col-12">
                          <!-- small box -->
                          <div class="small-box v-bg-info bg-white ">
                              <div class="inner">
                                  <h3 class="box1" id="bo1"><?=number_format($records['only_emp'])?></h3>
                                  <p>Total Employees</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-ios-people box1 bgl1-success"></i>
                              </div>
                              <!-- <span class="line box1-bg"></span> -->
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-12">
                          <!-- small box -->
                          <div class="small-box bg-white v-bg-red">
                              <div class="inner">
                                  <h3 class="box3" id="bo3"><?=number_format($records['without_emp'])?></h3>
                                  <p>Total Dependent</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-person-stalker box3 bgl2-success"></i>
                              </div>
                              <!-- <span class="line box3-bg"></span> -->
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-4 col-12">
                          <!-- small box -->
                          <div class="small-box bg-white v-bg-green">
                              <div class="inner">
                                  <h3 class="box4" id="bo4"><?=number_format($records['only_emp'] + $records['without_emp'])?></h3>
                                  <p>Total Lives</p>
                              </div>
                              <div class="icon">
                                  <i class="ion ion-heart box4 bgl3-success"></i>
                              </div>
                              <!-- <span class="line box4-bg"></span> -->
                          </div>
                      </div>
                      <!-- ./col -->
                  </div>

                  <div class="row p-tb-30px">
                      <div class="col-12">
                          <div class="card  ">
                              <div class="card-body">
                                  <table id="emp_table" class="table table-hover table-head-fixed table-responsive text-nowrap table-scroll" style="width:100%;">
                                      <thead>
                                          <tr>
                                              <th>Sr No.</th>
                                              <th>Employee ID</th>
                                              <th>Employee Name</th>
                                              <th>Email</th>
                                              <th>Mobile No.</th>
                                              <th>Age</th>
                                              <th>Gender</th>
                                              <th>D.O.B.</th>
                                              <th>Date</th>
                                              <th>View Dependent</th>
                                              <th>E-Card</th>
                      											  <th>E-Card Mail</th>
                      											  <th>Intimate Claim</th>
                                          </tr>
                                      </thead>
                                      <tbody id="show_data">
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>

<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#37b2bb;">Family Covered Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <table id="family_table" class="table table-hover table-head-fixed table-responsive text-nowrap table-scroll" style="width:100%;">
                  <thead>
                      <tr>
                          <th>Sr No.</th>
                          <th>Relation</th>
                          <th>Member Name</th>
                          <th>D.O.B.</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>Mobile No.</th>
                          <th>Date</th>
                      </tr>
                  </thead>
                  <tbody id="show_fality_data">
                  </tbody>
              </table>
            </div>
            <!-- <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="modal_e_card_mail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#37b2bb;">E-Card Mail Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="" class="mail-form" role="form" novalidate="true">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input name="employee_id" type="hidden" value="" id="EmpIDs">
                        <input name="policy_id" type="hidden" value="" id="policyIDs">
                                           
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                        Email Id </label>
                                        
                                        <input id="email" name="email" type="text" class="form-control Ecrd"
                                            placeholder="Email Id" value="" />

                                            <span id="error_msg1" style="color:red"></span>
                                    </div>

                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="submit btn bg-purple" id="btnEcardMail">Send</button>
                                    </div>

                </form>
              
            </div>
            <!-- <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

<script type="text/javascript">


	 $(document).on('click', '.e_card_mail', function(){
        var employee_id = $(this).data('id');
        var policy_id = $(this).data('policy_id');
        $('#EmpIDs').val(employee_id);
        $('#policyIDs').val(policy_id);

        $('#modal_e_card_mail').modal();
    });

    $(document).on('click', '#btnEcardMail', function(){
            var email = $("input[name*='email']").val();
            if(email == ''){
                $("#error_msg1").html("Please enter Email Id").show();
                return false;
            }
            if(email != ''){
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(email)) {
                    $('#error_msg1').html("Please enter valid Email Id");
                   return false;
                }
            }


            $.ajax({
                url : '<?= site_url("ecard-mail")?>',
                method : "POST",
                data : $('.mail-form').serialize(),
                dataType : 'json',
                success: function(data){
                    console.log(data);
                    if(data == 'success'){
                      swal({
                          title: "Success!",
                          text: "E-Card mail sent successfully..",
                          icon: "success",
                          buttons: false,
                          //timer: 1800,
                      });
                      setTimeout(function() {
                        location.reload();
                     }, 2500);
                      $('.mail-form')[0].reset();
                      $('#modal_e_card_mail').hide();

                    }
                }

            });
            return false;

    });

    $('.Ecrd').bind('change', function() {
        var email = $("input[name*='email']").val();
            if(email == ''){
                $("#error_msg1").html("Please enter Email Id").show();
                return false;
            }else if(email != ''){
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!filter.test(email)) {
                    $('#error_msg1').html("Please enter valid Email Id");
                   return false;
                }
            }else{
                $("#error_msg1").html("").show();
            }

    });
	
	 $(document).on('click', '.intimate_claim', function(){

            var conf = confirm("Do you want To Intimate Claim?");
            if (conf == true) {

                var emp_id = $(this).data('id');
                $.ajax({
                    url : '<?= site_url("intimate-claim-session")?>',
                    type : 'post',
                    data : 'employee_id=' + emp_id,
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                        window.location.href = "<?= site_url("intimate-claims")?>";
                        // if(data != ''){
                        //     $('#show_fality_data').html(data);
                        // }
                    }
                });
                return false;

            }else{
                return false;
            }
           
            
    });
	
	
    $(document).ready(function() {
        empTable = $("#emp_table").DataTable({
            scrollX : true,
        });

        var policy_id = $('.select_policy option')[1].value;

        getEmployeeEnrollment(policy_id);

        function getEmployeeEnrollment(policy_id) {
            $('#emp_table').DataTable().clear().destroy();
            $('#show_data').html('<tr><td><td><td><td>Loading...</td></td></td></td></tr>');
            $.ajax({
                url : '<?= site_url("show-employees")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    if(data == ''){
                        $('#show_data').html('<tr><td><td><td><td>No record found</td></td></td></td></tr>');
                    }else{
                        var response = data.data;
                        var html = '';
                        var i;
                        for(i=0; i<response.length; i++){
                            html += '<tr>';
                            html += '<td>'+response[i][0]+'</td>';
                            html += '<td>'+response[i][1]+'</td>';
                            html += '<td>'+response[i][2]+'</td>';
                            html += '<td>'+response[i][3]+'</td>';
                            html += '<td>'+response[i][4]+'</td>';
                            html += '<td>'+response[i][5]+'</td>';
                            html += '<td>'+response[i][6]+'</td>';
                            html += '<td>'+response[i][7]+'</td>';
                            html += '<td>'+response[i][8]+'</td>';
                            html += '<td>'+response[i][9]+'</td>';
                            html += '<td>'+response[i][10]+'</td>';
							html += '<td>'+response[i][11]+'</td>';
							html += '<td>'+response[i][12]+'</td>';
                            html += '</tr>';
                        }
                        $('#show_data').html(html);
                        $("#emp_table").DataTable({'scrollX' : true});
                    }
                }
            });
            return false;
        }

        function getEmployees(policy_id){
            if(policy_id == ''){
              empTable.ajax.reload(null, false);
            }
            $.ajax({
                url : '<?= site_url("get_no_of_employees")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data != ''){
                        $('#bo1').html(data.only_emp);
                        $('#bo3').html(data.without_emp);
                        // var total = parseInt(data.only_emp) + parseInt(data.without_emp) - parseInt(data.delete_emp);
                        var total = parseInt(data.only_emp) + parseInt(data.without_emp);
                        $('#bo4').html(total);
                    }
                }
            });
            return false;
        }

        $(document).on('click', '.editRecord', function(){
            $('#show_fality_data').html('');
            var emp_id = $(this).data('id');
            $.ajax({
                url : '<?= site_url("show-family")?>',
                type : 'post',
                data : 'employee_id=' + emp_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data != ''){
                        $('#show_fality_data').html(data);
                    }
                }
            });
            return false;
        });

        $(document).on('change', '.select_policy', function(){
            var policy_id = $(".select_policy option:selected").val();
              getEmployees(policy_id);
              getEmployeeEnrollment(policy_id);
        });

        $(document).on('click', '.download_ecard', function(){
            var policy_id = $(this).data('policy_id');
            var employee_no  = $(this).data('id');
            $.ajax({
                url : '<?= site_url("download-employee-ecard")?>',
                type : 'post',
                data : 'policy_id=' + policy_id + '&employee_no=' +employee_no,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    if(data.filename  != ''){
                      if(data.api == 'yes'){
                          window.open(data.file, '_blank');
                      }else{
                        var $a = $("<a>");
                        $a.attr("href",data.file);
                        $("body").append($a);
                        $a.attr("download",data.filename);
                        $a[0].click();
                        $a.remove();
                      }
                    }
                    
                    
                }
            });
            return false;
        });

        $(document).on('click', '#download_emp', function(){
            var policy_id = $(".select_policy option:selected").val();
            $.ajax({
                url : '<?=site_url("download-employees")?>',
                type : 'post',
                data : {policy_id: policy_id},
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    var $a = $("<a>");
                    $a.attr("href",data.file);
                    $("body").append($a);
                    $a.attr("download",data.filename);
                    $a[0].click();
                    $a.remove();
                }
            });
            return false;
        });
    });
</script>
