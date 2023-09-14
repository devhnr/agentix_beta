<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="feather icon-feather-align-center icon-medium align-middle text-fast-blue"></i></a>
        </li>
        <!--<li class="nav-item d-none d-sm-inline-block">-->
        <!--    <a href="<?=base_url()?>" class="nav-link"> <img src="<?=base_url('assets/')?>dist/img/fiveonline-black-logo.jpg" class="corporate-logo" /></a>-->
        <!--</li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search.." />

                <button class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </li> -->

        <!-- Messages Dropdown Menu 
        <?php 
		
		// $this->load->model('Endorsement_Model','em');
		
		// $active_logins = $this->em->get_active_logins_new(); ?>
        <li class="nav-item">
              <p>Logged in Employees Count : <?=$active_logins?></p>
        </li>-->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
             <button type="button" class="tablinks1 btn d-flex active bg-info" style="border-radius: 50px; font-size: 11px;" data-toggle="dropdown">
                <span class="info-box-icon1"><i class="far fa-envelope"></i></span>CD Balance
            </button>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right bg-light-gray" id="showCD">
                <!-- <span class="dropdown-header">CD Balance : 13,0010</span> -->
            </div>
        </li>

        <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge1 navbar-badge1">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> -->

        <li class="nav-item d-none">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="user-panel d-flex">
                    <div class="header-info">
                        <span class="text-black"><strong><?=$this->session->userdata('corporate_name')?></strong></span>
                        <!-- <p class="fs-12 mb-0">Super Admin</p> -->
                    </div>
                    <div class="image">
                        <img src="<?=base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <!-- <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2 box1"></i> Profile -->
                    <!--<span class="float-right text-muted text-sm">3 mins</span>-->
                <!-- </a> -->

                <a href="<?=site_url('hr-logout')?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2 box1"></i>Logout
                    <!--<span class="float-right text-muted text-sm">12 hours</span>-->
                </a>
            </div>
        </li>
    </ul>
</nav>
