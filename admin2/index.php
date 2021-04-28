<?php
session_start();
include("../koneksi/koneksi.php");
include("./components/libs.php");
use components\libs as l;

$notif = new l\Notifikasi();
$pagination = new l\Pagination();

$ac = "active";
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
      $incval = array("blog", "buku", "konten", "penerbit", "tag", "user", 
                      "detailblog", "editblog", "editkategoriblog", "kategoriblog", "konfirmasieditblog", "konfirmasieditkategoriblog", "konfirmasitambahblog", 
                      "konfirmasitambahkategoriblog", "tambahblog", "tambahkategoriblog", 
                      "detailbuku", "editbuku", "editkategoribuku", "kategoribuku", "konfirmasieditbuku", "konfirmasieditkategoribuku", "konfirmasitambahbuku", 
                      "konfirmasitambahkategoribuku", "tambahbuku", "tambahkategoribuku", 
                      "detailkonten", "editkonten", "konfirmasieditkonten", "konfirmasitambahkonten", "tambahkonten", 
                      "editpenerbit", "konfirmasieditpenerbit", "konfirmasitambahpenerbit", "tambahpenerbit", 
                      "edittag", "konfirmasiedittag", "konfirmasitambahtag", "tambahtag", 
                      "detailuser", "edituser", "konfirmasiedituser", "konfirmasitambahuser", "tambahuser",
                      "editprofil", "konfirmasieditprofil", "signout");
      
      $realpg = array("blog", "buku", "konten", "penerbit", "tag", "user", 
                      "detail-blog", "edit-blog", "edit-kategori-blog", "kategori-blog", "konfirmasi-edit-blog", "konfirmasi-edit-kategori-blog", "konfirmasi-tambah-blog", 
                      "konfirmasi-tambah-kategori-blog", "tambah-blog", "tambah-kategori-blog", 
                      "detail-buku", "edit-buku", "edit-kategori-buku", "kategori-buku", "konfirmasi-edit-buku", "konfirmasi-edit-kategori-buku", "konfirmasi-tambah-buku", 
                      "konfirmasi-tambah-kategori-buku", "tambah-buku", "tambah-kategori-buku", 
                      "detail-konten", "edit-konten", "konfirmasi-edit-konten", "konfirmasi-tambah-konten", "tambah-konten", 
                      "edit-penerbit", "konfirmasi-edit-penerbit", "konfirmasi-tambah-penerbit", "tambah-penerbit", 
                      "edit-tag", "konfirmasi-edit-tag", "konfirmasi-tambah-tag", "tambah-tag", 
                      "detail-user", "edit-user", "konfirmasi-edit-user", "konfirmasi-tambah-user", "tambah-user",
                      "edit-profil", "konfirmasi-edit-profil", "signout");

      $allval = array_combine($realpg, $incval);
      if (in_array($include, $realpg)) {
        include("include/".$allval[$include].".php");
      } else {
        include("include/profil.php");
      }
    } else {
      if ($include == "konfirmasi-login") {
        include("include/konfirmasilogin.php");
      } else {
        include("include/login.php");
      }
    }
  } else {
    if (isset($_SESSION["id_user"])) {
      include("include/profil.php");
    } else {
      include("include/login.php");
    }
  }
  ?>
</html>
