<style type="text/css">
  .signature-pad {
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    height: 260px;
  }
</style>
<div class="content-wrapper">
  <?php if ($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>
  <?php echo isset($error) ? $error : ''; ?>
  <div class="row">
    <?php foreach ($course as $cour) { ?>
      <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-certificate"></i> &nbsp; Skema
            <h5 class="mt-2 card-text">
              <?= $cour->course_name ?>
            </h5>
            <?php
            $this->db->from('user_courses');
            $this->db->where('user_uid', $this->session->userdata('user_id'));
            $this->db->where('course_uid', $cour->uid);
            $cek_course_user = $this->db->get()->row();
            if ($cek_course_user) {
            ?>
              <button class="btn btn-inverse-secondary btn-sm mt-3 mb-4">Sudah Pilihan Skema</button>
            <?php
            } else {
            ?>
              <button type="submit" class="btn btn-inverse-success btn-sm mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $cour->uid ?>">Pilihan Skema</button>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
      <!-- Modal starts -->
      <div class="modal fade" id="exampleModal<?= $cour->uid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI</h4>
            </div>
            <form action="<?= base_url('user/save_program_choise') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <h5>
                      Data Pribadi
                    </h5>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="user_number">Nomor Pendaftaran Peserta</label>
                      <input type="text" class="form-control" name="user_number" id="user_number" value="<?= $users->register_num ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="name"> Nama Lengkap</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?= $users->full_name ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="name"> No KTP</label>
                      <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="<?= $users->no_ktp ?>" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="name"> Tempat Lahir</label>
                      <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="<?= $users->place_of_birth ?>" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="name"> Tanggal Lahir</label>
                      <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $users->date_of_birth ?>" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="email"> Jenis Kelamin</label>
                      <input type="text" class="form-control" name="gender" id="gender" value="<?= $users->gender ?>" readonly>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="email"> Kebangsaan</label>
                      <input type="text" class="form-control" name="nationality" id="nationality" value="<?= $users->nationality ?>" readonly>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-group">
                      <label for="address">Alamat</label>
                      <input type="text" class="form-control" name="address" id="address" value="<?= $users->home_address ?>" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="city">Kode Pos</label>
                      <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?= $users->kode_pos ?>" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="phone"> Nomor Telpon Rumah</label>
                      <input type="text" class="form-control" name="home_mobile_number" id="home_mobile_number" value="<?= $users->home_mobile_number ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email"> Nomor Telpon Kantor</label>
                      <input type="text" class="form-control" name="office_mobile_number" id="office_mobile_number" value="<?= $users->office_mobile_number ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="phone"> Nomor Telpon</label>
                      <input type="text" class="form-control" name="phone" id="phone" value="<?= $users->mobile_number ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email"> Email</label>
                      <input type="text" class="form-control" name="email" id="email" value="<?= $users->email ?>" readonly>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label for="gender">Kualifikasi Pendidikan</label>
                      <input type="text" class="form-control" name="kualifikasi_pendidikan" id="kualifikasi_pendidikan" value="<?= $users->kualifikasi_pendidikan ?>" readonly>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="course_choise">Selected Skema</label>
                      <input type="hidden" class="form-control" name="course_uid" id="course_choise" value="<?= $cour->uid ?>">
                      <input type="text" class="form-control" name="course_name" id="course_choise" value="<?= $cour->course_name ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="institute">Nama Institusi / Perusahaan :</label>
                      <input type="text" class="form-control" name="institute" id="institute" value="<?= $users->institute ?>"
                        <?= !empty($users->institute) ? 'readonly' : '' ?>>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="jabatan">Jabatan :</label>
                      <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $users->jabatan ?>"
                        <?= !empty($users->jabatan) ? 'readonly' : '' ?>>
                    </div>
                  </div>

                  <div class="col-8">
                    <div class="form-group">
                      <label for="alamat_kantor">Alamat Kantor :</label>
                      <input type="text" class="form-control" name="alamat_kantor" id="alamat_kantor" value="<?= $users->alamat_kantor ?>"
                        <?= !empty($users->alamat_kantor) ? 'readonly' : '' ?>>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label for="kode_pos_kantor">Kode Pos :</label>
                      <input type="text" class="form-control" name="kode_pos_kantor" id="kode_pos_kantor" value="<?= $users->kode_pos_kantor ?>"
                        <?= !empty($users->kode_pos_kantor) ? 'readonly' : '' ?>>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label for="mobile_number_kantor">Nomor Telepon Kantor :</label>
                      <input type="text" class="form-control" name="mobile_number_kantor" id="mobile_number_kantor" value="<?= $users->mobile_number_kantor ?>"
                        <?= !empty($users->mobile_number_kantor) ? 'readonly' : '' ?>>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label for="fax_kantor">Fax :</label>
                      <input type="text" class="form-control" name="fax_kantor" id="fax_kantor" value="<?= $users->fax_kantor ?>"
                        <?= !empty($users->fax_kantor) ? 'readonly' : '' ?>>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label for="email_kantor">Email :</label>
                      <input type="text" class="form-control" name="email_kantor" id="email_kantor" value="<?= $users->email_kantor ?>"
                        <?= !empty($users->email_kantor) ? 'readonly' : '' ?>>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="ijasah">Ijasah Terakhir:</label>
                      <input type="file" name="ijasah" size="20" class="form-control">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="sertifikat">Sertifikat bidang Penyuluhan :</label>
                      <input type="file" name="sertifikat" size="20" class="form-control">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="surat_ijin">Surat Keterangan sebagai Penyuluh :</label>
                      <input type="file" name="surat_ijin" size="20" class="form-control">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="foto">Foto 3x4 :</label>
                      <input type="file" name="foto" size="20" class="form-control">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="foto_ktp">Fotokopi KTP :</label>
                      <input type="file" name="foto_ktp" size="20" class="form-control">
                    </div>
                  </div>
                  <div class="col-12">
                    <br>
                    <h5>
                      Data Skema
                    </h5>
                  </div>
                  <div class="col-12">
                    <p>Tujuan Asesmen:</p>
                    <input type="radio" id="age1" name="tujuan_asesmen" value="Sertifikasi">
                    <label for="age1">Sertifikasi</label><br>
                    <input type="radio" id="age2" name="tujuan_asesmen" value="Pengakuan Kompetensi Terkini (PKT)">
                    <label for="age2">Pengakuan Kompetensi Terkini (PKT)</label><br>
                    <input type="radio" id="age3" name="tujuan_asesmen" value="Rekognisi Pembelajaran Lampau">
                    <label for="age3">Rekognisi Pembelajaran Lampau</label><br>
                    <input type="radio" id="age3" name="tujuan_asesmen" value="Lainnya">
                    <label for="age3">Lainnya</label><br><br>
                  </div>
                  <div class="col-12">
                    <br>
                    <h5>
                      Daftar Unit Kompetensi sesuai kemasan:
                    </h5>
                  </div>
                  <div class="col-12">
                    <table id="order-listing" class="table-bordered table-striped table-hover text-center">
                      <thead class="thead-dark">
                        <tr>
                          <th>No.</th>
                          <th>Kode Form</th>
                          <th>Judul Unit</th>
                          <th>Standar Kompetensi Kerja</th>
                        </tr>
                      </thead>
                      <?php
                      if ($cour->uid == '1') {
                      ?>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>M.74PPP01.001.01</td>
                            <td>Melaksanakan Komunikasi Efektif</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>M.74PPP01.002.01</td>
                            <td>Mengorganisasikan Pekerjaan</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>M.74PPP01.003.01</td>
                            <td>Menerapkan Kepemimpinan Dalam Penyuluhan</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>M.74PPP01.005.01</td>
                            <td>Menerapkan Teknologi Informasi Komunikasi</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>M.74PPP01.006.01</td>
                            <td>Menerapkan Prosedur Keselamatan dan Kesehatan Kerja (K3)</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>M.74PPP01.007.01</td>
                            <td>Membangun Jejaring Kerjasama</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>M.74PPP01.008.01</td>
                            <td>Menyusun Data Potensi Wilayah</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>M.74PPP01.009.03</td>
                            <td>Menyusun Skemaa Penyuluhan Pertanian</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>M.74PPP01.010.01</td>
                            <td>Memfasilitasi Proses Pembelajaran</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>M.74PPP01.011.01</td>
                            <td>Melakukan Penumbuhan Kelembagaan Petani</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>M.74PPP01.012.01</td>
                            <td>Menumbuhkembangkan Kelembagaan Ekonomi Petani</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td>M.74PPP01.013.01</td>
                            <td>Memfasilitasi Penerapan Teknologi</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td>M.74PPP01.014.01</td>
                            <td>Memfasilitasi Peningkatan Produktivitas Usahatani</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>14</td>
                            <td>M.74PPP01.015.01</td>
                            <td>Menumbuhkembangkan Pos Penyuluhan Desa</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>15</td>
                            <td>M.74PPP01.017.03</td>
                            <td>Mengevaluasi Pelaksanaan Kegiatan Penyuluhan Pertanian</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>M.74PPP01.020.03</td>
                            <td>Melaksanakan Pengkajian Bidang Penyuluhan Pertanian</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>17</td>
                            <td>M.74PPP01.021.03</td>
                            <td>Melaksanakan Jasa Konsultasi Agribisnis</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>18</td>
                            <td>M.74PPP01.022.01</td>
                            <td>Menyusun Norma Standar Pedoman dan Kriteria (NSPK) Bidang Pertanian</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>19</td>
                            <td>M.74PPP01.004.01</td>
                            <td>Memecahkan Permasalahan (Problem Solving)</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td>M.74PPP01.016.01</td>
                            <td>Menumbuhkembangkan Penyuluh Pertanian Swadaya</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td>M.74PPP01.023.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroinput</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>22</td>
                            <td>M.74PPP01.024.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroproduksi</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>23</td>
                            <td>M.74PPP01.025.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroprocessing</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>24</td>
                            <td>M.74PPP01.026.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroniaga</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>25</td>
                            <td>M.74PPP01.027.01</td>
                            <td>Memfasilitasi Perencanaan Usaha Agribisnis</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                        </tbody>
                      <?php
                      } else {
                      ?>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>M.74PPP01.001.01</td>
                            <td>Melaksanakan Komunikasi Efektif</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>M.74PPP01.002.01</td>
                            <td>Mengorganisasikan Pekerjaan</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>M.74PPP01.004.01</td>
                            <td>Memecahkan Permasalahan (Problem Solving)</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>M.74PPP01.005.01</td>
                            <td>Menerapkan Teknologi Informasi Komunikasi</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>M.74PPP01.006.01</td>
                            <td>Menerapkan Prosedur Keselamatan dan Kesehatan Kerja (K3)</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>M.74PPP01.008.01</td>
                            <td>Menyusun Data Potensi Wilayah</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>M.74PPP01.009.03</td>
                            <td>Menyusun Skemaa Penyuluhan Pertanian</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>M.74PPP01.010.01</td>
                            <td>Memfasilitasi Proses Pembelajaran</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>9</td>
                            <td>M.74PPP01.011.01</td>
                            <td>Melakukan Penumbuhan Kelembagaan Petani</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>10</td>
                            <td>M.74PPP01.012.01</td>
                            <td>Menumbuhkembangkan Kelembagaan Ekonomi Petani</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>11</td>
                            <td>M.74PPP01.013.01</td>
                            <td>Memfasilitasi Penerapan Teknologi</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>12</td>
                            <td>M.74PPP01.014.01</td>
                            <td>Memfasilitasi Peningkatan Produktivitas Usaha Tani</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>13</td>
                            <td>M.74PPP01.015.01</td>
                            <td>Menumbuh kembangkan Pos Penyuluhan Desa</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>14</td>
                            <td>M.74PPP01.016.01</td>
                            <td>Menumbuhkembangkan Penyuluh Pertanian Swadaya</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>15</td>
                            <td>M.74PPP01.007.01</td>
                            <td>Membangun Jejaring Kerjasama</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>16</td>
                            <td>M.74PPP01.017.03</td>
                            <td>Mengevaluasi Pelaksanaan Kegiatan Penyuluhan Pertanian</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>17</td>
                            <td>M.74PPP01.023.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroinput</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>18</td>
                            <td>M.74PPP01.024.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroproduksi</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>19</td>
                            <td>M.74PPP01.025.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroprocessing</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>20</td>
                            <td>M.74PPP01.026.01</td>
                            <td>Memfasilitasi Pengelolaan Subsistem Agroniaga</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                          <tr>
                            <td>21</td>
                            <td>M.74PPP01.027.01</td>
                            <td>Memfasilitasi Perencanaan Usaha Agribisnis</td>
                            <td>SKKNI 162 / 2021</td>
                          </tr>
                        </tbody>
                      <?php
                      }
                      ?>
                    </table>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-12">
                        <hr>
                        <h4>Pemohon <?= $users->full_name ?></h4>
                        <h4>Tanda Tangan</h4>
                        <div class="text-right">
                          <button type="button" class="btn btn-default btn-sm" id="undo"><i class="fa fa-undo"></i> Undo</button>
                          <button type="button" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</button>
                          <button type="button" class="btn btn-primary btn-sm" id="resize-canvas"><i class="fa fa-refresh"></i> Mulai</button>
                        </div>
                        <br>
                        <div class="wrapper">
                          <canvas id="signature-pad" class="signature-pad"></canvas>
                        </div>
                        <br>
                        <input type="hidden" name="signed2" id="signed2">
                        <button type="button" class="btn btn-primary btn-sm" id="save-png">Simpan Tanda Tangan</button>
                        <!-- <button type="button" class="btn btn-info btn-sm" id="save-jpeg">Save as JPEG</button>
                        <button type="button" class="btn btn-default btn-sm" id="save-svg">Save as SVG</button> -->
                        <!-- Modal untuk tampil preview tanda tangan-->

                      </div>
                    </div>
                  </div>
                  <div class="col-12" id="tes_signature">
                    <div class="disini">

                    </div>
                  </div>
                </div>
              </div>
              <div class=" modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Ends -->
    <?php } ?>
  </div>
  <br><br><br>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Sertifikasi Yang Di Ambil</h4>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Course</th>
                  <th>Eligibility status</th>
                  <th>Sertifikat</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data_course)): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_course as $dc): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $dc['course_name']; ?></td>
                      <td>
                        <?php if ($dc['status'] == '1') { ?>
                          <label class='btn btn-success'>Lulus</label>
                        <?php } else { ?>
                          <a href="<?= base_url('user/Assesmen/') . $dc['course_uid'] ?>" type="button" class="btn btn-outline-warning btn-icon-text">
                            <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                            Ikuti Assesmen
                          </a>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if ($dc['status'] == '1') { ?>
                          <a href="<?= base_url('user/download_sertifikat/') . $dc['certificate_number'] ?>" type="button" class="btn btn-outline-info btn-icon-text">
                            <i class="typcn typcn-upload btn-icon-prepend"></i>
                            Print
                          </a>
                        <?php } else { ?>
                          <a type="button" class="btn btn-outline-warning btn-icon-text">
                            <i class="typcn typcn-warning btn-icon-prepend"></i>
                            Belum Selesai!
                          </a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4">No users found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>