<?php
include('../koneksi/koneksi.php');
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$sekarang = date("Y-m-d");
echo $sekarang;
if (empty($judul) || empty($isi)) {
    header("Location:tambahkonten.php?notif=tambahkosong");
} else {
    $sql = "insert into `konten` (`judul`, `isi`, `tanggal`) values ('$judul','$isi','$sekarang')";
    mysqli_query($koneksi, $sql);
    header("Location:konten.php?notif=tambahberhasil");
}
