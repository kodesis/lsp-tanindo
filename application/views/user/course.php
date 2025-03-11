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
      <div class="col-md-4 grid-margin grid-margin-md-0 stretch-card mb-3">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-certificate"></i> &nbsp; Skema
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
                  <label for="phone">Nomor Telpon</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="<?= $users->mobile_number ?>" readonly>
                </div>
                <div class="col">
                  <label for="gender">Jenis Kelamin</label>
                  <input type="text" class="form-control" name="gender" id="gender" value="<?= $users->gender ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" value="<?= $users->home_address ?>" readonly>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label for="city">Kota</label>
                  <input type="text" class="form-control" name="city" id="city" value="<?= $users->city ?>" readonly>
                </div>
                <div class="col">
                  <label for="province">Provinsi</label>
                  <input type="text" class="form-control" name="province" id="province" value="<?= $users->province ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="course_choise">Selected Skema</label>
                <input type="hidden" class="form-control" name="course_uid" id="course_choise" value="<?= $cour->uid ?>">
                <input type="text" class="form-control" name="course_name" id="course_choise" value="<?= $cour->course_name ?>">
              </div>
              <div class="form-group">
                <label for="ijasah">Ijasah Terakhir:</label>
                <input type="file" name="ijasah" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="sertifikat">Sertifikat bidang Penyuluhan :</label>
                <input type="file" name="sertifikat" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="surat_ijin">Surat Keterangan sebagai Penyuluh :</label>
                <input type="file" name="surat_ijin" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="foto">Foto 3x4 :</label>
                <input type="file" name="foto" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="foto_ktp">Fotokopi KTP :</label>
                <input type="file" name="foto_ktp" size="20" class="form-control">
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
</div>