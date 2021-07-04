<?php
$sql_k = "SELECT judul, isi FROM konten WHERE judul LIKE '%about%'";
$query_k = mysqli_query($koneksi, $sql_k);
while ($data_k = mysqli_fetch_row($query_k)) {
  $judul_k = $data_k[0];
  $isi_k = $data_k[1];
}
?>
<section id="blog-header">
  <div class="container">
    <h1 class="text-white">ABOUT US</h1>
  </div>
</section><br><br>
<section id="blog-list">
  <main role="main" class="container">
    <div class="row">
      <div class="col-md-9 blog-main">
        <div class="blog-post">
          <h2 class="blog-post-title"><?= $judul_k ?></h2>
          <?= $isi_k ?>
        </div><br><br><!-- /.blog-post -->
      </div><!-- /.blog-main -->

      <aside class="col-md-3 blog-sidebar">

        <div class="p-4">
          <h4 class="font-italic">Social Media</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
          </ol>
        </div>
      </aside>
      <!-- /.blog-sidebar -->

    </div><!-- /.row -->

  </main><!-- /.container -->
</section><br><br>