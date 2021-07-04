  <section id="blog-header">
    <div class="container">
      <h1 class="text-white">BLOG</h1>
    </div>
  </section><br><br>
  <section id="blog-list">
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-9 blog-main">
          <?php
          $sql_l = "SELECT b.id_blog, b.judul, DATE_FORMAT(b.tanggal, '%M %d, %Y'), b.isi, u.nama FROM blog b INNER JOIN user u ON b.id_user = u.id_user ORDER BY 2";
          $query_l = mysqli_query($koneksi, $sql_l);
          while ($data_l = mysqli_fetch_row($query_l)) {
          ?>
            <div class="blog-post">
              <h2 class="blog-post-title"><a href="index.php?include=detail-blog&data=<?= $data_l[0] ?>"><?= $data_l[1] ?></a></h2>
              <p class="blog-post-meta"><?= $data_l[2] ?> by <a href="#"><?= $data_l[4] ?></a></p>
              <p><?= substr($data_l[3], 0, 250) . "…" ?></p>
              <a href="index.php?include=detail-blog&data=<?= $data_l[0] ?>" class="btn btn-primary">Continue reading..</a>
            </div><!-- /.blog-post --><br><br>
          <?php } ?>

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-3 blog-sidebar">

          <div class="p-4">
            <h4 class="font-italic">Categories</h4>
            <ol class="list-unstyled mb-0">
              <?php
              $sql_c = "SELECT * FROM kategori_blog ORDER BY kategori_blog ASC";
              $query_c = mysqli_query($koneksi, $sql_c);
              while ($data_c = mysqli_fetch_row($query_c)) {
              ?>
                <li><a href="#"><?= $data_c[1] ?></a></li>
              <?php } ?>
          </div>

          <div class="p-4">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <?php
              $sql_a = "SELECT YEAR(b.tanggal), MONTH(b.tanggal), DATE_FORMAT(b.tanggal, '%M') FROM blog b GROUP BY MONTH(b.tanggal) ORDER BY 2 DESC";
              $query_a = mysqli_query($koneksi, $sql_a);
              while ($data_a = mysqli_fetch_row($query_a)) {
              ?>
                <li><a href="#"><?= $data_a[2] . " " . $data_a[0] ?></a></li>
              <?php } ?>
            </ol>
          </div>


        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->
  </section><br><br>