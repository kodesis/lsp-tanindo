<style>
  #order-listing tbody tr {
    height: 50px;
    /* Adjust the height as needed */
  }

  #detailTable {
    width: 100% !important;
    /* Force table to take full modal width */
    table-layout: auto;
    /* Adjust columns based on content */
    overflow-x: auto;
    /* Allow horizontal scroll if needed */
  }

  .modal-body {
    max-height: 80vh;
    /* Prevents modal from exceeding screen height */
    overflow-y: auto;
    /* Enables vertical scrolling if needed */
  }
</style>
<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Riwayat Asesment</span></li>
    </ol>
  </nav>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Riwayat Asesment</h4>

      <!-- <div class="row">
        <div class="col-sm-12 col-md-6">
          <a href="<?= base_url('admin/add_course') ?>" type="button" class="btn btn-inverse-info btn-fw btn-sm">Tambah Course</a>
        </div>
        <div class="col-sm-12 col-md-6">
        </div>
      </div> -->

      <div class="row">
        <div class="col-12">
          <!-- <div class="table-responsive"> -->
          <div>
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Course Information</th>
                  <th>Riwayat</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal starts -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title" id="exampleModalLabel"></h4> -->
        <h4 class="modal-title" id="exampleModalLabel">Detail Riwayat Asesment</h4>
      </div>
      <form id="cekDetailForm" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="table-responsive"> <!-- Add table-responsive -->
            <table id="detailTable" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode - Judul Unit</th>
                  <th>Metode Asesmen</th>
                  <th>Tipe Asesmen</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
            </table>
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
        url: "<?php echo site_url('Admin/ajax_list5') ?> ",
        type: "POST",
        data: function(data) {}
      },
      columnDefs: [{
        targets: 3, // The 8th column (0-indexed)
        orderable: false // Disable sorting
      }]
    });
  });

  function cekDetail(user_uid, uid) {
    $('#cekDetailForm')[0].reset(); // Reset form on modal

    // Destroy existing DataTable instance if it exists
    if ($.fn.DataTable.isDataTable('#detailTable')) {
      $('#detailTable').DataTable().destroy();
    }

    // Initialize DataTable with AJAX
    $('#detailTable').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo site_url('Admin/ajax_list6/') ?>" + user_uid + "/" + uid,
        "type": "POST",
        "data": {
          user_uid: user_uid,
          uid: uid
        } // Send both IDs to fetch relevant details
      },
      "columnDefs": [{
        "targets": 4, // Adjust column index if needed
        "orderable": false // Disable sorting
      }]
    });

    // Show modal after table is loaded
    $('#detailModal').modal('show');
  }
</script>