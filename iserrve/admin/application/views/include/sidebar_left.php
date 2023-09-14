<?php
$front_base_url = $this->config->item('front_base_url');
$base_url 		= $this->config->item('base_url');
$http_host 		= $this->config->item('http_host');
$base_url_views = $this->config->item('base_url_views');
$base_upload = $this->config->item('upload');
?>
<!-- Start: Sidebar -->
<aside id="sidebar_left">
    <div class="user-info">
        <div class="media"> <a class="pull-left" href="javascript:void(0);">
                <div class="media-object"> 
					<img  class="br64" src="<?php echo $base_url_views;?>images/avatar.png" alt="Acros"> 
				</div>
            </a>
            <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
            <div class="media-body">
                <h5 class="media-heading mt5 mbn fw700 cursor">
                    <?php echo strtoupper($this->session->userdata('uname'));?>
                    <!--span class="caret ml5"></span-->
                </h5>
                <div class="media-links fs11">
                    <!--a href="javascript:void(0);">Menu</a-->
					<!-- <i class="fa fa-circle text-muted fs3 p8 va-m"></i> -->
					<!-- <a href="<?php echo $base_url;?>welcome/logout">Sign Out</a> --> 
					<div class="link-part">
      <a href="#">Change Password</a>
    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <?php
			if($this->session->userdata('adminId') !='')
			{
			$uid = $this->session->userdata('adminId');
			$getuser['data'] = $this->footer->getuser($uid);
			$category = $getuser['data']->role_id;
			$usercategory = $this->footer->usercategory($category);
                        $permission1 = array();
                        if(!empty($usercategory->permission)){
                            $permission1 = $usercategory->permission;
                            $permission1 = explode(',',$permission1);
                        }

		?>
        <ul class="nav">

        	<?php if (in_array('3',$permission1) or in_array('4',$permission1)){ ?> 

				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Dashboard</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

						<?php if(in_array('3',$permission1)){ ?>
							<li class="active"> <a class="ajax-disable" href="<?php echo $base_url;?>home"><span class="glyphicons fa fa-tachometer"></span><span class="sidebar-title">Admin Dashboard</span></a>
							</li>
				
						<?php }?>

						<?php if(in_array('4',$permission1)){ ?>
							<li class="active"> <a class="ajax-disable" href="<?php echo $base_url;?>home/corporate_listing"><span class="glyphicons fa fa-tachometer"></span><span class="sidebar-title">Corporate Dashboard</span></a>
							</li>
						<?php }?>

					</ul>
				</li>
			<?php }?>


			<?php if(in_array('23',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>corporate/lists"><span class="glyphicons glyphicons-building"></span> <span
							class="sidebar-title"> Create Corporate </span></a></li>
				<!-- <li class="divider"></li> -->
            <?php }?>



            <?php if (in_array('24',$permission1) or in_array('25',$permission1) or in_array('26',$permission1)){ ?>

				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Create Product</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

						<?php if(in_array('24',$permission1)){ ?>
						<li><a class="ajax-disable" href="<?php echo $base_url;?>policy/lists"><span
									class="glyphicons glyphicons-book"></span>Create Policy</a></li>
						<!-- <li class="divider"></li> -->
                    	<?php }?>

                    	<?php if(in_array('25',$permission1)){ ?>
						<li><a class="ajax-disable" href="<?php echo $base_url;?>sum_insured/lists"><span
									class="glyphicons glyphicons-book"></span>Add Sum Insured</a></li>
						<!-- <li class="divider"></li> -->
						<?php }?>

                    	<?php if(in_array('26',$permission1)){ ?>
						<li><a class="ajax-disable" href="<?php echo $base_url;?>policy_features/lists"><span
									class="glyphicons glyphicons-book"></span>Assign Policy Features</a></li>
						<!-- <li class="divider"></li> -->
                    	<?php }?>
					

					</ul>
				</li>
			
			<?php }?>


			<?php if(in_array('27',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>employee_enrollment/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Employee Enrollment</span></a></li>
				<!-- <li class="divider"></li> -->
            <?php }?>


            <?php if(in_array('28',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>update_premium/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Update Premium</span></a></li>
				<!-- <li class="divider"></li> -->
            <?php }?>

            <?php if(in_array('30',$permission1)){ ?>	
				<li><a class="ajax-disable" href="<?php echo $base_url;?>ecards/list"><span class="glyphicon glyphicon-credit-card"></span><span
							class="sidebar-title">E-Card Upload</span></a></li>
				<!-- <li class="divider"></li> -->
			<?php }?>


			<?php if (in_array('22',$permission1) or in_array('33',$permission1)){ ?>

				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Cashless Hospitals</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

						<?php if(in_array('22',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>home/network_hospitals"><span class="glyphicons glyphicons-building"></span><span
							class="sidebar-title">Cashless Hospitals - API</span></a></li>
							
                    	<?php }?>

                    	<?php if(in_array('33',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>cashless_hospital/lists"><span class="glyphicon glyphicon-credit-card"></span><span
							class="sidebar-title">Cashless Hospitals - Manual</span></a></li>
							
						<?php }?>

					</ul>
				</li>
			
			<?php }?>


			<?php if (in_array('31',$permission1) or in_array('32',$permission1)){ ?>

				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Claims</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

						<?php if(in_array('31',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>claim/list"><span class="glyphicon glyphicon-credit-card"></span><span
							class="sidebar-title">Intimate Claims</span></a></li>
							
						<?php }?>

						<?php if(in_array('32',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>claim/upload_claim_list"><span class="glyphicon glyphicon-credit-card"></span><span
							class="sidebar-title">Upload Claims Data</span></a></li>
							
						<?php }?>

					</ul>
				</li>
			
			<?php }?>


			<?php if (in_array('14',$permission1) or in_array('15',$permission1) or in_array('16',$permission1)){ ?>

				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">CD Account</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

					<?php if(in_array('14',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>cd_statement_entry/lists"><span class="glyphicons glyphicons-book"></span>CD Statement Entry</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('15',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>endorsement_transaction/add"><span class="glyphicons glyphicons-book"></span>Endorsement Transaction</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('16',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>endorsement_transaction/lists"><span class="glyphicons glyphicons-book"></span>Endorsement Transaction Lists</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					</ul>
				</li>
			
			<?php }?>


			<?php if (in_array('12',$permission1) or in_array('13',$permission1)){ ?> 
	
				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Endorsement</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

					<?php if(in_array('12',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>endorsement_rack_rates/lists"><span class="glyphicons glyphicons-book"></span>Rack Rates</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('13',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>endorsement_calculation/lists"><span class="glyphicons glyphicons-book"></span>Endorsement Calculation</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>



						</ul>
				</li>
			
			<?php }?>


			<?php if(in_array('29',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>utilities/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Utilities</span></a></li>
				<!-- <li class="divider"></li> -->
            <?php }?>


            <?php if (in_array('10',$permission1) or in_array('11',$permission1)){ ?> 
				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Escalation Matrix</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

					<?php if(in_array('10',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>user_escalation/lists"><span class="glyphicons glyphicons-book"></span>User for Escalation Matrix</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('11',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>escalation_level/lists"><span class="glyphicons glyphicons-book"></span>Escalation Level</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>



						</ul>
				</li>
			
			<?php }?>
		

			<?php if (in_array('5',$permission1) or in_array('6',$permission1) or in_array('7',$permission1) or in_array('8',$permission1) or in_array('9',$permission1) ){ ?> 

				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Master</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

					<?php if(in_array('5',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>product_type/lists"><span class="glyphicons glyphicons-book"></span> Product Type </a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('6',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>form_field/lists"><span class="glyphicons glyphicons-book"></span>Form Field</a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('7',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>document_type/lists"><span class="glyphicons glyphicons-book"></span> Document Type </a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

						<?php if(in_array('8',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>state/lists"><span class="glyphicons glyphicons-book"></span> State </a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('9',$permission1)){ ?>
					<li><a class="ajax-disable" href="<?php echo $base_url;?>city/lists"><span class="glyphicons glyphicons-book"></span> City </a></li>
					<!-- <li class="divider"></li> -->
					<?php }?>

						</ul>
				</li>
			<?php }?>


			<?php if(in_array('37',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>home/request_list"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Employee Request</span></a></li>
				<!-- <li class="divider"></li> -->
			<?php }?>



			<?php if (in_array('34',$permission1) or in_array('35',$permission1) or in_array('36',$permission1)){ ?> 
				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Service Request</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

						<?php if(in_array('34',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>home/assessment_list"><span
										class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Assessment</span></a></li>
							<!-- <li class="divider"></li> -->
						<?php }?>
						
						
						<?php if(in_array('35',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>home/protection_list"><span
										class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Protection</span></a></li>
							<!-- <li class="divider"></li> -->
						<?php }?>
						
						
						<?php if(in_array('36',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>home/prevention_list"><span
										class="glyphicons glyphicons-book"></span>Prevention</a></li>
							<!-- <li class="divider"></li> -->
						<?php }?>

					</ul>
				</li>
			
			<?php }?>



			<?php if (in_array('17',$permission1) or in_array('18',$permission1) or in_array('19',$permission1) or in_array('20',$permission1) or in_array('21',$permission1)){ ?> 
				<li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
							class="sidebar-title">Leads</span><span class="caret"></span></a>
					<ul id="resources" class="nav sub-nav">

						<?php if(in_array('17',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Get Quote Button</span></a></li>
							<!-- <li class="divider"></li> -->
                    	<?php }?>


                    	<?php if(in_array('18',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>home_get_quote/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Get Quote Form</span></a></li>
							<!-- <li class="divider"></li> -->
                   		<?php }?>
						
						<?php if(in_array('46',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>slider_get_quote/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">IVF Form</span></a></li>
							<!-- <li class="divider"></li> -->
                   		<?php }?>


                     	<?php if(in_array('19',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>talk_to_expert/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Talk to expert</span></a></li>
							<!-- <li class="divider"></li> -->
                    	<?php }?>


                     	<?php if(in_array('20',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>buy_now/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Buy Now</span></a></li>
							<!-- <li class="divider"></li> -->
                    	<?php }?>


					 	<?php if(in_array('21',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>book_consultation/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Book Consultation</span></a></li>
							<!-- <li class="divider"></li> -->
                    	<?php }?>

					</ul>
				</li>
			
			<?php }?>



			<?php if(in_array('1',$permission1) || in_array('2',$permission1)){ ?> 
            	<li> <a class="accordion-toggle " href="#resources"><span
                    class="glyphicons glyphicons-vcard"></span><span class="sidebar-title">Rights Management</span>
                    <span class="caret"></span></a>
                <ul id="resources" class="nav sub-nav">

                    <?php if(in_array('1',$permission1)){ ?> 
                        <li><a class="ajax-disable" href="<?php echo $base_url;?>users/lists"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Admin Users</span></a></li>          
                    <?php } ?>

                    <?php if(in_array('2',$permission1)){ ?>    
                        <li><a class="ajax-disable" href="<?php echo $base_url;?>permission/list_permission"><span class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Admin Permission</span></a></li>          
                    <?php } ?>

                </ul>
            </li> 
            <?php } ?>


            <?php if(in_array('39',$permission1) || in_array('41',$permission1) || in_array('42',$permission1)){ ?> 

                <li>
					<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
                        class="sidebar-title">Blog</span><span class="caret"></span></a>
						
					<ul id="resources" class="nav sub-nav">
					
						<?php if(in_array('39',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>blog_category/lists"><span style="font-size:14px;" class="fa fa-lock"></span><span
							class="sidebar-title">Blog Category</span></a></li>
							<!-- <li class="divider"></li> -->
						<?php }?>
						 
						<?php if(in_array('41',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>blog/lists"><span style="font-size:14px;" class="fa fa-lock"></span><span
							class="sidebar-title">Blog</span></a></li>
							<!-- <li class="divider"></li> -->
						<?php }?>
						
						<?php if(in_array('42',$permission1)){ ?>
							<li><a class="ajax-disable" href="<?php echo $base_url;?>review/lists"><span style="font-size:14px;" class="fa fa-lock"></span><span
							class="sidebar-title">Blog Comment</span></a></li>
							<!-- <li class="divider"></li> -->
						<?php }?>	

					</ul>
				</li>
			<?php }?>
			

              <?php //if(in_array('3',$permission1)){ ?>
                  <!--   <li><a class="ajax-disable" href="<?php echo $base_url;?>banner/edit/1"><span
                                class="glyphicons glyphicons-book"></span> Banner </a></li>
                    <li class="divider"></li> -->
                    <?php //}?>

                   <!--  <?php //if(in_array('5',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>category/lists"><span
                                class="glyphicons glyphicons-book"></span>Category</a></li>
                    <li class="divider"></li>
                    <?php //}?>

                    <?php //if(in_array('5',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists"><span
                                class="fa fa-plus-square-o"></span>Product</a></li>
                    <li class="divider"></li>
                    <?php// }?>    -->

                    

                    <!--<?php // if(in_array('5',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php // echo $base_url;?>get_qoute_expert/lists"><span
                                class="glyphicons glyphicons-book"></span>Get Quote(Talk To Our Expert)</a></li>
                    <li class="divider"></li>
                    <?php// }?>-->

                   
					
                    

                    


                    

                    

					
					
					
					
					
					
					
					
					
					
					
					<?php if(in_array('38',$permission1)){ ?>
						<li><a class="ajax-disable" href="<?php echo $base_url;?>registered_emp/list"><span
									class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Registered Employees</span></a></li>
						<!-- <li class="divider"></li> -->
					<?php }?>
					
					<?php if(in_array('40',$permission1)){ ?>
						<li><a class="ajax-disable" href="<?php echo $base_url;?>home/feedback_list"><span
									class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Feedback</span></a></li>
						<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('40',$permission1)){ ?>
						<li><a class="ajax-disable" href="<?php echo $base_url;?>home/summary"><span
									class="glyphicons glyphicons-book"></span><span
							class="sidebar-title">Summary</span></a></li>
						<!-- <li class="divider"></li> -->
					<?php }?>

					<?php if(in_array('45',$permission1)){ ?>
                        <li><a class="ajax-disable" href="<?php echo $base_url;?>logmanage/list"><span
                                    class="glyphicons glyphicons-book"></span><span
                            class="sidebar-title">Log Manage</span></a></li>
                        <!-- <li class="divider"></li> -->
                    <?php }?>






            <!-- <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>category/lists"><span style="font-size:14px;" class="glyphicons glyphicons-book"></span>Category</a></li>
                <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('27',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists"><span style="font-size:14px;" class="fa fa-plus-square-o"></span>Product</a></li>
                <li class="divider"></li>
            <?php } ?> -->



            <!-- <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>subscribe/lists"><span style="font-size:14px;" class="glyphicons glyphicons-book"></span>News & Events</a></li>
                <li class="divider"></li>
            <?php } ?>



             <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>community_welfare/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>Community Welfare</a></li>
                <li class="divider"></li>
            <?php } ?>


            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>infrastructure/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>Infrastructure</a></li>
                <li class="divider"></li>
            <?php } ?>


            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>custom_manufactur/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>Custom Manufacture</a></li>
                <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>career/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Career</a></li>
                <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>job_opening/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Job Opening</a></li>
                <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>systems/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>Systems</a></li>
                <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>request_brochure/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Request Brochure</a></li>
                <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>contactus/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Contact Us</a></li>
                <li class="divider"></li>
            <?php } ?>

             <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>contact_detail/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>Contact Detail</a></li>
                <li class="divider"></li>
            <?php } ?>

             <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>subscribe2/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Subscribe</a></li>
                <li class="divider"></li>
            <?php } ?> -->



            <!--<?php if(in_array('15',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists"> <span class="fa fa-plus-square-o"></span>Product</a></li>
				<li class="divider"></li>
				<?php } ?>-->




            <!-- <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>sub_banners/edit/1"><span style="font-size:14px;"
                        class="fa fa-lock"></span>Sub Banners</a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>doctor_team/lists"><span
                        class="glyphicons glyphicons-book"></span> Doctor/Team </a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>faq/lists"><span
                        class="glyphicons glyphicons-book"></span> FAQ </a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>about_us/lists"><span
                        class="glyphicons glyphicons-book"></span> About Us </a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>homeopathy/edit/1"><span style="font-size:14px;"
                        class="fa fa-lock"></span>Homeopathy</a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>case_studies/lists"><span
                        class="glyphicons glyphicons-book"></span> Case Studies </a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>membership_plan/lists"><span
                        class="glyphicons glyphicons-book"></span> Membership Plan </a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>contact_us/lists"><span
                        class="glyphicons glyphicons-book"></span> Contact Us </a></li>
            <li class="divider"></li>
            <?php } ?>
 -->

            <!-- <?php if(in_array('16',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>home_dynamic/lists"><span class="glyphicons glyphicons-book"></span>Home Dynamic</a></li>	<li class="divider"></li>
				<?php } ?> 	 -->

            <!--<?php if(in_array('21',$permission1)){ ?>
			    <li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists"><span class="glyphicons glyphicons-book"></span>User </a></li>
				<li class="divider"></li>
				<?php } ?>-->

            <!--<?php if (in_array('22',$permission1) or in_array('23',$permission1)) { ?>
				<li>
				<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-group"></span><span class="sidebar-title">User Management</span><span class="caret"></span></a>
				<ul id="resources" class="nav sub-nav">
				<?php if(in_array('22',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>permission/list_permission"><span style="font-size:14px;" class="fa fa-hand-o-up"></span> User Permission</a></li>
				<li class="divider"></li>
				<?php } ?>


				</ul>
				</li>
				<?php } ?>	-->

            <!--<?php if(in_array('20',$permission1)){ ?>

                                <li><a class="ajax-disable" href="<?php echo $base_url;?>orders/lists"><span class="glyphicons glyphicons-book"></span>Order </a></li>-->

            <!--<li> <a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-coins"></span><span class="sidebar-title">Order Management</span><span class="caret"></span></a>
				<ul id="resources" class="nav sub-nav">
				<li class="divider"></li>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>orders/lists"><span class="glyphicons glyphicons-book"></span>Order </a></li>
				<li class="divider"></li>
				</ul>
				</li>-->
            <?php } ?>

            <!--<?php if(in_array('24',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>story/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Story </a></li>
				<li class="divider"></li>
				<?php } ?>

				<?php if(in_array('25',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Limited Stock</a></li>
				<li class="divider"></li>
				<?php } ?>	-->
            <!-- <li><a class="ajax-disable" href="<?php echo $base_url;?>media/lists"><span style="font-size:14px;"
                        class="fa fa-lock"></span>Media</a></li> -->
            <!-- <li class="divider"></li> -->

            <!--				<li><a class="ajax-disable" href="<?php echo $base_url;?>testimonials/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Testimonials</a></li>
				<li class="divider"></li>-->

            <!--<?php if(in_array('17',$permission1)){ ?>
				<li><a class="ajax-disable" href="<?php echo $base_url;?>coupan/lists"><span class="glyphicons glyphicons-book"></span> Coupon</a></li>
				<li class="divider"></li>
				<?php } ?> -->

            <!-- <?php if(in_array('18',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>cms/lists"><span
                        class="glyphicons glyphicons-book"></span>CMS</a></li>
            <li class="divider"></li>
            <?php }?>

            <?php if(in_array('19',$permission1)){ ?>
            				<li><a class="ajax-disable" href="<?php echo $base_url;?>subscribe/lists"><span class="glyphicons glyphicons-book"></span>Subscribe</a></li>
				<li class="divider"></li>
            <?php }?>

            <?php if(in_array('19',$permission1)){ ?>
            				<li><a class="ajax-disable" href="<?php echo $base_url;?>autism_test/lists"><span class="glyphicons glyphicons-book"></span>Autism Test</a></li>
				<li class="divider"></li>
            <?php }?>

            <?php if(in_array('19',$permission1)){ ?>
            				<li><a class="ajax-disable" href="<?php echo $base_url;?>pcod_test/lists"><span class="glyphicons glyphicons-book"></span>Pcod Test</a></li>
				<li class="divider"></li>
            <?php }?>

            <?php if(in_array('19',$permission1)){ ?>
            				<li><a class="ajax-disable" href="<?php echo $base_url;?>allergy_test/lists"><span class="glyphicons glyphicons-book"></span>Allergy Test</a></li>
				<li class="divider"></li>
            <?php }?>

            <?php if(in_array('19',$permission1)){ ?>
            				<li><a class="ajax-disable" href="<?php echo $base_url;?>autism_new/lists"><span class="glyphicons glyphicons-book"></span>Autism New</a></li>
				<li class="divider"></li>
            <?php }?>

            <?php if(in_array('19',$permission1)){ ?>
            				<li><a class="ajax-disable" href="<?php echo $base_url;?>pcod_new/lists"><span class="glyphicons glyphicons-book"></span>Pcod New</a></li>
				<li class="divider"></li>
            <?php }?>

            <?php if(in_array('19',$permission1)){ ?>
            				<li><a class="ajax-disable" href="<?php echo $base_url;?>allergy_new/lists"><span class="glyphicons glyphicons-book"></span>Allergy New</a></li>
				<li class="divider"></li>
            <?php }?>


            <?php if(in_array('19',$permission1)){ ?>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>allergies/lists"><span class="glyphicons glyphicons-book"></span>Allergies</a></li>
                <li class="divider"></li>
            <?php }?>


            <?php if(in_array('19',$permission1)){ ?>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>pcos/lists"><span class="glyphicons glyphicons-book"></span>Pcos</a></li>
                <li class="divider"></li>
            <?php }?>



            <?php if(in_array('19',$permission1)){ ?>
                            <li><a class="ajax-disable" href="<?php echo $base_url;?>thyroid/lists"><span class="glyphicons glyphicons-book"></span>Thyroid</a></li>
                <li class="divider"></li>
            <?php }?>


             <?php if (in_array('22',$permission1) or in_array('23',$permission1)) { ?>
            <li>
                <a class="accordion-toggle " href="#resources2"><span class="glyphicons glyphicons-vcard"></span><span
                        class="sidebar-title">Casetrackers</span><span class="caret"> </span></a>
                <ul id="resources2" class="nav sub-nav">


                   <?php if(in_array('21',$permission1)){ ?>
                <li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists"><span class="glyphicons glyphicons-book"></span>User </a></li>
                <li class="divider"></li>
                <?php } ?>

                 <?php if(in_array('21',$permission1)){ ?>
                <li><a class="ajax-disable" href="<?php echo $base_url;?>age/lists"><span class="glyphicons glyphicons-book"></span>Age </a></li>
                <li class="divider"></li>
                <?php } ?>

                 <?php if(in_array('21',$permission1)){ ?>
                <li><a class="ajax-disable" href="<?php echo $base_url;?>Disease/lists"><span class="glyphicons glyphicons-book"></span>Disease </a></li>
                <li class="divider"></li>
                <?php } ?>

                 <?php if(in_array('21',$permission1)){ ?>
                <li><a class="ajax-disable" href="<?php echo $base_url;?>Question/lists"><span class="glyphicons glyphicons-book"></span>Question </a></li>
                <li class="divider"></li>
                <?php } ?>


                </ul>
            </li>
            <?php } ?> -->

            <?php if(in_array('26',$permission1)){ ?>
            <!--<li><a class="ajax-disable" href="<?php echo $base_url;?>offers/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>System</a></li>
				<li class="divider"></li> 			-->
            <?php } ?>

            <?php if(in_array('27',$permission1)){ ?>
            <!--				<li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/order"><span style="font-size:14px;" class="fa fa-lock"></span>Sales Report </a></li>
				<li class="divider"></li> 			-->
            <?php } ?>

            <?php if(in_array('30',$permission1)){ ?>
            <!--					<li><a class="ajax-disable" href="<?php echo $base_url;?>ourstore/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Our Store </a></li>
					<li class="divider"></li> -->
            <?php } ?>

            <?php if(in_array('29',$permission1)){ ?>
            <!--					<li><a class="ajax-disable" href="<?php echo $base_url;?>review/lists"><span class="glyphicons glyphicons-book"></span>Review </a></li>
					<li class="divider"></li>		-->
            <?php }?>



            <!-- <li><a class="ajax-disable" href="<?php echo $base_url;?>media_banner/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>Media Banner</a></li>
				<li class="divider"></li> -->
				
				
			
				
			


        </ul>
        <?php  } ?>
    </div>

</aside>
