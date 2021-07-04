<?php
if (isset($_SESSION['id_blog'])) {
    $id_blog = $_SESSION['id_blog'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if (empty($kategori) || empty($judul) || empty($isi)) {
        header("Location:index.php?include=edit-blog&data=".$id_blog."&notif=editkosong");
    } else {
        $sql = "UPDATE blog SET id_kategori_blog = '$kategori', judul = '$judul', isi = '$isi' WHERE id_blog = '$id_blog'";
        mysqli_query($koneksi, $sql);
        unset($_SESSION['id_blog']);
        header("Location:index.php?include=blog&notif=editberhasil");
    }
}