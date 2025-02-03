<div class="content-wrapper">
  <?php if ($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>
  <?php echo isset($error) ? $error : ''; ?>
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