<?php
if (isset($_SESSION['id_konten'])) {
    $id_konten = $_SESSION['id_konten'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    if (empty($judul) || empty($isi)) {
        header("Location:index.php?include=edit-konten&data=" . $id_konten . "&notif=editkosong");
    } else {
        $sql = "update `konten` set `judul`='$judul',`isi`='$isi' where `id_konten`='$id_konten'";
        mysqli_query($koneksi, $sql);
        unset($_SESSION['id_konten']);
        header("Location:index.php?include=konten&notif=editberhasil");
    }
}
