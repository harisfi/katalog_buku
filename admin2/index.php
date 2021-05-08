<?php
session_start();
include("../koneksi/koneksi.php");
include("./components/libs.php");
use components\libs as l;

$notif = new l\Notifikasi();
$pagination = new l\Pagination();

$ac = "active";

if (isset($_POST['katakunci'])) {
  $katakunci = $_POST['katakunci'];
} elseif (isset($_GET['katakunci'])) {
  $katakunci = $_GET['katakunci'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>
  <?php
  if (isset($_GET["include"])) {
    $include = $_GET["include"];
    if (isset($_SESSION["id_user"])) {
      ?>
      <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
          <?php include("includes/header.php") ?>
          <?php include("includes/sidebar.php") ?>
          <div class="content-wrapper">
      <?php
      $realpg = array("blog", "buku", "konten", "penerbit", "tag", "user", "detail-blog",
                      "edit-blog", "edit-kategori-blog", "kategori-blog", "konfirmasi-edit-blog",
                      "konfirmasi-edit-kategori-blog", "konfirmasi-tambah-blog",
                      "konfirmasi-tambah-kategori-blog", "tambah-blog", "tambah-kategori-blog",
                      "detail-buku", "edit-buku", "edit-kategori-buku", "kategori-buku",
                      "konfirmasi-edit-buku", "konfirmasi-edit-kategori-buku",
                      "konfirmasi-tambah-buku", "konfirmasi-tambah-kategori-buku", "tambah-buku",
                      "tambah-kategori-buku", "detail-konten", "edit-konten",
                      "konfirmasi-edit-konten", "konfirmasi-tambah-konten", "tambah-konten",
                      "edit-penerbit", "konfirmasi-edit-penerbit", "konfirmasi-tambah-penerbit",
                      "tambah-penerbit", "edit-tag", "konfirmasi-edit-tag", "konfirmasi-tambah-tag",
                      "tambah-tag", "detail-user", "edit-user", "konfirmasi-edit-user",
                      "konfirmasi-tambah-user", "tambah-user", "edit-profil",
                      "konfirmasi-edit-profil", "signout", "ubah-password",
                      "konfirmasi-edit-password");

      $allval = array_combine($realpg, str_replace("-", "", $realpg));
      if (in_array($include, $realpg)) {
        include("include/".$allval[$include].".php");
      } else {
        include("include/profil.php");
      }
      ?>
      </div>
      <?php
      include("includes/footer.php");
    } else {
      ?>
      <body class="hold-transition login-page">
        <div class="login-box">
      <?php
      if ($include == "konfirmasi-login") {
        include("include/konfirmasilogin.php");
      } else {
        include("include/login.php");
      }
    }
  } else {
    if (isset($_SESSION["id_user"])) {
      ?>
      <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
          <?php include("includes/header.php") ?>
          <?php include("includes/sidebar.php") ?>
          <div class="content-wrapper">
      <?php
      include("include/profil.php");
      ?>
      </div>
      <?php
      include("includes/footer.php");
    } else {
      ?>
      <body class="hold-transition login-page">
        <div class="login-box">
      <?php
      include("include/login.php");
    }
  }
  ?>
    </div>
    <?php include("includes/script.php") ?>
  </body>
</html>
