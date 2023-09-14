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
                                  <option value="">--Select CD No--</option>
                                  <?php if(!empty($cd_number)) {foreach ($cd_number as $p) { ?>
                                    <option value="<?=$p['id']?>"><?=$p['cd_number']?></option>
                                  <?php } } ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-8">
                          <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                              <li class="breadcrumb-item active">CD</li>
                          </ol>
                      </div>
                  </div>
                  <div class="row mt-1">
                    	<div class="col-12">
                          <h2 class="m-0">
                    	        <button class="btn btn-dwnld-csv btn-sm f-right" download id="download_endorsement"><i class="fas fa-download btn-icon-dwnld mr-2"></i> Download File </button>
                    	    </h2>
                    	</div>
                	</div>
                  <div class="row p-tb-30px">
                      <div class="col-12">
                          <div class="card border-1px new-border-radius">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col-12 mb-4">
                                          <h2 class="m-0 box-heading">
                                              Deposit Entry
                                          </h2>
                                      </div>
                                  </div>
                                  <div class="row mb-2 mt-2">
                                      <div class="col-12">
                                          <table class="table table-responsive text-nowrap" id="cd_report_table">
                                              <thead class="thead-light font-size-15px">
                                                  <tr>
                                                      <th scope="col">#</th>
                                                      <th scope="col">Particular</th>
                                                      <th>Policy Type</th>
                                                      <th>Policy Number</th>
                                                      <th scope="col">CD Number</th>
                                                      <th scope="col">Bank Name</th>
                                                      <th scope="col">Cheque Number</th>
                                                      <th scope="col">Amount</th>
                                                      <th scope="col">Document</th>
                                                      <th scope="col">Created At</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="show_data">
                                                  <thead class="thead-dark">
                                                      <tr>
                                                          <th scope="col"></th>
                                                          <th scope="col"></th>
                                                          <th scope="col"></th>
                                                          <th scope="col"></th>
                                                          <th scope="col"></th>

                                                          <th scope="col"></th>
                                                          <th scope="col">Total</th>
                                                          <th scope="col" id="total_val"></th>
                                                          <th scope="col"></th>
                                                          <th scope="col"></th>
                                                      </tr>
                                                  </thead>
                                              </tbody>
                                          </table>
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
                                  <div class="row mb-4 mt-2">
                                      <div class="col-12">
                                          <h2 class="m-0 box-heading">
                                              Premium Entry
                                          </h2>
                                      </div>
                                  </div>

                                  <table  class="table table-responsive text-nowrap" style="width: 100%;" id="cd_report_table2">
                                      <thead class="thead-light">
                                          <tr>
                                              <th>Sr No.</th>
                                              <th>Particular</th>
                                              <th>Policy Type</th>
                                              <th>Policy Number</th>
                                              <th>Endorsement Number</th>
                                              <th>Employee Count</th>
                                              <th>Dependent Count</th>
                                              <th>Debit(incl GST)</th>
                                              <th>Credit(incl GST)</th>
                                              <th scope="col">Document</th>
                                              <th>Created At</th>
                                          </tr>
                                      </thead>
                                      <tbody id="show_tbl_data">
                                      </tbody>
                                      <tfoot class="table-dark">
                                          <tr>
                                              <th></th>
                                              <th></th>
                                              <th></th>
                                              <th></th>
                                              <th></th>
                                              <th></th>
                                              <th>Total</th>
                                              <th id="total_val_1"></th>
                                              <th id="total_val_2"></th>
                                              <th></th>
                                              <th></th>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>

                              <div class="row mb-4 mt-4">
                                  <div class="col-12 text-center">
                                      <button class="btn btn-dwnld-csv btn-large mr-2"><i class="feather icon-feather-chevrons-right btn-icon-dwnld mr-2"></i> Balance: <span id="balance_amt"></span>/- </button>
                                      <button class="btn btn-dwnld-csv btn-large ml-2"><i class="feather icon-feather-chevrons-right btn-icon-dwnld mr-2"></i> Provisional Balance Amount: <span id="pro_balance_amt"></span>/- </button>
                                  </div>
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
      var cd_no = $('.select_policy option')[1].value;
      var cd_text = $('.select_policy option')[1].text;
      getCdEntry(cd_no);

        function getCdEntry(cd_no) {
            $.ajax({
                url : '<?= site_url("show-cd-entry")?>',
                type : 'post',
                data : 'cd_no=' + cd_no,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                        $('#cd_report_table2').DataTable().clear().destroy();
                        var response = data.data;

                        // alert(response);
                        var html = '';
                        var i;
                        for(i=0; i<response.length; i++){
                            html += '<tr>';
                            html += '<td>'+response[i][0]+'</td>';

                            html += '<td>'+response[i][1]+'</td>';
                            html += '<td>'+response[i][8]+'</td>';
                            html += '<td>'+response[i][9]+'</td>';
                            html += '<td>'+response[i][2]+'</td>';
                            html += '<td>'+response[i][3]+'</td>';
                            html += '<td>'+response[i][4]+'</td>';
                            html += '<td>'+response[i][5]+'</td>';
                            html += '<td>'+response[i][6]+'</td>';
                            html += '<td>'+response[i][7]+'</td>';
                            html += '</tr>';
                        }

                        $('#show_data').html(html);
                        $('#total_val').html('₹ '+data.total.toLocaleString('en-IN'));
                        //
                        var responce = data.dat;

                        var xtml = '';
                        var i;
                        for(i=0; i<responce.length; i++){
                            xtml += '<tr>';
                            xtml += '<td>'+responce[i][0]+'</td>';
                            xtml += '<td>'+responce[i][1]+'</td>';
                            xtml += '<td>'+responce[i][2]+'</td>';
                            xtml += '<td>'+responce[i][3]+'</td>';
                            xtml += '<td>'+responce[i][4]+'</td>';
                            xtml += '<td>'+responce[i][5]+'</td>';
                            xtml += '<td>'+responce[i][6]+'</td>';
                            xtml += '<td>'+responce[i][7]+'</td>';
                            xtml += '<td>'+responce[i][8]+'</td>';
                            xtml += '<td>'+responce[i][9]+'</td>';
                            xtml += '<td>'+responce[i][10]+'</td>';
                            xtml += '</tr>';
                        }
                        $('#show_tbl_data').html(xtml);
                        $('#total_val_1').html('₹ '+data.total_1.toLocaleString('en-IN'));
                        $('#total_val_2').html('₹ '+data.total_2.toLocaleString('en-IN'));
                        $('#balance_amt').html('₹ '+data.balance_amt.toLocaleString('en-IN'));
                        $('#pro_balance_amt').html('₹ '+data.pro_balance_amt.toLocaleString('en-IN'));

                        $("#cd_report_table2").dataTable({'scrollX' : true,dom: 'Bfrtip'});
                }
            });
            return false;
        }

        $(document).on('change', '.select_policy', function(){
            var cd_no = $(".select_policy option:selected").val();
            getCdEntry(cd_no);
        });


        $(document).on('click', '#download_endorsement', function(){
            $.ajax({
                url : '<?=site_url("download-endorsement")?>',
                type : 'post',
                data : {cd_no: cd_no, cd_text:cd_text},
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
