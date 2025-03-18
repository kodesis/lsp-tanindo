<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85 justify-content-between" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>"><img class="d-inline-block align-top img-fluid" src="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-icon-tanindo.png" alt="" width="50" /><span class="text-theme font-monospace fs-4 ps-2">Tanindo</span></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0 text-end" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-end">
          <li class="nav-item px-2">
            <a class="nav-link fw-medium active" aria-current="page" href="#header">Beranda</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="<?= base_url('home/skema') ?>">Skema</a><!-- ganti link ke menu skema -->
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="<?= base_url('home/artikel') ?>">Artikel</a><!-- ganti link ke menu skema -->
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="#tentang">Tentang</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="#alur">Alur</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="#kontak">Kontak </a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium btn btn-outline-secondary" target="_blank" type="button" href="<?= base_url('auth/register_tanindo') ?>">Registration</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="py-0" id="header">
    <div class="bg-holder d-none d-md-block" style="
                  background-image: url(<?= base_url('template/tanindo/') ?>assets/img/illustrations/hero-header.png);
                  background-position: right top;
                  background-size: contain;
               "></div>
    <!--/.bg-holder-->

    <div class="bg-holder d-md-none" style="
                  background-image: url(<?= base_url('template/tanindo/') ?>assets/img/illustrations/hero-bg.png);
                  background-position: right top;
                  background-size: contain;
               "></div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row align-items-center min-vh-75 min-vh-lg-100">
        <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
          <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">
            Bersertifikasi untuk
            <br class="d-block d-lg-block" />Masa Depan Pertanian
          </h1>
          <p class="mb-4 fs-1">
            Mengukuhkan Kompetensi, Meningkatkan Daya Saing.
          </p>
          <a href="#tentang" class="btn btn-lg btn-success">Selengkapnya ...</a>
        </div>
      </div>
    </div>
  </section>
  <?= $this->session->flashdata('message'); ?>
  <?php $this->load->view('home/index_artikel'); ?>

  <section class="py-5" id="partners">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <h2 class="fw-bold">Didukung oleh</h2>
          <!-- <p class="text-muted">
                        Kami bekerja sama dengan berbagai organisasi dan
                        perusahaan terkemuka.
                     </p> -->
        </div>
      </div>
      <div class="row justify-content-center align-items-center">
        <div class="col-6 col-md-3 col-lg-2 mb-4">
          <img src="<?= base_url('template/tanindo/') ?>assets/img/partners/logo-bnsp.png" class="img-fluid" alt="Badan Nasional Standarisasi Profesi" />
        </div>
        <div class="col-6 col-md-3 col-lg-2 mb-4">
          <img src="<?= base_url('template/tanindo/') ?>assets/img/partners/ktna.png" class="img-fluid" alt="Kelompok Tani Andalan Indonesia" />
        </div>
        <!-- <div class="col-6 col-md-3 col-lg-2 mb-4">
          <img src="<?= base_url('template/tanindo/') ?>assets/img/partners/logo-pppsi-old.png" class="img-fluid" alt="Kelompok Tani Andalan Indonesia" />
        </div> -->
        <div class="col-6 col-md-3 col-lg-2 mb-4">
          <img src="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-tanindo.png" class="img-fluid" alt="LSP Tanindo" />
        </div>
      </div>
    </div>
  </section>