<?php
include("./includes/auth.php");
include("../koneksi/koneksi.php");
include("./components/libs.php");

use components\libs as l;

$notif = new l\Notifikasi();
$pagination = new l\Pagination();

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_tag = $_GET['data'];
    //hapus kategori buku
    $sql_dh = "delete from `tag` where `id_tag` = '$id_tag'";
    mysqli_query($koneksi, $sql_dh);
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
              <h3><i class="fas fa-tag"></i> Tag</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"> Tag</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Tag</h3>
            <div class="card-tools">
              <a href="tambahtag.php" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Tag</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12">
              <form method="" action="">
                <div class="row">
                  <div class="col-md-4 bottom-10">
                    <input type="text" class="form-control" id="kata_kunci" name="katakunci" value="<?= (isset($_GET['katakunci'])) ? $_GET['katakunci'] : '' ?>">
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
                  <th width="80%">Tag</th>
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

                $sql_k = "SELECT `id_tag`,`tag` FROM `tag`";
                if (isset($_GET['katakunci'])) {
                  $katakunci = $_GET['katakunci'];
                  $sql_k .= " WHERE tag LIKE '%$katakunci%'";
                }
                $sql_k .= " ORDER BY `tag`";
                $sql_q = $sql_k . " LIMIT $posisi, $batas";
                $query_k = mysqli_query($koneksi, $sql_q);
                $no = $posisi+1;
                while ($data_k = mysqli_fetch_row($query_k)) {
                  $id_tag = $data_k[0];
                  $tag = $data_k[1];
                ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $tag ?></td>
                    <td align="center">
                      <a href="edittag.php?data=<?= $id_tag ?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $tag ?>?'))window.location.href = 'tag.php?aksi=hapus&data=<?= $id_tag ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i>Hapus</a>
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
            $pagination->generate(basename($_SERVER['PHP_SELF']), $jum_halaman, $halaman, isset($_GET['katakunci']) ? $_GET['katakunci'] : NULL);
            ?>
          </div>
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