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
                              <li class="breadcrumb-item active">Corporate Buffer</li>
                          </ol>
                      </div>
                  </div>
                  <!-- <div class="row mt-1 mb-4">
                    	<div class="col-12">
                          <h2 class="m-0">
                    	       <button type="button" class="btn btn-danger btn-sm btn-dwnld-csv f-right" id="download_list"><i class="fa fa-download btn-icon-dwnld mr-2"></i> Download File</button>
                    	    </h2>
                    	</div>
                	</div> -->
                  <div class="row">
                      <div class="col-lg-4 col-12">
                          <!-- small box -->
                          <div class="small-box v-bg-info bg-white ">
                              <div class="inner">
                                  <h3 class="box1" id="boxx1"></h3>
                                  <p>Total SI</p>
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
                                  <h3 class="box3" id="boxx2"></h3>
                                  <p>Utilized SI</p>
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
                                  <h3 class="box4" id="boxx3"></h3>
                                  <p>Remaining SI</p>
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
                                  <table id="buffer_table" class="table table-hover table-head-fixed table-responsive text-nowrap table-scroll" style="width:100%;">
                                      <thead>
                                          <tr>
                                              <th>Sr No.</th>
                                              <th>Employee ID</th>
                                              <th>Member Name</th>
                                              <th>Member Relation</th>
                                              <th>Email</th>
                                              <th>Mobile No.</th>
                                              <th>Claim Amount</th>
                                              <th>Approved Amount</th>
                                              <th>Employee Sum-Insured Utilization</th>
                                              <th>Corporate Buffer Used</th>
                                              <th>Aliment</th>
                                              <th>File</th>
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



<script type="text/javascript">

$(document).ready(function() {
    bufferTable = $("#buffer_table").DataTable({
        scrollX : true,
    });

    var policy_id = $('.select_policy option')[1].value;

    getCorporateBuffer(policy_id);
    getBufferSumInsured(policy_id);

    function getCorporateBuffer(policy_id) {
        $('#show_data').html('<tr><td><td><td><td>Loading...</td></td></td></td></tr>');
        $.ajax({
            url : '<?= site_url("show-corporate-buffer")?>',
            type : 'post',
            data : 'policy_id=' + policy_id,
            dataType: 'json',
            success: function(data){
                if(data == 'fail' || data == ''){
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

                        html += '</tr>';
                    }
                    $('#show_data').html(html);

                }
            }
        });
        return false;
    }

    function getBufferSumInsured(policy_id){
        if(policy_id == ''){
          policy_id = $('.select_policy option')[1].value;
        }
        $.ajax({
            url : '<?= site_url("get_buffer_sum_insured")?>',
            type : 'post',
            data : 'policy_id=' + policy_id,
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.total.total_corporate == null){
                    $('#boxx1').html(0);
                }else{
                    $('#boxx1').html(data.total.total_corporate);
                }
                if(data.utilized.utilized_corporate == null){
                  $('#boxx2').html(0);
                }else{
                  $('#boxx2').html(data.utilized.utilized_corporate);
                }
                if(data.remaining == null){
                    $('#boxx3').html(0);
                }else{
                    $('#boxx3').html(data.remaining);
                }
            }
        });
        return false;
    }

    $(document).on('change', '.select_policy', function(){
          var policy_id = $(".select_policy option:selected").val();
          getCorporateBuffer(policy_id);
          getBufferSumInsured(policy_id);
    });

});
</script>
