<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f0f2f5;
    cursor: none;
  }

  .slider-container {
    width: 1200px;
    position: relative;
    overflow: hidden;
  }

  .slider {
    display: flex;
    position: relative;
  }

  .slide {
    min-width: 400px;
    height: 400px;
    margin: 0 10px;
    position: relative;
    transform: scale(0.8);
    opacity: 0.6;
    transition: all 0.3s ease-in-out;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
  }

  .slide.active {
    transform: scale(1);
    opacity: 1;
  }

  .slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .custom-cursor {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid white;
    border-radius: 50%;
    position: fixed;
    pointer-events: none;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 20px;
    opacity: 0;
    transition: transform 0.1s ease;
    backdrop-filter: blur(4px);
    z-index: 1000;
  }

  .custom-cursor.left::before {
    content: "←";
  }

  .custom-cursor.right::before {
    content: "→";
  }

  .custom-cursor.active {
    transform: scale(1.5);
  }
</style>

<div class="content-wrapper">
  <?php if ($this->session->flashdata('success')): ?>
    <p><?php echo $this->session->flashdata('success'); ?></p>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <p><?php echo $this->session->flashdata('error'); ?></p>
  <?php endif; ?>
  <?php echo isset($error) ? $error : ''; ?>
  <div class="custom-cursor"></div>
  <div class="slider-container">
    <div class="slider">

    </div>
  </div>
  <div class="row">
    <?php foreach ($course as $cour) { ?>
      <div class="col-md-5 grid-margin grid-margin-md-0 stretch-card">
        <div class="card">
          <div class="card-body text-center">
            <i class="fas fa-certificate"></i> &nbsp; Sertifikasi
            <h4 class="mt-2 card-text">
              <?= $cour->course_name ?>
            </h4>
            <?php
            $this->db->from('user_courses');
            $this->db->where('user_uid', $this->session->userdata('user_id'));
            $this->db->where('course_uid', $cour->uid);
            $cek_course_user = $this->db->get()->row();
            if ($cek_course_user) {
            ?>
              <button class="btn btn-inverse-secondary btn-sm mt-3 mb-4">Sudah Join Program</button>
            <?php
            } else {
            ?>
              <button type="submit" class="btn btn-inverse-success btn-sm mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $cour->uid ?>">Join Program</button>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
      <!-- Modal starts -->
      <div class="modal fade" id="exampleModal<?= $cour->uid ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?= $cour->course_name ?></h5>
            </div>
            <!-- <form action="<?= base_url('user/save_program_choise') ?>" method="post"> -->
            <?php echo form_open_multipart('user/save_program_choise'); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="user_number">User Number</label>
                <input type="text" class="form-control" name="user_number" id="user_number" value="<?= $users->register_num ?>" readonly>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label for="name"> Nama</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?= $users->full_name ?>" readonly>
                </div>
                <div class="col">
                  <label for="email"> Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="<?= $users->email ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label for="phone">Nomor Telpon</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="<?= $users->mobile_number ?>" readonly>
                </div>
                <div class="col">
                  <label for="gender">Jenis Kelamin</label>
                  <input type="text" class="form-control" name="gender" id="gender" value="<?= $users->gender ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" name="address" id="address" value="<?= $users->home_address ?>" readonly>
              </div>
              <div class="form-group row">
                <div class="col">
                  <label for="city">Kota</label>
                  <input type="text" class="form-control" name="city" id="city" value="<?= $users->city ?>" readonly>
                </div>
                <div class="col">
                  <label for="province">Provinsi</label>
                  <input type="text" class="form-control" name="province" id="province" value="<?= $users->province ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="course_choise">Selected Skema</label>
                <input type="hidden" class="form-control" name="course_uid" id="course_choise" value="<?= $cour->uid ?>">
                <input type="text" class="form-control" name="course_name" id="course_choise" value="<?= $cour->course_name ?>">
              </div>
              <div class="form-group">
                <label for="ijasah">Ijasah Terakhir:</label>
                <input type="file" name="ijasah" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="sertifikat">Sertifikat bidang Penyuluhan :</label>
                <input type="file" name="sertifikat" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="surat_ijin">Surat Keterangan sebagai Penyuluh :</label>
                <input type="file" name="surat_ijin" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="foto">Foto 3x4 :</label>
                <input type="file" name="foto" size="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="foto_ktp">Fotokopi KTP :</label>
                <input type="file" name="foto_ktp" size="20" class="form-control">
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
      <!-- Modal Ends -->
    <?php } ?>
  </div>
  <br><br><br>

  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data Sertifikasi Yang Di Ambil</h4>

      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Course</th>
                  <th>Eligibility status</th>
                  <th>Sertifikat</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data_course)): ?>
                  <?php $no = 1; ?>
                  <?php foreach ($data_course as $dc): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $dc['course_name']; ?></td>
                      <td>
                        <?php if ($dc['status'] == '1') { ?>
                          <label class='btn btn-success'>Lulus</label>
                        <?php } else { ?>
                          <label class='btn btn-warning'>Belum Ada Penilaian</label>
                        <?php } ?>
                      </td>
                      <td>
                        <?php if ($dc['status'] == '1') { ?>
                          <a href="<?= base_url('user/download_sertifikat/') . $dc['certificate_number'] ?>" type="button" class="btn btn-outline-info btn-icon-text">
                            <i class="typcn typcn-upload btn-icon-prepend"></i>
                            Print
                          </a>
                        <?php } else { ?>
                          <a type="button" class="btn btn-outline-warning btn-icon-text">
                            <i class="typcn typcn-warning btn-icon-prepend"></i>
                            Belum Selesai!
                          </a>
                        <?php } ?>
                      </td>
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
    </div>
  </div>
