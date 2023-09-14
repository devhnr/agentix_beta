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
                                <li class="breadcrumb-item active">Summary</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row p-tb-30px">
                        <div class="col-12">
                            <div class="card border-1px">
                                <div class="card-body" style="min-height: 1px !important;padding: 0.5rem !important;">
                                    <div class="policy-label">
                                        <div class="policy-label-icon">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        <div class="policy-text">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="mt-4 box-heading">Premium Summary</h2>
                    <div class="row mt-4 sum-counter">
                        <div class="col">
                            <div class="card border-1px new-border-radius" style="background: #ffebeb; border-right: 5px solid #ffd5d5;">
                                <h6>Inception Premium</h6>
                                <span class="text-danger inc_permium"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-1px new-border-radius" style="background: #ecebff; border-right: 5px solid #c7def5;">
                                <h6>Additional Premium</h6>
                                <span class="text-primary add_permium"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-1px new-border-radius" style="background: #e7ffeb; border-right: 5px solid #bfe7c5;">
                                <h6>Deletion Premium</h6>
                                <span class="text-success del_permium"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-1px new-border-radius" style="background: #fff6d5; border-right: 5px solid #f0e3b2;">
                                <h6>NET Premium</h6>
                                <span class="text-warning net_permium"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-1px new-border-radius" style="background: #e7edff; border-right: 5px solid #c9dcff;">
                                <h6>Active Lives</h6>
                                <span class="text-info act_permium"></span>
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
                                                Enrollment Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Lives</th>
                                                        <th scope="col">Inception Lives</th>
                                                        <th scope="col">Additional Lives</th>
                                                        <th scope="col">Deletion Lives</th>
                                                        <th scope="col">Active Lives</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="emp_summary_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="inception_total"></th>
                                                        <th id="addition_total"></th>
                                                        <th id="deletion_total"></th>
                                                        <th id="active_total"></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Claim Ratio (%) Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Net Premium</th>
                                                        <th scope="col">Earned Premium</th>
                                                        <th scope="col">Incurred Premium</th>
                                                        <th scope="col">Claim Ratio (%)</th>
                                                        <th scope="col">Incurred Claim Ratio (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ratio_tbl">
                                                    <tr>
                                                        <td class="net_permium"></td>
                                                        <td class="earned_permium"></td>
                                                        <td class="claimed_permium"></td>
                                                        <td class="claimed_ratio"></td>
                                                        <td class="earned_ratio"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                                Claim Status Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Status</th>
                                                        <th scope="col" colspan="3">Cashless</th>
                                                        <th scope="col" colspan="3">Reimbursement</th>
                                                        <th scope="col" colspan="3">Total</th>

                                                    </tr>
                                                    <tr>
                                                      <!-- <td >total Claim</td> -->
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Settled Amount</td>
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Settled Amount</td>
                                                      <td>Total Claim</td>
                                                      <td>Claim Amount</td>
                                                      <td>Settled Amount</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="claim_summary_tbl" >
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th id="total_val"></th>
                                                        <th id="total_val1"></th>
                                                        <th id="total_val2"></th>
                                                        <th id="total_val3"></th>
                                                        <th id="total_val4"></th>
                                                        <th id="total_val5"></th>
                                                        <th id="total_val6"></th>
                                                        <th id="total_val7"></th>
                                                        <th id="total_val8"></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Settled (ACS)
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Status</th>
                                                        <th scope="col" colspan="4">Cashless</th>
                                                        <th scope="col" colspan="4">Reimbursement</th>
                                                        <th scope="col" colspan="4">Total</th>

                                                    </tr>
                                                    <tr>
                                                      <!-- <td >total Claim</td> -->
                                                      <td>Total Claim</td>
                                                      <td>Settled Claim Count</td>
                                                      <td>Settled Amount</td>
                                                      <td>ACS</td>
                                                      <td>Total Claim</td>
                                                      <td>Settled Claim Count</td>
                                                      <td>Settled Amount</td>
                                                      <td>ACS</td>
                                                      <td>Total Claim</td>
                                                      <td>Settled Claim Count</td>
                                                      <td>Settled Amount</td>
                                                      <td>ACS</td>
                                                </thead>
                                                <tbody id="settled_tbl">
                                                </tbody>
                                            </table>
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
                                                Agewise Settled Claim Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Age Group</th>
                                                        <th scope="col">Total Claims</th>
                                                        <th scope="col">Paid Claim Count</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">% of Claims</th>
                                                        <th scope="col">ACS</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="age_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="age_total_val"></th>
                                                        <th id="age_total_val1"></th>
                                                        <th id="age_total_val2"></th>
                                                        <th id="age_total_val3"></th>
                                                        <th id="age_total_val4"></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Settled Claim TAT Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Internal Processing TAT (No)</th>
                                                        <th scope="col">Claims Count</th>
                                                        <th scope="col">Claims (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tat_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th id='tal_total_val'></th>
                                                        <th id='tal_total_val1'></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Outstanding Claim TAT Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Internal Processing TAT (No)</th>
                                                        <th scope="col">Claims Count</th>
                                                        <th scope="col">Claims (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="out_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Grand Total</th>
                                                        <th id='out_total_val'></th>
                                                        <th id='out_total_val1'></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Relationwise Settled Claim Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Relation</th>
                                                        <th scope="col">Total Claims</th>
                                                        <th scope="col">Paid Claim Count</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">% of Claims</th>
                                                        <th scope="col">ACS</th>
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
                                                        <th id="ralation_total_val3"></th>
                                                        <th id="ralation_total_val4"></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Network / Non Network Claim Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr>
                                                        <th scope="col">Network Type</th>
                                                        <th scope="col">Type of Claim</th>
                                                        <th scope="col">Total Claim</th>
                                                        <th scope="col">Paid Claim</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">ACS</th>
                                                        <th scope="col">% of Claims</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="network_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th></th>
                                                        <th>Grand Total</th>
                                                        <th id='network_total_val'></th>
                                                        <th id='network_total_val1'></th>
                                                        <th id='network_total_val2'></th>
                                                        <th id='network_total_val3'></th>
                                                        <th id='network_total_val4'></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Amount Band Settled Claim Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col">Amount Band</th>
                                                        <th scope="col">Total Claims</th>
                                                        <th scope="col">Paid Claim Count</th>
                                                        <th scope="col">Settled Amount</th>
                                                        <th scope="col">% of Claims</th>
                                                        <th scope="col">ACS</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="amount_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="amount_total_val"></th>
                                                        <th id="amount_total_val1"></th>
                                                        <th id="amount_total_val2"></th>
                                                        <th id="amount_total_val3"></th>
                                                        <th id="amount_total_val4"></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Level of Care Settled Claim Summary
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap" >
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Level of Care</th>
                                                        <th scope="col" colspan="4">Medical</th>
                                                        <th scope="col" colspan="4">Surgical</th>

                                                    </tr>
                                                    <tr>
                                                      <td>Total Claim</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>ACS</td>
                                                      <td>Total Claim</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>ACS</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="level_tbl" >
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="level_val"></th>
                                                        <th id="level_val1"></th>
                                                        <th id="level_val2"></th>
                                                        <th id="level_val3"></th>
                                                        <th id="level_val4"></th>
                                                        <th id="level_val5"></th>
                                                        <th id="level_val6"></th>
                                                        <th id="level_val7"></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                              Disease Category Wise Settled Claim Summary (Based on Amount)
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap" style="display: block !important;overflow-x: auto !important;white-space: nowrap !important;">
                                                <thead class="thead-light  font-size-15px">
                                                    <tr style="text-align:center;">
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Disease Category</th>
                                                        <th scope="col" colspan="2">Cashless</th>
                                                        <th scope="col" colspan="2">Reimbursement</th>
                                                        <th scope="col" colspan="2">Total</th>

                                                    </tr>
                                                    <tr>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="disease_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Total</th>
                                                        <th id="disease_val"></th>
                                                        <th id="disease_val1"></th>
                                                        <th id="disease_val2"></th>
                                                        <th id="disease_val3"></th>
                                                        <th id="disease_val4"></th>
                                                        <th id="disease_val5"></th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                Top 20 Hospital Settled Claim Summary (Based on Count)
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row mb-2 mt-2">
                                        <div class="col-12">
                                            <table class="table table-responsive text-nowrap">
                                                <thead class="thead-light font-size-15px">
                                                    <tr>
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Hospital Name with City</th>
                                                        <th scope="col" rowspan="2" style="padding-bottom: 2.5%;">Network Type</th>
                                                        <th scope="col" colspan="2">Cashless</th>
                                                        <th scope="col" colspan="2">Reimbursement</th>
                                                        <th scope="col" colspan="2">Total</th>
                                                    </tr>
                                                    <tr>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                      <td>Paid Claim</td>
                                                      <td>Settled Amount</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="hospital_tbl">
                                                </tbody>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th></th>
                                                        <th>Grand Total</th>
                                                        <th id='hospital_val'></th>
                                                        <th id='hospital_val1'></th>
                                                        <th id='hospital_val2'></th>
                                                        <th id='hospital_val3'></th>
                                                        <th id='hospital_val4'></th>
                                                        <th id='hospital_val5'></th>
                                                        <!-- <th id='out_total_val1'></th> -->
                                                    </tr>
                                                </thead>
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

<script type="text/javascript">
  $(document).ready(function() {
      var policy_id = $('.select_policy option')[1].value;

        getSummary(policy_id);
        getEmployeeSummary(policy_id);
        getClaimStatusSummary(policy_id);
        getSettledAcs(policy_id);
        getAgewiseClaimed(policy_id);
        getTATSummary(policy_id);
        getOutstandingTATSummary(policy_id);
        getRelationwiseClaimed(policy_id);
        getNetworkClaimed(policy_id);
        getAmountBandClaimed(policy_id);
        getLevelCareClaimed(policy_id);
        getDiseaseCategoryClaimed(policy_id);
        geTopHospitalClaimed(policy_id);

        $(document).on('change', '.select_policy', function(){
            var policy_id = $(".select_policy option:selected").val();
            getSummary(policy_id);
            getEmployeeSummary(policy_id);
            getClaimStatusSummary(policy_id);
            getSettledAcs(policy_id);
            getAgewiseClaimed(policy_id);
            getTATSummary(policy_id);
            getOutstandingTATSummary(policy_id);
            getRelationwiseClaimed(policy_id);
            getNetworkClaimed(policy_id);
            getAmountBandClaimed(policy_id);
            getLevelCareClaimed(policy_id);
            getDiseaseCategoryClaimed(policy_id);
            geTopHospitalClaimed(policy_id);
        });
        function getSummary(policy_id) {
            $.ajax({
                url : '<?= site_url("show-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data.policy_text);
                    if(data.policy_text != ''){
                      var html = '';
                      var policy_txt = data.policy_text;
                      html += '<h5 class="policy-name">'+policy_txt.insurer+'</h5>';
                      html += '<div class="policy-tpa">';
                      html += '    <h6>TPA: <span>'+policy_txt.tpa+'</span></h6>';
                      html += '    <h6>Policy No: <span>'+policy_txt.policy_no+'</span></h6>';
                      html += '</div>';
                      html += '<div class="policy-period">';
                      html += '    <h6>Validity: <span>'+policy_txt.policy_start+' - '+policy_txt.policy_end+'</span></h6>';
                      html += '</div>';
                      $('.policy-text').html(html);
                    }
                    $('.inc_permium,.add_permium,.del_permium,.net_permium,.act_permium,.earned_permium,.claimed_permium,.claimed_ratio,.earned_ratio').html('');
                    if(data.premium != ''){
                        var premium = data.premium;
                        $('.inc_permium').html('₹ '+addCommas(premium.first.inception_premium));
                        $('.add_permium').html('₹ '+addCommas(premium.second.addition_premium));
                        $('.del_permium').html('₹ '+addCommas(premium.second.deletion_premium));
                        $('.net_permium').html('₹ '+addCommas(premium.second.total_premium));


                        if(data.earned_premium != ''){
                          $('.earned_permium').html('₹ '+data.earned_premium.toFixed(2));
                          $('.claimed_permium').html('₹ '+addCommas(data.claim_paid_amount.sactioned_amount));
                          $('.claimed_ratio').html(data.claim_ratio.toFixed(2)+' %');
                          $('.earned_ratio').html(data.earned_ratio.toFixed(2)+' %');
                        }else{
                          $('#ratio_tbl').html('<tr><td>No record found...</td></tr>');
                        }

                    }
                    $('.act_permium').html(addCommas(active_lives));

                }
            });
            return false;
        }


        var active_lives ;
        function getEmployeeSummary(policy_id) {
            $.ajax({
                url : '<?= site_url("show-enrollment-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#emp_summary_tbl').html(data.body_html);
                    $('#inception_total').html(data.total_val);
                    $('#addition_total').html(data.total_val1);
                    $('#deletion_total').html(data.total_val2);
                    $('#active_total').html(data.total_val3);
                    active_lives = data.total_val3
                    $('.act_permium').html(active_lives);
                }
            });
            return false;
        }

        function getClaimStatusSummary(policy_id) {
            $.ajax({
                url : '<?= site_url("show-claim-status-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#claim_summary_tbl').html(data.body_html);
                    $('#total_val').html(data.total_val);
                    $('#total_val1').html(data.total_val1);
                    $('#total_val2').html(data.total_val2);
                    $('#total_val3').html(data.total_val3);
                    $('#total_val4').html(data.total_val4);
                    $('#total_val5').html(data.total_val5);
                    $('#total_val6').html(data.total_val6);
                    $('#total_val7').html(data.total_val7);
                    $('#total_val8').html(data.total_val8);

                }
            });
            return false;
        }

        function getSettledAcs(policy_id) {
            $.ajax({
                url : '<?= site_url("show-settled-acs")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#settled_tbl').html(data);
                    // $('#age_total_val').html(data.total_val);
                }
            });
            return false;
        }

        function getAgewiseClaimed(policy_id) {
            $.ajax({
                url : '<?= site_url("show-age-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#age_tbl').html(data.body_html);
                    $('#age_total_val').html(data.total_val);
                    $('#age_total_val1').html(data.total_val1);
                    $('#age_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#age_total_val3').html(data.total_val3 +' %');
                    $('#age_total_val4').html(data.total_val4);
                }
            });
            return false;
        }

        function getTATSummary(policy_id) {
            $.ajax({
                url : '<?= site_url("show-tat-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#tat_tbl').html(data.body_html);
                    $('#tal_total_val').html(data.total_val);
                    $('#tal_total_val1').html(data.total_val1+' %');
                }
            });
            return false;
        }

        function getOutstandingTATSummary(policy_id) {
            $.ajax({
                url : '<?= site_url("show-outstanding-tat-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#out_tbl').html(data.body_html);
                    $('#out_total_val').html(data.total_val);
                    $('#out_total_val1').html(data.total_val1+' %');
                }
            });
            return false;
        }

        function getRelationwiseClaimed(policy_id) {
            $.ajax({
                url : '<?= site_url("show-relation-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#ralation_tbl').html(data.body_html);
                    $('#ralation_total_val').html(data.total_val);
                    $('#ralation_total_val1').html(data.total_val1);
                    $('#ralation_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#ralation_total_val3').html(data.total_val3+' %');
                    $('#ralation_total_val4').html(data.total_val4);
                }
            });
            return false;
        }

        function getNetworkClaimed(policy_id) {
            $.ajax({
                url : '<?= site_url("show-network-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#network_tbl').html(data.body_html);
                    $('#network_total_val').html(data.total_val);
                    $('#network_total_val1').html(data.total_val1);
                    $('#network_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#network_total_val3').html(data.total_val3);
                    $('#network_total_val4').html(data.total_val4+' %');
                }
            });
            return false;
        }

        function getAmountBandClaimed(policy_id) {
            $.ajax({
                url : '<?= site_url("show-amount-band-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#amount_tbl').html(data.body_html);
                    $('#amount_total_val').html(data.total_val);
                    $('#amount_total_val1').html(data.total_val1);
                    $('#amount_total_val2').html('₹ '+data.total_val2+' /-');
                    $('#amount_total_val3').html(data.total_val3+' %');
                    $('#amount_total_val4').html(data.total_val4);
                }
            });
            return false;
        }

        function getLevelCareClaimed(policy_id) {
            $.ajax({
                url : '<?= site_url("show-level-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#level_tbl').html(data.body_html);
                    $('#level_val').html(data.total_val);
                    $('#level_val1').html(data.total_val1);
                    $('#level_val2').html('₹ '+data.total_val2+' /-');
                    $('#level_val3').html(data.total_val3);
                    $('#level_val4').html(data.total_val4);
                    $('#level_val5').html(data.total_val5);
                    $('#level_val6').html('₹ '+data.total_val6+' /-');
                    $('#level_val7').html(data.total_val7);

                }
            });
            return false;
        }

        function getDiseaseCategoryClaimed(policy_id) {
            $.ajax({
                url : '<?= site_url("show-disease-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#disease_tbl').html(data.body_html);
                    $('#disease_val').html(data.total_val);
                    $('#disease_val1').html('₹ '+data.total_val1+' /-');
                    $('#disease_val2').html(data.total_val2);
                    $('#disease_val3').html('₹ '+data.total_val3+' /-');
                    $('#disease_val4').html(data.total_val4);
                    $('#disease_val5').html('₹ '+data.total_val5+' /-');
                }
            });
            return false;
        }

        function geTopHospitalClaimed(policy_id) {
            $.ajax({
                url : '<?= site_url("show-hospital-claim-summary")?>',
                type : 'post',
                data : 'policy_id=' + policy_id,
                dataType: 'json',
                success: function(data){
                    // console.log(data);
                    $('#hospital_tbl').html(data.body_html);
                    $('#hospital_val').html(data.total_val);
                    $('#hospital_val1').html('₹ '+data.total_val1+' /-');
                    $('#hospital_val2').html(data.total_val2);
                    $('#hospital_val3').html('₹ '+data.total_val3+' /-');
                    $('#hospital_val4').html(data.total_val4);
                    $('#hospital_val5').html('₹ '+data.total_val5+' /-');
                }
            });
            return false;
        }


        function addCommas(numberString) {
           numberString += '';
           var x = numberString.split('.'),
               x1 = x[0],
               x2 = x.length > 1 ? '.' + x[1] : '',
               rgxp = /(\d+)(\d{3})/;

           while (rgxp.test(x1)) {
             x1 = x1.replace(rgxp, '$1' + ',' + '$2');
           }

           return x1 + x2;
      }

  });
</script>
