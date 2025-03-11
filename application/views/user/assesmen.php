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
                  <!-- <th>Eligibility status</th> -->
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data_assesmen_pra_assesmen)): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_assesmen_pra_assesmen as $dc): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $dc['kode_unit']; ?></td>
                      <td><?php echo $dc['judul_unit_kompetensi']; ?></td>
                      <td><?php echo $dc['assignments']; ?></td>
                      <td>
                        <?php
                        if ($dc['status'] == 1) {
                        ?>
                          <a href="<?= base_url('user/detail_assesmen/') . $dc['uid'] ?>" type="button" class="btn btn-danger btn-icon-text">
                            <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                            Ikuti Assesmen
                          </a>
                        <?php
                        } else if ($dc['status'] == 2) {
                        ?>
                          <a href="<?= base_url('user/detail_assesmen/') . $dc['uid'] ?>" type="button" class="btn btn-warning btn-icon-text">
                            <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                            Menunggu Feedback Assessor
                          </a>
                        <?php
                        } else if ($dc['status'] == 3) {
                        ?>
                          <a href="<?= base_url('user/detail_assesmen/') . $dc['uid'] ?>" type="button" class="btn btn-success btn-icon-text">
                            <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                            Assesmen Selesai
                          </a>
                        <?php
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
                  <!-- <th>Eligibility status</th> -->
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data_assesmen_uji_kompetensi)): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_assesmen_uji_kompetensi as $dc): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $dc['kode_unit']; ?></td>
                      <td><?php echo $dc['judul_unit_kompetensi']; ?></td>
                      <td><?php echo $dc['assignments']; ?></td>
                      <td>
                        <?php
                        if ($dc['status'] == 1) {
                        ?>
                          <a href="<?= base_url('user/detail_assesmen/') . $dc['uid'] ?>" type="button" class="btn btn-danger btn-icon-text">
                            <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                            Ikuti Assesmen
                          </a>
                        <?php
                        } else if ($dc['status'] == 2) {
                        ?>
                          <a href="<?= base_url('user/detail_assesmen/') . $dc['uid'] ?>" type="button" class="btn btn-warning btn-icon-text">
                            <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                            Menunggu Feedback Assessor
                          </a>
                        <?php
                        } else if ($dc['status'] == 3) {
                        ?>
                          <a href="<?= base_url('user/detail_assesmen/') . $dc['uid'] ?>" type="button" class="btn btn-success btn-icon-text">
                            <!-- <i class="typcn typcn-warning btn-icon-prepend"></i> -->
                            Assesmen Selesai
                          </a>
                        <?php
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