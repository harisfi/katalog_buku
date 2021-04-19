<?php
include("./includes/auth.php");
include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
  $id_buku = $_GET['data'];
  $sql_k = "SELECT b.cover, k.kategori_buku, b.judul, b.pengarang, p.penerbit, b.tahun_terbit, b.sinopsis FROM buku b JOIN kategori_buku k ON b.id_kategori_buku=k.id_kategori_buku JOIN penerbit p ON b.id_penerbit=p.id_penerbit WHERE id_buku = '$id_buku'";
  $query_k = mysqli_query($koneksi, $sql_k);
  while ($data_k = mysqli_fetch_row($query_k)) {
    $cover = $data_k[0];
    $kategori = $data_k[1];
    $judul = $data_k[2];
    $pengarang = $data_k[3];
    $penerbit = $data_k[4];
    $tahun = $data_k[5];
    $sinopsis = $data_k[6];
  }
} else {
  header("Location:buku.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include("includes/header.php") ?>

    <?php include("includes/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-user-tie"></i> Detail Data Buku</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="buku.php">Data Buku</a></li>
                <li class="breadcrumb-item active">Detail Data Buku</li>
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
              <a href="buku.php" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><strong>Cover Buku<strong></td>
                  <td><img src="cover/<?= $cover ?>" class="img-fluid" width="200px;"></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Kategori Buku<strong></td>
                  <td width="80%"><?= $kategori ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Judul<strong></td>
                  <td width="80%"><?= $judul ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Pengarang<strong></td>
                  <td width="80%"><?= $pengarang ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Penerbit<strong></td>
                  <td width="80%"><?= $penerbit ?></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Tahun Terbit<strong></td>
                  <td width="80%"><?= $tahun ?></td>
                </tr>
                <tr>
                  <td><strong>Tag<strong></td>
                  <td>
                    <ul>
                      <?php
                      $sql_k = "SELECT t.tag FROM tag_buku tb JOIN tag t ON tb.id_tag=t.id_tag WHERE id_buku = '$id_buku'";
                      $query_k = mysqli_query($koneksi, $sql_k);
                      while ($data_k = mysqli_fetch_row($query_k)) {
                      ?>
                        <li><?= $data_k[0] ?></li>
                      <?php } ?>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td width="20%"><strong>Sinopsis<strong></td>
                  <td width="80%"><?= $sinopsis ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">&nbsp;</div>
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("includes/footer.php") ?>

  </div>
  <!-- ./wrapper -->

  <?php include("includes/script.php") ?>
</body>

</html>