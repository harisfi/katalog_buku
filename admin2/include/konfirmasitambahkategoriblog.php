<?php
include("./includes/auth.php");
include('../koneksi/koneksi.php');
$kategori_blog = $_POST['kategori_blog'];
if (empty($kategori_blog)) {
    header("Location:tambahkategoriblog.php?notif=tambahkosong");
} else {
    $sql = "insert into `kategori_blog` (`kategori_blog`)
values ('$kategori_blog')";
    mysqli_query($koneksi, $sql);
    header("Location:kategoriblog.php?notif=tambahberhasil");
}
