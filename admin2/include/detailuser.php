<?php
if (isset($_GET['data'])) {
  $id_userz = $_GET['data'];
  $sql_k = "SELECT foto, nama, email, level, username FROM `user` WHERE `id_user` = '$id_userz'";
  $query_k = mysqli_query($koneksi, $sql_k);
  while ($data_k = mysqli_fetch_row($query_k)) {
    $foto = $data_k[0];
    $nama = $data_k[1];
    $email = $data_k[2];
    $level = $data_k[3];
    $username = $data_k[4];
  }
} else {
  header("Location:index.php?include=user");
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Detail Data User</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?include=user">Data User</a></li>
          <li class="breadcrumb-item active">Detail Data User</li>
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
        <a href="index.php?include=user" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Data User<strong></td>
          </tr>
          <tr>
            <td><strong>Foto User<strong></td>
            <td><img src="foto/<?= $foto ?>" class="img-fluid img-rounded shadow" width="200px;" loading="lazy"></td>
          </tr>
          <tr>
            <td width="20%"><strong>Nama<strong></td>
            <td width="80%"><?= $nama ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Email<strong></td>
            <td width="80%"><?= $email ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Level<strong></td>
            <td width="80%"><?= $level ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Username<strong></td>
            <td width="80%"><?= $username ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">&nbsp;</div>
  </div>
  <!-- /.card -->

</section>