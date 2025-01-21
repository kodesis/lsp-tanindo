<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<style>
  /* Container for the background image */
  .image-container {
    position: relative;
    /* Needed for positioning the content overlay */
    width: 100%;
    /* Full width */
    height: 400px;
    /* Set the height of the image container, adjust as needed */
    background-size: cover;
    /* Ensure the image covers the container */
    background-position: center;
    /* Center the background image */
    background-repeat: no-repeat;
    /* Prevent repeating the background */
  }

  /* Overlay for the content area */
  .content-overlay {
    position: absolute;
    bottom: 0;
    /* Start the content from the bottom of the container */
    width: 100%;
    background-color: rgba(0, 0, 0, 0);
    /* Transparent background for content area */
  }

  /* Gradient overlay applied only to the text container */
  .gradient-overlay {
    background-image: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(255, 255, 255, 0) 100%);
    /* Black gradient */
    /* Gradient */
    padding: 15% 12px 12px;
    /* Padding around the text */
    /* text-align: center; */
    color: white;
    width: 100%;
  }

  /* Optional: Adjust the size of the title */
  .gradient-overlay h6 {
    color: white;
    font-size: 2rem;
    /* Adjust size of the title */
    font-weight: bold;
  }

  /* Ensure the title floats above the image */
  .position-relative {
    position: relative;
  }

  .position-absolute {
    position: absolute;
    top: 90%;
    /* Vertically center the title */
    left: 37%;
    /* Horizontally center the title */
    transform: translate(-50%, -50%);
    /* Adjust the center properly */
    color: white;
    /* Make the text white, or adjust as needed */
    font-size: 1.5rem;
    /* Adjust the font size if needed */
    font-weight: bold;
  }
