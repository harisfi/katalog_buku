<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>
  <?php
  if (isset($_GET["include"])) {
    $include = $_GET["include"];
    if (isset($_SESSION["id_user"])) {
      $incval = array("blog", "buku", "konten", "penerbit", "tag", "user", "detailblog");
      $realpg = array("blog", "buku", "konten", "penerbit", "tag", "user", "detail-blog");

      if ($include == "kategori-buku") {
        include("include/kategoribuku.php");
      } else {
        include("include/profil.php");
      }
    } else {
      include("include/login.php");
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