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
      <li class="breadcrumb-item active" aria-current="page"><span>Manage Course</span></li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Course</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/add_course') ?>" type="button" class="btn btn-inverse-info btn-fw btn-sm">Tambah Course</a>
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
                  <th>Course</th>
                  <th>course Description</th>
                  <th>Responsible Person</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <?php if (!empty($course)): ?>
                <?php $no = 1; ?>
                <?php foreach ($course as $c): ?>
                  <div class="modal fade" id="edit<?= $c['uid'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editLabel">Update Course</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?= base_url('admin/updatecourse/' . $c['uid']) ?>" method="POST">
                          <div class="modal-body">
                            <h4><b>Course</b></h4>
                            <div class="form-group">
                              <label for="name" class='control-label'>Nama Course</label>
                              <input type="text" class="form-control" id="course_name" name="course_name" value="<?= $c['course_name'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Course Description</label>
                              <input type="text" class="form-control" id="course_description" name="course_description" value="<?= $c['course_description'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="name" class='control-label'>Responsible Person</label>
                              <select class="form-control" id="teacher_uid" name="teacher_uid" required>
                                <option value="">Pilih Pelatih</option>
                                <?php foreach ($users as $pt): ?>
                                  <option value="<?= $pt['uid'] ?>" <?php if ($c['teacher_uid'] == $pt['uid']) {
                                                                      echo 'selected';
                                                                    } ?>><?= $pt['full_name'] ?></option>
                                <?php endforeach; ?>
                              </select>
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
        url: "<?php echo site_url('Admin/ajax_list3') ?> ",
        type: "POST",
        data: function(data) {}
      },
      columnDefs: [{
        targets: 4, // The 8th column (0-indexed)
        orderable: false // Disable sorting
      }]
    });
  });
</script>