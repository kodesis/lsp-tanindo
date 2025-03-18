<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-light opacity-85 justify-content-between" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('home') ?>"><img class="d-inline-block align-top img-fluid" src="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-icon-tanindo.png" alt="" width="50" /><span class="text-theme font-monospace fs-4 ps-2">Tanindo</span></a>
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
            Berbagai Skema Program
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
      <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">SKEMA LSP TANINDO </h5>
      <h4><b>Berdasarkan Surat Keputusan Ketua BNSP Nomor KEP 1813/BNSP/VII/2024. </b></h4>
    </div>
  </div>
  <div class="row h-100 justify-content-center align-items-center mb-6">
    <div class="col-xl-12">
      <div class="row justify-content-center">
        <div class="col-md-4 mb-5">
          <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
            <div class="text-center text-md-start card-hover">
              <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/certification.svg" height="60" alt="" />
              <div class="card-body">
                <h6 class="fw-bold fs-1 heading-color">
                  Skema Sertifikasi Okupasi Penyuluh Pertanian Swadaya Fasilitator Mahir
                </h6>
                <p class="mt-3 mb-md-0 mb-lg-2">
                  Skema ini di buat untuk seluruh swadaya pertanian yang baru / sudah lama berkecimpung dalam Swadaya Fasilitator pertanian.
                </p>
                <br>
                <a href="<?= base_url('home/fasilitator') ?>" class="btn btn-lg btn-light text-success" type="button">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-5">
          <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
            <div class="text-center text-md-start card-hover">
              <!-- <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/growth.svg" height="60" alt="" /> -->
              <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/value.svg" height="60" alt="" />
              <div class="card-body">
                <h6 class="fw-bold fs-1 heading-color">
                  Skema Sertifikasi Okupasi Penyuluh Pertanian Swadaya Supervisor Madya
                </h6>
                <p class="mt-3 mb-md-0 mb-lg-2">
                  Skema ini di buat untuk seluruh swadaya pertanian yang sudah lama berkecimpung dalam Swadaya Fasilitator pertanian dan menjadi Supervisor penyuluh pertanian.
                </p>
                <br>
                <a href="<?= base_url('home/supervisor') ?>" class="btn btn-lg btn-light text-success" type="button">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="py-3">
    <div class="bg-holder" style="background-image:url(<?= base_url('assets/images/illustrations/') ?>how-it-works.png)"></div>
    <!-- ;background-position:center bottom;background-size:cover; -->
    <!--/.bg-holder-->
    <div class="container-lg">
      <div class="row justify-content-center">
        <div class="col-sm-8 col-md-9 col-xl-5 text-center pt-8">
          <h5 class="fw-bold fs-3 fs-xxl-5 lh-sm mb-3 text-white">Proses Sertifikasi</h5>
          <p class="mb-5 text-white">Berikut ini Beberapa Tahapan Dalam mendapatkan sertifikat profesi di LSP Tanindo</p>
        </div>
        <div class="col-sm-9 col-md-12 col-xxl-9">
          <div class="theme-tab">
            <ul class="nav justify-content-between">
              <li class="nav-item" role="presentation"><a class="nav-link active fw-semi-bold" href="#bootstrap-tab1" data-bs-toggle="tab" data-bs-target="#tab1" id="tab-1"><span class="nav-item-circle-parent"><span class="nav-item-circle">01</span></span></a></li>
              <li class="nav-item" role="presentation"><a class="nav-link fw-semi-bold" href="#bootstrap-tab2" data-bs-toggle="tab" data-bs-target="#tab2" id="tab-2"><span class="nav-item-circle-parent"><span class="nav-item-circle">02</span></span></a></li>
              <li class="nav-item" role="presentation"><a class="nav-link fw-semi-bold" href="#bootstrap-tab3" data-bs-toggle="tab" data-bs-target="#tab3" id="tab-3"><span class="nav-item-circle-parent"><span class="nav-item-circle">03</span></span></a></li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                <div class="row align-items-center my-6 mx-auto">
                  <div class="col-md-6 col-lg-5 offset-md-1">
                    <h3 class="fw-bold lh-base text-white">Pendaftaran</h3>
                  </div>
                  <div class="col-md-5 text-white offset-lg-1">
                    <p class="mb-0">calon peserta sertifikasi profesi harus mendaftar dan melengkapi persyaratan yang di tetnukan oleh lps terkait. persyaratan ini biasanya mencakup pengalaman kerja, pendidikan, dan portofolio yang relevan dengan bidang profesi</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-2">
                <div class="row align-items-center my-6 mx-auto">
                  <div class="col-md-6 col-lg-5 offset-md-1">
                    <h3 class="fw-bold lh-base text-white">Asesment Kompetensi</h3>
                  </div>
                  <div class="col-md-5 text-white offset-lg-1">
                    <p class="mb-0">setelah mendaftar, calon peserta akan menjalani proses assesmen kompetensi. Assesmen ini dapat berupa uji teori, praktik, atau kombinasi keduanya, yang bertujuan untuk mengevaluasi kemampuan peserta sesuai dengan standar kompetensi profesi</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-3">
                <div class="row align-items-center my-6 mx-auto">
                  <div class="col-md-6 col-lg-5 offset-md-1">
                    <h3 class="fw-bold lh-base text-white">Penerbitan Sertifikat</h3>
                  </div>
                  <div class="col-md-5 text-white offset-lg-1">
                    <p class="mb-0">Apabila peserta berhasil melewati proses assesment dan memenuhi persyaratan, LSP akan menerbitkan sertifikat kompetensi yang diakui secara nasional maupun internasional. Sertifikat ini akan menjadi bukti formal atas kompetensi yang dimiliki oleh peserta.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-lg-9 mx-auto text-center mb-3">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
                Proses Pendaftaran & Persyaratan Dasar Pemohon Sertifikasi
              </h5>
            </div>
          </div>
          <div class="row flex-center h-100 mb-5">
            <div class="col-xl-12">
              <div class="row justify-content-center">
                <div class="col-md-5 mb-6">
                  <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                    <div class="text-center text-md-start card-hover">
                      <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/value.svg" height="60" alt="Icon Nilai Sertifikat" />
                      <div class="card-body">
                        <h6 class="fw-bold fs-1 heading-color">
                          Proses Pendaftaran
                        </h6>
                        <p class="mt-3 mb-md-0 mb-lg-2">
                          1. LSP Tani Andalan Nasional Indonesia menginformasikan kepada pemohon persyaratan sertifikasi sesuai skema sertifikasi, jenis bukti, aturan bukti, proses sertifikasi, hak pemohon dan kewajiban pemohon, biaya sertifikasi dan kewajiban pemegang sertifikat kompetensi. <br>
                          2. Pemohon mengisi formulir Permohonan Sertifikasi (FR.APL.01) melalui <a href="https://lsptanindo.com" target="_blank">LSPTanindo</a>
                          <br>
                          3. Pemohon mengisi Formulir Asesmen Mandiri (FR.APL.02) dan dilengkapi dengan bukti pendukung yang relevan (jika ada). <br>
                          4. LSP Tani Andalan Nasional Indonesia menelaah berkas pendaftaran untuk mengkonfirmasi bahwa peserta sertifikasi memenuhi persyaratan yang ditetapkan dalam skema sertifikasi. <br>
                          5. Pemohon yang memenuhi persyaratan dasar sertifikasi dinyatakan sebagai peserta sertifikasi <br>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 mb-6">
                  <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                    <div class="text-center text-md-start card-hover">
                      <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/value.svg" height="60" alt="Icon Nilai Sertifikat" />
                      <div class="card-body">
                        <h6 class="fw-bold fs-1 heading-color">
                          Persyaratan Pemohon Sertifikasi
                        </h6>
                        <p class="mt-3 mb-md-0 mb-lg-2">
                          <!-- 1. Ijasah minimal Sekolah Menengah Atas/sederajat <br><br>
                          2. Telah mengikuti pendidikan dan pelatihan berbasis kompetensi bidang penyuluhan pertanian dari lembaga/instansi di bidang pertanian yang terakreditasi/kredibel <br><br>
                          3. Memiliki pengalaman sebagai penyuluh pertanian yang dikeluarkan oleh pimpinan dari lembaga/balai/instansi di bidang pertanian. <br> -->
                          1. Memiliki Ijazah minimal Sekolah Menengah Atas/sederajat <br><br>
                          2. Memiliki sertifikat pelatihan bidang pertanian <br><br>
                          3. Memiliki Surat Keterangan sebagai penyuluh pertanian <br><br>
                          <!-- 4. Foto 3 x 4 (3 lembar) latar belakang warna merah <br><br>
                          5. Memiliki Kartu Tanda Penduduk (KTP). <br> -->
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>
  </section>
  <!-- <section class="py-4">
    <p>
      Proses Pendaftaran
      1. LSP Tani Andalan Nasional Indonesia menginformasikan kepada pemohon persyaratan sertifikasi sesuai skema sertifikasi, jenis bukti, aturan bukti, proses sertifikasi, hak pemohon dan kewajiban pemohon, biaya sertifikasi dan kewajiban pemegang sertifikat kompetensi.
      2. Pemohon mengisi formulir Permohonan Sertifikasi (FR.APL.01) yang dilengkapi dengan bukti:
      a. Fotokopi Ijazah minimal Sekolah Menengah Atas/sederajat; atau
      b. Fotokopi sertifikat mengikuti pendidikan dan pelatihan berbasis kompetensi bidang penyuluhan pertanian dari lembaga/instansi di bidang pertanian yang terakreditasi/kredibel;
      c. Fotokopi Surat Keterangan sebagai penyuluh pertanian yang dikeluarkan oleh pimpinan dari lembaga/balai/instansi di bidang pertanian;
      d. Pasfoto 3 x 4 (3 lembar) latar belakang warna merah;
      e. Fotokopi Kartu Tanda Penduduk (KTP).
      3. Pemohon mengisi Formulir Asesmen Mandiri (FR.APL.02) dan dilengkapi dengan bukti pendukung yang relevan (jika ada).
      4. LSP Tani Andalan Nasional Indonesia menelaah berkas pendaftaran untuk mengkonfirmasi bahwa peserta sertifikasi memenuhi persyaratan yang ditetapkan dalam skema sertifikasi.
      5. Pemohon yang memenuhi persyaratan dasar sertifikasi dinyatakan sebagai peserta sertifikasi
    </p>
  </section> -->