<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth bg-info-subtle">
    <div class="row w-100 mx-0">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-start py-5 px-4 px-sm-5">
          <img src="<?= base_url('assets/') ?>images\auth\lsp_tanindo_baru.jpg" alt="logo" width="100%">
          <?php echo validation_errors(); ?>
          <small class="text-muted">
            <h3 align='center'>Registration</h3>
          </small>
          <form class="user" method="post" action="<?= base_url('home/insertktna'); ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="form-label">NIK</label>
              <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Input NIK ......" value="<?= set_value('nik'); ?>">
              <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="form-label">Username</label>
              <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Input Username ......" value="<?= set_value('username'); ?>">
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="form-label">Email</label>
              <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Input email ......" value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="form-label">Jabatan</label>
              <Select class="form-control" name="jabatan">
                <option value=""> -- Pilih Jabatan -- </option>
                <option value="1">Ketua Umum</option>
                <option value="2">Sekertariat Jendral</option>
                <option value="3">Bendahara Umum</option>
                <option value="4">Ketua Provinsi</option>
                <option value="5">Dep. Kelautan dan Perikanan</option>
                <option value="6">Dep. Kemitraan Strategis dan Advokasi</option>
                <option value="7">Dep.LITBANG</option>
                <option value="8">Dep. Media Informasi dan Komunikasi</option>
                <option value="9">Dep. Hukum & HAM</option>
                <option value="10">Anggota</option>
              </Select>
            </div>
            <div class="form-group">
              <label for="form-label">Tempat Lahir</label>
              <input type="text" class="form-control form-control-user" id="tem_lahir" name="tem_lahir" placeholder="Input Tempat Lahir...." value="<?= set_value('tem_lahir'); ?>">
              <?= form_error('tem_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="form-label">Tanggal Lahir</label>
              <input type="text" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" placeholder="Format tgl 1997-09-24">
            </div>
            <div class="form-group">
              <label for="form-label">Alamat</label>
              <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Input Alamat...." value="<?= set_value('alamat'); ?>">
              <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="form-label">Provinsi</label>
              <!-- <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" placeholder="Input Provinsi...." value="<?= set_value('provinsi'); ?>"> -->
              <select name="provinsi" id="provinsi" class="form-control">
                <option value="">-- PILIH PROVINSI --</option>
                <option value="01">Aceh</option>
                <option value="02">Sumatera Utara</option>
                <option value="03">Sumatera Barat</option>
                <option value="04">Riau</option>
                <option value="05">Jambi</option>
                <option value="06">Sumatera Selatan</option>
                <option value="07">Bengkulu</option>
                <option value="08">Lampung</option>
                <option value="09">Kep. Bangka Belitung</option>
                <option value="10">Kep. Riau</option>
                <option value="11">Jakarta</option>
                <option value="12">Jawa Barat</option>
                <option value="13">Jawa Tengah</option>
                <option value="14">Banten</option>
                <option value="15">Jawa Timur</option>
                <option value="16">Yogyakarta</option>
                <option value="17">Bali</option>
                <option value="18">Nusa Tenggara Barat</option>
                <option value="19">Nusa Tenggara Timur</option>
                <option value="20">Kalimantan Barat</option>
                <option value="21">Kalimantan Tengah</option>
                <option value="22">Kalimantan Selatan</option>
                <option value="23">Kalimantan Timur</option>
                <option value="24">Kalimantan Utara</option>
                <option value="25">Sulawesi Utara</option>
                <option value="26">Sulawesi Tengah</option>
                <option value="27">Sulawesi Selatan</option>
                <option value="28">Sulawesi Tenggara</option>
                <option value="29">Gorontalo</option>
                <option value="30">Sulawesi Barat</option>
                <option value="31">Maluku</option>
                <option value="32">Maluku Utara</option>
                <option value="33">Papua</option>
                <option value="34">Papua Barat</option>
              </select>
            </div>
            <div class="form-group">
              <label for="form-label">Nomor Hp</label>
              <input type="text" class="form-control form-control-user" id="nomor_hp" name="nomor_hp" placeholder="Input Nomor HP....." value="<?= set_value('nomor_hp'); ?>">
              <?= form_error('nomor_hp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <!-- <div class="col-md-4"> -->
            <div class="form-group">
              <div id="my_camera"></div>
              <!-- <br /> -->
              <input type=button value="Take Snapshot" onClick="take_snapshot()">
              <input type="hidden" name="image" class="image-tag">
            </div>
            <!-- <div class="col-md-4"> -->
            <div class="form-group">
              <div id="results">Your captured image will appear here...</div>
            </div>

            <div class="g-recaptcha" data-sitekey="6LeS8ykqAAAAAMMLxrZQMfdH37sxjgQPiVYhd0Z4"></div>
            <br>
            <div class="text-center d-grid gap-2">
              <button type="submit" class="btn btn-outline-success btn-fw">
                Submit
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->