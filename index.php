<?php include("./koneksi/koneksi.php") ?>
<!doctype html>
<html lang="en">

<head>
<?php include("./includes/head.php") ?>
</head>

<body>
  <?php
  if (isset($_GET["include"])) {
    $include = $_GET["include"];
    include("./includes/navbar.php");

    $realpg = array("about-us", "blog", "contact-us", "daftar-buku", "detail-blog", "detail-buku");
    $allval = array_combine($realpg, str_replace("-", "", $realpg));
    if (in_array($include, $realpg)) {
      include("./include/".$allval[$include].".php");
    } else {
      include("./include/index.php");
    }
  } else {
    include("./includes/navbar.php");
    include("./include/index.php");
  }
  ?>
  <?php include("./includes/footer.php") ?>

  <?php include("./includes/script.php") ?>
</body>

</html>