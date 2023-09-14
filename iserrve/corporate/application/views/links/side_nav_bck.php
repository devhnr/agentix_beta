<aside class="main-sidebar bg-white elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link">
        <img src="<?=base_url('assets/')?>dist/img/isserve.png" alt="AdminLTE Logo" class="brand-image" />
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="<?=base_url()?>" class="d-block"><?=$this->session->userdata('corporate_name')?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?=base_url()?>" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Enrollment
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=site_url('employees')?>" class="nav-link">
                                <i class="far fa-circle nav-icon nav-inner-icon"></i>
                                <p>List of Active Members</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Claims
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=site_url('claims')?>" class="nav-link">
                                <i class="far fa-circle nav-icon nav-inner-icon"></i>
                                <p>Claim Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('intimate-claims')?>" class="nav-link">
                                <i class="far fa-circle nav-icon nav-inner-icon"></i>
                                <p>Intimate Claims</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=site_url('hospitals')?>" class="nav-link">
                        <i class="nav-icon far fa-hospital"></i>
                        <p>
                            Cashless Hospitals
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=site_url('escalation-matrix')?>" class="nav-link">
                        <i class="nav-icon fa fa-headphones"></i>
                        <p>
                            Escalation Matrix
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=site_url('policy-features')?>" class="nav-link">
                        <i class="nav-icon fa fa-list"></i>
                        <p>
                            Policy Features
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=site_url('utilities')?>" class="nav-link">
                        <i class="nav-icon fa fa-paperclip"></i>
                        <p>
                            Utilities
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-money"></i>
                        <p>
                            CD & Endorsement
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=site_url('cd-reports')?>" class="nav-link">
                                <i class="far fa-circle nav-icon nav-inner-icon"></i>
                                <p>CD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=site_url('endorsement')?>" class="nav-link">
                                <i class="far fa-circle nav-icon nav-inner-icon"></i>
                                <p>Endorsement</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?=site_url('report')?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Reports
                            <!-- <i class="fas fa-angle-left right"></i> -->
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon nav-inner-icon"></i>
                                <p>Report1</p>
                            </a>
                        </li>
                    </ul> -->
                </li>

                <li class="nav-item">
                    <a href="<?=site_url('summary')?>" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Summary
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
