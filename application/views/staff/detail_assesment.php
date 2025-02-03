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
      <h4 class="card-title">Soal Assesmen <?= $username->full_name ?></h4>
      <?php
      if (empty($soal)) {
      ?>
        <button type="submit" class="btn btn-inverse-success btn-sm mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Soal</button>
      <?php
      }
      ?>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
            </div>
            <?php echo form_open_multipart('staff/save_soal/' . $this->uri->segment(3)); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="foto">Soal:</label>
                <textarea name="soal" id="soal" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label for="foto">File Soal:</label>
                <input type="file" name="file_soal" id="file_soal" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit</button>
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            </div>
            <!-- </form> -->
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
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
                    <th>Soal</th>
                    <th>File</th>
                    <th>Action</th>
                    <!-- <th style="text-align: center;">Status</th> -->
                  </tr>
                  <!-- <tr>
                    <th style="text-align: center;">Available</th>
                    <th style="text-align: center;">Not available</th>
                  </tr> -->
                </thead>
                <tbody>
                  <?php if (!empty($soal)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($soal as $ass):
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                          <?php echo $ass['soal']; ?>
                        </td>
                        <td>
                          <a class="btn btn-secondary" href="<?= base_url('uploads/detail_assesmen/' . $ass['file_soal']) ?>" download target="_blank">Unduh</a>
                        </td>
                        <td>
                          <a class="btn btn-danger" href="<?= base_url('staff/hapus_detail_assesmen/' . $ass['uid_assesmen'] . '/' . $ass['uid']) ?>">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>

                  <?php else: ?>
                    <tr>
                      <td colspan="4">No Soal found.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>
      <!-- <button type="submit" class="btn btn-info btn-rounded btn-sm">Save Assessment</button> -->
      <!-- <button onclick="submitassesment()" class="btn btn-info btn-rounded btn-sm">Save Assessment</button> -->
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