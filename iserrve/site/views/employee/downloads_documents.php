<?php include 'includes/header.php';?>

<section class="first-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 margin-20px-bottom">
                <div class="text-center">
                    <h3 class="text-head">
                        Downloadables
                    </h3>
                    <!-- <a href="#" class="btn-back"><i class="feather icon-feather-chevrons-left"></i> Back</a> -->
                </div>
            </div>
            <div class="col-lg-9">
                <form action="" class="v-form claim">
                    <div class="row">
                        <div class="col-lg-9">
                            <label class="select" for="slct">
                                <span>Select Policy</span>
                                <i class="feather icon-feather-chevron-down"></i>
                                <select id="slct_policy_1" required="required">
																		<option value="">--Select Policy--</option>
																		<?php if(!empty($policy)){foreach($policy as $s) {?>
																		<option value="<?=$s->policy_id?>"><?=$s->policy_no?></option>
																		<?php } }?>
                                </select>
                            </label>
                        </div>
                        <div class="col-lg-3 text-center">
                            <button type="submit" class="v-theme-btn">Search</button>
                        </div>
                    </div>
                    <hr />
                    <div class="row margin-20px-bottom docm1">
												<?php if(!empty($doc)){ foreach ($doc as $d) { ?>
													<div class="col-lg-6 margin-20px-bottom">
	                            <a href="<?=base_url()?>upload/utilities/<?=$d['document']?>" target="_blank">
	                                <div class="download-sec">
	                                    <div class="download-ico">
	                                        <i class="feather icon-feather-file-text"></i>
	                                    </div>
	                                    <div class="download-cont">
	                                        <h6><?=$d['name']?></h6>
	                                        <span><i>Format:
																									<?php $info = new SplFileInfo($d['document']);
																									echo strtoupper($info->getExtension()); ?>
																								</i>
																					</span>
	                                    </div>
	                                    <div class="download-btn">
	                                        <i class="feather icon-feather-download"></i>
	                                    </div>
																	</div>
	                            </a>
	                        </div>
											<?php	}}else{ echo 'No records found';} ?>

                    </div>
                </form>
            </div>
            <!-- <div class="col-lg-3">
                <div class="ad-area">
                    <img src="<?=base_url('assets/')?>employee_assets/img/ad-life.png" alt="" />
                </div>
            </div> -->
        </div>
    </div>
</section>

<?php include 'includes/footer.php';?>
