<?php
session_start();
$now = basename($_SERVER['PHP_SELF']);
if (empty($_SESSION['id_user']) || empty($_SESSION['level'])) {
    if (basename($_SERVER['PHP_SELF'])!="index.php") {
        header("Location:index.php");
    }
} else {
    if ($now == "index.php") {
        header("Location:profil.php");
    }

    if ($_SESSION['level'] != "Superadmin") {
        if ($now == "user.php" || $now == "edituser.php" || $now == "tambahuser.php" || $now == "detailuser.php") {
            header("Location:profil.php");
        }
    }
}