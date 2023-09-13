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
        <div class="media"><a class="pull-left" href="javascript:void(0);">
                <div class="media-object border border-purple br64 bw2 p2" style="width: 49px;height: 52px;">
                    <img height="45" class="br64" src="<?php echo $base_url_views;?>images/logo_hori_new2.png"
                        alt="The Raghnall" style="margin-left: -2px;padding-left:8px;">
                </div>
            </a>
            <div class="mobile-link"><span class="glyphicons glyphicons-show_big_thumbnails"></span></div>
            <div class="media-body">
                <h5 class="media-heading mt5 mbn fw700 cursor">
                    <?php echo strtoupper($this->session->userdata('uname'));?>
                    <!--span class="caret ml5"></span-->
                </h5>
                <div class="media-links fs11">
                    <!--a href="javascript:void(0);">Menu</a--><i class="fa fa-circle text-muted fs3 p8 va-m"></i><a
                        href="<?php echo $base_url;?>welcome/logout">Sign Out</a>
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
            <li class="active"> <a class="ajax-disable" href="<?php echo $base_url;?>home"><span
                        class="glyphicons fa fa-tachometer"></span><span class="sidebar-title">Dashboard</span></a>
            </li>

            <?php if(in_array('1',$permission1) or in_array('2',$permission1) or in_array('3',$permission1) or in_array('4',$permission1) or in_array('5',$permission1) or in_array('6',$permission1) or in_array('7',$permission1) or in_array('8',$permission1) or in_array('9',$permission1) or in_array('10',$permission1) or in_array('11',$permission1) or in_array('12',$permission1) or in_array('13',$permission1)){ ?>

            <li>
                <!--<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
                        class="sidebar-title">Master</span><span class="caret"></span></a>-->
                <ul id="resources" class="nav sub-nav">
                   <!-- <?php if(in_array('1',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>group/lists"><span
                                class="glyphicons glyphicons-book"></span> Group </a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                   

                    <!--<?php if(in_array('3',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>subcategory/lists"><span
                                class="glyphicons glyphicons-book"></span>Sub Category</a></li>
                    <li class="divider"></li>
                    <?php } ?> -->

                   <!--  <?php if(in_array('4',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>banner/lists"><span
                                class="glyphicons glyphicons-book"></span>Banner</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    
                    <!-- <?php if(in_array('4',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>banner_mobile/lists"><span
                                class="glyphicons glyphicons-book"></span> Banner Mobile </a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('16',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>other/lists"><span
                                class="glyphicons glyphicons-book"></span> Sub Banner</a></li>
                    <li class="divider"></li>
                    <?php } ?> -->

                    <!-- <?php if(in_array('5',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>fabric/lists"><span
                                class="glyphicons glyphicons-book"></span>Fabric</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('6',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>neck/lists"><span
                                class="glyphicons glyphicons-book"></span>Neck</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('7',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>fit/lists"><span
                                class="glyphicons glyphicons-book"></span>Fit</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('8',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>occasion/lists"><span
                                class="glyphicons glyphicons-book"></span>Occasion</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('9',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>sleeve/lists"><span
                                class="glyphicons glyphicons-book"></span>Sleeve</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('10',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>pattern/lists"><span
                                class="glyphicons glyphicons-book"></span>Pattern</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('11',$permission1)) { ?> -->
                    <!-- <li><a class="ajax-disable" href="<?php echo $base_url;?>wash_care/lists"><span class="glyphicons glyphicons-book"></span>Wash Care</a></li>	
				 <li class="divider"></li>	-->
                    <!-- <?php } ?> -->

                    <!-- <?php if(in_array('12',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>size/lists"><span
                                class="glyphicons glyphicons-book"></span>Size</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

					<!-- <?php if(in_array('28',$permission1)){ ?>	
				 <li><a class="ajax-disable" href="<?php echo $base_url;?>age/lists"><span class="glyphicons glyphicons-book"></span>Age</a></li>	
				 <li class="divider"></li>			
				 <?php }?>	 -->

                   <!--  <?php if(in_array('13',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>colour/lists"><span
                                class="glyphicons glyphicons-book"></span>Colour</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('14',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>pincode/lists"><span
                                class="glyphicons glyphicons-book"></span>Pincode</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                    <!-- <?php if(in_array('28',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>menu_collection/lists"><span
                                class="glyphicons glyphicons-book"></span>Collection</a></li>
                    <li class="divider"></li>
                    <?php }?> -->

                </ul>
            </li>
            <?php } ?>
               <!--  <?php if(in_array('2',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>category/lists"><span
                                class="glyphicons glyphicons-book"></span> Category </a></li>
                    <li class="divider"></li>
                    <?php }?>

                     <?php if(in_array('4',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>gallery/lists"><span
                                class="glyphicons glyphicons-book"></span>Gallery</a></li>
                    <li class="divider"></li>
                    <?php }?> -->
            <!--<?php if (in_array('22',$permission1) or in_array('23',$permission1)) { ?>			
				<li>
				<a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span class="sidebar-title">Home Dynamic</span><span class="caret"></span></a>		
				<ul id="resources" class="nav sub-nav">	

				<?php if(in_array('16',$permission1)){ ?>	
				<li><a class="ajax-disable" href="<?php echo $base_url;?>collection/lists"><span class="glyphicons glyphicons-book"></span>Collection</a></li>	<li class="divider"></li>		
				<?php } ?> -->


            <!--<?php if(in_array('16',$permission1)){ ?>	
				<li><a class="ajax-disable" href="<?php echo $base_url;?>accessories/lists"><span class="glyphicons glyphicons-book"></span> Enhancer </a></li>	<li class="divider"></li>
				<?php } ?>

				</ul> 
				</li>
				<?php } ?>	-->

            <!-- <?php if(in_array('16',$permission1)){ ?>	
				<li><a class="ajax-disable" href="<?php echo $base_url;?>home_dynamic/lists"><span class="glyphicons glyphicons-book"></span>Home Dynamic</a></li>	<li class="divider"></li>		
				<?php } ?> 	 -->

          <!--   <?php if(in_array('21',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists"><span
                        class="fa fa-users"></span>Customers </a></li>
            <li class="divider"></li>
            <?php } ?> -->

            <!-- <?php if (in_array('22',$permission1) or in_array('23',$permission1)) { ?>
            <li>
                <a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-group"></span><span
                        class="sidebar-title">User Management</span><span class="caret"></span></a>
                <ul id="resources" class="nav sub-nav">
                    <?php if(in_array('22',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>permission/list_permission"><span
                                style="font-size:14px;" class="fa fa-hand-o-up"></span> User Permission</a></li>
                    <li class="divider"></li>
                    <?php } ?>

                    <?php if(in_array('23',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>users/lists"><span style="font-size:14px;"
                                class="fa fa-lock"></span>Admin User </a></li>
                    <li class="divider"></li>
                    <?php } ?>  
                </ul>
            </li>
            <?php } ?> -->

           <!--  <?php if(in_array('15',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists"> <span
                        class="fa fa-plus-square-o"></span>Product</a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('20',$permission1)){ ?>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>orders/lists"><span
                        class="glyphicons glyphicons-book"></span>Order </a></li>
            <li class="divider"></li> -->

            <!--<li> <a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-coins"></span><span class="sidebar-title">Order Management</span><span class="caret"></span></a>	
				<ul id="resources" class="nav sub-nav">	
				<li class="divider"></li> 	
				<li><a class="ajax-disable" href="<?php echo $base_url;?>orders/lists"><span class="glyphicons glyphicons-book"></span>Order </a></li>	
				<li class="divider"></li>		
				</ul> 
				</li>-->
           <!--  <?php } ?>
            <?php if(in_array('20',$permission1)){ ?>

            <li><a class="ajax-disable" href="<?php echo $base_url;?>return_orders/lists"><span
                        class="glyphicons glyphicons-book"></span>Return Order </a></li>
            <li class="divider"></li>

            <?php } ?>
            <?php if(in_array('20',$permission1)){ ?>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>report/order"><span
                        class="glyphicons glyphicons-book"></span>Sales Report </a></li>
            <li class="divider"></li>
            <?php } ?> -->

            <!-- <?php if(in_array('27',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>reports_management/order"><span
                        style="font-size:14px;" class="fa fa-inr"></span>Sales Report </a></li>
            <li class="divider"></li>
            <?php } ?> -->

            <!--<?php if(in_array('24',$permission1)){ ?>		
				<li><a class="ajax-disable" href="<?php echo $base_url;?>story/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Story </a></li>	
				<li class="divider"></li> 			
				<?php } ?>	
			
				<?php if(in_array('25',$permission1)){ ?>		
				<li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Limited Stock</a></li>	
				<li class="divider"></li> 			
				<?php } ?>	-->

           <!--  <?php if(in_array('17',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>coupan/lists"><span
                        class="glyphicons glyphicons-book"></span> Coupon</a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('18',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>cms/lists"><span
                        class="glyphicons glyphicons-book"></span>CMS</a></li>
            <li class="divider"></li>
            <?php }?>

            <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>faq/lists"><span
                        class="glyphicons glyphicons-book"></span> FAQ </a></li>
            <li class="divider"></li>
            <?php } ?> -->

           <!-- <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>blog/lists"><span
                        class="glyphicons glyphicons-book"></span> Blogs </a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('19',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>subscribe/lists"><span
                        class="glyphicons glyphicons-book"></span>Subscribe</a></li>
            <li class="divider"></li>
            <?php }?>-->


            <!-- <?php if(in_array('30',$permission1)){ ?> -->
            <!--					<li><a class="ajax-disable" href="<?php echo $base_url;?>ourstore/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Our Store </a></li>	
					<li class="divider"></li> -->
            <!-- <?php } ?> -->

            <!-- <?php if(in_array('29',$permission1)){ ?>
           <li><a class="ajax-disable" href="<?php echo $base_url;?>review/lists"><span
                        class="glyphicons glyphicons-book"></span>Review </a></li>
            <li class="divider"></li>
            <?php }?> -->
			
			<!--<li><a class="ajax-disable" href="<?php echo $base_url;?>testimonials/lists"><span style="font-size:14px;"
                        class="fa fa-user"></span>Testimonials</a></li>
            <li class="divider"></li>-->

           <!--  <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>offers/edit/1"><span style="font-size:14px;"
                        class="fa fa-lock"></span>System</a></li>
            <li class="divider"></li>
            <?php } ?>
            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>moments/lists"><span style="font-size:14px;"
                        class="fa fa-lock"></span>Moments</a></li>
            <li class="divider"></li>
            <?php } ?>

            <?php if(in_array('29',$permission1)){ ?>
           <li><a class="ajax-disable" href="<?php echo $base_url;?>wallet/lists"><span
                        class="glyphicons glyphicons-book"></span>Wallet </a></li>
            <li class="divider"></li>
            <?php }?> -->

            <!-- <?php if(in_array('29',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>notify/lists"><span
                        class="glyphicons glyphicons-book"></span>Notify List </a></li>
            <li class="divider"></li>
            <?php }?> -->

            <?php if(in_array('29',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>category/lists"><span
                        class="glyphicons glyphicons-book"></span>Category</a></li>
            <li class="divider"></li>
            <?php }?>

             <?php if(in_array('29',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>subcategory/lists"><span
                        class="glyphicons glyphicons-book"></span>Subcategory</a></li>
            <li class="divider"></li>
            <?php }?>
            
            <li><a class="ajax-disable" href="<?php echo $base_url;?>banner/lists"><span style="font-size:14px;" class="glyphicons glyphicons-book"></span>Banner</a></li>    
            <li class="divider"></li>

            <li><a class="ajax-disable" href="<?php echo $base_url;?>about_detail/edit/1"><span style="font-size:14px;" class="glyphicons glyphicons-book"></span>About Detail</a></li>    
            <li class="divider"></li>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>why_raghnall/lists"><span style="font-size:14px;" class="glyphicons glyphicons-book"></span>Why Raghnall</a></li>    
            <li class="divider"></li> 

            <?php if(in_array('15',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>product/lists"> <span
                        class="fa fa-plus-square-o"></span>Product</a></li>
            <li class="divider"></li>
            <?php } ?>

           

            <li><a class="ajax-disable" href="<?php echo $base_url;?>team/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Team</a></li>    
            <li class="divider"></li>

              <li><a class="ajax-disable" href="<?php echo $base_url;?>claim_assist/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Claim Assistance</a></li>    
            <li class="divider"></li> 

            <li><a class="ajax-disable" href="<?php echo $base_url;?>testimonials/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Testimonial</a></li>    
            <li class="divider"></li>

            <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>systems/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>System</a></li>
            <li class="divider"></li>
            <?php } ?>
            
             <?php if(in_array('26',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>systems2/edit/1"><span style="font-size:14px;" class="fa fa-lock"></span>Header/Footer</a></li>
            <li class="divider"></li>
            <?php } ?>

            <li><a class="ajax-disable" href="<?php echo $base_url;?>contactus/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Get Quote</a></li>    
            <li class="divider"></li>

            <li><a class="ajax-disable" href="<?php echo $base_url;?>enquire/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Enquires</a></li>    
            <li class="divider"></li>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>cms/lists"><span style="font-size:14px;" class="fa fa-lock"></span>CMS</a></li>    
            <li class="divider"></li>

            <li><a class="ajax-disable" href="<?php echo $base_url;?>blog_category/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Blog Category</a></li>    
            <li class="divider"></li>

            <li><a class="ajax-disable" href="<?php echo $base_url;?>blog/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Blog</a></li>    
            <li class="divider"></li>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>review/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Blog Comment</a></li>    
            <li class="divider"></li>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>career/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Career</a></li>    
            <li class="divider"></li>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>applycareer/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Apply Career</a></li>    
            <li class="divider"></li>

             <li><a class="ajax-disable" href="<?php echo $base_url;?>position/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Position</a></li>    
            <li class="divider"></li>

                <li>
                <a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span
                        class="sidebar-title">Raghnall Cyber</span><span class="caret"></span></a>
                <ul id="resources" class="nav sub-nav">
                   
                     <?php if(in_array('10',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>company_name/lists"><span
                                class="glyphicons glyphicons-book"></span>Company</a></li>
                    <li class="divider"></li>
                    <?php }?> 

                     <?php if(in_array('10',$permission1)){ ?>
                    <li><a class="ajax-disable" href="<?php echo $base_url;?>sum_insured/lists"><span
                                class="glyphicons glyphicons-book"></span>Sum Insured</a></li>
                    <li class="divider"></li>
                    <?php }?> 

                    <li><a class="ajax-disable" href="<?php echo $base_url;?>policies/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Policies</a></li>    
                    <li class="divider"></li>

                      <?php if(in_array('21',$permission1)){ ?>
                        <li><a class="ajax-disable" href="<?php echo $base_url;?>user/lists"><span
                                    class="fa fa-users"></span>Customers </a></li>
                        <li class="divider"></li>
                        <?php } ?>

                        <?php if(in_array('21',$permission1)){ ?>
                        <li><a class="ajax-disable" href="<?php echo $base_url;?>assess_info/lists"><span
                                    class="fa fa-users"></span>Assess Your Risk </a></li>
                        <li class="divider"></li>
                        <?php } ?>

                        <li><a class="ajax-disable" href="<?php echo $base_url;?>orders/lists"><span
                                    class="glyphicons glyphicons-book"></span>Order </a></li>
                        <li class="divider"></li>

                         <li><a class="ajax-disable" href="<?php echo $base_url;?>compare/lists"><span
                                    class="glyphicons glyphicons-book"></span>Compare</a></li>
                        <li class="divider"></li>

                          <li><a class="ajax-disable" href="<?php echo $base_url;?>title/lists"><span
                                    class="glyphicons glyphicons-book"></span>Title</a></li>
                        <li class="divider"></li>

                </ul>
            </li>
           <!--  <?php if(in_array('16',$permission1)){ ?>
            <li><a class="ajax-disable" href="<?php echo $base_url;?>faq/lists"><span
                        class="glyphicons glyphicons-book"></span> FAQ </a></li>
            <li class="divider"></li>
            <?php } ?> -->
        </ul>
        <?php  } ?>
    </div>

</aside>