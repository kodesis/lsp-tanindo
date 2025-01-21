<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-profil-tab" data-bs-toggle="tab" data-bs-target="#nav-profil" type="button" role="tab" aria-controls="nav-profil" aria-selected="true">Profil</button>
              <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false">Reset Password</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-profil" role="tabpanel" aria-labelledby="nav-profil-tab">
              <br>
              <div class="row">
                <div class="col-sm-4">
                  <div class="card">
                    <?php

                    if (isset($user_doc['image'])) { ?>
                      <img src="<?= base_url('uploads/') . $user_doc['image'] ?>" alt="profile">
                    <?php } else { ?>
                      <img src=" <?= base_url('assets/') ?>images/faces/imada_mio_2.png" alt="profile">
                    <?php } ?>
                    <div class="card-body">
                      <h4 class="card-text"><b><?= $this->session->userdata('username') ?></b></h4>
                    </div>
                  </div>
                </div>
                <div class="col-sm-7">
                  <label for="exampleFormControlInput1" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="<?= $users->full_name ?>">
                  <label for="exampleFormControlInput1" class="form-label">Email</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" readonly value="<?= $users->email ?>">
                  <label for="exampleFormControlInput1" class="form-label">Nomor Hp</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="<?= $users->mobile_number ?>">
                  <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="<?= $users->home_address ?>">
                  <label for="exampleFormControlInput1" class="form-label">Gender</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="<?= $users->gender ?>">
                  <label for="exampleFormControlInput1" class="form-label">Tempat, Tanggal Lahir</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" readonly value="<?= $users->place_of_birth ?>, &nbsp;<?= $users->date_of_birth ?>">
                </div>
              </div>
              <br>
            </div>
            <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
              <div class="row">
                <div class="col-sm-6">
                  <form class="form-control pt-3" method="POST" action="<?= base_url('auth/forgotpassword'); ?>">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" id="new_password1" name="new_password1" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" id="new_password2" name="new_password2" placeholder="Confrim New Password" required>
                    </div>
                    <div class="mt-3 d-grid gap-2">
                      <button type="submit" class="btn btn-inverse-success btn-fw">Update Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>