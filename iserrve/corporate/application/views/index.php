<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="row">
            <h5 class="box-heading" style="float: left;">Policy Details</h5>
            </div>

            <div class="owl-carousel owl1 owl-theme">
            <?php if(!empty($result)){ foreach($result as $key => $row){

            if ($key === key($result)) {
                $act = 'active';
            }else{
                $act = '';
            }

            if($row['policy_end_date'] > date('Y-m-d')){
              $status = 'Activated';
              $col = 'bg-info1';
              $txt = 'text-white';
              $i_tag ='feather icon-feather-heart info-box-icon border-radius-8px bg-white';
              $sty = '';
              $sty1 = '';
              $txt1 = 'text-white';
              $sty2 = 'color: #fbfbfb; font-weight: 300;';
              $sty3 = 'border-right: 5px solid #e7920b;';
            }else{
              $status = 'Paused';
              $col = 'bg-white';
              $txt = 'text-black';
              $i_tag ='fa fa-umbrella info-box-icon bg-white border-radius-8px new-box-shadow';
              $sty = 'float: left;';
              $sty1 = 'float: right;';
              $txt1 = 'text-blue';
              $sty2 = 'color: #999a9b; font-weight: 300;';
              $sty3 = 'border-right: 5px solid #dee2e6;';
            }
            ?>
            <div class="item <?=$act?>">
                <a href="#">
                    <div class="card1 mt-2 <?=$col?> card-primary border-1px new-box-shadow-hover" id="policy_card_<?=$key?>" data-policy_no="<?=base64_encode($row["id"])?>" >
                        <div class="card-body box-profile new-padding">
                            <div class="d-block">
                                <div class="card-header padding-30px h-70px">
                                    <div class="card-title <?=$txt?>" style="<?=$sty?>">
                                        <i class="<?=$i_tag?>"></i>
                                        <h3 class="card-title-text"><?=$row["insurer"]?></h3>
                                    </div>
                                    <div class="card-tools" style="<?=$sty1?>">
                                        <span class="badge light font-weight-500 <?=$txt1?>"> <i class="fa fa-circle <?=$txt1?> mr-1"></i><?=$status?></span>
                                    </div>
                                </div>
                                <div class="policy-number mb-2 mt-2">
                                    <h3 class="card-title-text <?=$txt?> font-size-15px"><?=$row["product_name"]?></h3>
                                </div>

                                <div class="policy-number mb-4 mt-4">
                                    <span class="info-box-text bg-white f-left font-size-13px font-weight-600"> Policy No : <?=$row["policy_no"]?></span>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-5 p-0">
                                        <div class="policy-number">
                                            <div class="d-block">
                                                <span class="info-box-text <?=$txt?> mb-2" style="<?=$sty2?>"> Policy Period</span>
                                                <h2 class="info-box-text <?=$txt?> font-size-15px"><?=date('d M y', strtotime($row['policy_start_date']))?> - <?=date('d M y', strtotime($row['policy_end_date']))?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 p-0">
                                        <div class="policy-number">
                                            <div class="d-block">
                                                <span class="info-box-text <?=$txt?> mb-2" style="<?=$sty2?>"> TPA Name</span>
                                                <h2 class="info-box-text <?=$txt?> font-size-15px"><?=$row["tpa"]?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
        </div>
        <?php } } ?>

    </div>
            </div>
        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row justify-content-center pt-4">
            <div class="col-md-12 col-sm-6 col-12">
                <div class="card box-shadow-none">
                    <div class="card-body box-shadow-none">
                        <h5 class="mb-3 box-heading">Member Details</h5>

                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="small-box v-bg-info new-border-radius ">
                                    <div class="icon">
                                        <i class="ion ion-ios-people box1 bgl1-success"></i>
                                    </div>

                                    <div class="inner">
                                        <h3 class="box1" id="active_total">0</h3>

                                        <p class="member-heading mb-2">Total Active Lives</p>
                                    </div>

                                    <!--<a href="#" class="small-box-footer1">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                                    <!-- <span class="line box01-bg"></span> -->
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                                <!-- small box -->
                                <div class="small-box v-bg-purp  new-border-radius ">
                                    <div class="icon ">
                                        <i class="ion ion-person-stalker box03 bg0l2-success"></i>
                                    </div>
                                    <div class="inner">
                                        <h3 class="box03" id="inception_total">0</h3>

                                        <p class="member-heading mb-2">Inception Count</p>
                                    </div>

                                    <!--<a href="#" class="small-box-footer1">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                                    <!-- <span class="line box003-bg"></span> -->
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                                <!-- small box -->
                                <div class="small-box v-bg-green new-border-radius ">
                                    <div class="icon ">
                                        <i class="ion ion-heart box4 bg0l3-success"></i>
                                    </div>
                                    <div class="inner">
                                        <h3 class="box4" id="addition_total">0</h3>

                                        <p class="member-heading mb-2">Addition Count</p>
                                    </div>

                                    <!--<a href="#" class="small-box-footer1">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                                    <!-- <span class="line box04-bg"></span> -->
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-12">
                                <!-- small box -->
                                <div class="small-box  new-border-radius v-bg-red">
                                    <div class="icon ">
                                        <i class="ion ion-person-stalker box3 bgl2-success"></i>
                                    </div>
                                    <div class="inner">
                                        <h3 class="box3" id="deletion_total">0</h3>

                                        <p class="member-heading mb-2">Deletion Count</p>
                                    </div>

                                    <!--<a href="#" class="small-box-footer1">More info <i class="fas fa-arrow-circle-right"></i></a>-->
                                    <!-- <span class="line box5-bg"></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <div class="row">
            <h5 class="box-heading" style="float: left;">Iserrve Services</h5>
            </div>
                <div class="owl-carousel owl2 owl-theme">
                <div class="item">
                <img src="<?=base_url('assets/')?>dist/img/div3.jpg" class="d-block" alt="..." />
                </div>
                <div class="item">
                <img src="<?=base_url('assets/')?>dist/img/div.jpg" class="d-block" alt="..." />
                </div>
                <div class="item">
                <img src="<?=base_url('assets/')?>dist/img/div1.png" class="d-block" alt="..." />
                </div>

                </div>
            </div>
        </div>

        <!--new section -->

        <!---new section End-->

        <div class="row p-tb-30px justify-content-center">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card box-shadow-none">
                    <div class="card-body box-shadow-none">
                        <!-- <div class="card mt-6 card-primary border-1px">
        <div class="card-body box-profile"> -->

                        <div class="member-box">
                            <h5 class="mb-3 box-heading1 text-left">Claim Details</h5>
                            <div id="London" class="tabcontent" style="display: block;">
                                <div class="text-center">
                                    <div class="profile-user-img img-fluid img-circle mb-3">
                                        <p class="m-0 tab-p">0</p>
                                    </div>
                                    <h3 class="member-heading mb-1 text-center">No. of Claims &amp; Reported Amount</h3>
                                </div>
                            </div>

                            <div class="tab mt-3 d-inline-block">

                                        <button type="button" class="tablinks btn d-flex active" id="defaultOpen">
                                            <i class="feather icon-feather-chevrons-right icon-medium align-middle text-blue font-weight-900"></i> <span class="t-text mr-2">Reported Claims:</span>  <span id='reported_count'></span>
                                        </button>

                                        <button type="button" class="tablinks btn d-flex">
                                            <i class="feather icon-feather-chevrons-right icon-medium align-middle text-blue font-weight-900"></i> <span class="t-text mr-2">Outstanding Claims:</span> &nbsp;<span id='outstanding_count'></span>
                                        </button>


                                        <button type="button" class="tablinks btn d-flex">
                                            <i class="feather icon-feather-chevrons-right icon-medium align-middle text-blue font-weight-900"></i> <span class="t-text mr-2">Rejected Claims:</span> <span id='rejected_count'></span>
                                        </button>

                                        <button type="button" class="tablinks btn d-flex">
                                            <i class="feather icon-feather-chevrons-right icon-medium align-middle text-blue font-weight-900"></i> <span class="t-text mr-2">Paid Claims: </span><span id='paid_count'></span>
                                        </button>


                                        <button type="button" class="tablinks btn d-flex">
                                            <i class="feather icon-feather-chevrons-right icon-medium align-middle text-blue font-weight-900"></i> <span class="t-text mr-2">Cashless Claims:</span> <span id='cashless_count'></span>
                                        </button>

                                        <button type="button" class="tablinks btn d-flex">
                                            <i class="feather icon-feather-chevrons-right icon-medium align-middle text-blue font-weight-900"></i> <span class="t-text mr-2">Reimbursement Claims:</span> <span id='reimbursement_count'></span>
                                        </button>


                                <!--  <div class="tabflex">
        <button type="button" class="tablinks btn d-flex" onclick="openCity(event, 'Tokyo4')"><span class="info-box-icon bg-info"><i class="feather icon-feather-edit icon-medium align-middle"></i></span>Paid Claims </button>
        </div>
        -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 col-sm-6 col-12">
                <div class="card member-box">
                    <div class="card-header1 border-0 mb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="box-heading1">Gender Claim Ratio</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <div class="charts">
                               <canvas id="barChart8" height="180" width="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <div class="row justify-content-center mb-2">
        <div class="col-md-4 col-sm-6 col-12">
                <div class="card member-box">
                    <div class="card-header1 border-0 mb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="box-heading1">Claims Ratio</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4 hideTxt">
                            <canvas id="pieChart1" height="200" width="487" style="display: block; width: 487px; height: 200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center h-50px">
                <div class="card member-box">
                    <div class="card-header1 border-0 mb-2">
                        <div class="d-flex justify-content-between h-45px">
                            <h3 class="box-heading1">Incurred Claim Ratio</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="position-relative mb-4 hideTxt">
                            <canvas id="pieChart2" height="200" width="487"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 text-center h-50px">
                <div class="card member-box">
                    <div class="card-header1 border-0 mb-2">
                        <div class="d-flex justify-content-between">
                            <h3 class="box-heading1 text-left">No. of Employees Portal Login ratio</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="barChart9" height="200" width="487" style="display: block; width: 487px; height: 200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- end index here-->
      <div class="row p-tb-30px justify-content-center"></div>
    </div>
  </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    var policy_id = atob($('#policy_card_0').data('policy_no'));

    getMemberDetails(policy_id);
    getClaimCounts(policy_id);
    getGendertWiseClaimRatio(policy_id);
    getClaimRatio(policy_id);
    getEmployeeLoginRatio(policy_id);

    var ctx11 = document.getElementById('barChart8');
    var ctx14 = document.getElementById('barChart9');
    var ctx12 = document.getElementById('pieChart1');
    var ctx13 = document.getElementById('pieChart2');

    $(document).on('click', '.card1', function(){
        var policy_id = atob($(this).data('policy_no')); //base64 decode
        getMemberDetails(policy_id);
        getClaimCounts(policy_id);
        getGendertWiseClaimRatio(policy_id);
        getClaimRatio(policy_id);
        getEmployeeLoginRatio(policy_id);

        myDoughnut10.destroy();
        myDoughnut10 = new Chart(ctx11, locData10);

        myDoughnut11.destroy();
        myDoughnut11 = new Chart(ctx14, locData11);

        myDoughnut12.destroy();
        myDoughnut12 = new Chart(ctx12, locData12);

        myDoughnut13.destroy();
        myDoughnut13 = new Chart(ctx13, locData13);
    });

    function getMemberDetails(policy_id) {
        $.ajax({
            url : '<?= site_url("show-member-counts")?>',
            type : 'post',
            data : 'policy_id=' + policy_id,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $('#inception_total').html(data.total_val);
                $('#addition_total').html(data.total_val1);
                $('#deletion_total').html(data.total_val2);
                $('#active_total').html(data.total_val3);
            }
        });
        return false;
    }


    function getClaimCounts(policy_id) {
        $.ajax({
            url : '<?= site_url("show-claim-counts")?>',
            type : 'post',
            data : 'policy_id=' + policy_id,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $('.tab-p').text(kFormatter(data.reported_amount));
                $('#cashless_count').text(data.cashless_count);
                $('#outstanding_count').text(data.outstanding_count);
                $('#paid_count').text(data.paid_count);
                $('#reimbursement_count').text(data.reimbursement_count);
                $('#rejected_count').text(data.rejected_count);
                $('#reported_count').text(data.reported_count);
                $(this).removeClass('active');
            }
        });
        return false;
    }

    $(document).on('click', '.tablinks', function(){
        $('.tablinks').removeClass('active');
        var claim_type = $(this).text().replace(' Claims:','').replace($(this).text().replace(' Claims:','').match(/(\d+)/g)[0], '').trim();
        var policy_id = atob($('.card1').data('policy_no'));
        $.ajax({
            url : '<?= site_url("show-claim-amounts")?>',
            type : 'post',
            data : 'claim_type=' + claim_type + '&policy_id=' + policy_id,
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $('.tab-p').text(kFormatter(data.claim_amount));
                $(this).removeClass('active');
            }
        });
        return false;
        $(this).addClass('active');
    });


