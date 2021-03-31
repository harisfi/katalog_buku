<?php
$ac = "active";
$now = basename($_SERVER['PHP_SELF']);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminKatalog</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="profil.php" class="nav-link <?= ($now == 'profil.php') ? $ac : '' ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profil
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview 
          <?php
          if ($now == 'kategoribuku.php' || $now == 'tag.php' || $now == 'penerbit.php' || $now == 'kategoriblog.php') {
            echo 'menu-open';
          }
          ?>">
          <a href="#" class="nav-link" <?php
                                        if ($now == 'kategoribuku.php' || $now == 'tag.php' || $now == 'penerbit.php' || $now == 'kategoriblog.php') {
                                          echo "style='display:'block'";
                                        }
                                        ?>>
            <i class="nav-icon fas fa-database"></i>
            <p>
              Data Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="kategoribuku.php" class="nav-link <?= ($now == 'kategoribuku.php') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tag.php" class="nav-link  <?= ($now == 'tag.php') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tag</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="penerbit.php" class="nav-link <?= ($now == 'penerbit.php') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penerbit</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="kategoriblog.php" class="nav-link <?= ($now == 'kategoriblog.php') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Blog</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="konten.php" class="nav-link <?= ($now == 'konten.php') ? $ac : '' ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Konten
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="buku.php" class="nav-link <?= ($now == 'buku.php') ? $ac : '' ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="blog.php" class="nav-link <?= ($now == 'blog.php') ? $ac : '' ?>">
            <i class="nav-icon fab fa-blogger"></i>
            <p>
              Blog
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="user.php" class="nav-link <?= ($now == 'user.php') ? $ac : '' ?>">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              Pengaturan User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="ubahpassword.php" class="nav-link <?= ($now == 'ubahpassword.php') ? $ac : '' ?>">
            <i class="nav-icon fas fa-user-lock"></i>
            <p>
              Ubah Password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="signout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Sign Out
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>