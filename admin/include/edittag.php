<?php
if (isset($_GET['data'])) {
  $id_tag = $_GET['data'];
  $_SESSION['id_tag'] = $id_tag;
  //get data tag
  $sql_d = "SELECT tag FROM tag WHERE id_tag = '$id_tag'";
  $query_d = mysqli_query($koneksi, $sql_d);
  while ($data_d = mysqli_fetch_row($query_d)) {
    $tag = $data_d[0];
  }
} else {
  header("Location:index.php?include=tag");
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i> Edit Tag</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=tag">Tag</a></li>
          <li class="breadcrumb-item active">Edit Tag</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Tag</h3>
      <div class="card-tools">
        <a href="index.php?include=tag" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
    <form class="form-horizontal" method="POST" action="index.php?include=konfirmasi-edit-tag">
      <div class="card-body">
        <div class="form-group row">
          <label for="Tag" class="col-sm-3 col-form-label">Tag</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="Tag" name="tag" value="<?= $tag ?>">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  <!-- /.card -->

</section>