<?php include 'includes/header.php';?>

<style>

.member-col.flex-auto.mem-name {
    width: 70%;
}

.member-col.mem-date {
    width: 10%;
}
	</style>

	<section class="pb-0 first-sec">
		<div class="container">
			<div class="row">
				<div class="col-lg-12  marginb">
					<h1 class="alt-font ">Edit <span class="text-aqua">Policies</span></h1>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">

				<div class="row">
					<aside class="policy-main">
						<div class="policy-por-card">
							<div class="pdp-sign">
								<div class="dot-cir">
								</div>
								<span>Activated</span>
							</div>
							<div class="policy-por-flex">
								<div class="cdp-pol-ico policy-por-ico">
									<i class="fas fa-building"></i>
								</div>
								<div class="policy-por-name">
										<h6><?=$policy_data['insurer']?></h6>
										<span><?=$policy_data['product_name']?></span>
								</div>
							</div>

							<div class="policy-por-det">
								<div class="policycol">
									<span>Policy No</span>
									<h6><?=$policy_data['policy_no']?></h6>
								</div>
								<div class="policycol">
									<span>TPA</span>
									<h6><?=$policy_data['tpa']?></h6>
								</div>
								<div class="policycol">
									<span>Policy Period</span>
									<h6><?=date('d M Y',strtotime($policy_data['policy_start_date']))?> - <?=date('d M Y',strtotime($policy_data['policy_end_date']))?></h6>
								</div>
								<?php if(date('Y-m-d',strtotime($policy_data['policy_start_date'])) < date('Y-m-d',strtotime($this->session->userdata('join_date')))){ ?>
								<div class="policycol">
									<span>Effective Risk Start Date</span>
									<h6><?=date('d M Y',strtotime($this->session->userdata('join_date')))?></h6>
 								</div>
								<?php } ?>
								<div class="policycol">
									<?php $SumInsured = $this->em->getSumInsured($policy_members[0]['sum_insured']);?>
									<span>Sum Insured</span>
									<h6>₹ <?=number_format($SumInsured, 2)?> </h6>
								</div>

							</div>
							<div class="claim-por-btn">
								<a href="<?=base_url()?>employee/claim_form">Intimate Claim</a>
							</div>

						</div>
					</aside>

					<!--Right Side -->
					<div class="policy-main-det">


						<div class="v-accordion-sec" style="display:none;">
							<div class="vaccordion ">

								<div class="v-accordion-head"><h6>Premium Details</h6></div>
							</div>
							<div class="v-panel">
								<div class="panel-inner">
									<div class="insur-payment-det">
										<div class="payment-sec ">
											<p class="m-0">Premium for <?=count($policy_members)?> Members</p>

										</div>

										<div class="payment-sec ">
											<h6><span>₹ </span><span class="rate">15000</span> <span class="rate-duration">/year</span></h6>
										</div>

							 		 </div>
								</div>

							</div>
						</div>

						<div class="v-accordion-sec">
							<div class="vaccordion ">
							<input type='hidden' name="hr_email" id="hr_email1" value="<?=$policy_data['hr_email']?>"/>
						<div class="v-accordion-head d-lg-flex align-items-center justify-content-between">
							<h6>Members Detail</h6>
							<div class="btn-combine">
							<!-- <a href="#addreqmember" data-bs-toggle="modal" data-bs-target="#addreqmember" class="btn addmembtn">Add / Delete Member</a> -->

							<?php if(!empty($e_card)){?>
							
							<?php echo $e_card?>
						<?php } ?>
					</div>
						</div>
					</div>
						<div class="v-panel">
							 <div class="panel-inner p-0">
							 	<div class="member-sec">
							 		<!-- <div class="member-det-flex">
							 			<div class="member-col">
							 				<i class="feather icon-feather-user"></i>
							 			</div>
							 			<div class="member-col flex-auto">
							 				<div class="member-name">
							 					<h6>Yatrik Kubadia</h6>
							 				</div>
							 			</div>

							 			<div class="member-col">
							 				<div class="member-id">
							 					<h6>Employee</h6>
							 				</div>
							 			</div>

							 			<div class="member-col">
							 				<div class="member-dob">
							 					<h6>28/12/1995</h6>
							 				</div>
							 			</div>

							 			<div class="member-col">
							 				<div class="member-edit">
							 					<div class="download-insur">
							 						<a href="#" class="v-tooltip"><i class="feather icon-feather-download-cloud"></i>
							 							<span class="v-tooltiptext">Download Documents</span>
							 						</a>
							 					</div>

							 					<div class="download-insur">
							 						<a href="#" data-bs-toggle="modal" data-bs-target="#editmember" class="v-tooltip">
														<i class="feather icon-feather-edit"></i>
							 							<span class="v-tooltiptext">Edit</span>
							 						</a>

							 					</div>
							 				</div>
							 			</div>
							 		</div> -->
									<?php $i=1; if(!empty($policy_members)){ foreach ($policy_members as $value){
										?>
							 		<div class="member-det-flex <?php echo ($i % 2 == 0) ? "bg-light" : ""?>">
							 			<div class="member-col">
							 				<i class="feather icon-feather-users"></i>
							 			</div>
							 			<div class="member-col flex-auto">
							 				<div class="member-name mem-name">
							 					<h6><?=$value['MemberName']?></h6>
							 				</div>
							 			</div>


							 			<div class="member-col employ-stat">
							 				<div class="member-id">
							 					<h6><?=$value['Relation']?></h6>
							 				</div>
							 			</div>

							 			<div class="member-col mem-date">
							 				<div class="member-dob">
							 					<h6><?=date('d/m/Y',strtotime($value['DateOfBirth']))?></h6>
							 				</div>
							 			</div>

							 			<div class="member-col">
							 				<div class="member-edit">
							 					<!--<div class="download-insur">
							 						<a href="<?=$value['e_card']?>" target="_blank" class="v-tooltip pdf_download"><i class="feather icon-feather-download-cloud"></i>
							 							<span class="v-tooltiptext">Download Documents</span>
							 						</a>
							 					</div>-->

							 					<div class="download-insur">
							 						<!-- <a href="#" class="v-tooltip getEmp" data-name="<?=$value['MemberName']?>" data-contact="<?=$value['mobile_no']?>" data-email="<?=$value['email']?>"><i class="feather icon-feather-edit"></i>
							 							<span class="v-tooltiptext">Edit</span>
							 						</a> -->
							 					</div>
							 				</div>
							 			</div>
							 		</div>
									<?php $i++;} } ?>
							 		<!-- <div class="member-det-flex">
							 			<div class="member-col">
							 				<i class="feather icon-feather-users"></i>
							 			</div>
							 			<div class="member-col flex-auto">
							 				<div class="member-name">
							 					<h6>Yatrik Kubadia</h6>
							 				</div>
							 			</div>

							 			<div class="member-col">
							 				<div class="member-id">
							 					<h6>Employee</h6>
							 				</div>
							 			</div>

							 			<div class="member-col">
							 				<div class="member-dob">
							 					<h6>26/12/1995</h6>
							 				</div>
							 			</div>

							 			<div class="member-col">
							 				<div class="member-edit">
							 					<div class="download-insur">
							 						<a href="#" class="v-tooltip"><i class="feather icon-feather-download-cloud"></i>
							 							<span class="v-tooltiptext">Download Documents</span>
							 						</a>
							 					</div>

							 					<div class="download-insur">
							 						<a href="#" data-bs-toggle="modal" data-bs-target="#editmember" class="v-tooltip">
														<i class="feather icon-feather-edit	"></i>
							 							<span class="v-tooltiptext">Edit</span>
							 						</a>
							 					</div>
							 				</div>
							 			</div>
							 		</div> -->
							 		<!--<div class="add-cta-men">
							 			<a href="#">+ Add Member</a>
							 		</div>-->
							 	</div>
							 </div>
						</div>
						</div>

						<div class="v-accordion-sec">
							<div class="vaccordion ">

								<div class="v-accordion-head"><h6>Included Features</h6></div>
							</div>
							<div class="v-panel">
								 <div class="panel-inner">
								 	<div class="row align-items-center ">
											
									 		<div class="col-lg-12">
											 
												<div class="det-feature">
												<?php if(!empty($policy_features)){ foreach ($policy_features as $p) { ?>
													<div class="det-feature-sec">
																<div class="det-feature-box">
																		<h6><?=$p['label_name']?></h6>
																		
																		
																</div>
																<div class="det-feature-desc">
																<?php if(!empty($p['addition'])) {
																							$result = $this->em->get_sub_policy_features_attribute($p['field_id']);

																								foreach ($p['addition'] as $key => $sub) {
																										$p['addition'][$key]['value'] =  $result[$key]['field_type']; ?>
																									<div class="d-flex align-items-center">
																										<div class="flex-col">
																										<h6 class="addition-heading"><?=$p['addition'][$key]['label_name']?>: <span class="addition-value"><?=$p['addition'][$key]['value']?></span></h6>
																										
																										</div>
																									</div>
																										

																		<?php } } ?>
																<p><?=$p['field_type']?></p>
																</div>
														</div>
													<?php } 
													
													if($other_benefit->inclusions != ''){
													?>

														<div class="det-feature-sec">
																<div class="det-feature-box">
																		<h6>Other Benefits</h6>
																		
																		
																</div>
																<div class="det-feature-desc">
																
																							
																<p><? echo $other_benefit->inclusions?></p>
																</div>
																</div>
													<? } } ?>
													
													</div>
													
									 		</div>
										
								 	</div>

								 </div>
							</div>
						</div>
						<!-- <div class="v-accordion-sec">
							<div class="vaccordion ">

								<div class="v-accordion-head"><h6>Excluded Features</h6></div>
							</div>
							<div class="v-panel">
								 <div class="panel-inner">
								 	<div class="row align-items-center ">
								 		<div class="col-lg-12">
								 			<div class="det-feature-sec">
								 	
								 		<div class="det-feature-desc">
								 			<p><?=$policy_data['exclusions']?></p>
								 		</div>

								 	</div>
								 		</div>

								 	</div>

								 </div>
							</div>
						</div> -->








					</div>

				</div>



		</div>
	</section>
