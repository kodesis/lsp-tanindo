<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url('admin/manage_assesmen') ?>">Manage Assesmen</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Input Data Assesmen</span></li>
    </ol>
  </nav>

  <?php echo validation_errors(); ?>

  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Input New Assesmen</h4>
        <form action="<?= base_url('admin/process_assesmen/' . $this->uri->segment(3)) ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <h4><b>Assesmen</b></h4>
            <div class="form-group">
              <label for="name" class='control-label'>Metode Assesmen</label>
              <select style="color:black" name="assesment_metode" id="assesment_metode" class="form-select">
                <option value="1">Metode DIT</option>
                <option value="2">Metode Observasi</option>
                <option value="3">Metode Portofolio</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name" class='control-label'>Tipe Assesmen</label>
              <select style="color:black" name="tipe_assesmen" id="tipe_assesmen" class="form-select">
                <option value="1">Pra Assesmen</option>
                <option value="2">Uji Kompetensi</option>
                <!-- <option value="3">Metode Portofolio</option> -->
              </select>
            </div>
            <div class="form-group">
              <label for="name" class='control-label'>Kode Unit</label>
              <input type="text" class="form-control" id="kode_unit" name="kode_unit" value="">
            </div>
            <div class="form-group">
              <label for="name" class='control-label'>Judul Unit Kompetensi</label>
              <input type="text" class="form-control" id="judul_unit_kompetensi" name="judul_unit_kompetensi" value="">
            </div>
            <div class="form-group">
              <label for="name" class='control-label'>Assignment</label>
              <input type="text" class="form-control" id="assignments" name="assignments" value="">
            </div>
            <div class="form-group">
              <label for="name" class='control-label'>File</label>
              <input type="file" class="form-control" id="file" name="file">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>