<?php
session_start();
include("./includes/auth.php");
include('../koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    if (empty($nama) || empty($email)) {
        header("Location:editprofil.php?notif=editkosong");
    } else {
        if (empty($_FILES['foto'])) {
            $sql = "update `user` set `nama`='$nama',`email`='$email' where `id_user`='$id_user'";
        } else {
            $source = $_FILES['foto']['tmp_name'];
            $filename = $_FILES['foto']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newname = uniqid().'-'.time().'.'.$ext;
            $dest = 'foto/'.$newname;
            if (move_uploaded_file($source, $dest)) {
                $sql = "update `user` set `nama`='$nama',`email`='$email',`foto`='$newname' where `id_user`='$id_user'";
            } else {
                $sql = "update `user` set `nama`='$nama',`email`='$email' where `id_user`='$id_user'";
            }
        }
        
        mysqli_query($koneksi, $sql);
        header("Location:profil.php?notif=editberhasil");
    }
}
