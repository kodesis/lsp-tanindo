<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85 justify-content-between" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
      <a class="navbar-brand" href="index.html"><img class="d-inline-block align-top img-fluid" src="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-icon-tanindo.png" alt="" width="50" /><span class="text-theme font-monospace fs-4 ps-2">Tanindo</span></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0 text-end" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-end">
          <li class="nav-item px-2">
            <a class="nav-link fw-medium active" aria-current="page" href="<?= base_url('home') ?>">Beranda</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="<?= base_url('home/skema') ?>">Skema</a><!-- ganti link ke menu skema -->
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="<?= base_url('home/artikel') ?>">Artikel</a><!-- ganti link ke menu skema -->
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="<?= base_url('home') ?>#tentang">Tentang</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="<?= base_url('home') ?>#alur">Alur</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link fw-medium" href="<?= base_url('home') ?>#kontak">Kontak </a>
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
            Berbagai Artikel
            <br class="d-block d-lg-block" />Tersedia Di LSP Tanindo
          </h1>
          <p class="mb-4 fs-1">
            Mengukuhkan Kompetensi, Meningkatkan Daya Saing.
          </p>
          <a href="#skema" class="btn btn-lg btn-success">Selengkapnya ...</a>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>
  <div class="row" id="skema">
    <div class="col-lg-9 mx-auto text-center mb-3">
      <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Artikel LSP TANINDO </h5>
      <!-- <h4><b>Berdasarkan Surat Keputusan Ketua BNSP Nomor KEP 1813/BNSP/VII/2024. </b></h4> -->
    </div>
  </div>
  <div class="row h-100 justify-content-center align-items-center mb-6">
    <div class="col-xl-12">
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
          <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
            <div class="text-center text-md-start card-hover">
              <div class="d-flex justify-content-center align-items-center">
                <img class="ps-3 icons" src="<?= base_url('assets/images/artikel/artikel_1.jpg') ?>" style="width: 100%;" alt="" />
              </div>
              <div class="card-body">
                <h6 class="fw-bold fs-1 heading-color">
                  BNSP GELAR WORKSHOP DI LSP TANINDO
                </h6>
                <p class="mt-3 mb-md-0 mb-lg-2">
                  Tangerang (lsptanindo.com).
                  Menrupakan satu kehormatan tersendiri bagi para punggawa LSP Tanindo, bahwa pada hari Selasa, 29 Oktober 2024 bertempat di Ruang CBT lantai 3 kantor Harmoni Group di Vivo Business Park Tangerang ...
                </p>
                <br>
                <a href="<?= base_url('artikel/artikel_1') ?>" class="btn btn-lg btn-light text-success" type="button">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-5">
          <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
            <div class="text-center text-md-start card-hover">
              <!-- <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/growth.svg" height="60" alt="" /> -->
              <div class="d-flex justify-content-center align-items-center">
                <img class="ps-3 icons" src="<?= base_url('assets/images/artikel/artikel_2.jpg') ?>" style="width: 100%;" alt="" />
              </div>
              <div class="card-body">
                <h6 class="fw-bold fs-1 heading-color">
                  LSP TANINDO GELAR SERTIFIKASI PENYULUH PERGANIAN BATCH #1
                </h6>
                <p class="mt-3 mb-md-0 mb-lg-2">
                  Jakarta (lsptanindo.com).
                  Tak perlu menunggu lama, setelah lisensi LSP Tanindo diterima dari BNSP pada tanggal 29 Oktober 2024, maka kick off LSP Tanindo langsung melaksanakan kegiatan Sertifikasi Penyuluh Pertanian Swadaya pada tanggal 6-7 November 2024 ...
                </p>
                <br>
                <a href="<?= base_url('artikel/artikel_2') ?>" class="btn btn-lg btn-light text-success" type="button">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>