<?php
session_start();
include("./includes/auth.php");
include('../koneksi/koneksi.php');
include("./components/libs.php");

use components\libs as l;

$notif = new l\Notifikasi();

if (isset($_SESSION['id_user'])) {
  $id_user = $_SESSION['id_user'];
  $sql_d = "select `nama`, `email`,`foto` from `user` where `id_user` = '$id_user'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $nama = $data_d[0];
    $email = $data_d[1];
    $foto = $data_d[2];
  }
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
              <h3><i class="fas fa-edit"></i> Edit Profil</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="profil.php">Profil</a></li>
                <li class="breadcrumb-item active">Edit Profil</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Profil</h3>
            <div class="card-tools">
              <a href="profil.php" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          </br>
          <div class="col-sm-10 mt-2">
            <?php if (!empty($_GET['notif'])) {
              $notif->generate($_GET['notif']);
            } ?>
          </div>
          <form class="form-horizontal" method="POST" action="konfirmasieditprofil.php" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group row">
                <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
                    <i class="fas fa-user-circle"></i> <u>PROFIL USER</u></span></label>
              </div>
              <div class="form-group row">
                <label for="foto" class="col-sm-3 col-form-label">Foto Pegawai</label>
                <div class="col-sm-7">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto" id="customFile">
                    <label class="custom-file-label" for="customFile"><?=$foto?></label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="email" id="email" value="<?= $email ?>">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </div>
            <!-- /.card-footer -->
          </form>
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