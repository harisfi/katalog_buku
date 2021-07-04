<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $pass_lama = $_POST['pass_lama'];
    $pass_baru = $_POST['pass_baru'];

    if (empty($pass_lama) || empty($pass_baru)) {
        header("Location:index.php?include=ubah-password&notif=editkosong");
    } else {
        $sql = "SELECT password FROM user WHERE id_user = '$id_user'";
        $query = mysqli_query($koneksi, $sql);
        while ($data_k = mysqli_fetch_row($query)) {
          $pass_saved = $data_k[0];
        }

        if (md5($pass_lama)===$pass_saved) {
            $pass_baru = md5($pass_baru);
            $sql = "UPDATE user SET password = '$pass_baru' WHERE id_user = '$id_user'";
            mysqli_query($koneksi, $sql);
            header("Location:index.php?include=ubah-password&notif=editberhasil");
        } else {
            header("Location:index.php?include=ubah-password&notif=editsalah");
        }
    }
}
