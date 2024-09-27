<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('staff') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('staff/manage_assesment') ?>">Data Assesment</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Data Assesment</span></li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Assesment <?= $username->full_name ?></h4>

      <?php if ($this->session->flashdata('success')): ?>
        <p><?php echo $this->session->flashdata('success'); ?></p>
      <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
      <?php endif; ?>

      <form action="<?php echo site_url('staff/saveassesmen'); ?>" method="POST">
        <input type="hidden" name="user_uid" value="<?= $username->user_uid ?>"> <!-- Ini bisa diganti dengan user ID dinamis -->
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Assesment</th>
                    <th style="text-align: center;">Status</th>
                  </tr>
                  <!-- <tr>
                    <th style="text-align: center;">Available</th>
                    <th style="text-align: center;">Not available</th>
                  </tr> -->
                </thead>
                <tbody>
                  <?php if (!empty($assesment)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($assesment as $ass):
                      $cek = $this->db->where('user_uid', $username->user_uid)->where('assesment_uid', $ass['uid'])->get('grades')->row_array();

                      $assessment_uid = (isset($cek['assesment_uid'])) ? $cek['assesment_uid'] : '0';
                      // print_r($cek);
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                          <?php echo $ass['assignments']; ?>

                        </td>
                        <td>
                          <div class="form-check form-check-success">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="status[]" value="1" <?= ($assessment_uid == $ass['uid'] ? 'checked' : '') ?>>
                              Available
                              <i class="input-helper"></i>
                            </label>
                          </div>
                          <input type="hidden" name="assessment[]" value="<?= $ass['uid'] ?>">
                          <input type="hidden" name="user_uid" value="<?= $username->user_uid ?>">
                        </td>
                        <!-- <td>
                          <div class="form-check form-check-danger">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="status[<?= $ass['uid'] ?>]" value="0">
                              Not available
                              <i class="input-helper"></i></label>
                          </div>
                        </td> -->
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
        </div>
        <button type="submit" class="btn btn-info btn-rounded btn-sm">Save Assessment</button>
      </form>
    </div>
  </div>
</div>