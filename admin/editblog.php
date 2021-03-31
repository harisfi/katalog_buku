<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
  $id_blog = $_GET['data'];
  $_SESSION['id_blog'] = $id_blog;
  //get data kategori buku
  $sql_d = "select (select kategori_blog from kategori_blog where id_kategori_blog = blog.id_kategori_blog), `judul`,`isi` from `blog` where `id_blog` = '$id_blog'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $kategori = $data_d[0];
    $judul = $data_d[1];
    $isi = $data_d[2];
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
              <h3><i class="fas fa-edit"></i> Edit Data Blog</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="blog.php">Data Blog</a></li>
                <li class="breadcrumb-item active">Edit Data Blog</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Blog</h3>
            <div class="card-tools">
              <a href="blog.php" class="btn btn-sm btn-warning float-right">
                <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          </br></br>
          <div class="col-sm-10">
            <?php if (!empty($_GET['notif'])) { ?>
              <?php if ($_GET['notif'] == "editkosong") { ?>
                <div class="alert alert-danger" role="alert">
                  Maaf data Blog wajib di isi</div>
              <?php } ?>
            <?php } ?>
          </div>
          <form class="form-horizontal" method="POST" action="konfirmasieditblog.php">
            <div class="card-body">

              <div class="form-group row">
                <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>
                <div class="col-sm-7">
                  <select class="custom-select" id="kategori" name="kategori">
                    <option value="0">- Pilih Kategori -</option>
                    <?php
                    $sql_k = "SELECT id_kategori_blog, kategori_blog FROM kategori_blog";
                    $query_k = mysqli_query($koneksi, $sql_k);
                    while ($data_k = mysqli_fetch_row($query_k)) {
                      $id_kategori_blog = $data_k[0];
                      $kategori_blog = $data_k[1];
                    ?>
                      <option value="<?= $id_kategori_blog ?>" <?= ($kategori == $kategori_blog) ? "selected" : "" ?>><?= $kategori_blog ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="judul" id="judul" value="<?= $judul ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="isi" class="col-sm-3 col-form-label">Isi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="isi" id="editor1" rows="12"><?= $isi ?></textarea>
                </div>
              </div>

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