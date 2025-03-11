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
      <!-- <a class="btn btn-primary mb-2">Jawaban Assesi</a> -->
      <?php if ($this->session->flashdata('success')): ?>
        <p><?php echo $this->session->flashdata('success'); ?></p>
      <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
      <?php endif; ?>

      <!-- <form action="<?php echo site_url('staff/saveassesmen'); ?>" method="POST"> -->
      <form id="assessment_form">
        <input type="hidden" name="user_uid" value="<?= $username->user_uid ?>"> <!-- Ini bisa diganti dengan user ID dinamis -->
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tipe Assesmen</th>
                    <th>Kode Form</th>
                    <th>Judul Form</th>
                    <th>Petunjuk Pengerjaan</th>
                    <th>File Soal</th>
                    <!-- <th>Jawaban Assesi</th> -->
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
                          <?php
                          if ($ass['tipe_assesmen'] == 1) {
                            echo 'Pra Assesmen';
                          } else if ($ass['tipe_assesmen'] == 2) {
                            echo 'Uji Kompetensi';
                          } else {
                            echo 'Belum Dipilih';
                          }
                          ?>

                        </td>
                        <td>
                          <?php echo $ass['kode_unit']; ?>

                        </td>
                        <td>
                          <?php echo $ass['judul_unit_kompetensi']; ?>

                        </td>
                        <td>
                          <?php echo $ass['assignments']; ?>

                        </td>
                        <td>
                          <!-- <a href="<?= base_url('staff/detail_assesmen/' . $ass['uid']) ?>" class="btn btn-secondary">Detail</a> -->
                          <?php
                          if (!empty($ass['file'])) {
                          ?>
                            <a class="btn btn-secondary btn-icon-text btn-sm" href="<?= base_url('uploads/file/' . $ass['file']) ?>" download target="_blank">Unduh</a>
                          <?php
                          }
                          ?>
                        </td>
                        <!-- <td>
                          <?php
                          $this->db->select('answer');
                          $this->db->from('grades');
                          $this->db->where('assesment_uid', $ass['uid']);
                          $this->db->where('user_uid', $username->user_uid);
                          $answer = $this->db->get()->row();

                          if (!empty($answer)) {
                            if ($answer->answer != null) {
                          ?>
                              <a class="btn btn-secondary btn-icon-text btn-sm" href="<?= base_url('uploads/answer/' . $answer->answer) ?>" download target="_blank">Unduh</a>

                          <?php
                            }
                          }
                          ?>

                        </td> -->
                        <td>
                          <div class="form-check form-check-success">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="assessment_<?= $ass['uid'] ?>" id="assessment_<?= $ass['uid'] ?>" value="<?= $ass['uid'] ?>" <?= ($assessment_uid == $ass['uid'] ? 'checked' : '') ?>>
                              Available
                              <i class="input-helper"></i>
                            </label>
                          </div>
                          <!-- <input type="text" name="assessment" value="<?= $ass['uid'] ?>">
                          <input type="text" name="assessment_<?= $ass['uid'] ?>" id="assessment_<?= $ass['uid'] ?>" value="<?= $ass['uid'] ?>">
                          <input type="hidden" name="user_uid" value="<?= $username->user_uid ?>"> -->
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
      </form>
      <!-- <button type="submit" class="btn btn-info btn-rounded btn-sm">Save Assessment</button> -->
      <button onclick="submitassesment()" class="btn btn-info btn-rounded btn-sm">Save Assessment</button>
    </div>
  </div>
</div>

<script>
  function submitassesment() {
    var url;
    url = "<?php echo site_url('staff/saveassesmen') ?>";
    var formData = new FormData($("#assessment_form")[0]);

    // Create an array to store selected checkbox values
    let selectedCheckboxes = [];

    // Find all checkboxes that are checked
    document.querySelectorAll('input[type="checkbox"]:checked').forEach(function(checkbox) {
      // Push the value (assessment UID) of the checked checkbox to the array
      selectedCheckboxes.push(checkbox.value);
    });

    // Send the selected checkboxes to the server via AJAX
    // let user_uid = document.querySelector('input[name="user_uid"]').value; // Assuming user_uid is in a hidden input

    // Create the data to send via AJAX
    // let data = {
    //   user_uid: user_uid,
    //   assessments: selectedCheckBoxes
    // };
    console.log('Selected Box nya nih : ' + selectedCheckboxes)

    formData.append("selectedCheckboxes", JSON.stringify(selectedCheckboxes));
    // formData.append("user_uid", JSON.stringify(selectedCheckboxes));


    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      beforeSend: function() {
        swal.fire("Saving data...");
        console.log('Saving data...')

      },
      success: function(data) {
        /* if(!data.status)alert("ho"); */
        if (!data.status) {
          swal.fire('Gagal menyimpan data', 'error ')
        } else {
          // document.getElementById('PakaianAdat').reset();

          if (data.status === 'success') {
            Swal.fire({
              customClass: 'slow-animation',
              icon: 'success',
              showConfirmButton: false,
              title: 'Berhasil Menyimpan Assesment',
              timer: 1500
            }).then(() => {
              location.reload(); // Reload the page after showing success
            });
          } else if (data.status === 'nothing_to_insert') {
            Swal.fire({
              icon: 'info',
              title: 'Tidak ada Assesment baru yang dimasukkan',
              text: 'Semua Assesment sudah tersimpan.',
              timer: 2000,
              showConfirmButton: false
            });
          } else if (data.status === 'no_assessments_selected') {
            Swal.fire({
              icon: 'warning',
              title: 'Tidak ada Assesment dipilih',
              text: 'Harap pilih Assesment sebelum menyimpan.',
              timer: 2000,
              showConfirmButton: false
            });
          }

        }
        console.log('Saving Complete!')
      },
      error: function(jqXHR, textStatus, errorThrown) {
        swal.fire('Operation Failed!', errorThrown, 'error');
        // console.log('Operation Failed!', errorThrown, 'error')
      },
      complete: function() {
        console.log('Editing job done');

      }

    });
  }
</script>