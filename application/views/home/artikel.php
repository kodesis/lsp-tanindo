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
  <section class="py-2" id="header">
    <div class="row mb-3" id="skema">
      <div class="col-lg-9 mx-auto text-center">
        <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Artikel LSP TANINDO </h5>
        <marquee width="90%" direction="left">
          <h4><b>Kado spesial HUT Ketua PPPSI H Otong Wiranta kompeten penyuluh pertanian berstandar Nasional BNSP</b></h4>
        </marquee>
      </div>
    </div>
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-xl-10">
        <div class="row justify-content-center">
          <?php
          if (!empty($data_artikel_populer)) {
            foreach ($data_artikel_populer as $populer) {
          ?>
              <div class="col-md-3 mb-5">
                <a href="<?= base_url('home/artikel_detail/' . $populer['Id']) ?>">
                  <!-- <div class="card h-10 shadow px-4 px-md-2 card-span"> -->
                  <div class="card h-10 px-4 px-md-2 card-span">
                    <div class="text-center text-md-start card-hover">
                      <div class="d-flex justify-content-center align-items-center">
                        <img class="icons" src="<?= base_url('uploads/artikel/' . $populer['thumbnail']) ?>" style="width: 100%;" alt="" />
                      </div>
                      <div class="card-body">
                        <p class="fs-0 heading-color">
                          <?= $populer['title'] ?>
                        </p>
                      </div>
                      <!-- <div class="card-foot">
                        <hr>
                        <div class="row">
                          <div class="col-md-8">
                            <p>
                              <?= date('d F Y', strtotime($populer['tanggal'])) ?>
                            </p>
                          </div>
                          <div class="col-md-4 justify-content-end">
                            <p>
                              <i class="bi bi-eye"></i>&nbsp;
                              <?= $populer['view_count'] ?>
                            </p>
                          </div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </a>
              </div>
            <?php
            }
          } else {
            ?>
            <p class="fw-bold fs-0 heading-color">
              DATA TIDAK ADA
            </p>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <hr style="height:5px">

    <div class="row justify-content-center align-items-center" id="skema">
      <div class="col-lg-9 mx-auto text-center mb-3">
        <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">News Feed </h5>
        <h4><b>Artikel Terbaru</b></h4>
        <!-- Form Pencarian -->
        <form action="<?= base_url('home/artikel') ?>" method="get">
          <div class="input-group mb-3 input-group-append">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Title" value="<?= isset($search) ? $search : '' ?>">
            <button class="btn btn-md btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    <!-- <div class="row h-100 justify-content-center align-items-center mb-6"> -->
    <div class="container-fluid">
      <div class="row h-100 mb-6">
        <div class="col-xl-8">
          <div class="col-md-12 row ">
            <!-- <div class="row"> -->
            <?php
            if (!empty($data_artikel)) {
              $no = 1;
              foreach ($data_artikel as $artikel) {
                if ($no == 1) {
            ?>
                  <div class="col-md-12 mb-2">
                    <div class="card h-100 px-4 px-md-2 px-lg-3 card-span">
                      <div class="text-center text-md-start card-hover">
                        <div class="row align-items-center">
                          <!-- Wrap the whole content with the link -->
                          <a href="<?= base_url('home/artikel_detail/' . $artikel['Id']) ?>" style="text-decoration: none; color: inherit;">
                            <div class="col-md-12 position-relative">
                              <div class="image-container" style="background-image: url('<?= base_url('uploads/artikel/' . $artikel['thumbnail']) ?>');">
                                <div class="content-overlay">
                                  <div class="gradient-overlay">
                                    <h6 class="fw-bold fs-1 heading-color"><?= $artikel['title'] ?></h6>
                                    <p style="font-size: 0.8rem;">
                                      <?php
                                      // PHP logic remains the same
                                      $date_now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                                      $date_artikel = new DateTime($artikel['tanggal'], new DateTimeZone('Asia/Jakarta'));
                                      $interval = $date_now->diff($date_artikel);
                                      if ($interval->y > 0) {
                                        $time_ago = $interval->y . ' Tahun' . ($interval->y > 1 ? 's' : '') . ' lalu';
                                      } elseif ($interval->m > 0) {
                                        $time_ago = $interval->m . ' Bulan' . ($interval->m > 1 ? 's' : '') . ' lalu';
                                      } elseif ($interval->d > 0) {
                                        $time_ago = $interval->d . ' Hari' . ($interval->d > 1 ? 's' : '') . ' lalu';
                                      } elseif ($interval->h > 0) {
                                        $time_ago = $interval->h . ' Jam' . ($interval->h > 1 ? 's' : '') . ' lalu';
                                      } elseif ($interval->i > 0) {
                                        $time_ago = $interval->i . ' Menit' . ($interval->i > 1 ? 's' : '') . ' lalu';
                                      } else {
                                        $time_ago = $interval->s . ' Detik' . ($interval->s > 1 ? 's' : '') . ' lalu';
                                      }
                                      echo $time_ago;
                                      ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a> <!-- Closing the <a> tag here -->
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <div class="col-md-12 mb-2">
                    <div class="card h-100 px-4 px-md-2 px-lg-3 card-span">
                      <div class="text-center text-md-start card-hover">
                        <div class="row align-items-center">
                          <!-- Image section on the left -->
                          <div class="col-md-4">
                            <img class="icons" src="<?= base_url('uploads/artikel/' . $artikel['thumbnail']) ?>" style="width: 100%; height: auto;" alt="" />
                          </div>
                          <!-- Title and text content section on the right -->
                          <div class="col-md-8">
                            <!-- Wrap only the title with the anchor tag -->
                            <a href="<?= base_url('home/artikel_detail/' . $artikel['Id']) ?>" class="text-decoration-none">
                              <h6 class="fw-bold fs-1 heading-color"><?= $artikel['title'] ?></h6>
                            </a>
                            <p class="mt-3 mb-md-0 mb-lg-2">
                              <?php echo substr($artikel['text'], 0, strpos(wordwrap($artikel['text'], 200), "\n")); ?> . . .
                            </p>
                            <p style="font-size: 0.8rem;">
                              <?php
                              // Set the current date and time based on Asia/Jakarta timezone
                              $date_now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                              // Get the artikel's date (assuming it's in 'Y-m-d H:i:s' format)
                              $date_artikel = new DateTime($artikel['tanggal'], new DateTimeZone('Asia/Jakarta'));

                              // Calculate the difference between now and the artikel's date
                              $interval = $date_now->diff($date_artikel);

                              // Format the difference
                              if ($interval->y > 0) {
                                // If the difference is in years
                                $time_ago = $interval->y . ' Tahun' . ($interval->y > 1 ? 's' : '') . ' lalu';
                              } elseif ($interval->m > 0) {
                                // If the difference is in months
                                $time_ago = $interval->m . ' Bulan' . ($interval->m > 1 ? 's' : '') . ' lalu';
                              } elseif ($interval->d > 0) {
                                // If the difference is in days
                                $time_ago = $interval->d . ' Hari' . ($interval->d > 1 ? 's' : '') . ' lalu';
                              } elseif ($interval->h > 0) {
                                // If the difference is in hours
                                $time_ago = $interval->h . ' Jam' . ($interval->h > 1 ? 's' : '') . ' lalu';
                              } elseif ($interval->i > 0) {
                                // If the difference is in minutes
                                $time_ago = $interval->i . ' Menit' . ($interval->i > 1 ? 's' : '') . ' lalu';
                              } else {
                                // If the difference is in seconds
                                $time_ago = $interval->s . ' Detik' . ($interval->s > 1 ? 's' : '') . ' lalu';
                              }

                              // Display the result
                              echo $time_ago;
                              ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php
                }
                $no++;
              }
            } else {
              ?>
              <p class="fw-bold fs-0 heading-color">
                DATA TIDAK ADA
              </p>
            <?php
            }
            ?>
          </div>
          <div class="pagination-links d-flex justify-content-end">
            <?= $pagination ?>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="row justify-content-center">
            <!-- <div class="row"> -->
            <div class="col-md-10">
              <div class="card h-100 shadow px-4 px-md-2 px-lg-3 pt-2">
                <div class="text-center text-md-start">
                  <div class="card-body">
                    <h6 class="fw-bold fs-1">
                      Berita Populer
                    </h6>
                    <?php
                    if (!empty($data_artikel_populer)) {
                      foreach ($data_artikel_populer as $populer) {
                    ?>
                        <hr style="height: 10px;">
                        <a href="<?= base_url('home/artikel_detail/' . $populer['Id']) ?>">
                          <p class="mt-3 mb-md-0 mb-lg-2">
                            <?= $populer['title'] ?>

                            <br>
                            <?php echo substr($populer['text'], 0, strpos(wordwrap($populer['text'], 100), "\n")); ?> . . .
                            <br>
                            <div class="row" style="font-size: 0.8rem;">
                              <div class="col-md-8">
                                <?php
                                // Set the current date and time based on Asia/Jakarta timezone
                                $date_now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                                // Get the artikel's date (assuming it's in 'Y-m-d H:i:s' format)
                                $date_artikel = new DateTime($populer['tanggal'], new DateTimeZone('Asia/Jakarta'));

                                // Calculate the difference between now and the artikel's date
                                $interval = $date_now->diff($date_artikel);

                                // Format the difference
                                if ($interval->y > 0) {
                                  // If the difference is in years
                                  $time_ago = $interval->y . ' Tahun' . ($interval->y > 1 ? 's' : '') . ' lalu';
                                } elseif ($interval->m > 0) {
                                  // If the difference is in months
                                  $time_ago = $interval->m . ' Bulan' . ($interval->m > 1 ? 's' : '') . ' lalu';
                                } elseif ($interval->d > 0) {
                                  // If the difference is in days
                                  $time_ago = $interval->d . ' Hari' . ($interval->d > 1 ? 's' : '') . ' lalu';
                                } elseif ($interval->h > 0) {
                                  // If the difference is in hours
                                  $time_ago = $interval->h . ' Jam' . ($interval->h > 1 ? 's' : '') . ' lalu';
                                } elseif ($interval->i > 0) {
                                  // If the difference is in minutes
                                  $time_ago = $interval->i . ' Menit' . ($interval->i > 1 ? 's' : '') . ' lalu';
                                } else {
                                  // If the difference is in seconds
                                  $time_ago = $interval->s . ' Detik' . ($interval->s > 1 ? 's' : '') . ' lalu';
                                }

                                // Display the result
                                echo $time_ago;
                                ?> </div>
                              <div class="col-md-4 justify-content-end">
                                <i class="bi bi-eye"></i>&nbsp;
                                <?= $populer['view_count'] ?>
                              </div>
                            </div>

                          </p>
                        </a>
                      <?php
                      }
                    } else {
                      ?>
                      <p class="fw-bold fs-0 heading-color">
                        DATA TIDAK ADA
                      </p>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>