</style>
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
            Bersertifikasi untuk
            <br class="d-block d-lg-block" />Masa Depan Pertanian
          </h1>
          <p class="mb-4 fs-0">
            <b>
              SERTIFIKAT LISENSI
              Nomor: BNSP-LSP-2525-ID
              23 Agustus 2024
            </b>
          </p>
          <a href="#tentang" class="btn btn-lg btn-success">Selengkapnya ...</a>
        </div>
      </div>
    </div>
  </section>
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/bootstrap.min.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/owl.carousel.min.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/ticker-style.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/flaticon.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/slicknav.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/animate.min.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/magnific-popup.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/fontawesome-all.min.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/themify-icons.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/slick.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/nice-select.css">
  <link rel="stylesheet" class="artikel-css" href="<?= base_url() ?>assets/artikel/css/style.css">
  <section class="py-5" id="artikel">
    <!-- Trending Area Start -->
    <div class="trending-area fix">
      <div class="container">
        <div class="trending-main">
          <div class="row">
            <div class="col-lg-8">
              <!-- Trending Top -->
              <?php
              if ($artikel_trending_now_1) {
              ?>
                <div class="trending-top mb-30">
                  <div class="trend-top-img">
                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_1->thumbnail) ?>" alt="">
                    <div class="trend-top-cap">
                      <!-- <span>Appetizers</span> -->
                      <h2><a href="<?= base_url('home/artikel_detail/' . $artikel_trending_now_1->Id) ?>"><?= $artikel_trending_now_1->title ?></a></h2>
                    </div>
                  </div>
                </div>
              <?php
              } else {
              ?>
                <div class="trending-top mb-30">
                  <div class="trend-top-img">
                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_2->thumbnail) ?>" alt="">
                    <div class="trend-top-cap">
                      <!-- <span>Appetizers</span> -->
                      <h2><a href="<?= base_url('home/artikel_detail/' . $artikel_trending_now_2->Id) ?>"><?= $artikel_trending_now_2->title ?></a></h2>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
              <!-- Trending Bottom -->
              <div class="trending-bottom">
                <div class="row">
                  <?php
                  if ($artikel_sub_trending_1) {
                    foreach ($artikel_sub_trending_1 as $a) {
                  ?>
                      <div class="col-lg-4">
                        <div class="single-bottom mb-35">
                          <div class="trend-bottom-img mb-30">
                            <img src="<?= base_url('uploads/artikel/' . $a->thumbnail) ?>" alt="">
                          </div>
                          <div class="trend-bottom-cap">
                            <!-- <span class="color1">Lifestyple</span> -->
                            <h4><a href="<?= base_url('home/artikel_detail/' . $a->Id) ?>"><?= $a->title ?></a></h4>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                  } else {
                    ?>
                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                      <div class="single-bottom mb-35 text-center">
                        <div class="trend-bottom-cap">
                          <h4>Artikel Tidak ada</h4>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <!-- Riht content -->
            <div class="col-lg-4">
              <?php
              if ($artikel_sub_trending_2) {

                foreach ($artikel_sub_trending_2 as $b) {
              ?>
                  <div class="trand-right-single d-flex">
                    <div class="trand-right-img">
                      <img src="<?= base_url('uploads/artikel/' . $b->thumbnail) ?>" alt="">
                    </div>
                    <div class="trand-right-cap">
                      <!-- <span class="color1">Concert</span> -->
                      <h4><a href="<?= base_url('home/artikel_detail/' . $b->Id) ?>"><?= $b->title ?></a></h4>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <div class="trand-right-single d-flex justify-content-center align-items-center" style="height: 100%; min-height: 200px;">
                  <div class="trand-right-cap text-center">
                    <h4>Artikel Tidak ada</h4>
                  </div>
                </div>

              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Trending Area End -->
    <?php
    if ($artikel_weekly_topnews) {

    ?>
      <!--   Weekly-News start -->
      <div class="weekly-news-area pt-50">
        <div class="container">
          <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
              <div class="col-lg-12">
                <div class="section-tittle mb-30">
                  <h3>Weekly Top News</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="weekly-news-active dot-style d-flex dot-style">
                  <?php
                  foreach ($artikel_weekly_topnews as $c) {
                  ?>
                    <div class="weekly-single">
                      <div class="weekly-img">
                        <img src="<?= base_url('uploads/artikel/' . $c->thumbnail) ?>" alt="">
                      </div>
                      <div class="weekly-caption">
                        <!-- <span class="color1">Strike</span> -->
                        <h4><a href="<?= base_url('home/artikel_detail/' . $c->Id) ?>"><?= $c->title ?></a></h4>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <!-- End Weekly-News -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="row d-flex justify-content-between">
              <div class="col-lg-3 col-md-3">
                <div class="section-tittle mb-30">
                  <h3>Whats New</h3>
                </div>
              </div>
              <div class="col-lg-9 col-md-9">
                <div class="properties__button">
                  <!--Nav Button  -->
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lifestyle</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Travel</a>
                      <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Fashion</a>
                      <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Sports</a>
                      <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Technology</a>
                    </div>
                  </nav>
                  <!--End Nav Button  -->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                  <!-- card one -->
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews1.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews3.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews4.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card two -->
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews1.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews3.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews4.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card three -->
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews1.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews3.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews4.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card fure -->
                  <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews1.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews3.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews4.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card Five -->
                  <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews1.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews3.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews4.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card Six -->
                  <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                    <div class="whats-news-caption">
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews1.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews2.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews3.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                          <div class="single-what-news mb-100">
                            <div class="what-img">
                              <img src="<?= base_url('assets/artikel/') ?>img/news/whatNews4.jpg" alt="">
                            </div>
                            <div class="what-cap">
                              <span class="color1">Night party</span>
                              <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Nav Card -->
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <!-- Section Tittle -->
            <div class="section-tittle mb-40">
              <h3>Follow Us</h3>
            </div>
            <!-- Flow Socail -->
            <div class="single-follow mb-45">
              <div class="single-box">
                <div class="follow-us d-flex align-items-center">
                  <div class="follow-social">
                    <a href="#"><img src="<?= base_url('assets/artikel/') ?>img/news/icon-fb.png" alt=""></a>
                  </div>
                  <div class="follow-count">
                    <span>8,045</span>
                    <p>Fans</p>
                  </div>
                </div>
                <div class="follow-us d-flex align-items-center">
                  <div class="follow-social">
                    <a href="#"><img src="<?= base_url('assets/artikel/') ?>img/news/icon-tw.png" alt=""></a>
                  </div>
                  <div class="follow-count">
                    <span>8,045</span>
                    <p>Fans</p>
                  </div>
                </div>
                <div class="follow-us d-flex align-items-center">
                  <div class="follow-social">
                    <a href="#"><img src="<?= base_url('assets/artikel/') ?>img/news/icon-ins.png" alt=""></a>
                  </div>
                  <div class="follow-count">
                    <span>8,045</span>
                    <p>Fans</p>
                  </div>
                </div>
                <div class="follow-us d-flex align-items-center">
                  <div class="follow-social">
                    <a href="#"><img src="<?= base_url('assets/artikel/') ?>img/news/icon-yo.png" alt=""></a>
                  </div>
                  <div class="follow-count">
                    <span>8,045</span>
                    <p>Fans</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- New Poster -->
            <div class="news-poster d-none d-lg-block">
              <img src="<?= base_url('assets/artikel/') ?>img/news/news_card.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Whats New End -->

  </section>

  <!-- All JS Custom Plugins Link Here here -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/vendor/modernizr-3.5.0.min.js"></script>
  <!-- Jquery, Popper, Bootstrap -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/vendor/jquery-1.12.4.min.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/popper.min.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/bootstrap.min.js"></script>
  <!-- Jquery Mobile Menu -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.slicknav.min.js"></script>

  <!-- Jquery Slick , Owl-Carousel Plugins -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/owl.carousel.min.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/slick.min.js"></script>
  <!-- Date Picker -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/gijgo.min.js"></script>
  <!-- One Page, Animated-HeadLin -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/wow.min.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/animated.headline.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.magnific-popup.js"></script>

  <!-- Breaking New Pluging -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.ticker.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/site.js"></script>

  <!-- Scrollup, nice-select, sticky -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.scrollUp.min.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.nice-select.min.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.sticky.js"></script>

  <!-- contact js -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/contact.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.form.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.validate.min.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/mail-script.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/jquery.ajaxchimp.min.js"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/plugins.js"></script>
  <script class="artikel_js" src="<?= base_url() ?>assets/artikel/js/main.js"></script>

  <!-- <script>
    window.onload = function() {
        // Remove CSS stylesheets
        var stylesheets = document.querySelectorAll('.artikel-css');
        stylesheets.forEach(function(sheet) {
            sheet.parentNode.removeChild(sheet);
        });
        console.log('CSS deleted successfully');

        // Remove JavaScript files
        var scripts = document.querySelectorAll('.artikel_js');
        scripts.forEach(function(script) {
            script.parentNode.removeChild(script);
        });
        console.log('JS deleted successfully');
    }
</script> -->