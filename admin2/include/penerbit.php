<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_penerbit = $_GET['data'];
    //hapus kategori buku
    $sql_dh = "delete from `penerbit` where `id_penerbit` = '$id_penerbit'";
    mysqli_query($koneksi, $sql_dh);
  }
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-book-reader"></i> Penerbit</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Penerbit</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Penerbit</h3>
      <div class="card-tools">
        <a href="index.php?include=tambah-penerbit" class="btn btn-sm btn-info float-right">
          <i class="fas fa-plus"></i> Tambah Penerbit</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="POST" action="index.php?include=penerbit">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" id="kata_kunci" name="katakunci" value="<?= (isset($katakunci)) ? $katakunci : '' ?>">
            </div>
            <div class="col-md-5 bottom-10">
              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
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
            <th width="30%">Penerbit</th>
            <th width="50%">Alamat</th>
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

          $sql_k = "SELECT `id_penerbit`,`penerbit`,`alamat` FROM `penerbit`";
          if (isset($katakunci)) {
            $sql_k .= " WHERE penerbit LIKE '%$katakunci%' OR alamat LIKE '%$katakunci%'";
          }
          $sql_k .= " ORDER BY `penerbit`";
          $sql_q = $sql_k . " LIMIT $posisi, $batas";
          $query_k = mysqli_query($koneksi, $sql_q);
          $no = $posisi+1;
          while ($data_k = mysqli_fetch_row($query_k)) {
            $id_penerbit = $data_k[0];
            $penerbit = $data_k[1];
            $alamat = $data_k[2];
          ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $penerbit ?></td>
              <td><?= $alamat ?></td>
              <td align="center">
                <a href="index.php?include=edit-penerbit&data=<?= $id_penerbit ?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $penerbit ?>?'))window.location.href = 'index.php?include=penerbit&aksi=hapus&data=<?= $id_penerbit ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>Hapus</a>
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