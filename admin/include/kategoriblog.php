<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_kategori_blog = $_GET['data'];
    //hapus kategori blog
    $sql_dh = "DELETE FROM kategori_blog WHERE id_kategori_blog = '$id_kategori_blog'";
    mysqli_query($koneksi, $sql_dh);
  }
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-address-book"></i> Kategori Blog</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Kategori Blog</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Kategori Blog</h3>
      <div class="card-tools">
        <a href="index.php?include=tambah-kategori-blog" class="btn btn-sm btn-info float-right">
          <i class="fas fa-plus"></i> Tambah Kategori Blog</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="POST" action="index.php?include=kategori-blog">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="katakunci" value="<?= (isset($katakunci)) ? $katakunci : '' ?>">
            </div>
            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>&nbsp; Search</button>
            </div>
          </div><!-- .row -->
        </form>
      </div><br>
      <div class="col-sm-12">
        <?php if (!empty($_GET['notif'])) {
          $notif->generate($_GET['notif']);
        } ?>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="80%">Kategori Blog</th>
            <th width="15%">
              <center>Aksi</center>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $batas = 5;
          if (!isset($_GET['halaman'])) {
            $posisi = 0;
            $halaman = 1;
          } else {
            $halaman = $_GET['halaman'];
            $posisi = ($halaman - 1) * $batas;
          }

          $sql_k = "SELECT id_kategori_blog, kategori_blog FROM kategori_blog";
          if (isset($katakunci)) {
            $sql_k .= " WHERE kategori_blog LIKE '%$katakunci%'";
          }
          $sql_k .= " ORDER BY kategori_blog";
          $sql_q = $sql_k . " LIMIT $posisi, $batas";
          $query_k = mysqli_query($koneksi, $sql_q);
          $no = $posisi+1;
          while ($data_k = mysqli_fetch_row($query_k)) {
            $id_kategori_blog = $data_k[0];
            $kategori_blog = $data_k[1];
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $kategori_blog; ?></td>
              <td align="center">
                <a href="index.php?include=edit-kategori-blog&data=<?= $id_kategori_blog ?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $kategori_blog ?>?'))window.location.href = 'index.php?include=kategori-blog&aksi=hapus&data=<?= $id_kategori_blog ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>Hapus</a>
              </td>
            </tr>
          <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <?php
      //hitung jumlah semua data
      $sql_jum = $sql_k;
      $query_jum = mysqli_query($koneksi, $sql_jum);
      $jum_data = mysqli_num_rows($query_jum);
      $jum_halaman = ceil($jum_data / $batas);
      $pagination->generate("index.php?include=$include", $jum_halaman, $halaman, isset($katakunci) ? $katakunci : NULL);
      ?>
    </div>
  </div>
  <!-- /.card -->

</section>