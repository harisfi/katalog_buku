<?php
$penerbit = $_POST['penerbit'];
$alamat = $_POST['alamat'];
if (empty($penerbit) || empty($alamat)) {
    header("Location:index.php?include=tambah-penerbit&notif=tambahkosong");
} else {
    $sql = "INSERT INTO penerbit (penerbit, alamat) VALUES ('$penerbit', '$alamat')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=penerbit&notif=tambahberhasil");
}
