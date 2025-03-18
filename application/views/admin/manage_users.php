<style>
  #bukti_bayar {
    width: 100%;
    max-width: 100%;
    height: auto;
    /* Maintains aspect ratio */
    display: block;
  }
</style>
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
                  <th>Detail</th>
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
      <!-- Modal starts -->
      <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <!-- <h4 class="modal-title" id="exampleModalLabel"></h4> -->
              <h4 class="modal-title" id="exampleModalLabel">Detail User</h4>
            </div>
            <form id="cekDetailForm" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <h5>Data Pribadi</h5>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="user_number">Nomor Pendaftaran Peserta</label>
                      <input type="text" class="form-control" name="user_number" id="user_number" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="name"> Nama Lengkap</label>
                      <input type="text" class="form-control" name="name" id="name" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="no_ktp"> No KTP</label>
                      <input type="text" class="form-control" name="no_ktp" id="no_ktp" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="place_of_birth"> Tempat Lahir</label>
                      <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="date_of_birth"> Tanggal Lahir</label>
                      <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="gender"> Jenis Kelamin</label>
                      <input type="text" class="form-control" name="gender" id="gender" readonly>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="nationality"> Kebangsaan</label>
                      <input type="text" class="form-control" name="nationality" id="nationality" readonly>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="form-group">
                      <label for="address">Alamat</label>
                      <input type="text" class="form-control" name="address" id="address" readonly>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="kode_pos">Kode Pos</label>
                      <input type="text" class="form-control" name="kode_pos" id="kode_pos" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="phone"> Nomor Telpon</label>
                      <input type="text" class="form-control" name="phone" id="phone" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email"> Email</label>
                      <input type="text" class="form-control" name="email" id="email" readonly>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="phone"> Nomor Telpon Rumah</label>
                      <input type="text" class="form-control" name="home_mobile_number" id="home_mobile_number" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="email"> Nomor Telpon Kantor</label>
                      <input type="text" class="form-control" name="office_mobile_number" id="office_mobile_number" readonly>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="gender">Kualifikasi Pendidikan</label>
                      <input type="text" class="form-control" name="kualifikasi_pendidikan" id="kualifikasi_pendidikan" readonly>
                    </div>
                  </div>
                  <div class="col-12">
                    <br>
                    <h5>
                      Bukti Pembayaran
                    </h5>
                  </div>
                  <div class="col-12">
                    <img id="bukti_bayar" class="img-fluid w-100">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Ends -->

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
  function cekDetail(id) {
    $('#cekDetailForm')[0].reset(); // reset form on modals
    // $('.form-group').removeClass('has-error'); // clear error class
    // $('.help-block').empty(); // clear error string
    // $('.modal-title').text('Edit Poster');
    console.log('bisa 1')
    $.ajax({
      url: "<?php echo site_url('admin/detailUser/') ?>" + id,
      type: "POST",
      dataType: "JSON",
      success: function(data) {

        JSON.stringify(data.uid);
        // alert(JSON.stringify(data));

        $('#user_number').val(data.register_num);
        $('#name').val(data.full_name);
        $('#no_ktp').val(data.no_ktp);
        $('#place_of_birth').val(data.place_of_birth);
        $('#date_of_birth').val(data.date_of_birth);
        $('#gender').val(data.gender);
        $('#nationality').val(data.nationality);
        $('#address').val(data.home_address);
        $('#kode_pos').val(data.kode_pos);
        $('#phone').val(data.mobile_number);
        $('#email').val(data.email);
        $('#home_mobile_number').val(data.home_mobile_number);
        $('#office_mobile_number').val(data.office_mobile_number);
        $('#kualifikasi_pendidikan').val(data.kualifikasi_pendidikan);
        if (data.bukti_bayar) {
          $('#bukti_bayar').attr('src', 'uploads/bukti_bayar/' + data.bukti_bayar);
        } else {
          $('#bukti_bayar').attr('src', ''); // Optional placeholder
        }

        // $('.dropdown-toggle').dropdown();

        $('#detailModal').modal('show'); // show bootstrap modal when complete loaded
        console.log('bisa 2')




      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
      }
    });

  }
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