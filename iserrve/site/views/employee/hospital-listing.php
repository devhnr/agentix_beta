<?php include 'includes/header.php';?>

		<section class="first-sec">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 margin-20px-bottom">
							<div class="">
									<h3 class="text-head">
										Cashless Hospitals
									</h3>
									<!-- <a href="#" class="btn-back"><i class="feather icon-feather-chevrons-left"></i> Back</a> -->
								</div>
					</div>
					<div class="col-lg-6 text-right">
						<select class="policy-select select_policy">
							<option value="">--Select Policy--</option>
								<?php if(!empty($policy)){foreach($policy as $s) {?>
								<option value="<?=$s->policy_id?>"><?=$s->policy_no?></option>
								<?php } }?>
						</select>
						<p class="errors" id="name_err" style="color:red; font-size:15px;"></p>
					</div>
					<div class="col-lg-12">
						<form action="" class="v-form claim">
								<input type="hidden" name="filterBy" id="filterBy" value="">
										<div class="row margin-20px-bottom">
											<div class="col-lg-3">
												<label class="select" for="slct">
													<span class="disabled-label">Search Hospital</span>
													<input type="text" name="" id="hospital_search" value="">
												</label>
											</div>
									<div class="col-lg-3">
												<label class="select" for="slct">
													<span>Select State</span>
													<i class="feather icon-feather-chevron-down"></i>
												<select id="state_search" required="required">
													<option value="" selected readonly>--Select State--</option>
													<?php foreach($state as $s) { ?>
											    <option value="<?=$s['state']?>"><?=$s['state']?></option>
												  <?php } ?>
									  </select>
									  </label>
									</div>
									<div class="col-lg-3">
												<label class="select" for="slct">
													<span>Select City</span>
													<i class="feather icon-feather-chevron-down"></i>
												<select id="city_search" required="required">
														<option value="" selected readonly>--Select City--</option>
														<?php foreach($city as $s) { ?>
												    <option value="<?=$s['city']?>"><?=$s['city']?></option>
													  <?php } ?>
									  		</select>

									  </label>
									</div>

									<div class="col-lg-3">
												<label class="select" for="slct">
													<span class="disabled-label">Pincode</span>
													<input type="tel" name="pincode" id="pincode" value="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6">
												</label>
									</div>
									<div class="col-lg-12 text-center margin-20px-bottom">
										<button type="button" class="v-theme-btn d-inline-block margin-20px-bottom" id="searchBTN">Search</button>

										<button type="button" class="v-theme-btn d-inline-block bg-black margin-20px-bottom" id="resetBTN">Reset</button>
										<button type="button" class="v-theme-btn d-inline-block bg-aqua margin-20px-bottom" id="downloadBTN">Download</button>
									</div>
								<hr>

								</div>

								<div class="row margin-20px-bottom">
									<div class="col-lg-12">
										<div class="table-responsive">
										<table id="cashless_hosp" data-page-length="50" style="width: 100%;">
											<thead>
												<tr>
													<th>Sr No.</th>
													<th>Hospital Name</th>
													<th width="400px">Address</th>
													<th>Contact No</th>
													<th>Landmark</th>
													<th>City</th>
													<th>State</th>
													<th>Pincode</th>
												</tr>
											</thead>
											<tbody id="cash_dat">
											</tbody>
										</table>
									</div>
									</div>


								</div>
								</form>



					</div>

				</div>
			</div>
		</section>

<?php include 'includes/footer.php';?>
