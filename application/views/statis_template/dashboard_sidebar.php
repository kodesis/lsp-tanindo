<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Admin -->
    <!-- <?php if ($this->session->userdata('status') == 1) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'admin') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin') ?>">
          <i class="fas fa-tachometer-alt menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
    <?php } ?> -->

    <!-- Staff -->
    <!-- <?php if ($this->session->userdata('status') == 2) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'staff') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('staff') ?>">
          <i class="fas fa-tachometer-alt menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
    <?php } ?> -->

    <!-- User -->
    <?php if ($this->session->userdata('status') == 3) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == null) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('user') ?>">
          <i class="fas fa-tachometer-alt menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
    <?php } ?>

    <!-- Admin -->
    <?php if ($this->session->userdata('status') == 1) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'manage_users') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/manage_users') ?>">
          <i class="fa fa-user-plus menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Manage Staff</span>
        </a>
      </li>
    <?php } ?>

    <!-- Admin -->
    <?php if ($this->session->userdata('status') == 1) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'manage_course') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/manage_course') ?>">
          <i class="fas fa-file-signature menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Manage Course</span>
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'manage_asesment') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/manage_asesment') ?>">
          <i class="fas fa-file-signature menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Manage Asesment</span>
        </a>
      </li>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'manage_artikel') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/manage_artikel') ?>">
          <i class="fas fa-newspaper menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Artikel</span>
        </a>
      </li>
    <?php } ?>

    <!-- Staff -->
    <?php if ($this->session->userdata('status') == 2) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'manage_assesment') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('staff/manage_assesment') ?>">
          <i class="fas fa-landmark menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">User Assesment</span>
        </a>
      </li>
    <?php } ?>

    <!-- Admin -->
    <?php if ($this->session->userdata('status') == 1) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/profil') ?>">
          <i class="fas fa-user-cog menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Profile</span>
        </a>
      </li>
    <?php } ?>
    <!-- Staff -->
    <?php if ($this->session->userdata('status') == 2) { ?>
      <li class="nav-item <?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('staff/profil') ?>">
          <i class="fas fa-user-cog menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Profile</span>
        </a>
      </li>
    <?php } ?>
    <!-- User -->
    <?php if ($this->session->userdata('status') == 3) { ?>
      <li class="nav-item <?php echo (empty($this->uri->segment(2)) || $this->uri->segment(2) == 'profil') ? '' : 'active'; ?>">
        <a class="nav-link" href="<?= base_url('user/profil') ?>">
          <i class="fas fa-user-cog menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <!-- <li class="nav-item <?php echo ($this->uri->segment(2) == 'course') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('user/course') ?>">
          <i class="fas fa-book menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Pilihan Skema</span>
        </a>
      </li> -->
      <li class="nav-item <?php echo ($this->uri->segment(2) == 'sertifikasi') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('user/sertifikasi') ?>">
          <i class="fas fa-book menu-icon"></i> &nbsp; &nbsp;
          <span class="menu-title">Sertifikasi</span>
        </a>
      </li>
    <?php } ?>
  </ul>
</nav>
<!-- partial -->
<div class="main-panel">