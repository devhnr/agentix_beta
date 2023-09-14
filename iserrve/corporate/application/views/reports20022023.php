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
                            <li class="breadcrumb-item active">Reports</li>
                        </ol>
                    </div>
                </div>
                <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="vtab">
                        <button class="vtablinks" onclick="openCity(event, 'Tab1')" id="defaultOpen">Total Claims Reported</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab2')">Claims Status</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab3')">Month Wise Claim Report</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab4')" >Gender Wise Claim Report</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab5')">Relationwise Claim Report</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab6')">Age Band wise Claim Report</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab7')" >Top 10 Claim Amount Report</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab8')">Top 10 Paid Claim Amount Report</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab9')">Relationwise Enrollment Report</button>
                        <button class="vtablinks" onclick="openCity(event, 'Tab10')" >Month Wise Endorsement Report</button>
               
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="vtabcontent">
                            
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Total Claims Reported
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Claim Type</th>
                                                    <th scope="col">Cashless</th>
                                                    <th scope="col">Reimbursement</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="claim_tbl">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                   <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="barChart" height="170" width="300"></canvas>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Claims Status
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Claim Type</th>
                                                    <th scope="col">Outstanding</th>
                                                    <th scope="col">Paid</th>
                                                    <th scope="col">Rejected</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="claim_status_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <th id="status_val"></th>
                                                    <th id="status_val1"></th>
                                                    <th id="status_val2"></th>
                                                    <th id="status_val3"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                         <canvas id="barChart1" height="170" width="300"></canvas>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Month Wise Claim Report
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Month</th>
                                                    <th scope="col">Cashless</th>
                                                    <th scope="col">Reimbursement</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="month_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <th id="month_val"></th>
                                                    <th id="month_val1"></th>
                                                    <th id="month_val2"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                   <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="stackedChart" ></canvas>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Gender Wise Claim Report
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Gender</th>
                                                    <th scope="col">Claim (%)</th>
                                                    <th scope="col">Claim Count</th>
                                                    <th scope="col">Claim Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="gender_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <th id="gender_val"></th>
                                                    <th id="gender_val1"></th>
                                                    <th id="gender_val2"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                   <div class="col-sm-4 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="pieChart"></canvas>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Relationwise Claim Report
                                        </h2>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Relation</th>
                                                    <th scope="col">Claim Count</th>
                                                    <th scope="col">Claim Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ralation_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Total</th>
                                                    <th id="ralation_total_val"></th>
                                                    <th id="ralation_total_val1"></th>
                                                    <th id="ralation_total_val2"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                   <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="barChart2"></canvas>
                                          <!-- <canvas id="sales-chart" height="200" style="display: block; width: 487px; height: 250px;" width="487" class="chartjs-render-monitor"></canvas> -->

                                       </div>
                                   </div>
                                    <!-- <div class="col-sm-6 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="pieChart" ></canvas>
                                       </div>
                                   </div>
                                   <div class="col-sm-6 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="stackedChart" ></canvas>
                                       </div>
                                   </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Age Band wise Claim Report
                                        </h2>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Claim Status</th>
                                                    <th scope="col">0-25</th>
                                                    <th scope="col">26-35</th>
                                                    <th scope="col">36-45</th>
                                                    <th scope="col">46-55</th>
                                                    <th scope="col">56-65</th>
                                                    <th scope="col">>65</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="age_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <th id="age_total_val"></th>
                                                    <th id="age_total_val1"></th>
                                                    <th id="age_total_val2"></th>
                                                    <th id="age_total_val3"></th>
                                                    <th id="age_total_val4"></th>
                                                    <th id="age_total_val5"></th>
                                                    <th id="age_total_val6"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                         <canvas id="barChart3" height="170" width="300"></canvas>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Top 10 Claim Amount Report
                                        </h2>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Hospital Name</th>
                                                    <th scope="col">Claim Amount</th>
                                                    <th scope="col">Claim Count</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hospital_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <th id="hospital_total_val"></th>
                                                    <th id="hospital_total_val1"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                         <canvas id="barChart4" height="170" width="300"></canvas>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Top 10 Paid Claim Amount Report
                                        </h2>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Hospital Name</th>
                                                    <th scope="col">Claim Paid Amount</th>
                                                    <th scope="col">Claim Count</th>
                                                </tr>
                                            </thead>
                                            <tbody id="paid_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Grand Total</th>
                                                    <th id="paid_total_val"></th>
                                                    <th id="paid_total_val1"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                    <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                         <canvas id="barChart5" height="170" width="300"></canvas>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                            Relationwise Enrollment Report
                                        </h2>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Relation</th>
                                                    <th scope="col">Count</th>
                                                    <th scope="col">Sum Insured</th>
                                                </tr>
                                            </thead>
                                            <tbody id="insured_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Total</th>
                                                    <th id="insured_total_val"></th>
                                                    <th id="insured_total_val1"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                   <div class="col-sm-7 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="barChart6"></canvas>
                                          <!-- <canvas id="sales-chart" height="200" style="display: block; width: 487px; height: 250px;" width="487" class="chartjs-render-monitor"></canvas> -->

                                       </div>
                                   </div>
                                    <!-- <div class="col-sm-6 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="pieChart" ></canvas>
                                       </div>
                                   </div>
                                   <div class="col-sm-6 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="stackedChart" ></canvas>
                                       </div>
                                   </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card border-1px new-border-radius">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-8">
                                        <h2 class="m-0 box-heading">
                                          Month Wise Endorsement Report
                                        </h2>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-2">
                                    <div class="col-12">
                                        <table class="table table-responsive text-nowrap" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                                            <thead class="thead-light font-size-15px">
                                                <tr>
                                                    <th scope="col">Month</th>
                                                    <th scope="col">Employee Addition</th>
                                                    <th scope="col">Dependent Addition</th>
                                                    <th scope="col">Employee Correction</th>
                                                    <th scope="col">Dependent Correction</th>
                                                    <th scope="col">Employee Deletion</th>
                                                    <th scope="col">Dependent Deletion</th>

                                                </tr>
                                            </thead>
                                            <tbody id="endorsement_tbl">
                                            </tbody>
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Total</th>
                                                    <th id="endorsement_total_val"></th>
                                                    <th id="endorsement_total_val1"></th>
                                                    <th id="endorsement_total_val2"></th>
                                                    <th id="endorsement_total_val3"></th>
                                                    <th id="endorsement_total_val4"></th>
                                                    <th id="endorsement_total_val5"></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-2 mt-2">
                                   <div class="col-sm-12 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="barChart7"></canvas>
                                          <!-- <canvas id="sales-chart" height="200" style="display: block; width: 487px; height: 250px;" width="487" class="chartjs-render-monitor"></canvas> -->

                                       </div>
                                   </div>
                                    <!-- <div class="col-sm-6 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="pieChart" ></canvas>
                                       </div>
                                   </div>
                                   <div class="col-sm-6 mb-2 mt-2">
                                       <div class="charts">
                                          <canvas id="stackedChart" ></canvas>
                                       </div>
                                   </div> -->
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script> -->
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("vtabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("vtablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" vactive", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " vactive";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">
$(document).ready(function() {
    var policy_id = $('.select_policy option')[1].value;
      getCliamReported(policy_id);
      getCliamStatus(policy_id);
      getMonthWise(policy_id);
      getGenderWise(policy_id);
      getRelationWise(policy_id);
      getAgeWise(policy_id);
      getTop10ClaimAmountHospital(policy_id);
      getTop10PaidClaimAmountHospital(policy_id);
      getSumInsured(policy_id);
      getEndorsement(policy_id);

      var ctx = document.getElementById('barChart');
      var ctx3 = document.getElementById('barChart1');
      var ctx2 = document.getElementById('stackedChart');
      var ctx5 = document.getElementById('pieChart');
      var ctx6 = document.getElementById('barChart2');
      var ctx7 = document.getElementById('barChart3');
      var ctx8 = document.getElementById('barChart4');
      var ctx9 = document.getElementById('barChart5');
      var ctx10 = document.getElementById('barChart6');
      var ctx11 = document.getElementById('barChart7');

      $(document).on('change', '.select_policy', function(){
          var policy_id = $(".select_policy option:selected").val();
          getCliamReported(policy_id);
          getCliamStatus(policy_id);
          getMonthWise(policy_id);
          getGenderWise(policy_id);
          getRelationWise(policy_id);
          getAgeWise(policy_id);
          getTop10ClaimAmountHospital(policy_id);
          getTop10PaidClaimAmountHospital(policy_id);
          getSumInsured(policy_id);
          getEndorsement(policy_id);

          myDoughnut.destroy();
          myDoughnut = new Chart(ctx, locData);

          myDoughnut1.destroy();
          myDoughnut1 = new Chart(ctx3, locData1);

          myDoughnut2.destroy();
          myDoughnut2 = new Chart(ctx2, locData2);

          myDoughnut3.destroy();
          myDoughnut3 = new Chart(ctx5, locData3);

          myDoughnut4.destroy();
          myDoughnut4 = new Chart(ctx6, locData4);

          myDoughnut5.destroy();
          myDoughnut5 = new Chart(ctx7, locData5);

          myDoughnut6.destroy();
          myDoughnut6 = new Chart(ctx8, locData6);

          myDoughnut7.destroy();
          myDoughnut7 = new Chart(ctx9, locData7);

          myDoughnut8.destroy();
          myDoughnut8 = new Chart(ctx10, locData8);

          myDoughnut9.destroy();
          myDoughnut9 = new Chart(ctx11, locData9);
      });
      /*****Total Claims Reported start******/

      function getCliamReported(policy_id) {
          $.ajax({
              url : '<?= site_url("show-report")?>',
              type : 'post',
              data : 'policy_id=' + policy_id,
              dataType: 'json',
              async: false,
              success: function(data){
                  // console.log(data);
                  $('#claim_tbl').html(data.body_html);

                  locData = {
                  type: 'bar',
                  data: {
                      labels: [ 'Amount Claimed', 'Claim Count'],
                      datasets: [
                            {
                              label: 'Cashless',
                              backgroundColor: '#6ae788',
                              borderColor: '#6ae788',
                              data: [data.cashless_claimed, data.cashless_count],
                              borderWidth: 1
                            },

                            {
                              label: 'Reimbursement',
                              backgroundColor: '#ced4da',
                              borderColor: '#ced4da',
                              data: [data.reimbursement_claimed, data.reimbursement_count],
                              borderWidth: 1
                            }
                     ]
                  },
                    options: {
                      scales: {
                          y: {
                            beginAtZero: true
                          }
                      }
                    }
                  };
              }
          });
          return false;
      }

     myDoughnut = new Chart(ctx, locData);


/*****Total Claims Reported end******/
/*****Claims Status start******/
// var outstanding_cashless,paid_cashless,rejected_cashless,outstanding_reimbursement,paid_reimbursement,rejected_reimbursement;
function getCliamStatus(policy_id) {
    $.ajax({
        url : '<?= site_url("show-claim-status-report")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#claim_status_tbl').html(data.body_html);
            $('#status_val').html(data.total_val);
            $('#status_val1').html(data.total_val1);
            $('#status_val2').html(data.total_val2);
            $('#status_val3').html(data.total_val3);

            locData1 = {
            type: 'bar',
            data: {
                labels: [ 'Outstanding', 'Paid','Rejected'],
                datasets: [
                      {
                        label: 'Cashless',
                        backgroundColor: '#ffc043',
                        borderColor: '#ffc043',
                        data: [data.outstanding_cashless, data.paid_cashless,data.rejected_cashless],
                        borderWidth: 1
                      },

                      {
                        label: 'Reimbursement',
                        backgroundColor: '#9966ff',
                        borderColor: '#9966ff',
                        data: [data.outstanding_reimbursement, data.paid_reimbursement,data.rejected_reimbursement],
                        borderWidth: 1
                      }
               ]
            },
              options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
              }
            };

        }
    });
    return false;
}

