<div class="content-wrapper">
  <?php if ($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Detail</h4>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
              <tbody>
                <tr>
                  <td colspan="2" style="text-align: center;">
                    <b>Detail Assessor</b>
                  </td>
                </tr>
                <tr>
                  <td>
                    Nama Assessor :
                  </td>
                  <td>
                    <?= $data_assessor->full_name ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Email Assessor :
                  </td>
                  <td>
                    <?= $data_assessor->email ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Nomor Telp Assessor :
                  </td>
                  <td>
                    <?= $data_assessor->mobile_number ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: center;">
                    <b>Detail Course</b>
                  </td>
                </tr>
                <tr>
                  <td>
                    Nama Course :
                  </td>
                  <td>
                    <?= $data_assessor->course_name ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Deskripsi Course :
                  </td>
                  <td>
                    <?= $data_assessor->course_description ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Informasi Course :
                  </td>
                  <td>
                    <?= $data_assessor->course_information ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <hr>
      <h4 class="card-title">Pra Assesmen</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Form</th>
                  <th>Judul Form</th>
                  <th>Petunjuk Pengerjaan</th>
                  <th>Rekomendasi</th>
                  <!-- <th>Eligibility status</th> -->
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $kompeten_pra = 0;
                $belum_kompeten_pra = 0;
                $belum_cek_pra = 0;
                if (!empty($data_assesmen_pra_assesmen)): ?>
                  <?php $no_pra = 1; ?>
                  <?php foreach ($data_assesmen_pra_assesmen as $dc): ?>
                    <tr>
                      <td><?php echo $no_pra++; ?></td>
                      <td><?php echo $dc['kode_unit']; ?></td>
                      <td><?php echo $dc['judul_unit_kompetensi']; ?></td>
                      <td><?php echo $dc['assignments']; ?></td>
                      <td>
                        <?php
                        if ($dc['correct'] == "Asesmen Dapat Di Lanjutkan") {
                          $kompeten_pra++;
                        ?>
                          <button class="btn btn-success">Asesmen Dapat Di Lanjutkan</button>
                        <?php
                        } else if ($dc['correct'] == "Asesmen Tidak Dapat Di Lanjutkan") {
                          $belum_kompeten_pra++;

                        ?>
                          <button class="btn btn-danger">Asesmen Tidak Dapat Di Lanjutkan</button>
                        <?php
                        } else {
                          $belum_cek_pra++;

                        ?>
                          <button class="btn btn-secondary">Belum Di Rekomendasi</button>
                        <?php
                        }
                        ?>

                      </td>
                      <td>
                        <?php
                        if ($dc['kode_unit'] == 'FR.APL02') {
                          if (!$dc['correct']) {
                            if ($dc['status'] == 1) {
                        ?>

                              <a href="<?= base_url('staff/apl02/') . $dc['uid'] ?>" type="button" class="btn btn-secondary btn-icon-text">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Ikuti Assesmen
                              </a>
                            <?php
                            } else if ($dc['status'] == 2) {
                            ?>
                              <a href="<?= base_url('staff/apl02/') . $dc['uid'] ?>" type="button" class="btn btn-secondary btn-icon-text">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Menunggu Asesor Konfirmasi Assesmen
                              </a>
                            <?php
                            } else if ($dc['status'] == 3) {
                            ?>
                              <a href="<?= base_url('staff/apl02_view/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Assesmen Selesai
                              </a>
                            <?php
                            } else if ($dc['status'] == '5') {
                            ?>
                              <button class="btn btn-warning">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Meminta Revisi ke Admin
                              </button>
                            <?php
                            }
                          } else {
                            if ($dc['correct'] == "Asesmen Dapat Di Lanjutkan") {
                            ?>
                              <a href="<?= base_url('staff/apl02_view/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" class="btn btn-success">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Assesmen Selesai
                              </a>
                              <?php
                            } else {
                              if ($dc['status'] == '5') {
                              ?>
                                <button class="btn btn-warning">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Meminta Revisi ke Admin
                                </button>
                                <?php
                              } else {
                                if ($dc['status'] == '5') {
                                ?>
                                  <button class="btn btn-warning">
                                    <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                    Meminta Revisi ke Admin
                                  </button>
                                <?php
                                } else {
                                ?>
                                  <button class="btn btn-danger">
                                    Assesmen Tidak Direkomendasi
                                  </button>
                          <?php
                                }
                              }
                            }
                          }
                        } else if ($dc['kode_unit'] == 'FR.APL01') {
                          $uc = $this->db->from('user_courses')->join('users', 'users.uid = user_courses.user_uid')->where('user_uid', $dc['user_uid'])->get()->row_array();

                          ?>
                          <button type="submit" class="btn btn-success btn-icon-text" data-bs-toggle="modal" data-bs-target="#detailModal">Assesmen Selesai</button>


                          <!-- Modal -->
                          <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <!-- <h4 class="modal-title" id="exampleModalLabel"><?= $uc['course_name'] ?></h4> -->
                                  <h4 class="modal-title" id="exampleModalLabel">FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <h5>Data Pribadi</h5>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="user_number">Nomor Pendaftaran Peserta</label>
                                        <input type="text" class="form-control" name="user_number" id="user_number" value="<?= $uc['register_num'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="name"> Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $uc['full_name'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="no_ktp"> No KTP</label>
                                        <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="<?= $uc['no_ktp'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="place_of_birth"> Tempat Lahir</label>
                                        <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="<?= $uc['place_of_birth'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="date_of_birth"> Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $uc['date_of_birth'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="gender"> Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="gender" id="gender" value="<?= $uc['gender'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nationality"> Kebangsaan</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" value="<?= $uc['nationality'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?= $uc['home_address'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?= $uc['kode_pos'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="phone"> Nomor Telpon</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $uc['mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="email"> Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?= $uc['email'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="phone"> Nomor Telpon Rumah</label>
                                        <input type="text" class="form-control" name="home_mobile_number" id="home_mobile_number" value="<?= $uc['home_mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="email"> Nomor Telpon Kantor</label>
                                        <input type="text" class="form-control" name="office_mobile_number" id="office_mobile_number" value="<?= $uc['office_mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="phone"> Nomor Telpon</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $uc['mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="email"> Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?= $uc['email'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="gender">Kualifikasi Pendidikan</label>
                                        <input type="text" class="form-control" name="kualifikasi_pendidikan" id="kualifikasi_pendidikan" value="<?= $uc['kualifikasi_pendidikan'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="institute">Nama Institusi / Perusahaan :</label>
                                        <input type="text" class="form-control" name="institute" id="institute" value="<?= $uc['institute'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="jabatan">Jabatan :</label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $uc['jabatan'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-8">
                                      <div class="form-group">
                                        <label for="alamat_kantor">Alamat Kantor :</label>
                                        <input type="text" class="form-control" name="alamat_kantor" id="alamat_kantor" value="<?= $uc['alamat_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="kode_pos_kantor">Kode Pos :</label>
                                        <input type="text" class="form-control" name="kode_pos_kantor" id="kode_pos_kantor" value="<?= $uc['kode_pos_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="mobile_number_kantor">Nomor Telepon Kantor :</label>
                                        <input type="text" class="form-control" name="mobile_number_kantor" id="mobile_number_kantor" value="<?= $uc['mobile_number_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="fax_kantor">Fax :</label>
                                        <input type="text" class="form-control" name="fax_kantor" id="fax_kantor" value="<?= $uc['fax_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="email_kantor">Email :</label>
                                        <input type="text" class="form-control" name="email_kantor" id="email_kantor" value="<?= $uc['email_kantor'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <br>
                                      <h5>
                                        Data Sertifikasi
                                      </h5>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="mobile_number_kantor">Tujuan Asesmen :</label>
                                        <input type="text" class="form-control" name="tujuan_asesmen" id="tujuan_asesmen" value="<?= $uc['tujuan_asesmen'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <img src="<?= base_url('uploads/tanda_tangan/' . $uc['signature']) ?>" alt="" style="border-radius: 0 !important; width:400px; height:200px;">
                                      <br>
                                      <p><?= date('d F Y, H:i:s', strtotime($uc['upload_time'])) ?></p>
                                    </div>
                                    <div class="col-6">
                                      <img src="<?= base_url('uploads/tanda_tangan/admin/' . $uc['signature_admin']) ?>" alt="" style="border-radius: 0 !important; width:400px; height:200px;">
                                      <br>
                                      <p><?= date('d F Y, H:i:s', strtotime($uc['accepted_time'])) ?></p>
                                      <br>
                                      <p><?= $uc['alasan'] ?></p>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                        } else {
                          if ($dc['akses'] == 2) {
                            if (!$dc['correct']) {
                              if ($dc['status'] == 1) {
                          ?>

                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-secondary btn-icon-text">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Ikuti Assesmen
                                </a>
                              <?php
                              } else if ($dc['status'] == 2) {
                              ?>
                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-secondary btn-icon-text">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Menunggu Asesor Konfirmasi Assesmen
                                </a>
                              <?php
                              } else if ($dc['status'] == 3) {
                              ?>
                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Assesmen Selesai
                                </a>
                              <?php
                              } else if ($dc['status'] == '5') {
                              ?>
                                <button class="btn btn-warning">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Meminta Revisi ke Admin
                                </button>
                              <?php
                              }
                            } else {
                              if ($dc['correct'] == "Asesmen Dapat Di Lanjutkan") {
                              ?>
                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" class="btn btn-success">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Assesmen Selesai
                                </a>
                                <?php
                              } else {
                                if ($dc['status'] == '5') {
                                ?>
                                  <button class="btn btn-warning">
                                    <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                    Meminta Revisi ke Admin
                                  </button>
                                <?php
                                } else {
                                ?>
                                  <button class="btn btn-danger">
                                    Assesmen Tidak Direkomendasi
                                  </button>
                        <?php
                                }
                              }
                            }
                          }
                        }
                        ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4">No Soal found.</td>
                  </tr>
                <?php endif; ?>
              <tfoot>
                <tr>
                  <td><b>Belum di Rekomendasi :</b></td>
                  <td><?= $belum_cek_pra ?></td>
                  <td><b>Kompeten :</b></td>
                  <td><?= $kompeten_pra ?></td>
                  <td><b>Belum Kompeten :</b></td>
                  <td><?= $belum_kompeten_pra ?></td>
                </tr>
              </tfoot>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <hr>
      <h4 class="card-title">Uji Kompetensi</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Form</th>
                  <th>Judul Form</th>
                  <th>Petunjuk Pengerjaan</th>
                  <th>Rekomendasi</th>
                  <!-- <th>Eligibility status</th> -->
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $kompeten_uk = 0;
                $belum_kompeten_uk = 0;
                $belum_cek_uk = 0;
                if (!empty($data_assesmen_uji_kompetensi)): ?>
                  <?php $no_uk = 1; ?>
                  <?php foreach ($data_assesmen_uji_kompetensi as $dc): ?>
                    <tr>
                      <td><?php echo $no_uk++; ?></td>
                      <td><?php echo $dc['kode_unit']; ?></td>
                      <td><?php echo $dc['judul_unit_kompetensi']; ?></td>
                      <td><?php echo $dc['assignments']; ?></td>
                      <td>
                        <?php
                        if ($dc['kode_unit'] == 'FR.APL02') {
                          if (!$dc['correct']) {

                            if ($dc['status'] == 1) {
                        ?>
                              <a href="#" type="button" class="btn btn-secondary btn-icon-text">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Assesi Belum Menjawab </a>
                            <?php
                            } else if ($dc['status'] == 2) {
                            ?>
                              <a href="<?= base_url('staff/apl02/') . $dc['uid'] ?>" type="button" class="btn btn-secondary btn-icon-text">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Konfirmasi Assesmen
                              </a>
                            <?php
                            } else if ($dc['status'] == 3) {
                            ?>
                              <a href="<?= base_url('staff/apl02_view/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Assesmen Selesai
                              </a>


                            <?php
                            } else if ($dc['status'] == '5') {
                            ?>
                              <button class="btn btn-warning">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Meminta Revisi ke Admin
                              </button>
                            <?php
                            }
                          } else {
                            if ($dc['correct'] == "Asesmen Dapat Di Lanjutkan") {
                            ?>
                              <a href="<?= base_url('staff/apl02_view/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" class="btn btn-success">
                                <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                Assesmen Selesai
                              </a>
                              <?php
                            } else {
                              if ($dc['status'] == '5') {
                              ?>
                                <button class="btn btn-warning">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Meminta Revisi ke Admin
                                </button>
                              <?php
                              } else {
                              ?>
                                <button class="btn btn-danger">
                                  Assesmen Tidak Direkomendasi
                                </button>
                          <?php
                              }
                            }
                          }
                        } else if ($dc['kode_unit'] == 'FR.APL01') {
                          $uc = $this->db->from('user_courses')->join('users', 'users.uid = user_courses.user_uid')->where('user_uid', $this->session->userdata('user_id'))->get()->row_array();

                          ?>

                          <button type="submit" class="btn btn-success btn-sm mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#detailModal">Selesai</button>


                          <!-- Modal -->
                          <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <!-- <h4 class="modal-title" id="exampleModalLabel"><?= $uc['course_name'] ?></h4> -->
                                  <h4 class="modal-title" id="exampleModalLabel">FR.APL.01. PERMOHONAN SERTIFIKASI KOMPETENSI</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-12">
                                      <h5>Data Pribadi</h5>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="user_number">Nomor Pendaftaran Peserta</label>
                                        <input type="text" class="form-control" name="user_number" id="user_number" value="<?= $uc['register_num'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="name"> Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $uc['full_name'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="no_ktp"> No KTP</label>
                                        <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="<?= $uc['no_ktp'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="place_of_birth"> Tempat Lahir</label>
                                        <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="<?= $uc['place_of_birth'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="date_of_birth"> Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $uc['date_of_birth'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="gender"> Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="gender" id="gender" value="<?= $uc['gender'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="nationality"> Kebangsaan</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" value="<?= $uc['nationality'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" class="form-control" name="address" id="address" value="<?= $uc['home_address'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="kode_pos">Kode Pos</label>
                                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?= $uc['kode_pos'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="phone"> Nomor Telpon</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $uc['mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="email"> Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?= $uc['email'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="phone"> Nomor Telpon Rumah</label>
                                        <input type="text" class="form-control" name="home_mobile_number" id="home_mobile_number" value="<?= $uc['home_mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="email"> Nomor Telpon Kantor</label>
                                        <input type="text" class="form-control" name="office_mobile_number" id="office_mobile_number" value="<?= $uc['office_mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="phone"> Nomor Telpon</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $uc['mobile_number'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="email"> Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?= $uc['email'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="gender">Kualifikasi Pendidikan</label>
                                        <input type="text" class="form-control" name="kualifikasi_pendidikan" id="kualifikasi_pendidikan" value="<?= $uc['kualifikasi_pendidikan'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="institute">Nama Institusi / Perusahaan :</label>
                                        <input type="text" class="form-control" name="institute" id="institute" value="<?= $uc['institute'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="jabatan">Jabatan :</label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $uc['jabatan'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-8">
                                      <div class="form-group">
                                        <label for="alamat_kantor">Alamat Kantor :</label>
                                        <input type="text" class="form-control" name="alamat_kantor" id="alamat_kantor" value="<?= $uc['alamat_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="kode_pos_kantor">Kode Pos :</label>
                                        <input type="text" class="form-control" name="kode_pos_kantor" id="kode_pos_kantor" value="<?= $uc['kode_pos_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="mobile_number_kantor">Nomor Telepon Kantor :</label>
                                        <input type="text" class="form-control" name="mobile_number_kantor" id="mobile_number_kantor" value="<?= $uc['mobile_number_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="fax_kantor">Fax :</label>
                                        <input type="text" class="form-control" name="fax_kantor" id="fax_kantor" value="<?= $uc['fax_kantor'] ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="email_kantor">Email :</label>
                                        <input type="text" class="form-control" name="email_kantor" id="email_kantor" value="<?= $uc['email_kantor'] ?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <br>
                                      <h5>
                                        Data Sertifikasi
                                      </h5>
                                    </div>
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="mobile_number_kantor">Tujuan Asesmen :</label>
                                        <input type="text" class="form-control" name="tujuan_asesmen" id="tujuan_asesmen" value="<?= $uc['tujuan_asesmen'] ?>" readonly>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                        } else {
                          if ($dc['akses'] == 2) {
                            if (!$dc['correct']) {
                              if ($dc['status'] == 1) {
                          ?>

                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-secondary btn-icon-text">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Ikuti Assesmen
                                </a>
                              <?php
                              } else if ($dc['status'] == 2) {
                              ?>
                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-secondary btn-icon-text">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Menunggu Asesor Konfirmasi Assesmen
                                </a>
                              <?php
                              } else if ($dc['status'] == 3) {
                              ?>
                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Assesmen Selesai
                                </a>
                              <?php
                              } else if ($dc['status'] == '5') {
                              ?>
                                <button class="btn btn-warning">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Meminta Revisi ke Admin
                                </button>
                              <?php
                              }
                            } else {
                              if ($dc['correct'] == "Asesmen Dapat Di Lanjutkan") {
                              ?>
                                <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" class="btn btn-success">
                                  <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                  Assesmen Selesai
                                </a>
                                <?php
                              } else {
                                if ($dc['status'] == '5') {
                                ?>
                                  <button class="btn btn-warning">
                                    <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                                    Meminta Revisi ke Admin
                                  </button>
                                <?php
                                } else {
                                ?>
                                  <button class="btn btn-danger">
                                    Assesmen Tidak Direkomendasi
                                  </button>
                        <?php
                                }
                              }
                            }
                          }
                        }

                        ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4">No Soal found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td><b>Belum di Rekomendasi :</b></td>
                  <td><?= $belum_cek_uk ?></td>
                  <td><b>Kompeten :</b></td>
                  <td><?= $kompeten_uk ?></td>
                  <td><b>Belum Kompeten :</b></td>
                  <td><?= $belum_kompeten_uk ?></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <h4>Keterangan : </h4>
        <!-- <p><button class="btn btn-secondary">Hitam</button> : Step sebelumnya belum disetujui oleh asesor/admin.</p> -->
        <p><button class="btn btn-danger">Merah</button> : Data belum dilengkapi oleh asesi atau tidak diterima.</p>
        <p><button class="btn btn-warning">Kuning</button> : Menunggu timbal balik dari asesor/admin.</p>
        <p><button class="btn btn-success">Hijau</button> : Data sudah disetujui oleh asesor/admin.</p>
      </div>
    </div>
  </div>
</div>