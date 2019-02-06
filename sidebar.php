<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="employee.php">
          <i class="fa fa-users"></i> <span>Data Karyawan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="face_absensi.php">
          <i class="fa fa-address-book-o"></i> <span>Data Absensi</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
      <li>
        <a href="notabsence.php">
          <i class="fa fa-address-book-o"></i> <span>Data Tidak Absensi</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="belumabsence.php">
          <i class="fa fa-address-book-o"></i> <span>Data Belum Absensi</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="face_keamanan.php">
          <i class="fa fa-user-secret"></i> <span>Data Keamanan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="ijin_absensi.php">
          <i class="fa fa-envelope-open-o"></i> <span>Ijin Absensi</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <?php
      if (isset($_SESSION['nama_log'])) {
        echo '<li>
          <a href="logout.php">
            <i class="fa fa-cog"></i> <span>Logout</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>';
      }

      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