myDoughnut1 = new Chart(ctx3, locData1);

/*****Claims Status end******/
/*****Month wise Claim Report start********/

function getMonthWise(policy_id) {
    $.ajax({
        url : '<?= site_url("show-month-wise-report")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#month_tbl').html(data.body_html);
            $('#month_val').html(data.month_val);
            $('#month_val1').html(data.month_val1);
            $('#month_val2').html(data.month_val2);

            locData2 = {
            type: 'bar',

            data: {
                labels: data.months,
                datasets: [
                    {
                        label: 'Cashless',
                        data: data.month_cashless,
                        backgroundColor: '#96FF33',
                        borderColor: '#96FF33',
                        borderWidth: 1
                    },
                    {
                        label: 'Reimbursement',
                        data: data.month_reimbursement,
                        backgroundColor: '#366FEB',
                        borderColor: '#366FEB',
                        borderWidth: 1
                    }

                ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stacked: true
                        },
                        x:{
                            stacked: true
                        }
                    }
                }
            };
        }
    });
    return false;
}

myDoughnut2 = new Chart(ctx2, locData2);

/*****Month wise Claim Report end********/
/*****Gender Wise claim report start********/
function getGenderWise(policy_id) {
    $.ajax({
        url : '<?= site_url("show-gender-wise-report")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#gender_tbl').html(data.body_html);
            $('#gender_val').html(data.total_val);
            $('#gender_val1').html(data.total_val1);
            $('#gender_val2').html('₹ '+data.total_val2+' /-');

            locData3 = {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [
                        {
                          label: 'Claim %',
                          data: [data.male_percentage, data.female_percentage],
                          backgroundColor: [
                          'rgba(255, 128, 0)',
                          'rgba(153, 102, 255)',
                        ],
                          borderWidth: 1
                      }
                   ]
                },
                options: {
                    scales: {
                        y: {
                          beginAtZero: true
                        }
                    }
                }
            };
        }
    });
    return false;
}

