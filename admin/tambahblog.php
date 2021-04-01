<?php
include("./includes/auth.php");
include("../koneksi/koneksi.php");
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
              <h3><i class="fas fa-plus"></i> Tambah Blog</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="blog.php">Data Blog</a></li>
                <li class="breadcrumb-item active">Tambah Blog</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Blog</h3>
            <div class="card-tools">
              <a href="blog.php" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          </br></br>
          <div class="col-sm-10 mt-2">
            <?php if (!empty($_GET['notif'])) {
              $notif->generate($_GET['notif']);
            } ?>
          </div>
          <form class="form-horizontal" method="POST" action="konfirmasitambahblog.php">
            <div class="card-body">
              <div class="form-group row">
                <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>
                <div class="col-sm-7">
                  <select class="custom-select" id="kategori" name="kategori">
                    <option value="0">- Pilih Kategori -</option>
                    <?php
                    $sql_k = "SELECT * FROM kategori_blog";
                    $query_k = mysqli_query($koneksi, $sql_k);
                    while ($data_k = mysqli_fetch_row($query_k)) {
                      $id_kategori = $data_k[0];
                      $kategori = $data_k[1];
                    ?>
                      <option value="<?= $id_kategori ?>"><?= $kategori ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="judul" id="judul" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="isi" class="col-sm-3 col-form-label">Isi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="isi" id="editor1" rows="12"></textarea>
                </div>
              </div>

            </div>
        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="col-sm-12">
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