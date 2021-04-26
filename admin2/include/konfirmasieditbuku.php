<?php
session_start();
include("./includes/auth.php");
include('../koneksi/koneksi.php');
if (isset($_SESSION['id_buku'])) {
    $id_buku = $_SESSION['id_buku'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $sinopsis = $_POST['sinopsis'];
    $tag = $_POST['tag'];

    if (empty($kategori) || empty($judul) || empty($pengarang) || empty($penerbit) || empty($tahun) || empty($sinopsis) || empty($tag)) {
        header("Location:editbuku.php?notif=editkosong");
    } else {
        if (empty($_FILES['cover'])) {
            $sql = "UPDATE buku SET id_kategori_buku='$kategori', judul='$judul', pengarang='$pengarang', id_penerbit='$penerbit', tahun_terbit='$tahun', sinopsis='$sinopsis' WHERE id_buku='$id_buku'";
        } else {
            $source = $_FILES['cover']['tmp_name'];
            $filename = $_FILES['cover']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newname = uniqid().'-'.time().'.'.$ext;
            $dest = 'cover/'.$newname;
            if (move_uploaded_file($source, $dest)) {
                $sql = "UPDATE buku SET id_kategori_buku='$kategori', judul='$judul', pengarang='$pengarang', id_penerbit='$penerbit', tahun_terbit='$tahun', sinopsis='$sinopsis', cover='$newname' WHERE id_buku='$id_buku'";
            } else {
                $sql = "UPDATE buku SET id_kategori_buku='$kategori', judul='$judul', pengarang='$pengarang', id_penerbit='$penerbit', tahun_terbit='$tahun', sinopsis='$sinopsis' WHERE id_buku='$id_buku'";
            }
        }
        mysqli_query($koneksi, $sql);
        
        $sql = "DELETE FROM tag_buku WHERE id_buku = '$id_buku'";
        mysqli_query($koneksi, $sql);

        for ($i=0; $i < sizeof($tag); $i++) { 
            $tagnow = $tag[$i];
            $sql = "INSERT INTO tag_buku(id_buku, id_tag) VALUES('$id_buku', '$tagnow')";
            mysqli_query($koneksi, $sql);
        }
        
        header("Location:buku.php?notif=editberhasil");
    }
}