myDoughnut3 = new Chart(ctx5, locData3);

/*****Gender Wise claim report end*********/
/*****Relation Wise claim report start*********/
function getRelationWise(policy_id) {
    $.ajax({
        url : '<?= site_url("show-relation-wise-report")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#ralation_tbl').html(data.body_html);
            $('#ralation_total_val').html(data.total_val);
            $('#ralation_total_val1').html('₹ '+data.total_val1+' /-');

            locData4 = {
            type: 'bar',
            data: {
              labels: data.relations,
              datasets: [
                  {
                label: 'No. of Claims',
                data: data.relation_wise,
                backgroundColor: [
                  'rgba(255, 99, 132)',
                  'rgba(255, 150, 64)',
                  'rgba(255, 205, 86)',
                  'rgba(0, 255, 128)',
                  'rgba(0, 128, 255)',
                  'rgba(153, 0, 204)',
                  'rgba(143, 0, 255)',
                ],
                borderWidth: 1
              },

              ]
            },
            options: {
              plugins: {
                legend: {
                  display: false
                }
              },
              scales: {
                y: {
                  beginAtZero: true,
                  stacked: true
                },
                x:{
                    stacked: true
                }
              }
            }
          };
        }
    });
    return false;
}

myDoughnut4 = new Chart(ctx6, locData4);