<div class="modal fade" id="addreqmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-body">
		  <form class="v-form add-request" action="" method="post">
			  <div class="modal-contain">
			  <div class="row align-items-center">


				  <div class="col-10 mb-4 ">
					  <h5>Add or Delete request</h5>

				  </div>
				  <div class="col-2">
					   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
					<div class="col-lg-12">
           <label class="select" for="slct">
             <span class="disabled-label">Your Name *</span>
             <input type="text" name="name" class="custominput2" id="add_name" placeholder="Enter Name" >
             <p class="error m-0" id="name2_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
            <label class="select" for="slct">
             <span class="disabled-label">Your Email Address *</span>
             <input type="text" name="email" class="custominput2" id="add_email" placeholder="Enter Email" >
             <p class="error m-0" id="email2_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
             <label class="select" for="slct">
             <span class="disabled-label">Your Phone Number *</span>
             <input type="tel" name="contact_no" class="custominput2" id="add_phone" placeholder="Enter Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
             <p class="error m-0" id="phone2_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
            <label class="select" for="slct">
              <span class="disabled-label">Request *</span>
              <textarea name="request" id="add_request" class="custominput2" cols="30" rows="4"></textarea>
              <p class="error m-0" id="request2_err"></p>
            </label>
          </div>
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary w-100" id="btnAddRequest">Send Request</button>
          </div>

			</div>
				  </div>
		  </form>
      </div>
    </div>
  </div>
