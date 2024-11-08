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
                    <img src="<?= base_url('assets/images/artikel/artikel_2.jpg') ?>" alt="" class="img-fluid" />
                </div>
                <div class="col-md-6 col-12">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">
                        LSP TANINDO GELAR SERTIFIKASI PENYULUH PERGANIAN BATCH #1
                    </h5>
                    <p style="text-align: justify;" class=" mb-5">
                        Jakarta (lsptanindo.com)
                        <br>
                        Tak perlu menunggu lama, setelah lisensi LSP Tanindo diterima dari BNSP pada tanggal 29 Oktober 2024, maka kick off LSP Tanindo langsung melaksanakan kegiatan Sertifikasi Penyuluh Pertanian Swadaya pada tanggal 6-7 November 2024. Kegiatan tersebut dilaksanakan di Wisma YAMPI Pasar Minggu Jakarta dilaksanakan.Diawali dengan acara pra asesmen pada tanggal 6 November 2024 yang dibuka oleh Bapak Ir. H. M. Yadi Sofyan Noor, SH. MH. yang sekaligus sebagai ketua Dewan Pengarah LSP Tanindo.
                        <br>
                        <br>

                    </p>
                </div>
            </div>
            <div class="row mb-5 align-items-center">
                <div class="col-md-12 col-12 mb-3">
                    <p style="text-align: justify;" class="mb-5">
                        Acara syukuran dan pembukaan batch #1 juga dihadiri oleh ketua LSP Tanindo M Sholeh, para anggota Dewan Pengarah, Bapak Soeryo, Bapak Bharata, Bapak Ruslim dan Bapak Eddi Budiono. Agenda acara dilanjutkan dengan asesmen sertifikasi penyuluh pertanian swadaya yang diikuti oleh 10 peserta yang tergabung dalam batch #1.
                        <br>
                        <br>
                        Dalam kesempatan tersebut disampaikan pentingny penyuluh pertanian yang kompeten sebagai salah satu penunjang dalam keberhasilan swasembada pangan dan ketahanan pangan yang telah dicanangkan Presiden Prabowo pada saat pelantikan Presiden pada tanggal 20 Oktober 2024 yang lalu. Sejalan denvan tekad pemerintah dalam mewujudkan swasembada pangan maka KTNA (Kontak Tani Nelayan Andalan) dan Perkumpulan Penyuluh Pertanian Swadaya Indonesia (PPPSI) telah antisipatif mendirikan Lembaga Sertifikasi Profesi Tani Andalan Nasional Indonesia (LSP Tanindo) dengan Lisensi Nomor BNSP-LSP-2525-ID pada tanggal 23 Agustus 2024.
                        <br>
                        <br>
                        Dengan potensi lebih dari 26 ribu penyuluh pertanian swadaya yang tersebar di seluruh Indonesia, maka menjadi tantangan tersendiri bagi LSP Tanindo untuk melaksanakan sertifikasi penyuluh pertanian, apalagi dengan jumlah asesor kompetensi yang masih terbatas. Tentunya diperlukan keseriusan dan fokus kegiatan sertifikasi para penyuluh pertanian sebagai garda terdepan suksesnya swasembada pangan dan ketahanan pangan berkelanjutan. Dengan tekad pemerintah Prabowo Gibran yang menargetkan perluasan lahan pangan 1 juta hektar per tahun dari tahun 2025-2029 dan kenaikan 2.5 juta ton pangan/tahun maka kompetensi SDM Penyuluh pertanian akan menjadi kunci strategis keberhasilan swasembada pangan dimasa depan. Semoga.... (ms10).
                    </p>
                </div>
            </div>
        </div>
    </section>