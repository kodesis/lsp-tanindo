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
  <section class="py-5" id="artikel">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto text-center mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Artikel Tanindo</h5>
        </div>
      </div>
      <div class="row flex-center">
        <div class="col-xl-12">
          <div id="artikelCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php $i = 0; ?>
              <?php foreach ($data_artikel_populer as $article): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                      <div class="card h-100 shadow">
                        <img src="<?= base_url('uploads/artikel/' . $article['thumbnail']) ?>" class="card-img-top" alt="<?= $article['title']; ?>">
                        <div class="card-body text-center">
                          <h5 class="card-title"><?= $article['title'] ?></h5>
                          <p class="card-text">
                            <?= substr($article['text'], 0, strpos(wordwrap($article['text'], 100), "\n")); ?> . . .
                          </p>
                          <a href="<?= base_url('home/artikel_detail/' . $article['Id']) ?>" class="btn btn-primary">Read More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
              <?php endforeach; ?>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#artikelCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#artikelCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5" id="tentang">
    <div class="container">
      <div class="row mb-5 align-items-center">
        <div class="col-md-6 col-12 mb-5 text-center">
          <img src="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-tanindo.png" alt="" class="img-fluid" />
        </div>
        <div class="col-md-6 col-12 mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
            Tentang kami
          </h5>
          <p class="mb-5">
            Indonesia sebagai negara agraris dengan potensi
            geografis dan agroklimat serta kesuburan tanahnya pernah
            mengalami swasembada pangan beras pad atahun 1984. Salah
            satu kunci suksesnya adalah peran penyuluh pertanian dan
            program intensifikasi pertanian yang dilaksanakan secara
            profesional, konsisten dan berkelanjutan. Kini profesi
            penyuluh pertanian menuju ketahanan pangan, kemandirian
            pangan dan kedaulatan pangan. Oleh karena itu telah
            hadir Lembaga Sertifikasi Profesi (LSP) Tani Andalan
            Indonesia (Tanindo) untuk melaksanakan sertifikasi
            penyuluh pertanian agar eksistensinya lebih diakui serta
            perannya lebih besar bagi pembangunan pertanian di
            Indonesia. LSP Tanindo hadir untuk menjawab tantangan
            profesionalisme penyuluh dan petani Indonesia dengan
            sumberdaya manusia yang unggul, handal dan profesional.
            Kedepan Indonesia akan menjadi negara besar dengan
            ketahanan pangan yang kuat, produktivitas pertanian yang
            tinggi dan berkelanjutan.
          </p>
        </div>
      </div>
      <div class="row mb-5 align-items-center">
        <div class="col-md-6 col-12 mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Visi</h5>
          <p class="mb-5">
            Menjadi Lembaga Sertifikasi Profesi yang kompeten,
            kredibel, dan profesional dalam bidang pertanian.
          </p>
        </div>
        <div class="col-md-6 col-12 mb-3 text-center d-md-block d-none">
          <img src="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-tanindo.png" alt="" class="img-fluid" />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9 mx-auto text-center mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Misi</h5>
        </div>
      </div>
      <div class="row flex-center h-100 justify-content-center align-items-center mb-5">
        <div class="col-xl-10">
          <div class="row">
            <div class="col-md-4 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/farmer.svg" height="60" alt="" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Meningkatkan Kompetensi SDM Pertanian
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Meningkatkan keterampilan dan pengetahuan
                      tenaga kerja di sektor pertanian.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/certification.svg" height="60" alt="" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Melaksanakan Sertifikasi Profesi
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Melaksanakan proses sertifikasi bagi SDM
                      pertanian.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/collaboration.svg" height="60" alt="" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Kolaborasi dan Sinergi
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Mengembangkan kerjasama antar pemangku
                      kepentingan di bidang pertanian untuk
                      menciptakan tenaga kerja yang kompeten
                      dan kompetitif.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-9 mx-auto text-center mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
            Tujuan kami
          </h5>
        </div>
      </div>
      <div class="row flex-center h-100 mb-5">
        <div class="col-xl-12">
          <div class="row">
            <div class="col-md-3 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/certification.svg" height="60" alt="Icon Sertifikat" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Meyakinkan Kompetensi
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Membantu tenaga profesi meyakinkan kepada
                      organisasi/industri/kliennya bahwa
                      dirinya kompeten dalam bekerja atau
                      menghasilkan produk atau jasa dan
                      meningkatakan percaya diri tenaga
                      profesi.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/career.svg" height="60" alt="Icon Karir" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Merencanakan Karir
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Membantu tenaga profesi dalam
                      merencanakan karirnya dan mengukur
                      tingkat pencapaian kompetensi dalam
                      proses belajar di lembaga formal maupun
                      secara mandiri.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/regulation.svg" height="60" alt="Icon Regulasi" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Memenuhi Persyaratan Regulasi
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Membantu tenaga profesi dalam memenuhi
                      persyaratan regulasi.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/global.svg" height="60" alt="Icon Global" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Pengakuan Kompetensi Lintas Sektor dan
                      Negara
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Membantu pengakuan kompetensi lintas
                      sektor dan lintas negara serta membantu
                      tenaga profesi dalam promosi profesinya
                      di pasar tenaga kerja.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-5 text-center">
              <img src="<?= base_url('template/tanindo/') ?>assets/img/illustrations/target-asesi.jpg" alt="Alur sertifikasi kompetensi dan RCC" class="img-fluid w-50" />
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9 mx-auto text-center mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
            Mengapa Sertifikasi Profesi Penting?
          </h5>
        </div>
      </div>
      <div class="row flex-center h-100 mb-5">
        <div class="col-xl-12">
          <div class="row">
            <div class="col-md-4 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/value.svg" height="60" alt="Icon Nilai Sertifikat" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Nilai Sertifikat Profesi
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Sertifikat profesi memiliki nilai yang
                      diakui yang memberikan keuntungan dalam
                      mencapai tujuan karir dan memperkuat
                      posisi di tempat kerja.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/competence.svg" height="60" alt="Icon Kompetensi" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Menjamin Kompetensi
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      Sertifikasi profesi bertujuan untuk
                      memastikan kompetensi seseorang yang
                      telah didapatkan melalui pembelajaran,
                      pelatihan, maupun pengalaman kerja.
                      Sertifikasi diberikan oleh Lembaga
                      Sertifikasi Profesi (LSP) berlisensi dari
                      BNSP (Badan Nasional Standarisasi
                      Profesi).
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 card-span pt-6">
                <div class="text-center text-md-start card-hover">
                  <img class="ps-3 icons" src="<?= base_url('template/tanindo/') ?>assets/img/icons/independent.svg" height="60" alt="Icon BNSP" />
                  <div class="card-body">
                    <h6 class="fw-bold fs-1 heading-color">
                      Peran BNSP
                    </h6>
                    <p class="mt-3 mb-md-0 mb-lg-2">
                      BNSP adalah lembaga independen yang
                      dibentuk pemerintah Republik Indonesia
                      melalui Peraturan Pemerintah Nomor 23
                      Tahun 2004, dengan tugas pokok
                      melaksanakan sertifikasi kompetensi kerja
                      untuk berbagai profesi di Indonesia serta
                      Peraturan Pemerintah (PP) Nomor 10 Tahun
                      2018 tentang Badan Nasional Sertifikasi
                      Profesi.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5" id="alur">
    <div class="container">
      <div class="row flex-center h-100">
        <div class="col-md-6 text-center">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
            Alur sertifikasi kompetensi
          </h5>
          <img src="<?= base_url('template/tanindo/') ?>assets/img/illustrations/alur-sertifikasi.png" alt="Alur sertifikasi kompetensi dan RCC" class="img-fluid w-50" />
        </div>
        <div class="col-md-6 text-center">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
            Alur RCC (Recognition Current Competency)
          </h5>
          <img src="<?= base_url('template/tanindo/') ?>assets/img/illustrations/alur-rcc.png" alt="Alur sertifikasi kompetensi dan RCC" class="img-fluid w-50" />
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================-->
  <!-- <section> begin ============================-->
  <!-- <section class="z-index-1 cta"> -->
  <div class="container">
    <div class="row flex-center">
      <div class="col-12">
        <div class="card shadow h-100 py-5">
          <div class="card-body text-center">
            <h1 class="fw-semi-bold mb-4">The future of &nbsp;<span class="text-success">Farm Investing</span> &nbsp; in Your Hand</h1>
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/dgvYVEB5Xs8" title="KTNA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- </section> -->
  <!-- <section> close ============================-->
  <!-- ============================================-->

  <br><br><br>
  <div class="container">
    <div class="row flex-center">
      <div class="col-12">
        <div class="card shadow h-100 py-5">
          <div class="card-body text-center">
            <!-- <h1 class="fw-semi-bold mb-4">The future of &nbsp;<span class="text-success">Farm Investing &nbsp; in Your Hand</h1> -->
            <h1 class="fw-semi-bold mb-4">Photos of <span class="text-success">KTNA</span> Events and Activities</h1>
            <div id="gallery">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto1.jpg">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto2.jpg">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto3.jpg">
              <!-- <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto4.jpg"> -->
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto5.jpg">
              <!-- <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto6.jpg"> -->
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto7.jpg">
              <!-- <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto8.jpg"> -->
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto9.jpg">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto10.jpg">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto11.jpg">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto12.jpg">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto13.jpg">
              <img src="<?= base_url('assets/images/') ?>foto_for_web_ktna/foto14.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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
          <img src="<?= base_url('template/tanindo/') ?>assets/img/partners/logo-ktna.png" class="img-fluid" alt="Kelompok Tani Andalan Indonesia" />
        </div>
        <div class="col-6 col-md-3 col-lg-2 mb-4">
          <img src="assets/img/partners/logo-pppsi-old.png" class="img-fluid" alt="Kelompok Tani Andalan Indonesia" />
        </div>
        <div class="col-6 col-md-3 col-lg-2 mb-4">
          <img src="<?= base_url('template/tanindo/') ?>assets/img/gallery/logo-tanindo.png" class="img-fluid" alt="LSP Tanindo" />
        </div>
      </div>
    </div>
  </section>