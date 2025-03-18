<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
  }

  .center {
    text-align: center;
    vertical-align: middle;
  }

  textarea {
    width: 100%;
    height: 50px;
  }

  .signature-pad {
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    height: 260px;
  }

  .custom-disabled {
    pointer-events: none;
    /* Prevent interactions */
    opacity: 1;
    /* Keep it fully visible */
    filter: grayscale(0%);
    /* Prevent it from looking greyed out */
  }
</style>
<div class="content-wrapper">
  <?php if ($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <!-- <form action="<?= base_url('user/save_apl02/' . $this->uri->segment(3)) ?>" method="POST" enctype="multipart/form-data"> -->
      <div class="form-group">
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 1</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.002.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Mengorganisasikan Pekerjaan</td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Mempersiapkan pengorganisasian pekerjaan<br>
              <ul>
                <li>Kriteria Unjuk Kerja:</li>
                <li>1.1 Jenis pekerjaan yang akan diorganisir ditetapkan sesuai kebutuhan.</li>
                <li>1.2 Tim kerja ditetapkan sesuai dengan tugas kerja.</li>
                <li>1.3 Sarana dan prasarana ditetapkan sesuai jenis pekerjaan.</li>
                <li>1.4 Rencana kerja pengorganisasian pekerjaan disusun.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_002_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_002_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_002_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_002_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_002_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_002_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>

            <td>
              <?php if (!empty($jawaban['M_74PPP01_002_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_002_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_002_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_002_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_002_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_002_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_002_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_002_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_002_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melaksanakan pengorganisasian pekerjaan
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Metode pengorganisasian pekerjaan ditetapkan sesuai rencana.</li>
                <li>2.2 Pengorganisasian pekerjaan dilaksanakan sesuai metode.</li>
                <li>2.3 Laporan pengorganisasian pekerjaan disusun sesuai hasil pelaksanaan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_002_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_002_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_002_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_002_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_002_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_002_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>

            <td>
              <?php if (!empty($jawaban['M_74PPP01_002_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_002_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_002_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_002_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_002_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_002_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_002_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_002_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_002_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 2</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.006.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Menerapkan Prosedur Keselamatan dan Kesehatan Kerja (K3) </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Merencanakan prosedur Keselamatan dan Kesehatan Kerja (K3)
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Alat pelindung diri diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Perlengkapan kerja dan material dipilih sesuai standar.</li>
                <li>1.3 Material berbahaya dan bahaya lain yang berdampak pada pelaksana, pekerja lain, tanaman dan hewan di area kerja diidentifikasi.</li>
                <li>1.4 Rencana prosedur Keselamatan dan Kesehatan Kerja (K3) ditetapkan sesuai prosedur.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_006_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_006_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_006_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_006_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_006_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_006_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>

            <td>
              <?php if (!empty($jawaban['M_74PPP01_006_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_006_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_006_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_006_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_006_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_006_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_006_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_006_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_006_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>

            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Menerapkan prosedur Keselamatan dan Kesehatan Kerja (K3)
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Peralatan pelindung digunakan sesuai spesifikasi dan standar.</li>
                <li>2.2 Lingkungan kerja dibersihkan sesuai standar.</li>
                <li>2.3 Penerapan Keselamatan dan Kesehatan Kerja (K3) dilakukan sesuai standar.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_006_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_006_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_006_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_006_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_006_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_006_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>

            <td>
              <?php if (!empty($jawaban['M_74PPP01_006_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_006_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_006_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_006_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_006_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_006_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_006_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_006_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_006_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 3</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.008.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Menyusun Data Potensi Wilayah </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Menyiapkan rencana pengumpulan data potensi wilayah
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Jenis data dan potensi wilayah diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Metode pengumpulan data ditetapkan sesuai kebutuhan.</li>
                <li>1.3 Instrumen pengumpulan data potensi wilayah disusun sesuai prosedur.</li>
                <li>1.4 Rencana kegiatan pengumpulan data potensi wilayah ditetapkan sesuai rencana.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_008_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_008_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_008_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_008_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_008_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_008_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_008_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_008_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_008_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_008_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_008_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_008_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_008_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_008_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_008_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melakukan Analisis data potensi wilayah
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Cara analisis data potensi wilayah dan permasalahan agribisnis ditetapkan.</li>
                <li>2.2 Interpretasi hasil analisis data potensi wilayah dan permasalahan agribisnis ditetapkan.</li>
                <li>2.3 Pemetaan data potensi wilayah dan permasalahan agribisnis disusun sesuai prosedur.</li>
                <li>2.4 Permasalahan agribisnis dirumuskan berdasarkan wilayah usaha.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_008_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_008_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_008_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_008_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_008_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_008_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_008_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_008_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_008_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_008_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_008_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_008_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_008_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_008_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_008_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 4</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.009.03</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Menyusun Programa Penyuluhan Pertanian </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Menyiapkan penyusunan program penyuluhan pertanian
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Tahapan dan mekanisme penyusunan programa diidentifikasi sesuai prosedur.</li>
                <li>1.2 Sintesis kegiatan penyuluhan pertanian berdasarkan program pembangunan wilayah diidentifikasi sesuai ketentuan.</li>
                <li>1.3 Rencana penyusunan programa ditetapkan sesuai prosedur.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_009_03][1]" value="1" <?php if (isset($jawaban['M_74PPP01_009_03']['1'][0]->kompeten) && $jawaban['M_74PPP01_009_03']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_009_03][1]" value="0" <?php if (isset($jawaban['M_74PPP01_009_03']['1'][0]->kompeten) && $jawaban['M_74PPP01_009_03']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_009_03']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_009_03']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_009_03']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_009_03']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_009_03']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_009_03']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_009_03']['1'][0]->files) && !empty($jawaban['M_74PPP01_009_03']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_009_03']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Menyusun program penyuluhan pertanian
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Rumusan keadaan potensi agribisnis ditetapkan sesuai peraturan.</li>
                <li>2.2 Tujuan programa dirumuskan berdasarkan prinsip SMART.</li>
                <li>2.3 Rumusan masalah penyuluhan ditetapkan sesuai peraturan.</li>
                <li>2.4 Rencana kegiatan penyuluhan pertanian disusun dalam bentuk matriks.</li>
                <li>2.5 Programa penyuluhan pertanian disusun sesuai peraturan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_009_03][2]" value="1" <?php if (isset($jawaban['M_74PPP01_009_03']['2'][0]->kompeten) && $jawaban['M_74PPP01_009_03']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_009_03][2]" value="0" <?php if (isset($jawaban['M_74PPP01_009_03']['2'][0]->kompeten) && $jawaban['M_74PPP01_009_03']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_009_03']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_009_03']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_009_03']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_009_03']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_009_03']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_009_03']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_009_03']['2'][0]->files) && !empty($jawaban['M_74PPP01_009_03']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_009_03']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 1</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.001.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Melakukan Komunikasi Efektif </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Mempersiapkan komunikasi yang efektif
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Karakteristik komunikan diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Tujuan komunikasi ditetapkan sesuai karakteristik komunikan.</li>
                <li>1.3 Unsur komunikasi ditetapkan sesuai tujuan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_001_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_001_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_001_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_001_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_001_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_001_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_001_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_001_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_001_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_001_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_001_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_001_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_001_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_001_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_001_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Menerapkan komunikasi efektif
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Strategi/teknik komunikasi efektif ditetapkan sesuai tujuan komunikasi.</li>
                <li>2.2 Pesan disampaikan secara efektif.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_001_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_001_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_001_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_001_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_001_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_001_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_001_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_001_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_001_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_001_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_001_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_001_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_001_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_001_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_001_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 2</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.005.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Menerapkan Teknologi Informasi Komunikasi </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Menyiapkan rencana penyusunan dalam pemanfaatan teknologi informasi komunikasi terkini
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Teknologi informasi komunikasi diidentifikasi sesuai dengan perkembangan teknologi terkini.</li>
                <li>1.2 Materi teknologi informasi komunikasi ditetapkan sesuai tujuan.</li>
                <li>1.3 Rencana kegiatan teknologi informasi komunikasi disusun sesuai ketentuan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_005_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_005_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_005_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_005_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_005_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_005_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_005_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_005_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_005_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_005_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_005_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_005_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_005_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_005_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_005_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Mengaplikasikan penerapan teknologi informasi komunikasi
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Teknologi informasi diaplikasikan sesuai dengan pedoman.</li>
                <li>2.2 Penerapan teknologi informasi komunikasi dilaporkan kepada pihak terkait.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_005_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_005_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_005_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_005_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_005_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_005_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_005_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_005_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_005_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_005_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_005_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_005_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_005_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_005_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_005_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 3</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.007.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Membangun Jejaring Kerjasama </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Menyiapkan rencana membangun jejaring kerjasama
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Mitra kerja ditetapkan sesuai kebutuhan.</li>
                <li>1.2 Materi membangun jejaring kerjasama dianalisis sesuai kebutuhan.</li>
                <li>1.3 Jejaring kerjasama dijajagi sesuai kesepakatan para pihak.</li>
                <li>1.4 Rencana membangun jejaring kerjasama disusun sesuai kesepakatan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_007_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_007_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_007_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_007_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_007_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_007_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_007_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_007_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_007_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_007_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_007_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_007_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_007_01']['1']->files) && !empty($jawaban['M_74PPP01_007_01']['1']->files)) {
                $files = json_decode($jawaban['M_74PPP01_007_01']['1']->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Mengembangkan jejaring kerjasama
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Jejaring kerjasama dikembangkan sesuai rencana.</li>
                <li>2.2 Kesepakatan pihak-pihak yang akan bermitra dibuat sesuai ketentuan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_007_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_007_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_007_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_007_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_007_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_007_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_007_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_007_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_007_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_007_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_007_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_007_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php if (isset($jawaban['M_74PPP01_007_01']['2'][0]->files)) {
                $no = 1;
                foreach (json_decode($jawaban['M_74PPP01_007_01']['2'][0]->files) as $file) {
              ?>
                  <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                }
              } ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 4</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.010.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Proses Pembelajaran </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Menyiapkan materi pembelajaran
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Sasaran pembelajaran diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Materi inovatif kekinian ditetapkan sesuai dengan sasaran pembelajaran.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_010_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_010_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_010_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_010_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_010_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_010_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_010_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_010_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_010_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_010_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_010_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_010_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_010_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_010_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_010_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Menentukan media metode pembelajaran
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Jenis media penyampaian informasi diidentifikasi sesuai kelompok sasaran.</li>
                <li>2.2 Metode pembelajaran diidentifikasi sesuai kelompok sasaran.</li>
                <li>2.3 Media metode pembelajaran ditetapkan sesuai hasil identifikasi.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_010_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_010_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_010_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_010_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_010_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_010_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_010_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_010_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_010_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_010_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_010_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_010_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_010_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_010_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_010_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Melakukan pembelajaran kepada sasaran
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Proses pembelajaran dilakukan sesuai dengan metode pembelajaran.</li>
                <li>3.2 Laporan pelaksanaan proses belajar disusun sesuai prosedur.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_010_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_010_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_010_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_010_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_010_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_010_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_010_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_010_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_010_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_010_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_010_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_010_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_010_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_010_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_010_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>

        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 5</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.013.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Penerapan Teknologi </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Melakukan penyiapan fasilitasi penerapan teknologi
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Data teknologi pertanian diidentifikasi sesuai dengan kebutuhan petani spesifik lokasi.</li>
                <li>1.2 Jenis teknologi pertanian ditetapkan sesuai dengan kebutuhan petani spesifik lokasi.</li>
                <li>1.3 Rencana fasilitasi penerapan teknologi disusun sesuai ketentuan.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_013_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_013_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_013_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_013_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_013_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_013_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_013_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_013_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_013_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_013_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_013_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_013_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_013_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_013_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_013_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melakukan pelaksanaan fasilitasi penerapan teknologi
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Fasilitasi penerapan teknologi dilaksanakan kepada petani dalam bentuk kegiatan.</li>
                <li>2.2 Hasil fasilitasi penerapan teknologi petani dievaluasi dengan melihat capaian keberhasilan.</li>
                <li>2.3 Model penerapan teknologi ditetapkan sesuai hasil evaluasi.</li>
                <li>2.4 Laporan pelaksanaan fasilitasi penerapan teknologi disusun.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_013_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_013_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_013_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_013_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_013_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_013_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_013_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_013_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_013_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_013_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_013_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_013_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_013_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_013_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_013_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 6</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.014.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Peningkatan Produktivitas Usahatani </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Melakukan persiapan fasilitasi peningkatan produktivitas usahatani
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Data peningkatan skala usahatani diidentifikasi sesuai prosedur.</li>
                <li>1.2 Hasil identifikasi data peningkatan skala usaha tani dianalisis sesuai ketentuan.</li>
                <li>1.3 Rencana kegiatan pengembangan usahatani disusun sesuai petunjuk teknis.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_014_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_014_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_014_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_014_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_014_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_014_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_014_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_014_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_014_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_014_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_014_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_014_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_014_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_014_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_014_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melakukan pelaksanaan fasilitasi peningkatan produktivitas usahatani
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Fasilitasi kegiatan peningkatan produktivitas ditetapkan sesuai spesifik lokasi.</li>
                <li>2.2 Hasil kegiatan fasilitasi dilaporkan sesuai petunjuk teknis.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_014_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_014_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_014_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_014_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_014_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_014_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_014_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_014_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_014_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_014_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_014_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_014_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_014_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_014_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_014_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 7</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.015.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Menumbuhkembangkan Pos Penyuluhan Desa </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Melakukan persiapan fasilitasi penumbuhan Pos Penyuluhan Desa (Posluhdes)
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Data calon pos penyuluhan desa diidentifikasi sesuai petunjuk teknis.</li>
                <li>1.2 Metode penumbuhan Pos Penyuluhan Desa (Posluhdes) ditetapkan sesuai petunjuk teknis.</li>
                <li>1.3 Rencana kegiatan penumbuhkembangan pos penyuluhan desa disusun sesuai ketentuan.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_015_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_015_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_015_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_015_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_015_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_015_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_015_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_015_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_015_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_015_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_015_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_015_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_015_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_015_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_015_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Memfasilitasi penumbuhan Pos Penyuluhan Desa (Posluhdes)
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Pendampingan proses penumbuhan Pos Penyuluhan Desa (Posluhdes) dilakukan sesuai rencana.</li>
                <li>2.2 Hasil penumbuhan Posluhdes dilaporkan sesuai format.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_015_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_015_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_015_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_015_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_015_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_015_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_015_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_015_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_015_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_015_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_015_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_015_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_015_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_015_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_015_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Memfasilitasi Pengembangan Pos Penyuluhan Desa (Posluhdes)
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Pendampingan proses pengembangan Pos Penyuluhan Desa (Posluhdes) dilakukan sesuai petunjuk teknis.</li>
                <li>3.2 Hasil pengembangan Posluhdes dilaporkan sesuai format.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_015_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_015_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_015_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_015_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_015_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_015_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_015_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_015_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_015_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_015_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_015_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_015_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_015_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_015_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_015_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 8</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.016.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Menumbuhkembangkan Penyuluh Pertanian Swadaya </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Memfasilitasi penyiapan penumbuhan penyuluh pertanian swadaya
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Data calon penyuluh pertanian swadaya diidentifikasi sesuai petunjuk teknis.</li>
                <li>1.2 Metode penumbuhan penyuluh pertanian swadaya ditetapkan sesuai petunjuk teknis.</li>
                <li>1.3 Rencana kegiatan penumbuhkembangan penyuluh pertanian swadaya disusun sesuai ketentuan.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_016_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_016_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_016_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_016_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_016_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_016_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_016_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_016_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_016_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_016_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_016_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_016_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_016_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_016_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_016_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Memfasilitasi penumbuhan penyuluh swadaya
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Pendampingan proses penumbuhan penyuluh swadaya dilakukan sesuai rencana.</li>
                <li>2.2 Hasil penumbuhan penyuluh swadaya dilaporkan sesuai petunjuk teknis.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_016_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_016_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_016_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_016_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_016_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_016_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_016_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_016_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_016_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_016_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_016_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_016_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_016_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_016_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_016_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Memfasilitasi pengembangan penyuluh pertanian swadaya
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Pendampingan proses pengembangan penyuluh swadaya dilakukan sesuai petunjuk teknis.</li>
                <li>3.2 Hasil pengembangan penyuluh pertanian swadaya dilaporkan sesuai petunjuk teknis.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_016_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_016_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_016_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_016_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_016_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_016_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_016_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_016_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_016_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_016_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_016_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_016_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_016_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_016_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_016_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 9</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.023.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Pengelolaan Subsistem Agroinput </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Merencanakan kegiatan fasilitasi pengelolaan agroinput
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Agroinput komoditas pertanian diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Permasalahan agroinput komoditas pertanian diidentifikasi sesuai pedoman.</li>
                <li>1.3 Hasil identifikasi dan permasalahan agroinput komoditas pertanian dirumuskan dalam rancangan fasilitasi.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_023_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_023_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_023_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_023_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_023_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_023_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_023_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_023_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_023_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_023_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_023_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_023_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_023_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_023_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_023_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melaksanakan kegiatan fasilitasi pengelolaan agroinput
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Kegiatan fasilitasi pengelolaan agroinput komoditas pertanian disiapkan sesuai dengan prinsip good handling practices dan good manufacturing practices.</li>
                <li>2.2 Kegiatan fasilitasi pengelolaan agroinput komoditas pertanian dilaksanakan sesuai dengan prinsip good handling practices dan good manufacturing practices.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_023_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_023_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_023_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_023_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_023_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_023_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_023_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_023_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_023_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_023_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_023_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_023_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_023_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_023_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_023_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Mengevaluasi hasil fasilitasi pengelolaan agroinput
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Instrumen evaluasi fasilitasi pengelolaan agroinput komoditas pertanian dibuat sesuai prosedur.</li>
                <li>3.2 Hasil evaluasi fasilitasi pengelolaan agroinput komoditas disusun dalam bentuk laporan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_023_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_023_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_023_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_023_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_023_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_023_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_023_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_023_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_023_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_023_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_023_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_023_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_023_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_023_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_023_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 10</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.024.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Pengelolaan Subsistem Agroproduksi </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Merencanakan kegiatan fasilitasi pengelolaan agroproduksi
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Agroproduksi komoditas pertanian diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Permasalahan komoditas pertanian diidentifikasi sesuai pedoman.</li>
                <li>1.3 Hasil identifikasi dan permasalahan agroproduksi komoditas pertanian dirumuskan dalam rancangan fasilitasi.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_024_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_024_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_024_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_024_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_024_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_024_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_024_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_024_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_024_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_024_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_024_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_024_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_024_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_024_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_024_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melaksanakan kegiatan fasilitasi pengelolaan agroproduksi
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Kegiatan fasilitasi produksi komoditas pertanian disiapkan sesuai dengan prinsip good handling practices dan good manufacturing practices.</li>
                <li>2.2 Kegiatan fasilitasi produksi komoditas pertanian dilaksanakan sesuai dengan prinsip good handling practices dan good manufacturing practices.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_024_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_024_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_024_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_024_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_024_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_024_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_024_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_024_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_024_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_024_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_024_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_024_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_024_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_024_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_024_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Mengevaluasi hasil fasilitasi pengelolaan agroproduksi
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Instrumen evaluasi fasilitasi produksi komoditas pertanian disusun.</li>
                <li>3.2 Hasil evaluasi fasilitasi produksi pengelolaan komoditas disusun dalam bentuk laporan.</li>
              </ul>
            </td>

            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_024_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_024_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_024_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_024_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_024_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_024_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_024_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_024_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_024_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_024_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_024_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_024_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_024_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_024_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_024_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 11</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.025.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Pengelolaan Subsistem Agroprocessing </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Merencanakan kegiatan fasilitasi pengelolaan agroprocessing
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Komoditas pertanian diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Permasalahan komoditas pertanian diidentifikasi sesuai pedoman.</li>
                <li>1.3 Hasil identifikasi produk pertanian dan permasalahan agroprocessing dirumuskan dalam rancangan fasilitasi.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_025_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_025_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_025_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_025_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_025_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_025_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_025_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_025_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_025_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_025_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_025_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_025_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_025_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_025_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_025_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melaksanakan kegiatan fasilitasi pengelolaan agroprocessing
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Alat dan bahan baku agroprocessing disiapkan sesuai kebutuhan.</li>
                <li>2.2 Kegiatan fasilitasi pengelolaan agroprocessing dilaksanakan berdasarkan prinsip good handling practices dan good manufacturing practices.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_025_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_025_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_025_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_025_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_025_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_025_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_025_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_025_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_025_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_025_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_025_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_025_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_025_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_025_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_025_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Mengevaluasi hasil fasilitasi pengelolaan agroprocessing
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Hasil fasilitasi pengelolaan agroprocessing dievaluasi sesuai prosedur.</li>
                <li>3.2 Hasil evaluasi disusun dalam bentuk laporan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_025_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_025_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_025_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_025_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_025_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_025_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_025_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_025_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_025_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_025_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_025_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_025_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_025_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_025_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_025_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 12</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.026.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Pengelolaan Subsistem Agroniaga </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Merencanakan kegiatan pengelolaan agroniaga
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Produk pertanian diidentifikasi sesuai kebutuhan.</li>
                <li>1.2 Permasalahan pemasaran produk pertanian diidentifikasi sesuai pedoman.</li>
                <li>1.3 Hasil identifikasi produk pertanian dan permasalahan pemasaran dirumuskan dalam rancangan fasilitasi.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_026_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_026_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_026_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_026_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_026_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_026_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_026_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_026_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_026_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_026_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_026_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_026_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_026_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_026_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_026_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melaksanakan kegiatan fasilitasi pengelolaan agroniaga
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Alat dan perlengkapan kegiatan fasilitasi pengelolaan agroniaga disiapkan sesuai kebutuhan.</li>
                <li>2.2 Kegiatan fasilitasi pengelolaan agroniaga dilaksanakan berdasarkan strategi pemasaran.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_026_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_026_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_026_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_026_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_026_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_026_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_026_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_026_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_026_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_026_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_026_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_026_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_026_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_026_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_026_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Mengevaluasi hasil pengelolaan agroniaga
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Hasil fasilitasi pengelolaan agroniaga dievaluasi sesuai prosedur.</li>
                <li>3.2 Hasil evaluasi disusun dalam bentuk laporan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_026_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_026_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_026_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_026_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_026_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_026_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_026_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_026_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_026_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_026_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_026_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_026_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>


              <?php
              if (isset($jawaban['M_74PPP01_026_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_026_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_026_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 13</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.027.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memfasilitasi Perencanaan Usaha Agribisnis</td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Mempersiapkan perencanaan usaha agribisnis
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Segmentasi pasar diidentifikasi sesuai prosedur.</li>
                <li>1.2 Target pasar diidentifikasi sesuai prosedur.</li>
                <li>1.3 Potensi usaha agribisnis diidentifikasi sesuai prosedur.</li>
                <li>1.4 Jenis produk diidentifikasi sesuai kebutuhan pasar.</li>
                <li>1.5 Kelayakan usaha dianalisis sesuai prosedur.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_027_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_027_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_027_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_027_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_027_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_027_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_027_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_027_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_027_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_027_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_027_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_027_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_027_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_027_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_027_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melaksanakan fasilitasi perencanaan usaha agribisnis
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Perencanaan usaha agribisnis disusun berdasarkan prosedur.</li>
                <li>2.2 Proposal usaha agribisnis disusun sesuai prosedur.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_027_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_027_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_027_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_027_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_027_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_027_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_027_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_027_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_027_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_027_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_027_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_027_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_027_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_027_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_027_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 1</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.011.01</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Melakukan Penumbuhan Kelembagaan Petani </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Melakukan penyiapan penumbuhan kelembagaan petani
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Data kelembagaan petani yang berorientasi agribisnis diidentifikasi sesuai prosedur.</li>
                <li>1.2 Metode penumbuhan kelembagaan petani ditetapkan sesuai kebutuhan.</li>
                <li>1.3 Rencana penumbuhan kelembagaan petani ditetapkan sesuai kebutuhan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_011_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_011_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_011_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_011_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_011_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_011_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_011_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_011_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_011_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_011_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_011_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_011_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_011_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_011_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_011_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melakukan fasilitasi penumbuhan kelembagaan petani
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Pendampingan rembug/pertemuan penumbuhan kelembagaan petani dilakukan sesuai prosedur.</li>
                <li>2.2 Hasil rembug/pertemuan didokumentasikan sesuai prosedur.</li>
                <li>2.3 Rekomendasi penumbuhan kelembagaan petani ditetapkan sesuai prosedur.</li>
                <li>2.4 Hasil rekomendasi dilaporkan kepada instansi yang berwenang.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_011_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_011_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_011_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_011_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_011_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_011_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_011_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_011_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_011_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_011_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_011_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_011_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_011_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_011_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_011_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 2</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.012.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Menumbuhkembangkan Kelembagaan Ekonomi Petani </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Melakukan persiapan penumbuhkembangan Kelembagaan Ekonomi Petani (KEP)
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Data calon Kelembagaan Ekonomi Petani (KEP) diidentifikasi sesuai prosedur.</li>
                <li>1.2 Data calon KEP diklasifikasi sesuai hasil identifikasi.</li>
                <li>1.3 Rencana penumbuhkembangan KEP ditetapkan sesuai pedoman.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_012_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_012_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_012_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_012_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_012_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_012_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_012_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_012_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_012_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_012_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_012_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_012_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_012_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_012_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_012_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Memfasilitasi penumbuhkembangan Kelembagaan Ekonomi Petani (KEP)
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Pendampingan rembug/pertemuan penumbuhan KEP dilakukan sesuai prosedur.</li>
                <li>2.2 Hasil rembug/pertemuan didokumentasikan sesuai prosedur.</li>
                <li>2.3 Rembug penumbuhan KEP dilaporkan sesuai format laporan.</li>
                <li>2.4 Pelatihan transformasi manajemen organisasi dan teknis dilaksanakan sesuai ketentuan.</li>
                <li>2.5 Model Pengembangan usaha KEP dilaksanakan sesuai dengan pedoman.</li>
                <li>2.6 Hasil usaha pengembangan KEP yang sudah dilaksanakan disusun dalam bentuk laporan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_012_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_012_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_012_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_012_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_012_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_012_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_012_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_012_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_012_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_012_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_012_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_012_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_012_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_012_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_012_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 3</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.017.03</td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Mengevaluasi Pelaksanaan Kegiatan Penyuluhan Pertanian</td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Merencanakan evaluasi pelaksanaan kegiatan penyuluhan pertanian
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Judul pelaksanaan kegiatan penyuluhan pertanian ditetapkan sesuai kebutuhan.</li>
                <li>1.2 Tujuan evaluasi pelaksanaan kegiatan penyuluhan pertanian dirumuskan sesuai permasalahan yang ada.</li>
                <li>1.3 Metode evaluasi pelaksanaan kegiatan penyuluhan pertanian ditetapkan sesuai kebutuhan.</li>
                <li>1.4 Instrumen evaluasi pelaksanaan kegiatan penyuluhan pertanian disusun sesuai prosedur.</li>
                <li>1.5 Rencana evaluasi pelaksanaan kegiatan penyuluhan pertanian disusun sesuai prosedur.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_017_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_017_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_017_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_017_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_017_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_017_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_017_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_017_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_017_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_017_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_017_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_017_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_017_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_017_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_017_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Menerapkan evaluasi pelaksanaan kegiatan penyuluhan pertanian
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Data evaluasi pelaksanaan kegiatan penyuluhan pertanian dikumpulkan sesuai metode dan instrumen evaluasi.</li>
                <li>2.2 Data yang terkumpul direkapitulasi sesuai dengan prosedur.</li>
                <li>2.3 Data yang terkumpul dianalisis sesuai teknis analisis.</li>
                <li>2.4 Hasil analisis data diinterpretasikan sesuai tujuan evaluasi.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_017_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_017_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_017_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_017_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_017_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_017_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_017_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_017_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_017_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_017_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_017_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_017_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_017_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_017_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_017_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Menyusun laporan evaluasi pelaksanaan kegiatan penyuluhan pertanian
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Sistematika penulisan laporan evaluasi pelaksanaan kegiatan penyuluhan pertanian ditetapkan sesuai prosedur.</li>
                <li>3.2 Hasil evaluasi pelaksanaan kegiatan penyuluhan disusun dalam bentuk laporan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_017_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_017_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_017_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_017_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_017_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_017_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_017_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_017_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_017_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_017_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_017_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_017_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_017_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_017_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_017_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <table class="mb-3">
          <tr>
            <td rowspan="2" class="center" style="width: 50%;"><b>Unit Kompetensi 4</b></td>
            <td><b>Kode Unit</b></td>
            <td>:</td>
            <td>M.74PPP01.004.01 </td>
          </tr>
          <tr>
            <td><b>Judul Unit</b></td>
            <td>:</td>
            <td>Memecahkan Masalah (Problem Solving) </td>
          </tr>
          <tr>
            <td>
              <b>Dapatkah Saya ................?</b>
            </td>
            <td class="center"><b>K</b></td>
            <td class="center"><b>BK</b></td>
            <td class="center"><b>Bukti yang relevan</b></td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 1. Merumuskan Masalah
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>1.1 Permasalahan ditetapkan sesuai dengan keadaan yang ada.</li>
                <li>1.2 Faktor-faktor penyebab masalah diidentifikasi sesuai ketentuan.</li>
                <li>1.3 Faktor yang mempengaruhi masalah dirumuskan sesuai hasil identifikasi.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_004_01][1]" value="1" <?php if (isset($jawaban['M_74PPP01_004_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_004_01']['1'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_004_01][1]" value="0" <?php if (isset($jawaban['M_74PPP01_004_01']['1'][0]->kompeten) && $jawaban['M_74PPP01_004_01']['1'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_004_01']['1'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_004_01']['1'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_004_01']['1'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_004_01']['1'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_004_01']['1'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_004_01']['1'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_004_01']['1'][0]->files) && !empty($jawaban['M_74PPP01_004_01']['1'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_004_01']['1'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 2. Melakukan Pemecahan Masalah
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>2.1 Metode pemecahan masalah ditetapkan sesuai dengan faktor yang mempengaruhi masalah.</li>
                <li>2.2 Permasalahan dianalisis sesuai dengan metode.</li>
                <li>2.3 Hasil analisis masalah dirumuskan sesuai dengan kondisi yang ada.</li>
                <li>2.4 Hasil rumusan pemecahan masalah dilaksanakan sesuai prosedur.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_004_01][2]" value="1" <?php if (isset($jawaban['M_74PPP01_004_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_004_01']['2'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_004_01][2]" value="0" <?php if (isset($jawaban['M_74PPP01_004_01']['2'][0]->kompeten) && $jawaban['M_74PPP01_004_01']['2'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_004_01']['2'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_004_01']['2'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_004_01']['2'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_004_01']['2'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_004_01']['2'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_004_01']['2'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_004_01']['2'][0]->files) && !empty($jawaban['M_74PPP01_004_01']['2'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_004_01']['2'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <b>Elemen :</b> 3. Menyusun laporan evaluasi pelaksanaan kegiatan penyuluhan pertanian
              <ul>
                <li><b>Kriteria Unjuk Kerja:</b></li>
                <li>3.1 Sistematika penulisan laporan evaluasi pelaksanaan kegiatan penyuluhan pertanian ditetapkan sesuai prosedur.</li>
                <li>3.2 Hasil evaluasi pelaksanaan kegiatan penyuluhan disusun dalam bentuk laporan.</li>
              </ul>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_004_01][3]" value="1" <?php if (isset($jawaban['M_74PPP01_004_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_004_01']['3'][0]->kompeten == '1') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td class="center">
              <input type="radio" name="elemen[M_74PPP01_004_01][3]" value="0" <?php if (isset($jawaban['M_74PPP01_004_01']['3'][0]->kompeten) && $jawaban['M_74PPP01_004_01']['3'][0]->kompeten == '0') {
                                                                                  echo "checked";
                                                                                } else {
                                                                                  echo "disabled";
                                                                                } ?>>
            </td>
            <td>
              <?php if (!empty($jawaban['M_74PPP01_004_01']['3'][0]->ijazah)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_004_01']['3'][0]->ijazah) ?>">Unduh Ijazah</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_004_01']['3'][0]->sertifikat)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $jawaban['M_74PPP01_004_01']['3'][0]->sertifikat) ?>">Unduh Sertifikat</a><br>
              <?php
              } ?>
              <?php if (isset($jawaban['M_74PPP01_004_01']['3'][0]->dokumen_digital)) {
              ?>
                <a class="btn btn-outline-secondary mb-2" href="<?= $jawaban['M_74PPP01_004_01']['3'][0]->dokumen_digital ?>">Unduh Dokumen Digital</a><br>
              <?php
              } ?>

              <?php
              if (isset($jawaban['M_74PPP01_004_01']['3'][0]->files) && !empty($jawaban['M_74PPP01_004_01']['3'][0]->files)) {
                $files = json_decode($jawaban['M_74PPP01_004_01']['3'][0]->files, true); // Decode as associative array
                if (is_array($files)) { // Ensure it's an array before looping
                  $no = 1;
                  foreach ($files as $file) {
              ?>
                    <a class="btn btn-outline-secondary mb-2" href="<?= base_url('uploads/' . $file) ?>">Unduh File <?= $no++ ?> </a><br>
              <?php
                  }
                } else {
                  echo "<p class='text-danger'>Invalid file format.</p>";
                }
              } else {
                echo "<p class='text-muted'>No files uploaded.</p>";
              }
              ?>
            </td>
          </tr>
        </table>
        <hr>
        <div class="row">
          <div class="col-6">
            <h4>Pemohon <?= $this->session->userdata('username'); ?></h4>
            <h4>Tanda Tangan</h4>
            <div>
              <img src="<?= base_url('uploads/tanda_tangan/' . $data_grades->signature_asesi) ?>" alt="" style="width: 400px; height:200px">
            </div>
            <br>
            <p><?= date('d F Y, H:i:s', strtotime($data_grades->asesi_upload_time)) ?></p>
          </div>
          <?php
          if ($data_grades->correct) {
          ?>
            <div class="col-6">
              <h4>Pemohon <?= $this->session->userdata('username'); ?></h4>
              <h4>Tanda Tangan</h4>
              <div>
                <img src="<?= base_url('uploads/tanda_tangan/asesor/' . $data_grades->signature) ?>" alt="" style="width: 400px; height:200px">
              </div>
              <br>
              <p><?= date('d F Y, H:i:s', strtotime($data_grades->asesor_upload_time)) ?></p>
              <p><?= $data_grades->correct ?></p>
              <p><?= $data_grades->alasan ?></p>
            </div>

          <?php
          }
          ?>
        </div>
      </div>
      <!-- <button class="btn btn-primary">Submit</button> -->
      <!-- </form> -->
      <!-- <h4 class="card-title"></h4>
      <div class="row mb-2">
        <div class="col-md-3">
          <label for=""></label>
        </div>
      </div> -->
    </div>
  </div>
</div>

<script>
  document.getElementById("answer").addEventListener("change", function() {
    let fileName = this.files[0] ? this.files[0].name : "Choose a file...";
    this.nextElementSibling.textContent = fileName;
  });
</script>