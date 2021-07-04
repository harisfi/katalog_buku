<?php
if (isset($_GET['data'])) {
  $id_blog = $_GET['data'];
  $sql_k = "SELECT b.tanggal, k.kategori_blog, b.judul, u.nama, b.isi FROM blog b JOIN kategori_blog k ON b.id_kategori_blog=k.id_kategori_blog JOIN user u ON b.id_user=u.id_user WHERE id_blog = '$id_blog'";
  $query_k = mysqli_query($koneksi, $sql_k);
  while ($data_k = mysqli_fetch_row($query_k)) {
    $tanggal = $data_k[0];
    $kategori = $data_k[1];
    $judul = $data_k[2];
    $penulis = $data_k[3];
    $isi = $data_k[4];
  }
} else {
  header("Location:index.php?include=blog");
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Detail Data Blog</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?include=blog">Data Blog</a></li>
          <li class="breadcrumb-item active">Detail Data Blog</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="index.php?include=blog" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="20%"><strong>Tanggal<strong></td>
            <td width="80%"><?= $tanggal ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Kategori Blog<strong></td>
            <td width="80%"><?= $kategori ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Judul<strong></td>
            <td width="80%"><?= $judul ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Penulis<strong></td>
            <td width="80%"><?= $penulis ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Isi<strong></td>
            <td width="80%"><?= $isi ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">&nbsp;</div>
  </div>
  <!-- /.card -->

</section>