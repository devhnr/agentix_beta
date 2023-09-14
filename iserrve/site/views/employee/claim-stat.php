<?php include 'includes/header.php';?>

<section class="first-sec">
    <div class="container">
        <div class="col-lg-12 margin-20px-bottom">
            <div class="text-center">
                <h3 class="text-head">
                    Claim Status
                </h3>
                <!-- <a href="#" class="btn-back"><i class="feather icon-feather-chevrons-left"></i> Back</a> -->
            </div>
        </div>
        <!-- <div class="col-lg-6 text-right">
					<select class="policy-select" name="" id="">
                                <option value="">Select Policy</option>
                                <option value="">Group Cyber Insurance</option>
                                <option value="">Group Life Insurance</option>
                            </select>
					</div> -->
        <div class="row justify-content-center">
            <div class="col-lg-9">
								<?php if(!empty($claims)){ foreach( $claims as $c){?>
                <div class="v-accordion-sec claim-status-sec">
                    <div class="vaccordion">
                        <div class="v-accordion-head">
                            <h6>
                                <?=ucwords(strtolower($c['employee_name']))?><span>- <i><?=$c['tpa_claim_no']?></i></span>
                            </h6>
                        </div>
                    </div>
                    <div class="v-panel">
                        <div class="panel-inner">
                            <div class="claim-stat-contain">
                                <div class="claim-stat-flex">
                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
																					Patient name
																				</h6>
                                        <p class="claim-data">
																					<?=ucwords(strtolower($c['patient_name']))?>
																				</p>
                                    </div>

                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
                                            Intimation Date
                                        </h6>

                                        <p class="claim-data">
																					<?=$c['intimated_date']?>
                                        </p>
                                    </div>
                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
                                            Hospital name
                                        </h6>

                                        <p class="claim-data">
                                            <?=ucwords(strtolower($c['hospital_name']))?>
                                        </p>
                                    </div>
                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
                                            Admission Date
                                        </h6>

                                        <p class="claim-data">
                                            <?=$c['hospitliz_date']?>
                                        </p>
                                    </div>
                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
                                            Claim No.
                                        </h6>

                                        <p class="claim-data">
                                            <?=$c['insurance_claim_no']?>
                                        </p>
                                    </div>
                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
                                            System No.
                                        </h6>

                                        <p class="claim-data">
                                            MD-22519
                                        </p>
                                    </div>
                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
                                            Claim Status
                                        </h6>
																				<?php
																				$binds = array('Repudiated','Rejected','Denied','Closed');
																        $check = $c['claim_status'];
																        if (in_array($check, $binds)) { ?>
                                        <!-- <p class="claim-data">
                                            <span class="claim-stat-flag claim-stat-failed">Failed</span>
                                        </p> -->
																			<?php }else{ ?>
																				<!-- <p class="claim-data">
                                            <span class="claim-stat-flag claim-stat-success">Success</span>
                                        </p> -->
																			<?php } ?>

                                        <p><?=$c['claim_status']?></p>
                                    </div>
                                    <div class="claim-data-box">
                                        <h6 class="claim-heading">
                                            Latest Updated Date
                                        </h6>

                                        <p class="claim-data">
                                            <?=$c['created_date']?>
                                        </p>
                                    </div>
                                </div>
                                <div class="claim-stat-cta">
                                     <a class="claim-btn1 detailBTN v-md-btn" data-id="<?=base64_encode($c['id'])?>" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                          More Details
                                     </a>
                                     <!-- <a href="#" class="claim-stat-btn">
                                        <h6><span><i class="feather icon-feather-phone"></i></h6>
                                        <span>Get Assistance?</span>
                                     </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
							<?php } }?>
            </div>
            <!-- <div class="col-lg-3">
                <div class="ad-area">
                    <img src="<?=base_url('assets/')?>employee_assets/img/ad-health.png" alt="" />
                </div>
            </div> -->
        </div>
    </div>
</section>

<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4>Track Claim Status</h4>
            </div>
            <div class="modal-body claim-table">
                <table class="table table-striped w-100 claim-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody id="html_track_status">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php';?>
