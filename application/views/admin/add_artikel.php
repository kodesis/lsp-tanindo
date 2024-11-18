<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('admin/manage_users') ?>">Manage Artikel</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Input Data Artikel</span></li>
    </ol>
  </nav>

  <?php if ($this->session->flashdata('message')): ?>
    <p><?php echo $this->session->flashdata('message'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?= $this->session->flashdata('error') ?></p>
  <?php endif;
  echo validation_errors(); ?>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Input New Artikel</h4>
        <form class="forms-sample" action="<?= base_url('admin/process_artikel') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Thumbnail</label>
            <div class="col-sm-9">
              <input type="file" class="form-control form-control-sm" name="thumbnail" id="thumbnail" value="<?php echo set_value('thumbnail'); ?>" placeholder="Thumbnail" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="title" class="form-control form-control-sm" name="title" id="title" value="<?php echo set_value('title'); ?>" placeholder="Title" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="mobile_number" class="col-sm-3 col-form-label">Text</label>
            <div class="col-sm-9">
              <textarea class="form-control form-control-sm" id="summernote" name="text"><?php echo set_value('text'); ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
              <input type="datetime-local" class="form-control form-control-sm" name="tanggal" id="tanggal" value="<?php echo set_value('tanggal'); ?>" placeholder="Tanggal" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-rounded btn-fw btn-sm">Submit</button>
          <button type="button" class="btn btn-warning btn-rounded btn-fw btn-sm" onclick="history.back()">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<script>
  var $jq = jQuery.noConflict();
  $jq(document).ready(function() {
    $jq('#summernote').summernote({
      minHeight: 200,
      callbacks: {
        onImageUpload: function(image) {
          uploadImage(image[0]);
        },
        onMediaDelete: function(target) {
          deleteImage(target[0].src);
        }
      }
    });
  });

  // Get today's date
  var today = new Date();

  // Format the date to YYYY-MM-DD
  var day = ("0" + today.getDate()).slice(-2); // Add leading zero for single-digit days
  var month = ("0" + (today.getMonth() + 1)).slice(-2); // Add leading zero for single-digit months
  var year = today.getFullYear();

  // Format the time as HH:MM (defaulting to 00:00)
  var hours = "00"; // Default hours
  var minutes = "00"; // Default minutes

  // Combine date and time into the format required by input[type="datetime-local"]
  var formattedDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;

  // Set the input field's value to the current date with the default time
  document.getElementById('tanggal').value = formattedDateTime;
</script>