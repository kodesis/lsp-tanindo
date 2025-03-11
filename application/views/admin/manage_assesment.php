<style type="text/css">
  .signature-pad {
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    height: 260px;
  }
</style>
<div class="content-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-custom bg-inverse-info">
      <li class="breadcrumb-item"><a href="<?= base_url('staff') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><span>Data Assesment</span></li>
    </ol>
  </nav>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Assesment</h4>

      <div class="row">
        <div class="col-sm-12 col-md-6">
        </div>
        <div class="col-sm-12 col-md-6">
          <!-- isi search dan pagination -->
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>User Course</th>
                  <th>Course</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($user_courses)): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($user_courses as $uc): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $uc['full_name']; ?></td>
                      <td><?php echo $uc['course_name']; ?></td>
                      <td>
                        <a type="button" class="btn btn-inverse-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?= $uc['uc_uid'] ?>"><i class="typcn typcn-document btn-icon-append"></i>Detail Asesi</a>
                      </td>
                    </tr>


                    <!-- Modal Detail -->
                    <div class="modal fade" id="detailModal<?= $uc['uc_uid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel"><?= $uc['course_name'] ?></h4>
                          </div>
                          <form action="<?= base_url('admin/status_asesmen') ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-12">
                                  <h5>Data Pribadi</h5>
                                </div>
                                <input type="text" name="user_course" value="<?= $uc['uc_uid'] ?>">
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="user_number">Nomor Pendaftaran Peserta</label>
                                    <input type="text" class="form-control" name="user_number" id="user_number" value="<?= $uc['register_num'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="name"> Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= $uc['full_name'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="no_ktp"> No KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" id="no_ktp" value="<?= $uc['no_ktp'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="place_of_birth"> Tempat Lahir</label>
                                    <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="<?= $uc['place_of_birth'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="date_of_birth"> Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" value="<?= $uc['date_of_birth'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="gender"> Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="gender" id="gender" value="<?= $uc['gender'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="nationality"> Kebangsaan</label>
                                    <input type="text" class="form-control" name="nationality" id="nationality" value="<?= $uc['nationality'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-8">
                                  <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" class="form-control" name="address" id="address" value="<?= $uc['home_address'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?= $uc['kode_pos'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="phone"> Nomor Telpon</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $uc['mobile_number'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="email"> Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $uc['email'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="phone"> Nomor Telpon Rumah</label>
                                    <input type="text" class="form-control" name="home_mobile_number" id="home_mobile_number" value="<?= $uc['home_mobile_number'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="email"> Nomor Telpon Kantor</label>
                                    <input type="text" class="form-control" name="office_mobile_number" id="office_mobile_number" value="<?= $uc['office_mobile_number'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="phone"> Nomor Telpon</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $uc['mobile_number'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="email"> Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $uc['email'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="gender">Kualifikasi Pendidikan</label>
                                    <input type="text" class="form-control" name="kualifikasi_pendidikan" id="kualifikasi_pendidikan" value="<?= $uc['kualifikasi_pendidikan'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="course_choise">Selected Skema</label>
                                    <input type="text" class="form-control" name="course_name" id="course_choise" value="<?= $uc['course_name'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="institute">Nama Institusi / Perusahaan :</label>
                                    <input type="text" class="form-control" name="institute" id="institute" value="<?= $uc['institute'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="jabatan">Jabatan :</label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $uc['jabatan'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-8">
                                  <div class="form-group">
                                    <label for="alamat_kantor">Alamat Kantor :</label>
                                    <input type="text" class="form-control" name="alamat_kantor" id="alamat_kantor" value="<?= $uc['alamat_kantor'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="kode_pos_kantor">Kode Pos :</label>
                                    <input type="text" class="form-control" name="kode_pos_kantor" id="kode_pos_kantor" value="<?= $uc['kode_pos_kantor'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="mobile_number_kantor">Nomor Telepon Kantor :</label>
                                    <input type="text" class="form-control" name="mobile_number_kantor" id="mobile_number_kantor" value="<?= $uc['mobile_number_kantor'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="fax_kantor">Fax :</label>
                                    <input type="text" class="form-control" name="fax_kantor" id="fax_kantor" value="<?= $uc['fax_kantor'] ?>" readonly>
                                  </div>
                                </div>

                                <div class="col-4">
                                  <div class="form-group">
                                    <label for="email_kantor">Email :</label>
                                    <input type="text" class="form-control" name="email_kantor" id="email_kantor" value="<?= $uc['email_kantor'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="jabatan">Ijasah Terakhir :</label>
                                    <img src="<?= base_url('uploads/' . $uc['ijasah']) ?>" alt="Ijasah" class="img-fluid" style="max-width: 100%; height: auto;">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="jabatan">Sertifikat bidang Penyuluhan :</label>
                                    <img src="<?= base_url('uploads/' . $uc['sertifikat']) ?>" alt="Sertifikat" class="img-fluid" style="max-width: 100%; height: auto;">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="jabatan">Surat Keterangan sebagai Penyuluh :</label>
                                    <img src="<?= base_url('uploads/' . $uc['sk_pertanian']) ?>" alt="Surat Ijin" class="img-fluid" style="max-width: 100%; height: auto;">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="jabatan">Foto 3x4 :</label>
                                    <img src="<?= base_url('uploads/' . $uc['image']) ?>" alt="Foto" class="img-fluid" style="max-width: 100%; height: auto;">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="jabatan">Fotokopi KTP :</label>
                                    <img src="<?= base_url('uploads/' . $uc['ktp']) ?>" alt="KTP" class="img-fluid" style="max-width: 100%; height: auto;">
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="jabatan">Tanda Tangan :</label>
                                    <img src="<?= base_url('uploads/tanda_tangan/' . $uc['signature']) ?>" alt="KTP" class="img-fluid" style="max-width: 100%; height: auto;">
                                  </div>
                                </div>
                                <div class="col-12">
                                  <br>
                                  <h5>
                                    Data Sertifikasi
                                  </h5>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="mobile_number_kantor">Tujuan Asesmen :</label>
                                    <input type="text" class="form-control" name="tujuan_asesmen" id="tujuan_asesmen" value="<?= $uc['tujuan_asesmen'] ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="status">Isi Status Kelayakan :</label>
                                    <select name="status" id="status" class="form-select">
                                      <option disabled <?php if ($uc['status'] == '0') echo "selected"; ?>>-- Pilih Status Asesmen --</option>
                                      <option value='0' <?php if ($uc['status'] == '0') echo "selected"; ?>>Diterima</option>
                                      <option value='4' <?php if ($uc['status'] == '4') echo "selected"; ?>>Tidak Memenuhi Syarat</option>
                                    </select>
                                    <input type="hidden" name="user_uid" value="<?= $uc['user_uid'] ?>">
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                    <label for="status">Alasan :</label>
                                    <input type="text" class="form-control" name="alasan" id="alasan" value="<?= $uc['alasan'] ?>">
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <hr>
                                      <h4>Admin</h4>
                                      <h4>Tanda Tangan</h4>
                                      <div class="text-right">
                                        <button type="button" class="btn btn-default btn-sm" id="undo"><i class="fa fa-undo"></i> Undo</button>
                                        <button type="button" class="btn btn-danger btn-sm" id="clear"><i class="fa fa-eraser"></i> Clear</button>
                                        <button type="button" class="btn btn-primary btn-sm" id="resize-canvas"><i class="fa fa-refresh"></i> Mulai</button>
                                      </div>

                                      <br>
                                      <div class="wrapper">
                                        <canvas id="signature-pad" class="signature-pad"></canvas>
                                      </div>
                                      <br>
                                      <input type="hidden" name="signed2" id="signed2">

                                      <button type="button" class="btn btn-primary btn-sm" id="save-png">Simpan Tanda Tangan</button>
                                      <br>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12" id="tes_signature">
                                  <div class="disini">

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Submit</button>
                              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

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
    </div>
  </div>
</div>