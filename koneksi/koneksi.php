<?php
$koneksi = mysqli_connect("sql6.freemysqlhosting.net", "sql6402829", "bAGf1SCDs1", "sql6402829");
// $koneksi = mysqli_connect("localhost", "root", "", "katalog_buku");
// cek koneksi
if (!$koneksi){
    die("Error koneksi: " . mysqli_connect_errno());
}
