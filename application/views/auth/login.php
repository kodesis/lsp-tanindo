<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth bg-success-subtle">
    <div class="row w-100 mx-0">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-start py-5 px-4 px-sm-5">
          <img src="<?= base_url('assets/') ?>images\auth\lsp_tanindo_baru.jpg" alt="logo" width="100%">
          <!-- popup untuk berhasil register -->
          <?php if ($this->session->flashdata('message')): ?>
            <p><?php echo $this->session->flashdata('message'); ?></p>
          <?php endif; ?>

          <!-- popup untuk gagal login -->
          <?php if ($this->session->flashdata('error')): ?>
            <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
          <?php endif; ?>
          <small class="text-muted">
            <h3 align='center'>Login</h3>
          </small>
          <form class="form-control pt-3" method="POST" action="<?= base_url('auth/login'); ?>">
            <div class="form-group">
              <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username / Email" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mt-3 d-grid gap-2">
              <button type="submit" class="btn btn-inverse-success btn-fw">Login</button>
            </div>
          </form>
          <div class="text-center mt-4 fw-light">
            Don't have an account? <a href="<?= base_url('auth/register_tanindo') ?>" class="text-primary">Create</a> <br>
            You'r Forgot Password ! <a href="<?= base_url('auth/forgotpassword') ?>" class="text-primary">Forgot password?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->