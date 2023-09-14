<?php include 'includes/header.php';?>
<style>
    .member-sec {
        display: flex;
        align-items: center;
        margin-left: 15px;
    }

    .member {
        margin-right: -10px;
    }

    .member.more-mem {
        margin-right: 0;
        margin-left: 15px;
        font-size: 13px;
        font-weight: bold;
    }

    .member.more-mem span {
        font-weight: 600;
    }

    .member {
        margin-right: -7px;
    }

    .member img {
        width: 45px;
    }

    .emp-link2 {
        background: var(--firstcolor);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-bottom: 20px;
        box-shadow: 0px 11px 20px 1px rgb(0 0 0 / 12%);
        position: absolute;
        bottom: -6px;
        left: 44%;
        z-index: 100;
        color: #fff;
    }

    .modal-contain {
        padding: 30px;
    }

    .ep-name p {
        white-space: normal;
        text-align: left;
        margin-top: 10px;
        color: #606060;
        font-size: 13px;
    }
</style>
<section class="p-0 first-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="welcome-text text-center">
                    <?php
                        $corp_data = $this->em->get_corp_id_using_group_code($this->session->userdata('group_code'));

                        //echo "<pre>";print_r($corp_data);
                    ?>
                    <h4>
                        <span class="text-aqua"><?=$corp_data->co_name;?></span>
                    </h4>
                    <h4>
                        Welcome <span class="text-aqua"><?=$this->session->userdata('name')?></span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-20px-bottom">
                <h5 class="v-title-new">Your <span class="text-aqua">Policies</span></h5>
            </div>
        </div>
        <div class="row align-items-center ">
							<?php if(!empty($emp)){ foreach ($emp as $e){
								$policy_no = $e['policy_id'];
								$policy_data = $this->em->getPolicyData($policy_no);
                if($policy_data['policy_end_date'] > date('Y-m-d')){
  								$policy_members= $this->em->get_policy_members($policy_no);
                }else{
                  $policy_members= '';
                }
							?>
            <div class="col-lg-5 col-md-8 policyd" data-id="<?=base64_encode($policy_no)?>">
                <a href="<?=base_url()?>employee/policy_details?pid=<?=rand(23423, 11411).base64_encode($policy_no)?>">
                    <div class="v-policy-card active-policy">
                        <div class="cdp-det-main">
                            <div class="cdp-sec-name">
                                <div class="cdp-pol-ico">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="cdp-pol-name">
                                    <h5><?=$policy_data['insurer']?></h5>
                                </div>
                            </div>
                            <div class="cdp-sign">
                                <div class="dot-cir"></div>
                                <span>Activated</span>
                            </div>
                            <div class="cdp-no">
                                <span class="text-para margin-10px-bottom"><?=$policy_data['product_name']?></span>
                                <h6 class="m-0">
                                    Policy No: <span><?=$policy_data['policy_no']?></span>
                                </h6>
                                <h6 class="mt-3 <?php if($policy_data['tpa'] == 'Health India Insurance TPA Services Private Limited'){ echo 'tpa_service';}else{echo '';}?>">
                                    TPA: <span><?=$policy_data['tpa']?></span>
                                </h6>
                            </div>
                            <div class="cdp-foot">
                                <div class="cdp-dates">
                                    <div class="cdp-dates-flex">
                                        <span>Start Date</span>
                                        <span><?=date('d-m-Y',strtotime($policy_data['policy_start_date']))?></span>
                                    </div>
                                    <div class="cdp-dates-flex">
                                        <span>End Date</span>
                                        <span><?=date('d-m-Y',strtotime($policy_data['policy_end_date']))?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="cdp-tpa-flex">
                                 <div class="member-sec">
                                    <?php if(!empty($policy_members)){ foreach ($policy_members as $value){?>
                                    <?php if($value['Relation'] == 'Employee' || $value['Relation'] == 'Self'){?>
                                    <div class="member member1">
                                        <img src="<?=base_url('assets/employee_assets/')?>img/mem1.png" />
                                    </div>
                                    <?php } ?>
                                    <?php if($value['Relation'] == 'Wife'){?>
                                    <div class="member member1">
                                        <img src="<?=base_url('assets/employee_assets/')?>img/mem2.png" />
                                    </div>
                                    <?php  break;} ?>
                                    <?php if($value['Relation'] == 'Daughter' || $value['Relation'] == 'Son'){?>
                                    <div class="member member1">
                                        <img src="<?=base_url('assets/employee_assets/')?>img/mem3.png" />
                                    </div>
                                    <?php } ?>
                                    <?php } }?>
                                    <?php if(count($policy_members) > 3){?>
                                    <div class="member more-mem">
                                        <span>+<?=count($policy_members) - 3?></span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
					<?php } }?>
        </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-20px-bottom">
                <h5 class="v-title-new">Iserrve <span class="text-aqua">Assessment</span></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-assess">
                    <div>
                        <a href="https://www.raghnall.co.in/cyber_insurance" target="_blank" class="assess-banner">
                            <img src="<?=base_url('assets/employee_assets/')?>img/assess1.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
                            <img src="<?=base_url('assets/employee_assets/')?>img/assess2.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
                            <img src="<?=base_url('assets/employee_assets/')?>img/assess3.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#assessment">
                            <img src="<?=base_url('assets/employee_assets/')?>img/assess4.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-20px-bottom">
                <h5 class="v-title-new">Iserrve <span class="text-aqua">Protection</span></h5>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="empprod-scroll">
            <div class="scroll-link">
                <a href="#" data-bs-toggle="modal" data-bs-target="#products">
                    <div class="empprod-dec prodgrad-blue">
                        <div class="emp-prod">
                            <div class="ep-name">
                                <h6>Group Personal Accident</h6>
                                <p>Coverage against accidental injuries</p>
                            </div>

                            <div class="emp-link">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </div>
                        <div class="ep-img">
                            <img src="<?=base_url('assets/employee_assets/')?>img/life-insurance.png" alt="" data-no-retina="" />
                        </div>
                    </div>
                </a>
            </div>

            <div class="scroll-link">
                <a href="#" data-bs-toggle="modal" data-bs-target="#products">
                    <div class="empprod-dec prodgrad-pink">
                        <div class="emp-prod">
                            <div class="ep-name">
                                <h6>Group Cyber Insurance</h6>
                                <p>Financial protection against cyber frauds</p>
                            </div>

                            <div class="emp-link">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </div>
                        <div class="ep-img">
                            <img src="<?=base_url('assets/employee_assets/')?>img/cyber-insurance.png" alt="" data-no-retina="" />
                        </div>
                    </div>
                </a>
            </div>

            <div class="scroll-link">
                <a href="#" data-bs-toggle="modal" data-bs-target="#products">
                    <div class="empprod-dec prodgrad-yellow">
                        <div class="emp-prod">
                            <div class="ep-name">
                                <h6>Group Personal Accident</h6>
                                <p>Coverage against accidental injuries</p>
                            </div>

                            <div class="emp-link">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </div>
                        <div class="ep-img">
                            <img src="<?=base_url('assets/employee_assets/')?>img/critical.png" alt="" data-no-retina="" />
                        </div>
                    </div>
                </a>
            </div>

            <div class="scroll-link">
                <a href="#" data-bs-toggle="modal" data-bs-target="#products">
                    <div class="empprod-dec prodgrad-green">
                        <div class="emp-prod">
                            <div class="ep-name">
                                <h6>Group Personal Accident</h6>
                                <p>Coverage against accidental injuries</p>
                            </div>

                            <div class="emp-link">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </div>
                        <div class="ep-img">
                            <img src="<?=base_url('assets/employee_assets/')?>img/accident.png" alt="" data-no-retina="" />
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- data-slick='{"slidesToShow": 4, "slidesToScroll": 4}' -->

<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-20px-bottom">
                <h5 class="v-title-new">Iserrve <span class="text-aqua">Prevention</span></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="slick-assess">
                    <div>
                        <a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
                            <img src="<?=base_url('assets/employee_assets/')?>img/prev1.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
                            <img src="<?=base_url('assets/employee_assets/')?>img/prev2.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
                            <img src="<?=base_url('assets/employee_assets/')?>img/prev3.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="#" class="assess-banner" data-bs-toggle="modal" data-bs-target="#prevention">
                            <img src="<?=base_url('assets/employee_assets/')?>img/prev4.jpg" alt="" />
                            <div class="emp-link2">
                                <i class="feather icon-feather-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Assessment Modal -->
<div class="modal fade" id="assessment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="v-form form-assessment" method="post" action="">
                    <div class="modal-contain">
                        <div class="row align-items-center">
                            <div class="col-lg-12 mb-4 text-center">
                                <h5>Assessment form</h5>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Name *</span>
                                    <input type="text" class="custominput" name="name" placeholder="Enter Name" id="assessment_name" onkeypress="return onlyAlphabets(event,this);" />
                                    <p class="error m-0" id="name_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Email Address *</span>
                                    <input type="text" class="custominput" name="email" placeholder="Enter Name" id="assessment_email" />
                                    <p class="error m-0" id="email_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Phone Number *</span>
                                    <input type="tel" class="custominput" placeholder="Enter Phone Number" id="assessment_phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" />
                                    <p class="error m-0" id="phone_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Assessment *</span>
                                    <select name="assessment_type" id="assessment_type" class="custominput">
                                        <option value="">--Select--</option>
                                        <option value="Doctor Consultation">Doctor Consultation</option>
                                        <option value="Dental & Vision Care">Dental & Vision Care</option>
                                        <option value="Mental Wellness">Mental Wellness</option>
                                    </select>
                                    <p class="error m-0" id="type_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Write a Message *</span>
                                    <textarea name="message" class="custominput" id="assessment_message" cols="30" rows="4"></textarea>
                                    <p class="error m-0" id="msg_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary w-100" id="btn_assesment">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!----->

<!-- Products Modal -->
<div class="modal fade" id="products" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="v-form form-protection" method="post" action="">
                    <div class="modal-contain">
                        <div class="row align-items-center">
                            <div class="col-lg-12 mb-4 text-center">
                                <h5>Protection form</h5>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Name *</span>
                                    <input type="text" name="name" class="custominput1" placeholder="Enter Name" id="protection_name" onkeypress="return onlyAlphabets(event,this);" />
																		<p class="error m-0" id="name1_err"></p>
																</label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Email Address *</span>
                                    <input type="text" name="email" class="custominput1" placeholder="Enter Name" id="protection_email" />
																		<p class="error m-0" id="email1_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Phone Number *</span>
                                    <input type="tel" class="custominput1" placeholder="Enter Phone Number" id="protection_phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" />
																		<p class="error m-0" id="phone1_err"></p>
																</label>
                            </div>
														<div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Protection *</span>
                                    <select name="protection_type" id="protection_type" class="custominput1">
                                        <option value="">--Select--</option>
                                        <option value="Group Super Top Up">Group Super Top Up</option>
                                        <option value="Group Cyber Insurance">Group Cyber Insurance</option>
																				<option value="Group Critical Illness">Group Critical Illness</option>
                                        <option value="Group Personal Accident">Group Personal Accident</option>
                                    </select>
                                    <p class="error m-0" id="type1_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Write a Message *</span>
                                    <textarea name="message" class="custominput1" id="protection_message" cols="30" rows="4"></textarea>
																		<p class="error m-0" id="msg1_err"></p>
																</label>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary w-100" id="btn_protection">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!----->

<!-- Prevention Modal -->
<div class="modal fade" id="prevention" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="v-form form-prevention" action="" method="post">
                    <div class="modal-contain">
                        <div class="row align-items-center">
                            <div class="col-lg-12 mb-4 text-center">
                                <h5>Prevention form</h5>
                            </div>
                            <p class="errors" id="all3_err" style="color: red; font-size: 13px;"></p>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Name *</span>
                                    <input type="text" name="name" class="custominput2" placeholder="Enter Name" id="prevention_name" onkeypress="return onlyAlphabets(event,this);" />
																		<p class="error m-0" id="name2_err"></p>
																</label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Email Address *</span>
                                    <input type="text" name="email" class="custominput2" placeholder="Enter Name" id="prevention_email" />
																		<p class="error m-0" id="email2_err"></p>
																</label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Your Phone Number *</span>
                                    <input type="tel" class="custominput2" placeholder="Enter Phone Number" id="prevention_phone" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" />
                                    <p class="error m-0" id="phone2_err"></p>
                                </label>
                            </div>
														<div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Prevention *</span>
                                    <select name="prevention_type" id="prevention_type" class="custominput2">
                                        <option value="">--Select--</option>
                                        <option value="Workplace & Personal Stress Management">Workplace & Personal Stress Management</option>
                                        <option value="Mental Wellness Webinars">Mental Wellness Webinars</option>
                                        <option value="Discount on Medicines">Discount on Medicines</option>
																				<option value="Career & Growth Coaching">Career & Growth Coaching</option>
                                    </select>
                                    <p class="error m-0" id="type2_err"></p>
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="select" for="slct">
                                    <span class="disabled-label">Write a Message *</span>
                                    <textarea name="message" class="custominput2" id="prevention_message" cols="30" rows="4"></textarea>
																		<p class="error m-0" id="msg2_err"></p>
																</label>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary w-100" id="btn_prevention">Submit</button>
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
    $(document).on("click", "#btn_assesment", function () {
        var url = "<?=base_url()?>employee/add_data";
        var email = $("#assessment_email").val();
        var mobile = $("#assessment_phone").val();
        var type = $("#assessment_type").val();
        if ($("#assessment_name").val() == "") {
            $("#name_err").html("Please enter your name").show();
            return false;
        }
        if (email == "") {
            $("#email_err").html("Please enter your email").show();
            return false;
        }
        if (IsEmail(email) == false) {
            $("#email_err").html("Please enter valid email").show();
            return false;
        }
        if (mobile == "") {
            $("#phone_err").html("Please enter your mobile no").show();
            return false;
        }
        if (mobile.length != 10) {
            $("#phone_err").html("Please enter correct mobile no").show();
            return false;
        }
        if (type == "") {
            $("#type_err").html("Please select assessment").show();
            return false;
        }

        if ($("#assessment_message").val() == "") {
            $("#msg_err").html("Please enter message").show();
            return false;
        }
        $.ajax({
            url: url,
            type: "post",
            data: "name=" + $("#assessment_name").val() + "&email=" + email + "&contact_no=" + mobile + "&type=" + $("#assessment_type").val() + "&message=" + $("#assessment_message").val() + "&tbl=" + "tbl_assessment",
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response == "success") {
                    $("#assessment").modal("hide");
                    $(".form-assessment")[0].reset();
                    swal({
                        title: "Success!",
                        text: "Assessment submitted successfully!",
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

    $(".custominput").bind("change", function () {
        var email = $("#assessment_email").val();
        var mobile = $("#assessment_phone").val();
        var type = $("#assessment_type").val();
        if ($("#assessment_name").val() == "") {
            $("#name_err").html("Please enter your name").show();
            return false;
        } else {
            $("#name_err").html("").show();
        }
        if (email == "") {
            $("#email_err").html("Please enter your email").show();
            return false;
        } else {
            $("#email_err").html("").show();
        }
        if (IsEmail(email) == false) {
            $("#email_err").html("Please enter valid email").show();
            return false;
        } else {
            $("#email_err").html("").show();
        }
        if (mobile == "") {
            $("#phone_err").html("Please enter your mobile no").show();
            return false;
        } else {
            $("#phone_err").html("").show();
        }
        if (mobile.length != 10) {
            $("#phone_err").html("Please enter correct mobile no").show();
            return false;
        } else {
            $("#phone_err").html("").show();
        }
        if (type == "") {
            $("#type_err").html("Please select assessment").show();
            return false;
        } else {
            $("#type_err").html("").show();
        }

        if ($("#assessment_message").val() == "") {
            $("#msg_err").html("Please enter message").show();
            return false;
        } else {
            $("#msg_err").html("").show();
        }
    });

    $("#assessment_name,#protection_name,#prevention_name").on("keypress", function () {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            return false;
        }
    });

    $(document).on("click", "#btn_protection", function () {
        var url = "<?=base_url()?>employee/add_data";
        var email = $("#protection_email").val();
        var mobile = $("#protection_phone").val();
				var type = $("#protection_type").val();
        if ($("#protection_name").val() == "") {
            $("#name1_err").html("Please enter your name").show();
            return false;
        }
        if (email == "") {
            $("#email1_err").html("Please enter your email").show();
            return false;
        }
        if (IsEmail(email) == false) {
            $("#email1_err").html("Please enter valid email").show();
            return false;
        }
        if (mobile == "") {
            $("#phone1_err").html("Please enter your mobile no").show();
            return false;
        }
        if (mobile.length != 10) {
            $("#phone1_err").html("Please enter correct mobile no").show();
            return false;
        }
        if (type == "") {
            $("#type1_err").html("Please select protection").show();
            return false;
        }
				if ($("#protection_message").val() == "") {
            $("#msg1_err").html("Please enter message").show();
            return false;
        }

          $.ajax({
              url: url,
              type: "post",
              data: "name=" + $("#protection_name").val() + "&email=" + email + "&contact_no=" + mobile + "&type=" + type + "&message=" + $("#protection_message").val() + "&tbl=" + "tbl_protection",
              dataType: "json",
              success: function (response) {
                  console.log(response);
                  if (response == "success") {
                      $("#products").modal("hide");
                      $(".form-protection")[0].reset();
                      swal({
                          title: "Success!",
                          text: "Protection submitted successfully!",
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

		$(".custominput1").bind("change", function () {
				var email = $("#protection_email").val();
				var mobile = $("#protection_phone").val();
				var type = $("#protection_type").val();
        if ($("#protection_name").val() == "") {
            $("#name1_err").html("Please enter your name").show();
            return false;
        } else {
            $("#name1_err").html("").show();
        }
        if (email == "") {
            $("#email1_err").html("Please enter your email").show();
            return false;
        } else {
            $("#email1_err").html("").show();
        }
        if (IsEmail(email) == false) {
            $("#email1_err").html("Please enter valid email").show();
            return false;
        } else {
            $("#email1_err").html("").show();
        }
        if (mobile == "") {
            $("#phone1_err").html("Please enter your mobile no").show();
            return false;
        } else {
            $("#phone1_err").html("").show();
        }
        if (mobile.length != 10) {
            $("#phone1_err").html("Please enter correct mobile no").show();
            return false;
        } else {
            $("#phone1_err").html("").show();
        }
        if (type == "") {
            $("#type1_err").html("Please select protection").show();
            return false;
        } else {
            $("#type1_err").html("").show();
        }

        if ($("#protection_message").val() == "") {
            $("#msg1_err").html("Please enter message").show();
            return false;
        } else {
            $("#msg1_err").html("").show();
        }
    });

    $(document).on("click", "#btn_prevention", function () {
        var url = "<?=base_url()?>employee/add_data";
				var email = $("#prevention_email").val();
        var mobile = $("#prevention_phone").val();
				var type = $("#prevention_type").val();
        if ($("#prevention_name").val() == "") {
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
        if (type == "") {
            $("#type2_err").html("Please select prevention").show();
            return false;
        }
				if ($("#prevention_message").val() == "") {
            $("#msg2_err").html("Please enter message").show();
            return false;
        }
          $.ajax({
              url: url,
              type: "post",
              data: "name=" + $("#prevention_name").val() + "&email=" + email + "&contact_no=" + mobile + "&type=" + type + "&message=" + $("#prevention_message").val() + "&tbl=" + "tbl_prevention",
              dataType: "json",
              success: function (response) {
                  console.log(response);
                  if (response == "success") {
                      $("#prevention").modal("hide");
                      $(".form-prevention")[0].reset();
                      swal({
                          title: "Success!",
                          text: "Prevention submitted successfully!",
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
				var email = $("#prevention_email").val();
				var mobile = $("#prevention_phone").val();
				var type = $("#prevention_type").val();
        if ($("#prevention_name").val() == "") {
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
        if (type == "") {
            $("#type2_err").html("Please select prevention").show();
            return false;
        } else {
            $("#type2_err").html("").show();
        }

        if ($("#prevention_message").val() == "") {
            $("#msg2_err").html("Please enter message").show();
            return false;
        } else {
            $("#msg2_err").html("").show();
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

		//for policy details
		// $(document).on("click", ".policyd", function () {
		// 		var url = "<?=base_url()?>employee/add_data";
		// 		var policy_no = $(this).data('id');
		// 		$.ajax({
		// 				url: url,
		// 				type: "post",
		// 				data: "policy_no=" + policy_no,
		// 				dataType: "json",
		// 				success: function (response) {
		//
		// 				}
		// 		});
		// 		return false;
		// });

</script>