/*****Relation Wise claim report end*********/
/*****Age Wise claim report start*********/
function getAgeWise(policy_id) {
    $.ajax({
        url : '<?= site_url("show-age-wise-report")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#age_tbl').html(data.body_html);
            $('#age_total_val').html(data.total_val);
            $('#age_total_val1').html(data.total_val1);
            $('#age_total_val2').html(data.total_val2);
            $('#age_total_val3').html(data.total_val3);
            $('#age_total_val4').html(data.total_val4);
            $('#age_total_val5').html(data.total_val5);
            $('#age_total_val6').html(data.total_val6);
            // age = data.age;
            var age_wise = data.age_wise;

            locData5 = {
            type: 'bar',
            data: {
              labels: ['0-25','26-35','36-45','46-55','56-65','>65'],
              datasets: [
                  {
                    label: 'Closed',
                    backgroundColor: '#6ae788',
                    borderColor: '#6ae788',
                    data: [age_wise.under_26_0,age_wise.under_36_0,age_wise.under_46_0,age_wise.under_56_0,age_wise.under_66_0,age_wise.greater_65_0],
                    borderWidth: 1
                  },

                  {
                    label: 'Outstanding',
                    backgroundColor: '#FCC28E',
                    borderColor: '#FCC28E',
                    data: [age_wise.under_26_1,age_wise.under_36_1,age_wise.under_46_1,age_wise.under_56_1,age_wise.under_66_1,age_wise.greater_65_1],
                    borderWidth: 1
                  },

                  {
                    label: 'Paid',
                    backgroundColor: '#9966ff',
                    borderColor: '#9966ff',
                    data: [age_wise.under_26_2,age_wise.under_36_2,age_wise.under_46_2,age_wise.under_56_2,age_wise.under_66_2,age_wise.greater_65_2],
                    borderWidth: 1
                  },
                  {
                    label: 'Rejected',
                    backgroundColor: '#FC8EB9',
                    borderColor: '#FC8EB9',
                    data: [age_wise.under_26_3,age_wise.under_36_3,,age_wise.under_46_3,age_wise.under_56_3,age_wise.under_66_3,age_wise.greater_65_3],
                    borderWidth: 1
                  }
              ]
            },
            options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
            }
          };
        }
    });
    return false;
}

