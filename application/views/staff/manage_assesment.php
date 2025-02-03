<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('staff') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Data Assesment</span></li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Assesment</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
        </div>
        <div class="col-sm-12 col-md-6">
          <!-- isi search dan pagination -->
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>User Course</th>
                  <th>Course</th>
                  <th>Assesment Metode</th>
                  <th>Jawaban Assesi</th>
                  <th>Eligibility status</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($user_courses)): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($user_courses as $uc): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $uc['full_name']; ?></td>
                      <td><?php echo $uc['course_name']; ?></td>
                      <td>
                        <a href="<?= base_url('staff/metode_dit/') . $uc['uid'] ?>" class="btn btn-inverse-warning btn-sm"><i class="fas fa-vote-yea"></i>&nbsp;Metode DIT</a>
                        <a href="<?= base_url('staff/obser/') . $uc['uid'] ?>" class="btn btn-inverse-info btn-sm"><i class="fas fa-file-prescription"></i>&nbsp;Metode Observasi</a>
                        <a href="<?= base_url('staff/port/') . $uc['uid'] ?>" class="btn btn-inverse-primary btn-sm"><i class="fas fa-fax"></i>&nbsp;Metode Portofolio</a>
                      </td>
                      <td>
                        <a class="btn btn-primary" href="<?= base_url('staff/jawaban_assesi/' . $uc['user_uid'] . '/' . $uc['course_uid']) ?>">Jawaban Assesi</a>
                      </td>
                      <td>
                        <?php if ($uc['status'] == '0') { ?>
                          <a type="button" class="btn btn-inverse-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $uc['uid'] ?>"><i class="typcn typcn-document btn-icon-append"></i>No Assessment Yet</a>
                        <?php } elseif ($uc['status'] == '1') { ?>
                          <a type="button" class="btn btn-inverse-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $uc['uid'] ?>"><i class="fas fa-user-graduate"></i>&nbsp; Competent</a>
                        <?php } else { ?>
                          <a type="button" class="btn btn-inverse-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $uc['uid'] ?>"><i class="fas fa-not-equal"></i>&nbsp; Not Competent</a>
                        <?php } ?>
                      </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $uc['uid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="<?= base_url('staff/status_kelulusan/') . $uc['uid'] ?>" method="post">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="status">Isi Status Kelayakan :</label>
                                <select name="status" id="status" class="form-select">
                                  <option disabled <?php if ($uc['status'] == '0') echo "selected"; ?>>-- Pilih Status Kelulusan --</option>
                                  <option value='1' <?php if ($uc['status'] == '1') echo "selected"; ?>>Competent</option>
                                  <option value='2' <?php if ($uc['status'] == '2') echo "selected"; ?>>Not Competent</option>
                                </select>

                                <input type="hidden" name="user_uid" value="<?= $uc['user_uid'] ?>">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
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
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>