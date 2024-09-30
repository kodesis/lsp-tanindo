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
          <div class="table-responsive">
            <table id="table1" class="table table-hover">
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
          <div class="table-responsive">
            <table id="table2" class="table table-hover">
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
              <tbody>
                <?php if (count($data_users_ktna) > 0): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_users_ktna as $du): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $du['username']; ?></td>
                      <td><?php echo $du['email']; ?></td>
                      <td><?php echo $du['nomor_hp']; ?></td>
                      <td><?php echo $du['alamat']; ?></td>
                      <td>
                        <?php
                        if ($du['jabatan'] == '1') { ?>
                          <label type="text" class="btn btn-primary btn-rounded btn-fw btn-sm">Ketua Umum</label>
                        <?php } elseif ($du['jabatan'] == '2') { ?>
                          <label type="text" class="btn btn-info btn-rounded btn-fw btn-sm">Sekertariat Jendral</label>
                        <?php } elseif ($du['jabatan'] == '3') { ?>
                          <label type="text" class="btn btn-warning btn-rounded btn-fw btn-sm">Bendahara Umum</label>
                        <?php } elseif ($du['jabatan'] == '4') { ?>
                          <label type="text" class="btn btn-success btn-rounded btn-fw btn-sm">Ketua Provinsi</label>
                        <?php } elseif ($du['jabatan'] == '5') { ?>
                          <label type="text" class="btn btn-danger btn-rounded btn-fw btn-sm">Dep. Kelautan dan Perikanan</label>
                        <?php } elseif ($du['jabatan'] == '6') { ?>
                          <label type="text" class="btn btn-dark btn-rounded btn-fw btn-sm">Dep. Kemitraan Strategis dan Advokasi</label>
                        <?php } elseif ($du['jabatan'] == '7') { ?>
                          <label type="text" class="btn btn-light btn-rounded btn-fw btn-sm">Dep. LITBANG</label>
                        <?php } elseif ($du['jabatan'] == '8') { ?>
                          <label type="text" class="btn btn-secondary btn-rounded btn-fw btn-sm">Dep. Media Informasi dan Komunikasi</label>
                        <?php } elseif ($du['jabatan'] == '9') { ?>
                          <label type="text" class="btn btn-primary btn-rounded btn-fw btn-sm">Dep. Hukum & HAM</label>
                        <?php } elseif ($du['jabatan'] == '10') { ?>
                          <label type="text" class="btn btn-info btn-rounded btn-fw btn-sm">Anggota</label>
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
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/export_excel_ktna') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Download Report User</a>
        </div>
      </div>


      <!-- Link Paginasi -->
      <div class="pagination-links">
        <?= $pagination ?>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#table1').DataTable();
    $('#table2').DataTable();

  });
</script>