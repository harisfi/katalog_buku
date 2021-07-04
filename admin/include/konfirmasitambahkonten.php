<?php
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$sekarang = date("Y-m-d");
if (empty($judul) || empty($isi)) {
    header("Location:index.php?include=tambah-konten&notif=tambahkosong");
} else {
    $sql = "INSERT INTO konten (judul, isi, tanggal) VALUES ('$judul','$isi','$sekarang')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=konten&notif=tambahberhasil");
}
