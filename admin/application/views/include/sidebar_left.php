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

                    <img height="45" class="br64" src="<?php echo $base_url_views;?>images/fav.png"

                        alt="The Agentix" style="margin-left: -6px;padding-left:8px;">

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


            <li><a class="ajax-disable" href="<?php echo $base_url;?>blog_category/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Blog Category</a></li>    

            <li class="divider"></li>



            <li><a class="ajax-disable" href="<?php echo $base_url;?>blog/lists"><span style="font-size:14px;" class="fa fa-lock"></span>Blog</a></li>    

            <li class="divider"></li>
			
			
			 <li>
				<a class="ajax-disable" href="<?php echo $base_url;?>policy_category/lists">
					<span class="glyphicons glyphicons-book"></span> 
					Policy Category 
				</a>
			</li>
			<li class="divider"></li>
			
			<li><a class="ajax-disable" href="<?php echo $base_url;?>company_name/lists">
				<span class="glyphicons glyphicons-book"></span>Company</a>
			</li>
			<li class="divider"></li>
			
			
			<li><a class="ajax-disable" href="<?php echo $base_url;?>sum_insured/lists">
				<span class="glyphicons glyphicons-book"></span>Sum Insured</a>
			</li>
			<li class="divider"></li>
			
			
			<li>
				<a class="ajax-disable" href="<?php echo $base_url;?>compare/lists">
					<span class="glyphicons glyphicons-book"></span>
					Compare
				</a>
			</li>
            <li class="divider"></li>
			
			<li>
				<a class="ajax-disable" href="<?php echo $base_url;?>title/lists">
					<span class="glyphicons glyphicons-book"></span>
					Title
				</a>
			</li>
			<li class="divider"></li>
			
		
			<li>
				<a class="ajax-disable" href="<?php echo $base_url;?>policies/lists">
					<span style="font-size:14px;" class="fa fa-lock"></span>
					Policies
				</a>
			</li>
			<li class="divider"></li>
			
			<li>

                <a class="accordion-toggle " href="#resources"><span class="glyphicons glyphicons-vcard"></span><span

                        class="sidebar-title">Repository</span><span class="caret"></span></a>

                <ul id="resources" class="nav sub-nav">

                <li>
					<a class="ajax-disable" href="<?php echo $base_url;?>policies_product_repository/lists">
						<span style="font-size:14px;" class="fa fa-lock"></span>
						Policies
					</a>
				</li>
				<li class="divider"></li> 

				
				<li>
					<a class="ajax-disable" href="<?php echo $base_url;?>product_repository/lists">
						<span style="font-size:14px;" class="fa fa-lock"></span>
						Product Repository
					</a>
				</li>
				<li class="divider"></li> 
			

                </ul>

            </li>

         
             

			<li>
                <a class="ajax-disable" href="<?php echo $base_url;?>compare_send_mail/lists">
                    <span style="font-size:14px;" class="fa fa-lock"></span>
                    Compare - Send mail
                </a>
            </li>
            <li class="divider"></li> 		

				
			<li>
                <a class="ajax-disable" href="<?php echo $base_url;?>product_respository_send_mail/lists">
                    <span style="font-size:14px;" class="fa fa-lock"></span>
                    Product Repository - Send mail
                </a>
            </li>
            <li class="divider"></li>  
			
			<li>
                <a class="ajax-disable" href="<?php echo $base_url;?>agent_users/lists">
                    <span style="font-size:14px;" class="fa fa-lock"></span>
                    Agent Users
                </a>
            </li>
            <li class="divider"></li> 

        </ul>

        <?php  } ?>

    </div>



</aside>