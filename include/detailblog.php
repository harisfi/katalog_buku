  <section id="blog-header">
    <div class="container">
      <h1 class="text-white">BLOG</h1>
    </div>
  </section><br><br>
  <section id="blog-list">
    <main role="main" class="container">
      <div class="row">
        <?php
        if (isset($_GET['data'])) {
          $id_blog = $_GET['data'];
          $sql_d = "SELECT b.judul, DATE_FORMAT(b.tanggal, '%M %d, %Y'), b.isi, u.nama, k.kategori_blog FROM blog b INNER JOIN user u ON b.id_user = u.id_user INNER JOIN kategori_blog k ON b.id_kategori_blog = k.id_kategori_blog WHERE b.id_blog = '$id_blog'";
          $query_d = mysqli_query($koneksi, $sql_d);
          while ($data_d = mysqli_fetch_row($query_d)) {
        ?>
            <div class="col-md-9 blog-main">
              <div class="blog-post">
                <h2 class="blog-post-title"><?= $data_d[0] ?></h2>
                <p class="blog-post-meta"><?= $data_d[1] ?> by <a href="#"><?= $data_d[3] ?></a> in <a href="#"><?= $data_d[4] ?></a></p>
                <?= $data_d[2] ?>
              </div><br><br><!-- /.blog-post -->
            </div><!-- /.blog-main -->
        <?php
          }
        } else {
          # code...
        }
        ?>
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