</div>

<!-- Prevention Modal -->
<div class="modal fade" id="editmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-body">
		  <form class="v-form edit-request" action="" method="post">
			  <div class="modal-contain">
			  <div class="row align-items-center">
				  <div class="col-10 mb-4 ">
					  <h5>Edit request</h5>
				  </div>
				  <div class="col-2">
					   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
					<div class="col-lg-12">
					 <label class="select" for="slct">
					   <span class="disabled-label">Your Name *</span>
					   <input type="text" name="name" class="custominput3" id="update_name" placeholder="Enter Name" >
					   <p class="error m-0" id="name3_err"></p>
					  </label>
					</div>
					<div class="col-lg-12">
					  <label class="select" for="slct">
					   <span class="disabled-label">Your Email Address *</span>
					   <input type="text" name="email" class="custominput3" id="update_email" placeholder="Enter Email" >
					   <p class="error m-0" id="email3_err"></p>
					  </label>
					</div>
					<div class="col-lg-12">
					   <label class="select" for="slct">
					   <span class="disabled-label">Your Phone Number *</span>
					   <input type="tel" name="contact_no" class="custominput3" id="update_phone" placeholder="Enter Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10">
					   <p class="error m-0" id="phone3_err"></p>
					  </label>
					</div>
					<div class="col-lg-12">
					  <label class="select" for="slct">
					    <span class="disabled-label">Request *</span>
					    <textarea name="request" id="update_request" class="custominput3" cols="30" rows="4"></textarea>
					    <p class="error m-0" id="request3_err"></p>
					  </label>
					</div>
					<div class="col-lg-12">
					  <button type="submit" class="btn btn-primary w-100" id="btnUpdateRequest">Send Request</button>
					</div>

			</div>
				  </div>
		  </form>
      </div>
    </div>
  </div>
