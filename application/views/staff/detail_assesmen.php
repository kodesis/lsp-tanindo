<style>
  .custom-file-input {
    display: none;
  }

  .custom-file-label {
    display: block;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    cursor: pointer;
    text-align: center;
  }

  .signature-pad {
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    height: 260px;
  }

  .square-img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover;
    border-radius: 5px !important;
    /* Optional: for rounded corners */
  }
</style>
<div class="content-wrapper">
  <?php if ($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>

  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('staff/save_rekomendasi/' . $this->uri->segment('4')) ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <table class="table table-hover">
            <tr>
              <td><b>Kode Unit</b></td>
              <td><?= $data_soal->kode_unit ?></td>
              <input type="hidden" name="id_assesmen" value="<?= $data_soal->uid ?>">
              <input type="hidden" name="course_uid" value="<?= $data_soal->course_uid ?>">
            </tr>
            <tr>
              <td><b>Judul Unit Kompetensi</b></td>
              <td><?= $data_soal->judul_unit_kompetensi ?></td>
            </tr>
            <tr>
              <td><b>Assignmen</b></td>
              <td><?= $data_soal->assignments ?></td>
            </tr>
            <tr>
              <td><b>Soal</b></td>
              <td>
                <a class="btn btn-secondary" href="<?= base_url('uploads/file/' . $data_soal->file) ?>">Unduh Soal</a>
                <br>
                <br>
                <iframe src="<?= base_url('uploads/file/' . $data_soal->file) ?>" width="800" height="500" frameborder="0"></iframe>

              </td>
            </tr>
            <tr>
              <td><b>Jawaban</b></td>
              <td>
                <?php
                if (!empty($data_soal->answer)) {
                ?>
                  <a class="btn btn-secondary" href="<?= base_url('uploads/answer/' . $data_soal->answer) ?>">Unduh Jawaban</a>
                  <br>
                  <br>
                  <iframe src="<?= base_url('uploads/answer/' . $data_soal->answer) ?>" width="800" height="500" frameborder="0"></iframe>
                <?php
                }

                if ($data_soal->akses == 2) {
                ?>
                  <div class="custom-file" <?php if ($data_soal->status == 3) echo 'hidden' ?>>
                    <input class="custom-file-input" type="file" name="answer" id="answer">
                    <label for="answer" class="custom-file-label"><?= $data_soal->answer ?></label>
                  </div>
                <?php
                }
                ?>
                <!-- <div class="custom-file">
                  <input class="custom-file-input" type="file" name="answer" id="answer">
                  <label for="answer" class="custom-file-label"><?= $data_soal->answer ?></label>
                </div> -->
              </td>
            </tr>
            <tr>
              <td colspan="2"><b>Ditinjau Oleh Assesor</b></td>
            </tr>
            <tr>
              <td><b>Nomor Reg</b></td>
              <td><?= $this->session->userdata('register_num') ?></td>
            </tr>
            <tr>
              <td><b>Nama</b></td>
              <td><?= $this->session->userdata('username') ?></td>
            </tr>
            <tr>
              <td><b>Rekomendasi</b></td>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="correct" id="correct" value="Asesmen Dapat Di Lanjutkan" <?php if ($data_soal->correct == "Asesmen Dapat Di Lanjutkan") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Asesmen Dapat Di Lanjutkan
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="correct" id="correct" value="Asesmen Tidak Dapat Di Lanjutkan" <?php if ($data_soal->correct == "Asesmen Tidak Dapat Di Lanjutkan") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Asesmen Tidak Dapat Di Lanjutkan
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td><b>Alasan</b></td>
              <td>
                <div class="form-group">
                  <input type="text" class="form-control" name="alasan" id="alasan" value="<?= $data_soal->alasan ?>">
                </div>
              </td>
            </tr>
            <tr>
              <td><b>Alasan</b></td>
              <td>
                <?php
                if ($data_soal->signature == null) {
                ?>
                  <div class="text-right">
                    <button type="button" class="btn btn-default btn-sm" id="undo"><i class="fa fa-undo"></i> Undo</button>
                    <button type="button" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</button>
                    <button type="button" class="btn btn-primary btn-sm" id="resize-canvas"><i class="fa fa-refresh"></i> Refresh</button>
                  </div>
                  <br>
                  <div class="wrapper">
                    <canvas id="signature-pad" class="signature-pad"></canvas>
                  </div>
                  <br>
                  <input type="hidden" name="signed2" id="signed2">
                  <button type="button" class="btn btn-primary btn-sm" id="save-png">Simpan Tanda Tangan</button>
                  <div id="tes_signature">
                    <div class="disini">

                    </div>
                  </div>
                <?php
                } else {
                ?>
                  <img src="<?= base_url('uploads/tanda_tangan/asesor/' . $data_soal->signature) ?>" alt="" class="square-img">

                <?php
                }
                ?>
              </td>
            </tr>
          </table>
        </div>
        <button class="btn btn-primary">Submit</button>
      </form>
      <!-- <h4 class="card-title"></h4>
      <div class="row mb-2">
        <div class="col-md-3">
          <label for=""></label>
        </div>
      </div> -->
    </div>
  </div>
</div>

<script>
  document.getElementById("answer").addEventListener("change", function() {
    let fileName = this.files[0] ? this.files[0].name : "Choose a file...";
    this.nextElementSibling.textContent = fileName;
  });
</script>