myDoughnut5 = new Chart(ctx7, locData5);
/*****Age Wise claim report end*********/
/***** Top 10 Hospital report start*****/
function getTop10ClaimAmountHospital(policy_id) {
    $.ajax({
        url : '<?= site_url("show-top-claim-amount-hospital")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#hospital_tbl').html(data.body_html);
            $('#hospital_total_val').html('₹ '+data.total_val+' /-');
            $('#hospital_total_val1').html(data.total_val1);

            locData6 = {
                type: 'bar',
                data: {
                  labels: data.hospital_name,
                  datasets: [
                      {
                          label: 'Claim Amount',
                          data: data.claim_amt,
                          backgroundColor: '#F08EFC',
                          borderColor: '#F08EFC',
                          borderWidth: 1
                      },

                  ]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true,
                      stacked: true
                    },
                    x:{
                        stacked: true
                    }
                  }
                }
            };
        }
    });
    return false;
}

myDoughnut6 = new Chart(ctx8, locData6);
/*******Top 10 Hospital report end*****/
/********top10 paid claim report start********/
function getTop10PaidClaimAmountHospital(policy_id) {
    $.ajax({
        url : '<?= site_url("show-top-paid-claim-amount-hospital")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#paid_tbl').html(data.body_html);
            $('#paid_total_val').html('₹ '+data.total_val+' /-');
            $('#paid_total_val1').html(data.total_val1);

            locData7 = {
                type: 'bar',
                data: {
                  labels: data.hospital_name,
                  datasets: [
                      {
                          label: 'Claim Paid Amount',
                          data: data.claim_amt,
                          backgroundColor: '#65CC8A',
                          borderColor: '#65CC8A',
                          borderWidth: 1
                      },

                  ]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true,
                      stacked: true
                    },
                    x:{
                        stacked: true
                    }
                  }
                }
            };
        }
    });
    return false;
}

myDoughnut7 = new Chart(ctx9, locData7);

/********top10 paid claim report end********/
/********sum insured report start********/
function getSumInsured(policy_id) {
    $.ajax({
        url : '<?= site_url("show-sum-insered-report")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#insured_tbl').html(data.body_html);
            $('#insured_total_val').html(data.total_val);
            $('#insured_total_val1').html(data.total_val1);

            locData8 = {
                type: 'bar',
                data: {
                  labels: data.relationship,
                  datasets: [
                      {
                          label: 'No. of Employees',
                          data: data.employee_count,
                          backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(255, 150, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(0, 255, 128)',
                            'rgba(0, 128, 255)',
                            'rgba(153, 0, 204)',
                            'rgba(143, 0, 255)',
                          ],
                          borderColor: [
                            'rgba(255, 99, 132)',
                            'rgba(255, 150, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(0, 255, 128)',
                            'rgba(0, 128, 255)',
                            'rgba(153, 0, 204)',
                            'rgba(143, 0, 255)',
                          ],
                          borderWidth: 1
                      },

                  ]
                },
                options: {
                  plugins: {
                    legend: {
                      display: false
                    }
                  },
                  scales: {
                    y: {
                      beginAtZero: true,
                      stacked: true
                    },
                    x:{
                        stacked: true
                    }
                  }
                }
            };
        }
    });
    return false;
}

myDoughnut8 = new Chart(ctx10, locData8);

