<style>
  #order-listing tbody tr {
    height: 50px;
    /* Adjust the height as needed */
  }
</style>
<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Manage Assesmen</span></li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Assesmen</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/add_assesmen/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-inverse-info btn-fw btn-sm">Tambah Assesmen</a>
        </div>
        <div class="col-sm-12 col-md-6">
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <!-- <div class="table-responsive"> -->
          <div>
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Assesment Method</th>
                  <th>Tipe Assesment</th>
                  <th>Kode Form</th>
                  <th>Judul Form</th>
                  <th>Tahap Rekomendasi</th>
                  <th>Petunjuk Pengerjaan</th>
                  <th>File</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <?php if (!empty($assesmen)): ?>
                <?php $no = 1; ?>
                <?php foreach ($assesmen as $c): ?>
                  <div class="modal fade" id="edit<?= $c['uid'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editLabel">Update Course</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?= base_url('admin/updateassesmen/' . $c['uid']) ?>" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id_url" value="<?= $this->uri->segment(3) ?>">
                          <div class="modal-body">
                            <h4><b>Course</b></h4>
                            <div class="form-group">
                              <label for="name" class='control-label'>Metode Assesmen</label>
                              <select style="color: black;" name="assesment_metode" id="assesment_metode" class="form-select">
                                <option <?php if ($c['assesment_metode'] == 1) echo "selected" ?> value="1">Metode DIT</option>
                                <option <?php if ($c['assesment_metode'] == 2) echo "selected" ?> value="2">Metode Observasi</option>
                                <option <?php if ($c['assesment_metode'] == 3) echo "selected" ?> value="3">Metode Portofolio</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Tipe Assesmen</label>
                              <select style="color: black;" name="tipe_assesmen" id="tipe_assesmen" class="form-select">
                                <option <?php if ($c['tipe_assesmen'] == 1) echo "selected" ?> value="1">Pra Assesmen</option>
                                <option <?php if ($c['tipe_assesmen'] == 2) echo "selected" ?> value="2">Uji Kompetensi</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Kode Form</label>
                              <input type="text" class="form-control" id="kode_unit" name="kode_unit" value="<?= $c['kode_unit'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Judul Form</label>
                              <input type="text" class="form-control" id="judul_unit_kompetensi" name="judul_unit_kompetensi" value="<?= $c['judul_unit_kompetensi'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Tahap Rekomendasi</label>
                              <input type="number" class="form-control" id="tahap_rekomendasi" name="tahap_rekomendasi" value="<?= $c['rekomendasi'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Akses</label>
                              <select style="color: black;" name="akses" id="akses" class="form-select">
                                <option <?php if ($c['akses'] == 2) echo "selected" ?> value="2">Assesor</option>
                                <option <?php if ($c['akses'] == 3) echo "selected" ?> value="3">Assesi</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Petunjuk Pengerjaan</label>
                              <input type="text" class="form-control" id="assignments" name="assignments" value="<?= $c['assignments'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>File</label>
                              <input type="file" class="form-control" id="file" name="file">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4">No users found.</td>
                </tr>
              <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

<script>
  $(document).ready(function() {
    $('#order-listing').DataTable({
      scrollX: true,
      responsive: true,
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
      iDisplayLength: 10,

      // Load data for the table's content from an Ajax source
      ajax: {
        url: "<?php echo site_url('Admin/ajax_list4/' . $this->uri->segment('3')) ?> ",
        type: "POST",
        data: function(data) {}
      },
      columnDefs: [{
        targets: 7, // The 8th column (0-indexed)
        orderable: false // Disable sorting
      }]
    });
  });
</script>