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

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data User & Staff</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/add_staff') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Tambah Staff</a>
        </div>
        <div class="col-sm-12 col-md-6">
          <!-- Form Pencarian -->
          <form action="<?= base_url('admin/manage_users') ?>" method="get">
            <div class="input-group mb-3 input-group-append">
              <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama, email, atau nomor HP" value="<?= isset($search) ? $search : '' ?>">
              <button class="btn btn-md btn-primary" type="submit">Cari</button>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
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
              <tbody>
                <?php if (count($data_users) > 0): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_users as $du): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $du['full_name']; ?></td>
                      <td><?php echo $du['email']; ?></td>
                      <td><?php echo $du['mobile_number']; ?></td>
                      <td><?php echo $du['home_address']; ?></td>
                      <td>
                        <?php if ($du['status'] == '2') { ?>
                          <label type="text" class="btn btn-primary btn-rounded btn-fw btn-sm">Staff</label>
                        <?php } elseif ($du['status'] == '3') { ?>
                          <label type="text" class="btn btn-info btn-rounded btn-fw btn-sm">Users</label>
                        <?php } ?>
                      </td>
                      <td>
                        <!-- Tombol untuk mengubah status menjadi 'aktiv' -->
                        <?php if ($du['is_verified'] == '0'): ?>
                          <a href="<?= base_url('admin/update_status/' . $du['uid'] . '/1') ?>" class="btn btn-success">Aktifkan</a>
                        <?php else: ?>
                          <!-- Tombol untuk mengubah status menjadi 'non aktif' -->
                          <a href="<?= base_url('admin/update_status/' . $du['uid'] . '/0') ?>" class="btn btn-danger">Nonaktifkan</a>
                        <?php endif; ?>
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
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/export_excel') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Download Report User</a>
        </div>
      </div>
      <!-- Link Paginasi -->
      <div class="pagination-links">
        <?= $pagination ?>
      </div>
    </div>
  </div>
</div>