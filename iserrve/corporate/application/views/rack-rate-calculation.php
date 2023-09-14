<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="content-header" style="padding-top: 0px !important;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=site_url('endorsement')?>">Endorsement Calculation</a></li>
                                <li class="breadcrumb-item active">Rack Rate Calculation</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row p-tb-30px">
                        <div class="col-12">
                            <div class="card border-1px new-border-radius">
                                <div class="card-body">
                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <h5>Addition Calculation</h5>
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Sum Insured</th>
                                                        <th scope="col">Annual Premium</th>
                                                        <th scope="col">Premium Per Day</th>
                                                        <th scope="col">Count</th>
                                                        <th scope="col">Addtion Premium</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($addition_attribute)) {
                                                      $total_addition_premium = 0;
                                                      foreach ($addition_attribute as $attr) {
                                                        $total_addition_premium +=$attr['addition_premium_addition'];
                                                        ?>
                                                    <tr>
                                                        <td><?=number_format($attr['suminsure_addition'])?></td>
                                                        <td><?=number_format($attr['annual_premium_addition'])?></td>
                                                        <td><?=number_format($attr['premium_per_day_addition'],2,'.','')?></td>
                                                        <td><?=number_format($attr['count_addition'])?></td>
                                                        <td><?=number_format($attr['addition_premium_addition'],2,'.','')?></td>
                                                    </tr>
                                                    <?php }

                                                   }else{ ?>
                                                    <tr>
                                                        <td><td><td>No record found</td></td></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <thead class="">
                                                        <tr>
                                                            <th colspan="4" class="main-td">Total</th>

                                                            <th class="main-td"><?='₹ '.number_format($total_addition_premium,2,'.','')?>/-</th>
                                                        </tr>
                                                    </thead>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <h5>Deletion Calculation</h5>
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Sum Insured</th>
                                                        <th scope="col">Annual Premium</th>
                                                        <th scope="col">Premium Per Day</th>
                                                        <th scope="col">Count</th>
                                                        <th scope="col">Deletion Premium</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($deletion_attribute)) {
                                                      $total_deletion_premium = 0;
                                                      foreach ($deletion_attribute as $attr) {
                                                        $total_deletion_premium +=$attr['addition_premium_deletion'];
                                                        ?>
                                                    <tr>
                                                        <td><?=number_format($attr['suminsure_deletion'])?></td>
                                                        <td><?=number_format($attr['annual_premium_deletion'])?></td>
                                                        <td><?=number_format($attr['premium_per_day_deletion'],2,'.','')?></td>
                                                        <td><?=$attr['count_deletion']?></td>
                                                        <td><?=number_format($attr['addition_premium_deletion'],2,'.','')?></td>
                                                    </tr>
                                                    <?php }

                                                   }else{ ?>
                                                    <tr>
                                                        <td><td><td>No record found</td></td></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <thead class="">
                                                        <tr>
                                                            <th colspan="4" class="main-td">Total</th>
                                                            <th class="main-td"><?='₹ '.number_format($total_deletion_premium,2,'.','')?>/-</th>
                                                        </tr>
                                                    </thead>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Net Addition Premium</th>
                                                        <th scope="col">Net Deletion Premium</th>
                                                        <th scope="col">Net Payable Premium</th>
                                                        <th scope="col">Premium Payable With GST</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="">
                                                    <?php if(!empty($calculation_data)) { ?>
                                                    <tr>
                                                        <td><?='₹ '.number_format($calculation_data['total_additional_premium'],2,'.','')?>/-</td>
                                                        <td><?='₹ '.number_format($calculation_data['total_deletion_premium'],2,'.','')?>/-</td>
                                                        <td><?=number_format($calculation_data['net_premium'],2,'.','')?></td>
                                                        <td><?=number_format($calculation_data['net_premium_with_gst'],2,'.','')?></td>
                                                    </tr>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Endersoment Title</th>
                                                        <th scope="col">Endersoment Number</th>
                                                        <th scope="col">Transaction Statement</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="">
                                                    <?php if(!empty($calculation_data)) { ?>
                                                    <tr>
                                                        <td><?=$calculation_data['endersoment_title']?></td>
                                                        <td><?=$calculation_data['endersoment_number']?></td>
                                                        <td><?=$calculation_data['transaction_statement']?></td>

                                                    </tr>
                                                  <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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
