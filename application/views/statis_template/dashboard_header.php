<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
  <!-- endinject -->
  <!-- icon -->
  <!-- <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico" /> -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/') ?>images/logo-icon-tanindo.png" />
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- fontawesome -->
  <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/') ?>all.min.css">

  <!-- SWAL NOTIFICATION -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- jQuery -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

  <!-- DATATABLE -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <?php if ($this->session->userdata('status') == 1) { ?>
            <a class="navbar-brand brand-logo" href="<?= base_url('admin') ?>"><img src="<?= base_url('assets/') ?>images/dashboard/logo-tanindo.png" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="<?= base_url('admin') ?>"><img src="<?= base_url('assets/') ?>images/dashboard/logo-tanindo.png" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="typcn typcn-th-menu"></span>
            </button>
          <?php } ?>
          <?php if ($this->session->userdata('status') == 2) { ?>
            <a class="navbar-brand brand-logo" href="<?= base_url('staff') ?>"><img src="<?= base_url('assets/') ?>images/dashboard/logo-tanindo.png" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="<?= base_url('staff') ?>"><img src="<?= base_url('assets/') ?>images/dashboard/logo-tanindo.png" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="typcn typcn-th-menu"></span>
            </button>
          <?php } ?>
          <?php if ($this->session->userdata('status') == 3) { ?>
            <a class="navbar-brand brand-logo" href="<?= base_url('user') ?>"><img src="<?= base_url('assets/') ?>images/dashboard/logo-tanindo.png" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="<?= base_url('user') ?>"><img src="<?= base_url('assets/') ?>images/dashboard/logo-tanindo.png" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="typcn typcn-th-menu"></span>
            </button>
          <?php } ?>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav me-lg-2">
          <?php if ($this->session->userdata('status') == 1) { ?>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <?php

                if (isset($user_doc['image'])) { ?>
                  <img src="<?= base_url('uploads/') . $user_doc['image'] ?>" alt="profile" />
                <?php } else { ?>
                  <img src="<?= base_url('assets/') ?>images/faces/imada_mio_2.png" alt="profile">
                <?php } ?>

                <span class="nav-profile-name"><?= $this->session->userdata('username') ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <!-- <a class="dropdown-item">
                  <i class="typcn typcn-cog-outline text-primary"></i>
                  Settings
                </a> -->
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                  <i class="typcn typcn-eject text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          <?php } ?>
          <?php if ($this->session->userdata('status') == 2) { ?>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <?php

                if (isset($user_doc['image'])) { ?>
                  <img src="<?= base_url('uploads/') . $user_doc['image'] ?>" alt="profile" />
                <?php } else { ?>
                  <img src="<?= base_url('assets/') ?>images/faces/face5.jpg" alt="profile">
                <?php } ?>

                <span class="nav-profile-name"><?= $this->session->userdata('username') ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="typcn typcn-cog-outline text-primary"></i>
                  Settings
                </a>
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                  <i class="typcn typcn-eject text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          <?php } ?>
          <?php if ($this->session->userdata('status') == 3) { ?>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                <?php

                if (isset($user_doc['image'])) { ?>
                  <img src="<?= base_url('uploads/') . $user_doc['image'] ?>" alt="profile" />
                <?php } else { ?>
                  <img src="<?= base_url('assets/') ?>images/faces/face5.jpg" alt="profile">
                <?php } ?>

                <span class="nav-profile-name"><?= $this->session->userdata('username') ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="typcn typcn-cog-outline text-primary"></i>
                  Settings
                </a>
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                  <i class="typcn typcn-eject text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          <?php } ?>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">