<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_web; ?> | Sistem Informasi Perpustakaan SDN 6 Kota Bengkulu </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link href="<?= base_url('assets/'); ?>/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_style/assets/bower_components/select2/dist/css/select2.min.css">
  <link href="<?= base_url('assets/'); ?>/css/style.css" rel="stylesheet" type="text/css">
  <script src="<?= base_url('assets/'); ?>/vendors/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ajaxStart(function() {
      Pace.restart();
    });
  </script>
</head>

<body>
  <div class="hk-wrapper hk-vertical-nav">
    <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
      <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
      <a class="navbar-brand" href="<?php echo base_url('index.php/dashboard'); ?>">
        Perpustakaan SDN 6 Kota Bengkulu
      </a>
      <ul class="navbar-nav hk-navbar-content">
        <li class="nav-item dropdown dropdown-authentication">
          <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media">
              <div class="media-img-wrap">
                <div class="avatar">
                  <?php
                  $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
                  if (!empty($d->foto)) {
                  ?>
                    <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $d->foto; ?>" alt="user" class="avatar-img rounded-circle">
                  <?php } else { ?>
                    <i class="fa fa-user fa-4x" style="color:#fff;"></i>
                  <?php } ?>
                </div>
                <span class="badge badge-success badge-indicator"></span>
              </div>
              <div class="media-body">
                <?php
                $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login = '$idbo'")->row();
                ?>
                <span><?php echo $d->nama; ?><i class="zmdi zmdi-chevron-down"></i></span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
            <a class="dropdown-item" href="<?= base_url('user/edit/' . $idbo); ?>"><i class="dropdown-icon zmdi zmdi-account"></i><span>Edit Akun</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
          </div>
        </li>
      </ul>
    </nav>
    <div class="hk-pg-wrapper">