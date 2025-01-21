<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Manage Artikel</span></li>
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
      <h4 class="card-title">Data Artikel</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/add_artikel') ?>" type="button" class="btn btn-inverse-info btn-fw btn-md">Tambah Artikel</a>
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
            <table id="table1" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Text</th>
                  <th>Tanggal</th>
                  <th>View Count</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($data_artikel) > 0): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_artikel as $du): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <?php
                      $thumbnail = base_url('uploads/artikel/' . $du['thumbnail'])
                      ?>
                      <td><img src="<?= $thumbnail ?>" style="height: 100px; width: 100px" alt=""></td>
                      <td><?php echo $du['title']; ?></td>
                      <td><?php echo substr($du['text'], 0, strpos(wordwrap($du['text'], 100), "\n")); ?></td>
                      <td><?php echo $du['tanggal']; ?></td>
                      <td><?php echo $du['view_count']; ?></td>
                      <td>
                        <a href="<?= base_url('admin/update_artikel/' . $du['Id']) ?>" class="btn btn-warning">Update</a>
                        <a href="<?= base_url('admin/delete_artikel/' . $du['Id']) ?>" class="btn btn-danger">Delete</a>

                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4">No Artikel found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
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
    $('#table1').DataTable({
      scrollX: true,

    });

  });
</script>