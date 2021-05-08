<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if (empty($nama) || empty($email) || empty($username) || empty($password) || empty($level)) {
        header("Location:index.php?include=tambah-user&notif=tambahkosong");
    } else {
        $source = $_FILES['foto']['tmp_name'];
        $filename = $_FILES['foto']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $newname = uniqid().'-'.time().'.'.$ext;
        $dest = 'foto/'.$newname;
        $password = md5($password);
        if (move_uploaded_file($source, $dest)) {
            $sql = "INSERT INTO user(nama, email, username, password, level, foto) VALUES('$nama','$email','$username','$password','$level','$newname')";
            mysqli_query($koneksi, $sql);
        } else {
            $sql = "INSERT INTO user(nama, email, username, password, level) VALUES('$nama','$email','$username','$password','$level')";
            mysqli_query($koneksi, $sql);
        }
        header("Location:index.php?include=user&notif=tambahberhasil");
    }
}