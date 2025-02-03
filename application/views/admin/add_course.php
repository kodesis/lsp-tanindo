<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('admin/manage_course') ?>">Manage Course</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Input Data Course</span></li>
    </ol>
  </nav>

  <?php echo validation_errors(); ?>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Input New Course</h4>
        <form class="forms-sample" action="<?= base_url('admin/process_course') ?>" method="post">
          <div class="form-group row">
            <label for="course_name" class="col-sm-3 col-form-label">Name Course</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="course_name" id="course_name" value="<?php echo set_value('course_name'); ?>" placeholder="Nama Pelatihan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="course_description" class="col-sm-3 col-form-label">Deskripsi Pelatihan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="course_description" id="course_description" value="<?php echo set_value('course_description'); ?>" placeholder="Deskripsi Pelatihan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="course_description" class="col-sm-3 col-form-label">Deskripsi Pelatihan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="course_information" id="course_information" value="<?php echo set_value('course_information'); ?>" placeholder="Informasi Pelatihan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="teacher_uid" class="col-sm-3 col-form-label">Responsible Person</label>
            <div class="col-sm-9">
              <select class="form-control" id="pelatih_id" name="pelatih_id" required>
                <option value="">Pilih Pelatih</option>
                <?php foreach ($users as $pt): ?>
                  <option value="<?= $pt['uid'] ?>"><?= $pt['full_name'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-rounded btn-fw btn-sm">Submit</button>
          <button type="button" class="btn btn-warning btn-rounded btn-fw btn-sm" onclick="history.back()">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>