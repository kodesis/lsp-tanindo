<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('admin/manage_users') ?>">Manage Staff</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Input Data Staff</span></li>
    </ol>
  </nav>

  <?php echo validation_errors(); ?>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Input New Staff</h4>
        <form class="forms-sample" action="<?= base_url('admin/process') ?>" method="post">
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="full_name" id="username" value="<?php echo set_value('full_name'); ?>" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control form-control-sm" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="mobile_number" class="col-sm-3 col-form-label">Mobile</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="mobile_number" id="mobile_number" value="<?php echo set_value('mobile_number'); ?>" placeholder="Mobile number">
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Home Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="home_address" id="address" value="<?php echo set_value('home_address'); ?>" placeholder="Home Address" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <label for="password2" class="col-sm-3 col-form-label">Re Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control form-control-sm" name="password_confirm" id="password_confirm" placeholder="Confirm password">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-rounded btn-fw btn-sm">Submit</button>
          <button type="button" class="btn btn-warning btn-rounded btn-fw btn-sm" onclick="history.back()">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>