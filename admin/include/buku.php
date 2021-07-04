<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_buku = $_GET['data'];
    //hapus tag buku
    $sql_dt = "DELETE FROM tag_buku WHERE id_buku = '$id_buku'";
    mysqli_query($koneksi, $sql_dt);
    //hapus buku
    $sql_dh = "DELETE FROM buku WHERE id_buku = '$id_buku'";
    mysqli_query($koneksi, $sql_dh);
  }
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-book"></i> Buku</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"> Buku</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Buku</h3>
      <div class="card-tools">
        <a href="index.php?include=tambah-buku" class="btn btn-sm btn-info float-right">
          <i class="fas fa-plus"></i> Tambah Buku</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="col-md-12">
        <form method="POST" action="index.php?include=buku">
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
            <th width="30%">Kategori</th>
            <th width="30%">Judul</th>
            <th width="20%">Penerbit</th>
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

          $sql_k = "SELECT b.id_buku, k.kategori_buku, b.judul, p.penerbit FROM buku b JOIN kategori_buku k ON b.id_kategori_buku = k.id_kategori_buku JOIN penerbit p ON b.id_penerbit = p.id_penerbit";
          if (isset($katakunci)) {
            $sql_k .= " WHERE k.kategori_buku LIKE '%$katakunci%' OR b.judul LIKE '%$katakunci%' OR p.penerbit LIKE '%$katakunci%'";
          }
          $sql_k .= " ORDER BY k.kategori_buku, b.judul";
          $sql_q = $sql_k . " LIMIT $posisi, $batas";
          $query_k = mysqli_query($koneksi, $sql_q);
          $no = $posisi+1;
          while ($data_k = mysqli_fetch_row($query_k)) {
            $id_buku = $data_k[0];
            $kategori = $data_k[1];
            $judul = $data_k[2];
            $penerbit = $data_k[3];
          ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $kategori ?></td>
              <td><?= $judul ?></td>
              <td><?= $penerbit ?></td>
              <td align="center">
                <a href="index.php?include=edit-buku&data=<?= $id_buku ?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                <a href="index.php?include=detail-buku&data=<?= $id_buku ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $judul ?>?'))window.location.href = 'index.php?include=buku&aksi=hapus&data=<?= $id_buku ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
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