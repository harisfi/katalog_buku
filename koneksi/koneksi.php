<?php
if (!empty(getenv("DB_HOST")) && !empty(getenv("DB_USER")) && !empty(getenv("DB_PASS")) && !empty(getenv("DB_NAME"))) {
    $koneksi = mysqli_connect(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASS"), getenv("DB_NAME"));
} else {
    $koneksi = mysqli_connect("localhost", "root", "", "katalog_buku");
}

// cek koneksi
if (!$koneksi){
    die("Error koneksi: " . mysqli_connect_errno());
}
