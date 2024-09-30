<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img') ?>profile/favico.ico" />

  <style>
    @page {
      size: 11.69in 8.27in;
      margin: none;
      padding: none;
    }

    @page {
      size: A4 portrait;
    }

    .page {
      margin: none;
    }

    .lembar1 {
      /* background-image: url("<?= base_url('assets/img/') ?>kartu/front.png"); */
      /* background-size: cover;
      background-repeat: no-repeat; */
      padding: 0;
      margin: none;
    }

    .gambar_garuda {
      padding-left: 45%;
      padding-right: 45%;
    }

    img {
      width: 100%;
    }

    .judul {
      color: aqua;
    }
  </style>
  <!-- Load paper.css for happy printing -->
  <!-- <link rel="stylesheet" href="dist/paper.css"> -->

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <!-- <style>@page { size: A4 landscape }</style> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css"> -->
  <link rel="stylesheet" media="screen" href="main.css" />
  <link rel="stylesheet" media="print" href="print.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@300&display=swap" rel="stylesheet">
</head>

<!-- Set "A5" , "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 portrait">
  <div class="page">
    <div class="lembar1 sheet padding-10mm">
      <br><br>
      <div class="gambar_garuda">
        <img src="<?= base_url('assets/images/') ?>garuda.png" alt="Garuda"><br>
      </div>
      <p align="center">BADAN NASIONAL <br> SERTIFIKASI PROFESI<br><i>INDONESIAN PROFESSIONAL <br> CERTIFICATION AUTHORITY</i></p>

      <h3 align="center" class="judul"><b>SERTIFIKASI KOMPETENSI <br><i>CERTIFICATE OF COMPETENCE</i></b></h3>

      <p align="center"><b>No. <?= $data_sertif['certificate_number'] ?></b></p>

      <p align="center">Dengan ini menyatakan bahwa <br><i>This is to certify that</i></p>

      <h3 align="center"><b><?= $data_sertif['full_name'] ?></b></h3>

      <p align="center"><b>No. <?= $data_sertif['register_num'] ?></b></p>
      <br>
      <p align="center">Telah Kompeten Pada Bidang : <br><i>is competent in the area of :</i></p>
      <h3 align="center"><b>PENYULUH PERTANIAN <br><i>AGRICULTURAL EXTENSION</i></b></h3>
      <p align="center">Dengan kualifikasi / Kompetensi : <br><i>With Qualification / Competency :</i></p>
      <?php if ($data_sertif['course_uid'] = '1') { ?>
        <p align="center"><b>PENYULUH PERTANIAN SWADAYA FASILITATOR MAHIR</b><br><i>SELF-HELP AGRICULTURAL EXTENSION WORKER OF ADVANCED FACILITATOR</i></p>
      <?php } else { ?>
        <p align="center"><b>PENYULUH PERTANIAN SWADAYA SUPERVISOR MADYA</b><br><i>SELF-HELP AGRICULTURAL EXTENSION WORKER OF INTERMEDIATE SUPERVISOR</i></p>
      <?php } ?>
      <br>
      <p align="center">Sertifikat ini berlaku untuk : 4 (empat) Tahun <br><i>This Certificate is valid for : 4 (four) Years</i></p>
      <p align="center">Jakarta, <?= $tanggal = date('d F Y'); ?><br>Atas nama Badan Nasional Sertifikasi Profesi <br><i>On Behalf of Indonesian Professional Certification Authority</i><br><b>Lembaga Sertifikasi Profesi <br> Tani Andalan Nasional Indonesia (LSP TANINDO)</b> <br><i>Professional Certification Body of Indonesian National Mainstay Famers (LSP TANINDO)</i></p>
      <br><br><br>
      <p align="center"><b>Dr. Ir. H. Muhammad Sholeh, M.M.</b> <br>Ketua <br><i>Chairman</i></p>
    </div>
    <div class="lembar2 sheet padding-10mm">
      <?php if ($data_sertif['course_uid'] = '1') { ?>
        <img src="<?= base_url('assets/') ?>images/Swadaya_Fasilitator_Mahir.png" alt="Lembar belakang" class="img_lembar_belakang">
      <?php } else { ?>
        <img src="<?= base_url('assets/') ?>images/Swadaya_Supervisor_Madya.png" alt="Lembar belakang" class="img_lembar_belakang">
      <?php } ?>
    </div>
  </div>
  <script type="text/javascript">
    function printContent() {
      window.print()
    }
  </script>
</body>

</html>