<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="content-header" style="padding-top: 0px !important;">
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
                                <li class="breadcrumb-item active">Cashless Hospitals</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row p-tb-30px justify-content-center">
                        <div class="col-12">
                            <div class="card border-1px">
                                <div class="card-body">
                                    <h5 class="mb-3" style="font-weight: 500;">Search Hospital</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="text">Hospital Name</label>
                                                    <input type="text" class="form-control" id="hospital_search" placeholder="Enter Hospital Name" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputStatus">Select State</label>
                                                <select id="state_search" class="form-control custom-select">
                                                  <option value="" selected readonly>--Select State--</option>
                                                  <?php foreach($state as $s) { ?>
                                                  <option value="<?=$s['state']?>"><?=$s['state']?></option>
                                                  <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputStatus">Select City</label>
                                                <select id="city_search" class="form-control custom-select">
                                                  <option value="" selected readonly>--Select City--</option>
                                                  <?php foreach($city as $s) { ?>
                                                  <option value="<?=$s['city']?>"><?=$s['city']?></option>
                                                  <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="text">Pincode</label>
                                                <input type="tel" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-submit btn-medium mr-2" style="padding: 0.335rem 2rem;" id="searchBTN">Search</button>
                                            <button type="button" class="btn btn-reset btn-medium" style="padding: 0.335rem 2rem;" id="resetBTN"> Reset</button>
                                            <button type="button" class="btn btn-download btn-medium mt-15px" style="padding: 0.335rem 2rem;" id="downloadBTN"> Download</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-tb-30px">
                        <div class="col-12">
                            <div class="card border-1px new-border-radius">
                                <div class="card-body">
                                    <table id="cashless_table" class="table table-hover table-head-fixed table-responsive text-nowrap table-scroll" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Hospital Name</th>
                                                <th>Address</th>
                                                <th>Contact No.</th>
                                                <th>Landmark</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Pincode</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data"></tbody>
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

<script type="text/javascript">
    $(document).ready(function() {
        cashTable = $("#cashless_table").DataTable({
            // ajax: '',
            // orders: [],
            scrollX : true,
            // lengthChange: false,
            dom: 'Bfrtip',
            buttons: ['excel']
        });

        var policy_id = $('.select_policy option')[1].value;
        getCashlessHospitals(policy_id);
        function getCashlessHospitals(policy_id) {
            $('#cashless_table').DataTable().clear().destroy();
            $('#show_data').html('<tr><td><td><td><td>Loading...</td></td></td></td></tr>');
            $.ajax({
                url : '<?= site_url("show-hospitals")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data == 'fail'){
                        $('#show_data').html('<tr><td><td><td><td>No record found</td></td></td></td></tr>');
                    }else{
                        // $('#cashless_table').DataTable().clear().destroy();
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
                            html += '</tr>';
                        }
                        $('#show_data').html(html);
                        $("#cashless_table").dataTable({'scrollX' : true,dom: 'Bfrtip',buttons: ['excel']});
                    }
                }
            });
            return false;
        }


        $(document).on('change', '.select_policy', function(){
            var policy_id = $(".select_policy option:selected").val();
              getCashlessHospitals(policy_id);
        });

        $('#searchBTN').click(function () {
            cashTable.search('').columns().search('').draw();
            var oTable = $('#cashless_table').dataTable();

            if($('#hospital_search').val() != '' && $('#state_search').val() != '' && $('#city_search').val() != ''){
               oTable.fnFilter($('#hospital_search').val(),1,true,false);
               oTable.fnFilter($('#state_search').val(),6,true,false);
               oTable.fnFilter($('#city_search').val(),5,true,false);
            }else if($('#hospital_search').val() != '' && $('#state_search').val() != '' && $('#city_search').val() == ''){
                oTable.fnFilter($('#hospital_search').val(),1,true,false);
                oTable.fnFilter($('#state_search').val(),6,true,false);
            }else if($('#hospital_search').val() != '' && $('#state_search').val() == '' && $('#city_search').val() != ''){
                oTable.fnFilter($('#hospital_search').val(),1,true,false);
                oTable.fnFilter($('#city_search').val(),5,true,false);
            }else if($('#hospital_search').val() != '' && $('#state_search').val() == '' && $('#city_search').val() == ''){
                oTable.fnFilter($('#hospital_search').val(), 1);
            }else if($('#hospital_search').val() == '' && $('#state_search').val() != '' && $('#city_search').val() != ''){
                oTable.fnFilter($('#state_search').val(),6,true,false);
                oTable.fnFilter($('#city_search').val(),5,true,false);
            }else if($('#hospital_search').val() == '' && $('#state_search').val() != '' && $('#city_search').val() == ''){
                oTable.fnFilter($('#state_search').val(), 6);
            }else if($('#hospital_search').val() == '' && $('#state_search').val() == '' && $('#city_search').val() != ''){
                oTable.fnFilter($('#city_search').val(), 5);
            }else if($('#pincode').val() != ''){
                oTable.fnFilter($('#pincode').val(), 7);
            }
        });

        $('#resetBTN').click(function () {
            $('#cashless_table').dataTable().fnFilter('');
            $('#hospital_search,#city_search,#state_search,#pincode').val('');
            get_data_call();
            getCashlessHospitals();
        });
        //
        $(document).on('click','#downloadBTN', function () {
            $('#hospital_search,#state_search,#pincode').val('');
            $('.buttons-excel').trigger('click');
            get_data_call();
        });

        $('#state_search').change(function(){
            var state= $(this).val();
            $.ajax({
                url : '<?= site_url("get-cities")?>',
                method : "POST",
                data : {state: state},
                async : true,
                dataType : 'json',
                success: function(data){
                    //console.log(data[0].city)
                    var html = '<option value="" selected readonly>--Select City--</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].city+'>'+data[i].city+'</option>';
                    }
                    $('#city_search').html(html);

                }
            });
            return false;
        });

        function get_data_call() {
            $.ajax({
                url : '<?= site_url("get-cities")?>',
                method : "GET",
                async : true,
                dataType : 'json',
                success: function(data){
                    // console.log(data)
                    var html = '<option value="" selected readonly>--Select City--</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].city+'>'+data[i].city+'</option>';
                    }
                    $('#city_search').html(html);

                }
            });
            return false;
        }


    });
</script>
