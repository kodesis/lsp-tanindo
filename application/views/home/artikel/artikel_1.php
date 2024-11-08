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
    <section class="py-5" id="tentang">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-12 mb-5 text-center">
                    <img src="<?= base_url('assets/images/artikel/artikel_1.jpg') ?>" alt="" class="img-fluid" />
                </div>
                <div class="col-md-6 col-12">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
                        BNSP GELAR WORKSHOP DI LSP TANINDO
                    </h5>
                    <p style="text-align: justify;" class=" mb-5">
                        Tangerang (lsptanindo.com).
                        <br>
                        Menrupakan satu kehormatan tersendiri bagi para punggawa LSP Tanindo, bahwa pada hari Selasa, 29 Oktober 2024 bertempat di Ruang CBT lantai 3 kantor Harmoni Group di Vivo Business Park Tangerang, telah dilaksanakan warkshop pengelolaan akun LSP pada Sistem Informasi (Sisfo BNSP) yang dilaksanakan oleh BNSP (Badan Nasional Sertifikasi Profesi).
                        <br>
                        <br>
                        Kegiatan tersebut dihadiri oleh 9 orang terdiri dari 2 orang instruktur dari BNSP dan 7 orang dari 4 LSP, yaitu : LSP Tenik Manajemen Industri, LSP Institut Informatika dan Bisnis Darmajaya Lampung, LSP SMKN 1 Anyer serta LSP Tani Andalan Nasional Indonesia (Tanindo) sekaligus sebagai tuan rumah yang kebetulan di ruangan yang dilengkapi fasilitas CBT (Computer Base Test) dan LAN (Local Area Network) sehingga dapat menunjangbkelancaran acara.
                    </p>
                </div>
            </div>
            <div class="row mb-5 align-items-center">
                <div class="col-md-12 col-12 mb-3">
                    <p style="text-align: justify;" class="mb-5">
                        Dalam kesempatan tersebut materi disampaikan oleh Bapak Syamsudin dan Ibu Desy selaku pengelola sisfo BNSP selama 2 session. Session I berisikan materi penginputan data LSP dan session II berisikan materi penginputan data dan pengajuan blanko sertifikasi. Selama kedua session tersebut sangat interakrif dan tanya jawab peserta dengan instruktur sehingga metode learnin by doing langsung praktek dapat memberikan pemahaman yang applicable dalam pengelolaan LSP.
                        <br>
                        <br>
                        Secara umum acara yang terselenggara atas kerjasama BNSP dengan LSP Tanindo berjalanlancar dan sukses. Acara diakhiri dengan foto bersama seluruh peserta dan instruktur dengan senyum puas atas lancarnya acara dan pemahaman yang mendalam dari seluruh peserta. Semoga acara ini bermanfaat bagi seluruh yang berkepentingan. (msholeh10@com)

                    </p>
                </div>
            </div>
        </div>
    </section>