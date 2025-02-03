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
                ?>
                <!-- <div class="custom-file">
                  <input class="custom-file-input" type="file" name="answer" id="answer">
                  <label for="answer" class="custom-file-label"><?= $data_soal->answer ?></label>
                </div> -->
              </td>
            </tr>
            <tr>
              <td><b>Rekomendasi</b></td>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="correct" id="correct" value="Kompeten" <?php if ($data_soal->correct = "Kompeten") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Kompeten
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="correct" id="correct" value="Belum Kompeten" <?php if ($data_soal->correct = "Belum Kompeten") echo "checked" ?>>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Belum Kompeten
                  </label>
                </div>
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