<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $sinopsis = $_POST['sinopsis'];
    $tag = $_POST['tag'];

    if (empty($kategori) || empty($judul) || empty($pengarang) || empty($penerbit) || empty($tahun) || empty($sinopsis) || empty($tag)) {
        header("Location:index.php?include=tambah-buku&notif=tambahkosong");
    } else {
        $source = $_FILES['cover']['tmp_name'];
        $filename = $_FILES['cover']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $newname = uniqid().'-'.time().'.'.$ext;
        $dest = 'cover/'.$newname;
        if (move_uploaded_file($source, $dest)) {
            $sql = "INSERT INTO buku(id_kategori_buku, judul, pengarang, id_penerbit, tahun_terbit, sinopsis, cover) VALUES('$kategori', '$judul', '$pengarang', '$penerbit', '$tahun', '$sinopsis', '$newname')";
            mysqli_query($koneksi, $sql);
        } else {
            $sql = "INSERT INTO buku(id_kategori_buku, judul, pengarang, id_penerbit, tahun_terbit, sinopsis) VALUES('$kategori', '$judul', '$pengarang', '$penerbit', '$tahun', '$sinopsis')";
            mysqli_query($koneksi, $sql);
        }

        $sql = "SELECT id_buku FROM buku ORDER BY id_buku DESC LIMIT 1";
        $query = mysqli_query($koneksi, $sql);
        $data_k = mysqli_fetch_row($query);
        $id_buku = $data_k[0];

        for ($i=0; $i < sizeof($tag); $i++) { 
            $tagnow = $tag[$i];
            $sql = "INSERT INTO tag_buku(`id_buku`, `id_tag`) VALUES('$id_buku', '$tagnow')";
            mysqli_query($koneksi, $sql);
        }
        header("Location:index.php?include=buku&notif=tambahberhasil");
    }
}