<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth bg-info-subtle">
    <div class="row w-100 mx-0">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-start py-5 px-4 px-sm-5">
          <img src="<?= base_url('assets/') ?>images\auth\lsp_tanindo_baru.jpg" alt="logo" width="100%">
          <?php echo validation_errors(); ?>
          <small class="text-muted">
            <h3 align='center'>Registration</h3>
          </small>
          <form action="<?= base_url('auth/process') ?>" method="post" class="pt-3 register" id="register_tanindo">
            <div class="form-group">
              <label>Full Name: </label>
              <input type="text" class="form-control form-control-lg" name="full_name" value="<?php echo set_value('full_name'); ?>" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label>Email: </label>
              <input type="email" class="form-control form-control-lg" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
            </div>
            <div class="form-group row">
              <div class="col">
                <label>Password</label>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
              </div>
              <div class="col">
                <label>Confirm Password: </label>
                <input type="password" class="form-control form-control-lg" name="password_confirm" placeholder="Confirm password">
              </div>
            </div>
            <div class="form-group">
              <label>Mobile Number: </label>
              <input type="text" class="form-control form-control-lg" name="mobile_number" value="<?php echo set_value('mobile_number'); ?>" placeholder="Nomor Telepon">
            </div>
            <div class="form-group">
              <label>Home Address: </label>
              <textarea class="form-control form-control-lg" name="home_address" placeholder="Alamat Rumah Anda."><?php echo set_value('home_address'); ?></textarea>
            </div>
            <div class="form-group row">
              <div class="col">
                <label>Village: </label>
                <input type="text" class="form-control form-control-lg" name="village" value="<?php echo set_value('village'); ?>" placeholder="Kelurahan">
              </div>
              <div class="col">
                <label>Sub-district: </label>
                <input type="text" class="form-control form-control-lg" name="sub_district" value="<?php echo set_value('sub_district'); ?>" placeholder="Kecamatan">
              </div>
            </div>
            <div class="form-group row">
              <div class="col">
                <label>City: </label>
                <input type="text" class="form-control form-control-lg" name="city" value="<?php echo set_value('city'); ?>" placeholder="Kota / Kabupaten">
              </div>
              <div class="col">
                <label>Province: </label>
                <input type="text" class="form-control form-control-lg" name="province" value="<?php echo set_value('province'); ?>" placeholder="Provinsi">
              </div>
            </div>
            <div class="form-group">
              <label>Gender: </label>
              <select name="gender" class="form-control form-control-lg text-black">
                <option value="Male" <?php echo set_select('gender', 'Male'); ?>>Male / Pria</option>
                <option value="Female" <?php echo set_select('gender', 'Female'); ?>>Female / Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nationality: </label>
              <input type="text" class="form-control form-control-lg" name="nationality" value="<?php echo set_value('nationality'); ?>" placeholder="Kebangsaan">
            </div>
            <div class="form-group row">
              <div class="col">
                <label>Place of Birth: </label>
                <input type="text" class="form-control form-control-lg" name="place_of_birth" value="<?php echo set_value('place_of_birth'); ?>" placeholder="Tempat Lahir">
              </div>
              <div class="col">
                <label>Date of Birth: </label>
                <input type="date" class="form-control form-control-lg" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>">
              </div>
            </div>

            <!-- captcha google -->
            <div class="g-recaptcha" data-sitekey="6LeS8ykqAAAAAMMLxrZQMfdH37sxjgQPiVYhd0Z4"></div>
            <!-- <div class="g-recaptcha" data-sitekey="6LeSjj8qAAAAABzGtdWlW550-Ne7IR4rcCOwgvxy" data-callback='onSubmit' data-action='submit'>Submit</div> -->
            <br>
            <div class="text-center d-grid gap-2">
              <button type="submit" class="btn btn-outline-success btn-fw">Registration</button>
            </div>
            <br>
            <p class="sign-up text-center">Already have an Account ?<a href="<?= base_url('auth') ?>"> Login</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->