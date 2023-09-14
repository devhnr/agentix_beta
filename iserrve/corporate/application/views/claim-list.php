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
                              <li class="breadcrumb-item active">Claim List</li>
                          </ol>
                      </div>
                  </div>
                  <div class="row mt-1 mb-4">
                      <!-- <div class="col-lg-3">
                        <p class="middle-text mb-1 text-center">Policy Number : <span class="box-heading text-black">123456789</span></p>
                      </div> -->
                      <div class="col-lg-3">
                        <p class=" middle-text mb-1 ">Claims Details as on : </p>
                        <span class="box-heading text-black claim_insert_dt" >17th Nov 2022</span>
                      </div>
                      <div class="col-lg-6">
                          <p class="middle-text mb-1 ">TPA : </p>
                          <span class="box-heading text-black tpa_name">Not Applicable</span>
                      </div>
                      <div class="col-lg-3">
                          <h2 class="m-0">
                              <a href="<?=site_url("download-claims")?>" class="btn btn-danger btn-sm btn-dwnld-csv f-right" id="download_claim"><i class="fas fa-download btn-icon-dwnld mr-2"></i> Download File </a>
                          </h2>
                      </div>
                	</div>
                  <div class="row">
                      <div class="col-lg-3 col-12">
                          <!-- small box -->
                          <div class="small-box bg-white v-bg-info">
                              <div class="inner">
                                  <h3 class="box1" id="box_amt1"><?='₹ '.number_format($records['paid_claims']->amount)?></h3>
                                  <p class="box-heading mb-1">Total Claims Paid</p>
                                  <p class="count-text" id="box_count1"><?='Count-'.$records['paid_claims']->paid_claims?></p>
                              </div>
                              <!-- <span class="line box1-bg"></span> -->
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-12">
                          <!-- small box -->
                          <div class="small-box bg-white v-bg-red">
                              <div class="inner">
                                  <h3 class="box3" id="box_amt3"><?='₹ '.number_format($records['processing_claims']->amount)?></h3>
                                  <p class="box-heading mb-1">Claims Under Process</p>
                                  <p class="count-text" id="box_count3"><?='Count-'.$records['processing_claims']->processing_claims?></p>
                              </div>
                              <!-- <span class="line box3-bg"></span> -->
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-12">
                          <!-- small box -->
                          <div class="small-box bg-white v-bg-green">
                              <div class="inner">
                                  <h3 class="box4" id="box_amt4"><?='₹ '.number_format($records['rejected_claims']->amount)?></h3>
                                  <p class="box-heading mb-1">Claims Closed/Rejected</p>
                                  <p class="count-text" id="box_count4"><?='Count-'.$records['rejected_claims']->rejected_claims?></p>
                              </div>
                              <!-- <span class="line box4-bg"></span> -->
                          </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-12">
                          <!-- small box -->
                          <div class="small-box bg-white v-bg-yellow">
                              <div class="inner">
                                  <h3 class="box2" id="box_amt2"><?='₹ '.number_format($records['reported_claims']->amount)?></h3>
                                  <p class="box-heading mb-1">Reported Claims</p>
                                  <p class="count-text" id="box_count2"><?='Count-'.$records['reported_claims']->reported_claims?></p>
                              </div>
                              <!-- <span class="line box2-bg"></span> -->
                          </div>
                      </div>
                      <!-- ./col -->
                  </div>
                  <div class="row p-tb-30px">
                      <div class="col-12">
                          <div class="card ">
                              <div class="card-body">
                                  <table id="claim_table" class="table table-hover table-head-fixed table-responsive text-nowrap table-scroll" style="width:100%;">
                                      <thead>
                                          <tr>
                                              <th>Sr No.</th>
                                              <th>View Details</th>
                                              <th>Employee ID</th>
                                              <th>Employee Name</th>
                                              <th>Beneficiary Name</th>
                                              <th>Relation</th>
                                              <th>Claim Type</th>
                                              <th>Claim Status</th>
                                              <th>Claim No</th>
                                              <th>Hospitlization Date</th>
                                              <th>Hospital Name</th>
                                              <th>Amount Claimed</th>
                                              <th>Amount Sactioned</th>
                                              <th>Date</th>
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

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#37b2bb;">Claim Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px;overflow-y: auto;">
              <table id="family_table" class="table table-hover table-head-fixed table-responsive text-nowrap table-scroll" style="width:100%;">
              </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        claimTable = $("#claim_table").DataTable({
            'ajax': '<?= site_url("show-claims")?>',
            'orders': [],
            'scrollX' : true,
        });

        function getClaims(policy_id){
            if(policy_id == ''){
              claimTable.ajax.reload(null, false);
            }
            $.ajax({
                url : '<?= site_url("get_no_of_claims")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data != ''){
                        $('#box_amt1').html('₹ '+data.paid_claims.amount);
                        $('#box_amt3').html('₹ '+data.processing_claims.amount);
                        $('#box_amt2').html('₹ '+data.reported_claims.amount);
                        $('#box_amt4').html('₹ '+data.rejected_claims.amount);

                        $('#box_count1').html('Count-'+data.paid_claims.paid_claims);
                        $('#box_count3').html('Count-'+data.processing_claims.processing_claims);
                        $('#box_count2').html('Count-'+data.reported_claims.reported_claims);
                        $('#box_count4').html('Count-'+data.rejected_claims.rejected_claims);

                        // $('#bo3').html(data.without_emp.without_emp);
                        // var total = parseInt(data.emp.only_emp) + parseInt(data.without_emp.without_emp);
                        // $('#bo4').html(total);
                    }
                }
            });
            return false;
        }

        $(document).on('click', '.editRecord', function(){
            $('#family_table').html('');
            var claim_id = $(this).data('id');
            $.ajax({
                url : '<?= site_url("show-claim-details")?>',
                type : 'post',
                data : 'claim_id=' + claim_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    if(data != ''){
                        $('#family_table').html(data);
                    }
                }
            });
            return false;
        });

        $(document).on('change', '.select_policy', function(){
            $('#claim_table').DataTable().clear().destroy();
            $('#show_data').html('<tr><td><td><td><td>Loading...</td></td></td></td></tr>');
            var policy_id = $(this).val();
            $('#download_claim').prop("href", '<?=site_url("download-claims")?>'+'?policy_id='+btoa(policy_id));

            if(policy_id == ''){
              claimTable.ajax.reload(null, false);
            }
            $.ajax({
                url : '<?= site_url("show-claims")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                 var response = data.data;
                    // console.log(response);
                    if(response != ''){
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
                            html += '<td>'+response[i][13]+'</td>';
                            html += '</tr>';
                        }

                        $('#show_data').html(html);
                        $('.tpa_name').text(data.tpa);
                        $('.claim_insert_dt').text(response[0][13]);
                        $("#claim_table").dataTable({'scrollX' : true}).ajax.reload();
                    }else{
                        $('.table').css({"display": "block", "overflow-x": "auto ", "white-space": "nowrap"});
                        $('#show_data').html('<tr><td><td><td><td>No record found</td></td></td></td></tr>');

                    }
                }
            });
            getClaims(policy_id);
            return false;
        });
    });
</script>
