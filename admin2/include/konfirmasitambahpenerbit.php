<?php
$penerbit = $_POST['penerbit'];
$alamat = $_POST['alamat'];
if (empty($penerbit) || empty($alamat)) {
    header("Location:index.php?include=tambah-penerbit&notif=tambahkosong");
} else {
    $sql = "insert into `penerbit` (`penerbit`,`alamat`) values ('$penerbit','$alamat')";
    mysqli_query($koneksi, $sql);
    header("Location:index.php?include=penerbit&notif=tambahberhasil");
}
