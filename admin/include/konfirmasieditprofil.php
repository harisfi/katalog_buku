<?php
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    if (empty($nama) || empty($email)) {
        header("Location:index.php?include=edit-profil&notif=editkosong");
    } else {
        if (empty($_FILES['foto'])) {
            $sql = "UPDATE user SET nama = '$nama', email = '$email' WHERE id_user = '$id_user'";
        } else {
            $source = $_FILES['foto']['tmp_name'];
            $filename = $_FILES['foto']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $newname = uniqid().'-'.time().'.'.$ext;
            $dest = 'foto/'.$newname;
            if (move_uploaded_file($source, $dest)) {
                $sql = "UPDATE user SET nama = '$nama', email = '$email', foto='$newname' WHERE id_user = '$id_user'";
            } else {
                $sql = "UPDATE user SET nama = '$nama', email = '$email' WHERE id_user = '$id_user'";
            }
        }
        
        mysqli_query($koneksi, $sql);
        header("Location:index.php?include=profil&notif=editberhasil");
    }
}
