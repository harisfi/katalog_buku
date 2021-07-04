<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-plus"></i> Tambah Kategori Buku</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=kategori-buku">Kategori Buku</a></li>
          <li class="breadcrumb-item active">Tambah Kategori Buku</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Kategori Buku</h3>
      <div class="card-tools">
        <a href="index.php?include=kategori-buku" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
    <form class="form-horizontal" method="POST" action="index.php?include=konfirmasi-tambah-kategori-buku">
      <div class="card-body">
        <div class="form-group row">
          <label for="kategoribuku" class="col-sm-3 col-form-label">Kategori Buku</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="kategoribuku" name="kategori_buku" value="">
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