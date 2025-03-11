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
      <form action="<?= base_url('user/save_answer') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <table class="table table-hover">
            <tr>
              <td><b>Kode Form</b></td>
              <td><?= $data_soal->kode_unit ?></td>
              <input type="hidden" name="id_assesmen" value="<?= $data_soal->uid ?>">
            </tr>
            <tr>
              <td><b>Judul Form</b></td>
              <td><?= $data_soal->judul_unit_kompetensi ?></td>
            </tr>
            <tr>
              <td><b>Petunjuk Pengerjaan</b></td>
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
                  <a class="btn btn-secondary" href="<?= base_url('uploads/answer/' . $data_soal->answer) ?>" download target="_blank">Unduh Jawaban</a>
                  <br>
                  <br>
                  <iframe src="<?= base_url('uploads/answer/' . $data_soal->answer) ?>" width="800" height="500" frameborder="0"></iframe>
                <?php
                }
                ?>
                <div class="custom-file" <?php if ($data_soal->status == 3) echo 'hidden' ?>>
                  <input class="custom-file-input" type="file" name="answer" id="answer">
                  <label for="answer" class="custom-file-label"><?= $data_soal->answer ?></label>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <button class="btn btn-primary" <?php if ($data_soal->status == 3) echo 'hidden' ?>>Submit</button>
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