</div>

<script>
  class Slider {
    constructor() {
      this.container = document.querySelector('.slider-container');
      this.slider = document.querySelector('.slider');
      this.cursor = document.querySelector('.custom-cursor');
      this.slideWidth = 420; // 400px + 20px margin

      // Configuration des images
      this.images = [
        "https://www.santarosaforward.com/img/managed/Image/111/file.jpg",
        "https://www.santarosaforward.com/img/managed/Image/111/file.jpg",
        "https://www.santarosaforward.com/img/managed/Image/111/file.jpg",
        "https://www.santarosaforward.com/img/managed/Image/111/file.jpg",
        "https://www.santarosaforward.com/img/managed/Image/111/file.jpg"
      ];

      this.currentIndex = 0;
      this.isAnimating = false;

      this.init();
    }

    init() {
      this.createSlides();
      this.setupEventListeners();
      this.positionSlides();
      this.startAutoplay();
    }

    createSlides() {
      // Créer trois fois le nombre d'images pour un défilement infini fluide
      const totalSlides = this.images.length * 3;
      for (let i = 0; i < totalSlides; i++) {
        const index = i % this.images.length;
        const slide = document.createElement('div');
        slide.className = 'slide';
        slide.innerHTML = `<img src="${this.images[index]}" alt="Slide ${index + 1}">`;
        this.slider.appendChild(slide);
      }
    }

    positionSlides() {
      const slides = this.slider.querySelectorAll('.slide');
      const offset = (this.container.offsetWidth - this.slideWidth) / 2;
      const baseTransform = -this.currentIndex * this.slideWidth + offset;

      this.slider.style.transform = `translateX(${baseTransform}px)`;

      // Mettre à jour la slide active
      slides.forEach((slide, index) => {
        const normalizedIndex = this.normalizeIndex(index);
        slide.classList.toggle('active', normalizedIndex === this.currentIndex % this.images.length);
      });
    }

    normalizeIndex(index) {
      return index % this.images.length;
    }

    moveSlides(direction) {
      if (this.isAnimating) return;
      this.isAnimating = true;

      const slides = this.slider.querySelectorAll('.slide');
      this.currentIndex += direction;

      // Animer le mouvement
      this.slider.style.transition = 'transform 0.3s ease-out';
      this.positionSlides();

      // Réinitialiser la position si nécessaire
      if (this.currentIndex >= this.images.length * 2 || this.currentIndex <= this.images.length - 1) {
        setTimeout(() => {
          this.slider.style.transition = 'none';
          this.currentIndex = this.currentIndex >= this.images.length * 2 ?
            this.currentIndex - this.images.length :
            this.currentIndex + this.images.length;
          this.positionSlides();
        }, 300);
      }

      setTimeout(() => {
        this.isAnimating = false;
      }, 300);
    }

    setupEventListeners() {
      // Mouvement du curseur
      document.addEventListener('mousemove', (e) => {
        this.cursor.style.left = `${e.clientX - 25}px`;
        this.cursor.style.top = `${e.clientY - 25}px`;

        const rect = this.container.getBoundingClientRect();
        const isLeft = e.clientX < rect.left + rect.width / 2;

        this.cursor.classList.toggle('left', isLeft);
        this.cursor.classList.toggle('right', !isLeft);
      });

      // Interaction avec le slider
      this.container.addEventListener('mouseenter', () => {
        this.cursor.style.opacity = '1';
        this.stopAutoplay();
      });

      this.container.addEventListener('mouseleave', () => {
        this.cursor.style.opacity = '0';
        this.startAutoplay();
      });

      this.container.addEventListener('click', (e) => {
        const rect = this.container.getBoundingClientRect();
        const isLeft = e.clientX < rect.left + rect.width / 2;

        this.moveSlides(isLeft ? -1 : 1);

        // Animation du curseur
        this.cursor.classList.add('active');
        setTimeout(() => this.cursor.classList.remove('active'), 300);
      });

      // Ajuster au redimensionnement
      window.addEventListener('resize', () => this.positionSlides());
    }

    startAutoplay() {
      this.stopAutoplay();
      this.autoplayInterval = setInterval(() => {
        this.moveSlides(1);
      }, 3000);
    }

    stopAutoplay() {
      if (this.autoplayInterval) {
        clearInterval(this.autoplayInterval);
      }
    }
  }

  // Initialiser le slider quand le DOM est chargé
  document.addEventListener('DOMContentLoaded', () => {
    new Slider();
  });
</script>