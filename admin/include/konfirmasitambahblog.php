<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if (empty($kategori) || empty($judul) || empty($isi)) {
        header("Location:index.php?include=tambah-blog&notif=tambahkosong");
    } else {
        $sekarang = date("Y-m-d");
        $sql = "INSERT INTO blog(id_kategori_blog, id_user, tanggal, judul, isi) VALUES('$kategori', '$id_user', '$sekarang', '$judul', '$isi')";
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=blog&notif=tambahberhasil");
    }
}