/******* Gender claim Ratio start*********/

var claims;
function getGendertWiseClaimRatio(policy_id) {
    $.ajax({
        url : '<?= site_url("show-gender-wise-claim-ratio")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            claims = data;

            locData10 = {
            type: 'bar',
            data: {
                labels: [ 'Claim Count'],
                datasets: [
                      {
                        label: 'Male',
                        backgroundColor: 'rgba(0, 255, 128)',
                        borderColor: 'rgba(0, 255, 128)',
                        data: [claims.male_claims],
                        borderWidth: 1
                      },

                      {
                        label: 'Female',
                        backgroundColor: 'rgba(153, 0, 204)',
                        borderColor: 'rgba(153, 0, 204)',
                        data: [claims.female_claims],
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

myDoughnut10 = new Chart(ctx11, locData10);

/******* Gender claim Ratio end*********/
/******* claim Ratio Start *********/
var locData12,locData13,remaining1,remaining;
function getClaimRatio(policy_id) {
    $.ajax({
        url : '<?= site_url("show-claim-ratio")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            console.log(data);

            if(data == 'No data found'){
              $('.hideTxt').html(data);
            }else{
                remaining = 100 - data.claim_ratio;
                if(data.claim_ratio > 100){
                  remaining = 0;
                }
                locData12 = {
                    type: 'pie',
                    data: {
                        // labels: ['Male', 'Female'],
                        datasets: [
                            {
                              label: 'Claim Ratio',
                              data: [data.claim_ratio,remaining],
                              backgroundColor: ['rgba(255, 128, 0)','#FFFFFF'],
                              borderColor: ['rgba(255, 128, 0)','#dadcdf'],
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

              remaining1 = 100 - data.earned_ratio;
              if(data.earned_ratio > 100){
                remaining1 = 0;
              }
              locData13 =  {
                    type: 'pie',
                    data: {
                        datasets: [
                            {
                              label: 'Incurred Claim Ratio',
                              data: [data.earned_ratio,remaining1],
                              backgroundColor: ['#8EA8BF','#FFFFFF'],
                              borderColor: ['#8EA8BF','#dadcdf'],
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
            // claim_ratio = data.claim_ratio;
            // incurred_claim_ratio = data.earned_ratio;


        }
    });
    return false;
}

myDoughnut12 = new Chart(ctx12, locData12);

myDoughnut13 = new Chart(ctx13, locData13);

/******* Claim Ratio end*********/
/******* Employee Login Ratio start*********/
function getEmployeeLoginRatio(policy_id) {
    $.ajax({
        url : '<?= site_url("show-employee-login-ratio")?>',
        type : 'post',
        data : 'policy_id=' + policy_id,
        dataType: 'json',
        async: false,
        success: function(data){
            // console.log(data)
            locData11 = {
            type: 'bar',
            data: {
                labels: [ 'Employee Login'],
                datasets: [
                      {
                        label: 'Total Employees',
                        backgroundColor: '#366feb',
                        borderColor: '#366feb',
                        data: [data.total_employee],
                        borderWidth: 1
                      },

                      {
                        label: 'Registered Employees',
                        backgroundColor: '#ff5a84',
                        borderColor: '#ff5a84',
                        data: [data.register_employee],
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

myDoughnut11 = new Chart(ctx14, locData11);

/******* Employee Login Ratio end*********/

function kFormatter(num) {
    return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num)
}
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.owl1').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
</script>

<script>
    $('.owl2').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
</script>
