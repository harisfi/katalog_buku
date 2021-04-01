<?php
session_start();
include("./includes/auth.php");
include('../koneksi/koneksi.php');
if (isset($_SESSION['id_userz'])) {
    $id_userz = $_SESSION['id_userz'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if (empty($nama) || empty($email) || empty($username) || empty($level)) {
        header("Location:edituser.php?data=" . $id_userz . "&notif=editkosong");
    } else {
        if (empty($_FILES['foto'])) {
            if (empty($password)) {
                $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`level`='$level' where `id_user`='$id_userz'";
            } else {
                $password = md5($password);
                $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`password`='$password',`level`='$level' where `id_user`='$id_userz'";
            }
        } else {
            $source = $_FILES['foto']['tmp_name'];
            $filename = $_FILES['foto']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newname = uniqid().'-'.time().'.'.$ext;
            $dest = 'foto/'.$newname;
            $password = md5($password);
            if (move_uploaded_file($source, $dest)) {
                if (empty($password)) {
                    $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`level`='$level',`foto`='$newname' where `id_user`='$id_userz'";
                } else {
                    $password = md5($password);
                    $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`password`='$password',`level`='$level',`foto`='$newname' where `id_user`='$id_userz'";
                }
            } else {
                if (empty($password)) {
                    $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`level`='$level' where `id_user`='$id_userz'";
                } else {
                    $password = md5($password);
                    $sql = "update `user` set `nama`='$nama',`email`='$email',`username`='$username',`password`='$password',`level`='$level' where `id_user`='$id_userz'";
                }
            }
        }
        
        mysqli_query($koneksi, $sql);
        unset($_SESSION['id_userz']);
        header("Location:user.php?notif=editberhasil");
    }
}
