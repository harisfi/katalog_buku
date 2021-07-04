<?php
$kategori_blog = $_POST['kategori_blog'];
if (empty($kategori_blog)) {
    header("Location:index.php?include=tambah-kategori-blog&notif=tambahkosong");
} else {
    $sql = "INSERT INTO kategori_blog(kategori_blog) VALUES ('$kategori_blog')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=kategori-blog&notif=tambahberhasil");
}