/********sum insured report end********/
/********endorsement report start********/
function getEndorsement(policy_id) {
    $.ajax({
        url : '<?= site_url("show-endorsement-report")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data);
            $('#endorsement_tbl').html(data.body_html);
            $('#endorsement_total_val').html(data.total_val);
            $('#endorsement_total_val1').html(data.total_val1);
            $('#endorsement_total_val2').html(data.total_val2);
            $('#endorsement_total_val3').html(data.total_val3);
            $('#endorsement_total_val4').html(data.total_val4);
            $('#endorsement_total_val5').html(data.total_val5);

            locData9 = {
            type: 'bar',
            data: {
              labels: data.months,
              datasets: [
                  {
                    label: 'Employee Additon',
                    backgroundColor: 'rgba(255, 111, 64)',
                    borderColor: 'rgba(255, 111, 64)',
                    data: data.employee_addition,
                    borderWidth: 1
                  },

                  {
                    label: 'Dependent Addition ',
                    backgroundColor: 'rgba(255, 215, 86)',
                    borderColor: 'rgba(255, 215, 86)',
                    data: data.dependent_addition,
                    borderWidth: 1
                  },

                  {
                    label: 'Employee Correction',
                    backgroundColor: 'rgba(75, 100, 192)',
                    borderColor: 'rgba(75, 100, 192)',
                    data: data.employee_correction,
                    borderWidth: 1
                  },
                  {
                    label: 'Dependent Correction',
                    backgroundColor: 'rgba(54, 111, 235)',
                    borderColor: 'rgba(54, 111, 235)',
                    data: data.dependent_correction,
                    borderWidth: 1
                  },

                  {
                    label: 'Employee Deletion',
                    backgroundColor: 'rgba(153, 111, 255)',
                    borderColor: 'rgba(153, 111, 255)',
                    data: data.employee_deletion,
                    borderWidth: 1
                  },
                  {
                    label: 'Dependent Deletion',
                    backgroundColor: 'rgba(255, 90, 132)',
                    borderColor: 'rgba(255, 90, 132)',
                    data: data.dependent_deletion,
                    borderWidth: 1
                  }
              ]
            },
            options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
            }
          };
        }
    });
    return false;
}

myDoughnut9 = new Chart(ctx11, locData9);

/********endorsement report end********/
});
// var ticksStyle = {
//   fontColor: '#495057',
//   fontStyle: 'bold'
// }
//
// var mode = 'index'
// var intersect = true
//
// var $salesChart = $('#sales-chart')
// // eslint-disable-next-line no-unused-vars
// var salesChart = new Chart($salesChart, {
//   type: 'bar',
//   data: {
//     labels: ['Amount Claimed', 'Claim Count'],
//     datasets: [
//       {
//         label: 'Cashless',
//         backgroundColor: '#6ae788',
//         borderColor: '#6ae788',
//         data: [2200000, 290000]
//       },
//       {
//         label: 'Reimbursement',
//         backgroundColor: '#ced4da',
//         borderColor: '#ced4da',
//         data: [2400000, 370000]
//       }
//     ]
//   },
//   options: {
//     maintainAspectRatio: false,
//     tooltips: {
//       mode: mode,
//       intersect: intersect
//     },
//     hover: {
//       mode: mode,
//       intersect: intersect
//     },
//     legend: {
//       display: false
//     },
//     scales: {
//       yAxes: [{
//         // display: false,
//         gridLines: {
//           display: true,
//           lineWidth: '4px',
//           color: 'rgba(0, 0, 0, .2)',
//           zeroLineColor: 'transparent'
//         },
//         ticks: $.extend({
//           beginAtZero: true,
//
//             //Include a dollar sign in the ticks
//             callback: function (value) {
//               if (value >= 5000000) {
//                 value /= 5000000
//                 value += 'k'
//               }
//
//               return '$' + value
//             }
//         }, ticksStyle)
//       }],
//       xAxes: [{
//         display: true,
//         gridLines: {
//           display: false
//         },
//         ticks: ticksStyle
//       }]
//     }
//   }
// })

// const ctx = document.getElementById('barChart');
//
// new Chart(ctx, {
// type: 'bar',
// data: {
//     labels: [ 'Cashless', 'Reimbursement'],
//     datasets: [
//           {
//             label: 'Cashless',
//             backgroundColor: '#6ae788',
//             borderColor: '#6ae788',
//             data: [2200000, 290000],
//             borderWidth: 1
//           },
//
//           {
//             label: 'Reimbursement',
//             backgroundColor: '#ced4da',
//             borderColor: '#ced4da',
//             data: [2400000, 370000],
//             borderWidth: 1
//           }
//    ]
// },
//   options: {
//       scales: {
//         y: {
//           beginAtZero: true
//         }
//       }
//   }
// });
//
// const ctx2 = document.getElementById('barChart');
//
// new Chart(ctx2, {
// type: 'bar',
// data: {
//   labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//   datasets: [
//       {
//     label: '# of Votes',
//     data: [8, 7],
//     backgroundColor: [
//       'rgba(255, 99, 132)',
//       'rgba(255, 150, 64)',
//       'rgba(255, 205, 86)',
//       'rgba(75, 190, 192)',
//       'rgba(54, 161, 235)',
//       'rgba(153, 101, 255)',
//       'rgba(201, 200, 207)'
//     ],
//     borderWidth: 1
//   },
//   {
//     label: '# of Votes',
//     data: [12, 22],
//     backgroundColor: [
//       'rgba(255, 90, 132)',
//       'rgba(255, 111, 64)',
//       'rgba(255, 215, 86)',
//       'rgba(75, 100, 192)',
//       'rgba(54, 111, 235)',
//       'rgba(153, 111, 255)',
//       'rgba(201, 210, 207)'
//    ],
//     borderWidth: 1
//   }
//
//   ]
// },
// options: {
//   scales: {
//     y: {
//       beginAtZero: true,
//       stacked: true
//     },
//     x:{
//         stacked: true
//     }
//   }
// }
// });

