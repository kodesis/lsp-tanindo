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
                  <th>Kode Unit</th>
                  <th>Judul Unit Kompetensi</th>
                  <th>Assignment</th>
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
                        if ($dc['correct'] == "Kompeten") {
                          $kompeten_pra++;
                        ?>
                          <button class="btn btn-success">Kompeten</button>
                        <?php
                        } else if ($dc['correct'] == "Belum Kompeten") {
                          $belum_kompeten_pra++;

                        ?>
                          <button class="btn btn-danger">Belum Kompeten</button>
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
                        if ($dc['akses'] == 2) {
                          if ($dc['status'] == 1) {
                        ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-danger btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assesor Belum Menjawab </a>
                          <?php
                          } else if ($dc['status'] == 2) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-warning btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Menunggu Feedback Assessor
                            </a>
                          <?php
                          } else if ($dc['status'] == 3) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assesmen Selesai
                            </a>
                          <?php
                          }
                        } else {
                          if ($dc['status'] == 1) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-danger btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assessi Belum Menjawab </a>
                          <?php
                          } else if ($dc['status'] == 2) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-warning btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Menunggu Feedback Assessor
                            </a>
                          <?php
                          } else if ($dc['status'] == 3) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assesmen Selesai
                            </a>
                        <?php
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
                  <th>Kode Unit</th>
                  <th>Judul Unit Kompetensi</th>
                  <th>Assignment</th>
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
                        if ($dc['correct'] == "Kompeten") {
                          $kompeten_uk++;
                        ?>
                          <button class="btn btn-success">Kompeten</button>
                        <?php
                        } else if ($dc['correct'] == "Belum Kompeten") {
                          $belum_kompeten_uk++;

                        ?>
                          <button class="btn btn-danger">Belum Kompeten</button>
                        <?php
                        } else {
                          $belum_cek_uk++;

                        ?>
                          <button class="btn btn-secondary">Belum Di Rekomendasi</button>
                        <?php
                        }
                        ?>

                      </td>
                      <td>
                        <?php
                        if ($dc['akses'] == 2) {
                          if ($dc['status'] == 1) {
                        ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-danger btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assesor Belum Menjawab </a>
                          <?php
                          } else if ($dc['status'] == 2) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-warning btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Menunggu Feedback Assessor
                            </a>
                          <?php
                          } else if ($dc['status'] == 3) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assesmen Selesai
                            </a>
                          <?php
                          }
                        } else {
                          if ($dc['status'] == 1) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-danger btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assessi Belum Menjawab </a>
                          <?php
                          } else if ($dc['status'] == 2) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-warning btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Menunggu Feedback Assessor
                            </a>
                          <?php
                          } else if ($dc['status'] == 3) {
                          ?>
                            <a href="<?= base_url('staff/detail_assesmen/') . $dc['uid'] . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-success btn-icon-text">
                              <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                              Assesmen Selesai
                            </a>
                        <?php
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