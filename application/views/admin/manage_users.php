<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Manage Staff</span></li>
    </ol>
  </nav>

  <!-- popup untuk berhasil register -->
  <?php if ($this->session->flashdata('message')): ?>
    <p><?php echo $this->session->flashdata('message'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?= $this->session->flashdata('error') ?></p>
  <?php endif; ?>

  <!-- TABLE USER DAN STAFF -->
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data User & Staff</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/add_staff') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Tambah Staff</a>
        </div>
        <!-- Form Pencarian -->
        <!-- <div class="col-sm-12 col-md-6">
          <form action="<?= base_url('admin/manage_users') ?>" method="get">
            <div class="input-group mb-3 input-group-append">
              <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama, email, atau nomor HP" value="<?= isset($search) ? $search : '' ?>">
              <button class="btn btn-md btn-primary" type="submit">Cari</button>
            </div>
          </form>
        </div> -->
      </div>

      <div class="row">
        <div class="col-12">
          <!-- <div class="table-responsive"> -->
          <div>
            <table class="table table-hover" id="table1">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Home Address</th>
                  <th>Role User</th>
                  <th>Actions</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/export_excel') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Download Report User</a>
        </div>
      </div>


      <!-- Link Paginasi -->
      <div class="pagination-links">
        <!-- <?= $pagination ?> -->
      </div>
    </div>
  </div>

  <!-- TABEL KTNA -->
  <div class="card mt-2">
    <div class="card-body">
      <h4 class="card-title">Data User KTNA</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <!-- <a href="<?= base_url('admin/add_staff') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Tambah Staff</a> -->
        </div>
        <!-- Form Pencarian -->
        <!-- <div class="col-sm-12 col-md-6">
          <form action="<?= base_url('admin/manage_users') ?>" method="get">
            <div class="input-group mb-3 input-group-append">
              <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama, email, atau nomor HP" value="<?= isset($search) ? $search : '' ?>">
              <button class="btn btn-md btn-primary" type="submit">Cari</button>
            </div>
          </form>
        </div> -->
      </div>

      <div class="row">
        <div class="col-12">
          <!-- <div class="table-responsive"> -->
          <div>
            <table class="table table-hover" id="table2">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Home Address</th>
                  <th>Role User</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/export_excel_ktna') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Download Report User</a>
        </div>
      </div>


      <!-- Link Paginasi -->
      <div class="pagination-links">
        <!-- <?= $pagination ?> -->
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#table1').DataTable({
      scrollX: true,
      responsive: true,
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
      iDisplayLength: 10,

      // Load data for the table's content from an Ajax source
      ajax: {
        url: "<?php echo site_url('Admin/ajax_list') ?> ",
        type: "POST",
        data: function(data) {}
      },
      columnDefs: [{
        targets: 6, // The 8th column (0-indexed)
        orderable: false // Disable sorting
      }]
    });
    $('#table2').DataTable({
      scrollX: true,
      responsive: true,
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
      iDisplayLength: 10,

      // Load data for the table's content from an Ajax source
      ajax: {
        url: "<?php echo site_url('Admin/ajax_list2') ?> ",
        type: "POST",
        data: function(data) {}
      },
      columnDefs: [{
        targets: 5, // The 8th column (0-indexed)
        orderable: false // Disable sorting
      }]
    });
  });
</script>