// new Chart(ctx, {
// type: 'bar',
// data: {
//   labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//   datasets: [{
//     label: '# of Votes',
//     data: [dfd, 19, 3, 5, 2, 3],
//     backgroundColor: [
//   'rgba(255, 99, 132)',
//   'rgba(255, 159, 64)',
//   'rgba(255, 205, 86)',
//   'rgba(75, 192, 192)',
//   'rgba(54, 162, 235)',
//   'rgba(153, 102, 255)',
//   'rgba(201, 203, 207)'
// ],
//     borderWidth: 1
//   }]
// },
// options: {
//   scales: {
//     y: {
//       beginAtZero: true
//     }
//   }
// }
// });
</script>

<script>
// const ctx1 = document.getElementById('pieChart');
//
// new Chart(ctx1, {
// type: 'pie',
// data: {
//   labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//   datasets: [{
//     label: '# of Votes',
//     data: [12, 19, 3, 5, 2, 3],
//     backgroundColor: [
//   'rgba(255, 99, 132)',
//   'rgba(255, 159, 64)',
//   'rgba(255, 205, 86)',
//   'rgba(75, 192, 192)',
//   'rgba(54, 162, 235)',
//   'rgba(153, 102, 255)',
//   'rgba(201, 203, 207)'
// ],
//     borderWidth: 1
//   }]
// },
// options: {
//   scales: {
//     y: {
//       beginAtZero: true
//     }
//   }
// }
// });
</script>


<script>
// const ctx1 = document.getElementById('pieChart');
//
// new Chart(ctx1, {
// type: 'pie',
// data: {
//   labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//   datasets: [{
//     label: '# of Votes',
//     data: [12, 19, 3, 5, 2, 3],
//     backgroundColor: [
//   'rgba(255, 99, 132)',
//   'rgba(255, 159, 64)',
//   'rgba(255, 205, 86)',
//   'rgba(75, 192, 192)',
//   'rgba(54, 162, 235)',
//   'rgba(153, 102, 255)',
//   'rgba(201, 203, 207)'
// ],
//     borderWidth: 1
//   }]
// },
// options: {
//   scales: {
//     y: {
//       beginAtZero: true
//     }
//   }
// }
// });
</script>

<script>
// const ctx2 = document.getElementById('stackedChart');
//
// new Chart(ctx2, {
// type: 'bar',
// data: {
//   labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//   datasets: [
//       {
//     label: '# of Votes',
//     data: [12, 19, 3, 5, 2, 3],
//     backgroundColor: [
//   'rgba(255, 99, 132)',
//   'rgba(255, 150, 64)',
//   'rgba(255, 205, 86)',
//   'rgba(75, 190, 192)',
//   'rgba(54, 161, 235)',
//   'rgba(153, 101, 255)',
//   'rgba(201, 200, 207)'
// ],
//     borderWidth: 1
//   },
//   {
//     label: '# of Votes',
//     data: [12, 19, 3, 10, 2, 3],
//     backgroundColor: [
//   'rgba(255, 90, 132)',
//   'rgba(255, 111, 64)',
//   'rgba(255, 215, 86)',
//   'rgba(75, 100, 192)',
//   'rgba(54, 111, 235)',
//   'rgba(153, 111, 255)',
//   'rgba(201, 210, 207)'
// ],
//     borderWidth: 1
//   }
//
//   ]
// },
// options: {
//   scales: {
//     y: {
//       beginAtZero: true,
//       stacked: true
//     },
//     x:{
//         stacked: true
//     }
//   }
// }
// });
</script>
