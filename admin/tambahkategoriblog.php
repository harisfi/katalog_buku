<?php
include("./includes/auth.php");
include("./components/libs.php");

use components\libs as l;
$notif = new l\Notifikasi();
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
              <h3><i class="fas fa-plus"></i> Tambah Kategori Blog</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="kategoriblog.php">Kategori Blog</a></li>
                <li class="breadcrumb-item active">Tambah Kategori Blog</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Kategori Blog</h3>
            <div class="card-tools">
              <a href="kategoriblog.php" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
          <form class="form-horizontal" method="POST" action="konfirmasitambahkategoriblog.php">
            <div class="card-body">
              <div class="form-group row">
                <label for="kategoribuku" class="col-sm-3 col-form-label">Kategori Blog</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="kategoriblog" name="kategori_blog" value="">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
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