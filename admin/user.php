<?php
include("./includes/auth.php");
include("../koneksi/koneksi.php");
include("./components/libs.php");

use components\libs as l;

$notif = new l\Notifikasi();
$pagination = new l\Pagination();

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
  if ($_GET['aksi'] == 'hapus') {
    $id_user = $_GET['data'];
    //hapus kategori user
    $sql_dh = "delete from `user` where `id_user` = '$id_user'";
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
              <h3><i class="fas fa-user-tie"></i> Data User</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"> Data User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar User</h3>
            <div class="card-tools">
              <a href="tambahuser.php" class="btn btn-sm btn-info float-right">
                <i class="fas fa-plus"></i> Tambah User</a>
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
                  <th width="30%">Nama</th>
                  <th width="30%">Email</th>
                  <th width="20%">Level</th>
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

                $sql_k = "SELECT id_user, nama, email, level FROM user";
                if (isset($_GET['katakunci'])) {
                  $katakunci = $_GET['katakunci'];
                  $sql_k .= " WHERE nama LIKE '%$katakunci%' OR email LIKE '%$katakunci%' OR level LIKE '%$katakunci%'";
                }
                $sql_k .= " ORDER BY `level` DESC";
                $sql_q = $sql_k . " LIMIT $posisi, $batas";
                $query_k = mysqli_query($koneksi, $sql_q);
                $no = $posisi+1;
                while ($data_k = mysqli_fetch_row($query_k)) {
                  $id_user = $data_k[0];
                  $nama = $data_k[1];
                  $email = $data_k[2];
                  $level = $data_k[3];
                ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $nama ?></td>
                    <td><?= $email ?></td>
                    <td><?= $level ?></td>
                    <td align="center">
                      <a href="edituser.php?data=<?= $id_user ?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                      <a href="detailuser.php?data=<?= $id_user ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?= $nama ?>?'))window.location.href = 'user.php?aksi=hapus&data=<?= $id_user ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
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