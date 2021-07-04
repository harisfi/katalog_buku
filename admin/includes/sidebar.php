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
          <a href="index.php" class="nav-link <?= ($include == 'profil' || !isset($include)) ? $ac : '' ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profil
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview 
          <?php
          if ($include == 'kategori-buku' || $include == 'tag' || $include == 'penerbit' || $include == 'kategori-blog') {
            echo 'menu-open';
          }
          ?>">
          <a href="#" class="nav-link" <?php
                                        if ($include == 'kategori-buku' || $include == 'tag' || $include == 'penerbit' || $include == 'kategori-blog') {
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
              <a href="index.php?include=kategori-buku" class="nav-link <?= ($include == 'kategori-buku') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?include=tag" class="nav-link  <?= ($include == 'tag') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tag</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?include=penerbit" class="nav-link <?= ($include == 'penerbit') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penerbit</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?include=kategori-blog" class="nav-link <?= ($include == 'kategori-blog') ? $ac : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Blog</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="index.php?include=konten" class="nav-link <?= ($include == 'konten') ? $ac : '' ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Konten
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?include=buku" class="nav-link <?= ($include == 'buku') ? $ac : '' ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?include=blog" class="nav-link <?= ($include == 'blog') ? $ac : '' ?>">
            <i class="nav-icon fab fa-blogger"></i>
            <p>
              Blog
            </p>
          </a>
        </li>
        <?php
        if (isset($_SESSION['level'])) {
          if ($_SESSION['level'] == "Superadmin") {
            ?>
            <li class="nav-item">
              <a href="index.php?include=user" class="nav-link <?= ($include == 'user') ? $ac : '' ?>">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Pengaturan User
                </p>
              </a>
            </li>
          <?php
          }
        }
        ?>
        <li class="nav-item">
          <a href="index.php?include=ubah-password" class="nav-link <?= ($include == 'ubah-password') ? $ac : '' ?>">
            <i class="nav-icon fas fa-user-lock"></i>
            <p>
              Ubah Password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?include=signout" class="nav-link">
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