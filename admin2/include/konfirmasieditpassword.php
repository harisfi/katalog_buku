<?php
session_start();
include("./includes/auth.php");
include('../koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $pass_lama = $_POST['pass_lama'];
    $pass_baru = $_POST['pass_baru'];

    if (empty($pass_lama) || empty($pass_baru)) {
        header("Location:ubahpassword.php?notif=editkosong");
    } else {
        $sql = "SELECT password FROM user WHERE id_user = '$id_user'";
        $query = mysqli_query($koneksi, $sql);
        while ($data_k = mysqli_fetch_row($query)) {
          $pass_saved = $data_k[0];
        }

        if (md5($pass_lama)===$pass_saved) {
            $pass_baru = md5($pass_baru);
            $sql = "update `user` set `password`='$pass_baru' where `id_user`='$id_user'";
            mysqli_query($koneksi, $sql);
            header("Location:ubahpassword.php?notif=editberhasil");
        } else {
            header("Location:ubahpassword.php?notif=editsalah");
        }
    }
}
