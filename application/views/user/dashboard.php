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
      <div class="col-md-5 grid-margin grid-margin-md-0 stretch-card">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-certificate"></i> &nbsp; Sertifikasi
            <h4 class="mt-2 card-text">
              <?= $cour->course_name ?>
            </h4>
            <?php
            $this->db->from('user_courses');
            $this->db->where('user_uid', $this->session->userdata('user_id'));
            $this->db->where('course_uid', $cour->uid);
            $cek_course_user = $this->db->get()->row();
            if ($cek_course_user) {
            ?>
              <button class="btn btn-inverse-secondary btn-sm mt-3 mb-4">Sudah Join Program</button>
            <?php
            } else {
            ?>
              <button type="submit" class="btn btn-inverse-success btn-sm mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $cour->uid ?>">Join Program</button>
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
              <h5 class="modal-title" id="exampleModalLabel"><?= $cour->course_name ?></h5>
            </div>
            <!-- <form action="<?= base_url('user/save_program_choise') ?>" method="post"> -->
            <?php echo form_open_multipart('user/save_program_choise'); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="user_number">User Number</label>
                <input type="text" class="form-control" name="user_number" id="user_number" value="<?= $users->register_num ?>" readonly>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label for="name"> Nama</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?= $users->full_name ?>" readonly>
                </div>
                <div class="col">
                  <label for="email"> Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="<?= $users->email ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label for="phone">Phone Number</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="<?= $users->mobile_number ?>" readonly>
                </div>
                <div class="col">
                  <label for="gender">Gender</label>
                  <input type="text" class="form-control" name="gender" id="gender" value="<?= $users->gender ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?= $users->home_address ?>" readonly>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label for="city">City</label>
                  <input type="text" class="form-control" name="city" id="city" value="<?= $users->city ?>" readonly>
                </div>
                <div class="col">
                  <label for="province">Province</label>
                  <input type="text" class="form-control" name="province" id="province" value="<?= $users->province ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="course_choise">Selected programme</label>
                <input type="hidden" class="form-control" name="course_uid" id="course_choise" value="<?= $cour->uid ?>">
                <input type="text" class="form-control" name="course_name" id="course_choise" value="<?= $cour->course_name ?>">
              </div>
              <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="foto_ktp">Foto KTP:</label>
                <input type="file" name="foto_ktp" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="ijasah">Ijasah:</label>
                <input type="file" name="ijasah" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="sertifikat">Sertifikat:</label>
                <input type="file" name="sertifikat" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="surat_ijin">Surat Ijin:</label>
                <input type="file" name="surat_ijin" size="20" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit</button>
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            </div>
            <!-- </form> -->
            <?php echo form_close(); ?>
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
                          <label class='btn btn-warning'>Belum Ada Penilaian</label>
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