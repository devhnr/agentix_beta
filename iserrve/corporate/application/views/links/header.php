<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=ucwords(strtolower(str_replace('-', ' ', $file)))?></title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" /> -->
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/new.css" />
    <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/a.css" />
    <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/font-icons.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/responsive-new.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <!-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" /> -->
    <?php
        $dynamic = array('employees','claims','hospitals','cd-reports','list-view','corporate-buffer');
        $check = $this->uri->segment(1);
        if (in_array($check, $dynamic)) {
    ?>
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php } ?>

    <?php if (in_array($check, ['intimate-claims','hospitals','policy-features','cd-reports','endorsement','rack-rate','escalation-matrix','summary','report','upload-enrollment','corporate-buffer'])) { ?>
    <link rel="stylesheet" href="<?=base_url('assets/')?>style2.css" />
    <?php }else{?>
    <link rel="stylesheet" href="<?=base_url('assets/')?>style.css" />
    <?php } ?>

    <!-- jQuery -->
    <script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
    <?php if (in_array($check, ['intimate-claims','employees'])) { ?>
    <script src="<?=base_url('assets/')?>sweetalert@2.1.2/sweetalert.min.js"></script>
    <?php } ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

<!-- Navbar -->
<?php require dirname(__FILE__) . '/top_nav.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php require dirname(__FILE__) . '/side_nav.php'; ?>
<!-- End Main Sidebar Container -->
