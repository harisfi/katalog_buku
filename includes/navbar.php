<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Katalog Buku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= (!isset($include) || $include == '') ? 'active' : '' ?>">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $include == 'about-us' ? 'active' : '' ?>" href="index.php?include=about-us">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
          <div class="dropdown-menu" aria-labelledby="dropdown07">
            <?php
            $sql_c = "SELECT id_kategori_buku, kategori_buku FROM kategori_buku ORDER BY kategori_buku";
            $query_c = mysqli_query($koneksi, $sql_c);
            while ($data_c = mysqli_fetch_row($query_c)) {
              echo "<a class='dropdown-item' href='index.php?include=daftar-buku-kategori&data=$data_c[0]'>$data_c[1]</a>";
            }
            ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $include == 'blog' ? 'active' : '' ?>" href="index.php?include=blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $include == 'contact-us' ? 'active' : '' ?>" href="index.php?include=contact-us">Contact Us</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>