</div>

<!----->




<?php include 'includes/footer.php';?>
<script>
    $(document).on("click", "#btnAddRequest", function () {
        var url = "<?=base_url()?>employee/add_request";
        var name = $("#add_name").val();
        var email = $("#add_email").val();
        var mobile = $("#add_phone").val();
        var request = $("#add_request").val();
				var hr_email = $("#hr_email1").val();
        if (name == "") {
            $("#name2_err").html("Please enter your name").show();
            return false;
        }
        if (email == "") {
            $("#email2_err").html("Please enter your email").show();
            return false;
        }
        if (IsEmail(email) == false) {
            $("#email2_err").html("Please enter valid email").show();
            return false;
        }
        if (mobile == "") {
            $("#phone2_err").html("Please enter your mobile no").show();
            return false;
        }
        if (mobile.length != 10) {
            $("#phone2_err").html("Please enter correct mobile no").show();
            return false;
        }
        if (request == "") {
            $("#request2_err").html("Please enter your request").show();
            return false;
        }
        $.ajax({
            url: url,
            type: "post",
            data: "name=" + name + "&email=" + email + "&contact_no=" + mobile + "&request=" + request + "&hr_email=" + hr_email,
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response == "success") {
                    $("#addreqmember").modal("hide");
                    $(".add-request")[0].reset();
                    swal({
                        title: "Success!",
                        text: "Your request has been shared with the HR team and will be updated once it is approved by them",
                        icon: "success",
                        buttons: false,
                        //timer: 1800,
                    });
                    setTimeout(function () {
                        location.reload();
                    }, 1800);
                }
            },
        });
        return false;
    });

    $(".custominput2").bind("change", function () {
				var name = $("#add_name").val();
				var email = $("#add_email").val();
				var mobile = $("#add_phone").val();
				var request = $("#add_request").val();
				if (name == "") {
						$("#name2_err").html("Please enter your name").show();
						return false;
				} else {
            $("#name2_err").html("").show();
        }
        if (email == "") {
            $("#email2_err").html("Please enter your email").show();
            return false;
        } else {
            $("#email2_err").html("").show();
        }
        if (IsEmail(email) == false) {
            $("#email2_err").html("Please enter valid email").show();
            return false;
        } else {
            $("#email2_err").html("").show();
        }
        if (mobile == "") {
            $("#phone2_err").html("Please enter your mobile no").show();
            return false;
        } else {
            $("#phone2_err").html("").show();
        }
        if (mobile.length != 10) {
            $("#phone2_err").html("Please enter correct mobile no").show();
            return false;
        } else {
            $("#phone2_err").html("").show();
        }
        if (request == "") {
            $("#request2_err").html("Please enter your request").show();
            return false;
        } else {
            $("#request2_err").html("").show();
        }

    });

		$(document).on("click", ".getEmp", function () {
				$("#editmember").modal('show');
				$('#update_name').val($(this).data('name'));
				$('#update_email').val($(this).data('email'));
				$('#update_phone').val($(this).data('contact'));
		});

		$(document).on("click", "#btnUpdateRequest", function () {
		    var url = "<?=base_url()?>employee/update_request";
		    var name = $("#update_name").val();
		    var email = $("#update_email").val();
		    var mobile = $("#update_phone").val();
		    var request = $("#update_request").val();
				var hr_email = $("#hr_email1").val();
		    if (name == "") {
		        $("#name3_err").html("Please enter your name").show();
		        return false;
		    }
		    if (email == "") {
		        $("#email3_err").html("Please enter your email").show();
		        return false;
		    }
		    if (IsEmail(email) == false) {
		        $("#email3_err").html("Please enter valid email").show();
		        return false;
		    }
		    if (mobile == "") {
		        $("#phone3_err").html("Please enter your mobile no").show();
		        return false;
		    }
		    if (mobile.length != 10) {
		        $("#phone3_err").html("Please enter correct mobile no").show();
		        return false;
		    }
		    if (request == "") {
		        $("#request3_err").html("Please enter your request").show();
		        return false;
		    }
		    $.ajax({
		        url: url,
		        type: "post",
		        data: "name=" + name + "&email=" + email + "&contact_no=" + mobile + "&request=" + request + "&hr_email=" + hr_email,
		        dataType: "json",
		        success: function (response) {
		            console.log(response);
		            if (response == "success") {
		                $("#editmember").modal("hide");
		                $(".edit-request")[0].reset();
		                swal({
		                    title: "Success!",
		                    text: "Your request has been shared with the HR team and will be updated once it is approved by them",
		                    icon: "success",
		                    buttons: false,
		                    //timer: 1800,
		                });
		                setTimeout(function () {
		                    location.reload();
		                }, 1800);
		            }
		        },
		    });
		    return false;
		});

		$(".custominput3").bind("change", function () {
		    var name = $("#update_name").val();
		    var email = $("#update_email").val();
		    var mobile = $("#update_phone").val();
		    var request = $("#update_request").val();
		    if (name == "") {
		        $("#name3_err").html("Please enter your name").show();
		        return false;
		    } else {
		        $("#name3_err").html("").show();
		    }
		    if (email == "") {
		        $("#email3_err").html("Please enter your email").show();
		        return false;
		    } else {
		        $("#email3_err").html("").show();
		    }
		    if (IsEmail(email) == false) {
		        $("#email3_err").html("Please enter valid email").show();
		        return false;
		    } else {
		        $("#email3_err").html("").show();
		    }
		    if (mobile == "") {
		        $("#phone3_err").html("Please enter your mobile no").show();
		        return false;
		    } else {
		        $("#phone3_err").html("").show();
		    }
		    if (mobile.length != 10) {
		        $("#phone3_err").html("Please enter correct mobile no").show();
		        return false;
		    } else {
		        $("#phone3_err").html("").show();
		    }
		    if (request == "") {
		        $("#request3_err").html("Please enter your request").show();
		        return false;
		    } else {
		        $("#request3_err").html("").show();
		    }

		});

    $("#add_name").on("keypress", function () {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            return false;
        }
    });

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }
	
	$(document).on('click', '.download_ecard', function(){
            var policy_id = $(this).data('policy_id');
            var employee_no  = $(this).data('id');
			/* alert(policy_id);
			alert(employee_no); */
			
            $.ajax({
                url : '<?= base_url()?>employee/download_ecard',
                type : 'post',
                data : 'policy_id=' + policy_id + '&employee_no=' +employee_no,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    if(data.filename  != ''){
                      if(data.api == 'yes'){
                          window.open(data.file, '_blank');
                      }else{
                        var $a = $("<a>");
                        $a.attr("href",data.file);
                        $("body").append($a);
                        $a.attr("download",data.filename);
                        $a[0].click();
                        $a.remove();
                      }
                    }
                    
                    
                }
            });
            return false;
        });
</script>
